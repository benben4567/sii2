<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wos', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->integer('id_relasi_lama')->unsigned();
            $table->foreignId('judul_id')->index()->constrained();
            $table->foreignId('udiklat_id')->index()->constrained();
            $table->foreignId('jenispelaksanaan_id')->index()->constrained();
            $table->foreignId('kelas_id')->nullable()->index()->constrained('kelas');
            $table->foreignId('penyelenggaraan_id')->index()->constrained();
            $table->foreignId('jenissertifikat_id')->index()->constrained();
            $table->integer('angkatan')->unsigned();
            $table->string('kode_judul', 50)->index();
            $table->string('kode_judul_lama', 50);
            $table->string('nama_judul', 255)->index();
            $table->string('udiklat', 50)->index();
            $table->string('jenis_pelaksanaan', 25)->index();
            $table->string('kelas', 50)->index();
            $table->string('penyelenggaraan', 50)->index();
            $table->string('jenis_sertifikat', 25)->index();
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->year('tahun_pengajuan');
            $table->enum('status_konf_ren', ['0', '1', '2']);
            $table->integer('dikonf_ren_oleh')->unsigned();
            $table->time('waktu_konf_ren');
            $table->enum('status_konf_keu', ['0', '1', '2']);
            $table->integer('dikonf_keu_oleh')->unsigned();
            $table->time('waktu_konf_keu');
            $table->enum('status_approval', ['0', '1', '2', '3']);
            $table->text('alasan_ren_approval');
            $table->enum('rule_peserta', ['0', '1']);
            $table->integer('dibuat_oleh')->unsigned();
            $table->integer('diedit_oleh')->unsigned();
            $table->enum('status', ['0', '1']);
            $table->integer('id_penjadwalan_itn')->unsigned()->nullable();
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
        Schema::dropIfExists('wos');
    }
}
