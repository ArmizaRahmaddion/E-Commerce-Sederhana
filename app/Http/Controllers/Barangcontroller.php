<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\tbproduk;

class Barangcontroller extends Controller
{
    public function index()
    {
        return view('barang.list');
    }

    public function create()
    {
        return view('barang.input');
    }

    public function store(Request $r)
    {
        $r->validate([
            'kode' => 'required|unique:tbproduk',
            'nama' => 'required',
            'id_satuan' => 'nullable',
            'foto' => 'nullable|image|mimes:png,jpg,jpeg,gif|max:2048'
        ]);

        $foto = $r->file('foto');
        $namaFile = $foto->getClientOriginalName();
        $foto->move(public_path('image'), $namaFile);

        // Menghitung saldo_akhir dan harga_modal
        $saldo_akhir = $r->saldo_awal;
        $harga_modal = $r->harga_beli_akhir * $r->saldo_awal;
        // Menghitung harga_jual, misalnya harga jual adalah (harga beli akhir + (harga beli akhir * 10%))
        $harga_jual = $r->harga_beli_akhir + ($r->harga_beli_akhir * 0.1); // Harga jual = (harga beli akhir + 10% dari harga beli akhir)

        $x = array(
            'kode' => $r->kode,
            'nama' => $r->nama,
            'saldo_awal' => $r->saldo_awal,
            'harga_beli_akhir' => $r->harga_beli_akhir,
            'harga_jual' => $harga_jual,
            'tglexp' => $r->tglexp,
            'harga_modal' => $harga_modal,
            'foto' => $namaFile,
            'desc' => $r->desc,
            'pajang' => $r->pajang,
            'saldo_akhir' => $saldo_akhir,

            'id_satuan' => $r->id_satuan,
            'id_kategori' => $r->id_kategori,
            'id_pemasok' => $r->id_pemasok,
        );

        $rec = DB::table('tbproduk')
            ->where('kode', $r->kode)
            ->first();
        if ($rec == null) {
            DB::table('tbproduk')->insertGetId($x);
        } else {;
        }
        return view('barang.list');
    }

    public function show($id)
    {
        return view('barang.edit')
            ->with('id', $id);
    }

    public function edit()
    {
        return view('barang.edit');
    }

    public function update(Request $r, $id)
    {
        $stok = DB::table('tbproduk')->where('id', $id)->first();

        if (!$stok) {
            return redirect()->route('barang.list')->with('error', 'Data tidak ditemukan.');
        }

        // Mengunggah foto baru
        $foto = $r->file('foto');
        $namaFile = $stok->foto;

        if ($foto) {
            // Menghapus foto lama jika ada
            if (file_exists(public_path('image/' . $namaFile))) {
                unlink(public_path('image/' . $namaFile));
            }

            // Membuat nama file baru dengan timestamp untuk memastikan keunikan
            $namaFile = time() . '_' . $foto->getClientOriginalName();
            $foto->move(public_path('image'), $namaFile);
        }

        // Memperbarui data barang dalam database
        DB::table('tbproduk')
            ->where('id', $id)
            ->update([
                'kode' => $r->kode,
                'nama' => $r->nama,
                'saldo_awal' => $r->saldo_awal,
                'harga_beli_akhir' => $r->harga_beli_akhir,
                'harga_jual' => $r->harga_jual,
                'tglexp' => $r->tglexp,
                'harga_modal' => $r->harga_modal,
                'foto' => $namaFile,
                'desc' => $r->desc,
                'pajang' => $r->pajang,
                'saldo_akhir' => $r->saldo_akhir,
                'id_satuan' => $r->id_satuan,
                'id_kategori' => $r->id_kategori,
                'id_pemasok' => $r->id_pemasok,
            ]);

        // Mengarahkan pengguna kembali ke halaman daftar barang setelah pembaruan berhasil
        return view('barang.list');
    }

    public function destroy(Request $r)
    {
        DB::table('tbproduk')
            ->where('id', $r->id)
            ->delete();

        return view('barang.list')
            ->with('judul', '');
    }
}