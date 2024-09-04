<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbrestokTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbrestok', function (Blueprint $table) {
            $table->id('id_restock');
            $table->unsignedBigInteger('id_barang');
            $table->unsignedBigInteger('id_pemasok');
            $table->integer('jumlah');
            $table->date('tanggal');
            $table->string('kode_pesanan', 50);
            $table->timestamps();

            // Foreign keys
            $table->foreign('id_barang')->references('id')->on('tbproduk')->onDelete('cascade');
            $table->foreign('id_pemasok')->references('id')->on('tbpemasok')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbrestok');
    }
}