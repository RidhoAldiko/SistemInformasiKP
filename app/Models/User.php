<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password','level','flag'
    ];
    public function dosen()
    {
        // parameter 1 untuk menghubungkan ke model dosen
        // parameter 2 merupakan foreign key dari table dosen
        // parameter 3 merupakan primary key dari table user
        return $this->belongsTo(Dosen::class,'email_dosen','email');
    }
    public function mahasiswa()
    {
        // parameter 1 untuk menghubungkan ke model mahasiswa
        // parameter 2 merupakan foreign key dari table mahasiswa
        // parameter 3 merupakan primary key dari table user
        return $this->belongsTo(Mahasiswa::class,'email_mhs','email');
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
