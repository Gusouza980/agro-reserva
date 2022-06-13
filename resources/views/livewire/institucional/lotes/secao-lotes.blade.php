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
    <div class="grid grid-cols-1 gap-x-7 gap-y-14 px-4 mx-auto mt-[80px] md:px-0 lg:px-0 px-md-0 md:grid-cols-3 lg:grid-cols-4 w1400">
        @foreach($lotes as $lote)
            <div class="transition duration-500 hover:scale-105 hover:shadow-md group hover:z-20">
                <div class="relative">
                    <div class="absolute flex justify-content-center h-[35px] top-[-25px] px-2 pt-1 z-0 rounded-t-[12px] bg-slate-500 text-white" style="font-family: 'Montserrat', sans-serif;">
                        <small class="font-medium text-[15px]">LOTE: {{ str_pad($lote->numero, 3, "0", STR_PAD_LEFT) }}</small>
                    </div>
                    <img src="{{ asset($lote->preview) }}" class="w-full relative z-10" style="border-top-left-radius: 15px; border-top-right-radius: 15px;" alt="">
                </div>
                
                <div class="py-2 text-center">
                    <h4 class="text-[#626262] font-semibold" style="font-family: 'Montserrat', sans-serif; font-size: 20px;">{{ $lote->nome }}</h4>
                    <div class="px-2 mx-auto rounded-md w-fit">
                        <span class="ml-3 text-[#626262] font-medium text-[15px]">RGD: {{ $lote->registro }}</span>
                    </div>
                </div>
                <div class="py-3">
                    <div class="bg-slate-100 rounded-md px-3 py-3 text-[#626262]" style="font-family: 'Montserrat', sans-serif;">
                        @if($lote->gpta)
                            <div class="">
                                <b>GPTA:.</b> <span class="font-medium ml-2">{{ $lote->gpta }}</span>
                            </div>
                        @endif
                        @if($lote->nascimento)
                        <div class="">
                            <b>NASCIMENTO:.</b> <span class="font-medium ml-2">{{ date("d/m/Y", strtotime($lote->nascimento)) }}</span>
                        </div>
                        @endif
                        <div class="">
                            <b>RAÇA:.</b> <span class="font-medium ml-2">{{ mb_strtoupper($lote->raca->nome, 'UTF-8') }}</span>
                        </div>
                        <div class="">
                            <b>SEXO:.</b> <span class="font-medium ml-2">{{ mb_strtoupper($lote->sexo, 'UTF-8') }}</span>
                        </div>
                    </div>
                </div>
                <div class="mais-info hidden shadow-md transition duration-800 group-hover:flex flex-col justify-content-center align-items-center h-[100px] absolute bottom-[-100px] left-0 w-full bg-white">
                    <div class="text-center w-full z-20">
                        <span class="text-[#626262] font-semibold" style="font-family: 'Montserrat', sans-serif; font-size: 20px;">R${{ number_format($lote->preco, 2, ",", ".") }} em até {{ $lote->parcelas }}x</span>
                    </div>
                    <div class="grid grid-cols-2 gap-3 mt-3 w-full">
                        <button class="border border-[#80828B] text-[#80828B] py-2 w-full font-medium rounded-[30px]">Saiba Mais</button>
                        <button class="border border-[#14C656] bg-[#14C656] text-white py-2 w-full font-semibold rounded-[30px]">Comprar</button>
                    </div>
                </div>
                
                {{-- <div class="py-2 cursor-pointer text-center text-[15px] hover:font-bold @if(!$lote->reservado) bg-orange-500 hover:bg-orange-600 @else bg-green-600 hover:bg-green-700 @endif" style="font-family: Montserrat;">
                    <a href="" class="text-white hover:text-white focus:text-white focus-within:text-white active:text-white visited:text-white">Ver lote</a>
                </div> --}}
            </div>
            {{-- <div class="transition duration-500 border-t-2 @if(!$lote->reservado) border-transparent @else border-green-600 @endif shadow-md border-x-2 hover:scale-105">
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
            </div> --}}
        @endforeach
    </div>    
</div>

@push("styles")

<style>
    /* .caixa-lote .mais-info{
        display: none;
        transition: 1s;
    }

    .caixa-lote:hover .mais-info{
        display: block;
    } */
</style>

@endpush