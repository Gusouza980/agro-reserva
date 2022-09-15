<?php

namespace App\Classes;
use Illuminate\Support\Facades\Storage;
use Image;

class Util{
    
    public static function convertYoutube($string, $aspect = '16/9', $full_height = false){
        return preg_replace(
            "/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
            "<iframe class='w-full aspect-video ".($full_height) ? "h-full" : "" ."' style='aspect-ratio: " . $aspect . ";' src=\"https://www.youtube.com/embed/$2?&autoplay=1\" frameborder=\"0\" allow=\"accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>",
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

}

?>
