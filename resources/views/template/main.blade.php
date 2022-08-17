<!doctype html>
<html lang="pt-br">
<head>
    <title>Agroreserva @if(isset($nome_pagina)) - {{ $nome_pagina }}  @endif</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Acesse o site da Agro Reserva e leve os melhores animais, dos principais criatórios do Brasil para a sua fazenda. Experiência humanizada, 100% online e 0% de comissão.">
    <meta name="keywords" content="Gado, Agro, E-commerce, Lotes">
    <meta name="author" content="Luis Gustavo de Souza Carvalho">
    <meta property="og:locale" content="pt_BR">
    <meta property="og:title" content="Agroreserva - Respeito pela sua jornada" />
    <meta property="og:description" content="Somos a plataforma de compra e venda das marcas que evoluem a pecuária">
    <meta property="og:url" content="{{ url()->full() }}" />    
    <meta property="og:site_name" content="Agroreserva @if(session()->get('nome_pagina')) - {{ session()->get('nome_pagina') }}  @endif" >
    <meta property="og:image" itemprop="image"
        content="https://agroreserva.com.br/imagens/logo_agroreserva_leite_min.jpg">
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:width" content="300">
    <meta property="og:image:height" content="200">
    <meta property="og:type" content="website" />
    <meta property="og:updated_time" content="1440432930" />
    <meta name="facebook-domain-verification" content="abk9vvukcc2zjrkcwtq8qncjjfb68f" />
    @yield("metas")
    <link rel="preload" as="style" href="{{ asset('css/main.css') }}?v=1.6.1" />
    <link rel="preload" as="image" href="{{ asset('imagens/bg-home-min-2.jpg') }}" />
    <link rel="preload" href="{{ asset('fontes/gobold/Gobold Regular.otf') }}" as="font" type="font/otf"
        crossorigin />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}?v=1.6.1" />
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
            color: white !important;
            text-decoration: none;
        }
    </style>
    {{-- HOTJAR --}}
    <!-- Hotjar Tracking Code for dev.agroreserva.com.br -->
    <!-- Hotjar Tracking Code for https://agroreserva.com.br -->
    <script>
        (function(h,o,t,j,a,r){
            h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
            h._hjSettings={hjid:2969072,hjsv:6};
            a=o.getElementsByTagName('head')[0];
            r=o.createElement('script');r.async=1;
            r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
            a.appendChild(r);
        })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
    </script>
    <!-- Facebook Pixel Code -->
    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '3943017899141032');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=3943017899141032&ev=PageView&noscript=1" /></noscript>
    <!-- End Facebook Pixel Code -->
</head>

