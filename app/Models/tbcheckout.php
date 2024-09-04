<?php

namespace App\Models;

use App\Models\User;
use App\Models\tbproduk;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class tbcheckout extends Model
{
    use HasFactory;

    protected $table = 'tbcheckout';
    protected $fillable = ['id', 'tanggal', 'jumlah_pesan', 'jumlah_harga', 'status', 'id_user', 'id_barang'];
    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    public function tbproduk(): BelongsTo
    {
        return $this->belongsTo(tbproduk::class, 'id_barang');
    }
}