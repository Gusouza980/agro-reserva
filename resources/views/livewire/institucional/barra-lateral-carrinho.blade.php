<div x-data="{mostrarCarrinho: @entangle('mostrarCarrinho')}" wire:init='init'>
    <div x-show="mostrarCarrinho" x-cloak @click.outside="mostrarCarrinho = false" class="flex flex-col fixed top-0 right-0 h-full pt-5 px-3 bg-[#FFFFFF] border border-solid border-slate-400 shadow-md w-full md:w-[360px] z-50">
        <i class="fas fa-times text-[#80828b] fa-lg absolute top-5 right-5 hover:scale-110 duration-300 cpointer" @click="mostrarCarrinho = false"></i>
        <div class="flex flex-row w-full text-center">
            <div class="flex flex-col flex-wrap justify-center mx-auto">
                <img src="{{ asset('imagens/icone-caminhao-lateral.svg') }}" class="w-full max-w-[60px] md:max-w-[100px] mx-auto" alt="">
                <h5 class="text-[18px] text-[#80828b] font-montserrat font-medium mt-[17px] ml-3">MEU CAMINHÃO</h5>
            </div>
        </div>
        {{-- @if($this->iniciar) --}}
            <div class="relative flex flex-col w-full h-full mt-5">
                @if($this->carrinhos && $this->carrinhos->count() > 0)
                    {{-- @dd($carrinhos) --}}
                    <div class="w-full h-[500px] overflow-y-scroll">
                        @foreach($this->carrinhos as $carrinho)
                            <div class="w-full px-[20px]">
                                <div class="w-full font-montserrat text-[14px] text-[#283646] font-medium">
                                    @if($carrinho->reserva)
                                        <h4>RESERVA: {{ mb_strtoupper($carrinho->reserva->fazenda->nome_fazenda) }}</h4>
                                    @endif
                                </div>
                                @foreach($carrinho->produtos as $produto)
                                    <div class="flex items-center w-full py-3 space-x-6 flex-collumn">
                                        <div class="shrink-0">
                                            <img class="w-[60px] rounded-[6px] shadow-md" src="{{ asset($produto->produtable->preview) }}" alt="">
                                        </div>
                                        <div class="relative grow">
                                            <div>
                                                <a href="{{ route('fazenda.lote', ['fazenda' => $produto->produtable->fazenda->slug, 'reserva' => $produto->produtable->reserva_id, 'lote' => $produto->produtable_id]) }}" class="text-[13px] font-montserrat text-[#283646] font-bold" >{{ Illuminate\Support\Str::limit($produto->produtable->nome, 20, "...") }}</a>
                                            </div>
                                            <div class="mt-[-5px]">
                                                <span class="text-[10px] text-[#626262] font-montserrat font-medium">RGD: {{ $produto->produtable->registro }}</span>
                                            </div>
                                            <div class="">
                                                <span class="text-[12px] md:text-[16px] text-[#15171E] font-montserrat font-bold">R${{ number_format($produto->produtable->preco - (($produto->produtable->preco * $produto->produtable->reserva->desconto) / 100) , 2, ",", ".") }}</span>
                                                <span class="font-montserrat font-medum text-[10px] md:text-[13px] text-[#15171E]">à vista</span>
                                            </div>
                                            <div class="mt-[-5px]">
                                                <span class="text-[12px] text-[#626262] font-montserrat font-medium">ou <b class="text-[#15171E]">{{ $produto->produtable->reserva->max_parcelas }}x</b> de <b class="text-[#15171E]">R${{ number_format($produto->produtable->preco/$produto->produtable->reserva->max_parcelas, 2, ",", ".") }}</b></span>
                                            </div>
                                            <i class="absolute bottom-0 -right-[18px] md:-right-[10px] duration-300 text-[#5C6384] hover:text-[#15171E] fa-solid fa-trash-can text-[20px] hover:scale-110 cpointer" onclick="Livewire.emit('removerProduto', {{ $carrinho->id }}, {{ $produto->id }})" wire:click="removerProduto({{ $carrinho->id }}, {{ $produto->id }})"></i>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <hr class="mb-4">
                        @endforeach
                    </div>
                    <div class="px-6 md:px-0 fixed md:absolute bottom-0 left-0 py-6 grid grid-cols-2 mt-4 gap-x-3 border-t border-[#707070] border-solid w-full">
                        <button class="border-2 border-slate-400 text-[#9AA2B2] text-[17px] py-1 w-full transition duration-300 font-montserrat font-medium rounded-[10px] hover:bg-[#15171E] hover:text-white" @click="mostrarCarrinho = false">Continuar</button>
                        <button onclick="window.location.href='{{ route('carrinho') }}'" class="border border-[#27C45B] bg-[#27C45B] hover:bg-[#1e9b48] text-[17px] text-white py-1 w-full font-montserrat font-medium rounded-[10px]">Finalizar</button>
                    </div>
                @else
                    <div class="w-full py-3 text-center">
                        <span class="font-montserrat font-[15px] font-medium text-cinza-escuro">Seu carrinho está vazio !</span>
                    </div>
                @endif
            </div>
        {{-- @endif --}}
    </div>
    {{-- <x-loading></x-loading> --}}
</div>

@push("scripts")
    <script>
        $(document).ready(function(){
            Livewire.emit("atualizaContagemLotes");
        })
    </script>
@endpush