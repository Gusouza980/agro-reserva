@extends('template.main2')

@section('conteudo')

<div class="w-ful">
    <div class="w-full bg-[#F5F5F5]">
        <div class="py-5 mx-auto w1200">
            <div class="hidden w-full md:block">
                <a href="{{ route('marketplace.vendedor', ['slug' => $produto->vendedor->slug, 'produto' => $produto->id]) }}"
                    class="text-[#283646] text-[18px] font-montserrat font-medium hover:text-[#E8521D] transition "><i
                        class="mr-2 fas fa-chevron-left"></i> Voltar</a>
            </div>
            <div class="flex flex-wrap w-full px-4 mt-4 md:px-0 px-md-0">
                <div class="order-2 w-full mt-5 mt-md-0 md:order-1 md:w-3/5 md:mt-0">
                    <div class="hidden w-full md:block">
                        <div class="w-full">
                            <img src="{{ asset($produto->preview->caminho) }}" class="w-full" alt="">
                        </div>
                        <div class="grid w-full grid-cols-1 mt-4 md:gap-5 md:grid-cols-3">
                            @foreach($produto->imagens as $imagem)
                                <div>
                                    <a class="popup_preview" href="{{ asset($imagem->caminho) }}">
                                        <img src="{{ asset($imagem->caminho) }}" class="w-full transition duration-150 rounded-md hover:scale-105" alt="">
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="w-full md:hidden">
                        <div class="flex mx-auto overflow-x-scroll w1200 hide-scroll-bar">
                            <div class="flex flex-nowrap">
                                <div class="inline-block mx-[6px] slide-item w-[340px]">
                                    <img src="{{ asset($produto->preview->caminho) }}" class="w-full" alt="">
                                </div>
                                @foreach($produto->imagens as $imagem)
                                    <div class="inline-block mx-[6px] slide-item w-[340px]">
                                        <img src="{{ asset($imagem->caminho) }}" class="w-full transition duration-150 rounded-md hover:scale-105" alt="">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="order-1 w-full md:order-2 md:w-2/5 md:pl-10">
                    <div class="flex items-center justify-between w-full">
                        <div>
                            <img src="{{ asset($produto->vendedor->logo) }}" class="w-full max-w-[150px] md:max-w-[200px] " alt="">
                        </div>
                        <div class="md:hidden">
                            <a href="" class="text-[#283646] text-[18px] font-montserrat font-medium hover:text-[#E8521D] transition "><i class="mr-2 fas fa-chevron-left"></i> Voltar</a>
                        </div>

                    </div>
                    <div class="w-full mt-[20px]">
                        <p class="font-montserrat text-[14px]">CÓDIGO: <b>{{ str_pad($produto->id, 6, '0', STR_PAD_LEFT) }}</b></p>
                        <h1 class="font-montserrat font-bold text-[28px] text-[#E8521D]">{{ $produto->nome }}</h1>
                    </div>
                    <div class="w-full mb-[20px]">
                        <div class="text-[14px]">
                            <i class="text-yellow-500 fa-solid fa-star"></i>
                            <i class="text-yellow-500 fa-solid fa-star"></i>
                            <i class="text-yellow-500 fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                    </div>
                    <div class="w-full">
                        <p>{!! $produto->resumo !!}</p>
                    </div>
                    <div class="w-full mt-[35px] font-montserrat flex items-center">
                        <span class="font-bold text-[33px]">R$
                            {{ number_format($produto->preco, 2, ',', '.') }}</span>
                        <span class="font-medium text-[25px] ml-2">à vista</span>
                    </div>
                    <div class="w-full font-montserrat text-[19px] font-medium">
                        <span>Ou <b>{{ $produto->parcelas }}x</b> de <b>R$
                                {{ number_format($produto->preco / $produto->parcelas, 2, ',', '.') }}</b></span>
                    </div>
                    <div class="w-full mt-[20px]">
                        <a
                            class="cpointer bg-[#14C656] text-white font-montserrat text-[18px] font-medium py-[12px] px-[60px] rounded-[15px]">Comprar</a>
                    </div>
                    <div class="w-full mt-[30px] text-slate-500 font-montserrat text-[14px]">
                        <p><i class="fa-solid fa-rotate-left mr-2 text-[#283646]"></i><span class="text-[#283646] font-bold">Devolução grátis</span>. Você tem 7 dias após o recebimento do produto</p>
                        <p><i class="fa-solid fa-shield mr-2 text-[#283646] mt-3"></i><span class="text-[#283646] font-bold">Compra garantida</span>. Receba o produto que está comprando ou devolveremos seu dinheiro</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="w-full">
        <div class="px-4 py-5 mx-auto text-center md:px-0 px-md-0 w1200">
            <h3 class="font-montserrat text-[25px] font-medium">Descrição</h3>
        </div>
        <div class="w1200 mx-auto">
            <div class="border rounded-[15px] border-[#D7D7D7] bg-white px-3 py-3 hover:scale-105 transition duration-300">
                {!! $produto->descricao !!}
            </div>
        </div>
    </div>
    @switch($produto->produtable_type)
        @case('App\Models\MarketplaceProdutoSemen')
            @include('includes.produtos.segmento.semen.detalhes')
            @break
    @endswitch
    <div class="w-full">
        <div class="px-4 py-5 mx-auto text-center md:px-0 px-md-0 w1200">
            <h3 class="font-montserrat text-[25px] font-medium">Avaliações do Produto</h3>
        </div>
        <div class="w1200 mx-auto">
            <div class="w-full flex items-center justify-center space-x-24">
                <div>
                    <div class="text-center">
                        <span class="font-montserrat text-[60px]">4.0</span>
                    </div>
                    <div class="text-[30px]">
                        <i class="text-yellow-500 fa-solid fa-star"></i>
                        <i class="text-yellow-500 fa-solid fa-star"></i>
                        <i class="text-yellow-500 fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                </div>
                <div>
                    <div class="flex items-center">
                        <div>
                            <p class="font-montserrat text-[14px] text-slate-700">5 estrelas</p>
                        </div>
                        <div class="w-[200px] bg-gray-200 rounded-full h-1.5 ml-3 dark:bg-gray-200">
                            <div class="bg-yellow-500 h-1.5 rounded-full dark:bg-yellow-500" style="width: 80%"></div>
                        </div>
                    </div>
                    <div class="flex items-center mt-[5px]">
                        <div>
                            <p class="font-montserrat text-[14px] text-slate-700">4 estrelas</p>
                        </div>
                        <div class="w-[200px] bg-gray-200 rounded-full h-1.5 ml-3 dark:bg-gray-200">
                            <div class="bg-yellow-500 h-1.5 rounded-full dark:bg-yellow-500" style="width: 5%"></div>
                        </div>
                    </div>
                    <div class="flex items-center mt-[5px]">
                        <div>
                            <p class="font-montserrat text-[14px] text-slate-700">3 estrelas</p>
                        </div>
                        <div class="w-[200px] bg-gray-200 rounded-full h-1.5 ml-3 dark:bg-gray-200">
                            <div class="bg-yellow-500 h-1.5 rounded-full dark:bg-yellow-500" style="width: 0%"></div>
                        </div>
                    </div>
                    <div class="flex items-center mt-[5px]">
                        <div>
                            <p class="font-montserrat text-[14px] text-slate-700">2 estrelas</p>
                        </div>
                        <div class="w-[200px] bg-gray-200 rounded-full h-1.5 ml-3 dark:bg-gray-200">
                            <div class="bg-yellow-500 h-1.5 rounded-full dark:bg-yellow-500" style="width: 0%"></div>
                        </div>
                    </div>
                    <div class="flex items-center mt-[5px]">
                        <div>
                            <p class="font-montserrat text-[14px] text-slate-700">1 estrelas</p>
                        </div>
                        <div class="w-[200px] bg-gray-200 rounded-full h-1.5 ml-3 dark:bg-gray-200">
                            <div class="bg-yellow-500 h-1.5 rounded-full dark:bg-yellow-500" style="width: 5%"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full mt-[30px]">
                @for($i = 0; $i < 5; $i++)
                    <div class="w-full font-montserrat">
                        <div class="text-[14px]">
                            <i class="text-yellow-500 fa-solid fa-star"></i>
                            <i class="text-yellow-500 fa-solid fa-star"></i>
                            <i class="text-yellow-500 fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <div class="mt-[10px]">
                            <span class="font-bold text-[17px]">Título da Avaliação</span>
                        </div>
                        <div class="mt-[20px]">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla pulvinar in leo sed mattis. Phasellus vitae tristique sem. Nam tristique mi vitae tincidunt tempor. Nunc ac risus rutrum, pharetra nisi sed, viverra elit. Nam felis velit, convallis at erat ut, laoreet aliquam turpis. Nulla quis mauris tempus, condimentum neque vel, dapibus tortor. Cras fringilla fringilla erat, a tincidunt ipsum iaculis non. Curabitur vel lectus quis turpis condimentum tristique eget in mi. Aliquam ultrices scelerisque tristique. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nunc tempus congue diam, in finibus risus hendrerit ac.
                        </div>
                        <div class="mt-[10px]">
                            <i class="fa-regular fa-thumbs-up"></i> 20
                            <i class="fa-regular fa-thumbs-down ml-4"></i> 5
                        </div>
                    </div>
                    <hr class="my-[20px]">
                @endfor
            </div>
        </div>
    </div>
</div>

@endsection

@section("scripts")

    <script>
        $(document).ready(function(){
            $('.popup_preview').magnificPopup({type:'image'});
        })
    </script>

@endsection
