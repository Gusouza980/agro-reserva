<div class="w-full px-8">
    <div class="w-full">
        <label class="inline-flex items-center space-x-2">
            <input
              wire:model="exibir_arquivadas"
              class="form-checkbox is-basic h-5 w-5 rounded border-slate-400/70 checked:bg-slate-500 checked:border-slate-500 hover:border-slate-500 focus:border-slate-500 dark:border-navy-400 dark:checked:bg-navy-400"
              type="checkbox"
            />
            <p>Exibir Arquivados</p>
        </label>
    </div>
    <div class="w-full grid grid-cols-6 py-3">
        @foreach($demandas as $demanda)
            <div class="w-full border border-1 border-slate-200 rounded-lg">
                <div class="w-full {{ $this->getCorDemanda($demanda) }} text-white px-5 py-3 rounded-t-lg">
                    {{$demanda["titulo"]}} @if($demanda['previsao_entrega'] < date("Y-m-d")) - Prazo Vencido @endif
                </div>
                <div class="w-full px-5 py-3">
                    {{ $demanda["descricao"] }}
                </div>
                <div class="w-full py-2 px-5 border-t border-slate-200">
                    <b>Status: </b> @if($demanda['entrega']) Entregue @else Pendente @endif
                </div>
                <div class="w-full py-2 px-5 border-t border-slate-200">
                    <b>Previsão de Entrega: </b> {{ date('d/m/Y', strtotime($demanda['previsao_entrega'])) }}
                </div>
                <div class="w-full flex gap-x-4 justify-center border-t border-slate-200 py-3 px-5">
                    <button class="border-none bg-none" onclick="Livewire.emit('carregaModalDetalhesDemanda', {{ $demanda['id'] }})">
                        <i class="fas fa-eye cursor-pointer transition duration-200 hover:scale-105 text-blue-600"></i>
                    </button>
                    @if(!$demanda['entrega'])
                        <button class="border-none bg-none" onclick="Livewire.emit('carregaModalEdicaoDemanda', {{ $demanda['id'] }})">
                            <i class="fas fa-pen cursor-pointer transition duration-200 hover:scale-105" title="Editar"></i>
                        </button>
                    @endif
                    <button class="border-none bg-none" wire:click="excluirDemanda({{ $demanda['id'] }})">
                        <i class="fas fa-ban cursor-pointer transition duration-200 hover:scale-105 text-red-600" title="Excluir"></i>
                    </button>
                    @if(!$demanda['entrega'])
                        <button class="border-none bg-none" wire:click="confirmarEntregaDemanda({{ $demanda['id'] }})">
                            <i class="fas fa-check cursor-pointer transition duration-200 hover:scale-105 text-green-600"  title="Entregar"></i>
                        </button>
                    @endif
                    @if($demanda['entrega'])
                        <button class="border-none bg-none" wire:click="arquivar({{ $demanda['id'] }})">
                            <i class="fas fa-box-open cursor-pointer transition duration-200 hover:scale-105" title="Arquivar"></i>
                        </button>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
    <x-loading></x-loading>
</div>

