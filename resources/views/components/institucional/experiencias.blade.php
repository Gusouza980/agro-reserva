<div class="px-0 py-5 w-full">
    <div class="px-3 mx-auto w1200 px-lg-0">
        <div class="mb-5 w-full">
            <div class="text-center w-full font-montserrat text-[25px] font-medium">
                O GRUPO AGRO EXPERIENCE
            </div>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <div>
                <div onclick="window.open('https://berrantecomunicacao.com.br/', '_blank')" class="rounded-md overflow-hidden shadow-sm bg-branco transition duration-500 hover:scale-105 hover:bg-[#E8521B] hover:text-white cpointer">
                    <div class="">
                        <img src="{{ asset('imagens/banner-experiencia-berrante.jpg') }}" style="max-width: 100%;" alt="">
                    </div>
                    <div class="py-2 text-center bg-inherit rounded-b-md cpointer text-inherit" style="width: 100%; font-family: Montserrat; font-size: 18px;">
                        BERRANTE - AGRO EXPERIENCE
                    </div>
                </div>
            </div>
            <div>
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