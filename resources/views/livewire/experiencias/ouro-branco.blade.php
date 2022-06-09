<div class="w-full py-5">
    <div class="w-full lg:w-1/2 mx-auto flex py-4 justify-content-center relative">
        <div class="w-full shadow-md overflow-hidden rounded-md border border-[#D7D8E4] border-solid">
            @if($video_atual !== 0)
                <img @if(isset($videos[0]["snippet"]["thumbnails"]["maxres"])) src="{{ $videos[0]["snippet"]["thumbnails"]["maxres"]["url"] }}" @else src="{{ $videos[0]["snippet"]["thumbnails"]["medium"]["url"] }}" @endif class="w-full shadow-lg cpointer" style="" alt="" wire:click="mostrar({{ 0 }})">
                <img class="cpointer" src="{{ asset('imagens/play-button2.jpg') }}" width="60" style="position: absolute; top: calc(50% - 30px); left: calc(50% - 30px);" wire:click="mostrar({{ 0 }})">
            @else
                {!! App\Classes\Util::convertYoutube("https://www.youtube.com/watch?v=" . $videos[0]["contentDetails"]["videoId"]) !!}
            @endif
        </div>
    </div>
    <div class="mx-auto mt-5 w1400">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-5 gap-y-9 justify-content-center">
            @for($i = 1; $i < $take; $i++)
                <div class="px-2 md:px-0 px-md-0">
                    <div class="relative w-full" x-data="{ show: false }" x-intersect.enter="show = true">
                        <div class="w-full overflow-hidden rounded-md border border-[#D7D8E4] border-solid" x-show="show" x-transition.opacity.duration.1500ms>
                            @if($video_atual !== (count($videos) - $i))
                                <img @if(isset($videos[(count($videos) - $i)]["snippet"]["thumbnails"]["maxres"])) src="{{ $videos[(count($videos) - $i)]["snippet"]["thumbnails"]["maxres"]["url"] }}" @else src="{{ $videos[(count($videos) - $i)]["snippet"]["thumbnails"]["medium"]["url"] }}" @endif class="w-full shadow-lg cpointer" style="" alt="" wire:click="mostrar({{ (count($videos) - $i) }})">
                                <img class="cpointer" src="{{ asset('imagens/play-button2.jpg') }}" width="60" style="position: absolute; top: calc(50% - 30px); left: calc(50% - 30px);" wire:click="mostrar({{ (count($videos) - $i) }})">
                            @else
                                {!! App\Classes\Util::convertYoutube("https://www.youtube.com/watch?v=" . $videos[(count($videos) - $i)]["contentDetails"]["videoId"]) !!}
                            @endif
                        </div>
                    </div>
                    
                    <div class="mt-3" style="font-size: 18px; font-weight: 500; font-family: Montserrat;">
                        {{ $videos[(count($videos) - $i)]["snippet"]["title"] }}
                    </div>
                </div>
            @endfor
        </div>
        <div class="my-5 border border-black border-solid w-full relative" style="height: 1px;">
            <label wire:click="mostrar_mais" wire:loading.class='swap-active' wire:target='mostrar_mais' class="swap absolute" style="top: -15px; left: calc(50% - 15px)">
                {{-- <input type="checkbox" /> --}}
                <div class="swap-on">
                    <img src="{{ asset('imagens/gif_relogio.gif') }}" width="27" height="27" alt="">
                </div>
                <div class="swap-off">
                    <svg  xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="bi bi-plus-circle text-slate-500 bg-white mb-1" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                    </svg>
                    <span class="text-slate-400 -ml-[13px] font-medium text-sm">Ver Mais</span>
                </div>
            </label>
        </div>
    </div>
</div>

@push("scripts")

<script>
    function carregarVideos(){
        console.log(@this.carregando_videos);
        Livewire.emit("mostrar_mais")
    }
</script>

@endpush