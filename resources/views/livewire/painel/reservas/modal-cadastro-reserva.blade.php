<div class="modal fade" id="modalCadastroReserva" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
    aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog modal-lg" role="document" wire:ignore.self>
        <div class="modal-content" wire:ignore.self>
            <div class="bg-preto modal-header" wire:ignore.self>
                <h5 class="text-white modal-title">Cadastro de Reserva</h5>
                <i data-bs-dismiss="modal" aria-label="Close" class="text-white fas fa-times cpointer"></i>
            </div>
            <div class="modal-body bg-modal" wire:ignore.self>
                <div class="row">
                    <div class="col-12">
                        <div class="card curso">
                            <div class="card-body">
                                <form wire:submit.prevent='salvar' method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @if(!$fazenda)
                                        <div class="row">
                                            <div class="mb-3 col-12 form-group">
                                                <label for="" class="form-label">Fazenda</label>
                                                <select class="form-control" wire:model="fazenda_selecionada">
                                                    <option>Selecione uma Fazenda</option>
                                                    @foreach(\App\Models\Fazenda::orderBy("nome_fazenda", "ASC")->get() as $faz)
                                                        <option value="{{ $faz->id }}">{{ $faz->nome_fazenda }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="row">
                                        <div class="mb-3 col-12 col-md-4 form-group">
                                            <label for="inicio">Início</label>
                                            <input type="date" class="form-control" name="inicio"
                                                wire:model="reserva.inicio" required>
                                        </div>
                                        <div class="mb-3 col-12 col-md-4 form-group">
                                            <label for="fim">Fim</label>
                                            <input type="date" class="form-control" name="fim"
                                                wire:model="reserva.fim" required>
                                        </div>
                                        <div class="mb-3 col-12 col-md-4 form-group">
                                            <label for="desconto_live_valor">Desconto à Vista (%)</label>
                                            <input type="number" class="form-control" name="desconto_live_valor"
                                                min="0" step="0.01" wire:model="reserva.desconto" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mb-3 col-12 col-md-4 form-group">
                                            <label for="desconto_live_valor">Desconto de Live (%)</label>
                                            <input type="number" class="form-control" name="desconto_live_valor"
                                                min="0" step="0.01" wire:model="reserva.desconto_live_valor"
                                                required>
                                        </div>
                                        <div class="mb-3 col-12 col-md-4 form-group">
                                            <label for="multi_fazendas">Reserva Multi Fazendas ?</label>
                                            <select class="form-control" name="multi_fazendas"
                                                wire:model="reserva.multi_fazendas" required>
                                                <option value="">Selecione uma Opção</option>
                                                <option value="0">Não</option>
                                                <option value="1">Sim</option>
                                            </select>
                                        </div>
                                        <div class="mb-3 form-group col-12 col-md-4">
                                            <label for="ativo">Ativo</label>
                                            <select class="form-control" name="ativo" wire:model="reserva.ativo" required>
                                                <option value="">Selecione uma Opção</option>
                                                <option value="0">Não</option>
                                                <option value="1">Sim</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mb-3 form-group col-12 col-md-4">
                                            <label for="mostrar_datas">Mostrar Data</label>
                                            <select class="form-control" name="mostrar_datas"
                                                wire:model="reserva.mostrar_datas" required>
                                                <option value="">Selecione uma Opção</option>
                                                <option value="0">Não</option>
                                                <option value="1" selected>Sim</option>
                                            </select>
                                        </div>
                                        <div class="mb-3 form-group col-12 col-md-4">
                                            <label for="ativo">Raça Pré-definida</label>
                                            <select class="form-control" name="raca_id" wire:model="reserva.raca_id" required>
                                                <option value="">Selecione uma Opção</option>
                                                <option value="-1">Nenhuma</option>
                                                @foreach (\App\Models\Raca::all() as $raca)
                                                    <option value="{{ $raca->id }}">{{ $raca->nome }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3 form-group col-12 col-md-4">
                                            <label for="mostrar_datas">Número de Parcelas</label>
                                            <input type="number" class="form-control" name="max_parcelas"
                                                min="1" step="1"
                                                wire:model.debounce.500ms="reserva.max_parcelas" required>
                                        </div>
                                        {{-- <div class="mb-3 form-group col-12">
                                              <label for="" class="form-label">Imagem do Card</label>
                                              <input type="file" class="form-control" wire:model="arquivo">
                                        </div> --}}
                                    </div>
                                    @if ($reserva && $reserva->max_parcelas)
                                        <hr>
                                        <div class="mb-3 row">
                                            <div class="col-12">
                                                <h4 class="card-title">Forma de pagamento</h4>
                                            </div>
                                        </div>
                                        @if ($formas_pagamento)
                                            <div class="mb-2 row">
                                                <div class="col-12">
                                                    Adicionar Intervalo
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-end">
                                                <div class="mb-3">
                                                    <label for="">Mínimo</label>
                                                    <input type="text" class="form-control"
                                                        wire:model="novo_intervalo.minimo" >
                                                </div>
                                                <div class="mb-3 ms-3">
                                                    <label for="">Máximo</label>
                                                    <input type="text" class="form-control"
                                                        wire:model="novo_intervalo.maximo" >
                                                </div>
                                                <div class="mb-3 ms-3">
                                                    <label for="">Desconto (%)</label>
                                                    <input type="text" class="form-control"
                                                        wire:model="novo_intervalo.desconto" >
                                                </div>
                                                <div class="mb-3 ms-3">
                                                    <button type="button" class="btn btn-primary"
                                                        wire:click="adicionar_intervalo">Adicionar</button>
                                                </div>
                                            </div>
                                            <div class="accordion">
                                                @foreach ($formas_pagamento as $key => $forma_pagamento)
                                                    <div class="mb-3 accordion-item">
                                                        <h2 class="accordion-header" id="headingTwo" wire:ignore.self>
                                                            <button class="accordion-button fw-medium collapsed"
                                                                type="button" data-bs-toggle="collapse"
                                                                data-bs-target="#collapse{{ $key }}" aria-expanded="false"
                                                                aria-controls="collapse{{ $key }}" wire:ignore.self>
                                                                De {{ $forma_pagamento['minimo'] }} a
                                                                {{ $forma_pagamento['maximo'] }} parcela(as)
                                                            </button>
                                                        </h2>
                                                        <div id="collapse{{ $key }}" class="accordion-collapse collapse"
                                                            aria-labelledby="headingTwo"
                                                            data-bs-parent="#accordionExample" wire:ignore.self>
                                                            <div class="accordion-body">
                                                                <div class="mb-2 row">
                                                                    <div class="col-12">
                                                                        Alterar Intervalo
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex align-items-end">
                                                                    <div class="mb-3">
                                                                        <label for="">Mínimo</label>
                                                                        <input type="text" class="form-control"
                                                                            wire:model="atualizacoes_intervalos.{{ $key }}.minimo">
                                                                    </div>
                                                                    <div class="mb-3 ms-3">
                                                                        <label for="">Máximo</label>
                                                                        <input type="text" class="form-control"
                                                                            wire:model="atualizacoes_intervalos.{{ $key }}.maximo">
                                                                    </div>
                                                                    <div class="mb-3 ms-3">
                                                                        <label for="">Desconto(%)</label>
                                                                        <input type="text" class="form-control"
                                                                            wire:model="atualizacoes_intervalos.{{ $key }}.desconto">
                                                                    </div>
                                                                    <div class="mb-3 ms-3">
                                                                        <button type="button" class="btn btn-primary"
                                                                            wire:click="atualizar_intervalo({{ $key }})">Salvar</button>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="mb-2">
                                                                    Adicionar Regra
                                                                </div>
                                                                <div class="d-flex align-items-end">
                                                                    <div class="mb-3">
                                                                        <label for="">Número de Meses</label>
                                                                        <input type="text" class="form-control"
                                                                            wire:model="regras.{{ $key }}.meses"
                                                                            >
                                                                    </div>
                                                                    <div class="mb-3 ms-3">
                                                                        <label for="">Número de
                                                                            Parcelas</label>
                                                                        <input type="text" class="form-control"
                                                                            wire:model="regras.{{ $key }}.parcelas"
                                                                            >
                                                                    </div>
                                                                    <div class="mb-3 ms-3">
                                                                        <button type="button" class="btn btn-primary"
                                                                            wire:click="adicionar_regra({{ $key }})">Adicionar</button>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div>
                                                                    @if (count($forma_pagamento['parcelas']) == 0)
                                                                        <span>Todas parcelas únicas</span>
                                                                    @else
                                                                        <table class="table">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>Meses</th>
                                                                                    <th>Parcelas</th>
                                                                                    <th></th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                @php
                                                                                    $total_parcelas = 0;
                                                                                @endphp
                                                                                @foreach ($forma_pagamento['parcelas'] as $key_regra => $regra)
                                                                                    <tr>
                                                                                        <td scope="row">
                                                                                            {{ $regra['meses'] }}</td>
                                                                                        <td>{{ $regra['parcelas'] }}
                                                                                        </td>
                                                                                        <td><i class="fas fa-times-circle text-danger fa-lg cpointer"
                                                                                                wire:click="remover_regra({{ $key }}, {{ $key_regra }})"></i>
                                                                                        </td>
                                                                                    </tr>
                                                                                    @php
                                                                                        $total_parcelas += $regra['meses'] * $regra['parcelas'];
                                                                                    @endphp
                                                                                @endforeach
                                                                                @if ($total_parcelas < $forma_pagamento['maximo'])
                                                                                    <tr>
                                                                                        <td class="text-center"
                                                                                            colspan="3">A(as)
                                                                                            {{ $forma_pagamento['maximo'] - $total_parcelas }}
                                                                                            parcela(as) restantes serão
                                                                                            únicas</td>
                                                                                    </tr>
                                                                                @endif
                                                                            </tbody>
                                                                        </table>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif
                                    @endif
                                    <div class="form-group text-end">
                                        <button type="submit" class="mt-3 btn btn-primary"
                                            @if (!$formas_pagamento) disabled @endif>Salvar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        window.addEventListener('abreModalCadastroReserva', event => {
            $("#modalCadastroReserva").modal("show");
        });

        window.addEventListener('fechaModalCadastroReserva', event => {
            $("#modalCadastroReserva").modal("hide");
        });

        $("#modalCadastroReserva").bind('hidden.bs.modal', function(event) {
            Livewire.emit("resetaModalReservas");
        });
    </script>
@endpush
