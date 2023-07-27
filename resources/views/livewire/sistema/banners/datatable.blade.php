<div class="w-full">
    <div class="min-w-full overflow-x-auto is-scrollbar-hidden" x-data="pages.tables.initExample1">
        <table class="w-full text-left is-hoverable">
            <thead>
                <tr>
                    <th
                        class="px-4 py-3 font-semibold uppercase rounded-tl-lg whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                        Pos.
                    </th>
                    <th
                        class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                        Desk
                    </th>
                    <th
                        class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                        Mobile
                    </th>
                    <th
                        class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                        Descrição
                    </th>
                    <th
                        class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                        Link
                    </th>
                    <th
                        class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                        
                    </th>
                    <th
                        class="px-4 py-3 font-semibold uppercase rounded-tr-lg whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                        Ações
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($banners as $banner)
                    <tr class="border-transparent border-y border-b-slate-200 dark:border-b-navy-500">
                        <td class="px-4 py-3 whitespace-nowrap sm:px-5" width="50">#{{ $banner->prioridade }}</td>
                        <td class="px-4 py-3 whitespace-nowrap sm:px-5" width="250">
                            <label for="input_desk_{{ $banner->id }}" class="cursor-pointer">
                                <img src="{{ ($banner->caminho) ? asset($banner->caminho) : asset("imagens/sem-foto.jpg") }}" alt="" width="150">
                            </label>
                            <input id="input_desk_{{ $banner->id }}" style="display: none;" type="file" wire:model="arquivos_desk.{{ $banner->id }}" accept="image/*">
                        </td>
                        <td class="px-4 py-3 whitespace-nowrap sm:px-5" width="150">
                            <label for="input_mobile_{{ $banner->id }}" class="cursor-pointer">
                                <img src="{{ ($banner->caminho_mobile) ? asset($banner->caminho_mobile) : asset("imagens/sem-foto.jpg") }}" alt="" width="80">
                            </label>
                            <input id="input_mobile_{{ $banner->id }}" style="display: none;" type="file" wire:model="arquivos_mobile.{{ $banner->id }}" accept="image/*">
                        </td>
                        <td class="px-3 py-3 font-medium whitespace-nowrap text-slate-700 dark:text-navy-100 lg:px-5">
                            {{ $banner->descricao }}
                        </td>
                        <td class="px-4 py-3 whitespace-nowrap sm:px-5">
                            @if($banner->link)
                                <a href="{{ $banner->link }}" target="_blank" class="px-3 py-2 text-white bg-gray-600 rounded-lg">Visitar</a>
                            @endif
                        </td>
                        <td class="px-4 py-3 whitespace-nowrap sm:px-5">
                            @if($banner->prioridade > 1)
                                <button class="border-none bg-none" wire:click="subir({{ $banner->id }})"><i class="fas fa-circle-up fa-2x" style="color: rgba(0, 255, 0, 1);"></i></button>
                            @else
                                <button class="border-none bg-none" disabled><i class="fas fa-circle-up fa-2x" style="color: rgba(0, 255, 0, 0.4);"></i></button>
                            @endif

                            @if($banner->prioridade < $banners->count())
                                <button class="ml-2 border-none bg-none" wire:click="descer({{ $banner->id }})"><i class="fas fa-circle-down fa-2x" style="color: red;"></i></button>
                            @else
                                <button class="ml-2 border-none bg-none" disabled><i class="fas fa-circle-down fa-2x" style="color: rgba(255,0,0,0.4);"></i></button>
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
                                                <a onclick="Livewire.emit('carregaModalEdicaoBanner', {{ $banner->id }})"
                                                    class="flex items-center h-8 px-3 pr-12 font-medium tracking-wide transition-all outline-none cursor-pointer hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Editar</a>
                                            </li>
                                            <ul>
                                                <li @click="isShowPopper = false">
                                                    <a wire:click="solicitarExcluir({{ $banner->id }})"
                                                        class="flex items-center h-8 px-3 pr-12 font-medium tracking-wide text-red-600 transition-all outline-none cursor-pointer hover:bg-red-400 hover:text-white focus:bg-red-600 focus:text-white dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Excluir</a>
                                                </li>
                                            </ul>
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

        {{ $banners->links() }}
    </div>
    <x-loading></x-loading>
</div>
