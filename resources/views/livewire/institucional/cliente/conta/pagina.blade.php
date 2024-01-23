<div class="w1200 mx-auto my-10 flex gap-10" x-data="{pagina: @entangle('tab')}">
    <div class="hidden shrink-0 w-[350px] max-w-full bg-white rounded-lg px-6 py-8 md:flex flex-col h-full">
        <div class="w-full min-h-[90px] border-b-2 border-slate-300 pb-[8px]">
            <h4 class="font-bold tracking-wider text-lg text-gray-700">{{ $cliente['nome_dono'] }}</h4>
            <p class="text-gray-400 font-medium text-md">
                {{ $cliente['email'] }}
            </p>
            <p>
                <x-institucional.elements.badge class="mt-1" bgColor="{{ config('clientes.aprovacao.cor')[$cliente['aprovado']] }}">
                    {{ config('clientes.aprovacao.status')[$cliente['aprovado']] }}
                </x-institucional.elements.badge>
            </p>
        </div>
        <div class="w-full mt-[15px]">
            <ul class="border border-slate-300 text-gray-500">
                <li @click="pagina = 'dados'" class="py-[8px] hover:bg-orange-500 hover:text-white cursor-pointer transition duration-200 px-[10px] border-b border-slate-300" :class="(pagina == 'dados') ? 'bg-orange-500 text-white' : ''"><i class="fa-solid fa-user mr-[5px]"></i> Dados Pessoais</li>
                <li @click="pagina = 'documentos'" class="py-[8px] hover:bg-orange-500 hover:text-white cursor-pointer transition duration-200 px-[10px] border-b border-slate-300" :class="(pagina == 'documentos') ? 'bg-orange-500 text-white' : ''"><i class="fa-solid fa-folder-open mr-[5px]"></i> Documentos</li>
                <li @click="pagina = 'compras'" class="py-[8px] hover:bg-orange-500 hover:text-white cursor-pointer transition duration-200 px-[10px] border-b border-slate-300" :class="(pagina == 'compras') ? 'bg-orange-500 text-white' : ''"><i class="fa-solid fa-truck mr-[5px]"></i> Compras</li>
                <li @click="pagina = 'atendimento'" class="py-[8px] hover:bg-orange-500 hover:text-white cursor-pointer transition duration-200 px-[10px] border-b border-slate-300" :class="(pagina == 'atendimento') ? 'bg-orange-500 text-white' : ''"><i class="fa-solid fa-headset mr-[5px]"></i> Atendimento</li>
                <a href="{{ route('sair') }}" class="flex items-center w-full py-[8px] hover:bg-orange-500 hover:text-white cursor-pointer transition duration-200 px-[10px] " :class="(pagina == 'sair') ? 'bg-orange-500 text-white' : ''"><i class="fa-solid fa-right-from-bracket mr-[5px]"></i> Sair</a>
            </ul>
        </div>
    </div>
    <div class="w-full md:px-0 px-3">
        <div class="w-full rounded-t-lg flex md:hidden">
            <div @click="pagina = 'dados'" :class="(pagina == 'dados') ? 'bg-orange-500 text-white' : ''" class="rounded-tl-lg grow py-[10px] flex items-center justify-center hover:bg-orange-500 text-gray-500 border bg-white hover:text-white cursor-pointer transition duration-200 px-[10px] border-slate-300">
                <i class="fa-solid fa-user"></i>
            </div>
            <div @click="pagina = 'documentos'" :class="(pagina == 'documentos') ? 'bg-orange-500 text-white' : ''" class="grow py-[10px] flex items-center justify-center hover:bg-orange-500 text-gray-500 border bg-white hover:text-white cursor-pointer transition duration-200 px-[10px] border-slate-300">
                <i class="fa-solid fa-folder-open"></i>
            </div>
            <div @click="pagina = 'compras'" :class="(pagina == 'compras') ? 'bg-orange-500 text-white' : ''" class="grow py-[10px] flex items-center justify-center hover:bg-orange-500 text-gray-500 border bg-white hover:text-white cursor-pointer transition duration-200 px-[10px] border-slate-300">
                <i class="fa-solid fa-truck"></i>
            </div>
            <div @click="pagina = 'atendimento'" :class="(pagina == 'atendimento') ? 'bg-orange-500 text-white' : ''" class="grow py-[10px] flex items-center justify-center hover:bg-orange-500 text-gray-500 border bg-white hover:text-white cursor-pointer transition duration-200 px-[10px] border-slate-300">
                <i class="fa-solid fa-headset"></i>
            </div>
            <a href="{{ route('sair') }}" :class="(pagina == 'sair') ? 'bg-orange-500 text-white' : ''" class="rounded-tr-lg grow py-[10px] flex items-center justify-center hover:bg-orange-500 text-gray-500 border bg-white hover:text-white cursor-pointer transition duration-200 px-[10px] border-slate-300">
                <i class="fa-solid fa-right-from-bracket"></i>
            </a>
        </div>
        <div class="w-full bg-white md:rounded-t-lg rounded-b-lg px-6 py-8" wire:loading.class="opacity-50">
            @switch($tab)        
                @case('dados')
                    <livewire:institucional.cliente.conta.dados>
                    @break
                @case('documentos')
                    <livewire:institucional.cliente.conta.documentos>
                    @break
                @case('compras')
                    <livewire:institucional.cliente.conta.compras>
                    @break
                @case('atendimento')
                    <livewire:institucional.cliente.conta.atendimento>
                    @break
            @endswitch
        </div>
    </div>
    
</div>
