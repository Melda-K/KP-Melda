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
        Schema::create('rapots', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_wali_kelas')->unsigned();
            $table->bigInteger('id_siswa')->unsigned();
            $table->bigInteger('id_kriteria')->unsigned();
            $table->foreign('id_wali_kelas')->references('id')->on('wali_kelas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_siswa')->references('id')->on('siswas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_kriteria')->references('id')->on('kriterias')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rapots');
    }
};
