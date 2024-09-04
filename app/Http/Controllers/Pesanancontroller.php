<?php

namespace App\Http\Controllers;

use App\Models\tbpesanan;
use Illuminate\Http\Request;

class Pesanancontroller extends Controller
{
    public function LihatPesanan()
    {
        $products = tbpesanan::all(); // Ambil semua data pesanan
        return view('pesanan.list', compact('products'));;
    }
}