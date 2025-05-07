@extends('painel.fazendeiro.template.main')

@section('conteudo')
<div class="row">
    <div class="col-md-3">
        <div class="card mini-stats-wid">
            <div class="card-body">
                <div class="media">
                    <div class="media-body">
                        <p class="text-muted fw-medium">Lote Mais Visitado</p>
                        <h4 class="mb-0">
                            {{$mais_visitado->nome}}
                        </h4>
                        <h5 class="mt-3">{{$maior_visitas}} visitas</h5>
                    </div>

                    <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                        <span class="avatar-title">
                            <i class="bx bx-up-arrow-circle font-size-24"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card mini-stats-wid">
            <div class="card-body">
                <div class="media">
                    <div class="media-body">
                        <p class="text-muted fw-medium">Lote Mais Curtido</p>
                        <h4 class="mb-0">
                            {{$mais_curtido->nome}}
                        </h4>
                        <h5 class="mt-3">{{$maior_curtidas}} curtidas</h5>
                    </div>

                    <div class="mini-stat-icon avatar-sm rounded-circle bg-success align-self-center">
                        <span class="avatar-title">
                            <i class="bx bx-like font-size-24"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card mini-stats-wid">
            <div class="card-body">
                <div class="media">
                    <div class="media-body">
                        <p class="text-muted fw-medium">Lote Mais Descurtido</p>
                        <h4 class="mb-0">
                            @if($mais_descurtido)
                                {{$mais_descurtido->nome}}
                            @else
                                Nenhum
                            @endif
                        </h4>
                        @if($mais_descurtido)
                            <h5 class="mt-3">{{$maior_descurtidas}} descurtidas</h5>
                        @else
                            <h5 class="mt-3">Nenhum lote recebeu descurtidas</h5>
                        @endif
                    </div>

                    <div class="mini-stat-icon avatar-sm rounded-circle bg-danger align-self-center">
                        <span class="avatar-title">
                            <i class="bx bx-dislike font-size-24"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="row">
    <div class="col-xl-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Visitas aos lotes</h4>
                
                <div id="relacao_visitas" class="apex-charts" dir="ltr"></div>
            </div>
        </div><!--end card-->
    </div> 

    <div class="col-xl-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Curtidas aos lotes</h4>
                
                <div id="relacao_curtidas" class="apex-charts" dir="ltr"></div>
            </div>
        </div><!--end card-->
    </div> 

    <div class="col-xl-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Descurtidas aos lotes</h4>
                
                <div id="relacao_descurtidas" class="apex-charts" dir="ltr"></div>
            </div>
        </div><!--end card-->
    </div> 
</div>
@endsection

@section('scripts')

<script src="{{asset('admin/libs/apexcharts/apexcharts.min.js')}}"></script>
<script>
    $(document).ready(function(){

        //RELAÇÃO DE VISITAS

        var relacao_visitas = {!! json_encode($relacao_visitas) !!};
        var lotes_visitas = new Array();
        var num_visitas = new Array();

        for(relacao in relacao_visitas){
            lotes_visitas.push(relacao);
            num_visitas.push(relacao_visitas[relacao]);
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
                name: "Visitas",
                data: num_visitas
            }],
            colors: ["#556ee6"],
            grid: {
                borderColor: "#f1f1f1"
            },
            xaxis: {
                categories: lotes_visitas,
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
                text: "Gráfico de visitas aos seus lotes",
                floating: !0,
                //offsetY: 330,
                align: "center",
                style: {
                    color: "#444",
                    fontWeight: "500"
                }
            }
        };
        (chart = new ApexCharts(document.querySelector("#relacao_visitas"), options)).render();

        //RELAÇÃO DE CURTIDAS
        
        var relacao_curtidas = {!! json_encode($relacao_curtidas) !!};
        var lotes_curtidas = new Array();
        var num_curtidas = new Array();

        for(relacao in relacao_curtidas){
            lotes_curtidas.push(relacao);
            num_curtidas.push(relacao_curtidas[relacao]);
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
                name: "Curtidas",
                data: num_curtidas
            }],
            colors: ["#34c38f"],
            grid: {
                borderColor: "#f1f1f1"
            },
            xaxis: {
                categories: lotes_curtidas,
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
                text: "Gráfico de curtidas aos seus lotes",
                floating: !0,
                //offsetY: 330,
                align: "center",
                style: {
                    color: "#444",
                    fontWeight: "500"
                }
            }
        };
        (chart = new ApexCharts(document.querySelector("#relacao_curtidas"), options)).render();

        //RELAÇÃO DE DESCURTIDAS
        
        var relacao_descurtidas = {!! json_encode($relacao_descurtidas) !!};
        var lotes_descurtidas = new Array();
        var num_descurtidas = new Array();

        for(relacao in relacao_descurtidas){
            lotes_descurtidas.push(relacao);
            num_descurtidas.push(relacao_descurtidas[relacao]);
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
                name: "Descurtidas",
                data: num_descurtidas
            }],
            colors: ["#f46a6a"],
            grid: {
                borderColor: "#f1f1f1"
            },
            xaxis: {
                categories: lotes_descurtidas,
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
                text: "Gráfico de descurtidas aos seus lotes",
                floating: !0,
                //offsetY: 330,
                align: "center",
                style: {
                    color: "#444",
                    fontWeight: "500"
                }
            }
        };
        (chart = new ApexCharts(document.querySelector("#relacao_descurtidas"), options)).render();
    });
</script>

@endsection