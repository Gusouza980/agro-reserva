<div x-data="{ showAvisoUltimaEtapa: @entangle('show') }" class="w-full max-w-[750px] mx-auto relative">
    <div x-cloak x-show="showAvisoUltimaEtapa" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-0" x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-0" class="w-full font-montserrat absolute -top-[15vh] pb-5">
        <div class="w-full px-8 md:px-20 py-24 mt-3 bg-white rounded-t-lg shadow-[6px_6px_20px_rgba(36,62,111,0.11)]">
            <x-institucional.cadastro.step-bar step="5"></x-institucional.cadastro.step-bar>
            <div class="w-full text-center">
                <img class="w-full mx-auto max-w-[350px] mt-8" src="{{ asset('imagens/icone_aviso_final.svg') }}" alt="">
                <h2 class="text-[19px] text-[#15171E] mt-8 font-montserrat"><b>Agora falta pouco</b> pra vc montar seu rebanho!
                    So precisamos mais uma coisinha…</h2>
            </div>
            <div class="w-full mt-5 text-center">
                <button
                    class="shadow-md rounded-[15px] bg-[#FDAF3C] hover:bg-[#de8a10] border-2 border-[##FDAF3C] text-white px-5 py-3 font-montserrat text-[20px] font-medium" wire:click="avancar">Avançar</button>
            </div>
        </div>
    </div>
</div>
