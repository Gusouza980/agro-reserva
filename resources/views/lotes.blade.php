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
                        <div class="col-12 col-md-3 text-center">
                            <img src="{{ asset($fazenda->logo) }}" style="width: 100%; max-width: 300px;" alt="">
                        </div>
                        <div class="col-12 col-md-9 d-none d-lg-flex align-items-center text-white text-nav-fazenda">
                            @if($reserva->institucional)
                                <a class="@if (url()->current() == route('fazenda.conheca', ['fazenda' => $fazenda->slug, 'reserva' => $reserva])) active @endif"
                                    href="{{ route('fazenda.conheca', ['fazenda' => $fazenda->slug, 'reserva' => $reserva]) }}"><span><span
                                            style="border-bottom: 2px solid #FEB000;">Con</span>heça a fazenda</span></a>
                            @endif
                            <a class="mx-5 @if (url()->current() == route('fazenda.lotes', ['fazenda' => $fazenda->slug, 'reserva' => $reserva])) active @endif"
                                href="{{ route('fazenda.lotes', ['fazenda' => $fazenda->slug, 'reserva' => $reserva]) }}"><span><span
                                        style="border-bottom: 2px solid #FEB000;">Lot</span>es à venda</span> </a>
                        </div>
                        <div class="col-12 d-block d-lg-none">
                            @if($reserva->institucional)
                                <div class="row">
                                    <div class="col-12 text-nav-fazenda text-center mt-4">
                                        <a class="@if (url()->current() == route('fazenda.conheca', ['fazenda' => $fazenda->slug, 'reserva' => $reserva])) active @endif"
                                            href="{{ route('fazenda.conheca', ['fazenda' => $fazenda->slug, 'reserva' => $reserva]) }}"><span><span
                                                    style="border-bottom: 2px solid #FEB000;">Con</span>heça a
                                                fazenda</span></a>
                                    </div>
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-12 text-nav-fazenda text-center mt-4">
                                    <a class="mx-5 @if (url()->current() == route('fazenda.lotes', ['fazenda' => $fazenda->slug, 'reserva' => $reserva])) active @endif"
                                        href="{{ route('fazenda.lotes', ['fazenda' => $fazenda->slug, 'reserva' => $reserva]) }}"><span><span
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
        @livewire("lotes.card", ['fazenda' => $fazenda, 'reserva' => $reserva])
    </div>

    @if(!$reserva->institucional)
        <div class="modal fade" id="modalInstitucional" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center px-3 pt-2 pb-4">
                        <div class="row">
                            <div class="col-12">
                                <iframe id="iframe-video" style="width: 100%" height="450" src="https://www.youtube.com/embed/VY7WM1yxqB4?list=PLv1B2F3kxoML6VbVGVeCnhAFwediRXTt4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-12 text-left" style="font-size: 18px;">
                                São 50 novilhas à venda. Todas elas levam no ventre produtos Girolando Meio Sangue e Gir Leiteiro PO. Um pacote tecnológico. 
                                <br>
                                Compre uma novilha e no máximo em 90 dias você terá uma bezerra especial nascendo na sua casa.
                                <br><br>

                                Acesse os lotes e desfrute desta excelente oportunidade
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection

@section('scripts')
    @if(!$reserva->institucional && $popup_institucional)
        <script>
            $(document).ready(function(){
                $("#modalInstitucional").modal("show");
                $('#modalInstitucional').on('hidden.bs.modal', function () {
                    $("#iframe-video").remove();
                });
            })
        </script>
    @endif
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
