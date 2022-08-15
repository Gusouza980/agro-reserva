<div x-data="{mostrarCarrinho: @entangle('mostrarCarrinho')}" wire:init='init'>
    <div x-show="mostrarCarrinho" x-cloak @click.outside="mostrarCarrinho = false" class="flex flex-col fixed top-0 right-0 h-full pt-5 px-3 bg-[#FFFFFF] border border-solid border-slate-400 shadow-md w-full md:w-[550px] z-50">
        <i class="fas fa-times text-[#80828b] fa-lg absolute top-5 right-5 hover:scale-110 duration-300 cpointer" @click="mostrarCarrinho = false"></i>
        <div class="flex flex-row w-full text-center">
            <div class="flex flex-col flex-wrap justify-center mx-auto">
                <img src="{{ asset('imagens/icone-caminhao-lateral.svg') }}" class="w-full max-w-[200px] md:max-w-[250px] mx-auto" alt="">
                <h5 class="text-[20px] text-[#80828b] font-montserrat font-medium mt-[17px] ml-3">MEU CAMINHÃO</h5>
            </div>
        </div>
        @if($this->iniciar)
            <div class="flex w-full mt-5 flex-col relative h-full">
                @if($carrinhos->count() > 0)
                    <div class="w-full h-[500px] overflow-y-scroll">
                        @foreach($carrinhos as $carrinho)
                            <div class="w-full px-6">
                                <div class="w-full font-montserrat text-[14px] text-[#283646] font-medium">
                                    <h4>RESERVA: {{ mb_strtoupper($carrinho->reserva->fazenda->nome_fazenda) }}</h4>
                                </div>
                                @foreach($carrinho->produtos as $produto)
                                    <div class="flex py-3 flex-collumn space-x-6">
                                        <div class="">
                                            <img class="w-[190px] rounded-[6px] shadow-md" src="{{ asset($produto->produtable->preview) }}" alt="">
                                        </div>
                                        <div class="relative">
                                            <div>
                                                <span class="text-[15px] font-montserrat text-[#283646] font-bold">{{ $produto->produtable->nome }}</span>
                                            </div>
                                            <div class="mt-[-5px]">
                                                <span class="text-[12px] text-[#626262] font-montserrat font-medium">RGD: {{ $produto->produtable->registro }}</span>
                                            </div>
                                            <div class="mt-[22px]">
                                                <span class="text-[15px] md:text-[22px] text-[#15171E] font-montserrat font-bold">R${{ number_format($produto->produtable->preco, 2, ",", ".") }}</span>
                                                <span class="font-montserrat font-medum text-[13px] md:text-[17px] text-[#15171E]">à vista</span>
                                            </div>
                                            <div class="mt-[-5px]">
                                                <span class="text-[12px] text-[#626262] font-montserrat font-medium">ou <b class="text-[#15171E]">{{ $produto->produtable->reserva->max_parcelas }}x</b> de <b class="text-[#15171E]">R${{ number_format($produto->produtable->preco/$produto->produtable->reserva->max_parcelas, 2, ",", ".") }}</b></span>
                                            </div>
                                            <i class="absolute -right-[35px] duration-300 text-[#5C6384] hover:text-[#15171E] top-2 fa-solid fa-trash-can text-[20px] hover:scale-110 cpointer" wire:click="removerProduto({{ $carrinho->id }}, {{ $produto->id }})"></i>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <hr>
                        @endforeach
                    </div>
                    <div class="px-6 md:px-0 fixed md:absolute bottom-0 left-0 py-6 grid grid-cols-2 mt-4 gap-x-3 border-t border-[#707070] border-solid w-full">
                        <button class="border-2 border-slate-400 text-[#9AA2B2] text-[22px] py-2 w-full transition duration-300 font-montserrat font-medium rounded-[10px] hover:bg-[#15171E] hover:text-white" @click="mostrarCarrinho = false">Continuar</button>
                        <button onclick="window.location.href='{{ route('carrinho') }}'" class="border border-[#27C45B] bg-[#27C45B] hover:bg-[#1e9b48] text-[22px] text-white py-2 w-full font-montserrat font-medium rounded-[10px]">Finalizar</button>
                    </div>
                @else
                    <div class="w-full py-3 text-center">
                        <span class="font-montserrat font-[15px] font-medium text-cinza-escuro">Seu carrinho está vazio !</span>
                    </div>
                @endif
            </div>
        @endif
    </div>    
</div>

@push("scripts")

    <script>
        $(document).ready(function(){
            Livewire.emit("atualizaContagemLotes");
        })
    </script>

@endpush