<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\tbcart;
use App\Models\tborder;
use App\Models\tbproduk;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;
// Import model tbproduk

class CheckoutController extends Controller
{
    public function index()
    {
        $id_user = Auth::id();
        $products = tbcart::where('id_user', $id_user)
            ->with('tbproduk')
            ->get();
        $jumlah_pesanan = $products->count();
        $subtotal = $products->sum(function ($product) {
            return $product->jumlah_pesan * $product->tbproduk->hargajual;
        });

        return view('layoutuser.checkout', compact('products', 'jumlah_pesanan', 'subtotal'));
    }

    public function checkout(Request $request)
    {
        try {
            // Ambil data dari tbcart
            $items = tbcart::where('id_user', auth()->id())->get();

            // Jika keranjang kosong, kembalikan pesan kesalahan
            if ($items->isEmpty()) {
                return response()->json(['error' => 'Keranjang Anda kosong.'], 400);
            }

            // Hasilkan kode pesanan untuk checkout ini
            $kodePesanan = $this->generateKodePesanan();

            // Mengelompokkan item berdasarkan id_barang
            $groupedItems = $items->groupBy('id_barang');

            foreach ($groupedItems as $id_barang => $group) {
                // Menggabungkan jumlah pesanan
                $totalJumlahPesan = $group->sum('jumlah_pesan');

                // Lakukan validasi jika diperlukan
                $validator = validator()->make(['id_barang' => $id_barang, 'jumlah_pesan' => $totalJumlahPesan], [
                    'id_barang' => 'required|exists:tbproduk,id',
                    'jumlah_pesan' => 'required|integer|min:1',
                ]);

                if ($validator->fails()) {
                    throw ValidationException::withMessages($validator->errors()->toArray());
                }

                // Ambil data produk berdasarkan id_barang
                $product = tbproduk::findOrFail($id_barang);

                // Cek stok produk
                if ($product->saldo_akhir < $totalJumlahPesan) {

                    alert()->error('Checkout Gagal', 'Stok produk tidak mencukupi untuk pesanan ini.');
                    return redirect()->back()->with('error', 'Stok produk tidak mencukupi untuk pesanan ini.');
                }

                // Kurangi stok produk
                $product->saldo_akhir -= $totalJumlahPesan;
                $product->save();

                // Hitung jumlah harga
                $jumlah_harga = $product->harga_jual * $totalJumlahPesan;

                // Lakukan proses checkout
                $order = new tborder();
                $order->id_barang = $id_barang;
                $order->jumlah_pesan = $totalJumlahPesan;
                $order->jumlah_harga = $jumlah_harga;
                $order->tanggal = now();
                $order->status = 'pending';
                $order->id_user = auth()->id();
                $order->kode = $kodePesanan;

                // Simpan foto bukti bayar
                if ($request->hasFile('bukti_bayar')) {
                    $file = $request->file('bukti_bayar');
                    $path = $file->store('bukti_bayar', 'public'); // Simpan di storage public
                    $order->foto = $path;
                }

                $order->save();

                // Hapus item dari cart setelah berhasil checkout
                foreach ($group as $item) {
                    $item->delete();
                }
            }

            // Redirect ke halaman checkout
            alert()->success('Success', 'Pesanan Berhasil Di Checkout');
            return redirect()->back()->with('success', 'Checkout berhasil.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat checkout: ' . $e->getMessage());
        }
    }
    private function generateKodePesanan()
    {
        $userId = Auth::id();  // Mengambil ID dari pengguna yang sedang login menggunakan Auth facade
        $dateTime = now()->format('YmdHis'); // Format tanggal yang lebih aman
        $uniqueNumber = strtoupper(substr(uniqid(), -4)); // Dapatkan 4 karakter unik dari uniqid()

        return 'OGANI' . $dateTime . '_' . $userId . $uniqueNumber;
    }
}