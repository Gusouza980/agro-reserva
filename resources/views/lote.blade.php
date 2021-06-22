@extends('template.main')

@section('metas')
<meta property="og:title" content="{{$lote->nome}} - {{$lote->fazenda->nome_fazenda}}" />
<meta property="og:description" content="{{$lote->nome}} da raça {{$lote->raca->nome}} na reserva da fazenda {{$lote->fazenda->nome_fazenda}}" />
<meta property="og:url" content="{{url()->current()}}" />
<meta property="og:image" content="{{asset($lote->preview)}}" />
@endsection

@section('conteudo')
    <div style="background: url(/{{$fazenda->fundo_conheca_lotes}}); background-size: cover; background-position: middle;">
        <div class="container-fluid bg-preto py-5 py-lg-2">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 col-lg-2 text-white justify-content-center d-flex align-items-center">
                        <img src="{{asset($fazenda->logo)}}" style="max-width: 100%;" alt="">
                    </div>
                    <div class="col-12 col-lg-4 justify-content-center d-flex align-items-center text-white mt-4 mt-lg-0">
                        {{--  <span><span style="color:red;">Faltam 4 dias</span> para o fim dessa reserva</span>  --}}
                    </div>
                    <div class="col-12 col-lg-3 text-white mt-4 mt-lg-0">
                        <div class="row">
                            <div class="col-12 text-center text-lg-right">
                                <h2>{{$lote->nome}}</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 text-center text-lg-right">
                                <h5>R${{number_format($lote->preco, 2, ",", ".")}}</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 text-center text-lg-right">
                                <span>ou até <b>{{$lote->parcelas}}x</b> de <b>R${{number_format(round(($lote->preco / $lote->parcelas), 2), 2, ",", ".")}}</b></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 text-center text-lg-right">
                                {{--  <h4>15x R$12.000</h4>  --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3 d-flex align-items-center justify-content-center mt-3 mt-lg-0">
                        <div class="text-center text-white">
                            @if(!$lote->reservado)
                                <a name="" id="" class="btn btn-vermelho btn-block py-2 px-5 mx-auto" style="max-width:350px;" href="{{route('carrinho.adicionar', ['lote' => $lote])}}" role="button">Comprar</a>
                            @else
                                <button name="" id="" class="btn btn-vermelho btn-block py-2 px-5 mx-auto" style="max-width:350px;">Reservado</button>
                            @endif
                            {{--  <span>No boleto ou cartão de crédito</span>  --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid py-5" style="">
            <div class="row justify-content-center mt-5">
                <div class="col-10 col-md-6 col-lg-4 text-center video-lote">
                    {!! $lote->video !!}
                    {{--  <iframe src="https://www.youtube.com/embed/klZNNUz4wPQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>  --}}
                    {{--  <img src="{{ urldecode($produto->produto[0]->tx_PathImagem) }}" style="border-radius: 15px;" alt="">  --}}
                </div>
            </div>
            {{--  <div class="row justify-content-center mt-3">
                <div class="col-10 col-md-6 col-lg-4 text-center">
                    <img src="{{asset('imagens/lote.png')}}" style="width:100%; max-width: 70px; border: 1px solid rgba(255,255,255,0.1); border-radius: 5px;" alt="">
                    <img src="{{asset('imagens/lote.png')}}" style="width:100%; max-width: 70px; border: 1px solid rgba(255,255,255,0.1); border-radius: 5px;" alt="">
                    <img src="{{asset('imagens/lote.png')}}" style="width:100%; max-width: 70px; border: 1px solid rgba(255,255,255,0.1); border-radius: 5px;" alt="">
                    <img src="{{asset('imagens/lote.png')}}" style="width:100%; max-width: 70px; border: 1px solid rgba(255,255,255,0.1); border-radius: 5px;" alt="">
                </div>
            </div>  --}}
            <div class="row justify-content-center mt-3">
                <div class="col-10 col-md-6 col-lg-4 text-center">
                    <div class="row">
                        <div class="col-12 text-white">
                            <h2>{{$lote->nome}}</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-white">
                            <b>Registro:</b> {{$lote->registro}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-white">
                            <b>Raça:</b> {{$lote->raca->nome}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-white">
                            <b>Nascimento:</b> {{date("d/m/Y", strtotime($lote->nascimento))}}
                        </div>
                    </div>
                    {{--  <div class="row">
                        <div class="col-12 text-white">
                            
                        </div>
                    </div>  --}}
                    {{--  <div class="row mt-4">
                        <div class="col-12 text-white">
                            <i class="fas fa-chevron-down fa-lg"></i>
                        </div>
                    </div>  --}}
                </div>
            </div>
        </div>
        <div class="row pb-4">
            <div class="col-12 text-center">
                <a href="" class="btn btn-vermelho px-4 py-2">Quero falar com um consultor</a>
            </div>
        </div>
    </div>
    <div class="container-fluid" style="background-color: white;">
        @if($lote->genealogia)
            <div class="row">
                <div class="col-12 text-center py-5">
                    <img src="{{asset($lote->genealogia)}}" style="max-width: 100%;" alt="Genealogia">  
                </div>
            </div>
        @endif
    </div>

    <hr>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center">
                <h4>Qual informação você precisa?</h4>
            </div>
        </div>
        <div class="row mt-4 mb-2">
            <div class="col-12 text-center">
                <button class="btn btn-vermelho px-3 py-2" data-toggle="modal" data-target="#modalFrete">Frete e Pagamento</button>
                <button class="btn btn-vermelho px-3 py-2" data-toggle="modal" data-target="#modalSeguranca">Segurança e Garantia</button>
                <button class="btn btn-vermelho px-3 py-2" data-toggle="modal" data-target="#modalAssessoria">Assessoria</button>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-12 text-center">
                <button class="btn btn-vermelho px-3 py-2" data-toggle="modal" data-target="#modalFunciona">Como funciona</button>
                <button class="btn btn-vermelho px-3 py-2" data-toggle="modal" data-target="#modalPapel">Papel da Agroreserva</button>
            </div>
        </div>
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

@endsection