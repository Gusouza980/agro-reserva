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
            class="w-full px-6 py-4 overflow-hidden max-h-[100vh] overflow-y-scroll bg-white rounded-t-lg dark:bg-navy-700 sm:rounded-lg sm:m-4 sm:max-w-xl"
            role="dialog">
            <!-- Modal body -->
            <div class="mt-4 mb-6">
                <!-- Modal title -->
                <p class="mb-2 text-lg font-semibold text-gray-900 dark:text-gray-700">
                    Cadastro de Usuário
                </p>

                @include('sistema.includes.divider')
                
                <div class="w-full">
                    @if($show)
                        <form wire:submit.prevent='salvar'>
                            <div class="w-full mb-3">
                                <label class="block">
                                    <span>Descrição</span>
                                    <span class="relative mt-1.5 flex">
                                        <input wire:model.defer="banner.descricao" class="w-full px-3 py-2 bg-transparent border rounded-lg form-input peer border-slate-300 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" type="text" required>
                                    </span>
                                </label>
                                @error("banner.descricao") <small class="text-red-600"> {{ $message }} </small> @enderror
                            </div>
                            <div class="w-full mb-3">
                                <label class="block">
                                    <span>Link</span>
                                    <span class="relative mt-1.5 flex">
                                        <input wire:model.defer="banner.link" class="w-full px-3 py-2 bg-transparent border rounded-lg form-input peer border-slate-300 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" type="text">
                                    </span>
                                </label>
                                @error("banner.link") <small class="text-red-600"> {{ $message }} </small> @enderror
                            </div>
                            @include("sistema.includes.divider")
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
