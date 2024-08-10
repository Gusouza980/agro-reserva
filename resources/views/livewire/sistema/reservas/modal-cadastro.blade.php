<div class="w-full" x-data="{ show: @entangle('show') }">
    <div x-show="show" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-[100] flex items-end bg-slate-900/60 backdrop-blur sm:items-center sm:justify-center">
        <!-- Modal -->
        <div x-show="show" x-transition:enter="transition ease-out duration-150"
            x-transition:enter-start="opacity-0 transform translate-y-1/2" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0  transform translate-y-1/2" @keydown.escape="show = false"
            class="w-full px-6 py-4 overflow-hidden max-h-[100vh] overflow-y-scroll bg-white rounded-t-lg dark:bg-navy-700 sm:rounded-lg sm:m-4 sm:max-w-[800px]"
            role="dialog">
            <!-- Modal body -->
            <div class="mt-4 mb-6">
                <!-- Modal title -->
                <p class="mb-2 text-lg font-semibold text-gray-900 dark:text-gray-700">
                    Cadastro de Reserva
                </p>

                @include('sistema.includes.divider')

                <div class="w-full">
                    @if ($show)
                        <form wire:submit.prevent='salvar' class="w-full">
                            <div class="w-full mb-3">
                                <label class="block">
                                    <span>Fazenda</span>
                                    <select wire:model.defer="fazenda_selecionada"
                                        class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent"
                                        required>
                                        <option value="">Selecionar...</option>
                                        @foreach (\App\Models\Fazenda::orderBy('nome_fazenda', 'ASC')->get() as $fazenda)
                                            <option value="{{ $fazenda->id }}">{{ $fazenda->nome_fazenda }}</option>
                                        @endforeach
                                    </select>
                                </label>
                                @error('fazenda_selecionada')
                                    <small class="text-red-600"> {{ $message }} </small>
                                @enderror
                            </div>
                            <div class="grid w-full grid-cols-3 gap-x-4">
                                <div class="mb-3">
                                    <label for="inicio">Início</label>
                                    <input type="date"
                                        class="w-full px-3 py-2 bg-transparent border rounded-lg form-input peer border-slate-300 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                        name="inicio" wire:model.defer="reserva.inicio" required>
                                </div>
                                <div class="mb-3">
                                    <label for="fim">Fim</label>
                                    <input type="date"
                                        class="w-full px-3 py-2 bg-transparent border rounded-lg form-input peer border-slate-300 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                        name="fim" wire:model.defer="reserva.fim" required>
                                </div>
                                <div class="mb-3">
                                    <label for="desconto_live_valor">Desconto à Vista (%)</label>
                                    <input type="number"
                                        class="w-full px-3 py-2 bg-transparent border rounded-lg form-input peer border-slate-300 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                        name="desconto_live_valor" min="0" step="0.01"
                                        wire:model.defer="reserva.desconto" required>
                                </div>
                            </div>
                            <div class="grid w-full grid-cols-3 gap-x-4">
                                <div class="mb-3">
                                    <label for="desconto_live_valor">Desconto de Live (%)</label>
                                    <input type="number"
                                        class="w-full px-3 py-2 bg-transparent border rounded-lg form-input peer border-slate-300 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                        name="desconto_live_valor" min="0" step="0.01"
                                        wire:model.defer="reserva.desconto_live_valor" required>
                                </div>
                                <div class="mb-3">
                                    <label for="multi_fazendas">Reserva Multi Fazendas ?</label>
                                    <select
                                        class="w-full px-3 py-2 bg-transparent border rounded-lg form-input peer border-slate-300 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                        name="multi_fazendas" wire:model.defer="reserva.multi_fazendas" required>
                                        <option value="">Selecione uma Opção</option>
                                        <option value="0">Não</option>
                                        <option value="1">Sim</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="ativo">Ativo</label>
                                    <select
                                        class="w-full px-3 py-2 bg-transparent border rounded-lg form-input peer border-slate-300 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                        name="ativo" wire:model.defer="reserva.ativo" required>
                                        <option value="">Selecione uma Opção</option>
                                        <option value="0">Não</option>
                                        <option value="1">Sim</option>
                                    </select>
                                </div>
                            </div>
                            <div class="grid w-full grid-cols-3 gap-x-4">
                                <div class="mb-3">
                                    <label for="mostrar_datas">Mostrar Data</label>
                                    <select
                                        class="w-full px-3 py-2 bg-transparent border rounded-lg form-input peer border-slate-300 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                        name="mostrar_datas" wire:model.defer="reserva.mostrar_datas" required>
                                        <option value="">Selecione uma Opção</option>
                                        <option value="0">Não</option>
                                        <option value="1" selected>Sim</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="ativo">Raça Pré-definida</label>
                                    <select
                                        class="w-full px-3 py-2 bg-transparent border rounded-lg form-input peer border-slate-300 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                        name="raca_id" wire:model.defer="reserva.raca_id">
                                        <option value="">Selecione uma Opção</option>
                                        <option value="-1">Nenhuma</option>
                                        @foreach (\App\Models\Raca::all() as $raca)
                                            <option value="{{ $raca->id }}">{{ $raca->nome }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="mostrar_datas">Número de Parcelas</label>
                                    <input type="number"
                                        class="w-full px-3 py-2 bg-transparent border rounded-lg form-input peer border-slate-300 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                        name="max_parcelas" min="1" step="1"
                                        wire:model.debounce.500ms="reserva.max_parcelas" required>
                                </div>
                            </div>
                            <label
                                class="font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80">
                                <input tabindex="-1" type="file"
                                    class="pointer-events-none absolute inset-0 h-full w-full opacity-0"
                                    wire:model="catalogo" />
                                <div
                                    class="cursor-pointer mb-3 rounded-lg py-2 px-4 @if (!$catalogo) bg-slate-300 @else bg-green-500 @endif flex items-center space-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                                    </svg>
                                    <span>
                                        @if (!$catalogo)
                                            Escolher Arquivo de Catálogo
                                        @else
                                            Catálogo carregado. Já pode salvar !
                                        @endif
                                    </span>
                                </div>
                            </label>
                            <hr>
                            @if ($reserva && $reserva->max_parcelas)
                                @if ($formas_pagamento)
                                    <div x-data="{ expandedItem: null }"
                                        class="flex flex-col divide-y divide-slate-150 dark:divide-navy-500">
                                        <div class="w-full my-3 border rounded-md p-3">
                                            <div class="w-full mb-3 font-semibold">
                                                Adicionar Intervalo
                                            </div>
                                            <div class="flex items-end gap-3">
                                                <div class="flex flex-col gap-2">
                                                    <label for="">Mínimo</label>
                                                    <input type="text"
                                                        class="w-full px-3 py-2 bg-transparent border rounded-lg form-input peer border-slate-300 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                                        wire:model="novo_intervalo.minimo">
                                                </div>
                                                <div class="flex flex-col gap-2">
                                                    <label for="">Máximo</label>
                                                    <input type="text"
                                                        class="w-full px-3 py-2 bg-transparent border rounded-lg form-input peer border-slate-300 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                                        wire:model="novo_intervalo.maximo">
                                                </div>
                                                <div class="flex flex-col gap-2">
                                                    <label for="">Desconto (%)</label>
                                                    <input type="text"
                                                        class="w-full px-3 py-2 bg-transparent border rounded-lg form-input peer border-slate-300 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                                        wire:model="novo_intervalo.desconto">
                                                </div>
                                                <div class="flex flex-col gap-2">
                                                    <button type="button" class="btn btn-primary"
                                                        wire:click="adicionar_intervalo">Adicionar</button>
                                                </div>
                                            </div>
                                        </div>
                                        @foreach ($formas_pagamento as $key => $forma_pagamento)
                                            <div x-data="accordionItem('item-{{ $key }}')" class="px-3 py-3 border border-gray-300">
                                                <div @click="expanded = !expanded"
                                                    class="flex items-center justify-between px-2 py-2 py-4 text-base font-medium bg-gray-200 cursor-pointer text-slate-700 dark:text-navy-100">
                                                    <p>
                                                        De {{ $forma_pagamento['minimo'] }} a
                                                        {{ $forma_pagamento['maximo'] }} parcela(as)
                                                    </p>
                                                    <div :class="expanded && '-rotate-180'"
                                                        class="text-sm font-normal leading-none transition-transform duration-300 text-slate-400 dark:text-navy-300">
                                                        <i class="fas fa-chevron-down"></i>
                                                    </div>
                                                </div>
                                                <div x-collapse x-show="expanded">
                                                    <div class="pb-4">
                                                        <div class="w-full my-2 font-medium">
                                                            Alterar Intervalo
                                                        </div>
                                                        <div class="flex items-end w-full gap-x-4">
                                                            <div class="mb-3">
                                                                <label for="">Mínimo</label>
                                                                <input type="text"
                                                                    class="w-full px-3 py-2 bg-transparent border rounded-lg form-input peer border-slate-300 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                                                    wire:model="atualizacoes_intervalos.{{ $key }}.minimo">
                                                            </div>
                                                            <div class="mb-3 ms-3">
                                                                <label for="">Máximo</label>
                                                                <input type="text"
                                                                    class="w-full px-3 py-2 bg-transparent border rounded-lg form-input peer border-slate-300 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                                                    wire:model="atualizacoes_intervalos.{{ $key }}.maximo">
                                                            </div>
                                                            <div class="mb-3 ms-3">
                                                                <label for="">Desconto(%)</label>
                                                                <input type="text"
                                                                    class="w-full px-3 py-2 bg-transparent border rounded-lg form-input peer border-slate-300 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                                                    wire:model="atualizacoes_intervalos.{{ $key }}.desconto">
                                                            </div>
                                                            <div class="mb-3 ms-3">
                                                                <button type="button" class="btn btn-primary"
                                                                    wire:click="atualizar_intervalo({{ $key }})">Salvar</button>
                                                            </div>
                                                        </div>
                                                        <hr class="my-2">
                                                        <div class="mb-2 font-medium">
                                                            Adicionar Regra
                                                        </div>
                                                        <div class="flex items-end w-full gap-x-4">
                                                            <div class="mb-3">
                                                                <label for="">Número de Meses</label>
                                                                <input type="text"
                                                                    class="w-full px-3 py-2 bg-transparent border rounded-lg form-input peer border-slate-300 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                                                    wire:model="regras.{{ $key }}.meses">
                                                            </div>
                                                            <div class="mb-3 ms-3">
                                                                <label for="">Número de
                                                                    Parcelas</label>
                                                                <input type="text"
                                                                    class="w-full px-3 py-2 bg-transparent border rounded-lg form-input peer border-slate-300 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                                                    wire:model="regras.{{ $key }}.parcelas">
                                                            </div>
                                                            <div class="mb-3 ms-3">
                                                                <button type="button" class="btn btn-primary"
                                                                    wire:click="adicionar_regra({{ $key }})">Adicionar</button>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="w-full mt-3">
                                                            @if (count($forma_pagamento['parcelas']) == 0)
                                                                <div
                                                                    class="w-full px-3 py-3 text-blue-500 border border-blue-600">
                                                                    Todas parcelas únicas
                                                                </div>
                                                            @else
                                                                <table class="table w-full">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Meses</th>
                                                                            <th>Parcelas</th>
                                                                            <th></th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @php
                                                                            $total_parcelas = 0;
                                                                        @endphp
                                                                        @foreach ($forma_pagamento['parcelas'] as $key_regra => $regra)
                                                                            <tr>
                                                                                <td scope="row">
                                                                                    {{ $regra['meses'] }}</td>
                                                                                <td>{{ $regra['parcelas'] }}
                                                                                </td>
                                                                                <td>
                                                                                    <button type="button"
                                                                                        wire:click="remover_regra({{ $key }}, {{ $key_regra }})">
                                                                                        <i
                                                                                            class="fas fa-times-circle text-danger fa-lg cpointer hover:bg-red-500"></i>
                                                                                    </button>
                                                                                </td>
                                                                            </tr>
                                                                            @php
                                                                                $total_parcelas +=
                                                                                    $regra['meses'] *
                                                                                    $regra['parcelas'];
                                                                            @endphp
                                                                        @endforeach
                                                                        @if ($total_parcelas < $forma_pagamento['maximo'])
                                                                            <tr>
                                                                                <td class="text-center"
                                                                                    colspan="3">A(as)
                                                                                    {{ $forma_pagamento['maximo'] - $total_parcelas }}
                                                                                    parcela(as) restantes serão
                                                                                    únicas</td>
                                                                            </tr>
                                                                        @endif
                                                                    </tbody>
                                                                </table>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="w-full flex gap-4 mt-4">
                                        <button type="submit"
                                            class="grow font-medium text-white bg-green-600 btn hover:bg-green-800">
                                            Salvar
                                        </button>
                                        <button type="button" @click="show = false"
                                            class="grow font-medium text-gray-600 hover:text-white transition duration-200 bg-gray-300 btn hover:bg-gray-600">
                                            Cancelar
                                        </button>
                                    </div>
                                @endif
                            @endif
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <x-loading></x-loading>
</div>
