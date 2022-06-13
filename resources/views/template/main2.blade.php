<!doctype html>
<html lang="pt-br">
<head>
    <title>Agroreserva</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    <link rel="stylesheet" href="{{ asset('css/main.css') }}?v=1.6" />
    <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/aos.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/floating-wpp.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"/>
    {{-- <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.5/dist/flowbite.min.css" /> --}}
    @toastr_css
    @livewireStyles
    @yield("styles")
    @stack("styles")
    <style>
        a,
        a:hover,
        a:focus,
        a:active {
            text-decoration: none;
        }
    </style>
    <script defer src="https://unpkg.com/@alpinejs/intersect@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://unpkg.com/alpinejs@3.10.2/dist/cdn.min.js"></script>
</head>

<body x-data="{start: true, mostrarCarrinho: false}">
    <x-institucional.navbar></x-institucional.navbar>
    
    @if(session()->get("cliente"))
        @livewire('institucional.barra-lateral-carrinho')
    @endif
    
    @yield('conteudo')

    <div class="flex justify-content-center" id="footer"
        style="background: url(/imagens/rodape.jpg); background-size: cover; background-position:center; background-repeat: no-repeat;">
        <div class="py-5 row w1400 align-items-center justify-content-between">
            <div class="col-12 text-center">
                <img src="{{ asset('imagens/logo-footer.png') }}" class="mx-auto" style="" alt="">
            </div>
            <div class="mt-5 col-12 col-lg-4 mt-lg-0">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="text-center col-12 text-nav-footer text-lg-left">
                                <a class="" href=" {{ route('index') }}">{{ __('messages.navbar.inicio') }}</a>
                            </div>
                        </div>
                        @if (!session()->get('cliente'))
                            <div class="mt-2 row">
                                <div class="text-center col-12 text-nav-footer text-lg-left">
                                    <a class="" href=" {{ route('cadastro') }}">{{ __('messages.navbar.cadastre_se') }}
                                    </a>
                                </div>
                            </div>
                        @endif
                        <div class="mt-2 row">
                            <div class="text-center col-12 text-nav-footer text-lg-left">
                                <a class="" href=" {{ route('blog') }}">{{ __('messages.navbar.blog') }} </a>
                            </div>
                        </div>
                        <div class="mt-2 row">
                            <div class="text-center col-12 text-nav-footer text-lg-left">
                                <a class="" href=" {{ route('sobre') }}">{{ __('messages.navbar.quem_somos') }} </a>
                            </div>
                        </div>
                        <div class="mt-2 row">
                            <div class="text-center col-12 text-nav-footer text-lg-left">
                                <a class="" href=" {{ route('reservas.finalizadas') }}">{{ __('messages.navbar.reservas_finalizadas') }} </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center col-12 col-lg-4">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="text-center col-12 text-nav-footer text-lg-right">
                                <a class="" href="{{ route('termos') }}">Termos e Condições</a>
                            </div>
                        </div>
                        <div class="mt-2 row">
                            <div class="text-center col-12 text-nav-footer text-lg-right">
                                <a class="" href="{{ route('politicas') }}">Política e Privacidade</a>
                            </div>
                        </div>
                        <div class="mt-2 row">
                            <div class="text-center col-12 text-nav-footer text-lg-right">
                                <a class="" href="{{ route('blog') }}">Clube de Benefícios</a>
                            </div>
                        </div>
                        <div class="mt-2 row">
                            <div class="text-center col-12 text-nav-footer text-lg-right">
                                <a class="" href="{{ route('sobre') }}">Falar com os acessores</a>
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
    <script src="{{ asset('js/app.js') }}"></script>
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
                backgroundColor: '',
                buttonImage: '<img src="/imagens/whatsapp-button.png"/>',
                size: "60px",
                zIndex: 999999
            });
        });
    </script>
</body>

</html>
