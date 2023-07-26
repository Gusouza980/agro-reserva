@php
    $agent = new Jenssegers\Agent\Agent;
    $seo = new \App\Classes\Seo;
@endphp

<!doctype html>
<html lang="pt-br" data-theme="light">
<head>
    <title>{{ ($seo->titulo)}}</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="description" content="Acesse o site da Agro Reserva e leve os melhores animais, dos principais criatórios do Brasil para a sua fazenda. Experiência humanizada, 100% online e 0% de comissão.">
    <meta name="keywords" content="{{$seo->tags}}">
    <meta name="author" content="Luis Gustavo de Souza Carvalho">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('includes.tags.og')
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" integrity="sha512-+EoPw+Fiwh6eSeRK7zwIKG2MA8i3rV/DGa3tdttQGgWyatG/SkncT53KHQaS5Jh9MNOT3dmFL0FjTY08And/Cw==" crossorigin="anonymous" referrerpolicy="no-referrer" />{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/tw-elements.min.css" />
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    <link rel="stylesheet" href="{{ asset('css/main.css') }}?v=1.8" />
    {{-- <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}" /> --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}?v=1.1"/>
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
        [x-cloak] { display: none !important; }
    </style>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script defer src="https://unpkg.com/@alpinejs/intersect@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://unpkg.com/alpinejs@3.10.2/dist/cdn.min.js"></script>
    <script src="https://unpkg.com/alpinejs-swipe"></script>
</head>

<body x-data="{start: true}" class="bg-[#F5F5F5]">
    @include("includes.tags.google-ads")
    <x-institucional.barra-topo></x-institucional.barra-topo>
    <x-institucional.navbar></x-institucional.navbar>

    @if($agent->isMobile())
        <x-institucional.nav-footer></x-institucional.nav-footer>
    @endif
    
    @if(session()->get("cliente"))
        @livewire('institucional.barra-lateral-carrinho')
    @endif
    
    @yield('conteudo')

    <x-institucional.footer></x-institucional.footer>

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

    @livewire("institucional.popup-mensagem")

    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" async
        src="https://d335luupugsy2.cloudfront.net/js/loader-scripts/5d649ad8-4f69-4811-ab56-9c2bb4d5f5ea-loader.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js" integrity="sha512-IsNh5E3eYy3tr/JiX2Yx4vsCujtkhwl7SLqgnwLNgf04Hrt9BT9SXlLlZlWx+OK4ndzAoALhsMNcCmkggjZB1w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>    <script src="https://unpkg.com/flowbite@1.4.5/dist/flowbite.js"></script>
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
</body>

</html>
