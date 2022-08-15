@extends('template.main2')

@section('styles')

@endsection

@section('conteudo')

    <div class="w-full bg-[#F5F5F5] py-20">
        <div class="w1000 mx-auto pb-6">
            <span onclick="window.location.href='{{ route('index') }}'" class="cursor-pointer font-medium transition font-montserrat duration-300 text-[18px] text-[#283646] hover:scale-105 hover:text-white"><i class="fas fa-chevron-left mr-2"></i> <span>Voltar</span></span>
        </div>
        @foreach($carrinhos as $carrinho)
            <div class="w1000 bg-white mx-auto rounded-[27px]">
                <div class="w-full flex flex-wrap md:flex-nowrap py-[40px] px-[40px] border-b-2 border-solid border-gray-400">
                    <div class="text-left grow">
                        <h3 class="font-montserrat text-[20px] font-medium text-gray-400">RESUMO DA COMPRA</h3>
                        <div class="mt-[15px] font-montserrat text-[15px] font-bold text-[#5C6384]">
                            @php
                                $lotes_numeros = $carrinho->produtos()->with("produtable")->get()->pluck("produtable")->flatten()->pluck("numero")->toArray();
                                array_walk($lotes_numeros, function(&$value, $key){
                                    $value = str_pad(strval($value), 2, "0", STR_PAD_LEFT);
                                });
                            @endphp
                            <p>Reserva: {{ $carrinho->reserva->fazenda->nome_fazenda }}</p>
                            <p>Resumo dos Lotes: L {{ implode("- L ", $lotes_numeros) }}</p>
                        </div>
                        <div class="font-montserrat text-[13px] text-[#15171E] mt-[15px]">
                            <p>Sem juros no boleto de titularidade Faz. e comprador</p>
                        </div>
                    </div>
                    <div class="text-left text-md-left md:text-right grow mt-[15px] md:mt-none">
                        <div class="">
                            <span class="text-[22px] text-[#15171E] font-montserrat font-bold">R${{ number_format($carrinho->produtos->sum("preco") - (($carrinho->produtos->sum("preco") * $carrinho->reserva->desconto) / 100) , 2, ",", ".") }}</span>
                            <span class="font-montserrat font-medum text-[17px] text-[#15171E]">à vista</span>
                        </div>
                        <div class="mt-[-5px]">
                            <span class="text-[14px] text-[#626262] font-montserrat font-medium">ou <b class="text-[#15171E]">{{ $carrinho->reserva->max_parcelas }}x</b> de <b class="text-[#15171E]">R${{ number_format($carrinho->produtos->sum("preco")/$carrinho->reserva->max_parcelas, 2, ",", ".") }}</b></span>
                        </div>
                    </div>
                </div>
                <div class="w-full py-[20px] px-[20px] md:px-[40px]">
                    @foreach($carrinho->produtos as $produto)
                        <div class="w-full md:px-[40px] pb-[20px] border-b-2 border-solid border-gray-400">
                            <div class="flex py-3 flex-collumn space-x-6 w-full">
                                <div class="">
                                    <img class="w-[190px] rounded-[6px] shadow-md" src="{{ asset($produto->produtable->preview) }}" alt="">
                                </div>
                                <div class="relative grow">
                                    <div>
                                        <span class="text-[12px] font-montserrat text-[#283646] font-medium">LOTE {{ str_pad(strval($produto->produtable->numero), 2, "0", STR_PAD_LEFT) }}</span>
                                    </div>
                                    <div>
                                        <span class="text-[15px] font-montserrat text-[#283646] font-bold">{{ $produto->produtable->nome }}</span>
                                    </div>
                                    <div class="mt-[-5px]">
                                        <span class="text-[12px] text-[#626262] font-montserrat font-medium">RGD: {{ $produto->produtable->registro }}</span>
                                    </div>
                                    <div class="mt-[22px]">
                                        <span class="text-[15px] md:text-[22px] text-[#15171E] font-montserrat font-bold">R${{ number_format($produto->produtable->preco - (($produto->produtable->preco * $produto->produtable->reserva->desconto) / 100) , 2, ",", ".") }}</span>
                                        <span class="font-montserrat font-medum text-[13px] md:text-[17px] text-[#15171E]">à vista</span>
                                    </div>
                                    <div class="mt-[-5px]">
                                        <span class="text-[12px] text-[#626262] font-montserrat font-medium">ou <b class="text-[#15171E]">{{ $produto->produtable->reserva->max_parcelas }}x</b> de <b class="text-[#15171E]">R${{ number_format($produto->produtable->preco/$produto->produtable->reserva->max_parcelas, 2, ",", ".") }}</b></span>
                                    </div>
                                    <i class="absolute right-0 duration-300 text-[#5C6384] hover:text-[#15171E] top-2 fa-solid fa-trash-can text-[20px] hover:scale-110 cpointer" wire:click="removerProduto({{ $carrinho->id }}, {{ $produto->id }})"></i>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="w-full mt-[20px] text-right">
                        <button onclick="window.location.href='{{ route('carrinho.checkout', ['carrinho' => $carrinho->id]) }}'" class="border border-[#27C45B] bg-[#27C45B] hover:bg-[#1e9b48] text-[22px] text-white py-2 px-8 font-montserrat font-medium rounded-[10px]">Finalizar</button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    
@endsection

@section('scripts')

@endsection