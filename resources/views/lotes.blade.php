@extends('template.main')

@section('conteudo')
@if(!session()->get("cliente"))
    <div style="background: url(/{{$fazenda->fundo_conheca_lotes}}); background-size: cover; background-position: middle; min-height: 100vh;">
        <div class="container-fluid py-5">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-3 text-center text-lg-left">
                        <img src="{{asset($fazenda->logo)}}" style="max-width: 100%;" alt="">
                    </div>
                    <div class="col-12 col-md-9 d-none d-lg-flex align-items-center text-white text-nav-fazenda">
                        <a class="@if(url()->current() == route('fazenda.conheca', ['fazenda' => $fazenda->slug])) active @endif" href="{{route('fazenda.conheca', ['fazenda' => $fazenda->slug])}}"><span><span style="border-bottom: 2px solid #F5B01F;">Con</span>heça a fazenda</span></a> 
                        <a class="mx-5 @if(url()->current() == route('fazenda.lotes', ['fazenda' => $fazenda->slug])) active @endif" href="{{route('fazenda.lotes', ['fazenda' => $fazenda->slug])}}"><span><span style="border-bottom: 2px solid #F5B01F;">Lot</span>es a venda</span> </a>
                    </div>
                    <div class="col-12 d-block d-lg-none">
                        <div class="row">
                            <div class="col-12 text-nav-fazenda text-center mt-4">
                                <a class="@if(url()->current() == route('fazenda.conheca', ['fazenda' => $fazenda->slug])) active @endif" href="{{route('fazenda.conheca', ['fazenda' => $fazenda->slug])}}"><span><span style="border-bottom: 2px solid #F5B01F;">Con</span>heça a fazenda</span></a> 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 text-nav-fazenda text-center mt-4">
                                <a class="mx-5 @if(url()->current() == route('fazenda.lotes', ['fazenda' => $fazenda->slug])) active @endif" href="{{route('fazenda.lotes', ['fazenda' => $fazenda->slug])}}"><span><span style="border-bottom: 2px solid #F5B01F;">Lot</span>es a venda</span> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid py-5 mt-5">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8 text-center text-cadastro-lotes">
                    <h1>Cadastre-se para ver os animais dessa fazenda</h1>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12 text-center text-cadastro-lotes">
                    <a name="" id="" class="btn btn-vermelho py-2 px-4" href="{{route('cadastro')}}" role="button">Cadastrar agora</a>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12 text-center text-cadastro-lotes">
                    <span>A maioria das pessoas concluem o cadastro em até 2 minutos</span>
                </div>
            </div>
        </div>
    </div>
