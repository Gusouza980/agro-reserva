@extends('template.main')

@section('styles')

    <style>
        body {
            background-color: #F2EAD0;
        }

    </style>

@endsection

@section('conteudo')
    @if(false)
        <div class="container-fluid px-0">
            <div id="carouselId" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselId" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselId" data-slide-to="1"></li>
                    <li data-target="#carouselId" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active text-center">
                        <img src="{{asset('imagens/banner1.jpg')}}" class="mx-auto" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('imagens/banner1.jpg')}}" class="mx-auto" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('imagens/banner1.jpg')}}" class="mx-auto" alt="First slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselId" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselId" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    @endif
    <div class="container-fluid px-0">
        <div class="d-flex" id="header-index">
            <div class="container-fluid py-5" id="container-section1">
                @if ($configuracao->live_ativo && $configuracao->live_link)
                    <div class="row mt-5 d-lg-none">
                        <div class="col-12 text-center text-header-index">
                            <h5>DE OLHO NA LIVE</h5>
                        </div>
                    </div>
                    <div class="row justify-content-center mb-5 d-lg-none">
                        <div id="caixa-live">
                            {!! $configuracao->live_link !!}
                        </div>
                    </div>
                @endif
                <div class="row" id="row-section1-text">
                    <div class="col-12 text-center text-header-index">
                        <h3>SEJA<span class="destaque"> BEM-VINDO</span> À PLATAFORMA DE <span
                                class="destaque">COMPRA E <br class="d-none d-lg-block">VENDA</span> DAS MARCAS QUE
                            EVOLUEM <span class="destaque">A PECUÁRIA</span></h3>
                    </div>
                </div>
                @if ($configuracao->live_ativo && $configuracao->live_link)
                    <div class="row mt-5 d-none d-lg-flex">
                        <div class="col-12 text-center text-header-index">
                            <h5>DE OLHO NA LIVE</h5>
                        </div>
                    </div>
                    <div class="row justify-content-center mb-5 d-none d-lg-flex">
                        <div id="caixa-live">
                            {!! $configuracao->live_link !!}
                        </div>
                    </div>
                @endif
                <div class="row pt-5" @if (!$configuracao->live_ativo) id="row-section1-fazendas" @endif>
                    <div class="col-12 text-center text-header-index">
                        <h5>Vitrine de reservas</h5>
                    </div>
                </div>
                <div class="row pb-5 justify-content-center">
                    {{-- @php
                        $first = $reservas->first();
                    @endphp
                    <div id="primeira-reserva" data-aos="fade-in" data-aos-duration="500" class="lazy px-0 py-2 mt-4 mt-lg-0 mx-0 mx-lg-2">
                        <div style="background: url(/{{$first->fazenda->fundo_destaque}}); background-size: cover; width: 330px; height: 250px; border-radius: 15px;">
                            <div class="d-flex align-items-center" style="overflow-y: hidden; overflow-x: hidden; position: relative; box-shadow: 0px 0px 4px white; padding: 10px 0px; background: linear-gradient(180deg, rgba(0,0,0,0.85) 20%, rgba(0,4,1,0) 96%); height: 250px; border-radius: 15px;">
                                <div class="container-fluid">
                                    <div class="row" style="">
                                        <div class="col-12 text-center">
                                            <img src="{{asset($first->fazenda->logo)}}" style="max-width: 100%; height: 80px;" alt="{{$first->fazenda->nome}}">
                                        </div>
                                    </div>
                                    <div class="row mt-3" style="">
                                        <div class="col-12 text-center">
                                            <h1 class="text-abertura">ENCERRADA</h1>
                                            <h2 class="data-abertura mt-n2">{{date("d/m/Y", strtotime($first->fim))}}</h2>
                                        </div>
                                    </div>
                                    <div class="row mt-3" style="">
                                        <div class="col-12 text-center">
                                            <a name="" id="" class="btn btn-vermelho py-2 px-4" href="{{route('fazenda.conheca', ['fazenda' => $first->fazenda->slug])}}" role="button">Mostrar a Reserva</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="tarja-diagonal text-center" style="background-color: #15bd3d; width: 100%; height: 50px; position: absolute; top: 0px; left: -110px; transform: rotate(-45deg);">
                                    <h5 style="color: white; position: absolute; top: 20px; left: 28%; font-size: 12px; font-weight: bold; font-family: Gobold Regular; letter-spacing: 3px;">100% VENDIDO</h5>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    @foreach ($reservas->sortBy([['encerrada', 'asc'], ['inicio', 'asc']]) as $reserva)
                        <div data-aos="fade-in" data-aos-duration="500" class="lazy px-0 py-2 mt-4 mt-lg-0 mx-0 mx-lg-2">
                            <div
                                style="background: url(/{{ $reserva->fazenda->fundo_destaque }}); background-size: cover; width: 330px; height: 250px; border-radius: 15px;">
                                <div class="d-flex align-items-center @if ($reserva->aberto) reserva-aberta @else reserva-fechada @endif @if ($reserva->aberto && !$reserva->encerrada) reserva-nao-encerrada @endif  @if ($reserva->aberto && $reserva->encerrada) reserva-encerrada @endif">
                                    <div class="container-fluid">
                                        <div class="row" style="">
                                            <div class="col-12 text-center">
                                                <img src="{{ asset($reserva->fazenda->logo) }}"
                                                    style="max-width: 100%; 
                                                        @if (($reserva->aberto && !$reserva->encerrada && !$reserva->compra_disponivel) || ($reserva->aberto && !$reserva->encerrada && $reserva->compra_disponivel && $reserva->fim)) 
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
                                                        @if (!$reserva->compra_disponivel)
                                                            <h1 class="text-abertura">Inicio em</h1>
                                                            <h2 class="data-abertura mt-n2">
                                                                {{ date('d/m/Y', strtotime($reserva->inicio)) }}</h2>
                                                        @else
                                                            @if($reserva->fim)
                                                                <h1 class="text-abertura">Disponível até</h1>
                                                                <h2 class="data-abertura mt-n2">
                                                                    {{ date('d/m/Y', strtotime($reserva->fim)) }}</h2>
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

                                                        <h2 class="data-abertura-futura mt-n2">Em breve</h2>

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
                <div id="mouse" class="cpointer">
                    <div class="row">
                        <div class="col-12 text-center text-white">
                            <i class="fas fa-mouse fa-2x"></i>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-center text-white">
                            <i class="fas fa-arrow-down"></i>
                        </div>
                    </div>
                </div>

                <div class="row mt-2 mb-5">
                    <div class="col-12 text-center text-white text-header-index">
                        <h4>Conheça a Agro Reserva</h4>
                    </div>
                </div>
            </div>
        </div>


    </div>
    {{-- <div class="container-fluid bg-preto">
        <div class="row d-flex align-items-center" id="cta1-index">
            <div class="col-12 text-center text-white">
                <h2><a href="{{route('cadastro')}}"><span style="border-bottom: 2px solid #E65454;">Cadastre-se</span></a> para receber ofertas feitas para você.</h2>
            </div>
        </div>
    </div> --}}
    <div class="container-fluid" id="div-brush-amarelo">
        <div class="row">
            <div class="col-12">

            </div>
        </div>
    </div>
    <div class="container-fluid px-0">
        <div class="row px-0 mx-0 align-items-center" id="div-viva">
            <div class="col-12">
                <div class="w800 mx-auto">
                    <div class="row justify-content-center align-items-center py-5 mt-5 mt-lg-0 mx-0 px-0">
                        <div data-aos="fade-in" class="text-viva">
                            <h1>VIVA</h1>
                        </div>
                        <div data-aos="fade-in" class="ml-3 text-viva text-center text-lg-left">
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
                <div data-aos="fade-in" class="w1200 mx-auto">
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
                        <div data-aos="fade-in" class="text-digital text-left text-lg-right">
                            <h1>100% Digital</h1>
                            <h2>100% Pecuária</h2>
                            <h3>100% Com você</h3>
                        </div>
                        <div class="px-3 px-lg-0 ml-lg-4 text-digital text-center text-lg-left">
                            <span data-aos="fade-in">
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
                        <div data-aos="fade-in" class="col-12 text-cta-comissao text-center py-4 py-lg-0"
                            style="background: url({{ asset('imagens/brush-laranja.png') }}); background-position: center; background-size: cover; background-repeat: no-repeat;">
                            <h1>COMPRE SEM COMISSÃO</h1>
                        </div>
                    </div>
                    {{-- <div class="row mt-3">
                        <div class="col-12 text-cta-comissao text-center">
                            <h2 class="cpointer" data-aos="fade-in" data-toggle="modal" data-target="#modalComissao">Consulte condições</h2>
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
    <script>
        $(document).ready(function() {

            $(".video-container").Lazy();

            AOS.init({
                duration: 1200,
            });
            var direction = 1;

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
            loop();

            $("#mouse").click(function() {
                $('html, body').animate({
                    scrollTop: $("#div-brush-amarelo").offset().top
                }, 1000);
            })
        });
    </script>
@endsection
