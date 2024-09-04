<?php

namespace App\Http\Controllers;

use App\Models\tborder;
use App\Models\tbproduk;
use App\Models\tbmutasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function mutasi()
    {
        // Ambil data tbmutasi dengan status 'approved' atau 'returned'
        $mutasi = tbmutasi::whereIn('status', ['approved', 'returned', 'canceled', 'restocked'])
            ->orderBy('kode')
            ->get();

        // Kelompokkan data berdasarkan kode pesanan
        $groupedMutasi = [];
        foreach ($mutasi as $m) {
            if (!isset($groupedMutasi[$m->kode])) {
                $groupedMutasi[$m->kode] = [
                    'kode' => $m->kode,
                    'MK' => $m->MK,
                    'tanggal_pembelian' => $m->tanggal_pembelian,
                    'tanggal_approved' => $m->tanggal_approved,
                    'total_jumlah_pesan' => 0,
                    'total_jumlah_harga' => 0,
                    'orders' => [],
                    'keterangan' => $m->keterangan, // Tambahkan keterangan
                ];
            }

            // Hitung total jumlah pesan dan harga untuk setiap kelompok kode
            $groupedMutasi[$m->kode]['total_jumlah_pesan'] += $m->jumlah_pesan;
            $groupedMutasi[$m->kode]['total_jumlah_harga'] += $m->jumlah_harga;

            // Masukkan detail barang ke dalam setiap kelompok kode
            $groupedMutasi[$m->kode]['orders'][] = $m;
        }

        return view('mutasi.list', ['mutasi' => $groupedMutasi]);
    }





    public function orders()
    {
        $orders = tborder::all();
        // dd($orders);
        return view('pesanan.list', compact('orders'));
    }

    public function approveOrder($kode)
    {
        $orders = tborder::where('kode', $kode)->get();

        if ($orders->isEmpty()) {
            return response()->json(['message' => 'Pesanan tidak ditemukan.'], 404);
        }

        foreach ($orders as $order) {
            if ($order->status == 'pending') {
                $order->status = 'approved';
                $order->save();

                // Cek apakah sudah ada mutasi dengan kode dan id_barang yang sama
                $mutasi = tbmutasi::where('kode', $order->kode)
                    ->where('id_barang', $order->id_barang)
                    ->where('status', 'approved')
                    ->first();

                if (!$mutasi) {
                    tbmutasi::create([
                        'kode' => $order->kode,
                        'MK' => 'K', // keluar
                        'id_barang' => $order->id_barang,
                        'jumlah_pesan' => $order->jumlah_pesan,
                        'jumlah_harga' => $order->jumlah_harga,
                        'tanggal_pembelian' => $order->tanggal,
                        'tanggal_approved' => now(),
                        'status' => 'approved',
                        'bukti_pembayaran' => $order->foto,
                        'id_user' => $order->id_user,
                        'keterangan' => 'Pesanan disetujui'
                    ]);
                }
            }
        }

        alert()->success('Success', 'Pesanan Berhasil Di Approve');
        return redirect()->back();
    }




    public function cancelOrder($kode)
    {
        // Ambil semua pesanan dengan kode yang sama
        $orders = tborder::where('kode', $kode)->get();

        if ($orders->isEmpty()) {
            return response()->json(['message' => 'Pesanan tidak ditemukan.'], 404);
        }

        foreach ($orders as $order) {
            if ($order->status == 'pending' || $order->status == 'approved') {
                // Kembalikan saldo_akhir di tabel tbproduk
                $product = tbproduk::findOrFail($order->id_barang);
                $product->saldo_akhir += $order->jumlah_pesan;
                $product->save();

                // Buat mutasi untuk pembatalan pesanan
                tbmutasi::create([
                    'kode' => $order->kode,
                    'MK' => 'M', // masuk
                    'id_barang' => $order->id_barang,
                    'jumlah_pesan' => $order->jumlah_pesan,
                    'jumlah_harga' => $order->jumlah_harga,
                    'tanggal_pembelian' => $order->tanggal,
                    'tanggal_approved' => now(),
                    'status' => 'canceled',
                    'bukti_pembayaran' => $order->foto,
                    'id_user' => $order->id_user,
                    'keterangan' => 'Pesanan dibatalkan'
                ]);

                // Ubah status pesanan menjadi 'canceled'
                $order->status = 'canceled';
                $order->save();
            } else {
                return response()->json(['message' => 'Pesanan tidak dapat dibatalkan.'], 400);
            }
        }

        alert()->success('Success', 'Pesanan Berhasil Di Cancel');
        return redirect()->back();
    }






    public function returnOrder($kode)
    {
        $orders = tborder::where('kode', $kode)->get();

        if ($orders->isEmpty()) {
            return response()->json(['message' => 'Pesanan tidak ditemukan.'], 404);
        }

        foreach ($orders as $order) {
            if ($order->status == 'approved') {
                $order->status = 'returned';
                $order->save();

                $product = tbproduk::findOrFail($order->id_barang);
                $product->saldo_akhir += $order->jumlah_pesan;
                $product->save();

                // Hapus mutasi yang ada dengan kode dan id_barang yang sama
                tbmutasi::where('kode', $order->kode)
                    ->where('id_barang', $order->id_barang)
                    ->where('status', 'approved')
                    ->delete();

                tbmutasi::create([
                    'kode' => $order->kode,
                    'MK' => 'M', // masuk
                    'id_barang' => $order->id_barang,
                    'jumlah_pesan' => $order->jumlah_pesan,
                    'jumlah_harga' => $order->jumlah_harga,
                    'tanggal_pembelian' => $order->tanggal,
                    'tanggal_approved' => now(),
                    'status' => 'returned',
                    'bukti_pembayaran' => $order->foto,
                    'id_user' => $order->id_user,
                    'keterangan' => 'Pesanan dikembalikan'
                ]);
            }
        }

        alert()->success('Success', 'Pesanan Berhasil Dikembalikan');
        return redirect()->back();
    }














    public function showApprovedOrders()
    {
        // Ambil data dari tbmutasi yang statusnya 'approved'
        $approvedOrders = tbmutasi::where('status', 'approved')->get();

        // Ambil detail barang untuk setiap pesanan yang disetujui
        foreach ($approvedOrders as $order) {
            // Ambil detail barang dari tborder berdasarkan kode pesanan
            $orders = tborder::where('kode', $order->kode)->get();

            // Inisialisasi variabel total jumlah pesan dan harga
            $totalJumlahPesan = 0;
            $totalJumlahHarga = 0;

            // Loop untuk menghitung total jumlah pesan dan harga
            foreach ($orders as $item) {
                $totalJumlahPesan += $item->jumlah_pesan;
                $totalJumlahHarga += $item->jumlah_harga;
            }

            // Tambahkan data detail ke dalam objek $order
            $order->total_jumlah_pesan = $totalJumlahPesan;
            $order->total_jumlah_harga = $totalJumlahHarga;
            $order->items = $orders;
        }

        return view('mutasi.PesananDiSetujui', compact('approvedOrders'));
    }

    public function showCanceledOrders()
    {
        // Ambil data dari tbmutasi yang statusnya 'canceled'
        $canceledOrders = tbmutasi::where('status', 'canceled')->get()->groupBy('kode');

        // Ambil detail barang untuk setiap kelompok pesanan yang dibatalkan
        $groupedOrders = [];
        foreach ($canceledOrders as $kode => $orders) {
            $totalJumlahPesan = 0;
            $totalJumlahHarga = 0;

            foreach ($orders as $order) {
                $totalJumlahPesan += $order->jumlah_pesan;
                $totalJumlahHarga += $order->jumlah_harga;
            }

            $groupedOrders[$kode] = [
                'kode' => $kode,
                'total_jumlah_pesan' => $totalJumlahPesan,
                'total_jumlah_harga' => $totalJumlahHarga,
                'tanggal_pembelian' => $orders->first()->tanggal_pembelian,
                'tanggal_approved' => $orders->first()->tanggal_approved,
                'status' => $orders->first()->status,
                'bukti_pembayaran' => $orders->first()->bukti_pembayaran,
                'keterangan' => $orders->first()->keterangan,
                'items' => $orders
            ];
        }

        return view('mutasi.PesananDibatalkan', ['canceledOrders' => $groupedOrders]);
    }






    // private function generateKodePesanan()
    // {
    //     $userId = auth()->id();
    //     $dateTime = now()->format('YmdHis'); // Format tanggal yang lebih aman
    //     $uniqueNumber = strtoupper(substr(uniqid(), -4)); // Dapatkan 4 karakter unik dari uniqid()

    //     return 'OGANI' . $dateTime . '_' . $userId . $uniqueNumber;
    // }
}