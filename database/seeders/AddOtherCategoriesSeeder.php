<?php

namespace Database\Seeders;

use App\Models\Produk;
use Illuminate\Database\Seeder;

class AddOtherCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Add Main Course items
        $mainCourses = [
            ['NamaProduk' => 'Nasi Goreng Spesial', 'Kategori' => 'Main Course', 'Harga' => 35000, 'Stok' => 30],
            ['NamaProduk' => 'Mie Goreng Kampung', 'Kategori' => 'Main Course', 'Harga' => 32000, 'Stok' => 28],
            ['NamaProduk' => 'Ayam Goreng Crispy', 'Kategori' => 'Main Course', 'Harga' => 42000, 'Stok' => 25],
            ['NamaProduk' => 'Steak Daging Sapi', 'Kategori' => 'Main Course', 'Harga' => 65000, 'Stok' => 15],
            ['NamaProduk' => 'Salmon Grilled', 'Kategori' => 'Main Course', 'Harga' => 75000, 'Stok' => 12],
            ['NamaProduk' => 'Pasta Carbonara', 'Kategori' => 'Main Course', 'Harga' => 48000, 'Stok' => 20],
        ];

        foreach ($mainCourses as $item) {
            Produk::create($item);
        }

        // Add Snack items
        $snacks = [
            ['NamaProduk' => 'Chicken Wings', 'Kategori' => 'Snack', 'Harga' => 25000, 'Stok' => 40],
            ['NamaProduk' => 'Onion Rings', 'Kategori' => 'Snack', 'Harga' => 18000, 'Stok' => 35],
            ['NamaProduk' => 'French Fries', 'Kategori' => 'Snack', 'Harga' => 20000, 'Stok' => 50],
            ['NamaProduk' => 'Fish & Chips', 'Kategori' => 'Snack', 'Harga' => 28000, 'Stok' => 22],
            ['NamaProduk' => 'Calamari Goreng', 'Kategori' => 'Snack', 'Harga' => 32000, 'Stok' => 18],
            ['NamaProduk' => 'Mozzarella Stick', 'Kategori' => 'Snack', 'Harga' => 24000, 'Stok' => 30],
        ];

        foreach ($snacks as $item) {
            Produk::create($item);
        }

        // Add Dessert items
        $desserts = [
            ['NamaProduk' => 'Chocolate Cake', 'Kategori' => 'Dessert', 'Harga' => 28000, 'Stok' => 20],
            ['NamaProduk' => 'Cheesecake', 'Kategori' => 'Dessert', 'Harga' => 32000, 'Stok' => 15],
            ['NamaProduk' => 'Tiramisu', 'Kategori' => 'Dessert', 'Harga' => 30000, 'Stok' => 18],
            ['NamaProduk' => 'Ice Cream Sundae', 'Kategori' => 'Dessert', 'Harga' => 22000, 'Stok' => 40],
            ['NamaProduk' => 'Brownies', 'Kategori' => 'Dessert', 'Harga' => 18000, 'Stok' => 50],
            ['NamaProduk' => 'Fruit Salad', 'Kategori' => 'Dessert', 'Harga' => 25000, 'Stok' => 25],
        ];

        foreach ($desserts as $item) {
            Produk::create($item);
        }
    }
}
