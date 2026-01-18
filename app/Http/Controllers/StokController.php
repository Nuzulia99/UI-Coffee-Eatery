<?php

namespace App\Http\Controllers;

use App\Models\Produk;

class StokController extends Controller
{
    public function index()
    {
        $produk = Produk::all();
        return view('stok.index', compact('produk'));
    }
}
