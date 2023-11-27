@php
    $agent = new Jenssegers\Agent\Agent;
@endphp

<!doctype html>
<html lang="pt-br">
<head>
    <title>Agroreserva - Cadastro</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
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
        body{
            background-color: #F5F5F5 !important;
        }
        html{
            background-color: #F5F5F5 !important;
        }
        [x-cloak] { display: none !important; }
    </style>
    <script defer src="https://unpkg.com/@alpinejs/intersect@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://unpkg.com/alpinejs@3.10.2/dist/cdn.min.js"></script>
    @include("includes.tags.hotjar")
</head>
<body>
    @include("includes.tags.google-ads")
    <div class="w-full">
        <div class="w-full min-h-[30vh] bg-[#32343E] flex items-center justify-center">
            <img class="max-w-[200px] -mt-[10vh]" src="{{ asset('imagens/logo_agroreserva_leite.svg') }}" alt="">
        </div>
        <div class="w-full bg-[#F5F5F5] px-4 px-md-0 md:px-0">
            {{ $slot }}
        </div>
    </div>
    <script src="{{ asset('js/jquery.js') }}">
    </script>
    {{-- <script src="{{ asset('js/floating-wpp.js') }}"></script> --}}
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" async
        src="https://d335luupugsy2.cloudfront.net/js/loader-scripts/5d649ad8-4f69-4811-ab56-9c2bb4d5f5ea-loader.js">
    </script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://unpkg.com/flowbite@1.4.5/dist/flowbite.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
    <script src="{{ asset('js/jquery.mask.js') }}"></script>
    @toastr_js
    @toastr_render
    @livewireScripts

    @yield("scripts")
    @stack("scripts")

    <script>
        var telefone = '5534997406445';
    </script>
    <script type="text/javascript" async
        src="https://d335luupugsy2.cloudfront.net/js/loader-scripts/5d649ad8-4f69-4811-ab56-9c2bb4d5f5ea-loader.js">
    </script>
    <script>
        window.addEventListener("carregaMascaras", (event) => {
            $(".cpf").mask("000.000.000-00");
            $(".cep").mask("00000-000");
            $(".cnpj").mask("00.000.000/0000-00");
            $(".telefone").mask("(00)90000-0000");
            $(".data").mask('99/99/9999');
        });
    </script>
</body>

</html>
