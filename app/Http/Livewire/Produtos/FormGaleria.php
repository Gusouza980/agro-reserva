<?php

namespace App\Http\Livewire\Produtos;

use Livewire\Component;
use App\Models\MarketplaceProduto;
use Livewire\WithFileUploads;
use App\Classes\Util;
use App\Models\MarketplaceProdutoImagem;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class FormGaleria extends Component
{

    use WithFileUploads;
    
    public $produto;
    public $imagem;

    protected $listeners = ["atualiza" => '$refresh'];

    public function mount(MarketplaceProduto $produto){
        $this->produto = $produto;
    }

    public function updatedImagem()
    {
        $this->save();
    }

    public function save(){
        Log::info("foi");
        $nova_imagem = new MarketplaceProdutoImagem;
        $nova_imagem->marketplace_produto_id = $this->produto->id;
        $nova_imagem->caminho = $this->imagem->store('site/imagens/produtos/' . $this->produto->id . "/", 'local');
        $nova_imagem->save();
        $this->imagem = null;
        Util::limparLivewireTemp();
        session()->flash("sucesso", "Imagem adicionada com sucesso!");
        $this->emit("atualiza");
    }

    public function setAtivo($imagem_id){
        $this->produto->marketplace_produto_imagem_id = $imagem_id;
        $this->produto->save();
        $this->emit("atualiza");
    }
    
    public function deletarImagem($imagem_id){
        $imagem = MarketplaceProdutoImagem::find($imagem_id);
        Storage::delete($imagem->caminho);
        if($this->produto->marketplace_produto_imagem_id == $imagem_id){
            $this->produto->marketplace_produto_imagem_id = null;
        }
        $imagem->delete();
        $this->emit("atualiza");
    }

    public function render()
    {
        return view('livewire.produtos.form-galeria');
    }
}
