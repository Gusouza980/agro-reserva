<div class="w-full py-5" x-data="{
    pos: 0,
    total: @entangle('total'),
    mobile: @entangle('mobile'),
    proxSlide(){
        if(!this.mobile){
            var slide = document.getElementById('slide-info-lotes-destaque');
            var scrollPos = slide.scrollLeft;
            if(this.pos == this.total - 1){
                var limit = Math.max( document.body.scrollHeight, document.body.offsetHeight, 
                    document.documentElement.clientHeight, document.documentElement.scrollHeight, document.documentElement.offsetHeight );
                slide.scroll({top:0, left: scrollPos - limit, behavior: 'smooth'});
            }else{
                slide.scroll({top:0, left: scrollPos + 1000, behavior: 'smooth'});
            }
            if(this.pos + 1 == this.total){
                this.pos = 0;
            }else{
                this.pos++;
            }
        }else{
            console.log('foi');
            var slide = document.getElementById('slide-info-lotes-destaque');
            var scrollPos = slide.scrollLeft;
            console.log('POS: ' + this.pos + ' - TOTAL: ' + this.total)
            if(this.pos == this.total - 1){
                var limit = Math.max( document.body.scrollHeight, document.body.offsetHeight, 
                    document.documentElement.clientHeight, document.documentElement.scrollHeight, document.documentElement.offsetHeight );
                slide.scroll({top:0, left: scrollPos - limit, behavior: 'smooth'});
            }
            if(this.pos + 1 == this.total){
                this.pos = 0;
            }else{
                this.pos++;
            }
        }
        
    },
    antSlide(){
        if(!this.mobile){
            var slide = document.getElementById('slide-info-lotes-destaque');
            var scrollPos = slide.scrollLeft;
            if(this.pos == 0){
                var limit = Math.max( document.body.scrollHeight, document.body.offsetHeight, 
                       document.documentElement.clientHeight, document.documentElement.scrollHeight, document.documentElement.offsetHeight );
                slide.scroll({top:0, left: scrollPos + limit, behavior: 'smooth'});
            }else{
                slide.scroll({top:0, left: scrollPos - 1000, behavior: 'smooth'});
            }
            if(this.pos - 1 < 0){
                this.pos = this.total - 1;
            }else{
                this.pos--;
            }
        }else{
            var slide = document.getElementById('slide-info-lotes-destaque');
            var scrollPos = slide.scrollLeft;
            if(this.pos == 0){
                var limit = Math.max( document.body.scrollHeight, document.body.offsetHeight, 
                       document.documentElement.clientHeight, document.documentElement.scrollHeight, document.documentElement.offsetHeight );
                slide.scroll({top:0, left: scrollPos + limit, behavior: 'smooth'});
            }
            if(this.pos - 1 < 0){
                this.pos = this.total - 1;
            }else{
                this.pos--;
            }
        }
        
    }
}">
    <div class="w-full mt-5 text-center">
        <h3 class="font-montserrat font-bold text-[25px] text-[#757887]">
            LOTES EM DESTAQUE
        </h3>
    </div>
    
    <div class="w1200 mx-auto mt-5 md:px-5 flex flex-nowrap overflow-x-scroll snap-mandatory snap-x no-scrollbar" x-swipe:left="proxSlide" x-swipe:right="antSlide" id="slide-info-lotes-destaque">
        @foreach($lotes as $key => $lote)
            <div class="snap-center flex-shrink-0 w-full flex flex-wrap md:flex-nowrap md:py-5 relative px-5"  x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-0" x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-0">
                <div class="w-full md:w-2/4 lg:w-3/5">
                    {!! \Util::convertYoutube($lote["video"]) !!}
                </div>
                <div class="md:w-2/5 md:pl-10 text-[#757887]">
                    <div class="w-full my-[20px]">
                        <p class="font-montserrat text-[14px]">LOTE: <b>{{ str_pad($lote["numero"], 3, '0', STR_PAD_LEFT) }}</b></p>
                        <h1 class="font-montserrat font-bold text-[28px] text-[#E8521D]">{{ $lote["nome"] }}</h1>
                    </div>
                    <div class="w-full relative">
                        <ul class="font-montserrat text-[14px]">
                            @if($lote["beta_caseina"])
                                <li>BETA-CASEINA: <b class="ml-2">{{ $lote["beta_caseina"] }}</b></li>
                            @endif
                            @if($lote["registro"])
                                <li>RGD: <b class="ml-2">{{ $lote["registro"] }}</b></li>
                            @endif
                            <li>NASCIMENTO: <b class="ml-2">{{ date('d/m/Y', strtotime($lote["nascimento"])) }}</b></li>
                            <li>RAÇA: <b class="ml-2">{{ $lote["raca"]["nome"] }}</b></li>
                            <li>SEXO: <b class="ml-2">{{ $lote["sexo"] }}</b></li>
                        </ul>
                        <img src="{{ asset('imagens/Scroll-Horizontal.svg') }}" width="50" class="absolute top-5 right-0 animate-bounce" alt=""> 
                    </div>
                    <div class="w-full mt-[35px] font-montserrat flex items-center">
                        <span class="font-bold text-[26px]">R$
                            {{ number_format($lote["produto"]["preco"] - ($lote["produto"]["preco"] * $lote["reserva"]["desconto"]) / 100, 2, ',', '.') }}</span>
                        <span class="font-medium text-[20px] ml-2">à vista</span>
                    </div>
                    <div class="w-full font-montserrat text-[14px] font-medium">
                        <span>Fator multiplicador: <b>{{ $lote["reserva"]["max_parcelas"] }}x</b> de <b>R$
                                {{ number_format($lote["produto"]["preco"] / $lote["reserva"]["max_parcelas"], 2, ',', '.') }}</b></span>
                    </div>
                    <div class="w-full mt-[40px] flex gap-x-4">
                        <a onclick="Livewire.emit('adicionarProduto', {{ $lote['produto']['id'] }})"
                            class="cpointer bg-[#14C656] text-white font-montserrat text-[14px] font-medium py-[8px] px-[30px] rounded-[15px]">Comprar</a>
                        <a onclick="Livewire.emit('adicionarProduto', {{ $lote['produto']['id'] }})"
                            class="cpointer bg-[#E8521D] text-white font-montserrat text-[14px] font-medium py-[8px] px-[30px] rounded-[15px]">Ver Mais</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="w-full hidden md:flex justify-center gap-x-6">
        <img @click="antSlide" src="{{ asset('imagens/slide-lotes-arrow-left.png') }}" id="slide-lotes-visitados-left" class="cpointer" height="25" alt="">
        <img @click="proxSlide" src="{{ asset('imagens/slide-lotes-arrow-right.png') }}" id="slide-lotes-visitados-right" class="cpointer" height="25" alt="">
    </div>
</div>
