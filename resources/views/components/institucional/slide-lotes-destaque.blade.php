<div class="relative w-full">
    <div class="flex mx-auto overflow-x-scroll w1200 hide-scroll-bar" id="slide-lotes-destaque">
        <div class="flex flex-nowrap">
            @php
                $lotes = $reserva->lotes->where("ativo", true)->shuffle();
            @endphp
            @foreach($lotes as $lote)
                <div class="inline-block mx-[6px] slide-item">
                    <div class="relative flex flex-shrink-0 w-full sm:w-auto">
                        <div class="py-2 mt-4 caixa-lote-home cpointer" onclick="window.location.href = '{{route('fazenda.lote', ['fazenda' => $lote->reserva->fazenda->slug, 'lote' => $lote, 'reserva' => $lote->reserva])}}'">
                            <div class="caixa-lote-home-imagem" style="width: 350px; border-radius: 15px; position: relative; overflow: hidden;">
                                <img src="{{ asset($lote->preview) }}" class="w-full" alt="">
                                <div class="absolute bottom-0 left-0 flex items-center justify-center invisible w-full py-2 text-center text-white transition duration-150 bg-green-500 slide-lote-destaque-botao group-hover:visible font-montserrat">
                                    <p style="">{{ __('messages.botoes.compre_agora') }}</p>
                                </div>
                            </div>
                            <div class="flex items-center justify-start w-full mt-3">
                                <div class="flex items-center justify-center caixa-lote-home-logo">
                                    <img src="{{ asset($lote->fazenda->logo) }}" alt="">
                                </div>
                                <div class="ml-4">
                                    <div class="flex items-center justify-start">
                                        <div>
                                            <button class="px-2 badge-lote-home">LOTE {{str_pad($lote->numero, 2, "0", STR_PAD_LEFT)}}@if($lote->letra){{$lote->letra}}@endif</button>
                                        </div>
                                        @if($lote->registro)
                                            <div class="ml-3 lote-home-rgd">
                                                RGD: {{$lote->registro}}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="mt-2 text-left caixa-lote-home-text">
                                        <span>@if($lote->preco > 0) {{ $lote->parcelas . "x de R$" . number_format($lote->preco / $lote->parcelas, 2, ",", ".")  }}  @else {{ $lote->reserva->desconto }}% de desconto no<br>pagamento à vista @endif</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <img src="{{ asset('imagens/slide-lotes-arrow-left.png') }}" id="slide-lotes-destaque-left" class="absolute cpointer d-none d-md-block md:d-block" height="25" style="top: calc(50% - 25px); left: -50px;" alt="">
        <img src="{{ asset('imagens/slide-lotes-arrow-right.png') }}" id="slide-lotes-destaque-right" class="absolute cpointer d-none d-md-block md:d-block" height="25" style="top: calc(50% - 25px); right: -50px;" alt="">
    </div>
</div>


@push("scripts")

<style>
    .hide-scroll-bar {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }

    .hide-scroll-bar::-webkit-scrollbar {
        display: none;
    }
</style>
<script>
    $(document).ready(function(){

        var item_width = 362;

        function updateButtons(){
            var min = 0;
            var max = $("#slide-lotes-destaque")[0].scrollWidth - $("#slide-lotes-destaque")[0].clientWidth;
            if($("#slide-lotes-destaque").scrollLeft() == min){
                $("#slide-lotes-destaque-left").attr("disabled", "disabled");
                $("#slide-lotes-destaque-left").css("opacity", "0.4")
                $("#slide-lotes-destaque-right").removeAttr("disabled"); 
                $("#slide-lotes-destaque-right").css("opacity", "1")       
            }else if($("#slide-lotes-destaque").scrollLeft() >= (max - 1)){
                $("#slide-lotes-destaque-right").attr("disabled", "disabled");
                $("#slide-lotes-destaque-right").css("opacity", "0.4")
                $("#slide-lotes-destaque-left").removeAttr("disabled");
                $("#slide-lotes-destaque-left").css("opacity", "1")
            }else{
                $("#slide-lotes-destaque-left").removeAttr("disabled");
                $("#slide-lotes-destaque-left").css("opacity", "1")
                $("#slide-lotes-destaque-right").removeAttr("disabled");
                $("#slide-lotes-destaque-right").css("opacity", "1")
            }
        }

        updateButtons();

        $("#slide-lotes-destaque-left").click(function(){
            $("#slide-lotes-destaque").animate({scrollLeft: $("#slide-lotes-destaque").scrollLeft() - item_width}, function(){
                updateButtons();
            });
        });

        $("#slide-lotes-destaque-right").click(function(){
            $("#slide-lotes-destaque").animate({scrollLeft: $("#slide-lotes-destaque").scrollLeft() + item_width}, function(){
                updateButtons();
            });
        });
    })
</script>

@endpush