<div class="w-full bg-[#F5F5F5]">
    <div class="px-4 py-5 mx-auto text-center md:px-0 px-md-0 w1200">
        <h3 class="font-montserrat text-[25px] font-medium">Informações Complementares</h3>
    </div>
    <div class="grid grid-cols-1 gap-5 px-4 pb-5 mx-auto md:px-0 px-md-0 md:grid-cols-2 w1200">
        <div
            class="flex flex-wrap border rounded-[15px] border-[#D7D7D7] bg-white px-3 py-3 hover:scale-105 transition duration-300">
            <div class="w-full">
                <span class="text-[#5C6384] font-montserrat font-normal text-[16px]">INFORMAÇÕES ADICIONAIS:</span>
            </div>
            <div class="w-full mt-3 break-normal font-montserrat text-[16px]">
                @if ($produto->produtable->nascimento)
                    <p><b class="mr-2">NASC:</b> {{ date("d/m/Y", strtotime($produto->produtable->nascimento)) }}</p>
                @endif
                @if ($produto->produtable->registro)
                    <p><b class="mr-2">RGD:</b> {{ $produto->produtable->registro }}</p>
                @endif
                @if ($produto->produtable->linhagem)
                    <p><b class="mr-2">LINHAGEM:</b> {{ $produto->produtable->linhagem }}</p>
                @endif
                @if ($produto->produtable->doses)
                    <p><b class="mr-2">DOSES:</b> {{ $produto->produtable->doses }}</p>
                @endif
            </div>
        </div>
        <div
            class="flex flex-wrap border rounded-[15px] border-[#D7D7D7] bg-white px-3 py-3 hover:scale-105 transition duration-300">
            <div class="w-full">
                <span class="text-[#5C6384] font-montserrat font-normal text-[16px]">GENEALOGIA:</span>
            </div>
            <div class="w-full mt-3 break-normal font-montserrat text-[16px]">
                @if ($produto->produtable->pai)
                    <p><b class="mr-2">PAI:</b> {{ $produto->produtable->pai }}</p>
                @endif
                @if ($produto->produtable->avo_paterno)
                    <p><b class="mr-2">AVÔ PATERNO:</b> {{ $produto->produtable->avo_paterno }}</p>
                @endif
                @if ($produto->produtable->avo_paterna)
                    <p><b class="mr-2">AVÔ PATERNA:</b> {{ $produto->produtable->avo_paterna }}</p>
                @endif
                @if ($produto->produtable->mae)
                    <p><b class="mr-2">MÃE:</b> {{ $produto->produtable->mae }}</p>
                @endif
                @if ($produto->produtable->avo_materno)
                    <p><b class="mr-2">AVÔ MATERNO:</b> {{ $produto->produtable->avo_materno }}</p>
                @endif
                @if ($produto->produtable->avo_materna)
                    <p><b class="mr-2">AVÔ MATERNA:</b> {{ $produto->produtable->avo_materna }}</p>
                @endif
            </div>
        </div>
    </div>
</div>