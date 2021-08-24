@extends('painel.template.main')

@section('styles')
    <!-- DataTables -->
    <link href="{{asset('admin/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/libs/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('titulo')
    Listagem de Vendas
@endsection

@section('conteudo')
<div class="row my-3">
    <div class="col-12">
         <a name="" id="" class="btn btn-primary cpointer" data-bs-toggle="modal" data-bs-target="#modalNovaVenda" role="button">Nova Venda</a> 
         <a name="" id="" class="btn btn-primary cpointer ml-3" data-bs-toggle="modal" data-bs-target="#modalNovoCliente" role="button">Novo Cliente</a> 
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Cliente</th>
                            <th>Total</th>
                            <th>Tipo</th>
                            <th>Status</th>
                            <th>Data</th>
                            <th></th>
                        </tr>
                    </thead>


                    <tbody>
                        @foreach($vendas as $venda)
                            <tr>
                                <td style="vertical-align: middle; text-align:center;">{{$venda->codigo}}</td>
                                <td style="vertical-align: middle; text-align:center;">{{$venda->cliente->nome_dono}}</td>
                                <td style="vertical-align: middle; text-align:center;">{{number_format($venda->total, 2, ",", ".")}}</td>
                                <td style="vertical-align: middle; text-align:center;">{{config("globals.tipos_pagamento")[$venda->tipo]}}</td>
                                <td style="vertical-align: middle; text-align:center;">
                                    {{config("globals.situacoes")[$venda->situacao]}}
                                </td>
                                <td style="vertical-align: middle; text-align:center;">{{date("d/m/Y H:i:s", strtotime($venda->created_at))}}</td>
                                <td><a href="{{route('painel.vendas.visualizar', ['venda' => $venda])}}" class="btn btn-primary"><i class="fas fa-search"></i></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
