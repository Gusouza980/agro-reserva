<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cidade;
use App\Models\Lote;
use App\Models\InteresseLote;
use App\Models\CurtidaLote;
use App\Models\Venda;

class ApiController extends Controller
{
    //

    public function getCidadesByUf($uf){
        $cidades = Cidade::where("id_estado", $uf)->get();
        return response()->json($cidades->toJson());   
    }

    public function calcDistanciaCep(Request $request){
        $res = file_get_contents("https://maps.googleapis.com/maps/api/distancematrix/json?origins=" . $request->origem . "&destinations=" . $request->destino . "&mode=driving&language=pt-BR&sensor=false&key=AIzaSyCDJEB7uVGEkVU0Utm3p9kOeCnastPy01o");
        return response()->json($res);
    }

    public function declararInteresseLote(Lote $lote){
        $interesse = InteresseLote::where([["cliente_id", session()->get("cliente")["id"]], ["lote_id", $lote->id]])->first();
        if($interesse){
            $interesse->delete();
            return response()->json("retirado");
        }else{
            $interesse = new InteresseLote;
            $interesse->cliente_id = session()->get("cliente")["id"];
            $interesse->lote_id = $lote->id;
            $interesse->save();
            return response()->json("adicionado");
        }
    }

    public function curtirLote(Lote $lote){
        $curtida = CurtidaLote::where([["cliente_id", session()->get("cliente")["id"]], ["lote_id", $lote->id]])->first();
        if($curtida){
            if($curtida->curtiu == true){
                $curtida->delete();
                return response()->json("retirado");
            }else{
                $curtida->curtiu = true;
                $curtida->save();
                return response()->json("trocado");
            }
        }else{
            $curtida = new CurtidaLote;
            $curtida->cliente_id = session()->get("cliente")["id"];
            $curtida->lote_id = $lote->id;
            $curtida->curtiu = true;
            $curtida->save();
            return response()->json("marcado");
        }
    }

    public function descurtirLote(Lote $lote){
        $curtida = CurtidaLote::where([["cliente_id", session()->get("cliente")["id"]], ["lote_id", $lote->id]])->first();
        if($curtida){
            if($curtida->curtiu == false){
                $curtida->delete();
                return response()->json("retirado");
            }else{
                $curtida->curtiu = false;
                $curtida->save();
                return response()->json("trocado");
            }
        }else{
            $curtida = new CurtidaLote;
            $curtida->cliente_id = session()->get("cliente")["id"];
            $curtida->lote_id = $lote->id;
            $curtida->curtiu = false;
            $curtida->save();
            return response()->json("marcado");
        }
    }

    public function trocaStatusVenda(Venda $venda, $status){
        $venda->situacao = $status;
        if(config("globals.situacoes")[$venda->situacao] == "Cancelado"){
            $venda->lote->reservado = false;
            $venda->lote->save();
        }
        $venda->save();
        return response()->json($status);
    }
}
