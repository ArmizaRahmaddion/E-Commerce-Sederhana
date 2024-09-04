<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPemasokIdToTbprodukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbproduk', function (Blueprint $table) {
            $table->unsignedBigInteger('id_pemasok')->nullable();

            // Menambahkan foreign key constraint
            $table->foreign('id_pemasok')->references('id')->on('tbpemasok')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbproduk', function (Blueprint $table) {
            $table->dropForeign(['id_pemasok']);
            $table->dropColumn('id_pemasok');
        });
    }
}