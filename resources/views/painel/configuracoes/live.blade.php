@extends('painel.template.main')

@section('conteudo')
    <div class="row">
        <div class="col-12 col-lg-4">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('painel.configuracoes.live.salvar') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group">
                                <label for="">Mostrar Live</label>
                                <select class="form-control" name="live_ativo" id="">
                                    <option @if (!$configuracao->live_ativo) selected @endif value="0">Não</option>
                                    <option @if ($configuracao->live_ativo) selected @endif value="1">Sim</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="form-group">
                                <label for="">Link da Live</label>
                                <input type="text" class="form-control" name="live_link" id="" aria-describedby="helpId"
                                    placeholder="" value="{{ $configuracao->live_link }}">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12 text-end">
                                <button type="submit" class="btn btn-primary btn-block">Salvar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-8" id="live_painel">
            {!! $configuracao->live_link !!}
        </div>
    </div>
@endsection
