<div class="w-full">
    <div class="w-full">
        <div class="w-full flex justify-end">
            {{-- <a href="{{ route('sistema.lotes.importacao', ['reserva' => $reserva['id']]) }}"
                class="font-medium rounded-tl-lg text-white px-5 py-2 bg-green-600 hover:bg-green-800 cursor-pointer">
                <i class="fas fa-cow mr-2 fa-lg"></i>Importar Lotes
            </a> --}}
            <label for="planilha"
                class="font-medium rounded-tl-lg text-white px-5 py-2 bg-green-600 hover:bg-green-800 cursor-pointer">
                <i class="fas fa-cow mr-2 fa-lg"></i>Importar Lotes
            </label>
            <input type="file" name="" id="planilha" class="hidden" wire:model="planilha">
            <a href="{{ route('sistema.lotes.cadastro', ['reserva' => $reserva['id']]) }}"
                class="flex items-center justify-center font-medium text-white px-5 py-2 bg-blue-600 hover:bg-blue-800 cursor-pointer">
                <i class="fas fa-plus fa-lg mr-2"></i>Cadastrar Lote
            </a>
            <label class="font-medium rounded-tr-lg text-white px-5 py-2 bg-gray-600 hover:bg-gray-800 cursor-pointer"
                for="imagens">
                <i class="fas fa-image mr-2 fa-lg"></i>Importar Imagens
            </label>
            <input type="file" name="" id="imagens" class="hidden" wire:model="fotos" multiple>
        </div>
        <div class="card rounded-none min-w-full overflow-x-auto is-scrollbar-hidden" x-data="pages.tables.initExample1">
            <table class="w-full text-left is-hoverable" style="vertical-align: middle;">
                <thead>
                    <tr>
                        <th
                            class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                        </th>
                        <th
                            class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                            Nº</th>
                        <th
                            class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                            Nome</th>
                        <th
                            class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                            RGD</th>
                        <th
                            class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                            Preço</th>
                        <th
                            class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                            Vídeo</th>
                        <th
                            class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                            Reservado</th>
                        <th
                            class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                            Lib. Preço</th>
                        <th
                            class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                            Lib. Compra</th>
                        <th
                            class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                            Ativo</th>
                        <th
                            class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                            Visitas</th>
                        <th
                            class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lotes as $lote)
                        <tr class="border-transparent border-y border-b-slate-200 dark:border-b-navy-500">
                            <td class="px-4 py-3 whitespace-nowrap sm:px-5">
                                <label for="input_preview_{{ $lote['id'] }}" class="cursor-pointer">
                                    <img src="{{ \Util::getImagemOuPadrao($lote['preview']) }}" loading="lazy"
                                        alt="" width="80">
                                </label>
                                <input id="input_preview_{{ $lote['id'] }}" style="display: none;" type="file"
                                    wire:model="arquivos.{{ $lote['id'] }}" accept="image/*">
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap sm:px-5">{{ $lote['numero'] }}</td>
                            <td class="px-4 py-3 whitespace-nowrap sm:px-5">{{ $lote['nome'] }}</td>
                            <td class="px-4 py-3 whitespace-nowrap sm:px-5">{{ $lote['registro'] }}</td>
                            <td class="px-4 py-3 whitespace-nowrap sm:px-5 w-fit">
                                <input
                                    class="w-full px-3 py-2 bg-transparent border rounded-lg form-input peer border-slate-300 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                    onchange="Livewire.emit('atualizaValor', {{ $lote['id'] }}, 'preco', this.value)"
                                    value="{{ $lote['preco'] }}" />
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap sm:px-5 w-fit">
                                <input
                                    class="w-full px-3 py-2 bg-transparent border rounded-lg form-input peer border-slate-300 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                    onchange="Livewire.emit('atualizaValor', {{ $lote['id'] }}, 'video', this.value)"
                                    value="{{ $lote['video'] }}" />
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap sm:px-5">
                                <select
                                    class="w-full px-3 py-2 bg-transparent border rounded-lg form-input peer border-slate-300 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                    onchange="Livewire.emit('atualizaValor', {{ $lote['id'] }}, 'reservado', this.value)">
                                    <option value="1" @if ($lote['reservado']) selected @endif>Sim
                                    </option>
                                    <option value="0" @if (!$lote['reservado']) selected @endif>Não
                                    </option>
                                </select>
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap sm:px-5">
                                <select
                                    class="w-full px-3 py-2 bg-transparent border rounded-lg form-input peer border-slate-300 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                    onchange="Livewire.emit('atualizaValor', {{ $lote['id'] }}, 'liberar_preco', this.value)">
                                    <option value="1" @if ($lote['liberar_preco']) selected @endif>Sim
                                    </option>
                                    <option value="0" @if (!$lote['liberar_preco']) selected @endif>Não
                                    </option>
                                </select>
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap sm:px-5">
                                <select
                                    class="w-full px-3 py-2 bg-transparent border rounded-lg form-input peer border-slate-300 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                    onchange="Livewire.emit('atualizaValor', {{ $lote['id'] }}, 'liberar_compra', this.value)">
                                    <option value="1" @if ($lote['liberar_compra']) selected @endif>Sim
                                    </option>
                                    <option value="0" @if (!$lote['liberar_compra']) selected @endif>Não
                                    </option>
                                </select>
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap sm:px-5">
                                <select
                                    class="w-full px-3 py-2 bg-transparent border rounded-lg form-input peer border-slate-300 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                    onchange="Livewire.emit('atualizaValor', {{ $lote['id'] }}, 'ativo', this.value)">
                                    <option value="1" @if ($lote['ativo']) selected @endif>Sim
                                    </option>
                                    <option value="0" @if (!$lote['ativo']) selected @endif>Não
                                    </option>
                                </select>
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap sm:px-5">
                                <button class="font-medium text-white bg-gray-600 w-fit h-8 px-3 rounded-md"
                                    onclick="Livewire.emit('carregaModalVisitas', {{ $lote['id'] }})">
                                    {{ $lote['visitas'] }} <i class="fas fa-eye ml-2"></i>
                                </button>
                            </td>
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
                                            {{-- <ul>
                                                <li @click="isShowPopper = false">
                                                    <a
                                                        class="flex items-center h-8 px-3 pr-12 font-medium tracking-wide transition-all outline-none cursor-pointer hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Editar</a>
                                                </li>
                                            </ul>
                                            <div class="h-px my-1 bg-slate-150 dark:bg-navy-500"></div> --}}
                                            <ul>
                                                <li @click="isShowPopper = false">
                                                    <a wire:click="solicitarExcluir({{ $lote['id'] }})"
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
        </div>
    </div>
    <x-loading></x-loading>
</div>
