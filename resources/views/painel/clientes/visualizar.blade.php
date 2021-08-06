@extends('painel.template.main')

@section('styles')
    <!-- DataTables -->
    <link href="{{asset('admin/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('titulo')
    {{ $cliente->nome }}
@endsection

@section('conteudo')
@if($cliente->aprovado == 0)
    <div class="row mb-3">
        <div class="col-12">
            <a name="" id="" class="btn btn-primary" href="{{route('painel.cliente.aprovacao', ['cliente' => $cliente, 'aprovacao' => 'aprovado'])}}" role="button">Aprovar</a>
            <a name="" id="" class="btn btn-danger ml-3" href="{{route('painel.cliente.aprovacao', ['cliente' => $cliente, 'aprovacao' => 'reprovado'])}}" role="button">Reprovar</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="alert alert-danger" role="alert">
                Este cliente ainda está com o cadastro em análise.
            </div>
        </div>
    </div>
@endif
@if($cliente->analises->count() == 0)
<div class="row">
    <div class="col-12">
        <div class="alert alert-danger" role="alert">
            Ainda não foram feitas análises de crédito para este cliente
        </div>
    </div>
</div>
@endif
@if($cliente->aprovado == -1)
    <div class="alert alert-danger" role="alert">
        <strong>CLIENTE REPROVADO</strong>
    </div>
