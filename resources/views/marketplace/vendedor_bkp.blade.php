@extends('template.main2')

@section('conteudo')

    <div class="px-6 py-6 mx-auto my-6 bg-white rounded-lg shadow-md w1200">
        <div class="grid w-full grid-cols-1 md:grid-cols-3">
            <div class="bg-[#80828B] py-3 px-3 flex items-center">
                <div class="w-[100px] h-[100px] rounded-full border-4 border-solid border-[#F3B248]" style="background-image: url({{ asset($vendedor->logo) }}); background-size: cover; background-position: center;">
                </div>
                <div class="px-3 py-3 text-white grow">
                    <h5 class="font-montserrat font-bold text-[18px]">{{ $vendedor->nome }}</h5>
                    <span class="text-[14px] font-montserrat">Último login à 30 minutos</span>
                    <div class="flex w-full mt-2">
                        <div>
                            <a class="cursor-pointer bg-[#F3B248] text-white w-full px-3 rounded-md py-[3px] text-[14px]"><i class="fa-solid fa-plus mr-[5px]"></i> Seguir</a>
                        </div>
                        <div class="ml-[5px]">
                            <a class="cursor-pointer bg-[#F3B248] text-white w-full px-3 rounded-md py-[3px] text-[14px]"><i class="fa-brands fa-rocketchat mr-[5px]"></i> Chat</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="px-5 py-3 flex-column items-between">
                <div>
                    <span class="text-[15px] text-[#626262] font-medium"><i class="fa-solid fa-store mr-[5px]"></i> Produtos:</span><span class="text-[#EE682A] text-[15px] font-bold ml-2">{{ $vendedor->produtos->count() }}</span>
                </div>
                <div class="my-[15px]">
                    <span class="text-[15px] text-[#626262] font-medium"><i class="fa-solid fa-user-plus mr-[5px]"></i> Seguidores:</span><span class="text-[#EE682A] text-[15px] font-bold ml-2">200</span>
                </div>
                <div>
                    <span class="text-[15px] text-[#626262] font-medium"><i class="fa-solid fa-money-bill mr-[5px]"></i> Vendas:</span><span class="text-[#EE682A] text-[15px] font-bold ml-2">120</span>
                </div>
            </div>
            <div class="px-5 py-3 flex-column items-between">
                <div>
                    <span class="text-[15px] text-[#626262] font-medium"><i class="fa-solid fa-star mr-[5px]"></i> Avaliação:</span><span class="text-[#EE682A] text-[15px] font-bold ml-2">4.8 (1000 avaliações)</span>
                </div>
                <div class="my-[15px]">
                    <span class="text-[15px] text-[#626262] font-medium"><i class="fa-solid fa-envelope mr-[5px]"></i> Email:</span><span class="text-[#EE682A] text-[15px] font-bold ml-2">{{ $vendedor->email }}</span>
                </div>
                <div>
                    <span class="text-[15px] text-[#626262] font-medium"><i class="fa-solid fa-phone mr-[5px]"></i> Telefone:</span><span class="text-[#EE682A] text-[15px] font-bold ml-2">{{ $vendedor->telefone }}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="px-6 py-6 mx-auto my-6 bg-white rounded-lg shadow-md w1200">
        <div class="w-full">
            <div class="w-full">
                <h5 class="text-[24px] text-[#EE682A] font-montserrat font-medium mb-3">Novidades</h5>
            </div>
            <div class="flex py-4 mx-auto overflow-x-scroll w1200 hide-scroll-bar">
                <div class="flex space-x-4 flex-nowrap">
                    @foreach($vendedor->produtos as $produto)
                        <x-marketplace.card-produto :produto="$produto"></x-marketplace.card-produto>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="px-6 py-6 mx-auto my-6 bg-white rounded-lg shadow-md w1200">
        <div class="w-full">
            <div class="w-full">
                <h5 class="text-[24px] text-[#EE682A] font-montserrat font-medium mb-3">Mais Vendidos</h5>
            </div>
            <div class="flex py-4 mx-auto overflow-x-scroll w1200 hide-scroll-bar">
                <div class="flex space-x-4 flex-nowrap">
                    @foreach($vendedor->produtos as $produto)
                        <x-marketplace.card-produto :produto="$produto"></x-marketplace.card-produto>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="px-6 py-6 mx-auto my-6 bg-white rounded-lg shadow-md w1200">
        <div class="w-full">
            <div class="w-full">
                <h5 class="text-[24px] text-[#EE682A] font-montserrat font-medium mb-3">Mais Bem Avaliados</h5>
            </div>
            <div class="flex py-4 mx-auto overflow-x-scroll w1200 hide-scroll-bar">
                <div class="flex space-x-4 flex-nowrap">
                    @foreach($vendedor->produtos as $produto)
                        <x-marketplace.card-produto :produto="$produto"></x-marketplace.card-produto>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection

@section("styles")
<style>
    .hide-scroll-bar {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }

    .hide-scroll-bar::-webkit-scrollbar {
        display: none;
    }
</style>
@endsection
