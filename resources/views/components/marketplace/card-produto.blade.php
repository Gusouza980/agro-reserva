<div class="w-full mx-auto max-w-[300px] shadow-md border border-solid border-[#626262] p-2 rounded-xl hover:scale-105 transition duration-300">
    <div class="w-full max-h-[200px] overflow-y-hidden cursor-pointer" onclick="window.location.href = '{{ route('marketplace.produto', ['slug' => $produto->vendedor->slug, 'produto' => $produto->id]) }}'">
        <img class="rounded-t-xl" src="{{ asset($produto->preview->caminho) }}" class="w-full" alt="">
    </div>
    <div class="w-full px-3">
        <div class="">
            <h5 class="mt-3 text-[13px] font-bold text-[#626262] font-montserrat cursor-pointer hover:text-orange-500" onclick="window.location.href = '{{ route('marketplace.produto', ['slug' => $produto->vendedor->slug, 'produto' => $produto->id]) }}'">{{ mb_strtoupper($produto->nome) }}</h5>
        </div>
        <div class="w-full mt-2 text-[11px] text-gray-500 font-montserrat font-medium">
            <span>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the </span>
        </div>
        {{-- <div class="w-full">
            <span class="font-medium text-slate-400 font-montserrat text-[13px] line-through">R$ {{ number_format($produto->valor, 2, ",", ".") }}</span>
        </div>
        <div class="flex items-center">
            <span class="font-medium text-black font-montserrat text-[24px]">R$ {{ number_format($produto->valor, 2, ",", ".") }}</span>
            <span class="font-medium text-[#00a650] ml-2 text-[13px]">30% OFF</span>
        </div> --}}
        <div class="w-full mt-2">
            <div class="text-[11px]">
                <i class="text-yellow-500 fa-solid fa-star"></i>
                <i class="text-yellow-500 fa-solid fa-star"></i>
                <i class="text-yellow-500 fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
            </div>
        </div>
        <div class="w-full mt-4">
            <button onclick="window.location.href = '{{ route('marketplace.produto', ['slug' => $produto->vendedor->slug, 'produto' => $produto->id]) }}'" class="w-full hover:bg-green-500 hover:text-white transition duration-200 border-2 font-bold font-montserrat rounded-[10px] py-2 border-green-500 text-green-500 text-[14px]">Saiba mais</button>
        </div>
        {{-- <hr class="my-1">
        <div class="flex items-center justify-between w-full mt-2 text-[#626262]">
            
            <div class="text-[16px]">
                <i class="transition duration-300 fa-solid fa-heart hover:text-red-600 hover:scale-105" title="Lista de Desejos"></i>
                <i class="ml-3 fa-solid fa-cart-plus" title="Adicionar ao Carrinho"></i>
            </div>
        </div> --}}
    </div>
</div>