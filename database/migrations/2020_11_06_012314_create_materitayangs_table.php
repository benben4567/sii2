<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMateritayangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materitayangs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('judul_id')->constrained();
            $table->foreignId('instruktur_id')->constrained();
            $table->string('materitayang_sebelum')->nullable();
            $table->string('materitayang_new')->nullable();
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
        Schema::dropIfExists('materitayangs');
    }
}
