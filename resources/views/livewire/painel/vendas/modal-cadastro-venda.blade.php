<div class="modal fade" id="modalCadastroVenda" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
    aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog modal-lg" role="document" wire:ignore.self>
        <div class="modal-content" wire:ignore.self>
            <div class="bg-preto modal-header" wire:ignore.self>
                <h5 class="text-white modal-title">Cadastro de Venda</h5>
                <i data-bs-dismiss="modal" aria-label="Close" class="text-white fas fa-times cpointer"></i>
            </div>
            <div class="modal-body bg-modal" wire:ignore.self>
                <div class="row">
                    <div class="col-12">
                        <div class="card curso">
                            <div class="card-body">
                                @if($op == "listagem_clientes")
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-3">
                                            <label for="" class="form-label">Pesquisar</label>
                                            <input type="text"
                                                class="form-control" name="" id="" placeholder="Pesquisar nome ou e-mail" wire:model.debounce.500ms="filtro_clientes">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <table class="table">
                                                <tbody>
                                                    @foreach($clientes as $cliente)
                                                        <tr>
                                                            <td scope="row">{{ $cliente->nome_dono }}</td>
                                                            <td>{{ $cliente->email }}</td>
                                                            <td>
                                                                <i class="cpointer fas fa-check-square fa-lg text-success" wire:click="selecionarCliente({{ $cliente->id }})"></i>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <div class="w-100 d-flex justify-content-center">
                                                {{ $clientes->links() }}
                                            </div>
                                        </div>
                                    </div>
                                @elseif($op == "informacoes_venda")
                                    <div class="row">
                                        <div class="col-12">
                                            @php
                                            
                                            @endphp
                                            <div class="mb-3">
                                                <label for="" class="form-label">Cliente</label>
                                                <input type="text"
                                                    class="form-control" name="" id="" aria-describedby="helpId" wire:model="cliente_selecionado.nome_dono" readonly>
                                            </div>
                                            <div class="mb-3" style="position: relative;">
                                                <label for="" class="form-label">Lotes</label>
                                                <input type="text"
                                                    class="form-control" name="" id="filtro-lotes" aria-describedby="helpId" wire:model.debounce.500ms="filtro_lotes" autocomplete="off">
                                                <div id="lotes-dropdown" style="display: none; width: 100%; overflow-y: scroll; height: 200px;  position: absolute; bottom: -200; left: 0; border: 1px solid black; background-color: white; z-index: 1060;">
                                                    <ul class="list-group">
                                                        @foreach($lotes as $lote)
                                                            <li class="px-3 py-1 list-item cpointer" wire:click="selecionarLote({{ $lote->id }})">LOTE {{ str_pad($lote->numero, 3, "0", STR_PAD_LEFT) }} - {{ $lote->nome }} ({{ $lote->fazenda->nome_fazenda }})</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                            
                                            @if(count($lotes_selecionados) > 0)
                                                <div class="px-2 py-2 mb-3 row" style="border-radius: 8px; border: 1px solid #F5F5F5;">
                                                    @foreach($lotes_selecionados as $key => $lote_selecionado)
                                                        <div class="py-1 col-6 item-lote-selecionado">
                                                            LOTE {{ str_pad($lote_selecionado["numero"], 3, "0", STR_PAD_LEFT) }} - {{ $lote_selecionado["nome"] }}
                                                            <div class="excluir-lote-selecionado" wire:click="removerLote({{ $key }})">
                                                                <i class="fas fa-times-circle fa-lg text-danger"></i>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                    <hr class="mt-2">
                                                    <div class="col-12 text-end">
                                                        <b class="me-2">TOTAL:</b> R${{ number_format($lotes_selecionados->sum("preco"), 2, ",", ".") }}
                                                    </div>
                                                </div>

                                                {{-- DESCONTO %, DESCONTO EXTRA, ENTRADA --}}
                                                <div class="row">
                                                    <div class="mb-3 col-4">
                                                        <label for="" class="form-label">Desconto (%)</label>
                                                        <input type="number"
                                                            class="form-control" name="" id="" wire:model.debounce.500ms="venda.porcentagem_desconto" max="100" step="0.01">
                                                    </div>
                                                    <div class="mb-3 col-4">
                                                        <label for="" class="form-label">Desconto (R$)</label>
                                                        <input type="number"
                                                            class="form-control" name="" id="" wire:model.debounce.500ms="venda.desconto_extra" step="0.01">
                                                    </div>
                                                    <div class="mb-3 col-4">
                                                        <label for="" class="form-label">Entrada (R$)</label>
                                                        <input type="number"
                                                            class="form-control" name="" id="" wire:model.debounce.500ms="venda.entrada" step="0.01">
                                                    </div>
                                                    <div class="mb-3 col-4">
                                                        <label for="" class="form-label">Nº de Parcelas</label>
                                                        <input type="number"
                                                            class="form-control" name="" id="" wire:model.debounce.500ms="venda.parcelas" min="1" step="1" required>
                                                    </div>
                                                    <div class="mb-3 col-4">
                                                        <label for="" class="form-label">Vencimento Primeira Parcela</label>
                                                        <input type="date"
                                                            class="form-control" name="" id="" min="{{ date("Y-m-d") }}" wire:model.debounce.500ms="venda.primeira_parcela" required>
                                                    </div>
                                                    <div class="mb-3 col-4">
                                                        <label for="" class="form-label">Tarjar Lotes</label>
                                                        <select name="" id="" class="form-control" wire:model.defer="tarjar">
                                                            <option value="0">Não</option>
                                                            <option value="1">Sim</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                @if($parcelas->count() > 0)
                                                    <div class="px-2 py-2 mb-3 row" style="overflow-y:scroll; border-radius: 8px; border: 1px solid #F5F5F5; max-height: 300px;">
                                                        <table class="table">
                                                            <tbody style="vertical-align: middle; text-center: center">
                                                                @php
                                                                    $cont = 0;
                                                                @endphp
                                                                @foreach($parcelas as $key => $parcela)
                                                                    @if($cont == 0)
                                                                        <tr>
                                                                    @endif
                                                                    
                                                                    <td><b>{{ $key }}/{{ $venda->parcelas }}</b></td>
                                                                    <td>R${{ number_format($parcela["valor"], 2, ",", ".") }}</td>
                                                                    <td>
                                                                        <input type="date" class="form-control" wire:model="parcelas.{{ $key }}.vencimento" required>
                                                                    </td>
                                                                    @php
                                                                        $cont++;
                                                                        if($cont == 2) $cont = 0;
                                                                    @endphp
                                                                @endforeach        
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <hr class="mt-2">
                                                    <div class="mb-3 row">
                                                        <div class="mb-3 col-12">
                                                            <h4 class="card-title">
                                                                RESUMO:
                                                            </h4>
                                                        </div>
                                                        <div class="col-12">
                                                            <table class="table">
                                                                <tbody>
                                                                    @php
                                                                        $total_lotes = $this->lotes_selecionados->sum("preco");
                                                                        $desconto = ($this->venda->porcentagem_desconto) ? $this->venda->porcentagem_desconto : 0;
                                                                        $desconto_extra = ($this->venda->desconto_extra) ? $this->venda->desconto_extra : 0;
                                                                        $entrada = ($this->venda->entrada) ? $this->venda->entrada : 0;
                                                                    @endphp
                                                                    <tr>
                                                                        <td scope="row"><b>Lotes</b></td>
                                                                        <td>{{ number_format($total_lotes, 2, ",", ".") }}</td>
                                                                        <td><b>Desconto (%)</b></td>
                                                                        <td class="text-danger">{{ number_format($desconto, 2, ",", ".") }}% (R${{ number_format($total_lotes * $desconto / 100, 2, ",", ".") }})</td>
                                                                        <td><b>Desconto (R$)</b></td>
                                                                        <td class="text-danger">R${{ number_format($desconto_extra, 2, ",", ".") }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td scope="row" class="text-end" colspan="4"><b>TOTAL</b></td>
                                                                        <td colspan="2"><b>R${{ number_format($total_lotes - ($total_lotes * $desconto / 100) - $desconto_extra, 2, ",", ".") }}</b> com <b>R${{ number_format($entrada, 2, ",", ".") }}</b> de entrada</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <hr class="mt-2">
                                                    <div class="row">
                                                        <div class="col-12 text-end">
                                                            <button type="button" wire:click="salvar" class="w-auto btn btn-primary">Salvar</button>
                                                            <button type="button" wire:click="salvar(true)" class="w-auto btn btn-secondary ms-3">Salvar e Gerar Outra</button>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <x-loading></x-loading>
</div>

@push("styles")

    <style>
        
        #filtro-lotes:focus{
            border-color: red !important;
        }

        #filtro-lotes:focus + #lotes-dropdown{
            display: block !important;
        }

        #lotes-dropdown:hover{
            display: block !important;
        }

        #lotes-dropdown li:hover{
            background-color: #F5F5F5;
        }

        .item-lote-selecionado{
            position: relative;
        }

        .excluir-lote-selecionado{
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            backdrop-filter: blur(10px);
            display: none;
            cursor: pointer;
        }

        .item-lote-selecionado:hover .excluir-lote-selecionado{
            display: flex;
            justify-content: center;
            align-items: center;
        }

    </style>

@endpush

@push('scripts')
    <script>
        window.addEventListener('abreModalCadastroVenda', event => {
            $("#modalCadastroVenda").modal("show");
        });

        window.addEventListener('fechaModalCadastroVenda', event => {
            $("#modalCadastroVenda").modal("hide");
        });

        $("#modalCadastroVenda").bind('hidden.bs.modal', function(event) {
            Livewire.emit("resetaModalReservas");
        });
    </script>
@endpush
