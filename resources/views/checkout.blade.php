@extends('template.main2')

@section('styles')

@endsection

@section('conteudo')

    <div class="w-full bg-[#F5F5F5] py-20">
        <div class="w1200 mx-auto pb-6">
            <span onclick="window.location.href='{{ route('carrinho') }}'" class="cursor-pointer font-medium transition font-montserrat duration-300 text-[18px] text-[#283646] hover:scale-105 hover:text-[#EE682A]"><i class="fas fa-chevron-left mr-2"></i> <span>Voltar</span></span>
        </div>
        <div class="w1200 mx-auto rounded-[27px] flex flex-wrap bg-white px-[40px]">
            <div class="w-full">
                <div class="w-full flex flex-wrap items-center md:flex-nowrap py-[40px] border-b-2 border-solid border-gray-400">
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
                    <div class="text-left text-md-right md:text-right grow mt-[15px] md:mt-none">
                        <div class="">
                            <span class="text-[22px] text-[#15171E] font-montserrat font-bold">R${{ number_format($carrinho->produtos->sum("preco") - (($carrinho->produtos->sum("preco") * $carrinho->reserva->desconto) / 100) , 2, ",", ".") }}</span>
                            <span class="font-montserrat font-medum text-[17px] text-[#15171E]">à vista</span>
                        </div>
                        <div class="mt-[-5px]">
                            <span class="text-[14px] text-[#626262] font-montserrat font-medium">ou <b class="text-[#15171E]">{{ $carrinho->reserva->max_parcelas }}x</b> de <b class="text-[#15171E]">R${{ number_format($carrinho->produtos->sum("preco")/$carrinho->reserva->max_parcelas, 2, ",", ".") }}</b></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full md:w-3/5 pr-[20px]">
                <div class="w-full py-[20px]">
                    @foreach($carrinho->produtos as $produto)
                        <div class="w-full pb-[20px] border-b-2 border-solid border-gray-400">
                            <div class="flex flex-collumn space-x-6 w-full">
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
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="w-full md:w-2/5 py-[20px] pl-[20px]">
                <div class="w-full">
                    <h3 class="font-montserrat text-[15px] font-bold text-[#5C6384]">Condições de Pagamento</h3>
                    <div class="font-montserrat text-[14px] font-medium text-[#626262]">
                        @foreach($carrinho->reserva->formas_pagamento as $forma_pagamento)
                            <p class="mt-[10px]">
                                @if($forma_pagamento->minimo != $forma_pagamento->maximo)
                                    De <b>{{ $forma_pagamento->minimo }} à {{ $forma_pagamento->maximo }} parcelas</b>, 
                                    @if($forma_pagamento->desconto > 0)
                                        <b>{{ $forma_pagamento->desconto }}% de desconto</b> e
                                    @endif
                                    pagamento feito em 
                                    @if($forma_pagamento->regras->count() > 0)
                                        @foreach($forma_pagamento->regras->sortBy("posicao") as $regra)
                                            <b>{{ $regra->meses }} {{ config("globals.nome_parcelas")[$regra->parcelas] }}</b>,
                                        @endforeach
                                        com o restante das parcelas sendo únicas.
                                    @else
                                        <b>parcelas únicas</b>
                                    @endif
                                @endif
                            </p>
                        @endforeach
                    </div>
                </div>
                <div class="container-fluid px-0 mt-4">
                    <div class="row">
                        <div class="col-12 mb-2">
                            <small class="text-info">O pagamento da primeira parcela é sempre a vista.</small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                @php
                                    $total = $carrinho->produtos->sum("preco");
                                @endphp
                                <select class="form-control" name="parcelamento" id="parcelamento">
                                        <option value="-1">Selecione as parcelas</option>
                                        @foreach($carrinho->reserva->formas_pagamento as $forma_pagamento)
                                            @for($i = $forma_pagamento->minimo; $i <= $forma_pagamento->maximo; $i++)
                                                <option value="{{$i}}">{{$i}}x de R${{number_format(($total - ($total * $forma_pagamento->desconto) / 100) / $i, 2, ",", ".")}} @if($forma_pagamento->desconto > 0) ({{$forma_pagamento->desconto}}% de desconto) @endif</option>
                                            @endfor
                                        @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full">
                    <div class="form-group mt-3">
                        <label class="font-montserrat text-[15px] font-bold text-[#5C6384]">Foi assessorado por alguém ?</label>
                        <select class="form-control" name="assessor" id="assessor-i">
                            <option value="0">Não</option>
                            @foreach(App\Models\Assessor::all() as $assessor)   
                                <option value="{{$assessor->id}}">{{$assessor->nome}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="w-full mt-[20px] text-right">
                    <img id="ajax-loading" style="display: none;" src="{{ asset('imagens/gif_relogio.gif') }}" class="mx-auto" width="50" alt="">
                    <button id="btn-finalizar" class="border border-[#27C45B] bg-[#27C45B] hover:bg-[#1e9b48] text-[18px] text-white py-2 px-8 font-montserrat font-medium rounded-[10px]">Finalizar</button>
                </div>
                <form id="form-checkout" class="hidden" action="{{ route('carrinho.concluir') }}" method="POST">
                    @csrf
                    <input type="hidden" name="carrinho_id" value="{{ $carrinho->id }}">
                    <input type="hidden" id="#assessor-h" name="assessor_id" value="">
                    <input type="hidden" name="parcelas" id="parcelas-h" value="">
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $("#btn-finalizar").click(function(){
                //Pegando parcelas
                $("#btn-finalizar").hide();
                $("#ajax-loading").show();
                var parcelas = $("select[name='parcelamento']").val();
                if(parcelas == -1){
                    return;
                }
                $("#parcelas-h").val(parcelas);

                //Pegando assessor
                var assessor = $("#assessor-i").val();
                $("#assessor-h").val(assessor);

                $("#form-checkout").submit();
            })
        })
    </script>
@endsection