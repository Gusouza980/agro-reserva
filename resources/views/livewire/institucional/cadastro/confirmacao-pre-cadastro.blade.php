<div x-data="{ showConfirmacaoPreCadastro: @entangle('show') }" class="w-full max-w-[800px] mx-auto relative">
    <div x-cloak x-show="showConfirmacaoPreCadastro" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-0" x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-0" class="w-full font-montserrat absolute -top-[15vh] pb-5">
        <div class="w-full">
            <i class="fas fa-chevron-left fa-md text-[#D7D8E4] mr-2"></i> <span class="text-[#D7D8E4]">Voltar</span>
        </div>
        <div class="w-full px-5 py-5 mt-3 bg-white rounded-t-lg shadow-[6px_6px_20px_rgba(36,62,111,0.11)]">
            <div class="w-full">
                <img class="mx-auto" id="icone-sucesso-precadastro" src="{{ asset('imagens/icone_pre_cadastro.png') }}" width="200" alt="">
            </div>
            <div class="w-full mt-4 text-center">
                <span class="text-[#15171E] text-[20px] font-montserrat font-medium">
                    Seu <b>Pré-cadastro</b> foi criado com sucesso. Mas lembre-se: para finalizar a comprar, 
                    seu cadastro precisa estar <b>completo e aprovado</b> pelo nosso time.
                    <b>Rápido, prático seguro!</b> “Bora” preencher agora?
                </span>
            </div>
            <div class="grid w-full grid-cols-2 gap-8 mt-5">
                <div class="text-right">
                    <a href="{{ route('index') }}" class="rounded-[15px] border-2 border-[#80828B] hover:bg-gray-500 hover:text-white text-[#15171E] px-5 py-3 font-montserrat text-[20px] font-medium">Voltar ao site</a>
                </div>
                <div class="text-left">
                    <button class="rounded-[15px] bg-[#FDAF3C] hover:bg-[#de8a10] border-2 border-[##FDAF3C] text-white px-5 py-3 font-montserrat text-[20px] font-medium" wire:click="avancar">Completar Agora</button>
                </div>
            </div>
        </div>
    </div>
</div>
