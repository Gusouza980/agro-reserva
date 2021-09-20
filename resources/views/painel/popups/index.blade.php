@extends('painel.template.main')

@section('styles')
    <!-- DataTables -->
    <link href="{{ asset('admin/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('admin/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
@endsection

@section('titulo')
    Listagem de Popups
@endsection

@section('conteudo')

    <div class="row my-3">
        <div class="col-12">
            <a name="" id="" class="btn btn-primary cpointer" data-bs-toggle="modal" data-bs-target="#modalCadastraPopup"
                role="button">Nova Popup</a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-12 col-lg-12">
            <div class="card">
                <div class="card-body">

                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Descrição</th>
                                <th>Início</th>
                                <th>Fim</th>
                                <th>Ativo</th>
                            </tr>
                        </thead>


                        <tbody>
                            @foreach ($popups as $popup)
                                <tr>
                                    <td class="text-center">
                                        <div class="dropdown mt-4 mt-sm-0">
                                            <a href="#" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="fas fa-bars" aria-hidden="true"></i>
                                            </a>
                                            <div class="dropdown-menu" style="margin: 0px;">
                                                <a name="" id="" class="dropdown-item" data-bs-toggle="modal"
                                                    data-bs-target="#modalEditaPopup{{ $popup->id }}"
                                                    role="button">Editar</a>
                                            </div>
                                        </div>
                                    </td>
                                    <td style="vertical-align: middle; text-align:center;">{{ $popup->descricao }}</td>
                                    <td style="vertical-align: middle; text-align:center;">
                                        {{ date('d/m/Y', strtotime($popup->inicio)) }}</td>
                                    <td style="vertical-align: middle; text-align:center;">
                                        {{ date('d/m/Y', strtotime($popup->fim)) }}</td>
                                    <td style="vertical-align: middle; text-align:center;">
                                        @if ($popup->ativo)
                                            Sim
                                        @else
                                            Não
                                        @endif
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
    @foreach ($popups as $popup)
        <div class="modal fade" id="modalEditaPopup{{ $popup->id }}" tabindex="-1" role="dialog"
            aria-labelledby="modalEditaPopup{{ $popup->id }}Label" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEditaPopup{{ $popup->id }}Label">Editando a raça
                            {{ $popup->nome }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('painel.popup.editar', ['popup' => $popup]) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="descricao">Descrição</label>
                                <input type="text" class="form-control" name="descricao"
                                    placeholder="Digite uma descrição pra popup" maxlength="100"
                                    value="{{ $popup->descricao }}" required>
                            </div>
                            <div class="row">
                                <div class="form-group mt-3 col-12 col-lg-6">
                                    <label for="inicio">Início</label>
                                    <input type="date" class="form-control" name="inicio" min="{{ date('Y-m-d') }}"
                                        value="{{ date('Y-m-d', strtotime($popup->inicio)) }}" required>
                                </div>
                                <div class="form-group mt-3 col-12 col-lg-6">
                                    <label for="fim">Fim</label>
                                    <input type="date" class="form-control" name="fim" min="{{ date('Y-m-d') }}"
                                        value="{{ date('Y-m-d', strtotime($popup->fim)) }}" required>
                                </div>
                            </div>
                            <hr>
                            <div class="row mt-3">
                                <div class="col-12 mb-2">
                                    Imagem
                                </div>
                                <div class="col-12">
                                    <input type="file" name="imagem">
                                </div>
                                <div class="col-12 mt-3">
                                    <img src="{{ asset($popup->imagem) }}" style="max-width: 100%;" alt="">
                                </div>
                            </div>
                            <hr>
                            <div class="row mt-3">
                                <div class="col-12">
                                    <h6>Público alvo</h6>
                                </div>
                                <div class="col-6 col-lg-4 mt-3">
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" name="visitante" id="" value="1"
                                                @if ($popup->visitante) checked @endif>
                                            Visitantes
                                        </label>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-4 mt-3">
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" name="precadastro" id=""
                                                value="1" @if ($popup->precadastro) checked @endif>
                                            Pré Cadastrados
                                        </label>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-4 mt-3">
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" name="finalizado" id=""
                                                value="1" @if ($popup->finalizado) checked @endif>
                                            Cadastros Finalizados
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group text-end">
                                <button type="submit" class="btn btn-primary mt-3">Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <div class="modal fade" id="modalCadastraPopup" tabindex="-1" role="dialog"
        aria-labelledby="modalCadastraPopupLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCadastraPopupLabel">Cadastrar nova raça</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('painel.popup.cadastrar') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="descricao">Descrição</label>
                            <input type="text" class="form-control" name="descricao"
                                placeholder="Digite uma descrição pra popup" maxlength="100" required>
                        </div>
                        <div class="row">
                            <div class="form-group mt-3 col-12 col-lg-6">
                                <label for="inicio">Início</label>
                                <input type="date" class="form-control" name="inicio" min="{{ date('Y-m-d') }}"
                                    value="{{ date('Y-m-d') }}" required>
                            </div>
                            <div class="form-group mt-3 col-12 col-lg-6">
                                <label for="fim">Fim</label>
                                <input type="date" class="form-control" name="fim" min="{{ date('Y-m-d') }}"
                                    value="{{ date('Y-m-d') }}" required>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-12 mb-2">
                                Imagem
                            </div>
                            <div class="col-12">
                                <input type="file" name="imagem">
                            </div>
                        </div>
                        <hr>
                        <div class="row mt-3">
                            <div class="col-12">
                                <h6>Público alvo</h6>
                            </div>
                            <div class="col-6 col-lg-4 mt-3">
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="visitante" id="" value="1">
                                        Visitantes
                                    </label>
                                </div>
                            </div>
                            <div class="col-6 col-lg-4 mt-3">
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="precadastro" id="" value="1">
                                        Pré Cadastrados
                                    </label>
                                </div>
                            </div>
                            <div class="col-6 col-lg-4 mt-3">
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="finalizado" id="" value="1">
                                        Cadastros Finalizados
                                    </label>
                                </div>
                            </div>
                        </div>
                        <hr>
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
    <script src="{{ asset('admin/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable({
                language: {
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
            });
        });
    </script>
@endsection
