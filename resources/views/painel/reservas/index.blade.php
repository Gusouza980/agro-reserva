@extends('painel.template.main')

@section('styles')
    <!-- DataTables -->
    <link href="{{asset('admin/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('titulo')
    Listagem de Reservas da Fazenda: {{$fazenda->nome}}
@endsection

@section('conteudo')

<div class="row my-3">
    <div class="col-12">
        <a name="" id="" class="btn btn-primary cpointer" data-bs-toggle="modal" data-bs-target="#modalCadastraReserva" role="button">Nova Reserva</a>
    </div>
</div>
<div class="row justify-content-start">
    <div class="col-12 col-lg-10">
        <div class="card">
            <div class="card-body">

                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Início</th>
                            <th>Fim</th>
                            <th>Ativo</th>
                            <th>Aberta</th>
                            <th>Preço</th>
                            <th>Compras</th>
                            <th>Lotes</th>
                        </tr>
                    </thead>


                    <tbody>
                        @foreach($reservas as $reserva)
                            <tr>
                                <td class="text-center">
                                    <div class="dropdown mt-4 mt-sm-0">
                                        <a href="#" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fas fa-bars" aria-hidden="true"></i>
                                        </a>
                                        <div class="dropdown-menu" style="margin: 0px;">
                                            <a name="" id="" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalEditaReserva{{$reserva->id}}" role="button">Editar</a>
                                            {{--  <a name="" id="" class="dropdown-item" href="{{route('painel.fazenda.reserva.excluir', ['reserva' => $reserva])}}" role="button">Excluir</a>  --}}
                                            <a name="" id="" href="{{route('painel.fazenda.reservas.abertura', ['reserva' => $reserva])}}" class="dropdown-item" role="button">@if($reserva->aberto) Fechar @else Abrir @endif Reserva</a>
                                            <a name="" id="" href="{{route('painel.fazenda.reservas.preco', ['reserva' => $reserva])}}" class="dropdown-item" role="button">@if($reserva->preco_disponivel) Esconder @else Liberar @endif Preços</a>
                                            <a name="" id="" href="{{route('painel.fazenda.reservas.compras', ['reserva' => $reserva])}}" class="dropdown-item" role="button">@if($reserva->compra_disponivel) Bloquear @else Liberar @endif Compras</a>
                                            <a name="" id="" href="{{route('painel.fazenda.reserva.lotes', ['reserva' => $reserva])}}" class="dropdown-item" role="button">Lotes</a>
                                            <a name="" id="" href="{{route('painel.fazenda.reservas.relatorio', ['reserva' => $reserva])}}" class="dropdown-item" role="button">Relatório</a>
                                        </div>
                                    </div>
                                </td>
                                <td style="vertical-align: middle; text-align:center;">{{date("d/m/Y H:i:s", strtotime($reserva->inicio))}}</td>
                                <td style="vertical-align: middle; text-align:center;">{{date("d/m/Y H:i:s", strtotime($reserva->fim))}}</td>
                                <td style="vertical-align: middle; text-align:center;">
                                    @if($reserva->ativo)
                                        Sim
                                    @else
                                        Não
                                    @endif
                                </td>
                                <td style="vertical-align: middle; text-align:center;">
                                    @if($reserva->aberto)
                                        Sim
                                    @else
                                        Não
                                    @endif
                                </td>
                                <td style="vertical-align: middle; text-align:center;">
                                    @if($reserva->preco_disponivel)
                                        Liberado
                                    @else
                                        Oculto
                                    @endif
                                </td>
                                <td style="vertical-align: middle; text-align:center;">
                                    @if($reserva->compra_disponivel)
                                        Liberadas
                                    @else
                                        Bloqueadas
                                    @endif
                                </td>
                                <td style="vertical-align: middle; text-align:center;">{{$reserva->lotes->count()}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->

<!-- Modal -->
@foreach($reservas as $reserva)
    <div class="modal fade" id="modalEditaReserva{{$reserva->id}}" tabindex="-1" role="dialog" aria-labelledby="modalEditaReserva{{$reserva->id}}Label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditaReserva{{$reserva->id}}Label">Editando reserva</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('painel.fazenda.reserva.editar', ['reserva' => $reserva])}}" method="post">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="inicio">Início</label>
                            <input type="date"
                                class="form-control" name="inicio" value="{{date('Y-m-d', strtotime($reserva->inicio))}}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="fim">Fim</label>
                            <input type="date"
                                class="form-control" name="fim" value="{{date('Y-m-d', strtotime($reserva->fim))}}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="ativo">Ativo</label>
                            <select class="form-control" name="ativo">
                                <option value="0" @if(!$reserva->ativo) selected @endif>Não</option>
                                <option value="1" @if($reserva->ativo) selected @endif>Sim</option>
                            </select>
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

<div class="modal fade" id="modalCadastraReserva" tabindex="-1" role="dialog" aria-labelledby="modalCadastraReservaLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCadastraReservaLabel">Cadastrar nova Reserva</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('painel.fazenda.reserva.cadastrar', ['fazenda' => $fazenda])}}" method="post">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="inicio">Início</label>
                        <input type="date"
                            class="form-control" name="inicio" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="fim">Fim</label>
                        <input type="date"
                            class="form-control" name="fim" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="multi_fazendas">Reserva Multi Fazendas ?</label>
                        <select class="form-control" name="multi_fazendas">
                            <option value="0">Não</option>
                            <option value="1">Sim</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="ativo">Ativo</label>
                        <select class="form-control" name="ativo">
                            <option value="0">Não</option>
                            <option value="1">Sim</option>
                        </select>
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