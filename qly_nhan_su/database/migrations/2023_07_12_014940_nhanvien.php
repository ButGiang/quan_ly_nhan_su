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
        Schema::create('nhanvien', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ho', 255);
            $table->string('ten', 100);
            $table->date('ngaysinh');
            $table->integer('CCCD');
            $table->string('email', 100)->unique();
            $table->string('diachi', 255);
            $table->integer('sdt')->length(11);
            $table->integer('active')->length(1);
            $table->timestamps();
        });

        Schema::table('nhanvien', function ($table) {
            $table->integer('id_phongban')->unsigned();
        
            $table->foreign('id_phongban')->references('id_phongban')->on('phongban');
        });

        Schema::table('nhanvien', function ($table) {
            $table->integer('id_chuyennganh')->unsigned();
        
            $table->foreign('id_chuyennganh')->references('id_chuyennganh')->on('chuyennganh');
        });

        Schema::table('nhanvien', function ($table) {
            $table->integer('id_trinhdo')->unsigned();
        
            $table->foreign('id_trinhdo')->references('id_trinhdo')->on('trinhdo');
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
