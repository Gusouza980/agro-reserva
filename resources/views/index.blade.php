@extends('template.main')


@section('conteudo')
    <div class="container-fluid py-5" id="header-index">
        <div class="row py-5">
            <div class="col-12 py-5 text-center text-white text-header-index mt-4">
                <h3>Não somos uma leiloeira, somos o</h3>
                <h2>e-commerce das marcas que evoluem a genética brasileira.</h2>
            </div>
        </div>
        <div class="container">
            <div class="row py-5 justify-content-center">
                @foreach($fazendas as $fazenda)
                    @php
                        $fazenda_bd = \App\Models\Fazenda::where("slug", $fazenda->nm_Slug)->first();
                    @endphp
                    @if($fazenda_bd)
                        <div class="col-12 col-sm-8 col-md-6 col-lg-3 px-0 mt-4 mt-lg-0" style="background: url(/{{$fazenda_bd->fundo_destaque}}); background-size: cover;">
                            <div class="py-3" style="background-color: rgba(0,0,0,0.7)">
                                <div class="container-fluid">
                                    <div class="row justify-content-center">
                                        <div class="col-8 text-center">
                                            <img src="{{asset($fazenda_bd->logo)}}" style="max-width: 100%; max-height: 60px;" alt="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 text-white text-center py-3">
                                            @if($fazenda_bd->data_inicio_reserva < date('Y-m-d H:i:s'))
                                                <span>Iniciará</span>
                                                <h3>{{date("d/m/Y", strtotime($fazenda_bd->data_inicio_reserva))}}</h3>
                                            @else
                                                <span>Terminará</span>
                                                <h3>{{date("d/m/Y", strtotime($fazenda_bd->data_fim_reserva))}}</h3>
                                            @endif
                                        </div>
                                    </div>       
                                    <div class="row">
                                        <div class="col-12 text-center">
                                            <a name="" id="" class="btn btn-vermelho py-2 px-4" href="{{route('fazenda.conheca', ['fazenda' => $fazenda->nm_Slug])}}" role="button">Ver animais a venda</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
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
    <div class="container-fluid bg-white" id="section1-index">
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
            <div class="col-12 px-3 col-md-10 col-lg-8 text-section1-index text-center">
                <span>
                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata                </span>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-cinza" id="section2-index">
        <div class="container">
            <div class="row py-5">
                <div class="col-12 col-lg-6 py-5 text-center text-section2-index">
                    <h2>3% de comissão</h2>
                    <h3>do vendedor</h3>
                </div>
                <div class="col-12 col-lg-6 py-5 text-center text-section2-index">
                    <h2>0% de comissão</h2>
                    <h3>do comprador</h3>
                </div>
            </div>
        </div>
        
    </div>
@endsection