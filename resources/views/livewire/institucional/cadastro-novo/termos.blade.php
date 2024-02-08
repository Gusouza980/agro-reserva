<div class="w-full max-w-[800px] mx-auto relative">
    <div x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-0" x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-0" class="w-full font-montserrat absolute -top-[15vh] pb-10 md:pb-20">
        <div class="w-full">
            <a href="{{ route('index') }}" class="cursor-pointer transition duration-300 text-[14px] text-[#D7D8E4] hover:scale-105 hover:text-white"><i class="mr-2 fas fa-chevron-left"></i> <span>Voltar</span></a>
        </div>
        <div class="w-full px-6 md:px-16 pt-10 pb-10 mt-10 bg-white rounded-[20px] shadow-[0px_6px_60px_0px_rgba(0,0,0,0.06)] font-montserrat">
            <div class="w-full">
                @if($erros)
                    <div class="w-full bg-red-200 text-red-800 py-4 px-5 rounded-lg mb-5 font-semibold tracking-wide">
                        <span class="text-lg font-bold tracking-wider">Erro(s): </span>
                        @foreach($erros as $error)
                            <p>- {{ $error }}</p>
                        @endforeach
                    </div>
                    <div class="w-full flex gap-6 justify-center">
                        <a href="{{ route('cadastro.termos') }}" class="py-2 px-4 bg-gray-600 text-white font-semibold text-[15px] rounded-lg hover:bg-gray-800 transition duration-200">
                            Tentar Novamente
                        </a>
                        <button class="py-2 px-4 bg-emerald-500 text-white font-semibold text-[15px] rounded-lg hover:bg-emerald-800 transition duration-200">
                            Voltar ao início
                        </button>
                    </div>
                @else
                    
                    <div class="w-full">
                        @switch($this->getEtapa())
                            @case('termos')
                                <div class="w-full text-center">
                                    <h1 class="font-extrabold text-[23px] text-gray-700">Termo de autorização para consulta junto ao BACEN</h1>
                                    <h2 class="font-[700] text-[19px] text-gray-500 mt-14">
                                        Seu acesso exclusivo aguarda apenas um passo.
                                    </h2>
                                    <p class="text-[17px] text-gray-400 mt-4 font-semibold">
                                        Complete seu cadastro e mergulhe em uma jornada de ofertas incríveis para garantir seus resultados
                                        com animais de alto valor genético.
                                    </p>
                                    <p class="text-[17px] text-gray-700 mt-4 font-extrabold">
                                        Venha ser Agro Reserva!
                                    </p>
                                </div>
                                <div class="w-full px-5 py-5 rounded-lg bg-gray border border-gray-200 text-gray-600">
                                        {!! $this->getTermsText() !!}
                                </div>
                                <div class="w-full flex justify-center mt-5">
                                    <button wire:click="aceitar" class="bg-emerald-500 text-white transition duration-200 hover:bg-emerald-700 px-5 py-2 flex items-center justify-center gap-3 rounded-lg font-medium font-montserrat">
                                        <img src="{{ asset('imagens/icones/agrisk_terms_accept_check.svg') }}" width="25" alt="">
                                        Aceitar
                                    </button>
                                </div>
                                @break
                            @case('questoes')
                                @php
                                    $questions = $this->getTermsQuestions();
                                @endphp
                                @if($questions)
                                    <div class="w-full text-center">
                                        <h1 class="font-extrabold text-[23px] text-gray-700">Muito bem! Agora vamos para as perguntas.</h1>
                                        <h2 class="font-[700] text-[16px] text-gray-500 mt-3 mb-5">
                                            Essas perguntas são para sua segurança. Elas irão impedir que outras pessoas com acesso aos seus dados façam 
                                            o cadastro sem sua permissão.
                                        </h2>
                                    </div>
                                    <div class="w-full flex flex-col gap-y-6">
                                        @foreach($this->getTermsQuestions() as $question)
                                            <div class="w-full border border-gray-200 rounded-lg px-4 py-4">
                                                <h5 class="text-lg font-semibold tracking-wide text-gray-600">{{ $question->question }}</h5>
                                                <div class="w-full flex flex-col gap-y-3 mt-4">
                                                    @foreach($question->answers as $answer)
                                                        @php
                                                            $answer = json_decode(json_encode($answer), true);
                                                            $key = array_key_first($answer);
                                                        @endphp
                                                        <div class="w-full flex items-center justify-start">
                                                            <input type="radio" class="mr-2 radio" name="question-{{ $question->id }}" wire:model.defer="respostasQuestoes.{{ $question->id }}" value="{{ $answer[$key] }}" required/>
                                                            <span class="text-black font-montserrat text-[14px] font-medium">{{ $answer[$key] }}</span>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endforeach
                                        <form wire:submit.prevent="enviarRespostas" class="w-full flex flex-col gap-y-6">
                                            <div class="w-full flex justify-center">
                                                <button type="submit" class="bg-emerald-500 text-white transition duration-200 hover:bg-emerald-700 px-5 py-2 flex items-center justify-center gap-3 rounded-lg font-medium font-montserrat">
                                                    <img src="{{ asset('imagens/icones/agrisk_terms_accept_check.svg') }}" width="25" alt="">
                                                    Enviar
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                @else
                                    <div class="w-full bg-red-400 text-red-700 py-3 px-4">
                                        Ocorreu um erro ao dar prosseguimento na análise de crédito. Por favor, entre em contato com a equipe comercial.
                                    </div>
                                @endif
                                @break
                            @case('codigo')
                                <div class="w-full text-center">
                                    <h1 class="font-extrabold text-[23px] text-gray-700">Quase lá! Agora só falta mais um passo.</h1>
                                    <h2 class="font-[700] text-[19px] text-gray-500 mt-6">
                                        Informe o código recebido pelo whatsapp para concluir o cadastro.
                                    </h2>
                                </div>
                                <div class="w-full flex justify-center">
                                    <form wire:submit.prevent="enviarCodigo" class="w-full max-w-[500px] mt-10">
                                        <div class="w-full relative mb-2">
                                            <input type="text" class="w-full h-10 px-4 py-1 border border-gray-200 rounded-lg" wire:model="codigo_ativacao" placeholder="Insira aqui o código">
                                            <button class="h-10 w-10 absolute right-0 top-0 flex items-center justify-center bg-emerald-400 hover:bg-emerald-600 transition duration-200 text-white rounded-r-lg">
                                                <img src="{{ asset('imagens/icones/agrisk_terms_accept_check.svg') }}" width="25" alt="">
                                            </button>
                                        </div>
                                        <div class="w-full flex justify-end" wire:loading.class="hidden" wire:target="enviarCodigo">
                                            <small><b>Obs:</b> o código pode levar até <b>15 minutos</b> para chegar ao seu whatsapp. Caso não chegue, <a class="text-blue-500 font-semibold underline underline-offset-4 cursor-pointer" wire:click="reenviarCodigo">clique aqui</a> para tentar novamente.</small>
                                        </div>
                                    </form>
                                </div>
                                @break
                        @endswitch
                    </div>
                @endif
            </div>
        </div>
    </div>
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