@extends('painel.template.main')

@section('styles')
    <!-- DataTables -->
    <link href="{{asset('admin/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('titulo')
    {{ $cliente->nome }}
@endsection

@section('conteudo')
<div class="row justify-content-center">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#home1" role="tab">
                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                            <span class="d-none d-sm-block">Informações Pessoais</span> 
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#profile1" role="tab">
                            <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                            <span class="d-none d-sm-block">Análise de Crédito</span> 
                        </a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content p-3 text-muted">
                    <div class="tab-pane active" id="home1" role="tabpanel">
                        <form action="{{route('painel.cliente.dados.salvar', ['cliente' => $cliente])}}" method="POST">
                            @csrf
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
                                        @foreach(\App\Models\Cidade::where("id_estado", $cliente->estado)->get() as $cidade)
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
                    <div class="tab-pane" id="profile1" role="tabpanel">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    <a href="{{route('painel.cliente.credito.analise', ['cliente' => $cliente])}}" name="" id="" class="btn btn-primary" href="#" role="button">Nova Análise</a>
                                </div>
                            </div>    
                            <div class="row mt-5">
                                <div class="col-12">
                                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>Nome</th>
                                                <th>Nascimento</th>
                                                <th>Situação</th>
                                                <th>Data da Situação</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                    
                    
                                        <tbody>
                                            @foreach($cliente->analises as $analise)
                                                <tr>
                                                    <td style="vertical-align: middle; text-align:center;">{{$analise->nome}}</td>
                                                    <td style="vertical-align: middle; text-align:center;">{{date("d/m/Y", strtotime($analise->nascimento))}}</td>
                                                    <td style="vertical-align: middle; text-align:center;">{{$analise->doc_situacao}}</td>
                                                    <td style="vertical-align: middle; text-align:center;">{{date("d/m/Y", strtotime($analise->data_situacao))}}</td>
                                                    <td style="vertical-align: middle; text-align:center;">
                                                        {{--  <a href="{{route('painel.cliente.visualizar', ['cliente' => $cliente])}}" name="" id="" class="btn btn-warning cpointer" role="button">Visualizar</a>  --}}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
                
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->



@endsection

@section('scripts')
    <!-- Required datatable js -->
    <script src="{{asset('admin/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script>
        $(document).ready(function() {
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