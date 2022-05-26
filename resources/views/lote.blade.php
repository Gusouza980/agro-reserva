@php

if (session()->get('cliente')) {
    $cliente = \App\Models\Cliente::find(session()->get('cliente')['id']);
}

@endphp

@extends('template.main')

{{-- @section('metas')
    <meta property="og:title" content="{{ $lote->nome }} - {{ $lote->fazenda->nome_fazenda }}" />
    <meta property="og:description"
        content="{{ $lote->nome }} da raça {{ $lote->raca->nome }} na reserva da fazenda {{ $lote->fazenda->nome_fazenda }}" />
    <meta property="og:url" content="{{ url()->full() }}" />
    <meta property="og:image" content="{{ asset($lote->preview) }}" />
@endsection --}}

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/magnific.popup.css') }}">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
    <style>
        body {
            background-color: #FBFBFB;
        }

    </style>
@endsection

@section('conteudo')
    @if (!$lote->reserva->encerrada)
        <div class="d-flex flex-column align-items-center justify-content-center" style="position: fixed; top: calc(50% - 100px); left: 0px; background-color: rgba(21, 23, 30, 0.90); width: 70px; z-index: 90;">
            <div class="mt-4 icones-info d-flex flex-column align-items-center" data-toggle="modal"
            data-target="#modalFrete">
                <img class="mb-2 cpointer" src="{{ asset('imagens/icon_frete.png') }}" style="width: 35px; height: auto;" alt="">
                <span style="font-size: 10px;">Frete</span>
            </div>
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
        </div>
    @endif
    <div class="container-fluid barra-lote-fixa" style="display: none;">
        <div class="mx-auto w1200">
            <div class="py-3 row align-items-center">
                <div class="text-white col-12 col-sm-6">
                    @if(session()->get("cliente"))
                        <div class="row">
                            <div class="col-6 text-center text-sm-left @if (!$lote->reserva->preco_disponivel && !$lote->liberar_preco) blur @endif">
                                @if ($lote->reserva->preco_disponivel || $lote->liberar_preco)
                                    @if ($lote->reserva->parcelas_mes == 1)
                                        <h4 style="font-size: 18px;"><b>{{ $lote->parcelas }}x</b> de
                                            <b>R${{ number_format($lote->preco / $lote->parcelas, 2, ',', '.') }}</b>
                                        </h4>
                                    @else
                                        <div>
                                            <h4><b>30</b>x (15 duplas) de
                                                <b>R${{ number_format($lote->preco / ($lote->parcelas), 2, ',', '.') }}</b>
                                            </h4>
                                        </div>
                                    @endif
                                @else
                                    <h4><b>0x</b> de <b>R$0000,00</b></h4>
                                @endif
                                @if ($lote->reserva->preco_disponivel || $lote->liberar_preco)
                                    <span>{{ __('messages.lote.ou') }} R${{ number_format($lote->preco - ($lote->preco * $lote->reserva->desconto) / 100, 2, ',', '.') }}
                                        {{ __('messages.lote.a_vista') }}</span>
                                @else
                                    <span>R$00000,00</span>
                                @endif
                            </div>
                            <div class="col-6 d-flex align-items-center justify-content-center justify-content-sm-end mt-lg-0">
                                <div class="text-center text-white">
                                    @if (!$lote->reserva->encerrada)
                                        @if (!$lote->reserva->compra_disponivel && !$lote->liberar_compra)
                                            <button name="" id="" class="px-5 py-2 mx-auto btn btn-vermelho btn-block"
                                                style="max-width:350px;">{{ __('messages.botoes.disponivel_live') }}</button>
                                        @else
                                            @if (!$lote->reservado && !$lote->negociacao)
                                                @if (session()->get('cliente'))
                                                    @if ($cliente->aprovado)
                                                        @if ($lote->modalidade == 0)
                                                            <a name="" id=""
                                                                class="px-5 py-2 mx-auto btn btn-vermelho btn-block"
                                                                style="max-width:350px;"
                                                                href="{{ route('carrinho.adicionar', ['lote' => $lote]) }}"
                                                                role="button">{{ __('messages.botoes.comprar') }}</a>
                                                        @else
                                                            <a name="" id=""
                                                                class="px-5 py-2 mx-auto btn btn-vermelho btn-block cpointer"
                                                                data-toggle="modal" data-target="#modalLance"
                                                                style="max-width:350px;" role="button">Dar Lance</a>
                                                        @endif
                                                    @else
                                                        <a name="" id=""
                                                            class="px-5 py-2 mx-auto btn btn-vermelho btn-block cpointer"
                                                            data-toggle="modal" data-target="#modalBloqueio"
                                                            style="max-width:350px;" role="button">{{ __('messages.botoes.comprar') }}</a>
                                                    @endif
                                                @else
                                                    <a name="" id="" class="px-5 py-2 mx-auto btn btn-vermelho btn-block"
                                                        style="max-width:350px;" href="{{ route('login') }}"
                                                        role="button">{{ __('messages.botoes.entre_comprar') }}</a>
                                                @endif
                                            @else
                                                @if ($lote->reservado)
                                                    <button name="" id="" class="px-5 py-2 mx-auto btn btn-verde btn-block"
                                                        style="max-width:350px;">{{ __('messages.botoes.vendido') }}</button>
                                                @else
                                                    <button name="" id="" class="px-5 py-2 mx-auto btn-laranja btn-block"
                                                        style="max-width:350px;">{{ __('messages.botoes.reservado') }}</button>
                                                @endif
                                            @endif
                                        @endif
                                    @else
                                        <button name="" id="" class="px-5 py-2 mx-auto btn btn-vermelho btn-block"
                                            style="max-width:350px;">{{ __('messages.botoes.encerrada') }}</button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                
            </div>
        </div>
    </div>
    @if (!$lote->pacote)
        <div class=""
            style="background-color: #15171e; background-blend-mode: darken; @if($reserva->fazenda->fundo_conheca_lotes) background: rgba(0, 0, 0, .65) url(/{{ $reserva->fazenda->fundo_conheca_lotes }}) @endif; background-size: cover; background-position: center;">
            <div class="py-5 container-fluid bg-preto py-lg-2" id="row-preco-compra">
                <div class="container pt-4">
                    <div class="pb-4 row align-items-center">
                        <div class="text-white col-12 col-lg-2 justify-content-center d-flex align-items-center">
                            <img src="{{ asset($fazenda->logo) }}" style="width: 100%; max-width: 250px;" alt="">
                        </div>
                        <div class="mt-5 text-white col-12 col-lg-7 mt-lg-0">
                            <div class="row">
                                <div class="text-center col-12 text-lg-right">
                                    <h2>{{ $lote->nome }}</h2>
                                </div>
                            </div>
                            @if (session()->get('cliente'))
                                @if ($lote->modalidade == 0)
                                    @switch($lote->modelo_preco)
                                        @case(0)
                                            @include('includes.precos.modelo00')
                                        @break

                                        @case(1)
                                            @include('includes.precos.modelo01')
                                        @break
                                    @endswitch
                                @else
                                    @if ($lote->lances->count() == 0)
                                        <div class="row">
                                            <div
                                                class="col-12 text-center text-lg-right @if (!$lote->reserva->preco_disponivel && !$lote->liberar_preco) blur @endif">
                                                @if ($lote->reserva->preco_disponivel || $lote->liberar_preco)
                                                    <h5>
                                                        <b>Lance mínimo:</b>
                                                        R${{ number_format($lote->preco, 2, ',', '.') }}
                                                    </h5>
                                                @else
                                                    <h4><b>0x</b> de <b>R$0000,00</b></h4>
                                                @endif
                                            </div>
                                        </div>
                                    @else
                                        <div class="row">
                                            <div class="text-center col-12 text-lg-right">
                                                <span><b>Maior lance:</b>
                                                    @php
                                                        $lance = $lote->lances->sortByDesc('created_at')->first();
                                                    @endphp
                                                    <span id="text_maior_lance"
                                                        lid="{{ $lance->id }}">{{ $lance->cliente->nome_dono }} -
                                                        <b>R${{ number_format($lance->valor, 2, ',', '.') }}</b></span>
                                                </span>
                                            </div>
                                        </div>
                                    @endif
                                @endif
                            @endif
                        </div>
                        <div class="mt-3 col-12 col-lg-3 d-flex align-items-center justify-content-center mt-lg-0">
                            <div class="text-center text-white">
                                @if (!$lote->reserva->encerrada)
                                    @if (!$lote->reserva->compra_disponivel && !$lote->liberar_compra)
                                        <button name="" id="" class="px-5 py-2 mx-auto btn btn-vermelho btn-block"
                                            style="max-width:350px;">{{ __('messages.botoes.disponivel_live') }}</button>
                                    @else
                                        @if (!$lote->reservado && !$lote->negociacao)
                                            @if (session()->get('cliente'))
                                                @if ($cliente->aprovado)
                                                    @if ($lote->modalidade == 0)
                                                        <a name="" id=""
                                                            class="px-5 py-2 mx-auto btn btn-vermelho btn-block"
                                                            style="max-width:350px;"
                                                            href="{{ route('carrinho.adicionar', ['lote' => $lote]) }}"
                                                            role="button">{{ __('messages.botoes.comprar') }}</a>
                                                    @else
                                                        <a name="" id=""
                                                            class="px-5 py-2 mx-auto btn btn-vermelho btn-block cpointer"
                                                            data-toggle="modal" data-target="#modalLance"
                                                            style="max-width:350px;" role="button">Dar Lance</a>
                                                    @endif
                                                @else
                                                    <a name="" id=""
                                                        class="px-5 py-2 mx-auto btn btn-vermelho btn-block cpointer"
                                                        data-toggle="modal" data-target="#modalBloqueio"
                                                        style="max-width:350px;" role="button">{{ __('messages.botoes.comprar') }}</a>
                                                @endif
                                            @else
                                                <a name="" id="" class="px-5 py-2 mx-auto btn btn-vermelho btn-block"
                                                    style="max-width:350px;" href="{{ route('login') }}"
                                                    role="button">{{ __('messages.botoes.entre_comprar') }}</a>
                                            @endif
                                        @else
                                            @if ($lote->reservado)
                                                <button name="" id="" class="px-5 py-2 mx-auto btn btn-verde btn-block"
                                                    style="max-width:350px;">{{ __('messages.botoes.vendido') }}</button>
                                            @else
                                                <button name="" id="" class="px-5 py-2 mx-auto btn-laranja btn-block"
                                                    style="max-width:350px;">{{ __('messages.botoes.reservado') }}</button>
                                            @endif
                                        @endif
                                    @endif
                                @else
                                    <button name="" id="" class="px-5 py-2 mx-auto btn btn-vermelho btn-block"
                                        style="max-width:350px;">{{ __('messages.botoes.encerrada') }}</button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pt-5 pb-5 mx-auto w1200 pb-lg-0" style="">
                <div class="pb-4 container-fluid">
                    <div class="px-5 py-4 row justify-content-between">
                        <div>
                            @if (!isset($finalizadas))
                                <a href="{{ route('fazenda.lotes', ['fazenda' => $lote->reserva->fazenda->slug, 'reserva' => $reserva]) }}"><span
                                        style="color: #E8521B !important; font-size: 16px; font-family: 'Montserrat', sans-serif; font-weight: bold;"><i
                                            class="mr-2 fas fa-arrow-left"></i> {{ __('messages.botoes.voltar') }}</span></a>
                            @else
                                <a
                                    href="{{ route('reservas.finalizadas.fazenda.lotes', ['fazenda' => $lote->reserva->fazenda->slug,'reserva' => $reserva]) }}"><span
                                        style="color: #E8521B !important; font-size: 16px; font-family: 'Montserrat', sans-serif; font-weight: bold;"><i
                                            class="mr-2 fas fa-arrow-left"></i> {{ __('messages.botoes.voltar') }}</span></a>
                            @endif
                        </div>
                        <div class="text-right">
                            <i class="text-white fas fa-paper-plane fa-lg cpointer" data-toggle="modal"
                                data-target="#modalCompartilhamento"></i>
                        </div>
                    </div>
                    <div class="mt-5 row justify-content-center" style="position: relative;">
                        <div class="px-3 text-center video-lote px-lg-0" style="max-width: 100%; position: relative;">
                            {!! $lote->video !!}
                            @if ($lote->porcentagem < 100)
                                <img class="" src=" {{ asset('imagens/selo-50.png') }}"
                                    style="width: 50px; height: 50px; position: absolute; right:0px; top:-10px;" alt="">
                            @endif
                        </div>
                        <div class="px-4 mt-4 ml-0 text-center ml-lg-5 mt-lg-0 px-lg-0 text-lg-left"
                            style="position: relative;">

                            <div class="row">
                                <div class="px-0 text-white col-12 text-lote-info">
                                    <h1>Lote {{ str_pad($lote->numero, 3, '0', STR_PAD_LEFT) }}{{ $lote->letra }}</h1>
                                    <h2>{{ $lote->nome }}</h2>
                                </div>
                            </div>
                            @switch($lote->modelo_exibicao)
                                @case(0)
                                    @include('includes.lote.modelo00')
                                @break

                                ;
                                @case(1)
                                    @include('includes.lote.modelo01')
                                @break

                                ;
                                @case(2)
                                    @include('includes.lote.modelo02')
                                @break

                                ;
                                @case(3)
                                    @include('includes.lote.modelo03')
                                @break

                                ;
                                @case(4)
                                    @include('includes.lote.modelo04')
                                @break

                                ;
                                @case(5)
                                    @include('includes.lote.modelo05')
                                @break

                                ;
                                @case(6)
                                    @include('includes.lote.modelo06')
                                @break

                                ;
                                @case(7)
                                    @include('includes.lote.modelo07')
                                @break

                                ;

                                @default
                                    @include('includes.lote.modelo02')
                                @break

                                ;
                            @endswitch
                            <div class="mt-2 row justify-content-center justify-content-lg-start">
                                <div class="px-0 text-white col-12 text-lote-info">
                                    <div class="text-lote-info" style="width: 100%; max-width: 540px;">
                                        <span><b>{{ __('messages.lote.observacoes') }}:</b></span><br>
                                        <span>{!! str_replace("\n", '<br>', $lote->observacoes) !!}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-5 container-fluid">

            <div class="mx-auto w1200">
                <div class="row">
                    <div class="text-center col-12 text-lg-left">
                        <h4>{{ __('messages.lote.genealogia') }}</h4>
                    </div>
                </div>
            </div>

            @if ($lote->genealogia)
                <div class="row">
                    <div class="py-5 text-center col-12">
                        <a id="link-genealogia" href="{{ asset($lote->genealogia) }}">
                            <img id="imagem-genealogia" src="{{ asset($lote->genealogia) }}" style="max-width: 100%;"
                                alt="Genealogia">
                        </a>
                    </div>
                </div>
            @endif
            <div class="container-fluid">
                <div class="py-4 row">
                    <div class="text-center col-12">
                        <a href="https://api.whatsapp.com/send?phone={{ $lote->reserva->telefone_consultor }}"
                            target="_blank" class="px-4 py-2 btn btn-vermelho">{{ __('messages.botoes.falar_consultor') }}:</a>
                    </div>
                </div>
            </div>
        </div>

        {{-- <hr> --}}
        <div class="container-fluid">
            @if ($lote->catalogo)
                <div class="py-3 row">
                    <div class="text-center col-12 link-download-catalogo">
                        <a class="link-download-catalogo" href="{{ asset($lote->catalogo) }}"
                            download="{{ $lote->numero . '-' . $lote->nome }}"><i
                                class="mr-3 fas fa-file-download"></i>Baixar
                            PDF do Lote</a>
                    </div>
                </div>
            @endif
            {{-- <div class="mt-4 row mb-lg-2">
                <div class="text-center col-12">
                    <button class="px-3 py-2 my-2 btn btn-vermelho my-lg-0" data-toggle="modal" data-target="#modalFrete">Frete e Pagamento</button>
                    <br class="d-lg-none">
                    <button class="px-3 py-2 my-2 btn btn-vermelho my-lg-0" data-toggle="modal" data-target="#modalSeguranca">Segurança e Garantia</button>
                    <br class="d-lg-none">
                    <button class="px-3 py-2 my-2 btn btn-vermelho my-lg-0" data-toggle="modal" data-target="#modalAssessoria">Assessoria</button>
                </div>
            </div>
            <div class="mb-4 row">
                <div class="text-center col-12">
                    <button class="px-3 py-2 my-2 btn btn-vermelho my-lg-0" data-toggle="modal" data-target="#modalFunciona">Como funciona</button>
                    <br class="d-lg-none">
                    <button class="px-3 py-2 my-2 btn btn-vermelho my-lg-0" data-toggle="modal" data-target="#modalPapel">Papel da Agroreserva</button>
                </div>
            </div> --}}
        </div>
        {{-- <hr> --}}
        
        </div>
        @if ($configuracao->mostrar_lotes_destaque)
                @livewire("slide-lotes-destaque", ["reserva" => $reserva])
        @endif
        @if ($lote->recomendados->count() > 0)
            <div class="py-5 container-fluid">
                <div class="mx-auto w1200">
                    <div class="row">
                        <div class="text-center col-12">
                            <h5>Você também pode gostar:</h5>
                        </div>
                    </div>
                    <div class="row justify-content-center justify-content-lg-center" id="recomendacoes-lotes">
                        <div class="col-12">
                            <div class="slick">
                                @foreach ($lote->recomendados as $lote)
                                    @if ($lote->pacote)
                                        @switch($lote->modelo_exibicao)
                                            @case(0)
                                                @include('includes.lotes.pacotes.modelo00')
                                            @break

                                            ;
                                            @case(2)
                                                @include('includes.lotes.pacotes.modelo00')
                                            @break

                                            ;

                                            @default
                                                @include('includes.lotes.pacotes.modelo00')
                                            @break

                                            ;
                                        @endswitch
                                    @else
                                        @switch($lote->modelo_exibicao)
                                            @case(0)
                                                @include('includes.lotes.modelo00')
                                            @break

                                            ;
                                            @case(1)
                                                @include('includes.lotes.modelo01')
                                            @break

                                            ;
                                            @case(2)
                                                @include('includes.lotes.modelo02')
                                            @break

                                            ;
                                            @case(3)
                                                @include('includes.lotes.modelo03')
                                            @break

                                            ;
                                            @case(4)
                                                @include('includes.lotes.modelo04')
                                            @break

                                            ;
                                            @case(5)
                                                @include('includes.lotes.modelo05')
                                            @break;

                                            @case(8)
                                                @include('includes.lotes.modelo08')
                                            @break;

                                            @default
                                                @include('includes.lotes.modelo02')
                                            @break

                                            ;
                                        @endswitch
                                    @endif
                                @endforeach
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        @endif

        @php
            $lote = $lote_bkp;
        @endphp

        <!-- Modal -->
        <div class="modal fade" id="modalFrete" tabindex="-1" role="dialog" aria-labelledby="modalFreteTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="pb-4 modal-body">
                        <div class="row">
                            <div class="text-center col-12 text-red">
                                <h4><b>FRETE</b></h4>
                            </div>
                        </div>
                        <div class="px-4 mt-3 row">
                            <div class="col-12">
                                {!! $lote->reserva->texto_local_retirada !!}
                            </div>
                        </div>
                        @if($fazenda->iframe_google)
                            <div class="px-4 mt-3 row">
                                <div class="col-12" id="row_iframe_google">
                                    {!! $fazenda->iframe_google !!}
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        </div>
    @else
        @php
            $cont = 0;
        @endphp
        @foreach ($lote->membros as $membro)
            <div @if ($cont != 0) class="pb-5" @endif
                style="background-color: black; background-size: cover; background-position: center;">
                @if ($cont == 0)
                    {{-- FAIXA DE PREÇO --}}
                    <div class="py-5 container-fluid bg-preto py-lg-2">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="text-white col-12 col-lg-2 justify-content-center d-flex align-items-center">
                                    <img src="{{ asset($fazenda->logo) }}" style="width: 100%; max-width: 300px;" alt="">
                                </div>
                                <div class="mt-5 text-white col-12 col-lg-7 mt-lg-0">
                                    <div class="row">
                                        <div class="text-center col-12 text-lg-right">
                                            <h2>{{ $lote->nome }}</h2>
                                        </div>
                                    </div>
                                    {{-- PRECO AQUI --}}
                                    @switch($lote->modelo_preco)
                                        @case(0)
                                            @include('includes.precos.modelo00')
                                        @break

                                        @case(1)
                                            @include('includes.precos.modelo01')
                                        @break
                                    @endswitch

                                </div>
                                <div class="mt-3 col-12 col-lg-3 d-flex align-items-center justify-content-center mt-lg-0">
                                    <div class="text-center text-white">
                                        @if (!$lote->reserva->encerrada)
                                            @if (!$lote->reserva->compra_disponivel && !$lote->liberar_compra)
                                                {{-- <button name="" id="" class="px-5 py-2 mx-auto btn btn-vermelho btn-block" style="max-width:350px;">Disponível {{date("d/m", strtotime($lote->reserva->inicio))}}</button> --}}
                                                <button name="" id="" class="px-5 py-2 mx-auto btn btn-vermelho btn-block"
                                                    style="max-width:350px;">Disponível na Live</button>
                                            @else
                                                @if (!$lote->reservado)
                                                    @if (session()->get('cliente'))
                                                        @if ($cliente->aprovado)
                                                            <a name="" id=""
                                                                class="px-5 py-2 mx-auto btn btn-vermelho btn-block"
                                                                style="max-width:350px;"
                                                                href="{{ route('carrinho.adicionar', ['lote' => $lote]) }}"
                                                                role="button">Comprar</a>
                                                        @else
                                                            <a name="" id=""
                                                                class="px-5 py-2 mx-auto btn btn-vermelho btn-block cpointer"
                                                                data-toggle="modal" data-target="#modalBloqueio"
                                                                style="max-width:350px;" role="button">Comprar</a>
                                                        @endif
                                                    @else
                                                        <a name="" id=""
                                                            class="px-5 py-2 mx-auto btn btn-vermelho btn-block"
                                                            style="max-width:350px;" href="{{ route('login') }}"
                                                            role="button">Entre
                                                            para comprar</a>
                                                    @endif
                                                @else
                                                    <button name="" id=""
                                                        class="px-5 py-2 mx-auto btn btn-vermelho btn-block"
                                                        style="max-width:350px;">Reservado</button>
                                                @endif
                                            @endif
                                        @else
                                            <button name="" id="" class="px-5 py-2 mx-auto btn btn-vermelho btn-block"
                                                style="max-width:350px;">Encerrada</button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="pt-5 pb-5 mx-auto w1200 pb-lg-0" style="">
                    <div class="container-fluid">
                        @if ($cont == 0)
                            {{-- BOTÃO DE VOLTAR --}}
                            <div class="px-4 py-4 row">
                                <div class="col-12">
                                    @if (!isset($finalizadas))
                                        <a
                                            href="{{ route('fazenda.lotes', ['fazenda' => $membro->reserva->fazenda->slug, 'reserva' => $reserva]) }}"><span
                                                style="color: #E8521B !important; font-size: 16px; font-family: 'Montserrat', sans-serif; font-weight: bold;"><i
                                                    class="mr-2 fas fa-arrow-left"></i> Voltar</span></a>
                                    @else
                                        <a
                                            href="{{ route('reservas.finalizadas.fazenda.lotes', ['fazenda' => $membro->reserva->fazenda->slug,'reserva' => $reserva]) }}"><span
                                                style="color: #E8521B !important; font-size: 16px; font-family: 'Montserrat', sans-serif; font-weight: bold;"><i
                                                    class="mr-2 fas fa-arrow-left"></i> Voltar</span></a>
                                    @endif
                                </div>
                            </div>
                        @endif
                        <div class="mt-5 row justify-content-center" style="position: relative;">
                            {{-- <img class="d-none d-lg-block" src="{{asset('imagens/selo-50.png')}}" style="width: 50px; height: 50px; position: absolute; right:0px; top:0px;" alt=""> --}}

                            <div class="px-3 text-center video-lote px-lg-0" style="max-width: 100%; position: relative;">
                                {!! \App\Classes\Util::convertYoutube($membro->video) !!}
                                @if ($membro->porcentagem < 100)
                                    <img class="" src=" {{ asset('imagens/selo-50.png') }}"
                                        style="width: 50px; height: 50px; position: absolute; right:0px; top:-10px;" alt="">
                                @endif
                            </div>
                            <div class="px-4 mt-4 ml-0 text-center ml-lg-5 mt-lg-0 px-lg-0 text-lg-left"
                                style="position: relative;">

                                <div class="row">
                                    <div class="px-0 text-white col-12 text-lote-info">
                                        <h1>Lote
                                            {{ str_pad($membro->numero, 3, '0', STR_PAD_LEFT) }}{{ $membro->letra }}
                                        </h1>
                                        <h2>{{ $membro->nome }}</h2>
                                    </div>
                                </div>
                                @switch($lote->modelo_exibicao)
                                    @case(0)
                                        @include('includes.lote.pacotes.modelo00')
                                    @break

                                    ;
                                    @case(2)
                                        @include('includes.lote.pacotes.modelo02')
                                    @break

                                    ;

                                    @default
                                        @include('includes.lote.pacotes.modelo02')
                                    @break

                                    ;
                                @endswitch
                                <div class="mt-2 row justify-content-center justify-content-lg-start">
                                    <div class="px-0 text-white col-12 text-lote-info">
                                        <div class="text-lote-info" style="width: 100%; max-width: 540px;">
                                            <span><b>Observações:</b></span><br>
                                            <span>{!! str_replace("\n", '<br>', $membro->observacoes) !!}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if (!$membro->reserva->encerrada)
                        @if ($cont == 0)
                            <div class="container-fluid" style="">
                                <div class="row align-items-center justify-content-center" style="min-height: 300px;">
                                    <div class="container-fluid">
                                        <div class="py-4 row justify-content-center py-lg-0 d-none d-lg-flex">
                                            <div class="px-3 text-center icones-info px-lg-5 cpointer" data-toggle="modal"
                                                data-target="#modalFrete">
                                                <div class="mb-3 icones-info">
                                                    <img src="{{ asset('imagens/icon_frete.png') }}" height="50" alt="">
                                                </div>
                                                <span>{{ __('messages.lote.raca') }}:</span>
                                            </div>
                                            <div class="px-3 text-center icones-info px-lg-5 cpointer" data-toggle="modal"
                                                data-target="#modalPagamento">
                                                <div class="mb-3 icones-info">
                                                    <img src="{{ asset('imagens/icon_pagamento.png') }}" height="50"
                                                        alt="">
                                                </div>
                                                <span>{{ __('messages.lote.pagamentos_condicoes') }}:</span>
                                            </div>
                                            <div class="px-3 mt-4 text-center icones-info mt-lg-0 px-lg-5 cpointer"
                                                data-toggle="modal" data-target="#modalSeguranca">
                                                <div class="mb-3 icones-info">
                                                    <img src="{{ asset('imagens/icon_seguranca.png') }}" height="50"
                                                        alt="">
                                                </div>
                                                <span>{{ __('messages.lote.seguranca') }}:</span>
                                            </div>
                                            {{-- <div class="px-3 mt-4 text-center icones-info mt-lg-0 px-lg-5 cpointer" data-toggle="modal" data-target="#modalComissao">
                                            <div class="mb-3 icones-info">
                                                <img src="{{asset('imagens/icon_porcentagem.png')}}" height="50" alt="">
                                            </div>
                                            <span>Comissão</span>
                                        </div> --}}
                                        </div>
                                        <div class="py-4 row justify-content-center py-lg-0 d-lg-none">
                                            <div class="px-3 text-center icones-info px-lg-5 cpointer" data-toggle="modal"
                                                data-target="#modalFrete">
                                                <div class="mx-auto mb-3 icones-info">
                                                    <img src="{{ asset('imagens/icon_frete.png') }}" height="80" alt="">
                                                </div>
                                                <span>{{ __('messages.lote.frete') }}:</span>
                                            </div>
                                            <div class="px-3 text-center icones-info px-lg-5 cpointer" data-toggle="modal"
                                                data-target="#modalPagamento">
                                                <div class="mx-auto mb-3 icones-info">
                                                    <img src="{{ asset('imagens/icon_pagamento.png') }}" height="80"
                                                        alt="">
                                                </div>
                                                <span>{{ __('messages.lote.pagamentos_condicoes') }}:</span>
                                            </div>
                                            <div class="px-3 mt-4 text-center icones-info mt-md-0 px-lg-5 cpointer"
                                                data-toggle="modal" data-target="#modalSeguranca">
                                                <div class="mx-auto mb-3 icones-info">
                                                    <img src="{{ asset('imagens/icon_seguranca.png') }}" height="80"
                                                        alt="">
                                                </div>
                                                <span>{{ __('messages.lote.seguranca') }}:</span>
                                            </div>
                                            {{-- <div class="px-3 mt-4 text-center icones-info mt-md-0 px-lg-5 cpointer" data-toggle="modal" data-target="#modalComissao">
                                            <div class="mx-auto mb-3 icones-info">
                                                <img src="{{asset('imagens/icon_porcentagem.png')}}" height="80" alt="">
                                            </div>
                                            <span>Comissão</span>
                                        </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endif
                </div>
                {{-- <div class="container-fluid">
                    <div class="pb-4 row">
                        <div class="text-center col-12">
                            <a href="https://api.whatsapp.com/send?phone=5514981809051" target="_blank" class="px-4 py-2 btn btn-vermelho">Quero falar com um consultor</a>
                        </div>
                    </div>
                </div> --}}
            </div>

            <div class="mt-5 container-fluid">

                <div class="mx-auto w1200">
                    <div class="row">
                        <div class="text-center col-12 text-lg-left">
                            <h4>{{ __('messages.lote.genealogia') }}:</h4>
                        </div>
                    </div>
                </div>

                @if ($membro->genealogia)
                    <div class="row">
                        <div class="py-5 text-center col-12">
                            <a id="link-genealogia" href="{{ asset($membro->genealogia) }}">
                                <img id="imagem-genealogia" src="{{ asset($membro->genealogia) }}"
                                    style="max-width: 100%;" alt="Genealogia">
                            </a>
                        </div>
                    </div>
                @endif
                <div class="container-fluid">
                    <div class="py-4 row">
                        <div class="text-center col-12">
                            <a href="https://api.whatsapp.com/send?phone={{ $membro->reserva->telefone_consultor }}"
                                target="_blank" class="px-4 py-2 btn btn-vermelho">{{ __('messages.botoes.falar_consultor') }}:</a>
                        </div>
                    </div>
                </div>
            </div>

            <hr>
            <div class="container-fluid">
                @if ($membro->catalogo)
                    <div class="py-3 row">
                        <div class="text-center col-12 link-download-catalogo">
                            <a class="link-download-catalogo" href="{{ asset($membro->catalogo) }}"
                                download="{{ $membro->numero . '-' . $membro->nome }}"><i
                                    class="mr-3 fas fa-file-download"></i>{{ __('messages.lotes.baixar_pdf_catalogo') }}:</a>
                        </div>
                    </div>
                @endif
                {{-- <div class="mt-4 row mb-lg-2">
                    <div class="text-center col-12">
                        <button class="px-3 py-2 my-2 btn btn-vermelho my-lg-0" data-toggle="modal" data-target="#modalFrete">Frete e Pagamento</button>
                        <br class="d-lg-none">
                        <button class="px-3 py-2 my-2 btn btn-vermelho my-lg-0" data-toggle="modal" data-target="#modalSeguranca">Segurança e Garantia</button>
                        <br class="d-lg-none">
                        <button class="px-3 py-2 my-2 btn btn-vermelho my-lg-0" data-toggle="modal" data-target="#modalAssessoria">Assessoria</button>
                    </div>
                </div>
                <div class="mb-4 row">
                    <div class="text-center col-12">
                        <button class="px-3 py-2 my-2 btn btn-vermelho my-lg-0" data-toggle="modal" data-target="#modalFunciona">Como funciona</button>
                        <br class="d-lg-none">
                        <button class="px-3 py-2 my-2 btn btn-vermelho my-lg-0" data-toggle="modal" data-target="#modalPapel">Papel da Agroreserva</button>
                    </div>
                </div> --}}
            </div>

            <!-- Modal -->
            <div class="modal fade" id="modalFrete" tabindex="-1" role="dialog" aria-labelledby="modalFreteTitle"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="pb-4 modal-body">
                            <div class="row">
                                <div class="text-center col-12 text-red">
                                    <h4><b>FRETE</b></h4>
                                </div>
                            </div>
                            <div class="px-4 mt-3 row">
                                {!! $lote->reserva->texto_local_retirada !!}
                            </div>
                            {{-- <div class="mt-3 row">
                                <div class="text-center col-12">
                                    <a href="" class="px-4 btn btn-vermelho">Contato</a>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
            </div>
            @php
                $cont++;
            @endphp
        @endforeach
    @endif

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
                            <a href="mailto:?subject=Lote {{ $lote->numero . $lote->letra }} da {{ $lote->fazenda->nome_fazenda }}. Genética superior à sua disposição. Vem ver.&amp;body=O {{ $lote->nome }} está na vitrine da Agro Reserva. Animal selecionado a dedo pra elevar os índices do seu rebanho. Clique no link e confira a oferta:%0D%0A%0D%0A{{ url()->full() }}"
                                class="ml-3" target="_blank"><i class="fas fa-envelope fa-2x"
                                    style="color: #c71610;"></i></a>
                            <a href="https://telegram.me/share/url?url={{ url()->full() }}&text=Venha conhecer o lote {{ $lote->numero . ' - ' . $lote->nome }} na Agroreserva."
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

    <!-- Modal -->
    <div class="modal fade" id="modalPagamento" tabindex="-1" role="dialog" aria-labelledby="modalPagamentoTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="pb-4 modal-body">
                    <div class="row">
                        <div class="text-center col-12 text-red">
                            <h4><b>PAGAMENTOS E CONDIÇÕES</b></h4>
                        </div>
                    </div>
                    <div class="px-4 mt-3 row">
                        <div class="text-justify col-12">
                            {!! $lote->reserva->texto_forma_pagamento !!}
                        </div>
                    </div>
                    {{-- <div class="mt-3 row">
                    <div class="text-center col-12">
                        <a href="" class="px-4 btn btn-vermelho">Contato</a>
                    </div>
                </div> --}}
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalSeguranca" tabindex="-1" role="dialog" aria-labelledby="modalSegurancaTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="text-center col-12 text-red">
                            <h4><b>SEGURANÇA</b></h4>
                        </div>
                    </div>
                    <div class="px-4 row">
                        <div class="text-justify col-12">
                            <p>A Agro Reserva toma todas as medidas cabíveis para garantir o cumprimento dos padrões de
                                confidencialidade e segurança, firmando acordos ou contratos com o objetivo de proteger a
                                privacidade dos dados pessoais de nossos usuários e cumprir a legislação aplicável.</p>
                            <p>Para mais informações, fale com a gente nos canais de atendimento disponíveis no site.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalComissao" tabindex="-1" role="dialog" aria-labelledby="modalComissaoTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="text-center col-12 text-red">
                            <h4><b>Como funciona?</b></h4>
                        </div>
                    </div>
                    <div class="px-4 row">
                        <div class="text-left col-12">
                            <p>A Agro Reserva traz benefícios para você, <b>comprador</b>, <b>ZERANDO</b> totalmente a
                                comissão.</p>
                            {{-- <ul class="mt-3">
                            <li><b>Pague à vista e não pague nada de comissão!</b></li>
                            <li class="mt-2">Pague em até 04 parcelas e concederemos 50% de desconto na sua comissão.</li>
                            <li class="mt-2">Pague em 05 parcelas ou mais e nós cobraremos apenas 4% de comissão.</li>
                        </ul> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalBloqueio" tabindex="-1" role="dialog" aria-labelledby="modalBloqueioTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="text-center col-12 text-red">
                            <h4><b>Desculpe</b></h4>
                        </div>
                    </div>
                    <div class="px-4 row">
                        <div class="text-left col-12">
                            <p>O seu cadastro <b>não está apto</b> a realizar compras nessa reserva. O mesmo pode estar em
                                análise ou ter sido reprovado.</p>
                            <p>Você pode consultar sua situação no seu painel de cliente ou falando com nosso consultor</p>
                            <div class="my-3 row">
                                <div class="text-center col-12">
                                    <a href="https://api.whatsapp.com/send?phone={{ $lote->reserva->telefone_consultor }}"
                                        target="_blank" class="px-4 py-2 btn btn-laranja">Falar com consultor</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalLance" tabindex="-1" role="dialog" aria-labelledby="modalLanceTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @php
                        $lance = $lote->lances->sortByDesc('created_at')->first();
                    @endphp
                    <div class="px-4 row">
                        <div class="form-group col-12">
                            <label for="" style="color: black;">Digite o valor do lance</label>
                            <input type="number" class="form-control" name="valor" id="valor_lance"
                                aria-describedby="helpId" style="width: 100%" placeholder=""
                                @if ($lote->lances->count() == 0) min="{{ $lote->preco }}" @else min="{{ $lance->valor + 1 }}" step="0.01" @endif>
                            <small id="helpId" class="form-text text-muted">O valor deve ser maior que o último lance ou
                                que o valor mínimo caso ainda não haja lances</small>
                        </div>
                        <div class="text-right form-group col-12">
                            <button type="submit" id="enviar_lance" class="py-1 btn btn-laranja">Enviar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalPapel" tabindex="-1" role="dialog" aria-labelledby="modalPapelTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="text-center col-12 text-red">
                            <h4>Papel da Agroreserva</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="text-left col-12">
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
                    <div class="mt-3 row">
                        <div class="text-center col-12">
                            <a href="" class="px-4 btn btn-vermelho">Contato</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalGenealogia" tabindex="-1" role="dialog" aria-labelledby="modalGenealogiaTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
            <div class="modal-content" style="background-color: transparent !important; ">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="px-0 py-0 modal-body">
                    <img id="imagem-modal" src="" alt="" style="transform: rotate(-90deg); max-width: 100vh;">
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{ asset('js/magnific.popup.js') }}"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src=" https://ajax.googleapis.com/ajax/libs/jqueryui/1.5.2/jquery-ui.min.js"></script>
    <script>
        $(document).ready(function() {
            $(document).ready(function() {

                verifica_lance();

                function verifica_lance() {
                    setTimeout(function() {
                        console.log("rodou");
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr(
                                    'content')
                            }
                        });

                        $.ajax({
                            type: "GET",
                            url: "{!! route('fazenda.lote.lance.maior', ['lote' => $lote->id]) !!}",
                            success: function(ret) {
                                if (ret != "erro") {
                                    if ($("#text_maior_lance").attr("lid") != ret.id) {
                                        $("#text_maior_lance").attr("lid", ret.id);
                                        var html = ret.nome;
                                        html += " - <b> R$" + parseFloat(ret.valor)
                                            .toFixed(2) + "</b>";
                                        $("#text_maior_lance").html(html);
                                        $("#modalLance").modal("hide");
                                        var audio = new Audio('/audios/cash.mp3');
                                        audio.play();
                                    }
                                }

                            },
                            error: function(ret) {
                                console.log("Deu muito ruim");
                                console.log(ret);
                            }
                        });

                        verifica_lance();
                    }, 5000);
                }

                $(window).scroll(function(){
                    // console.log("Scroll top:" + $(this).scrollTop());
                    // console.log("Scroll top:" + ($("#row-preco-compra").height() + "80"));
                    if($(this).scrollTop() > $("#row-preco-compra").height() + 80){
                        console.log("entrou scroll 1");
                        $(".barra-lote-fixa").slideDown(300);
                    }else{
                        console.log("entrou scroll 2");
                        $(".barra-lote-fixa").slideUp(300);
                    }
                });

                $("#enviar_lance").click(function() {

                    var valor = $("#valor_lance").val();

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr(
                                'content')
                        }
                    });

                    $.ajax({
                        type: "POST",
                        url: "{!! route('fazenda.lote.lance', ['lote' => $lote->id]) !!}",
                        data: {
                            valor: valor
                        },
                        // beforeSend: function() {
                        //     $("#botoes-prosseguir").hide();
                        //     $("#gif-ajax-direto").show();
                        // },
                        success: function(ret) {
                            if (ret != "erro") {
                                $("#text_maior_lance").attr("lid", ret.id);
                                var html = ret.nome;
                                html += " - <b> R$" + parseFloat(ret.valor).toFixed(2) +
                                    "</b>";
                                $("#text_maior_lance").html(html);
                                $("#modalLance").modal("hide");
                                var audio = new Audio('/audios/cash.mp3');
                                audio.play();
                            }

                        },
                        error: function(ret) {
                            console.log("Deu muito ruim");
                            console.log(ret);
                        }
                    });
                });

                $('#link-genealogia').magnificPopup({
                    type: 'image'
                });

                $(".slick").slick({

                    // normal options...
                    slidesToShow: 4,
                    infinite: true,
                    dots: true,
                    adaptiveHeight: true,
                    arrows: true,
                    autoplay: true,
                    autoplaySpeed: 4000,
                    // centerMode: true,
                    // the magic
                    responsive: [{

                        breakpoint: 1400,
                        settings: {
                            slidesToShow: 3,
                            infinite: true,
                            dots: true,
                            adaptiveHeight: true,
                            arrows: true,
                            autoplay: true,
                            autoplaySpeed: 4000,
                        }

                    }, {

                        breakpoint: 1030,
                        settings: {
                            slidesToShow: 2,
                            infinite: true,
                            dots: true,
                            adaptiveHeight: true,
                            arrows: true,
                            autoplay: true,
                            autoplaySpeed: 4000,
                        }

                    }, {

                        breakpoint: 760,
                        settings: {
                            slidesToShow: 1,
                            infinite: true,
                            dots: true,
                            centerMode: true,
                            adaptiveHeight: true,
                            arrows: true,
                            autoplay: true,
                            autoplaySpeed: 4000,
                        }

                    }]
                });
            });
        });
    </script>
@endsection
