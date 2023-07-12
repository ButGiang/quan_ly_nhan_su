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
        Schema::create('chamcong', function (Blueprint $table) {
            $table->increments('id_chamcong');
            $table->integer('nam')->length(4);
            $table->integer('thang')->length(2);
            $table->integer('ngay')->length(2);
            $table->string('noidung', 255);
            $table->float('hesoluong');
        });

        Schema::table('chamcong', function ($table) {
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