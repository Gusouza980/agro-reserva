@extends('template.main2')

@section('styles')
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    <style>
        body {
            background-color: #F2EAD0;
        }

    </style>

@endsection

@section('conteudo')
    <div class="container-fluid" style="background-color: #15171e;">
        <div class="px-0 pb-5 container-fluid" id="header-index">
            {{-- <div class="px-0 py-5 container-fluid" id="container-section1"> --}}
                @if ($configuracao->live_ativo && $configuracao->live_link)
                    <div class="row d-none d-lg-flex">
                        <div id="container-banner-desktop">
                            <img src="{{asset('imagens/banner-live.png')}}" style="width: 100%;" alt="">
                            {!! $configuracao->live_link !!}
                        </div>
                    </div>
                @else
                    <div class="px-0 row">
                        <div id="container-banner-desktop" class="px-0 d-none d-lg-block" style="position: relative; width: 100%;">
                            @php
                                $cont = 0;
                            @endphp
                            @foreach($banners as $banner)
                                @php
                                    $cont = $cont + 1;
                                @endphp
                                <img class="@if($cont == 1) active @endif cpointer" src="{{ asset($banner->caminho) }}" num="{{$cont}}" @if($banner->link) onclick="window.location.href='{{ $banner->link }}'" @endif style="width: 100%; @if($cont != 1) display:none; @endif" alt="">
                            @endforeach
                            <div id="banner-arrow-left"
                                style="position: absolute; left: 30px; top: calc(50%); padding: 7px 10px 5px 10px; background-color: rgba(0,0,0, 0.8); border-radius: 5px; cursor: pointer;">
                                <i class="text-white fas fa-chevron-left fa-lg"></i>
                            </div>
                            <div id="banner-arrow-right"
                                style="position: absolute; right: 30px; top: calc(50%); padding: 7px 10px 5px 10px; background-color: rgba(0,0,0, 0.8); border-radius: 5px; cursor: pointer;">
                                <i class="text-white fas fa-chevron-right fa-lg"></i>
                            </div>
                        </div>
                    </div>
                @endif
                
                <div class="pb-5 row justify-content-center" id="row-cards-fazendas" style="position: relative; z-index: 1;">
                    @if($configuracao->mostrar_lotes_destaque)
						@livewire("slide-lotes-destaque") 
					@endif
                    <div class="mt-5 text-center col-12 text-header-index d-none d-lg-block">
                        <h5>{{ __('messages.home.vitrine_de_reservas') }}</h5>
                    </div>
                    <div class="mx-auto vitrine-animais">
                        <div class="row">
                            <div class="col-12">
                                <div class="slick">
                                    @foreach ($reservas->sortBy([['encerrada', 'asc'], ['inicio', 'asc']]) as $reserva)
                                        <div class="px-0 py-2 mt-4 mr-3 mt-lg-0">
                                            <div
                                                style="background: url(/{{ $reserva->fazenda->fundo_destaque }}); background-size: cover; width: 330px; height: 250px; border-radius: 15px;">
                                                <div class="d-flex align-items-center card-reserva @if ($reserva->aberto) reserva-aberta @else reserva-fechada @endif @if ($reserva->aberto && !$reserva->encerrada) reserva-nao-encerrada @endif  @if ($reserva->aberto && $reserva->encerrada) reserva-encerrada @endif" style="">
                                                    <div class="container-fluid">
                                                        <div class="row" style="">
                                                            <div class="text-center col-12">
                                                                <img class="mx-auto" src="{{ asset($reserva->fazenda->logo) }}" style="max-width: 200px; 
                                                                                @if (($reserva->aberto &&
                                                                !$reserva->encerrada && !$reserva->compra_disponivel) || ($reserva->aberto
                                                                && !$reserva->encerrada && $reserva->compra_disponivel &&
                                                                $reserva->fim))
                                                                height: 80px;
                                                            @else
                                                                height: 100%; max-height:110px;
                                                                @endif"
                                                                alt="{{ $reserva->fazenda->nome }}">
                                                            </div>
                                                        </div>
                                                        @if ($reserva->aberto)
                                                            <div class="mt-3 row" style="">
                                                                <div class="text-center col-12">
                                                                    @if (!$reserva->encerrada)
                                                                        @if ($reserva->mostrar_datas)
                                                                            @if (!$reserva->compra_disponivel)
                                                                                <h1 class="text-abertura">Inicio em</h1>
                                                                                <h2 class="data-abertura mt-n2">
                                                                                    {{ date('d/m/Y', strtotime($reserva->inicio)) }}</h2>
                                                                            @else
                                                                                @if ($reserva->fim)
                                                                                    <h1 class="text-abertura">Disponível até</h1>
                                                                                    <h2 class="data-abertura mt-n2">
                                                                                        {{ date('d/m/Y', strtotime($reserva->fim)) }}</h2>
                                                                                @endif
                                                                            @endif
                                                                        @endif
                                                                    @else
                                                                        <h1 class="text-abertura">ENCERRADA</h1>
                                                                    @endif
                                                                </div>
                                                            </div>
															@if(!$reserva->encerrada)
																<div class="mt-3 row" style="">
																	<div class="text-center col-12">
																		<a name="" id="" class="btn @if ($reserva->encerrada) btn-vermelho-outline @else btn-vermelho @endif py-2 px-4"
																			href="{{ route('fazenda.lotes', ['fazenda' => $reserva->fazenda->slug, 'reserva' => $reserva]) }}"
																			role="button">Mostrar a Reserva</a>
																	</div>
																</div>
															@else
																<div class="mt-2 row" style="">
																	<div class="text-center col-12">
																		<span style="font-family: 'Montserrat', sans-serif; font-size: 20px; color: white; font-weight: semibold;">{{date("m/Y", strtotime($reserva->inicio))}}</span>
																	</div>
																</div>
															@endif
                                                            @if ($reserva->tarja_vendas)
                                                                <div class="text-center tarja-diagonal"
                                                                    style="background-color: #15bd3d; width: 100%; height: 50px; position: absolute; top: 0px; left: -110px; transform: rotate(-45deg);">
                                                                    <h5
                                                                        style="color: white; position: absolute; top: 22px; left: 28.5%; font-size: 10px; font-weight: bold; font-family: Gobold Regular; letter-spacing: 3px;">
                                                                        {{ number_format($reserva->tarja_vendas, 0, ',', '.') }}%
                                                                        VENDIDO
                                                                    </h5>
                                                                </div>
                                                            @endif
                                                        @else
                                                            @if ($reserva->mostrar_datas)
                                                                <div class="mt-4 row" style="">
                                                                    <div class="text-center col-12">
                    
                                                                        <h2 class="data-abertura-futura mt-n2">Inicia em
                                                                            {{ date('d/m/Y', strtotime($reserva->inicio)) }}</h2>
                    
                                                                    </div>
                                                                </div>
                                                            @else
                                                                <div class="mt-4 row" style="">
                                                                    <div class="text-center col-12">
                    
                                                                        <h2 class="data-abertura-futura mt-n2">Aguarde</h2>
                    
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    @php
                        $reserva = null;
                    @endphp
                </div>
                <div class="row justify-content-center pb-lg-0" style="position: relative; z-index: 1;">
                    <div id="mouse" class="text-white cpointer">
                        <i class="fas fa-angle-double-down fa-md"></i>
                    </div>
                    <div class="ml-4 text-center text-white text-header-index">
                        <h4>{{ __('messages.home.conheca_a_agroreserva') }}</h4>
                    </div>
                </div>
            {{-- </div> --}}
        </div>
    </div>
    

    <div class="container-fluid" id="div-brush-amarelo">
        <div class="row">
            <div class="col-12">

            </div>
        </div>
    </div>
    <div class="container-fluid">
        {{-- <div class="row">
            <div class="col-12">
                <button onclick="submitAjax()">TESTE</button>
            </div>
        </div> --}}
        <div class="px-0 mx-0 row align-items-center" id="div-viva">
            <div class="col-12">
                <div class="mx-auto w800">
                    <div class="px-0 py-5 mx-0 mt-5 row justify-content-center align-items-center mt-lg-0">
                        <div class="text-viva">
                            <h1>{{ __('messages.home.viva') }}</h1>
                        </div>
                        <div class="ml-3 text-center text-viva text-lg-left">
                            <h2>{!! __('messages.home.texto_viva') !!}</h2>
                        </div>
                    </div>
                    <div class="py-5 my-3 row justify-content-center">
                        <div
                            class="text-center lazy col-12 d-flex justify-content-center text-section1-index video-container">
                            <iframe loading="lazy" width="1863" height="770" src="https://www.youtube.com/embed/JZaf0PGdYiI"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
                <div class="mx-auto w1200">
                    <div class="row">
                        <div class="pt-3 text-center col-12 text-viva pb-lg-5 mb-lg-5">
                            <span><b>{!! __('messages.home.texto_somos') !!}</b></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="px-0 container-fluid">
        <div class="mx-0 row align-items-center" id="tarja-branca">
            <div class="col-12">
                <div class="mx-auto w1200">
                    <div class="row align-items-center justify-content-center">
                        <div class="text-left text-digital text-lg-right">
                            <h1>100% {!! __('messages.home.digital') !!}</h1>
                            <h2>100% {!! __('messages.home.pecuaria') !!}</h2>
                            <h3>100% {!! __('messages.home.com_voce') !!}</h3>
                        </div>
                        <div class="px-3 text-center px-lg-0 ml-lg-4 text-digital text-lg-left">
                            <span>
                                {!! __('messages.home.texto_ao_seu_lado') !!}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-n5">
        <div class="row align-items-center" id="cta-comissao">
            <div class="col-12">
                <div class="mx-auto w1200">
                    <div class="row">
                        <div class="py-4 text-center col-12 text-cta-comissao py-lg-0"
                            style="background: url({{ asset('imagens/brush-laranja.png') }}); background-position: center; background-size: cover; background-repeat: no-repeat;">
                            <h1>{!! __('messages.gerais.compre_sem_comissao') !!}</h1>
                        </div>
                    </div>
                    {{-- <div class="mt-3 row">
                        <div class="text-center col-12 text-cta-comissao">
                            <h2 class="cpointer" data-toggle="modal" data-target="#modalComissao">Consulte condições</h2>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modalComissao" tabindex="-1" role="dialog" aria-labelledby="modalComissaoTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="text-center col-12 text-red">
                            <h4><b>Como funciona?</b></h4>
                        </div>
                    </div>
                    <div class="px-4 row">
                        <div class="text-left col-12">
                            <p>A Agro Reserva traz benefícios para você, <b>comprador</b>, com <b>descontos progressivos</b>
                                que podem chegar a <b>0% de comissão</b>. Confira! </p>
                            <ul class="mt-3">
                                <li><b>Pague à vista e não pague nada de comissão!</b></li>
                                <li class="mt-2">Pague em até 04 parcelas e concederemos 50% de desconto na sua
                                    comissão.</li>
                                <li class="mt-2">Pague em 05 parcelas ou mais e nós cobraremos apenas 4% de
                                    comissão.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script>
        var num_banners = @if(isset($cont)) {!! $cont !!} @endif;
        var trava = false;

        rotacao_automatica_desktop();

        function submitAjax(){
            var serie = 'RBBG';
            var rgn = '241';
            $.ajax({
                type: "POST",
                url: "https://www.abcz.org.br/produtos-e-servicos/consulta-publica-de-animais-ajax",
                data: {
                    serie: serie,
                    rgn: rgn
                },
                success: function(ret) {
                    console.log(ret);
                },
                error: function(ret) {
                    console.log("Deu muito ruim");
                    console.log(ret);
                }
            });
        }

        function troca_banner(direcao) {
            var atual = $("#container-banner-desktop > img.active");
            if(!trava) {
                var atual_num = atual.attr("num");
                if (direcao == "proximo") {
                    if (atual_num == num_banners) {
                        var prox_num = 1;
                    } else {
                        var prox_num = parseInt(atual_num) + 1;
                    }
                } else {
                    if (atual_num == 1) {
                        var prox_num = num_banners;
                    } else {
                        var prox_num = parseInt(atual_num) - 1;
                    }
                }

                var prox = $("#container-banner-desktop > img[num='" + prox_num + "']");

                atual.removeClass("active");
                prox.addClass("active");
                trava = true;
                atual.fadeOut(400, function() {
                    prox.fadeIn(400, function(){
                        trava = false;
                    });
                });
            }
        }

        function rotacao_automatica_desktop(){
            setTimeout(function(){
                troca_banner("proximo");
                rotacao_automatica_desktop();
            }, 5000);
        }

        $(document).ready(function() {

            $(".caixa-lote-home").hover(function(){
                var span = $(this).children().children()[0];
                $(span).fadeIn(300);
                
            }, function(){
                var span = $(this).children().children()[0];
                $(span).fadeOut(300);
            })

            $("#banner-arrow-left").click(function() {
                troca_banner("anterior");
            });

            $("#banner-arrow-right").click(function() {
                troca_banner("proximo");
            });

            $(".video-container").Lazy();

            AOS.init({
                duration: 1200,
            });
            var direction = 1;
            var direction_mobile = 1;

            function loop() {
                $('#mouse').css("display", "block");
                $('#mouse').css("position", "relative");
                if (direction) {
                    $('#mouse').animate({
                        top: '+5',
                    }, 300, 'linear', function() {
                        direction = 0;
                        loop();
                    });
                } else {
                    $('#mouse').animate({
                        top: '-5',
                    }, 300, 'linear', function() {
                        direction = 1;
                        loop();
                    });
                }
            }

            function loop_mobile() {
                $('#mouse-mobile').css("display", "block");
                $('#mouse-mobile').css("position", "relative");
                if (direction_mobile) {
                    $('#mouse-mobile').animate({
                        top: '+5',
                    }, 300, 'linear', function() {
                        direction_mobile = 0;
                        loop_mobile();
                    });
                } else {
                    $('#mouse-mobile').animate({
                        top: '-5',
                    }, 300, 'linear', function() {
                        direction_mobile = 1;
                        loop_mobile();
                    });
                }
            }

            loop();
            loop_mobile();

            $("#mouse").click(function() {
                $('html, body').animate({
                    scrollTop: $("#div-brush-amarelo").offset().top
                }, 1000);
            });

            $("#mouse-mobile").click(function() {
                $('html, body').animate({
                    scrollTop: $("#row-cards-fazendas").offset().top
                }, 1000);
            });

            $(".slick").slick({

                // normal options...
                slidesToShow: 4,
                infinite: true,
                // dots: true,
                adaptiveHeight: true,
                arrows: true,
                autoplay: true,
                autoplaySpeed: 4000,
                centerMode: false,
                variableWidth: true,
                // the magic
                responsive: [{

                    breakpoint: 1400,
                    settings: {
                        slidesToShow: 4,
                        infinite: true,
                        // dots: true,
                        adaptiveHeight: true,
                        arrows: true,
                        centerMode: true,
                        autoplay: true,
                        autoplaySpeed: 4000,
                    }

                }, {

                    breakpoint: 1030,
                    settings: {
                        slidesToShow: 2,
                        infinite: true,
                        // dots: true,
                        adaptiveHeight: true,
                        arrows: true,
                        autoplay: true,
                        autoplaySpeed: 4000,
                    }

                }, {

                    breakpoint: 760,
                    settings: {
                        slidesToShow: 1,
                        infinite: true,
                        dots: true,
                        adaptiveHeight: true,
                        arrows: true,
                        autoplay: true,
                        autoplaySpeed: 4000,
                    }

                }]
            });
        });
    </script>
@endsection
