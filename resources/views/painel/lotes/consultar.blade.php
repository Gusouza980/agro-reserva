@extends('painel.template.main')

@section('styles')
<!-- DataTables -->
<link href="{{asset('admin/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

@endsection

@section('conteudo')
<div class="row my-3">
    <div class="col-12">
        <a href="{{route('painel.fazenda.reserva.lote.cadastro', ['reserva' => $reserva])}}" class="btn btn-primary" role="button">Novo Lote</a>
        <a href="{{route('painel.fazendas')}}" class="btn btn-primary" role="button">Voltar</a>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                    <thead class="text-center">
                        <tr>
                            <th></th>
                            <th>N°</th>
                            <th>Nome</th>
                            <th>Raça</th>
                            <th>Registro</th>
                            <th>Preço</th>
                            <th>Visitas</th>
                            <th>Situação</th>
                            <th>Ativo</th>
                            {{--  <th></th>  --}}
                        </tr>
                    </thead>


                    <tbody class="text-center">
                        @foreach($reserva->lotes as $lote)
                            <tr>
                                <td>
                                    <div class="dropdown mt-4 mt-sm-0">
                                        <a href="#" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fas fa-bars" aria-hidden="true"></i>
                                        </a>
                                        <div class="dropdown-menu" style="margin: 0px;">
                                            <a name="" id="" class="dropdown-item" href="{{route('painel.fazenda.reserva.lote.editar', ['lote' => $lote])}}" role="button">Editar</a>
                                            @if(!$lote->reservado)
                                                <a class="dropdown-item" href="{{route('painel.fazenda.reserva.lote.reservar', ['lote' => $lote])}}">Reservar</a>
                                            @endif
                                            <a class="dropdown-item" href="{{route('painel.fazenda.reserva.lote.ativo', ['lote' => $lote])}}">@if($lote->ativo) Desativar @else Ativar @endif</a>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">{{$lote->numero}}</td>
                                <td>{{$lote->nome}}</td>
                                <td>{{$lote->raca->nome}}</td>
                                <td>{{$lote->registro}}</td>
                                <td>R${{number_format($lote->preco, 2, ",", ".")}}</td>
                                <td>{{$lote->visitas}}</td>
                                <td>
                                    @if($lote->reservado)
                                        Reservado
                                    @else
                                        Livre
                                    @endif
                                </td>
                                <td>
                                    @if($lote->ativo)
                                        <i class="fa fa-star" style="color: yellow;" aria-hidden="true"></i>
                                    @else
                                        <i class="fa fa-star" aria-hidden="true"></i>
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
<div class="modal fade" id="modalReservar" tabindex="-1" role="dialog" aria-labelledby="modalReservarLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalReservarLabel">Reservar lote</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('painel.raca.cadastrar')}}" method="post">
                    @csrf
                    <input type="hidden" name="lote_id" value="">
                    <div class="form-floating mb-3">
                        <select class="form-select" name="cliente">
                            @foreach(\App\Models\Cliente::orderBy("nome_dono", "DESC")->get() as $cliente)
                                <option value="{{$cliente->id}}">{{$cliente->nome_dono}}</option>
                            @endforeach
                        </select>
                        <label for="select-situacao">Cliente</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select" name="assessor">
                            <option value="0">Nenhum</option>
                            @foreach(\App\Models\Assessor::orderBy("nome", "DESC")->get() as $assessor)
                                <option value="{{$assessor->id}}">{{$assessor->nome}}</option>
                            @endforeach
                        </select>
                        <label for="select-situacao">Assessor</label>
                    </div>
                    <div class="form-group">
                        <label for="">Parcelas</label>
                        <input type="number"
                            class="form-control" name="parcelas" min="0" step="1">
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
            },
            pageLength: -1,
            lengthChange: true,
            lengthMenu: [[10,50,100,1000, -1], [10,50,100,1000, "Todos"]], 
            order: [[ 1, "asc" ]],
        } );
    } );    
</script> 
@endsection