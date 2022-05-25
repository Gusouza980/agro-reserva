@extends('template.main')

@section('styles')
    <style>
        body {
            background-color: #F2F2F2;
        }

    </style>
@endsection

@section('conteudo')
    <div class="container-fluid" style="background-color: #15171e; background-blend-mode: darken; @if($reserva->fazenda->fundo_conheca_lotes) background: rgba(0, 0, 0, .65) url(/{{ $reserva->fazenda->fundo_conheca_lotes }}) @endif; background-size: cover; background-position: center;"
        <div class="pb-5" style="background-color: rgba(0,0,0,0.5);">
            <div class="py-5 container-fluid">
                <div class="container">
                    <div class="row">
                        <div class="text-center col-12 col-md-3">
                            <img src="{{ asset($fazenda->logo) }}" style="width: 100%; max-width: 300px;" alt="">
                        </div>
                        <div class="text-white col-12 col-md-9 d-none d-lg-flex align-items-center text-nav-fazenda">
                            @if($reserva->institucional)
                                <a class="@if (url()->current() == route('fazenda.conheca', ['fazenda' => $fazenda->slug, 'reserva' => $reserva])) active @endif"
                                    href="{{ route('fazenda.conheca', ['fazenda' => $fazenda->slug, 'reserva' => $reserva]) }}"><span><span
                                            style="border-bottom: 2px solid #FEB000;">Con</span>heça a fazenda</span></a>
                            @endif
                            @if($reserva->lotes->count() > 0)
                            <a class="ml-5 @if (url()->current() == route('fazenda.lotes', ['fazenda' => $fazenda->slug, 'reserva' => $reserva])) active @endif"
                                href="{{ route('fazenda.lotes', ['fazenda' => $fazenda->slug, 'reserva' => $reserva]) }}"><span><span
                                        style="border-bottom: 2px solid #FEB000;">Lot</span>es à venda</span> </a>
                            @endif
                            @if($reserva->embrioes->count() > 0)
                                <a class="ml-5 @if (url()->current() == route('fazenda.embrioes', ['fazenda' => $fazenda->slug, 'reserva' => $reserva])) active @endif"
                                    href="{{ route('fazenda.embrioes', ['fazenda' => $fazenda->slug, 'reserva' => $reserva]) }}"><span><span
                                            style="border-bottom: 2px solid #FEB000;">Emb</span>riões à venda</span> </a>
                            @endif
                        </div>
                        <div class="col-12 d-block d-lg-none">
                            @if($reserva->institucional)
                                <div class="row">
                                    <div class="mt-4 text-center col-12 text-nav-fazenda">
                                        <a class="@if (url()->current() == route('fazenda.conheca', ['fazenda' => $fazenda->slug, 'reserva' => $reserva])) active @endif"
                                            href="{{ route('fazenda.conheca', ['fazenda' => $fazenda->slug, 'reserva' => $reserva]) }}"><span><span
                                                    style="border-bottom: 2px solid #FEB000;">Con</span>heça a
                                                fazenda</span></a>
                                    </div>
                                </div>
                            @endif
                            @if($reserva->lotes->count() > 0)
                                <div class="row">
                                    <div class="mt-4 text-center col-12 text-nav-fazenda">
                                        <a class="ml-5 @if (url()->current() == route('fazenda.lotes', ['fazenda' => $fazenda->slug, 'reserva' => $reserva])) active @endif"
                                            href="{{ route('fazenda.lotes', ['fazenda' => $fazenda->slug, 'reserva' => $reserva]) }}"><span><span
                                                    style="border-bottom: 2px solid #FEB000;">Lot</span>es a venda</span> </a>
                                    </div>
                                </div>
                            @endif
                            @if($reserva->embrioes->count() > 0)
                                <div class="row">
                                    <div class="mt-4 text-center col-12 text-nav-fazenda">
                                        <a class="ml-5 @if (url()->current() == route('fazenda.embrioes', ['fazenda' => $fazenda->slug, 'reserva' => $reserva])) active @endif"
                                            href="{{ route('fazenda.embrioes', ['fazenda' => $fazenda->slug, 'reserva' => $reserva]) }}"><span><span
                                                    style="border-bottom: 2px solid #FEB000;">Emb</span>riões à venda</span> </a>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="py-5 container-fluid">
                <div class="row justify-content-center">
                    <div class="text-center col-12 col-lg-8 text-cadastro-lotes">
                        <h1>{{ __('messages.lotes.conheca_nossos_lotes') }}</h1>
                    </div>
                </div>
            </div>
            <div class="pb-4 mx-auto w1200">
                <div class="row">
                    <div class="text-center col-12 text-cta-comissao-lotes">
                        <h2>{{ __('messages.lotes.reserva') }}</h2>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="px-5 py-4 text-center text-cta-comissao-lotes py-lg-0"
                        style="background: url({{ asset('imagens/brush-laranja.png') }}); background-position: center; background-size: contain; background-repeat: no-repeat;">
                        <h1>{{ __('messages.lotes.0_comissao') }}</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="text-center col-12 text-cta-comissao-lotes">
                        <h2>{{ __('messages.lotes.comprador') }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="py-5 mx-auto w1200">
            <div class="row">
                <div
                    class="text-center col-12 col-lg-8 justify-content-center justify-content-lg-start text-lg-left align-items-center text-lotes d-flex">
                    <h3>Reserva {{ $fazenda->nome_fazenda }}</h3>
                </div>
                <div class="text-center col-12 col-lg-4 text-lg-right" id="filtro-racas">
                    {{-- <a class="link-filtro-racas cpointer ativo" raca="0">Todos</a>
                    @foreach($lotes->unique("raca_id") as $lote)
                        <a class="ml-3 link-filtro-racas cpointer" raca="{{$lote->raca->id}}">{{$lote->raca->nome}}</a>
                    @endforeach --}}
                </div>
            </div>
            <div class="py-4 row">
                <div class="col-12">
                    <a href="{{ route('index')}}"><span
                            style="color: #E8521B !important; font-size: 16px; font-family: 'Montserrat', sans-serif; font-weight: bold;"><i
                                class="mr-2 fas fa-arrow-left"></i> {{ __('messages.botoes.voltar') }}</span></a>
    
                </div>
            </div>
            @foreach($fazendas as $key => $fazenda)
                @php
                    $fazenda = \App\Models\Fazenda::find($fazenda);
                @endphp
                <div class="row">
                    <div class="px-3 py-3 mx-auto bg-preto">
                        <img src="{{ asset($fazenda->logo) }}" width="200" alt="">
                    </div>
                </div>
                <div class="row justify-content-center justify-content-lg-between" id="container-lotes">
                    @foreach($embrioes->where("fazenda_id", $fazenda->id)->sortBy("numero") as $embriao)
                        <div class="mt-4 coluna-caixa-lote">
                            <div class="mx-auto card card-caixa-lote">
                                <a href="{{ route('fazenda.embriao', ['fazenda' => $fazenda->slug, 'reserva' => $embriao->reserva, 'embriao' => $embriao]) }}">
                                    <div class="d-flex align-items-center justify-content-center" style="position: relative; border-top-left-radius: 20px; border-top-right-radius: 20px; object-fit: contain; height:200px; background: url({{asset('imagens/genetica.png')}}); background-size: cover; background-position: top; background-repeat: no-repeat;">
                                        <div class="numero-lote" style="background-color: #15171e !important; color: white !important;">
                                            <h4 style="color: white !important;">LOTE</h4>
                                            <h5 class="mb-2" style="color: white !important;">@if($embriao->prefixo_numero){{$embriao->prefixo_numero}}@endif{{str_pad($embriao->numero, 3, "0", STR_PAD_LEFT)}}@if($embriao->sufixo_numero){{$embriao->sufixo_numero}}@endif</h5>
                                        </div>
                                    </div>
                                </a>
                                {{-- <div class="logo-fazenda d-flex justify-content-center align-items-center" style="background-color: #15171e !important; height: 59px;">
                                    <img src="{{asset($embriao->reserva->fazenda->logo)}}" style="width: 100%;" alt="">
                                </div> --}}
                                <div class="card-body card-lote-body" style="position: relative;">
                                    {{--  <a class="icone-compartilhamento" data-toggle="modal" data-target="#modalCompartilhamentoLote{{$lote->id}}"><i class="fas fa-info-circle"></i> Mais Informações</a>  --}}
                                    {{-- <div class="text-center d-flex align-items-center justify-content-center" style="height: 50px;">
                                        <a><h5 class="text-black card-title card-lote-nome"><b>{{$embriao->grau_sangue}}</b></h5></a>
                                    </div> --}}
                                    <div class="px-3 container-fluid">
                                        <div class="pb-1 row justify-content-center" style="border-bottom: 1px solid black;">
                                            <div>
                                                <b>{{mb_strtoupper($embriao->grau_sangue)}}</b>
                                            </div>
                                        </div>
                                        <div class="py-1 row" style="border-bottom: 1px solid black;">
                                            <div style="width: 55px;">
                                                <b class="mr-3">Pai.: </b>
                                            </div>
                                            <div>
                                                <span class="">{{$embriao->nome_pai}}</span>
                                            </div>
                                        </div>
                                        <div class="py-1 row" style="border-bottom: 1px solid black;">
                                            <div style="width: 55px;">
                                                <b class="mr-3">Mãe.: </b>
                                            </div>
                                            <div>
                                                <span class="">{{$embriao->nome_mae}}</span>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <small>LACT. {{ $embriao->info_lactacao_mae }}</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-2 container-fluid">
                                        <div class="row">
                                            <div class="text-center col-12 card-lote-parto" style="height: 30px;">
                                                <h3>CATEGORIA: {{ mb_strtoupper(config("embrioes.categorias")[$embriao->categoria]) }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-2 container-fluid">
                                        <div class="row">
                                            <div class="text-center col-12 card-lote-botao">
                                                <a class="card-lote-botao" href="{{ route('fazenda.embriao', ['fazenda' => $fazenda->slug, 'reserva' => $embriao->reserva, 'embriao' => $embriao]) }}"><button class="px-3 py-1">{{ __('messages.lotes.ver_mais') }}</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    @endforeach
                </div>
            @endforeach
            {{-- @livewire("lotes.card", ['fazenda' => $fazenda, 'reserva' => $reserva]) --}}
        </div>
    </div>
    

    @if(!$reserva->institucional && $reserva->institucional_popup)
        <div class="modal fade" id="modalInstitucional" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="px-3 pt-2 pb-4 text-center modal-body">
                        <div class="row">
                            <div class="col-12">
                                {!! $reserva->fazenda->video_conheca !!}
                                {{-- <iframe id="iframe-video" style="width: 100%" height="450" src="https://www.youtube.com/embed/VY7WM1yxqB4?list=PLv1B2F3kxoML6VbVGVeCnhAFwediRXTt4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> --}}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection

@section('scripts')
    @if(!$reserva->institucional && $reserva->institucional_popup && $popup_institucional)
        <script>
            $(document).ready(function(){
                $("#modalInstitucional").modal("show");
                $('#modalInstitucional').on('hidden.bs.modal', function () {
                    $("#iframe-video").remove();
                });
            })
        </script>
    @endif
@endsection
