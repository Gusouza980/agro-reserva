<div class="mx-auto mt-4 w1400">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-5 gap-y-6 justify-content-center">
        @for($i = 0; $i < $take; $i++)
            <div class="px-2 md:px-0 px-md-0">
                <div class="relative w-full" x-data="{ show: false }" x-intersect.enter="show = true">
                    <div class="w-full overflow-hidden rounded-md" x-show="show" x-transition.opacity.duration.1500ms>
                        @if($video_atual !== $i)
                            <img src="{{ $videos[$i]["snippet"]["thumbnails"]["medium"]["url"] }}" class="w-full shadow-lg cpointer" style="filter: brightness(25%);" alt="" wire:click="mostrar({{ $i }})">
                            <img class="cpointer" src="{{ asset('imagens/play-button2.jpg') }}" width="60" style="position: absolute; top: calc(50% - 30px); left: calc(50% - 30px);" wire:click="mostrar({{ $i }})">
                        @else
                            {!! App\Classes\Util::convertYoutube("https://www.youtube.com/watch?v=" . $videos[$i]["contentDetails"]["videoId"]) !!}
                        @endif
                    </div>
                </div>
                
                <div class="" style="font-size: 18px; font-weight: 500; font-family: Montserrat;">
                    {{ $videos[$i]["snippet"]["title"] }}
                </div>
            </div>
        @endfor
    </div>
    <div class="flex justify-content-center">
        <span wire:click="mostrar_mais">MOSTRAR MAIS</span>
    </div>
</div>
