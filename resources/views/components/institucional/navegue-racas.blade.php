<div class="container-fluid px-0 bg-slate-50 py-5" x-data="{ show: false }" x-intersect.enter="show = true">
    <div class="w1400 mx-auto px-3 px-lg-0" x-show="show" x-transition.opacity.duration.3000ms>
        <div class="row mb-5">
            <div class="col-12 text-center" style="font-family: Montserrat; font-size: 25px; font-weight: medium;">
                NAVEGUE POR RAÇAS
            </div>
        </div>
        <div class="row">
            <div class="col-12 px-0">
                <div class="slick" id="slide-navegue-racas">
                    <div class="mx-2 cpointer hover:scale-105" style="border-radius: 50%; overflow: hidden; position: relative; width: 250px; height: 250px;">
                        <img src="{{ asset('imagens/nelore-gado.jpg') }}" class="w-100" alt="">
                    </div>
                    <div class="mx-2 cpointer hover:scale-105" style="border-radius: 50%; overflow: hidden; position: relative; width: 250px; height: 250px;">
                        <img src="{{ asset('imagens/nelore-gado.jpg') }}" class="w-100" alt="">
                    </div>
                    <div class="mx-2 cpointer hover:scale-105" style="border-radius: 50%; overflow: hidden; position: relative; width: 250px; height: 250px;">
                        <img src="{{ asset('imagens/nelore-gado.jpg') }}" class="w-100" alt="">
                    </div>
                    <div class="mx-2 cpointer hover:scale-105" style="border-radius: 50%; overflow: hidden; position: relative; width: 250px; height: 250px;">
                        <img src="{{ asset('imagens/nelore-gado.jpg') }}" class="w-100" alt="">
                    </div>
                    <div class="mx-2 cpointer hover:scale-105" style="border-radius: 50%; overflow: hidden; position: relative; width: 250px; height: 250px;">
                        <img src="{{ asset('imagens/nelore-gado.jpg') }}" class="w-100" alt="">
                    </div>
                    <div class="mx-2 cpointer hover:scale-105" style="border-radius: 50%; overflow: hidden; position: relative; width: 250px; height: 250px;">
                        <img src="{{ asset('imagens/nelore-gado.jpg') }}" class="w-100" alt="">
                    </div>
                    {{-- <div class="mx-2 cpointer hover:scale-105" style="border-radius: 50%; overflow: hidden; position: relative; width: 250px; height: 250px;">
                        <img src="{{ asset('imagens/nelore-gado.jpg') }}" class="w-100" alt="">
                    </div>
                    <div class="mx-2 cpointer hover:scale-105" style="border-radius: 50%; overflow: hidden; position: relative; width: 250px; height: 250px;">
                        <img src="{{ asset('imagens/nelore-gado.jpg') }}" class="w-100" alt="">
                    </div>
                    <div class="mx-2 cpointer hover:scale-105" style="border-radius: 50%; overflow: hidden; position: relative; width: 250px; height: 250px;">
                        <img src="{{ asset('imagens/nelore-gado.jpg') }}" class="w-100" alt="">
                    </div>
                    <div class="mx-2 cpointer hover:scale-105" style="border-radius: 50%; overflow: hidden; position: relative; width: 250px; height: 250px;">
                        <img src="{{ asset('imagens/nelore-gado.jpg') }}" class="w-100" alt="">
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>

@push("scripts")
    <script>
        $(document).ready(function(){
            $("#slide-navegue-racas").slick({
                // normal options...
                slidesToShow: 5,
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