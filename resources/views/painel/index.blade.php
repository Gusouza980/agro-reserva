@extends('painel.template.main')

@section('styles')
    <!-- DataTables -->
    <link href="{{ asset('admin/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('admin/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
@endsection

@section('conteudo')

@if(in_array(session()->get("admin")["acesso"], config("acessos.reservas")["consulta"]))
    <div class="col-12">
        <div class="mb-3 row">
            <div class="col-12">
                <a href="{{route('painel.rotinas.recomendacoes.calcular')}}" class="btn btn-laranja">Caclular Recomendações</a>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#reservas" role="tab">
                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                            <span class="d-none d-sm-block">Reservas Ativas</span> 
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#analytics" role="tab">
                            <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                            <span class="d-none d-sm-block">Analytics</span> 
                        </a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="p-3 tab-content text-muted">
                    <div class="tab-pane active" id="reservas" role="tabpanel">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    <h5>Reservas Ativas</h5>
                                </div>
                            </div>
                            <div class="row justify-content-start">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body" style="overflow-x: scroll;">
                            
                                            <table id="datatable" class="table table-bordered dt-responsive w-100">
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th>Fazenda</th>
                                                        <th>Início</th>
                                                        <th>Fim</th>
                                                        <th>Ativo</th>
                                                        <th>Aberta</th>
                                                        <th>Preço</th>
                                                        <th>Compras</th>
                                                        <th>Lotes</th>
                                                    </tr>
                                                </thead>
                            
                            
                                                <tbody>
                                                    @foreach ($reservas as $reserva)
                                                        <tr>
                                                            <td class="text-center">
                                                                <div class="mt-4 dropdown mt-sm-0">
                                                                    <a href="#" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown"
                                                                        aria-expanded="false">
                                                                        <i class="fas fa-bars" aria-hidden="true"></i>
                                                                    </a>
                                                                    <div class="dropdown-menu" style="margin: 0px;">
                                                                        <a name="" href="{{route('fazenda.lotes', ['fazenda' => $reserva->fazenda->slug, 'reserva' => $reserva])}}" id="" class="py-2 dropdown-item"
                                                                            target="_blank" role="button">Página da Reserva</a>
                                                                        <a name="" id="" class="py-2 dropdown-item" data-bs-toggle="modal"
                                                                            data-bs-target="#modalEditaReserva{{ $reserva->id }}"
                                                                            role="button">Editar</a>
                                                                        <a name="" id=""
                                                                            href="{{ route('painel.fazenda.editar', ['fazenda' => $reserva->fazenda]) }}"
                                                                            class="py-2 dropdown-item" role="button">Editar Fazenda</a>
                                                                        <a name="" id=""
                                                                            href="{{ route('painel.fazenda.reservas.abertura', ['reserva' => $reserva]) }}"
                                                                            class="py-2 dropdown-item" role="button">@if ($reserva->aberto) Fechar @else Abrir @endif
                                                                            Reserva</a>
                                                                        <a name="" id=""
                                                                            href="{{ route('painel.fazenda.reservas.preco', ['reserva' => $reserva]) }}"
                                                                            class="py-2 dropdown-item" role="button">@if ($reserva->preco_disponivel) Esconder @else Liberar @endif
                                                                            Preços</a>
                                                                        <a name="" id=""
                                                                            href="{{ route('painel.fazenda.reservas.compras', ['reserva' => $reserva]) }}"
                                                                            class="py-2 dropdown-item" role="button">@if ($reserva->compra_disponivel) Bloquear @else Liberar @endif
                                                                            Compras</a>
                                                                        <a name="" id=""
                                                                            href="{{ route('painel.fazenda.reserva.lotes', ['reserva' => $reserva]) }}"
                                                                            class="py-2 dropdown-item" role="button">Lotes</a>
                                                                        <a name="" id=""
                                                                            href="{{ route('painel.fazenda.reserva.embrioes', ['reserva' => $reserva]) }}"
                                                                            class="py-2 dropdown-item" role="button">Embriões</a>
                                                                        <a name="" id=""
                                                                            href="{{ route('painel.fazenda.reservas.relatorio', ['reserva' => $reserva]) }}"
                                                                            class="py-2 dropdown-item" role="button">Relatório de Visitas</a>
                                                                        <a name="" id=""
                                                                            onclick="exibeCarregamento()" href="{{ route('painel.fazenda.reservas.relatorio', ['reserva' => $reserva]) }}"
                                                                            class="py-2 dropdown-item" role="button">Mapa de Compras</a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>{{$reserva->fazenda->nome_fazenda}}</td>
                                                            <td style="vertical-align: middle; text-align:center;">
                                                                {{ date('d/m/Y H:i:s', strtotime($reserva->inicio)) }}</td>
                                                            <td style="vertical-align: middle; text-align:center;">
                                                                {{ date('d/m/Y H:i:s', strtotime($reserva->fim)) }}</td>
                                                            <td style="vertical-align: middle; text-align:center;">
                                                                @if ($reserva->ativo)
                                                                    Sim
                                                                @else
                                                                    Não
                                                                @endif
                                                            </td>
                                                            <td style="vertical-align: middle; text-align:center;">
                                                                @if ($reserva->aberto)
                                                                    Sim
                                                                @else
                                                                    Não
                                                                @endif
                                                            </td>
                                                            <td style="vertical-align: middle; text-align:center;">
                                                                @if ($reserva->preco_disponivel)
                                                                    Liberado
                                                                @else
                                                                    Oculto
                                                                @endif
                                                            </td>
                                                            <td style="vertical-align: middle; text-align:center;">
                                                                @if ($reserva->compra_disponivel)
                                                                    Liberadas
                                                                @else
                                                                    Bloqueadas
                                                                @endif
                                                            </td>
                                                            <td style="vertical-align: middle; text-align:center;">{{ $reserva->lotes->count() }}
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                            
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->
                        </div>
                    </div>
                    <div class="tab-pane" id="analytics" role="tabpanel">
                        @livewire('analytics-estatisticas')
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div id="modal-carregamento" class="modal-carregamento align-items-center justify-content-center" style="display: none;">
        <div class="modal-carregamento-caixa">
            <img src="imagens/gif_relogio.gif" alt="">
        </div>
    </div>
    <!-- Modal -->
    @foreach ($reservas as $reserva)
    <div class="modal fade" id="modalEditaReserva{{ $reserva->id }}" tabindex="-1" role="dialog"
        aria-labelledby="modalEditaReserva{{ $reserva->id }}Label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditaReserva{{ $reserva->id }}Label">Editando reserva</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('painel.fazenda.reserva.editar', ['reserva' => $reserva]) }}"
                        method="post">
                        @csrf
                        <div class="mb-3 form-group">
                            <label for="inicio">Início</label>
                            <input type="date" class="form-control" name="inicio"
                                value="{{ date('Y-m-d', strtotime($reserva->inicio)) }}" required>
                        </div>
                        <div class="mb-3 form-group">
                            <label for="fim">Fim</label>
                            <input type="date" class="form-control" name="fim"
                                value="{{ date('Y-m-d', strtotime($reserva->fim)) }}" required>
                        </div>
                        <div class="mb-3 form-group">
                            <label for="desconto_live_valor">Desconto de Live (%)</label>
                            <input type="number" class="form-control" name="desconto_live_valor" min="0" step="0.01"
                                value="{{ $reserva->desconto_live_valor }}" required>
                        </div>
                        <div class="mb-3 form-group">
                            <label for="multi_fazendas">Reserva Multi Fazendas ?</label>
                            <select class="form-control" name="multi_fazendas">
                                <option value="0" @if (!$reserva->multi_fazendas) selected @endif>Não</option>
                                <option value="1" @if ($reserva->multi_fazendas) selected @endif>Sim</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="mb-3 form-group col-12 col-lg-6">
                                <label for="ativo">Ativo</label>
                                <select class="form-control" name="ativo">
                                    <option value="0" @if (!$reserva->ativo) selected @endif>Não</option>
                                    <option value="1" @if ($reserva->ativo) selected @endif>Sim</option>
                                </select>
                            </div>
                            <div class="mb-3 form-group col-12 col-lg-6">
                                <label for="mostrar_datas">Mostrar Data</label>
                                <select class="form-control" name="mostrar_datas">
                                    <option value="0" @if (!$reserva->mostrar_datas) selected @endif>Não</option>
                                    <option value="1" @if ($reserva->mostrar_datas) selected @endif>Sim</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group text-end">
                            <button type="submit" class="mt-3 btn btn-primary">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endif
