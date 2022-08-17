<div class="w-full bg-[#F7F7F7] border-gray-200 flex items-center justify-between fixed bottom-0 left-0 z-30 py-2">
    @if(session()->get("cliente"))
        <div class="flex items-end justify-center w-full" style="font-family: 'Montserrat', sans-serif;">

            {{-- BOTÃO PRECISA DE AJUDA --}}
            {{-- <div class="mx-3 mt-2 text-center transition duration-500 cpointer hover:scale-105" style="font-size: 10px;">
                <svg class="mx-auto" id="Grupo_3728" data-name="Grupo 3728" xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36">
                    <g id="Elipse_309" data-name="Elipse 309" fill="#fcfcfc" stroke="#80828b" stroke-width="1.5">
                        <circle cx="18" cy="18" r="18" stroke="none"/>
                        <circle cx="18" cy="18" r="17.25" fill="none"/>
                    </g>
                    <text id="_" data-name="?" transform="translate(10 28)" fill="#80828b" font-size="28" font-family="Montserrat-Bold, Montserrat" font-weight="700"><tspan x="0" y="0">?</tspan></text>
                </svg>
                Precisa de Ajuda
            </div> --}}
            <div class="mx-3 mt-2 text-center transition duration-500 cpointer hover:scale-105" onclick="window.open('https://api.whatsapp.com/send?phone=5514981809051', '_blank')" style="font-size: 10px;">
                <svg class="mx-auto" xmlns="http://www.w3.org/2000/svg" width="37.018" height="37" fill="#80828b" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.201.662.591 1.221.774 1.394.86s.274.072.376-.043c.101-.116.433-.506.549-.68.116-.173.231-.145.39-.087s1.011.477 1.184.564.289.13.332.202c.045.072.045.419-.1.824zm-3.423-14.416c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm.029 18.88c-1.161 0-2.305-.292-3.318-.844l-3.677.964.984-3.595c-.607-1.052-.927-2.246-.926-3.468.001-3.825 3.113-6.937 6.937-6.937 1.856.001 3.598.723 4.907 2.034 1.31 1.311 2.031 3.054 2.03 4.908-.001 3.825-3.113 6.938-6.937 6.938z"/></svg>
                Precisa de Ajuda
            </div>

            {{-- BOTÃO MINHA CONTA --}}
            <div class="mx-3 mt-2 text-center transition duration-500 cpointer hover:scale-105" style="font-size: 10px;" aria-expanded="false" type="button" data-dropdown-toggle="dropdown">
                <svg class="mx-auto" id="Grupo_3722" data-name="Grupo 3722" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="37.018" height="37" viewBox="0 0 37.018 37">
                    <defs>
                        <clipPath id="clip-path">
                        <rect id="Retângulo_2481" data-name="Retângulo 2481" width="37.018" height="37" fill="#80828b"/>
                        </clipPath>
                    </defs>
                    <g id="Grupo_3721" data-name="Grupo 3721" clip-path="url(#clip-path)">
                        <path id="Caminho_2314" data-name="Caminho 2314" d="M12.595,147.743c.054.051.109.1.164.151a9.254,9.254,0,0,0,3.335,2l.051.015c.186.06.376.113.567.159.074.018.148.037.223.053.124.027.25.047.377.067.095.016.188.038.283.051L15.92,154l-4.137-5.689.276-1.107c.032.034.065.064.1.1C12.3,147.456,12.445,147.6,12.595,147.743ZM9.881,137.351c.3.046.626.08.938.121l.344.044c.449.056.9.107,1.363.151q.534.053,1.076.1c.264.02.526.041.793.058q.847.056,1.7.089l.346.012c.69.023,1.382.036,2.071.036s1.38-.013,2.071-.036l.347-.012q.855-.033,1.7-.089c.267-.017.53-.038.793-.058q.543-.043,1.076-.1c.463-.044.915-.1,1.364-.151l.345-.044c.312-.041.634-.075.939-.121v1.213a11.29,11.29,0,0,1-3.529,8.246,7.747,7.747,0,0,1-5.108,2.242,7.579,7.579,0,0,1-4.773-1.945,10.987,10.987,0,0,1-3.046-4.28,11.467,11.467,0,0,1-.818-4.264Zm-8.4-4.33H35.558c-.862,1.168-4.059,2.468-9.037,3.174-.145.02-.294.038-.442.057-.242.032-.488.064-.739.092s-.479.054-.721.078c-.169.017-.342.033-.515.049-.273.025-.547.051-.824.072l-.277.018q-.77.057-1.557.091c-.285.013-.57.025-.861.034-.187.006-.375.012-.563.016-.493.011-.992.02-1.5.02s-1.011-.009-1.5-.02c-.188,0-.376-.01-.563-.016-.291-.009-.577-.021-.861-.034q-.787-.036-1.557-.091l-.276-.018c-.278-.022-.551-.047-.825-.072-.172-.015-.345-.031-.514-.049q-.364-.037-.721-.078c-.251-.028-.5-.06-.739-.092-.147-.019-.3-.037-.442-.057-4.978-.707-8.175-2.006-9.037-3.174Zm23.5,14.187.277,1.107L21.116,154l-1.674-3.766c.095-.012.189-.035.284-.051.126-.02.253-.04.376-.067.075-.016.149-.035.223-.053q.287-.069.567-.159l.051-.015a9.253,9.253,0,0,0,3.335-2c.055-.05.11-.1.164-.151.149-.142.3-.287.438-.437C24.911,147.271,24.945,147.242,24.977,147.208Zm.969-1.21a13.185,13.185,0,0,0,2.444-7.434v-1.426c4.947-.89,8.638-2.491,8.638-4.733a.617.617,0,0,0-.617-.617H27.643l-.292-1.234H9.686l-.293,1.234H.627a.616.616,0,0,0-.617.617c0,2.243,3.689,3.843,8.638,4.733v1.426A13.185,13.185,0,0,0,11.09,146l-.445,1.781c-.245.116-.5.236-.764.363v10.781H27.156V148.142c-.266-.128-.519-.247-.765-.363Z" transform="translate(-0.009 -121.923)" fill="#80828b" fill-rule="evenodd"/>
                        <path id="Caminho_2315" data-name="Caminho 2315" d="M167.6,93.218H151.11l-.292,1.234H167.9Z" transform="translate(-140.849 -87.056)" fill="#80828b" fill-rule="evenodd"/>
                        <path id="Caminho_2316" data-name="Caminho 2316" d="M174.814,1.78A2.35,2.35,0,0,0,171.861.1a14.871,14.871,0,0,1-8.509,0A2.35,2.35,0,0,0,160.4,1.788l-.745,3.14H175.56Z" transform="translate(-149.098 0)" fill="#80828b" fill-rule="evenodd"/>
                        <path id="Caminho_2317" data-name="Caminho 2317" d="M429.33,415.969h1.851v-9.225c-.647-.344-1.262-.658-1.851-.952Z" transform="translate(-400.95 -378.969)" fill="#80828b" fill-rule="evenodd"/>
                        <path id="Caminho_2318" data-name="Caminho 2318" d="M0,435.833V438.3a.617.617,0,0,0,.617.617H5.553v-8.552c-1.219.681-2.5,1.445-3.773,2.29A3.946,3.946,0,0,0,0,435.833" transform="translate(0 -401.918)" fill="#80828b" fill-rule="evenodd"/>
                        <path id="Caminho_2319" data-name="Caminho 2319" d="M102.67,415.964h1.851V405.788c-.589.293-1.2.607-1.851.952Z" transform="translate(-95.883 -378.965)" fill="#80828b" fill-rule="evenodd"/>
                        <path id="Caminho_2320" data-name="Caminho 2320" d="M479.769,432.66c-1.276-.845-2.553-1.609-3.773-2.29v8.552h4.936a.617.617,0,0,0,.617-.617v-2.468a3.947,3.947,0,0,0-1.78-3.177" transform="translate(-444.532 -401.922)" fill="#80828b" fill-rule="evenodd"/>
                    </g>
                </svg>
                Minha Conta
            </div>
            
            <!-- Dropdown menu -->
            <div class="z-60 hidden my-4 text-base list-none divide-y rounded shadow bg-[#F2F2F2] divide-gray-600"
                id="dropdown">
                <div class="px-4 py-3">
                    <span class="block text-sm font-semibold text-gray-900">{{ session()->get("cliente")["nome_dono"] }}</span>
                    <span
                        class="block text-sm font-medium text-gray-500 truncate ">{{ session()->get("cliente")["email"] }}</span>
                </div>
                <ul class="py-1" aria-labelledby="dropdown">
                    @if(session()->get("cliente") && !session()->get("cliente")["finalizado"])
                        <li>
                            <a href="#"
                                class="block px-4 py-2 text-sm text-gray-500 hover:text-gray-900">Finalizar Cadastro</a>
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
            {{-- <div class="mx-2 text-center transition duration-500 cpointer hover:scale-105" style="font-size: 10px;" @click="mostrarCarrinho = true">
                <svg class="mx-auto" id="Grupo_3723" data-name="Grupo 3723" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="36.992" height="37" viewBox="0 0 36.992 37">
                    <defs>
                        <clipPath id="clip-path">
                        <rect id="Retângulo_2470" data-name="Retângulo 2470" width="36.992" height="37" fill="#80828b"/>
                        </clipPath>
                    </defs>
                    <g id="Grupo_3682" data-name="Grupo 3682" clip-path="url(#clip-path)">
                        <path id="Caminho_1118" data-name="Caminho 1118" d="M405.252,193.579h-3.063v7.109a.579.579,0,0,0,.578.578h7.225l-3.7-7.052a1.218,1.218,0,0,0-1.04-.636Z" transform="translate(-374.792 -180.392)" fill="#80828b"/>
                        <path id="Caminho_1119" data-name="Caminho 1119" d="M86.45,206.815h-.4v-4.393H78.532a1.7,1.7,0,0,1-1.734-1.734v-7.11H74.544a.579.579,0,0,0-.578.578v12.716H54.893a.579.579,0,0,0-.578.578v3.757a1.159,1.159,0,0,0,1.156,1.156h.289a1.968,1.968,0,0,1-.058-.578,4.335,4.335,0,0,1,8.67,0,1.97,1.97,0,0,1-.058.578H75.758a1.968,1.968,0,0,1-.058-.578,4.335,4.335,0,0,1,8.67,0,1.967,1.967,0,0,1-.058.578h2.138a1.159,1.159,0,0,0,1.156-1.156v-3.179a1.173,1.173,0,0,0-1.156-1.214Z" transform="translate(-50.615 -180.393)" fill="#80828b"/>
                        <ellipse id="Elipse_305" data-name="Elipse 305" cx="3.179" cy="3.179" rx="3.179" ry="3.179" transform="translate(26.182 28.156)" fill="#80828b"/>
                        <ellipse id="Elipse_306" data-name="Elipse 306" cx="3.179" cy="3.179" rx="3.179" ry="3.179" transform="translate(6.185 28.156)" fill="#80828b"/>
                        <path id="Caminho_1120" data-name="Caminho 1120" d="M22.194,157.647V143.833a1.159,1.159,0,0,0-1.156-1.156H1.156A1.159,1.159,0,0,0,0,143.833v13.236a1.159,1.159,0,0,0,1.156,1.156h20.46a.546.546,0,0,0,.578-.578ZM4.74,154.583a.52.52,0,1,1-1.04,0v-8.207a.52.52,0,1,1,1.04,0Zm4.566,0a.52.52,0,1,1-1.04,0v-8.207a.52.52,0,1,1,1.04,0Zm4.624,0a.52.52,0,1,1-1.04,0v-8.207a.52.52,0,1,1,1.04,0Zm4.566,0a.52.52,0,1,1-1.04,0v-8.207a.52.52,0,1,1,1.04,0Z" transform="translate(0 -132.958)" fill="#80828b"/>
                        <path id="Caminho_1121" data-name="Caminho 1121" d="M54.656,526.2H52.344a.578.578,0,0,0,0,1.156h2.312a.546.546,0,0,0,.578-.578.621.621,0,0,0-.578-.578" transform="translate(-48.24 -490.352)" fill="#80828b"/>
                        <path id="Caminho_1122" data-name="Caminho 1122" d="M151.376,526.2h-2.312a.578.578,0,0,0,0,1.156h2.312a.546.546,0,0,0,.578-.578.579.579,0,0,0-.578-.578" transform="translate(-138.371 -490.352)" fill="#80828b"/>
                        <path id="Caminho_1123" data-name="Caminho 1123" d="M248.956,526.2h-2.312a.578.578,0,0,0,0,1.156h2.312a.546.546,0,0,0,.578-.578.579.579,0,0,0-.578-.578" transform="translate(-229.304 -490.352)" fill="#80828b"/>
                        <path id="Caminho_1124" data-name="Caminho 1124" d="M346.536,526.2h-2.312a.578.578,0,0,0,0,1.156h2.312a.546.546,0,0,0,.578-.578.622.622,0,0,0-.578-.578" transform="translate(-320.237 -490.352)" fill="#80828b"/>
                        <path id="Caminho_1125" data-name="Caminho 1125" d="M443.256,526.2h-2.312a.578.578,0,0,0,0,1.156h2.312a.546.546,0,0,0,.578-.578.579.579,0,0,0-.578-.578" transform="translate(-410.369 -490.352)" fill="#80828b"/>
                    </g>
                </svg>
                Meu Caminhão
            </div> --}}
            
        </div>
    @else
        <div class="flex items-center justify-center w-full">
            {{-- <div class="mx-3 mt-2 text-center transition duration-500 cpointer hover:scale-105" style="font-size: 10px;">
                <svg class="mx-auto" id="Grupo_3728" data-name="Grupo 3728" xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36">
                    <g id="Elipse_309" data-name="Elipse 309" fill="#fcfcfc" stroke="#80828b" stroke-width="1.5">
                        <circle cx="18" cy="18" r="18" stroke="none"/>
                        <circle cx="18" cy="18" r="17.25" fill="none"/>
                    </g>
                    <text id="_" data-name="?" transform="translate(10 28)" fill="#80828b" font-size="28" font-family="Montserrat-Bold, Montserrat" font-weight="700"><tspan x="0" y="0">?</tspan></text>
                </svg>
                Precisa de Ajuda
            </div> --}}
            
            <div class="mx-3 mt-2 text-center transition duration-500 cpointer hover:scale-105" style="font-size: 10px;" aria-expanded="false" type="button" data-dropdown-toggle="dropdown">
                <svg class="mx-auto" id="Grupo_3722" data-name="Grupo 3722" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="37.018" height="37" viewBox="0 0 37.018 37">
                    <defs>
                        <clipPath id="clip-path">
                        <rect id="Retângulo_2481" data-name="Retângulo 2481" width="37.018" height="37" fill="#80828b"/>
                        </clipPath>
                    </defs>
                    <g id="Grupo_3721" data-name="Grupo 3721" clip-path="url(#clip-path)">
                        <path id="Caminho_2314" data-name="Caminho 2314" d="M12.595,147.743c.054.051.109.1.164.151a9.254,9.254,0,0,0,3.335,2l.051.015c.186.06.376.113.567.159.074.018.148.037.223.053.124.027.25.047.377.067.095.016.188.038.283.051L15.92,154l-4.137-5.689.276-1.107c.032.034.065.064.1.1C12.3,147.456,12.445,147.6,12.595,147.743ZM9.881,137.351c.3.046.626.08.938.121l.344.044c.449.056.9.107,1.363.151q.534.053,1.076.1c.264.02.526.041.793.058q.847.056,1.7.089l.346.012c.69.023,1.382.036,2.071.036s1.38-.013,2.071-.036l.347-.012q.855-.033,1.7-.089c.267-.017.53-.038.793-.058q.543-.043,1.076-.1c.463-.044.915-.1,1.364-.151l.345-.044c.312-.041.634-.075.939-.121v1.213a11.29,11.29,0,0,1-3.529,8.246,7.747,7.747,0,0,1-5.108,2.242,7.579,7.579,0,0,1-4.773-1.945,10.987,10.987,0,0,1-3.046-4.28,11.467,11.467,0,0,1-.818-4.264Zm-8.4-4.33H35.558c-.862,1.168-4.059,2.468-9.037,3.174-.145.02-.294.038-.442.057-.242.032-.488.064-.739.092s-.479.054-.721.078c-.169.017-.342.033-.515.049-.273.025-.547.051-.824.072l-.277.018q-.77.057-1.557.091c-.285.013-.57.025-.861.034-.187.006-.375.012-.563.016-.493.011-.992.02-1.5.02s-1.011-.009-1.5-.02c-.188,0-.376-.01-.563-.016-.291-.009-.577-.021-.861-.034q-.787-.036-1.557-.091l-.276-.018c-.278-.022-.551-.047-.825-.072-.172-.015-.345-.031-.514-.049q-.364-.037-.721-.078c-.251-.028-.5-.06-.739-.092-.147-.019-.3-.037-.442-.057-4.978-.707-8.175-2.006-9.037-3.174Zm23.5,14.187.277,1.107L21.116,154l-1.674-3.766c.095-.012.189-.035.284-.051.126-.02.253-.04.376-.067.075-.016.149-.035.223-.053q.287-.069.567-.159l.051-.015a9.253,9.253,0,0,0,3.335-2c.055-.05.11-.1.164-.151.149-.142.3-.287.438-.437C24.911,147.271,24.945,147.242,24.977,147.208Zm.969-1.21a13.185,13.185,0,0,0,2.444-7.434v-1.426c4.947-.89,8.638-2.491,8.638-4.733a.617.617,0,0,0-.617-.617H27.643l-.292-1.234H9.686l-.293,1.234H.627a.616.616,0,0,0-.617.617c0,2.243,3.689,3.843,8.638,4.733v1.426A13.185,13.185,0,0,0,11.09,146l-.445,1.781c-.245.116-.5.236-.764.363v10.781H27.156V148.142c-.266-.128-.519-.247-.765-.363Z" transform="translate(-0.009 -121.923)" fill="#80828b" fill-rule="evenodd"/>
                        <path id="Caminho_2315" data-name="Caminho 2315" d="M167.6,93.218H151.11l-.292,1.234H167.9Z" transform="translate(-140.849 -87.056)" fill="#80828b" fill-rule="evenodd"/>
                        <path id="Caminho_2316" data-name="Caminho 2316" d="M174.814,1.78A2.35,2.35,0,0,0,171.861.1a14.871,14.871,0,0,1-8.509,0A2.35,2.35,0,0,0,160.4,1.788l-.745,3.14H175.56Z" transform="translate(-149.098 0)" fill="#80828b" fill-rule="evenodd"/>
                        <path id="Caminho_2317" data-name="Caminho 2317" d="M429.33,415.969h1.851v-9.225c-.647-.344-1.262-.658-1.851-.952Z" transform="translate(-400.95 -378.969)" fill="#80828b" fill-rule="evenodd"/>
                        <path id="Caminho_2318" data-name="Caminho 2318" d="M0,435.833V438.3a.617.617,0,0,0,.617.617H5.553v-8.552c-1.219.681-2.5,1.445-3.773,2.29A3.946,3.946,0,0,0,0,435.833" transform="translate(0 -401.918)" fill="#80828b" fill-rule="evenodd"/>
                        <path id="Caminho_2319" data-name="Caminho 2319" d="M102.67,415.964h1.851V405.788c-.589.293-1.2.607-1.851.952Z" transform="translate(-95.883 -378.965)" fill="#80828b" fill-rule="evenodd"/>
                        <path id="Caminho_2320" data-name="Caminho 2320" d="M479.769,432.66c-1.276-.845-2.553-1.609-3.773-2.29v8.552h4.936a.617.617,0,0,0,.617-.617v-2.468a3.947,3.947,0,0,0-1.78-3.177" transform="translate(-444.532 -401.922)" fill="#80828b" fill-rule="evenodd"/>
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

            <div class="mx-3 mt-2 text-center transition duration-500 cpointer hover:scale-105" style="font-size: 10px;">
                <svg class="mx-auto" xmlns="http://www.w3.org/2000/svg" width="37.018" height="37" fill="#80828b" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.201.662.591 1.221.774 1.394.86s.274.072.376-.043c.101-.116.433-.506.549-.68.116-.173.231-.145.39-.087s1.011.477 1.184.564.289.13.332.202c.045.072.045.419-.1.824zm-3.423-14.416c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm.029 18.88c-1.161 0-2.305-.292-3.318-.844l-3.677.964.984-3.595c-.607-1.052-.927-2.246-.926-3.468.001-3.825 3.113-6.937 6.937-6.937 1.856.001 3.598.723 4.907 2.034 1.31 1.311 2.031 3.054 2.03 4.908-.001 3.825-3.113 6.938-6.937 6.938z"/></svg>
                Precisa de Ajuda
            </div>

        </div>
    @endif
</div>