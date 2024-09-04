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
        Schema::create('tbpemasok', function (Blueprint $table) {
            $table->id();
            $table->string('kode', 255);
            $table->string('nama', 255);
            $table->string('alamat', 255);
            $table->string('nohp', 255);
            $table->string('top', 255);
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
        Schema::dropIfExists('tbpemasok');
    }
};