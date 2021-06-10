@extends('template.main')

@section('styles')

@endsection

@section('conteudo')

    <div class="container py-5" style="min-height: 40vh;">
        <div class="row">
            <div class="col-12 text-center">
                @if($carrinho->produtos->count() > 0)
                    <table class="table" style="vertical-align: middle; padding: 0px; box-shadow: 2px 2px 5px rgba(0,0,0, 0.2);">
                        <thead class="" style="background-color: #E65454; border: 0px; color: white; font-size: 15px; line-height: 15px; height: 40px;">
                            <tr>
                                <th class="text-center" scope="col">Produto</th>
                                <th class="text-center" scope="col"></th>
                                <th class="text-center" scope="col">Fazenda</th>
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
                                    <td style="vertical-align: middle; width: 25%;">
                                        <p><b>{{$produto->lote->nome}}</b></p>
                                        <p class="mt-n3"><b>Registro:</b> {{$produto->lote->registro}}</p>
                                        <p class="mt-n3"><b>Raça:</b> {{$produto->lote->raca->nome}}</p>
                                    </td>
                                    <td class="text-center" style="vertical-align: middle; width: 20%;">
                                        <img src="{{asset($produto->lote->fazenda->logo)}}" alt="" style="width: 130px; max-width: 100%;">
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
        <div class="row">
            <div class="col-12 text-right">
                <a href="{{route('carrinho.checkout')}}"><button class="btn btn-vermelho btn-hover-preto">Prosseguir ao Checkout</button></a>
            </div>
        </div>
        <hr>
        <div class="row mt-4">
            {{--  <div class="col-12 col-md-6">
                <h4>Formas de Pagamento</h4>
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="text-nav-pagamento">
                            <a id="link-boleto" class="cpointer"><i class="fas fa-barcode cpointer"></i> Boleto</a>
                            <a id="link-whats" class="mx-3 cpointer" ><i class="fab fa-whatsapp-square cpointer"></i> Whatsapp</a>
                        </div>
                    </div>  
                </div>
                <hr>
                <div class="row mt-4" id="div-boleto" style="display: none;">
                    <div class="col-12">
                        <h5>O prazo de validade é de 1 dia útil</h5>
                        <a href="" class="btn btn-vermelho mt-3 px-3">Finalizar</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12" id="div-whats" style="display: none;">
                        <h6>O pedido será finalizado pelo whatsapp em contato com um de nossos representantes.</h6>
                        <a href="{{route('carrinho.concluir', ['tipo' => 1])}}" class="btn btn-vermelho mt-3 px-3">Finalizar</a>
                    </div>
                </div>
            </div>  --}}
            <div class="col-12 col-md-6 text-start">
                <h4>Simular frete</h4>
                <form id="form-cep" class="form-inline mt-4">
                    <div class="form-group">
                        <input style="color:black;" type="text" name="cep" id="" class="form-control" placeholder="CEP">
                    </div>
                    <div class="form-group ml-4">
                        <button type="submit" class="btn btn-vermelho">Calcular</button>
                    </div>
                </form>
                <div class="row mt-5" style="display: none;" id="card-frete">
            
                </div>
            </div>
        </div>
        
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