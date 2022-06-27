@extends('template.main2')

@section('styles')

@endsection

@section('conteudo')

    <div class="w-full py-5 bg-[#F2F2F2] px-3 px-lg-0" style="min-height: 40vh;">
        <div class="w1400 mx-auto">
            <div class="row d-lg-none mb-3">
                <div class="col-12 text-right">
                    <a class="btn btn-warning" href="#modalAlterarSenha">Alterar Senha</a>
                </div>
            </div>
            <div class="card" id="card-conta">
                <div class="card-body">
                    <div class="row justify-content-between px-3">
                        <div class="card-conta-content">
                            <h5>{{$cliente->nome_dono}}</h5>
                        </div>
                        <div class="card-conta-content d-none d-lg-block">
                            <a class="btn btn-warning hover:scale-105" href="#modalAlterarSenha">Alterar Senha</a>
                        </div>
                    </div>
                    <div class="w-full flex mt-3 text-center text-md-left card-conta-content">
                        <span class="cpointer link-card-conta active" num="0"><span style="border-bottom: 2px solid #E8521B;">Minha</span>s Compras</span>
                        @if($cliente->fazendas->count() > 0) <span class="ml-3 link-card-conta cpointer" num="1"><span style="border-bottom: 2px solid #E8521B;">Minha</span>s Vendas</span> @endif
                        {{--  <span class="ml-3 link-card-conta cpointer" num="2"><span style="border-bottom: 2px solid #E8521B;">Ende</span>reço de Correspondência</span>  --}}
                        {{--  <span class="ml-3 link-card-conta cpointer" num="3"><span style="border-bottom: 2px solid #E8521B;">Pref</span>erências</span>  --}}
                        <span class="ml-3 link-card-conta cpointer" num="4"><span style="border-bottom: 2px solid #E8521B;">Infor</span>mações de conta</span>
                    </div>
                    <hr class="mt-5 mb-4">
                    <div class="container-fluid container-card-conta active" num="0">
                        <div class="row">
                            <div class="col-12 card-conta-content">
                                <h5 style="font-family: 'Montserrat', sans-serif;" >Suas Compras</h5>
                            </div>
                        </div>
                        @if($cliente->compras->count() > 0)
                            <div class="row mt-5">
                                <div class="col-12 d-none d-lg-block">
                                    @foreach($cliente->compras as $venda)
                                        <table class="table">
                                            <tbody class="">
                                                <tr class="">
                                                    <td class="bg-slate-200 border-0" style="vertical-align: middle;"><b>Reserva: </b>{{date("d/m/Y", strtotime($venda->created_at))}}</td>
                                                    <td class="bg-slate-200" style="vertical-align: middle;">
                                                        @if($venda->situacao == 0)
                                                            <button class="btn btn-warning rounded-full btn-sm"> Em negociação</button>
                                                        @elseif($venda->situacao == 1)
                                                            <button class="btn btn-success rounded-full btn-sm"> Pagamento Confirmado</button>
                                                        @else
                                                            <button class="btn btn-error rounded-full btn-sm"> Cancelada</button>
                                                        @endif
                                                    </td>
                                                    <td class="bg-slate-200" style="vertical-align: middle;">{{$venda->parcelas}}x de R${{number_format($venda->valor_parcela, 2, ",", ".")}}</td>
                                                    <td class="bg-slate-200" style="vertical-align: middle;"><b>Total:</b> R${{number_format($venda->total, 2, ",", ".")}}</td>
                                                    <td class="bg-slate-200" style="vertical-align: middle; text-align: right;"><a href="{{route('conta.reserva', ['venda' => $venda])}}"><i class="fa fa-plus ver_mais cpointer hover:scale-110" style="color: #E65454" aria-hidden="true"></i></a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    @endforeach
                                </div>
                                <div class="col-12 d-lg-none">
                                    @foreach($cliente->compras as $venda)
                                        <table class="table" style="vertical-align: middle; padding: 0px; box-shadow: 2px 2px 5px rgba(0,0,0, 0.2);">
                                            <thead class="text-center" style="background-color: #E8521B; border: 0px; line-height: 15px; height: 40px;">
                                                <th style="color: white; font-size: 15px;"><b>{{date("d/m/Y H:i:s", strtotime($venda->created_at))}}</b></th>
                                            </thead>
                                            <tbody>
                                                <tr class="text-center">
                                                    <td class="bg-slate-200" style="vertical-align: middle;">
                                                        @if($venda->situacao == 0)
                                                            <button class="btn btn-warning rounded-full btn-sm"> Em negociação</button>
                                                        @elseif($venda->situacao == 1)
                                                            <button class="btn btn-success rounded-full btn-sm"> Pagamento Confirmado</button>
                                                        @else
                                                            <button class="btn btn-error rounded-full btn-sm"> Cancelada</button>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td class="bg-slate-200" style="vertical-align: middle;">{{$venda->parcelas}}x de R${{number_format($venda->valor_parcela, 2, ",", ".")}}</td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td class="bg-slate-200" style="vertical-align: middle;"><b>Total:</b> R${{number_format($venda->total, 2, ",", ".")}}</td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td class="bg-slate-200" style="vertical-align: middle;"><a href="{{route('conta.reserva', ['venda' => $venda])}}" style="color: #E8521B !important;">Ver mais</a></td>
                                                </tr>
                                            </tbody>
                                        </table>
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
                    @if($cliente->fazendas->count() > 0)
                        <div class="container-fluid container-card-conta" num="1" style="display: none;">
                            <div class="row">
                                <div class="col-12 card-conta-content">
                                    <h5 style="font-family: 'Montserrat', sans-serif;" >Relatório de Reservas</h5>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-12">
                                    @foreach($cliente->fazendas as $fazenda)
                                        <table class="table-auto mb-4 bg-slate-200 overflow-hidden rounded-md" style="overflow-x: scroll; width: 100%;">
                                            <thead>
                                                <tr class="text-left">
                                                    <th class="py-2 px-3 border-b border-slate-300 text-[15px] text-bold" style="font-family: 'Montserrat', sans-serif;" colspan="3">
                                                        {{ $fazenda->nome_fazenda }}
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($fazenda->reservas as $reserva)
                                                    <tr class="">
                                                        <td class="py-2 px-3 font-bold" style="vertical-align: middle;">#{{ $reserva->id }}</td>
                                                        <td class="py-2 px-3" style="vertical-align: middle;">De <b>{{ date("d/m/Y", strtotime($reserva->inicio)) }}</b> até <b>{{ date("d/m/Y", strtotime($reserva->fim)) }}</b></td>
                                                        <td class="text-center py-2 px-3" style="vertical-align: middle;"><a name="" id="" onclick="exibeCarregamento()" href="{{ route('conta.reserva.relatorio', ['reserva' => $reserva]) }}" role="button"><i class="fas fa-file-pdf bg-warning px-2 py-2 rounded-md hover:scale-110"></i></a></td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                    {{-- <div class="container-fluid container-card-conta" num="1" style="display: none;">
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
                    </div> --}}
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
                    <div class="w-full container-card-conta" num="4" style="display: none;">
                        @livewire('institucional.cliente.dados')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalVendaFinalizada" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body py-4 px-lg-4">
                    <div class="row">
                        <div class="col-12 text-center modal-venda-finalizada">
                            <img src="{{asset('imagens/icone_cadastro.png')}}" style="width: 100px;" alt="Ícone de Cadastro">
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-12 text-center modal-venda-finalizada">
                            <h1>Sua compra foi realizada com sucesso!</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-left modal-venda-finalizada">
                            <p>Você receberá por <b>e-mail</b> e <b>whatsapp</b> o comprovante da sua compra.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-left modal-venda-finalizada">
                            <p>Nosso time entrará em contato com todas as informações complementares, tais como:
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-left modal-venda-finalizada">
                            <p>- Contratos</p>
                            <p>- Boletos</p>
                            <p>- Notas Fiscais</p>
                            <p>- Guias de Transporte</p>
                            <p>- Demais Documentos</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-left modal-venda-finalizada">
                            <p>Você também poderá acompanhar o status da sua compra através do <b>portal do cliente</b>, disponível na plataforma.</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 text-center">
                            <button class="btn btn-laranja px-4 py-2" onclick="fechaModalVendaFinalizada()">Continuar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modalSenha" tabindex="-1" role="dialog" aria-labelledby="modalSenhaTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="px-3 px-lg-4" action="{{route('conta.senha.alterar')}}" method="post">
                        @csrf
                        <div class="form-group mb-4 text-black">
                            <label class="label-cinza" for="">Senha Antiga</label>
                            <input type="password"
                                class="form-control" name="senha_antiga" id="" aria-describedby="helpSenhaAntiga" placeholder="">
                            <small id="helpSenhaAntiga" class="form-text text-muted">Caso esteja recuperando a senha, informe a enviada por email</small>
                        </div>
                        <div class="form-group mb-4 text-black">
                            <label for="" class="label-cinza">Nova Senha</label>
                            <input type="password"
                                class="form-control" name="senha_nova" id="" aria-describedby="helpSenhaNova" placeholder="">
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-vermelho px-5 py-2">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="modal-carregamento" class="modal-carregamento align-items-center justify-content-center" style="display: none;">
        <div class="modal-carregamento-caixa">
            <img src="imagens/gif_relogio.gif" alt="">
        </div>
    </div>
    
