<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;

    public function build(){
        return $this->from('pwl@ukrim.ac.id','PWL UKRIM')->view('mail/test');
    }
}