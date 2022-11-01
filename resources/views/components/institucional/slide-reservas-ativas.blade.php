<div class="w-full px-0 mt-[40px] py-5" x-data="{ show: false }" x-intersect.enter="show = true"  style="position: relative; min-height: 600px;">
    <div class="relative mx-auto w1200">
        <div class="flex mx-auto overflow-x-scroll w1200 hide-scroll-bar" id="slide-reservas-ativas" x-show="show" x-transition.opacity.duration.3000ms>
            <div class="flex flex-nowrap">
                @foreach($reservas->sortBy([['encerrada', 'asc'], ['inicio', 'desc']]) as $reserva)
                <div class="inline-block mx-[6px] slide-item" style="border-radius: 15px; overflow: hidden; position: relative;">
                    <img src="{{ asset($reserva->imagem_card) }}" class="w-100 @if($reserva->encerrada) brightness-[0.30]" @endif alt="">
                    <div class="d-flex align-items-center justify-content-center" style="position: absolute; bottom: 0px; left: 0px; width: 100%; height: 150px;">
                        <div class="text-center">
                            @if(!$reserva->encerrada)
                                @if($reserva->mostrar_datas)
                                    <div>
                                        <b class="font-montserrat text-[16px] text-white">@if(!$reserva->compra_disponivel) Inicia em @else Termina em @endif</b>
                                    </div>
                                    <div class="mt-2">
                                        <h3 class="font-montserrat text-white text-[26px] font-bold">@if(!$reserva->compra_disponivel) {{ date("d/m/Y", strtotime($reserva->inicio)) }} @else {{ date("d/m/Y", strtotime($reserva->fim)) }} @endif</h3>
                                    </div>
                                @else
                                    <div>
                                        <b class="font-montserrat text-[26px] text-white">Em breve</b>
                                    </div>
                                @endif
                            @else
                                <div class="mt-2 mb-3">
                                    <b class="font-montserrat text-[16px] text-white">Encerrada</b>
                                </div>
                            @endif
                            @if($reserva->aberto)
                                <div class="mt-3">
                                    <a href="{{ route('fazenda.lotes', ['fazenda' => $reserva->fazenda->slug, 'reserva' => $reserva->id]) }}" name="" id="" class="px-[30px] py-[10px] @if($reserva->encerrada) border-2 border-[#E8521B] @else bg-[#E8521B] @endif text-[#FFFFFF] rounded-[6px] transition duration-300 font-montserrat text-[17px] font-bold hover:text-white hover:bg-[#b83f13]" href="#" role="button">Ver Reserva</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <img src="{{ asset('imagens/slide-lotes-arrow-left.png') }}" id="slide-reservas-ativas-left" class="absolute cpointer d-none d-md-block md:d-block" height="25" style="top: calc(50% - 25px); left: -50px;" alt="">
        <img src="{{ asset('imagens/slide-lotes-arrow-right.png') }}" id="slide-reservas-ativas-right" class="absolute cpointer d-none d-md-block md:d-block" height="25" style="top: calc(50% - 25px); right: -50px;" alt="">
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

        var item_width = 312;

        function updateButtons(){
            var min = 0;
            var max = $("#slide-reservas-ativas")[0].scrollWidth - $("#slide-reservas-ativas")[0].clientWidth;
            if($("#slide-reservas-ativas").scrollLeft() == min){
                $("#slide-reservas-ativas-left").attr("disabled", "disabled");
                $("#slide-reservas-ativas-left").css("opacity", "0.4")
                $("#slide-reservas-ativas-right").removeAttr("disabled"); 
                $("#slide-reservas-ativas-right").css("opacity", "1")       
            }else if($("#slide-reservas-ativas").scrollLeft() >= (max - 1)){
                $("#slide-reservas-ativas-right").attr("disabled", "disabled");
                $("#slide-reservas-ativas-right").css("opacity", "0.4")
                $("#slide-reservas-ativas-left").removeAttr("disabled");
                $("#slide-reservas-ativas-left").css("opacity", "1")
            }else{
                $("#slide-reservas-ativas-left").removeAttr("disabled");
                $("#slide-reservas-ativas-left").css("opacity", "1")
                $("#slide-reservas-ativas-right").removeAttr("disabled");
                $("#slide-reservas-ativas-right").css("opacity", "1")
            }
        }

        updateButtons();

        $("#slide-reservas-ativas-left").click(function(){
            $("#slide-reservas-ativas").animate({scrollLeft: $("#slide-reservas-ativas").scrollLeft() - item_width}, function(){
                updateButtons();
            });
        });

        $("#slide-reservas-ativas-right").click(function(){
            $("#slide-reservas-ativas").animate({scrollLeft: $("#slide-reservas-ativas").scrollLeft() + item_width}, function(){
                updateButtons();
            });
        });
    })
</script>
@endpush