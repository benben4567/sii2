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
            $table->bigIncrements('id')->unsigned();
            //start fk
            $table->integer('role_id')->unsigned();
            $table->foreignId('level1unit_id')->constrained();
            $table->foreignId('level2unit_id')->nullable()->constrained();
            $table->foreignId('level3unit_id')->nullable()->constrained();
            $table->foreignId('pendidikan_id')->nullable()->constrained();
            $table->foreignId('jurusan_id')->nullable()->constrained();
            $table->foreignId('grade_id')->nullable()->constrained();
            $table->foreignId('jenjangjabatan_id')->nullable()->constrained();
            $table->foreignId('udiklat_id')->nullable()->constrained();
            //end fk
            $table->enum('jeniskelamin', ['0', '1']);
            $table->string('nip', 50)->unique();
            $table->string('nama', 100);
            $table->string('jabatan', 255);
            $table->string('foto', 255);
            $table->string('tempat_lahir', 50);
            $table->date('tanggal_lahir');
            $table->string('password');
            $table->string('no_hp');
            $table->string('email', 254)->unique();
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
