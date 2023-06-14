<?php

namespace App\Http\Livewire\Sistema\Banners;

use Livewire\Component;
use App\Models\HomeBanner;

class ModalCadastro extends Component
{
    public $show = false;
    public $banner;
    public $op;

    protected $listeners = ["carregaModalCadastroBanner", "carregaModalEdicaoBanner"];

    protected function rules(){
        $rules = [
            "banner.descricao" => "max:255|required",
            "banner.link" => "max:255",
        ];
        return $rules;
    }

    public function carregaModalEdicaoBanner(HomeBanner $banner){
        $this->banner = $banner;
        $this->show = true;
        $this->op = "edicao";
    }

    public function carregaModalCadastroBanner(){
        $this->banner = new HomeBanner;
        $this->show = true;
        $this->op = "cadastro";
    }

    public function salvar(){
        $this->validate();
        if($this->op == 'cadastro'){
            $banners = HomeBanner::orderBy("prioridade")->get();
            $cont = 2;
            foreach($banners as $banner){
                $banner->prioridade = $cont;
                $banner->save();
                $cont++;
            }
            $this->banner->prioridade = 1;
        }
        $this->banner->save();
        $this->dispatchBrowserEvent('notificaToastr', ["tipo" => "success", "mensagem" => 'Dados atualizados com sucesso']);
        $this->show = false;
        $this->emit('atualizaDatatableBanners');
    }

    public function render()
    {
        return view('livewire.sistema.banners.modal-cadastro');
    }
}
