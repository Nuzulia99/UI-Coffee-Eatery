<?php
// Script untuk membersihkan duplikasi data produk
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/bootstrap/app.php';

use App\Models\Produk;
use Illuminate\Support\Facades\DB;

$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

// Ambil semua produk yang duplikat (nama sama)
$duplicates = DB::table('produk')
    ->select('NamaProduk', DB::raw('COUNT(*) as count'))
    ->groupBy('NamaProduk')
    ->having('count', '>', 1)
    ->get();

echo "Data Duplikat yang ditemukan:\n";
foreach ($duplicates as $dup) {
    echo "- " . $dup->NamaProduk . " (" . $dup->count . " data)\n";
    
    // Ambil semua record dengan nama yang sama
    $records = Produk::where('NamaProduk', $dup->NamaProduk)
        ->orderBy('Stok', 'desc')
        ->get();
    
    // Hapus semua kecuali yang pertama (dengan stok terbesar)
    $firstRecord = $records->first();
    foreach ($records->skip(1) as $record) {
        echo "  Menghapus ID: " . $record->ProdukID . " (Stok: " . $record->Stok . ")\n";
        $record->delete();
    }
    echo "  Menyimpan ID: " . $firstRecord->ProdukID . " (Stok: " . $firstRecord->Stok . ")\n";
}

echo "\nSelesai! Data duplikat sudah dihapus.\n";
