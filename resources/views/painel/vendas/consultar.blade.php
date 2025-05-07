@extends('painel.template.main')

@section('styles')
    <!-- DataTables -->
    <link href="{{asset('admin/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/libs/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('titulo')
    <a href="{{route('painel.index')}}">Inicio</a> / <a href="{{route('painel.vendas')}}">Vendas</a>
@endsection

@section('conteudo')
    <div class="my-3 row">
        <div class="col-12">
            <a name="" id="" class="btn btn-primary cpointer" onclick="Livewire.emit('carregaModalCadastroVenda')" role="button">Nova Venda</a> 
            <a name="" id="" class="ml-3 btn btn-primary cpointer" data-bs-toggle="modal" data-bs-target="#modalNovoCliente" role="button">Novo Cliente</a> 
        </div>
    </div>
    @livewire('painel.vendas.datatable')
    @livewire('painel.vendas.modal-cadastro-venda')
    @include('painel.includes.clientes.modal-cadastro')
@endsection

@section('scripts')
    <!-- Required datatable js -->
    <script src="{{asset('admin/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin/libs/select2/js/select2.min.js')}}"></script>
    <script>

        var lotes;

        function atualizaValores(){
            lotes = $('#select_lotes').select2('data');
            var parcelas = $("input[name='parcelas']").val();
            var parcelas_mes = $("input[name='parcelas_mes']").val();
            var desconto = parseFloat($("input[name='desconto']").val());
            var desconto_extra = parseFloat($("input[name='desconto_extra']").val());
            var comissao = 0;
            if(lotes.length == 0 || !parcelas || parcelas == 0){

            }

            var precos = new Array();
            var total = 0;
            for(var i = 0; i < lotes.length; i++){
                precos.push(parseFloat(lotes[i].element.dataset.preco));
                total += parseFloat(lotes[i].element.dataset.preco);
            }


            var valor_desconto = total * desconto / 100;
            var total_desconto = total - valor_desconto - desconto_extra;
            var valor_comissao = total * comissao / 100;
            var total_compra = total_desconto + valor_comissao;

            var valor_parcelas = total_desconto / parcelas;

            $("#valor-total").html("R$" + parseFloat(total.toFixed(2)).toLocaleString('pt-BR', {
                currency: 'BRL',
                minimumFractionDigits: 2
            }));

            $("#valor-desconto").html("R$" + parseFloat((valor_desconto + desconto_extra).toFixed(2)).toLocaleString('pt-BR', {
                currency: 'BRL',
                minimumFractionDigits: 2
            }));

            $("#valor-comissao").html("R$" + parseFloat(valor_comissao.toFixed(2)).toLocaleString('pt-BR', {
                currency: 'BRL',
                minimumFractionDigits: 2
            }));

            if(parcelas_mes > 1){
                $("#valor-parcelas").html(parcelas + "x ("+(parcelas/parcelas_mes)+" x "+parcelas_mes+")de R$" + parseFloat(valor_parcelas.toFixed(2)).toLocaleString('pt-BR', {
                    currency: 'BRL',
                    minimumFractionDigits: 2
                }));
            }else{
                $("#valor-parcelas").html(parcelas + "x de R$" + parseFloat(valor_parcelas.toFixed(2)).toLocaleString('pt-BR', {
                    currency: 'BRL',
                    minimumFractionDigits: 2
                }));
            }

            $("#valor-total-final").html("R$" + parseFloat(total_compra.toFixed(2)).toLocaleString('pt-BR', {
                currency: 'BRL',
                minimumFractionDigits: 2
            }));

            $("#caixa-valores").slideDown();

        }

        $(document).ready(function() {
            $('select[name="cliente"]').select2({
                dropdownParent: $('#modalNovaVenda'),
            });
            $('select[name="assessor"]').select2({
                dropdownParent: $('#modalNovaVenda'),
            });
            $('#select_lotes').select2({
                tags: true,
            });
            $("#btn-calcula").click(function(){
                atualizaValores();
            });

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