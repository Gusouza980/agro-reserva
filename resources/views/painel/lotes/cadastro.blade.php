@extends('painel.template.main')

@section('titulo')
    Cadastro de Lote - {{$fazenda->nome_fazenda}}
@endsection

@section('conteudo')
<div class="row">
    <div class="col-12 col-lg-8">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 text-left my-3" style="color:red;">
                        * Campos obrigatórios
                    </div>
                </div>
                <h4 class="card-title mb-4">Informações Básicas</h4>

                <form action="{{route('painel.fazenda.lote.cadastrar', ['fazenda' => $fazenda])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label for="nome" class="form-label">Nome do Lote *</label>
                                <input type="text" class="form-control" name="nome" id="nome" maxlength="100" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="registro" class="form-label">Registro</label>
                                <input type="text" class="form-control" name="registro" id="registro" maxlength="30">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6 col-md-4">
                            <div class="mb-3">
                                <label for="nascimento" class="form-label">Data de Nascimento</label>
                                <input type="date" class="form-control" name="nascimento" id="nascimento">
                            </div>                 
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="mb-3">
                                <label for="raca" class="form-label">Raça *</label>
                                <select name="raca" id="raca" class="form-select">
                                    @foreach(App\Models\Raca::all() as $raca)
                                        <option value="{{$raca->id}}">{{$raca->nome}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="mb-3">
                                <label for="preco" class="form-label">Preço (R$) *</label>
                                <input type="number" name="preco" class="form-control" min="0" step="0.01" required>
                            </div>
                        </div>
                    </div>
                    <h4 class="card-title my-4">Vídeo</h4>
					<div class="row mb-3">
                        <div class="col-12">
							<label for="">Cole o <b>link de incorporação</b> do vídeo</label>
                            <input type="text" name="video" class="form-control">
                        </div>
                    </div>
                    <hr>
                    <h4 class="card-title my-4">Preview</h4>
                    <div class="row mb-3">
                        <div class="col-12">
                            <input type="file" name="preview" id="preview">
                        </div>
                    </div>
                    <hr>
                    <h4 class="card-title my-4">Genealogia</h4>
                    <div class="row mb-3">
                        <div class="col-12">
                            <input type="file" name="genealogia" id="genealogia">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-end">
                            <button type="submit" class="btn btn-primary">Salvar</button>
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