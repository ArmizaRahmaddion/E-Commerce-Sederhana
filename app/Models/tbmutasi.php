<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbmutasi extends Model
{
    use HasFactory;

    protected $table = 'tbmutasi';
    protected $fillable = [
        'kode',
        'MK',
        'id_barang',
        'jumlah_pesan',
        'jumlah_harga',
        'tanggal_pembelian',
        'tanggal_approved',
        'status',
        'bukti_pembayaran',
        'id_user',
        'keterangan'
    ];

    // Jika ada hubungan dengan model lain, definisikan di sini
    public function product()
    {
        return $this->belongsTo(tbproduk::class, 'id_barang');
    }

    public function restoks()
    {
        return $this->hasMany(tbrestok::class, 'kode', 'kode');
    }
}
