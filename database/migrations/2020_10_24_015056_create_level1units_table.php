<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLevel1UnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('level1units', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->foreignId('udiklat_id')->constrained();
            $table->string('kode_unit_level1', 5)->unique();
            $table->string('unit_level1', 255)->unique();
            $table->enum('pln', ['Y', 'N']);
            $table->string('penerima_surat', 200);
            $table->string('alamat_surat', 200);
            $table->string('alamat_surat_jalan', 200);
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
        Schema::dropIfExists('level1units');
    }
}
