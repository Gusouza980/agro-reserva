<div class="w-full px-0 py-5" x-data="{ show: false }" x-intersect.enter="show = true"  style="position: relative; min-height: 500px;">
    <div class="w-full mt-5 text-center">
        <h3 class="font-montserrat font-medium text-[25px] text-[#757887]">
            DEPOIMENTOS
        </h3>
    </div>
    <div class="relative mx-auto mt-5 w1200">
        <div class="flex mx-auto overflow-x-scroll w1200 hide-scroll-bar" id="slide-depoimentos" x-show="show" x-transition.opacity.duration.3000ms>
            <div class="flex flex-nowrap">
                @for($i = 0; $i <= count($videos); $i++)
                    {{-- <div class="inline-block mx-[12px] slide-item w-[276px] bg-[#2c2c2c]" style="border-radius: 15px; overflow: hidden; position: relative;"> --}}
                    <div class="inline-block mx-[12px] slide-item w-[276px]" style="background: url({{ $videos[$i]["snippet"]["thumbnails"]["high"]["url"] }}); background-repeat: no-repeat; background-size: cover; background-position: center; backdrop-filter: grayscale(100%); border-radius: 15px; overflow: hidden; position: relative;">
                        @if($video_atual !== $i)
                            <img src="{{ asset('imagens/capa_depoimento_2.png') }}" class="w-full shadow-lg cpointer" style="" alt="" wire:click="mostrar({{ $i }})">
                            <img class="cpointer" src="{{ asset('imagens/play-button2.jpg') }}" width="60" style="position: absolute; top: calc(50% - 30px); left: calc(50% - 30px);" wire:click="mostrar({{ $i }})">
                        @else
                            {!! App\Classes\Util::convertYoutube("https://www.youtube.com/watch?v=" . $videos[$i]["contentDetails"]["videoId"], '9/16') !!}
                        @endif
                    </div>
                @endfor
            </div>
        </div>
        @if(count($videos) > 4)
            <img src="{{ asset('imagens/slide-lotes-arrow-left.png') }}" id="slide-depoimentos-left" class="absolute cpointer d-none d-md-block md:d-block" height="25" style="top: calc(50% - 25px); left: -50px;" alt="">
            <img src="{{ asset('imagens/slide-lotes-arrow-right.png') }}" id="slide-depoimentos-right" class="absolute cpointer d-none d-md-block md:d-block" height="25" style="top: calc(50% - 25px); right: -50px;" alt="">
        @endif
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
            var max = $("#slide-depoimentos")[0].scrollWidth - $("#slide-depoimentos")[0].clientWidth;
            if($("#slide-depoimentos").scrollLeft() == min){
                $("#slide-depoimentos-left").attr("disabled", "disabled");
                $("#slide-depoimentos-left").css("opacity", "0.4")
                $("#slide-depoimentos-right").removeAttr("disabled"); 
                $("#slide-depoimentos-right").css("opacity", "1")       
            }else if($("#slide-depoimentos").scrollLeft() >= (max - 1)){
                $("#slide-depoimentos-right").attr("disabled", "disabled");
                $("#slide-depoimentos-right").css("opacity", "0.4")
                $("#slide-depoimentos-left").removeAttr("disabled");
                $("#slide-depoimentos-left").css("opacity", "1")
            }else{
                $("#slide-depoimentos-left").removeAttr("disabled");
                $("#slide-depoimentos-left").css("opacity", "1")
                $("#slide-depoimentos-right").removeAttr("disabled");
                $("#slide-depoimentos-right").css("opacity", "1")
            }
        }

        updateButtons();

        $("#slide-depoimentos-left").click(function(){
            $("#slide-depoimentos").animate({scrollLeft: $("#slide-depoimentos").scrollLeft() - item_width}, function(){
                updateButtons();
            });
        });

        $("#slide-depoimentos-right").click(function(){
            $("#slide-depoimentos").animate({scrollLeft: $("#slide-depoimentos").scrollLeft() + item_width}, function(){
                updateButtons();
            });
        });
    })
</script>
@endpush