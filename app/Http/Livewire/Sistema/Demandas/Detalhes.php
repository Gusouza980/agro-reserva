<?php

namespace App\Http\Livewire\Sistema\Demandas;

use App\Models\DemandaObservacao;
use Livewire\Component;
use App\Models\Demanda;
use App\Models\DemandaArquivo;
use Livewire\WithFileUploads;

class Detalhes extends Component
{
    use WithFileUploads;
    public $show = false;
    public $demanda;
    public $menus = [
        0 => 'Arquivos',
        1 => 'Observações',
    ];
    public $menu = 0;
    public $novo_arquivo;
    public $nova_observacao;
    protected $listeners = ['carregaModalDetalhesDemanda'];

    public function updatedShow(){
        if($this->show == false){
            $this->reset();
        }
    }

    public function updatedNovoArquivo(){
        $demanda_arquivo = new DemandaArquivo;
        $demanda_arquivo->demanda_id = $this->demanda['id'];
        $demanda_arquivo->nome = str_replace("." . $this->novo_arquivo->getClientOriginalExtension(), "", $this->novo_arquivo->getClientOriginalName());
        $demanda_arquivo->tipo = $this->novo_arquivo->getClientOriginalExtension();
        $demanda_arquivo->caminho = $this->novo_arquivo->store('uploads');
        $demanda_arquivo->save();
        $this->novo_arquivo = null;
        toastr()->success("Arquivo salvo com sucesso!");
        $this->emit('$refresh');
    }

    public function adicionarObservacao(){
        $observacao = new DemandaObservacao;
        $observacao->demanda_id = $this->demanda['id'];
        $observacao->usuario_id = session()->get('admin');
        $observacao->conteudo = $this->nova_observacao;
        $observacao->save();
        $this->nova_observacao = null;
        toastr()->success("Observação salva com sucesso!");
        $this->emit('$refresh');
    }

    public function getArquivos(){
        return DemandaArquivo::where("demanda_id", $this->demanda['id'])->orderBy("created_at", "ASC")->get()->toArray();
    }

    public function getObservacoes(){
        return DemandaObservacao::with("usuario:id,nome,foto")->where("demanda_id", $this->demanda['id'])->get()->toArray();
    }

    public function carregaModalDetalhesDemanda($id){
        $this->demanda = Demanda::with("solicitante")->with("solicitado")->find($id)->toArray();
        $this->show = true;
    }
    public function render()
    {
        return view('livewire.sistema.demandas.detalhes');
    }
}
