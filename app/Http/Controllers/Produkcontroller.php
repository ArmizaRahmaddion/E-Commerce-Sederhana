<?php

namespace App\Http\Controllers;

use App\Models\tbproduk;
use App\Models\tbkategori;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $kategoris = tbkategori::all();
        $produks = tbproduk::all();
        

        return view('layoutuser.index', compact('kategoris', 'produks'));
    }

    public function filterByKategori($kategori_id)
    {
        $kategoris = tbkategori::all();
        $produks = tbproduk::where('id_kategori', $kategori_id)->get();
        $selectedKategori = tbkategori::find($kategori_id);

        return view('layoutuser.index', compact('kategoris', 'produks', 'selectedKategori'));
    }
}