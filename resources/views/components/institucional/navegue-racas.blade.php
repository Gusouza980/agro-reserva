<div class="w-full px-0 py-5 bg-white" style="background: url('/imagens/bg-racas.png')" x-data="{ show: false }" x-intersect.enter="show = true"  style="position: relative;">
    <div class="relative mx-auto w1200">
        <div class="w-full mb-3 mt-4">
            <div class="w-full text-center text-[#D7D8E4] font-montserrat text-[25px] font-medium">
                NAVEGUE POR RAÇAS
            </div>
        </div>
        <div class="flex mx-auto overflow-x-scroll py-4 w1200 hide-scroll-bar" id="slide-navegue-racas" x-show="show" x-transition.opacity.duration.3000ms>
            <div class="flex flex-nowrap space-x-[6px]">
                @foreach(\App\Models\Raca::where('ativo', true)->orderBy("nome")->get() as $raca)
                    <div class="mx-2 slide-item cpointer transition duration-500 hover:scale-105" style="width: 250px; height: 250px;" onclick="window.location.href = '{{ route('raca', ['slug' => $raca->slug]) }}'">
                        <img src="{{ asset($raca->imagem) }}" class="w-100" alt="">
                        <div class="bg-white text-black text-center w-full py-2" style="border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">
                            {{ mb_strtoupper($raca->nome) }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <img src="{{ asset('imagens/slide-lotes-arrow-left.png') }}" id="slide-navegue-racas-left" class="absolute cpointer d-none d-md-block md:d-block" height="25" style="top: calc(50% - 25px); left: -50px;" alt="">
        <img src="{{ asset('imagens/slide-lotes-arrow-right.png') }}" id="slide-navegue-racas-right" class="absolute cpointer d-none d-md-block md:d-block" height="25" style="top: calc(50% - 25px); right: -50px;" alt="">
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

        var item_width = 250 + 12;

        function updateButtons(){
            var min = 0;
            var max = $("#slide-navegue-racas")[0].scrollWidth - $("#slide-navegue-racas")[0].clientWidth;
            if($("#slide-navegue-racas").scrollLeft() == min){
                $("#slide-navegue-racas-left").attr("disabled", "disabled");
                $("#slide-navegue-racas-left").css("opacity", "0.4")
                $("#slide-navegue-racas-right").removeAttr("disabled"); 
                $("#slide-navegue-racas-right").css("opacity", "1")       
            }else if($("#slide-navegue-racas").scrollLeft() >= (max - 1)){
                $("#slide-navegue-racas-right").attr("disabled", "disabled");
                $("#slide-navegue-racas-right").css("opacity", "0.4")
                $("#slide-navegue-racas-left").removeAttr("disabled");
                $("#slide-navegue-racas-left").css("opacity", "1")
            }else{
                $("#slide-navegue-racas-left").removeAttr("disabled");
                $("#slide-navegue-racas-left").css("opacity", "1")
                $("#slide-navegue-racas-right").removeAttr("disabled");
                $("#slide-navegue-racas-right").css("opacity", "1")
            }
        }

        updateButtons();

        $("#slide-navegue-racas-left").click(function(){
            $("#slide-navegue-racas").animate({scrollLeft: $("#slide-navegue-racas").scrollLeft() - item_width}, function(){
                updateButtons();
            });
        });

        $("#slide-navegue-racas-right").click(function(){
            $("#slide-navegue-racas").animate({scrollLeft: $("#slide-navegue-racas").scrollLeft() + item_width}, function(){
                updateButtons();
            });
        });
    })
</script>
@endpush