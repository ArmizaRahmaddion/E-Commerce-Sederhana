<?php

namespace App\Http\Controllers;

use App\Models\tbpesanan;
use App\Models\user;
use App\Models\tbproduk;
use App\Models\tbpemasok;
use App\Models\tborder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Dashboardcontroller extends Controller
{
    public function index()
    {
        $id_user = Auth::id();
        $products = tbpesanan::where('id_user', $id_user)
            ->with('tbproduk')
            ->get();
        $jumlah_pesanan = $products->count();


        return view('layoutuser.index', compact('products', 'jumlah_pesanan'));
    }

    public function admin()
    {
        $jumlahBarang = tbproduk::count(); // Menghitung jumlah total data barang dari model tbproduk
        $jumlahUser = User::count(); // Menghitung jumlah total data user
        $jumlahPemasok = tbpemasok::count(); // Menghitung jumlah total data pemasok
        $jumlahVerifikasiPending = tborder::where('status', 'pending')->count(); // Menghitung jumlah total verifikasi pesanan yang berstatus pending

        return view('admindashboard', compact('jumlahBarang', 'jumlahUser', 'jumlahPemasok', 'jumlahVerifikasiPending'));
    }

    // public function MenampilkanDiIcon()
    // {
    //     $jumlahBarang = tbproduk::count(); // Menghitung jumlah total data barang dari model tbproduk
    //     $jumlahUser = User::count(); // Menghitung jumlah total data user
    //     $jumlahPemasok = tbpemasok::count(); // Menghitung jumlah total data pemasok
    //     $jumlahVerifikasiPending = tborder::where('status', 'pending')->count(); // Menghitung jumlah total verifikasi pesanan yang berstatus pending

    //     return view('admindashboard', compact('jumlahBarang', 'jumlahUser', 'jumlahPemasok', 'jumlahVerifikasiPending'));
    // }
}