<div class="modal fade" id="modalNovoCliente" tabindex="-1" role="dialog" aria-labelledby="modalNovoClienteLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalNovoClienteLabel">Cadastro de Cliente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row" action="{{route('painel.cliente.cadastrar')}}" method="post">
                    @csrf
                    <div class="form-group mb-3 col-6">
                        <label for="">Nome *</label>
                        <input type="text"
                            class="form-control" name="nome_dono" maxlength="100" required>
                    </div>
                    <div class="form-group mb-3 col-6">
                        <label for="">Email *</label>
                        <input type="email"
                            class="form-control" name="email" maxlength="100" required>
                    </div>
                    <div class="form-group mb-3 col-4">
                        <label for="">Telefone *</label>
                        <input type="text"
                            class="form-control" name="telefone" maxlength="50" required>
                    </div>
                    <div class="form-group mb-3 col-4">
                        <label for="">Whatsapp</label>
                        <input type="text"
                            class="form-control" name="whatsapp" maxlength="50">
                    </div>
                    <div class="form-group mb-3 col-4">
                        <label for="">CPF/CNPJ *</label>
                        <input type="text"
                            class="form-control" name="documento" maxlength="50">
                    </div>
                    <div class="form-group mb-3 col-6">
                        <label for="">Rua</label>
                        <input type="text"
                            class="form-control" name="rua" maxlength="50">
                    </div>
                    <div class="form-group mb-3 col-2">
                        <label for="">Número</label>
                        <input type="text"
                            class="form-control" name="numero" maxlength="6">
                    </div>
                    <div class="form-group mb-3 col-4">
                        <label for="">Bairro</label>
                        <input type="text"
                            class="form-control" name="bairro" maxlength="50">
                    </div>
                    <div class="form-group col-12 col-lg-3 form-conta mb-3">
                        <label for="estado">Estado</label>
                        <select class="form-control" name="estado" id="" >
                            @foreach(\App\Models\Estado::all() as $estado)
                                <option value="{{$estado->id}}">{{$estado->nome}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-12 col-lg-4 form-conta mb-3">
                        <label for="cidade">Cidade</label>
                        <select class="form-control" name="cidade" >
                            <option value="">SELECIONE UM ESTADO</option>
                            {{--  @foreach(\App\Models\Cidade::where("id_estado", $cliente->estado)->get() as $cidade)
                                <option value="{{$cidade->id}}" @if($cliente->cidade == $cidade->id) selected @endif>{{$cidade->nome}}</option>
                            @endforeach  --}}
                        </select>
                    </div>
                    <div class="form-group col-7 col-lg-3 form-conta mb-3">
                        <label for="cep">CEP</label>
                        <input type="text"
                            class="form-control" name="cep" id="cep" aria-describedby="helpId" >
                    </div>
                    <div class="form-group text-end">
                        <button type="submit" class="btn btn-primary mt-3">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalNovaVenda" tabindex="-1" role="dialog" aria-labelledby="modalNovaVendaLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalNovaVendaLabel">Venda manual</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row" action="{{route('painel.vendas.nova')}}" method="post">
                    @csrf
                    <div class="form-group col-12 mb-3">
                        <label for="">Cliente</label><br>
                        <select class="form-select select2" style="width: 100%;" name="cliente" required>
                            @foreach(\App\Models\Cliente::all() as $cliente)
                                <option value="{{$cliente->id}}">{{$cliente->nome_dono}}</option>
                            @endforeach 
                        </select>
                    </div>
                    <div class="form-group col-12 mb-3">
                        <label for="tags">Lotes</label>
                        <br>
                        <select class="js-example-basic-multiple js-states form-control" style="width: 100%;" multiple="multiple" name="lotes[]" id="select_lotes" multiple required>
                            <option value="" label="default"></option>
                            @foreach(\App\Models\Reserva::where([["compra_disponivel", true],["aberto", true], ["encerrada", false]])->get() as $reserva)
                                @foreach($reserva->lotes->where("reservado", false)->sortBy("numero") as $lote)
                                    <option value="{{$lote->id}}" data-preco="{{$lote->preco}}">{{$lote->fazenda->nome_fazenda}}: Lote {{$lote->numero}}{{$lote->letra}}</option>
                                @endforeach
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="row">
                                <div class="form-group mb-3 col-12">
                                    <label for="">Número de Parcelas</label>
                                    <input type="number"
                                        class="form-control" name="parcelas" min="1" value="1" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group mb-3 col-12">
                                    <label for="">Parcelas por mês</label>
                                    <input type="number"
                                        class="form-control" name="parcelas_mes" min="1" value="1" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group mb-3 col-12">
                                    <label for="">Desconto (%)</label>
                                    <input type="number"
                                        class="form-control" name="desconto" min="0" max="100" step="0.01" value="0" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group mb-3 col-12">
                                    <label for="">Data da Primeira Parcela</label>
                                    <input type="date"
                                        class="form-control" name="primeira_parcela" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <div>
                                        <label class="form-label">Assessor</label><br>
                                        <select class="form-control select2" style="width: 100%;" name="assessor">
                                            <option value="0">Nenhum</option>
                                            @foreach(\App\Models\Assessor::all() as $assessor)
                                                <option value="{{$assessor->id}}">{{$assessor->nome}}</option>
                                            @endforeach 
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 text-center">
                                    <button type="button" id="btn-calcula" class="btn btn-primary">Calcular Valores</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 mt-3">
                            <div class="row" id="caixa-valores" style="display:none;">
                                <div class="col-12">
                                    <p><b>Total:</b><span id="valor-total"></span></p>
                                    <p><b>Desconto:</b><span id="valor-desconto"></span></p>
                                    <p><b>Parcelas:</b><span id="valor-parcelas"></span></p>
                                    <p><b>Comissão:</b><span id="valor-comissao"></span></p>
                                    <p><b>Total Final:</b><span id="valor-total-final"></span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="form-group text-end">
                        <button type="submit" class="btn btn-primary mt-3">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection

@section('scripts')
    <!-- Required datatable js -->
    <script src="{{asset('admin/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin/libs/select2/js/select2.min.js')}}"></script>
    <script>

        var lotes;

        function atualizaValores(){
            lotes = $('#select_lotes').select2('data');
            var parcelas = $("input[name='parcelas']").val();
            var parcelas_mes = $("input[name='parcelas_mes']").val();
            var desconto = parseFloat($("input[name='desconto']").val());
            var comissao = 0;
            if(lotes.length == 0 || !parcelas || parcelas == 0){

            }

            var precos = new Array();
            var total = 0;
            for(var i = 0; i < lotes.length; i++){
                precos.push(parseFloat(lotes[i].element.dataset.preco));
                total += parseFloat(lotes[i].element.dataset.preco);
            }


            var valor_desconto = total * desconto / 100;
            var total_desconto = total - valor_desconto;
            var valor_comissao = total * comissao / 100;
            var total_compra = total - valor_desconto + valor_comissao;

            var valor_parcelas = total_desconto / parcelas;

            $("#valor-total").html("R$" + parseFloat(total.toFixed(2)).toLocaleString('pt-BR', {
                currency: 'BRL',
                minimumFractionDigits: 2
            }));

            $("#valor-desconto").html("R$" + parseFloat(valor_desconto.toFixed(2)).toLocaleString('pt-BR', {
                currency: 'BRL',
                minimumFractionDigits: 2
            }));

            $("#valor-comissao").html("R$" + parseFloat(valor_comissao.toFixed(2)).toLocaleString('pt-BR', {
                currency: 'BRL',
                minimumFractionDigits: 2
            }));

            if(parcelas_mes > 1){
                $("#valor-parcelas").html(parcelas + "x ("+(parcelas/parcelas_mes)+" x "+parcelas_mes+")de R$" + parseFloat(valor_parcelas.toFixed(2)).toLocaleString('pt-BR', {
                    currency: 'BRL',
                    minimumFractionDigits: 2
                }));
            }else{
                $("#valor-parcelas").html(parcelas + "x de R$" + parseFloat(valor_parcelas.toFixed(2)).toLocaleString('pt-BR', {
                    currency: 'BRL',
                    minimumFractionDigits: 2
                }));
            }

            $("#valor-total-final").html("R$" + parseFloat(total_compra.toFixed(2)).toLocaleString('pt-BR', {
                currency: 'BRL',
                minimumFractionDigits: 2
            }));

            $("#caixa-valores").slideDown();

        }

        $(document).ready(function() {
            $('select[name="cliente"]').select2({
                dropdownParent: $('#modalNovaVenda'),
            });
            $('select[name="assessor"]').select2({
                dropdownParent: $('#modalNovaVenda'),
            });
            $('#select_lotes').select2({
                tags: true,
            });
            $("#btn-calcula").click(function(){
                atualizaValores();
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

            $('#datatable').DataTable( {
                language:{
                    "emptyTable": "Nenhum registro encontrado",
                    "info": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    "infoEmpty": "Mostrando 0 até 0 de 0 registros",
                    "infoFiltered": "(Filtrados de _MAX_ registros)",
                    "infoThousands": ".",
                    "loadingRecords": "Carregando...",
                    "processing": "Processando...",
                    "zeroRecords": "Nenhum registro encontrado",
                    "search": "Pesquisar",
                    "paginate": {
                        "next": "Próximo",
                        "previous": "Anterior",
                        "first": "Primeiro",
                        "last": "Último"
                    },
                    "aria": {
                        "sortAscending": ": Ordenar colunas de forma ascendente",
                        "sortDescending": ": Ordenar colunas de forma descendente"
                    },
                    "select": {
                        "rows": {
                            "_": "Selecionado %d linhas",
                            "0": "Nenhuma linha selecionada",
                            "1": "Selecionado 1 linha"
                        },
                        "1": "%d linha selecionada",
                        "_": "%d linhas selecionadas",
                        "cells": {
                            "1": "1 célula selecionada",
                            "_": "%d células selecionadas"
                        },
                        "columns": {
                            "1": "1 coluna selecionada",
                            "_": "%d colunas selecionadas"
                        }
                    },
                    "buttons": {
                        "copySuccess": {
                            "1": "Uma linha copiada com sucesso",
                            "_": "%d linhas copiadas com sucesso"
                        },
                        "collection": "Coleção  <span class=\"ui-button-icon-primary ui-icon ui-icon-triangle-1-s\"><\/span>",
                        "colvis": "Visibilidade da Coluna",
                        "colvisRestore": "Restaurar Visibilidade",
                        "copy": "Copiar",
                        "copyKeys": "Pressione ctrl ou u2318 + C para copiar os dados da tabela para a área de transferência do sistema. Para cancelar, clique nesta mensagem ou pressione Esc..",
                        "copyTitle": "Copiar para a Área de Transferência",
                        "csv": "CSV",
                        "excel": "Excel",
                        "pageLength": {
                            "-1": "Mostrar todos os registros",
                            "1": "Mostrar 1 registro",
                            "_": "Mostrar %d registros"
                        },
                        "pdf": "PDF",
                        "print": "Imprimir"
                    },
                    "autoFill": {
                        "cancel": "Cancelar",
                        "fill": "Preencher todas as células com",
                        "fillHorizontal": "Preencher células horizontalmente",
                        "fillVertical": "Preencher células verticalmente"
                    },
                    "lengthMenu": "Exibir _MENU_ resultados por página",
                    "searchBuilder": {
                        "add": "Adicionar Condição",
                        "button": {
                            "0": "Construtor de Pesquisa",
                            "_": "Construtor de Pesquisa (%d)"
                        },
                        "clearAll": "Limpar Tudo",
                        "condition": "Condição",
                        "conditions": {
                            "date": {
                                "after": "Depois",
                                "before": "Antes",
                                "between": "Entre",
                                "empty": "Vazio",
                                "equals": "Igual",
                                "not": "Não",
                                "notBetween": "Não Entre",
                                "notEmpty": "Não Vazio"
                            },
                            "number": {
                                "between": "Entre",
                                "empty": "Vazio",
                                "equals": "Igual",
                                "gt": "Maior Que",
                                "gte": "Maior ou Igual a",
                                "lt": "Menor Que",
                                "lte": "Menor ou Igual a",
                                "not": "Não",
                                "notBetween": "Não Entre",
                                "notEmpty": "Não Vazio"
                            },
                            "string": {
                                "contains": "Contém",
                                "empty": "Vazio",
                                "endsWith": "Termina Com",
                                "equals": "Igual",
                                "not": "Não",
                                "notEmpty": "Não Vazio",
                                "startsWith": "Começa Com"
                            }
                        },
                        "data": "Data",
                        "deleteTitle": "Excluir regra de filtragem",
                        "logicAnd": "E",
                        "logicOr": "Ou",
                        "title": {
                            "0": "Construtor de Pesquisa",
                            "_": "Construtor de Pesquisa (%d)"
                        },
                        "value": "Valor"
                    },
                    "searchPanes": {
                        "clearMessage": "Limpar Tudo",
                        "collapse": {
                            "0": "Painéis de Pesquisa",
                            "_": "Painéis de Pesquisa (%d)"
                        },
                        "count": "{total}",
                        "countFiltered": "{shown} ({total})",
                        "emptyPanes": "Nenhum Painel de Pesquisa",
                        "loadMessage": "Carregando Painéis de Pesquisa...",
                        "title": "Filtros Ativos"
                    },
                    "searchPlaceholder": "Digite um termo para pesquisar",
                    "thousands": "."
                } 
            } );
        } );    
    </script> 
@endsection