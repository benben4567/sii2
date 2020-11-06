<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHandoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('handouts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('judul_id')->constrained();
            $table->foreignId('instruktur_id')->constrained();
            $table->string('handout_sebelum')->nullable();
            $table->string('handout_new')->nullable();
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
        Schema::dropIfExists('handouts');
    }
}
