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
            class="relative w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-navy-700 sm:rounded-lg sm:m-4 sm:max-w-xl"
            role="dialog">
            <button @click="show = false" class="absolute bg-transparent border-none right-5 top-5"><i class="text-gray-900 fas fa-times-circle fa-lg"></i></button>
            <!-- Modal body -->
            <div class="mt-4">
                <!-- Modal title -->
                <p class="mb-2 text-lg font-semibold text-gray-900 dark:text-gray-700">
                    Excluir cliente
                </p>

                @include('sistema.includes.divider')
                
                @if($usuario)
                    <div class="w-full">
                            Tem certeza de que deseja excluir o usuário <b>{{ $usuario->nome }}</b> ? O mesmo não poderá mais logar na plataforma e nem utilizar seus recursos
                            de usuário.
                    </div>
                    <div class="w-full mt-4">
                        <button wire:click="remover()"
                            class="w-full font-medium text-white bg-red-600 btn bg-error hover:bg-red-800"
                        >
                            Excluir
                        </button>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <x-loading></x-loading>
</div>
