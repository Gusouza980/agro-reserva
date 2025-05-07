<div class="w-full px-5 py-5">
    <div class="flex items-end w-full mb-4 gap-x-4">
        <div class="">
            <label class="block">
                <span>Data de Início</span>
                <span class="relative mt-1.5 flex">
                    <input wire:model.debounce.500ms="filtro_inicio" class="w-full px-3 py-2 bg-transparent border rounded-lg form-input peer border-slate-300 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" type="date">
                </span>
            </label>
        </div>
        <div class="">
            <label class="block">
                <span>Data de Fim</span>
                <span class="relative mt-1.5 flex">
                    <input wire:model.debounce.500ms="filtro_fim" class="w-full px-3 py-2 bg-transparent border rounded-lg form-input peer border-slate-300 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" type="date">
                </span>
            </label>
        </div>
        <div class="">
            <label class="block">
                <span>Assessor</span>
                <span class="relative mt-1.5 flex">
                    <select wire:model="filtro_assessor" class="px-3 py-2 bg-white border rounded-lg form-input peer border-slate-300 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent">
                        <option value="" selected>Todos</option>
                        @foreach(\App\Models\Assessor::orderBy("nome", "ASC")->get() as $assessor)
                            <option value="{{ $assessor->id }}">{{ $assessor->nome }}</option>
                        @endforeach
                    </select>
                </span>
            </label>
        </div>
    </div>
    <div class="min-w-full overflow-x-auto is-scrollbar-hidden" x-data="pages.tables.initExample1">
        <table class="w-full text-left">
            <thead>
                <tr>
                    <th
                        class="px-4 py-3 font-semibold uppercase rounded-tl-lg whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                        <i class="fas fa-file fa-lg"></i>
                    </th>
                    <th
                        class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                        Cod.
                    </th>
                    <th
                        class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                        Cliente, Assessor
                    </th>
                    <th
                        class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                        Entrada (R$)
                    </th>
                    <th
                        class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                        Desc. (%)
                    </th>
                    <th
                        class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                        Desc. Extra (R$)
                    </th>
                    <th
                        class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                        Total (R$)
                    </th>
                    <th
                        class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                        Status
                    </th>
                    <th
                        class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                        Data
                    </th>
                    <th
                        class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                        Aprov.
                    </th>
                    <th
                        class="px-4 py-3 font-semibold uppercase rounded-tr-lg whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                        Ações
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vendas as $venda)

                    {{-- ================================================================= --}}



                    <tr @if(!$venda->aprovada) style="background-color: rgba(255,0,0,0.2)" @else style="background-color: rgba(0,255,0,0.2);" @endif class="border-transparent border-y border-b-slate-200 dark:border-b-navy-500">
                        <td class="px-4 py-3 whitespace-nowrap sm:px-5">
                            @if($venda->comprovante)
                                <a href="{{ asset($venda->comprovante) }}" target="_blank"><i class="fas fa-download fa-lg cpointer text-soft"></i></a>
                            @else
                                -
                            @endif
                        </td>
                        <td class="px-4 py-3 whitespace-nowrap sm:px-5">#{{ $venda->codigo }}</td>
                        <td class="px-3 py-3 font-medium whitespace-nowrap text-slate-700 dark:text-navy-100 lg:px-5">
                            <a href="{{ route('sistema.clientes.detalhes', ['cliente' => $venda->cliente_id]) }}">{{ $venda->cliente->nome_dono }}</a>
                            @if($venda->assessor_id)
                                <p style="font-size: 11px;">{{ $venda->assessor->nome }}</p>
                            @endif
                        </td>
                        <td class="px-4 py-3 whitespace-nowrap sm:px-5">
                            <input type="number" class="px-3 py-2 bg-white border rounded-lg form-input peer border-slate-300 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" value="{{ number_format($venda->entrada, 2) }}" onchange="Livewire.emit('atualizaValor', {{ $venda->id }}, 'entrada', this.value)">
                        </td>
                        <td class="px-4 py-3 whitespace-nowrap sm:px-5">
                            <input type="number" class="px-3 py-2 bg-white border rounded-lg form-input peer border-slate-300 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" value="{{ $venda->porcentagem_desconto }}" onchange="Livewire.emit('atualizaValor', {{ $venda->id }}, 'porcentagem_desconto', this.value)">
                        </td>
                        <td class="px-4 py-3 whitespace-nowrap sm:px-5">
                            <input type="number" class="px-3 py-2 bg-white border rounded-lg form-input peer border-slate-300 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" value="{{ number_format($venda->desconto_extra, 2) }}" onchange="Livewire.emit('atualizaValor', {{ $venda->id }}, 'desconto_extra', this.value)">
                        </td>
                        <td class="px-4 py-3 whitespace-nowrap sm:px-5">
                            R${{number_format($venda->total, 2, ",", ".")}}
                        </td>
                        <td class="px-4 py-3 whitespace-nowrap sm:px-5">
                            <select class="px-3 py-2 bg-white border rounded-lg form-input peer border-slate-300 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" onchange="Livewire.emit('atualizaValor', {{ $venda->id }}, 'situacao', this.value)">
                                @foreach(config("globals.situacoes") as $key => $value)
                                    <option value="{{ $key }}" @if($venda->situacao == $key) selected @endif>{{ $value }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td class="px-4 py-3 whitespace-nowrap sm:px-5">
                            {{date("d/m/Y H:i:s", strtotime($venda->created_at))}}
                        </td>
                        <td class="px-4 py-3 whitespace-nowrap sm:px-5">
                            @if(!$venda->aprovada)
                                <a name="" id="" class="bg-green-600 btn" wire:click="aprovar({{ $venda->id }})" role="button">
                                    <i class="text-white fas fa-thumbs-up fa-sm"></i>
                                </a>
                            @else
                                <a name="" id="" class="bg-red-600 btn" wire:click="reprovar({{ $venda->id }})" role="button">
                                    <i class="text-white fas fa-thumbs-down fa-sm"></i>
                                </a>
                            @endif
                        </td>
                        <td class="px-4 py-3 whitespace-nowrap sm:px-5">
                            <div x-data="usePopper({ placement: 'bottom-start', offset: 4 })" @click.outside="if(isShowPopper) isShowPopper = false"
                                class="inline-flex">
                                <button
                                    class="flex items-center justify-center w-10 h-10 space-x-2 font-medium border rounded-md border-slate-400 bg-slate-150 text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80"
                                    x-ref="popperRef" @click="isShowPopper = !isShowPopper">
                                    <span><i class="fas fa-list"></i></span>
                                </button>
                                <div x-ref="popperRoot" class="popper-root" :class="isShowPopper && 'show'" wire:ignore.self>
                                    <div
                                        class="popper-box rounded-md border border-slate-150 bg-white py-1.5 font-inter dark:border-navy-500 dark:bg-navy-700">
                                        <ul>
                                            <li @click="isShowPopper = false">
                                                <a href="{{route('sistema.vendas.detalhes', ['venda' => $venda])}}"
                                                    class="flex items-center h-8 px-3 pr-12 font-medium tracking-wide transition-all outline-none cursor-pointer hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Detalhes</a>
                                            </li>
                                        </ul>
                                        <div class="h-px my-1 bg-slate-150 dark:bg-navy-500"></div>
                                        <ul>
                                            <li @click="isShowPopper = false">
                                                <a wire:click="excluirVenda({{ $venda->id }})"
                                                    class="flex items-center h-8 px-3 pr-12 font-medium tracking-wide text-red-600 transition-all outline-none cursor-pointer hover:bg-red-400 hover:text-white focus:bg-red-600 focus:text-white dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Excluir Venda</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="flex flex-col justify-between px-4 py-4 space-y-4 sm:flex-row sm:items-center sm:space-y-0 sm:px-5">
        <div class="flex items-center space-x-2 text-xs+">
            <span>Mostrar</span>
            <label class="block">
                <select
                    class="px-2 py-1 pr-6 bg-white border rounded-full form-select border-slate-300 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent"
                    wire:model="quantidade_exibicao">
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="30">30</option>
                    <option value="50">50</option>
                </select>
            </label>
            <span> entradas</span>
        </div>

        {{ $vendas->links() }}
    </div>
    <x-loading></x-loading>
</div>