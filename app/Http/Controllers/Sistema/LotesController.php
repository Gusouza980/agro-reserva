<?php

namespace App\Http\Controllers\Sistema;

use App\Classes\ImageUpload;
use App\Http\Controllers\Controller;
use App\Imports\LotesImport;
use App\Models\Fazenda;
use App\Models\Lote;
use Illuminate\Http\Request;
use App\Models\Reserva;
use Exception;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class LotesController extends BaseController
{
    //
    public function consultar(Reserva $reserva)
    {
        return view("sistema.lotes.consultar", ["reserva" => $reserva]);
    }

    public function importar(Reserva $reserva, Request $request)
    {
        if ($request->file("planilha")) {
            $caminho = $request->file('planilha')->store(
                'tmp_planilha/',
                'local'
            );
        }

        try {
            Excel::import(new LotesImport($request->campos, $reserva->id, $reserva->fazenda_id), $caminho);

            Storage::delete($caminho);

            $lotes = Lote::where("reserva_id", $reserva->id)->get();
            foreach ($lotes as $lote) {
                $lote->produto()->create([
                    "nome" => $lote->nome,
                    "preco" => ($lote->preco) ? $lote->preco : 0
                ]);
            }

            toastr()->success("Lotes importados com sucesso!");
        } catch (Exception $e) {
            toastr()->error($e->getMessage(), "Erro ao importar lotes!");
        }

        return redirect()->route('sistema.lotes.consultar', $reserva);
    }

    public function cadastro(Reserva $reserva)
    {
        return view("sistema.lotes.cadastro", ["reserva" => $reserva]);
    }

    public function edicao(Reserva $reserva, Lote $lote)
    {
        return view("sistema.lotes.edicao", ["reserva" => $reserva, "lote" => $lote]);
    }

    public function editar(Request $request, Reserva $reserva, Lote $lote)
    {
        $dados = $request->all();
        $fazenda = Fazenda::find($request->fazenda_id);
        if(!$fazenda){
            toastr()->error("Código da fazenda inválido!", "Erro ao editar lote!");
            return redirect()->back();
        }
        try {
            $lote->update($dados);
            toastr()->success("Lote salvo com sucesso!");
            return redirect()->route('sistema.lotes.consultar', $reserva);
        } catch (Exception $e) {
            toastr()->error($e->getMessage(), "Erro ao editar lote!");
            return redirect()->back();
        }
    }

    public function cadastrar(Request $request, Reserva $reserva)
    {
        $dados['reserva_id'] = $reserva->id;
        $dados['fazenda_id'] = $reserva->fazenda_id;
        $dados = array_merge($dados, $request->all());
        try {
            $lote = Lote::create($dados);
            return redirect()->route('sistema.lotes.consultar', $reserva);
        } catch (Exception $e) {
            toastr()->error($e->getMessage(), "Erro ao cadastrar lote!");
            return redirect()->back()->withInput();
        }
    }

    public function importacao(Reserva $reserva)
    {
        return view("sistema.lotes.importacao", ["reserva" => $reserva]);
    }

    public function importacao_imagens(Reserva $reserva)
    {
        $lotes = Lote::where("reserva_id", $reserva->id)->get();
        return view("sistema.lotes.imagens", ["reserva" => $reserva, "lotes" => $lotes]);
    }

    public function importar_imagens(Request $request, Reserva $reserva)
    {
        $lotes = $request->lotes;
        sort($lotes);
        // dd($request->all());
        foreach ($lotes as $key => $id) {
            $lote = Lote::find($id);
            if ($lote->preview) {
                Storage::delete($lote->preview);
            }
            // CRIA UMA IMAGEM NO FORMATO DE AVATAR E SALVA NO CLIENTE
            $image = new ImageUpload($request->arquivos[$key]);
            $image->makeLote();
            $lote->preview = $image->save("uploads");
            $lote->save();
        }

        toastr()->success("Imagens importadas com sucesso!");
        return redirect()->route('sistema.lotes.consultar', $reserva);
    }
}
