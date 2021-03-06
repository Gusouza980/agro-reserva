<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;
use App\Models\Fazenda;
use App\Models\Venda;
use App\Models\CurtidaLote;

class ReservasController extends Controller
{

    public function index(Fazenda $fazenda){
        $reservas = $fazenda->reservas;
        return view("painel.reservas.index", ["reservas" => $reservas, "fazenda" => $fazenda]);
    }

    public function cadastrar(Request $request, Fazenda $fazenda){
        $reserva = new Reserva;
        $reserva->fazenda_id = $fazenda->id;
        $reserva->inicio = $request->inicio;
        $reserva->fim = $request->fim;
        $reserva->ativo = $request->ativo;
        $reserva->save();
        toastr()->success("Reserva cadastrada com sucesso!");
        return redirect()->back();
    }   

    public function editar(Request $request, Reserva $reserva){
        $reserva->inicio = $request->inicio;
        $reserva->fim = $request->fim;
        $reserva->ativo = $request->ativo;
        $reserva->save();
        toastr()->success("Alterações salvas com sucesso!");
        return redirect()->back();
    }   

    public function excluir(Reserva $reserva){
        $reserva->delete();
        toastr()->success("Reserva excluida com sucesso!");
        return redirect()->back();
    }

    public function relatorio(Reserva $reserva){
        $qtd_lotes = $reserva->lotes->count();
        $vendas = Venda::whereIn("lote_id", $reserva->lotes->map->only(['id']))->get();
        $vendas = $vendas->where("situacao", 2);
        $num_vendas = $vendas->count();
        $valor_vendas = $vendas->sum("total");
        $visitas = $reserva->lotes->sum("visitas");
        $curtidas = CurtidaLote::whereIn("lote_id", $reserva->lotes->map->only(['id']))->where("curtiu", true)->count();
        $descurtidas = CurtidaLote::whereIn("lote_id", $reserva->lotes->map->only(['id']))->where("curtiu", false)->count();
        return view("painel.reservas.relatorio", [
            "num_vendas" => $num_vendas,
            "valor_vendas" => $valor_vendas,
            "visitas" => $visitas,
            "curtidas" => $curtidas,
            "descurtidas" => $descurtidas
        ]);
    }
}