@endsection

@section('scripts')
<div class="modal" id="modalAlterarSenha">
    <div class="modal-box bg-[#F2F2F2]">
        <form class="" action="{{route('conta.senha.alterar')}}" method="post">
            @csrf
            <div class="form-group mb-4 text-black">
                <label class="label-cinza" for="">Senha Antiga</label>
                <input type="password"
                    class="form-control" name="senha_antiga" id="" aria-describedby="helpSenhaAntiga" placeholder="">
                <small id="helpSenhaAntiga" class="form-text text-muted">Caso esteja recuperando a senha, informe a enviada por email</small>
            </div>
            <div class="form-group mb-4 text-black">
                <label for="" class="label-cinza">Nova Senha</label>
                <input type="password"
                    class="form-control" name="senha_nova" id="" aria-describedby="helpSenhaNova" placeholder="">
            </div>
            <div class="form-group text-center">
                <button class="btn bg-warning btn-md text-black border-0">Salvar</button>
                <a href="#" class="btn btn-outline btn-md text-black">Voltar</a>
            </div>
        </form>
    </div>
</div>
@if(session()->get("reserva_finalizada"))
<script>
    function fechaModalVendaFinalizada() {
        $("#modalVendaFinalizada").modal("hide");
    }

    $(document).ready(function(){
        $("#modalVendaFinalizada").modal();
    });
</script>
@endif

<script>
    function exibeCarregamento(){
        // alert("FOI");
        $("#modal-carregamento").css("display", "flex");
    }

    $(document).ready(function(){
        {{--  $(".ver_mais").click(function(){
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
        });  --}}

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