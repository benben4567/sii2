<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJudulsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('juduls', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            //start foreign key
            $table->foreignId('jenisdiklat_id')->constrained();
            $table->foreignId('sifatdiklat_id')->constrained();
            $table->foreignId('levelprofisiensi_id')->constrained();
            $table->foreignId('penanggungjawab_id')->constrained();
            $table->foreignId('penyelenggaraan_id')->constrained();
            $table->foreignId('jenissertifikat_id')->constrained();
            $table->foreignId('dahanprofesi_id')->constrained();
            $table->foreignId('akademi_id')->constrained();
            //endforeign key
            $table->string('kode_judul', 50);
            $table->string('nama_judul', 255);
            $table->year('tahun_terbit');
            $table->enum('status_refreshment', ['0', '1']);
            $table->enum('angkatan', ['0', '1']);
            $table->longText('deskripsi');
            $table->integer('durasi_hari')->unsigned();
            $table->enum('aktif', ['0', '1']);
            $table->enum('kepemilikan', ['1', '2']);
            $table->integer('dibuat_oleh')->unsigned();
            $table->integer('diedit_oleh')->unsigned();
            $table->enum('status', ['0', '1']);
            $table->string('kode_judul_lama', 50);
            $table->integer('id_dahan_profesi_lama');
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
        Schema::dropIfExists('juduls');
    }
}
