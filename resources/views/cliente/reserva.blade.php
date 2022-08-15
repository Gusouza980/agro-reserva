@extends('template.main2')

@section('conteudo')
<div class="w-full bg-[#F2F2F2] py-5 px-md-0" style="min-height: 40vh;">
    <div class="w1200 mx-auto bg-white px-3 py-3 rounded-lg">
        <div class="w-full py-3">
            <a href="{{route('conta.index')}}"><span style="color: #E8521B !important; font-size: 16px; font-family: 'Montserrat', sans-serif; font-weight: bold;"><i class="fas fa-arrow-left mr-2"></i> Voltar</span></a>
        </div>
        <div class="w-full d-flex justify-content-between">
            <div class="reserva-resumo-titulo">
                <h1>Resumo da reserva: #{{$venda->codigo}}</h1>
            </div>
            <div>
                <a href="{{route('conta.reserva.comprovante', ['venda' => $venda])}}" target="_blank" class="link-download-catalogo"><i class="fas fa-file-download mr-3"></i>Baixar Comprovante</a>
            </div>
        </div>
        <div class="w-full flex flex-column md:flex-row flex-lg-row mt-3">
            <div class="w-full md:w-3/5 py-3 text-left pr-md-3">
                <div class="w-full bg-slate-200 px-3 py-2 border-b-2 border-[#E8521B]" style="font-family: 'Montserrat', sans-serif;">
                    <span class="font-bold">Lotes</span>
                </div>
                @foreach($venda->carrinho->carrinho_produtos as $carrinho_produto)
                    <div class="w-full flex flex-row py-3">
                        <div class="w-full md:w-1/5">
                            <img src="{{asset($carrinho_produto->produto->produtable->preview)}}" alt="" style="max-width: 350px;" class="w-100">
                        </div>
                        <div class="w-full md:w-3/5 my-auto px-3 flex content-center flex-column justify-start">
                            <p><b>LOTE {{$carrinho_produto->produto->produtable->numero}}: {{$carrinho_produto->produto->produtable->nome}}</b></p>
                            <p class="mt-n1"><b>Registro:</b> {{$carrinho_produto->produto->produtable->registro}}</p>
                            <p class="mt-n1"><b>Raça:</b> {{$carrinho_produto->produto->produtable->raca->nome}}</p>
                            <p class="mt-n1"><b>Valor:</b> R${{number_format($carrinho_produto->produto->produtable->preco, 2, ",", ".")}}</p>
                        </div>
                    </div>
                    <hr>
                @endforeach
                <div class="w-full mt-6 bg-slate-200 px-3 py-2 border-b-2 border-[#E8521B]" style="font-family: 'Montserrat', sans-serif;">
                    <span class="font-bold">Parcelas</span>
                </div>
                @foreach($venda->getRelationValue("parcelas") as $parcela)
                    <div class="w-full">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Parcela</th>
                                    <th>Valor</th>
                                    <th>Vencimento</th>
                                    <th>Situação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="row">{{ $parcela->numero }}</td>
                                    <td>{{ number_format($parcela->valor, 2, ",", ".") }}</td>
                                    <td>{{ date("d/m/Y", strtotime($parcela->vencimento)) }}</td>
                                    <td>
                                        @if($parcela->recebido)
                                            <div class="badge badge-success">
                                                Recebido
                                            </div>
                                        @elseif(!$parcela->recebido && $parcela->vencimento < date("Y-m-d"))
                                            <div class="badge badge-error">
                                                Vencida
                                            </div>
                                        @else
                                            <div class="badge">
                                                Aguardando Pagamento
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                @endforeach
            </div>
            <div class="w-full md:w-2/5 text-left py-3 pl-md-3">
                <div class="w-full bg-slate-200 px-3 py-2 border-b-2 border-[#E8521B]" style="font-family: 'Montserrat', sans-serif;">
                    <span class="font-bold">Resumo</span>
                </div>
                <div class="flex flex-column py-3">
                    <div class="w-full py-1">
                        <b>Situação:</b> {{config("globals.situacoes")[$venda->situacao]}}
                    </div>
                    <div class="w-full py-1">
                        <b>Total:</b> R${{number_format($venda->carrinho->produtos->sum("preco"), 2, ",", ".")}}
                    </div>
                    <div class="w-full py-1">
                        <b>Frete:</b> Retirada na fazenda
                    </div>
                    <div class="w-full py-1">
                        <b>Parcelas:</b> {{$venda->parcelas}}x de {{number_format($venda->valor_parcela, 2, ",", ".")}}
                    </div>
                    <div class="w-full py-1">
                        <b>Descontos:</b> R${{number_format($venda->desconto, 2, ",", ".")}}
                    </div>
                    <div class="w-full py-1" style="backgorund-color: #F3F3F3">
                        <b>Valor Final:</b> R${{number_format($venda->total, 2, ",", ".")}}
                    </div>
                    @if($venda->assessor_id)
                        <div class="w-full py-1">
                            <b>Assessorado por:</b> {{$venda->assessor->nome}}
                        </div>
                    @endif
                    <div class="w-full py-1 mt-4 flex justify-center">
                        <a href="" class="bg-[#E8521B] text-white hover:bg-orange-700 rounded-full px-4 py-2">Falar com consultor</a>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection