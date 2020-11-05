<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKurikulumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kurikulums', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('warning_id')->constrained();
            $table->string('tujuan', 250)->nullable();
            $table->string('syarat_peserta', 250)->nullable();
            $table->string('skp', 250)->nullable();
            $table->string('metode', 250)->nullable();
            $table->string('lingkup', 250)->nullable();
            $table->string('strategi', 250)->nullable();
            $table->string('level', 250)->nullable();
            $table->string('sertifikat', 255)->nullable();
            $table->string('referensi', 250)->nullable();
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
        Schema::dropIfExists('kurikulums');
    }
}
