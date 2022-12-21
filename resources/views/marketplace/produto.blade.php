@extends('template.main2')

@section('conteudo')

<div class="w-ful">
    <div class="w-full bg-[#F5F5F5]">
        <div class="py-5 mx-auto w1200">
            <div class="hidden w-full md:flex">
                <div class="md:w-3/5">
                    <a href="{{ route('marketplace.vendedor', ['slug' => $produto->vendedor->slug]) }}"
                        class="text-[#283646] text-[18px] font-montserrat font-medium hover:text-[#E8521D] transition "><i
                            class="mr-2 fas fa-chevron-left"></i> Voltar</a>
                </div>
                <div class="flex justify-between md:w-2/5 md:pl-10">
                    <div class="text-[11px]">
                        <i class="text-yellow-500 fa-solid fa-star"></i>
                        <i class="text-yellow-500 fa-solid fa-star"></i>
                        <i class="text-yellow-500 fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <div>
                        <i class="fas fa-share-nodes"></i>
                        <i class="fas fa-heart ml-3"></i>
                    </div>
                </div>
            </div>
            <div class="flex flex-wrap w-full px-4 mt-4 md:px-0 px-md-0">
                <div class="order-1 w-full mt-5 mt-md-0 md:w-3/5 md:mt-0">
                    <div class="w-full flex md:space-x-4">
                        <div class="hidden w-[170px] md:flex flex-col space-y-2">
                            @foreach($produto->imagens->where("id", "<>", $produto->marketplace_produto_imagem_id) as $imagem)
                                <div>
                                    <a class="popup_preview" href="{{ asset($imagem->caminho) }}">
                                        <img src="{{ asset($imagem->caminho) }}" class="h-[160px] transition duration-150 rounded-md hover:scale-105" alt="">
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <div class="grow w-full md:h-[500px]">
                            <img src="{{ asset($produto->preview->caminho) }}" class="w-full md:h-[500px]" alt="">
                        </div>
                    </div>
                    <div class="w-full md:hidden mt-3">
                        <div class="flex mx-auto overflow-x-scroll w1200 hide-scroll-bar">
                            <div class="flex space-x-2 flex-nowrap">
                                @foreach($produto->imagens as $imagem)
                                    <div class="inline-block slide-item w-[120px]">
                                        <img src="{{ asset($imagem->caminho) }}" class="max-w-full h-[120px] md:h-full transition duration-150 rounded-lg hover:scale-105" alt="">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="order-2 w-full md:w-2/5 md:pl-10 mt-4 md:mt-0">
                    <div class="flex items-center justify-between w-full">
                        <div>
                            <img src="{{ asset($produto->vendedor->logo) }}" class="w-full max-w-[150px] md:max-w-[200px] " alt="">
                        </div>
                        <div class="md:hidden">
                            <a href="{{ route('marketplace.vendedor', ['slug' => $produto->vendedor->slug]) }}" class="text-[#283646] text-[18px] font-montserrat font-medium hover:text-[#E8521D] transition "><i class="mr-2 fas fa-chevron-left"></i> Voltar</a>
                        </div>

                    </div>
                    <div class="w-full mt-[20px]">
                        <p class="font-montserrat text-[14px]">CÓDIGO: <b>{{ str_pad($produto->id, 6, '0', STR_PAD_LEFT) }}</b></p>
                        <h1 class="font-montserrat font-bold text-[28px] text-[#E8521D]">{{ $produto->nome }}</h1>
                    </div>
                    <div class="w-full">
                        <p>{!! $produto->resumo !!}</p>
                    </div>
                    <div class="w-full mt-4">
                        <div class="w-full font-montserrat text-gray-800 text-[16px] font-bold">
                            <p>Contatar o vendedor</p>
                        </div>
                        <form action="" class="w-full mt-2">
                            <div>
                                <input type="text" placeholder="Nome e Sobrenome" class="py-2 px-3 rounded-[8px] w-full border border-gray-400 placeholder:text-gray-400 outline-none focus:outline-none">
                            </div>
                            <div class="mt-2">
                                <input type="text" placeholder="Email" class="py-2 px-3 rounded-[8px] w-full border border-gray-400 placeholder:text-gray-400 outline-none focus:outline-none">
                            </div>
                            <div class="mt-2">
                                <input type="text" placeholder="Telefone" class="py-2 px-3 rounded-[8px] w-full border border-gray-400 placeholder:text-gray-400 outline-none focus:outline-none">
                            </div>
                            <div class="mt-2">
                                <textarea placeholder="Escreva sua mensagem" class="py-2 px-3 rounded-[8px] w-full border border-gray-400 placeholder:text-gray-400 outline-none focus:outline-none" rows="4"></textarea>
                            </div>
                            <div class="flex items-start w-full mt-3">
                                <input type="checkbox" class="mr-2 checkbox mt-2" required/>
                                <span class="mt-1 text-gray-600 font-montserrat text-[13px] font-medium">Autorizo a utilização dos meus dados de acordo com as Políticas de Privacidade e aceito os Termos e Condições.</span>
                            </div>
                            <div class="w-full flex space-x-4 mt-3">
                                <div class="grow">
                                    <button onclick="window.location.href = '{{ route('marketplace.produto', ['slug' => $produto->vendedor->slug, 'produto' => $produto->id]) }}'" class="w-full bg-green-500 border-green-500 text-white hover:bg-green-800 transition duration-200 border-2 font-bold font-montserrat rounded-[10px] py-2 text-[14px]">Enviar Interesse</button>
                                </div>
                                <div class="grow">
                                    <button type="button" onclick="Livewire.emit('carregaModalSelecaoAsssessor', {{ $produto->id }})" class="w-full hover:bg-green-500 hover:text-white transition duration-200 border-2 font-bold font-montserrat rounded-[10px] py-2 border-green-500 text-green-500 text-[14px]"> <i class="fab fa-whatsapp mr-2 fa-xl"></i> Whatsapp</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="w-full py-5">
        <div class="px-4 mx-auto text-center md:px-0 px-md-0 w1200">
            <h3 class="font-montserrat text-[25px] font-medium">Descrição</h3>
        </div>
        <div class="w1200 mx-auto mt-2">
            <div class="border rounded-[15px] border-[#D7D7D7] bg-white px-3 py-3 hover:scale-105 transition duration-300">
                {{ $produto->descricao }}
            </div>
        </div>
    </div>
    {{-- @switch($produto->produtable_type)
        @case('App\Models\MarketplaceProdutoSemen')
            @include('includes.produtos.segmento.semen.detalhes')
            @break
    @endswitch --}}
    {{-- <div class="w-full">
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
    </div> --}}
</div>
@livewire('marketplace.produto.modal-selecao-assessor')

@endsection

@section("scripts")

    <script>
        $(document).ready(function(){
            $('.popup_preview').magnificPopup({type:'image'});
        })
    </script>

@endsection
