<div class="w-full" x-data="{
    pos: 0,
    total: @entangle('total'),
    mobile: @entangle('mobile'),
    proxSlide() {
        if (!this.mobile) {
            var slide = document.getElementById('slide-info-lotes-destaque');
            var scrollPos = slide.scrollLeft;
            if (this.pos == this.total - 1) {
                var limit = Math.max(document.body.scrollHeight, document.body.offsetHeight,
                    document.documentElement.clientHeight, document.documentElement.scrollHeight, document.documentElement.offsetHeight);
                slide.scroll({ top: 0, left: scrollPos - limit, behavior: 'smooth' });
            } else {
                slide.scroll({ top: 0, left: scrollPos + 1000, behavior: 'smooth' });
            }
            if (this.pos + 1 == this.total) {
                this.pos = 0;
            } else {
                this.pos++;
            }
        } else {
            console.log('foi');
            var slide = document.getElementById('slide-info-lotes-destaque');
            var scrollPos = slide.scrollLeft;
            console.log('POS: ' + this.pos + ' - TOTAL: ' + this.total)
            if (this.pos == this.total - 1) {
                var limit = Math.max(document.body.scrollHeight, document.body.offsetHeight,
                    document.documentElement.clientHeight, document.documentElement.scrollHeight, document.documentElement.offsetHeight);
                slide.scroll({ top: 0, left: scrollPos - limit, behavior: 'smooth' });
            }
            if (this.pos + 1 == this.total) {
                this.pos = 0;
            } else {
                this.pos++;
            }
        }

    },
    antSlide() {
        if (!this.mobile) {
            var slide = document.getElementById('slide-info-lotes-destaque');
            var scrollPos = slide.scrollLeft;
            if (this.pos == 0) {
                var limit = Math.max(document.body.scrollHeight, document.body.offsetHeight,
                    document.documentElement.clientHeight, document.documentElement.scrollHeight, document.documentElement.offsetHeight);
                slide.scroll({ top: 0, left: scrollPos + limit, behavior: 'smooth' });
            } else {
                slide.scroll({ top: 0, left: scrollPos - 1000, behavior: 'smooth' });
            }
            if (this.pos - 1 < 0) {
                this.pos = this.total - 1;
            } else {
                this.pos--;
            }
        } else {
            var slide = document.getElementById('slide-info-lotes-destaque');
            var scrollPos = slide.scrollLeft;
            if (this.pos == 0) {
                var limit = Math.max(document.body.scrollHeight, document.body.offsetHeight,
                    document.documentElement.clientHeight, document.documentElement.scrollHeight, document.documentElement.offsetHeight);
                slide.scroll({ top: 0, left: scrollPos + limit, behavior: 'smooth' });
            }
            if (this.pos - 1 < 0) {
                this.pos = this.total - 1;
            } else {
                this.pos--;
            }
        }

    }
}">
    <div class="w-full py-5 bg-[#E3E5EA]" x-show="total > 0">
        <div class="w-full text-center">
            <h3 class="font-montserrat font-bold text-[25px] text-[#757887]">
                LOTES EM DESTAQUE
            </h3>
        </div>

        <div class="flex mx-auto mt-3 overflow-x-scroll w1200 mt-md-0 md:mt-0 md:px-5 flex-nowrap snap-mandatory snap-x no-scrollbar"
            x-swipe:left="proxSlide" x-swipe:right="antSlide" id="slide-info-lotes-destaque">
            @foreach ($lotes as $key => $lote)
                <div class="relative flex flex-wrap items-center flex-shrink-0 w-full px-5 snap-center md:flex-nowrap md:py-5"
                    x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-0"
                    x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-300"
                    x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-0">
                    <div class="w-full md:w-2/4 lg:w-3/5">
                        {!! \Util::convertYoutube($lote['video']) !!}
                    </div>
                    <div class="md:w-2/5 md:pl-10 text-[#757887]">
                        <div class="w-full mt-[20px]">
                            @if (isset($lote['fazenda']['logo_evento']) && !empty($lote['fazenda']['logo_evento']))
                                <img src="{{ asset($lote['fazenda']['logo_evento']) }}"
                                    class="md:mx-0 mx-auto md:w-[150px] md:h-auto h-[100px] mx-md-0" alt="">
                            @else
                                <img src="{{ asset($lote['fazenda']['logo']) }}"
                                    class="md:mx-0 mx-auto md:w-[150px] md:h-auto h-[100px] mx-md-0" alt="">
                            @endif
                        </div>
                        <div class="w-full mt-[20px]">
                            <div class="flex items-center w-full gap-4">
                                <p class="font-montserrat text-[14px]">
                                    LOTE: <b>{{ str_pad($lote['numero'], 3, '0', STR_PAD_LEFT) }}</b>
                                </p>
                                <div class="flex items-center justify-center w-10 h-10 text-white rounded-full bg-emerald-500"
                                    title="{{ config('tipos_animais.nomes')[$lote['tipo']] }}">
                                    <i class="{{ config('tipos_animais.icones')[$lote['tipo']] }}"></i>
                                </div>
                            </div>

                            <h1 class="font-montserrat font-bold text-[28px] text-[#E8521D] mt-1">{{ $lote['nome'] }}
                            </h1>
                        </div>
                        <div class="relative w-full">
                            <ul class="font-montserrat text-[14px]">
                                @if ($lote['beta_caseina'])
                                    <li>BETA-CASEINA: <b class="ml-2">{{ $lote['beta_caseina'] }}</b></li>
                                @endif
                                @if ($lote['registro'])
                                    <li>RGD: <b class="ml-2">{{ $lote['registro'] }}</b></li>
                                @endif
                                @if (!empty($lote['nascimento']))
                                    <li>NASCIMENTO: <b
                                            class="ml-2">{{ date('d/m/Y', strtotime($lote['nascimento'])) }}</b></li>
                                @endif
                                @if (!empty($lote['raca']))
                                    <li>RAÇA: <b class="ml-2">{{ $lote['raca']['nome'] }}</b></li>
                                @endif
                                @if (!empty($lote['sexo']))
                                    <li>SEXO: <b class="ml-2">{{ $lote['sexo'] }}</b></li>
                                @endif
                                @if (!empty($lote['especie']))
                                    <li>TIPO: <b class="ml-2">{{ $lote['especie'] }}</b></li>
                                @endif
                                @if (!empty($lote['pelagem']))
                                    <li>PELAGEM: <b class="ml-2">{{ $lote['pelagem'] }}</b></li>
                                @endif
                            </ul>
                            <img src="{{ asset('imagens/Scroll-Horizontal.svg') }}" width="50"
                                class="absolute right-0 md:hidden top-5 animate-bounce" alt="">
                        </div>
                        <div class="w-full mt-[20px] font-montserrat flex items-center">
                            <span class="font-bold text-[26px]">R$
                                {{ number_format($lote['produto']['preco'] - ($lote['produto']['preco'] * $lote['reserva']['desconto']) / 100, 2, ',', '.') }}</span>
                            <span class="font-medium text-[20px] ml-2">à vista</span>
                        </div>
                        <div class="w-full font-montserrat text-[14px] font-medium">
                            <span>Fator multiplicador: <b>{{ $lote['reserva']['max_parcelas'] }}x</b> de <b>R$
                                    {{ number_format($lote['produto']['preco'] / $lote['reserva']['max_parcelas'], 2, ',', '.') }}</b></span>
                        </div>
                        <div class="w-full mt-[20px] flex gap-x-4">
                            @if ($lote['reserva']['modalidade'] == 0)
                                @if (session()->get('cliente'))
                                    <a onclick="Livewire.emit('adicionarProduto', {{ $lote['produto']['id'] }})"
                                        class="cpointer bg-[#14C656] text-white font-montserrat text-[14px] font-medium py-[8px] px-[30px] rounded-[15px]">Adicionar
                                        ao Caminhão</a>
                                @else
                                    <a href="{{ route('login') }}"
                                        class="cpointer bg-[#14C656] text-white font-montserrat text-[14px] font-medium py-[8px] px-[30px] rounded-[15px]">Entre
                                        para comprar</a>
                                @endif
                            @else
                                <a href="https://api.whatsapp.com/send?phone=5534992754132" target="_blank"
                                    class="cpointer bg-[#14C656] text-white font-montserrat text-[14px] font-medium py-[8px] px-[30px] rounded-[15px]">Consultar</a>
                            @endif
                            <a href="{{ route('fazenda.lote', ['fazenda' => $lote['fazenda']['slug'], 'reserva' => $lote['reserva']['id'], 'lote' => $lote['id']]) }}"
                                class="cpointer bg-[#E8521D] text-white font-montserrat text-[14px] font-medium py-[8px] px-[30px] rounded-[15px]">Ver
                                Mais</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="justify-center hidden w-full md:flex gap-x-6">
            <img @click="antSlide" src="{{ asset('imagens/slide-lotes-arrow-left.png') }}"
                id="slide-lotes-visitados-left" class="cpointer" height="25" alt="">
            <img @click="proxSlide" src="{{ asset('imagens/slide-lotes-arrow-right.png') }}"
                id="slide-lotes-visitados-right" class="cpointer" height="25" alt="">
        </div>
    </div>
</div>
