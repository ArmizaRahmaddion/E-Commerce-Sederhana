<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tbmutasi;
use App\Models\tborder;

class UserMutasiController extends Controller
{
    public function index()
    {
        $userId = auth()->id();
        $mutasi = tbmutasi::where('id_user', $userId)->get();
        return view('layoutuser.orderstatus', compact('mutasi'));
    }

    public function status()
    {
        $userId = auth()->id();
        $orders = tborder::where('id_user', $userId)->get();
        return view('layoutuser.orderstatus', compact('orders'));
    }
}