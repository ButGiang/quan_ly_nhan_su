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
        Schema::create('taikhoan', function (Blueprint $table) {
            $table->increments('id_taikhoan');
            $table->string('email', 100)->unique();
            $table->string('matkhau', 100);
            $table->string('role', 100);
            $table->string('avatar', 255);
            $table->string('user_token', 50);
        });

        Schema::table('taikhoan', function ($table) {
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
