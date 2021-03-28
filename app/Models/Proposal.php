<?php

namespace App\Models;

use App\Models\Mahasiswa;
use App\Models\Dosen;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    use HasFactory;
    protected $table = 'proposal';
    protected $primaryKey = 'id_proposal';
    protected $fillable = [
        'nm_instansi','alamat_instansi','bimbing_instansi','npm','nid','file_proposal','status','catatan','rekomendasi','judul','waktu_kp'
    ];
    // public function instansi()
    // {
    //     // parameter 1 untuk menghubungkan ke model instansi
    //     // parameter 2 merupakan foreign key dari table instansi
    //     // parameter 3 merupakan primary key dari table proposal
    //     return $this->belongsTo(Instansi::class);
    // }

    public function mahasiswa()
    {
        // parameter 1 untuk menghubungkan ke model mahasiswa
        // parameter 2 merupakan foreign key dari table mahasiswa
        // parameter 3 merupakan primary key dari table proposal
        return $this->belongsTo(Mahasiswa::class,'npm','npm');
    }

    public function dosen()
    {
        // parameter 1 untuk menghubungkan ke model mahasiswa
        // parameter 2 merupakan foreign key dari table mahasiswa
        // parameter 3 merupakan primary key dari table proposal
        return $this->belongsTo(Dosen::class,'nid','nid');
    }
}
