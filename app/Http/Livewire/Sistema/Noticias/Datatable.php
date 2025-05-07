<?php

namespace App\Http\Livewire\Sistema\Noticias;

use App\Classes\ImageUpload;
use App\Classes\Util;
use App\Models\Noticia;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithFileUploads;

class Datatable extends Component
{
    use LivewireAlert;
    use WithFileUploads;

    public $thumbnails = [];
    public $banners = [];

    protected $listeners = ['excluir', 'cancelar'];

    public function updatedThumbnails($value, $key){
        $noticia = Noticia::find($key);
        if($this->thumbnails[$key]){
            if($noticia->preview){
                Storage::delete($noticia->preview);
            }
            // CRIA UMA IMAGEM NO FORMATO DE AVATAR E SALVA NO CLIENTE
            $image = new ImageUpload($this->thumbnails[$key]);
            $image->makeNoticiaThumbnail();
            $noticia->preview = $image->save("uploads");
            Util::limparLivewireTemp();
        }
        $noticia->save();
        $this->thumbnails = [];
        $this->dispatchBrowserEvent('notificaToastr', ['tipo' => 'success', 'mensagem' => 'Thumbnail atualizada com sucesso!']);
    }

    public function updatedBanners($value, $key){
        $noticia = Noticia::find($key);
        if($this->banners[$key]){
            if($noticia->banner){
                Storage::delete($noticia->banner);
            }
            // CRIA UMA IMAGEM NO FORMATO DE AVATAR E SALVA NO CLIENTE
            $image = new ImageUpload($this->banners[$key]);
            $image->makeNoticiaBanner();
            $noticia->banner = $image->save("uploads");
            Util::limparLivewireTemp();
        }
        $noticia->save();
        $this->banners = [];
        $this->dispatchBrowserEvent('notificaToastr', ['tipo' => 'success', 'mensagem' => 'Thumbnail atualizada com sucesso!']);
    }

    public function trocaStatusPublicacao($id){
        $noticia = Noticia::find($id);
        $noticia->publicada = !$noticia->publicada;

        $noticia->save();

        if($noticia->publicada){
            $this->dispatchBrowserEvent('notificaToastr', ['tipo' => 'success', 'mensagem' => 'Notícia publicada com sucesso!']);
        }else{
            $this->dispatchBrowserEvent('notificaToastr', ['tipo' => 'success', 'mensagem' => 'A notícia agora está oculta!']);
        }
    }

    public function solicitarExcluir(Noticia $noticia){
        $this->alert('warning', 'Tem certeza de que deseja excluir a noticia <b>' . $noticia->titulo . '</b> ?', [
            'position' => 'center',
            'showConfirmButton' => true,
            'confirmButtonText' => 'Sim',
            'onConfirmed' => "excluir",
            'showCancelButton' => true,
            'cancelButtonText' => 'Não',
            'timer' => null,
            'data' => [
                'id' => $noticia->id,
            ]
        ]);
    }
    public function excluir($alert){
        $noticia = Noticia::find($alert['data']['id']);
        Storage::delete($noticia->thumbnail);
        Storage::delete($noticia->banner);
        $noticia->delete();
        $this->dispatchBrowserEvent('notificaToastr', ['tipo' => 'success', 'mensagem' => 'Notícia removida com sucesso!']);
    }

    public function render()
    {
        $noticias = Noticia::orderBy('id', 'desc')->get();
        return view('livewire.sistema.noticias.datatable', compact('noticias'));
    }
}
