<div style="background: url(/{{$fazenda->fundo_conheca_lotes}}); background-size: cover;" id="containerzao" style="min-height: 100vh;">
    <div class="" style="background-color: rgba(0,0,0,0.5);">
        <div class="container-fluid py-5" id="nav-fazenda">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-3 text-center text-lg-left">
                        <img src="{{asset($fazenda->logo)}}" style="max-width: 100%;" alt="">
                    </div>
                    <div class="col-12 d-block d-lg-none">
                        <div class="row">
                            <div class="col-12 text-nav-fazenda text-center mt-4">
                                <a class="@if(url()->current() == route('fazenda.conheca', ['fazenda' => $fazenda->slug, 'reserva' => $reserva])) active @endif" href="{{route('fazenda.conheca', ['fazenda' => $fazenda->slug, 'reserva' => $reserva])}}"><span><span style="border-bottom: 2px solid #FEB000;">Con</span>heça a fazenda</span></a> 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 text-nav-fazenda text-center mt-4">
                                <a class="mx-5 @if(url()->current() == route('fazenda.lotes', ['fazenda' => $fazenda->slug, 'reserva' => $reserva])) active @endif" href="{{route('fazenda.lotes', ['fazenda' => $fazenda->slug, 'reserva' => $reserva])}}"><span><span style="border-bottom: 2px solid #FEB000;">Lot</span>es a venda</span> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row pt-5">
                    <div class="col-12">
                        <a href="{{route('index')}}"><span style="color: #E8521B !important; font-size: 16px; font-family: 'Montserrat', sans-serif; font-weight: bold;"><i class="fas fa-arrow-left mr-2"></i> Voltar</span></a>
                    </div>
                </div>
                <div class="row py-5 justify-content-sm-center justify-content-md-start">
                    <div class="col-12 col-lg-3 px-0 mt-4 mt-lg-0" id="col-pagina-0" style="background: url(/{{$fazenda->miniatura_conheca}}); background-size: cover; background-position: center;">
                        <div class="container-fluid">
                            <div class="row align-items-center div-section1-fazenda @if($pagina == 0) active @endif" @if($pagina != 0) onclick="trocaPagina(0)" @endif style="background-color: rgba(0,0,0,0.6); height: 190px;">
                                <div class="col-12 px-3 text-center text-white text-section1-fazenda">
                                    <a><h4 class="">Conheça a fazenda</h4></a>
                                </div>
                                
                            </div>
                        </div>
                        <div class="borda-triangular @if(!($pagina == 0)) d-none @endif"></div>
                    </div>
                    <div class="w-100" @if($pagina == 0) id="pagina-atual" @endif>
                        @if($pagina == 0)
                            @include('includes.fazenda.conheca')
                        @endif
                    </div>
                    <div class="col-12 col-lg-3 px-0 mt-4 mt-lg-0" id="col-pagina-1" style="background: url(/{{$fazenda->miniatura_conheca_lotes}}); background-size: cover; background-position: center; ">
                        <div class="container-fluid">
                            <div class="row align-items-center div-section1-fazenda @if($pagina == 1) active @endif" @if($pagina != 1) onclick="trocaPagina(1)" @endif  style="background-color: rgba(0,0,0,0.6); height: 190px;">
                                <div class="col-12 px-3 text-center text-white text-section1-fazenda">
                                    <a><h4 class="">Nossos Lotes</h4></a>
                                </div>
                            </div>
                        </div>
                        <div class="borda-triangular @if(!($pagina == 1)) d-none @endif"></div>
                    </div>
                    <div class="w-100" @if($pagina == 1) id="pagina-atual" @endif style="display: none;">
                        @if($pagina == 1)
                            @include('includes.fazenda.lotes')
                        @endif
                    </div>
                    <div class="col-12 col-lg-3 px-0 mt-4 mt-lg-0" id="col-pagina-2" style="background: url(/{{$fazenda->miniatura_conheca_depoimentos}}); background-size: cover; background-position: center; ">
                        <div class="container-fluid">
                            <div class="row align-items-center div-section1-fazenda @if($pagina == 2) active @endif" @if($pagina != 2) onclick="trocaPagina(2)" @endif  style="background-color: rgba(0,0,0,0.6); height: 190px;">
                                <div class="col-12 px-3 text-center text-white text-section1-fazenda">
                                    <a><h4 class="">Depoimentos</h4></a>
                                </div>
                            </div>
                        </div>
                        <div class="borda-triangular @if(!($pagina == 2)) d-none @endif"></div>
                    </div>
                    <div class="w-100" @if($pagina == 2) id="pagina-atual" @endif style="display: none;">
                        @if($pagina == 2)
                            @include('includes.fazenda.depoimentos_mobile')
                        @endif
                    </div>
                    <div class="col-12 col-lg-3 px-0 mt-4 mt-lg-0" id="col-pagina-3" style="background: url(/{{$fazenda->miniatura_conheca_avaliacao}}); background-size: cover; background-position: center; ">
                        <div class="container-fluid">
                            <div class="row align-items-center div-section1-fazenda @if($pagina == 3) active @endif" @if($pagina != 3) onclick="trocaPagina(3)" @endif style="background-color: rgba(0,0,0,0.6); height: 190px;">
                                <div class="col-12 px-3 text-center text-white text-section1-fazenda">
                                    <a><h4 class="">Avaliação Agro Reserva</h4></a>
                                </div>
                            </div>
                        </div>
                        <div class="borda-triangular @if(!($pagina == 3)) d-none @endif"></div>
                    </div>
                    <div class="w-100" @if($pagina == 3) id="pagina-atual" @endif style="display: none;">
                        @if($pagina == 3)
                            @livewire('fazenda.institucional.avaliacao', ["fazenda" => $fazenda, "reserva" => $reserva])
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @if($reserva->multi_fazendas)
            <div class="container" wire:ignore>
                <div class="row">
                    <div class="col-12">
                        <div class="slick">
                            @foreach($fazendas as $faz)
                                <div>
                                    <a>
                                        <div class="slide2-item-container">
                                            <div class="slide2-item d-flex justify-items-center align-items-center" width="160" height="160">
                                                <img src="{{asset($faz->logo)}}" style="max-width: 100%; width: 130px; filter: contrast(0%);">
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
            
                    </div>
                </div>
            </div>
        @endif
    </div>
    
</div>

@push('scripts')

<script>
    window.addEventListener('mostraConteudo', event => {
        $("#pagina-atual").slideDown(0, function(){
        });
    });
    

    function trocaPagina(pagina){
        $("#pagina-atual").slideUp(0, function(){
            Livewire.emit("trocarPagina", pagina);
        })
    }
</script>

@endpush