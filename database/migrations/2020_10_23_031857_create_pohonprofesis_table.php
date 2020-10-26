<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePohonprofesisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pohonprofesis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode_pohon_profesi', 5)->unique();
            $table->string('pohon_profesi', 100)->unique();
            $table->integer('dibuat_oleh');
            $table->integer('diedit_oleh');
            $table->enum('status', ['0', '1']);
            $table->integer('id_pohon_profesi_lama');
            $table->string('kode_pohon_profesi_lama', 50);
            $table->string('pohon_profesi_lama', 100);
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
        Schema::dropIfExists('pohonprofesis');
    }
}
