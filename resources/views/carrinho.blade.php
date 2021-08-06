@extends('template.main')

@section('styles')

@endsection

@section('conteudo')

    <div class="container py-5" style="min-height: 40vh;">
        @if(session()->get("erro"))
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-danger" role="alert">
                        {{session()->get("erro")}}
                    </div>
                </div>
            </div>
        @endif
        <div class="row d-none d-lg-block">
            <div class="col-12 text-center">
                @if($carrinho->produtos->count() > 0)
                    <table class="table" style="vertical-align: middle; padding: 0px; box-shadow: 2px 2px 5px rgba(0,0,0, 0.2);">
                        <thead class="" style="background-color: #E8521B; border: 0px; color: white; font-size: 15px; line-height: 15px; height: 40px;">
                            <tr>
                                <th class="text-center" scope="col">Produto</th>
                                <th class="text-center" scope="col"></th>
                                <th class="text-center" scope="col">Valor</th>
                                <th class="text-center" scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($carrinho->produtos as $produto)
                                <tr>
                                    <th class="px-0 py-0" scope="row" style="width: 20%;">
                                        <img src="{{asset($produto->lote->preview)}}" alt="" class="w-100">
                                    </th>
                                    <td style="vertical-align: middle; width: 50%;">
                                        <p><b>LOTE {{$produto->lote->numero}}: {{$produto->lote->nome}}</b></p>
                                        <p class="mt-n3"><b>Registro:</b> {{$produto->lote->registro}}</p>
                                        <p class="mt-n3"><b>Raça:</b> {{$produto->lote->raca->nome}}</p>
                                    </td>
                                    <td class="text-center" style="vertical-align: middle;">
                                        <b>${{number_format($produto->total, 2, ",", ".")}}</b>
                                    </td>
                                    <td class="text-center" style="vertical-align: middle;"><a href="{{route('carrinho.deletar', ['produto' => $produto])}}"><i class="fa fa-times" style="color: #E65454" aria-hidden="true"></i></a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <h4>Seu carrinho está vazio</h4>
                @endif
            </div>
        </div>
        <div class="row d-lg-none">
            <div class="col-12">
                @if($carrinho->produtos->count() > 0)
                    @foreach($carrinho->produtos as $produto)
                    <table class="table" style="vertical-align: middle; padding: 0px; box-shadow: 2px 2px 5px rgba(0,0,0, 0.2);">
                        <thead class="" style="background-color: #E8521B; border: 0px; color: white; font-size: 15px; line-height: 15px; height: 40px;">
                            <tr>
                                <th class="text-center" scope="col">LOTE {{$produto->lote->numero}}</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr class="text-center">
                                    <td>{{$produto->lote->nome}}</td>
                                </tr>
                                <tr class="text-center">
                                    <th class="px-0 py-0" scope="row" style="width: 20%;">
                                        <img src="{{asset($produto->lote->preview)}}" alt="" class="w-100">
                                    </th>
                                </tr>
                                <tr class="text-center">
                                    <td style="vertical-align: middle; width: 50%;">
                                        <p><b>LOTE {{$produto->lote->numero}}: {{$produto->lote->nome}}</b></p>
                                        <p class="mt-n3"><b>Registro:</b> {{$produto->lote->registro}}</p>
                                        <p class="mt-n3"><b>Raça:</b> {{$produto->lote->raca->nome}}</p>
                                    </td>
                                </tr>
                                <tr class="text-center">
                                    <td class="text-center" style="vertical-align: middle;">
                                        <b>${{number_format($produto->total, 2, ",", ".")}}</b>
                                    </td>
                                </tr>
                                <tr class="text-center">
                                    <td class="text-center" style="vertical-align: middle;"><a href="{{route('carrinho.deletar', ['produto' => $produto])}}" style="color: #E65454 !important;">Remover</a></td>
                                </tr>
                        </tbody>
                    </table>
                    @endforeach
                @else
                    <h4>Seu carrinho está vazio</h4>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-right">
                <a href="{{route('carrinho.checkout')}}"><button class="btn btn-vermelho btn-hover-preto px-3">Continuar</button></a>
            </div>
        </div>
        <hr>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){

            var ceps = {!! json_encode($ceps) !!};
            var fazendas = {!! json_encode($fazendas) !!};

            $("#link-boleto").click(function(){
                $("#div-whats").slideUp(300, function(){
                    $("#div-boleto").slideDown(300);
                });
            });

            $("#link-whats").click(function(){
                $("#div-boleto").slideUp(300, function(){
                    $("#div-whats").slideDown(300);
                });
            });

            $("#form-cep").submit(function(e){
                e.preventDefault();

                var html = "";

                for(var i = 0; i < ceps.length; i++){
                    
                    var cep = $("input[name='cep']").val();
                    var _token = $('meta[name="csrf-token"]').attr('content');
                    var pos = i;
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': _token
                        }
                    });  
                    $.ajax({
                        url: '/api/calcDistanciaCep',
                        type: 'POST',
                        data: {
                            origem: ceps[pos],
                            destino: cep
                        },
                        dataType: 'JSON',
                        success: function(data) {

                            var data = JSON.parse(data);
                            var status = data.status;
                            var destino = data.destination_addresses;
                            var origem = data.origin_addresses;
                            var txt_distancia = data.rows[0].elements[0].distance.text;
                            var distancia = data.rows[0].elements[0].distance.value;
                            var valor = (distancia / 1000) * 4;
                            html = "<div class='col-12 col-lg-12'>";
                            html +=      "<div class='card' style='width: 100%;'>";
                            html +=          "<ul class='list-group list-group-flush'>";
                            html +=              "<li class='list-group-item'><b>Fazenda</b>: " + fazendas[pos] + "</li>";
                            html +=              "<li class='list-group-item'><b>Origem</b>: " + origem + "</li>";
                            html +=              "<li class='list-group-item'><b>Destino</b>: " + destino + "</li>";
                            html +=              "<li class='list-group-item'><b>Distância</b>: " + txt_distancia + "</li>";
                            html +=              "<li class='list-group-item'><b>Valor Estimado</b>: R$" + valor.toFixed(2) + "</li>";
                            html +=          "</ul>";
                            html +=      "</div>";     
                            html +="</div>";     
                                
                            $("#card-frete").append(html);
                            $("#card-frete").slideDown(500);
                        },
                        error: function(){
                            console.log("deu ruim");
                        }
                    });
                }
                
            });
        })
    </script>
@endsection