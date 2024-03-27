<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use App\Models\Auth\User;
use App\Models\Post;
use App\Models\Offer;


class OfferCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $offer;
    public $request;
    public $sender;
    public $receiver;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($offer = null,$request = null,$sender = null,$receiver = null)
    {
        $this->offer = $offer;
        $this->request = $request;
        $this->sender = $sender;
        $this->receiver = $receiver;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.offercreated',[
                    'url' => url('dashboard'),
                ]);
    }
}
