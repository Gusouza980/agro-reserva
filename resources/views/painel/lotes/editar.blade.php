@extends('painel.template.main')

@section("styles")
    <link href="{{asset('admin/libs/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('titulo')
    Editando Lote - {{$lote->nome}} - {{$lote->fazenda->nome_fazenda}}
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

                <form action="{{route('painel.fazenda.reserva.lote.salvar', ['lote' => $lote])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label for="numero" class="form-label">Lote</label>
                                <input type="number" class="form-control" name="numero" id="numero" min="1" step="1" value="{{$lote->numero}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label for="letra" class="form-label">Letra</label>
                                <input type="text" class="form-control" name="letra" id="letra" value="{{$lote->letra}}" maxlength="2">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nome" class="form-label">Nome do Lote *</label>
                                <input type="text" class="form-control" name="nome" id="nome" maxlength="100" value="{{$lote->nome}}" required>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label for="sexo" class="form-label">Sexo</label>
                                <select class="form-control" name="sexo" id="">
                                    <option value="Fêmea" @if($lote->sexo == "Fêmea") selected @endif>Fêmea</option>
                                    <option value="Macho" @if($lote->sexo == "Macho") selected @endif>Macho</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="registro" class="form-label">Registro</label>
                                <input type="text" class="form-control" name="registro" id="registro" value="{{$lote->registro}}" maxlength="30">
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="mb-3">
                                <label for="nascimento" class="form-label">Data de Nascimento</label>
                                <input type="date" class="form-control" name="nascimento" id="nascimento" value="{{$lote->nascimento}}">
                            </div>                 
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="mb-3">
                                <label for="raca" class="form-label">Raça *</label>
                                <select name="raca" id="raca" class="form-select">
                                    @foreach(App\Models\Raca::all() as $raca)
                                        <option value="{{$raca->id}}" @if($lote->raca_id == $raca->id) selected @endif>{{$raca->nome}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 col-md-4">
                            <div class="mb-3">
                                <label for="gpta" class="form-label">GPTA</label>
                                <input type="text" class="form-control" name="gpta" id="gpta" value="{{$lote->gpta}}" maxlength="12">
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="mb-3">
                                <label for="ccg" class="form-label">CCG</label>
                                <input type="text" class="form-control" name="ccg" id="ccg" value="{{$lote->ccg}}" maxlength="20">
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="mb-3">
                                <label for="parto" class="form-label">Último Parto</label>
                                <input type="date" class="form-control" name="parto" value="{{$lote->parto}}" id="parto">
                            </div>                 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="observacoes" class="form-label">Observações</label>
                                <textarea class="form-control" name="observacoes" maxlength="250">{!! $lote->observacoes !!}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @if($lote->reserva->multi_fazendas)
                            <div class="col-12 col-lg-8 mb-3">
                                <label for="tags">Fazenda</label>
                                <br>
                                <select class="form-control select2" style="width: 100%;" name="fazenda">
                                    <option value="0">Nenhum</option>
                                    @foreach(\App\Models\Fazenda::all() as $fazenda)
                                        <option value="{{$fazenda->id}}" @if($lote->fazenda_id == $fazenda->id) selected @endif>{{$fazenda->nome_fazenda}}</option>
                                    @endforeach 
                                </select>
                            </div>
                        @endif
                        <div class="col-12 col-lg-4">
                            <div class="mb-3">
                                <label for="ativo" class="form-label">Situação</label>
                                <select name="ativo" id="ativo" class="form-select">
                                    <option value="1" @if($lote->ativo) selected @endif>Ativo</option>
                                    <option value="0" @if(!$lote->ativo) selected @endif>Inativo</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <h4 class="card-title my-4">Informações de Pagamento</h4>
                    <div class="row mb-3">
                        <div class="col-6 col-md-4">
                            <div class="mb-3">
                                <label for="preco" class="form-label">Preço (R$) *</label>
                                <input type="number" name="preco" class="form-control" min="0" step="0.01" value="{{$lote->preco}}" required>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="mb-3">
                                <label for="parcelas" class="form-label">Parcelas</label>
                                <input type="number" name="parcelas" class="form-control" min="0" step="1" value="{{$lote->parcelas}}" required>
                            </div>
                        </div>
                    </div>
					<hr>
                    <h4 class="card-title my-4">Vídeo</h4>
					<div class="row mb-3">
                        <div class="col-12">
							<label for="">Cole o <b>link de incorporação</b> do vídeo</label>
                            <input type="text" name="video" value="{{$lote->video}}" class="form-control">
                        </div>
                    </div>
					<div class="row mb-3">
						<div class="col-12 text-center iframe-lote">
							@if($lote->video)
								{!! $lote->video !!}
							@endif
						</div>
					</div>
                    <hr>
                    <h4 class="card-title my-4">Preview</h4>
                    <div class="row mb-3">
                        <div class="col-6">
                            <input type="file" name="preview" id="preview">
                        </div>
                        <div class="col-6">
							@if($lote->preview)
								<img class="w-100" style="max-width: 300px;" src="{{asset($lote->preview)}}" alt="">
							@endif
                        </div>
                    </div>
                    <hr>
                    <h4 class="card-title my-4">Genealogia</h4>
                    <div class="row mb-3">
                        <div class="col-6">
                            <input type="file" name="genealogia" id="genealogia">
                        </div>
						<div class="col-6">
							@if($lote->genealogia)
								<img class="w-100" style="max-width: 300px;" src="{{asset($lote->genealogia)}}" alt="">
							@endif
                        </div>
                    </div>
                    <hr>
                    <h4 class="card-title my-4">Catálogo</h4>
                    <div class="row mb-3">
                        <div class="col-6">
                            <input type="file" name="catalogo" id="catalogo">
                        </div>
						<div class="col-6">
							@if($lote->catalogo)
                                <a name="" id="" href="{{asset($lote->catalogo)}}" class="btn btn-primary" href="#" role="button" download="{{$lote->fazenda->slug}}-lote-{{$lote->numero}}.pdf">Download</a>
							@endif
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

@section("scripts")
<script src="{{asset('admin/libs/select2/js/select2.min.js')}}"></script>
<script>
    $(document).ready(function(){
        $('.select2').select2();
    })
</script>

@endsection