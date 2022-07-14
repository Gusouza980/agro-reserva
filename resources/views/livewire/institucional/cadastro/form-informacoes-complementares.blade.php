<div x-data="{ showFormInformacoesComplementares: @entangle('show') }" class="w-full max-w-[900px] mx-auto relative">
    <div x-cloak x-show="showFormInformacoesComplementares" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-0" x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-0" class="w-full font-montserrat absolute -top-[15vh] pb-5">
        <div class="w-full">
            <i class="fas fa-chevron-left fa-md text-[#D7D8E4] mr-2"></i> <span class="text-[#D7D8E4]">Voltar</span>
        </div>
        <div class="w-full px-20 py-24 mt-3 bg-white rounded-t-lg shadow-[6px_6px_20px_rgba(36,62,111,0.11)]">
            <x-institucional.cadastro.step-bar step="4"></x-institucional.cadastro.step-bar>
            <div class="w-full mt-4 text-center">
                <h1 class="text-[30px] text-[#4A5860] font-montserrat font-medium">Informações Complementares</h1>
            </div>
            <div class="w-full mt-5">
                <form class="flex flex-wrap items-center w-full" wire:submit.prevent='salvar'>
                    <div class="w-1/3 mb-3">
                        <label class="form-label" for="">Referência Bancária</label>
                        <input type="text" class="w-full form-input-text" wire:model="referencia_bancaria_banco"
                            maxlength="50" required>
                    </div>
                    <div class="w-1/3 pl-3 mb-3">
                        <label class="form-label" for="">Gerente</label>
                        <input type="text" class="w-full form-input-text" wire:model="referencia_bancaria_gerente"
                            maxlength="50" required>
                    </div>
                    <div class="w-1/3 pl-3 mb-3">
                        <label class="form-label" for="">Telefone</label>
                        <input type="text" class="w-full form-input-text telefone" wire:model="referencia_bancaria_tel"
                            maxlength="14" minlength="14" required>
                    </div>
                    <div class="w-1/3 mb-3">
                        <label class="form-label" for="">Referência Comercial</label>
                        <input type="text" class="w-full form-input-text" wire:model="referencia_comercial1"
                            maxlength="50" required>
                    </div>
                    <div class="w-1/3 pl-3 mb-3">
                        <label class="form-label" for="">Telefone</label>
                        <input type="text" class="w-full form-input-text telefone" wire:model="referencia_comercial1_tel"
                            maxlength="14" minlength="14" required>
                    </div>
                    <div class="w-1/3">

                    </div>
                    <div class="w-1/3 mb-3">
                        <label class="form-label" for="">Referência Comercial</label>
                        <input type="text" class="w-full form-input-text" wire:model="referencia_comercial2"
                            maxlength="50">
                    </div>
                    <div class="w-1/3 pl-3 mb-3">
                        <label class="form-label" for="">Telefone</label>
                        <input type="text" class="w-full form-input-text telefone" wire:model="referencia_comercial2_tel"
                            maxlength="14" minlength="14">
                    </div>
                    <div class="w-full mt-5 text-right">
                        <button
                            class="shadow-md rounded-[15px] bg-[#FDAF3C] hover:bg-[#de8a10] border-2 border-[##FDAF3C] text-white px-5 py-3 font-montserrat text-[20px] font-medium">Avançar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
