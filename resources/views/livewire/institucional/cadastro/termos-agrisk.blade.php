<div x-data="{ showFormPreCadastro: @entangle('show') }" class="w-full max-w-[800px] mx-auto relative">
    <div x-cloak x-show="showFormPreCadastro" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-0" x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-0" class="w-full font-montserrat absolute -top-[15vh] pb-5">
        <div class="w-full">
            <span wire:click="voltar" class="cursor-pointer transition duration-300 text-[14px] text-[#D7D8E4] hover:scale-105 hover:text-white"><i class="mr-2 fas fa-chevron-left"></i> <span>Voltar</span></span>
        </div>
        <div class="w-full px-6 md:px-20 py-5 mt-3 bg-white rounded-lg shadow-[6px_6px_20px_rgba(36,62,111,0.11)]">
            {{-- <x-institucional.cadastro.step-bar step="1"></x-institucional.cadastro.step-bar> --}}
            <div class="w-full">
                @if(session()->get("erro"))
                    <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                        <span class="font-medium">Erro:</span> {{ session()->get("erro") }}
                    </div>
                @else
                    <div class="w-full mt-4 text-center">
                        <h1 class="text-[30px] text-[#4A5860] font-montserrat font-medium">Termos de Compromisso</h1>
                    </div>
                    @isset($cliente)
                        @if(!$cliente->agriskTermosAceito)
                            <div class="w-full mt-4 text-left">
                                <p>{!! $terms !!}</p>
                                <div class="w-full mt-4 text-center">
                                    <button wire:click="aceitarTermos" class="text-white rounded-[0.5rem] btn-warning text-[20px] waving-hand font-montserrat font-medium normal-case px-4 py-[10px] animation duration-500 hover:scale-105">Aceitar Termos</button>
                                </div>
                            </div>
                        @else
                            <form wire:submit.prevent="enviarRespostas">
                                @foreach($questoes as $questao)
                                    @if(is_array($questao))
                                        @dd($questao)
                                    @endif
                                    <div class="w-full mt-3">
                                        <h5 class="font-bold text-md text-gray-900 mb-3">{{ $questao->question }}</h5>
                                        @foreach($questao->answers as $alternativa)
                                            <div class="flex flex-col w-full space-y-5">
                                                <div class="flex items-start w-full">
                                                    @php
                                                        $valor = new ArrayIterator($alternativa);
                                                        $valor = $valor->current();
                                                    @endphp
                                                    <div class="flex items-center h-5">
                                                        <input 
                                                            type="radio"
                                                            class="w-4 h-4 border border-gray-300 rounded-full bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800" 
                                                            name="{{ $questao->id }}"
                                                            wire:model.defer="respostas.{{ $questao->id }}"
                                                            value="{{ $valor }}"
                                                            required
                                                        >
                                                    </div>
                                                    
                                                    <label class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $valor }}</label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <hr class="mt-3">
                                @endforeach
                                @if(!$reprovado)
                                    <div class="w-full mt-4 text-center">
                                        <button type="submit" class="text-white rounded-[0.5rem] btn-warning text-[16px] waving-hand font-montserrat font-medium normal-case px-4 py-[6px] animation duration-500 hover:scale-105">Enviar Respostas</button>
                                    </div>
                                @else
                                    <div class="p-4 mt-4 text-center text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                                        <span class="font-medium">Ops:</span> Parece que você respondeu incorretamente alguma informação.
                                    </div>
                                    <div class="w-full">
                                        <button type="submit" class="text-white rounded-[0.5rem] btn-warning text-[16px] waving-hand font-montserrat font-medium normal-case px-4 py-[6px] animation duration-500 hover:scale-105">Clique aqui para tentar novamente</button>
                                    </div>
                                @endif
                            </form>
                        @endif
                    @endisset
                @endif
            </div>
        </div>
    </div>
    <x-loading></x-loading>
</div>

@push("scripts")

@endpush