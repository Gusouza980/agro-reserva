<!doctype html>
<html lang="pt-BR">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        {{--  <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet">  --}}
        <style>
            body{
                font-size: 13px;
                font-family: 'Montserrat', sans-serif;
            }
            h1{
                font-size: 20px;
                font-family: 'Montserrat', sans-serif;
            }
            h2{
                font-size: 15px;
                font-family: 'Montserrat', sans-serif;
            }
        </style>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row mt-4">
                <div class="col-12 text-center">
                    <img src="{{asset('imagens/logo_agroreserva_leite_escura.svg')}}" width="250" alt="">
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12">
                    <h1>Parabéns pela sua compra na Agro Reserva ! A seguir lhe daremos um resumo de tudo.</h1>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12">
                    <table class="table">
                        <tbody>
                            @foreach($venda->carrinho->produtos as $produto)
                                <tr>
                                    <td><img src="{{asset($produto->lote->preview)}}" style="width: 250px;" alt=""></td>
                                    <td>
                                        <p><b>LOTE {{$produto->lote->numero}}: {{$produto->lote->nome}}</b></p>
                                        <p class="mt-n1"><b>Registro:</b> {{$produto->lote->registro}}</p>
                                        <p class="mt-n1"><b>Raça:</b> {{$produto->lote->raca->nome}}</p>
                                        <p class="mt-n1"><b>Valor:</b> R${{number_format($produto->lote->preco, 2, ",", ".")}}</p>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <h1>Visão Geral</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>
                                    <p><b>TOTAL DA COMPRA:</b> R${{number_format($venda->carrinho->total, 2, ",", ".")}}</p> 
                                    <p><b>FRETE:</b> RETIRADA NA FAZENDA</p>    
                                </td>   
                                <td>
                                    <p><b>PARCELAS:</b> {{$venda->parcelas}}x de R${{number_format($venda->valor_parcela, 2, ",", ".")}}</p>
                                    {{--  <p><b>VALOR FINAL:</b> R${{number_format($venda->total, 2, ",", ".")}}</p>    --}}
                                </td> 
                            </tr>    
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <h1>Detalhes</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>
                                    <b>FAZENDA:</b> R${{number_format($venda->carrinho->total, 2, ",", ".")}}
                                </td> 
                                <td>
                                    <b>DESCONTO:</b> 
                                    R${{number_format($venda->desconto, 2, ",", ".")}} @if($venda->parcelas == 1) (6%) @elseif($venda->parcelas < 5) (3%) @else (0%) @endif
                                </td>  
                            </tr>
                            <tr>
                                <td>
                                    <b>COMISSÃO AGRORESERVA:</b> 
                                    R${{number_format($venda->comissao, 2, ",", ".")}} @if($venda->parcelas == 1) (0%) @elseif($venda->parcelas < 5) (2%) @else (4%) @endif    
                                </td>
                                <td></td> 
                            </tr>  
                            <tr>
                                <td>
                                    <b>VALOR FINAL:</b>
                                </td>
                                <td>
                                    <p>R${{number_format($venda->total, 2, ",", ".")}}</p>
                                    <p>{{$venda->parcelas}}x de R${{number_format($venda->valor_parcela, 2, ",", ".")}} (FAZENDA)</p>
                                    <p>R${{number_format($venda->comissao, 2, ",", ".")}} À VISTA (AGRO RESERVA)</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>