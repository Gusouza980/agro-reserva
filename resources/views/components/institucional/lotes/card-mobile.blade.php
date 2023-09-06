<div {{ $attributes->merge(['class' => 'transition duration-500 hover:scale-105 hover:shadow-md group hover:z-20 px-3 py-3 rounded-[15px] bg-white']) }}>
    {{-- class="transition duration-500 hover:scale-105 hover:shadow-md group hover:z-20 px-3 py-3 rounded-[15px] bg-white @if($lote->reservado) border-2 border-solid border-[#FFB02A] @endif --}}
    <div>
        <div class="relative">
            <div class="absolute flex justify-content-center h-[45px] top-[-30px] px-2 pt-1 z-0 rounded-t-[12px] bg-slate-500 text-white" style="font-family: 'Montserrat', sans-serif;">
                <small class="font-medium text-[15px]">LOTE: {{ str_pad($lote->numero, 3, "0", STR_PAD_LEFT) }}</small>
            </div>
            @if(!$lote->reservado && !$lote->reserva->encerrada)
                <div wire:click="declararInteresse({{$lote->id}})" class="@if(session()->get("cliente") && $lote->interesses->where("cliente_id", session()->get("cliente")["id"])->first()) bg-green-500 @else bg-slate-500 @endif cursor-pointer absolute top-[-40px] right-[-25px] flex items-center justify-center w-[40px] h-[40px] rounded-full" title="Declarar Interesse">
                    <i class="text-white fas fa-hand"></i>
                </div>
            @endif
            <div class="relative w-full overflow-hidden bg-no-repeat bg-cover">
                <img src="{{ asset($lote->preview) }}" class="relative z-[8] w-full transition duration-300 hover:scale-110" style="border-top-left-radius: 15px; border-top-right-radius: 15px;" alt="">
                @if($lote->reservado || $lote->reserva->encerrada)
                    <div class="font-montserrat text-[29px] text-[#FFB02A] font-bold absolute top-0 left-0 z-[10] w-full h-full rounded-t-[15px] flex items-center justify-center" style="background-color: rgba(0,0,0,0.45)">
                        @if($lote->reserva->encerrada)
                            ENCERRADO
                        @else
                            VENDIDO
                        @endif
                    </div>
                @endif
            </div>
        </div>
        
        <div class="py-2 text-center">
            <h4 class="text-[#626262] font-semibold" style="font-family: 'Montserrat', sans-serif; font-size: 16px;">{{ $lote->nome }}</h4>
            <div class="px-2 mx-auto rounded-md w-fit h-[23px]">
                @if($lote->registro)
                    <span class="text-[#626262] font-medium text-[15px]">RGD: {{ $lote->registro }}</span>
                @endif
            </div>
        </div>
        <div class="relative mt-3">
            @if($lote->membro_pacote)
                @php
                    $membros = $lotes->where("numero", $lote->numero)->where("id", "!=", $lote->id)->pluck("nome")->toArray();
                @endphp
                <div title="Esse lote faz parte de um pacote junto com {{ implode(", ", $membros) }}" style="top: -12px; right: -7px;" class="cursor-pointer absolute bg-slate-500 flex items-center justify-center w-[32px] h-[32px] rounded-full">
                    <i class="fas fa-box-open text-white font-medium text-[15px]"></i>
                </div>
            @endif
            <div class="bg-slate-100 rounded-md px-3 py-3 text-[#626262] text-[13px]" style="font-family: 'Montserrat', sans-serif;">
                @if($lote->beta_caseina)
                    <div class="w-full mb-2 font-bold text-center">
                        {{ $lote->beta_caseina }}
                    </div>
                @endif
                @if($lote->nascimento)
                    <div class="">
                        <b>NASC:.</b> <span class="ml-2 font-medium">{{ date("d/m/Y", strtotime($lote->nascimento)) }}</span>
                    </div>
                @endif
                @if($lote->gpta)
                    <div>
                        <b>GPTA:.</b> <span class="ml-2 font-medium">{{ $lote->gpta }} Kg</span>
                    </div>
                @endif
                @if($lote->ccg)
                    <div>
                        <b>CCG:.</b> <span class="ml-2 font-medium">{{ $lote->ccg }}</span>
                    </div>
                @endif
                <div class="">
                    <b>RAÇA:.</b> <span class="ml-2 font-medium">{{ mb_strtoupper($lote->raca->nome, 'UTF-8') }}</span>
                </div>
                <div class="">
                    <b>SEXO:.</b> <span class="ml-2 font-medium">{{ mb_strtoupper($lote->sexo, 'UTF-8') }}</span>
                </div>
            </div>
        </div>
        <div class="@if($lote->reservado) md:border-l-2 md:border-b-2 md:border-r-2 border-[#FFB02A] md:left-[-2px] md:w-[calc(100%+4px)] @else md:left-0 w-full @endif rounded-b-[15px] px-3 pt-3 mais-info md:hidden md:shadow-md transition duration-800 md:group-hover:flex flex-col justify-content-center align-items-center md:h-[100px] md:absolute md:bottom-[-90px]  bg-white ">
            @if(!$lote->reserva->encerrada && $lote->produto)
                <div class="z-[11] w-full text-center">
                    <span class="text-[#626262] font-semibold" style="font-family: 'Montserrat', sans-serif; font-size: 16px;">Em até {{ $lote->reserva->max_parcelas }}x de R${{ number_format($lote->produto->preco / $lote->reserva->max_parcelas, 2, ",", ".") }}</span>
                </div>
            @endif
            <div class="grid w-full @if(!$lote->reservado && !$lote->reserva->encerrada && $lote->liberar_compra) grid-cols-2 @else grid-cols-1 @endif gap-3 mt-3">
                <button onclick="window.location.href = '{{ route('fazenda.lote', ['fazenda' => $lote->reserva->fazenda->slug, 'reserva' => $lote->reserva, 'lote' => $lote]) }}'" class="border-2 border-slate-300 hover:border-[#80828B] text-[#80828B] py-2 w-full font-medium rounded-[30px]">Saiba Mais</button>
                @if(!$lote->reservado && !$lote->reserva->encerrada && $lote->liberar_compra)
                    <button onclick="Livewire.emit('adicionarProduto', {{ $lote->produto->id }})" class="border border-[#14C656] bg-[#14C656] hover:bg-[#0d8f3d] text-white py-2 w-full font-semibold rounded-[30px]">Comprar</button>
                @endif
            </div>
        </div>
    </div>
</div>