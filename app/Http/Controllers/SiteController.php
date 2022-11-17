<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fazenda;
use App\Models\Reserva;
use App\Models\Cliente;
use App\Models\Lote;
use App\Models\Raca;
use App\Models\Embriao;
use App\Models\Visita;
use App\Models\Carrinho;
use App\Models\Lance;
use App\Models\HomeBanner;
use App\Models\CarrinhoProduto;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use App\Models\Configuracao;
use \App\Classes\Util;
use Cookie;
use Analytics;
use Spatie\Analytics\Period;
use Jenssegers\Agent\Agent;
use Illuminate\Support\Facades\Log;
use Alaouy\Youtube\Facades\Youtube;
use Goutte;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class SiteController extends Controller
{

    public function testes(){
        // $crawler = Goutte::request('GET', 'https://www.scotconsultoria.com.br/cotacoes/vaca-gorda/?ref=smnb');
        // $res = $crawler->filter('table')->first()->html();
        // return view("teste", ["html" => $res]);

        $lotes = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57);
        $pais = array("BIG FIV CAL", "EDANK TE JABAQUARA", "MORNINGVIEW MCC KINGBOY-ET", "WESTCOAST LIGHTHOUSE", "SANDY-VALLEY DREAMWEAVER-ET", "VIEW-HOME CARDINALS-ET", "PEAK ALTASTARJACK-ET", "MORNINGVIEW MCC KINGBOY-ET", "S-S-I MODESTY PINNACLE-ET", "BLUMENFELD FRAZLD BRASS-ET", "PEAK ALTASEVERINO-ET", "BACON-HILL MONTROSS-ET", "PEAK ALTAHOTJOB-ET", "BACON-HILL MONTROSS-ET", "REGANCREST MCCUTCH 10497-ET", "ANTONIONE FIV CABO VERDE", "LADYS-MANOR WILDMAN-ET", "MORNINGVIEW MCC KINGBOY-ET", "PEAK ALTASTARJACK-ET", "BACON-HILL MONTROSS-ET", "PEAK ALTASTARJACK-ET", "BACON-HILL MONTROSS-ET", "PEAK ALTASTARJACK-ET", "PROGÊNESIS TOPNOTCH", "GABINETE SILVÂNIA", "ANTONIONE FIV CABO VERDE", "PEAK ALTASTARJACK-ET", "S-S-I MONTROSS JEDI-ET", "PEAK ALTADATELINE-ET", "SANDY-VALLEY DREAMWEAVER-ET", "S-S-I MODESTY PINNACLE-ET", "PEAK ALTARECOIL-ET", "PEAK ALTASTARJACK-ET", "S-S-I MODESTY PINNACLE-ET", "BLUMENFELD FRAZLD BRASS-ET", "BLUMENFELD FRAZLD BRASS-ET", "PEAK ALTAGOPRO-ET", "PEAK ALTAGOPRO-ET", "N-SPRINGHOPE HONDA-ET", "CO-OP ALTAFAVIAN-ET", "ANTONIONE FIV CABO VERDE", "N-SPRINGHOPE HONDA-ET", "N-SPRINGHOPE HONDA-ET", "N-SPRINGHOPE HONDA-ET", "N-SPRINGHOPE HONDA-ET", "N-SPRINGHOPE HONDA-ET", "PEAK ALTAGOPRO-ET", "BLUMENFELD FRAZLD BRASS-ET", "BLUMENFELD FRAZLD BRASS-ET", "DE-SU FRAZZ TAHITI 14104-ET", "BLUMENFELD FRAZLD BRASS-ET", "DE-SU FRAZZ TAHITI 14104-ET", "DE-SU FRAZZ TAHITI 14104-ET", "DE-SU FRAZZ TAHITI 14104-ET", "BLUMENFELD FRAZLD BRASS-ET", "BLUMENFELD FRAZLD BRASS-ET", "BACON-HILL MONTROSS-ET");
        $avo_paterno = array("MODELO TE DE BRASÍLIA", "TABÚ TE CA", "DE-SU BKM MCCUTCHEN 1174-ET", "WESTENRADE ALTASPRING", "SEAGULL-BAY SUPERSIRE-ET", "WOODCREST MOGUL YODER-ET", "S-S-I MONTROSS JEDI-ET", "DE-SU BKM MCCUTCHEN 1174-ET", "BACON-HILL PETY MODESTY-ET", "MELARRY JOSUPER FRAZZLED-ET", "PEAK ALTAAMULET-ET", "MOUNTFIELD SSI DCY MOGUL-ET", "PEAK HOTLINE-ET", "MOUNTFIELD SSI DCY MOGUL-ET", "DE-SU BKM MCCUTCHEN 1174-ET", "C.A.SANSÃO", "MARA-THON BW MARSHALL-ET", "DE-SU BKM MCCUTCHEN 1174-ET", "S-S-I MONTROSS JEDI-ET", "MOUNTFIELD SSI DCY MOGUL-ET", "S-S-I MONTROSS JEDI-ET", "MOUNTFIELD SSI DCY MOGUL-ET", "S-S-I MONTROSS JEDI-ET", "S-S-I MONTROSS JEDI-ET", "DOM TE DA SILVÂNIA", "C.A.SANSÃO", "S-S-I MONTROSS JEDI-ET", "BACON-HILL MONTROSS-ET", "PEAK HOTLINE-ET", "SEAGULL-BAY SUPERSIRE-ET", "BACON-HILL PETY MODESTY-ET", "WESTENRADE ALTASPRING", "S-S-I MONTROSS JEDI-ET", "BACON-HILL PETY MODESTY-ET", "MELARRY JOSUPER FRAZZLED-ET", "MELARRY JOSUPER FRAZZLED-ET", "AOT SILVER HELIX-ET", "AOT SILVER HELIX-ET", "FUSTEAD TANGO LYLAS-ET", "AARDEMA RADICAL-ET", "C.A.SANSÃO", "FUSTEAD TANGO LYLAS-ET", "FUSTEAD TANGO LYLAS-ET", "FUSTEAD TANGO LYLAS-ET", "FUSTEAD TANGO LYLAS-ET", "FUSTEAD TANGO LYLAS-ET", "AOT SILVER HELIX-ET", "MELARRY JOSUPER FRAZZLED-ET", "MELARRY JOSUPER FRAZZLED-ET", "MELARRY JOSUPER FRAZZLED-ET", "MELARRY JOSUPER FRAZZLED-ET", "MELARRY JOSUPER FRAZZLED-ET", "MELARRY JOSUPER FRAZZLED-ET", "MELARRY JOSUPER FRAZZLED-ET", "MELARRY JOSUPER FRAZZLED-ET", "MELARRY JOSUPER FRAZZLED-ET", "MOUNTFIELD SSI DCY MOGUL-ET");
        $avo_paterna = array("JULIANA CAL", "HIRANA FIV DE BRASÍLIA", "MORNINGVIEW SUPER MEGAN-ET", "CALBRETT DISTINCTION LOLITA", "SANDY-VALLEY DAY DREAM-ET", "VIEW-HOME MCC ALABAMA-ET", "TRIPLECROWN-AL DIVINE-ET", "MORNINGVIEW SUPER MEGAN-ET", "S-S-I MONT 8679 10721-ET", "BLUMENFELD 4508 SPR 5054-ET", "NFG-ST SIDNEY MEG 54685-ET", "UNIQUE-STYLE BOLTON MONEY", "T-SPRUCE JOSETTE-ET", "UNIQUE-STYLE BOLTON MONEY", "REGANCREST DORCY BENISHEY", "FÁBRICA FIV DE BRASÍLIA", "LADYS-MANOR WYNONA-ET", "MORNINGVIEW SUPER MEGAN-ET", "TRIPLECROWN-AL DIVINE-ET", "UNIQUE-STYLE BOLTON MONEY", "TRIPLECROWN-AL DIVINE-ET", "UNIQUE-STYLE BOLTON MONEY", "TRIPLECROWN-AL DIVINE-ET", "IHG LOTTOMAX TÂNIA-ET", "AMETISTA DA SILVÂNIA", "FÁBRICA FIV DE BRASÍLIA", "TRIPLECROWN-AL DIVINE-ET", "S-S-I SUPERSIRE MIRI 8679-ET", "MINNIGAN-HILLS DARLA-ET", "SANDY-VALLEY DAY DREAM-ET", "S-S-I MONT 8679 10721-ET", "BLUMENFELD JACEY 4471-ET", "TRIPLECROWN-AL DIVINE-ET", "S-S-I MONT 8679 10721-ET", "BLUMENFELD 4508 SPR 5054-ET", "BLUMENFELD 4508 SPR 5054-ET", "COOKIECUTTER HATTIE-ET", "COOKIECUTTER HATTIE-ET", "COOKIECUTTER MROS HAVANA-ET", "CO-OP-FRAZZLED 8114 8561-ET", "FÁBRICA FIV DE BRASÍLIA", "COOKIECUTTER MROS HAVANA-ET", "COOKIECUTTER MROS HAVANA-ET", "COOKIECUTTER MROS HAVANA-ET", "COOKIECUTTER MROS HAVANA-ET", "COOKIECUTTER MROS HAVANA-ET", "COOKIECUTTER HATTIE-ET", "BLUMENFELD 4508 SPR 5054-ET", "BLUMENFELD 4508 SPR 5054-ET", "DE-SU DELTA 4900-ET", "BLUMENFELD 4508 SPR 5054-ET", "DE-SU DELTA 4900-ET", "DE-SU DELTA 4900-ET", "DE-SU DELTA 4900-ET", "BLUMENFELD 4508 SPR 5054-ET", "BLUMENFELD 4508 SPR 5054-ET", "UNIQUE-STYLE BOLTON MONEY");
        $mae = array("OLIVEIRA FIV DE BRASÍLIA", "FLORINDA FIV CAL", "MELISSA VALE OURO BOA FÉ", "GRAXA TEATRO FIV DA BOA FÉ", "GRAXA TEATRO FIV DA BOA FÉ", "ITAPENA TEATRO FIV BOA FÉ", "ESPORA UBRAIA ICEBERG NOVA TERRA", "MELISSA VALE OURO BOA FÉ", "GRAXA TEATRO FIV DA BOA FÉ", "KIRA FARDO BOA FÉ", "TÉIA RHOELANDT 1253 EBONY FIV BOA FÉ", "IANTRA GENGIS KHAN DA BOA FÉ", "GRAXA TEATRO FIV DA BOA FÉ", "LAIMANA RHOELANDT 647 BESSIE FIV BOA FÉ", "LISA RHOELANDT 162 PROVINCIANA FIV BOA FÉ", "POITARA BIANCA BRAXTON-TE", "DRACENA FIV POSITIVA", "SOJA II DE BRASÍLIA", "CORONA CHITARA FIV", "BABALU FIV DA PALMA", "MIRAGEM FIV CAL", "MILONGA FIV OVB", "POSITAVA FIV KUBERA", "FITA FIV TERRAMATA", "MONIQUE TEATRO FIV BOA FÉ", "ENGENHO DA RAINHA BALILLA TN BOA FÉ", "ITAPENA TEATRO FIV BOA FÉ", "PAISAGEM DIAMANTE FIV BOA FÉ", "ROSELY DIAMANTE BOA FÉ", "ENGENHO DA RAINHA BALILLA TN BOA FÉ", "TRINIDY RHOELANDT 1496 GERARD FIV BOA FÉ", "ETIQUETA UBRAIA ICEBERG NOVA TERRA", "JAPA CASTELO 917 DIANA FIV BOA FÉ", "TRINIDY RHOELANDT 1496 GERARD FIV BOA FÉ", "TRINIDY RHOELANDT 1496 GERARD FIV BOA FÉ", "JANELA RHOELAND 613 LEDA FIV BOA FÉ", "RHIANA FIV JACURUTU", "BABALU FIV DA PALMA", "BABALU FIV DA PALMA", "RUVA FIV VILA RICA", "JANELA RHOELAND 613 LEDA FIV BOA FÉ", "ITAPENA TEATRO FIV BOA FÉ", "FRANÇA TE SANSÃO RPM SANTO ANTÔNIO", "ELEITA TOYSTORY DAS ARÁBIAS", "LAIMANA RHOELANDT 647 BESSIE FIV BOA FÉ", "LAIMANA RHOELANDT 647 BESSIE FIV BOA FÉ", "MIRELA CASTELO FIV BOA FÉ", "DIANA ARETHUSA CASTELO NOVA TERRA", "EMMA FIV WILDMAN MY", "ELEITA TOYSTORY DAS ARÁBIAS", "INDIRA RHOELANDT 479 GERARD FIV BOA FÉ", "ETIQUETA UBRAIA ICEBERG NOVA TERRA", "3707 FARGO FIV BOA FÉ", "TINALI WILDMAN FIV BOA FÉ", "KIRA FARDO BOA FÉ", "8226 VILAREJO", "LIDIANE RHOELANDT 979 BESSIE FIV BOA FÉ");
        $rgd_mae = array("RRP7872", "CAL10694", "2216U", "9112Z", "9112Z", "8647K", "RGD 7915Y", "2216U", "9112Z", "RGD 2572P", "4662AI", "8490K", "9112Z", "RGD 2814N", "2549P", "BX443147", "BEZR100", "RRP7197", "AFYC136", "JDRB3294", "CAL11441", "OVBG96", "ACFG2357", "TMAL62", "9169U", "6014AP", "8647K", "8720AF", "2675AW", "6014AP", "4666AI", "7897Y", "7119AG", "4666AI", "4666AI", "2589P", "RMM644", "JDRB3294", "JDRB3294", "GIVR1069", "2589P", "8647K", "C5020", "7905AV", "RGD 2814N", "RGD 2814N", "9175U", "2121O", "1298Z", "7905AV", "9869AJ", "7897Y", "9163U", "RGD 2660AW", "RGD 2572P", "7165H", "2847N");
        $avo_materno = array("GENGIS KHAN DE BRASÍLIA", "C.A.SANSÃO", "VALEOURO TE SILVÂNIA", "TEATRO DA SILVÂNIA", "TEATRO DA SILVÂNIA", "TEATRO DA SILVÂNIA", "ICEBERG FIV SILVÂNIA", "VALEOURO TE SILVÂNIA", "TEATRO DA SILVÂNIA", "FARDO FIV F.MUTUM", "TEATRO DA SILVÂNIA", "GENGIS KHAN DE BRASÍLIA", "TEATRO DA SILVÂNIA", "BRILHANTE SILVÂNIA", "JUBILEU SILVÂNIA", "REGANCREST S BRAXTON-ET", "C.A.SANSÃO", "RADAR DOS POÇÕES", "RADAR DOS POÇÕES", "TEATRO DA SILVÂNIA", "C.A.SANSÃO", "METEORO DE BRASÍLIA", "CASPER TE KUBERA", "TABÚ TE CAL", "TEATRO DA SILVÂNIA", "EFALC PARAÍSO CAJÚ", "BLU ASTRO BATGIRL", "DIAMANTE TE BRASÍLIA", "DIAMANTE TE BRASÍLIA", "EFALC PARAÍSO CAJÚ", "TEATRO DA SILVÂNIA", "ICEBERG FIV SILVÂNIA", "CASTELO KUBERA", "TEATRO DA SILVÂNIA", "TEATRO DA SILVÂNIA", "TEATRO DA SILVÂNIA", "VAIDOSO DA SILVÂNIA", "TEATRO DA SILVÂNIA", "TEATRO DA SILVÂNIA", "JAGUAR TE DO GAVIÃO", "TEATRO DA SILVÂNIA", "TEATRO DA SILVÂNIA", "C.A.SANSÃO", "JENNY-LOU MARSHALL TOYSTORY-ET", "BRILHANTE SILVÂNIA", "BRILHANTE SILVÂNIA", "CASTELO KUBERA", "CASTELO KUBERA", "LADYS-MANOR WILDMAN-ET", "JENNY-LOU MARSHALL TOYSTORY-ET", "CASTELO KUBERA", "ICEBERG FIV SILVÂNIA", "FARGO TE KUBERA", "LADYS-MANOR WILDMAN-ET", "FARDO FIV F.MUTUM", "CORSEL TE DE BRASÍLIA", "BRILHANTE SILVÂNIA");
        $avo_materna = array("SOJA DE BRASÍLIA", "SINTA BF TE DA CAL", "POITARA ALICE SANCHEZ TE", "ENGENHO DA RAINHA BIXIA", "ENGENHO DA RAINHA BIXIA", "BLU ASTRO BATGIRL", "BOCAINA LEE OLÍMPIA UBRAIA", "POITARA ALICE SANCHEZ TE", "ENGENHO DA RAINHA BIXIA", "ABF CESTA 3189 GARRISON", "RHOELANDT 1253 EBONY TRIUMPHANT STORM I TE", "ABF CÉLULA 3180 MALIN", "ENGENHO DA RAINHA BIXIA", "RHOELANDT 647 BESSIE MERRICK MORTY", "RHOELANDT 162 PROVINCIANA LONDON LINJET", "BRIGEEN BUCKEYE RHONDA", "SONECA TE DA CAL", "SOJA DE BRASÍLIA", "FADA FIV F. MUTUM", "CORAÇA", "PLANTA TE DA CAL", "PAPOULA TE FAN", "EVIDÊNCIA KUBERA", "REGELADA TE DA CAL", "POITARA ARIEL FINAL CUT-FIV", "ENGENHO DA RAINHA DALAS 529 LEADER-TE 2EX92", "BLU ASTRO BATGIRL", "ENGENHO DA RAINHA BALILLA", "GOTA RHOELANDT 415 LEDA FIV BOA FÉ", "ENGENHO DA RAINHA DALAS 529 LEADER-TE 2EX92", "RHOELANDT 1496 GERARD JASPER BAXTER 2 TE", "BOCAINA LEE OLÍMPIA UBRAIA", "RHOELANDT 762 DIANA OUTSIDE TALENT", "RHOELANDT 1496 GERARD JASPER BAXTER 2 TE", "RHOELANDT 1496 GERARD JASPER BAXTER 2 TE", "RHOELANDT 613 LEDA RED-MARKER ROY", "ELBA TE DE BRASÍLIA", "CORAÇA", "CORAÇA", "MANDALA VILA RICA", "RHOELANDT 613 LEDA RED-MARKER ROY", "BLU ASTRO BATGIRL", "BALEIA TEATRO AAO", "AZEITONA DAS ARÁBIAS", "RHOELANDT 647 BESSIE MERRICK MORTY", "RHOELANDT 647 BESSIE MERRICK MORTY", "POITARA ARETHA SANCHEZ TE", "POITARA ARETHUSA GOLDWYN", "LADYS-MANOR WILDMAN-ET", "AZEITONA DAS ARÁBIAS", "RHOELANDT 479 GERARD MERRICK KARAT", "BOCAINA LEE OLÍMPIA UBRAIA", "RHOELANDT 201 MADCAP LALITY LEO", "ELEGÂNCIA FIV KUBERA", "ABF CESTA 3189 GARRISON", "0241 ZERAICK VILAREJO", "RHOELANDT 979 BESSIE JASPER PONTIAC 5");

        $lotes = Lote::where("reserva_id", 42)->orderBy("numero", "ASC")->get();

        foreach($lotes as $lote){
            $lote->pai = $pais[$lote->numero - 1];
            $lote->avo_paterno = $avo_paterno[$lote->numero - 1];
            $lote->avo_paterna = $avo_paterna[$lote->numero - 1];
            $lote->mae = $mae[$lote->numero - 1];
            $lote->rgd_mae = $rgd_mae[$lote->numero - 1];
            $lote->avo_materno = $avo_materno[$lote->numero - 1];
            $lote->avo_materna = $avo_materna[$lote->numero - 1];
            $lote->save();
        }

        dd("DEU");
    }

    public function index(){
        $configuracao = Configuracao::first();
        dd("FOI");
        dd(DB::getQueryLog());
        $agent = new Agent();
        if($agent->isMobile()){
            $view = "mobile.index";
        }else{
            $view = "index";
        }
        return view($view, ["reservas" => $reservas, "configuracao" => $configuracao, "banners" => $banners]);
    }

    public function index2(){
        DB::connection()->enableQueryLog();
        
        $configuracao = Configuracao::first();
        
        // RESERVAS QUE ESTÃO ATIVAS
        if(cache()->has('reservas_ativas')){
            $reservas = cache()->get('reservas_ativas');
        }else{
            $reservas = cache()->remember('reservas_ativas', 60 * 60 * 24 * 7, function(){
                return Reserva::where("ativo", true)->with("lotes")->with("lotes.fazenda")->with("fazenda")->with("lotes.reserva")->with("lotes.fazenda")->orderBy("inicio", "ASC")->get();
            });
        }

        // BANNERS EXIBIDOS NA HOME
        if(cache()->has('banners')){
            $banners = cache()->get("banners");
        }else{
            $banners = cache()->remember('banners', 60 * 60 * 24 * 7, function(){
                return HomeBanner::orderBy("prioridade", "ASC")->get();
            });
            dd($banners);
        }

        return view("index2", ["reservas" => $reservas, "configuracao" => $configuracao, "banners" => $banners]);
    }

    public function conheca($slug, Reserva $reserva){
        $fazenda = Fazenda::where("slug", $slug)->first();
        // $reserva = $fazenda->reservas->where("ativo", 1)->first();
        if(!$reserva->institucional){
            return redirect()->route("fazenda.lotes", ["fazenda" => $fazenda->slug, "reserva" => $reserva]);
        }
        if($fazenda->video_conheca){
            $fazenda->video_conheca = $this->convertYoutube($fazenda->video_conheca);
        }
        if($fazenda->video_conheca_lotes){
            $fazenda->video_conheca_lotes = $this->convertYoutube($fazenda->video_conheca_lotes);
        }
        foreach($fazenda->depoimentos as $depoimento){
            $depoimento->video = $this->convertYoutube($depoimento->video);
        }
        $fazendas = [];
        $logos = [];
        foreach($reserva->lotes as $lote){
            if(!in_array($lote->fazenda_id, $fazendas)){
                $fazendas[] = $lote->fazenda_id;
                $logos[] = $lote->fazenda->logo;
            }
        }
        $fazendas = Fazenda::whereIn("id", $fazendas)->get();
        $finalizadas = "";
        $agent = new Agent();
        if($agent->isMobile()){
            $view = "mobile";
            // $view = "index";
        }else{
            $view = "desktop";
        }
        return view("fazenda", ["view" => $view, "fazenda" => $fazenda, "fazendas" => $fazendas, "reserva" => $reserva, "finalizadas" => $finalizadas, "nome_pagina" => "Conheça"]);
    }

    public function embrioes($slug, Reserva $reserva){
        $fazenda = Fazenda::where("slug", $slug)->first();
        // $reserva = $fazenda->reservas->where("ativo", 1)->first();
        if(!$reserva->institucional){
            if(!session()->get("popup_institucional")){
                $popup_institucional = true;
                session(["popup_institucional" => true]);
            }else{
                $popup_institucional = false;
            }
        }else{
            $popup_institucional = false;
        }
        $fazendas = $reserva->embrioes->unique("fazenda_id")->pluck("fazenda_id");
        $embrioes = $reserva->embrioes;
        return view("embrioes", ["fazenda" => $fazenda, "fazendas" => $fazendas, "reserva" => $reserva, "popup_institucional" => $popup_institucional, "embrioes" => $embrioes, "nome_pagina" => "Embriões"]);
    }

    public function lotes($slug, Reserva $reserva){
        $fazenda = Fazenda::where("slug", $slug)->first();
        if($reserva->lotes->count() == 0){
            return redirect()->route('fazenda.embrioes', ['fazenda' => $fazenda->slug, 'reserva' => $reserva]);
        }
        // $reserva = $fazenda->reservas->where("ativo", 1)->first();
        if(!$reserva->institucional){
            if(!session()->get("popup_institucional")){
                $popup_institucional = true;
                session(["popup_institucional" => true]);
            }else{
                $popup_institucional = false;
            }
        }else{
            $popup_institucional = false;
        }
        $lotes = $reserva->lotes->where('ativo', true)->where('membro_pacote', false);
        return view("lotes", ["fazenda" => $fazenda, "reserva" => $reserva, "popup_institucional" => $popup_institucional, "lotes" => $lotes, "nome_pagina" => "Lotes"]);
    }

    public function pesquisa(Request $request){
        $pesquisa = $request->pesquisa;
        return view("pesquisa", ["pesquisa" => $pesquisa]);
    }

    public function raca($slug){
        $raca = Raca::where("slug", $slug)->first();
        return view("raca", ["raca" => $raca]);
    }

    public function reservas_abertas(){
        return view("reservas_abertas");
    }

    public function navegue_por_racas(){
        return view("navegue_por_racas");
    }

    public function lotes2($slug, Reserva $reserva){
        if($reserva->lotes->count() == 0){
            return redirect()->route('fazenda.embrioes', ['fazenda' => $slug, 'reserva' => $reserva]);
        }
        // $reserva = $fazenda->reservas->where("ativo", 1)->first();
        if(!$reserva->institucional){
            if(!session()->get("popup_institucional")){
                $popup_institucional = true;
                session(["popup_institucional" => true]);
            }else{
                $popup_institucional = false;
            }
        }else{
            $popup_institucional = false;
        }
        $fazenda = $reserva->fazenda;
        $lotes = $reserva->lotes->where('ativo', true)->where('membro_pacote', false);
        return view("lotes2", ["fazenda" => $fazenda, "reserva" => $reserva, "popup_institucional" => $popup_institucional, "lotes" => $lotes, "nome_pagina" => "Lotes"]);
    }

    public function lote($slug, Reserva $reserva = null, Lote $lote){
        if(!session()->get("cliente")){
            session()->flash("erro", "Para acessar os lotes, faça seu login.");
            session()->put(["pagina_retorno" => url()->full()]);
            session()->put(["lote_origem" => $lote->id]);
            return redirect()->route("login");
        }

        if(!$reserva){
            $reserva = $lote->reserva;
        }

        $visita = new Visita;

        if(session()->get("cliente")){
            $visita->cliente_id = session()->get("cliente")["id"];
            $visita->logado = true;
        }

        if(!empty($_SERVER['HTTP_CLIENT_IP'])){
            //ip from share internet
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
            //ip pass from proxy
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }else{
            $ip = $_SERVER['REMOTE_ADDR'];
        }
    
        $estado = null;
        $cidade = null;
        $cep = null;
    
        $query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip));
    
        if($query && $query["status"] == "success"){
            $estado = $query["region"];
            $cidade = $query["city"];
            $cep = $query["zip"];
        }

        if((isset(session()->get("cliente")["admin"]) && session()->get("cliente")["admin"] != true)){
            $visita->ip = $ip;
            $visita->lote_id = $lote->id;
            $visita->estado = $estado;
            $visita->cidade = $cidade;
            $visita->cep = $cep;

            $visita->save();

            $lote->visitas += 1;
            $lote->save();

            if(session()->get("cliente")){
                $rdStation = new \RDStation\RDStation(session()->get("cliente")["email"]);
                $rdStation->setApiToken('ff3c1145b001a01c18bfa3028660b6c6');
                $rdStation->setLeadData('name', session()->get("cliente")["nome_dono"]);
                $rdStation->setLeadData('identifier', 'interesse-lote');
                $rdStation->setLeadData('numero-lote', "" . $lote->numero . $lote->letra);
                $rdStation->setLeadData('nome-lote', $lote->nome);
                $rdStation->setLeadData('fazenda-lote', $lote->fazenda->nome_fazenda);
                $rdStation->sendLead();
            }
            
        }

        // $lote->video = $this->convertYoutube($lote->video);
        // $fazenda = Fazenda::where("slug", $slug)->first();
        return view("lote2", ["lote" => $lote, "nome_pagina" =>  "Lote: " . $lote->numero . $lote->letra . " - " . $lote->nome]);
    }

    public function embriao($slug, Reserva $reserva, Embriao $embriao){
        if(!session()->get("cliente")){
            session()->flash("erro", "Para acessar os lotes, faça seu login.");
            session()->put(["pagina_retorno" => url()->full()]);
            session()->put(["lote_origem" => $embriao->id]);
            return redirect()->route("login");
        }
        $visita = new Visita;
        $configuracao = Configuracao::first();

        if(session()->get("cliente")){
            $visita->cliente_id = session()->get("cliente")["id"];
            $visita->logado = true;
        }

        if(!empty($_SERVER['HTTP_CLIENT_IP'])){
            //ip from share internet
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
            //ip pass from proxy
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }else{
            $ip = $_SERVER['REMOTE_ADDR'];
        }
    
        $estado = null;
        $cidade = null;
        $cep = null;
    
        $query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip));
    
        if($query && $query["status"] == "success"){
            $estado = $query["region"];
            $cidade = $query["city"];
            $cep = $query["zip"];
        }

        if((isset(session()->get("cliente")["admin"]) && session()->get("cliente")["admin"] != true)){
            $visita->ip = $ip;
            $visita->embriao_id = $embriao->id;
            $visita->estado = $estado;
            $visita->cidade = $cidade;
            $visita->cep = $cep;

            $visita->save();

            $embriao->visitas += 1;
            $embriao->save();

            if(session()->get("cliente")){
                $rdStation = new \RDStation\RDStation(session()->get("cliente")["email"]);
                $rdStation->setApiToken('ff3c1145b001a01c18bfa3028660b6c6');
                $rdStation->setLeadData('name', session()->get("cliente")["nome_dono"]);
                $rdStation->setLeadData('identifier', 'interesse-lote');
                $rdStation->setLeadData('numero-lote', "" . $embriao->numero);
                $rdStation->setLeadData('nome-lote', $embriao->nome);
                $rdStation->setLeadData('fazenda-lote', $embriao->fazenda->nome_fazenda);
                $rdStation->sendLead();
            }
            
        }

        $fazenda = Fazenda::where("slug", $slug)->first();
        return view("embriao", ["configuracao" => $configuracao, "embriao" => $embriao, "reserva" => $reserva, "fazenda" => $fazenda, "nome_pagina" =>  "Lote: " . $embriao->prefixo_numero . $embriao->numero . $embriao->sufixo_numero . " - " . $embriao->grau_sangue]);
    }

    public function lance(Request $request, Lote $lote){
        
        $lance = Lance::where([["lote_id", $lote->id], ["valor", ">", $request->valor]])->first();
        if($lance){
            return response()->json("erro");
        }
        $lance = new Lance;
        $lance->cliente_id = session()->get("cliente")["id"];
        $lance->lote_id = $lote->id;
        $lance->reserva_id = $lote->reserva->id;
        $lance->valor = $request->valor;
        $lance->save();

        $res = [];
        $res["id"] = $lance->id;
        $res["nome"] = session()->get("cliente")["nome_dono"];
        $res["valor"] = $request->valor;

        return response()->json($res);
        
    }

    public function maior_lance(Lote $lote){
        $lance = Lance::where("lote_id", $lote->id)->orderBy("valor", "DESC")->first();
        if(!$lance){
            return response()->json("erro");
        }
        $res = [];
        $res["id"] = $lance->id;
        $res["nome"] = $lance->cliente->nome_dono;
        $res["valor"] = $lance->valor;
        return response()->json($res);
    }

    public function login(){
        if(session()->get("cliente")){
            return redirect()->route("index");
        }
        session()->flash("nome_pagina", "Login");
        return view('login', ["nome_pagina" => "Login"]);
    }

    public function logar(Request $request){
        $usuario = Cliente::where("email", $request->email)->first();
        if($usuario){
            if(Hash::check($request->senha, $usuario->senha)){
                $usuario->ultimo_acesso = date('Y-m-d');
                $usuario->save();
                // dd($usuario);
                // $cookie = cookie()->forever('cliente', $usuario->id);
                // $cookie = Cookie::forget('cliente');
                Cookie::queue('cliente', $usuario->id, 518400);
                // $response->withCookie(cookie()->forever($usuario->id));
                // return response("view")->withCookie($cookie);
                // dd(cookie("cliente"));
                session(["cliente" => $usuario->toArray()]);
                
                $carrinho = Carrinho::where([["cliente_id", $usuario->id], ["aberto", true]])->first();
                if($carrinho){
                    session()->put(["carrinho" => true]);
                }

                if(session()->get("pagina_retorno") && session()->get("pagina_retorno") != route("login")){
                    $pagina = session()->get("pagina_retorno");
                    session()->forget("pagina_retorno");
                    return redirect($pagina);
                }else{
                    return redirect()->route("index");
                }
            }else{
                session()->flash("erro", "Usuário ou senha incorretos");
                return redirect()->back()->withInput($request->except('senha'));
            } 
        }else{
            session()->flash("erro", "Usuário ou senha incorretos");
            return redirect()->back()->withInput($request->except('senha'));
        }      
    }

    public function contato(){
        return view("contato");
    }

    public function sobre(){
        return view("sobre");
    }

    public function reservas_finalizadas(){
        return view("finalizadas");
    }

    public function conheca_finalizadas(Reserva $reserva, $slug){
        if(!$reserva->institucional){
            return redirect()->route("fazenda.lotes", ["fazenda" => $reserva->fazenda]);
        }
        $fazenda = Fazenda::where("slug", $slug)->first();
        $fazenda->video_conheca = $this->convertYoutube($fazenda->video_conheca);
        $fazenda->video_conheca_lotes = $this->convertYoutube($fazenda->video_conheca_lotes);
        foreach($fazenda->depoimentos as $depoimento){
            $depoimento->video = $this->convertYoutube($depoimento->video);
        }
        $fazendas = [];
        $logos = [];
        if($reserva->multi_fazendas){
            foreach($reserva->lotes as $lote){
                if(!in_array($lote->fazenda_id, $fazendas)){
                    $fazendas[] = $lote->fazenda_id;
                    $logos[] = $lote->fazenda->logo;
                }
            }
        }
        $fazendas = Fazenda::whereIn("id", $fazendas)->get();
        return view("finalizadas.fazenda", ["fazenda" => $fazenda, "fazendas" => $fazendas, "reserva" => $reserva]);
    }

    public function lotes_finalizadas(Reserva $reserva, $slug){
        $fazenda = $reserva->fazenda;
        $lotes = $reserva->lotes->where('ativo', true)->where('membro_pacote', false);
        $prioridades = $lotes->where("prioridade", true)->sortBy("numero");
        $lotes = $lotes->where("prioridade", false)->sortBy("numero");
        $lotes = $prioridades->merge($lotes);
        session()->flash("nome_pagina", "Lotes");
        return view("lotes", ["fazenda" => $fazenda, "reserva" => $reserva, "finalizadas" => true, "prioridades" => $prioridades, "lotes" => $lotes, "lotes_bkp" => $lotes]);
    }

    public function lote_finalizadas(Reserva $reserva, $slug, Lote $lote){
        if(!session()->get("cliente")){
            session()->flash("erro", "Para acessar os lotes, faça seu login.");
            session()->put(["pagina_retorno" => url()->full()]);
            return redirect()->route("login");
        }
        $visita = new Visita;

        if(session()->get("cliente")){
            $visita->cliente_id = session()->get("cliente")["id"];
            $visita->logado = true;
        }

        if(!empty($_SERVER['HTTP_CLIENT_IP'])){
            //ip from share internet
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
            //ip pass from proxy
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }else{
            $ip = $_SERVER['REMOTE_ADDR'];
        }
    
        $estado = null;
        $cidade = null;
        $cep = null;
    
        $query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip));
    
        if($query && $query["status"] == "success"){
            $estado = $query["region"];
            $cidade = $query["city"];
            $cep = $query["zip"];
        }

        $visita->ip = $ip;
        $visita->lote_id = $lote->id;
        $visita->estado = $estado;
        $visita->cidade = $cidade;
        $visita->cep = $cep;

        $visita->save();

        $lote->visitas += 1;
        $lote->save();

        // $rdStation = new \RDStation\RDStation(session()->get("cliente")["email"]);
        // $rdStation->setApiToken('ff3c1145b001a01c18bfa3028660b6c6');
        // $rdStation->setLeadData('name', session()->get("cliente")["nome_dono"]);
        // $rdStation->setLeadData('identifier', 'interesse-lote');
        // $rdStation->setLeadData('numero-lote', "" . $lote->numero . $lote->letra);
        // $rdStation->setLeadData('nome-lote', $lote->nome);
        // $rdStation->setLeadData('fazenda-lote', $lote->fazenda->nome_fazenda);
        // $rdStation->sendLead();

        $lote->video = $this->convertYoutube($lote->video);

        $fazenda = Fazenda::where("slug", $slug)->first();
        return view("lote", ["lote" => $lote, "lote_bkp" => $lote, "fazenda" => $fazenda, "finalizadas" => true, "reserva" => $reserva]);
    }

    public function convertYoutube($string) {
        return preg_replace(
            "/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
            "<iframe width=\"350\" height=\"200\" src=\"//www.youtube.com/embed/$2\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>",
            $string
        );
    }

    public function redirect_fazenda($slug, Lote $lote = null){
        $fazenda = Fazenda::where("slug", $slug)->first();
        if(!$fazenda){
            return redirect()->route('index');
        }
        $reserva = $fazenda->reservas->where("ativo", 1)->first();
        if(url()->current() == route('fazenda.conheca.antigo', ['fazenda' => $slug]) || url()->current() == route('fazenda.conheca.lotes.antigo', ['fazenda' => $slug]) || url()->current() == route('fazenda.conheca.depoimentos.antigo', ['fazenda' => $slug]) || url()->current() == route('fazenda.conheca.avaliacoes.antigo', ['fazenda' => $slug])){
            return redirect()->route("fazenda.conheca", ["fazenda" => $slug, "reserva" => $reserva]);
        }
        if(url()->current() == route('fazenda.lotes.antigo', ['fazenda' => $slug])){
            return redirect()->route("fazenda.lotes", ["fazenda" => $slug, "reserva" => $reserva]);
        }
        if(url()->current() == route('fazenda.conheca.antigo', ['fazenda' => $slug])){
            return redirect()->route("fazenda.conheca", ["fazenda" => $slug, "reserva" => $reserva]);
        }
        if(url()->current() == route('fazenda.lote.antigo', ['fazenda' => $slug, 'lote' => $lote])){
            return redirect()->route("fazenda.lote", ["fazenda" => $slug, "reserva" => $reserva, "lote" => $lote]);
        }
    }

    public function experiencia_ouro_branco(){
        return view("experiencias.ouro-branco");
    }
}
