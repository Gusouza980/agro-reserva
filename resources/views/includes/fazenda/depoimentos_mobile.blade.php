<div class="container-fluid">
    <div class="container">

        @foreach($fazenda->depoimentos as $depoimento)
            <div class="row mt-5">
                <div class="col-12 col-lg-5 text-white pl-0 pr-0 pr-md-5">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 px-0 text-section2-fazenda text-center text-md-left">
                                <h2>{{$depoimento->titulo}}</h2>
                            </div>
                        </div>
                        <div class="row py-4">
                            <div class="col-12 px-0 text-section2-fazenda text-justify">
                                <span>{{$depoimento->texto}}</span>
                            </div>
                        </div>
                        <div class="row py-4">
                            <div class="col-12 px-0 text-section2-fazenda text-center text-md-left">
                                <a name="" id="" class="btn btn-vermelho py-2 px-4 mt-3" href="{{route('fazenda.lotes', ['fazenda' => $fazenda->slug])}}" role="button">Ver animais a venda</a>
                            <br class="d-lg-none">
                            <a  href="https://api.whatsapp.com/send?phone=5514981809051" target="_blank" class="btn btn-vermelho ml-lg-4 px-4 py-2 mt-3">Falar com Consultor</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-7 video-container video-container-depoimento mb-5 mb-lg-0">
                    {!! $depoimento->video !!}
                </div>
            </div>
        @endforeach
    </div>
</div>