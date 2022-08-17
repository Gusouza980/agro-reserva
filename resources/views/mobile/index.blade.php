@extends('template.main')

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
    <div class="container-fluid d-lg-none" style="background-color: #15171e;">
        <div class="px-0 row">
            <div id="container-banner-mobile" class="carousel slide d-lg-none" data-ride="carousel">
                {{-- <div
                    style="pointer-events: none; position: absolute; bottom:-10px; left:0; width: 100%;background: rgb(0,0,0); background: linear-gradient(0deg, rgba(0,0,0,0.9850315126050421) 20%, rgba(0,212,255,0) 100%); height: 150px; z-index: 5;">

                </div> --}}
                <div class="carousel-inner">
                    @php
                        $first = true;
                    @endphp
                    @foreach($banners as $banner)
                        <div class="carousel-item @if($first) active @endif">
                            <img src="{{asset($banner->caminho_mobile)}}" class="d-block w-100">
                        </div>
                        @php
                            $first = false;
                        @endphp
                    @endforeach
                    {{-- <div class="carousel-item">
                        <img src="{{asset('imagens/banner2-mobile.jpg')}}" class="d-block w-100">
                    </div> --}}
                </div>
                <a class="carousel-control-prev" href="#container-banner-mobile" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#container-banner-mobile" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
    <div class="container-fluid" style="background-color: #15171e;">
        <div class="pb-5 container-fluid" id="header-index">
            <div class="px-0 pb-5 row justify-content-center" id="row-cards-fazendas" style="position: relative; z-index: 1;">
                @if($configuracao->mostrar_lotes_destaque)
					@livewire("slide-lotes-destaque")  
				@endif
                
                <div class="mt-5 text-center col-12 text-header-index">
                    <h5>{{ __('messages.home.vitrine_de_reservas') }}</h5>
                </div>
                <div class="w-100">
                    <div class="row">
                        <div class="px-0 mt-4 col-12">
                            <div class="py-3 slick">
                                @foreach ($reservas->sortBy([['encerrada', 'asc'], ['inicio', 'asc']]) as $reserva)
                                    <div class="px-0 py-2 mx-0 mt-4 mt-lg-0 mx-lg-2 caixa-reserva-home">
                                    {{-- <div data-aos-duration="500" class="px-0 py-2 mx-0 mt-4 lazy mt-lg-0 mx-lg-2"> --}}
                                        <div
                                            style="background: url(/{{ $reserva->fazenda->fundo_destaque }}); background-size: cover; width: 280px; height: 250px; border-radius: 15px;">
                                            <div class="d-flex align-items-center card-reserva @if ($reserva->aberto) reserva-aberta @else reserva-fechada @endif @if ($reserva->aberto && !$reserva->encerrada) reserva-nao-encerrada @endif  @if ($reserva->aberto && $reserva->encerrada) reserva-encerrada @endif" >
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
        
                                                                    <h2 class="data-abertura-futura mt-n2">{{ __('messages.home.aguarde') }}</h2>
        
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
        </div>
    </div>
    

    <div class="container-fluid" id="div-brush-amarelo">
        <div class="row">
            <div class="col-12">

            </div>
        </div>
    </div>
    <div class="container-fluid">
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
                            <h1>100% {{ __('messages.home.digital') }}</h1>
                            <h2>100% {{ __('messages.home.pecuaria') }}</h2>
                            <h3>100% {{ __('messages.home.com_voce') }}</h3>
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
                            <h1>{{ __('messages.gerais.compre_sem_comissao') }}</h1>
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
         @if(isset($cont)) var num_banners = {!! $cont !!} @endif;
        var trava = false;

        $(document).ready(function() {

            $(".caixa-lote-home").hover(function(){
                var span = $(this).children().children()[0];
                $(span).fadeIn(300);
                
            }, function(){
                var span = $(this).children().children()[0];
                $(span).fadeOut(300);
            })

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

            $(".slick").not('.slick-initialized').slick({

                // normal options...
                slidesToShow: 4,
                infinite: true,
                // dots: true,
                adaptiveHeight: true,
                // arrows: true,
                autoplay: true,
                autoplaySpeed: 4000,
                // centerMode: true,
                // the magic
                responsive: [{

                    breakpoint: 760,
                    settings: {
                        slidesToShow: 1,
                        infinite: true,
                        dots: false,
                        adaptiveHeight: true,
                        arrows: false,
                        autoplay: true,
                        autoplaySpeed: 4000,
                        centerMode: true,
                        variableWidth: true
                    }

                }]
            });
        });
    </script>
@endsection
