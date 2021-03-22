<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKonsentrasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('konsentrasi', function (Blueprint $table) {
            $table->smallIncrements('id_konsentrasi');
            $table->string('nama_konsentrasi',70)->unique();
            $table->tinyInteger('status');//0=aktif 1 = nonaktif
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('konsentrasis');
    }
}
