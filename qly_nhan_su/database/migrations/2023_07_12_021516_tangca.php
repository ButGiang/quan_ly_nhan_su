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
        Schema::create('tangca', function (Blueprint $table) {
            $table->increments('id_tangca');
            $table->integer('nam')->length(4);
            $table->integer('thang')->length(2);
            $table->integer('ngay')->length(2);
            $table->float('sogiotangca');
        });

        Schema::table('tangca', function ($table) {
            $table->integer('id')->unsigned();
        
            $table->foreign('id')->references('id')->on('nhanvien');
        });

        Schema::table('tangca', function ($table) {
            $table->integer('id_loaica')->unsigned();
        
            $table->foreign('id_loaica')->references('id_loaica')->on('chitiet_tangca');
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
