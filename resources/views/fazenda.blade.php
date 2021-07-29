@extends('template.main')

@section('conteudo')
    @if(url()->current() == route('fazenda.conheca', ['fazenda' => $fazenda->slug]))
        @php
            $background = $fazenda->fundo_conheca;
        @endphp
    @elseif(url()->current() == route("fazenda.conheca.lotes", ['fazenda' => $fazenda->slug]))
        @php
            $background = $fazenda->fundo_conheca_lotes;
        @endphp
    @elseif(url()->current() == route("fazenda.conheca.depoimentos", ['fazenda' => $fazenda->slug]))
        @php
            $background = $fazenda->fundo_conheca_depoimentos;
        @endphp
    @elseif(url()->current() == route("fazenda.conheca.avaliacoes", ['fazenda' => $fazenda->slug]))
        @php
            $background = $fazenda->fundo_conheca_avaliacao;
        @endphp
    @endif

    <div style="background: url(/{{$background}}); background-size: cover;">
        <div class="" style="background-color: rgba(0,0,0,0.5);">
            <div class="container-fluid py-5" id="nav-fazenda">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-3 text-center text-lg-left">
                            <img src="{{asset($fazenda->logo)}}" style="max-width: 100%;" alt="">
                        </div>
                        <div class="col-12 col-md-9 d-none d-lg-flex align-items-center text-white text-nav-fazenda">
                            <a class="@if(url()->current() == route('fazenda.conheca', ['fazenda' => $fazenda->slug])) active @endif" href="{{route('fazenda.conheca', ['fazenda' => $fazenda->slug])}}"><span><span style="border-bottom: 2px solid #FEB000;">Con</span>heça a fazenda</span></a> 
                            <a class="mx-5 @if(url()->current() == route('fazenda.lotes', ['fazenda' => $fazenda->slug])) active @endif" href="{{route('fazenda.lotes', ['fazenda' => $fazenda->slug])}}"><span><span style="border-bottom: 2px solid #FEB000;">Lot</span>es a venda</span> </a>
                        </div>
                        <div class="col-12 d-block d-lg-none">
                            <div class="row">
                                <div class="col-12 text-nav-fazenda text-center mt-4">
                                    <a class="@if(url()->current() == route('fazenda.conheca', ['fazenda' => $fazenda->slug])) active @endif" href="{{route('fazenda.conheca', ['fazenda' => $fazenda->slug])}}"><span><span style="border-bottom: 2px solid #FEB000;">Con</span>heça a fazenda</span></a> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 text-nav-fazenda text-center mt-4">
                                    <a class="mx-5 @if(url()->current() == route('fazenda.lotes', ['fazenda' => $fazenda->slug])) active @endif" href="{{route('fazenda.lotes', ['fazenda' => $fazenda->slug])}}"><span><span style="border-bottom: 2px solid #FEB000;">Lot</span>es a venda</span> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row py-5 justify-content-sm-center justify-content-md-start">
                        <div class="col-12 col-sm-8 col-md-6 col-lg-3 px-0 mt-4 mt-lg-0" style="background: url(/{{$fazenda->miniatura_conheca}}); background-size: cover;">
                            <div class="container-fluid">
                                <div class="row align-items-center div-section1-fazenda @if(url()->current() == route('fazenda.conheca', ['fazenda' => $fazenda->slug])) active @endif" style="background-color: rgba(0,0,0,0.7); height: 190px;">
                                    <div class="col-12 px-3 text-center text-white text-section1-fazenda">
                                        <a href="{{route('fazenda.conheca', ['fazenda' => $fazenda->slug])}}"><h4 class="">Conheça a fazenda</h4></a>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="borda-triangular @if(url()->current() != route('fazenda.conheca', ['fazenda' => $fazenda->slug])) d-none @endif"></div>
                        </div>
                        <div class="d-block d-md-none w-100">
                            @if(url()->current() == route('fazenda.conheca', ['fazenda' => $fazenda->slug])))
                                @include('includes.fazenda.conheca')
                            @endif
                        </div>
                        <div class="col-12 col-sm-8 col-md-6 col-lg-3 px-0 mt-4 mt-lg-0" style="background: url(/{{$fazenda->miniatura_conheca_lotes}}); background-size: cover;">
                            <div class="container-fluid">
                                <div class="row align-items-center div-section1-fazenda @if(url()->current() == route('fazenda.conheca.lotes', ['fazenda' => $fazenda->slug])) active @endif" style="background-color: rgba(0,0,0,0.7); height: 190px;">
                                    <div class="col-12 px-3 text-center text-white text-section1-fazenda">
                                        <a href="{{route('fazenda.conheca.lotes', ['fazenda' => $fazenda->slug])}}"><h4 class="">Nossos Lotes</h4></a>
                                    </div>
                                </div>
                            </div>
                            <div class="borda-triangular @if(url()->current() != route('fazenda.conheca.lotes', ['fazenda' => $fazenda->slug])) d-none @endif"></div>
                        </div>
                        <div class="d-block d-md-none w-100">
                            @if(url()->current() == route("fazenda.conheca.lotes", ['fazenda' => $fazenda->slug]))
                                @include('includes.fazenda.lotes')
                            @endif
                        </div>
                        <div class="col-12 col-sm-8 col-md-6 col-lg-3 px-0 mt-4 mt-lg-0" style="background: url(/{{$fazenda->miniatura_conheca_depoimentos}}); background-size: cover;">
                            <div class="container-fluid">
                                <div class="row align-items-center div-section1-fazenda @if(url()->current() == route('fazenda.conheca.depoimentos', ['fazenda' => $fazenda->slug])) active @endif" style="background-color: rgba(0,0,0,0.7); height: 190px;">
                                    <div class="col-12 px-3 text-center text-white text-section1-fazenda">
                                        <a href="{{route('fazenda.conheca.depoimentos', ['fazenda' => $fazenda->slug])}}"><h4 class="">Depoimentos</h4></a>
                                    </div>
                                </div>
                            </div>
                            <div class="borda-triangular @if(url()->current() != route('fazenda.conheca.depoimentos', ['fazenda' => $fazenda->slug])) d-none @endif"></div>
                        </div>
                        <div class="d-block d-md-none w-100">
                            @if(url()->current() == route("fazenda.conheca.depoimentos", ['fazenda' => $fazenda->slug]))
                                @include('includes.fazenda.depoimentos_mobile')
                            @endif
                        </div>
                        <div class="col-12 col-sm-8 col-md-6 col-lg-3 px-0 mt-4 mt-lg-0" style="background: url(/{{$fazenda->miniatura_conheca_avaliacao}}); background-size: cover;">
                            <div class="container-fluid">
                                <div class="row align-items-center div-section1-fazenda @if(url()->current() == route('fazenda.conheca.avaliacoes', ['fazenda' => $fazenda->slug])) active @endif" style="background-color: rgba(0,0,0,0.7); height: 190px;">
                                    <div class="col-12 px-3 text-center text-white text-section1-fazenda">
                                        <a href="{{route('fazenda.conheca.avaliacoes', ['fazenda' => $fazenda->slug])}}"><h4 class="">Avaliação Agro Reserva</h4></a>
                                    </div>
                                </div>
                            </div>
                            <div class="borda-triangular @if(url()->current() != route('fazenda.conheca.avaliacoes', ['fazenda' => $fazenda->slug])) d-none @endif"></div>
                        </div>
                        <div class="d-block d-md-none w-100">
                            @if(url()->current() == route("fazenda.conheca.avaliacoes", ['fazenda' => $fazenda->slug]))
                                @include('includes.fazenda.avaliacao')
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pb-4">
                <div class="col-12 text-center">
                    <a href="" class="btn btn-vermelho px-4 py-2">Falar com Consultor</a>
                </div>
            </div>
            <div class="w-100 py-4">
                @if(url()->current() == route('fazenda.conheca', ['fazenda' => $fazenda->slug]))
                    @include('includes.fazenda.conheca')
                @elseif(url()->current() == route("fazenda.conheca.lotes", ['fazenda' => $fazenda->slug]))
                    @include('includes.fazenda.lotes')
                @elseif(url()->current() == route("fazenda.conheca.depoimentos", ['fazenda' => $fazenda->slug]))
                    @include('includes.fazenda.depoimentos')
                @elseif(url()->current() == route("fazenda.conheca.avaliacoes", ['fazenda' => $fazenda->slug]))
                    @include('includes.fazenda.avaliacao')
                @endif
            </div>
        </div>
        
    </div>
    

@endsection

@section('scripts')

<script>
    var section = 0;
    function troca_avaliacao(element, num){
        $(element).addClass("active");
        $(element).siblings().removeClass("active");
        //element.addClass('active');
        console.log($(element).parents());
        var cont = 0;
        $(".conteudo-avaliacao").each(function(){
            if(cont == num){
                $(this).css("display", "block");
            }else{
                $(this).css("display", "none");
            }
            cont++;
        })
    }

    $(document).ready(function(){
        $(".link-avaliacao-section2-fazenda").click(function(){
            $(this).siblings().removeClass("active");            
            $(this).addClass("active");
            var novo = $(this).attr("num");
            $(".conteudo-avaliacao[num="+section+"]").hide(0, function(){
                $(".conteudo-avaliacao[num="+novo+"]").show(0);
            });
            section = novo;
        })
    });
</script>
    
@endsection