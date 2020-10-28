<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstruktursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instrukturs', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->foreignId('peserta_id')->constrained();
            $table->foreignId('udiklat_id')->constrained();
            $table->foreignId('tipeinstruktur_id')->constrained();
            $table->foreignId('levelinstruktur_id')->nullable()->constrained();
            $table->foreignId('user_id')->nullable()->constrained();
            $table->string('no_ktp', 50)->nullable();
            $table->string('no_npwp', 50)->nullable();
            $table->string('no_rekening', 50)->nullable();
            $table->string('atas_nama_rekening', 100)->nullable();
            $table->string('bank', 50)->nullable();
            $table->integer('dibuat_oleh')->unsigned();
            $table->integer('diedit_oleh')->unsigned();
            $table->enum('status', ['0', '1']);
            $table->integer('id_instruktur_lama')->unsigned()->nullable();
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
        Schema::dropIfExists('instrukturs');
    }
}
