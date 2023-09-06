<div class="w-full px-5 py-5">
    <div class="w-full flex mb-4">
        <div class="w-full md:w-1/5">
            <label class="block">
                <span>Pesquisar por nome, email ou código</span>
                <span class="relative mt-1.5 flex">
                    <input wire:model.debounce.1000ms="filtro.texto" class="w-full px-3 py-2 bg-transparent border rounded-lg form-input peer border-slate-300 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" placeholder="Digite sua busca" type="text">
                </span>
            </label>
        </div>
    </div>
    <div class="min-w-full overflow-x-auto is-scrollbar-hidden">
        <table class="w-full text-left is-hoverable">
            <thead>
                <tr>
                    <th
                        class="px-4 py-3 font-semibold uppercase rounded-tl-lg whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                        #
                    </th>
                    <th
                        class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                        Data de Cad.
                    </th>
                    <th
                        class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                        Nome
                    </th>
                    <th
                        class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                        CPF/CNPJ
                    </th>
                    <th
                        class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                        Aprovação
                    </th>
                    <th
                        class="px-4 py-3 font-semibold uppercase rounded-tr-lg whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                        Tel/Whats
                    </th>
                    <th
                        class="px-4 py-3 font-semibold uppercase rounded-tr-lg whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                        <i class="fas fa-gear"></i>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clientes as $cliente)
                    <tr class="border-transparent border-y border-b-slate-200 dark:border-b-navy-500">
                        <td class="px-4 py-3 whitespace-nowrap sm:px-5">#{{ $cliente->id }}</td>
                        <td class="px-3 py-3 font-medium whitespace-nowrap text-slate-700 dark:text-navy-100 lg:px-5">
                            {{ date("d/m/Y H:i:s", strtotime($cliente->created_at)) }}
                        </td>
                        <td class="px-3 py-3 font-medium whitespace-nowrap text-slate-700 dark:text-navy-100 lg:px-5">
                            {{ $cliente->nome_dono }}
                        </td>
                        <td class="px-4 py-3 whitespace-nowrap sm:px-5">
                            @if($cliente->cpf && $cliente->cnpj)
                                <b>CPF:</b> {{$cliente->cpf}} / <b>CNPJ:</b> {{$cliente->cnpj}}
                            @elseif($cliente->cpf)
                                <b>CPF:</b> {{$cliente->cpf}}
                            @elseif($cliente->cnpj)
                                <b>CNPJ:</b> {{$cliente->cnpj}}
                            @else
                                -
                            @endif
                        </td>
                        <td class="px-4 py-3 whitespace-nowrap sm:px-5">
                            @if($cliente->aprovado == 0)
                                <span>Em Análise</span>
                            @elseif($cliente->aprovado == -1)
                                <span style="color: red;">Reprovado</span>
                            @else
                                <span style="color: green;">Aprovado</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 whitespace-nowrap sm:px-5">
                            @if($cliente->whatsapp && $cliente->telefone)
                                {{$cliente->whatsapp}} / {{$cliente->telefone}}
                            @elseif($cliente->whatsapp)
                                {{$cliente->whatsapp}}
                            @else
                                {{$cliente->telefone}}
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
                                                <a href="{{ route('sistema.clientes.detalhes', ['cliente' => $cliente->id]) }}"
                                                    class="flex items-center h-8 px-3 pr-12 font-medium tracking-wide transition-all outline-none cursor-pointer hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Visualizar</a>
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
                    <option value="100">100</option>
                    <option value="1000">1000</option>
                </select>
            </label>
            <span> entradas</span>
        </div>

        {{ $clientes->links() }}
    </div>
    <x-loading></x-loading>
</div>