@else
    <div class="" style="background: url(/{{$fazenda->fundo_conheca_lotes}}); background-size: cover; background-position: bottom center;">
        <div class="pb-5" style="background-color: rgba(0,0,0,0.5);">
            <div class="container-fluid py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-3">
                            <img src="{{asset($fazenda->logo)}}" style="max-width: 100%;" alt="">
                        </div>
                        <div class="col-12 col-md-9 d-flex align-items-center text-white text-nav-fazenda">
                            <a class="@if(url()->current() == route('fazenda.conheca', ['fazenda' => $fazenda->slug])) active @endif" href="{{route('fazenda.conheca', ['fazenda' => $fazenda->slug])}}"><span><span style="border-bottom: 2px solid #F5B01F;">Con</span>heça a fazenda</span></a> 
                            <a class="mx-5 @if(url()->current() == route('fazenda.lotes', ['fazenda' => $fazenda->slug])) active @endif" href="{{route('fazenda.lotes', ['fazenda' => $fazenda->slug])}}"><span><span style="border-bottom: 2px solid #F5B01F;">Lot</span>es a venda</span> </a>
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
    <div class="container py-5">
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
        <div class="row">
            @foreach($fazenda->lotes->where("ativo", true) as $lote)
                {{--  @for($i = 0; $i < 30; $i++)  --}}
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 px-3 mt-4">
                        <div class="card mx-auto" style="width: 100%; max-width: 18rem;">
                            <a href="{{route('fazenda.lote', ['fazenda' => $lote->fazenda->slug, 'lote' => $lote])}}">
                                <div class="d-flex align-items-center justify-content-center" style="object-fit: contain; height:180px; background: url({{asset($lote->preview)}}); background-position: center;">
                                    {{--  <a href="{{route('fazenda.lote', ['fazenda' => $lote->fazenda->slug, 'lote' => $lote])}}"><img class="card-img-top" src="{{asset($lote->preview)}}" alt="{{$lote->nome}}"></a>  --}}
                                    @if($lote->reservado)
                                        <div class="faixa-reservado text-center text-white py-2">
                                            RESERVADO
                                        </div>
                                        {{--  <img class="faixa-reservado" src="{{asset('imagens/reservado.png')}}" alt="Reservado">  --}}
                                    @endif
                                </div>
                            </a>
                            <div class="card-body" style="position: relative;">
                                <i class="sino-lote fas fa-bell fa-lg @if($cliente->lotes_interessados->where('lote_id', $lote->id)->count() > 0) interessado @endif" lid="{{$lote->id}}" @if($cliente->lotes_interessados->where('lote_id', $lote->id)) title="Desativar notificações" @else title="Ativar notificações" @endif></i>
                                <a href="{{route('fazenda.lote', ['fazenda' => $lote->fazenda->slug, 'lote' => $lote])}}"><h5 class="card-title text-black"><b>{{$lote->nome}}</b></h5></a>
                                <a href="{{route('fazenda.lote', ['fazenda' => $lote->fazenda->slug, 'lote' => $lote])}}">
                                    <p class="card-text text-black">
                                        {!! str_replace("\n", "<br>", $lote->observacoes) !!}
                                    </p>
                                </a>
                                <div class="row mt-3">
                                    <div class="col-8 text-left">
                                        <i class="cpointer fas fa-thumbs-up mr-2 icone-curtir @if($cliente->curtidas->where('lote_id', $lote->id)->where('curtiu', true)->count() > 0) marcado @endif" lid="{{$lote->id}}"></i>
                                        <span class="qtd-curtidas" lid="{{$lote->id}}">{{$lote->curtidas->where("curtiu", true)->count()}}</span>
                                        <i class="cpointer fas fa-thumbs-down ml-3 mr-2 icone-descurtir @if($cliente->curtidas->where('lote_id', $lote->id)->where('curtiu', false)->count() > 0) marcado @endif" lid="{{$lote->id}}"></i>
                                        <span class="qtd-descurtidas" lid="{{$lote->id}}">{{$lote->curtidas->where("curtiu", false)->count()}}</span>
                                    </div>
                                    <div class="col-4 text-right">
                                        <a class="icone-compartilhamento" data-toggle="modal" data-target="#modalCompartilhamentoLote{{$lote->id}}"><i class="fab fa-telegram-plane fa-lg  cpointer"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="modalCompartilhamentoLote{{$lote->id}}" tabindex="-1" aria-labelledby="modalCompartilhamentoLote{{$lote->id}}Label" aria-hidden="true">
                            <div class="modal-dialog modal-sm modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header pt-3">
                                        <h5 class="modal-title" id="exampleModalLabel">Compartilhar em...</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body text-center pb-4">
                                        <div class="row">
                                            <div class="col-12">
                                                <hr>
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-12 text-black text-justify">
                                                <a href="https://api.whatsapp.com/send?text={{route('fazenda.lote', ['fazenda' => $lote->fazenda->slug, 'lote' => $lote])}}" class="icone-compartilhamento"><i class="fab fa-whatsapp fa-lg mr-3"></i>Compartilhar no Whatsapp</a>
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-12 text-black text-justify">
                                                <a href="http://www.facebook.com/sharer/sharer.php?u={{route('fazenda.lote', ['fazenda' => $lote->fazenda->slug, 'lote' => $lote])}}" class="icone-compartilhamento"><i class="fab fa-facebook fa-lg mr-3"></i>Compartilhar no Facebook</a>
                                            </div>
                                        </div>
                                        {{--  <div class="row mt-4">
                                            <div class="col-12 text-black text-justify">
                                                <a href="" class="icone-compartilhamento"><i class="fab fa-instagram fa-lg mr-3"></i>Compartilhar no Instagram</a>
                                            </div>
                                        </div>  --}}
                                        <div class="row mt-4">
                                            <div class="col-12 text-black text-justify">
                                                <a href="https://twitter.com/home?status={{route('fazenda.lote', ['fazenda' => $lote->fazenda->slug, 'lote' => $lote])}}" class="icone-compartilhamento"><i class="fab fa-twitter fa-lg mr-3"></i>Compartilhar no Twitter</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                {{--  @endfor      --}}
            @endforeach
        </div>
    </div>
    <div class="modal fade" id="modalInteresse" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
    </div>
@endif


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