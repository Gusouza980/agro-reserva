@extends('template.main')


@section('conteudo')
    
        <div class="d-flex align-items-center" id="header-index">
            <div class="container-fluid py-5" >
                <div class="container mt-auto">
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
                        <div class="ml-3 text-viva">
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
                        <div class="col-12 text-viva">
                            <span>Somos a Agro Reserva. A plataforma digital de comercialização de gado que conecta as grandes marcas produtoras de genética aos compradores do mundo inteiro, 365 dias por ano, 07 dias por semana, 24 horas por dia. Aqui você compra sem pressa, com um atendimento que te acompanha até o pós-venda. Aqui você vende com toda segurança, menor custo promocional e muito mais alcance. Aqui a gente respeita a sua jornada e a sua experiência vale cada @.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid px-0">
        <div class="row mx-0" id="tarja-branca">
            <div class="col-12">
                
            </div>
        </div>
    </div>
    <div class="container-fluid mt-5">
        <div class="container1016">
            <div class="row">
                <div class="col-12 text-center">
                    <h1>
                        Por que comprar? 
                    </h1>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-12 col-lg-6">
                    <div class="row">
                        <div class="col-12 text-center">
                            <img src="{{asset('imagens/no-cash.png')}}" width="70" alt="Sem custo">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12 text-center">
                            <h2>Sem custo inicial</h2>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12 text-center">
                            <p>Você não terá que pagar nada antes que a venda de um lote seja efetuada</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="row">
                        <div class="col-12 text-center">
                            <img src="{{asset('imagens/camera.png')}}" width="70" alt="Sem custo">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12 text-center">
                            <h2>Produção por nossa conta</h2>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12 text-center">
                            <p>Você receberá <b>gratuitamente</b> toda a produção de conteúdo (fotos, vídeos e redação) de alta qualidade.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-12 text-center">
                    <a href="" class="btn btn-vermelho px-4 py-2">Quero vender</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-white" style="position: relative;" id="section1-index">
        <img class="d-none d-xl-block section1-terra" style="position: absolute; left: 0px; bottom: 5%; transform: scaleX(-1);" src="{{asset('imagens/terralateral.png')}}" alt="Terra">
        <img class="d-none d-xl-block section1-terra" style="position: absolute; right: 0px; top: 5%;" src="{{asset('imagens/terralateral.png')}}" alt="Terra">
        <div class="row mt-5 py-5 justify-content-center">
            <div class="col-12 px-3 col-md-10 col-lg-8 text-section1-index text-center">
                <h2>
                    Lorem ipsum dolor sit amet,<br> consetetur sadipscing elitr, sed
                </h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-10 px-3 col-sm-8 col-md-8 col-lg-4 text-section1-index video-container text-center">
                <iframe src="https://www.youtube.com/embed/klZNNUz4wPQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
        <div class="row mt-5 py-5 justify-content-center">
            <div class="col-12 text-section1-index text-center">
                <div class="text-section1-index-div text-section1-index">
                    <span>
                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata                
                    </span>
                </div>
            </div>
        </div>
    </div>
     <div class="container-fluid bg-cinza">
        <div class="row d-flex align-items-center" id="section2-index">
            <div class="col-12">
                <div class="row">
                    <div class="col-12 text-center text-section2-index">
                        <h2>0% de comissão</h2>
                        <h3>do comprador</h3>
                    </div>  
                </div>
                <div class="row mt-4">
                    <div class="col-12 text-center">
                        <a href="" class="btn btn-vermelho px-4 py-2">Descubra Como</a>
                    </div>
                </div>
            </div>
        </div>
    </div> 
@endsection