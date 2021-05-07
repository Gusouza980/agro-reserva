@extends('painel.template.main')

@section('titulo')
    Cadastro de Fazenda
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

                <form action="{{route('painel.fazenda.cadastrar')}}" method="POST">
                    @csrf
                    <div class="row">
                        
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nome_fazenda" class="form-label">Nome da Fazenda *</label>
                                <input type="text" class="form-control" name="nome_fazenda" id="nome_fazenda" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nome_dono" class="form-label">Nome do Dono *</label>
                                <input type="text" class="form-control" name="nome_dono" id="nome_dono" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email *</label>
                                <input type="email" class="form-control" name="email" id="email" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="cnpj" class="form-label">CNPJ *</label>
                                <input type="text" class="form-control" name="cnpj" id="cnpj" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label for="telefone" class="form-label">Telefone *</label>
                                <input type="text" class="form-control" name="telefone" id="telefone" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="whatsapp" class="form-label">Whatsapp *</label>
                                <input type="text" class="form-control" name="whatsapp" id="whatsapp" required>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Salvar</button>
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