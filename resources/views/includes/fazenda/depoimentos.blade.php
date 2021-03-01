<div class="container-fluid">
    <div class="container">
        @php
            $cont = 0;
        @endphp
        @foreach($fazenda_bd->depoimentos as $depoimento)
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
                                <div class="col-12 px-0 text-section2-fazenda">
                                    <span>{{$depoimento->texto}}</span>
                                </div>
                            </div>
                            <div class="row py-4">
                                <div class="col-12 px-0 text-section2-fazenda">
                                    <a name="" id="" class="btn btn-vermelho py-2 px-4" href="{{route('fazenda.lotes', ['fazenda' => $slug])}}" role="button">Ver animais a venda</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-7 video-container">
                        {!! $depoimento->video !!}
                    </div>
                </div>
                @php
                    $cont++;
                @endphp
            @else
                <div class="row mt-5">      
                    <div class="col-12 col-lg-7 video-container">
                        {!! $depoimento->video !!}
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
                                    <a name="" id="" class="btn btn-vermelho py-2 px-4" href="{{route('fazenda.lotes', ['fazenda' => $slug])}}" role="button">Ver animais a venda</a>
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