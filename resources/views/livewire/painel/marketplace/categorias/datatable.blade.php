<div class="container-fluid">
    <div class="row mb-3">
        <div class="col-12">
            <a name="" id="" class="btn btn-primary" onclick="Livewire.emit('carregaModalCadastroMarketplaceCategorias')" role="button">Nova Categoria</a>
        </div>
    </div>
    <div class="row card">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Categoria Pai</th>
                            <th scope="col">Número de Produtos</th>
                            <th scope="col">Total de Visualizações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categorias as $categoria)
                            <tr class="">
                                <td scope="row">{{ $categoria->nome }}</td>
                                <td>@if($categoria->categoria) {{ $categoria->categoria->nome }} @else - @endif</td>
                                <td>{{ $categoria->produtos->count() }}</td>
                                <td>{{ $categoria->produtos->sum("visualizacoes") }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="row row-paginacao">
                    {{ $categorias->links() }}
                </div>
            </div>
        </div>
    </div>
</div>