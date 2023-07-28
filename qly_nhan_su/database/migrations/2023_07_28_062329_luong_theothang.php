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
        Schema::create('luong_theothang', function (Blueprint $table) {
            $table->increments('id_ltt');
            $table->string('thang', 6);
            $table->integer('sotien');
        });

        Schema::table('luong_theothang', function ($table) {
            $table->integer('id')->unsigned();
        
            $table->foreign('id')->references('id')->on('nhanvien');    
        });

        Schema::table('luong_theothang', function ($table) {
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
