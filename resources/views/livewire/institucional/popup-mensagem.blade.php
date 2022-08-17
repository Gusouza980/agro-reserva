<div x-data="{mostrarPopup: @entangle('mostrarPopup')}">
    <div x-show="mostrarPopup" x-cloak class="flex items-center justify-center fixed w-screen h-screen z-50 top-0 left-0" style="background-color: rgba(0,0,0,0.45)">
        <div @click.outside="mostrarPopup = false" class="w-full relative px-5 md:max-w-[600px] bg-white py-5">
            <i class="fas fa-times text-[#80828b] fa-lg absolute top-5 right-5 hover:scale-110 duration-300 cpointer" @click="mostrarPopup = false"></i>
            <div class="w-full flex justify-center mt-4">
                @if($icone == "sucesso")
                    <img src="{{ asset('imagens/icone_cadastro.png') }}" width="120" alt="">
                @elseif($icone == "erro")
                    <img src="{{ asset('imagens/icone_erro.png') }}" width="120" alt="">
                @endif
            </div>
            <div class="w-full font-montserrat text-[16px] font-medium text-center">
                {!! $msg !!}
            </div>
            <div class="w-full flex justify-center font-montserrat text-[14px] font-medium mt-4" @click="mostrarPopup = false">
                <button class="border-2 border-slate-300 hover:border-[#80828B] hover:bg-[#80828B] hover:text-white text-[#80828B] py-2 px-4 font-medium rounded-[15px]">Ok</button>
            </div>
        </div>   
    </div>
     
</div>
