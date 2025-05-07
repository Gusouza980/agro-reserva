<?php

namespace App\Console\Commands;

use App\Models\Cliente;
use Illuminate\Console\Command;

class CalculaPotencialClientes extends Command
{
    protected $pontos = [
        "aprovado" => 10,
        "analise" => 4,
        "compras" => 10,
        "lotes_interessados" => 2,
        "visitas" => 1,
    ];

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clientes:calcula-potencial';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Calcula o potencial de interesse dos clientes';

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
        Cliente::where("aprovado", -1)->update(["potencial" => 0]);
        $clientes = Cliente::with('compras', 'lotes_interessados', 'visitas')->where("aprovado", "<>", -1)->get();

        foreach ($clientes as $cliente) {
            $potencial = 0;

            if ($cliente->aprovado == 1) {
                $potencial = $this->pontos["aprovado"];
            } else {
                $potencial = $this->pontos["analise"];
            }

            $potencial += $cliente->compras->where('created_at', ">=", date('Y-m-d H:i:s', strtotime("- 6 Months")))->count() * $this->pontos["compras"];
            $potencial += $cliente->lotes_interessados->where('created_at', ">=", date('Y-m-d H:i:s', strtotime("- 1 Month")))->count() * $this->pontos["lotes_interessados"];
            $potencial += $cliente->visitas->where('created_at', ">=", date('Y-m-d H:i:s', strtotime("- 1 Month")))->count() * $this->pontos["visitas"];

            $cliente->potencial = $potencial;
            $cliente->save();
        }

        return 0;
    }
}
