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
        Schema::create('QTPT', function (Blueprint $table) {
            $table->increments('id_qtpt');
            $table->integer('trinhdohocvan');
            $table->string('bangcap', 255);
            $table->string('anhbangcap', 255);
            $table->string('chungchi', 255);
            $table->string('anhchungchi', 255);
            $table->string('thanhtich', 255);
            $table->string('anhthanhtich', 255);
            $table->string('kinhnghiemlamviec', 255);
        });

        Schema::table('QTPT', function ($table) {
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
