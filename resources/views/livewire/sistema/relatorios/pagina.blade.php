<div class="w-full">
    <div class="w-full flex flex-wrap justify-start">
        @foreach($relatorios as $key => $relatorio)
            <button wire:click="$set('relatorio_selecionado', '{{ $key }}')" class="px-4 py-2 @if($relatorio_selecionado == $key) bg-gray-500 border text-white @else bg-gray-200 border text-gray-500 @endif px-5 py-3">{{ $relatorio }}</button>
        @endforeach
    </div>
    <div class="card w-full py-5 px-5 mt-5">
        @include($this->arquivos_relatorios[$relatorio_selecionado])        
    </div>
    <x-loading></x-loading>
</div>
