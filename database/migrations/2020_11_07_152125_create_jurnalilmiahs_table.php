<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJurnalilmiahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jurnalilmiahs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('instruktur_id')->constrained();
            $table->foreignId('judul_id')->constrained();
            $table->string('tingkatan');
            $table->string('file_jurnal_ilmiah');
            $table->string('file_abstrak');
            $table->string('lembaga_penyelenggara');
            $table->date('tanggal_submit');
            $table->date('tanggal_presentasi');
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
        Schema::dropIfExists('jurnalilmiahs');
    }
}
