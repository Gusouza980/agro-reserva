<div x-data="{ showFormDadosPropriedade: @entangle('show') }" class="w-full max-w-[900px] mx-auto relative">
    <div x-cloak x-show="showFormDadosPropriedade" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-0" x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-0" class="w-full font-montserrat absolute -top-[15vh] pb-5">
        <div class="w-full">
            <span wire:click="voltar" class="cursor-pointer transition duration-300 text-[14px] text-[#D7D8E4] hover:scale-105 hover:text-white"><i class="fas fa-chevron-left mr-2"></i> <span>Voltar</span></span>
        </div>
        <div class="w-full px-8 md:px-20 py-24 mt-3 bg-white rounded-t-lg shadow-[6px_6px_20px_rgba(36,62,111,0.11)]">
            <x-institucional.cadastro.step-bar step="3"></x-institucional.cadastro.step-bar>
            <div class="w-full mt-4 text-center">
                <h1 class="text-[30px] text-[#4A5860] font-montserrat font-medium">Dados da propriedade Rural</h1>
            </div>
            <div class="w-full mt-5">
                <form class="flex flex-wrap items-center w-full" wire:submit.prevent='salvar'>
                    <div class="w-full md:w-1/2 mb-3">
                        <label class="form-label" for="">Nome da Fazenda</label>
                        <input type="text" class="w-full form-input-text" wire:model.defer="nome_fazenda"
                            maxlength="150" required>
                    </div>
                    <div class="w-full md:w-1/2 md:pl-5 mb-3">
                        <label class="form-label" for="">Inscrição de Produtor Rural</label>
                        <input type="text" class="w-full form-input-text"
                            wire:model.defer="inscricao_produtor_rural" maxlength="20" required>
                    </div>
                    <div class="w-full md:w-1/3 mb-3">
                        <label class="form-label" for="">CEP</label>
                        <input type="text" class="w-full form-input-text cep" wire:model.defer="cep_propriedade"
                            maxlength="9" minlength="9" required>
                    </div>
                    <div class="w-full md:w-2/3 md:pl-5 mb-3">
                        <label class="form-label" for="">Endereço da Propriedade</label>
                        <input type="text" class="w-full form-input-text" wire:model.defer="rua_propriedade"
                            maxlength="50" required>
                    </div>
                    <div class="w-full md:w-3/12 mb-3">
                        <label class="form-label" for="">Número</label>
                        <input type="text" class="w-full form-input-text" wire:model.defer="numero_propriedade"
                            maxlength="10" required>
                    </div>
                    <div class="w-full md:w-4/12 md:pl-5 mb-3">
                        <label class="form-label" for="">Bairro</label>
                        <input type="text" class="w-full form-input-text" wire:model.defer="bairro_propriedade"
                            maxlength="50" required>
                    </div>
                    <div class="w-full md:w-5/12 md:pl-5 mb-3">
                        <label class="form-label" for="">Cidade</label>
                        <input type="text" class="w-full form-input-text" wire:model.defer="cidade_propriedade"
                            maxlength="50" required>
                    </div>
                    <div class="w-full md:w-2/12 mb-3">
                        <label class="form-label" for="">Estado (Sigla)</label>
                        <input type="text" class="w-full form-input-text" wire:model.defer="estado_propriedade"
                            maxlength="2" minlength="2" required>
                    </div>
                    <div class="w-full md:w-4/12 md:pl-5 mb-3">
                        <label class="form-label" for="">País</label>
                        <input type="text" class="w-full form-input-text" wire:model.defer="pais_propriedade"
                            maxlength="30" required>
                    </div>
                    <div class="w-full md:w-6/12 md:pl-5 mb-3">
                        <label class="form-label" for="">Complemento (Opcional)</label>
                        <input type="text" class="w-full form-input-text"
                            wire:model.defer="complemento_propriedade" maxlength="100">
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
