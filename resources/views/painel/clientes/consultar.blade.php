@extends('painel.template.main')

@section('styles')
    <!-- DataTables -->
    <link href="{{asset('admin/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="{{asset('admin/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />  
@endsection

@section('titulo')
    <a href="{{route('painel.index')}}">Inicio</a> / <a href="{{route('painel.clientes')}}">Clientes</a>
@endsection

@section('conteudo')
@if(Util::acesso("clientes", "cadastro"))
    <div class="row my-3">
        <div class="col-12">
            <a name="" id="" class="btn btn-primary cpointer ml-3" data-bs-toggle="modal" data-bs-target="#modalNovoCliente" role="button">Novo Cliente</a> 
        </div>
    </div>
@endif

@if(Util::acesso("clientes", "consulta_completa"))

    <form action="" class="row mb-4" method="POST">
        @csrf
        <div class="form-group col-3">
            <label for="">Data de Cadastro - Início</label>
            <input type="date"
                class="form-control" name="inicio_cadastro" @if(isset($filtros) && $filtros['inicio_cadastro']) value="{{$filtros['inicio_cadastro']}}" @endif id="" aria-describedby="helpId">
        </div>
        <div class="form-group col-3">
            <label for="">Data de Cadastro - Fim</label>
            <input type="date"
                class="form-control" name="fim_cadastro" @if(isset($filtros) && $filtros['fim_cadastro']) value="{{$filtros['fim_cadastro']}}" @endif id="" aria-describedby="helpId">
        </div>
        <div class="form-group col-3">
            <label for="">Situação</label>
            <select class="form-control" name="situacao" id="" aria-describedby="helpId">
                <option value="0" @if(isset($filtros) && $filtros['situacao'] && $filtros['situacao'] == 0) selected @endif>Em Análise</option>
                <option value="1" @if(isset($filtros) && $filtros['situacao'] && $filtros['situacao'] == 1) selected @endif>Aprovado</option>
                <option value="-1" @if(isset($filtros) && $filtros['situacao'] && $filtros['situacao'] == -1) selected @endif>Reprovado</option>
            </select>
        </div>
        <div class="form-group col-1 d-flex align-items-end">
            <button type="submit" class="btn btn-block btn-laranja"><i class="fas fa-search"></i></button>
        </div>
    </form>

    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-body" style="overflow-x: scroll;">

                    <table id="datatable-buttons" class="table table-bordered nowrap w-100">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Data de Cad.</th>
                                <th>Nome</th>
                                <th>Cnpj/Cpf</th>
                                <th>Aprovação</th>
                                <th>Cadastro</th>
                                <th>Email</th>
                                <th>Whatsapp</th>
                                <th>Compras</th>
                            </tr>
                        </thead>


                        <tbody>
                            @foreach($clientes as $cliente)
                                <tr>
                                    <td>
                                        <div class="dropdown mt-4 mt-sm-0">
                                            <a href="#" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="fas fa-bars" aria-hidden="true"></i>
                                            </a>
                                            <div class="dropdown-menu" style="margin: 0px;">
                                                <a name="" id="" class="dropdown-item py-2"
                                                    href="{{route('painel.cliente.visualizar', ['cliente' => $cliente])}}"
                                                    role="button">Visualizar</a>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{date("d/m/Y H:i:s", strtotime($cliente->created_at))}}</td>
                                    <td style="vertical-align: middle; text-align:center;"><a href="{{route('painel.cliente.visualizar', ['cliente' => $cliente])}}">{{$cliente->nome_dono}}</a></td>
                                    <td style="vertical-align: middle; text-align:center;">
                                        @if($cliente->cpf && $cliente->cnpj)
                                            <b>CPF:</b> {{$cliente->cpf}} / <b>CNPJ:</b> {{$cliente->cnpj}}
                                        @elseif($cliente->cpf)
                                            <b>CPF:</b> {{$cliente->cpf}}
                                        @elseif($cliente->cnpj)
                                            <b>CNPJ:</b> {{$cliente->cnpj}}
                                        @else
                                            {{$cliente->documento}}
                                        @endif
                                    </td>
                                    <td style="vertical-align: middle; text-align:center;">
                                        @if($cliente->aprovado == 0)
                                            <span>Em Análise</span>
                                        @elseif($cliente->aprovado == -1)
                                            <span style="color: red;">Reprovado</span>
                                        @else
                                            <span style="color: green;">Aprovado</span>
                                        @endif
                                    </td>
                                    <td style="vertical-align: middle; text-align:center;">
                                        @if($cliente->finalizado == 0)
                                            Pré
                                        @else
                                            Finalizado
                                        @endif
                                    </td>
                                    <td style="vertical-align: middle; text-align:center;">{{$cliente->email}}</td>
                                    <td style="vertical-align: middle; text-align:center;">
                                        @if($cliente->whatsapp && $cliente->telefone)
                                            {{$cliente->whatsapp}} / {{$cliente->telefone}}
                                        @elseif($cliente->whatsapp)
                                            {{$cliente->whatsapp}}
                                        @else
                                            {{$cliente->telefone}}
                                        @endif
                                    </td>
                                    <td>
                                        @php
                                            $qtd = 0;
                                        @endphp

                                        @foreach($cliente->carrinhos->where("aberto", false) as $carrinho)
                                            @php
                                                $qtd += $carrinho->produtos->count();
                                            @endphp
                                        @endforeach

                                        {{ $qtd }} lotes
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

@else

    <div class="row">
        <div class="col-12">
            <form action="" id="form-pesquisa" class="row">
                <div class="form-group col-11">
                    <label for=""></label>
                    <input type="text"
                        class="form-control" name="nome_cliente" id="" aria-describedby="helpId" placeholder="">
                    <small id="helpId" class="form-text text-muted">Digite o nome do cliente</small>
                </div>
                <div class="form-group col-1 d-flex align-items-center">
                    <button type="submit" class="btn btn-block btn-laranja"><i class="fas fa-search"></i></button>
                </div>
            </form>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-body" style="overflow-x: scroll;">

                    <table id="datatable" class="table table-bordered nowrap w-100">
                        <thead>
                            <tr>
                                <th>Data de Cad.</th>
                                <th>Nome</th>
                                <th>Cnpj/Cpf</th>
                                <th>Aprovação</th>
                                <th>Cadastro</th>
                                <th>Email</th>
                                <th>Whatsapp</th>
                            </tr>
                        </thead>
                        <tbody id="body-pesquisa">
                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

@endif

@include('painel.includes.clientes.modal-cadastro')


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
                        columnDefs: [
                            {
                                visible: false,
                                targets: [5, 6]
                            }
                        ],
                        order: [[1, "desc"]]
                    })
                    .buttons()
                    .container()
                    .appendTo("#datatable-buttons_wrapper .col-md-6:eq(0)"),
                $(".dataTables_length select").addClass("form-select form-select-sm");
        
        
        
        
        
            });
            $("#form-pesquisa").submit(function(e){
                e.preventDefault();
                var nome = $("input[name='nome_cliente']").val();
                if(nome.length < 6){
                    alert("Informe pelo menos 6 caracteres");
                    return;
                }
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="_token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: "{!! route('painel.cliente.pesquisar') !!}",
                    dataType: 'json',
                    data: {
                        nome: nome
                    },
                    success: function (clientes) {
                        html = "";
                        for(var k in clientes){
                            var data = new Date(clientes[k].created_at);
                            var dataFormatada = data.toLocaleDateString('pt-BR', {timeZone: 'UTC'});
                            html += "<tr>";
                            html += "<td>" + dataFormatada + "</td>";
                            html += "<td>" + clientes[k].nome_dono + "</td>";
                            html += "<td>";
                            if(clientes[k].cpf){
                                html += "<b>CPF</b>: " + clientes[k].cpf;
                                if(clientes[k].cnpj){
                                    html += " / ";
                                }
                            }
                            if(clientes[k].cnpj){
                                html += "<b>CNPJ</b>: " + clientes[k].cnpj;
                            }
                            html += "</td>";
                            if(clientes[k].aprovado == 0){
                                html += "<td> Em análise </td>";
                            }else if(clientes[k].aprovado == -1){
                                html += "<td> Reprovado </td>";
                            }else{
                                html += "<td> Aprovado </td>";
                            }
                            if(clientes[k].finalizado == 0){
                                html += "<td> Pré </td>";
                            }else{
                                html += "<td> Completo </td>";
                            }
                            html += "<td>" + clientes[k].email + "</td>";
                            html += "<td>";
                            if(clientes[k].telefone){
                                html += clientes[k].telefone;
                                if(clientes[k].whatsapp){
                                    html += " / ";
                                }
                            }
                            if(clientes[k].whatsapp){
                                html += clientes[k].whatsapp;
                            }
                            html += "</td>";
                        }
                        $("#body-pesquisa").html(html);
                    },
                    error: function (data) {
                        console.log(data);
                    }
                });
            })

    </script> 
@endsection