@endsection

@section('scripts')

<!-- apexcharts -->
{{-- <script src="{{asset('admin/libs/apexcharts/apexcharts.min.js')}}"></script> --}}
<script src="{{ asset('admin/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script>
    function exibeCarregamento(){
        $("#modal-carregamento").css("display", "flex");
    }
    $(document).ready(function() {
        $('#datatable').DataTable({
            language: datatable_ptbr
        });
    });
</script>
<!-- apexcharts init -->
{{--  <script src="{{asset('admin/js/pages/apexcharts.init.js')}}"></script>  --}}
{{-- <script>
    var json = {!! json_encode($data) !!};
    var data = [];
    var categoria = [];
    for(var i in json){
        categoria.push(i);
        data.push(json[i]);
    }
        
    options = {
        chart: {
            height: 350,
            type: "bar",
            toolbar: {
                show: 1
            }
        },
        plotOptions: {
            bar: {
                dataLabels: {
                    position: "top"
                }
            }
        },
        dataLabels: {
            enabled: !0,
            formatter: function (e) {
                return e
            },
            offsetY: -22,
            style: {
                fontSize: "12px",
                colors: ["#304758"]
            }
        },
        series: [{
            name: "Interessados",
            data: data
        }],
        colors: ["#556ee6"],
        grid: {
            borderColor: "#f1f1f1"
        },
        xaxis: {
            categories: categoria,
            position: "bottom",
            labels: {
                offsetY: 0
            },
            axisBorder: {
                show: !1
            },
            axisTicks: {
                show: !1
            },
            crosshairs: {
                fill: {
                    type: "gradient",
                    gradient: {
                        colorFrom: "#D8E3F0",
                        colorTo: "#BED1E6",
                        stops: [0, 100],
                        opacityFrom: .4,
                        opacityTo: .5
                    }
                }
            },
            tooltip: {
                enabled: !0,
                offsetY: -35
            }
        },
        fill: {
            gradient: {
                shade: "light",
                type: "horizontal",
                shadeIntensity: .25,
                gradientToColors: void 0,
                inverseColors: !0,
                opacityFrom: 1,
                opacityTo: 1,
                stops: [50, 0, 100, 100]
            }
        },
        yaxis: {
            axisBorder: {
                show: 1
            },
            axisTicks: {
                show: 1
            },
            labels: {
                show: 1,
                formatter: function (e) {
                    return e
                }
            }
        },
        title: {
            text: "Gráfico de interesse por raças",
            floating: !0,
            //offsetY: 330,
            align: "center",
            style: {
                color: "#444",
                fontWeight: "500"
            }
        }
    };
    (chart = new ApexCharts(document.querySelector("#column_chart_datalabel"), options)).render();
</script> --}}
@endsection