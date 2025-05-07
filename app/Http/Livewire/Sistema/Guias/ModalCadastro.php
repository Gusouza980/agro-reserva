<?php

namespace App\Http\Livewire\Sistema\Guias;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use App\Models\Guia;
use Livewire\WithFileUploads;
class ModalCadastro extends Component
{
    use WithFileUploads;
    public $show = false;
    public $guia;
    public $arquivo;
    protected $listeners = ['carregaModalCadastroGuia'];

    public function carregaModalCadastroGuia(){
        $this->guia = [];
        $this->show = true;
    }
    public function salvar(){
        if(isset($this->guia['id'])){
            if($this->arquivo){
                Storage::delete($this->arquivo['caminho']);
                $this->guia['caminho'] = $this->arquivo->store('uploads');
            }
            $id = $this->guia['id'];
            unset($this->guia['id']);
            Guia::find($id)->update($this->guia);
        }else{
            $this->guia['caminho'] = $this->arquivo->store('uploads');
            Guia::create($this->guia);
        }
        $this->arquivo = null;
        \Util::limparLivewireTemp();
        $this->show = false;
        $this->emit('atualizaDatatableGuias');
    }
    public function render()
    {
        return view('livewire.sistema.guias.modal-cadastro');
    }
}
