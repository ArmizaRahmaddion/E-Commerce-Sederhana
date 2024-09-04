<?php

namespace App\Http\Controllers;


use App\Models\tbproduk;
use App\Models\tbcart;
use App\Models\tbpesanan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Carbon;

class DetailController extends Controller
{
    public function index()
    {
        // $products = tbpesanan::select('tbpesanan.*', 'tbproduk.nama as namabarang', 'tbproduk.foto as foto', 'tbproduk.harga_jual as hargajual')
        //     ->join('tbproduk', 'tbproduk.id', '=', 'tbpesanan.id_barang')
        //     ->where('tbpesanan.id_user', Auth::id())
        //     ->get();
        // $jumlah_pesanan = tbpesanan::where('id_user', Auth::id())->count();
        return view('layoutuser.detail', compact('products', 'jumlah_pesanan'));
    }

    public function show($id)
    {
        $jumlah_pesanan = tbpesanan::where('id_user', Auth::id())->count();
        return view('layoutuser.detail', compact('jumlah_pesanan'))->with('id', $id);
    }

    public function store(Request $request)
    {
        // Periksa apakah pengguna telah terotentikasi
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Anda harus login terlebih dahulu.');
        }

        // Validasi input
        $request->validate([
            'id_barang' => 'required',
            'jumlah_pesan' => 'required|integer|min:1',
        ]);

        // Ambil informasi barang dari tbproduk
        $barang = tbproduk::find($request->id_barang);
        if (!$barang) {
            return redirect()->back()->with('error', 'Produk tidak ditemukan.');
        }

        // Hitung jumlah harga
        $jumlah_harga = $request->jumlah_pesan * $barang->hargajual;

        // Simpan data ke dalam tbcart
        tbcart::create([
            'id_user' => Auth::user()->id,
            'id_barang' => $request->id_barang,
            'jumlah_pesan' => $request->jumlah_pesan,
            'jumlah_harga' => $jumlah_harga,
            'foto' => $request->foto ?? '', // Jika foto tidak ada, beri nilai default string kosong


        ]);
        
        Alert::success('Success', 'Item Berhasil Ditambahkan Ke Keranjang');
        return redirect('cart')->with('success', 'Item added to cart successfully.');
    }
}