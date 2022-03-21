<div class="row justify-content-center">
    <div class="col-12 col-md-9">
        <div class="card">
            <div class="card-body" style="overflow-x: scroll;">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Cliente</th>
                            <th>Lote</th>
                            <th>Fazenda</th>
                            <th>Raça</th>
                            <td>Valor</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($produtos as $produto)
                            <tr>
                                <td>{{ $produto->carrinho->cliente->nome_dono }}</td>
                                <td>{{ $produto->lote->nome }}</td>
                                <td>{{ $produto->lote->fazenda->nome_fazenda }}</td>
                                <td>{{ $produto->lote->raca->nome }}</td>
                                <td>R${{ number_format($produto->total, 2, ",", ".") }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="row row-paginacao">
                    {{ $produtos->links() }}
                </div>
            </div>
        </div>
    </div> <!-- end col -->
    <div class="col-12 col-md-3">
        <div class="card">
            <div class="card-body" style="overflow-x: scroll;">
                <div class="row" style="background-color: var(--laranja); border-radius: 5px;">
                    <div class="col-12 py-2 text-white">
                        Filtros
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="" class="form-label">Nome do Cliente</label>
                            <input type="text"
                                class="form-control" placeholder="" wire:model="filtro_cliente">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Nome do Lote</label>
                            <input type="text"
                                class="form-control" placeholder="" wire:model="filtro_lote">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Raça</label>
                            <select class="form-control" name="" id="" wire:model="filtro_raca">
                                <option value="-1">Selecione uma raça</option>
                                @foreach(\App\Models\Raca::all() as $raca)
                                    <option value="{{ $raca->id }}">{{ $raca->nome }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="d-flex flex-row w-100">
                            <button type="submit" class="btn btn-laranja flex-fill" wire:click='setFiltros'>Filtrar</button>
                            <button type="submit" class="btn btn-light flex-fill ms-2" wire:click='limparFiltros'>Limpar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->