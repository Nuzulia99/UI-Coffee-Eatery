#!/usr/bin/env bash

cd "$(dirname "$0")"

php artisan tinker << 'EOF'
use App\Models\Produk;

// Cari duplikasi
$duplicates = Produk::select('NamaProduk')
    ->groupBy('NamaProduk')
    ->havingRaw('COUNT(*) > 1')
    ->pluck('NamaProduk');

echo "=== Membersihkan Data Duplikat ===\n\n";

foreach ($duplicates as $nama) {
    $records = Produk::where('NamaProduk', $nama)
        ->orderBy('created_at', 'asc')
        ->get();
    
    echo "Produk: $nama\n";
    echo "Total: " . count($records) . " data\n";
    
    // Simpan yang pertama, hapus sisanya
    $first = $records->first();
    echo "  ✓ Simpan: ID {$first->ProdukID} - Stok {$first->Stok}\n";
    
    foreach ($records->skip(1) as $record) {
        echo "  ✗ Hapus: ID {$record->ProdukID} - Stok {$record->Stok}\n";
        $record->delete();
    }
    echo "\n";
}

echo "=== Selesai! ===\n";
exit()
EOF
