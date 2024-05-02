<?php

namespace App\Http\Controllers\Sistema;

use App\Http\Controllers\Controller;
use App\Models\Noticia;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class NoticiasController extends BaseController
{
    public function consultar()
    {
        return view("sistema.noticias.consultar");
    }

    public function cadastrar()
    {
        return view("sistema.noticias.cadastrar");
    }

    public function editar(Noticia $noticia)
    {
        return view("sistema.noticias.editar", ["noticia" => $noticia]);
    }

    public function salvar(Request $request)
    {
        if($request->noticia_id)
        {
            $noticia = Noticia::find($request->noticia_id);
        }else{
            $noticia = new Noticia;
        }

        libxml_use_internal_errors(true);

        $noticia->usuario_id = session()->get("admin");
        $noticia->titulo = $request->titulo;
        $noticia->subtitulo = $request->subtitulo;
        $noticia->slug = Str::slug($noticia->titulo);
        $noticia->conteudo = $request->conteudo;
        $noticia->categoria_id = $request->categoria_id;

        $dom = new \DOMDocument();
        $dom->loadHTML(
            mb_convert_encoding($noticia->conteudo, 'HTML-ENTITIES', 'UTF-8'),
            LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD
        );

        $images = $dom->getElementsByTagName('img');

        foreach ($images as $count => $image) {
            $src = $image->getAttribute('src');

            if (preg_match('/data:image/', $src)) {
                preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                $mimeType = $groups['mime'];
                if(!is_dir('imagens/noticias/')){
                    mkdir('imagens/noticias/');
                }
                if(!is_dir('imagens/noticias/' . Str::slug($noticia->titulo) . "/")){
                    mkdir('imagens/noticias/' . Str::slug($noticia->titulo) . "/");
                }
                $path = 'imagens/noticias/' . Str::slug($noticia->titulo) . "/" . uniqid('', true) . '.' . $mimeType;

                Image::make($src)
                    ->encode($mimeType, 80)
                    ->save(public_path($path));

                $image->removeAttribute('src');
                $image->setAttribute('src', asset($path));
            }
        }

        $noticia->conteudo = $dom->saveHTML();

        $noticia->save();

        toastr()->success("Notícia salva com sucesso!");

        return redirect()->route("sistema.noticias.consultar");
    }
}
