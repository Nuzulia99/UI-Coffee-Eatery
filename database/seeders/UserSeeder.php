<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user
        User::create([
            'name' => 'Admin Kasir',
            'username' => 'admin',
            'email' => 'admin@kasir.com',
            'level' => 'administrator',
            'password' => bcrypt('admin123'),
            'email_verified_at' => now(),
        ]);

        // Create petugas user
        User::create([
            'name' => 'Petugas Kasir',
            'username' => 'petugas',
            'email' => 'petugas@kasir.com',
            'level' => 'petugas',
            'password' => bcrypt('petugas123'),
            'email_verified_at' => now(),
        ]);
    }
}
