<div class="px-0 bg-[#F5F5F5] py-5">
    @if($view == 'mobile')
        <div class="fixed top-[30%] left-0 z-50 flex items-center" x-data="{open: false}">
            <div x-show="open" x-cloak class="max-w-[300px] bg-gray-200 py-3"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="w-0"
                x-transition:enter-end="w-full"
            >
                <div class="grid grid-cols-1 gap-4 px-3 mx-auto md:grid-cols-2 align-items-center w-full md:px-0">
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
                        <div class="flex flex-col mt-3 mt-md-0 md:mt-0 w-[calc(50%-5px)] md:w-auto">
                            <label for="" class="font-montserrat text-[12px] text-gray-400">Espécie</label>
                            <select name="" class="px-4 text-sm bg-white border border-gray-400 border-solid placeholder:text-gray-400 h-9 rounded-3xl focus:outline-none focus:ring-gray-400 focus:border-gray-400" wire:model="filtro_especie">
                                <option value="-1">Todos</option>
                                <option value="0">Bovinos(as)</option>
                                <option value="1">Equinos(as)</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-gray-500 py-2 pl-2 pr-3 rounded-r-full" @click="open = !open;">
                <i class="fas fa-bars text-white"></i>
            </div>
        </div>
    @endif
    
    <div class="mx-auto w1200 mb-7">
        <x-botoes.voltar :rota="route('index')"></x-botoes.voltar>
    </div>

    @if($view == 'desktop')
        <div class="flex gap-4 px-3 mx-auto align-items-center w1200 md:px-0">
            <div class="relative flex flex-col w-full max-w-[400px] text-gray-400 mt-md-0">
                <label for="" class="font-montserrat text-[12px] text-gray-400">Pesquisar</label>
                <input class="w-full max-w-[400px] pl-3 pr-10 mx-auto text-sm bg-white border border-gray-400 border-solid placeholder:text-gray-400 h-9 rounded-3xl focus:outline-none focus:ring-gray-400 focus:border-gray-400"
                type="text" name="search" placeholder="Pesquise por nome, número do lote ou registro" wire:model.debounce.400ms="pesquisa_lote"></input>
                <i class="fas fa-search text-grey-400 absolute bottom-[10px] right-[10px]"></i>
            </div>
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
            <div class="flex flex-col mt-3 mt-md-0 md:mt-0 w-[calc(50%-5px)] md:w-auto">
                <label for="" class="font-montserrat text-[12px] text-gray-400">Espécie</label>
                <select name="" class="px-4 text-sm bg-white border border-gray-400 border-solid placeholder:text-gray-400 h-9 rounded-3xl focus:outline-none focus:ring-gray-400 focus:border-gray-400" wire:model="filtro_especie">
                    <option value="-1">Todos</option>
                    <option value="0">Bovinos(as)</option>
                    <option value="1">Equinos(as)</option>
                </select>
            </div>
        </div>
    @endif
    <div class="mx-auto w1200 mt-3 px-2">
        <div class="w-full flex items-center space-x-4 bg-green-500 px-2 py-2 rounded-md text-white">
            <div class="shrink-0 cursor-pointer bg-white flex items-center justify-center w-[30px] h-[30px] rounded-full" title="Declarar Interesse">
                <i class="text-green-500 fas fa-hand fa-xs"></i>
            </div>
            <span>
                Ao clicar nesse ícone você estará declarando interesse em um lote e nossa equipe comercial irá entrar em contato o mais rápido possível
            </span>
        </div>
    </div>
    <div class="w-full mt-3 text-center">
        <h3 class="font-montserrat font-medium text-[20px] text-[#757887]">
            @if($pagina_reservas_abertas)
                RESERVAS ABERTAS
            @elseif($pagina_navegue_por_racas)
                NAVEGUE POR RAÇAS
            @endif
        </h3>
    </div>
    @if(!$pagina_reservas_abertas && !$pagina_navegue_por_racas)
        @php
            $fazendas = $lotes->unique("fazenda_id")->pluck("fazenda_id")->toArray();
        @endphp

        @foreach($fazendas as $key => $fazenda_id)
            @php
                $fazenda = \App\Models\Fazenda::find($fazenda_id);
            @endphp
            @if($view == 'desktop')
                <div class="grid grid-cols-1 gap-x-7 gap-y-14 px-4 mx-auto mt-[60px] md:px-0 lg:px-0 px-md-0 md:grid-cols-3 lg:grid-cols-4 w1200">
                    
                    @if($reserva && !$reserva->multi_fazendas && $lotes->where("fazenda_id", $fazenda_id)->count() > 0)
                        <div class="px-5 py-5 flex flex-col @if($reserva->catalogo) justify-between @else justify-center @endif rounded-[15px] bg-white relative">
                            <div class="w-full">
                                @if($fazenda->logo_evento)
                                    <img class="w-full" src="{{ asset($fazenda->logo_evento) }}" alt="">
                                @else
                                    <img class="w-full" src="{{ asset($fazenda->logo) }}" alt="">
                                @endif
                            </div>
                            @if($reserva->catalogo)
                                <div class="w-full mt-6 grow flex items-end">
                                    <div class="w-full">
                                        <table class="text-lg w-full">
                                            <tbody>
                                                <tr class="hover:text-white duration-200 transition border border-slate-300 hover:border-transparent bg-white rounded-md hover:bg-orange-500">
                                                    <td class="px-3 py-2 text-center tracking-wider font-montserrat font-semibold"><a href="{{ asset($reserva->catalogo) }}" class="w-full h-full flex justify-center items-center"><i class="fa-solid fa-file-pdf mr-3 fa-lg"></i>Catálogo</a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endif
                    @foreach($lotes->where("fazenda_id", $fazenda_id) as $lote)
                        <x-institucional.lotes.card :lote="$lote"></x-institucional.lotes.card>
                    @endforeach
                </div>
            @else
                <div class="w-full pl-[10px]">
                    <div class="w1200 slide-lotes mt-10 py-10">
                        @if($reserva && !$reserva->multi_fazendas && $lotes->where("fazenda_id", $fazenda_id)->count() > 0)
                            <div class="w-[280px] shrink-0 flex flex-col items-between @if($reserva->catalogo) justify-between @else justify-center @endif transition duration-500 hover:scale-105 hover:shadow-md group hover:z-20 overflow-hidden rounded-[15px] px-6 py-3 bg-white relative">
                                <div class="w-full">
                                    <img class="w-full" src="{{ asset($fazenda->logo) }}" alt="">
                                </div>
                                @if($reserva->catalogo)
                                    <div class="w-full mt-6 grow flex items-end">
                                        <div class="w-full">
                                            <table class="text-lg w-full">
                                                <tbody>
                                                    <tr class="hover:text-white duration-200 transition border border-slate-300 hover:border-transparent bg-white rounded-md hover:bg-orange-500">
                                                        <td class="px-3 py-2 text-center tracking-wider font-montserrat font-semibold"><a href="{{ asset($reserva->catalogo) }}" class="w-full h-full flex justify-center items-center"><i class="fa-solid fa-file-pdf mr-3 fa-lg"></i>Catálogo</a></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endif
                        @foreach($lotes->where("fazenda_id", $fazenda_id) as $lote)
                            <x-institucional.lotes.card class="lote" :lote="$lote"></x-institucional.lotes.card>
                        @endforeach
                    </div>
                </div>
            @endif
        @endforeach
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
                        <button onclick="window.open('https://api.whatsapp.com/send?phone=5534996920202', '_blank')" class="border border-[#27C45B] bg-[#27C45B] hover:bg-[#1e9b48] text-[11px] text-white py-[10px] px-[17px] font-montserrat font-semibold rounded-[10px]">FALAR COM ASSESSOR</button>
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
                    <div onclick="window.open('https://api.whatsapp.com/send?phone=5534992754132', '_blank')" class="rounded-md overflow-hidden shadow-sm bg-branco transition duration-500 hover:scale-105 hover:bg-[#E8521B] hover:text-white cpointer">
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
    <x-loading></x-loading>
