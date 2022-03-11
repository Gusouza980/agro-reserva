<div class="container-fluid mt-5 mt-md-0">
    <div class="container">
        @php
            $cont = 0;
        @endphp
        @foreach($fazenda->depoimentos as $depoimento)
            @if($cont % 2 == 0)
                <div class="row mt-5">
                    <div class="col-12 col-lg-5 text-white pl-0 pr-5">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12 px-0 text-section2-fazenda">
                                    <h2>{{$depoimento->titulo}}</h2>
                                </div>
                            </div>
                            <div class="row py-4">
                                <div class="col-12 px-0 text-section2-fazenda text-justify">
                                    <span>{{$depoimento->texto}}</span>
                                </div>
                            </div>
                            <div class="row py-4">
                                <div class="col-12 px-0 text-section2-fazenda">
                                    <a name="" id="" class="btn btn-vermelho py-2 px-4 mt-3" href="{{route('fazenda.lotes', ['fazenda' => $fazenda->slug])}}" role="button">Ver animais à venda</a>
                            <br class="d-lg-none">
                            <a  href="https://api.whatsapp.com/send?phone={{$reserva->telefone_consultor}}" target="_blank" class="btn btn-vermelho ml-lg-4 px-4 py-2 mt-3">Falar com Consultor</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-7 video-container video-container-depoimento mb-5 mb-lg-0">
                        {!! \App\Classes\Util::convertYoutube($depoimento->video) !!}
                    </div>
                </div>
                @php
                    $cont++;
                @endphp
            @else
                <div class="row mt-5">      
                    <div class="col-12 col-lg-7 video-container video-container-depoimento mb-5 mb-lg-0">
                        {!! \App\Classes\Util::convertYoutube($depoimento->video) !!}
                    </div>
                    <div class="col-12 col-lg-5 text-white pl-5 pr-0">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12 px-0 text-section2-fazenda">
                                    <h2>{{$depoimento->titulo}}</h2>
                                </div>
                            </div>
                            <div class="row py-4">
                                <div class="col-12 px-0 text-section2-fazenda">
                                    <span>{{$depoimento->texto}}</span>
                                </div>
                            </div>
                            <div class="row py-4">
                                <div class="col-12 px-0 text-section2-fazenda">
                                    <a name="" id="" class="btn btn-vermelho py-2 px-4" href="{{route('fazenda.lotes', ['fazenda' => $fazenda->slug])}}" role="button">Ver animais à venda</a>
                                    <a href="" class="btn btn-vermelho ml-4 px-4 py-2">Falar com Consultor</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @php
                    $cont++;
                @endphp
            @endif
        @endforeach
    </div>
</div>