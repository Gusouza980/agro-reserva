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
                <a href="{{route('painel.cache.limpar')}}" class="btn btn-laranja">Limpar Cache</a>
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
                    {{-- <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#analytics" role="tab">
                            <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                            <span class="d-none d-sm-block">Analytics</span> 
                        </a>
                    </li> --}}
                </ul>
            </div>
        </div>
    </div>
    <div id="modal-carregamento" class="modal-carregamento align-items-center justify-content-center" style="display: none;">
        <div class="modal-carregamento-caixa">
            <img src="imagens/gif_relogio.gif" alt="">
        </div>
    </div>
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