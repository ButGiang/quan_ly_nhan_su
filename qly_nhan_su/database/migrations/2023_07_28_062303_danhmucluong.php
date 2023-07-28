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
        Schema::create('danhmuc_luong', function (Blueprint $table) {
            $table->increments('id_dml');
            $table->string('ten', 255);
            $table->integer('kyhieu')->unique();
            $table->integer('loailuong')->length(1);
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