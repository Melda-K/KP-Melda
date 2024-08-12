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
            $table->bigInteger('id_siswa')->unsigned();
            $table->foreign('id_siswa')->references('id')->on('siswas')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('id_wali_kelas')->unsigned();
            $table->foreign('id_wali_kelas')->references('id')->on('wali_kelass')->onDelete('cascade')->onUpdate('cascade');
            $table->string('pai');
            $table->string('pkn');
            $table->string('indo');
            $table->string('mtk');
            $table->string('ipa');
            $table->string('ips');
            $table->string('pjok');
            $table->string('senbud');
            $table->string('sunda');
            $table->integer('nilai_pengetahuan');
            $table->string('huruf_pengetahuan');
            $table->integer('nilai_keterampilan');
            $table->string('huruf_keterampilan');
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
