<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBuktiBayarToTborderTable extends Migration
{
    public function up()
    {
        Schema::table('tborder', function (Blueprint $table) {
            $table->string('bukti_bayar')->nullable(); // Menambahkan kolom untuk bukti bayar
        });
    }

    public function down()
    {
        Schema::table('tborder', function (Blueprint $table) {
            $table->dropColumn('bukti_bayar');
        });
    }
}