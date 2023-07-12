<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('thuong_phat', function (Blueprint $table) {
            $table->increments('id_thuongphat');
            $table->integer('phanloai')->length(1);
            $table->string('noidung', 255);
            $table->integer('trangthai')->length(1);
        });

        Schema::table('thuong_phat', function ($table) {
            $table->integer('id')->unsigned();
        
            $table->foreign('id')->references('id')->on('nhanvien');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
