<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJawabantertutupevaluasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jawabantertutupevaluasis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('detailpenjadwalanpeserta_id')->constrained();
            $table->foreignId('pernyataanevaluasi_id')->constrained();
            $table->tinyInteger('nilai');
            $table->text('komentar')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jawabantertutupevaluasis');
    }
}
