<div class="w-[250px] shadow-md border border-solid border-[#626262] pt-4 px-3 hover:scale-105 transition duration-300">
    <div class="w-full max-h-[200px] overflow-y-hidden cursor-pointer" onclick="window.location.href = '{{ route('marketplace.produto', ['slug' => $produto->vendedor->slug, 'produto' => $produto->id]) }}'">
        <img src="{{ asset($produto->preview->caminho) }}" class="w-full" alt="">
    </div>
    <div class="w-full">
        <div class="">
            <h5 class="mt-3 font-medium text-[#626262] font-montserrat cursor-pointer hover:text-orange-500" onclick="window.location.href = '{{ route('marketplace.produto', ['slug' => $produto->vendedor->slug, 'produto' => $produto->id]) }}'">{{ $produto->nome }}</h5>
        </div>
        <div class="w-full">
            <span class="font-medium text-slate-400 font-montserrat text-[13px] line-through">R$ {{ number_format($produto->valor, 2, ",", ".") }}</span>
        </div>
        <div class="flex items-center">
            <span class="font-medium text-black font-montserrat text-[24px]">R$ {{ number_format($produto->valor, 2, ",", ".") }}</span>
            <span class="font-medium text-[#00a650] ml-2 text-[13px]">30% OFF</span>
        </div>
        <hr class="my-1">
        <div class="flex items-center justify-between w-full mt-2 text-[#626262]">
            <div class="text-[14px]">
                <i class="text-yellow-500 fa-solid fa-star"></i>
                <i class="text-yellow-500 fa-solid fa-star"></i>
                <i class="text-yellow-500 fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
            </div>
            <div class="text-[16px]">
                <i class="transition duration-300 fa-solid fa-heart hover:text-red-600 hover:scale-105" title="Lista de Desejos"></i>
                <i class="ml-3 fa-solid fa-cart-plus" title="Adicionar ao Carrinho"></i>
            </div>
        </div>
    </div>
</div>