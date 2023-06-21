<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Создание нового экземпляра письма.
     *
     * @param  array  $data
     * @return void
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Создание письма.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.contact-form')
            ->subject('New message from VEKAS');
    }
}
