<div id="newsletter" class="relative flex justify-center w-full" x-data="{ show: false }" x-intersect.enter="show = true">
    <div class="absolute h-[400px] md:h-[300px] flex justify-center items-center -top-[400px] md:-top-[300px] w1500 mx-auto px-6 md:px-[100px] py-[40px] bg-[#41434E] rounded-[50px]" style="box-shadow: 0px 12px 22px rgba(0,0,0,0.2)" x-show="show" x-transition.opacity.duration.2000ms>
        <div class="flex flex-wrap items-center justify-center w-full md:flex-nowrap md:space-x-10">
            <div class="flex w-full duration-1000 delay-300 md:w-auto justify-content-center justify-content-lg-start animate-in slide-in-from-left">
                <img src="{{ asset('imagens/icone_newsletter.svg') }}" class="w-40 lg:w-full" style="max-width: 447px; max-height: 250px;" alt="">
            </div>
            <div class="mt-8 text-center duration-1000 delay-300 md:mt-0 animate-in slide-in-from-right">
                <h5 class="text-[26px] md:text-[55px] text-[#FFB02A] font-gobold-hollow font-bold">RECEBA EM PRIMEIRA MÃO</h5>
                <p class="text-[16px] md:text-[23px] text-[#D7D8E4] font-montserrat">Informe seu e-mail e fique atualizado</p>
                <div class="flex w-full mt-4 align-items-center justify-content-center">
                    <div class="relative flex-1 mb-3">
                        <input type="email" class="font-montserrat w-full py-2 px-[50px] md:px-[100px] bg-[#363741] border border-[#F5F5F5] rounded-[12px]" name="" id="" aria-describedby="" placeholder="Seu e-mail">
                        <i class="far fa-envelope fa-2x text-[#FFB02A] absolute top-[4px] left-[10px] md:left-[50px]"></i>                    
                    </div>
                    <div class="mb-3 ml-4">
                        <button class="px-4 py-2 transition duration-500 text-[#353741] bg-[#FFB02A] hover:bg-[#db9722] font-montserrat rounded-[6px]">
                            <span class="hidden md:block">Enviar</span>
                            <span class="md:hidden"><i class="fa-solid fa-paper-plane"></i></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>