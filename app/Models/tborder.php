<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tborder extends Model
{
    use HasFactory;

    protected $fillable = [
        'jumlah_pesan',
        'tanggal',
        'jumlah_harga',
        'status',
        'id_user',
        'id_barang',
        'kode',
        'id_pesanan',
        'foto',
        // Tambahkan field lain sesuai kebutuhan
    ];

    // Jika Anda ingin menggunakan nama tabel kustom
    // protected $table = 'tborder';

    // Relasi dengan model user
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    // Relasi dengan model produk
    public function product()
    {
        return $this->belongsTo(tbproduk::class, 'id_barang');
    }
    public function pesanan()
    {
        return $this->belongsTo(tbpesanan::class, 'id_pesanan');
    }

    public function supplier()
    {
        return $this->belongsTo(tbpemasok::class, 'id_pemasok');
    }
}