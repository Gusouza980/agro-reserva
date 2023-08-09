<div class="w-full">
    <div class="w-full bg-[#F5F5F5]">
        <div class="py-5 mx-auto w1200">
            <div class="hidden w-full md:block">
                <a href="{{ route('fazenda.lotes', ['fazenda' => $lote->fazenda->slug, 'reserva' => $lote->reserva->id]) }}"
                    class="text-[#283646] text-[18px] font-montserrat font-medium hover:text-[#E8521D] transition "><i
                        class="mr-2 fas fa-chevron-left"></i> Voltar</a>
            </div>
            <div class="flex flex-wrap w-full px-4 mt-4 md:px-0 px-md-0">
                <div class="order-2 w-full mt-5 mt-md-0 md:order-1 md:w-3/5 md:mt-0">
                    <div class="hidden w-full md:block">
                        <div class="w-full">
                            {!! \App\Classes\Util::convertYoutube($lote->video) !!}
                        </div>
                        <div class="grid w-full grid-cols-1 mt-4 md:gap-5 md:grid-cols-3">
                            <div>
                                <a class="popup_preview" href="{{ asset($lote->preview) }}">
                                    <img src="{{ asset($lote->preview) }}" class="w-full transition duration-150 rounded-md hover:scale-105" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:hidden">
                        <div class="flex mx-auto overflow-x-scroll w1200 hide-scroll-bar">
                            <div class="flex flex-nowrap">
                                <div class="inline-block mx-[6px] slide-item w-[340px]">
                                    {!! \App\Classes\Util::convertYoutube($lote->video, "16/9", "h-full") !!}
                                </div>
                                <div class="inline-block mx-[6px] slide-item w-[340px]">
                                    <img src="{{ asset($lote->preview) }}" class="w-full transition duration-150 rounded-md hover:scale-105" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="order-1 w-full md:order-2 md:w-2/5 md:pl-10">
                    <div class="flex items-center justify-between w-full">
                        <div>
                            <img src="{{ asset($lote->fazenda->logo) }}" class="w-full max-w-[150px] md:max-w-[200px] " alt="">
                        </div>
                        <div class="md:hidden">
                            <a href="" class="text-[#283646] text-[18px] font-montserrat font-medium hover:text-[#E8521D] transition "><i class="mr-2 fas fa-chevron-left"></i> Voltar</a>
                        </div>

                    </div>
                    <div class="w-full my-[20px]">
                        <p class="font-montserrat text-[14px]">LOTE: <b>{{ str_pad($lote->numero, 3, '0', STR_PAD_LEFT) }}</b></p>
                        <h1 class="font-montserrat font-bold text-[28px] text-[#E8521D]">{{ $lote->nome }}</h1>
                    </div>
                    <div class="w-full">
                        <ul class="font-montserrat text-[14px]">
                            @if($lote->beta_caseina)
                                <li>BETA-CASEINA: <b class="ml-2">{{ $lote->beta_caseina }}</b></li>
                            @endif
                            @if($lote->registro)
                                <li>RGD: <b class="ml-2">{{ $lote->registro }}</b></li>
                            @endif
                            <li>NASCIMENTO: <b class="ml-2">{{ date('d/m/Y', strtotime($lote->nascimento)) }}</b></li>
                            <li>RAÇA: <b class="ml-2">{{ $lote->raca->nome }}</b></li>
                            <li>SEXO: <b class="ml-2">{{ $lote->sexo }}</b></li>
                        </ul>
                    </div>
                    @if(!$lote->reserva->encerrada)
                        <div class="w-full mt-[35px] font-montserrat flex items-center">
                            <span class="font-bold text-[33px]">R$
                                {{ number_format($lote->preco - ($lote->preco * $lote->reserva->desconto) / 100, 2, ',', '.') }}</span>
                            <span class="font-medium text-[25px] ml-2">à vista</span>
                        </div>
                        <div class="w-full font-montserrat text-[19px] font-medium">
                            <span>Fator multiplicador: <b>{{ $lote->reserva->max_parcelas }}x</b> de <b>R$
                                    {{ number_format($lote->preco / $lote->reserva->max_parcelas, 2, ',', '.') }}</b></span>
                        </div>
                        <div class="w-full font-montserrat text-[14px]">
                            <p>
                                @php
                                    $forma_pagamento = $lote->reserva->formas_pagamento->where("maximo", $lote->reserva->max_parcelas)->first();
                                    $cont_parcelas = 0;
                                @endphp
                                @if($forma_pagamento->regras->count() > 0)
                                    Pagamento em
                                    @foreach($forma_pagamento->regras->sortBy("posicao") as $regra)
                                        <b>{{ $regra->meses }} {{ config("globals.nome_parcelas")[$regra->parcelas] }}</b> 
                                        @php
                                            $cont_parcelas += $regra->meses * $regra->parcelas;
                                        @endphp
                                    @endforeach
                                    @if($cont_parcelas < $lote->reserva->max_parcelas)
                                        com o restante das parcelas sendo únicas.
                                    @endif
                                @else
                                    {{-- <b>Pagamento em parcelas únicas</b> --}}
                                @endif
                            </p>
                            <span>Mais informações relacionadas a forma de pagamento e frete, consulte <a href="#condicoes" class="font-bold text-black underline">FRETE E RETIRADA</a> e <a href="#condicoes" class="font-bold text-black underline">PAGAMENTOS E CONDIÇÕES</a> abaixo.</span>
                        </div>
                    @endif
                    @if(!$lote->reservado && !$lote->reserva->encerrada && $lote->liberar_compra)
                        <div class="w-full mt-[20px]">
                            <a onclick="Livewire.emit('adicionarProduto', {{ $lote->produto->id }})"
                                class="cpointer bg-[#14C656] text-white font-montserrat text-[18px] font-medium py-[12px] px-[60px] rounded-[15px]">Comprar</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @if($lote->membro_pacote)
        @php
            $membros = \App\Models\Lote::where("reserva_id", $lote->reserva_id)->where("numero", $lote->numero)->get();
        @endphp
        <div class="w-full bg-[#F5F5F5]">
            <div class="px-4 py-5 mx-auto text-center md:px-0 px-md-0 w1200">
                <h3 class="font-montserrat text-[25px] font-medium">Pacote</h3>
            </div>
            <div class="grid grid-cols-1 gap-5 px-4 pb-5 mx-auto md:px-0 px-md-0 md:grid-cols-3 w1200">
                @foreach($membros as $membro)
                    <div class="py-2 mt-4 caixa-lote-home cpointer" onclick="window.location.href = '{{route('fazenda.lote', ['fazenda' => $membro->reserva->fazenda->slug, 'lote' => $membro, 'reserva' => $membro->reserva])}}'">
                        <div class="caixa-lote-home-imagem"
                            style="background: url(/{{ $membro->preview }}); background-size: cover; background-position: center; width: 350px; height: 250px; border-radius: 15px; position: relative; overflow: hidden; border: 1px solid #676464;">
                            <div class="text-center justify-content-center align-items-center lote-home-hover">
                                <p style="margin-top: 12px;">{{ __('messages.botoes.compre_agora') }}</p>
                            </div>
                        </div>
                        <div class="px-4 mt-3 flex align-items-center w-full justify-content-between">
                            <div class="grow mt-2 text-left caixa-lote-home-text">
                                <span>{{ $membro->nome }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
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
                    @if ($lote->ccg)
                        <p><b class="mr-2">CCG:</b> {{ $lote->ccg }}</p>
                    @endif
                    @if ($lote->rgn)
                        <p><b class="mr-2">RGN:</b> {{ $lote->rgn }}</p>
                    @endif
                    @if ($lote->gpta)
                        <p><b class="mr-2">GPTA:</b> {{ $lote->gpta }}</p>
                    @endif
                    @if ($lote->nascimento)
                        <p><b class="mr-2">NASC:</b> {{ date('d/m/Y', strtotime($lote->nascimento)) }}</p>
                    @endif
                    @if ($lote->lactacao_total)
                        <p><b class="mr-2">LACT.:</b> {{ $lote->lactacao_total }}</p>
                    @endif
                    @if ($lote->parto)
                        <p><b class="mr-2">ULT. PARTO:</b> {{ date('d/m/Y', strtotime($lote->parto)) }}</p>
                    @endif
                    @if ($lote->previsao_parto)
                        <p><b class="mr-2">PREV. PARTO:</b> {{ date('m/Y', strtotime($lote->previsao_parto)) }}</p>
                    @endif
                    @if ($lote->peso)
                        <p><b class="mr-2">PESO:</b> {{ $lote->peso }}</p>
                    @endif
                    @if ($lote->iabczg)
                        <p><b class="mr-2">iABCZg:</b> {{ $lote->iabczg }}</p>
                    @endif
                    @if ($lote->ce)
                        <p><b class="mr-2">CE:</b> {{ $lote->ce }}</p>
                    @endif
                    @if ($lote->deca)
                        <p><b class="mr-2">DECA:</b> {{ $lote->deca }}</p>
                    @endif
                    @if ($lote->botton)
                        <p><b class="mr-2">BOTTON:</b> {{ $lote->botton }}</p>
                    @endif
                    @if ($lote->lact_atual)
                        <p><b class="mr-2">LACT. ATUAL:</b> {{ $lote->lact_atual }} Kg/dia</p>
                    @endif
                </div>
            </div>
            <div
                class="flex flex-wrap border rounded-[15px] border-[#D7D7D7] bg-white px-3 py-3 hover:scale-105 transition duration-300">
                <div class="w-full">
                    <span class="text-[#5C6384] font-montserrat font-normal text-[16px]">COMENTÁRIOS:</span>
                </div>
                <div class="w-full mt-3 break-normal">
                    {{ $lote->observacoes }}
                </div>
            </div>
        </div>
    </div>
    @if($lote->avo_paterno || $lote->avo_paterna || $lote->avo_materno || $lote->avo_materna || $lote->pai || $lote->mae)
        <div class="w-full bg-[#F5F5F5]">
            <div id="canva-genealogia" class="py-5 mx-auto w1200" style="background: url(/imagens/fundo_genealogia.png) no-repeat; background-position: center center; background-size: contain;">
                <div class="flex justify-center w-full">
                    <div class="w-[450px] px-4 py-4 text-center flex-wrap flex justify-center items-center border border-[#D7D7D7] bg-[#32343E] rounded-[15px] text-white font-montserrat text-[17px] font-medium relative" id="lote">
                        <div class="w-full">{{ $lote->nome }}</div>
                        <div class="text-[13px] font-normal w-full mt-1">{{ $lote->registro }}</div>
                    </div>
                </div>
                <div class="flex justify-center w-full mt-4 space-x-32">
                    <div class="genealogia_esquerda w-[300px] px-4 py-4 text-center flex-wrap flex justify-center items-center border border-[#D7D7D7] bg-[#32343E] rounded-[15px] text-white font-montserrat text-[17px] font-medium relative" id="avo-paterno">
                        <div class="w-full">{{ $lote->avo_paterno }}</div>
                        <div class="text-[13px] font-normal w-full mt-1">{{ $lote->rgd_avo_paterno }}</div>
                        <div class="absolute bottom-[5px] right-[15px] text-[13px] font-medium">
                            AVÔ
                        </div>
                    </div>
                    <div class="genealogia_direita w-[300px] px-4 py-4 text-center flex-wrap flex justify-center items-center border border-[#D7D7D7] bg-[#32343E] rounded-[15px] text-white font-montserrat text-[17px] font-medium relative" id="avo-materno">
                        <div class="w-full">{{ $lote->avo_materno }}</div>
                        <div class="text-[13px] font-normal w-full mt-1">{{ $lote->rgd_avo_materno }}</div>
                        <div class="absolute bottom-[5px] right-[15px] text-[13px] font-medium">
                            AVÔ
                        </div>
                    </div>
                </div>
                <div class="flex justify-center w-full mt-4 space-x-10">
                    <div class="w-[300px] px-4 py-4 text-center flex-wrap flex justify-center items-center border border-[#D7D7D7] bg-[#32343E] rounded-[15px] text-white font-montserrat text-[17px] font-medium relative" id="pai">
                        <div class="w-full">{{ $lote->pai }}</div>
                        <div class="text-[13px] font-normal w-full mt-1">{{ $lote->rgd_pai }}</div>
                        <div class="absolute bottom-[5px] right-[15px] text-[13px] font-medium">
                            PAI
                        </div>
                    </div>
                    <div class="w-[300px] px-4 py-4 text-center flex-wrap flex justify-center items-center border border-[#D7D7D7] bg-[#32343E] rounded-[15px] text-white font-montserrat text-[17px] font-medium relative" id="mae">
                        <div class="w-full">{{ $lote->mae }}</div>
                        <div class="text-[13px] font-normal w-full mt-1">{{ $lote->rgd_mae }}</div>
                        <div class="absolute bottom-[5px] right-[15px] text-[13px] font-medium">
                            MÃE
                        </div>
                        <div class="absolute bottom-[5px] left-[15px] text-[13px] font-medium">
                            {{ $lote->lactacao_mae }}
                        </div>
                    </div>
                </div>
                <div class="flex justify-center w-full mt-4 space-x-32">
                    <div class="genealogia_esquerda w-[300px] px-4 py-4 text-center flex-wrap flex justify-center items-center border border-[#D7D7D7] bg-[#32343E] rounded-[15px] text-white font-montserrat text-[17px] font-medium relative" id="avo-paterna">
                        <div class="w-full">{{ $lote->avo_paterna }}</div>
                        <div class="text-[13px] font-normal w-full mt-1">{{ $lote->rgd_avo_paterna }}</div>
                        <div class="absolute bottom-[5px] right-[15px] text-[13px] font-medium">
                            AVÓ
                        </div>
                        <div class="absolute bottom-[5px] left-[15px] text-[13px] font-medium">
                            {{ $lote->lactacao_avo_paterna }}
                        </div>
                    </div>
                    <div class="genealogia_direita w-[300px] px-4 py-4 text-center flex-wrap flex justify-center items-center border border-[#D7D7D7] bg-[#32343E] rounded-[15px] text-white font-montserrat text-[17px] font-medium relative" id="avo-materna">
                        <div class="w-full">{{ $lote->avo_materna }}</div>
                        <div class="text-[13px] font-normal w-full mt-1">{{ $lote->rgd_avo_materna }}</div>
                        <div class="absolute bottom-[5px] right-[15px] text-[13px] font-medium">
                            AVÓ
                        </div>
                        <div class="absolute bottom-[5px] left-[15px] text-[13px] font-medium">
                            {{ $lote->lactacao_avo_materna }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div id="condicoes" class="w-full bg-[#F5F5F5] py-5">
        <div class="flex flex-wrap items-start px-4 mx-auto space-y-5 md:px-0 px-md-0 md:space-y-0 md:space-x-5 w1200">
            <div class="flex-1 px-[25px] py-[25px] border-2 border-[#D7D7D7] rounded-[15px]" x-data="{ open: false }">
                <div class="flex items-center justify-center w-full space-x-6">
                    <div class="">
                        <img src="{{ asset('imagens/caminhao_frete_lote.svg') }}" width="70" alt="">
                    </div>
                    <div class="">
                        <span class="font-gobold font-medium text-[30px] text-[#FEAF2A]">FRETE E<br>RETIRADA</span>
                    </div>
                </div>
                <div class="w-full">
                    <div x-show="open" x-cloak class="w-full border-t border-[#D7D7D7] mt-[35px] pt-3 font-montserrat" x-transition:enter="duration-150" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                    x-transition:leave="duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                        {!! $lote->reserva->texto_local_retirada !!}
                    </div>
                </div>
                <div class="w-full mt-[35px] text-center font-montserrat text-[#80828B] font-medium text-[18px]">
                    <span x-show="!open" class="cpointer" @click="open = true;">Ver mais <i class="ml-2 fas fa-chevron-down"></i></span>
                    <span x-show="open" x-cloak class="cpointer" @click="open = false;">Ver menos <i class="ml-2 fas fa-chevron-up"></i></span>
                </div>
            </div>
            <div class="flex-1 px-[25px] py-[25px] border-2 border-[#D7D7D7] rounded-[15px]" x-data="{ open: false }">
                <div class="flex items-center justify-center w-full space-x-4">
                    <div class="">
                        <img src="{{ asset('imagens/pagamento_lote.svg') }}" width="70" alt="">
                    </div>
                    <div class="">
                        <span class="font-gobold font-medium text-[30px] text-[#FEAF2A]">PAGAMENTOS<br>E CONDIÇÕES</span>
                    </div>
                </div>
                <div class="w-full">
                    <div x-show="open" x-cloak class="w-full border-t border-[#D7D7D7] mt-[35px] pt-3 font-montserrat" x-transition:enter="duration-150" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                    x-transition:leave="duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                        {!! $lote->reserva->texto_forma_pagamento !!}
                    </div>
                </div>
                <div class="w-full mt-[35px] text-center font-montserrat text-[#80828B] font-medium text-[18px]">
                    <span x-show="!open" class="cpointer" @click="open = true;">Ver mais <i class="ml-2 fas fa-chevron-down"></i></span>
                    <span x-show="open" x-cloak class="cpointer" @click="open = false;">Ver menos <i class="ml-2 fas fa-chevron-up"></i></span>
                </div>
            </div>
            <div class="flex-1 px-[25px] py-[25px] border-2 border-[#D7D7D7] rounded-[15px]" x-data="{ open: false }">
                <div class="flex items-center justify-center w-full space-x-4">
                    <div class="">
                        <img src="{{ asset('imagens/seguranca_lote.svg') }}" width="70" alt="">
                    </div>
                    <div class="">
                        <span class="font-gobold font-medium text-[30px] text-[#FEAF2A]">SEGURANÇA E<br>PRIVACIDADE</span>
                    </div>
                </div>
                <div class="w-full">
                    <div x-show="open" x-cloak class="w-full border-t border-[#D7D7D7] mt-[35px] pt-3 font-montserrat" x-transition:enter="duration-150" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                    x-transition:leave="duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                        <p>A Agro Reserva toma todas as medidas cabíveis para garantir o cumprimento dos padrões de
                            confidencialidade e segurança, firmando acordos ou contratos com o objetivo de proteger a
                            privacidade dos dados pessoais de nossos usuários e cumprir a legislação aplicável.</p>
                        <p>Para mais informações, fale com a gente nos canais de atendimento disponíveis no site.</p>
                    </div>
                </div>
                <div class="w-full mt-[35px] text-center font-montserrat text-[#80828B] font-medium text-[18px]">
                    <span x-show="!open" class="cpointer" @click="open = true;">Ver mais <i class="ml-2 fas fa-chevron-down"></i></span>
                    <span x-show="open" x-cloak class="cpointer" @click="open = false;">Ver menos <i class="ml-2 fas fa-chevron-up"></i></span>
                </div>
            </div>
        </div>
    </div>
    @if(!$lote->reserva->encerrada)
        <div class="w-full bg-[#F5F5F5] py-5">
            <div class="mx-auto w1200">
                <div class="w-full mb-3 text-center">
                    <h3 class="font-montserrat font-medium text-[25px] text-[#15171E]">Animais da Reserva</h3>
                </div>
                <x-institucional.slide-lotes-destaque :lotes="$lote->reserva->lotes"></x-institucional.slide-lotes-destaque>
            </div>
        </div>
    @endif
</div>

@push("scripts")

    <script>
        // function getOffset(el){
        //     var rect = el.getBoundingClientRect();
        //     return {
        //         left: rect.left + window.pageXOffset,
        //         top: rect.top + window.pageYOffset,
        //         bottom: rect.top + window.pageYOffset + (rect.height || el.offsetHeight),
        //         width: rect.width || el.offsetWidth,
        //         height: rect.height || el.offsetHeight
        //     };
        // }

        // function connect(){
        //     var color = "#80828B";
        //     var thickness = 1;
        //     var espacamento_linha = 15; //ESPAÇAMENTO ENTRE A LINHA E O CANTO DO QUADRADO

        //     var lote = document.getElementById('lote')
        //     var pai = document.getElementById('pai')
        //     var mae = document.getElementById('mae')
        //     var avo_paterno = document.getElementById('avo-paterno')
        //     var avo_materno = document.getElementById('avo-materno')
        //     var avo_paterna = document.getElementById('avo-paterna')
        //     var avo_materna = document.getElementById('avo-materna')

        //     var htmlLine = "";
        //     var off1, off2, x1, x2, y1, y2, lenght, cx, cy, angle = null;

        //     pai = getOffset(pai);
        //     mae = getOffset(mae);
        //     avo_paterno = getOffset(avo_paterno);
        //     avo_materno = getOffset(avo_materno);
        //     avo_paterna = getOffset(avo_paterna);
        //     avo_materna = getOffset(avo_materna);
        //     lote = getOffset(lote);
            
        //     // AVÔ PATERNO E AVÓ PATERNA ----------------------------------------------------------
            
        //     x1 = avo_paterna.left + espacamento_linha;
        //     y1 = avo_paterna.top;

        //     x2 = avo_paterno.left + espacamento_linha;
        //     y2 = avo_paterno.bottom;

        //     length = Math.sqrt(((x2 - x1) * (x2 - x1)) + ((y2 - y1) * (y2 - y1)));

        //     cx = ((x1 + x2) / 2) - (length / 2);
        //     cy = ((y1 + y2) / 2) - (thickness / 2);

        //     angle = Math.atan2((y1 - y2), (x1 - x2)) * (180 / Math.PI);

        //     htmlLine = "<div id='ligacao_avos_paternos' class='transition duration-150' style='padding:0px; margin:0px; height:" + thickness + "px; background-color:" + color + "; line-height:1px; position:absolute; left:" + cx + "px; top:" + cy + "px; width:" + length + "px; -moz-transform:rotate(" + angle + "deg); -webkit-transform:rotate(" + angle + "deg); -o-transform:rotate(" + angle + "deg); -ms-transform:rotate(" + angle + "deg); transform:rotate(" + angle + "deg);'></div>";

        //     document.body.innerHTML += htmlLine;

        //     // --------------------------------------------------

        //     // AVÓS PATERNOS E O PAI

        //     var ligacao_avos_paternos = document.getElementById("ligacao_avos_paternos");

        //     ligacao_avos_paternos = getOffset(ligacao_avos_paternos);

        //     x1 = ligacao_avos_paternos.left;
        //     y1 = ligacao_avos_paternos.top + ligacao_avos_paternos.height/2;

        //     x2 = pai.left;
        //     y2 = pai.top + pai.height/2;

        //     length = Math.sqrt(((x2 - x1) * (x2 - x1)) + ((y2 - y1) * (y2 - y1)));

        //     cx = ((x1 + x2) / 2) - (length / 2);
        //     cy = ((y1 + y2) / 2) - (thickness / 2);

        //     angle = Math.atan2((y1 - y2), (x1 - x2)) * (180 / Math.PI);

        //     htmlLine = "<div id='ligacao_pai_avos' class='transition duration-150' style='padding:0px; margin:0px; height:" + thickness + "px; background-color:" + color + "; line-height:1px; position:absolute; left:" + cx + "px; top:" + cy + "px; width:" + length + "px; -moz-transform:rotate(" + angle + "deg); -webkit-transform:rotate(" + angle + "deg); -o-transform:rotate(" + angle + "deg); -ms-transform:rotate(" + angle + "deg); transform:rotate(" + angle + "deg);'></div>";

        //     document.body.innerHTML += htmlLine;

        //     // ------------------------------------------------------------

        //     // AVÔ MATERNO E AVÓ MATERNA ----------------------------------------------------------
            
        //     x1 = avo_materna.left + avo_materna.width - espacamento_linha;
        //     y1 = avo_materna.top;

        //     x2 = avo_materno.left + avo_materno.width - espacamento_linha;
        //     y2 = avo_materno.bottom;

        //     length = Math.sqrt(((x2 - x1) * (x2 - x1)) + ((y2 - y1) * (y2 - y1)));

        //     cx = ((x1 + x2) / 2) - (length / 2);
        //     cy = ((y1 + y2) / 2) - (thickness / 2);

        //     angle = Math.atan2((y1 - y2), (x1 - x2)) * (180 / Math.PI);

        //     htmlLine = "<div id='ligacao_avos_maternos' class='transition duration-150' style='padding:0px; margin:0px; height:" + thickness + "px; background-color:" + color + "; line-height:1px; position:absolute; left:" + cx + "px; top:" + cy + "px; width:" + length + "px; -moz-transform:rotate(" + angle + "deg); -webkit-transform:rotate(" + angle + "deg); -o-transform:rotate(" + angle + "deg); -ms-transform:rotate(" + angle + "deg); transform:rotate(" + angle + "deg);'></div>";

        //     document.body.innerHTML += htmlLine;

        //     // --------------------------------------------------

        //     // AVÓS MATERNOS E O PAI

        //     var ligacao_avos_maternos = document.getElementById("ligacao_avos_maternos");

        //     ligacao_avos_maternos = getOffset(ligacao_avos_maternos);

        //     x1 = ligacao_avos_maternos.left;
        //     y1 = ligacao_avos_maternos.top + ligacao_avos_maternos.height/2;

        //     x2 = mae.left + mae.width;
        //     y2 = mae.top + mae.height/2;

        //     length = Math.sqrt(((x2 - x1) * (x2 - x1)) + ((y2 - y1) * (y2 - y1)));

        //     cx = ((x1 + x2) / 2) - (length / 2);
        //     cy = ((y1 + y2) / 2) - (thickness / 2);

        //     angle = Math.atan2((y1 - y2), (x1 - x2)) * (180 / Math.PI);

        //     htmlLine = "<div id='ligacao_mae_avos' class='transition duration-150' style='padding:0px; margin:0px; height:" + thickness + "px; background-color:" + color + "; line-height:1px; position:absolute; left:" + cx + "px; top:" + cy + "px; width:" + length + "px; -moz-transform:rotate(" + angle + "deg); -webkit-transform:rotate(" + angle + "deg); -o-transform:rotate(" + angle + "deg); -ms-transform:rotate(" + angle + "deg); transform:rotate(" + angle + "deg);'></div>";

        //     document.body.innerHTML += htmlLine;

        //     // ------------------------------------------------------------

        //     // LINHA CENTRAL

        //     x1 = lote.left + lote.width/2;
        //     y1 = lote.top + lote.height;

        //     x2 = x1;
        //     y2 = pai.top + pai.height/2;

        //     length = Math.sqrt(((x2 - x1) * (x2 - x1)) + ((y2 - y1) * (y2 - y1)));

        //     cx = ((x1 + x2) / 2) - (length / 2);
        //     cy = ((y1 + y2) / 2) - (thickness / 2);

        //     angle = Math.atan2((y1 - y2), (x1 - x2)) * (180 / Math.PI);

        //     htmlLine = "<div id='linha_central' class='transition duration-150' style='padding:0px; margin:0px; height:" + thickness + "px; background-color:" + color + "; line-height:1px; position:absolute; left:" + cx + "px; top:" + cy + "px; width:" + length + "px; -moz-transform:rotate(" + angle + "deg); -webkit-transform:rotate(" + angle + "deg); -o-transform:rotate(" + angle + "deg); -ms-transform:rotate(" + angle + "deg); transform:rotate(" + angle + "deg);'></div>";

        //     document.body.innerHTML += htmlLine;

        //     // ----------------------------------------------------------

        //     // LIGAÇÃO PAI E LINHA CENTRAL

        //     x1 = pai.left + pai.width;
        //     y1 = pai.top + pai.height/2;

        //     x2 = lote.left + lote.width/2;
        //     y2 = y1;

        //     length = Math.sqrt(((x2 - x1) * (x2 - x1)) + ((y2 - y1) * (y2 - y1)));

        //     cx = ((x1 + x2) / 2) - (length / 2);
        //     cy = ((y1 + y2) / 2) - (thickness / 2);

        //     angle = Math.atan2((y1 - y2), (x1 - x2)) * (180 / Math.PI);

        //     htmlLine = "<div id='ligacao_pai_linha_central' class='transition duration-150' style='padding:0px; margin:0px; height:" + thickness + "px; background-color:" + color + "; line-height:1px; position:absolute; left:" + cx + "px; top:" + cy + "px; width:" + length + "px; -moz-transform:rotate(" + angle + "deg); -webkit-transform:rotate(" + angle + "deg); -o-transform:rotate(" + angle + "deg); -ms-transform:rotate(" + angle + "deg); transform:rotate(" + angle + "deg);'></div>";

        //     document.body.innerHTML += htmlLine;

        //     // ----------------------------------------------------

        //     // LIGAÇÃO PAI E LINHA CENTRAL

        //     x1 = mae.left;
        //     y1 = mae.top + mae.height/2;

        //     x2 = lote.left + lote.width/2;
        //     y2 = y1;

        //     length = Math.sqrt(((x2 - x1) * (x2 - x1)) + ((y2 - y1) * (y2 - y1)));

        //     cx = ((x1 + x2) / 2) - (length / 2);
        //     cy = ((y1 + y2) / 2) - (thickness / 2);

        //     angle = Math.atan2((y1 - y2), (x1 - x2)) * (180 / Math.PI);

        //     htmlLine = "<div id='ligacao_mae_linha_central' class='transition duration-150' style='padding:0px; margin:0px; height:" + thickness + "px; background-color:" + color + "; line-height:1px; position:absolute; left:" + cx + "px; top:" + cy + "px; width:" + length + "px; -moz-transform:rotate(" + angle + "deg); -webkit-transform:rotate(" + angle + "deg); -o-transform:rotate(" + angle + "deg); -ms-transform:rotate(" + angle + "deg); transform:rotate(" + angle + "deg);'></div>";

        //     document.body.innerHTML += htmlLine;

        //     // ----------------------------------------------------

        //     // document.body.innerHTML += htmlLine;
        // }

        // connect()

        $(document).ready(function(){

            // $(window).resize(function(){
            //     connect();
            // });

            // EFEITOS DE HOVER DO LADO ESQUERDO
            // $(".genealogia_esquerda").mouseover(function(){
            //     $("#ligacao_avos_paternos").css("background", "#E8521D");
            //     $("#ligacao_pai_avos").css("background", "#E8521D");
            //     $("#ligacao_avos_paternos").css("height", "2");
            //     $("#ligacao_pai_avos").css("height", "2");
            // })
            // $(".genealogia_esquerda").mouseout(function(){
            //     $("#ligacao_avos_paternos").css("background", "#80828B");
            //     $("#ligacao_pai_avos").css("background", "#80828B");
            //     $("#ligacao_avos_paternos").css("height", "1");
            //     $("#ligacao_pai_avos").css("height", "1");
            // })

            // $("#pai").mouseover(function(){
            //     $("#ligacao_avos_paternos").css("background", "#E8521D");
            //     $("#ligacao_pai_avos").css("background", "#E8521D");
            //     $("#ligacao_pai_linha_central").css("background", "#E8521D");
            //     $("#linha_central").css("background", "#E8521D");
            //     $("#ligacao_avos_paternos").css("height", "2");
            //     $("#ligacao_pai_avos").css("height", "2");
            //     $("#ligacao_pai_linha_central").css("height", "2");
            //     $("#linha_central").css("height", "2");
            // })
            // $("#pai").mouseout(function(){
            //     $("#ligacao_avos_paternos").css("background", "#80828B");
            //     $("#ligacao_pai_avos").css("background", "#80828B");
            //     $("#ligacao_pai_linha_central").css("background", "#80828B");
            //     $("#linha_central").css("background", "#80828B");
            //     $("#ligacao_avos_paternos").css("height", "1");
            //     $("#ligacao_pai_avos").css("height", "1");
            //     $("#ligacao_pai_linha_central").css("height", "1");
            //     $("#linha_central").css("height", "1");
            // })

            // EFEITOS DE HOVER DO LADO DIREITO
            // $(".genealogia_direita").mouseover(function(){
            //     $("#ligacao_avos_maternos").css("background", "#E8521D");
            //     $("#ligacao_mae_avos").css("background", "#E8521D");
            //     $("#ligacao_avos_maternos").css("height", "2");
            //     $("#ligacao_mae_avos").css("height", "2");
            // })
            // $(".genealogia_direita").mouseout(function(){
            //     $("#ligacao_avos_maternos").css("background", "#80828B");
            //     $("#ligacao_mae_avos").css("background", "#80828B");
            //     $("#ligacao_avos_maternos").css("height", "1");
            //     $("#ligacao_mae_avos").css("height", "1");
            // })

            // $("#mae").mouseover(function(){
            //     $("#ligacao_avos_maternos").css("background", "#E8521D");
            //     $("#ligacao_mae_avos").css("background", "#E8521D");
            //     $("#ligacao_mae_linha_central").css("background", "#E8521D");
            //     $("#linha_central").css("background", "#E8521D");
            //     $("#ligacao_avos_maternos").css("height", "2");
            //     $("#ligacao_mae_avos").css("height", "2");
            //     $("#ligacao_mae_linha_central").css("height", "2");
            //     $("#linha_central").css("height", "2");
            // })

            // $("#mae").mouseout(function(){
            //     $("#ligacao_avos_maternos").css("background", "#80828B");
            //     $("#ligacao_mae_avos").css("background", "#80828B");
            //     $("#ligacao_mae_linha_central").css("background", "#80828B");
            //     $("#linha_central").css("background", "#80828B");
            //     $("#ligacao_avos_maternos").css("height", "1");
            //     $("#ligacao_mae_avos").css("height", "1");
            //     $("#ligacao_mae_linha_central").css("height", "1");
            //     $("#linha_central").css("height", "1");
            // })

            // EFEITOS DEHOVER NO LOTE
            // $("#lote").mouseover(function(){
            //     $("#ligacao_mae_linha_central").css("background", "#E8521D");
            //     $("#ligacao_pai_linha_central").css("background", "#E8521D");
            //     $("#linha_central").css("background", "#E8521D");
            //     $("#ligacao_mae_linha_central").css("height", "2");
            //     $("#ligacao_pai_linha_central").css("height", "2");
            //     $("#linha_central").css("height", "2");
            // })
            
            // $("#lote").mouseout(function(){
            //     $("#ligacao_mae_linha_central").css("background", "#80828B");
            //     $("#ligacao_pai_linha_central").css("background", "#80828B");
            //     $("#linha_central").css("background", "#80828B");
            //     $("#ligacao_mae_linha_central").css("height", "1");
            //     $("#ligacao_pai_linha_central").css("height", "1");
            //     $("#linha_central").css("height", "1");
            // })

            $('.popup_preview').magnificPopup({type:'image'});
        })
    </script>

@endpush