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
        Schema::create('baohiem', function (Blueprint $table) {
            $table->increments('id_baohiem');
            $table->string('mabaohiem', 255)->unique();
            $table->date('ngaydangki');
            $table->string('noidangki', 255);
            $table->string('noikhambenh', 255);
        });

        Schema::table('baohiem', function ($table) {
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
