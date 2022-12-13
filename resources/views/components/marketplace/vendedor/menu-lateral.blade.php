<div class="w-[300px] mt-4">
    <div class="w-full">
        <h5 class="font-montserrat font-bold text-[18px] text-gray-700">Nome da empresa</h5>
    </div>
    <div class="w-full text-[13px] text-gray-400 font-montserrat mt-2">
        <i class="mr-2 fas fa-basket-shopping"></i> Loja Online
    </div>
    <div class="w-full mt-3 text-[15px] font-medium text-gray-700 font-montserrat">
        10 Resultados
    </div>
    <hr class="mt-3">
    <div class="w-full mt-3">
        <div class="w-full" x-cloak x-data="{ show: false }">
            <div class="py-2 flex items-center justify-between w-full text-[16px] text-gray-700 font-medium font-montserrat">
                <span>Categoria 1</span>
                <template x-if="!show">
                    <span x-on:click="show = !show"><i class="cursor-pointer fas fa-chevron-down"></i></span>
                </template>
                <template x-if="show">
                    <span x-on:click="show = !show"><i class="cursor-pointer fas fa-chevron-up"></i></span>
                </template>
            </div>
            <div x-show="show" class="w-full pl-6 text-[15px] text-gray-500 font-medium">
                <p class="py-2 cursor-pointer">Subcategoria</p>
                <p class="py-2 cursor-pointer">Subcategoria</p>
                <p class="py-2 cursor-pointer">Subcategoria</p>
            </div>
        </div>
        <hr class="my-2">
        <div class="w-full" x-cloak x-data="{ show: false }">
            <div class="py-2 flex items-center justify-between w-full text-[16px] text-gray-700 font-medium font-montserrat">
                <span>Categoria 2</span>
                <template x-if="!show">
                    <span x-on:click="show = !show"><i class="cursor-pointer fas fa-chevron-down"></i></span>
                </template>
                <template x-if="show">
                    <span x-on:click="show = !show"><i class="cursor-pointer fas fa-chevron-up"></i></span>
                </template>
            </div>
            <div x-show="show" class="w-full pl-6 text-[15px] text-gray-500 font-medium">
                <p class="py-2 cursor-pointer">Subcategoria</p>
            </div>
        </div>
    </div>
</div>
