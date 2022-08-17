<div class="w-full px-0 py-2 pb-5" x-data="{ show: false }" x-intersect.enter="show = true"  style="position: relative;">
    <div class="relative mx-auto w1200">
        <div class="flex mx-auto overflow-x-scroll w1200 hide-scroll-bar @if($lotes->count() < 4) justify-center @endif" id="slide-lotes-destaque" x-show="show" x-transition.opacity.duration.3000ms>
            <div class="flex flex-nowrap space-x-[6px]">
                @foreach ($lotes->where("ativo", true) as $lote)
                    <div class="inline-block py-2 slide-item caixa-lote-home cpointer" onclick="window.location.href = '{{route('fazenda.lote', ['fazenda' => $lote->reserva->fazenda->slug, 'lote' => $lote, 'reserva' => $lote->reserva])}}'">
                        <div class="caixa-lote-home-imagem"
                            style="background: url(/{{ $lote->preview }}); background-size: cover; background-position: center; width: 350px; height: 250px; border-radius: 15px; position: relative; overflow: hidden; border: 1px solid #676464;">
                            <div class="text-center justify-content-center align-items-center lote-home-hover">
                                <p style="margin-top: 12px;">{{ __('messages.botoes.compre_agora') }}</p>
                            </div>
                            <div class="@if(!$lote->reservado) hidden @endif font-montserrat text-[29px] text-[#FFB02A] font-bold absolute top-0 left-0 z-[10] w-full h-full rounded-t-[15px] flex items-center justify-center" style="background-color: rgba(0,0,0,0.45)">
                                VENDIDO
                            </div>
                        </div>
                        <div class="px-4 mt-3 row align-items-center justify-content-start">
                            <div class="caixa-lote-home-logo d-flex align-items-center justify-content-center">
                                <img src="{{ asset($lote->fazenda->logo) }}" class="grayscale invert" alt="">
                            </div>
                            <div class="ml-4">
                                <div class="d-flex justify-content-start align-items-center">
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
                @endforeach
                {{-- <div class="inline-block mx-[6px] slide-item" style="border-radius: 15px; overflow: hidden; position: relative;">
                    <img src="{{ asset('imagens/stories.jpg') }}" class="w-100" alt="">
                    <div class="d-flex align-items-center justify-content-center" style="position: absolute; bottom: 0px; left: 0px; width: 100%; height: 150px;">
                        <div class="text-center">
                            <div>
                                <b style="font-family: Montserrat; font-size: 16px; color: white;">Inicia em</b>
                            </div>
                            <div class="mt-2 mb-3">
                                <h3 style="color: white; font-size: 30px; font-weight: bold;">27/08/2022</h3>
                            </div>
                            <div>
                                <a name="" id="" class="px-4 py-1 btn-laranja" href="#" role="button">Ver Reserva</a>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
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

        var item_width = 350;

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