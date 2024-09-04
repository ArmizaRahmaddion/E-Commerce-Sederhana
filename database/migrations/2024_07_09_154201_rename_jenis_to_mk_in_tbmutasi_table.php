<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameJenisToMkInTbmutasiTable extends Migration
{
    public function up()
    {
        Schema::table('tbmutasi', function (Blueprint $table) {
            $table->renameColumn('jenis', 'MK');
        });
    }

    public function down()
    {
        Schema::table('tbmutasi', function (Blueprint $table) {
            $table->renameColumn('MK', 'jenis');
        });
    }
}