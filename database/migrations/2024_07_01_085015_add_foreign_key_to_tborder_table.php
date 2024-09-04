<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToTborderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tborder', function (Blueprint $table) {
            // Pastikan kolom id_user sudah ada di tabel tborder, jika belum tambahkan dulu
            $table->unsignedBigInteger('id_pesanan');

            // Tambahkan foreign key constraint
            $table->foreign('id_pesanan')->references('id')->on('tbpesanan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tborder', function (Blueprint $table) {
            // Drop foreign key constraint
            $table->dropForeign(['id_pesanan']);
        });
    }
}