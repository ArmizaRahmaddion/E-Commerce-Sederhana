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
        Schema::table('tbrestok', function (Blueprint $table) {
            $table->decimal('harga_beli_akhir', 10, 2)->default(0)->after('jumlah');
        });
    }

    public function down()
    {
        Schema::table('tbrestok', function (Blueprint $table) {
            $table->dropColumn('harga_beli_akhir');
        });
    }
};
