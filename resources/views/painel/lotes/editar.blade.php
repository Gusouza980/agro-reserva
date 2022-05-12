@extends('painel.template.main')

@section('styles')
    <link href="{{ asset('admin/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('titulo')
    <a href="{{route('painel.index')}}">Inicio</a> / <a href="{{route('painel.fazendas')}}">Fazendas</a> / <a href="{{route('painel.fazenda.editar', ['fazenda' => $lote->reserva->fazenda])}}">{{$lote->reserva->fazenda->nome_fazenda}}</a> / <a href="{{route('painel.fazenda.reservas', ['fazenda' => $lote->reserva->fazenda])}}">Reservas</a> / <a href="{{route('painel.fazenda.reserva.lotes', ['reserva' => $lote->reserva])}}">Lotes</a> / <a href="{{route('painel.fazenda.reserva.lote.editar', ['lote' => $lote])}}">Editar</a>
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

                    <form action="{{ route('painel.fazenda.reserva.lote.salvar', ['lote' => $lote]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="numero" class="form-label">Lote</label>
                                    <input type="number" class="form-control" name="numero" id="numero" min="1" step="1"
                                        value="{{ $lote->numero }}">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="letra" class="form-label">Letra</label>
                                    <input type="text" class="form-control" name="letra" id="letra"
                                        value="{{ $lote->letra }}" maxlength="2">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="nome" class="form-label">Nome do Lote *</label>
                                    <input type="text" class="form-control" name="nome" id="nome" maxlength="100"
                                        value="{{ $lote->nome }}" required>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="sexo" class="form-label">Sexo</label>
                                    <select class="form-control" name="sexo" id="">
                                        <option value="Fêmea" @if ($lote->sexo == 'Fêmea') selected @endif>Fêmea</option>
                                        <option value="Macho" @if ($lote->sexo == 'Macho') selected @endif>Macho</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="registro" class="form-label">Registro</label>
                                    <input type="text" class="form-control" name="registro" id="registro"
                                        value="{{ $lote->registro }}" maxlength="30">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="rgn" class="form-label">RGN</label>
                                    <input type="text" class="form-control" value="{{ $lote->rgn }}" name="rgn" id="rgn" maxlength="10">
                                </div>
                            </div>
                            <div class="col-6 col-md-4">
                                <div class="mb-3">
                                    <label for="nascimento" class="form-label">Data de Nascimento</label>
                                    <input type="date" class="form-control" name="nascimento" id="nascimento"
                                        value="{{ $lote->nascimento }}">
                                </div>
                            </div>
                            <div class="col-6 col-md-4">
                                <div class="mb-3">
                                    <label for="previsao_parto" class="form-label">Previsão de Parto</label>
                                    <input type="date" class="form-control" name="previsao_parto" id="previsao_parto"
                                        value="{{$lote->previsao_parto}}">
                                </div>
                            </div>
                            <div class="col-6 col-md-4">
                                <div class="mb-3">
                                    <label for="raca" class="form-label">Raça *</label>
                                    <select name="raca" id="raca" class="form-select">
                                        @foreach (App\Models\Raca::all() as $raca)
                                            <option value="{{ $raca->id }}" @if ($lote->raca_id == $raca->id) selected @endif>
                                                {{ $raca->nome }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 col-md-3">
                                <div class="mb-3">
                                    <label for="gpta" class="form-label">GPTA</label>
                                    <input type="text" class="form-control" name="gpta" id="gpta"
                                        value="{{ $lote->gpta }}" maxlength="12">
                                </div>
                            </div>
                            <div class="col-6 col-md-3">
                                <div class="mb-3">
                                    <label for="ccg" class="form-label">CCG</label>
                                    <input type="text" class="form-control" name="ccg" id="ccg"
                                        value="{{ $lote->ccg }}" maxlength="20">
                                </div>
                            </div>
                            <div class="col-6 col-md-3">
                                <div class="mb-3">
                                    <label for="parto" class="form-label">Último Parto</label>
                                    <input type="date" class="form-control" name="parto" value="{{ $lote->parto }}"
                                        id="parto">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 col-md-3">
                                <div class="mb-3">
                                    <label for="peso" class="form-label">Peso</label>
                                    <input type="text" class="form-control" name="peso" id="peso" value="{{$lote->peso}}" maxlength="10">
                                </div>
                            </div>
                            <div class="col-6 col-md-3">
                                <div class="mb-3">
                                    <label for="iabczg" class="form-label">IABCZg</label>
                                    <input type="text" class="form-control" name="iabczg" id="iabczg" value="{{$lote->iabczg}}" maxlength="10">
                                </div>
                            </div>
                            <div class="col-6 col-md-3">
                                <div class="mb-3">
                                    <label for="ce" class="form-label">C.E</label>
                                    <input type="text" class="form-control" name="ce" id="ce" value="{{$lote->ce}}" maxlength="10">
                                </div>
                            </div>
                            <div class="col-6 col-md-3">
                                <div class="mb-3">
                                    <label for="deca" class="form-label">Deca</label>
                                    <input type="number" class="form-control" name="deca" id="deca" step="1" value="{{$lote->deca}}">
                                </div>
                            </div>
                            <div class="col-6 col-md-3">
                                <div class="mb-3">
                                    <label for="botton" class="form-label">Botton</label>
                                    <input type="text" class="form-control" name="botton" id="botton" value="{{$lote->botton}}" maxlength="10">
                                </div>
                            </div>
                            <div class="col-6 col-md-3">
                                <div class="mb-3">
                                    <label for="lact_atual" class="form-label">Lact. Atual</label>
                                    <input type="number" class="form-control" name="lact_atual" id="lact_atual" step="0.01" value="{{$lote->lact_atual}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="observacoes" class="form-label">Observações</label>
                                    <textarea class="form-control" name="observacoes"
                                        maxlength="250">{!! $lote->observacoes !!}</textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="texto_destaque" class="form-label">Texto de Destaque</label>
                                    <input type="text" class="form-control" name="texto_destaque" id="texto_destaque" value="{{$lote->texto_destaque}}">
                                    <small>Será exibido caso o lote apareça nos destaques da home</small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-12 mb-3">
                                <label for="tags">Palavras Chaves</label>
                                <select class="js-example-basic-multiple js-states form-control" multiple="multiple" name="chaves[]" id="select_tag" multiple required>
                                    <option value="" label="default"></option>
                                    @foreach (App\Models\Chave::all() as $chave)
                                        <option value="{{$chave->id}}" @if($lote->chaves->contains($chave->id)) selected @endif>{{$chave->palavra}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            @if ($lote->reserva->multi_fazendas)
                                <div class="col-12 col-lg-8 mb-3">
                                    <label for="tags">Fazenda</label>
                                    <br>
                                    <select class="form-control select2" style="width: 100%;" name="fazenda">
                                        <option value="0">Nenhum</option>
                                        @foreach (\App\Models\Fazenda::all() as $fazenda)
                                            <option value="{{ $fazenda->id }}" @if ($lote->fazenda_id == $fazenda->id) selected @endif>
                                                {{ $fazenda->nome_fazenda }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif
                            <div class="col-12 col-lg-4">
                                <div class="mb-3">
                                    <label for="ativo" class="form-label">Situação</label>
                                    <select name="ativo" id="ativo" class="form-select">
                                        <option value="1" @if ($lote->ativo) selected @endif>Ativo</option>
                                        <option value="0" @if (!$lote->ativo) selected @endif>Inativo</option>
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
                                    <input type="number" name="preco" class="form-control" min="0" step="0.01"
                                        value="{{ $lote->preco }}" required>
                                </div>
                            </div>
                            <div class="col-6 col-md-4">
                                <div class="mb-3">
                                    <label for="parcelas" class="form-label">Parcelas</label>
                                    <input type="number" name="parcelas" class="form-control" min="0" step="1"
                                        value="{{ $lote->parcelas }}" required>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h4 class="card-title my-4">Sistema de Pacote</h4>
                        <div class="row mb-3">
                            <div class="col-6 col-md-4">
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="pacote" id="" value="0"
                                            @if (!$lote->pacote && !$lote->membro_pacote) checked @endif>
                                        Não irá utilizar
                                    </label>
                                </div>
                            </div>
                            <div class="col-6 col-md-4">
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="pacote" id=""
                                            @if ($lote->pacote) checked @endif value="1">
                                        Irá ser um pacote
                                    </label>
                                </div>
                            </div>
                            <div class="col-6 col-md-4">
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="pacote" id=""
                                            @if ($lote->membro_pacote) checked @endif value="2">
                                        Faz parte de um pacote
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3" id="row-seleciona-pacote" @if (!$lote->membro_pacote) style="display:none;" @endif>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="lote_pacote" class="form-label">Pacote</label>
                                    <select class="form-control" name="lote_pacote" id="">
                                        @foreach ($lote->reserva->lotes->where('pacote', true) as $pacote)
                                            <option value="{{ $pacote->id }}" @if ($lote->pacote_id == $pacote->id) selected @endif>
                                                {{ $pacote->numero . $pacote->letra . ' ' . $pacote->nome }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h4 class="card-title my-4">Vídeo</h4>
                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="">Cole o <b>link de incorporação</b> do vídeo</label>
                                <input type="text" name="video" value="{{ $lote->video }}" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12 text-center iframe-lote">
                                @if ($lote->video)
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
                                @if ($lote->preview)
                                    <img class="w-100" style="max-width: 300px;"
                                        src="{{ asset($lote->preview) }}" alt="">
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
                                @if ($lote->genealogia)
                                    <img class="w-100" style="max-width: 300px;"
                                        src="{{ asset($lote->genealogia) }}" alt="">
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
                                @if ($lote->catalogo)
                                    <a name="" id="" href="{{ asset($lote->catalogo) }}" class="btn btn-primary"
                                        href="#" role="button"
                                        download="{{ $lote->fazenda->slug }}-lote-{{ $lote->numero }}.pdf">Download</a>
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

@section('scripts')
    <script src="{{ asset('admin/libs/select2/js/select2.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#select_tag').select2({
                tags: true,
            });
            $("input[name='pacote']").change(function() {
                if ($("input[name='pacote']:checked").val() == 2) {
                    $("#row-seleciona-pacote").slideDown(300);
                } else {
                    $("#row-seleciona-pacote").slideUp(300);
                }
            });
        })
    </script>

@endsection
