<div class="w-full">
    <form wire:submit.prevent='salvar_informacoes_gerais' class="w-full relative border border-slate-300 rounded-lg py-5 px-5">
        <button type="submit" class="w-8 h-8 bg-orange-500 absolute top-1 right-1 rounded-lg"><i class="fas fa-floppy-disk text-white"></i></button>
        <div class="w-full grid grid-cols-1 md:grid-cols-4 2xl:grid-cols-5 gap-3">
            <label class="block">
                <span>Nome</span>
                <span class="relative mt-1.5 flex">
                    <input wire:model.defer="cliente.nome_dono" class="input-base" placeholder="" type="text" required maxlength="100">
                </span>
            </label>
            <label class="block">
                <span>E-mail</span>
                <span class="relative mt-1.5 flex">
                    <input wire:model.defer="cliente.email" class="input-base" placeholder="" type="email" required maxlength="100">
                </span>
            </label>
            <label class="block">
                <span>Data de Nascimento</span>
                <span class="relative mt-1.5 flex">
                    <input wire:model.defer="cliente.nascimento" class="input-base" placeholder="" type="date">
                </span>
            </label>
            <label class="block">
                <span>Tipo de Pessoa</span>
                <span class="relative mt-1.5 flex">
                    <select wire:model.defer="cliente.pessoa_fisica" class="input-base" required>
                        <option value="0">Jurídica</option>
                        <option value="1">Física</option>
                    </select>
                </span>
            </label>
            <label class="block">
                <span>Nome do Cônjugue</span>
                <span class="relative mt-1.5 flex">
                    <input wire:model.defer="cliente.nome_conjugue" class="input-base" placeholder="" type="text" required maxlength="100">
                </span>
            </label>
            <label class="block">
                <span>CPF do Cônjugue</span>
                <span class="relative mt-1.5 flex">
                    <input wire:model.defer="cliente.cpf_conjugue" class="input-base" placeholder="" type="text" required maxlength="100">
                </span>
            </label>
            <label class="block">
                <span>Telefone</span>
                <span class="relative mt-1.5 flex">
                    <input wire:model.defer="cliente.telefone" class="input-base tel" placeholder="" type="text" maxlength="50">
                </span>
            </label>
            <label class="block">
                <span>Whatsapp</span>
                <span class="relative mt-1.5 flex">
                    <input wire:model.defer="cliente.whatsapp" class="input-base tel" placeholder="" type="text" maxlength="50">
                </span>
            </label>
            <label class="block">
                <span>Inscrição de Produtor Rural</span>
                <span class="relative mt-1.5 flex">
                    <input wire:model.defer="cliente.inscricao_produtor_rural" class="input-base" placeholder="" type="text" maxlength="20">
                </span>
            </label>
            <label class="block">
                <span>RG</span>
                <span class="relative mt-1.5 flex">
                    <input wire:model.defer="cliente.rg" class="input-base" placeholder="" type="text" required maxlength="20">
                </span>
            </label>
            <label class="block">
                <span>CPF</span>
                <span class="relative mt-1.5 flex">
                    <input wire:model.defer="cliente.cpf" class="input-base" placeholder="" type="text" required maxlength="50">
                </span>
            </label>
            <label class="block">
                <span>CNPJ</span>
                <span class="relative mt-1.5 flex">
                    <input wire:model.defer="cliente.cnpj" class="input-base" placeholder="" type="text" required maxlength="50">
                </span>
            </label>
            <label class="block">
                <span>Rua</span>
                <span class="relative mt-1.5 flex">
                    <input wire:model.defer="cliente.rua" class="input-base" placeholder="" type="text" maxlength="255">
                </span>
            </label>
            <label class="block">
                <span>Número</span>
                <span class="relative mt-1.5 flex">
                    <input wire:model.defer="cliente.numero" class="input-base" placeholder="" type="text" maxlength="20">
                </span>
            </label>
            <label class="block">
                <span>Bairro</span>
                <span class="relative mt-1.5 flex">
                    <input wire:model.defer="cliente.bairro" class="input-base" placeholder="" type="text" maxlength="50">
                </span>
            </label>
            <label class="block">
                <span>Cidade</span>
                <span class="relative mt-1.5 flex">
                    <input wire:model.defer="cliente.cidade" class="input-base" placeholder="" type="text" required maxlength="100">
                </span>
            </label>
            <label class="block">
                <span>Estado (UF)</span>
                <span class="relative mt-1.5 flex">
                    <input wire:model.defer="cliente.estado" class="input-base" placeholder="" type="text" required maxlength="2">
                </span>
            </label>
            <label class="block">
                <span>CEP</span>
                <span class="relative mt-1.5 flex">
                    <input wire:model.defer="cliente.cep" class="input-base" placeholder="" type="text" required maxlength="50">
                </span>
            </label>
            <label class="block">
                <span>Complemento</span>
                <span class="relative mt-1.5 flex">
                    <input wire:model.defer="cliente.complemento" class="input-base" placeholder="" type="text" maxlength="250">
                </span>
            </label>
            <label class="block">
                <span>Assessor</span>
                <span class="relative mt-1.5 flex">
                    <select wire:model.defer="cliente.assessor_id" class="input-base">
                        <option value="">Nenhum</option>
                        @foreach($this->getAssessoresProperty() as $assessor)
                            <option value="{{ $assessor->id }}">{{ $assessor->nome }}</option>
                        @endforeach
                    </select>
                </span>
            </label>
        </div>
    </form>
</div>