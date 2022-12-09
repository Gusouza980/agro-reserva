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
                        @if(!$cliente->agriskTermosFinalizado)
                            @if(!$cliente->agriskTermosAceito)
                                <div class="w-full mt-4 text-left">
                                    <p>{!! $terms !!}</p>
                                    <div class="w-full mt-4 text-center">
                                        <button wire:click="negarTermos" class="mr-3 text-[#8c8e99] rounded-[0.5rem] text-[16px] waving-hand font-montserrat font-medium normal-case px-4 py-[10px]">Não Aceito</button>
                                        <button wire:click="aceitarTermos" class="text-white rounded-[0.5rem] btn-warning text-[20px] waving-hand font-montserrat font-medium normal-case px-4 py-[10px] animation duration-500 hover:scale-105">Aceito</button>
                                    </div>
                                </div>
                            @else
                                @if(!$cliente->agriskTermosRespondido)
                                    @if(!$reprovado && !$erro_codigo)
                                        <form wire:submit.prevent="enviarRespostas">
                                            @foreach($questoes as $questao)
                                                <div class="w-full mt-3">
                                                    <h5 class="font-bold text-md text-gray-900 mb-3">{{ $questao["questao"] }}</h5>
                                                    @foreach($questao["alternativas"] as $alternativa)
                                                        <div class="flex flex-col w-full space-y-5">
                                                            <div class="flex items-start w-full">
                                                                <div class="flex items-center h-5">
                                                                    <input 
                                                                        type="radio"
                                                                        class="w-4 h-4 border border-gray-300 rounded-full bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800" 
                                                                        name="{{ $questao["id"] }}"
                                                                        wire:model.defer="respostas.{{ $questao["id"] }}"
                                                                        value="{{ $alternativa }}"
                                                                        required
                                                                    >
                                                                </div>
                                                                
                                                                <label class="ml-2 text-sm font-medium text-gray-900">{{ $alternativa }}</label>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <hr class="mt-3">
                                            @endforeach
                                            <div class="w-full mt-4 text-center">
                                                <button type="submit" class="text-white rounded-[0.5rem] btn-warning text-[16px] waving-hand font-montserrat font-medium normal-case px-4 py-[6px] animation duration-500 hover:scale-105">Enviar Respostas</button>
                                            </div>
                                        </form>
                                    @elseif($reprovado)
                                        <div class="w-full">
                                            <div class="p-4 mt-4 text-center text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                                                <span class="font-medium">Ops:</span> Parece que você respondeu incorretamente alguma informação.
                                            </div>
                                            <div class="w-full mt-3 flex justify-center">
                                                <button type="button" wire:click="resetarFormulario" class="text-white rounded-[0.5rem] btn-warning text-[16px] waving-hand font-montserrat font-medium normal-case px-4 py-[6px] animation duration-500 hover:scale-105">Clique aqui para tentar novamente</button>
                                            </div>
                                        </div>
                                    @elseif($erro_codigo)
                                        <div class="w-full">
                                            <div class="p-4 mt-4 text-center text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                                                <span class="font-medium">Ops:</span> Desculpe, houve um erro no envio do código de verificação para o seu whatsapp. Por favor, entre em contato com o comercial e verifique se seu número de telefone está correto.
                                            </div>
                                            <div class="w-full mt-3 flex justify-center">
                                                <button type="button" wire:click="resetarFormulario" class="text-white rounded-[0.5rem] btn-warning text-[16px] waving-hand font-montserrat font-medium normal-case px-4 py-[6px] animation duration-500 hover:scale-105">Clique aqui para tentar novamente</button>
                                            </div>
                                        </div>
                                    @endif
                                @else
                                    <div class="w-full mt-4 text-left">
                                        <p>Quase lá ! Agora só falta você informar o código que lhe foi enviado no whatsapp para verificarmos que você é você e garantir ainda mais sua segurança !</p>
                                        <small>Caso não receba o código você pode solicitar o envio de novo clicando no botão "Reenviar"</small>
                                        <form wire:submit.prevent='verificarCodigo' class="w-full flex flex-row flex-wrap mt-3 items-end">
                                            @if(session()->get("sucesso"))
                                                <div class="p-4 mt-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
                                                    {{ session()->get("sucesso") }}
                                                </div>
                                            @endif
                                            <div class="w-ful md:w-2/3">
                                                <label class="text-black" for="">Código de ativação</label>
                                                <input type="text" class="w-full form-input-text"
                                                    maxlength="6" minlength="4" wire:model.defer="codigo_ativacao" required>
                                            </div>
                                            <div class="w-full md:w-1/3 flex space-x-4 md:mt-0 mt-3 md:justify-start justify-center">
                                                <button type="submit" class="md:ml-4 text-white rounded-[0.5rem] btn-warning text-[16px] waving-hand font-montserrat font-medium normal-case px-4 py-[10px] animation duration-500 hover:scale-105">Verificar</button>
                                                <button type="button" wire:click="reenviarCodigo" class="md:ml-4 text-white rounded-[0.5rem] btn-warning text-[16px] waving-hand font-montserrat font-medium normal-case px-4 py-[10px] animation duration-500 hover:scale-105">Reenviar</button>
                                            </div>
                                        </form>
                                    </div>
                                @endif
                            @endif
                        @else
                            @if($cliente->agriskTermosAceito && $cliente->agriskTermosRespondido && $cliente->agriskTermosVerificado)
                                <div class="p-4 mt-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
                                    Seus termos já estão conferidos e aprovados ! Você pode voltar a lista de etapas e continuar seu cadastro.
                                </div>
                            @else
                                <div class="p-4 mt-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                                    Você não aceitou os termos de compromisso, ou não passou em alguma fase do teste de identidade. Por favor, entre em contato com o comercial.
                                </div>
                            @endif
                        @endif
                    @endisset
                @endif
            </div>
        </div>
    </div>
    <x-loading></x-loading>
</div>

@push("scripts")
    <script>
        window.addEventListener("carregaCodigoDispositivo", (event) => {
            // Initialize the agent at application startup.
            const fpPromise = import('https://openfpcdn.io/fingerprintjs/v3')
                .then(FingerprintJS => FingerprintJS.load())
        
            // Get the visitor identifier when you need it.
            fpPromise.then(fp => fp.get())
                .then(result => {
                    // This is the visitor identifier:
                    const visitorId = result.visitorId
                    Livewire.emit('setCodigoDispositivo', visitorId)
            })
        });
    </script>
@endpush