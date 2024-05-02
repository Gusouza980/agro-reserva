<?php

namespace App\Http\Controllers\Sistema;

use App\Http\Controllers\Controller;
use App\Models\Fazenda;
use Illuminate\Http\Request;

class FazendasController extends BaseController
{
    public function consultar()
    {
        return view('sistema.fazendas.consultar');
    }

    public function cadastrar()
    {
        return view('sistema.fazendas.cadastrar');
    }

    public function editar(Fazenda $fazenda)
    {
        return view('sistema.fazendas.editar', compact('fazenda'));
    }

    public function salvar(Request $request)
    {
        if($request->fazenda_id)
        {
            $fazenda = Fazenda::find($request->fazenda_id);
            $fazenda->update($request->except(['_token']));
            $fazenda->save();
        }
        else
        {
            $fazenda = new Fazenda();
            $fazenda->fill($request->except(['_token']));
            $fazenda->save();
        }

        toastr()->success('Fazenda salva com sucesso!');
        return redirect()->route('sistema.fazendas.consultar');
    }
}
