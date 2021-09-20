<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Popup;
use App\Models\PopupVisualizacao;

class MostrarPopup
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // if(!session()->get("popup")){
            if(session()->get("cliente")){
                if(session()->get("cliente")["finalizado"]){
                    $popup = Popup::where([["ativo", true], ["inicio", "<=", date("Y-m-d")], ["fim", ">=", date("Y-m-d")], ["finalizado", true]])->first();
                }else{
                    $popup = Popup::where([["ativo", true], ["inicio", "<=", date("Y-m-d")], ["fim", ">=", date("Y-m-d")], ["precadastro", true]])->first();
                }
                
                if($popup){
                    $visualizacao = PopupVisualizacao::where([["popup_id", $popup->id], ["cliente_id", session()->get("cliente")["id"]]])->first();
                    if(!$visualizacao){
                        session()->flash("ver_popup", $popup->imagem);
                        $visualizacao = new PopupVisualizacao;
                        $visualizacao->cliente_id = session()->get("cliente")["id"];
                        $visualizacao->popup_id = $popup->id;
                        $visualizacao->save();
                    }else{
                        session()->forget("ver_popup");
                        // session()->put(["popup" => "visualizado"]);
                    }
                }
                
            }else{
                $popup = Popup::where([["ativo", true], ["inicio", "<=", date("Y-m-d")], ["fim", ">=", date("Y-m-d")], ["visitante", true]])->first();
                if($popup){
                    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
                        //ip from share internet
                        $ip = $_SERVER['HTTP_CLIENT_IP'];
                    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
                        //ip pass from proxy
                        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                    }else{
                        $ip = $_SERVER['REMOTE_ADDR'];
                    }
                    $visualizacao = PopupVisualizacao::where([["popup_id", $popup->id], ["ip", $ip]])->first();
                    if(!$visualizacao){
                        session()->flash("ver_popup", $popup->imagem);
                        $visualizacao = new PopupVisualizacao;
                        $visualizacao->ip = $ip;
                        $visualizacao->popup_id = $popup->id;
                        $visualizacao->save();
                    }else{
                        session()->forget("ver_popup");
                        // session()->put(["popup" => "visualizado"]);
                    }
                }
            }
        // }
        return $next($request);
    }
}
