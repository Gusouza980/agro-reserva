@extends('template.main')

@section("styles")

<style>
    body{
        background-color: #F2EAD0;
    }
</style>

@endsection

@section('conteudo')
    <div class="container-fluid px-0">
        <div class="d-flex" id="header-index">
            <div class="container-fluid py-5" id="container-section1">
                <div class="row" id="row-section1-text">
                    <div class="col-12 text-center text-header-index">
                        <h3><span class="destaque">SOMOS</span> A PLATAFORMA<br>DE <span class="destaque">COMPRA E VENDA</span> DAS MARCAS QUE EVOLUEM <span class="destaque">A PECUÁRIA</span></h3>
                    </div>
                </div>
                <div class="row py-5 justify-content-center" id="row-section1-fazendas">
                    @php
                        $first = $reservas->first();
                    @endphp
                    <div class="px-0 mt-4 mt-lg-0 mx-0 mx-lg-2">
                        <div style="background: url(/{{$first->fazenda->fundo_destaque}}); background-size: cover; width: 330px; height: 250px; border-radius: 15px;">
                            <div class="d-flex align-items-center" style="box-shadow: 0px 0px 4px white; padding: 10px 0px; background: linear-gradient(180deg, rgba(0,0,0,0.85) 20%, rgba(0,4,1,0) 96%); height: 250px; border-radius: 15px;">
                                <div class="container-fluid">
                                    <div class="row" style="">
                                        <div class="col-12 text-center">
                                            <img src="{{asset($first->fazenda->logo)}}" style="max-width: 100%; height: 80px;" alt="{{$first->fazenda->nome}}">
                                        </div>
                                    </div>
                                    <div class="row mt-3" style="">
                                        <div class="col-12 text-center">
                                            <h1 class="text-abertura">Abertura</h1>
                                            <h2 class="data-abertura mt-n2">{{date("d/m/Y", strtotime($first->inicio))}}</h2>
                                        </div>
                                    </div>
                                    <div class="row mt-3" style="">
                                        <div class="col-12 text-center">
                                            <a name="" id="" class="btn btn-vermelho py-2 px-4" href="{{route('fazenda.conheca', ['fazenda' => $first->fazenda->slug])}}" role="button">Mostrar a Reserva</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @foreach($reservas->skip(1) as $reserva)
                        <div class="px-0 mt-4 mt-lg-0 mx-0 mx-lg-2">
                            <div style="background: url(/{{$reserva->fazenda->fundo_destaque}}); background-size: cover; width: 330px; height: 250px; border-radius: 15px;">
                                <div class="d-flex align-items-center" style="padding: 10px 0px; background-color: rgba(0,0,0,0.8); height: 250px; border-radius: 15px;">
                                    <div class="container-fluid">
                                        <div class="row" style="">
                                            <div class="col-12 text-center">
                                                <img src="{{asset($reserva->fazenda->logo)}}" style="max-width: 100%; height: 80px;" alt="{{$reserva->fazenda->nome}}">
                                            </div>
                                        </div>
                                        <div class="row mt-3" style="">
                                            <div class="col-12 text-center">
                                                <h2 class="data-abertura-futura mt-n2">Inicia em {{date("d/m/Y", strtotime($reserva->inicio))}}</h2>
                                            </div>
                                        </div>
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
                
                <div class="row mt-2">
                    <div class="col-12 text-center text-white text-header-index">
                        <h4>Conheça a Agro Reserva</h4>
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
                    <div class="row justify-content-center align-items-center py-5 mt-5 mt-lg-0 mx-0 px-0">
                        <div class="text-viva">
                            <h1>VIVA</h1>
                        </div>
                        <div class="ml-3 text-viva text-center text-lg-left">
                            <h2>a nova era da<br>comercialização<br>de gado.</h2>
                        </div>
                    </div>
                    <div class="row justify-content-center my-3 py-5">
                        <div class="col-12 d-flex justify-content-center text-section1-index video-container text-center">
                            <iframe width="1280" height="720" src="https://www.youtube.com/embed/PFnjbweEEew" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
                <div class="w1200 mx-auto">
                    <div class="row">
                        <div class="col-12 text-viva text-center pt-3 pb-lg-5 mb-lg-5">
                            <span>Somos a Agro Reserva. A plataforma digital de comercialização de gado que conecta as grandes marcas produtoras de genética aos compradores do mundo inteiro, 365 dias por ano, 07 dias por semana, 24 horas por dia.</span>
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
                                Aqui você compra sem pressa, com um atendimento que te<br>acompanha até o pós-venda. Aqui você vende com toda<br>segurança, menor custo promocional e muito mais alcance.<br>Aqui a gente respeita a sua jornada e a sua experiência<br>vale cada @.
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
                        <div class="col-12 text-cta-comissao text-center py-4 py-lg-0" style="background: url({{asset('imagens/brush-laranja.png')}}); background-position: center; background-size: cover; background-repeat: no-repeat;">
                            <h1>COMPRE SEM COMISSÃO</h1>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12 text-cta-comissao text-center">
                            <h2>Consulte condições</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            var direction = 1;
            function loop() {
                $('#mouse').css("display", "block");
                $('#mouse').css("position", "relative");
                if(direction){
                    $('#mouse').animate ({
                        top: '+5',
                    }, 300, 'linear', function() {
                        direction = 0;
                        loop();
                    });
                }else{
                    $('#mouse').animate ({
                        top: '-5',
                    }, 300, 'linear', function() {
                        direction = 1;
                        loop();
                    });
                }
            }
            loop();

            $("#mouse").click(function(){
                $('html, body').animate({ scrollTop: $("#div-brush-amarelo").offset().top }, 1000);
            })
        });
    </script>
@endsection