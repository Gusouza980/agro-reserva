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
            <div class="w-auto">
                <div class="mb-3">
                    <label for="" class="form-label">Assessor</label>
                    <select class="form-select" wire:model="filtro_assessor">
                        <option value="" selected>Todos</option>
                        @foreach(\App\Models\Assessor::orderBy("nome", "ASC")->get() as $assessor)
                            <option value="{{ $assessor->id }}">{{ $assessor->nome }}</option>
                        @endforeach
                    </select>
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
                                @if(session()->get("admin")["acesso"] === 0)
                                    <th></th>
                                @endif
                                <th><i class="fas fa-file fa-lg"></i></th>
                                <th>Cód.</th>
                                <th>Cliente, Assessor</th>
                                <th style="width: 140px;">Entrada (R$)</th>
                                <th style="width: 100px;">Desc. (%)</th>
                                <th style="width: 140px;">Desc. Extra (R$)</th>
                                <th style="width: 120px;">Total</th>
                                @if(session()->get("admin")["acesso"] === 0)
                                    <th style="width: 180px;">Status</th>
                                @endif
                                <th>Data</th>
                                <th>Aprov.</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($vendas as $venda)
                                @if(session()->get('admin')['acesso'] === 0 || session()->get('admin')['acesso'] === 4)
                                    <tr @if(!$venda->aprovada) style="background-color: rgba(255,0,0,0.2)" @else style="background-color: rgba(0,255,0,0.2);" @endif>
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
                                                    <a wire:click="excluirVenda({{ $venda->id }})" class="py-3 dropdown-item text-danger cpointer" role="button">Excluir Venda</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="vertical-align: middle; text-align:center;">
                                            @if($venda->comprovante)
                                                <a href="{{ asset($venda->comprovante) }}" target="_blank"><i class="fas fa-download fa-lg cpointer text-soft"></i></a>
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td style="vertical-align: middle; text-align:center;">{{$venda->codigo}}</td>
                                        <td style="vertical-align: middle; text-align:center;">
                                            <a href="{{ route('painel.cliente.visualizar', ['cliente' => $venda->cliente_id]) }}">{{ $venda->cliente->nome_dono }}</a>
                                            @if($venda->assessor_id)
                                                <p style="font-size: 11px;">{{ $venda->assessor->nome }}</p>
                                            @endif
                                        </td>
                                        <td style="vertical-align: middle; text-align:center;">
                                            <input type="number" class="form-control" value="{{ $venda->entrada }}" onchange="Livewire.emit('atualizaValor', {{ $venda->id }}, 'entrada', this.value)">
                                        </td>
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
                                        <td style="vertical-align: middle; text-align:center;">
                                            @if(!$venda->aprovada)
                                                <a name="" id="" class="btn btn-success" wire:click="aprovar({{ $venda->id }})" role="button">
                                                    <i class="text-white fas fa-thumbs-up fa-sm"></i>
                                                </a>
                                            @else
                                                <a name="" id="" class="btn btn-danger" wire:click="reprovar({{ $venda->id }})" role="button">
                                                    <i class="text-white fas fa-thumbs-down fa-sm"></i>
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @else
                                    <tr>
                                        <td style="vertical-align: middle; text-align:center;">{{$venda->codigo}}</td>
                                        <td style="vertical-align: middle; text-align:center;"><a href="{{ route('painel.cliente.visualizar', ['cliente' => $venda->cliente_id]) }}">{{ $venda->cliente->nome_dono }}</a></td>
                                        <td style="vertical-align: middle; text-align:center;">R${{ number_format($venda->entrada, 2, ",", ".") }}</td>
                                        <td style="vertical-align: middle; text-align:center;">{{ number_format($venda->porcentagem_desconto, 2, ",", ".") }}%</td>
                                        <td style="vertical-align: middle; text-align:center;">R${{ number_format($venda->desconto_extra, 2, ",", ".") }}</td>
                                        <td style="vertical-align: middle; text-align:center;">R${{ number_format($venda->total, 2, ",", ".") }}</td>
                                        <td style="vertical-align: middle; text-align:center;">{{date("d/m/Y H:i:s", strtotime($venda->created_at))}}</td>
                                    </tr>
                                @endif
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