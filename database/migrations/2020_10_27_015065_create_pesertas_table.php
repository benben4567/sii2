<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesertas', function (Blueprint $table) {
            $table->id('id');
            //start fk
            $table->bigInteger('level1unit_id')->nullable();
            $table->bigInteger('level2unit_id')->nullable();
            $table->bigInteger('level3unit_id')->nullable();
            $table->bigInteger('pendidikan_id')->nullable();
            $table->bigInteger('jurusan_id')->nullable();
            $table->bigInteger('grade_id')->nullable();
            $table->bigInteger('jenjangjabatan_id')->nullable();
            $table->bigInteger('udiklat_id')->nullable();
            //end fk
            $table->enum('jeniskelamin', ['1','2','3']);
            $table->string('nip', 50)->unique();
            $table->string('nama', 100);
            $table->string('jabatan', 255);
            $table->string('foto', 255);
            $table->string('tempat_lahir', 50);
            $table->date('tanggal_lahir');
            $table->string('password');
            $table->string('no_hp');
            $table->string('email', 254)->unique()->nullable();
            $table->dateTime('waktu_login_terakhir');
            $table->integer('dibuat_oleh')->unsigned();
            $table->integer('diedit_oleh')->unsigned();
            $table->enum('status', ['0', '1']);
            $table->integer('id_peserta_lama')->unsigned();
            $table->integer('id_instruktur_lama')->unsigned();
            $table->string('profesi1', 255)->nullable();
            $table->string('profesi2', 255)->nullable();
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
        Schema::dropIfExists('pesertas');
    }
}
