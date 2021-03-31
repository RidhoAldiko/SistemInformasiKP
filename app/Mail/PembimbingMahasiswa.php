<?php

namespace App\Mail;
use App\Models\User;
use App\Models\Proposal;
use App\Models\Mahasiswa;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PembimbingMahasiswa extends Mailable
{
    use Queueable, SerializesModels;
    public $item;
    /**
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($item)
    {
        $this->item =$item;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $proposal = Proposal::where('id_proposal','=',$this->item)->get();
        // cari mahasiswa berdasarkan npm dari proposal
        $mhs = Mahasiswa::where('npm','=',$proposal[0]->npm)->get();
        // cari email yang memiliki hak akses operator
        $user = User::where('level','=',0)->get('email');
        return $this->view('email.email_pembimbing')->with([
            'data' => [$mhs[0]->npm,$mhs[0]->nm_mhs,$proposal[0]->judul],
            'website' => config('app.url')
            ]);
    }
}
