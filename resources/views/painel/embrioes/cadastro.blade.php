@extends('painel.template.main')

@section('styles')
    <link href="{{ asset('admin/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('titulo')
    <a href="{{route('painel.index')}}">Inicio</a> / <a href="{{route('painel.fazendas')}}">Fazendas</a> / <a href="{{route('painel.fazenda.editar', ['fazenda' => $reserva->fazenda])}}">{{$reserva->fazenda->nome_fazenda}}</a> / <a href="{{route('painel.fazenda.reservas', ['fazenda' => $reserva->fazenda])}}">Reservas</a> / <a href="{{route('painel.fazenda.reserva.embrioes', ['reserva' => $reserva])}}">Embriões</a> / <a href="{{route('painel.fazenda.reserva.embriao.cadastro', ['reserva' => $reserva])}}">Cadastro</a>
@endsection


@section('conteudo')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="my-3 text-left col-12" style="color:red;">
                            * Campos obrigatórios
                        </div>
                    </div>
                    <h4 class="mb-4 card-title">Informações Básicas</h4>

                    <form action="{{ route('painel.fazenda.reserva.embriao.salvar', ['reserva' => $reserva]) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-1">
                                <div class="mb-3">
                                    <label for="letra" class="form-label">Prefixo</label>
                                    <input type="text" class="form-control" name="prefixo_numero" id="letra" maxlength="2">
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="mb-3">
                                    <label for="numero" class="form-label">Número</label>
                                    <input type="number" class="form-control" name="numero" step="1" value="1" required>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="mb-3">
                                    <label for="letra" class="form-label">Sufixo</label>
                                    <input type="text" class="form-control" name="sufixo_numero" id="letra" maxlength="2">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="nome" class="form-label">Nome do Pacote</label>
                                    <input type="text" class="form-control" name="nome_pacote" id="nome_pacote" maxlength="255"
                                        required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="nome" class="form-label">Nome do Pai</label>
                                    <input type="text" class="form-control" name="nome_pai" id="nome" maxlength="100"
                                        required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="nome" class="form-label">Nome da Mãe</label>
                                    <input type="text" class="form-control" name="nome_mae" id="nome" maxlength="100"
                                        required>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="nome" class="form-label">Info. de Lactação</label>
                                    <input type="text" class="form-control" name="info_lactacao_mae" id="nome" maxlength="100"
                                        required>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="nome" class="form-label">Grau de Sangue</label>
                                    <input type="text" class="form-control" name="grau_sangue" id="nome" maxlength="50"
                                        required>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="nome" class="form-label">Link do Vídeo</label>
                                    <input type="text" class="form-control" name="video" id="video" maxlength="300">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="nome" class="form-label">Observações</label>
                                    <textarea class="form-control" name="observacoes" id="observacoes" maxlength="400"></textarea>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Página do Catálogo</label>
                                    <input type="file" class="form-control" name="catalogo" id="" placeholder="">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Preview</label>
                                    <input type="file" class="form-control" name="preview" id="" placeholder="">
                                </div>
                            </div>
                            {{-- <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="numero" class="form-label">Gordura</label>
                                    <input type="number" class="form-control" name="producao_gordura" step="1">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="numero" class="form-label">Proteína</label>
                                    <input type="number" class="form-control" name="producao_proteina" step="1">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="numero" class="form-label">Índice</label>
                                    <input type="number" class="form-control" name="indice" step="1">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="nome" class="form-label">Grau de Sangue</label>
                                    <input type="text" class="form-control" name="grau_sangue" id="nome" maxlength="50"
                                        required>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="numero" class="form-label">Leite</label>
                                    <input type="number" class="form-control" name="leite" step="1">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="numero" class="form-label">Vp</label>
                                    <input type="number" class="form-control" name="vp" step="1">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="numero" class="form-label">Longevidade</label>
                                    <input type="number" class="form-control" name="longevidade" step="1">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="numero" class="form-label">Ingestão Alimentar</label>
                                    <input type="number" class="form-control" name="ingestao_alimentar" step="0.01">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="numero" class="form-label">Persistência</label>
                                    <input type="number" class="form-control" name="persistencia" step="1">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="numero" class="form-label">Idade ao Primeiro Parto</label>
                                    <input type="number" class="form-control" name="idade_primeiro_parto" step="1">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="numero" class="form-label">Idade ao Primeiro Parto</label>
                                    <input type="number" class="form-control" name="idade_primeiro_parto" step="1">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="numero" class="form-label">Facilidade de Parto</label>
                                    <input type="number" class="form-control" name="facilidade_parto_touro" step="1">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="numero" class="form-label">Fertilidade das Filhas</label>
                                    <input type="number" class="form-control" name="fertilidade_filhas" step="1">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="numero" class="form-label">DPR</label>
                                    <input type="number" class="form-control" name="dpr" step="0.01">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="numero" class="form-label">Cetose</label>
                                    <input type="number" class="form-control" name="idade_primeiro_parto" step="1">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="numero" class="form-label">Sanidade de Úbere</label>
                                    <input type="number" class="form-control" name="sanidade_ubere" step="1">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="numero" class="form-label">Sanidade de Casco</label>
                                    <input type="number" class="form-control" name="sanidade_casco" step="1">
                                </div>
                            </div> --}}
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-12">
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <label for="preco" class="form-label">Preço (R$)</label>
                                        <input type="number" class="form-control" name="preco" step="0.01">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-12">
                                <h4 class="mb-4 card-title">Identificação</h4>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="numero" class="form-label">Fazenda</label>
                                    <select class="form-control" name="fazenda_id">
                                        @foreach(\App\Models\Fazenda::orderBy("nome_fazenda")->get() as $fazenda)
                                            <option value="{{ $fazenda->id }}">{{ $fazenda->nome_fazenda }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="numero" class="form-label">Raça</label>
                                    <select class="form-control" name="raca_id">
                                        @foreach(\App\Models\Raca::orderBy("nome")->get() as $raca)
                                            <option value="{{ $raca->id }}">{{ $raca->nome }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="numero" class="form-label">Tipo</label>
                                    <select class="form-control" name="tipo">
                                        @foreach(config("embrioes.tipos") as $key => $tipo)
                                            <option value="{{ $key }}">{{ $tipo }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="numero" class="form-label">Categoria</label>
                                    <select class="form-control" name="categoria">
                                        @foreach(config("embrioes.categorias") as $key => $categoria)
                                            <option value="{{ $key }}">{{ $categoria }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 text-end">
                            <div class="gap-2 d-grid">
                              <button type="submit" name="" id="" class="btn btn-primary">Salvar</button>
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
