<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbpemasok extends Model
{
    use HasFactory;

    protected $table = 'tbpemasok';
    protected $fillable = ['id', 'nama'];

    public function produk()
    {
        return $this->hasMany(tbproduk::class, 'id_pemasok',);
    }
}