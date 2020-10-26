<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLevel3UnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('level3units', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->foreignId('level2unit_id')->constrained();
            $table->string('kode_unit_level3', 5)->unique();
            $table->string('unit_level3', 255)->unique();
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
        Schema::dropIfExists('level3units');
    }
}
