<?php

namespace App\Http\Livewire\Institucional\Cliente;

use Livewire\Component;
use App\Models\Cliente;

class Dados extends Component
{

    public $codigo_pais;
    public $cliente;

    public function mount(){
        $this->cliente = Cliente::find(session()->get("cliente")["id"])->toArray();
        unset($this->cliente["id"]);
    }

    public function salvar(){
        $pais_selecionado = null;
        $json = file_get_contents("json/mascaras_telefone.json");
        $paises = json_decode($json);
        foreach($paises as $pais){
            if($pais->code == $this->codigo_pais){
                $pais_selecionado = $pais->name;
            }
        }
        Cliente::find(session()->get("cliente")["id"])->update($this->cliente);
        session()->flash("sucesso", "Dados salvos com sucesso!");
        $this->dispatchBrowserEvent("salvado");
    }

    public function render()
    {
        $json = file_get_contents("json/mascaras_telefone.json");
        $paises = json_decode($json);
        foreach($paises as $pais){
            if($pais->name == $this->cliente["pais"]){
                $this->codigo_pais = $pais->code;
            }
        }
        return view('livewire.institucional.cliente.dados', ["paises" => $paises]);
    }
}
