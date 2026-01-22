<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\DetailPenjualan;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class ProdukController extends Controller
{
    public function dashboard()
    {
        $today = Carbon::today();
        
        // Check user role
        $userLevel = auth()->user()->level;
        
        if ($userLevel === 'petugas') {
            // Dashboard untuk petugas
            // Total penjualan hari ini
            $totalPenjualanHariIni = DetailPenjualan::whereHas('penjualan', function($q) use ($today) {
                $q->whereDate('created_at', $today);
            })->sum('Subtotal');

            // Jumlah transaksi hari ini
            $jumlahTransaksiHariIni = DetailPenjualan::whereHas('penjualan', function($q) use ($today) {
                $q->whereDate('created_at', $today);
            })->distinct('PenjualanID')->count('PenjualanID');

            // Produk terlaris hari ini
            $produkTerlaris = DetailPenjualan::join('produk', 'detailpenjualan.ProdukID', '=', 'produk.ProdukID')
                ->join('penjualan', 'detailpenjualan.PenjualanID', '=', 'penjualan.PenjualanID')
                ->whereDate('penjualan.created_at', $today)
                ->selectRaw('detailpenjualan.ProdukID, produk.NamaProduk, SUM(detailpenjualan.JumlahProduk) as total_terjual')
                ->groupBy('detailpenjualan.ProdukID', 'produk.NamaProduk')
                ->orderByDesc('total_terjual')
                ->first();

            // Transaksi terbaru petugas - hanya hari ini
            $transaksiTerbaru = \App\Models\Penjualan::whereDate('created_at', $today)
                ->limit(5)
                ->orderByDesc('created_at')
                ->get();

            return view('dashboard-petugas', compact('totalPenjualanHariIni', 'jumlahTransaksiHariIni', 'produkTerlaris', 'transaksiTerbaru'));
        }

        // Dashboard untuk administrator (tetap seperti sebelumnya)
        // Get sales count for each category today
        $drinksSales = DetailPenjualan::whereHas('penjualan', function($q) use ($today) {
            $q->whereDate('created_at', $today);
        })->whereHas('produk', function($q) {
            $q->where('Kategori', 'Drinks');
        })->sum('JumlahProduk');

        $mainCourseSales = DetailPenjualan::whereHas('penjualan', function($q) use ($today) {
            $q->whereDate('created_at', $today);
        })->whereHas('produk', function($q) {
            $q->where('Kategori', 'Main Course');
        })->sum('JumlahProduk');

        $snackSales = DetailPenjualan::whereHas('penjualan', function($q) use ($today) {
            $q->whereDate('created_at', $today);
        })->whereHas('produk', function($q) {
            $q->where('Kategori', 'Snack');
        })->sum('JumlahProduk');

        $dessertSales = DetailPenjualan::whereHas('penjualan', function($q) use ($today) {
            $q->whereDate('created_at', $today);
        })->whereHas('produk', function($q) {
            $q->where('Kategori', 'Dessert');
        })->sum('JumlahProduk');

        // Get top 4 products by sales
        $topProducts = Produk::select('produk.*')
            ->leftJoinSub(
                DetailPenjualan::selectRaw('ProdukID, SUM(JumlahProduk) as total_sold, SUM(Subtotal) as total_revenue')
                    ->groupBy('ProdukID'),
                'sales',
                'produk.ProdukID',
                '=',
                'sales.ProdukID'
            )
            ->orderByDesc('total_sold')
            ->limit(4)
            ->get();

        // Format top products data
        $formattedTopProducts = $topProducts->map(function($product) {
            $totalSold = DetailPenjualan::where('ProdukID', $product->ProdukID)->sum('JumlahProduk');
            $totalRevenue = DetailPenjualan::where('ProdukID', $product->ProdukID)->sum('Subtotal');
            
            return [
                'id' => $product->ProdukID,
                'name' => $product->NamaProduk,
                'sold' => $totalSold,
                'revenue' => $totalRevenue,
                'stock' => $product->Stok,
                'kategori' => $product->Kategori,
                'icon' => $this->getProductIcon($product->Kategori)
            ];
        });

        // Get categories with sales stats
        $categories = [
            [
                'name' => 'Drinks',
                'items' => Produk::where('Kategori', 'Drinks')->count(),
                'sold' => $drinksSales,
                'icon' => 'fa-wine-glass'
            ],
            [
                'name' => 'Main Course',
                'items' => Produk::where('Kategori', 'Main Course')->count(),
                'sold' => $mainCourseSales,
                'icon' => 'fa-utensils'
            ],
            [
                'name' => 'Snacks',
                'items' => Produk::where('Kategori', 'Snack')->count(),
                'sold' => $snackSales,
                'icon' => 'fa-cookie'
            ],
            [
                'name' => 'Desserts',
                'items' => Produk::where('Kategori', 'Dessert')->count(),
                'sold' => $dessertSales,
                'icon' => 'fa-cake-candles'
            ]
        ];

        return view('dashboard', compact('drinksSales', 'mainCourseSales', 'snackSales', 'dessertSales', 'formattedTopProducts', 'categories'));
    }

    private function getProductIcon($kategori)
    {
        $icons = [
            'Drinks' => 'fa-wine-glass',
            'Main Course' => 'fa-utensils',
            'Snack' => 'fa-cookie',
            'Dessert' => 'fa-cake-candles'
        ];
        return $icons[$kategori] ?? 'fa-box';
    }

    public function index($kategori = null)
    {
        if ($kategori) {
            $produk = Produk::where('Kategori', $kategori)->get();
        } else {
            $produk = Produk::all();
            $kategori = null;
        }

        // Calculate sales percentage for each category today
        $today = Carbon::today();
        
        $totalSalestoday = DetailPenjualan::whereHas('penjualan', function($q) use ($today) {
            $q->whereDate('created_at', $today);
        })->sum('JumlahProduk');

        $drinksSales = DetailPenjualan::whereHas('penjualan', function($q) use ($today) {
            $q->whereDate('created_at', $today);
        })->whereHas('produk', function($q) {
            $q->where('Kategori', 'Drinks');
        })->sum('JumlahProduk');

        $mainCourseSales = DetailPenjualan::whereHas('penjualan', function($q) use ($today) {
            $q->whereDate('created_at', $today);
        })->whereHas('produk', function($q) {
            $q->where('Kategori', 'Main Course');
        })->sum('JumlahProduk');

        $snackSales = DetailPenjualan::whereHas('penjualan', function($q) use ($today) {
            $q->whereDate('created_at', $today);
        })->whereHas('produk', function($q) {
            $q->where('Kategori', 'Snack');
        })->sum('JumlahProduk');

        $dessertSales = DetailPenjualan::whereHas('penjualan', function($q) use ($today) {
            $q->whereDate('created_at', $today);
        })->whereHas('produk', function($q) {
            $q->where('Kategori', 'Dessert');
        })->sum('JumlahProduk');

        // Calculate percentages
        $drinksPercentage = $totalSalestoday > 0 ? round(($drinksSales / $totalSalestoday) * 100) : 0;
        $mainCoursePercentage = $totalSalestoday > 0 ? round(($mainCourseSales / $totalSalestoday) * 100) : 0;
        $snackPercentage = $totalSalestoday > 0 ? round(($snackSales / $totalSalestoday) * 100) : 0;
        $dessertPercentage = $totalSalestoday > 0 ? round(($dessertSales / $totalSalestoday) * 100) : 0;

        $salesData = compact('drinksPercentage', 'mainCoursePercentage', 'snackPercentage', 'dessertPercentage', 'drinksSales', 'mainCourseSales', 'snackSales', 'dessertSales');

        return view('produk.index', compact('produk', 'kategori', 'salesData'));
    }

    public function kategori($kategori, Request $request)
    {
        $search = $request->get('search');
        $query = Produk::where('Kategori', $kategori);

        if ($search) {
            $query->where('NamaProduk', 'like', '%' . $search . '%');
        }

        $produk = $query->get();

        // Tambah informasi penjualan hari ini untuk setiap produk
        $today = Carbon::today();
        foreach ($produk as $item) {
            $item->penjualan_hari_ini = DetailPenjualan::whereHas('penjualan', function($q) use ($today) {
                $q->whereDate('created_at', $today);
            })->where('ProdukID', $item->ProdukID)->sum('JumlahProduk');
        }

        return view('produk.kategori', compact('produk', 'kategori', 'search'));
    }

    public function create()
    {
        return view('produk.create');
    }

    public function store(Request $request)
    {
        $mode = $request->get('mode', 'existing');

        if ($mode === 'new') {
            // Tambah produk baru
            $validated = $request->validate([
                'NamaProdukBaru' => 'required|string|max:255',
                'KategoriBaru' => 'required|string|in:Drinks,Main Course,Snack,Dessert',
                'HargaBaru' => 'required|numeric|min:0',
                'Stok' => 'required|integer|min:0',
                'GambarBaru' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            // Handle file upload
            $gambarPath = null;
            if ($request->hasFile('GambarBaru')) {
                $file = $request->file('GambarBaru');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('img/produk'), $filename);
                $gambarPath = 'img/produk/' . $filename;
            }

            // Cek duplikasi
            $produkExist = Produk::where('NamaProduk', $validated['NamaProdukBaru'])->first();
            if ($produkExist) {
                // Update stok jika sudah ada
                $produkExist->Stok += $validated['Stok'];
                if ($gambarPath) {
                    $produkExist->Gambar = $gambarPath;
                }
                $produkExist->save();
            } else {
                // Buat produk baru
                Produk::create([
                    'NamaProduk' => $validated['NamaProdukBaru'],
                    'Kategori' => $validated['KategoriBaru'],
                    'Harga' => $validated['HargaBaru'],
                    'Stok' => $validated['Stok'],
                    'Gambar' => $gambarPath,
                ]);
            }
        } else {
            // Update produk existing
            $validated = $request->validate([
                'NamaProduk' => 'required|string|max:255',
                'Kategori' => 'required|string|in:Drinks,Main Course,Snack,Dessert',
                'Harga' => 'required|numeric|min:0',
                'Stok' => 'required|integer|min:0',
                'Gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            // Handle file upload
            if ($request->hasFile('Gambar')) {
                $file = $request->file('Gambar');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('img/produk'), $filename);
                $validated['Gambar'] = 'img/produk/' . $filename;
            }

            // Cek apakah produk dengan nama yang sama sudah ada
            $produkExist = Produk::where('NamaProduk', $validated['NamaProduk'])->first();

            if ($produkExist) {
                // Jika ada, tambah stok
                $produkExist->Stok += $validated['Stok'];
                if (isset($validated['Gambar'])) {
                    $produkExist->Gambar = $validated['Gambar'];
                }
                $produkExist->save();
                return redirect()->route('produk.index')->with('success', 'Stok produk berhasil ditambahkan');
            } else {
                // Jika tidak ada, buat produk baru
                Produk::create($validated);
                return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan');
            }
        }

        return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan/diupdate');
    }

    public function edit(Produk $produk)
    {
        return view('produk.edit', compact('produk'));
    }

    public function update(Request $request, Produk $produk)
    {
        $validated = $request->validate([
            'NamaProduk' => 'required|string|max:255',
            'Kategori' => 'required|string|in:Drinks,Main Course,Snack,Dessert',
            'Harga' => 'required|numeric|min:0',
            'Stok' => 'required|integer|min:0',
            'Gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle image upload
        if ($request->hasFile('Gambar')) {
            // Delete old image if exists
            if ($produk->Gambar && File::exists(public_path($produk->Gambar))) {
                File::delete(public_path($produk->Gambar));
            }

            // Store new image in public folder
            $file = $request->file('Gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->move(public_path('img/produk'), $filename);
            $validated['Gambar'] = 'img/produk/' . $filename;
        }

        $produk->update($validated);

        return redirect()->route('stok.index')->with('success', 'Produk berhasil diperbarui');
    }

    public function destroy(Produk $produk)
    {
        // Hapus semua detail penjualan yang mereferensikan produk ini
        DetailPenjualan::where('ProdukID', $produk->ProdukID)->delete();
        
        // Baru hapus produk
        $produk->delete();
        return redirect()->route('stok.index')->with('success', 'Produk berhasil dihapus');
    }

    public function cleanupDuplicates()
    {
        // Cari duplikasi
        $duplicates = Produk::select('NamaProduk')
            ->groupBy('NamaProduk')
            ->havingRaw('COUNT(*) > 1')
            ->pluck('NamaProduk');

        if ($duplicates->isEmpty()) {
            return back()->with('success', '✓ Tidak ada data duplikat!');
        }

        $deletedCount = 0;
        foreach ($duplicates as $nama) {
            $records = Produk::where('NamaProduk', $nama)
                ->orderBy('created_at', 'asc')
                ->get();

            // Simpan yang pertama, hapus sisanya
            foreach ($records->skip(1) as $record) {
                $record->delete();
                $deletedCount++;
            }
        }

        return back()->with('success', "✓ Berhasil menghapus {$deletedCount} data duplikat!");
    }

    public function getDailySalesData()
    {
        // Get last 7 days of sales data
        $salesData = [];
        $labels = [];

        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::today()->subDays($i);
            $dayName = $date->format('D'); // Mon, Tue, etc
            $labels[] = $dayName;

            $sales = DetailPenjualan::whereHas('penjualan', function($q) use ($date) {
                $q->whereDate('created_at', $date);
            })->sum('JumlahProduk');

            $salesData[] = $sales;
        }

        $totalSales = array_sum($salesData);
        $avgSales = $totalSales > 0 ? round($totalSales / 7) : 0;
        
        // Calculate percentage increase if we have yesterday's data
        $todaySales = DetailPenjualan::whereHas('penjualan', function($q) {
            $q->whereDate('created_at', Carbon::today());
        })->sum('JumlahProduk');

        $yesterdaySales = DetailPenjualan::whereHas('penjualan', function($q) {
            $q->whereDate('created_at', Carbon::yesterday());
        })->sum('JumlahProduk');

        $percentageIncrease = 0;
        if ($yesterdaySales > 0) {
            $percentageIncrease = round((($todaySales - $yesterdaySales) / $yesterdaySales) * 100);
        }

        return response()->json([
            'labels' => $labels,
            'data' => $salesData,
            'totalSales' => $totalSales,
            'avgSales' => $avgSales,
            'percentageIncrease' => $percentageIncrease,
            'todaySales' => $todaySales
        ]);
    }

    public function getPetugasDailySalesData()
    {
        // Get last 7 days of sales data for current petugas
        $salesData = [];
        $labels = [];

        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::today()->subDays($i);
            $dayName = $date->format('D'); // Mon, Tue, etc
            $labels[] = $dayName;

            $sales = \App\Models\Penjualan::whereDate('created_at', $date)->sum('TotalHarga');

            $salesData[] = $sales;
        }

        $totalSales = array_sum($salesData);
        $avgSales = $totalSales > 0 ? round($totalSales / 7) : 0;
        
        // Calculate percentage increase if we have yesterday's data
        $todaySales = \App\Models\Penjualan::whereDate('created_at', Carbon::today())->sum('TotalHarga');

        $yesterdaySales = \App\Models\Penjualan::whereDate('created_at', Carbon::yesterday())->sum('TotalHarga');

        $percentageIncrease = 0;
        if ($yesterdaySales > 0) {
            $percentageIncrease = round((($todaySales - $yesterdaySales) / $yesterdaySales) * 100);
        } elseif ($todaySales > 0) {
            $percentageIncrease = 100;
        }

        return response()->json([
            'labels' => $labels,
            'data' => $salesData,
            'totalSales' => $totalSales,
            'avgSales' => $avgSales,
            'percentageIncrease' => $percentageIncrease,
            'todaySales' => $todaySales
        ]);
    }

    public function getTodayTransactions()
    {
        // Get today's transactions
        $today = Carbon::today();
        $transaksi = \App\Models\Penjualan::whereDate('created_at', $today)
            ->limit(5)
            ->orderByDesc('created_at')
            ->get();

        $data = $transaksi->map(function($item, $key) {
            return [
                'no' => $key + 1,
                'tanggal' => $item->TanggalPenjualan,
                'pelanggan' => $item->pelanggan->NamaPelanggan,
                'total' => 'Rp ' . number_format($item->TotalHarga, 0, ',', '.'),
                'id' => $item->PenjualanID,
            ];
        });

        return response()->json([
            'transaksi' => $data,
            'total' => count($data)
        ]);
    }

    public function getPetugasStatsData()
    {
        $today = Carbon::today();
        
        // Total penjualan hari ini
        $totalPenjualanHariIni = DetailPenjualan::whereHas('penjualan', function($q) use ($today) {
            $q->whereDate('created_at', $today);
        })->sum('Subtotal');

        // Jumlah transaksi hari ini
        $jumlahTransaksiHariIni = DetailPenjualan::whereHas('penjualan', function($q) use ($today) {
            $q->whereDate('created_at', $today);
        })->distinct('PenjualanID')->count('PenjualanID');

        // Produk terlaris hari ini
        $produkTerlaris = DetailPenjualan::join('produk', 'detailpenjualan.ProdukID', '=', 'produk.ProdukID')
            ->join('penjualan', 'detailpenjualan.PenjualanID', '=', 'penjualan.PenjualanID')
            ->whereDate('penjualan.created_at', $today)
            ->selectRaw('detailpenjualan.ProdukID, produk.NamaProduk, SUM(detailpenjualan.JumlahProduk) as total_terjual')
            ->groupBy('detailpenjualan.ProdukID', 'produk.NamaProduk')
            ->orderByDesc('total_terjual')
            ->first();

        return response()->json([
            'totalPenjualan' => 'Rp ' . number_format($totalPenjualanHariIni, 0, ',', '.'),
            'jumlahTransaksi' => $jumlahTransaksiHariIni . ' transaksi',
            'produkTerlaris' => $produkTerlaris ? $produkTerlaris->NamaProduk : '-',
            'produkTerjual' => $produkTerlaris ? $produkTerlaris->total_terjual . ' item terjual' : 'Tidak ada penjualan'
        ]);
    }

    public function updateProductImages()
    {
        // Mapping nama produk dengan gambar - CASE SENSITIVE!
        $imageMapping = [
            // Drinks
            'Espresso' => 'assets/img/Espresso.jpeg',
            'Americano' => 'assets/img/Americano.jpeg',
            'Cappucino' => 'assets/img/Capuchino.jpeg',
            'Cappuccino' => 'assets/img/Capuchino.jpeg',
            'Latte' => 'assets/img/Latte.jpeg',
            'Macchiato' => 'assets/img/Macchiato.jpeg',
            'Mocha' => 'assets/img/Mocha.jpeg',
            'Flat White' => 'assets/img/Flat White.jpeg',
            'Iced Coffee' => 'assets/img/Iced Coffee.jpeg',
            'Ice Pure Matcha' => 'assets/img/Ice Pure Matcha.jpeg',
            'Iced Pure Matcha' => 'assets/img/Ice Pure Matcha.jpeg',
            'Matcha Latte' => 'assets/img/Matcha Latte.jpeg',
            'Caramel Latte' => 'assets/img/Caramel Latte.jpeg',
            'Affogato' => 'assets/img/Affogato.jpeg',
            
            // Main Course
            'Nasi Goreng Spesial' => 'assets/img/Nasi Goreng Spesial.jpeg',
            'Mie Goreng Kampung' => 'assets/img/Mie Goreng Kampung.jpeg',
            'Ayam Goreng Kampung' => 'assets/img/Ayam Goreng Kampung.jpeg',
            'Ayam Goreng Crispy' => 'assets/img/Ayam Goreng Kampung.jpeg',
            'Steak Daging Sapi' => 'assets/img/Steak Daging Sapi.jpeg',
            'Salmon Grilled' => 'assets/img/Salmon Grilled.jpeg',
            'Pasta Carbonara' => 'assets/img/Pasta Carbonara.jpeg',
            
            // Snack
            'Chicken Wings' => 'assets/img/Chicken Wings.jpeg',
            'Onion Rings' => 'assets/img/Onion Rings.jpeg',
            'French Fries' => 'assets/img/French Fries.jpeg',
            'Fish & Chips' => 'assets/img/Fish & Chips.jpeg',
            'Calamari Goreng' => 'assets/img/Calamari Goreng.jpeg',
            'Mozzarella Stick' => 'assets/img/Mozzarella Stick.jpeg',
            'Chicken Nassvile' => 'assets/img/Chicken Nassvile.jpeg',
            'Chicken Nashville' => 'assets/img/Chicken Nashville.jpeg',
            
            // Dessert
            'Chocolate Cake' => 'assets/img/Chocolate Cake.jpeg',
            'Cheesecake' => 'assets/img/Cheese Cake.jpeg',
            'Cheese Cake' => 'assets/img/Cheese Cake.jpeg',
            'Tiramisu' => 'assets/img/Tiramisu.jpeg',
            'Ice Cream Sunday' => 'assets/img/Ice Cream Sunday.jpeg',
            'Ice Cream Sundae' => 'assets/img/Ice Cream Sunday.jpeg',
            'Brownies' => 'assets/img/Brownies.jpeg',
            'Fruit Salad' => 'assets/img/Fruit Salad.jpeg',
            'Strawberry Mochi Donut' => 'assets/img/Strawberry Mochi Donut.jpeg',
        ];

        $updated = 0;
        $skipped = 0;
        $results = [];
        
        $produk = Produk::all();

        foreach ($produk as $item) {
            $namaAsli = $item->NamaProduk;
            
            // Cek apakah ada mapping untuk produk ini
            if (isset($imageMapping[$namaAsli])) {
                $imagePath = $imageMapping[$namaAsli];
                $item->Gambar = $imagePath;
                $item->save();
                $results[] = "✓ Updated: {$namaAsli} -> {$imagePath}";
                $updated++;
            } else {
                if ($item->Gambar) {
                    $results[] = "⊘ Skipped: {$namaAsli} (sudah ada: {$item->Gambar})";
                    $skipped++;
                } else {
                    $results[] = "✗ Not found: {$namaAsli}";
                }
            }
        }

        return view('update-images-result', [
            'results' => $results,
            'updated' => $updated,
            'skipped' => $skipped
        ]);
    }

    public function debugProducts()
    {
        $produk = Produk::all();
        $debug = [];
        
        foreach ($produk as $item) {
            $debug[] = [
                'id' => $item->ProdukID,
                'nama' => $item->NamaProduk,
                'gambar' => $item->Gambar,
                'kategori' => $item->Kategori,
                'url' => $item->Gambar ? asset($item->Gambar) : null,
                'file_exists' => $item->Gambar ? file_exists(public_path($item->Gambar)) : false
            ];
        }
        
        return view('debug-products', ['debug' => $debug]);
    }

    /**
     * Upload gambar ke folder img
     */
    public function uploadGambar(Request $request)
    {
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if (!$request->hasFile('gambar')) {
            return response()->json([
                'success' => false,
                'message' => 'Tidak ada file yang diupload'
            ], 400);
        }

        try {
            $file = $request->file('gambar');
            
            // Generate nama file unik
            $filename = time() . '_' . $file->getClientOriginalName();
            
            // Pastikan folder img/produk ada
            $produkPath = public_path('img/produk');
            if (!File::isDirectory($produkPath)) {
                File::makeDirectory($produkPath, 0755, true, true);
            }
            
            // Simpan file ke folder img/produk
            $file->move($produkPath, $filename);
            
            // Return path yang bisa diakses
            $imagePath = 'img/produk/' . $filename;
            
            return response()->json([
                'success' => true,
                'message' => 'Gambar berhasil diupload',
                'gambar_path' => $imagePath,
                'gambar_url' => asset($imagePath)
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengupload gambar: ' . $e->getMessage()
            ], 500);
        }
    }
}
