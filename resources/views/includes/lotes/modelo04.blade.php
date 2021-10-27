<div class="coluna-caixa-lote mt-4">
    <div class="card card-caixa-lote mx-auto">
        <a href="{{route('fazenda.lote', ['fazenda' => $lote->reserva->fazenda->slug, 'lote' => $lote])}}">
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
            </div>
        </a>
        <div class="numero-lote">
            <h4>LOTE</h4>
            <h5 class="mb-2">{{str_pad($lote->numero, 3, "0", STR_PAD_LEFT)}}@if($lote->letra){{$lote->letra}}@endif</h5>
        </div>
        @if($lote->reserva->multi_fazendas)
            <div class="logo-fazenda">
                <img src="{{asset($lote->fazenda->logo)}}" style="width: 100%;" alt="">
            </div>
        @endif
        <div class="card-body card-lote-body" style="position: relative;">
            {{--  <a class="icone-compartilhamento" data-toggle="modal" data-target="#modalCompartilhamentoLote{{$lote->id}}"><i class="fas fa-info-circle"></i> Mais Informações</a>  --}}
            <div class="text-center d-flex align-items-center justify-content-center" style="height: 50px;">
                <a href="{{route('fazenda.lote', ['fazenda' => $lote->fazenda->slug, 'lote' => $lote])}}"><h5 class="card-title card-lote-nome text-black"><b>{{$lote->nome}}</b></h5></a>
            </div>
            <div class="container-fluid px-3">
                <div class="row pb-1 justify-content-center" style="border-bottom: 1px solid black;">
                    <div>
                        <b>{{$lote->ccg}}</b>
                    </div>
                </div>
                <div class="row py-1" style="border-bottom: 1px solid black;">
                    <div style="width: 65px;">
                        <b class="">RGD.: </b>
                    </div>
                    <div>
                        <span class="card-lote-info-text">{{$lote->registro}}</span>
                    </div>
                </div>
                <div class="row py-1" style="border-bottom: 1px solid black;">
                    <div>
                        <b class="">LACT. ATUAL.: </b>
                    </div>
                    <div class="pl-3">
                        <span class="card-lote-info-text">{{$lote->lact_atual}} KG/Dia</span>
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
                        @if(!isset($finalizadas))
                            <a class="card-lote-botao" href="{{route('fazenda.lote', ['fazenda' => $lote->reserva->fazenda->slug, 'lote' => $lote])}}"><button class="px-3 py-1">VER MAIS</button></a>
                        @else
                            <a class="card-lote-botao" href="{{route('reservas.finalizadas.fazenda.lote', ['fazenda' => $lote->fazenda->slug, 'lote' => $lote, 'reserva' => $reserva])}}"><button class="px-3 py-1">VER MAIS</button></a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>