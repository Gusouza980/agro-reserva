<div class="w-full bg-white py-5" style="background: url('/imagens/bg-racas.png')" x-data="{ show: false }" x-intersect.enter="show = true">
    <div class="w1200 mx-auto" x-show="show" x-transition.opacity.duration.3000ms>
        <div class="w-full mb-5 mt-4">
            <div class="w-full text-center" style="font-family: Montserrat; font-size: 25px; font-weight: medium;">
                NAVEGUE POR RAÇAS
            </div>
        </div>
        <div class="w-full px-0">
            <div class="slick" id="slide-navegue-racas">
                @foreach(\App\Models\Raca::where('ativo', true)->orderBy("nome")->get() as $raca)
                    <div class="mx-2 cpointer transition duration-500 hover:scale-105" style="width: 250px; height: 250px;" onclick="window.location.href = '{{ route('raca', ['slug' => $raca->slug]) }}'">
                        <img src="{{ asset($raca->imagem) }}" class="w-100" alt="">
                        <div class="bg-white text-black text-center w-full py-2" style="border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">
                            {{ $raca->nome }}
                        </div>
                    </div>
                @endforeach
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
                centerMode: true,
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