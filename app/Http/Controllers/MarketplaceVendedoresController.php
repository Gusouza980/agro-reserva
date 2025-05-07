<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MarketplaceVendedor;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Image;

class MarketplaceVendedoresController extends Controller
{
    //

    public function consultar(){
        $vendedores = MarketplaceVendedor::all();
        return view("painel.marketplace.vendedores.consultar", ['vendedores' => $vendedores]);
    }

    public function cadastrar(){
        return view("painel.marketplace.vendedores.cadastrar");
    }

    public function editar(MarketplaceVendedor $vendedor){
        return view("painel.marketplace.vendedores.editar", ['vendedor' => $vendedor]);
    }

    public function salvar(Request $request){
        if($request->marketplace_vendedor_id){
            $vendedor = MarketplaceVendedor::find($request->marketplace_vendedor_id);
        }else{
            $vendedor = new MarketplaceVendedor;
        }

        $vendedor->nome = $request->nome;
        $vendedor->slug = Str::slug($request->nome);
        $vendedor->email = $request->email;
        $vendedor->cnpj = $request->cnpj;
        $vendedor->telefone = $request->telefone;
        $vendedor->segmento = $request->segmento;
        $vendedor->rua = $request->rua;
        $vendedor->numero = $request->numero;
        $vendedor->bairro = $request->bairro;
        $vendedor->cidade = $request->cidade;
        $vendedor->estado = $request->estado;
        $vendedor->localizacao = $request->localizacao;
        $vendedor->cep = $request->cep;
        if($request->file("logo")){
            Storage::delete($vendedor->logo);
            $vendedor->logo = $request->file('logo')->store(
                'imagens/vendedores/', 'local'
            );
        }
        if($request->file("banner")){
            Storage::delete($vendedor->banner);
            $vendedor->banner = $request->file('banner')->store(
                'imagens/vendedores/', 'local'
            );
        }

        $dom = new \DOMDocument();
        $dom->loadHTML(
            mb_convert_encoding($request->sobre, 'HTML-ENTITIES', 'UTF-8'),
            LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD
        );

        $images = $dom->getElementsByTagName('img');

        foreach ($images as $count => $image) {
            $src = $image->getAttribute('src');

            if (preg_match('/data:image/', $src)) {
                preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                $mimeType = $groups['mime'];
                if(!is_dir('imagens/')){
                    mkdir('imagens/');
                }
                if(!is_dir('imagens/')){
                    mkdir('imagens/');
                }
                $path = 'imagens/' . uniqid('', true) . '.' . $mimeType;

                Image::make($src)
                    ->encode($mimeType, 80)
                    ->save(public_path($path));

                $image->removeAttribute('src');
                $image->setAttribute('src', asset($path));
            }
        }

        $vendedor->sobre = $dom->saveHTML();

        $vendedor->save();
        return redirect()->route("painel.marketplace.vendedores");
    }

}
