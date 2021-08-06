@extends('template.main')

@section('styles')

@endsection

@section('conteudo')

    <div class="container py-5" style="min-height: 40vh;">
        <div class="row">
            <div class="col-12 col-lg-8 py-3 text-left" style="border: 1px solid #F2f2f2;">
                <h4>Lotes</h4>
                <hr>
                @foreach($carrinho->produtos as $produto)
                    <div class="row">
                        <div class="col-12 col-lg-4">
                            <img src="{{asset($produto->lote->preview)}}" alt="" style="max-width: 350px;" class="w-100">
                        </div>
                        <div class="col-12 col-lg-8">
                            <p><b>LOTE {{$produto->lote->numero}}: {{$produto->lote->nome}}</b></p>
                            <p class="mt-n1"><b>Registro:</b> {{$produto->lote->registro}}</p>
                            <p class="mt-n1"><b>Raça:</b> {{$produto->lote->raca->nome}}</p>
                            <p class="mt-n1"><b>Valor:</b> R${{number_format($produto->lote->preco, 2, ",", ".")}}</p>
                            {{--  <div class="form-group">
                              <select class="form-control" style="max-width: 200px;" name="parcelamento" lid="{{$produto->lote_id}}" id="">
                                @for($i = 1; $i <= $produto->lote->parcelas; $i++)
                                    <option value="{{$i}}">{{$i}}x de {{number_format(round($produto->lote->preco / $i, 2), 2, ",", ".")}}</option>
                                @endfor
                              </select>
                            </div>  --}}
                        </div>
                    </div>
                    <hr>
                @endforeach
            </div>

            <div class="col-12 col-lg-4 text-left py-3" style="border: 1px solid #F2f2f2;">
                <h4>Resumo</h4>
                <hr>
                <div class="container-fluid px-0">
                    <div class="row">
                        <div class="col-12">
                            <b>Total:</b> R${{number_format($carrinho->total, 2, ",", ".")}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <b>Frete:</b> Retirada na Fazenda
                        </div>
                    </div>
                </div>
                <div class="container-fluid px-0 mt-4">
                    <div class="row">
                        <div class="col-12">
                            <b>CONDIÇÕES:</b>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-12">
                            <b>À VISTA: 12% de desconto</b><br>
                            <small>*8% de desconto pela fazenda e 4% de desconto da comissão Agro Reserva.</small>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-12">
                            <b>ATÉ 4x: 8% de desconto</b><br>
                            *6% de desconto pela fazenda e 2% de desconto da comissão Agro Reserva.
                        </div>
                    </div>
                </div>
                <div class="container-fluid px-0 mt-4">
                    <div class="row">
                        <div class="col-12 mb-2">
                            <small class="text-info">O pagamento da primeira parcela é sempre a vista.</small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                              <select class="form-control" name="parcelamento" id="parcelamento">
                                    <option value="">Selecione as parcelas</option>
                                    @for($i = 1; $i <= 10; $i++)
                                        @if($i == 1)
                                            <option value="{{$i}}">{{$i}}x de R${{number_format($carrinho->total - ($carrinho->total * 12 / 100), 2, ",", ".")}} (12% de desconto)</option>
                                        @elseif($i < 5)
                                            <option value="{{$i}}">{{$i}}x de R${{number_format(round(($carrinho->total - ($carrinho->total * 8 / 100)) / $i, 2),2 , ",", ".")}} (8% de desconto)</option>
                                        @else
                                            <option value="{{$i}}">{{$i}}x de R${{number_format(round(($carrinho->total / $i), 2), 2, ",", ".")}}</option>
                                        @endif
                                    @endfor
                              </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid px-0 mt-4" id="resumo" style="display: none;">
                    <div class="row">
                        <div class="col-12">
                            <b>VALOR DO PEDIDO:</b> R${{number_format($carrinho->total, 2, ",", ".")}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-12">
                            <b>DESCONTOS:</b> <span id="valor-desconto"></span>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-12" style="font-size: 14px;">
                            <b>COMISSÃO AGRO RESERVA (À VISTA):</b> <span id="valor-comissao"></span>
                        </div>
                    </div>
                    <hr>         
                    <div class="row">
                        <div class="col-12">
                            <b>VALOR FINAL:</b> <span id="valor-final"></span>
                        </div>
                    </div>
                    
                    <hr>
                </div>

                
                <div class="row">
                    <div class="col-12">
                        <div class="form-group mt-3">
                            <label for="" style="color: black;">Foi assessorado por alguém ?</label>
                            <select class="form-control" name="assessor" id="assessor-i">
                                <option value="0">Não</option>
                                @foreach(App\Models\Assessor::all() as $assessor)   
                                    <option value="{{$assessor->id}}">{{$assessor->nome}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="row mt-3">
                    <div class="col-12 text-center">
                        <form id="form-checkout" action="{{route('carrinho.concluir')}}" method="post">
                            @csrf
                            <input type="hidden" name="parcelas" id="parcelas-h">
                            <input type="hidden" name="assessor" id="assessor-h">
                        </form>
                        <button class="btn btn-vermelho px-4" id="btn-finalizar">Finalizar Reserva</button>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){

            $("select[name='parcelamento']").change(function(){
                $("#resumo").slideUp(500, function(){
                    if(parseInt($("select[name='parcelamento']").val()) == 1){
                        var comissao = 0;
                        var desconto = 12;
                    }else if(parseInt($("select[name='parcelamento']").val()) < 5 ){
                        var comissao = 2;
                        var desconto = 8;
                    }else{
                        var comissao = 4;
                        var desconto = 0;
                    }

                    var parcelas = parseInt($("select[name='parcelamento']").val());
                    var total_carrinho = parseFloat({!! $carrinho->total !!});
                    var valor_desconto = total_carrinho * desconto / 100;
                    var valor_comissao = total_carrinho * comissao / 100;
    
                    var total_compra = total_carrinho - valor_desconto + valor_comissao;

                    $("#valor-desconto").html("R$" + parseFloat(valor_desconto.toFixed(2)).toLocaleString('pt-BR', {
                        currency: 'BRL',
                        minimumFractionDigits: 2
                    }));
                    $("#valor-comissao").html("R$" + parseFloat(valor_comissao.toFixed(2)).toLocaleString('pt-BR', {
                        currency: 'BRL',
                        minimumFractionDigits: 2
                    }));
                    $("#valor-final").html("R$" + parseFloat(total_compra.toFixed(2)).toLocaleString('pt-BR', {
                        currency: 'BRL',
                        minimumFractionDigits: 2
                    }));
    
                    $("#resumo").slideDown(500);
                });
                
            });

            $("select[name='assessor']").change(function(){
                if($(this).val() != "0"){
                    $("#row-avaliacao").slideDown(400);
                    $("#row-observacao").slideDown(400);
                }
                else{
                    $("#row-avaliacao").slideUp(400);
                    $("#row-observacao").slideUp(400);
                }
            });

            $("#btn-finalizar").click(function(){
                //Pegando parcelas
                var parcelas = $("select[name='parcelamento']").val();
                $("#parcelas-h").val(parcelas);

                //Pegando assessor
                var assessor = $("#assessor-i").val();
                $("#assessor-h").val(assessor);

                $("#form-checkout").submit();
            })

        })
    </script>
@endsection