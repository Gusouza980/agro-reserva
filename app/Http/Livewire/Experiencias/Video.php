<?php

namespace App\Http\Livewire\Experiencias;

use Livewire\Component;
use App\Classes\Util;

class Video extends Component
{
    public $youtube = [];
    public $op = "thumb";

    protected $listeners = ["fechar"];

    public function mount($video){
        // dd($video);
        $this->youtube["id"] = $video->contentDetails->videoId;
        $this->youtube["thumb"] = $video->snippet->thumbnails->medium->url;
        $this->youtube["video"] = Util::convertYoutube("https://www.youtube.com/watch?v=" . $video->contentDetails->videoId);
    }

    public function mostrar(){
        $this->emit("fechar", $this->youtube["id"]);
        $this->op = "video";
    }

    public function fechar($id){
        if($this->youtube["id"] != $id){
            $this->op = "thumb";
        }
    }

    public function render()
    {
        return view('livewire.experiencias.video');
    }
}
