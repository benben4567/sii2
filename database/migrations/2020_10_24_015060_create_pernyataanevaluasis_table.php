<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePernyataanevaluasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pernyataanevaluasis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('jenispernyataanevaluasi_id')->constrained();
            $table->foreignId('kelompokevaluasi_id')->constrained();
            $table->mediumInteger('pernyataan_evaluasi');
            $table->enum('flag', [0, 1]);
            $table->enum('flaglearning', [0, 1]);
            $table->enum('flagiht', [0, 1]);
            $table->enum('flagict', [0, 1]);
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
        Schema::dropIfExists('pernyataanevaluasis');
    }
}
