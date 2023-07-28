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
        Schema::create('ungluong', function (Blueprint $table) {
            $table->increments('id_ungluong');
            $table->integer('sotien');
            $table->date('ngay');
            $table->string('ghichu', 255);
            $table->integer('trangthai')->length(1);
        });

        Schema::table('ungluong', function ($table) {
            $table->integer('id_nguoiduyet')->unsigned();
        
            $table->foreign('id_nguoiduyet')->references('id')->on('nhanvien');    
        });

        Schema::table('ungluong', function ($table) {
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
