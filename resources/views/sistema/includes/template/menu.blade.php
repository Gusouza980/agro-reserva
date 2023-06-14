<!-- Main Sections Links -->
<div class="flex flex-col pt-6 space-y-4 overflow-y-auto is-scrollbar-hidden grow">
    @if(\Acessos::getPermissao('usuarios'))
        <!-- Usuários -->
        <a
        href="{{ route('sistema.usuarios.consultar') }}"
        class="flex items-center justify-center transition-colors duration-200 rounded-lg outline-none hover:scale-105 h-11 w-11 hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25"
        x-tooltip.placement.right="'Usuários'"
        >
            <img class="h-7 w-7" src="{{ asset('system/images/icones/menu/usuarios.svg') }}" />
        </a>
    @endif

    @if(\Acessos::getPermissao('banners'))
        <!-- Usuários -->
        <a
        href="{{ route('sistema.reservas.consultar') }}"
        class="flex items-center justify-center transition-colors duration-200 rounded-lg outline-none hover:scale-105 h-11 w-11 hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25"
        x-tooltip.placement.right="'Reservas'"
        >
            <img class="h-7 w-7" src="{{ asset('system/images/icones/menu/reservas.svg') }}" />
        </a>
    @endif

    @if(\Acessos::getPermissao('banners'))
        <!-- Usuários -->
        <a
        href="{{ route('sistema.banners.consultar') }}"
        class="flex items-center justify-center transition-colors duration-200 rounded-lg outline-none hover:scale-105 h-11 w-11 hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25"
        x-tooltip.placement.right="'Banners'"
        >
            <img class="h-7 w-7" src="{{ asset('system/images/icones/menu/banners.svg') }}" />
        </a>
    @endif

    @if(\Acessos::getPermissao('banners'))
        <!-- Usuários -->
        <a
        href="{{ route('sistema.vendas.consultar') }}"
        class="flex items-center justify-center transition-colors duration-200 rounded-lg outline-none hover:scale-105 h-11 w-11 hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25"
        x-tooltip.placement.right="'Vendas'"
        >
            <img class="h-7 w-7" src="{{ asset('system/images/icones/menu/vendas.svg') }}" />
        </a>
    @endif
</div>

<!-- Bottom Links -->
<div class="flex flex-col items-center py-3 space-y-3">
    <!-- Profile -->
    <div x-data="usePopper({ placement: 'right-end', offset: 12 })" @click.outside="if(isShowPopper) isShowPopper = false"
        class="flex">
        <button @click="isShowPopper = !isShowPopper" x-ref="popperRef" class="w-12 h-12 avatar">
            <img class="rounded-full" src="{{ asset(($usuario->avatar) ? $usuario->avatar : 'imagens/sem-foto.jpg') }}" alt="avatar" />
            <span
                class="absolute right-0 h-3.5 w-3.5 rounded-full border-2 border-white bg-success dark:border-navy-700"></span>
        </button>

        <div :class="isShowPopper && 'show'" class="fixed popper-root" x-ref="popperRoot">
            <div
                class="w-64 bg-white border rounded-lg popper-box border-slate-150 shadow-soft dark:border-navy-600 dark:bg-navy-700">
                <div
                    class="flex items-center px-4 py-5 space-x-4 rounded-t-lg bg-slate-100 dark:bg-navy-800">
                    <div class="avatar h-14 w-14">
                        <img class="rounded-full" src="{{ asset(($usuario->avatar) ? $usuario->avatar : 'imagens/sem-foto.jpg') }}"
                            alt="avatar" />
                    </div>
                    <div>
                        <a href="#"
                            class="text-base font-medium text-slate-700 hover:text-primary focus:text-primary dark:text-navy-100 dark:hover:text-accent-light dark:focus:text-accent-light">
                            {{ $usuario->nome }}
                        </a>
                        <p class="text-xs text-slate-400 dark:text-navy-300">
                            {{ \Acessos::$niveis[$usuario->acesso] }}
                        </p>
                    </div>
                </div>
                <div class="flex flex-col pt-2 pb-5">
                    <a onclick="Livewire.emit('carregaModalAlteraSenha')"
                        class="flex items-center px-4 py-2 space-x-3 tracking-wide transition-all outline-none cursor-pointer group hover:bg-slate-100 focus:bg-slate-100 dark:hover:bg-navy-600 dark:focus:bg-navy-600">
                        <div
                            class="flex items-center justify-center w-8 h-8 text-white rounded-lg bg-warning">
                            <i class="fas fa-key "></i>
                        </div>

                        <div>
                            <h2
                                class="font-medium transition-colors text-slate-700 group-hover:text-primary group-focus:text-primary dark:text-navy-100 dark:group-hover:text-accent-light dark:group-focus:text-accent-light">
                                Senha
                            </h2>
                            <div class="text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                                Clique aqui para alterar sua senha
                            </div>
                        </div>
                    </a>
                    <div class="px-4 mt-3">
                        <a href="{{ route('sistema.sair') }}"
                            class="w-full space-x-2 text-white btn h-9 bg-primary hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"
                                fill="none" viewbox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="1.5"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            <span>Sair</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>