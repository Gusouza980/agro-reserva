<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Cliente;
use App\Classes\Email;

class NotificaReprovados extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notificacao:clientesReprovados';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $data = date("Y-m-d");
        $data = date("Y-m-d", strtotime($data . ' -6 months'));
        // $clientes = Cliente::where([["data_reprovacao", "<=", $data], ["data_notificacao_reprovacao", "<=", $data]])->get();
        $clientes = Cliente::where(function($query) use ($data){
            $query->where("data_reprovacao", "<=", $data);
        })->where(function($query) use ($data){
            $query->where("data_notificacao_reprovacao", "=", null)
                    ->orWhere("data_notificacao_reprovacao", "<=", $data);
        })->get();
        if($clientes->count() > 0){
            $file = "<h5>Clientes com 6 meses desde a última reprovação.</h5>";
            $file .= "<hr>";
            $file .= "<ul>";
            foreach($clientes as $cliente){
                $cliente->data_notificacao_reprovacao = date("Y-m-d");
                $cliente->save();
                $file .= "<li> <a href='".route('painel.cliente.visualizar', ['cliente' => $cliente])."' target='_blank'>" . $cliente->nome_dono . "</a> - " . $cliente->email . "</li>";
            }
            $file .= "</ul>";
            if(Email::enviar($file, "Aviso de Clientes Reprovados", "gusouza980@gmail.com", false)){
                $this->info('Relatório de clientes reprovados enviado com sucesso!');
            }else{
                $this->error('Erro ao enviar Relatório de clientes reprovados!');
            }
        }else{
            $this->info('Não foram encontrados clientes para serem notificados!');
        }
        
    }
}
