<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenjadwalansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjadwalans', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->foreignId('wo_id')->constrained();
            $table->foreignId('kelas_id')->nullable()->constrained();
            $table->foreignId('penyelenggaraan_id')->constrained();
            $table->integer('jumlah_peserta');
            $table->integer('angkatan')->unsigned();
            $table->enum('realisasi', ['0', '1', '2', '3', '4', '5', '6', '7', '8']);
            $table->dateTime('waktu_realisasi');
            $table->integer('direalisasi_oleh');
            $table->date('tanggal_mulai_realisasi');
            $table->date('tanggal_selesai_realisasi');
            $table->enum('konf_kelas', ['0', '1']);
            $table->integer('dikonf_kelas_oleh')->unsigned();
            $table->dateTime('waktu_konf_kelas');
            $table->enum('sinkronasi_materi', ['0', '1']);
            $table->tinyInteger('level_approval')->unsigned();
            $table->string('no_surat_pemanggilan');
            $table->date('tanggal_surat_pemanggilan');
            $table->timestamp('waktu_tanggal_surat_pemanggilan');
            $table->enum('open', ['0', '1']);
            $table->enum('open_tambah_instruktur', ['0', '1']);
            $table->tinyInteger('jumlah_instruktur_tambahan')->unsigned();
            $table->enum('status_action_learning', ['0', '1']);
            $table->integer('dibuat_oleh')->unsigned();
            $table->integer('diedit_oleh')->unsigned();
            $table->enum('status', ['0', '1']);
            $table->string('ket_peserta', 50);
            $table->integer('id_penjadwalan_itn')->unsigned();
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
        Schema::dropIfExists('penjadwalans');
    }
}
