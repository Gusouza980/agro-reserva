<div class="row">
    <div class="mb-3 col-12">
        <div class="row d-flex">
            <div class="w-auto">
                <div class="mb-3">
                  <label for="" class="form-label">Data de Início</label>
                  <input type="date"
                    class="w-auto form-control" name="" id="" wire:model="filtro_inicio">
                </div>
            </div>
            <div class="w-auto">
                <div class="mb-3">
                    <label for="" class="form-label">Data de Fim</label>
                    <input type="date"
                      class="w-auto form-control" name="" id="" wire:model="filtro_fim">
                </div>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive" style="min-height: 400px;">
                    <table class="table">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Cód.</th>
                                <th>Cliente</th>
                                <th>Desconto(%)</th>
                                <th>Desconto Extra (R$)</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Data</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($vendas as $venda)
                                <tr>
                                    <td>
                                        <div class="mt-4 dropdown mt-sm-0">
                                            <a href="#" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="fas fa-bars" aria-hidden="true"></i>
                                            </a>
                                            <div class="dropdown-menu" style="margin: 0px;">
                                                <a href="{{route('painel.vendas.visualizar', ['venda' => $venda])}}" class="py-3 dropdown-item">Detalhes</a>
                                                <a href="{{route('painel.vendas.comprovante', ['venda' => $venda])}}" target="_blank" class="py-3 dropdown-item" role="button">Visualizar Comprovante</a>
                                                <a href="{{route('painel.vendas.comprovante.enviar', ['venda' => $venda])}}" class="py-3 dropdown-item" role="button">Enviar Comprovante</a>
                                            </div>
                                        </div>
                                    </td>
                                    <td style="vertical-align: middle; text-align:center;">{{$venda->codigo}}</td>
                                    <td style="vertical-align: middle; text-align:center;"><a href="{{ route('painel.cliente.visualizar', ['cliente' => $venda->cliente_id]) }}">{{ $venda->cliente->nome_dono }}</a></td>
                                    <td style="vertical-align: middle; text-align:center;">
                                        <input type="number" class="form-control" value="{{ $venda->porcentagem_desconto }}" onchange="Livewire.emit('atualizaValor', {{ $venda->id }}, 'porcentagem_desconto', this.value)">
                                    </td>
                                    <td style="vertical-align: middle; text-align:center;">
                                        <input type="number" class="form-control" value="{{ $venda->desconto_extra }}" onchange="Livewire.emit('atualizaValor', {{ $venda->id }}, 'desconto_extra', this.value)">
                                    </td>
                                    <td style="vertical-align: middle; text-align:center;">R${{number_format($venda->total, 2, ",", ".")}}</td>
                                    <td style="vertical-align: middle; text-align:center;">
                                        <select class="form-control" onchange="Livewire.emit('atualizaValor', {{ $venda->id }}, 'situacao', this.value)">
                                            @foreach(config("globals.situacoes") as $key => $value)
                                                <option value="{{ $key }}" @if($venda->situacao == $key) selected @endif>{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td style="vertical-align: middle; text-align:center;">{{date("d/m/Y H:i:s", strtotime($venda->created_at))}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="w-100 d-flex justify-content-center">
                        {{ $vendas->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-loading></x-loading>
</div>