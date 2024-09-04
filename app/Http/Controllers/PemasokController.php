<?php

namespace App\Http\Controllers;

use App\Models\tbpemasok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PemasokController extends Controller
{
    public function LihatPemasok()
    {
        $vendor = tbpemasok::all(); // Ambil semua data 
        return view('pemasok.list', compact('vendor'));;
    }

    public function create()
    {
        return view('pemasok.input');
    }

    public function store(Request $r)
    {
        $r->validate([
            'kode' => 'required|unique:tbpemasok',
            'nama' => 'required',
        ]);
    
        $x = array(
            'kode' => $r->kode,
            'nama' => $r->nama,
            'alamat' => $r->alamat,
            'nohp' => $r->nohp,
            'top' => $r->top,
        );
    
        $rec = DB::table('tbpemasok')
            ->where('kode', $r->kode)
            ->first();
        if ($rec == null) {
            DB::table('tbpemasok')->insertGetId($x);
        }
    
        return redirect()->route('pemasok.list');
    }
    
}