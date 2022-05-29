<div class="px-0">
    <div class="grid grid-cols-1 gap-4 px-3 mx-auto mt-5 md:grid-cols-2 align-items-center w1400 md:px-0">
        <div class="relative flex w-full mt-4 mr-3 text-gray-400 align-items-center mt-md-0">
            <input class="w-full pl-3 pr-10 mx-auto text-sm bg-white border border-gray-400 border-solid placeholder:text-gray-400 h-9 rounded-3xl focus:outline-none focus:ring-gray-400 focus:border-gray-400"
              type="text" name="search" placeholder="Pesquise por nome, número do lote ou registro" wire:model.debounce.400ms="pesquisa_lote"></input>
            <i class="fas fa-search text-grey-400 absolute right-[10px]"></i>
        </div>
        <div class="flex w-full justify-content-center justify-content-md-start">
            <div class="">
                <label class="inline-flex items-center mb-0 text-gray-400">
                    <input type="radio" class="mr-1 text-gray-400 border-gray-300 rounded shadow-sm form-radio focus:border-gray-400 focus:ring focus:ring-offset-0 focus:ring-gray-400 focus:ring-opacity-50" name="filtro_disponibilidade" wire:model="filtro_disponibilidade" value="-1" checked>
                    Todos
                </label>
            </div>
            <div class="ml-3">
                <label class="inline-flex items-center mb-0 text-gray-400">
                    <input type="radio" class="mr-1 text-gray-400 border-gray-300 rounded shadow-sm form-radio focus:border-gray-400 focus:ring focus:ring-offset-0 focus:ring-gray-400 focus:ring-opacity-50" name="filtro_disponibilidade" wire:model="filtro_disponibilidade" value="0" checked>
                    Disponíveis
                </label>
            </div>
            <div class="ml-3">
                <label class="inline-flex items-center mb-0 text-gray-400">
                    <input type="radio" class="mr-1 text-gray-400 border-gray-300 rounded shadow-sm form-radio focus:border-gray-400 focus:ring focus:ring-offset-0 focus:ring-gray-400 focus:ring-opacity-50" name="filtro_disponibilidade" wire:model="filtro_disponibilidade" value="1" checked>
                    Vendidos
                </label>
            </div>
        </div>
        
    </div>
    <div class="grid grid-cols-1 gap-5 px-4 mx-auto my-4 md:px-0 lg:px-0 px-md-0 md:grid-cols-3 lg:grid-cols-4 w1400">
        @foreach($lotes as $lote)
            <div class="transition duration-500 border-t-2 @if(!$lote->reservado) border-transparent @else border-green-600 @endif shadow-md border-x-2 hover:scale-105">
                <div class="relative">
                    <div class="absolute bottom-[-2px] left-[-1px] px-1 rounded-tr-md @if(!$lote->reservado) bg-[#F7F7F7] @else bg-green-600 text-white @endif">
                        <small class="font-bold text-[15px]">Lote {{ str_pad($lote->numero, 3, "0", STR_PAD_LEFT) }}</small>
                    </div>
                    <img src="{{ asset($lote->preview) }}" class="w-full" alt="">
                    @if($lote->reservado)
                        <div class="absolute bottom-[-1px] right-[-1px] px-1 text-white bg-green-600 rounded-tl-md">
                            <small class="font-bold text-[15px]">VENDIDO</small>
                        </div>
                    @endif
                </div>
                
                <div class="py-2 text-center @if(!$lote->reservado) bg-[#F7F7F7] @else bg-green-600 text-white @endif">
                    <div class="px-2 mx-auto rounded-md w-fit">
                        <small class="ml-3">RGD: {{ $lote->registro }}</small>
                    </div>
                    <h4 class="font-bold" style="font-family: Montserrat;">{{ $lote->nome }}</h4>
                    <div class="px-2 mx-auto rounded-md w-fit">
                    </div>
                </div>
                <div class="py-3">
                    <div class="px-3 hover:bg-slate-200">
                        <b>GPTA:.</b> {{ $lote->gpta }}
                    </div>
                    <div class="px-3 hover:bg-slate-200">
                        <b>NASCIMENTO:.</b> {{ date("d/m/Y", strtotime($lote->nascimento)) }}
                    </div>
                    <div class="px-3 hover:bg-slate-200">
                        <b>RAÇA:.</b> {{ mb_strtoupper($lote->raca->nome, 'UTF-8') }}
                    </div>
                    <div class="px-3 hover:bg-slate-200">
                        <b>SEXO:.</b> {{ mb_strtoupper($lote->sexo, 'UTF-8') }}
                    </div>
                </div>
                <div class="py-2 cursor-pointer text-center text-[15px] hover:font-bold @if(!$lote->reservado) bg-orange-500 hover:bg-orange-600 @else bg-green-600 hover:bg-green-700 @endif" style="font-family: Montserrat;">
                    <a href="" class="text-white hover:text-white focus:text-white focus-within:text-white active:text-white visited:text-white">Ver lote</a>
                </div>
            </div>
        @endforeach
    </div>    
</div>
