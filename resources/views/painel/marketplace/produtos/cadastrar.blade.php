@extends('painel.template.main')

@section('titulo')
    <a href="{{ route('painel.index') }}">Inicio</a> / Marketplace / <a
    href="{{ route('painel.marketplace.vendedores') }}">Vendedores</a> / {{ $vendedor->nome }} / <a href="{{route('painel.marketplace.vendedores.produtos', ['vendedor' => $vendedor])}}">Produtos</a> / 
    <a href="{{route('painel.marketplace.vendedores.produtos.cadastrar', ['vendedor' => $vendedor])}}">Cadastrar</a>
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

                    @livewire("produtos.form-cadastro", ['vendedor' => $vendedor])
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
    @stack("scripts")
    <script src="{{ asset('js/jquery.mask.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('input[name="cnpj"]').mask('00.000.000/0000-00', );
            $('input[name="telefone"]').mask('(00) 00000-0000', );

        });
    </script>
@endsection
