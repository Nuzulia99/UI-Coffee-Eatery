<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\DetailPenjualan;
use App\Models\Produk;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function index()
    {
        $penjualan = Penjualan::with('pelanggan')->get();
        $produk = Produk::all();
        return view('penjualan.index', compact('penjualan', 'produk'));
    }

    public function create()
    {
        $produk = Produk::all();
        return view('penjualan.create', compact('produk'));
    }

    public function menu()
    {
        $produk = Produk::all();
        $kategori = Produk::select('Kategori')->distinct()->whereNotNull('Kategori')->pluck('Kategori')->toArray();
        return view('penjualan.menu', compact('produk', 'kategori'));
    }

    public function transaction(Request $request)
    {
        // Get items from request
        $itemsData = $request->input('items', []);
        
        if (empty($itemsData)) {
            return redirect()->route('penjualan.menu')->with('error', 'Tidak ada item yang dipilih');
        }

        $items = [];
        $subtotal = 0;

        foreach ($itemsData as $item) {
            $produk = Produk::find($item['ProdukID']);
            
            if (!$produk) {
                return redirect()->route('penjualan.menu')->with('error', 'Produk tidak ditemukan');
            }

            $itemTotal = $produk->Harga * $item['JumlahProduk'];
            
            $items[] = [
                'id' => $produk->ProdukID,
                'name' => $produk->NamaProduk,
                'price' => $produk->Harga,
                'qty' => $item['JumlahProduk'],
                'total' => $itemTotal
            ];
            
            $subtotal += $itemTotal;
        }

        $tax = $subtotal * 0.025;
        $serviceCharge = $subtotal * 0.01;
        $total = $subtotal + $tax + $serviceCharge;

        // Generate order number
        $orderNumber = 'POS-' . date('dmy') . '-' . str_pad(Penjualan::whereDate('TanggalPenjualan', date('Y-m-d'))->count() + 1, 2, '0', STR_PAD_LEFT);

        $user = auth()->user();
        $date = now()->format('d/m/Y H:i');

        return view('penjualan.transaction', compact('items', 'subtotal', 'tax', 'serviceCharge', 'total', 'orderNumber', 'user', 'date'));
    }

    public function confirm(Request $request)
    {
        // Filter out empty items first
        $items = array_filter($request->items, function ($item) {
            return !empty($item['ProdukID']);
        });

        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'date' => 'required|date',
            'discount' => 'nullable|numeric|min:0',
            'cash' => 'nullable|numeric|min:0',
            'total' => 'required|numeric',
        ]);

        // Validate items manually
        if (empty($items)) {
            return redirect()->back()->with('error', 'Minimal harus ada 1 barang yang dipilih')->withInput();
        }

        foreach ($items as $item) {
            if (empty($item['ProdukID']) || empty($item['JumlahProduk'])) {
                return redirect()->back()->with('error', 'Barang dan jumlah harus diisi lengkap')->withInput();
            }
            
            $produk = Produk::find($item['ProdukID']);
            if (!$produk) {
                return redirect()->back()->with('error', 'Barang tidak ditemukan')->withInput();
            }
            
            if (!is_numeric($item['JumlahProduk']) || $item['JumlahProduk'] < 1) {
                return redirect()->back()->with('error', 'Jumlah harus angka positif')->withInput();
            }
        }

        // Check or create pelanggan
        $pelanggan = Pelanggan::firstOrCreate(
            ['NamaPelanggan' => $validated['customer_name']],
            [
                'NamaPelanggan' => $validated['customer_name'],
                'Alamat' => '-',
                'NomorTelepon' => '-'
            ]
        );

        // Check stock availability
        $insufficientStock = [];
        foreach ($items as $item) {
            $produk = Produk::find($item['ProdukID']);
            if ($produk->Stok < $item['JumlahProduk']) {
                $insufficientStock[] = [
                    'produk' => $produk->NamaProduk,
                    'stok_tersedia' => $produk->Stok,
                    'jumlah_pesan' => $item['JumlahProduk']
                ];
            }
        }

        // If stock is insufficient, return with error
        if (!empty($insufficientStock)) {
            $errorMessages = [];
            foreach ($insufficientStock as $item) {
                $errorMessages[] = "{$item['produk']}: Stok tersedia hanya {$item['stok_tersedia']}, tapi anda memesan {$item['jumlah_pesan']}";
            }
            return redirect()->back()->with('error', 'Stok tidak cukup! ' . implode(' | ', $errorMessages))->withInput();
        }

        // Create penjualan dengan total yang sudah dihitung dari form
        $penjualan = Penjualan::create([
            'TanggalPenjualan' => $validated['date'],
            'PelangganID' => $pelanggan->PelangganID,
            'TotalHarga' => $validated['total'],
        ]);

        // Create detail penjualan and collect items for receipt
        $receiptItems = [];
        $subtotal = 0;
        foreach ($items as $item) {
            $produk = Produk::find($item['ProdukID']);
            $itemSubtotal = $produk->Harga * $item['JumlahProduk'];
            $subtotal += $itemSubtotal;

            DetailPenjualan::create([
                'PenjualanID' => $penjualan->PenjualanID,
                'ProdukID' => $item['ProdukID'],
                'JumlahProduk' => $item['JumlahProduk'],
                'Subtotal' => $itemSubtotal,
            ]);

            // Update stok
            $produk->decrement('Stok', $item['JumlahProduk']);

            // Add to receipt items
            $receiptItems[] = [
                'name' => $produk->NamaProduk,
                'price' => $produk->Harga,
                'qty' => $item['JumlahProduk'],
                'total' => $itemSubtotal
            ];
        }

        // Prepare receipt data
        $user = auth()->user();
        $discountPercent = $request->input('discount', 0);
        $discountAmount = $subtotal * ($discountPercent / 100);
        $subtotalAfterDiscount = $subtotal - $discountAmount;
        $serviceCharge = $subtotalAfterDiscount * 0.01;
        $tax = $subtotalAfterDiscount * 0.025;
        $cash = $request->input('cash', 0);
        $change = max(0, $cash - $validated['total']);

        // Generate queue number (simplified)
        $queueNumber = str_pad(rand(1, 999), 3, '0', STR_PAD_LEFT);

        return view('penjualan.receipt', [
            'items' => $receiptItems,
            'subtotal' => $subtotal,
            'discountAmount' => $discountAmount,
            'serviceCharge' => $serviceCharge,
            'tax' => $tax,
            'total' => $validated['total'],
            'cash' => $cash,
            'change' => $change,
            'customerName' => $validated['customer_name'],
            'orderNumber' => 'POS-' . date('dmy') . '-' . str_pad(Penjualan::whereDate('TanggalPenjualan', date('Y-m-d'))->count(), 2, '0', STR_PAD_LEFT),
            'transactionDate' => date('d/m/Y H:i'),
            'userName' => $user->name,
            'queueNumber' => $queueNumber,
        ]);
    }

    public function store(Request $request)
    {
        // Filter out empty items first
        $items = array_filter($request->items, function ($item) {
            return !empty($item['ProdukID']);
        });

        $validated = $request->validate([
            'TanggalPenjualan' => 'required|date',
            'NamaPelanggan' => 'required|string|max:255',
        ]);

        // Validate items manually
        if (empty($items)) {
            return redirect()->back()->with('error', 'Minimal harus ada 1 barang yang dipilih')->withInput();
        }

        foreach ($items as $item) {
            if (empty($item['ProdukID']) || empty($item['JumlahProduk'])) {
                return redirect()->back()->with('error', 'Barang dan jumlah harus diisi lengkap')->withInput();
            }
            
            $produk = Produk::find($item['ProdukID']);
            if (!$produk) {
                return redirect()->back()->with('error', 'Barang tidak ditemukan')->withInput();
            }
            
            if (!is_numeric($item['JumlahProduk']) || $item['JumlahProduk'] < 1) {
                return redirect()->back()->with('error', 'Jumlah harus angka positif')->withInput();
            }
        }

        // Check or create pelanggan
        $pelanggan = Pelanggan::firstOrCreate(
            ['NamaPelanggan' => $validated['NamaPelanggan']],
            [
                'NamaPelanggan' => $validated['NamaPelanggan'],
                'Alamat' => '-',
                'NomorTelepon' => '-'
            ]
        );

        // Check stock availability
        $insufficientStock = [];
        foreach ($items as $item) {
            $produk = Produk::find($item['ProdukID']);
            if ($produk->Stok < $item['JumlahProduk']) {
                $insufficientStock[] = [
                    'produk' => $produk->NamaProduk,
                    'stok_tersedia' => $produk->Stok,
                    'jumlah_pesan' => $item['JumlahProduk']
                ];
            }
        }

        // If stock is insufficient, return with error
        if (!empty($insufficientStock)) {
            $errorMessages = [];
            foreach ($insufficientStock as $item) {
                $errorMessages[] = "{$item['produk']}: Stok tersedia hanya {$item['stok_tersedia']}, tapi anda memesan {$item['jumlah_pesan']}";
            }
            return redirect()->back()->with('error', 'Stok tidak cukup! ' . implode(' | ', $errorMessages))->withInput();
        }

        $totalHarga = 0;

        // Calculate total
        foreach ($items as $item) {
            $produk = Produk::find($item['ProdukID']);
            $totalHarga += $produk->Harga * $item['JumlahProduk'];
        }

        // Create penjualan
        $penjualan = Penjualan::create([
            'TanggalPenjualan' => $validated['TanggalPenjualan'],
            'PelangganID' => $pelanggan->PelangganID,
            'TotalHarga' => $totalHarga,
        ]);

        // Create detail penjualan
        foreach ($items as $item) {
            $produk = Produk::find($item['ProdukID']);
            $subtotal = $produk->Harga * $item['JumlahProduk'];

            DetailPenjualan::create([
                'PenjualanID' => $penjualan->PenjualanID,
                'ProdukID' => $item['ProdukID'],
                'JumlahProduk' => $item['JumlahProduk'],
                'Subtotal' => $subtotal,
            ]);

            // Update stok
            $produk->decrement('Stok', $item['JumlahProduk']);
        }

        return redirect()->route('penjualan.menu')->with('success', 'Penjualan berhasil dicatat');
    }

    public function show(Penjualan $penjualan)
    {
        $penjualan->load('pelanggan', 'detailPenjualan.produk');
        return view('penjualan.show', compact('penjualan'));
    }

    public function receipt(Penjualan $penjualan)
    {
        $penjualan->load('pelanggan', 'detailPenjualan.produk');
        
        // Prepare receipt data
        $items = [];
        $subtotal = 0;
        
        foreach ($penjualan->detailPenjualan as $detail) {
            $items[] = [
                'name' => $detail->produk->NamaProduk,
                'price' => $detail->produk->Harga,
                'qty' => $detail->JumlahProduk,
                'total' => $detail->Subtotal
            ];
            $subtotal += $detail->Subtotal;
        }

        $user = auth()->user();
        
        // Calculate tax and service charge (assuming default rates)
        $serviceCharge = $subtotal * 0.01;
        $tax = $subtotal * 0.025;
        $total = $penjualan->TotalHarga;
        
        // Calculate discount amount if possible (from total calculation)
        $discountAmount = $subtotal + $serviceCharge + $tax - $total;
        $discountAmount = max(0, $discountAmount);
        
        // Estimate cash and change (not stored, so we'll show 0)
        $cash = $total;
        $change = 0;

        // Generate queue number (simplified)
        $queueNumber = str_pad(rand(1, 999), 3, '0', STR_PAD_LEFT);
        
        // Convert date to Carbon instance if it's a string
        $tanggalPenjualan = is_string($penjualan->TanggalPenjualan) 
            ? \Carbon\Carbon::createFromFormat('Y-m-d', $penjualan->TanggalPenjualan)
            : $penjualan->TanggalPenjualan;

        return view('penjualan.receipt', [
            'items' => $items,
            'subtotal' => $subtotal,
            'discountAmount' => $discountAmount,
            'serviceCharge' => $serviceCharge,
            'tax' => $tax,
            'total' => $total,
            'cash' => $cash,
            'change' => $change,
            'customerName' => $penjualan->pelanggan->NamaPelanggan,
            'orderNumber' => 'POS-' . $tanggalPenjualan->format('dmy') . '-' . str_pad($penjualan->PenjualanID, 2, '0', STR_PAD_LEFT),
            'transactionDate' => $tanggalPenjualan->format('d/m/Y H:i'),
            'userName' => $user->name,
            'queueNumber' => $queueNumber,
        ]);
    }

    public function destroy(Penjualan $penjualan)
    {
        // Restore stok
        foreach ($penjualan->detailPenjualan as $detail) {
            $detail->produk->increment('Stok', $detail->JumlahProduk);
        }

        $penjualan->delete();
        return redirect()->route('penjualan.menu')->with('success', 'Penjualan berhasil dihapus');
    }

    public function report(Request $request)
    {
        $query = Penjualan::with('pelanggan', 'detailPenjualan.produk');
        
        // Filter berdasarkan tanggal jika ada
        if ($request->filled('start_date') && $request->filled('end_date')) {
            $startDate = $request->start_date . ' 00:00:00';
            $endDate = $request->end_date . ' 23:59:59';
            $query->whereBetween('created_at', [$startDate, $endDate]);
        } elseif ($request->filled('start_date')) {
            $startDate = $request->start_date . ' 00:00:00';
            $query->where('created_at', '>=', $startDate);
        } elseif ($request->filled('end_date')) {
            $endDate = $request->end_date . ' 23:59:59';
            $query->where('created_at', '<=', $endDate);
        }
        
        $penjualan = $query->orderBy('created_at', 'desc')->get();
        
        $totalPenjualan = $penjualan->count();
        $totalRevenue = $penjualan->sum('TotalHarga');
        
        $startDate = $request->start_date ?? '';
        $endDate = $request->end_date ?? '';
        
        return view('penjualan.report', compact('penjualan', 'totalPenjualan', 'totalRevenue', 'startDate', 'endDate'));
    }
}
