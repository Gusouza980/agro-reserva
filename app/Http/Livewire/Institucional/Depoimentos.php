<?php

namespace App\Http\Livewire\Institucional;

use Livewire\Component;
use Alaouy\Youtube\Facades\Youtube;

class Depoimentos extends Component
{

    public $videos;
    public $video_atual;

    public function mount(){
        $this->videos = Youtube::getPlaylistItemsByPlaylistId('PLnqvSti-aWAKK5ztJZgNa3pEKNJzBqm1Q')["results"];
        for($i = 0; $i < count($this->videos); $i++){
            $this->videos[$i] = json_decode(json_encode($this->videos[$i]), true);
        }
        // dd($this->videos);
    }

    public function mostrar($i){
        $this->video_atual = $i;
    }

    public function render()
    {
        return view('livewire.institucional.depoimentos');
    }
}
