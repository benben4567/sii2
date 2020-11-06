<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetunjukpenyelenggarasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('petunjukpenyelenggaras', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('judul_id')->constrained();
            $table->foreignId('instruktur_id')->constrained();
            $table->string('petunjukpenyelenggara_sebelum')->nullable();
            $table->string('petunjukpenyelenggara_new')->nullable();
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
        Schema::dropIfExists('petunjukpenyelenggaras');
    }
}
