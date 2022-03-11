<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewProductMail extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public $product;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email, $product)
    {
        $this->email = $email;
        $this->product = $product;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.new-product')
            ->subject('New product created')
            ->with([
                'product' => $this->product,
            ])
            ->to($this->email);
    }
}
