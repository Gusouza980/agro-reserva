@extends('template.main')


@section('conteudo')
    
        <div class="d-flex align-items-center" id="header-index">
            <div class="container-fluid py-5" >
                <div class="row py-5 justify-content-center">
                    @foreach($reservas as $reserva)
                        <div class="px-0 mt-4 mt-lg-0 mx-0 mx-lg-2">
                            <div style="background: url(/{{$reserva->fazenda->fundo_destaque}}); background-size: cover; width: 330px; height: 250px; border-radius: 15px;">
                                <div class="d-flex align-items-center" style="padding: 10px 0px; background-color: rgba(0,0,0,0.9); height: 250px; border-radius: 15px;">
                                    <div class="container-fluid">
                                        <div class="row" style="">
                                            <div class="col-12 text-center">
                                                <img src="{{asset($reserva->fazenda->logo)}}" style="max-width: 100%; height: 80px;" alt="{{$reserva->fazenda->nome}}">
                                            </div>
                                        </div>
                                        <div class="row mt-3" style="">
                                            <div class="col-12 text-center">
                                                <h1 class="text-abertura">Abertura</h1>
                                                <h2 class="data-abertura mt-n2">{{date("d/m/Y", strtotime($reserva->inicio))}}</h2>
                                            </div>
                                        </div>
                                        <div class="row mt-3" style="">
                                            <div class="col-12 text-center">
                                                <a name="" id="" class="btn btn-vermelho py-2 px-4" href="{{route('fazenda.conheca', ['fazenda' => $reserva->fazenda->slug])}}" role="button">Mostrar a Reserva</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    
                </div>
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
                <div class="row mt-2">
                    <div class="col-12 text-center text-white text-header-index">
                        <h4>Conheça o Agro Reserva</h4>
                    </div>
                </div>
            </div>
        </div>
        
        
    </div>
    {{--  <div class="container-fluid bg-preto">
        <div class="row d-flex align-items-center" id="cta1-index">
            <div class="col-12 text-center text-white">
                <h2><a href="{{route('cadastro')}}"><span style="border-bottom: 2px solid #E65454;">Cadastre-se</span></a> para receber ofertas feitas para você.</h2>
            </div>
        </div>
    </div>  --}}
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
                    <div class="row justify-content-center align-items-center mx-0 px-0">
                        <div class="text-viva">
                            <h1>VIVA</h1>
                        </div>
                        <div class="ml-3 text-viva text-center text-lg-left">
                            <h2>a nova era da<br>comercialização<br>de gado.</h2>
                        </div>
                    </div>
                    <div class="row justify-content-center mt-5">
                        <div class="col-12 d-flex justify-content-center text-section1-index video-container text-center">
                            <iframe style="margin: 0 auto; max-width: 700px; max-height: 400px; width: 100%;" src="https://www.youtube.com/embed/klZNNUz4wPQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
                <div class="w1200 mx-auto">
                    <div class="row">
                        <div class="col-12 text-viva text-center text-lg-left mt-5 mt-lg-0">
                            <span>Somos a Agro Reserva. A plataforma digital de comercialização de gado que conecta as grandes marcas produtoras de genética aos compradores do mundo inteiro, 365 dias por ano, 07 dias por semana, 24 horas por dia. Aqui você compra sem pressa, com um atendimento que te acompanha até o pós-venda. Aqui você vende com toda segurança, menor custo promocional e muito mais alcance. Aqui a gente respeita a sua jornada e a sua experiência vale cada @.</span>
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
                                Lorem ipsum dolor sit amet, consetetur sadipscing elitr,<br>sed diam nonumy eirmod tempor invidunt ut labore et<br>dolore magna aliquyam erat, sed diam voluptua. At vero<br>eos et accusam et justo duo dolores et ea rebum. Stet clita<br>kasd gubergren, no sea takimata
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
                        <div class="col-12 text-cta-comissao text-center" style="background: url({{asset('imagens/brush-laranja.png')}}); background-position: center; background-size: cover; background-repeat: no-repeat;">
                            <h1>COMPRE SEM COMISSÃO</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection