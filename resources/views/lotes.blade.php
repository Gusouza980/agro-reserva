@extends('template.main')

@section('styles')
    <style>
        body{
            background-color: #F2F2F2;
        }
    </style>
@endsection

@section('conteudo')
    <div class="" style="background: url(/{{$fazenda->fundo_conheca_lotes}}); background-size: cover; background-position: bottom center;">
        <div class="pb-5" style="background-color: rgba(0,0,0,0.5);">
            <div class="container-fluid py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-3">
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
            </div>
            <div class="container-fluid py-5">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-8 text-center text-cadastro-lotes">
                        <h1>Conheça nossos lotes</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="w1200 mx-auto py-5">
        <div class="row">
            <div class="col-12 col-lg-8 justify-content-center justify-content-lg-start text-center text-lg-left align-items-center text-lotes d-flex">
                <h3>Reserva da {{$fazenda->nome_fazenda}}</h3>
            </div>
            <div class="col-12 col-lg-4 justify-content-center justify-content-lg-end align-items-center text-center text-lg-right text-lotes d-flex">
                {{--  <span>fêmeas</span>
                <span class="ml-3">embrião</span>
                <span class="ml-3">sêmen</span>  --}}
            </div>
        </div>
        <div class="row justify-content-between mt-5">
            @foreach($fazenda->lotes->where("ativo", true) as $lote)
                <div class="coluna-caixa-lote">
                    <div class="card card-caixa-lote mx-auto">
                        <a href="{{route('fazenda.lote', ['fazenda' => $lote->fazenda->slug, 'lote' => $lote])}}">
                            <div class="d-flex align-items-center justify-content-center" style="border-top-left-radius: 20px; border-top-right-radius: 20px; object-fit: contain; height:180px; background: url({{asset($lote->preview)}}); background-position: center; background-repeat: no-repeat;">
                                @if($lote->reservado)
                                    <div class="faixa-reservado text-center text-white py-2">
                                        RESERVADO
                                    </div>
                                @endif
                            </div>
                        </a>
                        <div class="numero-lote">
                            <h4>LOTE</h4>
                            <h5 class="mb-2">{{str_pad($lote->numero, 3, "0", STR_PAD_LEFT)}}</h5>
                        </div>
                        <div class="card-body card-lote-body" style="position: relative;">
                            {{--  <a class="icone-compartilhamento" data-toggle="modal" data-target="#modalCompartilhamentoLote{{$lote->id}}"><i class="fas fa-info-circle"></i> Mais Informações</a>  --}}
                            <div class="text-center d-flex align-items-center justify-content-center" style="height: 50px;">
                                <a href="{{route('fazenda.lote', ['fazenda' => $lote->fazenda->slug, 'lote' => $lote])}}"><h5 class="card-title card-lote-nome text-black"><b>{{$lote->nome}}</b></h5></a>
                            </div>
                            <div class="container-fluid px-3">
                                <div class="row pb-1" style="border-bottom: 1px solid black;">
                                    <div style="width: 60px;">
                                        <b class="mr-3">RGD.: </b>
                                    </div>
                                    <div>
                                        <span class="card-lote-info-text">{{$lote->registro}}</span>
                                    </div>
                                </div>
                                <div class="row py-1" style="border-bottom: 1px solid black;">
                                    <div style="width: 60px;">
                                        <b class="mr-3">CCG.: </b>
                                    </div>
                                    <div>
                                        <span class="card-lote-info-text">{{$lote->ccg}}</span>
                                    </div>
                                </div>
                                <div class="row py-1" style="border-bottom: 1px solid black;">
                                    <div style="width: 60px;">
                                        <b class="mr-3">GPTA.: </b>
                                    </div>
                                    <div>
                                        <span class="card-lote-info-text">{{$lote->gpta}}</span>
                                    </div>
                                </div>
                            </div>
                                <div class="container-fluid mt-2">
                                    <div class="row">
                                        <div class="col-12 card-lote-parto text-center" style="height: 30px;">
                                            @if($lote->parto)
                                                <h3>ÚLTIMO PARTO EM <b>{{date('d/m/Y', strtotime($lote->parto))}}</b></h3>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            <div class="container-fluid mt-2">
                                <div class="row">
                                    <div class="col-12 card-lote-botao text-center">
                                        <button class="px-3 py-1">VER MAIS</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                    {{--  <div class="col-12 col-sm-6 col-md-4 col-lg-3 px-3 mt-4">
                        <div class="card mx-auto" style="width: 100%; max-width: 18rem;">
                            <a href="{{route('fazenda.lote', ['fazenda' => $lote->fazenda->slug, 'lote' => $lote])}}">
                                <div class="d-flex align-items-center justify-content-center" style="object-fit: contain; height:180px; background: url({{asset($lote->preview)}}); background-position: center; background-repeat: no-repeat;">
                                    @if($lote->reservado)
                                        <div class="faixa-reservado text-center text-white py-2">
                                            RESERVADO
                                        </div>
                                    @endif
                                </div>
                            </a>
                            <div class="numero-lote">
                                <h5 class="mb-2">Lote {{$lote->numero}}</h5>
                            </div>
                            <div class="card-body card-lote-body" style="position: relative;">
                                <a class="icone-compartilhamento" data-toggle="modal" data-target="#modalCompartilhamentoLote{{$lote->id}}"><i class="fas fa-info-circle"></i> Mais Informações</a>
                                <a href="{{route('fazenda.lote', ['fazenda' => $lote->fazenda->slug, 'lote' => $lote])}}"><h5 class="card-title card-lote-nome text-black"><b>{{$lote->nome}}</b></h5></a>
                            </div>
                        </div>
                        <div class="modal fade" id="modalCompartilhamentoLote{{$lote->id}}" tabindex="-1" aria-labelledby="modalCompartilhamentoLote{{$lote->id}}Label" aria-hidden="true">
                            <div class="modal-dialog modal-sm modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header pt-3">
                                        <h6 class="modal-title" id="exampleModalLabel"><b>{{$lote->nome}}</b></h6>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body text-left pb-4">
                                        <hr>

                                        <div class="row">
                                            <div class="col-12">
                                                {!! str_replace("\n", "<br>", $lote->observacoes) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  --}}
            @endforeach
        </div>
    </div>
    {{--  <div class="modal fade" id="modalInteresse" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body modal-body-sucesso text-center py-4">
                    <div class="row">
                        <div class="col-12 conteudo-modal">
                            <h3>Obrigado <span id="nome_modal">{{$cliente->nome_dono}}</span>.</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 conteudo-modal">
                            <span class="mt-2">Ficamos felizes que esteja interessado neste lote. Te notificaremos sempre que houver novidades. Caso tenha alguma dúvida, fale com um de nossos consultores.</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 conteudo-modal">
                            <button class="botao-confirma py-2 px-5 mt-4" onclick="fechaModal()">Continuar Navegando</button>
                            <button class="botao-confirma py-2 px-5 mt-4" onclick="fechaModal()">Falar com um consultor</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  --}}
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){

            $(".sino-lote").click(function(){
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
                        if(data == "adicionado"){
                            icone.addClass("interessado");
                            icone.attr("title", "Desativar notificação")
                            $("#modalInteresse").modal();
                        }else{
                            icone.removeClass("interessado");
                            icone.attr("title", "Ativar notificação")
                        }
                    },
                    error: function(){
                        console.log("deu ruim");
                    }
                });
                
                
            });

            $(".icone-curtir").click(function(){
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
                        if(data == "marcado"){
                            icone.addClass("marcado");
                            var qtd = parseInt($(".qtd-curtidas[lid='"+lid+"']").html());
                            qtd = qtd + 1;
                            $(".qtd-curtidas[lid='"+lid+"']").html(qtd);
                            $(".icone-descurtir[lid='"+lid+"']").removeClass("marcado");
                        }else if(data == "trocado"){
                            //Marca icone de curtir e aumenta sua quantidade
                            icone.addClass("marcado");
                            var qtd = parseInt($(".qtd-curtidas[lid='"+lid+"']").html());
                            qtd = qtd + 1;
                            $(".qtd-curtidas[lid='"+lid+"']").html(qtd);

                            //Desmarca icone de descurtir e diminui sua quantidade
                            $(".icone-descurtir[lid='"+lid+"']").removeClass("marcado");
                            var qtd = parseInt($(".qtd-descurtidas[lid='"+lid+"']").html());
                            qtd = qtd - 1;
                            $(".qtd-descurtidas[lid='"+lid+"']").html(qtd);
                        }else{
                            icone.removeClass("marcado");
                            var qtd = parseInt($(".qtd-curtidas[lid='"+lid+"']").html());
                            qtd = qtd - 1;
                            $(".qtd-curtidas[lid='"+lid+"']").html(qtd);
                        }
                    },
                    error: function(){
                        console.log("deu ruim");
                    }
                });
            });

            $(".icone-descurtir").click(function(){
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
                        if(data == "marcado"){
                            icone.addClass("marcado");
                            var qtd = parseInt($(".qtd-descurtidas[lid='"+lid+"']").html());
                            qtd = qtd + 1;
                            $(".qtd-descurtidas[lid='"+lid+"']").html(qtd);
                        }else if(data == "trocado"){
                            //Marca icone de descurtir e aumenta sua quantidade
                            icone.addClass("marcado");
                            var qtd = parseInt($(".qtd-descurtidas[lid='"+lid+"']").html());
                            qtd = qtd + 1;
                            $(".qtd-descurtidas[lid='"+lid+"']").html(qtd);

                            //Desmarca icone de curtir e diminui sua quantidade
                            $(".icone-curtir[lid='"+lid+"']").removeClass("marcado");
                            var qtd = parseInt($(".qtd-curtidas[lid='"+lid+"']").html());
                            qtd = qtd - 1;
                            $(".qtd-curtidas[lid='"+lid+"']").html(qtd);
                        }else{
                            icone.removeClass("marcado");
                            var qtd = parseInt($(".qtd-descurtidas[lid='"+lid+"']").html());
                            qtd = qtd - 1;
                            $(".qtd-descurtidas[lid='"+lid+"']").html(qtd);
                        }
                    },
                    error: function(){
                        console.log("deu ruim");
                    }
                });
            });
        })
    </script>
@endsection