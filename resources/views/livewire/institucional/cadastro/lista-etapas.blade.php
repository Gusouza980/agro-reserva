<div x-data="{ showListaEtapas: @entangle('show') }" class="w-full max-w-[700px] mx-auto relative">
    {{-- @dd($showListaEtapas) --}}
    <div x-cloak x-show="showListaEtapas" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-0" x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-0" class="w-full font-montserrat absolute -top-[15vh] pb-5">
        <div class="w-full px-4 py-5 mt-3 bg-white rounded-t-lg shadow-[6px_6px_20px_rgba(36,62,111,0.11)]">
            <div class="w-full max-w-[450px] mx-auto text-center text-md-left md:text-left">
                <h1 class="text-black text-[25px] font-medium">Situação dos seus dados</h1>
                <h2 class="text-black text-[19px] font-light mt-2">Valide seus dados para que ninguém possa
                    Acessar ou criar uma conta no seu nome.</h2>
            </div>
            <div class="flex-col w-full mt-5">
                {{-- ETAPA 1 --}}
                <div class="flex items-center w-full px-4 rounded-lg @if(!$cliente) shadow-[2px_5px_10px_rgba(18,97,177,0.1)] @endif py-4">
                    <div class="relative">
                        <svg class="duration-300 animation w-[40px] md:w-auto hover:scale-105" xmlns="http://www.w3.org/2000/svg"
                            width="74.524" height="74.524" viewBox="0 0 74.524 74.524">
                            <g id="Grupo_9439" data-name="Grupo 9439" transform="translate(-674.498 -437.499)">
                                <g id="Grupo_9429" data-name="Grupo 9429" transform="translate(313.35 -405.267)">
                                    <circle id="Elipse_330" data-name="Elipse 330" cx="36.669" cy="36.669"
                                        r="36.669" transform="translate(361.65 843.451) rotate(-0.144)"
                                        fill="none" stroke="#efeef2" stroke-miterlimit="10" stroke-width="1" />
                                    <path id="Caminho_2974" data-name="Caminho 2974"
                                        d="M99.858,87.427V77.035q0-2.355,0-4.71c0-2.446.024-4.891,0-7.335a1.887,1.887,0,0,0-1.827-1.829c-1.421-.026-2.842,0-4.264,0h-28.8c-1.2,0-2.4-.018-3.6-.005a1.554,1.554,0,0,0-1.185.515A1.607,1.607,0,0,0,59.533,65c-.018,1.279,0,2.558,0,3.837V82.068c0,2.609-.022,5.217,0,7.824a1.884,1.884,0,0,0,1.832,1.827c3.02.018,6.038,0,9.058,0,1.23.005,2.46.02,3.69.006.3,0,.388.065.385.376-.017,1.538-.008,3.077-.008,4.616,0,.833,0,.833-.813.876-1.07,0-2.14-.03-3.209,0a1.927,1.927,0,0,0-1.83,1.834c-.018.445-.012.892,0,1.338a.641.641,0,0,0,.7.713q4.487,0,8.977-.01H89.7c.819.042,1.058-.184,1.058-1.007,0-.336.009-.674,0-1.01a1.937,1.937,0,0,0-1.838-1.859c-.714-.024-1.43,0-2.145.005-.526,0-1.054-.021-1.58-.009-.231.005-.3-.066-.3-.3.011-.579,0-1.159-.009-1.738V92.38a.629.629,0,0,0,.011-.161c-.079-.414.1-.516.5-.5.728.033,1.458,0,2.187,0h7.647c.933,0,1.866.02,2.8,0a1.54,1.54,0,0,0,1.127-.47,1.677,1.677,0,0,0,.7-1.353c.026-.822,0-1.647,0-2.471M87.751,98.862l.932.014a.856.856,0,0,1,.77,1.208c-.047.1-.123.087-.2.09-.176.006-.352.01-.526.014H77.339c-2.277,0-4.552,0-6.827-.026-.186,0-.552.243-.577-.238-.036-.673.148-1,.616-1.042.269-.023.541-.005.813-.006l3.291-.014Zm-4.135-4.289c0,.837-.035,1.673,0,2.509.016.4-.094.571-.5.509-2.3,0-4.6-.016-6.9-.005-.333,0-.43-.075-.425-.418.021-1.811.014-3.622.017-5.432l4.3-.018c1.056.005,2.111.018,3.165.008.265,0,.343.07.339.337-.012.837,0,1.673.008,2.511m14.958-4.915a.747.747,0,0,1-.4.734c-.913.091-1.829.017-2.742.04-.39.01-.78.01-1.17.014H69.448l-7.68-.013c-.754,0-.941-.184-.942-.926,0-.433.02-.866-.006-1.3-.018-.3.067-.386.376-.383,1.572.016,3.143.008,4.715.008.094,0,.19-.009.285-.013H96.211c.688,0,1.377.017,2.066.009.226,0,.3.056.3.292-.016.511-.013,1.025,0,1.536m.01-13.6V86.372c-.024.242-.213.158-.341.16-1,.01-2.005.012-3.008.016H65.218c-1.34,0-2.679-.018-4.019-.005-.3,0-.386-.075-.381-.38.015-1.04,0-2.08-.007-3.12V69.889c.006-1.531.014-3.063.01-4.594a.949.949,0,0,1,.259-.732,1.323,1.323,0,0,1,.627-.115c1.414,0,2.829-.006,4.243-.011h28.8l3,.014c.6,0,.824.225.825.834q.01,3.032.015,6.065,0,2.355,0,4.71"
                                        transform="translate(318.712 797.718)" fill="#efab1e" />
                                    <path id="Caminho_2975" data-name="Caminho 2975"
                                        d="M89,86.479a7.488,7.488,0,0,0-2.86-5.333A7.274,7.274,0,0,0,82.15,79.5a6.592,6.592,0,0,0-3.466.387,6.845,6.845,0,0,0-3.129,2.038,7.02,7.02,0,0,0-1.82,3.249,7.664,7.664,0,0,0,2.623,8.1A7.555,7.555,0,0,0,83.3,94.714a6.83,6.83,0,0,0,1.594-.6,7.042,7.042,0,0,0,1.4-.976,7.229,7.229,0,0,0,2.26-3.164c.093-.3.2-.6.28-.909A6.359,6.359,0,0,0,89,86.479m-1.516,2.674A7.141,7.141,0,0,1,85.4,92.242a7.517,7.517,0,0,1-3.008,1.389,8.444,8.444,0,0,1-2.424-.047,6.641,6.641,0,0,1-5.017-4.654,5.522,5.522,0,0,1-.142-2.571A2.9,2.9,0,0,0,74.834,86a7.369,7.369,0,0,1,1.536-3.1,7.037,7.037,0,0,1,3.19-1.966,6.715,6.715,0,0,1,1.666-.212,7.2,7.2,0,0,1,2.213.36,6.676,6.676,0,0,1,4.091,4.349,7.118,7.118,0,0,1-.041,3.726"
                                        transform="translate(308.695 785.997)" fill="#efab1e" />
                                    <path id="Caminho_2976" data-name="Caminho 2976"
                                        d="M148.887,109.654c-2.246-.021-4.492,0-6.738,0-1.111,0-2.222-.02-3.333,0a2,2,0,0,0-1.276.453,2.517,2.517,0,0,0-1.084,2.776,2.581,2.581,0,0,0,2.367,1.946c1.026.027,2.055,0,3.082,0h4.474c.84,0,1.681.025,2.52,0a2.115,2.115,0,0,0,1.406-.546,2.533,2.533,0,0,0,.935-2.766,2.56,2.56,0,0,0-2.353-1.863m.568,3.687a2,2,0,0,1-.977.2c-1.052-.007-2.1.005-3.157.009h-4.392c-.567,0-1.134-.011-1.7-.013a1.357,1.357,0,0,1-1.49-.919,1.326,1.326,0,0,1,.677-1.571,2.446,2.446,0,0,1,.834-.112c1.319,0,2.638-.006,3.957-.011l5.3.014a1.378,1.378,0,0,1,1.438.824,1.337,1.337,0,0,1-.493,1.575"
                                        transform="translate(263.338 764.216)" fill="#efab1e" />
                                    <path id="Caminho_2977" data-name="Caminho 2977"
                                        d="M148.889,86.4c-1.027-.046-2.058,0-3.087,0H141.49c-.89,0-1.781-.02-2.671,0a2.435,2.435,0,0,0-1.477.568,2.221,2.221,0,0,0-.624.722,2.593,2.593,0,0,0,2.1,3.887c.781.033,1.565,0,2.348,0h4.312c1.135,0,2.27.016,3.4,0a1.838,1.838,0,0,0,1.068-.322,1.88,1.88,0,0,0,.849-.715,2.58,2.58,0,0,0-1.908-4.134m.329,3.808a4.773,4.773,0,0,1-1.244.073c-1.158.008-2.316.01-3.474.015h-4.393c-.351,0-.7-.016-1.053-.012a1.284,1.284,0,0,1-1.268-.774,1.232,1.232,0,0,1,.245-1.422c.062-.071.141-.128.139-.234a3.832,3.832,0,0,1,1.259-.174c1.012.011,2.024,0,3.037-.009h4.312c.566,0,1.133.011,1.7.013a1.356,1.356,0,0,1,1.5.955c.179.612-.07,1.127-.762,1.57"
                                        transform="translate(263.346 780.983)" fill="#efab1e" />
                                    <path id="Caminho_2978" data-name="Caminho 2978"
                                        d="M95.255,95.173a1.925,1.925,0,0,0-1.447-1.83c-.209-.055-.428-.077-.649-.115l.248-.357-.025-.023.025.023a2.57,2.57,0,0,0-3.609-3.6,2.417,2.417,0,0,0-1.025,2.294,2.794,2.794,0,0,0,.788,1.677,2,2,0,0,0-1.57.666,1.636,1.636,0,0,0-.535,1.22c-.021.66-.013,1.32,0,1.98a.64.64,0,0,0,.7.705c1.12,0,2.24-.006,3.36-.01l3.031.013a.4.4,0,0,0,.3-.079.655.655,0,0,0,.409-.662c-.009-.634.007-1.267-.006-1.9m-4.62-4.952a1.287,1.287,0,0,1,1.609.163,1.3,1.3,0,0,1,.233,1.633,1.34,1.34,0,0,1-1.825.393,1.31,1.31,0,0,1-.017-2.19m3.241,6.309H90.54c-.5,0-1-.02-1.5-.009-.226.005-.323-.057-.3-.291.058-.5-.14-1.027.185-1.492h0a1.139,1.139,0,0,1,.688-.174c.713.006,1.425-.005,2.138-.01.484,0,.967.006,1.451.015.5.009.754.246.738.746a2.982,2.982,0,0,1-.074,1.215"
                                        transform="translate(298.596 779.292)" fill="#efab1e" />
                                </g>
                            </g>
                        </svg>
                        @if($cliente)
                            <i class="fas fa-check-circle text-success text-[10px] md:text-[20px] absolute bottom-[18px] right-[0px] md:bottom-[0px] md:right-[3px]"></i>
                        @endif
                    </div>
                    <div class="px-4">
                        <h3 class="text-black text-[16px] md:text-[23px] font-medium">Informações Iniciais</h3>
                        <h4 class="text-black text-[14px] md:text-[17px] font-light mt-2">Ele será usado para login e validação da sua conta.</h4>
                    </div>
                    <div>
                        <a class="text-[14px] md:text-[18px] text-white cpointer py-[6px] px-[10px] rounded-lg bg-[#F5B029] hover:btn-success @if(!$cliente) visible @else hidden @endif" @click="showListaEtapas = false; $wire.emit('showFormPreCadastro')">Validar</a>
                    </div>
                </div>
                {{-- ETAPA 2 --}}
                <div class="flex items-center w-full px-4 py-4 mt-4 rounded-lg @if($cliente && $cliente->etapa_cadastro == 2) shadow-[2px_5px_10px_rgba(18,97,177,0.1)] @endif">
                    <div class="relative">
                        <svg class="duration-300 animation w-[40px] md:w-auto hover:scale-105" xmlns="http://www.w3.org/2000/svg"
                            width="74.524" height="74.524" viewBox="0 0 74.524 74.524">
                            <g id="Grupo_9441" data-name="Grupo 9441" transform="translate(-465.379 -842.765)">
                                <g id="Grupo_9440" data-name="Grupo 9440">
                                    <circle id="Elipse_331" data-name="Elipse 331" cx="36.669" cy="36.669"
                                        r="36.669" transform="translate(465.88 843.451) rotate(-0.144)"
                                        fill="none" stroke="#efeef2" stroke-miterlimit="10" stroke-width="1" />
                                </g>
                                <path id="Caminho_2979" data-name="Caminho 2979"
                                    d="M466.572,81.435q0-2.234,0-4.468c0-.748.24-.988.974-.989H475.4c.706,0,.958.255.958.971q0,4.487,0,8.973c0,.694-.253.95-.94.95q-3.946,0-7.893,0c-.712,0-.953-.245-.954-.97q0-2.234,0-4.468m2.76.63a2.523,2.523,0,0,1,3.5-3.466,2.49,2.49,0,0,1,1,1.263,2.55,2.55,0,0,1-.235,2.2l1.25.668v-5.24H468.1v5.233l1.233-.66m5.443,3.3a2.245,2.245,0,0,0-1.3-1.686,4.59,4.59,0,0,0-3.683-.158,2.431,2.431,0,0,0-1.53,1.422,3.488,3.488,0,0,0-.106.422Zm-3.294-5.671a1.014,1.014,0,1,0-.032,2.028,1.014,1.014,0,1,0,.032-2.028"
                                    transform="translate(25.421 788.474)" fill="#efab1e" />
                                <path id="Caminho_2980" data-name="Caminho 2980"
                                    d="M476.765,127.331q-4.319,0-8.639,0c-.833,0-1.066-.232-1.066-1.057,0-1.055,0-2.11,0-3.165,0-.672.277-.946.955-.946q8.732,0,17.464,0c.689,0,.942.258.944.947q0,1.62,0,3.24c0,.74-.238.981-.982.981q-4.338,0-8.676,0m-8.191-1.517h16.333v-2.142H468.574Z"
                                    transform="translate(25.07 755.198)" fill="#efab1e" />
                                <path id="Caminho_2981" data-name="Caminho 2981"
                                    d="M473.89,148.473c1.713,0,3.426,0,5.139,0a.739.739,0,0,1,.772.736.763.763,0,0,1-.736.746c-.1.009-.2,0-.3,0h-2.346q-3.687,0-7.374,0a1.817,1.817,0,0,1-.478-.046.732.732,0,0,1,.144-1.434c.185-.015.372-.008.558-.008h4.618Z"
                                    transform="translate(24.363 736.241)" fill="#efab1e" />
                                <path id="Caminho_2982" data-name="Caminho 2982"
                                    d="M515,81.285c.856,0,1.712,0,2.567,0,.556,0,.871.277.869.744s-.327.743-.877.744q-2.623,0-5.247,0a.765.765,0,0,1-.809-.622.732.732,0,0,1,.488-.822,1.4,1.4,0,0,1,.4-.042c.868,0,1.736,0,2.6,0"
                                    transform="translate(-6.948 784.651)" fill="#efab1e" />
                                <path id="Caminho_2983" data-name="Caminho 2983"
                                    d="M515.007,93.016c.868,0,1.736,0,2.6,0,.508,0,.815.269.831.7a.737.737,0,0,1-.8.78q-2.66.014-5.321,0a.75.75,0,0,1-.816-.772.733.733,0,0,1,.826-.712c.893,0,1.786,0,2.679,0"
                                    transform="translate(-6.953 776.198)" fill="#efab1e" />
                                <path id="Caminho_2984" data-name="Caminho 2984"
                                    d="M515,104.732c.868,0,1.736,0,2.6,0,.526,0,.838.281.839.734a.744.744,0,0,1-.834.751q-2.623.011-5.246,0a.764.764,0,0,1-.861-.767c.009-.446.325-.718.856-.72.881,0,1.761,0,2.642,0"
                                    transform="translate(-6.953 767.756)" fill="#efab1e" />
                                <path id="Caminho_2985" data-name="Caminho 2985"
                                    d="M471.165,161.146c-.77,0-1.539.009-2.309,0a.751.751,0,0,1-.792-.979.737.737,0,0,1,.779-.509c1.564,0,3.128,0,4.692,0a.746.746,0,0,1,.817.729.76.76,0,0,1-.8.754c-.794.013-1.589,0-2.383,0"
                                    transform="translate(24.376 728.182)" fill="#efab1e" />
                                <path id="Caminho_2986" data-name="Caminho 2986"
                                    d="M486.906,75.253a2.741,2.741,0,0,0-2.358-2.14,2.674,2.674,0,0,0-2.779,1.273c-1.3,1.993-2.581,4-3.87,6.008-.077.12-.161.236-.3.446v-.5q0-7.935.008-15.87a1.027,1.027,0,0,0-.527-1.016H449.356a1.016,1.016,0,0,0-.529,1.013q.016,13.207.008,26.413c0,.087,0,.174,0,.261a.86.86,0,0,0,.011.095v6.409a1.441,1.441,0,0,0-.013.192q0,1.4,0,2.794c0,.732.246.973.992.973h26.785c.735,0,.982-.248.982-.984,0-2.968,0-5.936.008-8.9a1.282,1.282,0,0,1,.184-.653c2.728-4.265,5.475-8.517,8.2-12.785.388-.609.669-1.287,1-1.933v-.894a2.134,2.134,0,0,1-.078-.2m-10.822,24.839h-25.76c0-.307,0-.61,0-.911h.017V87.634h-.017V64.972H476.1v.281q0,8.829-.007,17.658a1.084,1.084,0,0,1-.174.546c-1.381,2.166-2.775,4.323-4.155,6.489a2.345,2.345,0,0,0-.311.744c-.192.882-.352,1.771-.531,2.69a2.928,2.928,0,0,0-2.442.609c-.023-.235-.044-.414-.058-.594-.153-1.9-1.583-2.718-3.245-1.786a11.694,11.694,0,0,0-1.934,1.438,9.941,9.941,0,0,0-2.093,2.692.734.734,0,0,0,.27,1.033.746.746,0,0,0,1-.273c.083-.123.152-.256.231-.382a8.923,8.923,0,0,1,3.274-3.233c.634-.348.9-.192,1,.528a1.478,1.478,0,0,1,.012.186c0,.805,0,1.611,0,2.416a.767.767,0,0,0,.507.817.744.744,0,0,0,.924-.427,3.351,3.351,0,0,1,1.271-1.376,4.849,4.849,0,0,1,.792-.281c0,.454.02.8-.006,1.144a.8.8,0,0,0,.361.867.825.825,0,0,0,.962-.138c1.308-.945,2.624-1.877,3.939-2.814.117-.084.239-.16.395-.264Zm-3.337-8.272,1.664,1.066-1.918,1.37c-.057.041-.119.075-.245.155l.5-2.592m2.77,0-2.261-1.453,8.75-13.613,2.26,1.454-8.749,13.611m9.54-14.878-2.229-1.43a1.371,1.371,0,1,1,2.229,1.43"
                                    transform="translate(38.206 797.496)" fill="#efab1e" />
                            </g>
                        </svg>
                        @if($cliente && $cliente->etapa_cadastro > 2)
                            <i class="fas fa-check-circle text-success text-[10px] md:text-[20px] absolute bottom-[18px] right-[0px] md:bottom-[0px] md:right-[3px]"></i>
                        @endif
                    </div>
                    <div class="px-4">
                        <h3 class="text-black text-[16px] md:text-[23px] font-medium">Dados pessoais</h3>
                        <h4 class="text-black text-[14px] md:text-[17px] font-light mt-2">Ninguém poderá criar uma conta em seu nome.</h4>
                    </div>
                    <div>
                        <a class="text-[14px] md:text-[18px] text-white cpointer py-[6px] px-[10px] rounded-lg bg-[#F5B029] hover:btn-success @if($cliente && $cliente->etapa_cadastro == 2) visible @else hidden @endif" @click="showListaEtapas = false; $wire.emit('showSelecaoCategoria')">Validar</a>
                        <a class="text-[14px] md:text-[18px] text-white cpointer py-[6px] px-[10px] rounded-lg bg-[#F5B029] hover:btn-primary @if($cliente && $cliente->etapa_cadastro > 2) visible @else hidden @endif" @click="showListaEtapas = false; $wire.emit('showSelecaoCategoria')">Editar</a>
                    </div>
                </div>
                {{-- ETAPA TERMOS --}}
                @if($cliente && $cliente->pessoa_fisica)
                    <div class="flex items-center w-full px-4 py-4 mt-4 rounded-lg @if($cliente && $cliente->etapa_cadastro == 3 && !$cliente->agriskTermosFinalizado) shadow-[2px_5px_10px_rgba(18,97,177,0.1)] @endif">
                        <div class="relative">
                            <svg class="duration-300 animation w-[40px] md:w-auto hover:scale-105" xmlns="http://www.w3.org/2000/svg"
                                width="74.524" height="74.524" viewBox="0 0 74.524 74.524">
                                <g id="Grupo_9441" data-name="Grupo 9441" transform="translate(-465.379 -842.765)">
                                    <g id="Grupo_9440" data-name="Grupo 9440">
                                        <circle id="Elipse_331" data-name="Elipse 331" cx="36.669" cy="36.669"
                                            r="36.669" transform="translate(465.88 843.451) rotate(-0.144)"
                                            fill="none" stroke="#efeef2" stroke-miterlimit="10" stroke-width="1" />
                                    </g>
                                    <path id="Caminho_2979" data-name="Caminho 2979"
                                        d="M466.572,81.435q0-2.234,0-4.468c0-.748.24-.988.974-.989H475.4c.706,0,.958.255.958.971q0,4.487,0,8.973c0,.694-.253.95-.94.95q-3.946,0-7.893,0c-.712,0-.953-.245-.954-.97q0-2.234,0-4.468m2.76.63a2.523,2.523,0,0,1,3.5-3.466,2.49,2.49,0,0,1,1,1.263,2.55,2.55,0,0,1-.235,2.2l1.25.668v-5.24H468.1v5.233l1.233-.66m5.443,3.3a2.245,2.245,0,0,0-1.3-1.686,4.59,4.59,0,0,0-3.683-.158,2.431,2.431,0,0,0-1.53,1.422,3.488,3.488,0,0,0-.106.422Zm-3.294-5.671a1.014,1.014,0,1,0-.032,2.028,1.014,1.014,0,1,0,.032-2.028"
                                        transform="translate(25.421 788.474)" fill="#efab1e" />
                                    <path id="Caminho_2980" data-name="Caminho 2980"
                                        d="M476.765,127.331q-4.319,0-8.639,0c-.833,0-1.066-.232-1.066-1.057,0-1.055,0-2.11,0-3.165,0-.672.277-.946.955-.946q8.732,0,17.464,0c.689,0,.942.258.944.947q0,1.62,0,3.24c0,.74-.238.981-.982.981q-4.338,0-8.676,0m-8.191-1.517h16.333v-2.142H468.574Z"
                                        transform="translate(25.07 755.198)" fill="#efab1e" />
                                    <path id="Caminho_2981" data-name="Caminho 2981"
                                        d="M473.89,148.473c1.713,0,3.426,0,5.139,0a.739.739,0,0,1,.772.736.763.763,0,0,1-.736.746c-.1.009-.2,0-.3,0h-2.346q-3.687,0-7.374,0a1.817,1.817,0,0,1-.478-.046.732.732,0,0,1,.144-1.434c.185-.015.372-.008.558-.008h4.618Z"
                                        transform="translate(24.363 736.241)" fill="#efab1e" />
                                    <path id="Caminho_2982" data-name="Caminho 2982"
                                        d="M515,81.285c.856,0,1.712,0,2.567,0,.556,0,.871.277.869.744s-.327.743-.877.744q-2.623,0-5.247,0a.765.765,0,0,1-.809-.622.732.732,0,0,1,.488-.822,1.4,1.4,0,0,1,.4-.042c.868,0,1.736,0,2.6,0"
                                        transform="translate(-6.948 784.651)" fill="#efab1e" />
                                    <path id="Caminho_2983" data-name="Caminho 2983"
                                        d="M515.007,93.016c.868,0,1.736,0,2.6,0,.508,0,.815.269.831.7a.737.737,0,0,1-.8.78q-2.66.014-5.321,0a.75.75,0,0,1-.816-.772.733.733,0,0,1,.826-.712c.893,0,1.786,0,2.679,0"
                                        transform="translate(-6.953 776.198)" fill="#efab1e" />
                                    <path id="Caminho_2984" data-name="Caminho 2984"
                                        d="M515,104.732c.868,0,1.736,0,2.6,0,.526,0,.838.281.839.734a.744.744,0,0,1-.834.751q-2.623.011-5.246,0a.764.764,0,0,1-.861-.767c.009-.446.325-.718.856-.72.881,0,1.761,0,2.642,0"
                                        transform="translate(-6.953 767.756)" fill="#efab1e" />
                                    <path id="Caminho_2985" data-name="Caminho 2985"
                                        d="M471.165,161.146c-.77,0-1.539.009-2.309,0a.751.751,0,0,1-.792-.979.737.737,0,0,1,.779-.509c1.564,0,3.128,0,4.692,0a.746.746,0,0,1,.817.729.76.76,0,0,1-.8.754c-.794.013-1.589,0-2.383,0"
                                        transform="translate(24.376 728.182)" fill="#efab1e" />
                                    <path id="Caminho_2986" data-name="Caminho 2986"
                                        d="M486.906,75.253a2.741,2.741,0,0,0-2.358-2.14,2.674,2.674,0,0,0-2.779,1.273c-1.3,1.993-2.581,4-3.87,6.008-.077.12-.161.236-.3.446v-.5q0-7.935.008-15.87a1.027,1.027,0,0,0-.527-1.016H449.356a1.016,1.016,0,0,0-.529,1.013q.016,13.207.008,26.413c0,.087,0,.174,0,.261a.86.86,0,0,0,.011.095v6.409a1.441,1.441,0,0,0-.013.192q0,1.4,0,2.794c0,.732.246.973.992.973h26.785c.735,0,.982-.248.982-.984,0-2.968,0-5.936.008-8.9a1.282,1.282,0,0,1,.184-.653c2.728-4.265,5.475-8.517,8.2-12.785.388-.609.669-1.287,1-1.933v-.894a2.134,2.134,0,0,1-.078-.2m-10.822,24.839h-25.76c0-.307,0-.61,0-.911h.017V87.634h-.017V64.972H476.1v.281q0,8.829-.007,17.658a1.084,1.084,0,0,1-.174.546c-1.381,2.166-2.775,4.323-4.155,6.489a2.345,2.345,0,0,0-.311.744c-.192.882-.352,1.771-.531,2.69a2.928,2.928,0,0,0-2.442.609c-.023-.235-.044-.414-.058-.594-.153-1.9-1.583-2.718-3.245-1.786a11.694,11.694,0,0,0-1.934,1.438,9.941,9.941,0,0,0-2.093,2.692.734.734,0,0,0,.27,1.033.746.746,0,0,0,1-.273c.083-.123.152-.256.231-.382a8.923,8.923,0,0,1,3.274-3.233c.634-.348.9-.192,1,.528a1.478,1.478,0,0,1,.012.186c0,.805,0,1.611,0,2.416a.767.767,0,0,0,.507.817.744.744,0,0,0,.924-.427,3.351,3.351,0,0,1,1.271-1.376,4.849,4.849,0,0,1,.792-.281c0,.454.02.8-.006,1.144a.8.8,0,0,0,.361.867.825.825,0,0,0,.962-.138c1.308-.945,2.624-1.877,3.939-2.814.117-.084.239-.16.395-.264Zm-3.337-8.272,1.664,1.066-1.918,1.37c-.057.041-.119.075-.245.155l.5-2.592m2.77,0-2.261-1.453,8.75-13.613,2.26,1.454-8.749,13.611m9.54-14.878-2.229-1.43a1.371,1.371,0,1,1,2.229,1.43"
                                        transform="translate(38.206 797.496)" fill="#efab1e" />
                                </g>
                            </svg>
                            @if($cliente && $cliente->etapa_cadastro > 2 && $cliente->agriskTermosFinalizado)
                                <i class="fas fa-check-circle text-success text-[10px] md:text-[20px] absolute bottom-[18px] right-[0px] md:bottom-[0px] md:right-[3px]"></i>
                            @endif
                        </div>
                        <div class="px-4">
                            <h3 class="text-black text-[16px] md:text-[23px] font-medium">Termos para Análise</h3>
                            <h4 class="text-black text-[14px] md:text-[17px] font-light mt-2">Nessa etapa você passará por um processo para permitir que façamos sua análise de crédito.</h4>
                        </div>
                        <div>
                            <a class="text-[14px] md:text-[18px] text-white cpointer py-[6px] px-[10px] rounded-lg bg-[#F5B029] hover:btn-success @if($cliente && $cliente->etapa_cadastro == 3 && !$cliente->agriskTermosFinalizado) visible @else hidden @endif" @click="showListaEtapas = false; $wire.emit('showTermosAgrisk')">Validar</a>
                            <a class="text-[14px] md:text-[18px] text-white cpointer py-[6px] px-[10px] rounded-lg bg-[#F5B029] hover:btn-primary @if($cliente && $cliente->etapa_cadastro >= 3 && $cliente->agriskTermosFinalizado) visible @else hidden @endif" @click="showListaEtapas = false; $wire.emit('showTermosAgrisk')">Editar</a>
                        </div>
                    </div>
                @endif
                {{-- ETAPA 3 --}}
                <div class="flex items-center w-full px-4 mt-4 rounded-lg @if($cliente && $cliente->etapa_cadastro == 3 && ($cliente->agriskTermosFinalizado || !$cliente->pessoa_fisica)) shadow-[2px_5px_10px_rgba(18,97,177,0.1)] @endif py-4">
                    <div class="relative">
                        <svg class="duration-300 animation w-[40px] md:w-auto hover:scale-105" xmlns="http://www.w3.org/2000/svg"
                            width="74.338" height="74.338" viewBox="0 0 74.338 74.338">
                            <path id="Caminho_2995" data-name="Caminho 2995"
                                d="M36.669,0A36.675,36.675,0,1,1,0,36.669,36.669,36.669,0,0,1,36.669,0Z"
                                transform="translate(0.5 0.5)" fill="none" stroke="#efeef2" stroke-width="1" />
                            <path id="Caminho_2987" data-name="Caminho 2987"
                                d="M854.587,62.787a5.926,5.926,0,0,1,.81.518,1.487,1.487,0,0,1,.45,1.163q.008,3.075,0,6.15a1.6,1.6,0,0,1-.027.2h-1.583v-6.4H830.109V99.786h17.685V99.4q0-2.49,0-4.98c0-.75.3-1.045,1.053-1.047q2.433,0,4.867,0h.494V91.8h1.62c.007.115.02.225.02.335,0,1.4-.005,2.792,0,4.188a1.356,1.356,0,0,1-.432,1.038c-1.2,1.183-2.383,2.384-3.581,3.569a6.251,6.251,0,0,1-.651.5H829.756a1.87,1.87,0,0,1-1.294-2.039q.026-17.281,0-34.561a1.87,1.87,0,0,1,1.294-2.039ZM849.415,99.82c.367,0,.693.019,1.015-.008a.731.731,0,0,0,.422-.182q1.614-1.587,3.205-3.2a.5.5,0,0,0,.161-.279c.019-.373.008-.747.008-1.131h-4.811Z"
                                transform="translate(-806.692 -44.937)" fill="#efab1e" />
                            <path id="Caminho_2988" data-name="Caminho 2988"
                                d="M900.763,115.065a8.855,8.855,0,1,1,8.836-8.876,8.876,8.876,0,0,1-8.836,8.876m5.5-4.2a7.228,7.228,0,1,0-11.025-.005,4.314,4.314,0,0,1,1.144-1.93,4.256,4.256,0,0,1,2.018-1.04,4.028,4.028,0,1,1,4.715,0,4.105,4.105,0,0,1,3.147,2.971m-5.517-1.437c-.515,0-1.03-.008-1.545,0a2.4,2.4,0,0,0-2.461,2.523.559.559,0,0,0,.231.405,7.01,7.01,0,0,0,7.561,0,.56.56,0,0,0,.226-.408,2.4,2.4,0,0,0-2.466-2.519c-.515-.008-1.03,0-1.546,0m.021-2.418a2.412,2.412,0,1,0-2.431-2.412,2.436,2.436,0,0,0,2.431,2.412"
                                transform="translate(-852.405 -69.844)" fill="#efab1e" />
                            <path id="Caminho_2989" data-name="Caminho 2989"
                                d="M863.5,89.014h-1.613V87.456H847.42v8.013h9.605V97.09H846.917c-.862,0-1.133-.268-1.133-1.12q0-4.527,0-9.055c0-.829.277-1.106,1.109-1.106H862.4c.806,0,1.1.287,1.1,1.082,0,.7,0,1.4,0,2.123"
                                transform="translate(-819.173 -61.525)" fill="#efab1e" />
                            <rect id="Retângulo_2645" data-name="Retângulo 2645" width="8.02" height="1.562"
                                transform="translate(26.623 38.806)" fill="#efab1e" />
                            <rect id="Retângulo_2646" data-name="Retângulo 2646" width="8.01" height="1.569"
                                transform="translate(33.07 43.627)" fill="#efab1e" />
                            <rect id="Retângulo_2647" data-name="Retângulo 2647" width="8.014" height="1.557"
                                transform="translate(26.633 48.46)" fill="#efab1e" />
                            <rect id="Retângulo_2648" data-name="Retângulo 2648" width="4.796" height="1.567"
                                transform="translate(26.633 43.63)" fill="#efab1e" />
                            <rect id="Retângulo_2649" data-name="Retângulo 2649" width="3.181" height="1.569"
                                transform="translate(36.294 48.461)" fill="#efab1e" />
                            <rect id="Retângulo_2650" data-name="Retângulo 2650" width="1.56" height="1.572"
                                transform="translate(36.296 38.805)" fill="#efab1e" />
                        </svg>
                        @if($cliente && $cliente->etapa_cadastro > 3)
                            <i class="fas fa-check-circle text-success text-[10px] md:text-[20px] absolute bottom-[18px] right-[0px] md:bottom-[0px] md:right-[3px]"></i>
                        @endif
                    </div>
                    <div class="px-4">
                        <h3 class="text-black text-[16px] md:text-[23px] font-medium">Dados da propriedade</h3>
                        <h4 class="text-black text-[14px] md:text-[17px] font-light mt-2">Informações da propriedade para emissão da documentação fiscal e de transporte dos animais.</h4>
                    </div>
                    <div>
                        <a class="text-[14px] md:text-[18px] text-white cpointer py-[6px] px-[10px] rounded-lg bg-[#F5B029] hover:btn-success @if($cliente && $cliente->etapa_cadastro == 3 && ($cliente->agriskTermosFinalizado || !$cliente->pessoa_fisica)) visible @else hidden @endif" @click="showListaEtapas = false; $wire.emit('showFormDadosPropriedade')">Validar</a>
                        <a class="text-[14px] md:text-[18px] text-white cpointer py-[6px] px-[10px] rounded-lg bg-[#F5B029] hover:btn-primary @if($cliente && $cliente->etapa_cadastro > 3) visible @else hidden @endif" @click="showListaEtapas = false; $wire.emit('showFormDadosPropriedade')">Editar</a>
                    </div>
                </div>
                {{-- ETAPA 4 --}}
                <div class="flex items-center w-full px-4 mt-4 rounded-lg @if($cliente && $cliente->etapa_cadastro == 4) shadow-[2px_5px_10px_rgba(18,97,177,0.1)] @endif py-4">
                    <div class="relative">
                        <svg class="duration-300 animation w-[40px] md:w-auto hover:scale-105" xmlns="http://www.w3.org/2000/svg"
                            width="74.516" height="74.516" viewBox="0 0 74.516 74.516">
                            <g id="Grupo_9444" data-name="Grupo 9444" transform="translate(-673.999 -842.785)">
                                <circle id="Elipse_333" data-name="Elipse 333" cx="36.669" cy="36.669"
                                    r="36.669" transform="translate(674.5 843.461) rotate(-0.137)" fill="none"
                                    stroke="#efeef2" stroke-miterlimit="10" stroke-width="1" />
                                <path id="Caminho_2990" data-name="Caminho 2990"
                                    d="M1216.729,121.838q5.569,0,11.139,0a2.761,2.761,0,0,1,.031,5.521c-1.543.015-3.085,0-4.628,0q-8.866,0-17.733,0a2.761,2.761,0,1,1-.03-5.522q5.61-.01,11.221,0m-.043,3.858h10.728a5.507,5.507,0,0,0,.573-.016,1.085,1.085,0,0,0-.006-2.157,5.26,5.26,0,0,0-.531-.015h-21.537a5.184,5.184,0,0,0-.532.015,1.086,1.086,0,0,0,.006,2.159c.189.019.381.015.572.015h10.728"
                                    transform="translate(-504.739 755.431)" fill="#efab1e" />
                                <path id="Caminho_2991" data-name="Caminho 2991"
                                    d="M1216.7,81.927q5.529,0,11.057,0a2.708,2.708,0,0,1,2.825,2.367,2.742,2.742,0,0,1-2.18,3.082,4.747,4.747,0,0,1-.772.072q-10.955.006-21.909,0a2.825,2.825,0,0,1-2.819-1.835,2.741,2.741,0,0,1,2.578-3.686c3.74-.011,7.48,0,11.22,0m-.026,3.847h10.77c.177,0,.356.006.532-.011a1.072,1.072,0,0,0,.963-.96,1.05,1.05,0,0,0-.759-1.163,3.023,3.023,0,0,0-.769-.075q-10.729-.005-21.459,0a3.292,3.292,0,0,0-.691.052,1.043,1.043,0,0,0-.849,1.1,1.094,1.094,0,0,0,1.246,1.059q5.508,0,11.016,0"
                                    transform="translate(-504.738 784.189)" fill="#efab1e" />
                                <path id="Caminho_2992" data-name="Caminho 2992"
                                    d="M1216.694,167.275c-3.754,0-7.507.01-11.261,0a2.72,2.72,0,0,1-2.618-3.236,2.764,2.764,0,0,1,2.876-2.281q4.668-.008,9.337,0,6.327,0,12.654,0a2.8,2.8,0,0,1,2.812,1.9,2.744,2.744,0,0,1-2.579,3.626h-11.221Zm.006-3.846h-10.77a5.19,5.19,0,0,0-.532.011,1.073,1.073,0,0,0-.959.964,1.047,1.047,0,0,0,.763,1.16,3.065,3.065,0,0,0,.77.074q10.729.005,21.458,0a3.2,3.2,0,0,0,.691-.053,1.065,1.065,0,0,0,.838-1.223,1.11,1.11,0,0,0-1.243-.932q-5.508,0-11.016,0"
                                    transform="translate(-504.763 726.672)" fill="#efab1e" />
                                <path id="Caminho_2993" data-name="Caminho 2993"
                                    d="M1222.422,81.052c.027-2.664.027-5.347-.005-8.008q0-.1,0-.2a1.2,1.2,0,0,0,.014-.177c.006-2.117.026-4.235-.006-6.352a3.178,3.178,0,0,0-3.173-3.151q-16-.01-32,0a3.015,3.015,0,0,0-1.764.563,3.3,3.3,0,0,0-1.4,2.93c.015,5.218.006,10.436.006,15.654,0,5.245.029,10.491-.014,15.736a3.372,3.372,0,0,0,3.47,3.461c10.475-.04,20.951-.02,31.426-.022a4.038,4.038,0,0,0,.774-.044,3.231,3.231,0,0,0,2.682-3.287q.005-8.421,0-16.842c0-.087,0-.175-.007-.261m-1.62,3.9q0,6.474,0,12.949a2.033,2.033,0,0,1-.328,1.324,1.808,1.808,0,0,1-1.553.661q-15.672-.008-31.344,0c-.082,0-.164,0-.246,0a1.6,1.6,0,0,1-1.612-1.654q0-15.9,0-31.8a1.766,1.766,0,0,1,.058-.484,1.636,1.636,0,0,1,1.757-1.172h31.426c.1,0,.192,0,.287,0a1.608,1.608,0,0,1,1.477,1.163,3.674,3.674,0,0,1,.075.854c.007,1.967,0,3.934.009,5.9a1.245,1.245,0,0,0,.014.175c0,.105,0,.211-.006.32-.019,1.379,0,2.769,0,4.155h0c0,1.27-.011,2.543,0,3.809,0,.024,0,.046,0,.071-.007,1.243,0,2.486,0,3.729"
                                    transform="translate(-492.077 797.707)" fill="#efab1e" />
                            </g>
                        </svg>
                        @if($cliente && $cliente->etapa_cadastro > 4)
                            <i class="fas fa-check-circle text-success text-[10px] md:text-[20px] absolute bottom-[18px] right-[0px] md:bottom-[0px] md:right-[3px]"></i>
                        @endif
                    </div>
                    <div class="px-4">
                        <h3 class="text-black text-[16px] md:text-[23px] font-medium">Informações complementares</h3>
                        <h4 class="text-black text-[14px] md:text-[17px] font-light mt-2">Informações de referência para agilizar o processo de análise do seu cadastro.</h4>
                    </div>
                    <div>
                        <a class="text-[14px] md:text-[18px] text-white cpointer py-[6px] px-[10px] rounded-lg bg-[#F5B029] hover:btn-success @if($cliente && $cliente->etapa_cadastro == 4) visible @else hidden @endif" @click="showListaEtapas = false; $wire.emit('showFormInformacoesComplementares')">Validar</a>
                        <a class="text-[14px] md:text-[18px] text-white cpointer py-[6px] px-[10px] rounded-lg bg-[#F5B029] hover:btn-primary @if($cliente && $cliente->etapa_cadastro > 4) visible @else hidden @endif" @click="showListaEtapas = false; $wire.emit('showFormInformacoesComplementares')">Editar</a>
                    </div>
                </div>
                {{-- ETAPA 5 --}}
                <div class="flex items-center w-full px-4 mt-4 rounded-lg @if($cliente && $cliente->etapa_cadastro == 5) shadow-[2px_5px_10px_rgba(18,97,177,0.1)] @endif py-4">
                    <div class="relative">
                        <svg class="duration-300 animation w-[40px] md:w-auto hover:scale-105" xmlns="http://www.w3.org/2000/svg"
                            width="74.516" height="74.516" viewBox="0 0 74.516 74.516">
                            <g id="Grupo_9444" data-name="Grupo 9444" transform="translate(-673.999 -842.785)">
                                <circle id="Elipse_333" data-name="Elipse 333" cx="36.669" cy="36.669"
                                    r="36.669" transform="translate(674.5 843.461) rotate(-0.137)" fill="none"
                                    stroke="#efeef2" stroke-miterlimit="10" stroke-width="1" />
                                <path id="Caminho_2990" data-name="Caminho 2990"
                                    d="M1216.729,121.838q5.569,0,11.139,0a2.761,2.761,0,0,1,.031,5.521c-1.543.015-3.085,0-4.628,0q-8.866,0-17.733,0a2.761,2.761,0,1,1-.03-5.522q5.61-.01,11.221,0m-.043,3.858h10.728a5.507,5.507,0,0,0,.573-.016,1.085,1.085,0,0,0-.006-2.157,5.26,5.26,0,0,0-.531-.015h-21.537a5.184,5.184,0,0,0-.532.015,1.086,1.086,0,0,0,.006,2.159c.189.019.381.015.572.015h10.728"
                                    transform="translate(-504.739 755.431)" fill="#efab1e" />
                                <path id="Caminho_2991" data-name="Caminho 2991"
                                    d="M1216.7,81.927q5.529,0,11.057,0a2.708,2.708,0,0,1,2.825,2.367,2.742,2.742,0,0,1-2.18,3.082,4.747,4.747,0,0,1-.772.072q-10.955.006-21.909,0a2.825,2.825,0,0,1-2.819-1.835,2.741,2.741,0,0,1,2.578-3.686c3.74-.011,7.48,0,11.22,0m-.026,3.847h10.77c.177,0,.356.006.532-.011a1.072,1.072,0,0,0,.963-.96,1.05,1.05,0,0,0-.759-1.163,3.023,3.023,0,0,0-.769-.075q-10.729-.005-21.459,0a3.292,3.292,0,0,0-.691.052,1.043,1.043,0,0,0-.849,1.1,1.094,1.094,0,0,0,1.246,1.059q5.508,0,11.016,0"
                                    transform="translate(-504.738 784.189)" fill="#efab1e" />
                                <path id="Caminho_2992" data-name="Caminho 2992"
                                    d="M1216.694,167.275c-3.754,0-7.507.01-11.261,0a2.72,2.72,0,0,1-2.618-3.236,2.764,2.764,0,0,1,2.876-2.281q4.668-.008,9.337,0,6.327,0,12.654,0a2.8,2.8,0,0,1,2.812,1.9,2.744,2.744,0,0,1-2.579,3.626h-11.221Zm.006-3.846h-10.77a5.19,5.19,0,0,0-.532.011,1.073,1.073,0,0,0-.959.964,1.047,1.047,0,0,0,.763,1.16,3.065,3.065,0,0,0,.77.074q10.729.005,21.458,0a3.2,3.2,0,0,0,.691-.053,1.065,1.065,0,0,0,.838-1.223,1.11,1.11,0,0,0-1.243-.932q-5.508,0-11.016,0"
                                    transform="translate(-504.763 726.672)" fill="#efab1e" />
                                <path id="Caminho_2993" data-name="Caminho 2993"
                                    d="M1222.422,81.052c.027-2.664.027-5.347-.005-8.008q0-.1,0-.2a1.2,1.2,0,0,0,.014-.177c.006-2.117.026-4.235-.006-6.352a3.178,3.178,0,0,0-3.173-3.151q-16-.01-32,0a3.015,3.015,0,0,0-1.764.563,3.3,3.3,0,0,0-1.4,2.93c.015,5.218.006,10.436.006,15.654,0,5.245.029,10.491-.014,15.736a3.372,3.372,0,0,0,3.47,3.461c10.475-.04,20.951-.02,31.426-.022a4.038,4.038,0,0,0,.774-.044,3.231,3.231,0,0,0,2.682-3.287q.005-8.421,0-16.842c0-.087,0-.175-.007-.261m-1.62,3.9q0,6.474,0,12.949a2.033,2.033,0,0,1-.328,1.324,1.808,1.808,0,0,1-1.553.661q-15.672-.008-31.344,0c-.082,0-.164,0-.246,0a1.6,1.6,0,0,1-1.612-1.654q0-15.9,0-31.8a1.766,1.766,0,0,1,.058-.484,1.636,1.636,0,0,1,1.757-1.172h31.426c.1,0,.192,0,.287,0a1.608,1.608,0,0,1,1.477,1.163,3.674,3.674,0,0,1,.075.854c.007,1.967,0,3.934.009,5.9a1.245,1.245,0,0,0,.014.175c0,.105,0,.211-.006.32-.019,1.379,0,2.769,0,4.155h0c0,1.27-.011,2.543,0,3.809,0,.024,0,.046,0,.071-.007,1.243,0,2.486,0,3.729"
                                    transform="translate(-492.077 797.707)" fill="#efab1e" />
                            </g>
                        </svg>
                        @if($cliente && $cliente->etapa_cadastro > 5)
                            <i class="fas fa-check-circle text-success text-[10px] md:text-[20px] absolute bottom-[18px] right-[0px] md:bottom-[0px] md:right-[3px]"></i>
                        @endif
                    </div>
                    <div class="px-4">
                        <h3 class="text-black text-[16px] md:text-[23px] font-medium">Verificação de Documento</h3>
                        <h4 class="text-black text-[14px] md:text-[17px] font-light mt-2">Verificação de segurança para garantir a autenticidade das informações.</h4>
                    </div>
                    <div>
                        <a class="text-[14px] md:text-[18px] text-white cpointer py-[6px] px-[10px] rounded-lg bg-[#F5B029] hover:btn-success @if($cliente && $cliente->etapa_cadastro == 5) visible @else hidden @endif" @click="showListaEtapas = false; $wire.emit('showFormSelfie')">Validar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
