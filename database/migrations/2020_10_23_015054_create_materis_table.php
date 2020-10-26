<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materis', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->foreignId('jenismateri_id')->constrained();
            $table->string('kode_materi', 50);
            $table->string('materi', 255)->index();
            $table->integer('durasi')->unsigned();
            $table->decimal('nilai_minimum', 5, 2)->unsigned();
            $table->integer('presentase_pembayaran');
            $table->enum('status_action_learning', ['0', '1']);
            $table->integer('dibuat_oleh')->unsigned();
            $table->integer('diedit_oleh')->unsigned();
            $table->enum('status', ['0', '1']);
            $table->integer('id_materi_lama')->unsigned();
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
        Schema::dropIfExists('materis');
    }
}
