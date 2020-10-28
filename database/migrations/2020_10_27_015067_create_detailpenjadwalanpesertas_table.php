<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPenjadwalanpesertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detailpenjadwalanpesertas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_wo_migrasi')->nullable()->unsigned();
            $table->foreignId('penjadwalan_id')->constrained();
            $table->foreignId('peserta_id')->constrained();
            $table->foreignId('detailwo_id')->constrained();
            $table->foreignId('level1unit_id')->constrained();
            $table->tinyInteger('gradenilai_id')->nullable()->unsigned();
            $table->string('unit_level_1', 255);
            $table->enum('konf_kehadiran', ['0', '1']);
            $table->integer('dikonf_kehadiran_oleh')->unsigned();
            $table->dateTime('waktu_dikonf_kahadiran')->nullable();
            $table->enum('hadir', ['1', '2'])->index();
            $table->decimal('nilai', 5, 2)->nullable();
            $table->enum('lulus', ['0', '1', '2']);
            $table->integer('dibuat_oleh')->unsigned();
            $table->integer('diedit_oleh')->unsigned();
            $table->enum('status', ['0', '1']);
            $table->integer('id_detail_penjadwalan_peserta_lama')->unsigned();
            $table->integer('id_evaluasi_kesesuaian_penjadwalan_itn')->unsigned()->nullable();
            $table->integer('id_penjadwalan_itn')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('gradenilai_id')->references('id')->on('gradenilais');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detailpenjadwalanpesertas');
    }
}
