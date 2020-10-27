<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJenispelaksanaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenispelaksanaans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('jenis_pelaksanaan', 25)->unique();
            $table->enum('kebutuhan_konf', [0, 1]);
            $table->integer('dibuat_oleh');
            $table->integer('diedit_oleh');
            $table->enum('status', [0, 1]);
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
        Schema::dropIfExists('jenispelaksanaans');
    }
}
