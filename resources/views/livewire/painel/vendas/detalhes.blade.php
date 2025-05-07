<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">

                <div class="card-body">
                    <div class="row">
                        <div class="col-3 d-flex align-items-center">
                            <b class="me-2">Data:</b> {{ date('d/m/Y H:i:s', strtotime($venda->created_at)) }}
                        </div>
                        <div class="col-3 d-flex align-items-center">
                            <b class="me-2">Total:</b> R${{ number_format($venda->total, 2, ',', '.') }}
                        </div>
                        <div class="col-3 d-flex align-items-center">
                            <b class="me-2">Parcelas:</b> {{ $venda->parcelas }}x de
                            {{ number_format($venda->valor_parcela, 2, ',', '.') }}
                        </div>
                        <div class="col-3 d-flex align-items-center">
                            @if ($venda->situacao != 3)
                                <div class="mb-3 form-floating" style="width: 250px;">
                                    <select class="form-select" id="select-situacao">
                                        @foreach (config('globals.situacoes') as $chave => $situacao)
                                            <option value="{{ $chave }}"
                                                @if ($chave == $venda->situacao) selected @endif>{{ $situacao }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="select-situacao">Situação</label>
                                </div>
                            @else
                                Reserva Cancelada
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3 d-flex align-items-center">
                            <b class="me-2">Desconto (%):</b> <input type="number" style="width: 100px;"
                                class="form-control" value="{{ $venda->porcentagem_desconto }}"
                                onchange="Livewire.emit('atualizaValor', {{ $venda->id }}, 'porcentagem_desconto', this.value)">
                        </div>
                        <div class="col-3 d-flex align-items-center">
                            <b class="me-2">Desconto Extra (R$):</b> <input type="number" style="width: 100px;"
                                class="form-control" value="{{ $venda->desconto_extra }}"
                                onchange="Livewire.emit('atualizaValor', {{ $venda->id }}, 'desconto_extra', this.value)"
                                </div>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
            <div class="col-12">
                <div class="card">

                    <div class="card-body">
                        <div class="mb-3 row">
                            <div class="col-12">
                                <a class="btn btn-primary" onclick="Livewire.emit('carregaModalAdicionaLote')" role="button">Adicionar Lote</a>
                            </div>
                        </div>
                        <table class="table table-bordered dt-responsive nowrap w-100"
                            style="vertical-align: middle; text-align: center;">
                            <thead>
                                <tr>
                                    <th>Fazenda</th>
                                    <th>Lote</th>
                                    <th>Raça</th>
                                    <th>Registro</th>
                                    <th>Valor</th>
                                    <th></th>
                                </tr>
                            </thead>


                            <tbody>
                                @foreach ($venda->carrinho->produtos as $produto)
                                    <tr>
                                        <td><img src="{{ asset($produto->produtable->fazenda->logo) }}"
                                                style="max-width: 100px;" alt=""></td>
                                        <td><b>LOTE {{ str_pad($produto->produtable->numero, 3, '0', STR_PAD_LEFT) }}
                                                - {{ $produto->produtable->nome }}</b></td>
                                        <td><b>Raça:</b> {{ $produto->produtable->raca->nome }}</td>
                                        <td><b>Registro:</b> {{ $produto->produtable->registro }}</td>
                                        <td><b>Valor:</b>
                                            R${{ number_format($produto->produtable->preco, 2, ',', '.') }}</td>
                                        <td>
                                            <i class="cpointer fas fa-times-circle fa-lg text-danger"
                                                wire:click="removerProduto({{ $produto->id }})"></i>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end row -->
        </div>
    </div>
</div>