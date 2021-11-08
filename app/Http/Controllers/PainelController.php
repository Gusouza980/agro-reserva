<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use App\Models\Raca;
use App\Models\Cliente;
use App\Models\Visita;
use App\Models\Venda;
use Analytics;
use Spatie\Analytics\Period;

class PainelController extends Controller
{
    //

    public function login(){
        if(session()->get("admin")){
            return redirect()->route("painel.index");
        }
        return view("painel.login");
    }
    
    public function logar(Request $request){
        if(session()->get("admin")){
            return redirect()->route("painel.index");
        }
        $usuario = Usuario::where("usuario", $request->usuario)->first();

        if($usuario && Hash::check($request->senha, $usuario->senha)){
            session()->put(["admin" => $usuario->toArray()]);
            return redirect()->route("painel.index");
        }else{
            toastr()->error("Dados de login incorretos. Tente novamente");
            return redirect()->back();
        }
    }

    public function sair(){
        if(session()->get("admin")){
            session()->forget("admin");
        }
        return redirect()->route("painel.login");
    }

    public function index(){
        // Usuários no site atualmente
        
        $analyticsData = Analytics::getAnalyticsService()->data_realtime->get('ga:' . env('ANALYTICS_VIEW_ID'), 'rt:activeVisitors')->totalsForAllResults['rt:activeVisitors'];
        $analytics["numero_acessos_atuais"] = $analyticsData;

        // ==============================================================================

        // Número de acessos nos últimos 7 dias
        
        $analyticsData = $analyticsData = Analytics::performQuery(
            Period::days(6),
            'ga:sessions',
            [
                'metrics' => 'ga:users, ga:newUsers',
                'dimensions' => 'ga:date'
            ]
        );

        $analytics["numero_acessos"] = $analyticsData->rows;

        // ===============================================================================

        // Melhores origens de acessos ao site

        $analyticsData = $analyticsData = Analytics::fetchTopReferrers(Period::days(6));
        $analytics["top_referencias"] = $analyticsData;

        // ================================================================================

        // Tipos de usuários que acessaram

        $analyticsData = $analyticsData = Analytics::fetchUserTypes(Period::days(6));
        $analytics["tipos_usuarios"] = $analyticsData;
        // =================================================================================

        // Páginas mais visualizadas

        $analyticsData = $analyticsData = Analytics::fetchMostVisitedPages(Period::days(6), 7);
        $analytics["paginas_mais_visualizadas"] = $analyticsData;
        // dd($analytics);
        // ==================================================================================
        $reservas = \App\Models\Reserva::where("ativo", true)->get();
        return view("painel.index", ['reservas' => $reservas, "analytics" => $analytics]);
    }

    public function visitas(Request $request){
        if($request->isMethod('post')){
            $inicio = $request->inicio;
            $fim = $request->fim;
            $inicio_time = $request->inicio . " 00:00:00";
            $fim_time = $request->fim . " 23:59:59";
        }else{
            $inicio = date('Y-m-d', strtotime('-14 days'));
            $fim = date('Y-m-d');
            $inicio_time = date('Y-m-d', strtotime('-14 days')) . " 00:00:00";
            $fim_time = date('Y-m-d') . " 23:59:59";
        }
        $visitas = Visita::whereBetween("created_at", [$inicio_time, $fim_time])->orderBy("created_at", "ASC")->get();
        return view("painel.visitas.consultar", ["visitas" => $visitas, "inicio" => $inicio, "fim" => $fim]);
    }

}
