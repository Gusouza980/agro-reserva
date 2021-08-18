@extends('painel.template.main')

@section('titulo')
    Cadastro de Lote - {{$reserva->fazenda->nome_fazenda}}
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

                <form action="{{route('painel.fazenda.reserva.lote.cadastrar', ['reserva' => $reserva])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label for="numero" class="form-label">Lote</label>
                                <input type="number" class="form-control" name="numero" id="numero" min="1" step="1" value="1">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label for="letra" class="form-label">Letra</label>
                                <input type="text" class="form-control" name="letra" id="letra" maxlength="2">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nome" class="form-label">Nome do Lote *</label>
                                <input type="text" class="form-control" name="nome" id="nome" maxlength="100" required>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label for="sexo" class="form-label">Sexo</label>
                                <select class="form-control" name="sexo" id="">
                                    <option value="Fêmea">Fêmea</option>
                                    <option value="Macho">Macho</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="registro" class="form-label">Registro</label>
                                <input type="text" class="form-control" name="registro" id="registro" maxlength="30">
                            </div>
                        </div>
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
                        
                    </div>
                    <div class="row">
                        <div class="col-6 col-md-4">
                            <div class="mb-3">
                                <label for="gpta" class="form-label">GPTA</label>
                                <input type="text" class="form-control" name="gpta" id="gpta" maxlength="12">
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="mb-3">
                                <label for="ccg" class="form-label">CCG</label>
                                <input type="text" class="form-control" name="ccg" id="ccg" maxlength="20">
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="mb-3">
                                <label for="parto" class="form-label">Último Parto</label>
                                <input type="date" class="form-control" name="parto" id="parto">
                            </div>                 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="observacoes" class="form-label">Observações</label>
                                <textarea class="form-control" name-"observacoes" maxlength="250"></textarea>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <h4 class="card-title my-4">Informações de Pagamento</h4>
                    <div class="row mb-3">
                        <div class="col-6 col-md-4">
                            <div class="mb-3">
                                <label for="preco" class="form-label">Preço (R$) *</label>
                                <input type="number" name="preco" class="form-control" min="0" step="0.01" required>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="mb-3">
                                <label for="parcelas" class="form-label">Parcelas</label>
                                <input type="number" name="parcelas" class="form-control" min="0" step="1" required>
                            </div>
                        </div>
                    </div>
                    <hr>
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
                    <hr>
                    <h4 class="card-title my-4">Catálogo</h4>
                    <div class="row mb-3">
                        <div class="col-12">
                            <input type="file" name="catalogo" id="catalogo">
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