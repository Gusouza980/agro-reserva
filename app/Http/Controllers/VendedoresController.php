<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Support\Facades\Log;

class VendedoresController extends Controller
{
    //
    public function index(){
        $vendedores = Cliente::where("vendedor", true)->get();
        return view("painel.vendedores.consultar", ["vendedores" => $vendedores]);
    }

    public function salvar_informacoes(Request $request, Cliente $cliente){
        $cliente->racas_vender = $request->racas_vender;
        $cliente->vender_registro = $request->vender_registro;

        if($request->fazenda_id == -1){
            $cliente->fazenda_id = null;
        }else{
            $cliente->fazenda_id = $request->fazenda_id;
        }
        
        $cliente->save();

        toastr()->success("Informações salvas com sucesso!");
        return redirect()->back();
    }
}
