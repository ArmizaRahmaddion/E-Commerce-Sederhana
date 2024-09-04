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
        Schema::create('tbjual', function (Blueprint $table) {
            $table->id();
            $table->string('no_bukti', 191); // Sesuaikan panjang maksimum
            $table->unsignedBigInteger('id_pelangggan'); // Sesuaikan tipe data
            $table->date('tanggal');
            $table->text('keterangan'); // Ubah 'ket' menjadi 'keterangan' untuk lebih deskriptif
            $table->timestamps();

            // // Tambahkan indeks jika diperlukan
            // $table->foreign('pelanggan_id')->references('id')->on('pelanggans')->onDelete('cascade');
            // // Tambahkan indeks jika diperlukan
            // // $table->index('tanggal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penjualan'); // Ganti nama tabel sesuai dengan yang telah diperbaiki
    }
};