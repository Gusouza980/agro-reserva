<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Noticia;
use App\Models\Categoria;
use Illuminate\Support\Facades\Log;

class BlogController extends Controller
{
    //

    public function index(Request $request, $slug = null){
        if($request->isMethod("post")){
            $noticias = Noticia::where([["publicada", true], ["titulo", "like", "%".$request->pesquisa."%"]])->orderBy("created_at", "DESC")->paginate(6);
            $mais_visitadas = Noticia::where("publicada", true)->orderBy("visualizacoes", "DESC")->take(3)->get();
            return view("blog", ["noticias" => $noticias, "pesquisa" => $request->pesquisa, "mais_visitadas" => $mais_visitadas]);
        }else{
            if($slug){
                $categoria = Categoria::where("slug", $slug)->first();
                if(!$categoria){
                    return redirect()->route('blog');
                }
                $noticias = Noticia::where([["publicada", true], ["categoria_id", $categoria->id]])->orderBy("created_at", "DESC")->paginate(6);
                $mais_visitadas = Noticia::where("publicada", true)->orderBy("visualizacoes", "DESC")->take(3)->get();
                return view("blog", ["noticias" => $noticias, "mais_visitadas" => $mais_visitadas]);
            }else{
                $noticias = Noticia::where("publicada", true)->orderBy("created_at", "DESC")->paginate(6);
                $mais_visitadas = Noticia::where("publicada", true)->orderBy("visualizacoes", "DESC")->take(3)->get();
                return view("blog", ["noticias" => $noticias, "mais_visitadas" => $mais_visitadas]);
            }
        }
    }

    public function noticia($slug){
        $noticia = Noticia::where("slug", $slug)->first();
        if(!$noticia){
            toastr()->error('Noticia não encontrada');
            return redirect()->route('blog');
        }
        $noticia->visualizacoes++;
        $noticia->save();
        return view("noticia", ["noticia" => $noticia]);
    }
}
