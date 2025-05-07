<div class="w-full" x-data="{ show: @entangle('show') }">
    <div x-show="show" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-[100] flex items-end bg-slate-900/60 backdrop-blur sm:items-center sm:justify-center">
        <!-- Modal -->
        <div x-show="show" x-transition:enter="transition ease-out duration-150"
            x-transition:enter-start="opacity-0 transform translate-y-1/2" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0  transform translate-y-1/2"
            @keydown.escape="show = false"
            class="w-full px-6 py-4 relative overflow-hidden max-h-[100vh] overflow-y-scroll bg-white rounded-t-lg dark:bg-navy-700 sm:rounded-lg sm:m-4 sm:max-w-[800px]"
            role="dialog">
            <i @click="show = false" class="cursor-pointer fas fa-xmark fa-lg absolute top-5 right-5"></i>
            <!-- Modal body -->
            <div class="mt-4 mb-6">
                <!-- Modal title -->
                <p class="mb-2 text-lg font-semibold text-gray-900 dark:text-gray-700">
                    Detalhes da Demanda
                </p>

                @include('sistema.includes.divider')

                <div class="w-full">
                    @if ($show)
                        <div class="w-full">
                            <p><b>Solicitante:</b> {{ $demanda['solicitante']['nome'] }}</p>
                            <p class="mt-1"><b>Solicitado:</b> {{ $demanda['solicitado']['nome'] }}</p>
                            <p class="mt-1"><b>Demanda:</b> {{ $demanda['titulo'] }}</p>
                            <p class="mt-1"><b>Descrição:</b> {!! $demanda['descricao'] !!}</p>
                            <p class="mt-1"><b>Previsão de entrega:</b> {{ date('d/m/Y', strtotime($demanda["previsao_entrega"])) }}</p>
                            <p class="mt-1"><b>Status:</b> {{ ($demanda['entrega']) ? 'Entregue em ' . date("d/m/Y", strtotime($demanda['entrega'])) : 'Não entregue' }}</p>
                        </div>
                        <hr class="my-3">
                        <div class="w-full flex justify-start mt-5">
                            @foreach($menus as $key => $nome)
                                <button wire:click="$set('menu', '{{ $key }}')" class="flex-grow @if($menu == $key) bg-gray-500 border text-white @else bg-gray-200 border text-gray-500 @endif px-5 py-1">{{ $nome }}</button>
                            @endforeach
                        </div>
                        @switch($menu)
                            @case(0)
                                <div class="w-full mt-3">
                                    <div class="w-full flex flex-wrap gap-4">
                                        @foreach($this->getArquivos() as $arquivo)
                                            <a href="{{ asset($arquivo['caminho']) }}" title="{{ $arquivo['nome'] }}" download='{{ $arquivo['nome'] . '.' . $arquivo['tipo'] }}' class="px-3 py-3 w-[130px] flex flex-col items-center justify-center border border-slate-200 rounded-lg">
                                                <i class="{{ (isset(config('extensions')[$arquivo['tipo']])) ? config('extensions')[$arquivo['tipo']] : 'fas fa-file' }} fa-3x"></i>
                                                <small class="mt-2">{{ \Illuminate\Support\Str::limit($arquivo['nome'], 15, $end='...') }}</small>
                                            </a>
                                        @endforeach
                                        <label for="input_arquivo" class="bg-gray-700 text-white cursor-pointer w-[130px] px-3 py-3 flex flex-col justify-center items-center border border-slate-200 rounded-lg">
                                            <i class="fas fa-file-circle-plus fa-3x"></i>
                                            <input id="input_arquivo" style="display: none;" type="file" wire:model="novo_arquivo">
                                            <small class="mt-2">Novo Arquivo</small>
                                        </label>
                                    </div>
                                </div>
                                @break;
                            @case(1)
                                <div class="w-full mt-3">
                                    <form wire:submit.prevent='adicionarObservacao' class="w-full flex gap-4 items-end">
                                        <div class="grow">
                                            <label for="inicio" class="mb-1">Nova Observação</label>
                                            <input type="text"
                                                class="w-full px-3 py-2 bg-transparent border rounded-lg form-input peer border-slate-300 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                                wire:model.defer="nova_observacao" required>
                                        </div>
                                        <div>
                                            <button class="bg-orange-600 text-white py-2 px-3 rounded-lg">+</button>
                                        </div>
                                    </form>
                                    <hr class="my-2">
                                    <div class="w-full">
                                        @foreach($this->getObservacoes() as $observacao)
                                            <div class="w-full flex items-center border border-slate-300 rounded-lg px-3 py-3 gap-4 mb-3">
                                                <div class="shrink-0">
                                                    <img src="{{ \Util::getImagemOuPadrao($observacao['usuario']['foto']) }}" class="w-[80px] rounded-full overflow-hidden" alt="">
                                                </div>
                                                <div class="grow">
                                                    <h5 class="font-semibold">{{ $observacao['usuario']['nome'] }}</h5>
                                                    <div>
                                                        {{ $observacao['conteudo'] }}
                                                    </div>
                                                    <div class="w-full flex justify-end">
                                                        <small>{{ date("d/m/Y H:i:s", strtotime($observacao['created_at'])) }}</small>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                        @endswitch
                    @endif
                </div>
            </div>
        </div>
    </div>
    <x-loading></x-loading>
</div>
