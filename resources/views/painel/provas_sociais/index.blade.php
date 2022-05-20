@extends('painel.template.main')

@section('styles')
    <!-- DataTables -->
    <link href="{{asset('admin/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('titulo')
    Listagem de Provas Sociais
@endsection

@section('conteudo')

<div class="row my-3">
    <div class="col-12">
        <a name="" id="" class="btn btn-primary cpointer" data-bs-toggle="modal" data-bs-target="#modalCadastraProva" role="button">Nova Prova Social</a>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Visualizações</th>
                            <th></th>
                        </tr>
                    </thead>


                    <tbody>
                        @foreach($provas as $prova)
                            <tr>
                                <td style="vertical-align: middle; text-align:center;">{{$prova->id}}</td>
                                <td style="vertical-align: middle; text-align:center;">{{$prova->nome}}</td>
                                <td style="vertical-align: middle; text-align:center;">{{$prova->visualizacoes}}</td>
                                <td style="vertical-align: middle; text-align:center;">
                                    <a name="" id="" class="btn btn-warning cpointer" data-bs-toggle="modal" data-bs-target="#modalEditaProvaSocial{{$prova->id}}" role="button">Editar</a>
                                    <a name="" id="" class="btn btn-danger" href="{{route('painel.provas_sociais.excluir', ['prova_social' => $prova])}}" role="button">Excluir</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->

<!-- Modal -->
@foreach($provas as $prova)
    <div class="modal fade" id="modalEditaProvaSocial{{$prova->id}}" tabindex="-1" role="dialog" aria-labelledby="modalEditaProvaSocial{{$prova->id}}Label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditaProvaSocial{{$prova->id}}Label">Editando a Prova Social {{$prova->nome}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('painel.prova_social.salvar')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="prova_id" value="{{ $prova->id }}">
                        <div class="form-group mb-3">
                          <label for="nome">Nome</label>
                          <input type="text"
                            class="form-control" name="nome" value="{{$prova->nome}}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="nome">Vídeo</label>
                            <input type="text"
                              class="form-control" name="video" value="{{$prova->video}}" required>
                        </div>
                        @if($prova->thumbnail)
                            <div class="row">
                                <div class="col-12 text-center">
                                    <img src="{{ asset($prova->thumbnail) }}" width="250" class="mx-auto" alt="">
                                </div>
                            </div>
                        @endif
                        <div class="mb-3">
                            <label for="" class="form-label">Imagem</label>
                            <input type="file" class="form-control" name="thumbnail" id="" placeholder="" aria-describedby="fileHelpId">
                            <small id="fileHelpId" class="form-text text-muted">200x350</small>
                        </div>
                        <div class="form-group text-end">
                            <button type="submit" class="btn btn-primary mt-3">Salvar</button>
                        </div>                    
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach

<div class="modal fade" id="modalCadastraProva" tabindex="-1" role="dialog" aria-labelledby="modalCadastraProvaLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCadastraProvaLabel">Cadastrar nova Prova Social</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('painel.prova_social.salvar')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="nome">Nome</label>
                        <input type="text"
                            class="form-control" name="nome" placeholder="Digite um nome descritivo" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="nome">Vídeo</label>
                        <input type="text"
                            class="form-control" name="video" placeholder="Cole aqui o link do vídeo no youtube" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Imagem</label>
                        <input type="file" class="form-control" name="thumbnail" id="" placeholder="" aria-describedby="fileHelpId">
                        <small id="fileHelpId" class="form-text text-muted">200x350</small>
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
        } );    
    </script> 
@endsection