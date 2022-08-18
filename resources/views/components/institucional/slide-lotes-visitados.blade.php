<div class="w-full px-0 py-5 bg-white" x-data="{ show: false }" x-intersect.enter="show = true"  style="position: relative;">
    <div class="relative mx-auto w1200">
        <div class="flex px-2 mx-auto overflow-x-scroll px-md-0 md:px-0 w1200 hide-scroll-bar" id="slide-lotes-visitados" x-show="show" x-transition.opacity.duration.3000ms>
            <div class="flex flex-nowrap space-x-[6px]">
                @foreach ($lotes as $lote)
                    <div class="inline-block py-2 mt-4 slide-item caixa-lote-home cpointer" onclick="window.location.href = '{{route('fazenda.lote', ['fazenda' => $lote->reserva->fazenda->slug, 'lote' => $lote, 'reserva' => $lote->reserva])}}'">
                        <div class="caixa-lote-home-imagem"
                            style="background: url(/{{ $lote->preview }}); background-size: cover; background-position: center; width: 350px; height: 250px; border-radius: 15px; position: relative; overflow: hidden; border: 1px solid #676464;">
                            <div class="text-center justify-content-center align-items-center lote-home-hover">
                                <p style="margin-top: 12px;">{{ __('messages.botoes.compre_agora') }}</p>
                            </div>
                        </div>
                        <div class="px-4 mt-3 row align-items-center justify-content-start">
                            <div class="caixa-lote-home-logo d-flex align-items-center justify-content-center">
                                <img src="{{ asset($lote->fazenda->logo) }}" alt="">
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
        <img src="{{ asset('imagens/slide-lotes-arrow-left.png') }}" id="slide-lotes-visitados-left" class="absolute cpointer d-none d-md-block md:d-block" height="25" style="top: calc(50% - 25px); left: -50px;" alt="">
        <img src="{{ asset('imagens/slide-lotes-arrow-right.png') }}" id="slide-lotes-visitados-right" class="absolute cpointer d-none d-md-block md:d-block" height="25" style="top: calc(50% - 25px); right: -50px;" alt="">
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
            var max = $("#slide-lotes-visitados")[0].scrollWidth - $("#slide-lotes-visitados")[0].clientWidth;
            if($("#slide-lotes-visitados").scrollLeft() == min){
                $("#slide-lotes-visitados-left").attr("disabled", "disabled");
                $("#slide-lotes-visitados-left").css("opacity", "0.4")
                $("#slide-lotes-visitados-right").removeAttr("disabled"); 
                $("#slide-lotes-visitados-right").css("opacity", "1")       
            }else if($("#slide-lotes-visitados").scrollLeft() >= (max - 1)){
                $("#slide-lotes-visitados-right").attr("disabled", "disabled");
                $("#slide-lotes-visitados-right").css("opacity", "0.4")
                $("#slide-lotes-visitados-left").removeAttr("disabled");
                $("#slide-lotes-visitados-left").css("opacity", "1")
            }else{
                $("#slide-lotes-visitados-left").removeAttr("disabled");
                $("#slide-lotes-visitados-left").css("opacity", "1")
                $("#slide-lotes-visitados-right").removeAttr("disabled");
                $("#slide-lotes-visitados-right").css("opacity", "1")
            }
        }

        updateButtons();

        $("#slide-lotes-visitados-left").click(function(){
            $("#slide-lotes-visitados").animate({scrollLeft: $("#slide-lotes-visitados").scrollLeft() - item_width}, function(){
                updateButtons();
            });
        });

        $("#slide-lotes-visitados-right").click(function(){
            $("#slide-lotes-visitados").animate({scrollLeft: $("#slide-lotes-visitados").scrollLeft() + item_width}, function(){
                updateButtons();
            });
        });
    })
</script>
@endpush