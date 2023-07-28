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
        Schema::create('luong_codinh', function (Blueprint $table) {
            $table->increments('id_lcd');
            $table->integer('sotien');
        });

        Schema::table('luong_codinh', function ($table) {
            $table->integer('id')->unsigned();
        
            $table->foreign('id')->references('id')->on('nhanvien');    
        });

        Schema::table('luong_codinh', function ($table) {
            $table->integer('id_dml')->unsigned();
        
            $table->foreign('id_dml')->references('id_dml')->on('danhmuc_luong');    
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
