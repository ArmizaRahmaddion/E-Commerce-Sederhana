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
        Schema::create('tbproduk', function (Blueprint $table) {
            $table->id();
            $table->integer('kode');
            $table->string('nama', 100);
            $table->string('id_satuan', 10);
            $table->string('id_kategori', 10);
            $table->string('saldo_awal', 10);
            $table->string('harga_beli_akhir', 10);
            $table->string('harga_jual', 10);
            $table->date('tglexp');
            $table->string('harga_modal', 10);
            $table->string('foto', 100);
            $table->text('desc');
            $table->string('pajang', 100);
            $table->string('saldo_akhir', 10);
            $table->string('stok', 10);
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
        Schema::dropIfExists('tbproduk');
    }
};