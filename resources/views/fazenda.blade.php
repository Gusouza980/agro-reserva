@extends('template.main')

@section('conteudo')
    <div style="background: url(/imagens/bg-porangaba.png); background-size: cover;">
        <div style="background-color: rgba(0,0,0,0.5);">
            <div class="container-fluid py-5" id="nav-fazenda">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-3">
                            <img src="{{asset('/imagens/logo-porangaba.png')}}" style="max-width: 100%;" alt="">
                        </div>
                        <div class="col-12 col-md-9 d-flex align-items-center text-white text-nav-fazenda">
                            <a class="@if(url()->current() == route('fazenda.conheca')) active @endif" href="{{route('fazenda.conheca')}}"><span><span style="border-bottom: 2px solid #E65454;">Con</span>heça a fazenda</span></a> 
                            <a class="mx-5 @if(url()->current() == route('fazenda.lotes')) active @endif" href="{{route('fazenda.lotes')}}"><span><span style="border-bottom: 2px solid #E65454;">Lot</span>es a venda</span> </a>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row py-5 justify-content-sm-center justify-content-md-start">
                        <div class="col-12 col-sm-8 col-md-6 col-lg-3 px-0 mt-4 mt-lg-0" style="background: url(/imagens/boi1.jpg); background-size: cover;">
                            <div class="container-fluid">
                                <div class="row align-items-center div-section1-fazenda @if(url()->current() == route('fazenda.conheca')) active @endif" style="background-color: rgba(0,0,0,0.7); height: 190px;">
                                    <div class="col-12 px-3 text-center text-white text-section1-fazenda">
                                        <a href="{{route('fazenda.conheca')}}"><h4 class="">Conheça a fazenda</h4></a>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="borda-triangular @if(url()->current() != route('fazenda.conheca')) d-none @endif"></div>
                        </div>
                        <div class="col-12 col-sm-8 col-md-6 col-lg-3 px-0 mt-4 mt-lg-0" style="background: url(/imagens/boi1.jpg); background-size: cover;">
                            <div class="container-fluid">
                                <div class="row align-items-center div-section1-fazenda @if(url()->current() == route('fazenda.conheca.lotes')) active @endif" style="background-color: rgba(0,0,0,0.7); height: 190px;">
                                    <div class="col-12 px-3 text-center text-white text-section1-fazenda">
                                        <a href="{{route('fazenda.conheca.lotes')}}"><h4 class="">Nossos Lotes</h4></a>
                                    </div>
                                </div>
                            </div>
                            <div class="borda-triangular @if(url()->current() != route('fazenda.conheca.lotes')) d-none @endif"></div>
                        </div>
                        <div class="col-12 col-sm-8 col-md-6 col-lg-3 px-0 mt-4 mt-lg-0" style="background: url(/imagens/boi1.jpg); background-size: cover;">
                            <div class="container-fluid">
                                <div class="row align-items-center div-section1-fazenda @if(url()->current() == route('fazenda.conheca.depoimentos')) active @endif" style="background-color: rgba(0,0,0,0.7); height: 190px;">
                                    <div class="col-12 px-3 text-center text-white text-section1-fazenda">
                                        <a href="{{route('fazenda.conheca.depoimentos')}}"><h4 class="">Depoimentos</h4></a>
                                    </div>
                                </div>
                            </div>
                            <div class="borda-triangular @if(url()->current() != route('fazenda.conheca.depoimentos')) d-none @endif"></div>
                        </div>
                        <div class="col-12 col-sm-8 col-md-6 col-lg-3 px-0 mt-4 mt-lg-0" style="background: url(/imagens/boi1.jpg); background-size: cover;">
                            <div class="container-fluid">
                                <div class="row align-items-center div-section1-fazenda @if(url()->current() == route('fazenda.conheca.avaliacao')) active @endif" style="background-color: rgba(0,0,0,0.7); height: 190px;">
                                    <div class="col-12 px-3 text-center text-white text-section1-fazenda">
                                        <a href="{{route('fazenda.conheca.avaliacao')}}"><h4 class="">Avaliação Agro Reserva</h4></a>
                                    </div>
                                </div>
                            </div>
                            <div class="borda-triangular @if(url()->current() != route('fazenda.conheca.avaliacao')) d-none @endif"></div>
                        </div>
                    </div>
                </div>
            </div>
    
            @if(url()->current() == route("fazenda.conheca"))
                @include('includes.fazenda.conheca')
            @elseif(url()->current() == route("fazenda.conheca.lotes"))
                @include('includes.fazenda.lotes')
            @elseif(url()->current() == route("fazenda.conheca.depoimentos"))
                @include('includes.fazenda.depoimentos')
            @elseif(url()->current() == route("fazenda.conheca.avaliacao"))
                @include('includes.fazenda.avaliacao')
            @endif
        </div>
        
    </div>
    

@endsection

@section('scripts')

<script>
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
            var antigo = $(".link-avaliacao-section2-fazenda.active").attr("num");
            $(this).siblings().removeClass("active");
            $(this).addClass("active");
            var novo = $(this).attr("num");
            $(".conteudo-avaliacao[num="+antigo+"]").hide(0, function(){
                $(".conteudo-avaliacao[num="+novo+"]").show(0);
            });
        })
    });
</script>
    
@endsection