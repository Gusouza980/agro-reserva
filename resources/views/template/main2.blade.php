@php
    $agent = new Jenssegers\Agent\Agent();
    $seo = new \App\Classes\Seo();
@endphp

<!doctype html>
<html lang="pt-br" data-theme="light">

<head>

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


    <title>{{ $seo->titulo }}</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="description"
        content="Acesse o site da Agro Reserva e leve os melhores animais, dos principais criatórios do Brasil para a sua fazenda. Experiência humanizada, 100% online e 0% de comissão.">
    <meta name="keywords" content="{{ $seo->tags }}">
    <meta name="author" content="Luis Gustavo de Souza Carvalho">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="visit-token" content="{{ md5(rand(1, 10) . microtime()) }}">
    @include('includes.tags.og')
    <!-- Bootstrap CSS -->
    {{-- <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css"
        integrity="sha512-+EoPw+Fiwh6eSeRK7zwIKG2MA8i3rV/DGa3tdttQGgWyatG/SkncT53KHQaS5Jh9MNOT3dmFL0FjTY08And/Cw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/tw-elements.min.css" />
    <link rel="stylesheet" href="{{ asset('css/main.css') }}?v=2.5" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}?v=1.9" />
    @toastr_css
    @livewireStyles
    @yield('styles')
    @stack('styles')
    <style>
        a,
        a:hover,
        a:focus,
        a:active {
            text-decoration: none;
        }

        [x-cloak] {
            display: none !important;
        }

        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }

        ::-webkit-scrollbar-track {
            background: rgba(128, 128, 128, 0.418);
        }

        ::-webkit-scrollbar-thumb {
            border-radius: 15px;
            border: 3px solid #FFB02A;
            background: #FFB02A;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #FFB02A;
        }
    </style>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/intersect@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://unpkg.com/alpinejs@3.10.2/dist/cdn.min.js"></script>
    <script src="https://unpkg.com/alpinejs-swipe"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    @include('includes.tags.hotjar')
</head>

<body x-data="container" class="bg-[#F5F5F5]">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MRTWDJ5" height="0" width="0"
            style="display:none;visibility:hidden"></iframe>
    </noscript>
    <!-- End Google Tag Manager (noscript) -->
    <div class="w-full" id="app" x-data="{ openSideCart: false }">
        @include('includes.tags.google-ads')
        <x-institucional.barra-topo></x-institucional.barra-topo>
        <x-institucional.navbar></x-institucional.navbar>

        @if ($agent->isMobile())
            <x-institucional.nav-footer></x-institucional.nav-footer>
        @endif

        @if (session()->get('cliente'))
            @livewire('institucional.barra-lateral-carrinho')
        @endif

        @yield('conteudo')

        <x-institucional.footer></x-institucional.footer>
    </div>


    @livewire('institucional.popup-mensagem')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js"
        integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"
        integrity="sha512-IsNh5E3eYy3tr/JiX2Yx4vsCujtkhwl7SLqgnwLNgf04Hrt9BT9SXlLlZlWx+OK4ndzAoALhsMNcCmkggjZB1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/flowbite@1.4.5/dist/flowbite.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
    @toastr_js
    @toastr_render
    @livewireScripts

    @yield('scripts')
    @stack('scripts')
    <script>
        var telefone = '5534997406445';
    </script>
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('container', () => ({
                alpineLoadingFinished: false,
            }))
        })
        window.addEventListener("notificaToastr", (event) => {
            switch (event.detail.tipo) {
                case 'success':
                    toastr.success(event.detail.mensagem)
                    break;
                case 'error':
                    toastr.error(event.detail.mensagem)
            }
        })
    </script>
</body>

</html>