@endif
<div class="row justify-content-center">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#home1" role="tab">
                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                            <span class="d-none d-sm-block">Informações Pessoais</span> 
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#profile1" role="tab">
                            <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                            <span class="d-none d-sm-block">Análise de Crédito</span> 
                        </a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content p-3 text-muted">
                    <div class="tab-pane active" id="home1" role="tabpanel">
                        <form action="{{route('painel.cliente.dados.salvar', ['cliente' => $cliente])}}" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <div class="form-group col-12 col-lg-6 form-conta mb-3">
                                    <label for="nome_dono">Nome</label>
                                    <input type="text"
                                    class="form-control" name="nome_dono" id="nome_dono" aria-describedby="helpId" value="{{$cliente->nome_dono}}" >
                                </div>
                                <div class="form-group col-12 col-lg-6 form-conta mb-3">
                                    <label for="nome_fazenda">Fazenda</label>
                                    <input type="text"
                                    class="form-control" name="nome_fazenda" id="nome_fazenda" aria-describedby="helpId" value="{{$cliente->nome_fazenda}}" >
                                </div>
                                <div class="form-group col-12 col-lg-6 form-conta mb-3">
                                    <label for="email">E-mail</label>
                                    <input type="email"
                                        class="form-control" name="email" id="email" aria-describedby="helpId" value="{{$cliente->email}}" >
                                </div>
                                <div class="form-group col-12 col-lg-6 form-conta mb-3">
                                    <label for="nascimento">Data de Nascimento</label>
                                    <input type="date"
                                    class="form-control" name="nascimento" id="nascimento" aria-describedby="helpId" value="{{$cliente->nascimento}}" >
                                </div>
                                <div class="form-group col-12 col-lg-6 form-conta mb-3">
                                    <label for="ultimo_acesso">Último Acesso</label>
                                    <input type="date"
                                        class="form-control" name="ultimo_acesso" id="ultimo_acesso" aria-describedby="helpId" value="{{$cliente->ultimo_acesso}}" readonly>
                                </div>
                                <div class="form-group col-12 col-lg-6 form-conta mb-3">
                                    <label for="documento">Documento Cadastrado</label>
                                    <input type="text"
                                    class="form-control" name="documento" id="documento" aria-describedby="helpId" value="{{$cliente->documento}}" >
                                </div>
                                <div class="form-group col-12 col-lg-6 form-conta mb-3">
                                    <label for="rg">RG</label>
                                    <input type="text"
                                        class="form-control" name="rg" id="rg" aria-describedby="helpId" value="{{$cliente->rg}}" >
                                </div>
                                <div class="form-group col-12 col-lg-6 form-conta mb-3">
                                    <label for="cpf">CPF</label>
                                    <input type="text"
                                    class="form-control" name="cpf" id="cpf" aria-describedby="helpId" value="{{$cliente->cpf}}">
                                </div>
                                <div class="form-group col-12 col-lg-6 form-conta mb-3">
                                    <label for="whatsapp">Whatsapp</label>
                                    <input type="text"
                                        class="form-control" name="whatsapp" id="whatsapp" aria-describedby="helpId" value="{{$cliente->whatsapp}}" >
                                    </div>
                                <div class="form-group col-12 col-lg-6 form-conta mb-3">
                                    <label for="interesse">Interesse</label>
                                    <input type="text"
                                    class="form-control" name="interesse" id="interesse" aria-describedby="helpId" value="{{$cliente->interesses}}" >
                                </div>
                                <div class="form-group col-12 col-lg-6 form-conta mb-3">
                                    <label for="inscricao_produtor_rural">Inscrição de Produtor Rural</label>
                                    <input type="text"
                                    class="form-control" name="inscricao_produtor_rural" id="inscricao_produtor_rural" aria-describedby="helpId" value="{{$cliente->inscricao_produtor_rural}}">
                                </div>
                            </div>
                            <div class="row my-4">
                                <div class="col-12 text-left">
                                    <h5>Endereço</h5>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-12 col-lg-7 form-conta mb-3">
                                    <label for="rua">Rua</label>
                                    <input type="text"
                                    class="form-control" name="rua" id="rua" aria-describedby="helpId" value="{{$cliente->rua}}" >
                                </div>
                                <div class="form-group col-5 col-lg-2 form-conta mb-3">
                                    <label for="numero">Número</label>
                                    <input type="text"
                                        class="form-control" name="numero" id="numero" aria-describedby="helpId" value="{{$cliente->numero}}" >
                                </div>
                                <div class="form-group col-7 col-lg-3 form-conta mb-3">
                                    <label for="bairro">Bairro</label>
                                    <input type="text"
                                        class="form-control" name="bairro" id="bairro" aria-describedby="helpId" value="{{$cliente->bairro}}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-12 form-conta mb-3">
                                    <label for="complemento">Complemento</label>
                                    <input type="text"
                                        class="form-control" name="complemento" id="complemento" aria-describedby="helpId" value="{{$cliente->complemento}}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-12 col-lg-3 form-conta mb-3">
                                    <label for="estado">Estado</label>
                                    <select class="form-control" name="estado" id="" >
                                        @foreach(\App\Models\Estado::all() as $estado)
                                            <option value="{{$estado->id}}" @if($cliente->estado == $estado->id) selected @endif>{{$estado->nome}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-12 col-lg-4 form-conta mb-3">
                                    <label for="cidade">Cidade</label>
                                    <select class="form-control" name="cidade" >
                                        @foreach(\App\Models\Cidade::where("id_estado", $cliente->estado)->get() as $cidade)
                                            <option value="{{$cidade->id}}" @if($cliente->cidade == $cidade->id) selected @endif>{{$cidade->nome}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-7 col-lg-3 form-conta mb-3">
                                    <label for="cep">CEP</label>
                                    <input type="text"
                                        class="form-control" name="cep" id="cep" aria-describedby="helpId" value="{{$cliente->cep}}" >
                                </div>
                            </div>

                            <div class="row my-4">
                                <div class="col-12 text-left">
                                    <h5>Referência Bancária</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-12 col-lg-7 form-conta  mb-3">
                                    <label for="referencia_bancaria_banco">Banco</label>
                                    <input type="text"
                                    class="form-control" name="referencia_bancaria_banco" id="referencia_bancaria_banco" aria-describedby="helpId" value="{{$cliente->referencia_bancaria_banco}}" >
                                </div>
                                <div class="form-group col-5 col-lg-2 form-conta  mb-3">
                                    <label for="referencia_bancaria_gerente">Gerente</label>
                                    <input type="text"
                                        class="form-control" name="referencia_bancaria_gerente" id="referencia_bancaria_gerente" aria-describedby="helpId" value="{{$cliente->referencia_bancaria_gerente}}" >
                                </div>
                                <div class="form-group col-7 col-lg-3 form-conta  mb-3">
                                    <label for="referencia_bancaria_tel">Telefone</label>
                                    <input type="text"
                                        class="form-control" name="referencia_bancaria_tel" id="referencia_bancaria_tel" aria-describedby="helpId" value="{{$cliente->referencia_bancaria_tel}}" >
                                </div>
                            </div>
                            <div class="row my-4">
                                <div class="col-12 text-left">
                                    <h5>Referências Comerciais</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-12 col-lg-8 form-conta mb-3">
                                    <label for="referencia_comercial1">Referência</label>
                                    <input type="text"
                                    class="form-control" name="referencia_comercial1" id="referencia_comercial1" aria-describedby="helpId" value="{{$cliente->referencia_comercial1}}" >
                                </div>
                                <div class="form-group col-12 col-lg-4 form-conta mb-3">
                                    <label for="referencia_comercial1_tel">Telefone</label>
                                    <input type="text"
                                        class="form-control" name="referencia_comercial1_tel" id="referencia_comercial1_tel" aria-describedby="helpId" value="{{$cliente->referencia_comercial1_tel}}" >
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-12 col-lg-8 form-conta mb-3">
                                    <label for="referencia_comercial2">Referência</label>
                                    <input type="text"
                                    class="form-control" name="referencia_comercial2" id="referencia_comercial2" aria-describedby="helpId" value="{{$cliente->referencia_comercial2}}" >
                                </div>
                                <div class="form-group col-12 col-lg-4 form-conta mb-3">
                                    <label for="referencia_comercial2_tel">Telefone</label>
                                    <input type="text"
                                        class="form-control" name="referencia_comercial2_tel" id="referencia_comercial2_tel" aria-describedby="helpId" value="{{$cliente->referencia_comercial2_tel}}" >
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-12 col-lg-8 form-conta mb-3">
                                    <label for="referencia_comercial3">Referência</label>
                                    <input type="text"
                                    class="form-control" name="referencia_comercial3" id="referencia_comercial3" aria-describedby="helpId" value="{{$cliente->referencia_comercial3}}" >
                                </div>
                                <div class="form-group col-12 col-lg-4 form-conta mb-3">
                                    <label for="referencia_comercial3_tel">Telefone</label>
                                    <input type="text"
                                        class="form-control" name="referencia_comercial3_tel" id="referencia_comercial3_tel" aria-describedby="helpId" value="{{$cliente->referencia_comercial3_tel}}" >
                                </div>
                            </div>
                            <div class="row my-4">
                                <div class="col-12 text-left">
                                    <h5>Referências Coorporativas</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-12 col-lg-8 form-conta mb-3">
                                    <label for="referencia_coorporativa1">Referência</label>
                                    <input type="text"
                                    class="form-control" name="referencia_coorporativa1" id="referencia_coorporativa1" aria-describedby="helpId" value="{{$cliente->referencia_coorporativa1}}">
                                </div>
                                <div class="form-group col-12 col-lg-4 form-conta mb-3">
                                    <label for="referencia_coorporativa1_tel">Telefone</label>
                                    <input type="text"
                                        class="form-control" name="referencia_coorporativa1_tel" id="referencia_coorporativa1_tel" aria-describedby="helpId" value="{{$cliente->referencia_coorporativa1_tel}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-12 col-lg-8 form-conta mb-3">
                                    <label for="referencia_coorporativa2">Referência</label>
                                    <input type="text"
                                    class="form-control" name="referencia_coorporativa2" id="referencia_coorporativa2" aria-describedby="helpId" value="{{$cliente->referencia_coorporativa2}}">
                                </div>
                                <div class="form-group col-12 col-lg-4 form-conta mb-3">
                                    <label for="referencia_coorporativa2_tel">Telefone</label>
                                    <input type="text"
                                        class="form-control" name="referencia_coorporativa2_tel" id="referencia_coorporativa2_tel" aria-describedby="helpId" value="{{$cliente->referencia_coorporativa2_tel}}">
                                </div>
                            </div>
                            <hr>
                            <div class="row mb-3">
                                <div class="col-12 text-right">
                                    <button class="btn btn-vermelho btn-hover-preto px-5">
                                        Salvar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="profile1" role="tabpanel">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    <a href="{{route('painel.cliente.credito.analise', ['cliente' => $cliente])}}" name="" id="" class="btn btn-primary" href="#" role="button">Nova Análise</a>
                                </div>
                            </div>    
                            <div class="row mt-5">
                                <div class="col-12">
                                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>Nome</th>
                                                <th>Nascimento</th>
                                                <th>Situação</th>
                                                <th>Data da Situação</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                    
                    
                                        <tbody>
                                            @foreach($cliente->analises as $analise)
                                                <tr>
                                                    <td style="vertical-align: middle; text-align:center;">{{$analise->nome}}</td>
                                                    <td style="vertical-align: middle; text-align:center;">{{date("d/m/Y", strtotime($analise->nascimento))}}</td>
                                                    <td style="vertical-align: middle; text-align:center;">{{$analise->doc_situacao}}</td>
                                                    <td style="vertical-align: middle; text-align:center;">{{date("d/m/Y", strtotime($analise->data_situacao))}}</td>
                                                    <td style="vertical-align: middle; text-align:center;">
                                                        <a name="" id="" class="btn btn-warning cpointer" data-bs-toggle="modal" data-bs-target="#modalAnalise{{$analise->id}}" role="button">Visualizar</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
                
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->

@foreach($cliente->analises as $analise)

<div id="modalAnalise{{$analise->id}}" class="modal fade" tabindex="-1" aria-labelledby="#modalAnalise{{$analise->id}}Label" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="modalAnalise{{$analise->id}}Label">{{date("d/m/Y", strtotime($analise->created_at))}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#pessoais{{$analise->id}}" role="tab">
                                        <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                        <span class="d-none d-sm-block">Informações Pessoais</span> 
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#pendencias{{$analise->id}}" role="tab">
                                        <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                        <span class="d-none d-sm-block">Pendências</span> 
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#protestos{{$analise->id}}" role="tab">
                                        <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                        <span class="d-none d-sm-block">Protestos Estaduais</span> 
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#cheques{{$analise->id}}" role="tab">
                                        <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                        <span class="d-none d-sm-block">Cheques sem Fundo</span> 
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#consultas{{$analise->id}}" role="tab">
                                        <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                        <span class="d-none d-sm-block">Consultas</span> 
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#roubados{{$analise->id}}" role="tab">
                                        <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                        <span class="d-none d-sm-block">Documentos Roubados</span> 
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#relacionamento{{$analise->id}}" role="tab">
                                        <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                        <span class="d-none d-sm-block">Índice de Relacionamento</span> 
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#societaria{{$analise->id}}" role="tab">
                                        <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                        <span class="d-none d-sm-block">Participação Societária</span> 
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content p-3 text-muted">
                                <div class="tab-pane active" id="pessoais{{$analise->id}}" role="tabpanel">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-12">
                                                <form class="mt-4" action="">
                                                    <div class="row">
                                                        <div class="form-group col-12 col-lg-6 mb-3">
                                                            <label for="">Nome</label>
                                                            <input type="text"
                                                                class="form-control" name="" id="" readonly value="{{$analise->nome}}">
                                                        </div>
                                                        <div class="form-group col-12 col-lg-2 mb-3">
                                                            <label for="">Nascimento</label>
                                                            <input type="date"
                                                                class="form-control" name="" id="" readonly value="{{$analise->nascimento}}">
                                                        </div>
                                                        <div class="form-group col-12 col-lg-2 mb-3">
                                                            <label for="">Situação</label>
                                                            <input type="text"
                                                                class="form-control" name="" id="" readonly value="{{ucfirst($analise->doc_situacao)}}">
                                                        </div>
                                                        <div class="form-group col-12 col-lg-2 mb-3">
                                                            <label for="">Data da Situação</label>
                                                            <input type="date"
                                                                class="form-control" name="" id="" readonly value="{{ucfirst($analise->data_situacao)}}">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-12 col-lg-2 mb-3">
                                                            <label for="">CCF Indisponível</label>
                                                            <input type="text"
                                                                class="form-control" name="" id="" readonly value="@if($analise->ccf_disponivel) Sim @else Não @endif">
                                                        </div>
                                                        <div class="form-group col-12 col-lg-6 mb-3">
                                                            <label for="">Nome da Mãe</label>
                                                            <input type="text"
                                                                class="form-control" name="" id="" readonly value="{{$analise->nome_mae}}">
                                                        </div>
                                                        <div class="form-group col-12 col-lg-4 mb-3">
                                                            <label for="">Capacidade de Pagamento com Positivo</label>
                                                            <input type="text"
                                                                class="form-control" name="" id="" readonly value="@if($analise->capacidade_pagamento_com_positivo) R${{$analise->capacidade_pagamento_com_positivo}} @else Não Consultado @endif">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="pendencias{{$analise->id}}" role="tabpanel">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-12">
                                                <form class="mt-4" action="">
                                                    @if($analise->pendencias->count() > 0)
                                                        @foreach($analise->pendencias as $pendencia)
                                                            <div class="row">
                                                                <div class="form-group col-12 col-lg-4 mb-3">
                                                                    <label for="">Modalidade</label>
                                                                    <input type="text"
                                                                        class="form-control" name="" id="" readonly value="{{$pendencia->modalidade}}">
                                                                </div>
                                                                <div class="form-group col-12 col-lg-2 mb-3">
                                                                    <label for="">Data da Ocorrência</label>
                                                                    <input type="date"
                                                                        class="form-control" name="" id="" readonly value="{{$pendencia->data_ocorrencia}}">
                                                                </div>
                                                                <div class="form-group col-12 col-lg-2 mb-3">
                                                                    <label for="">Valor</label>
                                                                    <input type="text"
                                                                        class="form-control" name="" id="" readonly value="{{$pendencia->tipo_moeda . number_format($pendencia->valor_pendencia, 2, ",", ".")}}">
                                                                </div>
                                                                <div class="form-group col-12 col-lg-2 mb-3">
                                                                    <label for="">Possui Avalista?</label>
                                                                    <input type="text"
                                                                        class="form-control" name="" id="" readonly value="@if($pendencia->analista) Sim @else Não @endif">
                                                                </div>
                                                                <div class="form-group col-12 col-lg-2 mb-3">
                                                                    <label for="">Contrato</label>
                                                                    <input type="text"
                                                                        class="form-control" name="" id="" readonly value="{{$pendencia->contrato}}">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group col-12 col-lg-5 mb-3">
                                                                    <label for="">Origem</label>
                                                                    <input type="text"
                                                                        class="form-control" name="" id="" readonly value="{{$pendencia->origem}}">
                                                                </div>
                                                                <div class="form-group col-12 col-lg-3 mb-3">
                                                                    <label for="">Tipo de Anotação</label>
                                                                    <input type="text"
                                                                        class="form-control" name="" id="" readonly value="{{$pendencia->tipo_anotacao}}">
                                                                </div>
                                                                <div class="form-group col-12 col-lg-4 mb-3">
                                                                    <label for="">Sigla Embratel da praça da ocorrência.</label>
                                                                    <input type="text"
                                                                        class="form-control" name="" id="" readonly value="{{$pendencia->praca_embratel}}">
                                                                </div>
                                                            </div>
                                                            <hr>
                                                        @endforeach
                                                    @else
                                                        <div class="alert alert-primary text-center" role="alert">
                                                            <strong>Não possui pendências</strong>
                                                        </div>
                                                    @endif
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="protestos{{$analise->id}}" role="tabpanel">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-12">
                                                <form class="mt-4" action="">
                                                    @if($analise->protestos->count() > 0)
                                                        @foreach($analise->protestos as $protesto)
                                                            <div class="row">
                                                                <div class="form-group col-12 col-lg-2 mb-3">
                                                                    <label for="">Data da Ocorrência</label>
                                                                    <input type="date"
                                                                        class="form-control" name="" id="" readonly value="{{$protesto->data_ocorrencia}}">
                                                                </div>
                                                                <div class="form-group col-12 col-lg-2 mb-3">
                                                                    <label for="">Valor</label>
                                                                    <input type="text"
                                                                        class="form-control" name="" id="" readonly value="{{$protesto->tipo_moeda . number_format($protesto->valor_protesto, 2, ",", ".")}}">
                                                                </div>
                                                                <div class="form-group col-12 col-lg-2 mb-3">
                                                                    <label for="">Cartório</label>
                                                                    <input type="text"
                                                                        class="form-control" name="" id="" readonly value="{{$protesto->cartorio}}">
                                                                </div>
                                                                <div class="form-group col-12 col-lg-2 mb-3">
                                                                    <label for="">Cidade</label>
                                                                    <input type="text"
                                                                        class="form-control" name="" id="" readonly value="{{$protesto->cidade}}">
                                                                </div>
                                                                <div class="form-group col-12 col-lg-1 mb-3">
                                                                    <label for="">UF</label>
                                                                    <input type="text"
                                                                        class="form-control" name="" id="" readonly value="{{$protesto->uf}}">
                                                                </div>
                                                            </div>
                                                            <hr>
                                                        @endforeach
                                                    @else
                                                        <div class="alert alert-primary text-center" role="alert">
                                                            <strong>Não possui protestos estaduais</strong>
                                                        </div>
                                                    @endif
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="cheques{{$analise->id}}" role="tabpanel">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-12">
                                                <form class="mt-4" action="">
                                                    @if($analise->cheques->count() > 0)
                                                        @foreach($analise->cheques as $cheque)
                                                            <div class="row">
                                                                <div class="form-group col-12 col-lg-2 mb-3">
                                                                    <label for="">Data da Ocorrência</label>
                                                                    <input type="date"
                                                                        class="form-control" name="" id="" readonly value="{{$cheque->data_ocorrencia}}">
                                                                </div>
                                                                <div class="form-group col-12 col-lg-2 mb-3">
                                                                    <label for="">Número</label>
                                                                    <input type="text"
                                                                        class="form-control" name="" id="" readonly value="{{$cheque->numero_cheque}}">
                                                                </div>
                                                                <div class="form-group col-12 col-lg-2 mb-3">
                                                                    <label for="">Alínea</label>
                                                                    <input type="text"
                                                                        class="form-control" name="" id="" readonly value="{{$cheque->alinea_cheque}}">
                                                                </div>
                                                                <div class="form-group col-12 col-lg-2 mb-3">
                                                                    <label for="">Qtd. CCF</label>
                                                                    <input type="text"
                                                                        class="form-control" name="" id="" readonly value="{{$cheque->quantidade_ccf}}">
                                                                </div>
                                                                <div class="form-group col-12 col-lg-2 mb-3">
                                                                    <label for="">Valor</label>
                                                                    <input type="text"
                                                                        class="form-control" name="" id="" readonly value="R${{number_format($cheque->valor_cheque, 2, ',', '.')}}">
                                                                </div>
                                                                <div class="form-group col-12 col-lg-2 mb-3">
                                                                    <label for="">Número do Banco</label>
                                                                    <input type="text"
                                                                        class="form-control" name="" id="" readonly value="R${{$cheque->numbero_banco}}">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group col-12 col-lg-4 mb-3">
                                                                    <label for="">Nome do Banco</label>
                                                                    <input type="text"
                                                                        class="form-control" name="" id="" readonly value="{{$cheque->nome_banco}}">
                                                                </div>
                                                                <div class="form-group col-12 col-lg-2 mb-3">
                                                                    <label for="">Agência</label>
                                                                    <input type="text"
                                                                        class="form-control" name="" id="" readonly value="{{$cheque->agencia}}">
                                                                </div>
                                                                <div class="form-group col-12 col-lg-3 mb-3">
                                                                    <label for="">Cidade</label>
                                                                    <input type="text"
                                                                        class="form-control" name="" id="" readonly value="{{$cheque->cidade}}">
                                                                </div>
                                                                <div class="form-group col-12 col-lg-1 mb-3">
                                                                    <label for="">UF</label>
                                                                    <input type="text"
                                                                        class="form-control" name="" id="" readonly value="{{$cheque->uf}}">
                                                                </div>
                                                            </div>
                                                            <hr>
                                                        @endforeach
                                                    @else
                                                        <div class="alert alert-primary text-center" role="alert">
                                                            <strong>Não possui protestos estaduais</strong>
                                                        </div>
                                                    @endif
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="consultas{{$analise->id}}" role="tabpanel">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-12">
                                                <form class="mt-4" action="">
                                                    @if($analise->cheque_interno)
                                                        <div class="row mb-3">
                                                            <div class="col-12">
                                                                <h5>Cheque Interno</h5>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-12 col-lg-4 mb-3">
                                                                <label for="">Data do Primeiro Cheque a Vista</label>
                                                                <input type="text"
                                                                    class="form-control" name="" id="" readonly value="{{$analise->cheque_interno->dia_mes_primeiro_cheque_a_vista}}">
                                                            </div>
                                                            <div class="form-group col-12 col-lg-4 mb-3">
                                                                <label for="">Data do Último Cheque a Vista</label>
                                                                <input type="text"
                                                                    class="form-control" name="" id="" readonly value="{{$analise->cheque_interno->dia_mes_ultimo_cheque_a_vista}}">
                                                            </div>
                                                            <div class="form-group col-12 col-lg-4 mb-3">
                                                                <label for="">Total de 15 dias a Vista</label>
                                                                <input type="text"
                                                                    class="form-control" name="" id="" readonly value="{{$analise->cheque_interno->tot_15_dias_a_vista}}">
                                                            </div>
                                                            <div class="form-group col-12 col-lg-3 mb-3">
                                                                <label for="">Total de 30 dias a Prazo</label>
                                                                <input type="text"
                                                                    class="form-control" name="" id="" readonly value="{{$analise->cheque_interno->tot_30_dias_a_prazo}}">
                                                            </div>
                                                            <div class="form-group col-12 col-lg-3 mb-3">
                                                                <label for="">Total de 60 dias a Prazo</label>
                                                                <input type="text"
                                                                    class="form-control" name="" id="" readonly value="{{$analise->cheque_interno->tot_60_dias_a_prazo}}">
                                                            </div>
                                                            <div class="form-group col-12 col-lg-3 mb-3">
                                                                <label for="">Total de 90 dias a Prazo</label>
                                                                <input type="text"
                                                                    class="form-control" name="" id="" readonly value="{{$analise->cheque_interno->tot_90_dias_a_prazo}}">
                                                            </div>
                                                            <div class="form-group col-12 col-lg-3 mb-3">
                                                                <label for="">Total de Cheques a Prazo</label>
                                                                <input type="text"
                                                                    class="form-control" name="" id="" readonly value="{{$analise->cheque_interno->tot_cheques_prazo}}">
                                                            </div>
                                                        </div>
                                                        <hr>
                                                    @endif
                                                    @if($analise->cheque_mercado)
                                                        <div class="row mb-3">
                                                            <div class="col-12">
                                                                <h5>Cheque Mercado</h5>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-12 col-lg-4 mb-3">
                                                                <label for="">Data do Primeiro Cheque a Vista</label>
                                                                <input type="text"
                                                                    class="form-control" name="" id="" readonly value="{{$analise->cheque_mercado->dia_mes_primeiro_cheque_a_vista}}">
                                                            </div>
                                                            <div class="form-group col-12 col-lg-4 mb-3">
                                                                <label for="">Data do Último Cheque a Vista</label>
                                                                <input type="text"
                                                                    class="form-control" name="" id="" readonly value="{{$analise->cheque_mercado->dia_mes_ultimo_cheque_a_vista}}">
                                                            </div>
                                                            <div class="form-group col-12 col-lg-4 mb-3">
                                                                <label for="">Total de 15 dias a Vista</label>
                                                                <input type="text"
                                                                    class="form-control" name="" id="" readonly value="{{$analise->cheque_mercado->tot_15_dias_a_vista}}">
                                                            </div>
                                                            <div class="form-group col-12 col-lg-3 mb-3">
                                                                <label for="">Total de 30 dias a Prazo</label>
                                                                <input type="text"
                                                                    class="form-control" name="" id="" readonly value="{{$analise->cheque_mercado->tot_30_dias_a_prazo}}">
                                                            </div>
                                                            <div class="form-group col-12 col-lg-3 mb-3">
                                                                <label for="">Total de 60 dias a Prazo</label>
                                                                <input type="text"
                                                                    class="form-control" name="" id="" readonly value="{{$analise->cheque_mercado->tot_60_dias_a_prazo}}">
                                                            </div>
                                                            <div class="form-group col-12 col-lg-3 mb-3">
                                                                <label for="">Total de 90 dias a Prazo</label>
                                                                <input type="text"
                                                                    class="form-control" name="" id="" readonly value="{{$analise->cheque_mercado->tot_90_dias_a_prazo}}">
                                                            </div>
                                                            <div class="form-group col-12 col-lg-3 mb-3">
                                                                <label for="">Total de Cheques a Prazo</label>
                                                                <input type="text"
                                                                    class="form-control" name="" id="" readonly value="{{$analise->cheque_mercado->tot_cheques_prazo}}">
                                                            </div>
                                                        </div>
                                                        <hr>
                                                    @endif
                                                    @if($analise->referencia_comercial)
                                                        <div class="row mb-3">
                                                            <div class="col-12">
                                                                <h5>Referências Comerciais</h5>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-12 col-lg-3 mb-3">
                                                                <label for="">Consultante 1</label>
                                                                <input type="text"
                                                                    class="form-control" name="" id="" readonly value="{{$analise->referencia_comercial->consultante_1}}">
                                                            </div>
                                                            <div class="form-group col-12 col-lg-3 mb-3">
                                                                <label for="">Data da Consulta 1</label>
                                                                <input type="text"
                                                                    class="form-control" name="" id="" readonly value="{{$analise->referencia_comercial->dia_mes_consulta_1}}">
                                                            </div>
                                                            <div class="form-group col-12 col-lg-3 mb-3">
                                                                <label for="">Consultante 2</label>
                                                                <input type="text"
                                                                    class="form-control" name="" id="" readonly value="{{$analise->referencia_comercial->consultante_2}}">
                                                            </div>
                                                            <div class="form-group col-12 col-lg-3 mb-3">
                                                                <label for="">Data da Consulta 2</label>
                                                                <input type="text"
                                                                    class="form-control" name="" id="" readonly value="{{$analise->referencia_comercial->dia_mes_consulta_2}}">
                                                            </div>
                                                            <div class="form-group col-12 col-lg-3 mb-3">
                                                                <label for="">Consultante 3</label>
                                                                <input type="text"
                                                                    class="form-control" name="" id="" readonly value="{{$analise->referencia_comercial->consultante_3}}">
                                                            </div>
                                                            <div class="form-group col-12 col-lg-3 mb-3">
                                                                <label for="">Data da Consulta 3</label>
                                                                <input type="text"
                                                                    class="form-control" name="" id="" readonly value="{{$analise->referencia_comercial->dia_mes_consulta_3}}">
                                                            </div>
                                                        </div>
                                                        <hr>
                                                    @endif
                                                    @if($analise->sem_cheque)
                                                        <div class="row mb-3">
                                                            <div class="col-12">
                                                                <h5>Sem Cheque</h5>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-12 col-lg-3 mb-3">
                                                                <label for="">Consultas em 15 dias</label>
                                                                <input type="text"
                                                                    class="form-control" name="" id="" readonly value="{{$analise->sem_cheque->qtd_consultas_15_dias}}">
                                                            </div>
                                                            <div class="form-group col-12 col-lg-3 mb-3">
                                                                <label for="">Consultas em 30 dias</label>
                                                                <input type="text"
                                                                    class="form-control" name="" id="" readonly value="{{$analise->sem_cheque->qtd_consultas_30_dias}}">
                                                            </div>
                                                            <div class="form-group col-12 col-lg-3 mb-3">
                                                                <label for="">Consultas em 60 dias</label>
                                                                <input type="text"
                                                                    class="form-control" name="" id="" readonly value="{{$analise->sem_cheque->qtd_consultas_60_dias}}">
                                                            </div>
                                                            <div class="form-group col-12 col-lg-3 mb-3">
                                                                <label for="">Consultas em 90 dias</label>
                                                                <input type="text"
                                                                    class="form-control" name="" id="" readonly value="{{$analise->sem_cheque->qtd_consultas_90_dias}}">
                                                            </div>
                                                        </div>
                                                        <hr>
                                                    @endif
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="roubados{{$analise->id}}" role="tabpanel">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-12">
                                                <form class="mt-4" action="">
                                                    @if($analise->documentos_roubados->count() > 0)
                                                        @foreach($analise->documentos_roubados as $documento)
                                                            <div class="row">
                                                                <div class="form-group col-12 col-lg-3 mb-3">
                                                                    <label for="">Tipo de Documento</label>
                                                                    <input type="text"
                                                                        class="form-control" name="" id="" readonly value="{{$documento->tipo_documento}}">
                                                                </div>
                                                                <div class="form-group col-12 col-lg-3 mb-3">
                                                                    <label for="">Número do Documento</label>
                                                                    <input type="text"
                                                                        class="form-control" name="" id="" readonly value="{{$documento->num_documento}}">
                                                                </div>
                                                                <div class="form-group col-12 col-lg-3 mb-3">
                                                                    <label for="">Data de Ocorrência</label>
                                                                    <input type="date"
                                                                        class="form-control" name="" id="" readonly value="{{$documento->dt_ocorrencia}}">
                                                                </div>
                                                            </div>
                                                            <hr>
                                                        @endforeach
                                                    @else
                                                        <div class="alert alert-primary text-center" role="alert">
                                                            <strong>Não possui alertas de documentos roubados</strong>
                                                        </div>
                                                    @endif
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="relacionamento{{$analise->id}}" role="tabpanel">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-12">
                                                <form class="mt-4" action="">
                                                    @if($analise->indice_relacionamento->count() > 0)
                                                        @foreach($analise->indice_relacionamento as $relacionamento)
                                                            <div class="row">
                                                                <div class="form-group col-12 col-lg-2 mb-3">
                                                                    <label for="">Código do Setor</label>
                                                                    <input type="text"
                                                                        class="form-control" name="" id="" readonly value="{{$relacionamento->cod_setor}}">
                                                                </div>
                                                                <div class="form-group col-12 col-lg-3 mb-3">
                                                                    <label for="">Descrição do Setor</label>
                                                                    <input type="text"
                                                                        class="form-control" name="" id="" readonly value="{{$relacionamento->desc_setor}}">
                                                                </div>
                                                                <div class="form-group col-12 col-lg-1 mb-3">
                                                                    <label for="">Faixa</label>
                                                                    <input type="text"
                                                                        class="form-control" name="" id="" readonly value="{{$relacionamento->faixa}}">
                                                                </div>
                                                                <div class="form-group col-12 col-lg-3 mb-3">
                                                                    <label for="">Relacionamento</label>
                                                                    <input type="text"
                                                                        class="form-control" name="" id="" readonly value="{{$relacionamento->relacionamento}}">
                                                                </div>
                                                                <div class="form-group col-12 col-lg-3 mb-3">
                                                                    <label for="">Tendência</label>
                                                                    <input type="text"
                                                                        class="form-control" name="" id="" readonly value="{{$relacionamento->tendencia}}">
                                                                </div>
                                                                <div class="form-group col-12 col-lg-12 mb-3">
                                                                    <label for="">Mensagem</label>
                                                                    <input type="text"
                                                                        class="form-control" name="" id="" readonly value="{{$relacionamento->mensagem}}">
                                                                </div>
                                                            </div>
                                                            <hr>
                                                        @endforeach
                                                    @else
                                                        <div class="alert alert-primary text-center" role="alert">
                                                            <strong>Não possui índices de relacionamento ou não foi consultado</strong>
                                                        </div>
                                                    @endif
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="societaria{{$analise->id}}" role="tabpanel">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-12">
                                                <form class="mt-4" action="">
                                                    @if($analise->participacao_societaria->count() > 0)
                                                        @foreach($analise->participacao_societaria as $participacao)
                                                            <div class="row">
                                                                <div class="form-group col-12 col-lg-6 mb-3">
                                                                    <label for="">Nome da Empresa</label>
                                                                    <input type="text"
                                                                        class="form-control" name="" id="" readonly value="{{$participacao->nome_empresa}}">
                                                                </div>
                                                                <div class="form-group col-12 col-lg-3 mb-3">
                                                                    <label for="">CNPJ</label>
                                                                    <input type="text"
                                                                        class="form-control" name="" id="" readonly value="{{$participacao->cnpj_empresa}}">
                                                                </div>
                                                                <div class="form-group col-12 col-lg-3 mb-3">
                                                                    <label for="">Percentual de Participacao</label>
                                                                    <input type="text"
                                                                        class="form-control" name="" id="" readonly value="{{$participacao->percentual_participacao}}%">
                                                                </div>
                                                                <div class="form-group col-12 col-lg-1 mb-3">
                                                                    <label for="">UF</label>
                                                                    <input type="text"
                                                                        class="form-control" name="" id="" readonly value="{{$participacao->uf}}">
                                                                </div>
                                                                <div class="form-group col-12 col-lg-2 mb-3">
                                                                    <label for="">Início da Participação</label>
                                                                    <input type="date"
                                                                        class="form-control" name="" id="" readonly value="{{$participacao->dt_inicio_participacao}}">
                                                                </div>
                                                                <div class="form-group col-12 col-lg-2 mb-3">
                                                                    <label for="">Última Atualização</label>
                                                                    <input type="date"
                                                                        class="form-control" name="" id="" readonly value="{{$participacao->dt_atualizacao}}">
                                                                </div>
                                                                <div class="form-group col-12 col-lg-1 mb-3">
                                                                    <label for="">Restrição</label>
                                                                    <input type="text"
                                                                        class="form-control" name="" id="" readonly value="@if($participacao->possui_restricao) Sim @else Não @endif">
                                                                </div>
                                                                <div class="form-group col-12 col-lg-4 mb-3">
                                                                    <label for="">Situação</label>
                                                                    <input type="text"
                                                                        class="form-control" name="" id="" readonly value="{{$participacao->situacao_empresa}}">
                                                                </div>
                                                            </div>
                                                            <hr>
                                                        @endforeach
                                                    @else
                                                        <div class="alert alert-primary text-center" role="alert">
                                                            <strong>Não possui participações societárias</strong>
                                                        </div>
                                                    @endif
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@endforeach

@endsection

@section('scripts')
    <!--  datatable js -->
    <script src="{{asset('admin/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script>
        $(document).ready(function() {
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

            $("select[name='entrega_estado']").change(function(){
                var estado = $("select[name='entrega_estado']").val();
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
                        $("select[name='entrega_cidade']").html(html);
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