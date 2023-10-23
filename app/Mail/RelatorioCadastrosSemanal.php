<?php

namespace App\Mail;

use App\Exports\RelatorioCadastros;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Maatwebsite\Excel\Facades\Excel;

class RelatorioCadastrosSemanal extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.relatorio-cadastros-semanal')->attach(Excel::download(new RelatorioCadastros(), 'relatorio_cadastros_semanais.xlsx')->getFile(), ['as' => 'relatorio_cadastros_semanais_' . date('d_m_Y')]);
    }
}
