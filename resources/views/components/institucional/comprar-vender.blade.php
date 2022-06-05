<div class="px-0 pb-5 bg-white container-fluid" x-data="{ show: false }" x-intersect.enter="show = true">
    <div class="px-3 mx-auto w1400 px-lg-0" x-show="show" x-transition.opacity.duration.3000ms>
        <div class="row">
            <div class="mb-4 duration-1000 delay-300 col-12 col-lg-6 animate-in slide-in-from-left">
                <div class="rounded-md overflow-hidden shadow-sm bg-branco transition duration-500 hover:scale-105 hover:bg-[#E8521B] hover:text-white cpointer">
                    <div class="">
                        <img src="{{ asset('imagens/banner-comprar.jpg') }}" style="max-width: 100%;" alt="">
                    </div>
                    <div class="py-2 text-center bg-inherit cpointer text-inherit" style="width: 100%; font-family: Montserrat; font-size: 18px;">
                        Quero Comprar
                    </div>
                </div>
            </div>
            <div class="mb-4 duration-1000 delay-300 col-12 col-lg-6 animate-in slide-in-from-right">
                <div class="rounded-md overflow-hidden shadow-sm bg-branco transition duration-500 hover:scale-105 hover:bg-[#E8521B] hover:text-white cpointer">
                    <div class="">
                        <img src="{{ asset('imagens/banner-vender.jpg') }}" style="max-width: 100%;" alt="">
                    </div>
                    <div class="py-2 text-center bg-inherit cpointer text-inherit" style="width: 100%; font-family: Montserrat; font-size: 18px;">
                        Quero Vender
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>