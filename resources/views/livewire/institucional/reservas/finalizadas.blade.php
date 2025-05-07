<div class="w-full py-5">
    <div class="w1200 mx-auto mb-7">
        <x-botoes.voltar :rota="route('index')"></x-botoes.voltar>
    </div>
    <div class="grid grid-cols-1 gap-4 px-3 mx-auto md:grid-cols-2 align-items-center w1200 md:px-0">
        <div class="relative flex flex-col w-full mr-3 text-gray-400 mt-md-0">
            <label for="" class="font-montserrat text-[12px] text-gray-400">Pesquisar</label>
            <input class="w-full pl-3 pr-10 mx-auto text-sm bg-white border border-gray-400 border-solid placeholder:text-gray-400 h-9 rounded-3xl focus:outline-none focus:ring-gray-400 focus:border-gray-400"
              type="text" name="search" placeholder="Pesquise pelo nome da fazenda" wire:model.debounc.500ms="filtro_fazenda"></input>
            <i class="fas fa-search text-grey-400 absolute bottom-[10px] right-[10px]"></i>
        </div>
        <div class="flex flex-wrap justify-start w-full max-w-[200px] md:justify-start">
            <label for="" class="font-montserrat text-[12px] text-gray-400">Data</label>
            <input class="w-full pl-3 pr-10 mx-auto text-sm bg-white border border-gray-400 border-solid placeholder:text-gray-400 h-9 rounded-3xl focus:outline-none focus:ring-gray-400 focus:border-gray-400"
            type="month" name="search" placeholder="Pesquise por nome, número do lote ou registro" wire:model.debounc.500ms="filtro_data"></input>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 mx-auto w1200 hide-scroll-bar gap-x-5 gap-y-10 my-20 px-6 lg:px-0">
        @foreach($reservas->sortByDesc("inicio") as $reserva)
            <div class="w-full" style="border-radius: 15px; position: relative; height: auto; background: black; overflow: hidden;">
                <img src="{{ asset($reserva->imagem_card) }}" class="w-full" alt="">
                <div class="d-flex align-items-center justify-content-center w-full" style="background: linear-gradient(0deg, rgba(0,0,0,1) 76%, rgba(0,0,0,0.36878501400560226) 100%); position: absolute; bottom: 0px; width: 100%; height: 80px; left: 0px;">
                    <div class="text-center">
                        @if($reserva->aberto)
                            <div class="">
                                <a href="{{ route('fazenda.lotes', ['fazenda' => $reserva->fazenda->slug, 'reserva' => $reserva->id]) }}" name="" id="" class="px-[30px] py-[10px] bg-[#E8521B] text-[#FFFFFF] rounded-[6px] transition duration-300 font-montserrat text-[17px] font-bold hover:text-white hover:bg-[#b83f13]" href="#" role="button">Ver Reserva</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <x-loading></x-loading>
</div>