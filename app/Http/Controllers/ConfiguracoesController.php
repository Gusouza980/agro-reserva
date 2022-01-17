<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeBanner;
use Illuminate\Support\Facades\Storage;

class ConfiguracoesController extends Controller
{
    //
    public function home_banners(){
        $banners = HomeBanner::all();
        return view("painel.configuracoes.banners", ["banners" => $banners]);
    }

    public function home_banners_salvar(Request $request){
        $banner = new HomeBanner;
        $banner->descricao = $request->descricao;
        $banner->prioridade = $request->prioridade;
        if($request->file("caminho")){
            Storage::delete($banner->caminho);
            $banner->caminho = $request->file('caminho')->store(
                'imagens/banners/', 'local'
            );
        }
        if($request->file("caminho_mobile")){
            Storage::delete($banner->caminho_mobile);
            $banner->caminho_mobile = $request->file('caminho_mobile')->store(
                'imagens/banners/', 'local'
            );
        }
        $banner->save();
        return redirect()->back();
    }

    public function home_banners_deletar(HomeBanner $banner){
        Storage::delete($banner->caminho);
        Storage::delete($banner->caminho_mobile);
        $banner->delete();
        return redirect()->back();
    }
}
