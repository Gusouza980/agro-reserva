@extends('template.main')

@section('styles')

@endsection

@section('conteudo')

    <div class="container py-5" style="min-height: 40vh;">
        
        <div class="card" id="card-conta">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 card-conta-content">
                        <h5>{{$cliente->nome_dono}}</h5>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12 text-center text-md-left card-conta-content">
                        <span class="cpointer link-card-conta active" num="0"><span style="border-bottom: 2px solid #E65454;">Rese</span>rvas</span>
                        <span class="ml-3 link-card-conta cpointer" num="1"><span style="border-bottom: 2px solid #E65454;">Seus</span> Dados</span>
                        <span class="ml-3 link-card-conta cpointer" num="2"><span style="border-bottom: 2px solid #E65454;">Ende</span>reço de Correspondência</span>
                        <span class="ml-3 link-card-conta cpointer" num="3"><span style="border-bottom: 2px solid #E65454;">Pref</span>erências</span>
                    </div>
                </div>
                <hr class="mt-5 mb-4">
                <div class="container-fluid container-card-conta active" num="0">
                    <div class="row">
                        <div class="col-12 card-conta-content">
                            <h5>Suas Reservas</h5>
                        </div>
                    </div>
                    @if($cliente->compras->count() > 0)
                        <div class="row">
                            <div class="col-12">
                                @foreach($cliente->compras as $venda)
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td style="vertical-align: middle;"><b>Reserva: </b>{{date("d/m/Y", strtotime($venda->created_at))}}</td>
                                                <td style="vertical-align: middle;">
                                                    @if($venda->situacao == 0)
                                                        <button class="btn btn-secondary" style="border-radius: 50px;"> Em negociação</button>
                                                    @elseif($venda->situacao == 1)
                                                        <button class="btn btn-primary"> Pagamento Confirmado</button>
                                                    @else
                                                        <button class="btn btn-danger"> Cancelada</button>
                                                    @endif
                                                </td>
                                                <td style="vertical-align: middle;"><b>Total:</b> R${{number_format($venda->total, 2, ",", ".")}}</td>
                                                <td> </td>
                                                <td> </td>
                                                <td> </td>
                                                <td style="vertical-align: middle; text-align: right;"><i class="fa fa-plus ver_mais cpointer" vid="{{$venda->id}}" style="color: #E65454" aria-hidden="true"></i></td>
                                                <td style="vertical-align: middle; text-align: right; display: none;"><i class="fa fa-minus ver_menos cpointer" vid="{{$venda->id}}" style="color: #E65454;" aria-hidden="true"></i></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="tabela_produtos" vid="{{$venda->id}}" style="display:none; border: 1px solid rgba(0,0,0,.05);">
                                        <table class="table">
                                            <tbody>
                                                <tr style="background-color:rgba(0,0,0,.05);">
                                                    <td style="vertical-align: middle;"><img src="{{asset($venda->lote->fazenda->logo)}}" style="max-width: 100px;" alt=""></td>
                                                    <td style="vertical-align: middle;"><b>{{$venda->lote->nome}}</b></td>
                                                    <td style="vertical-align: middle;"><b>Raça:</b> {{$venda->lote->raca->nome}}</td>
                                                    <td style="vertical-align: middle;"><b>Registro:</b> {{$venda->lote->registro}}</td>
                                                    <td style="vertical-align: middle;"><b>Valor:</b> R${{number_format($venda->lote->preco, 2, ",", ".")}}</td>
                                                    <td style="vertical-align: middle;"><b>Parcelas:</b> {{$venda->parcelas}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        @if($venda->boletos->count() > 0)
                                            <h6 class="ml-2 mt-3">Boletos</h6>
                                            <table class="table">
                                                <tbody>
                                                    @foreach($venda->boletos as $boleto)
                                                        <tr>
                                                            <td style="vertical-align: middle; border: 0px;">{{$boleto->descricao}}</td>
                                                            <td style="vertical-align: middle; border: 0px;"><b>Validade: </b>{{date("d/m/Y", strtotime($boleto->validade))}}</td>
                                                            <td style="vertical-align: middle; border: 0px;">
                                                                @if($boleto->status == 0)
                                                                    <button class="btn btn-secondary" style="border-radius: 50px;"> Aguardando Pagamento</button>
                                                                @elseif($boleto->status == 1)
                                                                    <button class="btn btn-primary"> Pagamento Confirmado</button>
                                                                @else
                                                                    <button class="btn btn-danger"> Cancelado</button>
                                                                @endif
                                                            </td>
                                                            <td style="vertical-align: middle; border: 0px;">
                                                                <a href="{{route('conta.boleto.download', ['boleto' => $boleto])}}" class="btn btn-vermelho px-3">Download</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-danger" role="alert">
                                    <strong>Você ainda não possui compras finalizadas.</strong>
                                </div>
                            </div>
                        </div>
                    @endif
                    
                </div>
                <div class="container-fluid container-card-conta" num="1" style="display: none;">
                    <div class="row">
                        <div class="col-12">
                            <form action="">
                                <div class="row mb-4">
                                    <div class="col-12 text-left">
                                        <h5>Informações Básicas</h5>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="form-group col-12 col-lg-6 form-conta">
                                      <label for="nome_dono">Nome</label>
                                      <input type="text"
                                        class="form-control" name="nome_dono" id="nome_dono" aria-describedby="helpId" value="{{$cliente->nome_dono}}" required>
                                    </div>
                                    <div class="form-group col-12 col-lg-6 form-conta">
                                        <label for="email">E-mail</label>
                                        <input type="email"
                                          class="form-control" name="email" id="email" aria-describedby="helpId" value="{{$cliente->email}}" required>
                                      </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="form-group col-12 col-lg-6 form-conta">
                                      <label for="cpf">CPF</label>
                                      <input type="text"
                                        class="form-control" name="cpf" id="cpf" aria-describedby="helpId" value="{{$cliente->cpf}}" required>
                                    </div>
                                    <div class="form-group col-12 col-lg-6 form-conta">
                                        <label for="cnpj">CNPJ</label>
                                        <input type="text"
                                          class="form-control" name="cnpj" id="cnpj" aria-describedby="helpId" value="{{$cliente->cnpj}}" required>
                                      </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="form-group col-12 col-lg-6 form-conta">
                                      <label for="telefone">Telefone</label>
                                      <input type="text"
                                        class="form-control" name="telefone" id="telefone" aria-describedby="helpId" value="{{$cliente->telefone}}" required>
                                    </div>
                                    <div class="form-group col-12 col-lg-6 form-conta">
                                        <label for="whatsapp">Whatsapp</label>
                                        <input type="text"
                                          class="form-control" name="whatsapp" id="whatsapp" aria-describedby="helpId" value="{{$cliente->whatsapp}}" required>
                                      </div>
                                </div>
                                <div class="row my-4">
                                    <div class="col-12 text-left">
                                        <h5>Endereço</h5>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="form-group col-12 col-lg-7 form-conta">
                                      <label for="rua">Rua</label>
                                      <input type="text"
                                        class="form-control" name="rua" id="rua" aria-describedby="helpId" value="{{$cliente->rua}}" required>
                                    </div>
                                    <div class="form-group col-5 col-lg-2 form-conta">
                                        <label for="numero">Número</label>
                                        <input type="text"
                                          class="form-control" name="numero" id="numero" aria-describedby="helpId" value="{{$cliente->numero}}" required>
                                    </div>
                                    <div class="form-group col-7 col-lg-3 form-conta">
                                        <label for="bairro">Bairro</label>
                                        <input type="text"
                                          class="form-control" name="bairro" id="bairro" aria-describedby="helpId" value="{{$cliente->bairro}}" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="form-group col-12 form-conta">
                                        <label for="complemento">Complemento</label>
                                        <input type="text"
                                          class="form-control" name="complemento" id="complemento" aria-describedby="helpId" value="{{$cliente->complemento}}" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="form-group col-12 col-lg-3 form-conta">
                                        <label for="estado">Estado</label>
                                        <select class="form-control" name="estado" id="" required>
                                            @foreach(\App\Models\Estado::all() as $estado)
                                                <option value="{{$estado->id}}" @if($cliente->estado == $estado->id) selected @endif>{{$estado->nome}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-12 col-lg-4 form-conta">
                                        <label for="cidade">Cidade</label>
                                        <select class="form-control" name="cidade" required>
                                            @foreach(\App\Models\Estado::first()->cidades as $cidade)
                                                <option value="{{$cidade->id}}" @if($cliente->cidade == $cidade->id) selected @endif>{{$cidade->nome}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-7 col-lg-3 form-conta">
                                        <label for="cep">CEP</label>
                                        <input type="text"
                                          class="form-control" name="cep" id="cep" aria-describedby="helpId" value="{{$cliente->cep}}" required>
                                    </div>
                                </div>
                                <hr>
                                <div class="row mb-3">
                                    <div class="col-12 text-right">
                                        <button class="btn btn-vermelho btn-hover-preto px-5">
                                            Salvar
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="container-fluid container-card-conta" num="2" style="display: none;">
                    <div class="row">
                        <div class="col-12">
                            <form action="">
                                <div class="row mb-3">
                                    <div class="form-group col-12 col-lg-7 form-conta">
                                      <label for="entrega_rua">Rua</label>
                                      <input type="text"
                                        class="form-control" name="entrega_rua" id="rua" aria-describedby="helpId" value="{{$cliente->entrega_rua}}" required>
                                    </div>
                                    <div class="form-group col-5 col-lg-2 form-conta">
                                        <label for="entrega_numero">Número</label>
                                        <input type="text"
                                          class="form-control" name="entrega_numero" id="entrega_numero" aria-describedby="helpId" value="{{$cliente->entrega_numero}}" required>
                                    </div>
                                    <div class="form-group col-7 col-lg-3 form-conta">
                                        <label for="entrega_bairro">Bairro</label>
                                        <input type="text"
                                          class="form-control" name="entrega_bairro" id="entrega_bairro" aria-describedby="helpId" value="{{$cliente->entrega_bairro}}" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="form-group col-12 col-lg-3 form-conta">
                                        <label for="entrega_estado">Estado</label>
                                        <select class="form-control" name="entrega_estado" id="" required>
                                            @foreach(\App\Models\Estado::all() as $estado)
                                                <option value="{{$estado->id}}" @if($cliente->entrega_estado == $estado->id) selected @endif>{{$estado->nome}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-12 col-lg-4 form-conta">
                                        <label for="entrega_cidade">Cidade</label>
                                        <select class="form-control" name="entrega_cidade" required>
                                            @foreach(\App\Models\Estado::first()->cidades as $cidade)
                                                <option value="{{$cidade->id}}" @if($cliente->entrega_cidade == $cidade->id) selected @endif>{{$cidade->nome}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-7 col-lg-3 form-conta">
                                        <label for="entrega_cep">CEP</label>
                                        <input type="text"
                                          class="form-control" name="entrega_cep" id="entrega_cep" aria-describedby="helpId" value="{{$cliente->entrega_cep}}" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-12 text-right">
                                        <button class="btn btn-vermelho btn-hover-preto px-5">
                                            Salvar
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="container-fluid container-card-conta" num="3" style="display: none;">
                    <div class="row">
                        <div class="col-12">
                            <form action="">
                                <div class="row">
                                    <div class="col-12">
                                        <h5>Raças</h5>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    @foreach(\App\Models\Raca::all() as $raca)
                                        <div class="form-group col-6 col-md-3 col-sm-4 col-lg-3">
                                            <label class="containerr" style="color: black;">{{$raca->nome}}
                                                <input type="checkbox" name="racas[]" value="{{$raca->id}}">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    @endforeach 
                                </div>
                                <div class="row mb-3">
                                    <div class="col-12 text-right">
                                        <button class="btn btn-vermelho btn-hover-preto px-5">
                                            Salvar
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $(".ver_mais").click(function(){
            vid = $(this).attr("vid");
            $(".tabela_produtos[vid='"+vid+"']").slideDown("slow");
            $(this).hide();
            $(".ver_menos[vid='"+vid+"']").parent().show();
        });

        $(".ver_menos").click(function(){
            vid = $(this).attr("vid");
            $(".tabela_produtos[vid='"+vid+"']").slideUp("slow");
            $(this).parent().hide();
            $(".ver_mais[vid='"+vid+"']").show();
        });

        $(".link-card-conta").click(function(){
            var num = $(this).attr("num");
            $(".link-card-conta.active").removeClass("active");
            $(this).addClass("active");
            $(".container-card-conta.active").slideUp(400, function(){
                $(".container-card-conta.active").removeClass("active");
                $(".container-card-conta[num='"+num+"']").addClass("active");
                $(".container-card-conta[num='"+num+"']").slideDown(400);
            });
        });

        $("select[name='estado']").change(function(){
            var estado = $("select[name='estado']").val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'GET',
                url: '/api/getCidadesByUf/' + estado,
                dataType: 'json',
                success: function (data) {
                    html = "";
                    var cidades = JSON.parse(data);
                    for(var cidade in cidades){
                        html += "<option value='"+cidades[cidade].id+"'>"+cidades[cidade].nome+"</option>"
                    }
                    $("select[name='cidade']").html(html);
                },
                error: function (data) {
                    console.log(data);
                }
            });
        });

        $("select[name='entrega_estado']").change(function(){
            var estado = $("select[name='entrega_estado']").val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'GET',
                url: '/api/getCidadesByUf/' + estado,
                dataType: 'json',
                success: function (data) {
                    html = "";
                    var cidades = JSON.parse(data);
                    for(var cidade in cidades){
                        html += "<option value='"+cidades[cidade].id+"'>"+cidades[cidade].nome+"</option>"
                    }
                    $("select[name='entrega_cidade']").html(html);
                },
                error: function (data) {
                    console.log(data);
                }
            });
        });
    });
</script>
@endsection