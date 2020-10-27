<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJenisdiklatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenisdiklats', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('kode_jenis_diklat', 2)->unique();
            $table->string('jenis_diklat', 100)->unique();
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
        Schema::dropIfExists('jenisdiklats');
    }
}
