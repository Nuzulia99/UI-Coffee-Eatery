<?php
// Buat folder jika belum ada
@mkdir('storage/logs', 0755, true);

// File untuk logging
$logFile = __DIR__ . '/check_product_images.log';

// Require Laravel
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/bootstrap/app.php';

use App\Models\Produk;

$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$output = "=== Check Product Images ===\n\n";

$produk = Produk::all();
foreach ($produk as $item) {
    $output .= "ID: {$item->ProdukID}, Nama: {$item->NamaProduk}, Gambar: " . ($item->Gambar ?: 'NULL') . "\n";
}

file_put_contents($logFile, $output);
echo "Log written to: " . $logFile;
?>
