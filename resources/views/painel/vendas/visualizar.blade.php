@extends('painel.template.main')

@section('styles')
    <!-- DataTables -->
    <link href="{{asset('admin/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('titulo')
    Venda: {{$venda->codigo}}
@endsection

@section('conteudo')
<div class="row justify-content-center">
    <div class="col-12">
        <div class="card">
            
            <div class="card-body">
                <div class="row">
                    <div class="col-3 d-flex align-items-center">
                        <b>Data:</b> {{date("d/m/Y H:i:s", strtotime($venda->created_at))}}
                    </div>
                    <div class="col-3 d-flex align-items-center">
                        <b>Total:</b> R${{number_format($venda->carrinho->total, 2, ",", ".")}}
                    </div>
                    <div class="col-3 d-flex align-items-center">
                        <div class="form-floating mb-3" style="width: 250px;">
                            <select class="form-select" id="select-situacao">
                                @foreach(config("globals.situacoes") as $chave => $situacao)
                                    <option value="{{$chave}}" @if($chave = $venda->situacao) selected @endif>{{$situacao}}</option>
                                @endforeach
                            </select>
                            <label for="select-situacao">Situação</label>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
<div class="row justify-content-center">
    <div class="col-12">
        <h5>Produtos</h5>
        <div class="card">
            
            <div class="card-body">
                {{--  <h5 class="card-title">Produtos</h5>  --}}
                @php
                    $carrinho = $venda->carrinho;
                @endphp
                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                    <thead>
                        <tr>
                            <th>Imagem</th>
                            <th>Lote</th>
                            <th>Raça</th>
                            <th>Registro</th>
                            <th>Valor</th>
                            <th>Qtd</th>
                        </tr>
                    </thead>


                    <tbody>
                        @foreach($carrinho->produtos as $produto)
                            <tr>
                                <td><img src="{{asset($produto->lote->fazenda->logo)}}" style="max-width: 100px;" alt=""></td>
                                <td><b>{{$produto->lote->nome}}</b></td>
                                <td><b>Raça:</b> {{$produto->lote->raca->nome}}</td>
                                <td><b>Registro:</b> {{$produto->lote->registro}}</td>
                                <td><b>Valor:</b> R${{number_format($produto->lote->preco, 2, ",", ".")}}</td>
                                <td><b>Qtd:</b> {{$produto->quantidade}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
<div class="row mt-5 mb-3">
    <div class="col-12">
        <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalNovoBoleto">Adicionar Boleto</a>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-12">
        <h5>Boletos</h5>
        <div class="card">
            
            <div class="card-body">

                <table id="datatable2" class="table table-bordered dt-responsive  nowrap w-100">
                    <thead>
                        <tr>
                            <th>Descrição</th>
                            <th>Status</th>
                            <th>Validade</th>
                            <th></th>
                        </tr>
                    </thead>


                    <tbody>
                        @foreach($venda->boletos as $boleto)
                            <tr>
                                <td>{{$boleto->descricao}}</td>
                                <td>{{config("globals.situacoes")[$boleto->status]}}</td>
                                <td>{{date("d/m/Y", strtotime($boleto->validade))}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->



<div class="modal fade" id="modalNovoBoleto" tabindex="-1" role="dialog" aria-labelledby="modalNovoBoletoLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCadastraRacaLabel">Adicionar Boleto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('painel.vendas.boleto.adicionar', ['venda' => $venda])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="descricao">Descrição</label>
                        <input type="text"
                            class="form-control" name="descricao" placeholder="Digite uma descrição para o boleto" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validade">Validade</label>
                        <input type="date"
                            class="form-control" name="validade">
                    </div>
                    <div class="form-group mb-3">
                        <label for="caminho">Boleto</label>
                        <input class="form-control" type="file" name="caminho">                    
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