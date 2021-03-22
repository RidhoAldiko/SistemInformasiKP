<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Konsentrasi;

class Mahasiswa extends Model
{
    protected $table='mahasiswa';
    protected $fillable=[
        'email_mhs','npm','nm_mhs','nohp','foto','id_konsentrasi'
    ];
    protected $primaryKey = 'npm';
    public $incrementing = false;
    protected $keyType ='string';

    public function user()
    {
        return $this->hasOne(User::class,'email','email_mhs');
    }

    public function konsentrasi()
    {
        return $this->belongsTo(Konsentrasi::class,'id_konsentrasi','id_konsentrasi');
    }
}
