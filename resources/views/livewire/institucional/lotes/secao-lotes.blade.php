<div class="px-0 bg-[#F5F5F5] py-5">
    <div class="grid grid-cols-1 gap-4 px-3 mx-auto md:grid-cols-2 align-items-center w1200 md:px-0">
        <div class="relative flex flex-col w-full mr-3 text-gray-400 mt-md-0">
            <label for="" class="font-montserrat text-[12px] text-gray-400">Pesquisar</label>
            <input class="w-full pl-3 pr-10 mx-auto text-sm bg-white border border-gray-400 border-solid placeholder:text-gray-400 h-9 rounded-3xl focus:outline-none focus:ring-gray-400 focus:border-gray-400"
              type="text" name="search" placeholder="Pesquise por nome, número do lote ou registro" wire:model.debounce.400ms="pesquisa_lote"></input>
            <i class="fas fa-search text-grey-400 absolute bottom-[10px] right-[10px]"></i>
        </div>
        <div class="flex flex-wrap w-full md:space-x-4 justify-between md:justify-start">
            <div class="flex flex-col mt-3 mt-md-0 md:mt-0 w-[calc(50%-5px)] md:w-auto">
                <label for="" class="font-montserrat text-[12px] text-gray-400">Disponibilidade</label>
                <select name="" class="text-sm bg-white border px-4 border-gray-400 border-solid placeholder:text-gray-400 h-9 rounded-3xl focus:outline-none focus:ring-gray-400 focus:border-gray-400" wire:model="filtro_disponibilidade">
                    <option value="-1"> Todos</option>
                    <option value="0"> Disponíveis</option>
                    <option value="1"> Vendidos</option>
                </select>
            </div>
            @if(!$pagina_raca)
                <div class="flex flex-col mt-3 mt-md-0 md:mt-0 w-[calc(50%-5px)] md:w-auto">
                    <label for="" class="font-montserrat text-[12px] text-gray-400">Raça</label>
                    <select name="" class="text-sm bg-white border px-4 border-gray-400 border-solid placeholder:text-gray-400 h-9 rounded-3xl focus:outline-none focus:ring-gray-400 focus:border-gray-400" wire:model="filtro_raca">
                        <option value="-1">Todas</option>
                        @foreach(\App\Models\Raca::orderBy("nome", "ASC")->get() as $raca)
                            <option value="{{ $raca->id }}">{{ $raca->nome }}</option>
                        @endforeach
                    </select>
                </div>
            @endif
            <div class="flex flex-col mt-3 mt-md-0 md:mt-0 w-[calc(50%-5px)] md:w-auto">
                <label for="" class="font-montserrat text-[12px] text-gray-400">Sexo</label>
                <select name="" class="text-sm bg-white border px-4 border-gray-400 border-solid placeholder:text-gray-400 h-9 rounded-3xl focus:outline-none focus:ring-gray-400 focus:border-gray-400" wire:model="filtro_sexo">
                    <option value="-1">Todos</option>
                    <option value="Fêmea">Fêmea</option>
                    <option value="Macho">Macho</option>
                </select>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-1 gap-x-7 gap-y-14 px-4 mx-auto mt-[80px] md:px-0 lg:px-0 px-md-0 md:grid-cols-3 lg:grid-cols-4 w1200">
        @if($reserva)
            <div class="transition duration-500 hover:scale-105 hover:shadow-md group hover:z-20 px-3 py-3 rounded-[15px] bg-white">
                <div class="w-full bg-black flex items-center justify-center h-full px-3">
                    <img src="{{ asset($reserva->fazenda->logo) }}" class="w-full" alt="">
                </div>
            </div>
        @endif
        @foreach($lotes as $lote)
            <div class="transition duration-500 hover:scale-105 hover:shadow-md group hover:z-20 px-3 py-3 rounded-[15px] bg-white">
                <div>
                    <div class="relative">
                        <div class="absolute flex justify-content-center h-[45px] top-[-30px] px-2 pt-1 z-0 rounded-t-[12px] bg-slate-500 text-white" style="font-family: 'Montserrat', sans-serif;">
                            <small class="font-medium text-[15px]">LOTE: {{ str_pad($lote->numero, 3, "0", STR_PAD_LEFT) }}</small>
                        </div>
                        <div class="w-full overflow-hidden bg-no-repeat bg-cover">
                            <img src="{{ asset($lote->preview) }}" class="relative z-10 w-full transition duration-300 hover:scale-110" style="border-top-left-radius: 15px; border-top-right-radius: 15px;" alt="">
                        </div>
                    </div>
                    
                    <div class="py-2 text-center">
                        <h4 class="text-[#626262] font-semibold" style="font-family: 'Montserrat', sans-serif; font-size: 16px;">{{ $lote->nome }}</h4>
                        <div class="px-2 mx-auto rounded-md w-fit">
                            <span class="ml-3 text-[#626262] font-medium text-[15px]">RGD: {{ $lote->registro }}</span>
                        </div>
                    </div>
                    <div class="mt-3 relative">
                        <div class="bg-slate-100 rounded-md px-3 py-3 text-[#626262] text-[13px]" style="font-family: 'Montserrat', sans-serif;">
                            @if($lote->nascimento)
                            <div class="">
                                <b>NASC:.</b> <span class="ml-2 font-medium">{{ date("d/m/Y", strtotime($lote->nascimento)) }}</span>
                            </div>
                            @endif
                            <div class="">
                                <b>RAÇA:.</b> <span class="ml-2 font-medium">{{ mb_strtoupper($lote->raca->nome, 'UTF-8') }}</span>
                            </div>
                            <div class="">
                                <b>SEXO:.</b> <span class="ml-2 font-medium">{{ mb_strtoupper($lote->sexo, 'UTF-8') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="rounded-b-[15px] px-3 pt-3 pb-4 mais-info md:hidden md:shadow-md transition duration-800 md:group-hover:flex flex-col justify-content-center align-items-center md:h-[100px] md:absolute md:bottom-[-90px] md:left-0 w-full bg-white">
                        <div class="z-20 w-full text-center">
                            <span class="text-[#626262] font-semibold" style="font-family: 'Montserrat', sans-serif; font-size: 16px;">R${{ number_format($lote->produto->preco, 2, ",", ".") }} em até {{ $lote->reserva->max_parcelas }}x</span>
                        </div>
                        <div class="grid w-full grid-cols-2 gap-3 mt-3">
                            <button onclick="window.location.href = '{{ route('fazenda.lote', ['fazenda' => $lote->fazenda, 'reserva' => $lote->reserva, 'lote' => $lote]) }}'" class="border-2 border-slate-300 hover:border-[#80828B] text-[#80828B] py-2 w-full font-medium rounded-[30px]">Saiba Mais</button>
                            <button onclick="Livewire.emit('adicionarProduto', {{ $lote->produto->id }})" class="border border-[#14C656] bg-[#14C656] hover:bg-[#0d8f3d] text-white py-2 w-full font-semibold rounded-[30px]">Comprar</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>    
    @if($lotes->count() == 0)
        <div class="w1200 mx-auto mb-5">
            <div class="alert alert-warning shadow-lg">
                <div>
                    @if(!$pagina_raca)
                        <span>Desculpe, não temos nenhum lote que corresponde a sua pesquisa!</span>
                    @else
                        <span>Desculpe, não temos nenhum lote dessa raça disponível no momento. Mas calma lá, que tal se você ajudasse a mudar isso ? Clique aqui e venda com a gente.</span>
                    @endif
                </div>
            </div>
        </div>
    @endif
    <hr class="mt-3">
</div>

@push("styles")

@endpush

@push("scripts")

@endpush