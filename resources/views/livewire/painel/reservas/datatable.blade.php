<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th></th>
                                <th>ID</th>
                                <th></th>
                                @if(!$fazenda)
                                    <th>Fazenda</th>
                                @endif
                                <th>Início</th>
                                <th>Fim</th>
                                <th>Ativa</th>
                                <th>Aberta</th>
                                <th>Preços</th>
                                <th>Compras</th>
                                <th>Lotes</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reservas as $reserva)
                                <tr>
                                    <td>
                                        <div class="mt-4 dropdown mt-sm-0">
                                            <a href="#" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="fas fa-bars" aria-hidden="true"></i>
                                            </a>
                                            <div class="dropdown-menu" style="margin: 0px;">
                                                <a name="" href="{{route('fazenda.lotes', ['fazenda' => $reserva->fazenda->slug, 'reserva' => $reserva])}}" id="" class="py-2 dropdown-item"
                                                    target="_blank" role="button">Página da Reserva</a>
                                                <a name="" id="" class="py-2 dropdown-item" onclick="Livewire.emit('carregaModalEdicaoReservas', {{ $reserva->id }})"
                                                    role="button">Editar Reserva</a>
                                                <a name="" id=""
                                                    href="{{ route('painel.fazenda.editar', ['fazenda' => $reserva->fazenda]) }}"
                                                    class="py-2 dropdown-item" role="button">Editar Fazenda</a>
                                                <a name="" id=""
                                                    href="{{ route('painel.fazenda.reserva.lotes', ['reserva' => $reserva]) }}"
                                                    class="py-2 dropdown-item" role="button">Lotes</a>
                                                <a name="" id=""
                                                    href="{{ route('painel.fazenda.reserva.embrioes', ['reserva' => $reserva]) }}"
                                                    class="py-2 dropdown-item" role="button">Embriões</a>
                                                <a name="" id=""
                                                    href="{{ route('painel.fazenda.reservas.relatorio', ['reserva' => $reserva]) }}"
                                                    class="py-2 dropdown-item" role="button">Relatório</a>
                                                <a name="" id=""
                                                    onclick="exibeCarregamento()" href="{{ route('painel.fazenda.reservas.relatorio', ['reserva' => $reserva]) }}"
                                                    class="py-2 dropdown-item" role="button">Mapa de Compras</a>
                                            </div>
                                        </div>
                                    </td>
                                    <td>#{{ $reserva->id }}</td>
                                    <td>
                                        <img src="{{ asset($reserva->imagem_card) }}" width="100" alt="">
                                    </td>
                                    <td>{{ $reserva->fazenda->nome_fazenda }}</td>
                                    <td>{{ date("d/m/Y", strtotime($reserva->inicio)) }}</td>
                                    <td>{{ date("d/m/Y", strtotime($reserva->fim)) }}</td>
                                    <td>
                                        <select class="form-control" onchange="Livewire.emit('atualizaValor', {{ $reserva->id }}, 'ativo', this.value)">
                                            <option value="1" @if($reserva->ativo) selected @endif>Sim</option>
                                            <option value="0" @if(!$reserva->ativo) selected @endif>Não</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control" onchange="Livewire.emit('atualizaValor', {{ $reserva->id }}, 'aberto', this.value)">
                                            <option value="1" @if($reserva->aberto) selected @endif>Sim</option>
                                            <option value="0" @if(!$reserva->aberto) selected @endif>Não</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control" onchange="Livewire.emit('atualizaValor', {{ $reserva->id }}, 'preco_disponivel', this.value)">
                                            <option value="1" @if($reserva->preco_disponivel) selected @endif>Sim</option>
                                            <option value="0" @if(!$reserva->preco_disponivel) selected @endif>Não</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control" onchange="Livewire.emit('atualizaValor', {{ $reserva->id }}, 'compra_disponivel', this.value)">
                                            <option value="1" @if($reserva->compra_disponivel) selected @endif>Sim</option>
                                            <option value="0" @if(!$reserva->compra_disponivel) selected @endif>Não</option>
                                        </select>
                                    </td>
                                    <td>{{ $reserva->lotes->count() }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="w-100 d-flex justify-content-center">
                        {{ $reservas->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-loading></x-loading>
</div>