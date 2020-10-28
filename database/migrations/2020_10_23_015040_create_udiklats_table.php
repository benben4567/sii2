<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUdiklatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('udiklats', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('kode_udiklat')->unique();
            $table->string('udiklat')->unique();
            $table->string('jabatan');
            $table->string('nama');
            $table->string('path_ttd');
            $table->string('nosurat');
            $table->string('alamat_surat');
            $table->string('alamat_surat_jalan');
            $table->integer('dibuat_oleh')->unsigned();
            $table->integer('diedit_oleh')->unsigned();
            $table->enum('status', ['0', '1']);
            $table->integer('id_udiklat_lama')->unsigned();
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
        Schema::dropIfExists('udiklats');
    }
}
