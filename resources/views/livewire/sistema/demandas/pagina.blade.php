<div class="w-full">
    <div class="w-full flex justify-start">
        @foreach(\Acessos::$niveis as $key => $nivel)
            <button wire:click="$set('setor', '{{ $key }}')" class="flex-grow @if($setor == $key) bg-gray-500 border text-white @else bg-gray-200 border text-gray-500 @endif px-5 py-3">{{ $nivel }}</button>
        @endforeach
    </div>
    <div class="w-full mt-10">
        @livewire('sistema.demandas.listagem', ['setor' => $setor])
    </div>
    <x-loading></x-loading>
</div>
