<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;
use App\Models\Fazenda;
use App\Models\Venda;
use App\Models\Visita;
use App\Models\CurtidaLote;
use Illuminate\Support\Facades\DB;
use PDF;

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
        $reserva->desconto_live_valor = $request->desconto_live_valor;
        $reserva->aberto = false;
        $reserva->multi_fazendas = $request->multi_fazendas;
        $reserva->preco_disponivel = false;
        $reserva->compra_disponivel = false;
        $reserva->save();
        toastr()->success("Reserva cadastrada com sucesso!");
        return redirect()->back();
    }   

    public function editar(Request $request, Reserva $reserva){
        $reserva->inicio = $request->inicio;
        $reserva->fim = $request->fim;
        $reserva->ativo = $request->ativo;
        $reserva->desconto_live_valor = $request->desconto_live_valor;
        $reserva->multi_fazendas = $request->multi_fazendas;
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
            "descurtidas" => $descurtidas,
            "reserva" => $reserva
        ]);
    }

    public function relatorio_pdf(Reserva $reserva){
        $total_visitas = Visita::whereIn("lote_id", $reserva->lotes->map->only(['id']))->count();
        $cinco_clientes_mais_visitas = Visita::select("cliente_id", DB::raw("COUNT(*) as visitas"))->whereIn("lote_id", $reserva->lotes->map->only(['id']))->groupBy('cliente_id')->orderBy("visitas", "DESC")->limit(5)->get();
        $cinco_clientes_mais_visitas_lotes = Visita::select("cliente_id", "lote_id", DB::raw("COUNT(*) as visitas"))->whereIn("lote_id", $reserva->lotes->map->only(['id']))->whereIn("cliente_id", $cinco_clientes_mais_visitas->map->only(['cliente_id']))->groupBy(['cliente_id', "lote_id"])->orderBy("cliente_id", "ASC")->orderBy("visitas", "DESC")->get();
        $visitas_lote = Visita::select("lote_id", DB::raw("COUNT(*) as visitas"))->whereIn("lote_id", $reserva->lotes->map->only(['id']))->groupBy("lote_id")->orderBy("visitas", "DESC")->get();
        $visitas_dia = Visita::select(DB::raw("DATE_FORMAT(created_at, '%d/%m/%Y') as data"), DB::raw("COUNT(*) as visitas"))->whereIn("lote_id", $reserva->lotes->map->only(['id']))->groupBy("data")->orderBy("data", "ASC")->get();
        $data = [
            "reserva" => $reserva,
            "cinco_clientes_mais_visitas" => $cinco_clientes_mais_visitas,
            "cinco_clientes_mais_visitas_lotes" => $cinco_clientes_mais_visitas_lotes,
            "visitas_dia" => $visitas_dia,
            "visitas_lote" => $visitas_lote,
            "total_visitas" => $total_visitas,
        ];
        $pdf = PDF::loadView('painel.reservas.pdf.relatorio', $data);
        return $pdf->stream();
    }

    public function abertura(Reserva $reserva){
        if($reserva->aberto){
            $reserva->aberto = false;
            toastr()->success("Reserva aberta !");
        }else{
            $reserva->aberto = true;
            toastr()->success("Reserva fechada !");
        }
        $reserva->save();
        return redirect()->back();
    }

    public function preco(Reserva $reserva){
        if($reserva->preco_disponivel){
            $reserva->preco_disponivel = false;
            toastr()->success("Preços liberados !");
        }else{
            $reserva->preco_disponivel = true;
            toastr()->success("Preços ocultados !");
        }
        $reserva->save();
        return redirect()->back();
    }

    public function compras(Reserva $reserva){
        if($reserva->compra_disponivel){
            $reserva->compra_disponivel = false;
            toastr()->success("Compras liberadas !");
        }else{
            $reserva->compra_disponivel = true;
            toastr()->success("Compras bloqueadas !");
        }
        $reserva->save();
        return redirect()->back();
    }
}
