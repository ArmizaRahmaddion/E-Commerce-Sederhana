<?php

namespace App\Http\Controllers;

use App\Models\tbkategori;
use App\Models\tbproduk;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $categori = tbkategori::all();
        $produk = tbproduk::all(); // Fetch all products

        return view('Layoutuser.shop', compact('categori', 'produk'));
    }

    public function kategori_produk($kategoriId)
    {
        $categori = tbkategori::all();
        $kategori = tbkategori::find($kategoriId);
        $produk = $kategori ? $kategori->produk()->get() : tbproduk::all(); // Fetch products by category or all if not found

        return view('Layoutuser.shop', compact('categori', 'produk'));
    }
}
