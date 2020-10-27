<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenyelenggaraansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penyelenggaraans', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('kode_penyelenggaraan', 5)->unique();
            $table->string('penyelenggaraan', 50)->index();
            $table->enum('group_penyelenggaraan', [0, 1]);
            $table->enum('iht', [0, 1]);
            $table->string('kodesertifikat', 5);
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
        Schema::dropIfExists('penyelenggaraans');
    }
}
