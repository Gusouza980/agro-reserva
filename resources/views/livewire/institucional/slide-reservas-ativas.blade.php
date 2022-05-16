<div class="container-fluid px-0 bg-[#F7F7F7] py-5" x-data="{ show: false }" x-intersect.enter="show = true"  style="position: relative; min-height: 800px;">
    <div class="vitrine-animais mx-auto" x-show="show" x-transition.opacity.duration.3000ms>
        <div class="col-12 px-0">
            <div class="slick" id="slide-reservas-ativas">
                <div class="mx-2" style="border-radius: 15px; overflow: hidden; position: relative; min-width: 270px; max-width: 300px;">
                    <img src="{{ asset('imagens/stories.jpg') }}" class="w-100" alt="">
                    <div class="d-flex align-items-center justify-content-center" style="position: absolute; bottom: 0px; left: 0px; width: 100%; height: 150px;">
                        <div class="text-center">
                            <b style="font-family: Montserrat; font-size: 16px; color: white;">Inicia em</b>
                            <h3 class="my-2" style="color: white; font-size: 30px; font-weight: bold;">27/08/2022</h3>
                            <a name="" id="" class="btn btn-laranja py-1 px-4" href="#" role="button">Ver Reserva</a>
                        </div>
                    </div>
                </div>
                <div class="mx-2" style="border-radius: 15px; overflow: hidden; position: relative; min-width: 270px; max-width: 300px;">
                    <img src="{{ asset('imagens/stories.jpg') }}" class="w-100" alt="">
                    <div class="d-flex align-items-center justify-content-center" style="position: absolute; bottom: 0px; left: 0px; width: 100%; height: 150px;">
                        <div class="text-center">
                            <b style="font-family: Montserrat; font-size: 16px; color: white;">Inicia em</b>
                            <h3 class="my-2" style="color: white; font-size: 30px; font-weight: bold;">27/08/2022</h3>
                            <a name="" id="" class="btn btn-laranja py-1 px-4" href="#" role="button">Ver Reserva</a>
                        </div>
                    </div>
                </div>
                <div class="mx-2" style="border-radius: 15px; overflow: hidden; position: relative; min-width: 270px; max-width: 300px;">
                    <img src="{{ asset('imagens/stories.jpg') }}" class="w-100" alt="">
                    <div class="d-flex align-items-center justify-content-center" style="position: absolute; bottom: 0px; left: 0px; width: 100%; height: 150px;">
                        <div class="text-center">
                            <b style="font-family: Montserrat; font-size: 16px; color: white;">Inicia em</b>
                            <h3 class="my-2" style="color: white; font-size: 30px; font-weight: bold;">27/08/2022</h3>
                            <a name="" id="" class="btn btn-laranja py-1 px-4" href="#" role="button">Ver Reserva</a>
                        </div>
                    </div>
                </div>
                <div class="mx-2" style="border-radius: 15px; overflow: hidden; position: relative; min-width: 270px; max-width: 300px;">
                    <img src="{{ asset('imagens/stories.jpg') }}" class="w-100" alt="">
                    <div class="d-flex align-items-center justify-content-center" style="position: absolute; bottom: 0px; left: 0px; width: 100%; height: 150px;">
                        <div class="text-center">
                            <b style="font-family: Montserrat; font-size: 16px; color: white;">Inicia em</b>
                            <h3 class="my-2" style="color: white; font-size: 30px; font-weight: bold;">27/08/2022</h3>
                            <a name="" id="" class="btn btn-laranja py-1 px-4" href="#" role="button">Ver Reserva</a>
                        </div>
                    </div>
                </div>
                <div class="mx-2" style="border-radius: 15px; overflow: hidden; position: relative; min-width: 270px;">
                    <img src="{{ asset('imagens/stories.jpg') }}" class="w-100" alt="">
                    <div class="d-flex align-items-center justify-content-center" style="position: absolute; bottom: 0px; left: 0px; width: 100%; height: 150px;">
                        <div class="text-center">
                            <b style="font-family: Montserrat; font-size: 16px; color: white;">Inicia em</b>
                            <h3 class="my-2" style="color: white; font-size: 30px; font-weight: bold;">27/08/2022</h3>
                            <a name="" id="" class="btn btn-laranja py-1 px-4" href="#" role="button">Ver Reserva</a>
                        </div>
                    </div>
                </div>
                <div class="mx-2" style="border-radius: 15px; overflow: hidden; position: relative; min-width: 270px;">
                    <img src="{{ asset('imagens/stories.jpg') }}" class="w-100" alt="">
                    <div class="d-flex align-items-center justify-content-center" style="position: absolute; bottom: 0px; left: 0px; width: 100%; height: 150px;">
                        <div class="text-center">
                            <b style="font-family: Montserrat; font-size: 16px; color: white;">Inicia em</b>
                            <h3 class="my-2" style="color: white; font-size: 30px; font-weight: bold;">27/08/2022</h3>
                            <a name="" id="" class="btn btn-laranja py-1 px-4" href="#" role="button">Ver Reserva</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>

@push("scripts")
    <script>
        $(document).ready(function(){
            $("#slide-reservas-ativas").slick({
                // normal options...
                slidesToShow: 4,
                infinite: true,
                // dots: true,
                adaptiveHeight: true,
                arrows: true,
                autoplay: true,
                autoplaySpeed: 4000,
                centerMode: false,
                variableWidth: true,
                // the magic
                responsive: [{

                    breakpoint: 1400,
                    settings: {
                        slidesToShow: 4,
                        infinite: true,
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
                        infinite: true,
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
                        infinite: true,
                        dots: false,
                        adaptiveHeight: true,
                        arrows: false,
                        autoplay: true,
                        centerMode: true,
                        autoplaySpeed: 4000,
                    }

                }]
            });
        });
    </script>
@endpush