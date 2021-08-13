@php
    $cliente = \App\Models\Cliente::find(session()->get("cliente")["id"]);
@endphp

@extends('template.main')

@section('metas')
<meta property="og:title" content="{{$lote->nome}} - {{$lote->fazenda->nome_fazenda}}" />
<meta property="og:description" content="{{$lote->nome}} da raça {{$lote->raca->nome}} na reserva da fazenda {{$lote->fazenda->nome_fazenda}}" />
<meta property="og:url" content="{{url()->current()}}" />
<meta property="og:image" content="{{asset($lote->preview)}}" />
@endsection

@section("styles")
    <link rel="stylesheet" href="{{asset('css/magnific.popup.css')}}">
    <style>
        body{
            background-color: #FBFBFB;
        }
    </style>
@endsection

@section('conteudo')
    <div style="background-color: black; background: url(/{{$fazenda->fundo_conheca_lotes}}); background-size: cover; background-position: center;">
        <div class="container-fluid bg-preto py-5 py-lg-2">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 col-lg-2 text-white justify-content-center d-flex align-items-center">
                        <img src="{{asset($fazenda->logo)}}" style="max-width: 100%;" alt="">
                    </div>
                    <div class="col-12 col-lg-7 text-white mt-4 mt-lg-0">
                        <div class="row">
                            <div class="col-12 text-center text-lg-right">
                                <h2>{{$lote->nome}}</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 text-center text-lg-right">
                                <h4><b>{{$lote->parcelas}}x</b> de <b>R${{number_format($lote->preco / $lote->parcelas, 2, ",", ".")}}</b></h4>
                                {{--  <h4><b>0x</b> de <b>R$0000,00</b></h4>  --}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 text-center text-lg-right">
                                <span>ou R${{number_format($lote->preco - ($lote->preco * 6 / 100), 2, ",", ".")}} à vista</span>
                                {{--  <span>R$00000,00</span>  --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3 d-flex align-items-center justify-content-center mt-3 mt-lg-0">
                        <div class="text-center text-white">
                            {{--  <button name="" id="" class="btn btn-vermelho btn-block py-2 px-5 mx-auto" style="max-width:350px;">Disponível 21:30</button>  --}}
                            @if(!$lote->reservado)
                                @if(session()->get("cliente"))
                                    @if($cliente->aprovado)
                                        <a name="" id="" class="btn btn-vermelho btn-block py-2 px-5 mx-auto" style="max-width:350px;" href="{{route('carrinho.adicionar', ['lote' => $lote])}}" role="button">Comprar</a>
                                    @else
                                        <a name="" id="" class="btn btn-vermelho btn-block py-2 px-5 mx-auto cpointer" data-toggle="modal" data-target="#modalBloqueio" style="max-width:350px;" role="button">Comprar</a>
                                    @endif
                                @else
                                    <a name="" id="" class="btn btn-vermelho btn-block py-2 px-5 mx-auto" style="max-width:350px;" href="{{route('login')}}" role="button">Entre para comprar</a>
                                @endif
                            @else
                                <button name="" id="" class="btn btn-vermelho btn-block py-2 px-5 mx-auto" style="max-width:350px;">Reservado</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w1200 mx-auto pt-5 pb-5 pb-lg-0" style="">
            <div class="container-fluid">
                <div class="row py-4 px-4">
                    <div class="col-12">
                        <a href="{{route('fazenda.lotes', ['fazenda' => $lote->fazenda->slug])}}"><span style="color: #E8521B !important; font-size: 16px; font-family: 'Montserrat', sans-serif; font-weight: bold;"><i class="fas fa-arrow-left mr-2"></i> Voltar</span></a>
                    </div>
                </div>
                <div class="row justify-content-center mt-5">
                    <div class="text-center video-lote px-3 px-lg-0" style="max-width: 100%;">
                        {!! $lote->video !!}
                    </div>
                    <div class="ml-0 ml-lg-5 mt-4 mt-lg-0 px-lg-0 px-4 text-center text-lg-left">
                        <div class="row">
                            <div class="col-12 text-white text-lote-info px-0">
                                <h1>Lote {{str_pad($lote->numero, 3, "0", STR_PAD_LEFT)}}</h1>
                                <h2>{{$lote->nome}}</h2>
                            </div>
                        </div>
                        <div class="row justify-content-center justify-content-lg-start mt-4 mt-lg-0">
                            <div class="px-4 px-lg-0 text-white flex-grow-1 text-lote-info text-center text-lg-left">
                                <span><b>RGD:</b> {{$lote->registro}}</span><br>
                                <hr class="d-md-none" style="border-top: 1px solid rgba(255,255,255,0.4);">
                                <span><b>CCG:</b> {{$lote->ccg}}</span><br>
                                <hr class="d-md-none" style="border-top: 1px solid rgba(255,255,255,0.4);">
                                <span><b>GPTA:</b> {{$lote->gpta}}</span><br>
                                <hr class="d-md-none" style="border-top: 1px solid rgba(255,255,255,0.4);">
                            </div>
                            <div class="px-4 px-lg-0 ml-lg-4 flex-grow-1 text-white text-lote-info text-center text-lg-left">
                                <span><b>Raça:</b> {{$lote->raca->nome}}</span><br>
                                <hr class="d-md-none" style="border-top: 1px solid rgba(255,255,255,0.4);">
                                <span><b>Nascimento:</b> {{date("d/m/Y", strtotime($lote->nascimento))}}</span><br>
                                <hr class="d-md-none" style="border-top: 1px solid rgba(255,255,255,0.4);">
                                @if($lote->parto)
                                    <span><b>Último Parto:</b> {{date("d/m/Y", strtotime($lote->parto))}}</span>
                                    <hr class="d-md-none" style="border-top: 1px solid rgba(255,255,255,0.4);">
                                @endif
                            </div>
                        </div>
                        <div class="row justify-content-center justify-content-lg-start mt-2">
                            <div class="col-12 text-white text-lote-info px-0">
                                <div class="text-lote-info" style="width: 100%; max-width: 540px;">
                                    <span><b>Observações:</b></span><br>
                                    <span>{!! str_replace("\n", "<br>", $lote->observacoes) !!}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid" style="">
                <div class="row align-items-center justify-content-center" style="min-height: 300px;">
                    <div class="container-fluid">
                        <div class="row justify-content-center py-4 py-lg-0 d-none d-lg-flex">
                            <div class="icones-info text-center px-3 px-lg-5 cpointer" data-toggle="modal" data-target="#modalFrete">
                                <div class="mb-3 icones-info">
                                    <img src="{{asset('imagens/icon_frete.png')}}" height="50" alt="">
                                </div>
                                <span>Frete</span>
                            </div>
                            <div class="icones-info text-center px-3 px-lg-5 cpointer" data-toggle="modal" data-target="#modalPagamento">
                                <div class="mb-3 icones-info">
                                    <img src="{{asset('imagens/icon_pagamento.png')}}" height="50" alt="">
                                </div>
                                <span>Pagamentos<br>e Condições</span>
                            </div>
                            <div class="icones-info text-center mt-4 mt-lg-0 px-3 px-lg-5 cpointer" data-toggle="modal" data-target="#modalSeguranca">
                                <div class="mb-3 icones-info">
                                    <img src="{{asset('imagens/icon_seguranca.png')}}" height="50" alt="">
                                </div>
                                <span>Segurança</span>
                            </div>
                            <div class="icones-info text-center mt-4 mt-lg-0 px-3 px-lg-5 cpointer" data-toggle="modal" data-target="#modalComissao">
                                <div class="mb-3 icones-info">
                                    <img src="{{asset('imagens/icon_porcentagem.png')}}" height="50" alt="">
                                </div>
                                <span>Comissão</span>
                            </div>
                        </div>
                        <div class="row justify-content-center py-4 py-lg-0 d-lg-none">
                            <div class="icones-info text-center px-3 px-lg-5 cpointer" data-toggle="modal" data-target="#modalFrete">
                                <div class="mx-auto mb-3 icones-info">
                                    <img src="{{asset('imagens/icon_frete.png')}}" height="80" alt="">
                                </div>
                                <span>Frete</span>
                            </div>
                            <div class="icones-info text-center px-3 px-lg-5 cpointer" data-toggle="modal" data-target="#modalPagamento">
                                <div class="mx-auto mb-3 icones-info">
                                    <img src="{{asset('imagens/icon_pagamento.png')}}" height="80" alt="">
                                </div>
                                <span>Pagamentos<br>e Condições</span>
                            </div>
                            <div class="icones-info text-center mt-4 mt-md-0 px-3 px-lg-5 cpointer" data-toggle="modal" data-target="#modalSeguranca">
                                <div class="mx-auto mb-3 icones-info">
                                    <img src="{{asset('imagens/icon_seguranca.png')}}" height="80" alt="">
                                </div>
                                <span>Segurança</span>
                            </div>
                            <div class="icones-info text-center mt-4 mt-md-0 px-3 px-lg-5 cpointer" data-toggle="modal" data-target="#modalComissao">
                                <div class="mx-auto mb-3 icones-info">
                                    <img src="{{asset('imagens/icon_porcentagem.png')}}" height="80" alt="">
                                </div>
                                <span>Comissão</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--  <div class="container-fluid">
            <div class="row pb-4">
                <div class="col-12 text-center">
                    <a href="https://api.whatsapp.com/send?phone=5514981809051" target="_blank" class="btn btn-vermelho px-4 py-2">Quero falar com um consultor</a>
                </div>
            </div>
        </div>  --}}
    </div>
    
    <div class="container-fluid mt-5">
        
        <div class="w1200 mx-auto">
            <div class="row">
                <div class="col-12 text-center text-lg-left">
                    <h4>Genealogia</h4>
                </div>
            </div>
        </div>
        
        @if($lote->genealogia)
            <div class="row">
                <div class="col-12 text-center py-5">
                    <a id="link-genealogia" href="{{asset($lote->genealogia)}}">
                        <img id="imagem-genealogia" src="{{asset($lote->genealogia)}}" style="max-width: 100%;" alt="Genealogia">  
                    </a>
                </div>
            </div>
        @endif
        <div class="container-fluid">
            <div class="row py-4">
                <div class="col-12 text-center">
                    <a href="https://api.whatsapp.com/send?phone=5514981809051" target="_blank" class="btn btn-vermelho px-4 py-2">Quero falar com um consultor</a>
                </div>
            </div>
        </div>
    </div>

    <hr>
    <div class="container-fluid">
        @if($lote->catalogo)
            <div class="row py-3">
                <div class="col-12 text-center link-download-catalogo">
                    <a class="link-download-catalogo" href="{{asset($lote->catalogo)}}" download="{{$lote->numero . "-" . $lote->nome}}"><i class="fas fa-file-download mr-3"></i>Baixar PDF do Lote</a>
                </div>
            </div>
        @endif
        {{--  <div class="row mt-4 mb-lg-2">
            <div class="col-12 text-center">
                <button class="btn btn-vermelho px-3 py-2 my-2 my-lg-0" data-toggle="modal" data-target="#modalFrete">Frete e Pagamento</button>
                <br class="d-lg-none">
                <button class="btn btn-vermelho px-3 py-2 my-2 my-lg-0" data-toggle="modal" data-target="#modalSeguranca">Segurança e Garantia</button>
                <br class="d-lg-none">
                <button class="btn btn-vermelho px-3 py-2 my-2 my-lg-0" data-toggle="modal" data-target="#modalAssessoria">Assessoria</button>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-12 text-center">
                <button class="btn btn-vermelho px-3 py-2 my-2 my-lg-0" data-toggle="modal" data-target="#modalFunciona">Como funciona</button>
                <br class="d-lg-none">
                <button class="btn btn-vermelho px-3 py-2 my-2 my-lg-0" data-toggle="modal" data-target="#modalPapel">Papel da Agroreserva</button>
            </div>
        </div>  --}}
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalFrete" tabindex="-1" role="dialog" aria-labelledby="modalFreteTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pb-4">
                    <div class="row">
                        <div class="col-12 text-center text-red">
                            <h4><b>FRETE</b></h4>
                        </div>
                    </div>
                    <div class="row mt-3 px-4">
                        <div class="col-12 text-left">
                            <p>Retire seus animais na fazenda Santa Luzia.</p>
                            <br>
                            <p><b>Endereço:</b> MG 050 PASSOS/FURNAS KM 24 ,CEP 37904999, ZONA RURAL - PASSOS/MG</p>
                            <br>
                            <b>O frete é por conta do comprador.</b>
                        </div>
                    </div>
                    {{--  <div class="row mt-3">
                        <div class="col-12 text-center">
                            <a href="" class="btn btn-vermelho px-4">Contato</a>
                        </div>
                    </div>  --}}
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalPagamento" tabindex="-1" role="dialog" aria-labelledby="modalPagamentoTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pb-4">
                    <div class="row">
                        <div class="col-12 text-center text-red">
                            <h4><b>PAGAMENTOS E CONDIÇÕES</b></h4>
                        </div>
                    </div>
                    <div class="row mt-3 px-4">
                        <div class="col-12 text-justify">
                            <p>
                                Formas de pagamento:
                            </p>
                            <p>
                                À vista ou em até 10x sem juros no boleto de titularidade da fazenda e do comprador.
                            </p>
                            <p>
                                Pague <b>À VISTA</b> e ganhe <b>10% de desconto</b>*.
                            </p>
                            <ul class="mt-3">
                                <li class="" style="list-style: none; font-size: 14px;">*6% de desconto pela fazenda e 4% de desconto da comissão Agro Reserva.</li>
                            </ul>
                            <p>
                                Pague em <b>ATÉ 4x</b> e ganhe <b>5% de desconto</b>*
                            </p>
                            <ul class="mt-3">
                                <li class="" style="list-style: none; font-size: 14px;">*3% de desconto pela fazenda e 2% de desconto da comissão Agro Reserva.</li>
                            </ul>
                            <p style="font-size: 12px;">Os valores referentes à forma de pagamento são calculados automaticamente no processo de finalização da compra.</p>
                        </div>
                    </div>
                    {{--  <div class="row mt-3">
                        <div class="col-12 text-center">
                            <a href="" class="btn btn-vermelho px-4">Contato</a>
                        </div>
                    </div>  --}}
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalSeguranca" tabindex="-1" role="dialog" aria-labelledby="modalSegurancaTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 text-center text-red">
                            <h4><b>SEGURANÇA</b></h4>
                        </div>
                    </div>
                    <div class="row px-4">
                        <div class="col-12 text-justify">
                            <p>A Agro Reserva toma todas as medidas cabíveis para garantir o cumprimento dos padrões de confidencialidade e segurança, firmando acordos ou contratos com o objetivo de proteger a privacidade dos dados pessoais de nossos usuários e cumprir a legislação aplicável.</p>
                            <p>Para mais informações, fale com a gente nos canais de atendimento disponíveis no site.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalComissao" tabindex="-1" role="dialog" aria-labelledby="modalComissaoTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 text-center text-red">
                            <h4><b>Como funciona?</b></h4>
                        </div>
                    </div>
                    <div class="row px-4">
                        <div class="col-12 text-left">
                            <p>A Agro Reserva traz benefícios para você, <b>comprador</b>, com <b>descontos progressivos</b> que podem chegar a <b>0% de comissão</b>. Confira! </p>
                            <ul class="mt-3">
                                <li><b>Pague à vista e não pague nada de comissão!</b></li>
                                <li class="mt-2">Pague em até 04 parcelas e concederemos 50% de desconto na sua comissão.</li>
                                <li class="mt-2">Pague em 05 parcelas ou mais e nós cobraremos apenas 4% de comissão.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalBloqueio" tabindex="-1" role="dialog" aria-labelledby="modalBloqueioTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 text-center text-red">
                            <h4><b>Desculpe</b></h4>
                        </div>
                    </div>
                    <div class="row px-4">
                        <div class="col-12 text-left">
                            <p>O seu cadastro <b>não está apto</b> a realizar compras nessa reserva. O mesmo pode estar em análise ou ter sido reprovado.</p>
                            <p>Você pode consultar sua situação no seu painel de cliente ou falando com nosso consultor</p>
                            <div class="row my-3">
                                <div class="col-12 text-center">
                                    <a href="https://api.whatsapp.com/send?phone=5514981809051" target="_blank" class="btn btn-laranja px-4 py-2">Falar com consultor</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalPapel" tabindex="-1" role="dialog" aria-labelledby="modalPapelTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 text-center text-red">
                            <h4>Papel da Agroreserva</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-left">
                            <span>
                                A Agroreserva atua oferecendo uma intermediação segura, assessorada e 
                                com atendimento total para a sua compra de animais e materiais genéticos.
                            </span>
                            <br><br>
                            <span>
                                Nosso papel é tornar os lotes mais acessíveis e facilitar todo o processo,
                                desde a busca pelo lote ideal até a sua compra e entrega.
                            </span>
                            <br><br>
                            <span>
                                Além de tudo, contamos com uma equipe atenciosa que irá estar sempre pronta
                                pra te atender e guiar durante todo o processo, te ajudando a escolher o 
                                melhor lote pro seu objetivo.
                            </span>
                            <br><br>
                            <span>Para mais informações, entre em contato com o botão abaixo.</span>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <a href="" class="btn btn-vermelho px-4">Contato</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalGenealogia" tabindex="-1" role="dialog" aria-labelledby="modalGenealogiaTitle" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
            <div class="modal-content" style="background-color: transparent !important; ">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body px-0 py-0">
                    <img id="imagem-modal" src="" alt="" style="transform: rotate(-90deg); max-width: 100vh;">
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{asset('js/magnific.popup.js')}}"></script>
    <script>
        $(document).ready(function(){
            $(document).ready(function() {
                $('#link-genealogia').magnificPopup({type:'image'});
              });
        });
    </script>
@endsection