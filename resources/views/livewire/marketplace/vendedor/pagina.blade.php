<div class="w-full">
    <x-marketplace.vendedor.navbar :vendedor="$vendedor->id" :exibicao="$exibicao"></x-marketplace.vendedor.navbar>
    <div class="w-full px-2 px-md-5 md:px-5 py-5">
        <div class="relative w-full text-center">
            <div class="text-[28px] text-gray-600 font-medium font-montserrat">
                @switch($exibicao)
                    @case('produtos')
                        @switch($filtro_produtos)
                            @case('novidades')
                                NOVIDADES
                                @break
                            @case('alta')
                                EM ALTA
                                @break
                            @case('todos')
                                TODOS OS PRODUTOS
                                @break
                            @default
                                {{ \App\Models\MarketplaceCategoria::find($filtro_produtos)->nome }}
                        @endswitch
                        @break
                    @case('sobre')
                        SOBRE A EMPRESA
                        @break
                    @case('localizacao')
                        LOCALIZAÇÃO DA EMPRESA
                        @break
                    @default
                        DEFAULT
                @endswitch
            </div>
            <div class="hidden md:block md:absolute left-0 top-2">
                <x-botoes.voltar :rota="route('index')"></x-botoes.voltar>
            </div>
        </div>
        <div class="flex justify-start relative w-full md:space-x-10 min-h-[60vh]">
            <x-marketplace.vendedor.menu-lateral :vendedor="$vendedor->id" :exibicao="$exibicao" :filtro="$filtro_produtos"></x-marketplace.vendedor.menu-lateral>
            @switch($exibicao)
                @case('produtos')
                    <x-marketplace.vendedor.produtos :produtos="$vendedor->produtos" :exibicao="$exibicao"></x-marketplace.vendedor.produtos>
                    @break
                @case('sobre')
                    SOBRE
                    @break
                @case('localizacao')
                    LOCALIZACAO
                    @break
            @endswitch
        </div>
    </div>
    <x-loading></x-loading>
</div>