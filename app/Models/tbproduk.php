<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbproduk extends Model
{
    use HasFactory;

    protected $table = 'tbproduk';
    protected $fillable = [
        'kode', 'nama', 'id_satuan', 'id_kategori', 'saldo_awal',
        'harga_beli_akhir', 'harga_jual', 'tglexp', 'harga_modal',
        'foto', 'desc', 'pajang', 'saldo_akhir', 'stok'
    ];

    public function kategori()
    {
        return $this->belongsTo(tbkategori::class, 'id_kategori', 'id');
    }
}
