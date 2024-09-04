<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tbpemasok;
use App\Models\tbproduk;
use App\Models\tbrestok;
use App\Models\tbmutasi;

class RestokController extends Controller
{
    public function create()
    {
        $produks = tbproduk::all();
        $pemasoks = tbpemasok::all();
        return view('Restok.input', compact('produks', 'pemasoks'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_barang.*' => 'required|exists:tbproduk,id',
            'id_pemasok.*' => 'required|exists:tbpemasok,id',
            'jumlah.*' => 'required|integer',
            'harga_beli_akhir.*' => 'required|numeric',
            'subtotal' => 'required|numeric',
            'tanggal' => 'required|date_format:Y-m-d'
        ]);

        $tanggal = $request->tanggal;

        // Generate kode pesanan sekali untuk semua item
        $kode_pesanan = 'RESTOK OGANI' . time();

        foreach ($request->id_barang as $index => $id_barang) {
            $jumlah = $request->jumlah[$index];
            $harga_beli_akhir = $request->harga_beli_akhir[$index];
            $id_pemasok = $request->id_pemasok[$index];
            $subtotal = $request->subtotal;

            // Create restock record
            $restok = tbrestok::create([
                'id_barang' => $id_barang,
                'id_pemasok' => $id_pemasok,
                'jumlah' => $jumlah,
                'tanggal' => $tanggal,
                'kode_pesanan' => $kode_pesanan,
                'harga_beli_akhir' => $harga_beli_akhir,
                'subtotal' => $subtotal
            ]);

            // Update stock in tbproduk
            $produk = tbproduk::find($id_barang);
            if ($produk) {
                // Menghitung harga modal baru
                $harga_modal_baru = ($produk->harga_beli_akhir * $produk->saldo_awal + $jumlah * $harga_beli_akhir) / ($produk->saldo_awal + $jumlah);

                // Update saldo_awal dan saldo_akhir
                $produk->saldo_awal += $jumlah;
                $produk->saldo_akhir += $jumlah;

                // Update harga beli akhir yang baru
                $produk->harga_beli_akhir = $harga_modal_baru;

                // Hitung harga jual baru
                $harga_jual_baru = $harga_modal_baru + ($harga_modal_baru * 0.1);

                // Update harga jual dan harga modal
                $produk->harga_jual = $harga_jual_baru;
                $produk->harga_modal = $harga_modal_baru;

                $produk->save();

                // Menyimpan transaksi restok ke dalam tbmutasi
                tbmutasi::create([
                    'kode' => $kode_pesanan,
                    'MK' => 'M', // Masuk
                    'id_barang' => $id_barang,
                    'jumlah_pesan' => $jumlah,
                    'jumlah_harga' => $subtotal,
                    'tanggal_pembelian' => $tanggal,
                    'tanggal_approved' => now(),
                    'status' => 'restocked',
                    'id_user' => auth()->user()->id, // Ubah sesuai dengan id user yang sesuai
                    'keterangan' => 'Restok barang dari pemasok'
                ]);
            }
        }
        alert()->success('Success', 'Restok Berhasil');
        return redirect()->back()->with('success', 'Barang berhasil di-restock dan stok telah diperbarui');
    }


    public function index()
    {
        $restoks = tbrestok::all();
        return view('Restok.list', compact('restoks'));
    }
}
