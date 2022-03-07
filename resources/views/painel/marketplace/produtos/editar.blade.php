@extends('painel.template.main')

@section('titulo')
    <a href="{{ route('painel.index') }}">Inicio</a> / Marketplace / <a
    href="{{ route('painel.marketplace.vendedores') }}">Vendedores</a> / {{ $vendedor->nome }} / <a href="{{route('painel.marketplace.vendedores.produtos', ['vendedor' => $vendedor])}}">Produtos</a> / 
    <a href="{{route('painel.marketplace.vendedores.produtos.editar', ['vendedor' => $vendedor, "produto" => $produto])}}">Editar</a>
@endsection


@section('conteudo')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#informacoes" role="tab">
                                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                <span class="d-none d-sm-block">Informações</span>    
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#imagens" role="tab">
                                <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                <span class="d-none d-sm-block">Imagens</span>    
                            </a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content p-3 text-muted">
                        <div class="tab-pane active" id="informacoes" role="tabpanel">
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
                        
                                            @livewire("produtos.form-cadastro", ['vendedor' => $vendedor, "produto" => $produto])
                                        </div>
                                        <!-- end card body -->
                                    </div>
                                    <!-- end card -->
                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row -->
                        </div>
                        <div class="tab-pane" id="imagens" role="tabpanel">
                            @livewire("produtos.form-galeria", ['produto' => $produto])
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    
@endsection

@section('scripts')
    @stack("scripts")
    <script src="{{ asset('js/jquery.mask.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('input[name="cnpj"]').mask('00.000.000/0000-00', );
            $('input[name="telefone"]').mask('(00) 00000-0000', );

        });
    </script>
@endsection
