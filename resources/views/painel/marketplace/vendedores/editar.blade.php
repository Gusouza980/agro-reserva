@extends('painel.template.main')

@section('styles')
    <link href="{{ asset('admin/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('titulo')
    <a href="{{ route('painel.index') }}">Inicio</a> / Marketplace / <a
        href="{{ route('painel.marketplace.vendedores') }}">Vendedores</a> / 
        Editar / <a
        href="{{ route('painel.marketplace.vendedores.editar', ['vendedor' => $vendedor]) }}"> {{ $vendedor->nome }} </a>
@endsection


@section('conteudo')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 text-left my-3" style="color:red;">
                            * Campos obrigatórios
                        </div>
                    </div>
                    <h4 class="card-title mb-4">Informações Básicas</h4>

                    <form action="{{ route('painel.marketplace.vendedores.salvar') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="marketplace_vendedor_id" value="{{ $vendedor->id }}">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="nome" class="form-label">Nome (*)</label>
                                    <input type="text" class="form-control" name="nome" id="nome" value="{{ $vendedor->nome }}" maxlength="255"
                                        required>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="mb-3">
                                    <label for="segmento" class="form-label">Segmento (*)</label>
                                    <select name="segmento" class="form-control" id="segmento">
                                        @foreach (config('vendedores.segmentos') as $key => $segmento)
                                            <option value="{{ $key }}" @if($vendedor->segmento == $key) selected @endif>{{ $segmento }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="mb-3">
                                    <label for="cnpj" class="form-label">CNPJ (*)</label>
                                    <input type="text" class="form-control" name="cnpj" id="cnpj" value="{{ $vendedor->cnpj }}" maxlength="18" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="mb-3">
                                    <label for="email" class="form-label">E-mail (*)</label>
                                    <input type="email" class="form-control" name="email" id="email" value="{{ $vendedor->email }}" maxlength="100"
                                        required>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="mb-3">
                                    <label for="telefone" class="form-label">Telefone (*)</label>
                                    <input type="text" class="form-control" name="telefone" id="telefone" value="{{ $vendedor->telefone }}" maxlength="15"
                                        required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-4">
                                    <label for="rua">Rua</label>
                                    <input id="rua" name="rua" type="text" class="form-control contador"
                                        placeholder="Insira a rua" maxlength="100" value="{{ $vendedor->rua }}" required>
                                    <small class="float-end mt-1"></small>
                                </div>
                            </div>
                            <div class="col-sm-1">
                                <div class="mb-4">
                                    <label for="numero">Nº</label>
                                    <input id="numero" name="numero" type="text" class="form-control contador" value="{{ $vendedor->numero }}" maxlength="5"
                                        required>
                                    <small class="float-end mt-1"></small>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="mb-4">
                                    <label for="bairro">Bairro</label>
                                    <input id="bairro" name="bairro" type="text" class="form-control contador"
                                        placeholder="Insira o bairro" maxlength="30" value="{{ $vendedor->bairro }}" required>
                                    <small class="float-end mt-1"></small>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="mb-4">
                                    <label for="cidade">Cidade</label>
                                    <input id="cidade" name="cidade" type="text" class="form-control contador"
                                        placeholder="Insira a cidade" maxlength="50" value="{{ $vendedor->cidade }}" required>
                                    <small class="float-end mt-1"></small>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="mb-4">
                                    <label for="estado">Estado</label>
                                    <select id="estado" name="estado" class="form-control">
                                        @foreach (config('estados.estados') as $key => $estado)
                                            <option value="{{ $key }}" @if($vendedor->estado == $key) selected @endif>{{ $estado }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="mb-4">
                                    <label for="cep">CEP</label>
                                    <input id="cep" name="cep" type="text" class="form-control contador"
                                        placeholder="Insira o CEP" maxlength="9" value="{{ $vendedor->cep }}" required>
                                    <small class="float-end mt-1"></small>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="d-flex flex-row">
                            <div class="mb-3">
                                <h4 class="card-title mb-4">Logo</h4>
                                <label class="custom-file">
                                    <input type="file" name="logo" id="logo" placeholder="Escolha a logo"
                                        class="custom-file-input" aria-describedby="fileHelpId">
                                    <span class="custom-file-control"></span>
                                </label>
                                <small id="fileHelpId" class="form-text text-muted">Dê preferência para imagens
                                    quadradas</small>
                            </div>
                            <div class="mb-3 ms-5">
                                <img src="{{ asset($vendedor->logo) }}" width="200" alt="">
                            </div>
                        </div>
                        <hr>
                        <div class="d-flex flex-row">
                            <div class="mb-3">
                                <h4 class="card-title mb-4">Banner</h4>
                                <label class="custom-file">
                                    <input type="file" name="banner" id="banner" placeholder="Escolha o banner"
                                        class="custom-file-input" aria-describedby="fileHelpId">
                                    <span class="custom-file-control"></span>
                                </label>
                                <small id="fileHelpId" class="form-text text-muted">Dê preferência para imagens
                                    retângulares</small>
                            </div>
                            <div class="mb-3 ms-5">
                                <img src="{{ asset($vendedor->banner) }}" width="300" alt="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="d-grid gap-2">
                                    <button type="submit" name="" id="" class="btn btn-laranja">Salvar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
@endsection

@section('scripts')
    <script src="{{ asset('js/jquery.mask.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('input[name="cnpj"]').mask('00.000.000/0000-00', );
            $('input[name="telefone"]').mask('(00) 00000-0000', );

        });
    </script>
@endsection
