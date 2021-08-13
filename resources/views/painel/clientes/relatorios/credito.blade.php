<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <style>
            td{
                font-size: 13px;
            }
        </style>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 text-center">
                    <h2>Relatório de análise de crédito</h2>
                </div>
            </div>

            {{--  INFORMACOES PESSOAIS  --}}
            <div class="row">
                <div class="col-12">
                    <table class="table table-bordered" style="margin-top: 30px;">
                        <thead style="background-color: #f7f7f7">
                            <tr>
                                <th colspan="2" scope="col">Informações Pessoais</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><b>NOME</b></td>
                                <td>{{$analise->nome}}</td>
                            </tr>
                            <tr>
                                <td><b>NASCIMENTO</b></td>
                                <td>{{date("d/m/Y", strtotime($analise->nascimento))}}</td>
                            </tr>
                            <tr>
                                <td><b>SITUAÇÃO</b></td>
                                <td>{{ucfirst($analise->doc_situacao)}}</td>
                            </tr>
                            <tr>
                                <td><b>DATA DA SITUAÇÃO</b></td>
                                <td>{{date("d/m/Y", strtotime($analise->data_situacao))}}</td>
                            </tr>
                            <tr>
                                <td><b>CCF INDISPONÍVEL</b></td>
                                <td>@if($analise->ccf_disponivel) Sim @else Não @endif</td>
                            </tr>
                            <tr>
                                <td><b>NOME DA MÃE</b></td>
                                <td>{{$analise->nome_mae}}</td>
                            </tr>
                            <tr>
                                <td><b>CAPACIDADE DE PAGAMENTO COM POSITIVO</b></td>
                                <td>@if($analise->capacidade_pagamento_com_positivo) R${{$analise->capacidade_pagamento_com_positivo}} @else Não Consultado @endif</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            {{--  PENDENCIAS  --}}
            <div class="row">
                <div class="col-12">
                    <table class="table table-bordered" style="margin-top: 30px;">
                        <thead style="background-color: #f7f7f7">
                            <tr>
                                <th colspan="4" scope="col">Pendências</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $cont = $analise->pendencias->count();
                                $aux = 0;
                            @endphp
                            @if($cont > 0)
                                @foreach($analise->pendencias as $pendencia)
                                    @php
                                        $aux++;
                                    @endphp
                                    <tr>
                                        <td><b>Modalidade</b></td>
                                        <td>{{$pendencia->modalidade}}</td>
                                        <td><b>Data da Ocorrência</b></td>
                                        <td>{{date("d/m/Y", strtotime($pendencia->data_ocorrencia))}}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Valor</b></td>
                                        <td>{{$pendencia->tipo_moeda . number_format($pendencia->valor_pendencia, 2, ",", ".")}}</td>
                                        <td><b>Possui Avalista?</b></td>
                                        <td>@if($pendencia->analista) Sim @else Não @endif</td>
                                    </tr>
                                    <tr>
                                        <td><b>Contrato</b></td>
                                        <td>{{$pendencia->contrato}}</td>
                                        <td><b>Origem</b></td>
                                        <td>{{$pendencia->origem}}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Tipo de Anotação</b></td>
                                        <td>{{$pendencia->tipo_anotacao}}</td>
                                        <td><b>Praça da Ocorrência</b></td>
                                        <td>{{$pendencia->praca_embratel}}</td>
                                    </tr>
                                    @if($aux < $cont)
                                        <tr style="background-color: #f7f7f7">
                                            <td colspan="4"></td>
                                        </tr>
                                    @endif
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4" class="text-center">Este cliente não possui pendências</td>
                                </tr>
                            @endif
                            
                        </tbody>
                    </table>
                </div>
            </div>

            {{--  PROTESTOS  --}}

            <div class="row">
                <div class="col-12">
                    <table class="table table-bordered" style="margin-top: 30px;">
                        <thead style="background-color: #f7f7f7">
                            <tr>
                                <th colspan="4" scope="col">Protestos</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $cont = $analise->protestos->count();
                                $aux = 0;
                            @endphp
                            @if($cont > 0)
                                @foreach($analise->protestos as $protesto)
                                    @php
                                        $aux++;
                                    @endphp
                                    <tr>
                                        <td><b>Data da Ocorrência</b></td>
                                        <td>{{date("d/m/Y", strtotime($protesto->data_ocorrencia))}}</td>
                                        <td><b>Valor</b></td>
                                        <td>{{$protesto->tipo_moeda . number_format($protesto->valor_protesto, 2, ",", ".")}}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Cartório</b></td>
                                        <td>{{$protesto->cartorio}}</td>
                                        <td><b>Cidade</b></td>
                                        <td>{{$protesto->cidade}}</td>
                                    </tr>
                                    <tr>
                                        <td><b>UF</b></td>
                                        <td>{{$protesto->uf}}</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    @if($aux < $cont)
                                        <tr style="background-color: #f7f7f7">
                                            <td colspan="4"></td>
                                        </tr>
                                    @endif
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4" class="text-center">Este cliente não possui protestos</td>
                                </tr>
                            @endif
                            
                        </tbody>
                    </table>
                </div>
            </div>

            {{--  CHEQUES  --}}

            <div class="row">
                <div class="col-12">
                    <table class="table table-bordered" style="margin-top: 30px;">
                        <thead style="background-color: #f7f7f7">
                            <tr>
                                <th colspan="4" scope="col">Cheques</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $cont = $analise->cheques->count();
                                $aux = 0;
                            @endphp
                            @if($cont > 0)
                                @foreach($analise->cheques as $cheque)
                                    @php
                                        $aux++;
                                    @endphp
                                    <tr>
                                        <td><b>Data da Ocorrência</b></td>
                                        <td>{{date("d/m/Y", strtotime($cheque->data_ocorrencia))}}</td>
                                        <td><b>Número</b></td>
                                        <td>{{$cheque->numero_cheque}}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Alínea</b></td>
                                        <td>{{$cheque->alinea_cheque}}</td>
                                        <td><b>Qtd. CCF</b></td>
                                        <td>{{$cheque->quantidade_ccf}}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Valor</b></td>
                                        <td>R${{number_format($cheque->valor_cheque, 2, ',', '.')}}</td>
                                        <td><b>Número do Banco</b></td>
                                        <td>{{$cheque->numero_banco}}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Nome do Banco</b></td>
                                        <td>{{$cheque->nome_banco}}</td>
                                        <td><b>Agência</b></td>
                                        <td>{{$cheque->agencia}}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Cidade</b></td>
                                        <td>{{$cheque->cidade}}</td>
                                        <td><b>UF</b></td>
                                        <td>{{$cheque->uf}}</td>
                                    </tr>
                                    @if($aux < $cont)
                                        <tr style="background-color: #f7f7f7">
                                            <td colspan="4"></td>
                                        </tr>
                                    @endif
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4" class="text-center">Este cliente não possui cheques sem fundo</td>
                                </tr>
                            @endif
                            
                        </tbody>
                    </table>
                </div>
            </div>

            {{--  CONSULTA DE CHEQUE INTERNO  --}}

            <div class="row">
                <div class="col-12">
                    <table class="table table-bordered" style="margin-top: 30px;">
                        <thead style="background-color: #f7f7f7">
                            <tr>
                                <th colspan="4" scope="col">Consulta de Cheque Interno</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($analise->cheque_interno)
                                <tr>
                                    <td><b>Data do Primeiro Cheque a Vista</b></td>
                                    <td>{{$analise->cheque_interno->dia_mes_primeiro_cheque_a_vista}}</td>
                                    <td><b>Data do Último Cheque a Vista</b></td>
                                    <td>{{$analise->cheque_interno->dia_mes_ultimo_cheque_a_vista}}</td>
                                </tr>
                                <tr>
                                    <td><b>Total de 15 dias a Vista</b></td>
                                    <td>{{$analise->cheque_interno->tot_15_dias_a_vista}}</td>
                                    <td><b>Total de 30 dias a Prazo</b></td>
                                    <td>{{$analise->cheque_interno->tot_30_dias_a_prazo}}</td>
                                </tr>
                                <tr>
                                    <td><b>Total de 60 dias a Prazo</b></td>
                                    <td>{{$analise->cheque_interno->tot_60_dias_a_prazo}}</td>
                                    <td><b>Total de 90 dias a Prazo</b></td>
                                    <td>{{$analise->cheque_interno->tot_90_dias_a_prazo}}</td>
                                </tr>
                                <tr>
                                    <td><b>Total de Cheques a Prazo</b></td>
                                    <td>{{$analise->cheque_interno->tot_cheques_prazo}}</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            @else
                                <tr>
                                    <td colspan="4" class="text-center">Este cliente não possui consulta de cheque interno</td>
                                </tr>
                            @endif
                            
                        </tbody>
                    </table>
                </div>
            </div>

            {{--  CONSULTA DE CHEQUE MERCADO  --}}

            <div class="row">
                <div class="col-12">
                    <table class="table table-bordered" style="margin-top: 30px;">
                        <thead style="background-color: #f7f7f7">
                            <tr>
                                <th colspan="4" scope="col">Consulta de Cheque Mercado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($analise->cheque_mercado)
                                <tr>
                                    <td><b>Data do Primeiro Cheque a Vista</b></td>
                                    <td>{{$analise->cheque_mercado->dia_mes_primeiro_cheque_a_vista}}</td>
                                    <td><b>Data do Último Cheque a Vista</b></td>
                                    <td>{{$analise->cheque_mercado->dia_mes_ultimo_cheque_a_vista}}</td>
                                </tr>
                                <tr>
                                    <td><b>Total de 15 dias a Vista</b></td>
                                    <td>{{$analise->cheque_mercado->tot_15_dias_a_vista}}</td>
                                    <td><b>Total de 30 dias a Prazo</b></td>
                                    <td>{{$analise->cheque_mercado->tot_30_dias_a_prazo}}</td>
                                </tr>
                                <tr>
                                    <td><b>Total de 60 dias a Prazo</b></td>
                                    <td>{{$analise->cheque_mercado->tot_60_dias_a_prazo}}</td>
                                    <td><b>Total de 90 dias a Prazo</b></td>
                                    <td>{{$analise->cheque_mercado->tot_90_dias_a_prazo}}</td>
                                </tr>
                                <tr>
                                    <td><b>Total de Cheques a Prazo</b></td>
                                    <td>{{$analise->cheque_mercado->tot_cheques_prazo}}</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            @else
                                <tr>
                                    <td colspan="4" class="text-center">Este cliente não possui consulta de cheque mercado</td>
                                </tr>
                            @endif
                            
                        </tbody>
                    </table>
                </div>
            </div>

            {{--  CONSULTA DE REFERÊNCIA COMERCIAL  --}}

            <div class="row">
                <div class="col-12">
                    <table class="table table-bordered" style="margin-top: 30px;">
                        <thead style="background-color: #f7f7f7">
                            <tr>
                                <th colspan="4" scope="col">Consulta de Referência Comercial</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($analise->referencia_comercial)
                                <tr>
                                    <td><b>Consultante 1</b></td>
                                    <td>{{$analise->referencia_comercial->consultante_1}}</td>
                                    <td><b>Data da Consulta 1</b></td>
                                    <td>{{$analise->referencia_comercial->dia_mes_consulta_1}}</td>
                                </tr>
                                <tr>
                                    <td><b>Consultante 2</b></td>
                                    <td>{{$analise->referencia_comercial->consultante_2}}</td>
                                    <td><b>Data da Consulta 2</b></td>
                                    <td>{{$analise->referencia_comercial->dia_mes_consulta_2}}</td>
                                </tr>
                                <tr>
                                    <td><b>Consultante 3</b></td>
                                    <td>{{$analise->referencia_comercial->consultante_3}}</td>
                                    <td><b>Data da Consulta 3</b></td>
                                    <td>{{$analise->referencia_comercial->dia_mes_consulta_3}}</td>
                                </tr>
                            @else
                                <tr>
                                    <td colspan="4" class="text-center">Este cliente não possui consultas de referência comercial</td>
                                </tr>
                            @endif
                            
                        </tbody>
                    </table>
                </div>
            </div>

            {{--  CONSULTA SEM CHEQUE  --}}

            <div class="row">
                <div class="col-12">
                    <table class="table table-bordered" style="margin-top: 30px;">
                        <thead style="background-color: #f7f7f7">
                            <tr>
                                <th colspan="4" scope="col">Consultas sem Cheque</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($analise->sem_cheque)
                                <tr>
                                    <td><b>Consultas em 15 dias</b></td>
                                    <td>{{$analise->sem_cheque->qtd_consultas_15_dias}}</td>
                                    <td><b>Consultas em 30 dias</b></td>
                                    <td>{{$analise->sem_cheque->qtd_consultas_30_dias}}</td>
                                </tr>
                                <tr>
                                    <td><b>Consultas em 60 dias</b></td>
                                    <td>{{$analise->sem_cheque->qtd_consultas_60_dias}}</td>
                                    <td><b>Consultas em 90 dias</b></td>
                                    <td>{{$analise->sem_cheque->qtd_consultas_90_dias}}</td>
                                </tr>
                            @else
                                <tr>
                                    <td colspan="4" class="text-center">Este cliente não possui consultas sem cheque</td>
                                </tr>
                            @endif
                            
                        </tbody>
                    </table>
                </div>
            </div>

            {{--  DOCUMENTOS ROUBADOS  --}}

            <div class="row">
                <div class="col-12">
                    <table class="table table-bordered" style="margin-top: 30px;">
                        <thead style="background-color: #f7f7f7">
                            <tr>
                                <th colspan="4" scope="col">Documentos Roubados</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $cont = $analise->documentos_roubados->count();
                                $aux = 0;
                            @endphp
                            @if($cont > 0)
                                @foreach($analise->documentos_roubados as $documento)
                                    @php
                                        $aux++;
                                    @endphp
                                    <tr>
                                        <td><b>Tipo de Documento</b></td>
                                        <td>{{$documento->tipo_documento}}</td>
                                        <td><b>Número do Documento</b></td>
                                        <td>{{$documento->num_documento}}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Data de Ocorrência</b></td>
                                        <td>{{date("d/m/Y", strtotime($documento->dt_ocorrencia))}}</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    @if($aux < $cont)
                                        <tr style="background-color: #f7f7f7">
                                            <td colspan="4"></td>
                                        </tr>
                                    @endif
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4" class="text-center">Este cliente não possui documentos roubados</td>
                                </tr>
                            @endif
                            
                        </tbody>
                    </table>
                </div>
            </div>

            {{--  INDICES DE RELACIONAMENTO  --}}

            <div class="row">
                <div class="col-12">
                    <table class="table table-bordered" style="margin-top: 30px;">
                        <thead style="background-color: #f7f7f7">
                            <tr>
                                <th colspan="4" scope="col">Índices de Relacionamento</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $cont = $analise->indice_relacionamento->count();
                                $aux = 0;
                            @endphp
                            @if($cont > 0)
                                @foreach($analise->indice_relacionamento as $relacionamento)
                                    @php
                                        $aux++;
                                    @endphp
                                    <tr>
                                        <td><b>Código do Setor</b></td>
                                        <td>{{$relacionamento->cod_setor}}</td>
                                        <td><b>Descrição do Setor</b></td>
                                        <td>{{$relacionamento->desc_setor}}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Faixa</b></td>
                                        <td>{{$relacionamento->faixa}}</td>
                                        <td><b>Relacionamento</b></td>
                                        <td>{{$relacionamento->relacionamento}}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Tendência</b></td>
                                        <td>{{$relacionamento->tendencia}}</td>
                                        <td><b>Mensagem</b></td>
                                        <td>{{$relacionamento->mensagem}}</td>
                                    </tr>
                                    @if($aux < $cont)
                                        <tr style="background-color: #f7f7f7">
                                            <td colspan="4"></td>
                                        </tr>
                                    @endif
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4" class="text-center">Este cliente não possui índices de relacionamento</td>
                                </tr>
                            @endif
                            
                        </tbody>
                    </table>
                </div>
            </div>

            {{--  PARTICIPAÇÃO SOCIETARIA  --}}

            <div class="row">
                <div class="col-12">
                    <table class="table table-bordered" style="margin-top: 30px;">
                        <thead style="background-color: #f7f7f7">
                            <tr>
                                <th colspan="4" scope="col">Participações Societárias</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $cont = $analise->participacao_societaria->count();
                                $aux = 0;
                            @endphp
                            @if($cont > 0)
                                @foreach($analise->participacao_societaria as $participacao)
                                    @php
                                        $aux++;
                                    @endphp
                                    <tr>
                                        <td><b>Nome da Empresa</b></td>
                                        <td>{{$participacao->nome_empresa}}</td>
                                        <td><b>CNPJ</b></td>
                                        <td>{{$participacao->cnpj_empresa}}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Percentual de Participacao</b></td>
                                        <td>{{$participacao->percentual_participacao}}%</td>
                                        <td><b>UF</b></td>
                                        <td>{{$participacao->uf}}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Início da Participação</b></td>
                                        <td>{{date("d/m/Y", strtotime($participacao->dt_inicio_participacao))}}</td>
                                        <td><b>Última Atualização</b></td>
                                        <td>{{date("d/m/Y", strtotime($participacao->dt_atualizacao))}}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Restrição</b></td>
                                        <td>@if($participacao->possui_restricao) Sim @else Não @endif</td>
                                        <td><b>Situação</b></td>
                                        <td>{{$participacao->situacao_empresa}}</td>
                                    </tr>
                                    @if($aux < $cont)
                                        <tr style="background-color: #f7f7f7">
                                            <td colspan="4"></td>
                                        </tr>
                                    @endif
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4" class="text-center">Este cliente não possui índices de relacionamento</td>
                                </tr>
                            @endif
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>