<?php

namespace App\Http\Livewire\Painel\Configuracoes\Seo;

use Livewire\Component;
use App\Models\Seo;
use Livewire\WithPagination;
use Spatie\Sitemap\SitemapGenerator;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use App\Models\Reserva;

class Pagina extends Component
{
    use WithPagination;

    public $seo;

    protected $rules = [
        "seo.nome" => "",
        "seo.titulo" => "",
        "seo.tags" => ""
    ];
    protected $listeners = ["atualizaValoresSeo"];

    public function gerarSiteMap(){
        $filename = 'sitemap'.date("YmdHis").'.txt';
        $path = '/sitemap/' . $filename;
        Storage::disk('local')->put($path, '');
        SitemapGenerator::create('https://agroreserva.com.br')->writeToFile(public_path($path));
        return Response::download(public_path($path), $filename);
    }
    public function atualizaValoresSeo(Seo $seo, $campo, $valor){
        $seo->$campo = $valor;
        $seo->save();
        $this->dispatchBrowserEvent('notificaToastr', ['tipo' => 'success', 'mensagem' => 'SEO atualizado com sucesso!']);
    }
    public function novoSeo(){
        $this->seo->save();
        $this->seo = new Seo;
        $this->emit('$refresh');
    }
    public function mount(){
        $this->seo = new Seo;
    }
    public function render()
    {
        $seos =  Seo::paginate(30);
        return view('livewire.painel.configuracoes.seo.pagina', ['seos' => $seos]);
    }
}
