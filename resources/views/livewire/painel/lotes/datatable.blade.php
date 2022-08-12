<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th></th>
                                <th></th>
                                <th>Nº</th>
                                <th>Nome</th>
                                <th>RGD</th>
                                <th>Preço</th>
                                <th>Visitas</th>
                                <th>Reservado</th>
                                <th>Lib. Preço</th>
                                <th>Lib. Compra</th>
                                <th>Ativo</th>
                            </tr>
                        </thead>
                        <tbody style="vertical-align: middle;">
                            @foreach($lotes as $lote)
                                <tr @if($lote->reservado) style="background-color: rgba(0,255,0,0.15)" @endif>
                                    <td>
                                        <div class="mt-4 dropdown mt-sm-0">
                                            <a href="#" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="fas fa-bars" aria-hidden="true"></i>
                                            </a>
                                            <div class="dropdown-menu" style="margin: 0px;">
                                                <a name="" id="" class="dropdown-item py-2"
                                                    href="{{ route('painel.fazenda.reserva.lote.editar', ['lote' => $lote]) }}"
                                                    role="button">Editar</a>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center cell-foto-lote" style="position: relative;">
                                        <img src="{{ ($lote->preview) ? asset($lote->preview) :  asset('admin/images/thumb-padrao.png')}}" alt="" width="80">
                                        <label for="input_preview_{{ $lote->id }}">
                                            <i class="fas fa-edit text-white cpointer" style="font-size: 14px; position: absolute; top: calc(50% - 7px); left: calc(50% - 7px);"></i>
                                        </label>
                                        <input id="input_preview_{{ $lote->id }}" style="display: none;" type="file" wire:model="arquivos.{{ $lote->id }}" accept="image/*">
                                    </td>
                                    <td>{{ $lote->numero }}</td>
                                    <td>{{ $lote->nome }}</td>
                                    <td>{{ $lote->registro}}</td>
                                    <td>
                                        {{-- R$ {{ number_format($lote->preco, 2, ",", ".") }} --}}
                                        <input type="text" class="form-control" style="width: 100px;" onfocusout="Livewire.emit('atualizaValor', {{ $lote->id }}, 'preco', this.value)" value="{{ $lote->preco }}">
                                    </td>
                                    <td>{{ $lote->visitas }}</td>
                                    <td>
                                        <select class="form-control" onchange="Livewire.emit('atualizaValor', {{ $lote->id }}, 'reservado', this.value)">
                                            <option value="1" @if($lote->reservado) selected @endif>Sim</option>
                                            <option value="0" @if(!$lote->reservado) selected @endif>Não</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control" onchange="Livewire.emit('atualizaValor', {{ $lote->id }}, 'liberar_preco', this.value)">
                                            <option value="1" @if($lote->liberar_preco) selected @endif>Sim</option>
                                            <option value="0" @if(!$lote->liberar_preco) selected @endif>Não</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control" onchange="Livewire.emit('atualizaValor', {{ $lote->id }}, 'liberar_compra', this.value)">
                                            <option value="1" @if($lote->liberar_compra) selected @endif>Sim</option>
                                            <option value="0" @if(!$lote->liberar_compra) selected @endif>Não</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control" onchange="Livewire.emit('atualizaValor', {{ $lote->id }}, 'ativo', this.value)">
                                            <option value="1" @if($lote->ativo) selected @endif>Sim</option>
                                            <option value="0" @if(!$lote->ativo) selected @endif>Não</option>
                                        </select>
                                    </td>
                                    {{-- <td>{{ $reserva->lotes->count() }}</td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <x-loading></x-loading>
</div>