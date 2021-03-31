<?php

namespace App\Mail;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DosenPembimbing extends Mailable
{
    use Queueable, SerializesModels;
    protected $email;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email)
    {
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {   
        // $user = User::where('level','=',0)->get('email');
        return $this->view('email.email_dosenPembimbing')->with([
            'data' => [$this->email[0]->nid,$this->email[0]->nm_dosen],
            'website' => config('app.url')
        ]);
    }
}
