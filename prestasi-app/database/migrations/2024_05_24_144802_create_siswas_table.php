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
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->string('nis',20);
            $table->string('nama_siswa', 50);
            $table->char('kelas', 2);
            $table->integer('tahun_pelajaran');
            $table->bigInteger('id_wali_kelas')->unsigned();
            $table->foreign('id_wali_kelas')->references('id')->on('wali_kelas')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
