<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Visita;
use App\Models\Reserva;
use Illuminate\Support\Facades\DB;
use PDF;
use App\Classes\Email;

class ReservaRelatorio extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reserva:relatorio';

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
        $reservas = Reserva::where([["aberto", true], ["encerrada", false]])->get();
        foreach($reservas as $reserva){
            $total_visitas = Visita::where("logado", true)->whereIn("lote_id", $reserva->lotes->map->only(['id']))->count();
            $cinco_clientes_mais_visitas = Visita::select("cliente_id", DB::raw("COUNT(*) as visitas"))->where("logado", true)->whereIn("lote_id", $reserva->lotes->map->only(['id']))->groupBy('cliente_id')->orderBy("visitas", "DESC")->limit(5)->get();
            $cinco_clientes_mais_visitas_lotes = Visita::select("cliente_id", "lote_id", DB::raw("COUNT(*) as visitas"))->where("logado", true)->whereIn("lote_id", $reserva->lotes->map->only(['id']))->whereIn("cliente_id", $cinco_clientes_mais_visitas->map->only(['cliente_id']))->groupBy(['cliente_id', "lote_id"])->orderBy("cliente_id", "ASC")->orderBy("visitas", "DESC")->get();
            $visitas_lote = Visita::select("lote_id", DB::raw("COUNT(*) as visitas"))->where("logado", true)->whereIn("lote_id", $reserva->lotes->map->only(['id']))->groupBy("lote_id")->orderBy("visitas", "DESC")->get();
            $visitas_dia = Visita::select(DB::raw("DATE_FORMAT(created_at, '%d/%m/%Y') as data"), DB::raw("COUNT(*) as visitas"))->where("logado", true)->whereIn("lote_id", $reserva->lotes->map->only(['id']))->groupBy("data")->orderBy("data", "ASC")->get();
            $data = [
                "reserva" => $reserva,
                "cinco_clientes_mais_visitas" => $cinco_clientes_mais_visitas,
                "cinco_clientes_mais_visitas_lotes" => $cinco_clientes_mais_visitas_lotes,
                "visitas_dia" => $visitas_dia,
                "visitas_lote" => $visitas_lote,
                "total_visitas" => $total_visitas,
            ];
            $file = "Relatório de visitas da reserva da fazenda " . $reserva->fazenda->nome_fazenda . " gerado no dia " . date("d/m/Y"). ".";
            $pdf = PDF::loadView('painel.reservas.pdf.relatorio', $data);
            $pdf->save(public_path() . "/relatorio/visitas/".$reserva->id.date("d-m-y").".pdf");
            Email::enviar($file, "Relatório de Visitas - " . $reserva->fazenda->nome_fazenda, "", true, public_path() . "/relatorio/visitas/".$reserva->id.date("d-m-y").".pdf", "Relatório de Visitas - " . $reserva->fazenda->nome_fazenda . " ".date("d-m-y").".pdf");
            unlink(public_path() . "/relatorio/visitas/".$reserva->id.date("d-m-y").".pdf");
        }
        
        $this->info('Relatórios gerados e enviados com sucesso!');
    }
}
