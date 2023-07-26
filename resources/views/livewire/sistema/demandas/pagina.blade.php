<div class="w-full">
    <div class="w-full flex justify-start">
        <button wire:click="$set('setor', 'comercial')" class="flex-grow @if($setor == 'comercial') bg-gray-500 border text-white @else bg-gray-200 border text-gray-500 @endif px-5 py-3">Comercial</button>
        <button wire:click="$set('setor', 'marketing')" class="flex-grow @if($setor == 'marketing') bg-gray-500 border text-white @else bg-gray-200 border text-gray-500 @endif  px-5 py-3 hover:bg-gray-500 hover:text-white">Marketing</button>
        <button wire:click="$set('setor', 'financeiro')" class="flex-grow @if($setor == 'financeiro') bg-gray-500 border text-white @else bg-gray-200 border text-gray-500 @endif px-5 py-3 hover:bg-gray-500 hover:text-white">Financeiro</button>
        <button wire:click="$set('setor', 'ti')" class="flex-grow @if($setor == 'ti') bg-gray-500 border text-white @else bg-gray-200 border text-gray-500 @endif px-5 py-3 hover:bg-gray-500 hover:text-white">TI</button>
        <button wire:click="$set('setor', 'digital')" class="flex-grow @if($setor == 'digital') bg-gray-500 border text-white @else bg-gray-200 border text-gray-500 @endif hover:bg-gray-500 hover:text-white">Digital</button>
        <button wire:click="$set('setor', 'criacao')" class="flex-grow @if($setor == 'criacao') bg-gray-500 border text-white @else bg-gray-200 border text-gray-500 @endif hover:bg-gray-500 hover:text-white">Criação</button>
    </div>
    <div class="w-full mt-10">
        @livewire('sistema.demandas.listagem', ['setor' => $setor])
    </div>
    <x-loading></x-loading>
</div>
