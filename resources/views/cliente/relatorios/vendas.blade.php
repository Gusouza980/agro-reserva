<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <style>
            @page {
                margin: 0px 0px 0px 0px !important;
                padding: 0px 0px 0px 0px !important;
            }
            td{
                font-size: 13px;
            }
            .w650{
                width: 730px;
                margin: 0 auto;
            }
            .w100p{
                width: 100%;
            }
            .w50p{
                width: 50%;
            }
            .br-white{
                border-right: 1px solid white;
            }
            .bl-white{
                border-left: 1px solid white;
            }
            .bt-dotted-black{
                border-top: 2px dotted black;
            }
            td{
                font-size: 9px;
            }
            .container-break{
                page-break-inside: avoid !important;
            }
        </style>
    </head>
    <body>
        <div class="container-fluid w650 px-0">
            <div class="row w100p">
                <table class="w100p mt-4">
                    <tbody>
                        <tr>
                            <td style="text-align: left; width: 20%;"><img src="{{asset('imagens/logo_agroreserva_leite_escura.svg')}}" width="100" alt=""></td>
                            <td style="text-align: center; font-size: 18px !important; width: 60%;"><h3>MAPA DE COMPRA DA RESERVA {{ $reserva->fazenda->nome_fazenda }}</h3></td>
                            <td style="text-align: right; width: 20%;"><img src="{{asset($reserva->fazenda->logo)}}" style="filter:grayscale(100%);" width="100" alt=""></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="row w100p">
                <table class="w100p mt-4">
                    <tbody>
                        <tr>
                            <td style="background-color: #15171e; text-align: center; color: white; font-weight: bold; font-size: 13px">CONSOLIDADO RELAÇÃO DOS COMPRADORES DA RESERVA</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            @php
                $first = true;
            @endphp
            @foreach($vendas as $venda)
                <div class="w100p container-break px-0 py-0">
                    <div class="row w100p">
                        <table class="w100p @if($first) mt-4 @endif br-white table-sm">
                            <tbody>
                                <tr>
                                    <td class="table-bordered border-dark" style="background-color: #15171e; text-align: left; color: white; width: 10%;">Nome</td>
                                    <td class="table-bordered border-dark" colspan="3">{{ $venda->cliente->nome_dono }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row w100p">
                        <div class="col-4 px-0 py-0">
                            <table class="w100p mt-2 br-white table-sm">
                                <tbody>
                                    <tr>
                                        <td colspan="2" class="table-bordered border-dark" style="background-color: #15171e; text-align: left; color: white;">Lotes</td>
                                    </tr>
                                    @foreach($venda->carrinho->lotes as $lote)
                                        <tr>
                                            <td style="text-align:center;">LOTE {{ $lote->numero . $lote->letra }}</td>
                                            <td class="" style="text-align:center;">R${{ number_format($lote->preco, 2, ",", ".") }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="offset-4 col-8 px-0 py-0">
                            <table class="table-sm mt-2 w100p ml-3">
                                <tbody>
                                    <tr>
                                        <td class="table-bordered border-dark" style="background-color: #15171e; text-align: left; color: white; width: 25%;">TEL</td>
                                        <td class="table-bordered border-dark" style="width: 25%;">@if($venda->cliente->telefone) {{ $venda->cliente->telefone }} @else {{ $venda->cliente->whatsapp }} @endif</td>
                                        <td class="table-bordered border-dark" style="background-color: #15171e; text-align: left; color: white; width: 25%;">CIDADE/UF</td>
                                        <td class="table-bordered border-dark" style="width: 25%;">{{ $venda->cliente->cidade }}/{{ $venda->cliente->estado }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 25%;"><b>DESCONTO</b></td>    
                                        <td style="width: 25%;">R${{ number_format($venda->desconto, 2, ",", ".") }}</td>
                                        <td style="width: 25%;"><b>TOTAL DA COMPRA</b></td>    
                                        <td style="width: 25%;">R${{ number_format($venda->total, 2, ",", ".") }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 25%;"><b>FORMAS DE PAGAMENTO</b></td>    
                                        <td style="width: 25%;">{{ $venda->parcelas }}</td>
                                        <td style="width: 25%;"><b>VALOR DE PARCELA</b></td>    
                                        <td style="width: 25%;">R${{ number_format($venda->valor_parcela, 2, ",", ".") }}</td>
                                    </tr>
                                    <tr>
                                        <td class="" colspan="3" style="text-align: right;">
                                            <b>MÉDIA</b>
                                        </td>
                                        <td class="table-bordered border-dark" style="text-align: center;">
                                            R${{ number_format($venda->total / $venda->carrinho->lotes->count(), 2, ",", ".") }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @php
                    $first = false;
                @endphp
            @endforeach

            <div class="row w100p">
                <table class="table-sm table-bordered w100p mt-5">
                    <tr>
                        <td style="width: 80%; background-color: #15171e; text-align: right; color: white; font-weight: bold; font-size: 15px;">FATURAMENTO TOTAL DO EVENTO</td>
                        <td style="width: 20%; background-color: #15171e; text-align: right; color: white; font-weight: bold; font-size: 15px;">R$ {{ number_format($vendas->sum("total"), 2, ",", ".") }}</td>
                    </tr>
                    <tr>
                        <td style="width: 80%; text-align: right; color: black; font-weight: bold; font-size: 15px;">VALOR MENSAL ESTIMADO DAS PARCELAS</td>
                        <td style="width: 20%; text-align: right; color: black; font-weight: bold; font-size: 15px;">R${{ number_format($vendas->sum("valor_parcela"), 2, ",", ".") }}</td>
                    </tr>
                </table>
            </div>

            <div class="bt-dotted-black w100p mt-4"></div>

            <div class="row w100p">
                <table class="w100p mt-4">
                    <tbody>
                        <tr>
                            <td style="background-color: #15171e; text-align: center; color: white; font-weight: bold; font-size: 13px">DETALHAMENTO DOS COMPRADOS DA RESERVA</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            @foreach($vendas as $venda)
                <div class="row w100p">
                    <table class="w100p mt-4 table-sm table-bordered">
                        <tbody>
                            <tr>
                                <td colspan="6" style="background-color: #15171e; text-align: center; color: white; font-weight: bold; font-size: 13px">DADOS DO COMPRADOR</td>
                            </tr>
                            <tr>
                                <td style="width: 10%; background-color: #15171e; text-align: center; color: white;">NOME</td>
                                <td style="width: 40%">{{ $venda->cliente->nome_dono }}</td>
                                <td style="width: 10%; background-color: #15171e; text-align: center; color: white;">TEL 01</td>
                                <td style="width: 15%">{{ $venda->cliente->telefone }}</td>
                                <td style="width: 10%; background-color: #15171e; text-align: center; color: white;">TEL 02</td>
                                <td style="width: 15%">{{ $venda->cliente->whatsapp }}</td>
                            </tr>
                            <tr>
                                <td style="width: 10%; background-color: #15171e; text-align: center; color: white;">END.</td>
                                <td colspan="3">{{$venda->cliente->rua . ", n° " . $venda->cliente->numero . " " . $venda->cliente->bairro . " - " . $venda->cliente->cidade . " - " . $venda->cliente->estado . ", CEP:" . $venda->cliente->cep}}</td>
                                <td style="width: 10%; background-color: #15171e; text-align: center; color: white;">FAZ.</td>
                                <td style="width: 15%">{{ $venda->cliente->nome_fazenda }}</td>
                            </tr>
                            <tr>
                                <td style="width: 10%; background-color: #15171e; text-align: center; color: white;">CPF/CNPJ</td>
                                <td style="width: 40%;">@if($venda->cliente->pessoa_fisica) {{ $venda->cliente->cpf }} @else {{ $venda->cliente->cnpj }} @endif</td>
                                <td style="width: 10%; background-color: #15171e; text-align: center; color: white;">FAZ.</td>
                                <td colspan="3">{{ $venda->cliente->nome_fazenda }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            @endforeach
        </div>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>