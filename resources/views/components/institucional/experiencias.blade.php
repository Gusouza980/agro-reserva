<div class="container-fluid px-0 bg-white py-5" x-data="{ show: false }" x-intersect.enter="show = true">
    <div class="w1400 mx-auto px-3 px-lg-0" x-show="show" x-transition.opacity.duration.3000ms>
        <div class="row mb-5">
            <div class="col-12 text-center" style="font-family: Montserrat; font-size: 25px; font-weight: medium;">
                O GRUPO AGRO EXPERIENCE
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-6 mb-4">
                <div class="shadow-sm bg-branco transition duration-500 hover:scale-105 hover:bg-orange-400 hover:text-white cpointer">
                    <div class="rounded-t-md">
                        <img src="{{ asset('imagens/banner-experiencia-berrante.jpg') }}" style="max-width: 100%;" alt="">
                    </div>
                    <div class="text-center py-2 bg-inherit rounded-b-md cpointer text-inherit" style="width: 100%; font-family: Montserrat; font-size: 18px;">
                        BERRANTE - AGRO EXPERIENCE
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6 mb-4">
                <div class="shadow-sm bg-branco transition duration-500 hover:scale-105 hover:bg-orange-400 hover:text-white cpointer">
                    <div class="rounded-t-md">
                        <img src="{{ asset('imagens/banner-experiencia-berrante.jpg') }}" style="max-width: 100%;" alt="">
                    </div>
                    <div class="text-center py-2 bg-inherit rounded-b-md cpointer text-inherit" style="width: 100%; font-family: Montserrat; font-size: 18px;">
                        OURO BRANCO
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>