<div class="px-0 py-5 bg-white container-fluid" x-data="{ show: false }" x-intersect.enter="show = true">
    <div class="px-3 mx-auto w1200 px-lg-0" x-show="show" x-transition.opacity.duration.3000ms>
        <div class="mb-5 row">
            <div class="text-center col-12" style="font-family: Montserrat; font-size: 25px; font-weight: medium;">
                O GRUPO AGRO EXPERIENCE
            </div>
        </div>
        <div class="row">
            <div class="mb-4 duration-1000 delay-300 col-12 col-lg-6 animate-in slide-in-from-left">
                <div class="rounded-md overflow-hidden shadow-sm bg-branco transition duration-500 hover:scale-105 hover:bg-[#E8521B] hover:text-white cpointer">
                    <div class="">
                        <img src="{{ asset('imagens/banner-experiencia-berrante.jpg') }}" style="max-width: 100%;" alt="">
                    </div>
                    <div class="py-2 text-center bg-inherit rounded-b-md cpointer text-inherit" style="width: 100%; font-family: Montserrat; font-size: 18px;">
                        BERRANTE - AGRO EXPERIENCE
                    </div>
                </div>
            </div>
            <div class="mb-4 duration-1000 delay-300 col-12 col-lg-6 animate-in slide-in-from-right">
                <div class="rounded-md overflow-hidden shadow-sm bg-branco transition duration-500 hover:scale-105 hover:bg-[#E8521B] hover:text-white cpointer" onclick="window.location.href = '{{ route('experiencias.ouro_branco') }}'">
                    <div class="">
                        <img src="{{ asset('imagens/banner-ourobranco.jpg') }}" style="max-width: 100%;" alt="">
                    </div>
                    <div class="py-2 text-center bg-inherit rounded-b-md cpointer text-inherit" style="width: 100%; font-family: Montserrat; font-size: 18px;">
                        OURO BRANCO
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>