<?php

namespace App\Http\Controllers;

use App\Models\tbpesanan;
use App\Models\tbcart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class CartController extends Controller
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

        return view('layoutuser.cart', compact('products', 'jumlah_pesanan', 'subtotal'));
    }


    public function show($id)
    {
        $products = tbcart::select('tbcart.*', 'tbproduk.nama as namabarang', 'tbproduk.foto as foto', 'tbproduk.harga_jual as hargajual')
            ->join('tbproduk', 'tbproduk.id', '=', 'tbcart.id_barang')
            ->where('tbcart.id_user', Auth::id())
            ->get();
        $jumlah_pesanan = tbcart::where('id_user', Auth::id())->count();
        $subtotal = $products->sum(function ($product) {
            return $product->jumlah_pesan * $product->hargajual;
        });

        return view('layoutuser.cart', compact('products', 'jumlah_pesanan', 'subtotal'))
            ->with('id', $id);
    }

    public function updateQuantity(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $order = tbcart::findOrFail($id);
        if ($order->id_user === Auth::id()) {
            $order->jumlah_pesan = $request->quantity;
            $order->jumlah_harga = $order->jumlah_pesan * $order->tbproduk->harga_jual;
            $order->save();
        }

        // Recalculate subtotal and total after updating
        $subtotal = tbcart::where('id_user', Auth::id())->sum('jumlah_harga');
        $total = $subtotal;

        alert()->success('Success', 'Item Berhasil Di Update');
        return redirect()->back()->with([
            'success' => 'Quantity updated successfully.',
            'subtotal' => number_format($subtotal, 0, ',', '.'),
            'total' => number_format($total, 0, ',', '.')
        ]);
    }

    public function destroy($id)
    {
        $order = tbcart::findOrFail($id);
        if ($order->id_user === Auth::id()) {
            $order->delete();
            toast('Item Berhasil Dihapus', 'success');
            return redirect()->back()->with('success', 'Data berhasil dihapus.');
        }


        return redirect()->back()->withErrors(['message' => 'Unauthorized action.']);
    }

    // public function checkout(Request $request)
    // {
    //     $userId = Auth::id();
    //     $orders = tbpesanan::where('id_user', $userId)->where('status', 'pending')->get();

    //     DB::transaction(function () use ($orders) {
    //         foreach ($orders as $order) {
    //             $product = $order->tbproduk;
    //             if ($product->stok >= $order->jumlah_pesan) {
    //                 $product->stok -= $order->jumlah_pesan;
    //                 $product->save();
    //                 $order->status = 'accepted';
    //                 $order->save();
    //             } else {
    //                 // Handle insufficient stock if needed
    //             }
    //         }
    //     });

    //     return redirect()->back()->with('success', 'Checkout successful.');
    // }
}