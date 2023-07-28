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
        Schema::create('bangluong', function (Blueprint $table) {
            $table->increments('id_bangluong');
            $table->string('thang', 6);
            $table->integer('luongdutinh');
            $table->integer('luongthucte');
        });

        Schema::table('bangluong', function ($table) {
            $table->integer('id')->unsigned();
        
            $table->foreign('id')->references('id')->on('nhanvien');    
        });

        Schema::table('bangluong', function ($table) {
            $table->integer('id_ctl')->unsigned();
        
            $table->foreign('id_ctl')->references('id_ctl')->on('congthuc_luong');    
        });

        Schema::table('bangluong', function ($table) {
            $table->integer('id_ungluong')->unsigned();
        
            $table->foreign('id_ungluong')->references('id_ungluong')->on('ungluong');    
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
