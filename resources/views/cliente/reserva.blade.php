@extends('template.main')

@section('conteudo')
<div class="container py-5" style="min-height: 40vh;">
    <div class="row py-3">
        <div class="col-12">
            <a href="{{route('conta.index')}}"><span style="color: #E8521B !important; font-size: 16px; font-family: 'Montserrat', sans-serif; font-weight: bold;"><i class="fas fa-arrow-left mr-2"></i> Voltar</span></a>
        </div>
    </div>
    <div class="row">
        <div class="col-12 reserva-resumo-titulo">
            <h1>Resumo da reserva: #{{$venda->codigo}}</h1>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12 col-lg-8 py-3 text-left" style="border: 1px solid #F2f2f2;">
            <h4>Lotes</h4>
            <hr>
            @foreach($venda->carrinho->produtos as $produto)
                <div class="row">
                    <div class="col-12 col-lg-4">
                        <img src="{{asset($produto->lote->preview)}}" alt="" style="max-width: 350px;" class="w-100">
                    </div>
                    <div class="col-12 col-lg-8">
                        <p><b>LOTE {{$produto->lote->numero}}: {{$produto->lote->nome}}</b></p>
                        <p class="mt-n1"><b>Registro:</b> {{$produto->lote->registro}}</p>
                        <p class="mt-n1"><b>Raça:</b> {{$produto->lote->raca->nome}}</p>
                        <p class="mt-n1"><b>Valor:</b> R${{number_format($produto->lote->preco, 2, ",", ".")}}</p>
                        {{--  <div class="form-group">
                          <select class="form-control" style="max-width: 200px;" name="parcelamento" lid="{{$produto->lote_id}}" id="">
                            @for($i = 1; $i <= $produto->lote->parcelas; $i++)
                                <option value="{{$i}}">{{$i}}x de {{number_format(round($produto->lote->preco / $i, 2), 2, ",", ".")}}</option>
                            @endfor
                          </select>
                        </div>  --}}
                    </div>
                </div>
                <hr>
            @endforeach
        </div>
        <div class="col-12 col-lg-4 text-left py-3" style="border: 1px solid #F2f2f2;">
            <h4>Resumo</h4>
            <hr>
            <div class="container-fluid px-0">
                <div class="row">
                    <div class="col-12">
                        <b>Situação:</b> {{config("globals.situacoes")[$venda->situacao]}}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-12">
                        <b>Total:</b> R${{number_format($venda->carrinho->total, 2, ",", ".")}}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-12">
                        <b>Frete:</b> Retirada na fazenda
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-12">
                        <b>Parcelas:</b> {{$venda->parcelas}}x de {{number_format($venda->valor_parcela, 2, ",", ".")}}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-12">
                        <b>Descontos:</b> R${{number_format($venda->desconto, 2, ",", ".")}}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-12">
                        <b>Comissão (À vista):</b> R${{number_format($venda->comissao, 2, ",", ".")}}
                    </div>
                </div>
                <hr>
                <div class="row" style="backgorund-color: #F3F3F3">
                    <div class="col-12">
                        <b>Valor Final:</b> R${{number_format($venda->total, 2, ",", ".")}}
                    </div>
                </div>
                <hr>
                @if($venda->assessor_id)
                    <div class="row">
                        <div class="col-12">
                            <b>Assessorado por:</b> {{$venda->assessor->nome}}
                        </div>
                    </div>
                @endif
                <div class="row mt-4">
                    <div class="col-12 text-center">
                        <a href="" class="btn btn-laranja px-4 py-2">Falar com consultor</a>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection