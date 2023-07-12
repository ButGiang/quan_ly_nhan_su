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
        Schema::create('hopdong', function (Blueprint $table) {
            $table->increments('id_hopdong');
            $table->date('ngaybatdau');
            $table->date('ngayketthuc');
            $table->date('ngayki');
            $table->string('noidung', 255);
            $table->float('hesoluong');
        });

        Schema::table('hopdong', function ($table) {
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
