<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyTbmutasiTable extends Migration
{
    public function up()
    {
        Schema::table('tbmutasi', function (Blueprint $table) {
            $table->renameColumn('MK', 'jenis'); // Ubah nama kolom MK menjadi jenis

        });
    }

    public function down()
    {
        Schema::table('tbmutasi', function (Blueprint $table) {
            $table->renameColumn('jenis', 'MK'); // Kembalikan nama kolom jenis menjadi MK (jika rollback diperlukan)

        });
    }
}
