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
        Schema::create('tbmutasi', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->string('MK');
            $table->unsignedBigInteger('id_barang');
            $table->integer('jumlah_pesan');
            $table->decimal('jumlah_harga', 10, 2);
            $table->date('tanggal_pembelian');
            $table->date('tanggal_approved')->nullable();
            $table->string('status');
            $table->string('bukti_pembayaran')->nullable();
            $table->unsignedBigInteger('id_user');
            $table->text('keterangan')->nullable();
            $table->timestamps();

            $table->foreign('id_barang')->references('id')->on('tbproduk')->onDelete('cascade');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbmutasi');
    }
};