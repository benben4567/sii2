<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenanggungjawabsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penanggungjawabs', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('kode_penanggung_jawab', 5)->unique();
            $table->string('penanggung_jawab', 100)->index();
            $table->integer('dibuat_oleh')->unsigned();
            $table->integer('diedit_oleh')->unsigned();
            $table->enum('status', ['0', '1']);
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
        Schema::dropIfExists('penanggungjawabs');
    }
}
