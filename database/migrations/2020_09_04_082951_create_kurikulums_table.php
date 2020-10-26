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
            $table->string('tujuan', 250);
            $table->string('syarat_peserta', 250);
            $table->string('skp', 250);
            $table->string('metode', 250);
            $table->string('lingkup', 250);
            $table->string('strategi', 250);
            $table->string('level', 250);
            $table->string('sertifikat', 255);
            $table->string('referensi', 250);
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
