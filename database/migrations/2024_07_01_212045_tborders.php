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
        Schema::create('tborders', function (Blueprint $table) {
            $table->id();
            $table->integer('jumlah_pesan');
            $table->date('tanggal');
            $table->integer('jumlah_harga');
            $table->string('status')->default('pending');
            $table->foreignId('id_user')->constrained('users');
            $table->foreignId('id_barang')->constrained('tbproduk');
            $table->string('kode');
            $table->foreignId('id_pesanan')->nullable()->constrained('tbpesanan');
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tborders');
    }
};