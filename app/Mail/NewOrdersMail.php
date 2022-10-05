<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewOrdersMail extends Mailable
{
    use Queueable, SerializesModels;
    

    public $order;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($_order)
    {
        $this->order=$_order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mails.new-orders', [
            "order"=> $this->order
        ])->subject("Il tuo ordine n° " . $this->order->code . " è stato ricevuto");
    }
}
