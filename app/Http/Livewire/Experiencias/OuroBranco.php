<?php

namespace App\Http\Livewire\Experiencias;

use Livewire\Component;
use Alaouy\Youtube\Facades\Youtube;

class OuroBranco extends Component
{
    public $videos;
    public $take = 7;
    public $video_atual;
    public $carregando_videos = false;

    protected $listeners = ["mostrar_mais"];

    public function mount(){
        $this->videos = Youtube::getPlaylistItemsByPlaylistId('PLnqvSti-aWALfE84ooJzeFQlW_o45kuPB')["results"];
        for($i = 0; $i < count($this->videos); $i++){
            $this->videos[$i] = json_decode(json_encode($this->videos[$i]), true);
        }
    }

    public function mostrar_mais(){
        if($this->take + 6 < count($this->videos)){
            $this->take += 6;
        }else{
            $this->take = count($this->videos);
        }
        $this->carregando_videos = false;
    }

    public function mostrar($i){
        $this->video_atual = $i;
    }

    public function render()
    {
        return view('livewire.experiencias.ouro-branco');
    }
}
