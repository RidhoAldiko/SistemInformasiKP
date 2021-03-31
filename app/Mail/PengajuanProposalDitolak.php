<?php

namespace App\Mail;
use App\Models\User;
use App\Models\Mahasiswa;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PengajuanProposalDitolak extends Mailable
{
    use Queueable, SerializesModels;
    protected $item;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($item)
    {
        $this->item = $item;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $user = User::where('level','=',0)->get('email');
        $nama = Mahasiswa::where('npm','=',$this->item['npm'])->get();
        return $this->view('email.email_proposalTolak')->with([
            'data' => [$this->item['npm'],$nama[0]->nm_mhs,$this->item['judul']],
            'website' => config('app.url')
            ]);
    }
}