<body>
    <!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-WH89Z553QY"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'G-WH89Z553QY');
	</script>
    {{-- <a class="btn-whats d-sm-block" @if(isset($reserva)) href="https://api.whatsapp.com/send?phone={{$reserva->telefone_consultor}}" @else href="https://api.whatsapp.com/send?phone=5514981809051" @endif target="_blank">
    </a> --}}
    <div class="container-fluid bg-preto" id="container-navbar">
        <div class="container">
            <div class="pt-3 row d-lg-none">
                <div class="text-right text-white col-12">
                    <img onclick="window.location.href = '{{ route('lang.change', [ 'lang' => 'pt_BR']) }}'" class="cpointer @if(App::currentLocale() != "pt_BR") linguagem-inativa @endif" src="{{ asset('imagens/bandeira_brasil.svg') }}" title="Português Brasil" width="20" alt="">
                    <img onclick="window.location.href = '{{ route('lang.change', [ 'lang' => 'es']) }}'" class="cpointer @if(App::currentLocale() != "es") linguagem-inativa @endif ml-2" src="{{ asset('imagens/bandeira_espanha.svg') }}" title="Espanhol" width="20" alt="">
                </div>
            </div>
            <nav class="navbar align-items-center d-lg-none navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="{{ route('index') }}"><img
                        src="{{ asset('imagens/logo_agroreserva_leite.svg') }}" alt="Agroreserva"></a>
                <button class="float-right navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="text-white navbar-toggler-icon"><i class="mt-1 fas fa-bars"></i>

                    </span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="px-5 text-center navbar-nav">
                        @if (session()->get('cliente'))
                            <li class="mt-4 nav-item active">
                                <a class="nav-link" href="{{ route('index') }}">{{ __('messages.navbar.inicio') }}</span></a>
                            </li>
                            <li class="mt-2 nav-item active">
                                <a class="nav-link" href="{{ route('blog') }}">{{ __('messages.navbar.blog') }}</span></a>
                            </li>
                            <li class="mt-2 nav-item active">
                                <a class="nav-link" href="{{ route('sobre') }}">{{ __('messages.navbar.quem_somos') }}</span></a>
                            </li>
                            @if(!isset(session()->get("cliente")["vendedor"]) || !session()->get("cliente")["vendedor"])
                                <li class="mt-2 nav-item active">
                                    <a class="nav-link" href="{{ route('cadastro.vendedor') }}">{{ __('messages.navbar.quero_vender') }}</span></a>
                                </li>
                            @endif
                            <li class="mt-2 nav-item active">
                                <a class="nav-link" href="{{ route('reservas.finalizadas') }}">{{ __('messages.navbar.reservas_finalizadas') }}</span></a>
                            </li>
                            @if (!session()->get('cliente')['finalizado'])
                                <li class="mt-2 nav-item active" id="finalizar-cadastro-mobile">
                                    <a class="nav-link" href="{{ route('cadastro.finalizar') }}">{{ __('messages.navbar.finalizar_cadastro') }}</a>
                                </li>
                            @endif

                            <li class="mt-2 nav-item active">
                                <a class="nav-link" href="{{ route('conta.index') }}">Minha
                                    Conta</span></a>
                            </li>

                            <li class="mt-2 nav-item active">
                                <a class="nav-link" href="{{ route('sair') }}">Sair</span></a>
                            </li>
                        @else
                            <li class="mt-4 nav-item active">
                                <a class="nav-link" href="{{ route('index') }}">{{ __('messages.navbar.inicio') }}</span></a>
                            </li>
                            <li class="mt-2 nav-item active">
                                <a class="nav-link" href="{{ route('blog') }}">{{ __('messages.navbar.blog') }}</span></a>
                            </li>
                            <li class="mt-2 nav-item active">
                                <a class="nav-link" href="{{ route('sobre') }}">{{ __('messages.navbar.quem_somos') }}</span></a>
                            </li>
                            <li class="mt-2 nav-item active">
                                <a class="nav-link" href="{{ route('reservas.finalizadas') }}">{{ __('messages.navbar.reservas_finalizadas') }}</span></a>
                            </li>

                            @if(!isset(session()->get("cliente")["vendedor"]) || !session()->get("cliente")["vendedor"])
                                <li class="mt-2 nav-item active">
                                    <a class="nav-link" href="{{ route('cadastro.vendedor') }}">{{ __('messages.navbar.quero_vender') }}</span></a>
                                </li>
                            @endif
                            <li class="mt-2 nav-item active">
                                <a class="nav-link" href="{{ route('cadastro') }}"
                                    id="cadastre-mobile">{{ __('messages.navbar.cadastre_se') }}</a>
                            </li>
                            <li class="mt-2 nav-item active">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('messages.navbar.entrar') }}</a>
                            </li>
                        @endif
                        @if (session()->get('carrinho'))
                            <li class="mt-2 nav-item active">
                                <a class="nav-link" href="{{ route('carrinho') }}"><i
                                        class="text-white fas fa-shopping-cart"></i></span></a>
                            </li>
                        @endif
                    </ul>
                </div>

            </nav>
            <div class="pt-3 row d-none d-lg-flex">
                <div class="text-right text-white col-12">
                    <img onclick="window.location.href = '{{ route('lang.change', [ 'lang' => 'pt_BR']) }}'" class="cpointer @if(App::currentLocale() != "pt_BR") linguagem-inativa @endif" src="{{ asset('imagens/bandeira_brasil.svg') }}" title="Português Brasil" width="20" alt="">
                    <img onclick="window.location.href = '{{ route('lang.change', [ 'lang' => 'es']) }}'" class="cpointer @if(App::currentLocale() != "es") linguagem-inativa @endif ml-2" src="{{ asset('imagens/bandeira_espanha.svg') }}" title="Espanhol" width="20" alt="">
                </div>
            </div>
            <div class="pb-3 row d-none d-lg-flex">
                <div class="col-lg-3">
                    <a class="navbar-brand" href="{{ route('index') }}"><img
                            src="{{ asset('imagens/logo_agroreserva_leite.svg') }}" alt="Agroreserva"></a>
                </div>
                <div class="text-white col-lg-6 d-flex justify-content-start align-items-center">
                    {{-- <a class="px-5 py-1 mx-3 btn btn-outline-transparente" href="{{route('cadastro.fazenda')}}">Venda</span></a> --}}
                    <span class="text-nav-header"><a href="{{ route('index') }}">{{ __('messages.navbar.inicio') }}</a></span>
                    <span class="ml-4 text-nav-header"><a href="{{ route('blog') }}">{{ __('messages.navbar.blog') }}</a></span>
                    <span class="ml-4 text-nav-header"><a href="{{ route('sobre') }}">{{ __('messages.navbar.quem_somos') }}</a></span>
                    <span class="ml-4 text-nav-header"><a href="{{ route('reservas.finalizadas') }}">{{ __('messages.navbar.reservas_finalizadas') }}</a></span>
                    @if(!session()->get('cliente') || (!isset(session()->get("cliente")["vendedor"]) || !session()->get("cliente")["vendedor"]))
                        <span class="ml-4 text-nav-header"><a href="{{ route('cadastro.vendedor') }}">{{ __('messages.navbar.quero_vender') }}</a></span>
                    @endif
                    {{-- <span  class="text-nav-header"><a href="{{route('cadastro')}}">Como comprar</a></span> --}}
                </div>
                <div class="text-white col-lg-3 d-flex justify-content-end align-items-center">

                    {{-- @if ($_SESSION['userid']) --}}
                    @if (session()->get('cliente'))
                        {{-- Bem vindo @if (isset(session()->get('cliente')['nome_dono'])), {{explode(" ", session()->get("cliente")["nome_dono"])[0]}} @endif --}}
                        @if (!session()->get('cliente')['finalizado'])
                            <span class="ml-3 text-nav-header"><a href="{{ route('cadastro.finalizar') }}"
                                    id="finalizar-cadastro">{{ __('messages.navbar.finalizar_cadastro') }}</a></span>
                        @endif
                        {{-- <span class="cpointer" data-toggle="modal" data-target="#modalPesquisa"><i class="fas fa-search"></i></span> --}}
                        <span class="ml-3 text-nav-header"><a href="{{ route('conta.index') }}"><i class="fas fa-user"></i></a></span>
                        @if (session()->get('cliente'))
                            <span class="ml-3 text-nav-header"><a class="text-nav-header"
                                    href="{{ route('sair') }}"><i class="fas fa-sign-out-alt"></i></a></span>
                        @endif
                        @if (session()->get('carrinho'))
                            <a class="ml-3" href="{{ route('carrinho') }}"><i
                                    class="text-white fas fa-shopping-cart cart-icone"></i></a>
                        @endif
                    @else
                        <span class="text-nav-header">
                            <a href="{{ route('cadastro') }}">{{ __('messages.navbar.cadastre_se') }}</a>
                        </span>
                        <span class="text-nav-header">
                            <a class="ml-4" href="{{ route('login') }}">{{ __('messages.navbar.entrar') }}</a>
                        </span>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div id="espacamento-nav">

    </div>

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

    {{-- <div class="container-fluid fixed-bottom barra-inferior-mobile d-md-none">
        <div class="row justify-content-center align-items-center">
            <div class="flex-row text-center col-12 d-flex justify-content-around align-items-center">
                <div class="mx-3 barra-inferior-mobile-icone fa-lg">
                    <i class="fas fa-home"></i>
                    <p>Início</p>
                </div>
                <div class="mx-3 barra-inferior-mobile-icone fa-lg">
                    <i class="fas fa-blog"></i>
                    <p>Blog</p>
                </div>
                <div class="mx-3 barra-inferior-mobile-icone fa-lg">
                    <i class="fas fa-user"></i>
                    <p>Minha Conta</p>
                </div>
                <div class="mx-3 barra-inferior-mobile-icone fa-lg">
                    <i class="fas fa-shopping-cart"></i>
                    <p>Carrinho</p>
                </div>
                <div class="mx-3 barra-inferior-mobile-icone fa-lg">
                    <i class="fab fa-whatsapp"></i>
                    <p>Contato</p>
                </div>
            </div>
        </div>
    </div> --}}
    {{-- @livewire("site.pesquisa-lotes") --}}
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
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
