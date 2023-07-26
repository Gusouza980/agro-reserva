<div class="w-full" x-data="{ show: @entangle('show') }">
    <div x-show="show" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
        class="fixed overflow-y-scroll inset-0 z-[100] flex items-end bg-slate-900/60 backdrop-blur sm:items-center sm:justify-center">
        <!-- Modal -->
        <div x-show="show" x-transition:enter="transition ease-out duration-150"
            x-transition:enter-start="opacity-0 transform translate-y-1/2" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0  transform translate-y-1/2" @click.away="show = false"
            @keydown.escape="show = false"
            class="w-full px-6 py-4 bg-white rounded-t-lg dark:bg-navy-700 sm:rounded-lg sm:m-4 sm:max-w-[900px]"
            role="dialog">
            <!-- Modal body -->
            <div class="mt-4 mb-6">
                <!-- Modal title -->
                <p class="mb-2 text-lg font-semibold text-gray-900 dark:text-gray-700">
                    Cadastro de Venda
                </p>

                @include('sistema.includes.divider')
                
                <div class="w-full">
                    @if($show)
                        <div class="w-full">
                            @if($op == "listagem_clientes")
                                <div class="w-full mb-3">
                                    <label class="block">
                                        <span>Pesquisar</span>
                                        <span class="relative mt-1.5 flex">
                                            <input wire:model.debounce.500ms="filtro_inicio" class="w-full px-3 py-2 bg-transparent border rounded-lg form-input peer border-slate-300 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" type="text" placeholder="Pesquisar nome ou e-mail" wire:model.debounce.500ms="filtro_clientes">
                                        </span>
                                    </label>
                                </div>
                                <div class="w-full">
                                    <table class="w-full">
                                        <tbody>
                                            @foreach($clientes as $cliente)
                                                <tr>
                                                    <td  class="px-4 py-3 whitespace-nowrap sm:px-5" scope="row">{{ $cliente->nome_dono }}</td>
                                                    <td class="px-4 py-3 whitespace-nowrap sm:px-5">{{ $cliente->email }}</td>
                                                    <td class="px-4 py-3 whitespace-nowrap sm:px-5" wire:click="selecionarCliente({{ $cliente->id }})">
                                                        <button class="border-none bg-none"><i class="text-green-600 cursor-pointer fas fa-check-square fa-2x"></i></button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="flex justify-center px-4 py-4 space-y-4 sm:flex-row sm:items-center sm:space-y-0 sm:px-5">
                                        {{ $clientes->links() }}
                                    </div>
                                </div>
                            @elseif($op == "informacoes_venda")
                                <div class="w-full">
                                    <div class="mb-3">
                                        <label class="block">
                                            <span>Pesquisar</span>
                                            <span class="relative mt-1.5 flex">
                                                <input readonly wire:model="cliente_selecionado.nome_dono" class="w-full px-3 py-2 bg-transparent border rounded-lg form-input peer border-slate-300 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" type="text" placeholder="Pesquisar nome ou e-mail" wire:model.debounce.500ms="filtro_clientes">
                                            </span>
                                        </label>
                                    </div>
                                    <div class="mb-3" style="position: relative;">
                                        <label for="" class="form-label">Lotes</label>
                                        <input type="text"
                                            class="w-full px-3 py-2 bg-transparent border rounded-lg form-input peer border-slate-300 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" name="" id="filtro-lotes" aria-describedby="helpId" wire:model.debounce.500ms="filtro_lotes" autocomplete="off">
                                        <div id="lotes-dropdown" style="display: none; width: 100%; overflow-y: scroll; height: 200px;  position: absolute; bottom: -200; left: 0; border: 1px solid black; background-color: white; z-index: 1060;">
                                            <ul class="list-group">
                                                @foreach($lotes as $lote)
                                                    <li class="px-3 py-1 cursor-pointer list-item" wire:click="selecionarLote({{ $lote->id }})">LOTE {{ str_pad($lote->numero, 3, "0", STR_PAD_LEFT) }} - {{ $lote->nome }} ({{ $lote->fazenda->nome_fazenda }})</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    
                                    @if(count($lotes_selecionados) > 0)
                                        <div class="flex flex-wrap w-full px-2 py-2 mb-3" style="border-radius: 8px; border: 1px solid #F5F5F5;">
                                            @foreach($lotes_selecionados as $key => $lote_selecionado)
                                                <div class="w-1/2 py-1 item-lote-selecionado">
                                                    LOTE {{ str_pad($lote_selecionado["numero"], 3, "0", STR_PAD_LEFT) }} - {{ $lote_selecionado["nome"] }}
                                                    <div class="excluir-lote-selecionado" wire:click="removerLote({{ $key }})">
                                                        <i class="fas fa-times-circle fa-lg text-danger"></i>
                                                    </div>
                                                </div>
                                            @endforeach
                                            <hr class="mt-2">
                                            <div class="w-full text-end">
                                                <b class="me-2">TOTAL:</b> R${{ number_format($lotes_selecionados->sum("preco"), 2, ",", ".") }}
                                            </div>
                                        </div>

                                        {{-- DESCONTO %, DESCONTO EXTRA, ENTRADA --}}
                                        <div class="grid w-full grid-cols-3 gap-x-4">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Desconto (%)</label>
                                                <input type="number"
                                                    class="w-full px-3 py-2 bg-transparent border rounded-lg form-input peer border-slate-300 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" name="" id="" wire:model.defer="venda.porcentagem_desconto" max="100" step="0.01">
                                            </div>
                                            <div class="mb-3">
                                                <label for="" class="form-label">Desconto (R$)</label>
                                                <input type="number"
                                                    class="w-full px-3 py-2 bg-transparent border rounded-lg form-input peer border-slate-300 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" name="" id="" wire:model.defer="venda.desconto_extra" step="0.01">
                                            </div>
                                            <div class="mb-3">
                                                <label for="" class="form-label">Entrada (R$)</label>
                                                <input type="number"
                                                    class="w-full px-3 py-2 bg-transparent border rounded-lg form-input peer border-slate-300 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" name="" id="" wire:model.defer="venda.entrada" step="0.01">
                                            </div>
                                            <div class="mb-3">
                                                <label for="" class="form-label">Nº de Parcelas</label>
                                                <input type="number"
                                                    class="w-full px-3 py-2 bg-transparent border rounded-lg form-input peer border-slate-300 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" name="" id="" wire:model.defer="venda.parcelas" min="1" step="1" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="" class="form-label">Vencimento Primeira Parcela</label>
                                                <input type="date"
                                                    class="w-full px-3 py-2 bg-transparent border rounded-lg form-input peer border-slate-300 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" name="" id="" min="{{ date("Y-m-d") }}" wire:model.defer="venda.primeira_parcela" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="" class="form-label">Tarjar Lotes</label>
                                                <select name="" id="" class="w-full px-3 py-2 bg-transparent border rounded-lg form-input peer border-slate-300 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" wire:model.defer="tarjar">
                                                    <option value="0">Não</option>
                                                    <option value="1">Sim</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="w-full">
                                            <button class="w-full py-3 text-white bg-green-600 cursor-pointer" wire:click="geraParcelas">Gerar Parcelas</button>
                                        </div>
                                        @if($parcelas->count() > 0)
                                            <hr class="my-3">
                                            <div class="min-w-full overflow-x-auto border rounded-lg is-scrollbar-hidden border-slate-200 dark:border-navy-500" style="overflow-y:scroll; max-height: 300px;">
                                                <table class="w-full">
                                                    <tbody style="vertical-align: middle; text-center: center">
                                                        @php
                                                            $cont = 0;
                                                        @endphp
                                                        @foreach($parcelas as $key => $parcela)
                                                            @if($cont == 0)
                                                                <tr>
                                                            @endif
                                                            
                                                            <td class="px-3 py-3 border border-l-0 whitespace-nowrap border-slate-200 dark:border-navy-500 lg:px-5"><b>{{ $key }}/{{ $venda->parcelas }}</b></td>
                                                            <td class="px-3 py-3 border border-l-0 whitespace-nowrap border-slate-200 dark:border-navy-500 lg:px-5">
                                                                <input type="number" class="w-full px-3 py-2 bg-transparent border rounded-lg form-input peer border-slate-300 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" wire:model.debounce.500ms="parcelas.{{ $key }}.valor" required>
                                                            </td>
                                                            <td class="px-3 py-3 border border-l-0 whitespace-nowrap border-slate-200 dark:border-navy-500 lg:px-5">
                                                                <input type="date" class="w-full px-3 py-2 bg-transparent border rounded-lg form-input peer border-slate-300 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" wire:model.debounce.500ms="parcelas.{{ $key }}.vencimento" required>
                                                            </td>
                                                            @php
                                                                $cont++;
                                                            @endphp
                                                            @if($cont == 2)
                                                                </tr>
                                                                @php
                                                                    $cont = 0;
                                                                @endphp
                                                            @endif
                                                        @endforeach        
                                                    </tbody>
                                                </table>
                                            </div>
                                            <hr class="my-3">
                                            <div class="w-full mb-3">
                                                <div class="w-full mb-3">
                                                    <h5 class="card-title">
                                                        RESUMO:
                                                    </h5>
                                                </div>
                                                <div class="w-full">
                                                    <table class="w-full">
                                                        <tbody>
                                                            @php
                                                                $total_lotes = $this->lotes_selecionados->sum("preco");
                                                                $desconto = ($this->venda->porcentagem_desconto) ? $this->venda->porcentagem_desconto : 0;
                                                                $desconto_extra = ($this->venda->desconto_extra) ? $this->venda->desconto_extra : 0;
                                                                $total_parcelas = 0;
                                                                foreach($parcelas as $parcela){
                                                                    $total_parcelas += $parcela["valor"];
                                                                }
                                                                $desconto_parcelas = $total_lotes - $total_parcelas;
                                                                $entrada = ($this->venda->entrada) ? $this->venda->entrada : 0;
                                                            @endphp
                                                            <tr>
                                                                <td class="px-3 py-3 border border-l-0 whitespace-nowrap border-slate-200 dark:border-navy-500 lg:px-5" scope="row"><b>Lotes</b></td>
                                                                <td class="px-3 py-3 border border-l-0 whitespace-nowrap border-slate-200 dark:border-navy-500 lg:px-5">{{ number_format($total_lotes, 2, ",", ".") }}</td>
                                                                <td class="px-3 py-3 border border-l-0 whitespace-nowrap border-slate-200 dark:border-navy-500 lg:px-5"><b>Desconto (%)</b></td>
                                                                <td class="px-3 py-3 text-red-600 border border-l-0 whitespace-nowrap border-slate-200 dark:border-navy-500 lg:px-5">{{ number_format($desconto, 2, ",", ".") }}% (R${{ number_format($total_lotes * $desconto / 100, 2, ",", ".") }})</td>
                                                                <td class="px-3 py-3 border border-l-0 whitespace-nowrap border-slate-200 dark:border-navy-500 lg:px-5"><b>Desconto (R$)</b></td>
                                                                <td class="px-3 py-3 text-red-600 border border-l-0 whitespace-nowrap border-slate-200 dark:border-navy-500 lg:px-5">R${{ number_format($desconto_extra, 2, ",", ".")}} + R${{ number_format($desconto_parcelas, 2, ",", ".") }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td scope="row" class="px-3 py-3 text-right border border-l-0 whitespace-nowrap border-slate-200 dark:border-navy-500 lg:px-5" colspan="4"><b>TOTAL</b></td>
                                                                <td class="px-3 py-3 border border-l-0 whitespace-nowrap border-slate-200 dark:border-navy-500 lg:px-5" colspan="2"><b>R${{ number_format($total_lotes - ($total_lotes * $desconto / 100) - $desconto_extra - $desconto_parcelas, 2, ",", ".") }}</b> com <b>R${{ number_format($entrada, 2, ",", ".") }}</b> de entrada</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <hr class="mt-2">
                                            @if($usuario->acesso == 1)
                                                <div class="w-full">
                                                    <div class="w-full">
                                                        {{-- @if(session()->get("erro_arquivo"))
                                                            <div class="alert alert-danger" role="alert">
                                                                <strong>Erro:</strong> {{ session()->get("erro_arquivo") }}
                                                            </div>
                                                        @endif --}}
                                                        <div class="mb-3">
                                                            <label for="" class="form-label">Print de Comprovação</label>
                                                            <input type="file" class="form-control" wire:model="arquivo" required>
                                                            <div id="fileHelpId" class="form-text">Anexe aqui um print ou comprovante do cliente confirmando a compra</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr class="mt-2">
                                            @endif
                                            <div class="w-full">
                                                <div class="w-full text-end">
                                                    <button type="button" wire:click="salvar" class="w-auto text-white bg-blue-500 btn">Salvar</button>
                                                    <button type="button" wire:click="salvar(true)" class="w-auto text-white bg-green-500 btn ms-3">Salvar e Gerar Outra</button>
                                                </div>
                                            </div>
                                        @endif
                                    @endif
                                </div>
                            @endif
                        </div>
                    @endif
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