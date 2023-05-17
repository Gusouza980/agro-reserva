<?php

namespace App\Http\Livewire\Sistema\Banners;

use Livewire\Component;
use App\Models\HomeBanner;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Classes\Util;
use Illuminate\Support\Facades\Storage;
use App\Classes\ImageUpload;

class Datatable extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $arquivos_desk = [];
    public $arquivos_mobile = [];

    public $quantidade_exibicao;

    protected $listeners = ["atualizaDatatableBanners" => '$refresh'];


    public function updatedArquivosDesk($value, $key){
        $banner = HomeBanner::find($key);
        if($this->arquivos_desk[$key]){
            if($banner->caminho){
                Storage::delete($banner->caminho);
            }
            // CRIA UMA IMAGEM NO FORMATO DE AVATAR E SALVA NO CLIENTE
            $image = new ImageUpload($this->arquivos_desk[$key]);
            $image->makeBannerDesk();
            $banner->caminho = $image->save("uploads");
            Util::limparLivewireTemp();
        }
        $banner->save();
        $this->arquivos_desk = [];
        $this->dispatchBrowserEvent('notificaToastr', ['tipo' => 'success', 'mensagem' => 'Imagem atualizada com sucesso!']);
    }

    public function updatedArquivosMobile($value, $key){
        $banner = HomeBanner::find($key);
        if($this->arquivos_mobile[$key]){
            if($banner->caminho_mobile){
                Storage::delete($banner->caminho_mobile);
            }
            // CRIA UMA IMAGEM NO FORMATO DE AVATAR E SALVA NO CLIENTE
            $image = new ImageUpload($this->arquivos_mobile[$key]);
            $image->makeBannerMobile();
            $banner->caminho_mobile = $image->save("uploads");
            Util::limparLivewireTemp();
        }
        $banner->save();
        $this->arquivos_mobile = [];
        $this->dispatchBrowserEvent('notificaToastr', ['tipo' => 'success', 'mensagem' => 'Imagem atualizada com sucesso!']);
    }

    public function subir(HomeBanner $banner){
        $anterior = HomeBanner::where("prioridade", $banner->prioridade - 1)->first();
        $anterior->prioridade += 1;
        $anterior->save();

        $banner->prioridade -= 1;
        $banner->save();
        
        $this->emit('$refresh');
        $this->dispatchBrowserEvent('notificaToastr', ['tipo' => 'success', 'mensagem' => 'Prioridade atualizada com sucesso!']);
    }

    public function descer(HomeBanner $banner){
        $proximo = HomeBanner::where("prioridade", $banner->prioridade + 1)->first();
        $proximo->prioridade -= 1;
        $proximo->save();

        $banner->prioridade += 1;
        $banner->save();
        
        $this->emit('$refresh');
        $this->dispatchBrowserEvent('notificaToastr', ['tipo' => 'success', 'mensagem' => 'Prioridade atualizada com sucesso!']);
    }

    public function render()
    {
        $banners = HomeBanner::orderBy("prioridade")->paginate($this->quantidade_exibicao);
        return view('livewire.sistema.banners.datatable', ['banners' => $banners]);
    }
}
