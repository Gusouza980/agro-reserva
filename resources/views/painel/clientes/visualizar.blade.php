@extends('painel.template.main')

@section('styles')
    <!-- DataTables -->
    <link href="{{ asset('admin/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('admin/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
@endsection

@section('titulo')
    <a href="{{ route('painel.index') }}">Inicio</a> / <a href="{{ route('painel.clientes') }}">Clientes</a> / <a
        href="{{ route('painel.cliente.visualizar', ['cliente' => $cliente]) }}">{{ $cliente->nome_dono }}</a>
@endsection

@section('conteudo')
    <div class="mb-3 row">
        <div class="col-12">
            @if ($cliente->aprovado == 0)
                <a name="" id="" class="btn btn-primary"
                    href="{{ route('painel.cliente.aprovacao', ['cliente' => $cliente, 'aprovacao' => 'aprovado']) }}"
                    role="button">Aprovar</a>
                <a name="" id="" class="ml-3 btn btn-danger"
                    href="{{ route('painel.cliente.aprovacao', ['cliente' => $cliente, 'aprovacao' => 'reprovado']) }}"
                    role="button">Reprovar</a>
            @elseif($cliente->aprovado == -1)
                <a name="" id="" class="btn btn-primary"
                    href="{{ route('painel.cliente.aprovacao', ['cliente' => $cliente, 'aprovacao' => 'aprovado']) }}"
                    role="button">Aprovar</a>
            @else
                <a name="" id="" class="btn btn-danger"
                    href="{{ route('painel.cliente.aprovacao', ['cliente' => $cliente, 'aprovacao' => 'reprovado']) }}"
                    role="button">Reprovar</a>
            @endif
            @if (!$cliente->finalizado)
                <a name="" id="" class="btn btn-primary"
                    href="{{ route('painel.cliente.finalizar', ['cliente' => $cliente]) }}" role="button">Finalizar
                    Cadastro</a>
            @endif
        </div>
    </div>
    @if ($cliente->aprovado == 0)
        <div class="row">
            <div class="col-12">
                <div class="alert alert-danger" role="alert">
                    Este cliente ainda está com o cadastro em análise.
                </div>
            </div>
        </div>
    @endif
    @if ($cliente->analises->count() == 0)
        <div class="row">
            <div class="col-12">
                <div class="alert alert-danger" role="alert">
                    Ainda não foram feitas análises de crédito para este cliente
                </div>
            </div>
        </div>
    @endif
    @if ($cliente->aprovado == -1)
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
                            <a class="nav-link" data-bs-toggle="tab" href="#propriedade" role="tab">
                                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                <span class="d-none d-sm-block">Informações de Propriedade</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#checklist" role="tab">
                                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                <span class="d-none d-sm-block">Checklist</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#documento" role="tab">
                                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                <span class="d-none d-sm-block">Documento</span>
                            </a>
                        </li>
                        @if ($cliente->vendedor)
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#vendedor" role="tab">
                                    <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                    <span class="d-none d-sm-block">Informações de Vendedor</span>
                                </a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#profile1" role="tab">
                                <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                <span class="d-none d-sm-block">Análise de Crédito</span>
                            </a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="p-3 tab-content text-muted">
                        <div class="tab-pane active" id="home1" role="tabpanel">
                            <form action="{{ route('painel.cliente.dados.salvar', ['cliente' => $cliente]) }}"
                                method="POST">
                                @csrf
                                <div class="mb-3 row">
                                    <div class="mb-3 form-group col-12 col-lg-6 form-conta">
                                        <label for="nome_dono">Nome</label>
                                        <input type="text" class="form-control" name="nome_dono" id="nome_dono"
                                            aria-describedby="helpId" value="{{ $cliente->nome_dono }}">
                                    </div>
                                    <div class="mb-3 form-group col-12 col-lg-6 form-conta">
                                        <label for="nome_fazenda">Fazenda</label>
                                        <input type="text" class="form-control" name="nome_fazenda" id="nome_fazenda"
                                            aria-describedby="helpId" value="{{ $cliente->nome_fazenda }}">
                                    </div>
                                    <div class="mb-3 form-group col-12 col-lg-6 form-conta">
                                        <label for="email">E-mail</label>
                                        <input type="email" class="form-control" name="email" id="email"
                                            aria-describedby="helpId" value="{{ $cliente->email }}">
                                    </div>
                                    <div class="mb-3 form-group col-12 col-lg-6 form-conta">
                                        <label for="nascimento">Data de Nascimento</label>
                                        <input type="date" class="form-control" name="nascimento" id="nascimento"
                                            aria-describedby="helpId" value="{{ $cliente->nascimento }}">
                                    </div>
                                    <div class="mb-3 form-group col-12 col-lg-4 form-conta">
                                        <label for="ultimo_acesso">Último Acesso</label>
                                        <input type="date" class="form-control" name="ultimo_acesso" id="ultimo_acesso"
                                            aria-describedby="helpId" value="{{ $cliente->ultimo_acesso }}" readonly>
                                    </div>
                                    <div class="mb-3 form-group col-12 col-lg-4 form-conta">
                                        <label for="pessoa_fisica">Tipo de Pessoa</label>
                                        <select class="form-control" name="pessoa_fisica" id="pessoa_fisica">
                                            <option value="0" @if (!$cliente->pessoa_fisica) selected @endif>Jurídica</option>
                                            <option value="1" @if ($cliente->pessoa_fisica) selected @endif>Física</option>
                                        </select>
                                    </div>
                                    <div class="mb-3 form-group col-12 col-lg-4 form-conta">
                                        <label for="documento">Documento Cadastrado</label>
                                        <input type="text" class="form-control" name="documento"
                                            aria-describedby="helpId" value="{{ $cliente->documento }}">
                                    </div>
                                    <div class="mb-3 form-group col-12 col-lg-4 form-conta">
                                        <label for="rg">RG</label>
                                        <input type="text" class="form-control" name="rg" id="rg"
                                            aria-describedby="helpId" value="{{ $cliente->rg }}">
                                    </div>
                                    <div class="mb-3 form-group col-12 col-lg-4 form-conta">
                                        <label for="cpf">CPF</label>
                                        <input type="text" class="form-control" name="cpf" id="cpf"
                                            aria-describedby="helpId" value="{{ $cliente->cpf }}">
                                    </div>
                                    <div class="mb-3 form-group col-12 col-lg-4 form-conta">
                                        <label for="cnpj">CNPJ</label>
                                        <input type="text" class="form-control" name="cnpj" id="cnpj"
                                            aria-describedby="helpId" value="{{ $cliente->cnpj }}">
                                    </div>
                                    <div class="mb-3 form-group col-12 col-lg-6 form-conta">
                                        <label for="whatsapp">Whatsapp</label>
                                        <input type="text" class="form-control" name="whatsapp" id="whatsapp"
                                            aria-describedby="helpId" value="@if ($cliente->telefone) {{ $cliente->telefone }} @else {{ $cliente->whataspp }} @endif">
                                    </div>
                                    <div class="mb-3 form-group col-12 col-lg-6 form-conta">
                                        <label for="interesse">Interesse</label>
                                        <input type="text" class="form-control" name="interesse" id="interesse"
                                            aria-describedby="helpId" value="{{ $cliente->interesses }}">
                                    </div>
                                    <div class="mb-3 form-group col-12 col-lg-6 form-conta">
                                        <label for="inscricao_produtor_rural">Inscrição de Produtor Rural</label>
                                        <input type="text" class="form-control" name="inscricao_produtor_rural"
                                            id="inscricao_produtor_rural" aria-describedby="helpId"
                                            value="{{ $cliente->inscricao_produtor_rural }}">
                                    </div>
                                </div>
                                <div class="my-4 row">
                                    <div class="text-left col-12">
                                        <h5>Endereço</h5>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <div class="mb-3 form-group col-12 col-lg-7 form-conta">
                                        <label for="rua">Rua</label>
                                        <input type="text" class="form-control" name="rua" id="rua"
                                            aria-describedby="helpId" value="{{ $cliente->rua }}">
                                    </div>
                                    <div class="mb-3 form-group col-5 col-lg-2 form-conta">
                                        <label for="numero">Número</label>
                                        <input type="text" class="form-control" name="numero" id="numero"
                                            aria-describedby="helpId" value="{{ $cliente->numero }}">
                                    </div>
                                    <div class="mb-3 form-group col-7 col-lg-3 form-conta">
                                        <label for="bairro">Bairro</label>
                                        <input type="text" class="form-control" name="bairro" id="bairro"
                                            aria-describedby="helpId" value="{{ $cliente->bairro }}">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <div class="mb-3 form-group col-12 form-conta">
                                        <label for="complemento">Complemento</label>
                                        <input type="text" class="form-control" name="complemento" id="complemento"
                                            aria-describedby="helpId" value="{{ $cliente->complemento }}">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <div class="mb-3 form-group col-12 col-lg-3 form-conta">
                                        <label for="estado">Estado</label>
                                        <input type="text" class="form-control" name="estado" id="estado"
                                            aria-describedby="helpId" value="{{ $cliente->estado }}">
                                    </div>
                                    <div class="mb-3 form-group col-12 col-lg-4 form-conta">
                                        <label for="cidade">Cidade</label>
                                        <input type="text" class="form-control" name="cidade" id="cidade"
                                            aria-describedby="helpId" value="{{ $cliente->cidade }}">
                                    </div>
                                    <div class="mb-3 form-group col-7 col-lg-3 form-conta">
                                        <label for="cep">CEP</label>
                                        <input type="text" class="form-control" name="cep" id="cep"
                                            aria-describedby="helpId" value="{{ $cliente->cep }}">
                                    </div>
                                </div>

                                <div class="my-4 row">
                                    <div class="text-left col-12">
                                        <h5>Referência Bancária</h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 form-group col-12 col-lg-7 form-conta">
                                        <label for="referencia_bancaria_banco">Banco</label>
                                        <input type="text" class="form-control" name="referencia_bancaria_banco"
                                            id="referencia_bancaria_banco" aria-describedby="helpId"
                                            value="{{ $cliente->referencia_bancaria_banco }}">
                                    </div>
                                    <div class="mb-3 form-group col-5 col-lg-2 form-conta">
                                        <label for="referencia_bancaria_gerente">Gerente</label>
                                        <input type="text" class="form-control" name="referencia_bancaria_gerente"
                                            id="referencia_bancaria_gerente" aria-describedby="helpId"
                                            value="{{ $cliente->referencia_bancaria_gerente }}">
                                    </div>
                                    <div class="mb-3 form-group col-7 col-lg-3 form-conta">
                                        <label for="referencia_bancaria_tel">Telefone</label>
                                        <input type="text" class="form-control" name="referencia_bancaria_tel"
                                            id="referencia_bancaria_tel" aria-describedby="helpId"
                                            value="{{ $cliente->referencia_bancaria_tel }}">
                                    </div>
                                </div>
                                <div class="my-4 row">
                                    <div class="text-left col-12">
                                        <h5>Referências Comerciais</h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 form-group col-12 col-lg-8 form-conta">
                                        <label for="referencia_comercial1">Referência</label>
                                        <input type="text" class="form-control" name="referencia_comercial1"
                                            id="referencia_comercial1" aria-describedby="helpId"
                                            value="{{ $cliente->referencia_comercial1 }}">
                                    </div>
                                    <div class="mb-3 form-group col-12 col-lg-4 form-conta">
                                        <label for="referencia_comercial1_tel">Telefone</label>
                                        <input type="text" class="form-control" name="referencia_comercial1_tel"
                                            id="referencia_comercial1_tel" aria-describedby="helpId"
                                            value="{{ $cliente->referencia_comercial1_tel }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 form-group col-12 col-lg-8 form-conta">
                                        <label for="referencia_comercial2">Referência</label>
                                        <input type="text" class="form-control" name="referencia_comercial2"
                                            id="referencia_comercial2" aria-describedby="helpId"
                                            value="{{ $cliente->referencia_comercial2 }}">
                                    </div>
                                    <div class="mb-3 form-group col-12 col-lg-4 form-conta">
                                        <label for="referencia_comercial2_tel">Telefone</label>
                                        <input type="text" class="form-control" name="referencia_comercial2_tel"
                                            id="referencia_comercial2_tel" aria-describedby="helpId"
                                            value="{{ $cliente->referencia_comercial2_tel }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 form-group col-12 col-lg-8 form-conta">
                                        <label for="referencia_comercial3">Referência</label>
                                        <input type="text" class="form-control" name="referencia_comercial3"
                                            id="referencia_comercial3" aria-describedby="helpId"
                                            value="{{ $cliente->referencia_comercial3 }}">
                                    </div>
                                    <div class="mb-3 form-group col-12 col-lg-4 form-conta">
                                        <label for="referencia_comercial3_tel">Telefone</label>
                                        <input type="text" class="form-control" name="referencia_comercial3_tel"
                                            id="referencia_comercial3_tel" aria-describedby="helpId"
                                            value="{{ $cliente->referencia_comercial3_tel }}">
                                    </div>
                                </div>
                                <div class="my-4 row">
                                    <div class="text-left col-12">
                                        <h5>Referências Coorporativas</h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 form-group col-12 col-lg-8 form-conta">
                                        <label for="referencia_coorporativa1">Referência</label>
                                        <input type="text" class="form-control" name="referencia_coorporativa1"
                                            id="referencia_coorporativa1" aria-describedby="helpId"
                                            value="{{ $cliente->referencia_coorporativa1 }}">
                                    </div>
                                    <div class="mb-3 form-group col-12 col-lg-4 form-conta">
                                        <label for="referencia_coorporativa1_tel">Telefone</label>
                                        <input type="text" class="form-control" name="referencia_coorporativa1_tel"
                                            id="referencia_coorporativa1_tel" aria-describedby="helpId"
                                            value="{{ $cliente->referencia_coorporativa1_tel }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 form-group col-12 col-lg-8 form-conta">
                                        <label for="referencia_coorporativa2">Referência</label>
                                        <input type="text" class="form-control" name="referencia_coorporativa2"
                                            id="referencia_coorporativa2" aria-describedby="helpId"
                                            value="{{ $cliente->referencia_coorporativa2 }}">
                                    </div>
                                    <div class="mb-3 form-group col-12 col-lg-4 form-conta">
                                        <label for="referencia_coorporativa2_tel">Telefone</label>
                                        <input type="text" class="form-control" name="referencia_coorporativa2_tel"
                                            id="referencia_coorporativa2_tel" aria-describedby="helpId"
                                            value="{{ $cliente->referencia_coorporativa2_tel }}">
                                    </div>
                                </div>
                                <hr>
                                <div class="mb-3 row">
                                    <div class="text-right col-12">
                                        <button class="px-5 btn btn-vermelho btn-hover-preto">
                                            Salvar
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="propriedade" role="tabpanel">
                            <form action="{{ route('painel.cliente.dados.salvar', ['cliente' => $cliente]) }}"
                                method="POST">
                                @csrf
                                <div class="my-4 row">
                                    <div class="text-left col-12">
                                        <h5>Endereço</h5>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <div class="mb-3 form-group col-12 col-lg-7 form-conta">
                                        <label for="rua">Rua</label>
                                        <input type="text" class="form-control" name="rua" id="rua"
                                            aria-describedby="helpId" value="{{ $cliente->rua_propriedade }}">
                                    </div>
                                    <div class="mb-3 form-group col-5 col-lg-2 form-conta">
                                        <label for="numero">Número</label>
                                        <input type="text" class="form-control" name="numero" id="numero"
                                            aria-describedby="helpId" value="{{ $cliente->numero_propriedade }}">
                                    </div>
                                    <div class="mb-3 form-group col-7 col-lg-3 form-conta">
                                        <label for="bairro">Bairro</label>
                                        <input type="text" class="form-control" name="bairro" id="bairro"
                                            aria-describedby="helpId" value="{{ $cliente->bairro_propriedade }}">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <div class="mb-3 form-group col-12 form-conta">
                                        <label for="complemento">Complemento</label>
                                        <input type="text" class="form-control" name="complemento" id="complemento"
                                            aria-describedby="helpId" value="{{ $cliente->complemento_propriedade }}">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <div class="mb-3 form-group col-12 col-lg-3 form-conta">
                                        <label for="estado">Estado</label>
                                        <input type="text" class="form-control" name="estado" id="estado"
                                            aria-describedby="helpId" value="{{ $cliente->estado_propriedade }}">
                                    </div>
                                    <div class="mb-3 form-group col-12 col-lg-4 form-conta">
                                        <label for="cidade">Cidade</label>
                                        <input type="text" class="form-control" name="cidade" id="cidade"
                                            aria-describedby="helpId" value="{{ $cliente->cidade_propriedade }}">
                                    </div>
                                    <div class="mb-3 form-group col-7 col-lg-3 form-conta">
                                        <label for="cep">CEP</label>
                                        <input type="text" class="form-control" name="cep" id="cep"
                                            aria-describedby="helpId" value="{{ $cliente->cep_propriedade }}">
                                    </div>
                                </div>
                                <hr>
                                <div class="mb-3 row">
                                    <div class="text-right col-12">
                                        <button class="px-5 btn btn-vermelho btn-hover-preto">
                                            Salvar
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="checklist" role="tabpanel">
                            @livewire('painel.clientes.checklist', ['cliente' => $cliente])
                        </div>
                        <div class="tab-pane" id="documento" role="tabpanel">
                            @if($cliente->documento)
                                <div class="row">
                                    <div class="text-center col-12">
                                        <img src="{{ asset($cliente->documento) }}" alt="">
                                    </div>
                                </div>
                            @else
                                <div class="alert alert-danger" role="alert">
                                    <strong>Este cliente não possui selfie com documento</strong>
                                </div>
                            @endif
                        </div>
                        @if ($cliente->vendedor)
                            <div class="tab-pane" id="vendedor" role="tabpanel">
                                <form action="{{ route('painel.vendedor.informacoes.salvar', ['cliente' => $cliente]) }}"
                                    method="POST">
                                    @csrf
                                    <div class="mb-3 row">
                                        <div class="mb-3 form-group col-12 col-lg-6 form-conta">
                                            <label for="racas_vender">Raça que deseja vender</label>
                                            <input type="text" class="form-control" name="racas_vender" id="racas_vender"
                                                aria-describedby="helpId" value="{{ $cliente->racas_vender }}">
                                        </div>
                                        <div class="mb-3 form-group col-12 col-lg-6 form-conta">
                                            <label for="telefone">Segmento de Interesse</label>
                                            <div class="mt-2 form-group form-conta d-flex justify-content-start">
                                                <div class="mx-3">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input"
                                                                name="vender_registro" id="" value="1"
                                                                @if ($cliente->vender_registro) checked @endif>
                                                            Com Registro
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="mx-3">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input"
                                                                name="vender_registro" id="" value="0"
                                                                @if (!$cliente->vender_registro) checked @endif>
                                                            Sem Registro
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 form-group col-12 col-lg-6 form-conta">
                                            <label for="fazenda_id">Ligar vendedor a fazenda</label>
                                            <select class="form-control" name="fazenda_id" id="fazenda_id"
                                                value="{{ $cliente->racas_vender }}">
                                                <option value="-1" @if (!$cliente->fazenda) selected @endif>Nenhuma</option>
                                                @foreach (\App\Models\Fazenda::all() as $fazenda)
                                                    <option value="{{ $fazenda->id }}" @if ($cliente->fazenda && $cliente->fazenda->id == $fazenda->id) selected @endif>
                                                        {{ $fazenda->nome_fazenda }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="mb-3 row">
                                        <div class="text-right col-12">
                                            <button class="px-5 btn btn-vermelho btn-hover-preto">
                                                Salvar
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        @endif
                        <div class="tab-pane" id="profile1" role="tabpanel">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12">
                                        <a href="{{ route('painel.cliente.credito.analise', ['cliente' => $cliente]) }}"
                                            name="" id="" class="btn btn-primary" href="#" role="button">Nova Análise</a>
                                    </div>
                                </div>
                                <div class="mt-5 row">
                                    <div class="col-12">
                                        <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Nome</th>
                                                    <th>Nascimento</th>
                                                    <th>Situação</th>
                                                    <th>Data da Situação</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                @foreach ($cliente->analises as $analise)
                                                    <tr>
                                                        <td>
                                                            <div class="mt-4 dropdown mt-sm-0">
                                                                <a href="#" class="btn btn-light dropdown-toggle"
                                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class="fas fa-bars" aria-hidden="true"></i>
                                                                </a>
                                                                <div class="dropdown-menu" style="margin: 0px;">
                                                                    <a name="" id="" class="py-2 dropdown-item cpointer"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#modalAnalise{{ $analise->id }}"
                                                                        role="button">Visualizar</a>
                                                                    <a name="" id="" class="py-2 dropdown-item cpointer"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#modalAnaliseObservacao{{ $analise->id }}"
                                                                        role="button">Observações</a>
                                                                    <a name="" id="" class="py-2 dropdown-item cpointer"
                                                                        href="{{ route('painel.cliente.credito.analise.exportar', ['analise' => $analise]) }}"
                                                                        target="_blank" role="button">Exportar</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td style="vertical-align: middle; text-align:center;">
                                                            {{ $analise->nome }}</td>
                                                        <td style="vertical-align: middle; text-align:center;">
                                                            {{ date('d/m/Y', strtotime($analise->nascimento)) }}</td>
                                                        <td style="vertical-align: middle; text-align:center;">
                                                            {{ $analise->doc_situacao }}</td>
                                                        <td style="vertical-align: middle; text-align:center;">
                                                            {{ date('d/m/Y', strtotime($analise->data_situacao)) }}</td>
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

    @foreach ($cliente->analises as $analise)
        <div id="modalAnalise{{ $analise->id }}" class="modal fade" tabindex="-1"
            aria-labelledby="#modalAnalise{{ $analise->id }}Label" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="mt-0 modal-title" id="modalAnalise{{ $analise->id }}Label">
                            {{ date('d/m/Y', strtotime($analise->created_at)) }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-bs-toggle="tab"
                                                href="#pessoais{{ $analise->id }}" role="tab">
                                                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                                <span class="d-none d-sm-block">Informações Pessoais</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab"
                                                href="#pendencias{{ $analise->id }}" role="tab">
                                                <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                                <span class="d-none d-sm-block">Pendências</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab"
                                                href="#protestos{{ $analise->id }}" role="tab">
                                                <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                                <span class="d-none d-sm-block">Protestos Estaduais</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab"
                                                href="#cheques{{ $analise->id }}" role="tab">
                                                <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                                <span class="d-none d-sm-block">Cheques sem Fundo</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab"
                                                href="#consultas{{ $analise->id }}" role="tab">
                                                <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                                <span class="d-none d-sm-block">Consultas</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab"
                                                href="#roubados{{ $analise->id }}" role="tab">
                                                <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                                <span class="d-none d-sm-block">Documentos Roubados</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab"
                                                href="#relacionamento{{ $analise->id }}" role="tab">
                                                <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                                <span class="d-none d-sm-block">Índice de Relacionamento</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab"
                                                href="#societaria{{ $analise->id }}" role="tab">
                                                <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                                <span class="d-none d-sm-block">Participação Societária</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="p-3 tab-content text-muted">
                                        <div class="tab-pane active" id="pessoais{{ $analise->id }}" role="tabpanel">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <form class="mt-4" action="">
                                                            <div class="row">
                                                                <div class="mb-3 form-group col-12 col-lg-6">
                                                                    <label for="">Nome</label>
                                                                    <input type="text" class="form-control" name="" id=""
                                                                        readonly value="{{ $analise->nome }}">
                                                                </div>
                                                                <div class="mb-3 form-group col-12 col-lg-2">
                                                                    <label for="">Nascimento</label>
                                                                    <input type="date" class="form-control" name="" id=""
                                                                        readonly value="{{ $analise->nascimento }}">
                                                                </div>
                                                                <div class="mb-3 form-group col-12 col-lg-2">
                                                                    <label for="">Situação</label>
                                                                    <input type="text" class="form-control" name="" id=""
                                                                        readonly
                                                                        value="{{ ucfirst($analise->doc_situacao) }}">
                                                                </div>
                                                                <div class="mb-3 form-group col-12 col-lg-2">
                                                                    <label for="">Data da Situação</label>
                                                                    <input type="date" class="form-control" name="" id=""
                                                                        readonly
                                                                        value="{{ ucfirst($analise->data_situacao) }}">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="mb-3 form-group col-12 col-lg-2">
                                                                    <label for="">CCF Indisponível</label>
                                                                    <input type="text" class="form-control" name="" id=""
                                                                        readonly value="@if ($analise->ccf_disponivel) Sim @else Não @endif">
                                                                </div>
                                                                <div class="mb-3 form-group col-12 col-lg-6">
                                                                    <label for="">Nome da Mãe</label>
                                                                    <input type="text" class="form-control" name="" id=""
                                                                        readonly value="{{ $analise->nome_mae }}">
                                                                </div>
                                                                <div class="mb-3 form-group col-12 col-lg-4">
                                                                    <label for="">Capacidade de Pagamento com
                                                                        Positivo</label>
                                                                    <input type="text" class="form-control" name="" id=""
                                                                        readonly value="@if ($analise->capacidade_pagamento_com_positivo) R${{ $analise->capacidade_pagamento_com_positivo }} @else Não Consultado @endif">
                                                                </div>
                                                            </div>
                                                            @foreach ($analise->scores as $score)
                                                                <div class="row">
                                                                    <div class="mt-3 col-12">
                                                                        <h5>Serasa Score Positivo</h5>
                                                                    </div>
                                                                    <div class="mb-3 form-group col-12 col-lg-2">
                                                                        <label for="">Pontuação</label>
                                                                        <input type="text" class="form-control" name=""
                                                                            id="" readonly
                                                                            value="{{ $score->pontuacao }}">
                                                                    </div>
                                                                    <div class="mb-3 form-group col-12 col-lg-2">
                                                                        <label for="">Chance de Pagamento</label>
                                                                        <input type="text" class="form-control" name=""
                                                                            id="" readonly
                                                                            value="{{ 100 - $score->risco }}%">
                                                                    </div>
                                                                    <div class="mb-3 form-group col-12 col-lg-8">
                                                                        <label for="">Descrição</label>
                                                                        <input type="text" class="form-control" name=""
                                                                            id="" readonly
                                                                            value="{{ $score->desc_risco }}">
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="pendencias{{ $analise->id }}" role="tabpanel">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <form class="mt-4" action="">
                                                            @if ($analise->pendencias->count() > 0)
                                                                @foreach ($analise->pendencias as $pendencia)
                                                                    <div class="row">
                                                                        <div class="mb-3 form-group col-12 col-lg-4">
                                                                            <label for="">Modalidade</label>
                                                                            <input type="text" class="form-control"
                                                                                name="" id="" readonly
                                                                                value="{{ $pendencia->modalidade }}">
                                                                        </div>
                                                                        <div class="mb-3 form-group col-12 col-lg-2">
                                                                            <label for="">Data da Ocorrência</label>
                                                                            <input type="date" class="form-control"
                                                                                name="" id="" readonly
                                                                                value="{{ $pendencia->data_ocorrencia }}">
                                                                        </div>
                                                                        <div class="mb-3 form-group col-12 col-lg-2">
                                                                            <label for="">Valor</label>
                                                                            <input type="text" class="form-control"
                                                                                name="" id="" readonly
                                                                                value="{{ $pendencia->tipo_moeda . number_format($pendencia->valor_pendencia, 2, ',', '.') }}">
                                                                        </div>
                                                                        <div class="mb-3 form-group col-12 col-lg-2">
                                                                            <label for="">Possui Avalista?</label>
                                                                            <input type="text" class="form-control"
                                                                                name="" id="" readonly
                                                                                value="@if ($pendencia->analista) Sim @else Não @endif">
                                                                        </div>
                                                                        <div class="mb-3 form-group col-12 col-lg-2">
                                                                            <label for="">Contrato</label>
                                                                            <input type="text" class="form-control"
                                                                                name="" id="" readonly
                                                                                value="{{ $pendencia->contrato }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="mb-3 form-group col-12 col-lg-5">
                                                                            <label for="">Origem</label>
                                                                            <input type="text" class="form-control"
                                                                                name="" id="" readonly
                                                                                value="{{ $pendencia->origem }}">
                                                                        </div>
                                                                        <div class="mb-3 form-group col-12 col-lg-3">
                                                                            <label for="">Tipo de Anotação</label>
                                                                            <input type="text" class="form-control"
                                                                                name="" id="" readonly
                                                                                value="{{ $pendencia->tipo_anotacao }}">
                                                                        </div>
                                                                        <div class="mb-3 form-group col-12 col-lg-4">
                                                                            <label for="">Sigla Embratel da praça da
                                                                                ocorrência.</label>
                                                                            <input type="text" class="form-control"
                                                                                name="" id="" readonly
                                                                                value="{{ $pendencia->praca_embratel }}">
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                @endforeach
                                                            @else
                                                                <div class="text-center alert alert-primary" role="alert">
                                                                    <strong>Não possui pendências</strong>
                                                                </div>
                                                            @endif
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="protestos{{ $analise->id }}" role="tabpanel">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <form class="mt-4" action="">
                                                            @if ($analise->protestos->count() > 0)
                                                                @foreach ($analise->protestos as $protesto)
                                                                    <div class="row">
                                                                        <div class="mb-3 form-group col-12 col-lg-2">
                                                                            <label for="">Data da Ocorrência</label>
                                                                            <input type="date" class="form-control"
                                                                                name="" id="" readonly
                                                                                value="{{ $protesto->data_ocorrencia }}">
                                                                        </div>
                                                                        <div class="mb-3 form-group col-12 col-lg-2">
                                                                            <label for="">Valor</label>
                                                                            <input type="text" class="form-control"
                                                                                name="" id="" readonly
                                                                                value="{{ $protesto->tipo_moeda . number_format($protesto->valor_protesto, 2, ',', '.') }}">
                                                                        </div>
                                                                        <div class="mb-3 form-group col-12 col-lg-2">
                                                                            <label for="">Cartório</label>
                                                                            <input type="text" class="form-control"
                                                                                name="" id="" readonly
                                                                                value="{{ $protesto->cartorio }}">
                                                                        </div>
                                                                        <div class="mb-3 form-group col-12 col-lg-2">
                                                                            <label for="">Cidade</label>
                                                                            <input type="text" class="form-control"
                                                                                name="" id="" readonly
                                                                                value="{{ $protesto->cidade }}">
                                                                        </div>
                                                                        <div class="mb-3 form-group col-12 col-lg-1">
                                                                            <label for="">UF</label>
                                                                            <input type="text" class="form-control"
                                                                                name="" id="" readonly
                                                                                value="{{ $protesto->uf }}">
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                @endforeach
                                                            @else
                                                                <div class="text-center alert alert-primary" role="alert">
                                                                    <strong>Não possui protestos estaduais</strong>
                                                                </div>
                                                            @endif
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="cheques{{ $analise->id }}" role="tabpanel">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <form class="mt-4" action="">
                                                            @if ($analise->cheques->count() > 0)
                                                                @foreach ($analise->cheques as $cheque)
                                                                    <div class="row">
                                                                        <div class="mb-3 form-group col-12 col-lg-2">
                                                                            <label for="">Data da Ocorrência</label>
                                                                            <input type="date" class="form-control"
                                                                                name="" id="" readonly
                                                                                value="{{ $cheque->data_ocorrencia }}">
                                                                        </div>
                                                                        <div class="mb-3 form-group col-12 col-lg-2">
                                                                            <label for="">Número</label>
                                                                            <input type="text" class="form-control"
                                                                                name="" id="" readonly
                                                                                value="{{ $cheque->numero_cheque }}">
                                                                        </div>
                                                                        <div class="mb-3 form-group col-12 col-lg-2">
                                                                            <label for="">Alínea</label>
                                                                            <input type="text" class="form-control"
                                                                                name="" id="" readonly
                                                                                value="{{ $cheque->alinea_cheque }}">
                                                                        </div>
                                                                        <div class="mb-3 form-group col-12 col-lg-2">
                                                                            <label for="">Qtd. CCF</label>
                                                                            <input type="text" class="form-control"
                                                                                name="" id="" readonly
                                                                                value="{{ $cheque->quantidade_ccf }}">
                                                                        </div>
                                                                        <div class="mb-3 form-group col-12 col-lg-2">
                                                                            <label for="">Valor</label>
                                                                            <input type="text" class="form-control"
                                                                                name="" id="" readonly
                                                                                value="R${{ number_format($cheque->valor_cheque, 2, ',', '.') }}">
                                                                        </div>
                                                                        <div class="mb-3 form-group col-12 col-lg-2">
                                                                            <label for="">Número do Banco</label>
                                                                            <input type="text" class="form-control"
                                                                                name="" id="" readonly
                                                                                value="{{ $cheque->numero_banco }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="mb-3 form-group col-12 col-lg-4">
                                                                            <label for="">Nome do Banco</label>
                                                                            <input type="text" class="form-control"
                                                                                name="" id="" readonly
                                                                                value="{{ $cheque->nome_banco }}">
                                                                        </div>
                                                                        <div class="mb-3 form-group col-12 col-lg-2">
                                                                            <label for="">Agência</label>
                                                                            <input type="text" class="form-control"
                                                                                name="" id="" readonly
                                                                                value="{{ $cheque->agencia }}">
                                                                        </div>
                                                                        <div class="mb-3 form-group col-12 col-lg-3">
                                                                            <label for="">Cidade</label>
                                                                            <input type="text" class="form-control"
                                                                                name="" id="" readonly
                                                                                value="{{ $cheque->cidade }}">
                                                                        </div>
                                                                        <div class="mb-3 form-group col-12 col-lg-1">
                                                                            <label for="">UF</label>
                                                                            <input type="text" class="form-control"
                                                                                name="" id="" readonly
                                                                                value="{{ $cheque->uf }}">
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                @endforeach
                                                            @else
                                                                <div class="text-center alert alert-primary" role="alert">
                                                                    <strong>Não possui protestos estaduais</strong>
                                                                </div>
                                                            @endif
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="consultas{{ $analise->id }}" role="tabpanel">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <form class="mt-4" action="">
                                                            @if ($analise->cheque_interno)
                                                                <div class="mb-3 row">
                                                                    <div class="col-12">
                                                                        <h5>Cheque Interno</h5>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="mb-3 form-group col-12 col-lg-4">
                                                                        <label for="">Data do Primeiro Cheque a
                                                                            Vista</label>
                                                                        <input type="text" class="form-control" name=""
                                                                            id="" readonly
                                                                            value="{{ $analise->cheque_interno->dia_mes_primeiro_cheque_a_vista }}">
                                                                    </div>
                                                                    <div class="mb-3 form-group col-12 col-lg-4">
                                                                        <label for="">Data do Último Cheque a Vista</label>
                                                                        <input type="text" class="form-control" name=""
                                                                            id="" readonly
                                                                            value="{{ $analise->cheque_interno->dia_mes_ultimo_cheque_a_vista }}">
                                                                    </div>
                                                                    <div class="mb-3 form-group col-12 col-lg-4">
                                                                        <label for="">Total de 15 dias a Vista</label>
                                                                        <input type="text" class="form-control" name=""
                                                                            id="" readonly
                                                                            value="{{ $analise->cheque_interno->tot_15_dias_a_vista }}">
                                                                    </div>
                                                                    <div class="mb-3 form-group col-12 col-lg-3">
                                                                        <label for="">Total de 30 dias a Prazo</label>
                                                                        <input type="text" class="form-control" name=""
                                                                            id="" readonly
                                                                            value="{{ $analise->cheque_interno->tot_30_dias_a_prazo }}">
                                                                    </div>
                                                                    <div class="mb-3 form-group col-12 col-lg-3">
                                                                        <label for="">Total de 60 dias a Prazo</label>
                                                                        <input type="text" class="form-control" name=""
                                                                            id="" readonly
                                                                            value="{{ $analise->cheque_interno->tot_60_dias_a_prazo }}">
                                                                    </div>
                                                                    <div class="mb-3 form-group col-12 col-lg-3">
                                                                        <label for="">Total de 90 dias a Prazo</label>
                                                                        <input type="text" class="form-control" name=""
                                                                            id="" readonly
                                                                            value="{{ $analise->cheque_interno->tot_90_dias_a_prazo }}">
                                                                    </div>
                                                                    <div class="mb-3 form-group col-12 col-lg-3">
                                                                        <label for="">Total de Cheques a Prazo</label>
                                                                        <input type="text" class="form-control" name=""
                                                                            id="" readonly
                                                                            value="{{ $analise->cheque_interno->tot_cheques_prazo }}">
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                            @endif
                                                            @if ($analise->cheque_mercado)
                                                                <div class="mb-3 row">
                                                                    <div class="col-12">
                                                                        <h5>Cheque Mercado</h5>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="mb-3 form-group col-12 col-lg-4">
                                                                        <label for="">Data do Primeiro Cheque a
                                                                            Vista</label>
                                                                        <input type="text" class="form-control" name=""
                                                                            id="" readonly
                                                                            value="{{ $analise->cheque_mercado->dia_mes_primeiro_cheque_a_vista }}">
                                                                    </div>
                                                                    <div class="mb-3 form-group col-12 col-lg-4">
                                                                        <label for="">Data do Último Cheque a Vista</label>
                                                                        <input type="text" class="form-control" name=""
                                                                            id="" readonly
                                                                            value="{{ $analise->cheque_mercado->dia_mes_ultimo_cheque_a_vista }}">
                                                                    </div>
                                                                    <div class="mb-3 form-group col-12 col-lg-4">
                                                                        <label for="">Total de 15 dias a Vista</label>
                                                                        <input type="text" class="form-control" name=""
                                                                            id="" readonly
                                                                            value="{{ $analise->cheque_mercado->tot_15_dias_a_vista }}">
                                                                    </div>
                                                                    <div class="mb-3 form-group col-12 col-lg-3">
                                                                        <label for="">Total de 30 dias a Prazo</label>
                                                                        <input type="text" class="form-control" name=""
                                                                            id="" readonly
                                                                            value="{{ $analise->cheque_mercado->tot_30_dias_a_prazo }}">
                                                                    </div>
                                                                    <div class="mb-3 form-group col-12 col-lg-3">
                                                                        <label for="">Total de 60 dias a Prazo</label>
                                                                        <input type="text" class="form-control" name=""
                                                                            id="" readonly
                                                                            value="{{ $analise->cheque_mercado->tot_60_dias_a_prazo }}">
                                                                    </div>
                                                                    <div class="mb-3 form-group col-12 col-lg-3">
                                                                        <label for="">Total de 90 dias a Prazo</label>
                                                                        <input type="text" class="form-control" name=""
                                                                            id="" readonly
                                                                            value="{{ $analise->cheque_mercado->tot_90_dias_a_prazo }}">
                                                                    </div>
                                                                    <div class="mb-3 form-group col-12 col-lg-3">
                                                                        <label for="">Total de Cheques a Prazo</label>
                                                                        <input type="text" class="form-control" name=""
                                                                            id="" readonly
                                                                            value="{{ $analise->cheque_mercado->tot_cheques_prazo }}">
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                            @endif
                                                            @if ($analise->referencia_comercial)
                                                                <div class="mb-3 row">
                                                                    <div class="col-12">
                                                                        <h5>Referências Comerciais</h5>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="mb-3 form-group col-12 col-lg-3">
                                                                        <label for="">Consultante 1</label>
                                                                        <input type="text" class="form-control" name=""
                                                                            id="" readonly
                                                                            value="{{ $analise->referencia_comercial->consultante_1 }}">
                                                                    </div>
                                                                    <div class="mb-3 form-group col-12 col-lg-3">
                                                                        <label for="">Data da Consulta 1</label>
                                                                        <input type="text" class="form-control" name=""
                                                                            id="" readonly
                                                                            value="{{ $analise->referencia_comercial->dia_mes_consulta_1 }}">
                                                                    </div>
                                                                    <div class="mb-3 form-group col-12 col-lg-3">
                                                                        <label for="">Consultante 2</label>
                                                                        <input type="text" class="form-control" name=""
                                                                            id="" readonly
                                                                            value="{{ $analise->referencia_comercial->consultante_2 }}">
                                                                    </div>
                                                                    <div class="mb-3 form-group col-12 col-lg-3">
                                                                        <label for="">Data da Consulta 2</label>
                                                                        <input type="text" class="form-control" name=""
                                                                            id="" readonly
                                                                            value="{{ $analise->referencia_comercial->dia_mes_consulta_2 }}">
                                                                    </div>
                                                                    <div class="mb-3 form-group col-12 col-lg-3">
                                                                        <label for="">Consultante 3</label>
                                                                        <input type="text" class="form-control" name=""
                                                                            id="" readonly
                                                                            value="{{ $analise->referencia_comercial->consultante_3 }}">
                                                                    </div>
                                                                    <div class="mb-3 form-group col-12 col-lg-3">
                                                                        <label for="">Data da Consulta 3</label>
                                                                        <input type="text" class="form-control" name=""
                                                                            id="" readonly
                                                                            value="{{ $analise->referencia_comercial->dia_mes_consulta_3 }}">
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                            @endif
                                                            @if ($analise->sem_cheque)
                                                                <div class="mb-3 row">
                                                                    <div class="col-12">
                                                                        <h5>Sem Cheque</h5>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="mb-3 form-group col-12 col-lg-3">
                                                                        <label for="">Consultas em 15 dias</label>
                                                                        <input type="text" class="form-control" name=""
                                                                            id="" readonly
                                                                            value="{{ $analise->sem_cheque->qtd_consultas_15_dias }}">
                                                                    </div>
                                                                    <div class="mb-3 form-group col-12 col-lg-3">
                                                                        <label for="">Consultas em 30 dias</label>
                                                                        <input type="text" class="form-control" name=""
                                                                            id="" readonly
                                                                            value="{{ $analise->sem_cheque->qtd_consultas_30_dias }}">
                                                                    </div>
                                                                    <div class="mb-3 form-group col-12 col-lg-3">
                                                                        <label for="">Consultas em 60 dias</label>
                                                                        <input type="text" class="form-control" name=""
                                                                            id="" readonly
                                                                            value="{{ $analise->sem_cheque->qtd_consultas_60_dias }}">
                                                                    </div>
                                                                    <div class="mb-3 form-group col-12 col-lg-3">
                                                                        <label for="">Consultas em 90 dias</label>
                                                                        <input type="text" class="form-control" name=""
                                                                            id="" readonly
                                                                            value="{{ $analise->sem_cheque->qtd_consultas_90_dias }}">
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                            @endif
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="roubados{{ $analise->id }}" role="tabpanel">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <form class="mt-4" action="">
                                                            @if ($analise->documentos_roubados->count() > 0)
                                                                @foreach ($analise->documentos_roubados as $documento)
                                                                    <div class="row">
                                                                        <div class="mb-3 form-group col-12 col-lg-3">
                                                                            <label for="">Tipo de Documento</label>
                                                                            <input type="text" class="form-control"
                                                                                name="" id="" readonly
                                                                                value="{{ $documento->tipo_documento }}">
                                                                        </div>
                                                                        <div class="mb-3 form-group col-12 col-lg-3">
                                                                            <label for="">Número do Documento</label>
                                                                            <input type="text" class="form-control"
                                                                                name="" id="" readonly
                                                                                value="{{ $documento->num_documento }}">
                                                                        </div>
                                                                        <div class="mb-3 form-group col-12 col-lg-3">
                                                                            <label for="">Data de Ocorrência</label>
                                                                            <input type="date" class="form-control"
                                                                                name="" id="" readonly
                                                                                value="{{ $documento->dt_ocorrencia }}">
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                @endforeach
                                                            @else
                                                                <div class="text-center alert alert-primary" role="alert">
                                                                    <strong>Não possui alertas de documentos
                                                                        roubados</strong>
                                                                </div>
                                                            @endif
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="relacionamento{{ $analise->id }}"
                                            role="tabpanel">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <form class="mt-4" action="">
                                                            @if ($analise->indice_relacionamento->count() > 0)
                                                                @foreach ($analise->indice_relacionamento as $relacionamento)
                                                                    <div class="row">
                                                                        <div class="mb-3 form-group col-12 col-lg-2">
                                                                            <label for="">Código do Setor</label>
                                                                            <input type="text" class="form-control"
                                                                                name="" id="" readonly
                                                                                value="{{ $relacionamento->cod_setor }}">
                                                                        </div>
                                                                        <div class="mb-3 form-group col-12 col-lg-3">
                                                                            <label for="">Descrição do Setor</label>
                                                                            <input type="text" class="form-control"
                                                                                name="" id="" readonly
                                                                                value="{{ $relacionamento->desc_setor }}">
                                                                        </div>
                                                                        <div class="mb-3 form-group col-12 col-lg-1">
                                                                            <label for="">Faixa</label>
                                                                            <input type="text" class="form-control"
                                                                                name="" id="" readonly
                                                                                value="{{ $relacionamento->faixa }}">
                                                                        </div>
                                                                        <div class="mb-3 form-group col-12 col-lg-3">
                                                                            <label for="">Relacionamento</label>
                                                                            <input type="text" class="form-control"
                                                                                name="" id="" readonly
                                                                                value="{{ $relacionamento->relacionamento }}">
                                                                        </div>
                                                                        <div class="mb-3 form-group col-12 col-lg-3">
                                                                            <label for="">Tendência</label>
                                                                            <input type="text" class="form-control"
                                                                                name="" id="" readonly
                                                                                value="{{ $relacionamento->tendencia }}">
                                                                        </div>
                                                                        <div class="mb-3 form-group col-12 col-lg-12">
                                                                            <label for="">Mensagem</label>
                                                                            <input type="text" class="form-control"
                                                                                name="" id="" readonly
                                                                                value="{{ $relacionamento->mensagem }}">
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                @endforeach
                                                            @else
                                                                <div class="text-center alert alert-primary" role="alert">
                                                                    <strong>Não possui índices de relacionamento ou não foi
                                                                        consultado</strong>
                                                                </div>
                                                            @endif
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="societaria{{ $analise->id }}" role="tabpanel">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <form class="mt-4" action="">
                                                            @if ($analise->participacao_societaria->count() > 0)
                                                                @foreach ($analise->participacao_societaria as $participacao)
                                                                    <div class="row">
                                                                        <div class="mb-3 form-group col-12 col-lg-6">
                                                                            <label for="">Nome da Empresa</label>
                                                                            <input type="text" class="form-control"
                                                                                name="" id="" readonly
                                                                                value="{{ $participacao->nome_empresa }}">
                                                                        </div>
                                                                        <div class="mb-3 form-group col-12 col-lg-3">
                                                                            <label for="">CNPJ</label>
                                                                            <input type="text" class="form-control"
                                                                                name="" id="" readonly
                                                                                value="{{ $participacao->cnpj_empresa }}">
                                                                        </div>
                                                                        <div class="mb-3 form-group col-12 col-lg-3">
                                                                            <label for="">Percentual de Participacao</label>
                                                                            <input type="text" class="form-control"
                                                                                name="" id="" readonly
                                                                                value="{{ $participacao->percentual_participacao }}%">
                                                                        </div>
                                                                        <div class="mb-3 form-group col-12 col-lg-1">
                                                                            <label for="">UF</label>
                                                                            <input type="text" class="form-control"
                                                                                name="" id="" readonly
                                                                                value="{{ $participacao->uf }}">
                                                                        </div>
                                                                        <div class="mb-3 form-group col-12 col-lg-2">
                                                                            <label for="">Início da Participação</label>
                                                                            <input type="date" class="form-control"
                                                                                name="" id="" readonly
                                                                                value="{{ $participacao->dt_inicio_participacao }}">
                                                                        </div>
                                                                        <div class="mb-3 form-group col-12 col-lg-2">
                                                                            <label for="">Última Atualização</label>
                                                                            <input type="date" class="form-control"
                                                                                name="" id="" readonly
                                                                                value="{{ $participacao->dt_atualizacao }}">
                                                                        </div>
                                                                        <div class="mb-3 form-group col-12 col-lg-1">
                                                                            <label for="">Restrição</label>
                                                                            <input type="text" class="form-control"
                                                                                name="" id="" readonly
                                                                                value="@if ($participacao->possui_restricao) Sim @else Não @endif">
                                                                        </div>
                                                                        <div class="mb-3 form-group col-12 col-lg-4">
                                                                            <label for="">Situação</label>
                                                                            <input type="text" class="form-control"
                                                                                name="" id="" readonly
                                                                                value="{{ $participacao->situacao_empresa }}">
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                @endforeach
                                                            @else
                                                                <div class="text-center alert alert-primary" role="alert">
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

        <div id="modalAnaliseObservacao{{ $analise->id }}" class="modal fade" tabindex="-1"
            aria-labelledby="#modalAnaliseObservacao{{ $analise->id }}Label" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form
                            action="{{ route('painel.cliente.credito.analise.observacoes.salvar', ['analise' => $analise]) }}"
                            method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Observações</label>
                                <textarea class="form-control" name="observacoes" id="">{!! $analise->observacoes !!}</textarea>
                            </div>
                            <div class="mt-3 text-end">
                                <button type="submit" class="btn btn-primary">Salvar</button>
                            </div>
                        </form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

    @endforeach

@endsection

@section('scripts')
    <!--  datatable js -->
    <script src="{{ asset('admin/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("select[name='estado']").change(function() {
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
                    success: function(data) {
                        html = "";
                        var cidades = JSON.parse(data);
                        for (var cidade in cidades) {
                            html += "<option value='" + cidades[cidade].id + "'>" + cidades[
                                cidade].nome + "</option>"
                        }
                        $("select[name='cidade']").html(html);
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            });

            $("select[name='entrega_estado']").change(function() {
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
                    success: function(data) {
                        html = "";
                        var cidades = JSON.parse(data);
                        for (var cidade in cidades) {
                            html += "<option value='" + cidades[cidade].id + "'>" + cidades[
                                cidade].nome + "</option>"
                        }
                        $("select[name='entrega_cidade']").html(html);
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            });
            $('#datatable').DataTable({
                language: {
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
            });
        });
    </script>
@endsection
