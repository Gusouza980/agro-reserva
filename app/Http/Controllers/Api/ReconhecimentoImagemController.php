<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use thiagoalessio\TesseractOCR\TesseractOCR;

class ReconhecimentoImagemController extends Controller
{
    public function verificarIdentidade(){
        $imagePath = asset('teste_documento.png');
        $text = (new TesseractOCR($imagePath))->run();
        dd($text);
    }
}
