<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produk;

class UpdateProductImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Mapping nama produk dengan gambar
        $imageMapping = [
            // Drinks
            'Espresso' => 'produk/Espresso.jpeg',
            'Americano' => 'produk/Americano.jpeg',
            'Cappucino' => 'produk/Capuchino.jpeg',
            'Cappuccino' => 'produk/Capuchino.jpeg',
            'Latte' => 'produk/Latte.jpeg',
            'Macchiato' => 'produk/Macchiato.jpeg',
            'Mocha' => 'produk/Mocha.jpeg',
            'Flat White' => 'produk/Flat White.jpeg',
            'Iced Coffee' => 'produk/Iced Coffee.jpeg',
            'Ice Pure Matcha' => 'produk/Ice Pure Matcha.jpeg',
            'Matcha Latte' => 'produk/Matcha Latte.jpeg',
            'Caramel Latte' => 'produk/Caramel Latte.jpeg',
            'Affogato' => 'produk/Affogato.jpeg',
            
            // Main Course
            'Nasi Goreng Spesial' => 'produk/Nasi Goreng Spesial.jpeg',
            'Mie Goreng Kampung' => 'produk/Mie Goreng Kampung.jpeg',
            'Ayam Goreng Kampung' => 'produk/Ayam Goreng Kampung.jpeg',
            'Ayam Goreng Crispy' => 'produk/Ayam Goreng Kampung.jpeg',
            'Steak Daging Sapi' => 'produk/Steak Daging Sapi.jpeg',
            'Salmon Grilled' => 'produk/Salmon Grilled.jpeg',
            'Pasta Carbonara' => 'produk/Pasta Carbonara.jpeg',
            
            // Snack
            'Chicken Wings' => 'produk/Chicken Wings.jpeg',
            'Onion Rings' => 'produk/Onion Rings.jpeg',
            'French Fries' => 'produk/French Fries.jpeg',
            'Fish & Chips' => 'produk/Fish & Chips.jpeg',
            'Calamari Goreng' => 'produk/Calamari Goreng.jpeg',
            'Mozzarella Stick' => 'produk/Mozzarella Stick.jpeg',
            'Chicken Nassvile' => 'produk/Chicken Nashville.jpeg',
            'Chicken Nashville' => 'produk/Chicken Nashville.jpeg',
            
            // Dessert
            'Chocolate Cake' => 'produk/Chocolate Cake.jpeg',
            'Cheesecake' => 'produk/Cheese Cake.jpeg',
            'Cheese Cake' => 'produk/Cheese Cake.jpeg',
            'Tiramisu' => 'produk/Tiramisu.jpeg',
            'Ice Cream Sunday' => 'produk/Ice Cream Sunday.jpeg',
            'Ice Cream Sundae' => 'produk/Ice Cream Sunday.jpeg',
            'Brownies' => 'produk/Brownies.jpeg',
            'Fruit Salad' => 'produk/Fruit Salad.jpeg',
            'Strawberry Mochi Donut' => 'produk/Strawberry Mochi Donut.jpeg',
        ];

        $updated = 0;
        $produk = Produk::all();

        foreach ($produk as $item) {
            $namaAsli = $item->NamaProduk;
            
            // Cek apakah ada mapping untuk produk ini
            if (isset($imageMapping[$namaAsli])) {
                $imagePath = $imageMapping[$namaAsli];
                $item->Gambar = $imagePath;
                $item->save();
                echo "Updated: {$namaAsli} -> {$imagePath}\n";
                $updated++;
            }
        }

        echo "\nTotal updated: {$updated}\n";
    }
}
