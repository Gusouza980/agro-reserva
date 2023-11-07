<?php

namespace App\Http\Controllers;

use App\Models\LogPagina;
use App\Models\LogPaginaEvento;
use Illuminate\Http\Request;

class LogPaginasController extends Controller
{
    public function create(Request $request){
        if($request->cliente_id != ""){
            $id = $request->cliente_id;
        }else{
            $id = null;
        }
        $log = new LogPagina;
        $log->cliente_id = $id;
        $log->url = $request->url;
        $log->visit_token = $request->visit_token;
        $log->save();
    }

    public function update(Request $request){
        $log = LogPagina::where("visit_token", $request->visit_token)->first();
        $log->segundos = $request->segundos;
        $log->save();
    }

    public function create_evento(Request $request){
        $log = LogPagina::where("visit_token", $request->visit_token)->first();
        $evento = new LogPaginaEvento;
        $evento->log_pagina_id = $log->id;
        $evento->id_elemento = $request->id_elemento;
        $evento->save();
    }
}
