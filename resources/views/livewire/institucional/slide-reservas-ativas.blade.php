<div class="px-0 py-5 bg-white w-full" x-data="{ show: false }" x-intersect.enter="show = true"  style="position: relative; min-height: 800px;">
    <div class="mx-auto vitrine-animais" x-show="show" x-transition.opacity.duration.3000ms>
        <div class="px-0 w-full">
            <div class="slick" id="slide-reservas-ativas">
                <div class="mx-2" style="border-radius: 15px; overflow: hidden; position: relative;">
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
                <div class="mx-2" style="border-radius: 15px; overflow: hidden; position: relative;">
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
                <div class="mx-2" style="border-radius: 15px; overflow: hidden; position: relative;">
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
                <div class="mx-2" style="border-radius: 15px; overflow: hidden; position: relative;">
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
                <div class="mx-2" style="border-radius: 15px; overflow: hidden; position: relative;">
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
                <div class="mx-2" style="border-radius: 15px; overflow: hidden; position: relative;">
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
        
    </div>
</div>

@push("scripts")
    <script>
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
    </script>
@endpush