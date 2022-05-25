@php

if (session()->get('cliente')) {
    $cliente = \App\Models\Cliente::find(session()->get('cliente')['id']);
}

@endphp

@extends('template.main')

@section("scripts")

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.14.305/pdf.min.js" integrity="sha512-dw+7hmxlGiOvY3mCnzrPT5yoUwN/MRjVgYV7HGXqsiXnZeqsw1H9n9lsnnPu4kL2nx2bnrjFcuWK+P3lshekwQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function(){
            var loadingTask = pdfjsLib.getDocument("/{!! $embriao->catalogo !!}")
            loadingTask.promise.then(function(pdf) {
                console.log('PDF loaded');
                pdf.getPage(1).then(function(page) {
                    console.log('Page loaded');
                    var scale = 1;
                    var viewport = page.getViewport({scale: scale});

                    // Prepare canvas using PDF page dimensions
                    var canvas = document.getElementById('the-canvas');
                    var context = canvas.getContext('2d');
                    canvas.height = viewport.height;
                    canvas.width = viewport.width;

                    // Render PDF page into canvas context
                    var renderContext = {
                        canvasContext: context,
                        viewport: viewport
                    };
                    
                    var renderTask = page.render(renderContext);
                        renderTask.promise.then(function () {
                        console.log('Page rendered');
                    });
                });
            });
        });
    </script>
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/magnific.popup.css') }}">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
    <style>
        body {
            background-color: #FBFBFB;
        }
        
        #the-canvas {
            border: 1px solid black;
            direction: ltr;
        }
    </style>
@endsection

@section('conteudo')
    @if (!$embriao->reserva->encerrada)
        {{-- <div class="d-flex flex-column align-items-center justify-content-center" style="position: fixed; top: calc(50% - 100px); left: 0px; background-color: rgba(21, 23, 30, 0.90); width: 70px; z-index: 90;">
            <div class="my-4 icones-info d-flex flex-column align-items-center" data-toggle="modal"
            data-target="#modalPagamento">
                <img class="cpointer" src="{{ asset('imagens/icon_pagamento.png') }}" style="width: 35px; height: auto;" alt="">
                <span style="font-size: 10px;">Pagamento</span>
            </div>
            <div class="mb-4 icones-info d-flex flex-column align-items-center" data-toggle="modal"
            data-target="#modalSeguranca">
                <img class="cpointer" src="{{ asset('imagens/icon_seguranca.png') }}" style="width: 35px; height: auto;" alt="">
                <span style="font-size: 10px;">Segurança</span>
            </div>
        </div> --}}
    @endif

    <div class=""
        style="background-color: #15171e; background-blend-mode: darken; @if($reserva->fazenda->fundo_conheca_lotes) background: rgba(0, 0, 0, .65) url(/{{ $reserva->fazenda->fundo_conheca_lotes }}) @endif; background-size: cover; background-position: center;">
        <div class="pt-5 pb-5 mx-auto w1200 pb-lg-0" style="">
            <div class="pb-4 container-fluid">
                <div class="px-5 py-4 row justify-content-between">
                    <div>
                        <a
                            href="{{ route('fazenda.embrioes', ['fazenda' => $embriao->reserva->fazenda->slug,'reserva' => $reserva]) }}"><span
                                style="color: #E8521B !important; font-size: 16px; font-family: 'Montserrat', sans-serif; font-weight: bold;"><i
                                    class="mr-2 fas fa-arrow-left"></i> {{ __('messages.botoes.voltar') }}</span></a>
                    </div>
                    <div class="text-center d-none d-lg-block">
                        <img src="{{ asset($embriao->fazenda->logo) }}" width="200" alt="">
                    </div>
                    <div class="text-right">
                        <i class="text-white fas fa-paper-plane fa-lg cpointer" data-toggle="modal"
                            data-target="#modalCompartilhamento"></i>
                    </div>
                </div>
                <div class="row justify-content-center d-lg-none">
                    <div class="text-center col-12">
                        <img src="{{ asset($embriao->fazenda->logo) }}" width="200" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="py-4 row">
            <div class="text-center col-12">
                <a href="{{ asset($embriao->catalogo) }}"
                    target="_blank" class="px-4 py-2 btn btn-vermelho">Baixe o PDF</a>
            </div>
        </div>
    </div>
    
    <div class="w1200">
        <canvas style="max-width: 100%;" id="the-canvas"></canvas>
    </div>
    <div class="container-fluid">
        <div class="py-4 row">
            <div class="text-center col-12">
                <a href="https://api.whatsapp.com/send?phone={{ $embriao->reserva->telefone_consultor }}"
                    target="_blank" class="px-4 py-2 btn btn-vermelho">{{ __('messages.botoes.falar_consultor') }}:</a>
            </div>
        </div>
    </div>
        
    <div class="modal fade" id="modalCompartilhamento" tabindex="-1" role="dialog"
        aria-labelledby="modalPagamentoTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="pb-4 modal-body">
                    <div class="row">
                        <div class="text-center col-12">
                            <h5>Compartilhar em:</h5>
                        </div>
                    </div>
                    <div class="mt-3 row">
                        <div class="text-center col-12">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->full() }}" target="_blank"><i
                                    class="fab fa-facebook fa-2x" style="color: #3b5998;" aria-hidden="true"></i></a>
                            <a href="https://api.whatsapp.com/send?text={{ url()->full() }}" class="ml-3"
                                target="_blank"><i class="fab fa-whatsapp-square fa-2x" style="color: #25D366;"></i></a>
                            <a href="mailto:?subject=Lote {{ $embriao->numero . $embriao->letra }} da {{ $embriao->reserva->fazenda->nome_fazenda }}. Genética superior à sua disposição. Vem ver.&amp;body=O {{ $embriao->nome }} está na vitrine da Agro Reserva. Animal selecionado a dedo pra elevar os índices do seu rebanho. Clique no link e confira a oferta:%0D%0A%0D%0A{{ url()->full() }}"
                                class="ml-3" target="_blank"><i class="fas fa-envelope fa-2x"
                                    style="color: #c71610;"></i></a>
                            <a href="https://telegram.me/share/url?url={{ url()->full() }}&text=Venha conhecer o lote {{ $embriao->numero . ' - ' . $embriao->nome }} na Agroreserva."
                                class="ml-3" target="_blank"><i class="fab fa-telegram fa-2x"
                                    style="color: #0088CC;"></i></a>
                        </div>
                    </div>
                    <div class="mt-3 row">
                        <div class="text-center col-12">
                            <div class="mb-2 input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Link</div>
                                </div>
                                <input type="text" class="form-control" value="{{ url()->full() }}" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
  
@endsection
