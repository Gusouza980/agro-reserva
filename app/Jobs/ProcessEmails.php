<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\DeclaracaoInteresse;

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
        Mail::to(["gusouza980@gmail.com", "ti@agroreserva.com.br", "marcelo@agroreserva.com.br", "fernando@agroreserva.com.br", "josevictor@agroreserva.com.br"])->send(new DeclaracaoInteresse($this->lote_id, $this->cliente_id));
    }
}
