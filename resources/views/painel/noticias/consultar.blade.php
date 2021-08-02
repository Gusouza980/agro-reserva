@extends('painel.template.main')

@section('styles')
    <!-- DataTables -->
    <link href="{{asset('admin/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('titulo')
    Listagem de Notícias
@endsection

@section('botoes')
    
@endsection

@section('conteudo')
<div class="row">
    <div class="col-12">
        <a name="" id="" class="btn btn-success" href="{{route('painel.noticia.cadastro')}}" role="button">Nova Notícia</a>
    </div>
</div>
<div class="row mt-3">
    <div class="col-12">
        <div class="card">
            <div class="card-body" style="overflow-x: scroll;">
                <table id="datatable" class="table table-bordered dt-responsive text-center nowrap w-100">
                    <thead>
                        <tr>
                            <th>Título</th>
                            <th>Categoria</th>
                            <th>Autor</th>
                            <th>Visualizações</th>
                            <th>Publicada</th>
                            <th>Destaque</th>
                            <th>Data</th>
                            <th></th>
                        </tr>
                    </thead>


                    <tbody>

                        @foreach($noticias as $noticia)
                            <tr>
                                <td>{{$noticia->titulo}}</td>
                                <td>{{$noticia->categoria->nome}}</td>
                                <td>{{$noticia->usuario->nome}}</td>
                                <td>{{$noticia->visualizacoes}}</td>
                                <td class="text-center">
                                    @if(!$noticia->publicada)
                                        <i class="fas fa-times" style="color: red;"></i>
                                    @else
                                        <i class="fas fa-check" style="color: green;"></i>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if($noticia->destaque)
                                        <i class="fa fa-star destacado" nid="{{$noticia->id}}" aria-hidden="true"></i>
                                    @else
                                        <i class="fa fa-star destacar" nid="{{$noticia->id}}" aria-hidden="true"></i>
                                    @endif
                                </td>
                                <td>{{date("d/m/Y H:i:s", strtotime($noticia->created_at))}}</td>
                                <td>
                                    {{--  <a target="_blank" href="{{route('site.noticia', ['slug' => $noticia->slug])}}" id="" class="btn btn-primary" role="button">Preview</a>  --}}
                                    <a href="{{route('painel.noticia.editar', ['noticia' => $noticia])}}" id="" class="btn btn-warning" role="button">Editar</a>
                                    <a href="{{route('painel.noticia.deletar', ['noticia' => $noticia])}}" id="" class="btn btn-danger" role="button">Excluir</a>
                                    @if($noticia->publicada)
                                        <a href="{{route('painel.noticia.publicar', ['noticia' => $noticia])}}" id="" class="btn btn-primary" role="button">Esconder</a>
                                    @else
                                        <a href="{{route('painel.noticia.publicar', ['noticia' => $noticia])}}" id="" class="btn btn-success" role="button">Publicar</a>
                                    @endif
                                    <a href="{{route('painel.noticia.visitas', ['noticia' => $noticia])}}" id="" class="btn btn-primary" role="button">Visitas</a>
                                </td>
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

            $(".destacar").click(function(){
                var id = $(this).attr("nid");
                var _token = $('meta[name="_token"]').attr('content');
                var element = $(this);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': _token
                    }
                });  
                $.ajax({
                    url: '/sistema/noticias/destacar/' + id,
                    type: 'GET',
                    dataType: 'JSON',
                    success: function(data) {
                        toastr.success("Notícia destacada!", 'Sucesso')
                        var atual = $(".destacado");
                        atual.removeClass("destacado");
                        atual.addClass("destacar")
                        element.removeClass("destacar");
                        element.addClass("destacado");
                    },
                    error: function(){
                        toastr.error('Erro na operação. Atualize a página e tente novamente.', 'Erro')
                    }
                });
            });

            
        } );    
    </script> 
@endsection