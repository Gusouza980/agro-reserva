<div class="w-full">
    <div class="w-full">
        <div class="w-full flex justify-end">
            <a href="{{ route('sistema.fazendas.cadastrar') }}"
               class="flex items-center transition duration-200 justify-center font-medium rounded-t-md text-white px-5 py-2 bg-green-600 hover:bg-green-800 cursor-pointer"
            >
                Nova Fazenda
            </a>
        </div>
        <div class="card rounded-none min-w-full overflow-x-auto is-scrollbar-hidden" x-data="pages.tables.initExample1">
            <table class="w-full text-left is-hoverable" style="vertical-align: middle;">
                <thead>
                    <tr>
                        <th class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 lg:px-5">#</th>
                        <th class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 lg:px-5 w-[200px]">
                            <i class="fas fa-image"></i> Logo
                        </th>
                        <th class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 lg:px-5">Nome</th>
                        <th class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 lg:px-5">Dono</th>
                        <th class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 lg:px-5">Qtd. Reservas</th>
                        <th class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 lg:px-5">Qtd. Lotes</th>
                        <th class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 lg:px-5">
                            <i class="fas fa-gear"></i>
                        </th>
                    </tr>
                </thead>
                <tbody>
                @foreach($fazendas as $fazenda)
                    <tr class="border-transparent border-y border-b-slate-200 dark:border-b-navy-500">
                        <td class="px-4 py-3 whitespace-nowrap sm:px-5">{{ $fazenda->id }}</td>
                        <td class="px-4 py-3 whitespace-nowrap sm:px-5 w-[100px]">
                            <label for="input_logo_{{ $fazenda->id }}" class="cursor-pointer">
                                <img src="{{ \Util::getImagemOuPadrao($fazenda->logo)}}" loading="lazy" class="w-[100px] rounded-md" alt="" width="100">
                            </label>
                            <input id="input_logo_{{ $fazenda->id }}" style="display: none;" type="file" wire:model="logos.{{ $fazenda->id }}" accept="image/*">
                        </td>
                        <td class="px-4 py-3 whitespace-wrap sm:px-5">
                            {{ $fazenda->nome_fazenda }}
                        </td>
                        <td class="px-4 py-3 whitespace-nowrap sm:px-5">{{ $fazenda->nome_dono }}</td>
                        <td class="px-4 py-3 whitespace-nowrap sm:px-5">
                            {{ $fazenda->reservas->count() }}
                        </td>
                        <td class="px-4 py-3 whitespace-nowrap sm:px-5">
                            {{ $fazenda->lotes->count() }}
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
                                                <a href="{{ route('sistema.fazendas.editar', ['fazenda' => $fazenda]) }}"
                                                   class="flex items-center h-8 px-3 pr-12 font-medium tracking-wide transition-all outline-none cursor-pointer hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Editar Notícia</a>
                                            </li>
                                        </ul>
                                        <ul>
                                            <li @click="isShowPopper = false">
                                                <a wire:click="solicitarExcluir({{ $fazenda->id }})"
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
        <div class="w-full flex justify-center mt-8">
            {{ $fazendas->links() }}
        </div>
    </div>
    <x-loading></x-loading>
</div>
