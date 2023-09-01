<?php

namespace App\Http\Livewire\Institucional\Lotes;

use Livewire\Component;
use App\Models\Lote;
use App\Models\Reserva;
use App\Models\Embriao;
use App\Models\InteresseLote;
use App\Jobs\ProcessEmails;
use Jenssegers\Agent\Agent;

class SecaoLotes extends Component
{

    public $fazenda;
    public $view;
    public $reserva;
    public $pesquisa_lote;
    public $filtro_disponibilidade = -1;
    public $filtro_raca = -1;
    public $filtro_sexo = -1;

    public $pagina_raca = false;
    public $pagina_multi_racas = false;
    public $pagina_reservas_abertas = false;
    public $pagina_navegue_por_racas = false;

    public function updatedPesquisaLote(){
        $this->emit('$refresh');
    }

    public function mount($fazenda = null, $reserva = null, $pesquisa = null, $raca = null, $pagina_reservas_abertas = false, $pagina_navegue_por_racas = false){
        $this->fazenda = $fazenda;
        $this->reserva = $reserva;
        $this->pesquisa_lote = $pesquisa;
        $this->filtro_raca = ($raca) ? $raca : -1;
        $this->pagina_reservas_abertas = $pagina_reservas_abertas;
        $this->pagina_navegue_por_racas = $pagina_navegue_por_racas;
        
        if($this->filtro_raca != -1){
            $this->pagina_raca = true;
        }

        $agent = new Agent();
        if($agent->isMobile()){
            $this->view = "mobile";
        }else{
            $this->view = "desktop";
        }
    }

    public function declararInteresse($lote_id){
        if(!session()->get("cliente")){
            $this->emit('mostrarPopup', 'erro', 'Para declarar interesse em um lote você precisa estar logado.');
            return;
        }
        $interesse = InteresseLote::where("cliente_id", session()->get("cliente")["id"])->where("lote_id", $lote_id)->first();
        if($interesse){
            $interesse->delete();
        }else{
            InteresseLote::create([
                "cliente_id" => session()->get("cliente")["id"],
                "lote_id" => $lote_id
            ]);
            ProcessEmails::dispatch(session()->get("cliente")["id"], $lote_id);
        }
        $this->emit('$refresh');
    }

    public function render()
    {
        if(!$this->fazenda && !$this->reserva){
            $reservas = Reserva::with("fazenda")->where("aberto", true)->where("encerrada", false)->get();
            $lotes = Lote::with("reserva")->with("interesses")->whereIn("reserva_id", $reservas->pluck("id"));
            $embrioes = Embriao::whereIn("reserva_id", $reservas->pluck("id"));
        }else{
            $reservas = null;
            $lotes = Lote::with("reserva")->with("interesses")->where("reserva_id", $this->reserva->id)->where("reserva_id", $this->reserva->id)->where("ativo", true);
            $embrioes = Embriao::where("reserva_id", $this->reserva->id)->where("reserva_id", $this->reserva->id);
        }

        if($this->pesquisa_lote){
            $pesquisa_lote = $this->pesquisa_lote;
            $lotes = $lotes->where("nome", "LIKE", "%" . $this->pesquisa_lote . "%")
                ->orWhere("registro", $this->pesquisa_lote)
                ->orWhere("numero", "=", $this->pesquisa_lote);
        }

        if($this->filtro_disponibilidade != -1){
            $lotes = $lotes->where("reservado", $this->filtro_disponibilidade);
        }

        if($this->filtro_raca != -1){
            $lotes = $lotes->where("raca_id", $this->filtro_raca);
        }

        if($this->filtro_sexo != -1){
            $lotes = $lotes->where("sexo", $this->filtro_sexo);
        }

        $lotes = $lotes->where("ativo", true)->orderByRaw("reservado ASC, id ASC")->get();
        $embrioes = $embrioes->get();
        // $reservados = $this->reserva->lotes->where('ativo', true)->where('membro_pacote', false)->where("reservado", true);
        return view('livewire.institucional.lotes.secao-lotes', ['reservas' => $reservas, 'lotes' => $lotes, 'embrioes' => $embrioes]);
    }
}
