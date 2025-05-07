<div class="w-full">
    <form wire:submit.prevent='salvar_informacoes_gerais' class="w-full relative border border-slate-300 rounded-lg py-5 px-5">
        <button type="submit" class="w-8 h-8 bg-orange-500 absolute top-1 right-1 rounded-lg"><i class="fas fa-floppy-disk text-white"></i></button>
        <div class="w-full">
            <h5 class="text-md font-medium text-gray-600">Referência Bancária</h5>
        </div>
        <div class="w-full grid grid-cols-1 md:grid-cols-4 2xl:grid-cols-5 gap-3 mt-2">
            <label class="block md:col-span-2 2xl:col-span-3">
                <span>Banco</span>
                <span class="relative mt-1.5 flex">
                    <input wire:model.defer="cliente.referencia_bancaria_banco" class="input-base" placeholder="" type="text" maxlength="255">
                </span>
            </label>
            <label class="block">
                <span>Gerente</span>
                <span class="relative mt-1.5 flex">
                    <input wire:model.defer="cliente.referencia_bancaria_gerente" class="input-base" placeholder="" type="text" maxlength="255">
                </span>
            </label>
            <label class="block">
                <span>Telefone</span>
                <span class="relative mt-1.5 flex">
                    <input wire:model.defer="cliente.referencia_bancaria_tel" class="input-base" placeholder="" type="text" maxlength="50">
                </span>
            </label>
        </div>
    </form>

    <form wire:submit.prevent='salvar_informacoes_gerais' class="w-full relative border border-slate-300 rounded-lg py-5 px-5 mt-4">
        <button type="submit" class="w-8 h-8 bg-orange-500 absolute top-1 right-1 rounded-lg"><i class="fas fa-floppy-disk text-white"></i></button>
        <div class="w-full">
            <h5 class="text-md font-medium text-gray-600">Referências Comerciais</h5>
        </div>
        <div class="w-full grid grid-cols-1 md:grid-cols-4 2xl:grid-cols-5 gap-3 mt-3">
            <label class="block md:col-span-3 2xl:col-span-4">
                <span>Nome</span>
                <span class="relative mt-1.5 flex">
                    <input wire:model.defer="cliente.referencia_comercial1" class="input-base" placeholder="" type="text" maxlength="100">
                </span>
            </label>
            <label class="block">
                <span>Telefone</span>
                <span class="relative mt-1.5 flex">
                    <input wire:model.defer="cliente.referencia_comercial1_tel" class="input-base" placeholder="" type="text" maxlength="30">
                </span>
            </label>
        </div>
        <div class="w-full grid grid-cols-1 md:grid-cols-4 2xl:grid-cols-5 gap-3 mt-3">
            <label class="block md:col-span-3 2xl:col-span-4">
                <span>Nome</span>
                <span class="relative mt-1.5 flex">
                    <input wire:model.defer="cliente.referencia_comercial2" class="input-base" placeholder="" type="text" maxlength="100">
                </span>
            </label>
            <label class="block">
                <span>Telefone</span>
                <span class="relative mt-1.5 flex">
                    <input wire:model.defer="cliente.referencia_comercial2_tel" class="input-base" placeholder="" type="text" maxlength="30">
                </span>
            </label>
        </div>
        <div class="w-full grid grid-cols-1 md:grid-cols-4 2xl:grid-cols-5 gap-3 mt-3">
            <label class="block md:col-span-3 2xl:col-span-4">
                <span>Nome</span>
                <span class="relative mt-1.5 flex">
                    <input wire:model.defer="cliente.referencia_comercial3" class="input-base" placeholder="" type="text" maxlength="100">
                </span>
            </label>
            <label class="block">
                <span>Telefone</span>
                <span class="relative mt-1.5 flex">
                    <input wire:model.defer="cliente.referencia_comercial3_tel" class="input-base" placeholder="" type="text" maxlength="30">
                </span>
            </label>
        </div>
    </form>

    <form wire:submit.prevent='salvar_informacoes_gerais' class="w-full relative border border-slate-300 rounded-lg py-5 px-5 mt-4">
        <button type="submit" class="w-8 h-8 bg-orange-500 absolute top-1 right-1 rounded-lg"><i class="fas fa-floppy-disk text-white"></i></button>
        <div class="w-full">
            <h5 class="text-md font-medium text-gray-600">Referências Coorporativas</h5>
        </div>
        <div class="w-full grid grid-cols-1 md:grid-cols-4 2xl:grid-cols-5 gap-3 mt-3">
            <label class="block md:col-span-3 2xl:col-span-4">
                <span>Nome</span>
                <span class="relative mt-1.5 flex">
                    <input wire:model.defer="cliente.referencia_coorporativa1" class="input-base" placeholder="" type="text" maxlength="100">
                </span>
            </label>
            <label class="block">
                <span>Telefone</span>
                <span class="relative mt-1.5 flex">
                    <input wire:model.defer="cliente.referencia_coorporativa1_tel" class="input-base" placeholder="" type="text" maxlength="30">
                </span>
            </label>
        </div>
        <div class="w-full grid grid-cols-1 md:grid-cols-4 2xl:grid-cols-5 gap-3 mt-3">
            <label class="block md:col-span-3 2xl:col-span-4">
                <span>Nome</span>
                <span class="relative mt-1.5 flex">
                    <input wire:model.defer="cliente.referencia_coorporativa2" class="input-base" placeholder="" type="text" maxlength="100">
                </span>
            </label>
            <label class="block">
                <span>Telefone</span>
                <span class="relative mt-1.5 flex">
                    <input wire:model.defer="cliente.referencia_coorporativa2_tel" class="input-base" placeholder="" type="text" maxlength="30">
                </span>
            </label>
        </div>
    </form>
</div>