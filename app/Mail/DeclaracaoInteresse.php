<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Lote;
use App\Models\Cliente;

class DeclaracaoInteresse extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $lote;
    public $cliente;


    public function __construct($lote, $cliente)
    {
        $this->lote = Lote::find($lote);
        $this->cliente = Cliente::find($cliente);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.declaracao-interesse');
    }
}
