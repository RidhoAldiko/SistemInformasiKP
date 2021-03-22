<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMahasiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->char('npm',9)->primary();
            $table->string('nm_mhs',60);
            $table->string('email_mhs',70)->unique();
            $table->smallInteger('id_konsentrasi')->unsigned();
            $table->string('nohp',15);
            $table->string('foto')->nullable();
            $table->timestamps();

            // foreign key
            // dari tabel konsentrasi
            $table->foreign('id_konsentrasi')->references('id_konsentrasi')->on('konsentrasi')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mahasiswas');
    }
}
