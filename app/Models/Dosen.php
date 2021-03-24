<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Dosen extends Model
{
    protected $table="dosen";

    // data yang bisa diinput oleh user
    protected $fillable=[
        'nid','nm_dosen','nohp_dosen','email_dosen','foto','jabatan'
    ];

    protected $primaryKey = 'nid';

    public $incrementing = false;

    protected $keyType ='string';

    public function user()
    {
        
        return $this->hasOne(User::class,'email','email_dosen');
    }
}
