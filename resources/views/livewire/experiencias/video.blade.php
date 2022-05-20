<div class="w-full relative" x-data="{ show: false }" x-intersect.enter="show = true">
    <div class="w-full" x-show="show" x-transition.opacity.duration.1500ms>
        @if($op == "thumb")
            <img src="{{ $youtube["thumb"] }}" class="w-full cpointer shadow-lg" style="filter: brightness(25%);" alt="" wire:click="mostrar">
            <img class="cpointer" src="{{ asset('imagens/play-button2.jpg') }}" width="60" style="position: absolute; top: calc(50% - 30px); left: calc(50% - 30px);" wire:click="mostrar">
        @else
            {!! $youtube["video"] !!}
        @endif
    </div>
</div>
