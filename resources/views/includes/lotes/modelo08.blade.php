<div class="mt-4 coluna-caixa-lote" raca="{{$lote->raca->id}}">
    <div class="mx-auto card card-caixa-lote">
        <a href="{{route('fazenda.lote', ['fazenda' => $lote->reserva->fazenda->slug, 'lote' => $lote, 'reserva' => $lote->reserva])}}">
            <div class="d-flex align-items-center justify-content-center" style="position: relative; border-top-left-radius: 20px; border-top-right-radius: 20px; object-fit: contain; height:200px; background: url({{asset($lote->preview)}}); background-size: cover; background-position: top; background-repeat: no-repeat;">
                @if($lote->reservado)
                    <div class="py-2 text-center text-white faixa-reservado">
                        VENDIDO
                    </div>
                @elseif($lote->negociacao)
                    <div class="py-2 text-center text-white faixa-negociacao">
                        RESERVADO
                    </div>
                @endif
                @if($lote->porcentagem < 100)
                    <div class="py-2 text-center text-white selo-porcentagem">
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
                <a href="{{route('fazenda.lote', ['fazenda' => $lote->fazenda->slug, 'lote' => $lote, 'reserva' => $lote->reserva])}}"><h5 class="text-black card-title card-lote-nome"><b>{{$lote->nome}}</b></h5></a>
            </div>
            <div class="px-3 container-fluid">
                <div class="py-1 row" style="border-bottom: 1px solid black;">
                    <div style="width: 65px;">
                        <b class="mr-3">KG.: </b>
                    </div>
                    <div>
                        <span class="card-lote-info-text">{{$lote->peso}}Kg</span>
                    </div>
                </div>
                <div class="py-1 row" style="border-bottom: 1px solid black;">
                    <div style="width: 65px;">
                        <b class="mr-3">CE.: </b>
                    </div>
                    <div>
                        <span class="card-lote-info-text">{{$lote->ce}}</span>
                    </div>
                </div>
            </div>
            <div class="mt-2 container-fluid">
                <div class="row">
                    <div class="text-center col-12 card-lote-botao">
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