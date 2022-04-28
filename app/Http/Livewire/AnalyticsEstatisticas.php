<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Analytics;
use Spatie\Analytics\Period;
use Illuminate\Support\Carbon;

class AnalyticsEstatisticas extends Component
{

    public $inicio;
    public $fim;

    public function filtrar(){
        $this->dispatchBrowserEvent("loading");
        $this->emit('$refresh');
    }

    public function render()
    {
        if($this->inicio && $this->fim){
            $periodo = Period::create(new Carbon($this->inicio), new Carbon($this->fim));
            $periodo_texto = "Entre " . date("d/m/Y", strtotime($this->inicio)) . " e " . date("d/m/Y", strtotime($this->fim)); 
        }else{
            $periodo = Period::days(6);
            $periodo_texto = "Últimos 7 dias"; 
        }

        // Usuários no site atualmente
        $analyticsData = Analytics::getAnalyticsService()->data_realtime->get('ga:' . '238141456', 'rt:activeVisitors')->totalsForAllResults['rt:activeVisitors'];
        $analytics["numero_acessos_atuais"] = $analyticsData;

        // ==============================================================================

        // Número de acessos nos últimos 7 dias
        
        $analyticsData = $analyticsData = Analytics::performQuery(
            $periodo,
            'ga:sessions',
            [
                'metrics' => 'ga:users, ga:newUsers',
                'dimensions' => 'ga:date'
            ]
        );

        $analytics["numero_acessos"] = $analyticsData->rows;

        // ===============================================================================

        // Melhores origens de acessos ao site

        $analyticsData = $analyticsData = Analytics::fetchTopReferrers($periodo, 7);
        $analytics["top_referencias"] = $analyticsData;

        // ================================================================================

        // Tipos de usuários que acessaram

        $analyticsData = $analyticsData = Analytics::fetchUserTypes($periodo);
        $analytics["tipos_usuarios"] = $analyticsData;
        // =================================================================================

        // Páginas mais visualizadas

        $analyticsData = $analyticsData = Analytics::fetchMostVisitedPages($periodo, 7);
        $analytics["paginas_mais_visualizadas"] = $analyticsData;
        // dd($analytics);
        // ==================================================================================
        return view('livewire.analytics-estatisticas', ["analytics" => $analytics, "periodo_texto" => $periodo_texto]);
    }
}
