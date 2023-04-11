@extends('painel.template.main')

@section('styles')
    <!-- DataTables -->
    <link href="{{asset('admin/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('titulo')
    Listagem de Assessores
@endsection

@section('conteudo')

<div class="my-3 row">
    <div class="col-12">
        <a name="" id="" class="btn btn-primary cpointer" data-bs-toggle="modal" data-bs-target="#modalCadastraAssessor" role="button">Novo Assessor</a>
    </div>
</div>
<div class="row justify-content-start">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th style="width: 120px;"></th>
                            <th>Nome</th>
                            <th>Telefone</th>
                            <th>E-mail</th>
                            <th></th>
                        </tr>
                    </thead>


                    <tbody>
                        @foreach($assessores as $assessor)
                            <tr @if(!$assessor->ativo) style="background-color: rgba(255, 0, 0, 0.2)" @endif>
                                <td class="text-center"><img @if($assessor->foto) src="{{ asset($assessor->foto) }}" @else src="{{ asset('admin/images/thumb-padrao.png') }}" @endif class="foto-rounded-100" alt=""></td>
                                <td style="vertical-align: middle; text-align:center;">{{$assessor->nome}}</td>
                                <td style="vertical-align: middle; text-align:center;">{{$assessor->telefone}}</td>
                                <td style="vertical-align: middle; text-align:center;">{{$assessor->email}}</td>
                                <td style="vertical-align: middle; text-align:center;">
                                    <a name="" id="" class="btn btn-warning cpointer" data-bs-toggle="modal" data-bs-target="#modalEditaAssessor{{$assessor->id}}" role="button">Editar</a>
                                    <a name="" id="" class="btn btn-danger" href="{{route('painel.assessor.excluir', ['assessor' => $assessor])}}" role="button">Excluir</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div> <!-- end row -->

<!-- Modal -->
@foreach($assessores as $assessor)
    <div class="modal fade" id="modalEditaAssessor{{$assessor->id}}" tabindex="-1" role="dialog" aria-labelledby="modalEditaAssessor{{$assessor->id}}Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditaAssessor{{$assessor->id}}Label">Editando a raça {{$assessor->nome}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('painel.assessor.editar', ['assessor' => $assessor])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <label for="nome">Nome</label>
                          <input type="text"
                            class="form-control" name="nome" value="{{$assessor->nome}}" maxlength="100" required>
                        </div>
                        <div class="mt-3 form-group">
                            <label for="email">E-mail</label>
                            <input type="text"
                              class="form-control" name="email" value="{{$assessor->email}}" maxlength="100" required>
                          </div>
                        <div class="mt-3 form-group">
                            <label for="telefone">Telefone</label>
                            <input type="text"
                              class="form-control" name="telefone" value="{{$assessor->telefone}}" maxlength="16">
                        </div>
                        <div class="mt-3">
                            <label for="" class="form-label">Ativo</label>
                            <select class="form-select form-select-lg" name="ativo" id="">
                                <option value="1" @if($assessor->ativo) selected @endif>Sim</option>
                                <option value="0" @if(!$assessor->ativo) selected @endif>Não</option>
                            </select>
                        </div>
                        <div class="mt-3">
                            <label for="" class="form-label">É um assessor interno ?</label>
                            <select class="form-select form-select-lg" name="interno" id="">
                                <option value="1" @if($assessor->interno) selected @endif>Sim</option>
                                <option value="0" @if(!$assessor->interno) selected @endif>Não</option>
                            </select>
                        </div>
                        <div class="mt-3">
                            <label for="" class="form-label">Vende no Marketplace</label>
                            <select class="form-select form-select-lg" name="marketplace" id="">
                                <option value="1" @if($assessor->marketplace) selected @endif>Sim</option>
                                <option value="0" @if(!$assessor->marketplace) selected @endif>Não</option>
                            </select>
                        </div>
                        <div class="mt-3">
                            <label for="" class="form-label">Foto</label>
                            <input type="file" class="form-control" name="foto">
                        </div>
                        <div class="mt-3 form-group text-end">
                            <button type="submit" class="mt-3 btn btn-primary">Salvar</button>
                        </div>                    
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach

<div class="modal fade" id="modalCadastraAssessor" tabindex="-1" role="dialog" aria-labelledby="modalCadastraAssessorLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCadastraAssessorLabel">Cadastrar Novo Assessor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('painel.assessor.cadastrar')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="nome">Nome</label>
                      <input type="text"
                        class="form-control" name="nome" placeholder="Digite o nome da assessor" maxlength="100" required>
                    </div>
                    <div class="mt-3 form-group">
                        <label for="email">E-mail</label>
                        <input type="text"
                          class="form-control" name="email" maxlength="100" required>
                      </div>
                    <div class="mt-3 form-group">
                        <label for="telefone">Telefone</label>
                        <input type="text"
                          class="form-control" name="telefone" placeholder="(00) 0 0000-0000" maxlength="16">
                    </div>
                    <div class="mt-3">
                        <label for="" class="form-label">Ativo</label>
                        <select class="form-select form-select-lg" name="ativo" id="">
                            <option value="1">Sim</option>
                            <option value="0">Não</option>
                        </select>
                    </div>
                    <div class="mt-3">
                        <label for="" class="form-label">É um assessor interno ?</label>
                        <select class="form-select form-select-lg" name="interno" id="">
                            <option value="1">Sim</option>
                            <option value="0">Não</option>
                        </select>
                    </div>
                    <div class="mt-3">
                        <label for="" class="form-label">Vende no Marketplace</label>
                        <select class="form-select form-select-lg" name="marketplace" id="">
                            <option value="1">Sim</option>
                            <option value="0">Não</option>
                        </select>
                    </div>
                    <div class="mt-3">
                        <label for="" class="form-label">Foto</label>
                        <input type="file" class="form-control" name="foto">
                    </div>
                    <div class="mt-3 form-group text-end">
                        <button type="submit" class="mt-3 btn btn-primary">Salvar</button>
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
    <script src="{{asset('admin/libs/apexcharts/apexcharts.min.js')}}"></script>
    <script>
        $(document).ready(function() {
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

            var vendas = {!! json_encode($vendas) !!};
            var assessores = new Array();
            var totais = new Array();

            for(venda in vendas){
                var dados = vendas[venda];
                assessores.push(dados.nome);
                totais.push(dados.total);
            }

            console.log(totais);

            options = {
                chart: {
                    height: 350,
                    type: "bar",
                    toolbar: {
                        show: !1
                    }
                },
                plotOptions: {
                    bar: {
                        horizontal: !0
                    }
                },
                dataLabels: {
                    enabled: !1
                },
                series: [{
                    data: totais
                }],
                colors: ["#34c38f"],
                grid: {
                    borderColor: "#f1f1f1"
                },
                xaxis: {
                    categories: assessores
                }
            };
            (chart = new ApexCharts(document.querySelector("#ranking_vendas"), options)).render();
        } );    
    </script> 
@endsection