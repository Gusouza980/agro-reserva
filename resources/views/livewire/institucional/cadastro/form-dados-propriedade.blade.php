<div x-data="{ showFormDadosPropriedade: @entangle('show') }" class="w-full max-w-[900px] mx-auto relative">
    <div x-cloak x-show="showFormDadosPropriedade" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-0" x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-0" class="w-full font-montserrat absolute -top-[15vh] pb-5">
        <div class="w-full">
            <i class="fas fa-chevron-left fa-md text-[#D7D8E4] mr-2"></i> <span class="text-[#D7D8E4]">Voltar</span>
        </div>
        <div class="w-full px-20 py-24 mt-3 bg-white rounded-t-lg shadow-[6px_6px_20px_rgba(36,62,111,0.11)]">
            <x-institucional.cadastro.step-bar step="3"></x-institucional.cadastro.step-bar>
            <div class="w-full mt-4 text-center">
                <h1 class="text-[30px] text-[#4A5860] font-montserrat font-medium">Dados da propriedade Rural</h1>
            </div>
            <div class="w-full mt-5">
                <div class="flex flex-wrap items-center w-full ">

                    <div class="w-1/2 mb-3">
                        <label class="form-label" for="">Nome da Fazenda</label>
                        <input type="text" class="w-full form-input-text" wire:model="nome_fazenda"
                            maxlength="150" required>
                    </div>
                    <div class="w-1/2 pl-3 mb-3">
                        <label class="form-label" for="">Inscrição de Produtor Rural</label>
                        <input type="text" class="w-full form-input-text"
                            wire:model="inscricao_produtor_rural" maxlength="100" required>
                    </div>
                    <div class="w-1/3 mb-3">
                        <label class="form-label" for="">CEP</label>
                        <input type="text" class="w-full form-input-text" wire:model="cep_propriedade"
                            maxlength="10" required>
                    </div>
                    <div class="w-2/3 pl-3 mb-3">
                        <label class="form-label" for="">Endereço Comercial</label>
                        <input type="text" class="w-full form-input-text" wire:model="rua_propriedade"
                            maxlength="50" required>
                    </div>
                    <div class="w-3/12 mb-3">
                        <label class="form-label" for="">Número</label>
                        <input type="text" class="w-full form-input-text" wire:model="numero_propriedade"
                            maxlength="10" required>
                    </div>
                    <div class="w-4/12 pl-3 mb-3">
                        <label class="form-label" for="">Bairro</label>
                        <input type="text" class="w-full form-input-text" wire:model="bairro_propriedade"
                            maxlength="50" required>
                    </div>
                    <div class="w-5/12 pl-3 mb-3">
                        <label class="form-label" for="">Cidade</label>
                        <input type="text" class="w-full form-input-text" wire:model="cidade_propriedade"
                            maxlength="50" required>
                    </div>
                    <div class="w-2/12 mb-3">
                        <label class="form-label" for="">Estado</label>
                        <input type="text" class="w-full form-input-text" wire:model="estado_propriedade"
                            maxlength="2" required>
                    </div>
                    <div class="w-4/12 pl-3 mb-3">
                        <label class="form-label" for="">País</label>
                        <input type="text" class="w-full form-input-text" wire:model="pais_propriedade"
                            maxlength="50" required>
                    </div>
                    <div class="w-6/12 pl-3 mb-3">
                        <label class="form-label" for="">Complemento (Opcional)</label>
                        <input type="text" class="w-full form-input-text"
                            wire:model="complemento_propriedade" maxlength="255">
                    </div>
                    <div class="w-full mt-5 text-right">
                        <button
                            class="shadow-md rounded-[15px] bg-[#FDAF3C] hover:bg-[#de8a10] border-2 border-[##FDAF3C] text-white px-5 py-3 font-montserrat text-[20px] font-medium">Avançar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
