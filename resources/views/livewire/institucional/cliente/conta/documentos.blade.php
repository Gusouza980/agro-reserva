<div x-cloak class="w-full">
    <ul class="space-y-1 font-inter font-medium" wire:loading.class="opacity-50">
        @foreach(config('clientes.tipos_documento') as $keyTipo => $tipo)
            <li x-data="{ expanded: false }">
                <div tabindex="0"
                    class="flex cursor-pointer items-center rounded px-2 py-1 tracking-wide text-slate-800 outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:text-navy-100 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">
                    <button @click="expanded = !expanded"
                        class="mr-1 h-5 w-5 rounded-lg p-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5 transition-transform"
                            :class="expanded && 'rotate-90'" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <svg xmlns="http://www.w3.org/2000/svg" class="mr-3 h-6 w-6 text-warning" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path d="M2 6a2 2 0 012-2h5l2 2h5a2 2 0 012 2v6a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"></path>
                    </svg>
                    <span>{{ $tipo }}</span>
                </div>
                <ul x-show="expanded" x-collapse class="pl-4">
                    @foreach($this->getDocumentosByTipo($keyTipo) as $keyDocumento => $documento)
                        <li>
                            <div tabindex="0"
                                class="flex cursor-pointer items-center rounded px-2 py-1 tracking-wide text-slate-800 outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:text-navy-100 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">
                                <div class="mr-1 flex h-5 w-5 items-center justify-center"></div>
                                <div class="w-full justify-between flex items-center">
                                    <a href="{{ asset($documento->caminho) }}" target="_blank" class="flex">
                                        <img src="{{ asset(getFileIcon($documento->caminho)) }}" width="20" alt="" class="mr-2">
                                        <span>{{ config('clientes.tipos_documento')[$keyTipo] }} {{ $keyDocumento }}</span>
                                    </a>
                                    <div>
                                        <button wire:click="deletar({{ $documento->id }})" class="w-5 h-5 hover:scale-105 transition duration-200 bg-red-500 rounded-md text-white flex items-center justify-center">
                                            <i class="fas fa-trash fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                    <li>
                        <div tabindex="0"
                            class="flex cursor-pointer items-center rounded px-2 py-1 tracking-wide text-slate-800 outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:text-navy-100 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">
                            <div class="mr-1 flex h-5 w-5 items-center justify-center"></div>
                            <label for="input_{{ $this->getDocumentoVariable($keyTipo) }}" class="w-full cursor-pointer flex text-slate-800 font-montserrat font-medium text-[15px]">
                                <button class="w-5 h-5 bg-emerald-500 flex items-center justify-center mr-2 rounded-md"><i class="fas fa-plus text-white fa-sm"></i></button>
                                <span>Adicionar novo documento</span>
                                <input type="file" name="" wire:model="novo_{{ $this->getDocumentoVariable($keyTipo) }}" id="input_{{ $this->getDocumentoVariable($keyTipo) }}" class="hidden">
                            </label>
                        </div>
                    </li>
                </ul>
            </li>
        @endforeach
    </ul>
</div>
