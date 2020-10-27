<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJenissertifikatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenissertifikats', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('jenis_sertifikat', 25);
            $table->integer('dibuat_oleh')->unsigned();
            $table->integer('diedit_oleh')->unsigned();
            $table->timestamps();
            $table->enum('status', ['0', '1']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jenissertifikats');
    }
}
