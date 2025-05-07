<?php

namespace App\Console\Commands;

use App\Exports\RelatorioCadastros;
use App\Mail\RelatorioCadastrosSemanal;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Excel as BaseExcel;
use Maatwebsite\Excel\Facades\Excel;

class RelatorioCadastroSemanal extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'relatorios:cadastroSemanal';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Relatório dos cadastros da última semana';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Mail::to(['gusouza980@gmail.com', 'gustavo@berrantecomunicacao.com.br'])->send(new RelatorioCadastrosSemanal);
        return 0;
    }
}
