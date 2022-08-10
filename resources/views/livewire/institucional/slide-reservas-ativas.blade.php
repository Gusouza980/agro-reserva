<div class="w-full px-0 py-5 bg-white" x-data="{ show: false }" x-intersect.enter="show = true"  style="position: relative; min-height: 800px;">
    <div class="relative mx-auto w1200">
        <div class="flex mx-auto overflow-x-scroll w1200 hide-scroll-bar" id="slide-reservas-ativas" x-show="show" x-transition.opacity.duration.3000ms>
            <div class="flex flex-nowrap">
                <div class="inline-block mx-[6px] slide-item" style="border-radius: 15px; overflow: hidden; position: relative;">
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
                </div>
                <div class="inline-block mx-2 slide-item" style="border-radius: 15px; overflow: hidden; position: relative;">
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
                </div>
                <div class="inline-block mx-2 slide-item" style="border-radius: 15px; overflow: hidden; position: relative;">
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
                </div>
                <div class="inline-block mx-2 slide-item" style="border-radius: 15px; overflow: hidden; position: relative;">
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
                </div>
                <div class="inline-block mx-2 slide-item" style="border-radius: 15px; overflow: hidden; position: relative;">
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
                </div>
                <div class="inline-block mx-2 slide-item" style="border-radius: 15px; overflow: hidden; position: relative;">
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
                </div>
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
    {{-- <script>
        $(document).ready(function(){
            $("#slide-reservas-ativas").slick({
                // normal options...
                slidesToShow: 4,
                infinite: false,
                // dots: true,
                adaptiveHeight: true,
                arrows: true,
                autoplay: true,
                autoplaySpeed: 4000,
                centerMode: false,
                variableWidth: false,
                // the magic
                responsive: [{

                    breakpoint: 1400,
                    settings: {
                        slidesToShow: 4,
                        infinite: false,
                        // dots: true,
                        adaptiveHeight: true,
                        arrows: true,
                        centerMode: true,
                        autoplay: true,
                        autoplaySpeed: 4000,
                    }

                }, {

                    breakpoint: 1030,
                    settings: {
                        slidesToShow: 2,
                        infinite: false,
                        // dots: true,
                        adaptiveHeight: true,
                        arrows: true,
                        autoplay: true,
                        autoplaySpeed: 4000,
                    }

                }, {

                    breakpoint: 760,
                    settings: {
                        slidesToShow: 1,
                        dots: false,
                        arrows: false,
                        infinite: true,
                        adaptiveHeight: true,
                        variableWidth: true,
                        centerMode: true,
                        autoplay: false,
                        autoplaySpeed: 4000,
                    }

                }]
            });
        });
    </script> --}}
@endpush