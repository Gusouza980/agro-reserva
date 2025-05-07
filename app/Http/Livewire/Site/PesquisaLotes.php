<?php

namespace App\Http\Livewire\Site;

use Livewire\Component;
use App\Models\Lote;

class PesquisaLotes extends Component
{
    
    public $pesquisa;
    public $resultados;

    public function mount(){
        $this->resultados = null;
    }
    

    public function pesquisar(){
        $this->resultados = Lote::where("nome", "LIKE", "%" . $this->pesquisa . "%")->orderBy("created_at", "DESC")->take(5)->get();
        // dd($this->resultados);  
    }

    public function render()
    {
        return view('livewire.site.pesquisa-lotes');
    }
}
