@extends('painel.template.main')

@section('titulo')
    <a href="{{ route('painel.index') }}">Inicio</a> / <a href="{{ route('painel.clientes') }}">Clientes</a> / <a
        href="{{ route('painel.comercial.cliente.visualizar', ['cliente' => $cliente]) }}">{{ $cliente->nome_dono }}</a>
@endsection

@section('conteudo')

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        @if($cliente->assessor_id === null)
                            Esse cliente ainda não está sendo assessorado por alguém. <a href="">Clique aqui</a> para reivindicá-lo. 
                        @endif
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <h4 class="mb-4 card-title">Informações Básicas</h4>
                        <div class="row">
                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label">Nome</label>
                                <input type="text" class="form-control" readonly value="{{ $cliente->nome_dono }}">
                            </div>
                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label">E-mail</label>
                                <input type="text" class="form-control" readonly value="{{ $cliente->email }}">
                            </div>
                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label">Whatsapp</label>
                                <input type="text" class="form-control" readonly value="{{ $cliente->whatsapp }}">
                            </div>
                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label">Fazenda</label>
                                <input type="text" class="form-control" readonly value="{{ $cliente->nome_fazenda }}">
                            </div>
                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label">Cidade</label>
                                <input type="text" class="form-control" readonly value="{{ $cliente->cidade }}">
                            </div>
                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label">Estado</label>
                                <input type="text" class="form-control" readonly value="{{ $cliente->estado }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection