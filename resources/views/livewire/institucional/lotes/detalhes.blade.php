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
                                    <img src="{{ asset($lote->preview) }}"
                                        class="w-full transition duration-150 rounded-md hover:scale-105"
                                        alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:hidden">
                        <div class="w-full flex justify-start md:hidden gap-3 px-2 mb-2">
                            <img src="{{ asset('imagens/slide-lotes-arrow-left.png') }}" class="cpointer"
                                id="swiper-button-prev" height="25" alt="">
                            <img src="{{ asset('imagens/slide-lotes-arrow-right.png') }}" class="cpointer"
                                id="swiper-button-next" height="25" alt="">
                        </div>
                        <div class="swiper"id="imagens-lote">
                            <div class="swiper-wrapper cursor-pointer">
                                <div
                                    class="inline-block mx-[6px] w-[340px] !h-[250px] swiper-slide rounded-md overflow-hidden cursor-pointer">
                                    {!! \App\Classes\Util::convertYoutube($lote->video, '16/9', 'h-full') !!}
                                </div>
                                <div class="inline-block mx-[6px] w-[340px]  swiper-slide cursor-pointer">
                                    <img src="{{ asset($lote->preview) }}"
                                        class="w-full transition duration-150 !h-[250px] rounded-md hover:scale-105"
                                        alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="order-1 w-full md:order-2 md:w-2/5 md:pl-10">
                    <div class="flex items-center justify-between w-full">
                        <div>
                            @if ($lote->fazenda->logo_evento)
                                <img src="{{ asset($lote->fazenda->logo_evento) }}"
                                    class="w-full max-w-[150px] md:max-w-[200px] " alt="">
                            @else
                                <img src="{{ asset($lote->fazenda->logo) }}"
                                    class="w-full max-w-[150px] md:max-w-[200px] " alt="">
                            @endif

                        </div>
                        <div class="md:hidden">
                            <a href=""
                                class="text-[#283646] text-[18px] font-montserrat font-medium hover:text-[#E8521D] transition "><i
                                    class="mr-2 fas fa-chevron-left"></i> Voltar</a>
                        </div>

                    </div>
                    <div class="w-full my-[20px]">
                        <div class="flex items-center justify-start gap-4">
                            {{-- <span class="font-montserrat text-[14px]">
                                <b>{{ config('tipos_animais.nomes')[$lote->tipo] }}</b>
                            </span> --}}
                            <div class="font-montserrat text-[14px]">
                                LOTE: <b>{{ str_pad($lote->numero, 3, '0', STR_PAD_LEFT) }}</b>
                            </div>
                            <div class="bg-emerald-500 text-white rounded-full w-8 h-8 flex items-center justify-center"
                                title="{{ config('tipos_animais.nomes')[$lote->tipo] }}">
                                <i class="{{ config('tipos_animais.icones')[$lote->tipo] }}"></i>
                            </div>
                        </div>

                        <h1 class="font-montserrat font-bold text-[28px] text-[#E8521D]">{{ $lote->nome }}</h1>
                    </div>
                    <div class="w-full">
                        <ul class="font-montserrat text-[14px]">
                            @if ($lote->beta_caseina)
                                <li>BETA-CASEINA: <b class="ml-2">{{ $lote->beta_caseina }}</b></li>
                            @endif
                            @if ($lote->registro)
                                <li>RGD: <b class="ml-2">{{ $lote->registro }}</b></li>
                            @endif
                            @if ($lote->nascimento)
                                <li>NASCIMENTO: <b class="ml-2">{{ date('d/m/Y', strtotime($lote->nascimento)) }}</b>
                                </li>
                            @endif
                            @if ($lote->raca)
                                <li>RAÇA: <b class="ml-2">{{ $lote->raca->nome }}</b></li>
                            @endif
                            @if ($lote->sexo)
                                <li>SEXO: <b class="ml-2">{{ $lote->sexo }}</b></li>
                            @endif
                            @if ($lote->especie)
                                <li>TIPO: <b class="ml-2">{{ $lote->especie }}</b></li>
                            @endif
                            @if ($lote->pelagem)
                                <li>PELAGEM: <b class="ml-2">{{ $lote->pelagem }}</b></li>
                            @endif
                        </ul>
                    </div>
                    @if (!$lote->reserva->encerrada)
                        @if ($lote->reserva->modalidade == 0)
                            <div class="w-full mt-[35px] font-montserrat flex items-center">
                                <span class="font-bold text-[33px]">R$
                                    {{ number_format($lote->preco - ($lote->preco * $lote->reserva->desconto) / 100, 2, ',', '.') }}</span>
                                <span class="font-medium text-[25px] ml-2">à vista</span>
                            </div>
                            <div class="w-full font-montserrat text-[19px] font-medium">
                                <span>Fator multiplicador: <b>{{ $lote->reserva->max_parcelas }}x</b> de <b>R$
                                        {{ number_format($lote->preco / $lote->reserva->max_parcelas, 2, ',', '.') }}</b></span>
                            </div>
                        @else
                            <div class="w-full my-4">
                                <a href="https://api.whatsapp.com/send?phone=5534992754132" target="_blank"
                                    class="rounded-md w-fit flex items-center justify-center py-1 px-3 bg-emerald-500 hover:bg-emerald-700 text-white transition duration-200">Entrar
                                    em contato</a>
                            </div>
                        @endif
                        <div class="w-full font-montserrat text-[14px]">
                            {{-- <p>
                                @php
                                    $forma_pagamento = $lote->reserva->formas_pagamento->where("maximo", $lote->reserva->max_parcelas)->first();
                                    $cont_parcelas = 0;
                                @endphp
                                @if ($forma_pagamento->regras->count() > 0)
                                    Pagamento em
                                    @foreach ($forma_pagamento->regras->sortBy('posicao') as $regra)
                                        <b>{{ $regra->meses }} {{ config("globals.nome_parcelas")[$regra->parcelas] }}</b>
                                        @php
                                            $cont_parcelas += $regra->meses * $regra->parcelas;
                                        @endphp
                                    @endforeach
                                    @if ($cont_parcelas < $lote->reserva->max_parcelas)
                                        com o restante das parcelas sendo únicas.
                                    @endif
                                @else
                                    <b>Pagamento em parcelas únicas</b>
                                @endif
                            </p> --}}
                            <span>Mais informações relacionadas a forma de pagamento e frete, consulte <a
                                    href="#condicoes" class="font-bold text-black underline">FRETE E RETIRADA</a> e <a
                                    href="#condicoes" class="font-bold text-black underline">PAGAMENTOS E CONDIÇÕES</a>
                                abaixo.</span>
                        </div>
                    @endif
                    @if (!$lote->reservado && !$lote->reserva->encerrada && $lote->liberar_compra && $lote->reserva->modalidade == 0)
                        @php
                            $numeros = ['5534992754132', '5534996920202'];
                            $sorteado = array_rand($numeros, 1);
                        @endphp
                        <div
                            class="w-full flex md:flex-row flex-col gap-4 mt-[20px] items-center justify-center md:justify-start">
                            @if (session()->get('cliente'))
                                <a onclick="Livewire.emit('adicionarProduto', {{ $lote->produto->id }})"
                                    class="md:w-full text-center w-fit cpointer bg-[#14C656] text-white font-montserrat text-[14px] font-medium py-[12px] px-[20px] rounded-[15px]">Adicionar
                                    ao Caminhão</a>
                            @else
                                <a href="{{ route('login') }}"
                                    class="md:w-full w-fit text-center cpointer bg-[#14C656] text-white font-montserrat text-[14px] font-medium py-[12px] px-[20px] rounded-[15px]">Entre
                                    para comprar</a>
                            @endif
                            <a href="https://wa.me/{{ $numeros[$sorteado] }}" target="_blank"
                                class="md:w-full text-center w-fit cpointer bg-gray-600 text-white font-montserrat text-[14px] font-medium py-[12px] px-[20px] rounded-[15px]">Comprar
                                com Consultor</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @if ($lote->membro_pacote)
        @php
            $membros = \App\Models\Lote::where('reserva_id', $lote->reserva_id)
                ->where('numero', $lote->numero)
                ->get();
        @endphp
        <div class="w-full bg-[#F5F5F5]">
            <div class="px-4 py-5 mx-auto text-center md:px-0 px-md-0 w1200">
                <h3 class="font-montserrat text-[25px] font-medium">Pacote</h3>
            </div>
            <div class="grid grid-cols-1 gap-5 px-4 pb-5 mx-auto md:px-0 px-md-0 md:grid-cols-3 w1200">
                @foreach ($membros as $membro)
                    <div class="py-2 mt-4 caixa-lote-home cpointer"
                        onclick="window.location.href = '{{ route('fazenda.lote', ['fazenda' => $membro->reserva->fazenda->slug, 'lote' => $membro, 'reserva' => $membro->reserva]) }}'">
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
                    @if ($lote->lact_atual)
                        <p><b class="mr-2">CHIP:</b> {{ $lote->chip }}</p>
                    @endif
                    @if ($lote->lact_atual)
                        <p><b class="mr-2">COBERT:</b> {{ $lote->lact_atual }} Kg/dia</p>
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
    @if ($lote->avo_paterno || $lote->avo_paterna || $lote->avo_materno || $lote->avo_materna || $lote->pai || $lote->mae)
        <div class="w-full bg-[#F5F5F5]">
            <div id="canva-genealogia" class="py-5 mx-auto w1200"
                style="background: url(/imagens/fundo_genealogia.png) no-repeat; background-position: center center; background-size: contain;">
                <div class="flex justify-center w-full">
                    <div class="w-[450px] px-4 py-4 text-center flex-wrap flex justify-center items-center border border-[#D7D7D7] bg-[#32343E] rounded-[15px] text-white font-montserrat text-[17px] font-medium relative"
                        id="lote">
                        <div class="w-full">{{ $lote->nome }}</div>
                        <div class="text-[13px] font-normal w-full mt-1">{{ $lote->registro }}</div>
                    </div>
                </div>
                <div class="flex justify-center w-full mt-4 space-x-32">
                    <div class="genealogia_esquerda w-[300px] px-4 py-6 text-center flex-wrap flex justify-center items-center border border-[#D7D7D7] bg-[#32343E] rounded-[15px] text-white font-montserrat text-[17px] font-medium relative"
                        id="avo-paterno">
                        <div class="w-full">{{ $lote->avo_paterno }}</div>
                        <div class="text-[13px] font-normal w-full mt-1">{{ $lote->rgd_avo_paterno }}</div>
                        <div class="absolute top-[5px] right-[15px] text-[9px] font-medium">
                            AVÔ
                        </div>
                    </div>
                    <div class="genealogia_direita w-[300px] px-4 py-6 text-center flex-wrap flex justify-center items-center border border-[#D7D7D7] bg-[#32343E] rounded-[15px] text-white font-montserrat text-[17px] font-medium relative"
                        id="avo-materno">
                        <div class="w-full">{{ $lote->avo_materno }}</div>
                        <div class="text-[13px] font-normal w-full mt-1">{{ $lote->rgd_avo_materno }}</div>
                        <div class="absolute top-[5px] right-[15px] text-[9px] font-medium">
                            AVÔ
                        </div>
                    </div>
                </div>
                <div class="flex justify-center w-full mt-4 space-x-10">
                    <div class="w-[300px] px-4 py-6 text-center flex-wrap flex justify-center items-center border border-[#D7D7D7] bg-[#32343E] rounded-[15px] text-white font-montserrat text-[17px] font-medium relative"
                        id="pai">
                        <div class="w-full">{{ $lote->pai }}</div>
                        <div class="text-[13px] font-normal w-full mt-1">{{ $lote->rgd_pai }}</div>
                        <div class="absolute top-[5px] right-[15px] text-[9px] font-medium">
                            PAI
                        </div>
                    </div>
                    <div class="w-[300px] px-4 py-6 text-center flex-wrap flex justify-center items-center border border-[#D7D7D7] bg-[#32343E] rounded-[15px] text-white font-montserrat text-[17px] font-medium relative"
                        id="mae">
                        <div class="w-full">{{ $lote->mae }}</div>
                        <div class="text-[13px] font-normal w-full mt-1">{{ $lote->rgd_mae }}</div>
                        <div class="absolute top-[5px] right-[15px] text-[9px] font-medium">
                            MÃE
                        </div>
                        <div class="absolute bottom-[5px] mt-3 text-[11px] font-medium">
                            {{ $lote->lactacao_mae }}
                        </div>
                    </div>
                </div>
                <div class="flex justify-center w-full mt-4 space-x-32">
                    <div class="genealogia_esquerda w-[300px] px-4 py-6 text-center flex-wrap flex justify-center items-center border border-[#D7D7D7] bg-[#32343E] rounded-[15px] text-white font-montserrat text-[17px] font-medium relative"
                        id="avo-paterna">
                        <div class="w-full">{{ $lote->avo_paterna }}</div>
                        <div class="text-[13px] font-normal w-full mt-1">{{ $lote->rgd_avo_paterna }}</div>
                        <div class="absolute top-[5px] right-[15px] text-[9px] font-medium">
                            AVÓ
                        </div>
                        <div class="absolute bottom-[5px] mt-3 text-[11px] font-medium">
                            {{ $lote->lactacao_avo_paterna }}
                        </div>
                    </div>
                    <div class="genealogia_direita w-[300px] px-4 py-6 text-center flex-wrap flex justify-center items-center border border-[#D7D7D7] bg-[#32343E] rounded-[15px] text-white font-montserrat text-[17px] font-medium relative"
                        id="avo-materna">
                        <div class="w-full">{{ $lote->avo_materna }}</div>
                        <div class="text-[13px] font-normal w-full mt-1">{{ $lote->rgd_avo_materna }}</div>
                        <div class="absolute top-[5px] right-[15px] text-[9px] font-medium">
                            AVÓ
                        </div>
                        <div class="absolute bottom-[5px] mt-3 text-[11px] font-medium">
                            {{ $lote->lactacao_avo_materna }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div id="condicoes" class="w-full bg-[#F5F5F5] py-5">
        <div class="grid lg:grid-cols-3 grid-cols-1 items-start px-4 gap-4 w1200 mx-auto">
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
                    <div x-show="open" x-cloak
                        class="w-full border-t border-[#D7D7D7] mt-[35px] pt-3 font-montserrat"
                        x-transition:enter="duration-150" x-transition:enter-start="opacity-0"
                        x-transition:enter-end="opacity-100" x-transition:leave="duration-150"
                        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                        {!! $lote->reserva->texto_local_retirada !!}
                    </div>
                </div>
                <div class="w-full mt-[35px] text-center font-montserrat text-[#80828B] font-medium text-[18px]">
                    <span x-show="!open" class="cpointer" @click="open = true;">Ver mais <i
                            class="ml-2 fas fa-chevron-down"></i></span>
                    <span x-show="open" x-cloak class="cpointer" @click="open = false;">Ver menos <i
                            class="ml-2 fas fa-chevron-up"></i></span>
                </div>
            </div>
            <div class="flex-1 px-[25px] py-[25px] border-2 border-[#D7D7D7] rounded-[15px]" x-data="{ open: false }">
                <div class="flex items-center justify-center w-full space-x-4">
                    <div class="">
                        <img src="{{ asset('imagens/pagamento_lote.svg') }}" width="70" alt="">
                    </div>
                    <div class="">
                        <span class="font-gobold font-medium text-[30px] text-[#FEAF2A]">PAGAMENTOS<br>E
                            CONDIÇÕES</span>
                    </div>
                </div>
                <div class="w-full">
                    <div x-show="open" x-cloak
                        class="w-full border-t border-[#D7D7D7] mt-[35px] pt-3 font-montserrat"
                        x-transition:enter="duration-150" x-transition:enter-start="opacity-0"
                        x-transition:enter-end="opacity-100" x-transition:leave="duration-150"
                        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                        {!! $lote->reserva->texto_forma_pagamento !!}
                    </div>
                </div>
                <div class="w-full mt-[35px] text-center font-montserrat text-[#80828B] font-medium text-[18px]">
                    <span x-show="!open" class="cpointer" @click="open = true;">Ver mais <i
                            class="ml-2 fas fa-chevron-down"></i></span>
                    <span x-show="open" x-cloak class="cpointer" @click="open = false;">Ver menos <i
                            class="ml-2 fas fa-chevron-up"></i></span>
                </div>
            </div>
            <div class="flex-1 px-[25px] py-[25px] border-2 border-[#D7D7D7] rounded-[15px]" x-data="{ open: false }">
                <div class="flex items-center justify-center w-full space-x-4">
                    <div class="">
                        <img src="{{ asset('imagens/seguranca_lote.svg') }}" width="70" alt="">
                    </div>
                    <div class="">
                        <span class="font-gobold font-medium text-[30px] text-[#FEAF2A]">SEGURANÇA
                            E<br>PRIVACIDADE</span>
                    </div>
                </div>
                <div class="w-full">
                    <div x-show="open" x-cloak
                        class="w-full border-t border-[#D7D7D7] mt-[35px] pt-3 font-montserrat"
                        x-transition:enter="duration-150" x-transition:enter-start="opacity-0"
                        x-transition:enter-end="opacity-100" x-transition:leave="duration-150"
                        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                        <p>A Agro Reserva toma todas as medidas cabíveis para garantir o cumprimento dos padrões de
                            confidencialidade e segurança, firmando acordos ou contratos com o objetivo de proteger a
                            privacidade dos dados pessoais de nossos usuários e cumprir a legislação aplicável.</p>
                        <p>Para mais informações, fale com a gente nos canais de atendimento disponíveis no site.</p>
                    </div>
                </div>
                <div class="w-full mt-[35px] text-center font-montserrat text-[#80828B] font-medium text-[18px]">
                    <span x-show="!open" class="cpointer" @click="open = true;">Ver mais <i
                            class="ml-2 fas fa-chevron-down"></i></span>
                    <span x-show="open" x-cloak class="cpointer" @click="open = false;">Ver menos <i
                            class="ml-2 fas fa-chevron-up"></i></span>
                </div>
            </div>
        </div>
    </div>
    @if (!$lote->reserva->encerrada)
        <div class="w-full bg-[#F5F5F5] py-5">
            <div class="mx-auto w1200">
                <div class="w-full mb-3 text-center">
                    <h3 class="font-montserrat font-medium text-[25px] text-[#15171E]">Animais da Reserva</h3>
                </div>
                <x-institucional.slide-lotes-destaque :reserva="$lote->reserva"
                    :lotes="$lote->reserva->lotes"></x-institucional.slide-lotes-destaque>
            </div>
        </div>
    @endif
</div>

@push('styles')
@endpush

@push('scripts')
    <script>
        $(document).ready(function() {

            const sliderHome = new Swiper('#imagens-lote', {
                slidesPerView: 1.2,
                speed: 250,
                loop: true,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                    // dynamicBullets: true,
                    // dynamicMainBullets: 3,
                },
                navigation: {
                    prevEl: '#swiper-button-prev',
                    nextEl: '#swiper-button-next',
                },

            });

            $('.popup_preview').magnificPopup({
                type: 'image'
            });
        })
    </script>
@endpush
