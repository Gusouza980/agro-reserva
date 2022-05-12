<nav class="bg-preto border-gray-200 px-2 sm:px-4 py-4">
    <div class="container flex flex-wrap justify-between items-center align-items-center mx-auto">
        <a href="https://flowbite.com" class="flex items-center">
            <img src="{{ asset('imagens/logo_agroreserva_leite.svg') }}" class="mr-3 h-6 sm:h-9" alt="Flowbite Logo" />
            {{-- <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Flowbite</span> --}}
        </a>
        @if(session()->get("cliente"))
            <div class="flex items-center md:order-2">
                <button type="button"
                    class="flex align-items-center mr-3 text-sm  rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                    id="user-menu-button" aria-expanded="false" type="button" data-dropdown-toggle="dropdown">
                    <img class="w-8 h-8 rounded-full" src="{{ asset('imagens/gif_relogio.gif') }}" alt="user photo">
                    <span class="text-white ml-2">{{ explode(" ", session()->get("cliente")["nome_dono"])[0] }} <i class="fas fa-chevron-down fa-sm text-white ml-2"></i> </span>
                </button>

                <!-- Dropdown menu -->
                <div class="hidden z-50 my-4 text-base list-none bg-preto rounded divide-y divide-gray-100 shadow dark:divide-gray-600"
                    id="dropdown">
                    <div class="py-3 px-4">
                        <span class="block text-sm text-gray-900 dark:text-white">{{ session()->get("cliente")["nome_dono"] }}</span>
                        <span
                            class="block text-sm font-medium text-gray-500 truncate dark:text-gray-400">{{ session()->get("cliente")["email"] }}</span>
                    </div>
                    <ul class="py-1" aria-labelledby="dropdown">
                        <li>
                            <a href="#"
                                class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Perfil</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-red-500 dark:hover:text-white">Sair</a>
                        </li>
                    </ul>
                </div>
                <button data-collapse-toggle="mobile-menu-2" type="button"
                    class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="mobile-menu-2" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        @else
            <div class="flex items-center md:order-2">
                <a class="flex align-items-center mr-3 text-sm rounded-full md:mr-0 cpointer"
                    id="user-menu-button" aria-expanded="false" data-dropdown-toggle="dropdown">
                    <span class="text-white ml-2">Entrar/Cadastrar <i class="fas fa-chevron-down fa-sm text-white ml-2"></i> </span>
                </a>
                <!-- Dropdown menu -->
                <div class="hidden z-50 my-4 text-base list-none bg-preto rounded divide-y divide-gray-100 shadow dark:divide-gray-600"
                    id="dropdown">
                    <ul class="py-1" aria-labelledby="dropdown">
                        <li>
                            <a href="#"
                                class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Entrar</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Cadastrar</a>
                        </li>
                    </ul>
                </div>
            </div>
        @endif
        <div class="hidden justify-between items-center w-full md:flex md:w-auto md:order-1" id="mobile-menu-2">
            <ul class="flex flex-col md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium">
                <li>
                    <a href="#"
                        class="transition duration-300 ease-in-out block py-2 pr-4 pl-3 rounded md:p-0 dark:text-white dark:md:hover:text-orange-400"
                        aria-current="page">Início</a>
                </li>
                <li>
                    <a href="#"
                        class="transition duration-300 ease-in-out block py-2 pr-4 pl-3 md:p-0 dark:text-white dark:md:hover:text-orange-400">Blog</a>
                </li>
                <li>
                    <a href="#"
                        class="transition duration-300 ease-in-out block py-2 pr-4 pl-3 md:p-0 dark:text-white dark:md:hover:text-orange-400">Quem Somos</a>
                </li>
                <li>
                    <a href="#"
                        class="transition duration-300 ease-in-out block py-2 pr-4 pl-3 md:p-0 dark:text-white dark:md:hover:text-orange-400">Reserva Finalizada</a>
                </li>
                @if(session()->get("cliente") && !session()->get("cliente")["finalizado"])
                    <li>
                        <a href="#"
                            class="transition duration-300 ease-in-out block py-2 pr-4 pl-3 md:p-0 dark:text-white dark:md:hover:text-orange-400">Finalizar Cadastro</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
