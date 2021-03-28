<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBerkasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('berkas', function (Blueprint $table) {
            $table->Increments('id_berkas');
            $table->string('nm_berkas');
            $table->string('jenis_berkas',20);
            $table->char('npm',9);
            $table->string('file_berkas');
            $table->date('tanggal')->nullable();
            $table->tinyInteger('status');//0=aktif 1 = nonaktif
            $table->string('komentar')->nullable();

            $table->foreign('npm')->references('npm')->on('mahasiswa')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('berkas');
    }
}
