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
            $table->foreignId('warning_id')->constrained();
            $table->string('bahasan');
            $table->string('hasil_pelatihan');
            $table->string('kriteria_penilaian');
            $table->string('metode_penilaian');
            $table->string('waktu');
            $table->string('referensi');
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
