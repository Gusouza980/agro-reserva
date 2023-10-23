<?php

namespace App\Exports;

use App\Models\Cliente;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;


class RelatorioCadastros implements FromView, ShouldAutoSize
{
    public function view(): View
    {
        $count_por_etapas = DB::table('clientes')->where("created_at", ">=", date("Y-m-d H:i:s", strtotime("-7 Days")))->where("finalizado", false)->select('etapa_cadastro', DB::raw('count(*) as total'))->groupBy('etapa_cadastro')->get();
        $total_cadastros_finalizados = DB::table('clientes')->where("created_at", ">=", date("Y-m-d H:i:s", strtotime("-7 Days")))->where("finalizado", "=", true)->count();
        $total_cadastros_nao_finalizados = DB::table('clientes')->where("created_at", ">=", date("Y-m-d H:i:s", strtotime("-7 Days")))->where("finalizado", "=", false)->count();
        $clientes_cadastrados = Cliente::where("created_at", ">=", date("Y-m-d H:i:s", strtotime("-7 Days")))->get();
        return view("exports.relatorio_cadastros", [
            'count_por_etapas' => $count_por_etapas,
            'total_cadastros_finalizados' => $total_cadastros_finalizados,
            'total_cadastros_nao_finalizados' => $total_cadastros_nao_finalizados,
            'clientes_cadastrados' => $clientes_cadastrados
        ]);
    }
}
