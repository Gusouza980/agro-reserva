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
            <div class="container-fluid py-5">
                <div class="row" id="row-section1-fazendas">
                    <div class="col-12 text-center text-header-index">
                        <h5>Reservas Encerradas</h5>
                    </div>
                </div>
                <div class="row pb-5 justify-content-center" >
                    @foreach($reservas->sortBy([['fim', 'desc']]) as $reserva)
                        <div data-aos="fade-in" data-aos-duration="500" class="lazy px-0 py-2 mt-4 mt-lg-0 mx-0 mx-lg-2">
                            <div style="background: url(/{{$reserva->fazenda->fundo_destaque}}); background-size: cover; width: 330px; height: 250px; border-radius: 15px;">
                                <div class="d-flex align-items-center card-reserva @if($reserva->aberto) reserva-aberta @else reserva-fechada @endif @if($reserva->aberto && !$reserva->encerrada) reserva-nao-encerrada @endif  @if($reserva->aberto && $reserva->encerrada) reserva-encerrada @endif">
                                    <div class="container-fluid">
                                        <div class="row" style="">
                                            <div class="col-12 text-center">
                                                <img src="{{asset($reserva->fazenda->logo)}}" style="max-width: 100%; @if($reserva->aberto) height: 80px; @else height: 100%; max-height:110px; @endif" alt="{{$reserva->fazenda->nome}}">
                                            </div>
                                        </div>
                                        @if($reserva->aberto)
                                            <div class="row mt-3" style="">
                                                <div class="col-12 text-center">
                                                    @if(!$reserva->encerrada)
                                                        @if(!$reserva->compra_disponivel)
                                                            <h1 class="text-abertura">Inicio em</h1>
                                                            <h2 class="data-abertura mt-n2">{{date("d/m/Y", strtotime($reserva->inicio))}}</h2>
                                                        @else
                                                            <h1 class="text-abertura">Disponível até</h1>
                                                            <h2 class="data-abertura mt-n2">{{date("d/m/Y", strtotime($reserva->fim))}}</h2>
                                                        @endif
                                                    @else
                                                        <h1 class="text-abertura">ENCERRADA</h1>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row mt-3" style="">
                                                <div class="col-12 text-center">
                                                    <a name="" id="" class="btn @if($reserva->encerrada) btn-vermelho-outline @else btn-vermelho @endif py-2 px-4" href="{{route('fazenda.conheca', ['fazenda' => $reserva->fazenda->slug, 'reserva' => $reserva])}}" role="button">Mostrar a Reserva</a>
                                                </div>
                                            </div>
                                            @if($reserva->tarja_vendas)
                                                <div class="tarja-diagonal text-center" style="background-color: #15bd3d; width: 100%; height: 50px; position: absolute; top: 0px; left: -110px; transform: rotate(-45deg);">
                                                    <h5 style="color: white; position: absolute; top: 22px; left: 28.5%; font-size: 10px; font-weight: bold; font-family: Gobold Regular; letter-spacing: 3px;">{{number_format($reserva->tarja_vendas, 0, ",", ".")}}% VENDIDO</h5>
                                                </div>
                                            @endif
                                        @else
                                            @if($reserva->mostrar_datas)
                                                <div class="row mt-4" style="">
                                                    <div class="col-12 text-center">
                                                        
                                                            <h2 class="data-abertura-futura mt-n2">Inicia em {{date("d/m/Y", strtotime($reserva->inicio))}}</h2>
                                                        
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

            </div>
        </div>
@endsection

@section('scripts')
    <script>
        
        $(document).ready(function(){

            $(".video-container").Lazy();

            AOS.init({
                duration: 1200,
            });
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