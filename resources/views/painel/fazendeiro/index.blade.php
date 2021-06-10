@extends('painel.fazendeiro.template.main')

@section('conteudo')
<div class="row">
    {{-- <div class="col-xl-12">
        <div class="card">
            <div class="card-body">                
                <div id="column_chart_datalabel" class="apex-charts" dir="ltr"></div>
            </div>
        </div><!--end card-->
    </div> --}}
    {{--  <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Bar Chart</h4>
                
                <div id="bar_chart" class="apex-charts" dir="ltr"></div>
            </div>
        </div><!--end card-->
    </div>  --}}
</div>  
@endsection

@section('scripts')

<!-- apexcharts -->
<script src="{{asset('admin/libs/apexcharts/apexcharts.min.js')}}"></script>
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