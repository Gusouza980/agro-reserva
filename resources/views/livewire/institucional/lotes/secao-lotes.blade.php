<div class="grid grid-cols-1 gap-5 px-4 mx-auto my-4 md:px-0 md:grid-cols-3 lg:grid-cols-4 w1400">
    @foreach($lotes as $lote)
        <div class="transition duration-500 shadow-md hover:scale-105">
            <div class="relative">
                <div class="absolute bottom-0 left-0 px-1 rounded-tr-md bg-[#F7F7F7]">
                    <small class="font-bold">Lote {{ str_pad($lote->numero, 3, "0", STR_PAD_LEFT) }}</small>
                </div>
                <img src="{{ asset($lote->preview) }}" class="w-full" alt="">
            </div>
            <div class="py-2 text-center bg-[#F7F7F7]">
                <div class="px-2 mx-auto rounded-md w-fit">
                    <small class="ml-3">RGD: {{ $lote->registro }}</small>
                </div>
                <h4 class="font-bold" style="font-family: Montserrat;">{{ $lote->nome }}</h4>
                <div class="px-2 mx-auto rounded-md w-fit">
                </div>
            </div>
            <div class="py-3">
                <div class="px-3 hover:bg-slate-200">
                    <b>GPTA:.</b> {{ $lote->gpta }}
                </div>
                <div class="px-3 hover:bg-slate-200">
                    <b>NASCIMENTO:.</b> {{ date("d/m/Y", strtotime($lote->nascimento)) }}
                </div>
                <div class="px-3 hover:bg-slate-200">
                    <b>RAÇA:.</b> {{ mb_strtoupper($lote->raca->nome, 'UTF-8') }}
                </div>
                <div class="px-3 hover:bg-slate-200">
                    <b>SEXO:.</b> {{ mb_strtoupper($lote->sexo, 'UTF-8') }}
                </div>
            </div>
            <div class="py-2 cursor-pointer text-center text-[15px] hover:font-bold bg-orange-500 hover:bg-orange-600" style="font-family: Montserrat;">
                <a href="" class="text-white hover:text-white focus:text-white focus-within:text-white active:text-white visited:text-white">Ver lote</a>
            </div>
        </div>
    @endforeach
</div>
