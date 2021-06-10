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
                            <p><b>{{$produto->lote->nome}}</b></p>
                            <p class="mt-n3"><b>Registro:</b> {{$produto->lote->registro}}</p>
                            <p class="mt-n3"><b>Raça:</b> {{$produto->lote->raca->nome}}</p>
                            <div class="form-group">
                              <select class="form-control" style="max-width: 200px;" name="parcelamento" lid="{{$produto->lote_id}}" id="">
                                @for($i = 1; $i <= $produto->lote->parcelas; $i++)
                                    <option value="{{$i}}">{{$i}}x de {{number_format(round($produto->lote->preco / $i, 2), 2, ",", ".")}}</option>
                                @endfor
                              </select>
                            </div>
                        </div>
                    </div>
                    <hr>
                @endforeach
            </div>

            <div class="col-12 col-lg-4 text-left py-3" style="border: 1px solid #F2f2f2;">
                <h4>Resumo</h4>
                <hr>
                <div class="row">
                    <div class="col-12">
                        <b>Total:</b> R${{number_format($carrinho->total, 2, ",", ".")}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <b>Frete:</b> Consultar com a transportadora
                    </div>
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
                <div class="row" id="row-avaliacao" style="display: none;">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="" style="color: black;">Como você avalia o assessoramento ?</label>
                            <select class="form-control" name="avaliacao" id="avaliacao-i">
                                <option value="0">Péssimo</option>
                                <option value="1">Ruim</option>
                                <option value="2">Bom</option>
                                <option value="3">Ótimo</option>
                                <option value="4">Excelente</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row" id="row-observacao" style="display: none;">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="" style="color: black;">Caso deseje, conte como foi sua experiência</label>
                            <textarea class="form-control" rows="3" id="observacao-i" name="observacao"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <small>Clicando em finalizar o lote será reservado e os detalhes do pagamento serão discutidos junto a um de nossos consultores</small>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12 text-center">
                        <form id="form-checkout" action="{{route('carrinho.concluir')}}" method="post">
                            @csrf
                            <input type="hidden" name="parcelas" id="parcelas-h">
                            <input type="hidden" name="assessor" id="assessor-h">
                            <input type="hidden" name="avaliacao" id="avaliacao-h">
                            <input type="hidden" name="observacao" id="observacao-h">
                        </form>
                        <button class="btn btn-vermelho px-4" id="btn-finalizar">Finalizar com Consultor</button>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){

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
                var parcelas = "";
                $("select[name='parcelamento']").each(function(){
                    var lid = $(this).attr("lid");
                    var parcela = $(this).val();
                    parcelas += lid + ":" + parcela + ";";
                })
                $("#parcelas-h").val(parcelas);

                //Pegando assessor
                var assessor = $("#assessor-i").val();
                $("#assessor-h").val(assessor);

                //Pegando avaliacao
                var avaliacao = $("#avaliacao-i").val();
                $("#avaliacao-h").val(avaliacao);

                //Pegando observacao
                var observacao = $("#observacao-i").val();
                $("#observacao-h").val(observacao);

                $("#form-checkout").submit();
            })

        })
    </script>
@endsection