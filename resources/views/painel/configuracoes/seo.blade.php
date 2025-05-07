@extends('painel.template.main')

@section('conteudo')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @livewire('painel.configuracoes.seo.pagina')
                </div>
            </div>
        </div>
    </div>
@endsection
