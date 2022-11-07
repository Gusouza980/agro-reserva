@extends('painel.template.main')

@section('styles')
    <!-- DataTables -->
    <link href="{{asset('admin/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="{{asset('admin/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />  
@endsection

@section('titulo')
    <a href="{{route('painel.index')}}">Inicio</a> / <a href="{{route('painel.visitas')}}">Visitas</a>
@endsection

@section('conteudo')
<form action="" class="mb-3 row row-cols-lg-auto g-3 align-items-center" method="POST">
    @csrf
    <div class="form-group">
        <label for="">Início</label>
        <input type="date" name="inicio" id="" class="form-control" placeholder="" value="{{$inicio}}">
    </div>
    <div class="form-group">
        <label for="">Fim</label>
        <input type="date" name="fim" id="" class="form-control" placeholder="" value="{{$fim}}">
    </div>
    <div class="form-group">
        <label for="">Reserva</label>
        <select name="reserva" id="" class="form-control">
            <option value="-1">Todas</option>
            @foreach(\App\Models\Reserva::with("fazenda")->get() as $reserva)
                <option value="{{$reserva->id}}" @if(isset($filtro_reserva) && $filtro_reserva == $reserva->id) selected @endif>{{$reserva->fazenda->nome_fazenda}} - {{date("d/m/y", strtotime($reserva->inicio))}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <button type="submit" class="mt-4 btn btn-primary">Filtrar</button>
    </div>
</form>
<div class="row justify-content-center">
    <div class="col-12">
        <div class="card">
            <div class="card-body" style="overflow-x: scroll">

                <table id="datatable-buttons" data-order='[[ 0, "DESC" ]]' class="table table-bordered dt-responsive w-100">
                    <thead>
                        <tr>
                            <th>Data</th>
                            <th>Cliente</th>
                            <th>Fazenda</th>
                            <th>Lote</th>
                            <th>Cidade</th>
                            <th>Estado</th>
                            <th>Whatsapp</th>
                        </tr>
                    </thead>


                    <tbody>
                        @foreach($visitas as $visita)
                            <tr>
                                <td style="vertical-align: middle; text-align:center;">{{date("d/m/Y H:i:s", strtotime($visita->created_at))}}</td>
                                <td style="vertical-align: middle; text-align:center;">
                                    @if($visita->logado)
                                        {{$visita->cliente->nome_dono}}
                                    @else
                                        {{$visita->ip}}
                                    @endif
                                </td>
                                <td style="vertical-align: middle; text-align:center;">@if($visita->lote) {{$visita->lote->fazenda->nome_fazenda}} @else {{$visita->embriao->fazenda->nome_fazenda}} @endif</td>
                                <td style="vertical-align: middle; text-align:center;">@if($visita->lote) LOTE {{$visita->lote->numero . ": " . $visita->lote->nome}} @else LOTE {{$visita->embriao->numero . ": " . $visita->embriao->nome_pai}} @endif</td>
                                <td style="vertical-align: middle; text-align:center;">{{$visita->cidade}}</td>
                                <td style="vertical-align: middle; text-align:center;">{{$visita->estado}}</td>
                                @if($visita->logado)
                                    <td style="vertical-align: middle; text-align:center;">@if($visita->cliente->whatsapp) {{$visita->cliente->whatsapp}} @else {{$visita->cliente->telefone}} @endif</td>
                                @else
                                    <td></td>
                                @endif
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->



@endsection

@section('scripts')
<!-- Required datatable js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js"></script>
<script src="{{asset('admin/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<!-- Buttons examples -->
<script src="{{asset('admin/libs/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('admin/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin/libs/jszip/jszip.min.js')}}"></script>
<script src="{{asset('admin/libs/pdfmake/build/pdfmake.min.js')}}"></script>
<script src="{{asset('admin/libs/pdfmake/build/vfs_fonts.js')}}"></script>
<script src="{{asset('admin/libs/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('admin/libs/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('admin/libs/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>
<!-- Responsive examples -->
<script src="{{asset('admin/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('admin/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>
<script src="https://cdn.datatables.net/plug-ins/1.10.10/sorting/datetime-moment.js"></script>
    <script>
        $(document).ready(function () {
            $.fn.dataTable.moment( 'DD/MM/YYYY HH:mm:ss' );    //Formatação com Hora
            $.fn.dataTable.moment('DD/MM/YYYY');    //Formatação sem Hor
            $("#datatable").DataTable(),
                $("#datatable-buttons")
                    .DataTable({
                        lengthChange: !1,
                        buttons: [
                            {
                                extend: "excel",
                                exportOptions: {
                                    columns: ":visible"
                                }
                            },
                            {
                                extend: "pdf",
                                exportOptions: {
                                    columns: ":visible"
                                }
                            },
                            "colvis"
                        ],
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
                    })
                    .buttons()
                    .container()
                    .appendTo("#datatable-buttons_wrapper .col-md-6:eq(0)"),
                $(".dataTables_length select").addClass("form-select form-select-sm");
        });
    </script>  
@endsection