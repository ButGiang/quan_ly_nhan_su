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
        Schema::create('phucap', function (Blueprint $table) {
            $table->increments('id_phucap');
            $table->string('ten');
            $table->string('noidung', 255);
            $table->date('ngay');
        });

        Schema::table('phucap', function ($table) {
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
