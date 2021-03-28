<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berkas extends Model
{
    use HasFactory;
    protected $table = 'berkas';
    protected $primaryKey = 'id_berkas';
    public $timestamps = false;
    protected $fillable = [
        'nm_berkas','jenis_berkas','npm','file_berkas','tanggal','status','komentar'
    ];
    public function mahasiswa()
    {
        // parameter 1 untuk menghubungkan ke model instansi
        // parameter 2 merupakan foreign key dari table instansi
        // parameter 3 merupakan primary key dari table proposal
        return $this->belongsTo(Mahasiswa::class,'npm','npm');
    }
}
