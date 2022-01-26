@extends('painel.template.main')

@section('styles')
    <!-- DataTables -->
    <link href="{{asset('admin/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('titulo')
    Listagem de Usuários
@endsection

@section('conteudo')

<div class="row my-3">
    <div class="col-12">
        <a name="" id="" class="btn btn-primary cpointer" data-bs-toggle="modal" data-bs-target="#modalCadastraUsuario" role="button">Novo Usuário</a>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Usuário</th>
                            <th>Acesso</th>
                        </tr>
                    </thead>


                    <tbody>
                        @foreach($usuarios as $usuario)
                            <tr>
                                <td class="text-center">
                                    <div class="dropdown mt-4 mt-sm-0">
                                        <a href="#" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fas fa-bars" aria-hidden="true"></i>
                                        </a>
                                        <div class="dropdown-menu" style="margin: 0px;">
                                            <a class="dropdown-item py-3 cpointer" data-bs-toggle="modal" data-bs-target="#modalEditaUsuario{{$usuario->id}}">Editar</a>
                                        </div>
                                    </div>
                                </td>
                                <td style="vertical-align: middle; text-align:center;">{{$usuario->nome}}</td>
                                <td style="vertical-align: middle; text-align:center;">{{$usuario->email}}</td>
                                <td style="vertical-align: middle; text-align:center;">{{$usuario->usuario}}</td>
                                <td style="vertical-align: middle; text-align:center;">{{config("acessos.niveis")[$usuario->acesso]}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->

<!-- Modal -->
@foreach($usuarios as $usuario)
    <div class="modal fade" id="modalEditaUsuario{{$usuario->id}}" tabindex="-1" role="dialog" aria-labelledby="modalEditaUsuario{{$usuario->id}}Label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditaUsuario{{$usuario->id}}Label">Editando ao usuario: {{$usuario->nome}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('painel.usuarios.salvar')}}" method="post">
                        @csrf
                        <input type="hidden" name="usuario_id" value="{{$usuario->id}}">
                        <div class="form-group mb-3">
                            <label for="nome">Nome</label>
                            <input type="text"
                                class="form-control" name="nome" maxlength="100" value="{{$usuario->nome}}" placeholder="" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="nome">E-mail</label>
                            <input type="email"
                                class="form-control" name="email" maxlength="150" value="{{$usuario->email}}" placeholder="" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="nome">Usuário</label>
                            <input type="text"
                                class="form-control" name="usuario" maxlength="100" value="{{$usuario->usuario}}" placeholder="" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="nome">Senha</label>
                            <input type="password"
                                class="form-control" name="senha" placeholder="">
                                <small>Preencha caso deseje alterar a senha</small>
                        </div>
                        <div class="form-group mb-3">
                            <label for="nome">Acesso</label>
                            <select class="form-control" name="acesso" required>
                                @foreach(config("acessos.niveis") as $key => $acesso)
                                    <option value="{{$key}}" @if($usuario->acesso == $key) selected @endif>{{$acesso}}</option>
                                @endforeach
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

<div class="modal fade" id="modalCadastraUsuario" tabindex="-1" role="dialog" aria-labelledby="modalCadastraUsuarioLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCadastraUsuarioLabel">Cadastrar novo usuário</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('painel.usuarios.salvar')}}" method="post">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="nome">Nome</label>
                        <input type="text"
                            class="form-control" name="nome" maxlength="100" placeholder="" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="nome">E-mail</label>
                        <input type="email"
                            class="form-control" name="email" maxlength="150" placeholder="" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="nome">Usuário</label>
                        <input type="text"
                            class="form-control" name="usuario" maxlength="100" placeholder="" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="nome">Senha</label>
                        <input type="password"
                            class="form-control" name="senha" placeholder="" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="nome">Acesso</label>
                        <select class="form-control" name="acesso" required>
                            @foreach(config("acessos.niveis") as $key => $acesso)
                                <option value="{{$key}}">{{$acesso}}</option>
                            @endforeach
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