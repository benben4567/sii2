<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelompokgradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelompokgrades', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kelompok_grade', 100);
            $table->integer('dibuat_oleh')->unsigned();
            $table->integer('diedit_oleh')->unsigned();
            $table->enum('status', ['0', '1']);
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
        Schema::dropIfExists('kelompokgrades');
    }
}
