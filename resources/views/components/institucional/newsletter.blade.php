<div class="container-fluid px-0 bg-white py-5" style="background: url('/imagens/bg-newsletter.png')" x-data="{ show: false }" x-intersect.enter="show = true">
    <div class="w1400 mx-auto px-3 px-lg-0" x-show="show" x-transition.opacity.duration.3000ms>
        <div class="row align-items-center">
            <div class="col-12 col-lg-6 mb-4 flex justify-content-center justify-content-lg-start">
                <img src="{{ asset('imagens/newsletter.png') }}" class="w-40 lg:w-full" style="max-width: 500px;" alt="">
            </div>
            <div class="col-12 col-lg-6 mb-4 text-center">
                <h5 style="font-size: 55px; color: #CE6F39;">RECEBA EM PRIMEIRA MÃO</h5>
                <p style="font-family: Roboto; font-size: 20px;">INFORME SEU E-MAIL E FIQUE ATUALIZADO</p>
                <div class="flex align-items-center justify-content-center w-full mt-4">
                    <div class="mb-3 flex-1 relative">
                        <input type="email" class="form-control py-3 px-12" style="border-radius: 38px; border-color: #6C2E0D;" name="" id="" aria-describedby="" placeholder="Seu e-mail">
                        <i class="far fa-envelope fa-2x text-[#CE6F39]" style="position: absolute; left: 10px; top: 2px;"></i>                    
                    </div>
                    <div class="mb-3 ml-4">
                        <button class="px-4 py-2 transition duration-500 text-[#CE6F39] bg-slate-100 hover:bg-[#CE6F39] hover:text-white" style="border: 1px solid #6C2E0D; border-radius: 5px;">Enviar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>