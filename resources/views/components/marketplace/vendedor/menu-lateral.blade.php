<div @if($agent->isMobile()) 
        x-data="{
            showFiltros: false,
            get isShowing() { return this.showFiltros},
            get isNotShowing() { return !this.showFiltros}
        }"
    @else
        x-data="{
            showFiltros: true,
            get isShowing() { return this.showFiltros},
            get isNotShowing() { return !this.showFiltros}
        }"
    @endif
    class="bg-[#F5F5F5] shadow-xl md:shadow-none w-full overflow-y-scroll md:overflow-auto md:w-[300px] max-h-[300px] md:max-h-full fixed md:relative top-[calc(50%-150px)] left-0"
>
    <div x-cloak x-show="isShowing" class="overflow-x-hidden mt-4 relative px-3 px-md-0 md:px-0">
        <i x-on:click="showFiltros = false" class="md:hidden fas fa-xmark text-gray-900 absolute top-5 right-5"></i>
        <div class="w-full">
            <h5 class="font-montserrat font-bold text-[18px] text-gray-700">{{ $vendedor->nome }}</h5>
        </div>
        <div class="w-full text-[13px] text-gray-400 font-montserrat mt-2">
            <i class="mr-2 fas fa-basket-shopping"></i> Loja Online
        </div>
        {{-- <div class="w-full mt-3 text-[15px] font-medium text-gray-700 font-montserrat">
            10 Resultados
        </div> --}}
        <hr class="mt-3">
        <div class="w-full mt-2">
            <div class="w-full">
                <div class="py-2 flex items-center justify-between w-full text-[16px] text-gray-700 font-medium font-montserrat">
                    <span onclick="@this.set('filtro_produtos', 'todos')"  class="cursor-pointer @if($exibicao == 'produtos' && $filtro == "todos") text-[#F5B01F] @endif ">Todos os Produtos</span>
                </div>
            </div>
            <hr class="my-2">
            <div class="w-full">
                <div class="py-2 flex items-center justify-between w-full text-[16px] text-gray-700 font-medium font-montserrat">
                    <span onclick="@this.set('filtro_produtos', 'novidades')"  class="cursor-pointer @if($exibicao == 'produtos' && $filtro == "novidades") text-[#F5B01F] @endif ">Novidades</span>
                </div>
            </div>
            <hr class="my-2">
            <div class="w-full">
                <div class="py-2 flex items-center justify-between w-full text-[16px] text-gray-700 font-medium font-montserrat">
                    <span onclick="@this.set('filtro_produtos', 'alta')"  class="cursor-pointer @if($exibicao == 'produtos' && $filtro == "alta") text-[#F5B01F] @endif ">Em alta <i class="fas fa-fire-flame-curved text-red-600 ml-2"></i></span>
                </div>
            </div>
            <hr class="my-2">
            @foreach($categorias as $categoria)
                <div class="w-full" x-cloak x-data="{ show: false }">
                    <div class="py-2 flex items-center justify-between w-full text-[16px] text-gray-700 font-medium font-montserrat">
                        <span>{{ $categoria->nome }}</span>
                        <template x-if="!show">
                            <span x-on:click="show = !show"><i class="cursor-pointer fas fa-chevron-down"></i></span>
                        </template>
                        <template x-if="show">
                            <span x-on:click="show = !show"><i class="cursor-pointer fas fa-chevron-up"></i></span>
                        </template>
                    </div>
                    <div x-show="show" class="w-full pl-6 text-[15px] text-gray-500 font-medium">
                        @foreach($categoria->subcategorias->whereIn("id", $subcategorias) as $subcategoria)
                            <p onclick="@this.set('filtro_produtos', {{ $subcategoria->id }})" class="cursor-pointer py-2 @if($exibicao == 'produtos' && $filtro == $subcategoria->id) text-[#F5B01F] @endif ">{{ $subcategoria->nome }}</p>
                        @endforeach
                    </div>
                </div>
                <hr class="my-2">
            @endforeach
        </div>
    </div>
    <div x-show="isNotShowing">
        <button x-on:click="showFiltros = true" class="top-[50%] left-0 fixed w-[40px] h-[40px] flex items-center justify-center bg-[#2E313C] text-slate-300">
            <i class="fab fa-sistrix fa-lg"></i>
        </button>
    </div>
</div>

