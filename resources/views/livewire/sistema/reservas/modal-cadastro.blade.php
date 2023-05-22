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
                    @if($show)
                        <div class="w-full mb-3">
                            <label class="block">
                                <span>Fazenda</span>
                                <select wire:model.defer="fazenda_selecionada" class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent" required>
                                    <option value="">Selecionar...</option>
                                    @foreach(\App\Models\Fazenda::orderBy("nome_fazenda", "ASC")->get() as $fazenda)
                                        <option value="{{ $fazenda->id }}">{{ $fazenda->nome_fazenda }}</option>
                                    @endforeach
                                </select>
                            </label>
                            @error("fazenda_selecionada") <small class="text-red-600"> {{ $message }} </small> @enderror
                        </div>
                        <div class="grid w-full grid-cols-3 gap-x-4">
                            <div class="mb-3">
                                <label for="inicio">Início</label>
                                <input type="date" class="w-full px-3 py-2 bg-transparent border rounded-lg form-input peer border-slate-300 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" name="inicio"
                                    wire:model="reserva.inicio" required>
                            </div>
                            <div class="mb-3">
                                <label for="fim">Fim</label>
                                <input type="date" class="w-full px-3 py-2 bg-transparent border rounded-lg form-input peer border-slate-300 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" name="fim"
                                    wire:model="reserva.fim" required>
                            </div>
                            <div class="mb-3">
                                <label for="desconto_live_valor">Desconto à Vista (%)</label>
                                <input type="number" class="w-full px-3 py-2 bg-transparent border rounded-lg form-input peer border-slate-300 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" name="desconto_live_valor"
                                    min="0" step="0.01" wire:model.defer="reserva.desconto" required>
                            </div>
                        </div>
                        <div class="grid w-full grid-cols-3 gap-x-4">
                            <div class="mb-3">
                                <label for="desconto_live_valor">Desconto de Live (%)</label>
                                <input type="number" class="w-full px-3 py-2 bg-transparent border rounded-lg form-input peer border-slate-300 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" name="desconto_live_valor"
                                    min="0" step="0.01" wire:model.defer="reserva.desconto_live_valor"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="multi_fazendas">Reserva Multi Fazendas ?</label>
                                <select class="w-full px-3 py-2 bg-transparent border rounded-lg form-input peer border-slate-300 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" name="multi_fazendas"
                                    wire:model.defer="reserva.multi_fazendas" required>
                                    <option value="">Selecione uma Opção</option>
                                    <option value="0">Não</option>
                                    <option value="1">Sim</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="ativo">Ativo</label>
                                <select class="w-full px-3 py-2 bg-transparent border rounded-lg form-input peer border-slate-300 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" name="ativo" wire:model.defer="reserva.ativo" required>
                                    <option value="">Selecione uma Opção</option>
                                    <option value="0">Não</option>
                                    <option value="1">Sim</option>
                                </select>
                            </div>
                        </div>
                        <div class="grid w-full grid-cols-3 gap-x-4">
                            <div class="mb-3">
                                <label for="mostrar_datas">Mostrar Data</label>
                                <select class="w-full px-3 py-2 bg-transparent border rounded-lg form-input peer border-slate-300 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" name="mostrar_datas"
                                    wire:model.defer="reserva.mostrar_datas" required>
                                    <option value="">Selecione uma Opção</option>
                                    <option value="0">Não</option>
                                    <option value="1" selected>Sim</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="ativo">Raça Pré-definida</label>
                                <select class="w-full px-3 py-2 bg-transparent border rounded-lg form-input peer border-slate-300 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" name="raca_id" wire:model="reserva.raca_id" required>
                                    <option value="">Selecione uma Opção</option>
                                    <option value="-1">Nenhuma</option>
                                    @foreach (\App\Models\Raca::all() as $raca)
                                        <option value="{{ $raca->id }}">{{ $raca->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="mostrar_datas">Número de Parcelas</label>
                                <input type="number" class="w-full px-3 py-2 bg-transparent border rounded-lg form-input peer border-slate-300 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" name="max_parcelas"
                                    min="1" step="1"
                                    wire:model.debounce.500ms="reserva.max_parcelas" required>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <x-loading></x-loading>
</div>
