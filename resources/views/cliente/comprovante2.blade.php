@php
    use Intervention\Image\ImageManagerStatic as Image;
@endphp
<!doctype html>
<html lang="pt-BR">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        {{--  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">  --}}
        {{--  <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet">  --}}
        <style>
            @page {
                margin: 0px 0px 0px 0px !important;
                padding: 0px 0px 0px 0px !important;
            }
            body{
                font-size: 13px;
                font-family: 'Montserrat', sans-serif;
                padding: 20px 10px 20px 10px !important;
            }
            h1{
                font-size: 20px;
                font-family: 'Montserrat', sans-serif;
            }
            h2{
                font-size: 15px;
                font-family: 'Montserrat', sans-serif;
            }

            .table-border, .th-border, .td-border {
                border: 1px solid black;
                border-collapse: collapse;
            }

            .clearfix {
                overflow: auto;
            }

            .clearfix::after {
                content: "";
                clear: both;
                display: table;
            }
        </style>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="" style="width: 650px;margin: 0 auto;">
                    <table>
                        <tbody>
                            <tr>
                                <td><img src="{{asset('imagens/logo_agroreserva_leite_escura.svg')}}" style="width: 100px;" alt=""></td>
                                <td class="text-center" style="padding-left: 50px; font-size: 18px !important;"><h3>DETALHAMENTO DE COMPRA AGRO RESERVA</h3></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            @php
                $fazenda = $venda->carrinho->lotes->first()->fazenda;
            @endphp
            <div class="row">
                <div class="col-12">
                    <table class="table" style="border-spacing: 0; padding: 0px 0px; margin-top: 40px; margin-left: auto; margin-right: auto; border: 1px solid black; width:100%;">
                        <thead style="background-color: black; color: white; padding: 0px 0px;">
                            <tr style="padding: 0px 0px;">
                                <th class="text-center" style="font-size: 12px; font-weight: bold; padding: 3px 0px;">DADOS DO VENDEDOR</th>
                            </tr>
                        </thead>
                        <tbody class="">
                            
                            <tr class="">
                                <td class="">
                                    <table style="border-spacing: 0 1.5px; width: 100%;">
                                        <tbody>
                                            <tr class="border: 0px important;">
                                                <td style="background-color: black; color: white; padding: 2px 0px; border: 1px solid black; width: 70px; text-align: center; font-size: 10px;">
                                                    NOME:
                                                </td>
                                                <td style="background-color: white; color: black; border: 1px solid black; padding: 2px 5px; width: 250px; font-size: 10px;">
                                                    {{$fazenda->nome_dono}}
                                                </td>
                                                <td style="width: 10px;"></td>
                                                <td style="width: 10px;"></td>
                                                <td style="background-color: black; color: white; padding: 2px 0px; border: 1px solid black; width: 60px; text-align: center; font-size: 10px;">
                                                    TEL 01:
                                                </td>
                                                <td style="background-color: white; color: black; border: 1px solid black; padding: 2px 5px; width: 99px; font-size: 10px;">
                                                    {{$fazenda->telefone}}
                                                </td>
                                                <td style="width: 10px;"></td>
                                                <td style="width: 10px;"></td>
                                                <td style="background-color: black; color: white; padding: 2px 0px; border: 1px solid black; width: 60px; text-align: center; font-size: 10px;">
                                                    TEL 02:
                                                </td>
                                                <td style="background-color: white; color: black; border: 1px solid black; padding: 2px 5px; width: 99px; font-size: 10px;">
                                                    {{$fazenda->whatsapp}}
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr class="">
                                <td class="">
                                    <table style="border-spacing: 0 1.5px; width: 100%;">
                                        <tbody>
                                            <tr class="border: 0px important;">
                                                <td style="background-color: black; color: white; padding: 2px 0px; border: 1px solid black; width: 70px; text-align: center; font-size: 10px;">
                                                    ENDEREÇO:
                                                </td>
                                                <td style="background-color: white; color: black; border: 1px solid black; padding: 2px 5px; width: 427px; font-size: 10px;">
                                                    {{$fazenda->endereco}}
                                                </td>
                                                <td style="width: 10px;"></td>
                                                <td style="width: 10px;"></td>
                                                <td style="background-color: black; color: white; padding: 2px 0px; border: 1px solid black; width: 60px; text-align: center; font-size: 10px;">
                                                    FAZENDA:
                                                </td>
                                                <td style="background-color: white; color: black; border: 1px solid black; padding: 2px 5px; width: 99px; font-size: 10px;">
                                                    {{$fazenda->nome_fazenda}}
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr class="">
                                <td class="">
                                    <table style="border-spacing: 0 1.5px; width: 100%;">
                                        <tbody>
                                            <tr class="border: 0px important;">
                                                <td style="background-color: black; color: white; padding: 2px 0px; border: 1px solid black; width: 70px; text-align: center; font-size: 10px;">
                                                    CPF/CNPJ:
                                                </td>
                                                <td style="background-color: white; color: black; border: 1px solid black; padding: 2px 5px; width: 250px; font-size: 10px;">
                                                    {{$fazenda->cnpj}}
                                                </td>
                                                <td style="width: 10px;"></td>
                                                <td style="width: 10px;"></td>
                                                <td style="background-color: black; color: white; padding: 2px 0px; border: 1px solid black; width: 60px; text-align: center; font-size: 10px;">
                                                    EMAIL:
                                                </td>
                                                <td style="background-color: white; color: black; border: 1px solid black; padding: 2px 5px; width: 276px; font-size: 10px;">
                                                    <a href="mailto:{{$fazenda->email}}">{{$fazenda->email}}</a>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </td>
                            </tr>         
                        </tbody>
                    </table>
                </div>
            </div>

            @php
                $cliente = $venda->cliente;
            @endphp

            <div class="row">
                <div class="col-12">
                    <table class="table" style="border-spacing: 0; padding: 0px 0px; margin-top: 15px; margin-left: auto; margin-right: auto; border: 1px solid black; width: 100%;">
                        <thead style="background-color: black; color: white; padding: 0px 0px;">
                            <tr style="padding: 0px 0px;">
                                <th class="text-center" style="font-size: 12px; font-weight: bold; padding: 3px 0px;">DADOS DO COMPRADOR</th>
                            </tr>
                        </thead>
                        <tbody class="">
                            
                            <tr class="">
                                <td class="">
                                    <table style="border-spacing: 0 1.5px; width: 100%;">
                                        <tbody>
                                            <tr class="border: 0px important;">
                                                <td style="background-color: black; color: white; padding: 2px 0px; border: 1px solid black; width: 70px; text-align: center; font-size: 10px;">
                                                    NOME:
                                                </td>
                                                <td style="background-color: white; color: black; border: 1px solid black; padding: 2px 5px; width: 250px; font-size: 10px;">
                                                    {{$cliente->nome_dono}}
                                                </td>
                                                <td style="width: 10px;"></td>
                                                <td style="width: 10px;"></td>
                                                <td style="background-color: black; color: white; padding: 2px 0px; border: 1px solid black; width: 60px; text-align: center; font-size: 10px;">
                                                    TEL 01:
                                                </td>
                                                <td style="background-color: white; color: black; border: 1px solid black; padding: 2px 5px; width: 99px; font-size: 10px;">
                                                    {{$cliente->whatsapp}}
                                                </td>
                                                <td style="width: 10px;"></td>
                                                <td style="width: 10px;"></td>
                                                <td style="background-color: black; color: white; padding: 2px 0px; border: 1px solid black; width: 60px; text-align: center; font-size: 10px;">
                                                    TEL 02:
                                                </td>
                                                <td style="background-color: white; color: black; border: 1px solid black; padding: 2px 5px; width: 99px; font-size: 10px;">
                                                    {{$cliente->telefone}}
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr class="">
                                <td class="">
                                    <table style="border-spacing: 0 1.5px; width: 100%;">
                                        <tbody>
                                            <tr class="border: 0px important;">
                                                <td style="background-color: black; color: white; padding: 2px 0px; border: 1px solid black; width: 70px; text-align: center; font-size: 10px;">
                                                    ENDEREÇO:
                                                </td>
                                                <td style="background-color: white; color: black; border: 1px solid black; padding: 2px 5px; width: 427px; font-size: 10px;">
                                                    {{$cliente->rua . ", n° " . $cliente->numero . " " . $cliente->bairro . " - " . $cliente->cidade . " - " . $cliente->estado . ", CEP:" . $cliente->cep}}
                                                    {{--  Rua três corações, nº 1009, Exposição - Passos - MG, CEP: 37902-377  --}}
                                                </td>
                                                <td style="width: 10px;"></td>
                                                <td style="width: 10px;"></td>
                                                <td style="background-color: black; color: white; padding: 2px 0px; border: 1px solid black; width: 60px; text-align: center; font-size: 10px;">
                                                    FAZENDA:
                                                </td>
                                                <td style="background-color: white; color: black; border: 1px solid black; padding: 2px 5px; width: 99px; font-size: 10px;">
                                                    {{$cliente->nome_fazenda}}
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr class="">
                                <td class="">
                                    <table style="border-spacing: 0 1.5px; width: 100%;">
                                        <tbody>
                                            <tr class="border: 0px important;">
                                                <td style="background-color: black; color: white; padding: 2px 0px; border: 1px solid black; width: 70px; text-align: center; font-size: 10px;">
                                                    CPF/CNPJ:
                                                </td>
                                                <td style="background-color: white; color: black; border: 1px solid black; padding: 2px 5px; width: 250px; font-size: 10px;">
                                                    {{$cliente->documento}} 
                                                </td>
                                                <td style="width: 10px;"></td>
                                                <td style="width: 10px;"></td>
                                                <td style="background-color: black; color: white; padding: 2px 0px; border: 1px solid black; width: 60px; text-align: center; font-size: 10px;">
                                                    EMAIL:
                                                </td>
                                                <td style="background-color: white; color: black; border: 1px solid black; padding: 2px 5px; width: 276px; font-size: 10px;">
                                                    <a href="mailto:{{$cliente->email}}">{{$cliente->email}}</a>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </td>
                            </tr>          
                        </tbody>
                    </table>
                </div>
            </div>
            @foreach($venda->carrinho->produtos as $produto)
                <div class="container">
                    <div class="row clearfix" style="margin-top: 30px;">
                        <div style="width: 250px; padding: 10px 20px; float: left;">
                            @php
                                $jpg = Image::make(asset($produto->lote->preview))->encode("jpg")->save('imagens/temp/' . $produto->lote->id . 'jpg');
                            @endphp
                            <img src="{{asset($jpg->dirname . "/" . $jpg->filename)}}" style="width: 100%;" alt="">
                        </div>
                        <div style="width: 422px; height: 150px; padding: 10px 10px; border: 1px solid black; float: left;">
                            <div style="margin-top: 5px; width: 55px; height: 60px; border: 1px solid black; float: left;">
                                <div style="text-align: center; background: black; color: white; font-size: 10px; font-weight: bold; padding: 5px 0px;">
                                    LOTE
                                </div>
                                <div style="text-align: center; color: black; font-size: 12px; font-weight: bold;">
                                    <div style="margin-top: 11px;">
                                        {{str_pad($produto->lote->numero, 3, "0", STR_PAD_LEFT)}}{{$produto->lote->letra}}
                                    </div>
                                </div>
                            </div>
                            <div style="margin-top: 5px; width: 355px; height: 60px; margin-left: 65px; border: 1px solid black; float:left;">
                                <div style="text-align: center; color: black; font-size: 12px;">
                                    <div style="margin-top: 3px; font-size: 9px; font-weight: bold;">
                                        {{$produto->lote->nome}}
                                    </div>
                                    <div style="margin-top: 5px; font-size: 8px;">
                                        <b>RGD:</b> {{$produto->lote->registro}} @if($produto->lote->rgn) {{$produto->lote->rgn}} @endif 
                                        @if($produto->lote->gpta) - <b>GPTA:</b> {{$produto->lote->gpta}} @endif 
                                        @if($produto->lote->nascimento) - <b>NASC:</b> {{date("d/m/Y", strtotime($produto->lote->nascimento))}} @endif 
                                        @if($produto->lote->ccg) - <b>CCG:</b> {{$produto->lote->ccg}} @endif 
                                        @if($produto->lote->iabcz) - <b>IABCZ:</b> {{$produto->lote->iabczg}} @endif 
                                        @if($produto->lote->peso) - <b>PESO:</b> {{$produto->lote->peso}}Kg @endif
                                        @if($produto->lote->ce) - <b>C.E:</b> {{$produto->lote->ce}} @endif
                                        - {{mb_strtoupper($produto->lote->sexo)}}
                                    </div>
                                    <div style="margin-top: 5px; font-size: 9px;">
                                        @if($produto->lote->parto) Último parto em {{date("d/m/Y", strtotime($produto->lote->parto))}} @endif
                                    </div>
                                </div>
                            </div>

                            <div style="width: 420px; height: 60px; margin-top: 80px; border: 1px solid black;">
                                <div style="text-align: center; color: black; font-size: 10px;">
                                    <table style="width: 100%; margin-top: 15px;">
                                        <tbody>
                                            <tr>
                                                <td>Valor do animal:</td>
                                                <td><b>R${{number_format($produto->lote->preco, 2, ",", ".")}}</td>
                                                <td>% Venda:</td>
                                                <td><b>{{$produto->lote->porcentagem}}%</b></td>
                                            </tr>
                                            <tr>
                                                <td>Desconto:</td>
                                                <td><b>R${{number_format($produto->lote->preco * $venda->porcentagem_desconto / 100, 2, ",", ".")}}</b></td>
                                                <td>Forma de Pagamento:</td>
                                                <td>
                                                    @if($venda->parcelas_mes == 1)
                                                        @if($venda->parcelas == 1)
                                                            <b>1x</b>
                                                        @else
                                                            <b>{{$venda->parcelas}}x (1+{{$venda->parcelas - 1}})</b>
                                                        @endif
                                                    @else
                                                        @if($venda->parcelas == 1)
                                                            <b>1x</b>
                                                        @else
                                                            <b>1 + {{$venda->parcelas - 1}}x ({{($venda->parcelas / 2)}} duplas)</b>
                                                        @endif
                                                    @endif
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div style="width: 100%; margin-top: 50px; text-align:center; font-weight:bold; font-size: 14px;">
                RESUMO DA COMPRA
            </div>
            @foreach($venda->carrinho->produtos as $produto)
                <div>
                    <table class="" style="width: 700px; margin: 0 auto; margin-top: 30px; font-size: 9px; border-collapse: collapse;">
                        <thead style="background-color: black; color: white; padding: 3px 0px;">
                            <tr>
                                <td class="td-border" style="width: 80px; text-align: center; font-weight: bold; padding: 3px 0px;">LOTE</td>
                                <td class="td-border" colspan="3" style="text-align: center; font-weight: bold; padding: 3px 0px;">{{$produto->lote->nome}}</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr style="text-align:center;">
                                <td class="td-border" style="padding: 4px 0px;">{{str_pad($produto->lote->numero, 3, "0", STR_PAD_LEFT)}}{{$produto->lote->letra}}</td>
                                <td class="td-border" style="padding: 4px 0px;" colspan="2">RGD: {{$produto->lote->registro}} - GPTA: {{$produto->lote->gpta}} - NASC.: @if($produto->lote->nascimento) {{date("d/m/Y", strtotime($produto->lote->nascimento))}} @endif - CCG: {{$produto->lote->ccg}} - FÊMEA</td>
                                <td class="td-border" style="padding: 4px 0px; width: 170px;">@if($produto->lote->parto) Último parto em {{date("d/m/Y", strtotime($produto->lote->parto))}} @endif</td>
                            </tr>
                            <tr style="text-align:center;">
                                <td style="padding: 4px 0px;"></td>
                                <td class="td-border" style="padding: 4px 0px;">
                                    <table style="width: 100%;">
                                        <tbody style="text-align: center;">
                                            <tr>
                                                <td>Comissão:</td>
                                                <td><b>R${{number_format($venda->comissao / $venda->carrinho->produtos->count(), 2, ",", ".")}}</b></td>
                                            </tr>
                                            <tr>
                                                <td>Desconto:</td>
                                                <td><b>R${{number_format($venda->desconto / $venda->carrinho->produtos->count(), 2, ",", ".")}}</b></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td class="td-border" style="padding: 4px 0px;">
                                    <table style="width: 100%;">
                                        <tbody style="text-align: center;">
                                            <tr>
                                                <td>% Vendas:</td>
                                                <td><b>{{$produto->lote->porcentagem}}%</b></td>
                                            </tr>
                                            <tr>
                                                <td>Forma de pagamento:</td>
                                                <td>
                                                    @if($venda->parcelas_mes == 1)
                                                        @if($venda->parcelas == 1)
                                                            <b>1x</b>
                                                        @else
                                                            <b>{{$venda->parcelas}}x (1+{{$venda->parcelas - 1}})</b>
                                                        @endif
                                                    @else
                                                        @if($venda->parcelas == 1)
                                                            <b>1x</b>
                                                        @else
                                                            <b>1 + {{$venda->parcelas - 1}}x ({{($venda->parcelas / 2)}} duplas)</b>
                                                        @endif
                                                    @endif
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td class="td-border" style="padding: 4px 0px; width: 170px;">
                                    <table style="width: 100%;">
                                        <tbody style="text-align: center;">
                                            <tr>
                                                <td>Valor Total:</td>
                                                <td><b>R${{number_format($produto->lote->preco + ($venda->comissao / $venda->carrinho->produtos->count()) - ($venda->desconto / $venda->carrinho->produtos->count()), 2, ",", ".")}}</b></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            @endforeach
            @if($venda->desconto_extra > 0)
                <div>
                    <table class="" style="width: 700px; margin: 0 auto; margin-top: 30px; font-size: 9px; border-collapse: collapse;">
                        <thead style="background-color: black; color: white; padding: 3px 0px;">
                            <tr>
                                <td class="td-border" colspan="2" style="width: 80px; text-align: center; font-weight: bold; padding: 3px 0px;">DESCONTO EXTRA NA VENDA</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr style="text-align:center;">
                                <td class="td-border" style="padding: 4px 0px;"><b>DESCONTO:</b> R${{number_format($venda->desconto_extra, 2, ",", ".")}}</td>
                                <td class="td-border" style="padding: 4px 0px;"><b>TOTAL FINAL:</b> R${{number_format($venda->total, 2, ",", ".")}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            @endif
            @if($venda->primeira_parcela)
                <div>
                    <table class="" style="width: 700px; margin: 0 auto; margin-top: 30px; font-size: 9px; border-collapse: collapse;">
                        <thead style="background-color: black; color: white; padding: 3px 0px;">
                            <tr>
                                <td class="td-border" colspan="2" style="text-align: center; font-weight: bold; padding: 3px 0px;">DETALHAMENTO DE PAGAMENTO</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr style="text-align:center;">
                                @php
                                    $metade_parcelas = ceil($venda->parcelas / 2);
                                @endphp
                                <td @if($venda->parcelas == 1) colspan="2" @endif class="td-border" style="padding: 4px 0px;">
                                    <table style="width: 100%;">
                                        <thead style="text-align: center;font-weight: bold;">
                                            <tr>
                                                <td>Qnt. Parcelas</td>
                                                <td>Valor da Parcela</td>
                                                <td>Vencimento</td>
                                            </tr>
                                        </thead>
                                        <tbody style="text-align: center;">
                                            @for($i = 1; $i <= $metade_parcelas; $i++)
                                                <tr>
                                                    <td>{{$i}}</td>
                                                    <td>R${{number_format($venda->valor_parcela, 2, ",", ".")}}</td>
                                                    @if($venda->dias_entre_parcelas == 30)
                                                        <td>{{date("d/m/Y", strtotime($venda->primeira_parcela . " + " . ($i - 1) . " months"))}}</td>
                                                    @else
                                                        <td>{{date("d/m/Y", strtotime($venda->primeira_parcela . " + " . (($i - 1) * $venda->dias_entre_parcelas) . " days"))}}</td>
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
                                                    <td>Qnt. Parcelas</td>
                                                    <td>Valor da Parcela</td>
                                                    <td>Vencimento</td>
                                                </tr>
                                            </thead>
                                            <tbody style="text-align: center;">
                                                @for($i = $metade_parcelas + 1; $i <= $venda->parcelas; $i++)
                                                    <tr>
                                                        <td>{{$i}}</td>
                                                        <td>R${{number_format($venda->valor_parcela, 2, ",", ".")}}</td>
                                                        @if($venda->dias_entre_parcelas == 30)
                                                        <td>{{date("d/m/Y", strtotime($venda->primeira_parcela . " + " . ($i - 1) . " months"))}}</td>
                                                        @else
                                                            <td>{{date("d/m/Y", strtotime($venda->primeira_parcela . " + " . (($i - 1) * $venda->dias_entre_parcelas) . " days"))}}</td>
                                                        @endif
                                                    </tr>
                                                @endfor
                                            </tbody>
                                        </table>
                                    </td>
                                @endif
                            </tr>
                            <tr style="background-color: black; color: white; padding: 4px 0px; text-align: center;">
                                <td class="td-border" style="width: 50%;">VALOR TOTAL: <b>R$ {{number_format($venda->total, 2, ",", ".")}}</b></td>
                                <td class="td-border" style="width: 50%;">% COMISSÃO: <b>{{$venda->porcentagem_comissao}}%</b></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            @endif
        </div>

        <hr style="margin: 50px 0px; border-top: 1px dotted black; border-bottom: 0px;">

        <div style="width: 100%; border: 1px solid black;">
            <div style="width: 100%; text-align: left; font-weight: bold; padding: 0 15px; line-height: 23px;">
                <h5>Eu ____________________________________ reconheço que realizei a compra conforme demonstrativo no dia _________________ na reserva {{$venda->carrinho->reserva->fazenda->nome_fazenda}}.</h5>
            </div>
        </div>

        {{--  <div style="width: 100%; border: 1px solid black;">
            <div style="width: 100%; text-align: center; font-weight: bold;">
                <h5>NOTA PROMISSÓRIA RURAL ÚNICA</h5>
            </div>
            <div style="width: 100%; font-size: 12px; padding: 0px 10px; line-height: 23px;">
                <table style="width: 100%;">
                    <tbody>
                        <tr>
                            <td style="width: 50%; text-align: center;">
                                <b>Nota promissória rural única com vencimento em</b><br>
                                <input type="text" style="width: 100%; height: 20px;">
                            </td>
                            <td style="text-align: center;">
                                <b>Contrato n°</b><br>
                                <input type="text" style="width: 100%; height: 20px;">
                            </td>
                            <td style="text-align: center;">
                                <b>Valor Total</b><br>
                                <input type="text" style="width: 100%; height: 20px;" value="R${{number_format($venda->total, 2, ',', '.')}}">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div style="width: 100%; font-size: 12px; padding: 0px 15px; line-height: 23px;">
                <p style="line-height: 23px;">
                    AO(S) ______________ DIA(S) DO MÊS DE ________________ DO ANO DE ________ PAGAREI(EMOS) POR ESTA ÚNICA VIA DE NOTA PROMISSÓRIA RURAL A <u><b>{{$fazenda->nome_dono}}</b></u>,  
                    CPF/CNPJ <u><b>{{$fazenda->cnpj}}</b></u> OU A SUA ORDEM A QUANTIA DE <u><b>R${{number_format($venda->total, 2, ",", ".")}}</b></u>, 
                    EM MOEDA CORRENTE DO PAÍS, PELA COMPRA QUE LHE FIZ NA FAZENDA <u><b>{{$fazenda->nome_fazenda}}</b></u>
                </p>
            </div>
            <table style="font-size: 9px; padding: 0px 10px; width: 100%;">
                <tbody>
                    <tr>
                        <td>
                            <table>
                                <tbody>
                                    <tr>
                                        <td><b>NOME:</b></td>
                                        <td>{{$cliente->nome_dono}}</td>
                                    </tr>
                                    <tr>
                                        <td><b>CPF/CNPJ:</b></td>
                                        <td>{{$cliente->documento}}</td>
                                    </tr>
                                    <tr>
                                        <td><b>ENDEREÇO:</b></td>
                                        <td>{{$cliente->rua . ", n° " . $cliente->numero . " " . $cliente->bairro . " - " . $cliente->Cidade->nome . " - " . $cliente->Estado->uf . ", CEP:" . $cliente->cep}}</td>
                                    </tr>
                                    <tr>
                                        <td><b>TELEFONE:</b></td>
                                        <td>{{$cliente->telefone}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                        <td style="text-align: center;">
                            <div style="text-align: center;">
                                ______________________________________<br>
                                {{$cliente->nome_dono}}<br>
                                <b>COMPRADOR</b>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
           
        </div>  --}}
        
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        {{--  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>  --}}
    </body>
</html>