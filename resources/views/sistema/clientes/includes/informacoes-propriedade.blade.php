<div class="w-full">
    <form wire:submit.prevent='salvar_informacoes_gerais' class="w-full relative border border-slate-300 rounded-lg py-5 px-5">
        <button type="submit" class="w-8 h-8 bg-orange-500 absolute top-1 right-1 rounded-lg"><i class="fas fa-floppy-disk text-white"></i></button>
        <div class="w-full grid grid-cols-1 md:grid-cols-4 2xl:grid-cols-5 gap-3">
            <label class="block">
                <span>Fazenda</span>
                <span class="relative mt-1.5 flex">
                    <input wire:model.defer="cliente.nome_fazenda" class="input-base" placeholder="" type="text" maxlength="150">
                </span>
            </label>
            <label class="block">
                <span>Rua</span>
                <span class="relative mt-1.5 flex">
                    <input wire:model.defer="cliente.rua_propriedade" class="input-base" placeholder="" type="text" maxlength="50">
                </span>
            </label>
            <label class="block">
                <span>Número</span>
                <span class="relative mt-1.5 flex">
                    <input wire:model.defer="cliente.numero_propriedade" class="input-base" placeholder="" type="text" maxlength="10">
                </span>
            </label>
            <label class="block">
                <span>Bairro</span>
                <span class="relative mt-1.5 flex">
                    <input wire:model.defer="cliente.bairro_propriedade" class="input-base" placeholder="" type="text" maxlength="50">
                </span>
            </label>
            <label class="block">
                <span>Cidade</span>
                <span class="relative mt-1.5 flex">
                    <input wire:model.defer="cliente.cidade_propriedade" class="input-base" placeholder="" type="email" maxlength="50">
                </span>
            </label>
            <label class="block">
                <span>Estado (UF)</span>
                <span class="relative mt-1.5 flex">
                    <input wire:model.defer="cliente.estado_propriedade" class="input-base" placeholder="" type="text" maxlength="2">
                </span>
            </label>
            <label class="block">
                <span>Complemento</span>
                <span class="relative mt-1.5 flex">
                    <input wire:model.defer="cliente.complemento_propriedade" class="input-base" placeholder="" type="text" maxlength="200">
                </span>
            </label>
        </div>
    </form>
</div>