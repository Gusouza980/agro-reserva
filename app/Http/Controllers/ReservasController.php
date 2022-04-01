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
use App\Classes\Util;
use Illuminate\Support\Facades\Log;

class ReservasController extends Controller
{

    public function index(Fazenda $fazenda){
        if(!Util::acesso("reservas", "consulta")){
            toastr()->error("Você não tem permissão para acessar essa página");
            return redirect()->back();
        }
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
        Log::channel('reservas')->warning('O usuário <b>' . session()->get("admin")["nome"] . '</b> cadastrou uma reserva pra fazenda ' . $reserva->fazenda->nome_fazenda . '.');
        toastr()->success("Reserva cadastrada com sucesso!");
        return redirect()->back();
    }   

    public function editar(Request $request, Reserva $reserva){
        $reserva->inicio = $request->inicio;
        $reserva->fim = $request->fim;
        $reserva->ativo = $request->ativo;
        $reserva->mostrar_datas = $request->mostrar_datas;
        $reserva->desconto_live_valor = $request->desconto_live_valor;
        $reserva->multi_fazendas = $request->multi_fazendas;
        $reserva->save();
        Log::channel('reservas')->warning('O usuário <b>' . session()->get("admin")["nome"] . '</b> editou a reserva ' . $reserva->id . ' da fazenda ' . $reserva->fazenda->nome_fazenda . '.');
        toastr()->success("Alterações salvas com sucesso!");
        return redirect()->back();
    }   

    public function excluir(Reserva $reserva){
        $reserva->delete();
        toastr()->success("Reserva excluida com sucesso!");
        return redirect()->back();
    }

    public function relatorio(Reserva $reserva){
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
        return $pdf->stream();
    }

    public function relatorio_inicio_definido(Reserva $reserva, $inicio){
        $total_visitas = Visita::where([["logado", true], ['created_at', ">=", $inicio]])->whereIn("lote_id", $reserva->lotes->map->only(['id']))->count();
        $cinco_clientes_mais_visitas = Visita::select("cliente_id", "cidade", "estado", DB::raw("COUNT(*) as visitas"))->where([["logado", true], ['created_at', ">=", $inicio]])->whereIn("lote_id", $reserva->lotes->map->only(['id']))->groupBy(['cliente_id', 'cidade', 'estado'])->orderBy("visitas", "DESC")->limit(5)->get();
        $cinco_clientes_mais_visitas_lotes = Visita::select("cliente_id", "lote_id", DB::raw("COUNT(*) as visitas"))->where([["logado", true], ['created_at', ">=", $inicio]])->whereIn("lote_id", $reserva->lotes->map->only(['id']))->whereIn("cliente_id", $cinco_clientes_mais_visitas->map->only(['cliente_id']))->groupBy(['cliente_id', "lote_id"])->orderBy("cliente_id", "ASC")->orderBy("visitas", "DESC")->get();
        $visitas_lote = Visita::select("lote_id", DB::raw("COUNT(*) as visitas"))->where([["logado", true], ['created_at', ">=", $inicio]])->whereIn("lote_id", $reserva->lotes->map->only(['id']))->groupBy("lote_id")->orderBy("visitas", "DESC")->get();
        $visitas_dia = Visita::select(DB::raw("DATE_FORMAT(created_at, '%d/%m/%Y') as data"), DB::raw("COUNT(*) as visitas"))->where([["logado", true], ['created_at', ">=", $inicio]])->whereIn("lote_id", $reserva->lotes->map->only(['id']))->groupBy("data")->orderBy("data", "ASC")->get();
        $data = [
            "reserva" => $reserva,
            "cinco_clientes_mais_visitas" => $cinco_clientes_mais_visitas,
            "cinco_clientes_mais_visitas_lotes" => $cinco_clientes_mais_visitas_lotes,
            "visitas_dia" => $visitas_dia,
            "visitas_lote" => $visitas_lote,
            "total_visitas" => $total_visitas,
        ];
        $file = "Relatório de visitas da reserva da fazenda " . $reserva->fazenda->nome_fazenda . " gerado no dia " . date("d/m/Y"). ".";
        $pdf = PDF::loadView('painel.reservas.pdf.relatorio2', $data);
        return $pdf->stream();
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

    public function relatorio_vendas(Reserva $reserva){
        $carrinhos = Carrinho::whereHas("lotes", function($q) use ($reserva){
            $q->whereIn("lotes.id", $reserva->lotes->pluck("id"));
        })->get();
        $vendas = Venda::whereIn("carrinho_id", $carrinhos->pluck("id"))->get();
        // dd($vendas);
        $data = [
            "reserva" => $reserva,
            "vendas" => $vendas
        ];
        $pdf = PDF::loadView('cliente.relatorios.vendas2', $data);
        return $pdf->stream();
    }
}
