<div class="coluna-caixa-lote mt-4" raca="{{$lote->raca->id}}">
    <div class="card card-caixa-lote mx-auto">
        <a href="{{route('fazenda.lote', ['fazenda' => $lote->reserva->fazenda->slug, 'lote' => $lote, 'reserva' => $lote->reserva])}}">
            <div class="d-flex align-items-center justify-content-center" style="position: relative; border-top-left-radius: 20px; border-top-right-radius: 20px; object-fit: contain; height:200px; background: url({{asset($lote->preview)}}); background-size: cover; background-position: top; background-repeat: no-repeat;">
                @if($lote->reservado)
                    <div class="faixa-reservado text-center text-white py-2">
                        VENDIDO
                    </div>
                @elseif($lote->negociacao)
                    <div class="faixa-negociacao text-center text-white py-2">
                        RESERVADO
                    </div>
                @endif
                @if($lote->porcentagem < 100)
                    <div class="selo-porcentagem text-center text-white py-2">
                        <img src="{{asset('imagens/selo-50.png')}}" style="width: 50px; height: 50px;" alt="">
                    </div>
                @endif
                <div class="numero-lote">
                    <h4>LOTE</h4>
                    <h5 class="mb-2">{{str_pad($lote->numero, 3, "0", STR_PAD_LEFT)}}@if($lote->letra){{$lote->letra}}@endif</h5>
                </div>
            </div>
        </a>
        @if($lote->prioridade)
            <div class="lote-prioridade">
                <img src="{{ asset('imagens/medalha_prioridade.png') }}" width="50" alt="">
            </div>
        @endif
        
        @if($lote->reserva->multi_fazendas)
            <div class="logo-fazenda">
                <img src="{{asset($lote->fazenda->logo)}}" style="width: 100%;" alt="">
            </div>
        @endif
        <div class="card-body card-lote-body" style="position: relative;">
            {{--  <a class="icone-compartilhamento" data-toggle="modal" data-target="#modalCompartilhamentoLote{{$lote->id}}"><i class="fas fa-info-circle"></i> Mais Informações</a>  --}}
            <div class="text-center d-flex align-items-center justify-content-center" style="height: 50px;">
                <a href="{{route('fazenda.lote', ['fazenda' => $lote->fazenda->slug, 'lote' => $lote, 'reserva' => $lote->reserva])}}"><h5 class="card-title card-lote-nome text-black"><b>{{$lote->nome}}</b></h5></a>
            </div>
            <div class="container-fluid px-3">
                <div class="row pb-1 justify-content-center" style="border-bottom: 1px solid black;">
                    <div>
                        <b>{{$lote->ccg}}</b>
                    </div>
                </div>
                <div class="row py-1" style="border-bottom: 1px solid black;">
                    <div style="width: 25%;">
                        <b class="mr-3">RGD.: </b>
                    </div>
                    <div style="">
                        <span class="card-lote-info-text">{{$lote->registro . " " . $lote->rgn}}</span>
                    </div>
                </div>
                <div class="row py-1" style="border-bottom: 1px solid black;">
                    <div style="width: 31%;">
                        <b class="mr-3">PESO.: </b>
                    </div>
                    <div style="width: 20%;">
                        <span class="card-lote-info-text">{{$lote->peso}}Kg</span>
                    </div>
                    <div style="width: 28%;">
                        <b class="mr-3">C.E.: </b>
                    </div>
                    <div style="width: 17%">
                        <span class="card-lote-info-text">{{$lote->ce}}</span>
                    </div>
                </div>
                <div class="row py-1" style="border-bottom: 1px solid black;">
                    <div style="width: 31%;">
                        <b class="mr-3">IABCZ.: </b>
                    </div>
                    <div style="width: 20%;">
                        <span class="card-lote-info-text">{{$lote->iabczg}}</span>
                    </div>
                    <div style="width: 28%;">
                        <b class="mr-3">DECA.: </b>
                    </div>
                    <div style="width: 17%">
                        <span class="card-lote-info-text">{{$lote->deca}}</span>
                    </div>
                </div>
            </div>
                <div class="container-fluid mt-2">
                    <div class="row">
                        <div class="col-12 card-lote-parto text-center" style="height: 30px;">
                            @if($lote->parto)
                                <h3>{{ __('messages.lotes.ultimo_parto') }} <b>{{date('d/m/Y', strtotime($lote->parto))}}</b></h3>
                            @else
                                <h3>SEXO: {{mb_strtoupper($lote->sexo)}}</h3>
                            @endif
                        </div>
                    </div>
                </div>
            <div class="container-fluid mt-2">
                <div class="row">
                    <div class="col-12 card-lote-botao text-center">
                        @if(!isset($finalizadas))
                            <a class="card-lote-botao" href="{{route('fazenda.lote', ['fazenda' => $lote->reserva->fazenda->slug, 'lote' => $lote, 'reserva' => $lote->reserva])}}"><button class="px-3 py-1">{{ __('messages.lotes.ver_mais') }}</button></a>
                        @else
                            <a class="card-lote-botao" href="{{route('reservas.finalizadas.fazenda.lote', ['fazenda' => $lote->fazenda->slug, 'lote' => $lote, 'reserva' => $reserva])}}"><button class="px-3 py-1">{{ __('messages.lotes.ver_mais') }}</button></a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>