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
            /* td{
                font-size: 11px;
            } */
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
            .btlb-black{
                border-top: 1px solid black !important;
                border-left: 1px solid black !important;
                border-bottom: 1px solid black !important;
            }
            .btrb-black{
                border-top: 1px solid black !important;
                border-left: 1px solid black !important;
                border-bottom: 1px solid black !important;
            }
            .bt-dotted-black{
                border-top: 2px dotted black;
            }
            td{
                font-size: 9px;
            }
            table{
                page-break-inside: avoid !important;
            }
            table,tbody,thead,.table{
                border-spacing: 0 !important; 
                padding: 0px 0px !important;
            }
            td,tr,th{
                /* height: auto !important; */
                padding: 5px 5px !important;
            }

            .nobl{
                border-left: 0px !important;
            }

            .nobr{
                border-right: 0px !important;
            }

            .nop{
                padding-left: 0px !important;
                padding-right: 0px !important;
            }

            .nopr{
                padding-right: 0px !important;
            }

            .nopl{
                padding-left: 0px !important;
            }

            .table-bordered,.table-bordered > tbody, .table-bordered > tbody > tr >td{
                border-top: 1px solid black !important;
                border-bottom: 1px solid black !important;
                border-left: 1px solid black !important;
                border-right: 1px solid black !important;
                border: 1px solid black !important;
            }
        </style>
    </head>
    <body>
        <div class="container-fluid w650 px-0">
            @php
                $jpg = Image::make(asset($reserva->fazenda->logo))->encode("jpg")->save('imagens/temp/' . $reserva->fazenda->id . 'jpg');
            @endphp
            <table class="w100p mt-4">
                <tbody>
                    <tr>
                        <td style="text-align: left; width: 20%;"><img src="{{asset('imagens/logo_agroreserva_leite_escura.svg')}}" width="100" alt=""></td>
                        <td style="text-align: center; font-size: 18px !important; width: 60%;"><h3>MAPA DE COMPRA DA RESERVA {{ mb_strtoupper($reserva->fazenda->nome_fazenda, 'UTF-8') }}</h3></td>
                        <td style="text-align: right; width: 20%;"><img src="{{asset($jpg)}}" style="filter:grayscale(100%);" width="100" alt=""></td>
                    </tr>
                </tbody>
            </table>
            <table class="w100p mt-4">
                <tbody>
                    <tr>
                        <td style="background-color: #15171e; text-align: center; color: white; font-weight: bold; font-size: 13px">CONSOLIDADO RELAÇÃO DOS COMPRADORES DA RESERVA</td>
                    </tr>
                </tbody>
            </table>
            @foreach($vendas as $venda)
                <table class="table table-borderless w100p mt-4">
                    <tbody>
                        <tr class="nop">
                            <td class="nop">
                                <table class="w100p">
                                    <tbody>
                                        <tr>
                                            <td class="table-bordered border-dark py-0" style="background-color: #15171e; text-align: left; color: white; width: 10%;">Nome</td>
                                            <td class="table-bordered border-dark py-0" colspan="3">{{ $venda->cliente->nome_dono }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr class="nop">
                            <td class="nop">
                                <table class="w100p" style="margin-top: -10px;">
                                    <tbody>
                                        <tr class="nopl">
                                            <td class="nopl">
                                                <table style="width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            <th colspan="2" class="py-0" style="background-color: #15171e; text-align: left; color: white; border: 1px solid black;">Lotes</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($venda->carrinho->lotes as $lote)
                                                            <tr>
                                                                <td class="py-0" style="text-align:center;">LOTE {{ $lote->numero . $lote->letra }}</td>
                                                                <td class="py-0" style="text-align:center;">R${{ number_format($lote->preco, 2, ",", ".") }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td class="nopr">
                                                <table style="border-spacing: 0 1.5px; width: 100%;">
                                                    <tbody>
                                                        <tr>
                                                            <td class="table-bordered border-dark py-0" style="background-color: #15171e; text-align: right; color: white; width: 25%;">TEL</td>
                                                            <td class="table-bordered border-dark py-0" style="width: 25%;">@if($venda->cliente->telefone) {{ $venda->cliente->telefone }} @else {{ $venda->cliente->whatsapp }} @endif</td>
                                                            <td class="table-bordered border-dark py-0" style="background-color: #15171e; text-align: right; color: white; width: 25%;">CIDADE/UF</td>
                                                            <td class="table-bordered border-dark py-0" style="width: 25%;">{{ $venda->cliente->cidade }}/{{ $venda->cliente->estado }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="py-0" style="width: 25%;"><b>DESCONTO</b></td>    
                                                            <td class="py-0" style="width: 25%; text-align: right;">R${{ number_format($venda->desconto + $venda->desconto_extra, 2, ",", ".") }}</td>
                                                            <td class="py-0" style="width: 25%;"><b>TOTAL DA COMPRA</b></td>    
                                                            <td class="py-0" style="width: 25%; text-align: right;">R${{ number_format($venda->total, 2, ",", ".") }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="py-0" style="width: 25%;"><b>FORMAS DE PAGAMENTO</b></td>    
                                                            <td class="py-0" style="width: 25%; text-align: right;">{{ $venda->parcelas }}</td>
                                                            <td class="py-0" style="width: 25%;"><b>VALOR DE PARCELA</b></td>    
                                                            <td class="py-0" style="width: 25%; text-align: right;">R${{ number_format($venda->valor_parcela, 2, ",", ".") }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="py-0" colspan="3" style="text-align: right;">
                                                                <b>MÉDIA</b>
                                                            </td>
                                                            <td class="table-bordered border-dark py-0" style="text-align: right;">
                                                                R${{ number_format($venda->total / $venda->carrinho->lotes->count(), 2, ",", ".") }}
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                    
                </table>
                
                
                <hr>
                
            @endforeach
            <table class="table-sm table-borderless w100p mt-5">
                <tr>
                    <td class="py-0" style="width: 80%; background-color: #15171e; text-align: right; color: white; font-weight: bold; font-size: 15px; border-right: 1px solid white !important;">FATURAMENTO TOTAL DO EVENTO</td>
                    <td class="py-0" style="width: 20%; background-color: #15171e; text-align: right; color: white; font-weight: bold; font-size: 15px;">R$ {{ number_format($vendas->sum("total"), 2, ",", ".") }}</td>
                </tr>
                {{-- <tr>
                    <td class="py-0" style="width: 80%; text-align: right; color: black; font-weight: bold; font-size: 15px;">VALOR MENSAL ESTIMADO DAS PARCELAS</td>
                    <td class="py-0" style="width: 20%; text-align: right; color: black; font-weight: bold; font-size: 15px;">R${{ number_format($vendas->sum("valor_parcela"), 2, ",", ".") }}</td>
                </tr> --}}
            </table>

            <hr style="margin-top: 40px; border-top: 1px dotted black">

            <table class="table table-borderless w100p mt-4">
                <tbody>
                    <tr>
                        <td class="py-0" style="background-color: #15171e; text-align: center; color: white; font-weight: bold; font-size: 13px">DETALHAMENTO DOS COMPRADOS DA RESERVA</td>
                    </tr>
                </tbody>
            </table>

            @foreach($vendas as $venda)
                <table class="w100p mt-4 table table-bordered border-dark">
                    <tbody>
                        <tr>
                            <td colspan="6" class="py-0" style="background-color: #15171e; text-align: center; color: white; font-weight: bold; font-size: 13px">DADOS DO COMPRADOR</td>
                        </tr>
                        <tr>
                            <td class="py-0" style="vertical-align: middle; width: 10%; background-color: #15171e; text-align: center; color: white;">NOME</td>
                            <td class="py-0" style="vertical-align: middle; width: 40%">{{ $venda->cliente->nome_dono }}</td>
                            <td class="py-0" style="vertical-align: middle; width: 10%; background-color: #15171e; text-align: center; color: white;">TEL 01</td>
                            <td class="py-0" style="vertical-align: middle; width: 15%">{{ $venda->cliente->telefone }}</td>
                            <td class="py-0" style="vertical-align: middle; width: 10%; background-color: #15171e; text-align: center; color: white;">TEL 02</td>
                            <td class="py-0" style="vertical-align: middle; width: 15%">{{ $venda->cliente->whatsapp }}</td>
                        </tr>
                        <tr>
                            <td class="py-0" style="vertical-align: middle; width: 10%; background-color: #15171e; text-align: center; color: white;">END.</td>
                            <td class="py-0" colspan="3" style="vertical-align: middle;">{{$venda->cliente->rua . ", n° " . $venda->cliente->numero . " " . $venda->cliente->bairro . " - " . $venda->cliente->cidade . " - " . $venda->cliente->estado . ", CEP:" . $venda->cliente->cep}}</td>
                            <td class="py-0" style="vertical-align: middle; width: 10%; background-color: #15171e; text-align: center; color: white;">FAZ.</td>
                            <td class="py-0" style="vertical-align: middle; width: 15%">{{ $venda->cliente->nome_fazenda }}</td>
                        </tr>
                        <tr>
                            <td class="py-0" style="vertical-align: middle; width: 10%; background-color: #15171e; text-align: center; color: white;">CPF/CNPJ</td>
                            <td class="py-0" style="vertical-align: middle; width: 40%;">@if($venda->cliente->pessoa_fisica) {{ $venda->cliente->cpf }} @else {{ $venda->cliente->cnpj }} @endif</td>
                            <td class="py-0" style="vertical-align: middle; width: 10%; background-color: #15171e; text-align: center; color: white;">EMAIL</td>
                            <td class="py-0" colspan="3" style="vertical-align: middle;">{{ $venda->cliente->email }}</td>
                        </tr>
                        <tr>
                            <td class="py-0" style="vertical-align: middle; width: 10%; background-color: #15171e; text-align: center; color: white;">I.E PROD.</td>
                            <td class="py-0" style="vertical-align: middle; width: 40%;">{{ $venda->cliente->inscricao_produtor_rural }}</td>
                            <td class="py-0" style="vertical-align: middle; width: 10%; background-color: #15171e; text-align: center; color: white;">CIDADE/UF</td>
                            <td class="py-0" colspan="3" style="vertical-align: middle;">{{ $venda->cliente->cidade . "/" . $venda->cliente->estado }}</td>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-borderless w100p">
                    <tbody>
                        <tr>
                            <td style="text-align: center; font-weight: bold; font-size: 13px">RESUMO DA COMPRA</td>
                        </tr>
                    </tbody>
                </table>
                @foreach($venda->carrinho->lotes as $lote)
                    <table class="w100p mt-4 table table-borderless">
                        <tbody>
                            <tr>
                                <td class="table-bordered py-0" style="vertical-align: middle; width: 10%; background-color: gainsboro; text-align: center;">LOTE:</td>
                                <td class="table-bordered py-0" colspan="2" style="vertical-align: middle; background-color: gainsboro; text-align: center;">{{ $lote->nome }}</td>
                            </tr>
                            @if($lote->pacote)
                                @foreach($lote->membros as $membro)
                                    <tr>
                                        <td class="table-bordered py-0" style="vertical-align: middle; width: 10%; text-align: center;">{{ $membro->numero . $membro->letra }}</td>
                                        <td class="table-bordered py-0" style="vertical-align: middle; width: 80%">
                                            {{ $membro->nome }} - 
                                            <b>RGD:</b> {{$membro->registro}} @if($membro->rgn) {{$membro->rgn}} @endif 
                                            @if($membro->gpta) - <b>GPTA:</b> {{$membro->gpta}} @endif 
                                            @if($membro->nascimento) - <b>NASC:</b> {{date("d/m/Y", strtotime($membro->nascimento))}} @endif 
                                            @if($membro->ccg) - <b>CCG:</b> {{$membro->ccg}} @endif 
                                            @if($membro->iabcz) - <b>IABCZ:</b> {{$membro->iabczg}} @endif 
                                            @if($membro->peso) - <b>PESO:</b> {{$membro->peso}}Kg @endif
                                            @if($membro->ce) - <b>C.E:</b> {{$membro->ce}} @endif
                                            - {{mb_strtoupper($membro->sexo)}}
                                        </td>
                                        <td class="table-bordered py-0" style="width: 10%; text-align: center;"> - </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="2" class="table-bordered py-0" style="vertical-align: middle; background-color: gainsboro; text-align: right;"><b>TOTAL DO PACOTE</b></td>
                                    <td class="table-bordered py-0" style="vertical-align: middle; text-align: center;">R${{ number_format($lote->preco - (($venda->desconto + $venda->desconto_extra) / $venda->carrinho->produtos->count()), 2, ",", ".") }}</td>
                                </tr>
                            @else
                                <tr>
                                    <td class="table-bordered py-0" style="vertical-align: middle; width: 10%; text-align: center;">{{ $lote->numero . $lote->letra }}</td>
                                    <td class="table-bordered py-0" style="vertical-align: middle; width: 80%">
                                        <b>RGD:</b> {{$lote->registro}} @if($lote->rgn) {{$lote->rgn}} @endif 
                                        @if($lote->gpta) - <b>GPTA:</b> {{$lote->gpta}} @endif 
                                        @if($lote->nascimento) - <b>NASC:</b> {{date("d/m/Y", strtotime($lote->nascimento))}} @endif 
                                        @if($lote->ccg) - <b>CCG:</b> {{$lote->ccg}} @endif 
                                        @if($lote->iabcz) - <b>IABCZ:</b> {{$lote->iabczg}} @endif 
                                        @if($lote->peso) - <b>PESO:</b> {{$lote->peso}}Kg @endif
                                        @if($lote->ce) - <b>C.E:</b> {{$lote->ce}} @endif
                                        - {{mb_strtoupper($lote->sexo)}}
                                    </td>
                                    <td class="table-bordered py-0" style="vertical-align: middle; width: 10%; text-align: center;">R${{ number_format($lote->preco - (($venda->desconto + $venda->desconto_extra) / $venda->carrinho->produtos->count()), 2, ",", ".") }}</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                @endforeach
                <table class="table table-borderless w100p">
                    <tbody>
                        <tr class="">
                            <td class="table-bordered nobr py-0" style="text-align: left; font-weight: bold;">CONDIÇÃO DEPAGAMENTO</td>
                            <td class="table-bordered nobl py-0" style="text-align: left;;">{{ $venda->parcelas }} PARCELAS</td>
                            <td class="table-bordered nobr py-0" style="text-align: left; font-weight: bold;">FORMA DE PAGAMENTO</td>
                            <td class="table-bordered nobl py-0" style="text-align: left;;">BOLETO DE TITULARIDADE DA FAZENDA</td>
                        </tr>
                    </tbody>
                </table>
                {{-- <table class="table table-borderless w100p">
                    <tbody>
                        <tr>
                            <td style="text-align: center; font-weight: bold; font-size: 13px; background-color: gainsboro;">DETALHAMENTO DA COMPRA</td>
                        </tr>
                    </tbody>
                </table> --}}
                <table class="w100p table table-borderless" >
                    <tbody>
                        <tr>
                            <td colspan="2" class="py-0" style="text-align: center; font-weight: bold; font-size: 13px; background-color: gainsboro;">DETALHAMENTO DA COMPRA</td>
                        </tr>
                        <tr style="text-align:center;">
                            @php
                                $metade_parcelas = ceil($venda->parcelas / 2);
                            @endphp
                            <td @if($venda->parcelas == 1) colspan="2" @endif class="td-border" style="padding: 4px 0px;">
                                <table style="width: 100%;">
                                    <thead style="text-align: center;font-weight: bold;">
                                        <tr>
                                            <td class="py-1">Qnt. Parcelas</td>
                                            <td class="py-1">Valor da Parcela</td>
                                            <td class="py-1">Vencimento</td>
                                        </tr>
                                    </thead>
                                    <tbody style="text-align: center;">
                                        @for($i = 1; $i <= $metade_parcelas; $i++)
                                            <tr>
                                                <td class="py-1">{{$i}}</td>
                                                <td class="py-1">R${{number_format($venda->valor_parcela, 2, ",", ".")}}</td>
                                                @if($venda->dias_entre_parcelas == 30)
                                                    <td class="py-1">{{date("d/m/Y", strtotime($venda->primeira_parcela . " + " . ($i - 1) . " months"))}}</td>
                                                @else
                                                    <td class="py-1">{{date("d/m/Y", strtotime($venda->primeira_parcela . " + " . (($i - 1) * $venda->dias_entre_parcelas) . " days"))}}</td>
                                                @endif
                                            </tr>
                                        @endfor
                                    </tbody>
                                </table>
                            </td>
                            @if($venda->parcelas > 1)
                                <td class="td-border" style="padding: 4px 0px;">
                                    <table style="width: 100%;">
                                        <thead style="text-align: center;font-weight: bold;">
                                            <tr>
                                                <td class="py-1">Qnt. Parcelas</td>
                                                <td class="py-1">Valor da Parcela</td>
                                                <td class="py-1">Vencimento</td>
                                            </tr>
                                        </thead>
                                        <tbody style="text-align: center;">
                                            @for($i = $metade_parcelas + 1; $i <= $venda->parcelas; $i++)
                                                <tr>
                                                    <td class="py-1">{{$i}}</td>
                                                    <td class="py-1">R${{number_format($venda->valor_parcela, 2, ",", ".")}}</td>
                                                    @if($venda->dias_entre_parcelas == 30)
                                                    <td class="py-1">{{date("d/m/Y", strtotime($venda->primeira_parcela . " + " . ($i - 1) . " months"))}}</td>
                                                    @else
                                                        <td class="py-1">{{date("d/m/Y", strtotime($venda->primeira_parcela . " + " . (($i - 1) * $venda->dias_entre_parcelas) . " days"))}}</td>
                                                    @endif
                                                </tr>
                                            @endfor
                                        </tbody>
                                    </table>
                                </td>
                            @endif
                        </tr>
                        <tr style="background-color: black; color: white; padding: 4px 0px; text-align: center;">
                            <td class="td-border py-0" style="width: 50%;">VALOR TOTAL: <b>R$ {{number_format($venda->total, 2, ",", ".")}}</b></td>
                            <td class="td-border py-0" style="width: 50%;">% COMISSÃO: <b>{{$venda->porcentagem_comissao}}%</b></td>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-borderless w100p">
                    <tbody>
                        <tr>
                            <td class="table-bordered py-0" style="text-align: left; font-weight: bold; font-size: 13px; background-color: gainsboro;">VALOR TOTAL DA COMPRA</td>
                            <td class="table-bordered py-0" style="text-align: right; font-weight: bold; font-size: 13px; background-color: gainsboro;">R${{ number_format($venda->total, 2, ",", ".") }}</td>
                        </tr>
                    </tbody>
                </table>

                <hr style="border-top: 1px dotted black;">
            @endforeach
        </div>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>