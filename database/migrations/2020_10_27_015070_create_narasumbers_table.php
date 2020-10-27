<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNarasumbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('narasumbers', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->foreignId('instruktur_id')->constrained();
            $table->string('pengalaman_bidang')->nullable();
            $table->string('pendidikan_formal')->nullable();
            $table->string('file_pendidikan_formal')->nullable();
            $table->foreignId('judul_id')->constrained();
            $table->string('file_sertifikat_pembelajaran')->nullable();
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
        Schema::dropIfExists('narasumbers');
    }
}
