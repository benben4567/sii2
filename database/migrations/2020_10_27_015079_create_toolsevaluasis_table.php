<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToolsevaluasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('toolsevaluasis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('warning_id')->constrained();
            $table->string('toolsevaluasi_sebelum');
            $table->string('toolsevaluasi_new');
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
        Schema::dropIfExists('toolsevaluasis');
    }
}
