<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetunjukinstruktursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('petunjukinstrukturs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('judul_id')->constrained();
            $table->foreignId('instruktur_id')->constrained();
            $table->string('petunjukinstruktur_sebelum')->nullable();
            $table->string('petunjukinstruktur_new')->nullable();
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
        Schema::dropIfExists('petunjukinstrukturs');
    }
}
