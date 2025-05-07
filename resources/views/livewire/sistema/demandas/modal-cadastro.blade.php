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
                    Cadastro de Demanda
                </p>

                @include('sistema.includes.divider')

                <div class="w-full">
                    @if ($show)
                        <form wire:submit.prevent='salvar' class="w-full">
                            <div class="w-full mb-3">
                                <label class="block">
                                    <span>Solicitado</span>
                                    <select wire:model.defer="demanda.solicitado_id"
                                        class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent"
                                        required>
                                        <option value="">Selecionar...</option>
                                        @foreach ($usuarios as $usuario)
                                            <option value="{{ $usuario["id"] }}">{{ $usuario["nome"] }} - {{ \Acessos::$niveis[$usuario['acesso']] }}</option>
                                        @endforeach
                                    </select>
                                </label>
                            </div>
                            <div class="w-full mb-3">
                                <label class="block">
                                    <span>Setor</span>
                                    <select wire:model.defer="demanda.setor"
                                        class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent"
                                        required>
                                        <option value="">Selecionar...</option>
                                        @foreach (\Acessos::$niveis as $key => $nivel)
                                            <option value="{{ $key }}">{{ $nivel }}</option>
                                        @endforeach
                                    </select>
                                </label>
                            </div>
                            <div class="mb-3">
                                <label for="inicio">Demanda</label>
                                <input type="text"
                                    class="w-full px-3 py-2 bg-transparent border rounded-lg form-input peer border-slate-300 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                    wire:model.defer="demanda.titulo" required>
                            </div>
                            <div class="mb-3">
                                <label for="inicio">Descrição</label>
                                <textarea
                                    class="w-full px-3 py-2 bg-transparent border rounded-lg form-input peer border-slate-300 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                    wire:model.defer="demanda.descricao" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="inicio">Previsão de Entrega</label>
                                <input type="date"
                                    class="w-full px-3 py-2 bg-transparent border rounded-lg form-input peer border-slate-300 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                    wire:model.defer="demanda.previsao_entrega" required>
                            </div>
                            <div class="w-full">
                                <button type="submit"
                                    class="w-full font-medium text-white bg-green-600 btn hover:bg-green-800"
                                >
                                    Salvar
                                </button>                            
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <x-loading></x-loading>
</div>
