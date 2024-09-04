<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbcart', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->constrained('users')->onDelete('cascade');
            $table->foreignId('id_barang')->constrained('tbproduk')->onDelete('cascade');
            $table->integer('jumlah_pesan');
            $table->integer('jumlah_harga');
            $table->integer('foto');
            $table->integer('quantity');
            // Tambahkan field lain yang diperlukan
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tbcart');
    }
};