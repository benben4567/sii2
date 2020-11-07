<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToeflsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('toefls', function (Blueprint $table) {
            $table->id();
            $table->integer('skor');
            $table->text('tipe');
            $table->string('lembaga_penyelenggara');
            $table->date('masa_berlaku');
            $table->string('file_sertifikat');
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
        Schema::dropIfExists('toefls');
    }
}
