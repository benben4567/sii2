<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailwosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detailwos', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->foreignId('wo_id')->index()->constrained();
            $table->foreignId('level1unit_id')->index()->constrained();
            $table->string('unit_level1', 255);
            $table->integer('jumlah_peserta')->unsigned();
            $table->enum('status_konf_keu', ['0', '1', '2']);
            $table->integer('dikonf_keu_oleh')->unsigned();
            $table->timestamp('waktu_konf_keu');
            $table->integer('diedit_oleh')->unsigned();
            $table->enum('status', ['0', '1']);
            $table->integer('id_penjadwalan_itn')->unsigned();
            $table->integer('dibuat_oleh')->unsigned();
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
        Schema::dropIfExists('detailwos');
    }
}
