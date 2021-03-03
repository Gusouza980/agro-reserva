<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-5 text-white pl-0 pr-5">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 px-0 text-section2-fazenda text-center text-md-left">
                            <h4>Conheça a fazenda</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 px-0 text-section2-fazenda text-center text-md-left">
                            <h2>{{$fazenda_bd->titulo_conheca}}</h2>
                        </div>
                    </div>
                    <div class="row py-4">
                        <div class="col-12 px-0 text-section2-fazenda text-center text-md-left">
                            <span>{{$fazenda_bd->texto_conheca}}</span>
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
                {{--  <iframe src="{{$fazenda_bd->video_conheca}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>  --}}
                {!! $fazenda_bd->video_conheca !!}
            </div>
        </div>
        
    </div>
</div>