<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSilabusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('silabus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('judul_id')->constrained();
            $table->foreignId('instruktur_id')->constrained();
            $table->string('bahasan')->nullable();
            $table->string('hasil_pelatihan')->nullable();
            $table->string('kriteria_penilaian')->nullable();
            $table->string('metode_penilaian')->nullable();
            $table->string('waktu')->nullable();
            $table->string('referensi')->nullable();
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
        Schema::dropIfExists('silabus');
    }
}
