<div class="w-full">
    <div class="w-full card rounded-none">
        <div class="min-w-full overflow-x-auto is-scrollbar-hidden" x-data="pages.tables.initExample1">
            <table class="w-full text-left is-hoverable" style="vertical-align: middle;">
                <thead>
                    <tr>
                        <th
                            class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                            ID</th>
                        <th
                            class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                        </th>
                        <th
                            class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                            Catálogo</th>
                        <th
                            class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                            Nome</th>
                        <th
                            class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                            Início</th>
                        <th
                            class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                            Fim</th>
                        <th
                            class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                            Ativa</th>
                        <th
                            class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                            Aberta</th>
                        <th
                            class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                            Preços</th>
                        <th
                            class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                            Compras</th>
                        <th
                            class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                            Encerrada</th>
                        <th
                            class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                            Lotes</th>
                        <th
                            class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reservas as $reserva)
                        <tr class="border-transparent border-y border-b-slate-200 dark:border-b-navy-500">
                            <td class="px-4 py-3 whitespace-nowrap sm:px-5">#{{ $reserva->id }}</td>
                            <td class="px-4 py-3 whitespace-nowrap sm:px-5">
                                <label for="input_preview_{{ $reserva->id }}" class="cursor-pointer">
                                    <img src="{{ \Util::getImagemOuPadrao($reserva->imagem_card) }}" loading="lazy"
                                        width="80">
                                </label>
                                <input id="input_preview_{{ $reserva->id }}" style="display: none;" type="file"
                                    wire:model="arquivos.{{ $reserva->id }}" accept="image/*">
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap sm:px-5 text-center">
                                @if ($reserva->catalogo)
                                    <a href="{{ asset($reserva->catalogo) }}" target="_blank"
                                        class="rounded-lg py-2 px-3 bg-orange-600 text-white">Visualizar</a>
                                @else
                                    <div class="w-full" x-data="{
                                        subirCatalogo() {
                                            $refs.formCatalogo.submit();
                                        }
                                    }">
                                        <form x-ref="formCatalogo"
                                            action="{{ route('sistema.reservas.uploadCatalogo') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="reserva_id" value="{{ $reserva->id }}">
                                            <input id="inputCatalogo{{ $reserva->id }}" type="file"
                                                x-on:change="subirCatalogo()" class="hidden" name="catalogo">
                                            <label for="inputCatalogo{{ $reserva->id }}"
                                                class="bg-emerald-500 text-white py-2 px-3 rounded-md">Subir
                                                Catálogo</label>
                                        </form>
                                    </div>
                                @endif
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap sm:px-5">#{{ $reserva->fazenda->id }}
                                {{ $reserva->fazenda->nome_fazenda }}</td>
                            <td class="px-4 py-3 whitespace-nowrap sm:px-5">
                                {{ date('d/m/Y', strtotime($reserva->inicio)) }}</td>
                            <td class="px-4 py-3 whitespace-nowrap sm:px-5">
                                {{ date('d/m/Y', strtotime($reserva->fim)) }}</td>
                            <td class="px-4 py-3 whitespace-nowrap sm:px-5">
                                <select
                                    class="w-full px-3 py-2 bg-transparent border rounded-lg form-input peer border-slate-300 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                    onchange="Livewire.emit('atualizaValor', {{ $reserva->id }}, 'ativo', this.value)">
                                    <option value="1" @if ($reserva->ativo) selected @endif>Sim
                                    </option>
                                    <option value="0" @if (!$reserva->ativo) selected @endif>Não
                                    </option>
                                </select>
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap sm:px-5">
                                <select
                                    class="w-full px-3 py-2 bg-transparent border rounded-lg form-input peer border-slate-300 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                    onchange="Livewire.emit('atualizaValor', {{ $reserva->id }}, 'aberto', this.value)">
                                    <option value="1" @if ($reserva->aberto) selected @endif>Sim
                                    </option>
                                    <option value="0" @if (!$reserva->aberto) selected @endif>Não
                                    </option>
                                </select>
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap sm:px-5">
                                <select
                                    class="w-full px-3 py-2 bg-transparent border rounded-lg form-input peer border-slate-300 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                    onchange="Livewire.emit('atualizaValor', {{ $reserva->id }}, 'preco_disponivel', this.value)">
                                    <option value="1" @if ($reserva->preco_disponivel) selected @endif>Sim
                                    </option>
                                    <option value="0" @if (!$reserva->preco_disponivel) selected @endif>Não
                                    </option>
                                </select>
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap sm:px-5">
                                <select
                                    class="w-full px-3 py-2 bg-transparent border rounded-lg form-input peer border-slate-300 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                    onchange="Livewire.emit('atualizaValor', {{ $reserva->id }}, 'compra_disponivel', this.value)">
                                    <option value="1" @if ($reserva->compra_disponivel) selected @endif>Sim
                                    </option>
                                    <option value="0" @if (!$reserva->compra_disponivel) selected @endif>Não
                                    </option>
                                </select>
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap sm:px-5">
                                <select
                                    class="w-full px-3 py-2 bg-transparent border rounded-lg form-input peer border-slate-300 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                    onchange="Livewire.emit('atualizaValor', {{ $reserva->id }}, 'encerrada', this.value)">
                                    <option value="1" @if ($reserva->encerrada) selected @endif>Sim
                                    </option>
                                    <option value="0" @if (!$reserva->encerrada) selected @endif>Não
                                    </option>
                                </select>
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap sm:px-5">{{ $reserva->lotes->count() }}</td>
                            <td class="px-4 py-3 whitespace-nowrap sm:px-5">
                                <div x-data="usePopper({ placement: 'bottom-start', offset: 4 })" @click.outside="if(isShowPopper) isShowPopper = false"
                                    class="inline-flex">
                                    <button
                                        class="flex items-center justify-center w-10 h-10 space-x-2 font-medium border rounded-md border-slate-400 bg-slate-150 text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80"
                                        x-ref="popperRef" @click="isShowPopper = !isShowPopper">
                                        <span><i class="fas fa-list"></i></span>
                                    </button>
                                    <div x-ref="popperRoot" class="popper-root" :class="isShowPopper && 'show'"
                                        wire:ignore.self>
                                        <div
                                            class="popper-box rounded-md border border-slate-150 bg-white py-1.5 font-inter dark:border-navy-500 dark:bg-navy-700">
                                            <ul>
                                                <li @click="isShowPopper = false">
                                                    <a onclick="Livewire.emit('carregaModalEdicaoReserva', {{ $reserva->id }})"
                                                        class="flex items-center h-8 px-3 pr-12 font-medium tracking-wide transition-all outline-none cursor-pointer hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Editar
                                                        Reserva</a>
                                                </li>
                                            </ul>
                                            {{-- <ul>
                                                <li @click="isShowPopper = false">
                                                    <a onclick="Livewire.emit('carregaModalEdicaoUsuario', {{ $reserva->id }})"
                                                        class="flex items-center h-8 px-3 pr-12 font-medium tracking-wide transition-all outline-none cursor-pointer hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Editar Fazenda</a>
                                                </li>
                                            </ul> --}}
                                            <ul>
                                                <li @click="isShowPopper = false">
                                                    <a href="{{ route('sistema.lotes.consultar', ['reserva' => $reserva->id]) }}"
                                                        class="flex items-center h-8 px-3 pr-12 font-medium tracking-wide transition-all outline-none cursor-pointer hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Lotes</a>
                                                </li>
                                            </ul>
                                            <ul>
                                                <li @click="isShowPopper = false">
                                                    <a href="{{ route('painel.fazenda.reservas.relatorio', ['reserva' => $reserva]) }}"
                                                        class="flex items-center h-8 px-3 pr-12 font-medium tracking-wide transition-all outline-none cursor-pointer hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Relatório</a>
                                                </li>
                                            </ul>
                                            <div class="h-px my-1 bg-slate-150 dark:bg-navy-500"></div>
                                            <ul>
                                                <li @click="isShowPopper = false">
                                                    <a wire:click="solicitarExcluir({{ $reserva->id }})"
                                                        class="flex items-center h-8 px-3 pr-12 font-medium tracking-wide text-red-600 transition-all outline-none cursor-pointer hover:bg-red-400 hover:text-white focus:bg-red-600 focus:text-white dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Excluir</a>
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
            <div class="w-100 d-flex justify-content-center">
                {{ $reservas->links() }}
            </div>
        </div>
    </div>
    <x-loading></x-loading>
</div>
