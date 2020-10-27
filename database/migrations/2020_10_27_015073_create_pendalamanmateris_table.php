<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendalamanMaterisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendalamanmateris', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->foreignId('instruktur_id')->constrained();
            $table->foreignId('materi_id')->constrained();
            $table->date('tgl_mulai');
            $table->date('tgl_selesai');
            $table->string('penyelenggara');
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
        Schema::dropIfExists('pendalamanmateris');
    }
}
