<?php

namespace App\Mail;

use App\Models\ChatRoom;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserOffline extends Mailable
{
    use Queueable, SerializesModels;

    public $chatRoom;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ChatRoom $chatRoom)
    {
        $this->chatRoom = $chatRoom;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('d10cn2btt@gmail.com')
            ->subject('Limar Demo')
            ->view('mail');
    }
}
