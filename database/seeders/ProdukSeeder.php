<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Produk;
use App\Models\Pelanggan;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create sample products
        Produk::create([
            'NamaProduk' => 'Mie Instan',
            'Harga' => 3500,
            'Stok' => 50,
        ]);

        Produk::create([
            'NamaProduk' => 'Gula Pasir',
            'Harga' => 15000,
            'Stok' => 20,
        ]);

        Produk::create([
            'NamaProduk' => 'Minyak Goreng',
            'Harga' => 30000,
            'Stok' => 10,
        ]);

        Produk::create([
            'NamaProduk' => 'Telur Ayam',
            'Harga' => 28000,
            'Stok' => 30,
        ]);

        Produk::create([
            'NamaProduk' => 'Susu UHT',
            'Harga' => 8000,
            'Stok' => 25,
        ]);

        // Create sample customers
        Pelanggan::create([
            'NamaPelanggan' => 'Ibu Siti',
            'Alamat' => 'Jl. Merdeka No. 10',
            'NomorTelepon' => '081234567890',
        ]);

        Pelanggan::create([
            'NamaPelanggan' => 'Pak Ahmad',
            'Alamat' => 'Jl. Sudirman No. 5',
            'NomorTelepon' => '081987654321',
        ]);

        Pelanggan::create([
            'NamaPelanggan' => 'Ibu Fatimah',
            'Alamat' => 'Jl. Gatot Subroto No. 20',
            'NomorTelepon' => '085567890123',
        ]);
    }
}
