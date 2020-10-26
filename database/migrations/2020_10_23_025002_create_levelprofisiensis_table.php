<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLevelprofisiensisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('levelprofisiensis', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('kode_level_profisiensi', 2)->unique();
            $table->string('level_profisiensi', 50)->unique();
            $table->enum('jenis_profisiensi', ["H", "S"])->index();
            $table->integer('dibuat_oleh')->unsigned();
            $table->integer('diedit_oleh')->unsigned();
            $table->enum('status', [0, 1]);
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
        Schema::dropIfExists('levelprofisiensis');
    }
}
