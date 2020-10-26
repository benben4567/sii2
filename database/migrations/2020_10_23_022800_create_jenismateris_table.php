<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJenismaterisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenismateris', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode_jenis_materi', 50)->unique();
            $table->string('jenis_materi', 50)->unique();
            $table->integer('dibuat_oleh');
            $table->integer('diedit_oleh');
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
        Schema::dropIfExists('jenismateris');
    }
}
