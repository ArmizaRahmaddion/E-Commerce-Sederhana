<?php

namespace App\Models;

use App\Models\User;
use App\Models\tbproduk;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class tbpesanan extends Model
{
    use HasFactory;

    protected $table = 'tbpesanan';
    protected $fillable = ['id', 'tanggal', 'jumlah_pesan', 'jumlah_harga', 'status', 'id_user', 'id_barang'];
    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    public function tbproduk(): BelongsTo
    {
        return $this->belongsTo(tbproduk::class, 'id_barang');
    }
    public function tborder(): HasMany
    {
        return $this->hasMany(tborder::class, 'id_pesanan', 'id');
    }
}
