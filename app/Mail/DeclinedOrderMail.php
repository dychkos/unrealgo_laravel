<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DeclinedOrderMail extends Mailable
{
    use Queueable, SerializesModels;

    public Order $order;
    public bool $needFooter;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
        $this->needFooter = false;
        $subject = "Замовлення [№" . strval($order->id) . "] скасовано!";
        $this->subject($subject);
        $this->from = [[
            'name' => 'UnReal GO',
            'address'=>'unrgo@unreal-go.top'
        ]];

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.canceled');
    }
}
