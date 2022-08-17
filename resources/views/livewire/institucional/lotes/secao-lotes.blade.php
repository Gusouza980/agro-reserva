<div class="px-0 bg-[#F5F5F5] py-5">
    <div class="grid grid-cols-1 gap-4 px-3 mx-auto md:grid-cols-2 align-items-center w1200 md:px-0">
        <div class="relative flex flex-col w-full mr-3 text-gray-400 mt-md-0">
            <label for="" class="font-montserrat text-[12px] text-gray-400">Pesquisar</label>
            <input class="w-full pl-3 pr-10 mx-auto text-sm bg-white border border-gray-400 border-solid placeholder:text-gray-400 h-9 rounded-3xl focus:outline-none focus:ring-gray-400 focus:border-gray-400"
              type="text" name="search" placeholder="Pesquise por nome, número do lote ou registro" wire:model.debounce.400ms="pesquisa_lote"></input>
            <i class="fas fa-search text-grey-400 absolute bottom-[10px] right-[10px]"></i>
        </div>
        <div class="flex flex-wrap justify-between w-full md:space-x-4 md:justify-start">
            <div class="flex flex-col mt-3 mt-md-0 md:mt-0 w-[calc(50%-5px)] md:w-auto">
                <label for="" class="font-montserrat text-[12px] text-gray-400">Disponibilidade</label>
                <select name="" class="px-4 text-sm bg-white border border-gray-400 border-solid placeholder:text-gray-400 h-9 rounded-3xl focus:outline-none focus:ring-gray-400 focus:border-gray-400" wire:model="filtro_disponibilidade">
                    <option value="-1"> Todos</option>
                    <option value="0"> Disponíveis</option>
                    <option value="1"> Vendidos</option>
                </select>
            </div>
            @if(!$pagina_raca)
                <div class="flex flex-col mt-3 mt-md-0 md:mt-0 w-[calc(50%-5px)] md:w-auto">
                    <label for="" class="font-montserrat text-[12px] text-gray-400">Raça</label>
                    <select name="" class="px-4 text-sm bg-white border border-gray-400 border-solid placeholder:text-gray-400 h-9 rounded-3xl focus:outline-none focus:ring-gray-400 focus:border-gray-400" wire:model="filtro_raca">
                        <option value="-1">Todas</option>
                        @foreach(\App\Models\Raca::orderBy("nome", "ASC")->get() as $raca)
                            <option value="{{ $raca->id }}">{{ $raca->nome }}</option>
                        @endforeach
                    </select>
                </div>
            @endif
            <div class="flex flex-col mt-3 mt-md-0 md:mt-0 w-[calc(50%-5px)] md:w-auto">
                <label for="" class="font-montserrat text-[12px] text-gray-400">Sexo</label>
                <select name="" class="px-4 text-sm bg-white border border-gray-400 border-solid placeholder:text-gray-400 h-9 rounded-3xl focus:outline-none focus:ring-gray-400 focus:border-gray-400" wire:model="filtro_sexo">
                    <option value="-1">Todos</option>
                    <option value="Fêmea">Fêmea</option>
                    <option value="Macho">Macho</option>
                </select>
            </div>
        </div>
    </div>
    <div class="w-full mt-5 text-center">
        <h3 class="font-montserrat font-medium text-[20px] text-[#757887]">
            @if($pagina_reservas_abertas)
                RESERVAS ABERTAS
            @elseif($pagina_navegue_por_racas)
                NAVEGUE POR RAÇAS
            @endif
        </h3>
    </div>
    @if(!$pagina_reservas_abertas && !$pagina_navegue_por_racas)
        <div class="grid grid-cols-1 gap-x-7 gap-y-14 px-4 mx-auto mt-[80px] md:px-0 lg:px-0 px-md-0 md:grid-cols-3 lg:grid-cols-4 w1200">
            @if($reserva && $lotes->count() > 0)
                <div class="transition duration-500 hover:scale-105 hover:shadow-md group hover:z-20 overflow-hidden rounded-[15px] bg-white">
                    <div class="flex items-center justify-center w-full h-full bg-black">
                        <img src="{{ asset($reserva->imagem_card) }}" class="w-full" alt="">
                    </div>
                </div>
            @endif
            @foreach($lotes as $lote)
                <div class="transition duration-500 hover:scale-105 hover:shadow-md group hover:z-20 px-3 py-3 rounded-[15px] bg-white @if($lote->reservado) border-2 border-solid border-[#FFB02A] @endif">
                    <div>
                        <div class="relative">
                            <div class="absolute flex justify-content-center h-[45px] top-[-30px] px-2 pt-1 z-0 rounded-t-[12px] bg-slate-500 text-white" style="font-family: 'Montserrat', sans-serif;">
                                <small class="font-medium text-[15px]">LOTE: {{ str_pad($lote->numero, 3, "0", STR_PAD_LEFT) }}</small>
                            </div>
                            <div class="relative w-full overflow-hidden bg-no-repeat bg-cover">
                                <img src="{{ asset($lote->preview) }}" class="relative z-[8] w-full transition duration-300 hover:scale-110" style="border-top-left-radius: 15px; border-top-right-radius: 15px;" alt="">
                                @if($lote->reservado || $lote->reserva->encerrada)
                                    <div class="font-montserrat text-[29px] text-[#FFB02A] font-bold absolute top-0 left-0 z-[10] w-full h-full rounded-t-[15px] flex items-center justify-center" style="background-color: rgba(0,0,0,0.45)">
                                        @if($lote->reservado)
                                            VENDIDO
                                        @else
                                            ENCERRADO
                                        @endif
                                    </div>
                                @endif
                            </div>
                        </div>
                        
                        <div class="py-2 text-center">
                            <h4 class="text-[#626262] font-semibold" style="font-family: 'Montserrat', sans-serif; font-size: 16px;">{{ $lote->nome }}</h4>
                            <div class="px-2 mx-auto rounded-md w-fit">
                                <span class="ml-3 text-[#626262] font-medium text-[15px]">RGD: {{ $lote->registro }}</span>
                            </div>
                        </div>
                        <div class="relative mt-3">
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
                        <div class="@if($lote->reservado) md:border-l-2 md:border-b-2 md:border-r-2 border-[#FFB02A] md:left-[-2px] md:w-[calc(100%+4px)] @else md:left-0 w-full @endif rounded-b-[15px] px-3 pt-3 pb-4 mais-info md:hidden md:shadow-md transition duration-800 md:group-hover:flex flex-col justify-content-center align-items-center md:h-[100px] md:absolute md:bottom-[-90px]  bg-white ">
                            <div class="z-[11] w-full text-center">
                                <span class="text-[#626262] font-semibold" style="font-family: 'Montserrat', sans-serif; font-size: 16px;">R${{ number_format($lote->produto->preco, 2, ",", ".") }} em até {{ $lote->reserva->max_parcelas }}x</span>
                            </div>
                            <div class="grid w-full @if($lote->reservado || $lote->reserva->encerrada) grid-cols-1 @else grid-cols-2 @endif gap-3 mt-3">
                                <button onclick="window.location.href = '{{ route('fazenda.lote', ['fazenda' => $lote->fazenda, 'reserva' => $lote->reserva, 'lote' => $lote]) }}'" class="border-2 border-slate-300 hover:border-[#80828B] text-[#80828B] py-2 w-full font-medium rounded-[30px]">Saiba Mais</button>
                                @if(!$lote->reservado && !$lote->reserva->encerrada)
                                    <button onclick="Livewire.emit('adicionarProduto', {{ $lote->produto->id }})" class="border border-[#14C656] bg-[#14C656] hover:bg-[#0d8f3d] text-white py-2 w-full font-semibold rounded-[30px]">Comprar</button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @elseif($pagina_reservas_abertas)
        @foreach($reservas as $reserva)
            @php
                $lotes_reserva = $lotes->where('reserva_id', $reserva->id);
            @endphp
            @if($lotes_reserva->count() > 0)
                <div class="w-full" wire:key="reserva-{{ $reserva->id }}">
                    <x-institucional.header-reserva-lotes :reserva="$reserva"></x-institucional.header-reserva-lotes>
                </div>
                <div class="w-full" wire:key="lotes-{{ $reserva->id }}">
                    <x-institucional.slide-lotes-destaque :lotes="$lotes_reserva"></x-institucional.slide-lotes-destaque>
                </div>
            @endif
        @endforeach
    @else
    @foreach(\App\Models\Raca::all() as $raca)
        @php
            $lotes_racas = $lotes->where('raca_id', $raca->id);
        @endphp
        @if($lotes_racas->count() > 0)
            <div class="w-full mt-5 text-center">
                <h3 class="font-montserrat font-medium text-[16px] text-[#42444d]">{{ $raca->nome }}</h3>
            </div>
            <div class="w-full" wire:key="lotes-{{ $raca->id }}">
                <x-institucional.slide-lotes-destaque :lotes="$lotes_racas"></x-institucional.slide-lotes-destaque>
            </div>
        @endif
    @endforeach
    @endif
    @if($lotes->count() == 0)
        <div class="px-6 mx-auto my-5 w1200 md:px-0">
            <div class="flex flex-wrap items-center w-full md:flex-nowrap">
                <div class="flex justify-end w-full md:w-1/2 md:pr-6">
                    <img src="{{ asset('imagens/icone_fale_assessor.svg') }}" class="w-full md:w-[80%]" alt="">
                </div>
                <div class="w-full mt-6 md:w-1/2 md:pl-6 md:mt-0">
                    <h3 class="text-[#283646] font-bold font-montserrat text-[30px]">Fala meu amigo!</h3>
                    <div class="w-full md:w-[285px]">
                        <p class="mt-[10px] font-montserrat text-[14px] font-medium text-[#80828B]">
                            No momento não temos Reservas dessa Raça, para ficar sempre ligado nas novidades assine nossa Newsletter ou entre em contato com a gente. 
                        </p>
                    </div>
                    <div class="flex w-full md:space-x-4 mt-[40px]">
                        <button onclick="window.open('https://api.whatsapp.com/send?phone=5514981809051', '_blank')" class="border border-[#27C45B] bg-[#27C45B] hover:bg-[#1e9b48] text-[11px] text-white py-[10px] px-[17px] font-montserrat font-semibold rounded-[10px]">FALAR COM ASSESSOR</button>
                        <a href="#newsletter" class="cursor-pointer border-2 border-[#707070] text-[#1E2027] text-[11px] py-[10px] px-[17px] transition duration-300 font-montserrat font-semibold rounded-[10px] hover:bg-[#15171E] hover:!text-white">ASSINAR NEWSLETTER</a>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="w-full mt-[80px]">
        <div class="px-6 mx-auto w1200 md:px-0">
            <div class="flex flex-wrap items-center justify-center w-full md:flex-nowrap md:space-x-16">
                <div class="w-full max-w-[400px] flex justify-start md:justify-end mb-4 duration-1000 delay-300 animate-in slide-in-from-left">
                    <div class="max-w-[300px]">
                        <h3 class="font-montserrat text-[30px] font-bold text-[#283646]">
                            E você ? Vai ficar de fora ?
                        </h3>
                        <div class="mt-[16px] font-montserrat text-[14px] font-medium text-[#80828B]">
                            Te convidamos pra fazer parte deste movimento das grandes marcas que evoluem a pecuária do nosso Brasil!
                        </div>
                        <div class="mt-[16px] font-montserrat text-[11px] font-medium text-[#80828B]">
                            Clique ao lado e fale com o nosso diretor comercial!
                        </div>
                    </div>
                </div>
                <div class="w-full mb-4 duration-1000 delay-300 md:max-w-[550px] animate-in slide-in-from-right">
                    <div onclick="window.open('https://api.whatsapp.com/send?phone=5514981809051', '_blank')" class="rounded-md overflow-hidden shadow-sm bg-branco transition duration-500 hover:scale-105 hover:bg-[#E8521B] hover:text-white cpointer">
                        <div class="">
                            <img src="{{ asset('imagens/banner-vender.jpg') }}" style="max-width: 100%;" alt="">
                        </div>
                        <div class="py-2 text-center bg-inherit cpointer text-inherit" style="width: 100%; font-family: Montserrat; font-size: 18px;">
                            Quero Vender
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr class="mt-3">
</div>

@push("styles")

@endpush

@push("scripts")

@endpush