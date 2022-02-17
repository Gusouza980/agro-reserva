<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12" style="text-align: center; color: black;">
                <h3>Relatório da Reserva: {{$reserva->fazenda->nome_fazenda}}</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-12" style="text-align: center; color: black;">
                <table class="table table-bordered" style="width: 100%; margin-top: 50px;">
                    <thead>
                        <tr style="font-size: 16px; font-weight: bold;">
                            <td colspan="2">TOTAIS</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr style="font-size: 12px;">
                            <td style="width: 50%;">{{$total_visitas}} Visitas</td>
                            <td style="width: 50%;">{{$reserva->lotes->where("reservado", true)->count()}} Vendas ({{number_format($reserva->lotes->where("reservado", true)->count() * 100 / $reserva->lotes->where("membro_pacote", false)->count(), 2, ",", ".")}}%)</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-12" style="text-align: center; color: black;">
                <table class="table table-bordered" style="width: 100%; margin-top: 50px;">
                    <thead>
                        <tr style="font-size: 16px; font-weight: bold;">
                            <td colspan="2">Visitas por dia</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($visitas_dia as $visitante)
                            <tr style="font-size: 12px;">
                                <td style="width: 50%;">{{$visitante->data}}</td>
                                <td style="width: 50%;">{{$visitante->visitas}} Visitas</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-12" style="text-align: center; color: black;">
                <table class="table table-bordered" style="width: 100%; margin-top: 50px;">
                    <thead>
                        <tr style="font-size: 16px; font-weight: bold;">
                            <td colspan="4">Cinco maiores visitantes</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cinco_clientes_mais_visitas as $visitante)
                            <tr style="font-size: 12px;">
                                <td style="">{{$visitante->cliente->nome_dono}}</td>
                                <td style="">{{$visitante->cliente->email}}</td>
                                <td style="">@if($visitante->cliente->telefone) {{$visitante->cliente->telefone}} @else {{$visitante->cliente->whatsapp}} @endif</td>
                                <td>{{$visitante->cidade}}</td>
                                <td>{{$visitante->estado}}</td>
                                <td style="">{{$visitante->visitas}} Visitas</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        @php
            $cliente = -1;
        @endphp
        <div class="row">
            <div class="col-12" style="text-align: center; color: black;">
                <table class="table table-bordered" style="width: 100%; margin-top: 50px;">
                    <thead>
                        <tr style="font-size: 16px; font-weight: bold;">
                            <td colspan="2">Lotes visitados pelos 5 maiores</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cinco_clientes_mais_visitas_lotes->where("visitas", ">", "0") as $visitante)
                            @if($cliente != $visitante->cliente_id)
                                @php
                                    $cliente = $visitante->cliente_id;
                                @endphp
                                <tr style="font-size: 12px;">
                                    <td colspan="2"><b>{{$visitante->cliente->nome_dono}}<b></td>
                                </tr>
                            @endif
                            <tr style="font-size: 12px;">
                                <td style="width: 50%;">{{$visitante->lote->numero . $visitante->lote->letra . ": " . $visitante->lote->nome}}</td>
                                <td style="width: 50%;">{{$visitante->visitas}} Visitas</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-12" style="text-align: center; color: black;">
                <table class="table table-bordered" style="width: 100%; margin-top: 50px;">
                    <thead>
                        <tr style="font-size: 16px; font-weight: bold;">
                            <td colspan="2">Visitas por Lote</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($visitas_lote as $visitas)
                            <tr style="font-size: 12px;">
                                <td style="width: 50%;">{{$visitas->lote->numero . $visitas->lote->letra . ": " . $visitas->lote->nome}}</td>
                                <td style="width: 50%;">{{$visitas->visitas}} Visitas</td>
                            </tr>
                        @endforeach
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