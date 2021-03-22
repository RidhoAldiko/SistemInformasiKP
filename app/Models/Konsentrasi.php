<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konsentrasi extends Model
{
    protected $table = 'konsentrasi';
    public $timestamps = false;
    protected $primaryKey = 'id_konsentrasi';
    protected $fillable = [
        'nama_konsentrasi','status'
    ];
    public function mahasiswa()
    {
        return $this->hasOne(Mahasiswa::class,'id_konsentrasi','id_konsentrasi');
    }
}
