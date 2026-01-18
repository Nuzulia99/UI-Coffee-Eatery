<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';
    protected $primaryKey = 'ProdukID';
    public $timestamps = true;

    protected $fillable = [
        'NamaProduk',
        'Gambar',
        'Kategori',
        'Harga',
        'Stok',
    ];

    public function detailPenjualan()
    {
        return $this->hasMany(DetailPenjualan::class, 'ProdukID', 'ProdukID');
    }
}
