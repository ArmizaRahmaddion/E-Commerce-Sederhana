<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbrestok extends Model
{
    use HasFactory;

    protected $table = 'tbrestok';

    protected $fillable = [
        'id_barang',
        'id_pemasok',
        'jumlah',
        'harga_beli_akhir',
        'tanggal',
        'kode_pesanan'
    ];

    public function produk()
    {
        return $this->belongsTo(tbproduk::class, 'id_barang', 'id');
    }

    public function pemasok()
    {
        return $this->belongsTo(tbpemasok::class, 'id_pemasok', 'id');
    }

    // Boot method to generate order code
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($restok) {
            $restok->kode_pesanan = 'RESTOK OGANI-' . strtoupper(uniqid());
        });
    }
}
