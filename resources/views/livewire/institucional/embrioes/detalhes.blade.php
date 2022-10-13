<div class="w-full">
    <div class="w-full bg-[#F5F5F5]">
        <div class="py-5 mx-auto w1200">
            <div class="hidden w-full md:block">
                <a href="{{ route('fazenda.lotes', ['fazenda' => $embriao->fazenda->slug, 'reserva' => $embriao->reserva->id]) }}"
                    class="text-[#283646] text-[18px] font-montserrat font-medium hover:text-[#E8521D] transition "><i
                        class="mr-2 fas fa-chevron-left"></i> Voltar</a>
            </div>
            <div class="flex flex-wrap w-full px-4 mt-4 md:px-0 px-md-0">
                <div class="order-2 w-full mt-5 mt-md-0 md:order-1 md:w-3/5 md:mt-0">
                    <div class="hidden w-full md:block">
                        <div class="w-full">
                            {!! \App\Classes\Util::convertYoutube($embriao->video) !!}
                        </div>
                        <div class="grid w-full grid-cols-1 mt-4 md:gap-5 md:grid-cols-3">
                            <div>
                                <a class="popup_preview" href="{{ asset($embriao->catalogo) }}">
                                    <img src="{{ asset($embriao->catalogo) }}" class="w-full transition duration-150 rounded-md hover:scale-105" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:hidden">
                        <div class="flex mx-auto overflow-x-scroll w1200 hide-scroll-bar">
                            <div class="flex flex-nowrap">
                                <div class="inline-block mx-[6px] slide-item w-[340px]">
                                    {!! \App\Classes\Util::convertYoutube($embriao->video, "16/9", "h-full") !!}
                                </div>
                                <div class="inline-block mx-[6px] slide-item w-[340px]">
                                    <img src="{{ asset($embriao->preview) }}" class="w-full transition duration-150 rounded-md hover:scale-105" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="order-1 w-full md:order-2 md:w-2/5 md:pl-10">
                    <div class="flex items-center justify-between w-full">
                        <div>
                            <img src="{{ asset($embriao->fazenda->logo) }}" class="w-full max-w-[150px] md:max-w-[200px] " alt="">
                        </div>
                        <div class="md:hidden">
                            <a href="" class="text-[#283646] text-[18px] font-montserrat font-medium hover:text-[#E8521D] transition "><i class="mr-2 fas fa-chevron-left"></i> Voltar</a>
                        </div>

                    </div>
                    <div class="w-full my-[20px]">
                        <p class="font-montserrat text-[14px]">LOTE: <b>{{ str_pad($embriao->numero, 3, '0', STR_PAD_LEFT) }}</b></p>
                        <h1 class="font-montserrat font-bold text-[28px] text-[#E8521D]">{{ $embriao->nome_pacote }}</h1>
                    </div>
                    <div class="w-full">
                        <ul class="font-montserrat text-[14px]">
                            @if($embriao->quantidade_embrioes_pacote)
                                <li>QTD. EMBRIÕES PACOTE: <b class="ml-2">{{ $embriao->quantidade_embrioes_pacote }}</b></li>
                            @endif
                            <li>RAÇA: <b class="ml-2">{{ $embriao->raca->nome }}</b></li>
                        </ul>
                    </div>
                    @if(!$embriao->reserva->encerrada)
                        <div class="w-full mt-[35px] font-montserrat flex items-center">
                            <span class="font-bold text-[33px]">R$
                                {{ number_format($embriao->precos->first()->preco - ($embriao->precos->first()->preco * $embriao->reserva->desconto) / 100, 2, ',', '.') }}</span>
                            <span class="font-medium text-[25px] ml-2">à vista</span>
                        </div>
                        <div class="w-full font-montserrat text-[19px] font-medium">
                            <span>Ou <b>{{ $embriao->reserva->max_parcelas }}x</b> de <b>R$
                                    {{ number_format($embriao->precos->first()->preco / $embriao->reserva->max_parcelas, 2, ',', '.') }}</b></span>
                        </div>
                        <div class="w-full font-montserrat text-[14px]">
                            <span>Sem juros no boleto de titularidade Faz. e comprador.</span>
                        </div>
                    @endif
                    @if(!$embriao->reservado && !$embriao->reserva->encerrada)
                        <div class="w-full mt-[20px]">
                            <a
                                class="cpointer bg-[#14C656] text-white font-montserrat text-[18px] font-medium py-[12px] px-[60px] rounded-[15px]">Comprar</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="py-5 mx-auto w1200">
        <img src="{{ asset($embriao->catalogo) }}" class="w-full transition duration-150 rounded-md hover:scale-105" alt="">
    </div>
</div>

@push("scripts")

    <script>
        $(document).ready(function(){
            $('.popup_preview').magnificPopup({type:'image'});
        })
    </script>

@endpush