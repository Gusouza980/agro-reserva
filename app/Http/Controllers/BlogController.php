<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Noticia;

class BlogController extends Controller
{
    //

    public function index(){
        return view("blog");
    }

    public function noticia($slug){
        $noticia = Noticia::where("slug", $slug)->first();
        return view("noticia", ["noticia" => $noticia]);
    }
}
