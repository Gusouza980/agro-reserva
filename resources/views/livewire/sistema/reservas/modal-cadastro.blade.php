<div class="w-full" x-data="{ show: @entangle('show') }">
    <div x-show="show" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-[100] flex items-end bg-slate-900/60 backdrop-blur sm:items-center sm:justify-center">
        <!-- Modal -->
        <div x-show="show" x-transition:enter="transition ease-out duration-150"
            x-transition:enter-start="opacity-0 transform translate-y-1/2" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0  transform translate-y-1/2" @click.away="show = false"
            @keydown.escape="show = false"
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
                                    name="inicio" wire:model="reserva.inicio" required>
                            </div>
                            <div class="mb-3">
                                <label for="fim">Fim</label>
                                <input type="date"
                                    class="w-full px-3 py-2 bg-transparent border rounded-lg form-input peer border-slate-300 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                    name="fim" wire:model="reserva.fim" required>
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
                                    name="raca_id" wire:model="reserva.raca_id" required>
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
                        <hr>
                        <div x-data="{ expandedItem: null }"
                            class="flex flex-col divide-y divide-slate-150 dark:divide-navy-500">
                            @dd($formas_pagamento)
                            @foreach ($formas_pagamento as $key => $forma_pagamento)
                                <div x-data="accordionItem('item-{{ $key }}')">
                                    <div @click="expanded = !expanded"
                                        class="flex items-center justify-between py-4 text-base font-medium cursor-pointer text-slate-700 dark:text-navy-100">
                                        <p>
                                            De {{ $forma_pagamento['minimo'] }} a {{ $forma_pagamento['maximo'] }} parcela(as)
                                        </p>
                                        <div :class="expanded && '-rotate-180'"
                                            class="text-sm font-normal leading-none transition-transform duration-300 text-slate-400 dark:text-navy-300">
                                            <i class="fas fa-chevron-down"></i>
                                        </div>
                                    </div>
                                    <div x-collapse x-show="expanded">
                                        <div class="pb-4">
                                            <div class="w-full mb-2">
                                                Alterar Intervalo
                                            </div>
                                            <div class="flex items-end w-full">
                                                <div class="mb-3">
                                                    <label for="">Mínimo</label>
                                                    <input type="text" class="w-full px-3 py-2 bg-transparent border rounded-lg form-input peer border-slate-300 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                                        wire:model="atualizacoes_intervalos.{{ $key }}.minimo">
                                                </div>
                                                <div class="mb-3 ms-3">
                                                    <label for="">Máximo</label>
                                                    <input type="text" class="w-full px-3 py-2 bg-transparent border rounded-lg form-input peer border-slate-300 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                                        wire:model="atualizacoes_intervalos.{{ $key }}.maximo">
                                                </div>
                                                <div class="mb-3 ms-3">
                                                    <label for="">Desconto(%)</label>
                                                    <input type="text" class="w-full px-3 py-2 bg-transparent border rounded-lg form-input peer border-slate-300 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                                        wire:model="atualizacoes_intervalos.{{ $key }}.desconto">
                                                </div>
                                                <div class="mb-3 ms-3">
                                                    <button type="button" class="btn btn-primary"
                                                        wire:click="atualizar_intervalo({{ $key }})">Salvar</button>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="mb-2">
                                                Adicionar Regra
                                            </div>
                                            <div class="flex items-end w-full">
                                                <div class="mb-3">
                                                    <label for="">Número de Meses</label>
                                                    <input type="text" class="form-control"
                                                        wire:model="regras.{{ $key }}.meses"
                                                        >
                                                </div>
                                                <div class="mb-3 ms-3">
                                                    <label for="">Número de
                                                        Parcelas</label>
                                                    <input type="text" class="form-control"
                                                        wire:model="regras.{{ $key }}.parcelas"
                                                        >
                                                </div>
                                                <div class="mb-3 ms-3">
                                                    <button type="button" class="btn btn-primary"
                                                        wire:click="adicionar_regra({{ $key }})">Adicionar</button>
                                                </div>
                                            </div>
                                            <hr>
                                            <div>
                                                @if (count($forma_pagamento['parcelas']) == 0)
                                                    <span>Todas parcelas únicas</span>
                                                @else
                                                    <table class="table">
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
                                                                    <td><i class="fas fa-times-circle text-danger fa-lg cpointer"
                                                                            wire:click="remover_regra({{ $key }}, {{ $key_regra }})"></i>
                                                                    </td>
                                                                </tr>
                                                                @php
                                                                    $total_parcelas += $regra['meses'] * $regra['parcelas'];
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
                    @endif
                </div>
            </div>
        </div>
    </div>
    <x-loading></x-loading>
</div>
