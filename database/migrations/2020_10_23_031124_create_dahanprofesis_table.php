<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDahanprofesisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dahanprofesis', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->foreignId('pohonprofesi_id')->constrained();
            $table->string('kode_dahan_profesi', 5)->unique();
            $table->string('dahan_profesi', 100)->unique();
            $table->integer('dibuat_oleh')->unsigned();
            $table->integer('diedit_oleh')->unsigned();
            $table->enum('status', ['0', '1']);
            $table->integer('id_dahan_profesi_lama');
            $table->integer('id_pohon_profesi_lama');
            $table->string('kode_dahan_profesi_lama', 10);
            $table->string('dahan_profesi_lama', 150);
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
        Schema::dropIfExists('dahanprofesis');
    }
}
