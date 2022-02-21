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
    <div class="container-fluid d-lg-none" style="background-color: black;">
        <div class="row px-0">
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
    <div class="container-fluid" style="background-color: black;">
        <div class="container-fluid pb-5" id="header-index">
            <div class="row pb-5 justify-content-center" id="row-cards-fazendas" style="position: relative; z-index: 1;">
                @if($configuracao->mostrar_lotes_destaque)
                    <div class="col-12 text-center text-header-index d-lg-block mt-5 mt-lg-0">
                        <h5>Vitrine de animais</h5>
                    </div>
                    <div class="vitrine-animais mt-4">
                        <div class="row">
                            <div class="col-12">
                                <div class="slick">
                                    @foreach ($lotes_destaque as $lote)
                                        <div class="px-0 py-2 mt-4 caixa-lote-home cpointer" onclick="window.location.href = '{{route('fazenda.lote', ['fazenda' => $lote->reserva->fazenda->slug, 'lote' => $lote])}}'">
                                            {{-- <div data-aos-duration="500" class="lazy px-0 py-2 mt-4 mt-lg-0 mx-0 mx-lg-2"> --}}
                                            <div class=""
                                                style="background: url({{ asset($lote->preview) }}); background-size: cover; background-position: center; width: 350px; height: 250px; border-radius: 15px; position: relative; overflow: hidden;">
                                                <div class="text-center justify-content-center align-items-center lote-home-hover" style="position: absolute; bottom: 0px; left: 0px; width: 100%; height: 50px; background-color: rgba(232,82,29,0.85); display:none; ">
                                                    <p style="margin-top: 12px;">Ver lote</p>
                                                </div>
                                            </div>
                                            <div class="row px-4 mt-3 align-items-start justify-content-start">
                                                <div class="caixa-lote-home-logo">
                                                    <img src="{{ asset($lote->fazenda->logo) }}" alt="">
                                                </div>
                                                <div class="ml-4">
                                                    <div class="d-flex justify-content-start align-items-center">
                                                        <div>
                                                            <button class="badge-lote-home">LOTE {{str_pad($lote->numero, 2, "0", STR_PAD_LEFT)}}@if($lote->letra){{$lote->letra}}@endif</button>
                                                        </div>
                                                        @if($lote->registro)
                                                            <div class="ml-3 lote-home-rgd">
                                                                RGD: {{$lote->registro}}
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="caixa-lote-home-text text-left">
                                                        <span>{{ $lote->reserva->desconto }}% de desconto no<br>pagamento à vista</span>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            @if($lote->texto_destaque)
                                                <div class="row pl-5 mt-3 align-items-center">
                                                    <div class="lote-home-texto-destaque">
                                                        <span>{{$lote->texto_destaque}}</span>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>  
                @endif
                
                <div class="col-12 text-center text-header-index mt-5">
                    <h5>Vitrine de reservas</h5>
                </div>
                <div class="col-12 mt-4">
                    <div class="slick">
                        @foreach ($reservas->sortBy([['encerrada', 'asc'], ['inicio', 'asc']]) as $reserva)
                            <div class="px-0 py-2 mt-4 mt-lg-0 mx-0 mx-lg-2 caixa-reserva-home">
                            {{-- <div data-aos-duration="500" class="lazy px-0 py-2 mt-4 mt-lg-0 mx-0 mx-lg-2"> --}}
                                <div
                                    style="background: url(/{{ $reserva->fazenda->fundo_destaque }}); background-size: cover; width: 330px; height: 250px; border-radius: 15px;">
                                    <div class="d-flex align-items-center @if ($reserva->aberto) reserva-aberta @else reserva-fechada @endif @if ($reserva->aberto && !$reserva->encerrada) reserva-nao-encerrada @endif  @if ($reserva->aberto && $reserva->encerrada) reserva-encerrada @endif" style="box-shadow: 0px 0px 4px white;">
                                        <div class="container-fluid">
                                            <div class="row" style="">
                                                <div class="col-12 text-center">
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
                                                <div class="row mt-3" style="">
                                                    <div class="col-12 text-center">
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
                                                <div class="row mt-3" style="">
                                                    <div class="col-12 text-center">
                                                        <a name="" id="" class="btn @if ($reserva->encerrada) btn-vermelho-outline @else btn-vermelho @endif py-2 px-4"
                                                            href="{{ route('fazenda.lotes', ['fazenda' => $reserva->fazenda->slug]) }}"
                                                            role="button">Mostrar a Reserva</a>
                                                    </div>
                                                </div>
                                                @if ($reserva->tarja_vendas)
                                                    <div class="tarja-diagonal text-center"
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
                                                    <div class="row mt-4" style="">
                                                        <div class="col-12 text-center">

                                                            <h2 class="data-abertura-futura mt-n2">Inicia em
                                                                {{ date('d/m/Y', strtotime($reserva->inicio)) }}</h2>

                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="row mt-4" style="">
                                                        <div class="col-12 text-center">

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
                @php
                    $reserva = null;
                @endphp
            </div>
            <div class="row justify-content-center pb-lg-0" style="position: relative; z-index: 1;">
                <div id="mouse" class="cpointer text-white">
                    <i class="fas fa-angle-double-down fa-md"></i>
                </div>
                <div class="text-center text-white text-header-index ml-4">
                    <h4>Conheça a Agro Reserva</h4>
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
        <div class="row px-0 mx-0 align-items-center" id="div-viva">
            <div class="col-12">
                <div class="w800 mx-auto">
                    <div class="row justify-content-center align-items-center py-5 mt-5 mt-lg-0 mx-0 px-0">
                        <div class="text-viva">
                            <h1>VIVA MOBILE</h1>
                        </div>
                        <div class="ml-3 text-viva text-center text-lg-left">
                            <h2>a nova era da<br>comercialização<br>de gado.</h2>
                        </div>
                    </div>
                    <div class="row justify-content-center my-3 py-5">
                        <div
                            class="lazy col-12 d-flex justify-content-center text-section1-index video-container text-center">
                            <iframe loading="lazy" width="1863" height="770" src="https://www.youtube.com/embed/JZaf0PGdYiI"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
                <div class="w1200 mx-auto">
                    <div class="row">
                        <div class="col-12 text-viva text-center pt-3 pb-lg-5 mb-lg-5">
                            <span><b>Somos a Agro Reserva, a evolução do seu modelo de negócios dentro da pecuária.
                                    Modernidade sem perder a tradição, facilidade com todas as garantias, diferente de tudo
                                    que você já viu.</b></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid px-0">
        <div class="row align-items-center mx-0" id="tarja-branca">
            <div class="col-12">
                <div class="w1200 mx-auto">
                    <div class="row align-items-center justify-content-center">
                        <div class="text-digital text-left text-lg-right">
                            <h1>100% Digital</h1>
                            <h2>100% Pecuária</h2>
                            <h3>100% Com você</h3>
                        </div>
                        <div class="px-3 px-lg-0 ml-lg-4 text-digital text-center text-lg-left">
                            <span>
                                Estamos ao seu lado em cada etapa de compra e venda.<br>A agilidade da tecnologia digital
                                amparada por um atendimento<br>próximo, humanizado e completo. Uma caminhada onde você
                                nunca<br>estará sozinho, novos rumos, novas experiências,<br>novas conquistas
                                compartilhadas. Vem com a gente!
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
                <div class="w1200 mx-auto">
                    <div class="row">
                        <div class="col-12 text-cta-comissao text-center py-4 py-lg-0"
                            style="background: url({{ asset('imagens/brush-laranja.png') }}); background-position: center; background-size: cover; background-repeat: no-repeat;">
                            <h1>COMPRE SEM COMISSÃO</h1>
                        </div>
                    </div>
                    {{-- <div class="row mt-3">
                        <div class="col-12 text-cta-comissao text-center">
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
                        <div class="col-12 text-center text-red">
                            <h4><b>Como funciona?</b></h4>
                        </div>
                    </div>
                    <div class="row px-4">
                        <div class="col-12 text-left">
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
