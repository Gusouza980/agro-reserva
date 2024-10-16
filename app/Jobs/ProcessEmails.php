<?php

namespace App\Jobs;

use App\Mail\ErrosDev;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\DeclaracaoInteresse;
use Throwable;

class ProcessEmails implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $cliente_id;
    protected $lote_id;

    public function __construct($cliente_id, $lote_id)
    {
        $this->lote_id = $lote_id;
        $this->cliente_id = $cliente_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        $comercial = ["gusouza980@gmail.com", "isa_inoue@hotmail.com", "gustavo@berrantecomunicacao.com.br", "liperfferreira6@gmail.com", "vinicius@agroreserva.com.br", "guilherme@agroreserva.com.br", "ti@agroreserva.com.br", "marcelo@agroreserva.com.br", "fernando@agroreserva.com.br", "josevictor@agroreserva.com.br"];
        // $comercial = ["gusouza980@gmail.com"];
        foreach($comercial as $email){
            Mail::to($email)->send(new DeclaracaoInteresse($this->lote_id, $this->cliente_id));
        }
    }

    public function failed(Throwable $exception)
    {
        \Log::channel("interesses")->emergency("Erro ao enviar declaração de interesse do cliente # " . $this->cliente_id . " no lote #" . $this->lote_id . ".");
        $msg = "Erro ao enviar declaração de interesse do cliente # " . $this->cliente_id . " no lote #" . $this->lote_id . ".";
        Mail::to('ti@agroreserva.com.br')->send(new ErrosDev($msg));
    }
}
