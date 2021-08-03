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
    <div style="background: url(/{{$fazenda->fundo_conheca_lotes}}); background-size: cover; background-position: middle;">
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
                            <div class="col-12 text-center text-lg-right blur">
                                {{--  <h4><b>{{$lote->parcelas}}x</b> de <b>R${{number_format(round(($lote->preco / $lote->parcelas), 2), 2, ",", ".")}}</b></h4>  --}}
                                <h4><b>0x</b> de <b>R$0000,00</b></h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 text-center text-lg-right blur">
                                {{--  <span>ou R${{number_format($lote->preco, 2, ",", ".")}} à vista</span>  --}}
                                <span>R$00000,00</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3 d-flex align-items-center justify-content-center mt-3 mt-lg-0">
                        <div class="text-center text-white">
                            <button name="" id="" class="btn btn-vermelho btn-block py-2 px-5 mx-auto" style="max-width:350px;">Disponível 06/08</button>
                            {{--  @if(!$lote->reservado)
                                @if(session()->get("cliente"))
                                    <a name="" id="" class="btn btn-vermelho btn-block py-2 px-5 mx-auto" style="max-width:350px;" href="{{route('carrinho.adicionar', ['lote' => $lote])}}" role="button">Comprar</a>
                                @else
                                    <a name="" id="" class="btn btn-vermelho btn-block py-2 px-5 mx-auto" style="max-width:350px;" href="{{route('login')}}" role="button">Entre para comprar</a>
                                @endif
                            @else
                                <button name="" id="" class="btn btn-vermelho btn-block py-2 px-5 mx-auto" style="max-width:350px;">Reservado</button>
                            @endif  --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w1200 mx-auto pt-5 pb-5 pb-lg-0" style="">
            <div class="container-fluid">
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
                        <div class="row justify-content-center justify-content-lg-start">
                            <div class="text-white text-lote-info text-center text-lg-left">
                                <span><b>RGD:</b> {{$lote->registro}}</span><br>
                                <span><b>CCG:</b> {{$lote->ccg}}</span><br>
                                <span><b>Raça:</b> {{$lote->raca->nome}}</span>
                            </div>
                            <div class="ml-4 text-white text-lote-info text-center text-lg-left">
                                <span><b>Nascimento:</b> {{date("d/m/Y", strtotime($lote->nascimento))}}</span><br>
                                <span><b>Último Parto:</b> {{date("d/m/Y", strtotime($lote->parto))}}</span>
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
                            <div class="icones-info text-center px-3 px-lg-5 cpointer" data-toggle="modal" data-target="#modalSeguranca">
                                <div class="mb-3 icones-info">
                                    <img src="{{asset('imagens/icon_pagamento.png')}}" height="50" alt="">
                                </div>
                                <span>Pagamentos<br>e Condições</span>
                            </div>
                            <div class="icones-info text-center mt-4 mt-lg-0 px-3 px-lg-5">
                                <div class="mb-3 icones-info">
                                    <img src="{{asset('imagens/icon_seguranca.png')}}" height="50" alt="">
                                </div>
                                <span>Segurança</span>
                            </div>
                            <div class="icones-info text-center mt-4 mt-lg-0 px-3 px-lg-5">
                                <div class="mb-3 icones-info">
                                    <img src="{{asset('imagens/icon_porcentagem.png')}}" height="50" alt="">
                                </div>
                                <span>Comissão</span>
                            </div>
                        </div>
                        <div class="row justify-content-center py-4 py-lg-0 d-lg-none">
                            <div class="icones-info text-center px-3 px-lg-5">
                                <div class="mx-auto mb-3 icones-info">
                                    <img src="{{asset('imagens/icon_frete.png')}}" height="80" alt="">
                                </div>
                                <span>Frete</span>
                            </div>
                            <div class="icones-info text-center px-3 px-lg-5">
                                <div class="mx-auto mb-3 icones-info">
                                    <img src="{{asset('imagens/icon_pagamento.png')}}" height="80" alt="">
                                </div>
                                <span>Pagamentos<br>e Condições</span>
                            </div>
                            <div class="icones-info text-center mt-4 mt-md-0 px-3 px-lg-5">
                                <div class="mx-auto mb-3 icones-info">
                                    <img src="{{asset('imagens/icon_seguranca.png')}}" height="80" alt="">
                                </div>
                                <span>Segurança</span>
                            </div>
                            <div class="icones-info text-center mt-4 mt-md-0 px-3 px-lg-5">
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
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 text-center text-red">
                            <h4>Frete e Pagamento</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-left">
                            <span>O frete pode ser consultado antes da finalização da compra.</span>
                            <br><br>
                            <span>O pagamento pode ser feito em até 10x</span>
                            <br>
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
                            <h4>Segurança e Garantia</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-left">
                            <span>Toda operação realizada através da Agroreserva é extremamente segura. Prezamos por trabalhar com fornecedores reconhecidos e com excelente histórico no mercado.</span>
                            <br><br>
                            <span>Além disto, garantimos a veracidade das informações através do <b>registro dos animais</b></span>
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

    <!-- Modal -->
    <div class="modal fade" id="modalAssessoria" tabindex="-1" role="dialog" aria-labelledby="modalAssessoriaTitle" aria-hidden="true">
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
                            <h4>Assessoria</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-left">
                            <span>A Agroreserva oferece um serviço de <b>assessoria gratuita</b>, prestada por uma equipe interna e qualificada de veterinários, zootecnistas e universitários com ampla experiência comercial e prática no campo.</span>
                            <br><br>
                            <span>Ao fazer o cadastro, um membro do nosso time entrará em contato e te auxiliará desde a escolha do melhor animal pra sua fazenda, até o momento da compra.</span>
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

    <!-- Modal -->
    <div class="modal fade" id="modalFunciona" tabindex="-1" role="dialog" aria-labelledby="modalFuncionaTitle" aria-hidden="true">
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
                            <h4>Como funciona?</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-left">
                            <span><b>1. Qualquer um pode comprar?</b></span>
                            <br>
                            <span>
                                Sim! Qualquer pessoa física ou jurídica pode adquirir animais deste lote, desde que possua vínculo à uma propriedade rural.
                            </span>
                            <br><br>
                            <span><b>2. Como faço para comprar?</b></span>
                            <br>
                            <span>
                                O comprador que primeiro demonstrar interesse e confirmar a compra será o novo proprietário dos animais. Caso tenha interesse, basta adicioná-lo ao carrinho e finalizar sua compra. A mesma pode ser finalizada pelo whatsapp com atendimento humanizado para melhor guiá-lo, ou diretamente com a geração do boleto.
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