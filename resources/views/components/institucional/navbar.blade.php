<nav class="bg-[#FCFCFC] border-gray-200 px-2 sm:px-4 py-3 sticky top-0 z-30">
    <div class="flex flex-wrap items-center justify-between mx-auto w1200 align-items-center">
        <a href="{{ route('index') }}" class="flex items-center">
            <img src="{{ asset('imagens/logo_agroreserva_leite_escura.svg') }}" class="h-10 mr-3 sm:h-14"
                alt="Flowbite Logo" />
        </a>
        @if (session()->get('cliente'))
            <div class="flex items-end md:order-2" style="font-family: 'Montserrat', sans-serif;">

                {{-- BOTÃO PRECISA DE AJUDA --}}
                {{-- <div class="d-none d-md-block mr-5 text-center transition duration-500 cpointer hover:scale-105" style="font-size: 10px;">
                    <svg class="mx-auto" id="Grupo_3728" data-name="Grupo 3728" xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36">
                        <g id="Elipse_309" data-name="Elipse 309" fill="#fcfcfc" stroke="#80828b" stroke-width="1.5">
                            <circle cx="18" cy="18" r="18" stroke="none"/>
                            <circle cx="18" cy="18" r="17.25" fill="none"/>
                        </g>
                        <text id="_" data-name="?" transform="translate(10 28)" font-size="28" font-family="Montserrat-Bold, Montserrat" font-weight="700"><tspan x="0" y="0">?</tspan></text>
                    </svg>
                    Precisa de Ajuda
                </div> --}}
                <div class="d-none d-md-block mr-5 mt-2 text-center transition duration-500 cpointer hover:scale-105"
                    style="font-size: 10px;">
                    <svg class="mx-auto fill-[#80828b] hover:fill-[#5b5d63] transition duration-150"
                        xmlns="http://www.w3.org/2000/svg" width="37.018" height="37" viewBox="0 0 24 24">
                        <path
                            d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.201.662.591 1.221.774 1.394.86s.274.072.376-.043c.101-.116.433-.506.549-.68.116-.173.231-.145.39-.087s1.011.477 1.184.564.289.13.332.202c.045.072.045.419-.1.824zm-3.423-14.416c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm.029 18.88c-1.161 0-2.305-.292-3.318-.844l-3.677.964.984-3.595c-.607-1.052-.927-2.246-.926-3.468.001-3.825 3.113-6.937 6.937-6.937 1.856.001 3.598.723 4.907 2.034 1.31 1.311 2.031 3.054 2.03 4.908-.001 3.825-3.113 6.938-6.937 6.938z" />
                    </svg>
                    Precisa de Ajuda
                </div>

                {{-- BOTÃO MINHA CONTA --}}
                <div class="d-none d-md-block mr-5 text-center transition duration-500 cpointer hover:scale-105"
                    style="font-size: 10px;" aria-expanded="false" type="button" data-dropdown-toggle="dropdown">
                    <svg class="mx-auto fill-[#80828b] hover:fill-[#5b5d63] transition duration-150" id="Grupo_3722"
                        data-name="Grupo 3722" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" width="37.018" height="37"
                        viewBox="0 0 37.018 37">
                        <defs>
                            <clipPath id="clip-path">
                                <rect id="Retângulo_2481" data-name="Retângulo 2481" width="37.018" height="37" />
                            </clipPath>
                        </defs>
                        <g id="Grupo_3721" data-name="Grupo 3721" clip-path="url(#clip-path)">
                            <path id="Caminho_2314" data-name="Caminho 2314"
                                d="M12.595,147.743c.054.051.109.1.164.151a9.254,9.254,0,0,0,3.335,2l.051.015c.186.06.376.113.567.159.074.018.148.037.223.053.124.027.25.047.377.067.095.016.188.038.283.051L15.92,154l-4.137-5.689.276-1.107c.032.034.065.064.1.1C12.3,147.456,12.445,147.6,12.595,147.743ZM9.881,137.351c.3.046.626.08.938.121l.344.044c.449.056.9.107,1.363.151q.534.053,1.076.1c.264.02.526.041.793.058q.847.056,1.7.089l.346.012c.69.023,1.382.036,2.071.036s1.38-.013,2.071-.036l.347-.012q.855-.033,1.7-.089c.267-.017.53-.038.793-.058q.543-.043,1.076-.1c.463-.044.915-.1,1.364-.151l.345-.044c.312-.041.634-.075.939-.121v1.213a11.29,11.29,0,0,1-3.529,8.246,7.747,7.747,0,0,1-5.108,2.242,7.579,7.579,0,0,1-4.773-1.945,10.987,10.987,0,0,1-3.046-4.28,11.467,11.467,0,0,1-.818-4.264Zm-8.4-4.33H35.558c-.862,1.168-4.059,2.468-9.037,3.174-.145.02-.294.038-.442.057-.242.032-.488.064-.739.092s-.479.054-.721.078c-.169.017-.342.033-.515.049-.273.025-.547.051-.824.072l-.277.018q-.77.057-1.557.091c-.285.013-.57.025-.861.034-.187.006-.375.012-.563.016-.493.011-.992.02-1.5.02s-1.011-.009-1.5-.02c-.188,0-.376-.01-.563-.016-.291-.009-.577-.021-.861-.034q-.787-.036-1.557-.091l-.276-.018c-.278-.022-.551-.047-.825-.072-.172-.015-.345-.031-.514-.049q-.364-.037-.721-.078c-.251-.028-.5-.06-.739-.092-.147-.019-.3-.037-.442-.057-4.978-.707-8.175-2.006-9.037-3.174Zm23.5,14.187.277,1.107L21.116,154l-1.674-3.766c.095-.012.189-.035.284-.051.126-.02.253-.04.376-.067.075-.016.149-.035.223-.053q.287-.069.567-.159l.051-.015a9.253,9.253,0,0,0,3.335-2c.055-.05.11-.1.164-.151.149-.142.3-.287.438-.437C24.911,147.271,24.945,147.242,24.977,147.208Zm.969-1.21a13.185,13.185,0,0,0,2.444-7.434v-1.426c4.947-.89,8.638-2.491,8.638-4.733a.617.617,0,0,0-.617-.617H27.643l-.292-1.234H9.686l-.293,1.234H.627a.616.616,0,0,0-.617.617c0,2.243,3.689,3.843,8.638,4.733v1.426A13.185,13.185,0,0,0,11.09,146l-.445,1.781c-.245.116-.5.236-.764.363v10.781H27.156V148.142c-.266-.128-.519-.247-.765-.363Z"
                                transform="translate(-0.009 -121.923)" fill-rule="evenodd" />
                            <path id="Caminho_2315" data-name="Caminho 2315" d="M167.6,93.218H151.11l-.292,1.234H167.9Z"
                                transform="translate(-140.849 -87.056)" fill-rule="evenodd" />
                            <path id="Caminho_2316" data-name="Caminho 2316"
                                d="M174.814,1.78A2.35,2.35,0,0,0,171.861.1a14.871,14.871,0,0,1-8.509,0A2.35,2.35,0,0,0,160.4,1.788l-.745,3.14H175.56Z"
                                transform="translate(-149.098 0)" fill-rule="evenodd" />
                            <path id="Caminho_2317" data-name="Caminho 2317"
                                d="M429.33,415.969h1.851v-9.225c-.647-.344-1.262-.658-1.851-.952Z"
                                transform="translate(-400.95 -378.969)" fill-rule="evenodd" />
                            <path id="Caminho_2318" data-name="Caminho 2318"
                                d="M0,435.833V438.3a.617.617,0,0,0,.617.617H5.553v-8.552c-1.219.681-2.5,1.445-3.773,2.29A3.946,3.946,0,0,0,0,435.833"
                                transform="translate(0 -401.918)" fill-rule="evenodd" />
                            <path id="Caminho_2319" data-name="Caminho 2319"
                                d="M102.67,415.964h1.851V405.788c-.589.293-1.2.607-1.851.952Z"
                                transform="translate(-95.883 -378.965)" fill-rule="evenodd" />
                            <path id="Caminho_2320" data-name="Caminho 2320"
                                d="M479.769,432.66c-1.276-.845-2.553-1.609-3.773-2.29v8.552h4.936a.617.617,0,0,0,.617-.617v-2.468a3.947,3.947,0,0,0-1.78-3.177"
                                transform="translate(-444.532 -401.922)" fill-rule="evenodd" />
                        </g>
                    </svg>
                    Minha Conta
                </div>

                <!-- Dropdown menu -->
                <div class="z-60 hidden my-4 text-base list-none divide-y rounded shadow bg-[#F2F2F2] divide-gray-600"
                    id="dropdown">
                    <div class="px-4 py-3">
                        <span
                            class="block text-sm text-gray-900 font-semibold">{{ session()->get('cliente')['nome_dono'] }}</span>
                        <span
                            class="block text-sm font-medium text-gray-500 truncate ">{{ session()->get('cliente')['email'] }}</span>
                    </div>
                    <ul class="py-1" aria-labelledby="dropdown">
                        @if (session()->get('cliente') && !session()->get('cliente')['finalizado'])
                            <li>
                                <a href="{{ route('cadastro') }}"
                                    class="block px-4 py-2 text-sm text-gray-500 hover:text-gray-900">Finalizar
                                    Cadastro</a>
                            </li>
                        @endif
                        <li>
                            <a href="{{ route('conta.index') }}"
                                class="block px-4 py-2 text-sm text-gray-500 hover:text-gray-900">Perfil</a>
                        </li>
                        <li>
                            <a href="{{ route('sair') }}"
                                class="block px-4 py-2 text-sm text-red-500 hover:text-red-800">Sair</a>
                        </li>
                    </ul>
                </div>


                {{-- BOTÃO MEU CARRINHO --}}
                <div class="ml-md-0 text-center transition duration-500 cpointer hover:scale-105"
                    style="font-size: 10px;" @click="mostrarCarrinho = true">
                    @livewire('institucional.icone-carrinho')
                </div>

                <button data-collapse-toggle="mobile-menu-2" type="button"
                    class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="mobile-menu-2" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-6 h-6 fill-[#80828b] hover:fill-[#5b5d63] transition duration-150"
                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <svg class="hidden w-6 h-6 fill-[#80828b] hover:fill-[#5b5d63] transition duration-150"
                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        @else
            <div class="flex items-center md:order-2">
                <div class="d-none d-md-block mr-5 text-center transition duration-500 cpointer hover:scale-105"
                    style="font-size: 10px;">
                    <svg class="mx-auto fill-[#80828b] hover:fill-[#5b5d63] transition duration-150" id="Grupo_3728"
                        data-name="Grupo 3728" xmlns="http://www.w3.org/2000/svg" width="36" height="36"
                        viewBox="0 0 36 36">
                        <g id="Elipse_309" data-name="Elipse 309" fill="#fcfcfc" stroke="#80828b"
                            stroke-width="1.5">
                            <circle cx="18" cy="18" r="18" stroke="none" />
                            <circle cx="18" cy="18" r="17.25" fill="none" />
                        </g>
                        <text id="_" data-name="?" transform="translate(10 28)" font-size="28"
                            font-family="Montserrat-Bold, Montserrat" font-weight="700">
                            <tspan x="0" y="0">?</tspan>
                        </text>
                    </svg>
                    Precisa de Ajuda
                </div>

                <div class="d-none d-md-block mr-5 text-center transition duration-500 cpointer hover:scale-105"
                    style="font-size: 10px;" aria-expanded="false" type="button" data-dropdown-toggle="dropdown">
                    <svg class="mx-auto fill-[#80828b] hover:fill-[#5b5d63] transition duration-150" id="Grupo_3722"
                        data-name="Grupo 3722" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" width="37.018" height="37"
                        viewBox="0 0 37.018 37">
                        <defs>
                            <clipPath id="clip-path">
                                <rect id="Retângulo_2481" data-name="Retângulo 2481" width="37.018"
                                    height="37" />
                            </clipPath>
                        </defs>
                        <g id="Grupo_3721" data-name="Grupo 3721" clip-path="url(#clip-path)">
                            <path id="Caminho_2314" data-name="Caminho 2314"
                                d="M12.595,147.743c.054.051.109.1.164.151a9.254,9.254,0,0,0,3.335,2l.051.015c.186.06.376.113.567.159.074.018.148.037.223.053.124.027.25.047.377.067.095.016.188.038.283.051L15.92,154l-4.137-5.689.276-1.107c.032.034.065.064.1.1C12.3,147.456,12.445,147.6,12.595,147.743ZM9.881,137.351c.3.046.626.08.938.121l.344.044c.449.056.9.107,1.363.151q.534.053,1.076.1c.264.02.526.041.793.058q.847.056,1.7.089l.346.012c.69.023,1.382.036,2.071.036s1.38-.013,2.071-.036l.347-.012q.855-.033,1.7-.089c.267-.017.53-.038.793-.058q.543-.043,1.076-.1c.463-.044.915-.1,1.364-.151l.345-.044c.312-.041.634-.075.939-.121v1.213a11.29,11.29,0,0,1-3.529,8.246,7.747,7.747,0,0,1-5.108,2.242,7.579,7.579,0,0,1-4.773-1.945,10.987,10.987,0,0,1-3.046-4.28,11.467,11.467,0,0,1-.818-4.264Zm-8.4-4.33H35.558c-.862,1.168-4.059,2.468-9.037,3.174-.145.02-.294.038-.442.057-.242.032-.488.064-.739.092s-.479.054-.721.078c-.169.017-.342.033-.515.049-.273.025-.547.051-.824.072l-.277.018q-.77.057-1.557.091c-.285.013-.57.025-.861.034-.187.006-.375.012-.563.016-.493.011-.992.02-1.5.02s-1.011-.009-1.5-.02c-.188,0-.376-.01-.563-.016-.291-.009-.577-.021-.861-.034q-.787-.036-1.557-.091l-.276-.018c-.278-.022-.551-.047-.825-.072-.172-.015-.345-.031-.514-.049q-.364-.037-.721-.078c-.251-.028-.5-.06-.739-.092-.147-.019-.3-.037-.442-.057-4.978-.707-8.175-2.006-9.037-3.174Zm23.5,14.187.277,1.107L21.116,154l-1.674-3.766c.095-.012.189-.035.284-.051.126-.02.253-.04.376-.067.075-.016.149-.035.223-.053q.287-.069.567-.159l.051-.015a9.253,9.253,0,0,0,3.335-2c.055-.05.11-.1.164-.151.149-.142.3-.287.438-.437C24.911,147.271,24.945,147.242,24.977,147.208Zm.969-1.21a13.185,13.185,0,0,0,2.444-7.434v-1.426c4.947-.89,8.638-2.491,8.638-4.733a.617.617,0,0,0-.617-.617H27.643l-.292-1.234H9.686l-.293,1.234H.627a.616.616,0,0,0-.617.617c0,2.243,3.689,3.843,8.638,4.733v1.426A13.185,13.185,0,0,0,11.09,146l-.445,1.781c-.245.116-.5.236-.764.363v10.781H27.156V148.142c-.266-.128-.519-.247-.765-.363Z"
                                transform="translate(-0.009 -121.923)" fill-rule="evenodd" />
                            <path id="Caminho_2315" data-name="Caminho 2315"
                                d="M167.6,93.218H151.11l-.292,1.234H167.9Z" transform="translate(-140.849 -87.056)"
                                fill-rule="evenodd" />
                            <path id="Caminho_2316" data-name="Caminho 2316"
                                d="M174.814,1.78A2.35,2.35,0,0,0,171.861.1a14.871,14.871,0,0,1-8.509,0A2.35,2.35,0,0,0,160.4,1.788l-.745,3.14H175.56Z"
                                transform="translate(-149.098 0)" fill-rule="evenodd" />
                            <path id="Caminho_2317" data-name="Caminho 2317"
                                d="M429.33,415.969h1.851v-9.225c-.647-.344-1.262-.658-1.851-.952Z"
                                transform="translate(-400.95 -378.969)" fill-rule="evenodd" />
                            <path id="Caminho_2318" data-name="Caminho 2318"
                                d="M0,435.833V438.3a.617.617,0,0,0,.617.617H5.553v-8.552c-1.219.681-2.5,1.445-3.773,2.29A3.946,3.946,0,0,0,0,435.833"
                                transform="translate(0 -401.918)" fill-rule="evenodd" />
                            <path id="Caminho_2319" data-name="Caminho 2319"
                                d="M102.67,415.964h1.851V405.788c-.589.293-1.2.607-1.851.952Z"
                                transform="translate(-95.883 -378.965)" fill-rule="evenodd" />
                            <path id="Caminho_2320" data-name="Caminho 2320"
                                d="M479.769,432.66c-1.276-.845-2.553-1.609-3.773-2.29v8.552h4.936a.617.617,0,0,0,.617-.617v-2.468a3.947,3.947,0,0,0-1.78-3.177"
                                transform="translate(-444.532 -401.922)" fill-rule="evenodd" />
                        </g>
                    </svg>
                    Minha Conta
                </div>

                <!-- Dropdown menu -->
                <div class="z-50 hidden my-4 text-base list-none divide-y divide-gray-100 rounded shadow bg-preto dark:divide-gray-600"
                    id="dropdown">
                    <ul class="py-1" aria-labelledby="dropdown">
                        <li>
                            <a href="{{ route('login') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Entrar</a>
                        </li>
                        <li>
                            <a href="{{ route('cadastro') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Cadastrar</a>
                        </li>
                    </ul>
                </div>

                <button data-collapse-toggle="mobile-menu-2" type="button"
                    class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="mobile-menu-2" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-6 h-6 fill-[#80828b] hover:fill-[#5b5d63] transition duration-150"
                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <svg class="hidden w-6 h-6 fill-[#80828b] hover:fill-[#5b5d63] transition duration-150"
                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        @endif
        <div class="items-center justify-center flex-auto hidden w-full ml-4 md:justify-start md:flex md:w-auto md:order-1"
            id="mobile-menu-2">
            <div class="flex w-full mt-4 mr-3 text-gray-400 align-items-center mt-md-0">
                <div class="w-3/5 mx-auto relative">
                    <form class="w-full" action="{{ route('pesquisa') }}" method="GET">
                        <input
                            class="w-full pl-10 text-sm bg-white border border-gray-400 border-solid placeholder:text-gray-400 h-9 rounded-3xl focus:outline-none focus:ring-gray-400 focus:border-gray-400"
                            type="text" name="pesquisa" placeholder="Pesquisar..."></input>
                        <i class="fas fa-search text-grey-400 absolute left-[10px] top-[10px]"></i>
                    </form>
                </div>
            </div>
            <ul class="flex flex-col md:hidden md:flex-row md:space-x-3 md:mt-0 md:text-sm md:font-medium">
                <li class="text-center">
                    <a href="#"
                        class="block py-2 pl-3 pr-4 text-gray-400 transition duration-300 ease-in-out rounded md:p-0"
                        aria-current="page">Reservas Abertas</a>
                </li>
                {{-- <li class="text-center">
                    <a href="#"
                        class="block py-2 pl-3 pr-4 text-gray-400 transition duration-300 ease-in-out md:p-0">Embriões e Sêmen</a>
                </li> --}}
                <li class="text-center">
                    <a href="#"
                        class="block py-2 pl-3 pr-4 text-gray-400 transition duration-300 ease-in-out md:p-0">Navegue
                        por Raças</a>
                </li>
                <li class="text-center">
                    <a href="#"
                        class="pointer block py-2 pl-3 pr-4 text-gray-400 transition duration-300 ease-in-out md:p-0">Blog</a>
                </li>

                <li class="text-center">
                    <a href="#"
                        class="pointer block py-2 pl-3 pr-4 text-gray-400 transition duration-300 ease-in-out md:p-0">Quem Somos</a>
                </li>
                
            </ul>
        </div>
    </div>
</nav>

<div class="hidden md:block w-full bg-[#80828B] py-2 border-b-2 border-[#F5B01F] justify-content-center align-items-center text-white"
    style="font-size: 13px; font-weight: 500; font-family: 'Montserrat', sans-serif, sans-serif;">
    <ul
        class="w1200 mx-auto flex flex-row mt-0 justify-center">
        <li>
            <a href="#"
                class="block py-2 pr-4 pl-3 hover:!text-[#F5B01F]">Reservas Abertas</a>
        </li>
        <li>
            <a href="#"
                class="block py-2 pr-4 pl-3 hover:!text-[#F5B01F]">Navegue por Raças</a>
        </li>
        <li class="">
            <button id="dropdownOutrosLink" data-dropdown-toggle="dropdownOutros"
                class="py-2 pr-4 pl-3 flex justify-between items-center font-montserrat text-[13px] font-medium focus:outline-none">Outros
                <svg class="ml-1 w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
            <!-- Dropdown menu -->
            <div id="dropdownOutros"
                class="hidden z-10 w-44 font-normal bg-dark rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                <ul class="py-1 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                    <li>
                        <a href="#"
                            class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Blog</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Quem Somos</a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
    {{-- <a class="mx-5 hover:!text-[#F5B01F]" href="">Reservas Abertas</a>
    <a class="mx-5 hover:!text-[#F5B01F]" href="">Embriões e Sêmen</a>
    <a class="mx-5 hover:!text-[#F5B01F]" href="">Navegue por Raças</a>
    <a class="mx-5 hover:!text-[#F5B01F]">Outros</a> --}}
</div>
