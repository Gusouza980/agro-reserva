<!doctype html>
<html lang="pt-br">

<head>
    <title>Agroreserva</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Respeito pela sua jornada">
    <meta name="keywords" content="Gado, Agro, E-commerce, Lotes">
    <meta name="author" content="Luis Gustavo de Souza Carvalho">
    <meta property="og:locale" content="pt_BR">
    <meta property="og:url" content="https://agroreserva.com.br">
    <meta property="og:title" content="Agroreserva - Respeito pela sua jornada">
    <meta property="og:site_name" content="Agroreserva">
    <meta property="og:description" content="Somos a plataforma de compra e venda das marcas que evoluem a pecuária">
    <meta property="og:image" itemprop="image"
        content="https://agroreserva.com.br/imagens/logo_agroreserva_leite_min.jpg">
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:width" content="300">
    <meta property="og:image:height" content="200">
    <meta property="og:type" content="website" />
    <meta property="og:updated_time" content="1440432930" />
    <meta name="facebook-domain-verification" content="abk9vvukcc2zjrkcwtq8qncjjfb68f" />
    @yield("metas")
    <link rel="preload" as="style" href="{{ asset('css/main.css') }}?v=1.3.4" />
    <link rel="preload" as="image" href="{{ asset('imagens/bg-home-min-2.jpg') }}" />
    <link rel="preload" href="{{ asset('fontes/gobold/Gobold Regular.otf') }}" as="font" type="font/otf"
        crossorigin />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}?v=1.3.4" />
    <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/aos.css') }}" />
    @toastr_css
    @yield("styles")
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-MRTWDJ5');
    </script>
    <!-- End Google Tag Manager -->
    {{-- HOTJAR --}}
    <!-- Hotjar Tracking Code for dev.agroreserva.com.br -->
    <script>
        (function(h, o, t, j, a, r) {
            h.hj = h.hj || function() {
                (h.hj.q = h.hj.q || []).push(arguments)
            };
            h._hjSettings = {
                hjid: 2531259,
                hjsv: 6
            };
            a = o.getElementsByTagName('head')[0];
            r = o.createElement('script');
            r.async = 1;
            r.src = t + h._hjSettings.hjid + j + h._hjSettings.hjsv;
            a.appendChild(r);
        })(window, document, 'https://static.hotjar.com/c/hotjar-', '.js?sv=');
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
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MRTWDJ5" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <a class="btn-whats d-sm-block" href="https://api.whatsapp.com/send?phone=5514981809051" target="_blank">
    </a>
    <div class="container-fluid bg-preto">
        <div class="container">
            <nav class="navbar d-block d-lg-none navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="{{ route('index') }}"><img
                        src="{{ asset('imagens/logo_agroreserva_leite.svg') }}" alt="Agroreserva"></a>
                <button class="navbar-toggler float-right" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon text-white"><i class="fas fa-bars"></i>

                    </span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav px-5 text-center">
                        @if (session()->get('cliente'))
                            <li class="nav-item active mt-4">
                                <a class="nav-link" href="{{ route('index') }}">Início</span></a>
                            </li>
                            <li class="nav-item active mt-2">
                                <a class="nav-link" href="{{ route('blog') }}">Blog</span></a>
                            </li>
                            <li class="nav-item active mt-2">
                                <a class="nav-link" href="{{ route('sobre') }}">Quem somos</span></a>
                            </li>
                            <li class="nav-item active mt-2">
                                <a class="nav-link" href="{{ route('reservas.finalizadas') }}">Reservas
                                    Finalizadas</span></a>
                            </li>
                            {{-- <li class="nav-item active mt-2">
                                <a class="nav-link" href="{{route('conta.index')}}">Como comprar</span></a>
                            </li> --}}
                            @if (!session()->get('cliente')['finalizado'])
                                <li class="nav-item active mt-2">
                                    <a class="nav-link" href="{{ route('cadastro.finalizar') }}">Finalizar
                                        Cadastro</span></a>
                                </li>
                            @endif

                            <li class="nav-item active mt-2">
                                <a class="nav-link" href="{{ route('conta.index') }}">Minha
                                    Conta</span></a>
                            </li>

                            <li class="nav-item active mt-2">
                                <a class="nav-link" href="{{ route('sair') }}">Sair</span></a>
                            </li>
                        @else
                            <li class="nav-item active mt-4">
                                <a class="nav-link" href="{{ route('index') }}">Início</span></a>
                            </li>
                            <li class="nav-item active mt-2">
                                <a class="nav-link" href="{{ route('blog') }}">Blog</span></a>
                            </li>
                            <li class="nav-item active mt-2">
                                <a class="nav-link" href="{{ route('sobre') }}">Quem somos</span></a>
                            </li>
                            <li class="nav-item active mt-2">
                                <a class="nav-link" href="{{ route('reservas.finalizadas') }}">Reservas
                                    Finalizadas</span></a>
                            </li>
                            {{-- <li class="nav-item active mt-2">
                                <a class="nav-link" href="{{route('conta.index')}}">Como comprar</span></a>
                            </li> --}}
                            <li class="nav-item active mt-2">
                                <a class="nav-link" href="{{ route('cadastro') }}">Cadastre-se</span></a>
                            </li>
                            <li class="nav-item active mt-2">
                                <a class="nav-link" href="{{ route('login') }}">Entrar</span></a>
                            </li>
                        @endif
                        @if (session()->get('carrinho'))
                            <li class="nav-item active mt-2">
                                <a class="nav-link" href="{{ route('carrinho') }}"><i
                                        class="fas fa-shopping-cart text-white"></i></span></a>
                            </li>
                        @endif
                    </ul>
                </div>

            </nav>
            <div class="row d-none d-lg-flex py-3">
                <div class="col-lg-3">
                    <a class="navbar-brand" href="{{ route('index') }}"><img
                            src="{{ asset('imagens/logo_agroreserva_leite.svg') }}" alt="Agroreserva"></a>
                </div>
                {{-- <div class="col-lg-2 text-left d-flex text-white align-items-center">
=======
            <div class="row d-none d-lg-flex py-3">
                <div class="col-lg-3">
                    <a class="navbar-brand" href="{{ route('index') }}"><img
                            src="{{ asset('imagens/logo_agroreserva_leite.svg') }}" alt="Logo Agroreserva"></a>
                </div>
                {{-- <div class="col-lg-2 text-left d-flex text-white align-items-center">
>>>>>>> f8301a61d66e8b8934bf0dd43fdce91288866136
					<span class="text-nav-header"><a href="{{route('index')}}"><span style="border-bottom: 2px solid #E65454;">Ver</span> todas as reservas</a></span> 
				</div> --}}
                <div class="col-lg-5 d-flex text-white justify-content-start align-items-center">
                    {{-- <a class="btn btn-outline-transparente px-5 py-1 mx-3" href="{{route('cadastro.fazenda')}}">Venda</span></a> --}}
                    <span class="text-nav-header"><a href="{{ route('index') }}">Início</a></span>
                    <span class="text-nav-header ml-4"><a href="{{ route('blog') }}">Blog</a></span>
                    <span class="text-nav-header ml-4"><a href="{{ route('sobre') }}">Quem somos</a></span>
                    <span class="text-nav-header ml-4"><a href="{{ route('reservas.finalizadas') }}">Reservas
                            Finalizadas</a></span>
                    {{-- <span  class="text-nav-header"><a href="{{route('cadastro')}}">Como comprar</a></span> --}}
                </div>
                <div class="col-lg-4 d-flex text-white justify-content-end align-items-center">

                    {{-- @if ($_SESSION['userid']) --}}
                    @if (session()->get('cliente'))
                        {{-- Bem vindo @if (isset(session()->get('cliente')['nome_dono'])), {{explode(" ", session()->get("cliente")["nome_dono"])[0]}} @endif --}}
                        @if (!session()->get('cliente')['finalizado'])
                            <span class="ml-3 text-nav-header"><a href="{{ route('cadastro.finalizar') }}"><span
                                        style="border-bottom: 2px solid #FEB000;">Fin</span>alizar
                                    Cadastro</a></span>
                        @endif
                        <span class="ml-3 text-nav-header"><a href="{{ route('conta.index') }}"><span
                                    style="border-bottom: 2px solid #FEB000;">Min</span>ha conta</a></span> </span>
                        @if (session()->get('cliente'))
                            <span class="ml-3 text-nav-header"><a class="text-nav-header"
                                    href="{{ route('sair') }}"><span
                                        style="border-bottom: 2px solid #FEB000;">Sai</span>r</a></span>
                        @endif
                        @if (session()->get('carrinho'))
                            <a class="ml-4" href="{{ route('carrinho') }}"><i
                                    class="fas fa-shopping-cart text-white cart-icone"></i></span></a>
                        @endif
                    @else
                        <a href="{{ route('cadastro') }}"><span
                                style="border-bottom: 2px solid #FEB000;">Cad</span>astre-se</a>
                        <a class="ml-4" href="{{ route('login') }}"><span
                                style="border-bottom: 2px solid #FEB000;">Ent</span>rar</a>
                    @endif
                    </span>
                </div>
            </div>
        </div>
    </div>

    @yield('conteudo')

    <div class="container-fluid" id="footer"
        style="background: url(/imagens/rodape.jpg); background-size: cover; background-position:center; background-repeat: no-repeat;">
        <div class="row align-items-center py-5">
            <div class="col-12 col-lg-4 text-center">
                <div class="w400 ml-auto mr-auto mr-lg-0">
                    <div class="row">
                        <div class="col-12 px-5 px-lg-0 text-center text-lg-left text-nav-footer">
                            <img src="{{ asset('imagens/logo-footer.png') }}" style="" alt="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mt-5 text-nav-footer text-center text-lg-left">
                            <span><a href="tel:+553433052102">+55 34 3305-2102</a></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-nav-footer text-center text-lg-left">
                            <span>contato@agroreserva.com.br</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-nav-footer text-center text-lg-left">
                            <span>
                                <a href="https://www.instagram.com/agro_reserva/" target="_blank"><i
                                        class="fab fa-instagram fa-lg"></i></a>
                                <a href="https://www.facebook.com/Agro-Reserva-109027191237838" target="_blank"><i
                                        class="fab fa-facebook-square ml-4 fa-lg"></i></a>
                                <a href="https://www.youtube.com/c/AgroReserva" target="_blank"><i
                                        class="fab fa-youtube ml-4 fa-lg"></i></a>
                            </span>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-12 offset-lg-4 col-lg-4 mt-5 mt-lg-0">
                <div class="row">
                    <div class="col-12">
                        <div class="w400 mx-auto">
                            <div class="row">
                                <div class="col-12 text-nav-footer text-center text-lg-left">
                                    <a class="" href=" {{ route('index') }}"><span><span
                                                style="border-bottom: 2px solid #FEB000;">Iní</span>cio</span> </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 text-nav-footer text-center text-lg-left">
                                    <a class="" href=" {{ route('blog') }}"><span><span
                                                style="border-bottom: 2px solid #FEB000;">Blo</span>g</span> </a>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-12 text-nav-footer text-center text-lg-left">
                                    <a class="" href=" {{ route('sobre') }}"><span><span
                                                style="border-bottom: 2px solid #FEB000;">Que</span>m somos</span> </a>
                                </div>
                            </div>
                            {{-- <div class="row mt-2">
                                <div class="col-12 text-nav-footer text-center text-lg-left">
                                    <a class="" href="{{route('cadastro')}}"><span><span style="border-bottom: 2px solid #FEB000;">Com</span>o Comprar</span> </a>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-12 text-nav-footer text-center text-lg-left">
                                    <a class="" href="{{route('cadastro')}}"><span><span style="border-bottom: 2px solid #FEB000;">Clu</span>be de Benefícios</span> </a>
                                </div>
                            </div> --}}
                            @if (!session()->get('cliente'))
                                <div class="row mt-2">
                                    <div class="col-12 text-nav-footer text-center text-lg-left">
                                        <a class="" href=" {{ route('cadastro') }}"><span><span
                                                    style="border-bottom: 2px solid #FEB000;">Cad</span>astre-se</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-12 text-nav-footer text-center text-lg-left">
                                        <a class="" href=" {{ route('login') }}"><span><span
                                                    style="border-bottom: 2px solid #FEB000;">Ent</span>rar</span> </a>
                                    </div>
                                </div>
                            @else
                                @if (!session()->get('cliente')['finalizado'])
                                    <div class="row mt-2">
                                        <div class="col-12 text-nav-footer text-center text-lg-left">
                                            <a class="" href=" {{ route('cadastro.finalizar') }}"><span><span
                                                        style="border-bottom: 2px solid #FEB000;">Fin</span>alizar
                                                    Cadastro</span> </a>
                                        </div>
                                    </div>
                                @endif
                                <div class="row mt-2">
                                    <div class="col-12 text-nav-footer text-center text-lg-left">
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
        <div class="w1200 mx-auto">
            <div class="row py-0 justify-content-center">
                <div class="text-center footer-links">
                    <a href="{{ route('termos') }}" class="px-4 footer-links-superior">Termos e condições de uso</a>
                    |
                    <a href="{{ route('politicas') }}" class="px-4 footer-links-superior">Políticas de
                        Privacidade</a>
                </div>
            </div>
            <div class="row py-2 justify-content-center">
                <div class="text-center footer-links d-none d-lg-block">
                    <span class="px-4 footer-links-superior"><b>Razão Social:</b><span> Agro Reserva Pecuaria Digital
                            LTDA</span></span>
                    |
                    <span class="px-4 footer-links-superior"><b>CNPJ:</b><span> 41.893.302/0001-13</span></span>
                </div>

                <div class="col-12 mt-3 d-flex d-lg-none text-center footer-link-ultimo">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 footer-link-ultimo">
                                <b>Razão Social</b>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 footer-link-ultimo mt-1">
                                <span>Agro Reserva Pecuaria Digital LTDA</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 mt-3 d-flex d-lg-none text-center footer-link-ultimo">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 footer-link-ultimo">
                                <b>CNPJ</b>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 footer-link-ultimo mt-1">
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
                <div class="modal-body modal-body-sucesso text-center py-4">
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
                            <button class="botao-confirma py-2 px-5 mt-4" onclick="fechaModal()">Continuar
                                Navegando</button>
                            <button class="botao-confirma py-2 px-5 mt-4" onclick="fechaModal()">Falar com um
                                consultor</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('js/jquery.js') }}">
    </script>
    <script src="{{ asset('js/aos.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.lazy.min.js') }}"></script>
    <script type="text/javascript" async
        src="https://d335luupugsy2.cloudfront.net/js/loader-scripts/5d649ad8-4f69-4811-ab56-9c2bb4d5f5ea-loader.js">
    </script>
    @toastr_js
    @toastr_render
    @yield("scripts")

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
    <script type="text/javascript" async
        src="https://d335luupugsy2.cloudfront.net/js/loader-scripts/5d649ad8-4f69-4811-ab56-9c2bb4d5f5ea-loader.js">
    </script>
</body>

</html>
