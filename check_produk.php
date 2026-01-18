<?php

// Set ke dalam folder project
chdir('c:\laragon\www\coffee');

// Include Laravel
require 'bootstrap/app.php';

$app = require_once 'bootstrap/app.php';
$kernel = $app->make(\Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

// Get Produk
$produk = \App\Models\Produk::all();

echo "=== DAFTAR PRODUK & GAMBAR ===\n\n";
echo str_pad("ID", 5) . str_pad("Nama", 30) . str_pad("Kategori", 15) . str_pad("Gambar", 50) . "\n";
echo str_repeat("-", 100) . "\n";

foreach ($produk as $p) {
    $nama = strlen($p->NamaProduk) > 25 ? substr($p->NamaProduk, 0, 25) . ".." : $p->NamaProduk;
    $gambar = $p->Gambar ?? "[KOSONG]";
    if (strlen($gambar) > 45) {
        $gambar = substr($gambar, 0, 45) . "..";
    }
    
    echo str_pad($p->ProdukID, 5) . str_pad($nama, 30) . str_pad($p->Kategori, 15) . $gambar . "\n";
}
