<?php
/**
 * Direct database update script
 */

// Ensure directory exists
@mkdir(__DIR__ . '/storage/logs', 0755, true);

// Bootstrap Laravel
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/bootstrap/app.php';

use App\Models\Produk;
use Illuminate\Support\Facades\DB;

$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

// Mapping nama produk dengan gambar
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

echo "=== Update Produk Gambar ===\n\n";

$updated = 0;
$skipped = 0;

$produk = Produk::all();

foreach ($produk as $item) {
    $namaAsli = $item->NamaProduk;
    
    // Cek apakah ada mapping untuk produk ini
    if (isset($imageMapping[$namaAsli])) {
        $imagePath = $imageMapping[$namaAsli];
        $item->Gambar = $imagePath;
        $item->save();
        echo "✓ Updated: {$namaAsli} -> {$imagePath}\n";
        $updated++;
    } else {
        echo "✗ Not found: {$namaAsli}\n";
        $skipped++;
    }
}

echo "\n=== Hasil ===\n";
echo "Updated: {$updated}\n";
echo "Skipped: {$skipped}\n";
echo "Total: " . ($updated + $skipped) . "\n";
?>
