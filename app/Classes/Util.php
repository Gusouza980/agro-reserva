<?php

namespace App\Classes;
use Illuminate\Support\Facades\Storage;
use Image;

class Util{

    public static function convertYoutube($string, $aspect = '16/9', $height = ""){
        $iframe = "<iframe class='w-full aspect-video " . $height . "' style='aspect-ratio: " . $aspect . ";' src=\"https://www.youtube.com/embed/$2?version=3&mute=1&controls=1&modestbranding=1&showinfo=0&playsinline=1&enablejsapi=1&rel=0&autoplay=1&loop=1&origin=https%3A%2F%2Fwww.agroreserva.com.br&widgetid=1&playlist=$2\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen data-gtm-yt-inspected-9='true'></iframe>";
        return preg_replace(
            "/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
            $iframe,
            $string
        );
    }

    public static function convertStringToDate($string){
        $year = substr($string, 0, 4);
        $month = substr($string, 4, 2);
        $day = substr($string, 6, 2);

        return $day . "/" . $month . "/" . $year;
    }

    public static function convertDateToString($string){
        $year = substr($string, 6, 4);
        $month = substr($string, 3, 2);
        $day = substr($string, 0, 2);

        return $year . "-" . $month . "-" . $day;
    }

    public static function acesso($setor, $funcao){
        if(in_array(session()->get("admin")["acesso"], config("acessos." . $setor)[$funcao])){
            return true;
        }else{
            return false;
        }
    }

    public static function limparLivewireTemp(){
        $storage = Storage::disk('local');
        foreach($storage->allFiles('livewire-tmp') as $filePathname){
           $stamp = now()->subSeconds(4)->timestamp;
           if($stamp > $storage->lastModified($filePathname)){
               $storage->delete($filePathname);
           }
        }
    }

    public static function limparString($string)
    {
        $string = str_replace(' ', '', $string); // Remove espaços

        return preg_replace('/[^A-Za-z0-9]/', '', $string); // Remove caracteres especiais
    }

    public static function getImagemOuPadrao($caminho){
        if($caminho && Storage::exists($caminho)){
            return asset($caminho);
        }

        return asset('imagens/sem-foto.jpg');
    }

}

?>
