<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJawabanterbukaevaluasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jawabanterbukaevaluasis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('detailpenjadwalanpeserta_id')->constrained();
            $table->foreignId('pernyataanevaluasi_id')->constrained();
            $table->mediumInteger('komentar')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jawabanterbukaevaluasis');
    }
}
