<!doctype html>
<html lang="pt-br">
<head>
    <title>Agroreserva</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="preload" as="style" href="{{ asset('css/main.css') }}?v=1.5.9" />
    <link rel="preload" as="image" href="{{ asset('imagens/bg-home-min-2.jpg') }}" />
    <link rel="preload" href="{{ asset('fontes/gobold/Gobold Regular.otf') }}" as="font" type="font/otf"
        crossorigin />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.5/dist/flowbite.min.css" />
    <link rel="stylesheet" href="{{ asset('css/main.css') }}?v=1.5.9" />
    <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/aos.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/floating-wpp.css') }}" />
    @toastr_css
    @livewireStyles
    @yield("styles")
    <style>
        a,
        a:hover,
        a:focus,
        a:active {
            color: inherit !important;
            text-decoration: none;
        }
    </style>
    <script defer src="https://unpkg.com/@alpinejs/intersect@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://unpkg.com/alpinejs@3.10.2/dist/cdn.min.js"></script>
</head>

<body x-data="{start: true}">
    <x-institucional.navbar></x-institucional.navbar>

    {{-- <div id="espacamento-nav">

    </div> --}}
    @if(session()->get("cliente") && isset(session()->get("cliente")["finalizado"]) && !session()->get("cliente")["finalizado"])
        <div class="d-lg-none" onclick="window.location.href = '{{ route('cadastro.finalizar') }}'" style="position: fixed; background-color: rgba(0, 180, 0); color: white; width: 100%; z-index: 100; text-align: center; font-size: 14px; bottom: 0px; padding: 10px 5px;">
            <b>Clique aqui para finalizar seu cadastro agora e sair na frente!</b>
        </div>
    @endif
    
    @yield('conteudo')

    <div class="container-fluid" id="footer"
        style="background: url(/imagens/rodape.jpg); background-size: cover; background-position:center; background-repeat: no-repeat;">
        <div class="py-5 row align-items-center">
            <div class="text-center col-12 col-lg-4">
                <div class="ml-auto mr-auto w400 mr-lg-0">
                    <div class="row">
                        <div class="px-5 text-center col-12 px-lg-0 text-lg-left text-nav-footer">
                            <img src="{{ asset('imagens/logo-footer.png') }}" style="" alt="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mt-5 text-center col-12 text-nav-footer text-lg-left">
                            <span><a href="tel:+553433052102">+55 34 3305-2102</a></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="text-center col-12 text-nav-footer text-lg-left">
                            <span>contato@agroreserva.com.br</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="text-center col-12 text-nav-footer text-lg-left">
                            <span>
                                <a href="https://www.instagram.com/agro_reserva/" target="_blank"><i
                                        class="fab fa-instagram fa-lg"></i></a>
                                <a href="https://www.facebook.com/Agro-Reserva-109027191237838" target="_blank"><i
                                        class="ml-4 fab fa-facebook-square fa-lg"></i></a>
                                <a href="https://www.youtube.com/c/AgroReserva" target="_blank"><i
                                        class="ml-4 fab fa-youtube fa-lg"></i></a>
                            </span>
                        </div>
                    </div>
                </div>

            </div>
            <div class="mt-5 col-12 offset-lg-4 col-lg-4 mt-lg-0">
                <div class="row">
                    <div class="col-12">
                        <div class="mx-auto w400">
                            <div class="row">
                                <div class="text-center col-12 text-nav-footer text-lg-left">
                                    <a class="" href=" {{ route('index') }}"><span><span
                                                style="border-bottom: 2px solid #FEB000;">{{ __('messages.navbar.inicio') }}</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="text-center col-12 text-nav-footer text-lg-left">
                                    <a class="" href=" {{ route('blog') }}"><span><span
                                                style="border-bottom: 2px solid #FEB000;">{{ __('messages.navbar.blog') }} </a>
                                </div>
                            </div>
                            <div class="mt-2 row">
                                <div class="text-center col-12 text-nav-footer text-lg-left">
                                    <a class="" href=" {{ route('sobre') }}"><span><span
                                                style="border-bottom: 2px solid #FEB000;">{{ __('messages.navbar.quem_somos') }} </a>
                                </div>
                            </div>
                            @if (!session()->get('cliente'))
                                <div class="mt-2 row">
                                    <div class="text-center col-12 text-nav-footer text-lg-left">
                                        <a class="" href=" {{ route('cadastro') }}"><span>{{ __('messages.navbar.cadastre_se') }}</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="mt-2 row">
                                    <div class="text-center col-12 text-nav-footer text-lg-left">
                                        <a class="" href=" {{ route('login') }}"><span>{{ __('messages.navbar.entrar') }}</span> </a>
                                    </div>
                                </div>
                            @else
                                @if (!session()->get('cliente')['finalizado'])
                                    <div class="mt-2 row">
                                        <div class="text-center col-12 text-nav-footer text-lg-left">
                                            <a class="" id="finalizar-cadastro-rodape" href=" {{ route('cadastro.finalizar') }}">{{ __('messages.navbar.finalizar_cadastro') }}</a>
                                        </div>
                                    </div>
                                @endif
                                <div class="mt-2 row">
                                    <div class="text-center col-12 text-nav-footer text-lg-left">
                                        <a class="" href=" {{ route('conta.index') }}"><span><span
                                                    style="border-bottom: 2px solid #FEB000;">Min</span>ha conta</span>
                                        </a>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid" id="container-footer">
        <div class="mx-auto w1200">
            <div class="py-0 row justify-content-center">
                <div class="text-center footer-links">
                    <a href="{{ route('termos') }}" class="px-4 footer-links-superior">Termos e condições de uso</a>
                    |
                    <a href="{{ route('politicas') }}" class="px-4 footer-links-superior">Políticas de
                        Privacidade</a>
                </div>
            </div>
            <div class="py-2 row justify-content-center">
                <div class="text-center footer-links d-none d-lg-block">
                    <span class="px-4 footer-links-superior"><b>Razão Social:</b><span> Agro Reserva Pecuaria Digital
                            LTDA</span></span>
                    |
                    <span class="px-4 footer-links-superior"><b>CNPJ:</b><span> 41.893.302/0001-13</span></span>
                </div>

                <div class="mt-3 text-center col-12 d-flex d-lg-none footer-link-ultimo">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 footer-link-ultimo">
                                <b>Razão Social</b>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mt-1 col-12 footer-link-ultimo">
                                <span>Agro Reserva Pecuaria Digital LTDA</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-3 text-center col-12 d-flex d-lg-none footer-link-ultimo">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 footer-link-ultimo">
                                <b>CNPJ</b>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mt-1 col-12 footer-link-ultimo">
                                <span>41.893.302/0001-13</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalSucesso" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="py-4 text-center modal-body modal-body-sucesso">
                    <div class="row">
                        <div class="col-12 conteudo-modal">
                            <h3>Obrigado <span id="nome_modal"></span>.</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 conteudo-modal">
                            <span class="mt-2">Seu cadastro foi realizado com sucesso. Você pode continuar
                                navegando pelo site ou, caso precise de ajuda, falar com um de nossos
                                consultores.</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 conteudo-modal">
                            <button class="px-5 py-2 mt-4 botao-confirma" onclick="fechaModal()">Continuar
                                Navegando</button>
                            <button class="px-5 py-2 mt-4 botao-confirma" onclick="fechaModal()">Falar com um
                                consultor</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <!-- Modal -->
    <div class="modal fade" id="modalPesquisa" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @livewire('site.pesquisa-lotes')
                </div>
            </div>
        </div>
    </div>


    @if (session()->get('ver_popup'))
        <div class="modal fade" id="modal_popup" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="px-3 pt-2 pb-4 text-center modal-body">
                        <div class="row">
                            <div class="col-12">
                                <img src="{{ asset(session()->get('ver_popup')) }}" style="max-width: 100%;" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div id="div-whatsapp" style="left: auto; right: 15px;">

    </div>

    <script src="{{ asset('js/jquery.js') }}">
    </script>
    <script src="{{ asset('js/aos.js') }}"></script>
    <script src="{{ asset('js/floating-wpp.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.lazy.min.js') }}"></script>
    <script type="text/javascript" async
        src="https://d335luupugsy2.cloudfront.net/js/loader-scripts/5d649ad8-4f69-4811-ab56-9c2bb4d5f5ea-loader.js">
    </script>
    <script src="https://unpkg.com/flowbite@1.4.5/dist/flowbite.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
    @toastr_js
    @toastr_render
    @livewireScripts

    @yield("scripts")
    @stack("scripts")

    @if (session()->get('cadastro_finalizado'))
        <script>
            function fechaModal() {
                $("#modalSucesso").modal("hide");
            }

            $(document).ready(function() {
                $("#modalSucesso").modal();
            });
        </script>
    @endif
    @if (session()->get('ver_popup'))
        <script>
            $(document).ready(function() {
                $("#modal_popup").modal("show");
            });
        </script>
    @endif
    @if(isset($reserva))
        <script>
            var telefone = "{!! $reserva->telefone_consultor !!}";
        </script>
    @elseif(isset($lote))
        <script>
            var telefone = "{!! $lote->reserva->telefone_consultor !!}";
        </script>
    @else
        <script>
            var telefone = '5514981809051';
        </script>
    @endif
    <script type="text/javascript" async
        src="https://d335luupugsy2.cloudfront.net/js/loader-scripts/5d649ad8-4f69-4811-ab56-9c2bb4d5f5ea-loader.js">
    </script>
    <script>
        $(document).ready(function(){
            $('#div-whatsapp').floatingWhatsApp({
                phone: telefone,
                popupMessage: 'Olá! Como podemos ajudar?',
                message: "",
                showPopup: true,
                showOnIE: false,
                headerTitle: 'Seja Bem-Vindo!',
                headerColor: '#00ba38',
                backgroundColor: 'crimson',
                buttonImage: '<img src="/imagens/whatsapp-button.png"/>',
                size: "60px",
                zIndex: 999999
            });
        });
    </script>
</body>

</html>
