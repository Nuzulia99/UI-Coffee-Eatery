<?php

namespace Database\Seeders;

use App\Models\Produk;
use Illuminate\Database\Seeder;

class UpdateDrinksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Delete old drinks
        Produk::where('Kategori', 'Drinks')->delete();

        // Add new coffee drinks
        $drinks = [
            ['NamaProduk' => 'Espresso', 'Kategori' => 'Drinks', 'Harga' => 18000, 'Stok' => 20],
            ['NamaProduk' => 'Americano', 'Kategori' => 'Drinks', 'Harga' => 20000, 'Stok' => 25],
            ['NamaProduk' => 'Cappuccino', 'Kategori' => 'Drinks', 'Harga' => 28000, 'Stok' => 18],
            ['NamaProduk' => 'Latte', 'Kategori' => 'Drinks', 'Harga' => 25000, 'Stok' => 22],
            ['NamaProduk' => 'Macchiato', 'Kategori' => 'Drinks', 'Harga' => 26000, 'Stok' => 15],
            ['NamaProduk' => 'Flat White', 'Kategori' => 'Drinks', 'Harga' => 27000, 'Stok' => 17],
            ['NamaProduk' => 'Mocha', 'Kategori' => 'Drinks', 'Harga' => 30000, 'Stok' => 12],
            ['NamaProduk' => 'Affogato', 'Kategori' => 'Drinks', 'Harga' => 22000, 'Stok' => 10],
            ['NamaProduk' => 'Caramel Latte', 'Kategori' => 'Drinks', 'Harga' => 32000, 'Stok' => 19],
            ['NamaProduk' => 'Iced Coffee', 'Kategori' => 'Drinks', 'Harga' => 24000, 'Stok' => 24],
        ];

        foreach ($drinks as $drink) {
            Produk::create($drink);
        }
    }
}
