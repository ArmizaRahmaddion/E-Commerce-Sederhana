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
        Schema::create('tbpesanan', function (Blueprint $table) {
            $table->id();
            $table->integer('jumlah_pesan');
            $table->date('tanggal');
            $table->integer('jumlah_harga');
            $table->string('status');
            $table->foreignId('id_user')->index()->constrained('users');
            $table->foreignId('id_barang')->index()->constrained('tbproduk');
            $table->rememberToken();
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
        Schema::dropIfExists('tbpesanan');
    }
};
