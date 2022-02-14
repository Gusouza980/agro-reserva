@extends('template.main')

@section('styles')
    <style>
        body {
            background-color: #F2F2F2;
        }

    </style>
@endsection

@section('conteudo')
    <div class="" style=" background: url(/{{ $fazenda->fundo_conheca_lotes }}); background-size: cover;
        background-position: center;">
        <div class="pb-5" style="background-color: rgba(0,0,0,0.5);">
            <div class="container-fluid py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-3">
                            <img src="{{ asset($fazenda->logo) }}" style="max-width: 100%;" alt="">
                        </div>
                        <div class="col-12 col-md-9 d-none d-lg-flex align-items-center text-white text-nav-fazenda">
                            @if($reserva->institucional)
                                <a class="@if (url()->current() == route('fazenda.conheca', ['fazenda' => $fazenda->slug])) active @endif"
                                    href="{{ route('fazenda.conheca', ['fazenda' => $fazenda->slug]) }}"><span><span
                                            style="border-bottom: 2px solid #FEB000;">Con</span>heça a fazenda</span></a>
                            @endif
                            <a class="mx-5 @if (url()->current() == route('fazenda.lotes', ['fazenda' => $fazenda->slug])) active @endif"
                                href="{{ route('fazenda.lotes', ['fazenda' => $fazenda->slug]) }}"><span><span
                                        style="border-bottom: 2px solid #FEB000;">Lot</span>es à venda</span> </a>
                        </div>
                        <div class="col-12 d-block d-lg-none">
                            @if($reserva->institucional)
                                <div class="row">
                                    <div class="col-12 text-nav-fazenda text-center mt-4">
                                        <a class="@if (url()->current() == route('fazenda.conheca', ['fazenda' => $fazenda->slug])) active @endif"
                                            href="{{ route('fazenda.conheca', ['fazenda' => $fazenda->slug]) }}"><span><span
                                                    style="border-bottom: 2px solid #FEB000;">Con</span>heça a
                                                fazenda</span></a>
                                    </div>
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-12 text-nav-fazenda text-center mt-4">
                                    <a class="mx-5 @if (url()->current() == route('fazenda.lotes', ['fazenda' => $fazenda->slug])) active @endif"
                                        href="{{ route('fazenda.lotes', ['fazenda' => $fazenda->slug]) }}"><span><span
                                                style="border-bottom: 2px solid #FEB000;">Lot</span>es a venda</span> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid py-5">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-8 text-center text-cadastro-lotes">
                        <h1>Conheça nossos lotes</h1>
                    </div>
                </div>
            </div>
            <div class="w1200 mx-auto">
                <div class="row">
                    <div class="col-12 text-center text-cta-comissao-lotes">
                        <h2>RESERVA</h2>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="text-cta-comissao-lotes text-center py-4 px-5 py-lg-0"
                        style="background: url({{ asset('imagens/brush-laranja.png') }}); background-position: center; background-size: contain; background-repeat: no-repeat;">
                        <h1> 0% de comissão </h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-center text-cta-comissao-lotes">
                        <h2>COMPRADOR</h2>
                    </div>
                </div>
                {{-- <div class="row mt-3">
                    <div class="col-12 text-cta-comissao text-center">
                        <h2 class="cpointer" data-aos="fade-in" data-toggle="modal" data-target="#modalComissao">Consulte condições</h2>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    <div class="w1200 mx-auto py-5">
        <div class="row">
            <div
                class="col-12 col-lg-8 justify-content-center justify-content-lg-start text-center text-lg-left align-items-center text-lotes d-flex">
                <h3>Reserva {{ $fazenda->nome_fazenda }}</h3>
            </div>
            <div class="col-12 col-lg-4 text-center text-lg-right" id="filtro-racas">
                <a class="link-filtro-racas cpointer ativo" raca="0">Todos</a>
                @foreach($lotes->unique("raca_id") as $lote)
                    <a class="link-filtro-racas ml-3 cpointer" raca="{{$lote->raca->id}}">{{$lote->raca->nome}}</a>
                @endforeach
            </div>
        </div>
        <div class="row py-4">
            <div class="col-12">
                <a href="{{ route('index')}}"><span
                        style="color: #E8521B !important; font-size: 16px; font-family: 'Montserrat', sans-serif; font-weight: bold;"><i
                            class="fas fa-arrow-left mr-2"></i> Voltar</span></a>

            </div>
        </div>
        <div class="row justify-content-center justify-content-lg-between" id="container-lotes">
            @foreach ($lotes as $lote)

                @if($lote->pacote)
                    @switch($lote->modelo_exibicao)
                        @case(0)
                            @include('includes.lotes.pacotes.modelo00')
                        @break;
                        @case(2)
                            @include('includes.lotes.pacotes.modelo00')
                        @break;
                        @default
                            @include('includes.lotes.pacotes.modelo00')
                        @break;
                    @endswitch
                @else
                    @switch($lote->modelo_exibicao)
                        @case(0)
                            @include('includes.lotes.modelo00')
                        @break;
                        @case(1)
                            @include('includes.lotes.modelo01')
                        @break;
                        @case(2)
                            @include('includes.lotes.modelo02')
                        @break;
                        @case(3)
                            @include('includes.lotes.modelo03')
                        @break;
                        @case(4)
                            @include('includes.lotes.modelo04')
                        @break;
                        @case(5)
                            @include('includes.lotes.modelo05')
                        @break;
                        @case(6)
                            @include('includes.lotes.modelo06')
                        @break;
                        @case(7)
                            @include('includes.lotes.modelo07')
                        @break;
                        @default
                            @include('includes.lotes.modelo02')
                        @break;
                    @endswitch
                @endif

            @endforeach
            @if ($fazenda->catalogo)
                <div class="col-12 text-center mt-5 link-download-catalogo">
                    <a class="link-download-catalogo" href="{{ asset($fazenda->catalogo) }}" class="card-lote-botao"
                        href="#" role="button" download="catalogo-{{ $fazenda->slug }}.pdf"><i
                            class="fas fa-file-download mr-3"></i>Baixar PDF do Catálogo</a>
                </div>
                {{-- <div class="col-12 text-center mt-5">
                <a name="" id="" ><button class="px-4 py-2">Baixar Catálogo</button></a>
            </div> --}}
            @endif
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {

            $(".link-filtro-racas").click(function(){
                var raca = $(this).attr("raca");
                $(".link-filtro-racas.ativo").removeClass("ativo");
                $(this).addClass("ativo");
                $("#container-lotes").slideUp(300,function(){
                    if(raca != 0){
                        $(".coluna-caixa-lote[raca!='"+raca+"']").hide();
                        $(".coluna-caixa-lote[raca='"+raca+"']").show();
                        $("#container-lotes").slideDown(300);
                    }else{
                        $(".coluna-caixa-lote").show();
                        $("#container-lotes").slideDown(300);
                    }
                });
            });

            $(".sino-lote").click(function() {
                var lid = $(this).attr("lid");
                var icone = $(this);
                var _token = $('meta[name="csrf-token"]').attr('content');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': _token
                    }
                });
                $.ajax({
                    url: '/api/declararInteresseLote/' + lid,
                    type: 'GET',
                    dataType: 'JSON',
                    success: function(data) {
                        if (data == "adicionado") {
                            icone.addClass("interessado");
                            icone.attr("title", "Desativar notificação")
                            $("#modalInteresse").modal();
                        } else {
                            icone.removeClass("interessado");
                            icone.attr("title", "Ativar notificação")
                        }
                    },
                    error: function() {
                        console.log("deu ruim");
                    }
                });


            });

            $(".icone-curtir").click(function() {
                var lid = $(this).attr("lid");
                var icone = $(this);
                var _token = $('meta[name="csrf-token"]').attr('content');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': _token
                    }
                });
                $.ajax({
                    url: '/api/curtirLote/' + lid,
                    type: 'GET',
                    dataType: 'JSON',
                    success: function(data) {
                        if (data == "marcado") {
                            icone.addClass("marcado");
                            var qtd = parseInt($(".qtd-curtidas[lid='" + lid + "']").html());
                            qtd = qtd + 1;
                            $(".qtd-curtidas[lid='" + lid + "']").html(qtd);
                            $(".icone-descurtir[lid='" + lid + "']").removeClass("marcado");
                        } else if (data == "trocado") {
                            //Marca icone de curtir e aumenta sua quantidade
                            icone.addClass("marcado");
                            var qtd = parseInt($(".qtd-curtidas[lid='" + lid + "']").html());
                            qtd = qtd + 1;
                            $(".qtd-curtidas[lid='" + lid + "']").html(qtd);

                            //Desmarca icone de descurtir e diminui sua quantidade
                            $(".icone-descurtir[lid='" + lid + "']").removeClass("marcado");
                            var qtd = parseInt($(".qtd-descurtidas[lid='" + lid + "']").html());
                            qtd = qtd - 1;
                            $(".qtd-descurtidas[lid='" + lid + "']").html(qtd);
                        } else {
                            icone.removeClass("marcado");
                            var qtd = parseInt($(".qtd-curtidas[lid='" + lid + "']").html());
                            qtd = qtd - 1;
                            $(".qtd-curtidas[lid='" + lid + "']").html(qtd);
                        }
                    },
                    error: function() {
                        console.log("deu ruim");
                    }
                });
            });

            $(".icone-descurtir").click(function() {
                var lid = $(this).attr("lid");
                var icone = $(this);
                var _token = $('meta[name="csrf-token"]').attr('content');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': _token
                    }
                });
                $.ajax({
                    url: '/api/descurtirLote/' + lid,
                    type: 'GET',
                    dataType: 'JSON',
                    success: function(data) {
                        if (data == "marcado") {
                            icone.addClass("marcado");
                            var qtd = parseInt($(".qtd-descurtidas[lid='" + lid + "']").html());
                            qtd = qtd + 1;
                            $(".qtd-descurtidas[lid='" + lid + "']").html(qtd);
                        } else if (data == "trocado") {
                            //Marca icone de descurtir e aumenta sua quantidade
                            icone.addClass("marcado");
                            var qtd = parseInt($(".qtd-descurtidas[lid='" + lid + "']").html());
                            qtd = qtd + 1;
                            $(".qtd-descurtidas[lid='" + lid + "']").html(qtd);

                            //Desmarca icone de curtir e diminui sua quantidade
                            $(".icone-curtir[lid='" + lid + "']").removeClass("marcado");
                            var qtd = parseInt($(".qtd-curtidas[lid='" + lid + "']").html());
                            qtd = qtd - 1;
                            $(".qtd-curtidas[lid='" + lid + "']").html(qtd);
                        } else {
                            icone.removeClass("marcado");
                            var qtd = parseInt($(".qtd-descurtidas[lid='" + lid + "']").html());
                            qtd = qtd - 1;
                            $(".qtd-descurtidas[lid='" + lid + "']").html(qtd);
                        }
                    },
                    error: function() {
                        console.log("deu ruim");
                    }
                });
            });
        })
    </script>
@endsection
