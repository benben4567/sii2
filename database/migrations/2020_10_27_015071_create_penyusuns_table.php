<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenyusunsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penyusuns', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('instruktur_id')->constrained();
            $table->string('file_penyusun')->nullable();
            $table->foreignId('judul_id')->constrained();
            $table->string('file_sertifikat_pembelajaran')->nullable();
            $table->date('tanggal_mulai')->nullable();
            $table->date('tanggal_selesai')->nullable();
            $table->string('pendidikan_formal')->nullable();
            $table->string('file_pendidikan_formal')->nullable();
            $table->string('file_bukti_karyatulis')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penyusuns');
    }
}
