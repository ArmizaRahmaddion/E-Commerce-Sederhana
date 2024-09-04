<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tbcart extends Model
{
    protected $table = 'tbcart'; // Sesuaikan dengan nama tabel di database

    protected $fillable = [
        'id_user',
        'id_barang',
        'jumlah_pesan',
        'jumlah_harga',
        'foto',
        // Tambahkan field lain yang diperlukan
    ];

    public function tbproduk()
    {
        return $this->belongsTo(tbproduk::class, 'id_barang', 'id');
    }
}