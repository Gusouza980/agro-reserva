@extends('painel.template.main')

@section('styles')
    <link href="{{ asset('admin/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('titulo')
    Cadastro de Lote - {{ $reserva->fazenda->nome_fazenda }}
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

                    <form action="{{ route('painel.fazenda.reserva.lote.cadastrar', ['reserva' => $reserva]) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="numero" class="form-label">Lote</label>
                                    <input type="number" class="form-control" name="numero" id="numero" min="1" step="1"
                                        value="1">
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
                                    <input type="text" class="form-control" name="nome" id="nome" maxlength="100"
                                        required>
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
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="registro" class="form-label">Registro</label>
                                    <input type="text" class="form-control" name="registro" id="registro" maxlength="30">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="rgn" class="form-label">RGN</label>
                                    <input type="text" class="form-control" name="rgn" id="rgn" maxlength="10">
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
                                        @foreach (App\Models\Raca::all() as $raca)
                                            <option value="{{ $raca->id }}">{{ $raca->nome }}</option>
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
                            <div class="col-6 col-md-3">
                                <div class="mb-3">
                                    <label for="peso" class="form-label">Peso</label>
                                    <input type="text" class="form-control" name="peso" id="peso" maxlength="10">
                                </div>
                            </div>
                            <div class="col-6 col-md-3">
                                <div class="mb-3">
                                    <label for="iabczg" class="form-label">IABCZg</label>
                                    <input type="text" class="form-control" name="iabczg" id="iabczg" maxlength="10">
                                </div>
                            </div>
                            <div class="col-6 col-md-3">
                                <div class="mb-3">
                                    <label for="ce" class="form-label">C.E</label>
                                    <input type="text" class="form-control" name="ce" id="ce" maxlength="10">
                                </div>
                            </div>
                            <div class="col-6 col-md-3">
                                <div class="mb-3">
                                    <label for="deca" class="form-label">Deca</label>
                                    <input type="number" class="form-control" name="deca" id="deca" step="1">
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
                        <div class="row">
                            @if ($reserva->multi_fazendas)
                                <div class="col-12 col-lg-8 mb-3">
                                    <label for="tags">Fazenda</label>
                                    <br>
                                    <select class="form-control select2" style="width: 100%;" name="fazenda">
                                        <option value="0">Nenhum</option>
                                        @foreach (\App\Models\Fazenda::all() as $fazenda)
                                            <option value="{{ $fazenda->id }}">{{ $fazenda->nome_fazenda }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif
                            <div class="col-12 col-lg-4">
                                <div class="mb-3">
                                    <label for="ativo" class="form-label">Iniciar como</label>
                                    <select name="ativo" id="ativo" class="form-select">
                                        <option value="1">Ativo</option>
                                        <option value="0">Inativo</option>
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
                        <h4 class="card-title my-4">Sistema de Pacote</h4>
                        <div class="row mb-3">
                            <div class="col-6 col-md-4">
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="pacote" id="" value="0" checked>
                                        Não irá utilizar
                                    </label>
                                </div>
                            </div>
                            <div class="col-6 col-md-4">
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="pacote" id="" value="1">
                                        Irá ser um pacote
                                    </label>
                                </div>
                            </div>
                            <div class="col-6 col-md-4">
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="pacote" id="" value="2">
                                        Faz parte de um pacote
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3" id="row-seleciona-pacote" style="display:none;">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="lote_pacote" class="form-label">Pacote</label>
                                    <select class="form-control" name="lote_pacote" id="">
                                        @foreach ($reserva->lotes->where('pacote', true) as $lote)
                                            <option value="{{ $lote->id }}">
                                                {{ $lote->numero . $lote->letra . ' ' . $lote->nome }}</option>
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

@section('scripts')
    <script src="{{ asset('admin/libs/select2/js/select2.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();

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
