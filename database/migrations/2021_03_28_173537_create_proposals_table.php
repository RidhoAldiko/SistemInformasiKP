<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProposalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proposal', function (Blueprint $table) {
            $table->Increments('id_proposal');
            $table->string('judul');//judul kp
            $table->string('nm_instansi',100);
            $table->string('alamat_instansi',100);
            $table->string('bimbing_instansi',100)->nullable();
            $table->char('npm',9);
            $table->char('nid',10)->nullable();
            $table->string('file_proposal');
            $table->string('waktu_kp',50);
            $table->tinyInteger('status');//0=mendaftar 1 = verifikasi, 2=tolak, 3=terima, 4=revisi, 5=terima dengan revisi, 6 = perbaikan
            $table->string('rekomendasi',70)->nullable();//dosen yang memberi tempat kp
            $table->string('catatan',80)->nullable();//revisi dospem
            $table->timestamps();

            // foreign key
            // dari tabel mahasiswa ke proposal
            $table->foreign('npm')->references('npm')->on('mahasiswa')->onUpdate('cascade');
            // dari tabel dosen ke proposal
            $table->foreign('nid')->references('nid')->on('dosen')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proposals');
    }
}