</div>

@push("styles")
<style>
    .slide-lotes{
        overflow-x: scroll;
        display: flex;
        flex-wrap: nowrap;
        gap: 30px;
        padding: 15px 0;
    }

    @media(max-width: 700px){
        .slide-lotes{
            padding: 40px 0px;
        }
    }

    ::-webkit-scrollbar {
        width: 6px;
        height: 6px;
    }

    ::-webkit-scrollbar-track {
        background: rgba(128, 128, 128, 0.418);
    }

    ::-webkit-scrollbar-thumb {
        border-radius: 15px;
        border: 3px solid #FFB02A;
        background: #FFB02A;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: #FFB02A;
    }


    .slide-lotes .lote{
        width: 300px;
        flex-shrink: 0;
        box-shadow: 0 0 10px rgba(168, 168, 168, 0.438);
    }
</style>
@endpush

@push("scripts")
    <script>
        function getAverageRGB(imgEl) {
            var blockSize = 5, // only visit every 5 pixels
                defaultRGB = {r:0,g:0,b:0}, // for non-supporting envs
                canvas = document.createElement('canvas'),
                context = canvas.getContext && canvas.getContext('2d'),
                data, width, height,
                i = -4,
                length,
                rgb = {r:0,g:0,b:0},
                count = 0;

            if (!context) {
                return defaultRGB;
            }

            height = canvas.height = imgEl.naturalHeight || imgEl.offsetHeight || imgEl.height;
            width = canvas.width = imgEl.naturalWidth || imgEl.offsetWidth || imgEl.width;

            context.drawImage(imgEl, 0, 0);

            try {
                data = context.getImageData(0, 0, width, height);
            } catch(e) {
                /* security error, img on diff domain */
                return defaultRGB;
            }

            length = data.data.length;

            while ( (i += blockSize * 4) < length ) {
                ++count;
                rgb.r += data.data[i];
                rgb.g += data.data[i+1];
                rgb.b += data.data[i+2];
            }

            // ~~ used to floor values
            rgb.r = ~~(rgb.r/count);
            rgb.g = ~~(rgb.g/count);
            rgb.b = ~~(rgb.b/count);

            return rgb;

            }
    </script>
@endpush