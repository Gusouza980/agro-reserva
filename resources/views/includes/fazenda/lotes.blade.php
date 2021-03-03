<div class="container-fluid mt-5 mt-md-0">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-5 text-white pl-0 pr-0 pr-md-5">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 px-0 text-section2-fazenda text-center text-md-left">
                            <h4>Nossos lotes</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 px-0 text-section2-fazenda text-center text-md-left">
                            <h2>{{$fazenda_bd->titulo_conheca_lotes}}</h2>
                        </div>
                    </div>
                    <div class="row py-4 text-center text-md-left">
                        <div class="col text-center text-section2-fazenda text-center text-md-left">
                            <h1 class="mb-n1">{{$fazenda_bd->animais_conheca_lotes}}</h1>
                            <span>animais a venda</span>
                        </div>
                        <div class="col ml-4 text-center text-section2-fazenda text-center text-md-left">
                            <h1 class="mb-n1">{{$fazenda_bd->embrioes_conheca_lotes}}</h1>
                            <span>doses de embrião</span>
                        </div>
                        <div class="col ml-4 text-center text-section2-fazenda text-center text-md-left">
                            <h1 class="mb-n1">{{$fazenda_bd->bezerros_conheca_lotes}}</h1>
                            <span>bezerros</span>
                        </div>
                    </div>
                    <div class="row py-4">
                        <div class="col-12 px-0 text-section2-fazenda text-center text-md-left">
                            <a name="" id="" class="btn btn-vermelho py-2 px-4" href="{{route('fazenda.lotes', ['fazenda' => $slug])}}" role="button">Ver animais a venda</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-7 video-container">
                {!! $fazenda_bd->video_conheca_lotes !!}
            </div>
        </div>
        
    </div>
</div>