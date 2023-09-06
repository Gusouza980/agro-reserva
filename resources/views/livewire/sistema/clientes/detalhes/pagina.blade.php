<div class="w-full">
    <div class="w-full flex space-x-1">
        <div class="flex justify-start flex-nowrap overflow-x-scroll md:overflow-x-hidden w-full">
            @foreach($menus as $key => $nome)
                <button wire:click="$set('menu', '{{ $key }}')" class="flex-grow @if($menu == $key) bg-orange-600 border text-white @else bg-gray-200 hover:bg-orange-600 hover:text-white border border-slate-300 text-gray-500 @endif px-5 py-3">{{ $nome }}</button>
            @endforeach
        </div>
    </div>
    <hr class="my-3">
    <div class="w-full">
        @switch($menu)
            @case(0)
                @include('sistema.clientes.includes.informacoes-pessoais')
                @break
            @case(1)
                @include('sistema.clientes.includes.informacoes-propriedade')
                @break
            @case(2)
                @include('sistema.clientes.includes.referencias')
                @break
            @case(3)
                @include('sistema.clientes.includes.visitas')
                @break
            @case(4)
                @include('sistema.clientes.includes.interesses')
                @break
        @endswitch
    </div>
    <x-loading></x-loading>
</div>
