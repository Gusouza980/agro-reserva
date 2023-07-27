<?php

namespace App\Http\Livewire\Sistema\Demandas;

use Livewire\Component;
use App\Models\Demanda;
use App\Models\Usuario;

class ModalCadastro extends Component
{
    public $show = false;
    public $op = "cadastro";
    public $demanda;
    public $usuarios;
    protected $listeners = ["carregaModalCadastroDemanda", "carregaModalEdicaoDemanda", "resetaModalDemandas"];
    public function updatedShow(){
        if($this->show == false){
            $this->reset();
        }
    }
    public function carregaModalCadastroDemanda(){
        $this->demanda = [];
        $this->op = 'cadastro';
        $this->show = true;
    }
    public function carregaModalEdicaoDemanda($id){
        $this->demanda = Demanda::find($id)->toArray();
        $this->op = 'edicao';
        $this->show = true;
    }
    public function salvar(){
        if($this->op == 'cadastro'){
            $this->demanda['solicitante_id'] = session()->get('admin');
            Demanda::create($this->demanda);
        }else{
            $id = $this->demanda['id'];
            unset($this->demanda['id']);
            Demanda::find($id)->update($this->demanda);
        }
        $this->emit('atualizaDatatableDemandas');
        toastr()->success("Demanda salva com sucesso!");
        $this->demanda = [];
        $this->show = false;
    }
    public function mount(){
        $this->usuarios = Usuario::where("ativo", true)->select("id", "nome", "acesso")->orderBy("nome", "ASC")->get()->toArray();
    }
    public function render()
    {
        return view('livewire.sistema.demandas.modal-cadastro');
    }
}
