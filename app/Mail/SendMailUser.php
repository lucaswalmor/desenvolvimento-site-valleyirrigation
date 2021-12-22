<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Classes\EntregaTecnica\EntregaTecnica;

class SendMailUser extends Mailable
{
    use Queueable, SerializesModels;

    private $name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(EntregaTecnica $name)
    {
        $this->name = $name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // $this->subject('Nova Entrega Técnica Recebida');
        // $this->to($this->entrega_tecnica->email, $this->entrega_tecnica->name);
        return $this->from('lucaswsb52@gmail.com')
        ->view('entregaTecnica.relatorios.enviarEmail');
    }
}
