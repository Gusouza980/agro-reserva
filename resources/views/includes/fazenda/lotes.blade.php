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
                            <h2>{{$fazenda->titulo_conheca_lotes}}</h2>
                        </div>
                    </div>
                    <div class="row py-4 justify-content-center justify-content-lg-start text-center text-md-left">
                        @foreach($fazenda->numeros as $numero)
                            <div class="mr-3 mr-lg-4 mt-3 mt-lg-0 text-center text-section2-fazenda text-center">
                                <h1 class="mb-n1">{{$numero->valor}}</h1>
                                <span>{{$numero->titulo}}</span>
                            </div>
                        @endforeach
                    </div>
                    <div class="row py-4">
                        <div class="col-12 px-0 text-section2-fazenda text-center text-md-left">
                            <a name="" id="" class="btn btn-vermelho py-2 px-4 mt-3" href="{{route('fazenda.lotes', ['fazenda' => $fazenda->slug])}}" role="button">Ver animais à venda</a>
                            <br class="d-lg-none">
                            <a  href="https://api.whatsapp.com/send?phone=5514981809051" target="_blank" class="btn btn-vermelho ml-lg-4 px-4 py-2 mt-3">Falar com Consultor</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-7 video-container video-container-depoimento mb-5 mb-lg-0 px-0">
                {!! $fazenda->video_conheca_lotes !!}
            </div>
        </div>
        
    </div>
</div>