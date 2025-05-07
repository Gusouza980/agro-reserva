<div class="w-full" x-cloak>
    <form wire:submit.prevent="salvar" wire:loading.class="opacity-50" wire:target="salvar" class="w-full">
        <div class="pl-[25px] w-full text-lg font-semibold text-orange-500 font-montserrat tracking-wider mb-4">
            <h5>Informações Primárias</h5>
        </div>
        <div class="w-full grid grid-cols-1 md:grid-cols-2 gap-x-6">
            <div class="w-full">
                <label class="pl-[25px] text-[16px] font-medium font-montserrat text-[#616887]" for="">Nome Completo</label>
                <input type="text" name="cliente.nome_dono" class="w-full form-input-text mt-[5px]" wire:model.defer="cliente.nome_dono" maxlength="100">
                <div class="flex justify-between mt-2">
                    <div class="text-[12px] text-red-600 font-inter">
                        @error('cliente.nome_dono')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="text-[12px] text-[#CACACA] font-inter">
                        Campo Obrigatório *
                    </div>
                </div>
            </div>
            <div class="w-full">
                <label class="pl-[25px] text-[16px] font-medium font-montserrat text-[#616887]" for="">E-mail</label>
                <input type="email" name="cliente.email" class="w-full form-input-text mt-[5px]" wire:model.defer="cliente.email" maxlength="100">
                <div class="flex justify-between mt-2">
                    <div class="text-[12px] text-red-600 font-inter">
                        @error('cliente.email')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="text-[12px] text-[#CACACA] font-inter">
                        Campo Obrigatório *
                    </div>
                </div>
            </div>
            <div class="w-full">
                <label class="pl-[25px] text-[16px] font-medium font-montserrat text-[#616887]" for="">Telefone</label>
                <input type="text" name="cliente.telefone" class="w-full form-input-text mt-[5px]" wire:model.defer="cliente.telefone">
                <div class="flex justify-between mt-2">
                    <div class="text-[12px] text-red-600 font-inter">
                        @error('cliente.telefone')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="text-[12px] text-[#CACACA] font-inter">
                        Campo Obrigatório *
                    </div>
                </div>
            </div>
            <div class="w-full">
                <label class="pl-[20px] text-[16px] font-medium font-montserrat text-[#616887]" for="">Tipo de Pessoa</label>
                <select class="w-full form-input-text mt-[5px]" name="cliente.pessoa_fisica" wire:model="cliente.pessoa_fisica">
                    <option value="">Selecione</option>
                    <option value="1">Pessoa Física</option>
                    <option value="0">Pessoa Jurídica</option>
                </select>
                <div class="w-full text-[12px] text-red-600 font-inter">
                    @error('cliente.tipo_pessoa')
                        {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        @if($cliente['pessoa_fisica'] == 1)
            {{-- PESSOA FÍSICA --}}
            <div class="pl-[25px] w-full text-lg font-semibold text-orange-500 font-montserrat tracking-wider mt-10 mb-4">
                <h5>Dados de Pessoa Física</h5>
            </div>
            <div class="w-full grid grid-cols-1 md:grid-cols-3 gap-3">
                <div class="mb-5">
                    <label class="pl-[20px] text-[16px] font-medium font-montserrat text-[#616887]" for="">RG</label>
                    <input type="text" name="cliente.rg" class="w-full form-input-text mt-[5px]" wire:model.defer="cliente.rg" maxlength="20">
                </div>
                <div class="mb-5">
                    <label class="pl-[20px] text-[16px] font-medium font-montserrat text-[#616887]" for="">CPF</label>
                    <input type="text" name="cliente.cpf" class="w-full form-input-text mt-[5px]" mask="cpf" wire:model.defer="cliente.cpf" maxlength="14">
                    <div class="w-full text-[12px] text-red-600 font-inter">
                        @error('cliente.cpf')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="mb-5">
                    <label class="pl-[20px] text-[16px] font-medium font-montserrat text-[#616887]" for="">Nascimento</label>
                    <input type="date" name="cliente.nascimento" class="w-full form-input-text mt-[5px]" wire:model.defer="cliente.nascimento">
                    <div class="w-full text-[12px] text-red-600 font-inter">
                        @error('cliente.nascimento')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="w-full grid grid-cols-1 md:grid-cols-8 gap-3">
                <div class="mb-5 md:col-span-2">
                    <label class="pl-[20px] text-[16px] font-medium font-montserrat text-[#616887]" for="">Estado Civil</label>
                    <select class="w-full form-input-text mt-[5px]" name="cliente.estado_civil" wire:model="cliente.estado_civil">
                        <option value="">Selecione</option>
                        @foreach(config('clientes.estados_civis') as $key => $estado)
                            <option value="{{ $key }}">{{ $estado }}</option>
                        @endforeach
                    </select>
                    <div class="w-full text-[12px] text-red-600 font-inter">
                        @error('cliente.estado_civil')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="mb-5 md:col-span-4">
                    <label class="pl-[20px] text-[16px] font-medium font-montserrat text-[#616887]" for="">Nome do Cônjugue</label>
                    <input type="text" @if(!$this->hasConjugue()) disabled @endif name="cliente.nome_conjugue" class="w-full form-input-text mt-[5px] disabled:bg-gray-200" wire:model.defer="cliente.nome_conjugue" maxlength="50">
                    <div class="w-full text-[12px] text-red-600 font-inter">
                        @error('cliente.nome_conjugue')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="mb-5 md:col-span-2">
                    <label class="pl-[20px] text-[16px] font-medium font-montserrat text-[#616887]" for="">CPF <small>(Cônjugue)</small></label>
                    <input type="text" @if(!$this->hasConjugue()) disabled @endif name="cliente.cpf_conjugue" class="w-full form-input-text mt-[5px] disabled:bg-gray-200" mask="cpf" wire:model.defer="cliente.cpf_conjugue" maxlength="14">
                    <div class="w-full text-[12px] text-red-600 font-inter">
                        @error('cliente.cpf_conjugue')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="w-full grid grid-cols-1 md:grid-cols-3 gap-3">
                <div class="mb-5">
                    <label class="pl-[20px] text-[16px] font-medium font-montserrat text-[#616887]" for="">CEP</label>
                    <input type="text" name="cliente.cep" class="w-full form-input-text mt-[5px]" mask="cep" x-on:change="$wire.set('cliente.cep', $event.target.value)" wire:model.defer="cliente.cep" maxlength="9">
                    <div class="w-full text-[12px] text-red-600 font-inter">
                        @error('cliente.cep')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="mb-5 md:col-span-2">
                    <label class="pl-[20px] text-[16px] font-medium font-montserrat text-[#616887]" for="">Endereço Residencial</label>
                    <input type="text" name="cliente.rua" wire:loading.attr="disabled" wire:target="cliente.cep" class="w-full form-input-text mt-[5px]" wire:model.defer="cliente.rua" maxlength="255">
                    <div class="w-full text-[12px] text-red-600 font-inter">
                        @error('cliente.rua')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="w-full grid grid-cols-2 md:grid-cols-6 gap-3">
                <div class="mb-5">
                    <label class="pl-[20px] text-[16px] font-medium font-montserrat text-[#616887]" for="">Número</label>
                    <input type="text" name="cliente.numero" wire:loading.attr="disabled" wire:target="cliente.cep" class="w-full form-input-text mt-[5px]" wire:model.defer="cliente.numero" maxlength="6">
                    <div class="w-full text-[12px] text-red-600 font-inter">
                        @error('cliente.numero')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="mb-5 md:col-span-2">
                    <label class="pl-[20px] text-[16px] font-medium font-montserrat text-[#616887]" for="">Bairro</label>
                    <input type="text" name="cliente.bairro" wire:loading.attr="disabled" wire:target="cliente.cep" class="w-full form-input-text mt-[5px]" wire:model.defer="cliente.bairro" maxlength="50">
                    <div class="w-full text-[12px] text-red-600 font-inter">
                        @error('cliente.bairro')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="mb-5 col-span-2 md:col-span-3">
                    <label class="pl-[20px] text-[16px] font-medium font-montserrat text-[#616887]" for="">Complemento</label>
                    <input type="text" name="cliente.complemento" class="w-full form-input-text mt-[5px]" wire:model.defer="cliente.complemento" maxlength="50">
                    <div class="w-full text-[12px] text-red-600 font-inter">
                        @error('cliente.complemento')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="w-full grid grid-cols-2 md:grid-cols-3 gap-3">
                <div class="mb-5 col-span-2 md:col-span-1">
                    <label class="pl-[20px] text-[16px] font-medium font-montserrat text-[#616887]" for="">Cidade</label>
                    <input type="text" name="cliente.cidade" wire:loading.attr="disabled" wire:target="cliente.cep" class="w-full form-input-text mt-[5px]" wire:model.defer="cliente.cidade" maxlength="50">
                    <div class="w-full text-[12px] text-red-600 font-inter">
                        @error('cliente.cidade')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="mb-5">
                    <label class="pl-[20px] text-[16px] font-medium font-montserrat text-[#616887]" for="">Estado</label>
                    <select class="w-full form-input-text mt-[5px]" wire:loading.attr="disabled" wire:target="cliente.cep" name="cliente.estado" wire:model.defer="cliente.estado">
                        <option value="">Selecione</option>
                        @foreach(config('estados.estados') as $uf => $estado)
                            <option value="{{ $uf }}">{{ $estado }}</option>
                        @endforeach
                    </select>
                    <div class="w-full text-[12px] text-red-600 font-inter">
                        @error('cliente.estado')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="mb-5">
                    <label class="pl-[20px] text-[16px] font-medium font-montserrat text-[#616887]" for="">País</label>
                    <input type="text" name="cliente.pais" class="w-full form-input-text mt-[5px]" wire:model.defer="cliente.pais" maxlength="50">
                    <div class="w-full text-[12px] text-red-600 font-inter">
                        @error('cliente.pais')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                
            </div>
        @else
            {{-- PESSOA JURÍDICA --}}
            <div class="pl-[25px] w-full text-lg font-semibold text-orange-500 font-montserrat tracking-wider mt-10 mb-4">
                <h5>Dados de Pessoa Jurídica</h5>
            </div>
            <div class="w-full grid grid-cols-1 md:grid-cols-5 gap-3">
                <div class="mb-5 md:col-span-2">
                    <label class="pl-[20px] text-[16px] font-medium font-montserrat text-[#616887]" for="">CNPJ</label>
                    <input type="text" name="cliente.cnpj" class="w-full form-input-text mt-[5px]" mask="cnpj" wire:model.defer="cliente.cnpj" maxlength="50">
                    <div class="w-full text-[12px] text-red-600 font-inter">
                        @error('cliente.cnpj')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="mb-5 md:col-span-3">
                    <label class="pl-[20px] text-[16px] font-medium font-montserrat text-[#616887]" for="">Nome Fantasia</label>
                    <input type="text" name="cliente.nome_fantasia" class="w-full form-input-text mt-[5px]" wire:model.defer="cliente.nome_fantasia" maxlength="100">
                    <div class="w-full text-[12px] text-red-600 font-inter">
                        @error('cliente.nome_fantasia')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="w-full grid grid-cols-1 md:grid-cols-3 gap-3">
                <div class="mb-5">
                    <label class="pl-[20px] text-[16px] font-medium font-montserrat text-[#616887]" for="">CEP</label>
                    <input type="text" name="cliente.cep_comercial" class="w-full form-input-text mt-[5px]" x-on:change="$wire.set('cliente.cep_comercial', $event.target.value)" mask="cep" wire:model.defer="cliente.cep_comercial" maxlength="9">
                    <div class="w-full text-[12px] text-red-600 font-inter">
                        @error('cliente.cep_comercial')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="mb-5 md:col-span-2">
                    <label class="pl-[20px] text-[16px] font-medium font-montserrat text-[#616887]" for="">Endereço Comercial</label>
                    <input type="text" name="cliente.rua_comercial" class="w-full form-input-text mt-[5px]" wire:loading.attr="disabled" wire:target="cliente.cep_comercial" wire:model.defer="cliente.rua_comercial" maxlength="255">
                    <div class="w-full text-[12px] text-red-600 font-inter">
                        @error('cliente.rua_comercial')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="w-full grid grid-cols-2 md:grid-cols-6 gap-3">
                <div class="mb-5">
                    <label class="pl-[20px] text-[16px] font-medium font-montserrat text-[#616887]" for="">Número</label>
                    <input type="text" name="cliente.numero_comercial" class="w-full form-input-text mt-[5px]" wire:loading.attr="disabled" wire:target="cliente.cep_comercial" wire:model.defer="cliente.numero_comercial" maxlength="6">
                    <div class="w-full text-[12px] text-red-600 font-inter">
                        @error('cliente.numero_comercial')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="mb-5 md:col-span-2">
                    <label class="pl-[20px] text-[16px] font-medium font-montserrat text-[#616887]" for="">Bairro</label>
                    <input type="text" name="cliente.bairro_comercial" class="w-full form-input-text mt-[5px]" wire:loading.attr="disabled" wire:target="cliente.cep_comercial" wire:model.defer="cliente.bairro_comercial" maxlength="50">
                    <div class="w-full text-[12px] text-red-600 font-inter">
                        @error('cliente.bairro_comercial')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="mb-5 col-span-2 md:col-span-3">
                    <label class="pl-[20px] text-[16px] font-medium font-montserrat text-[#616887]" for="">Complemento</label>
                    <input type="text" name="cliente.complemento_comercial" class="w-full form-input-text mt-[5px]" wire:loading.attr="disabled" wire:target="cliente.cep_comercial" wire:model.defer="cliente.complemento_comercial" maxlength="50">
                    <div class="w-full text-[12px] text-red-600 font-inter">
                        @error('cliente.complemento_comercial')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="w-full grid grid-cols-2 md:grid-cols-3 gap-3">
                <div class="mb-5 col-span-2 md:col-span-1">
                    <label class="pl-[20px] text-[16px] font-medium font-montserrat text-[#616887]" for="">Cidade</label>
                    <input type="text" name="cliente.cidade_comercial" class="w-full form-input-text mt-[5px]" wire:loading.attr="disabled" wire:target="cliente.cep_comercial" wire:model.defer="cliente.cidade_comercial" maxlength="50">
                    <div class="w-full text-[12px] text-red-600 font-inter">
                        @error('cliente.cidade_comercial')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="mb-5">
                    <label class="pl-[20px] text-[16px] font-medium font-montserrat text-[#616887]" for="">Estado</label>
                    <select name="cliente.estado_comercial" class="w-full form-input-text mt-[5px]" wire:loading.attr="disabled" wire:target="cliente.cep_comercial" wire:model.defer="cliente.estado_comercial">
                        <option value="">Selecione</option>
                        @foreach(config('estados.estados') as $uf => $estado)
                            <option value="{{ $uf }}">{{ $estado }}</option>
                        @endforeach
                    </select>
                    <div class="w-full text-[12px] text-red-600 font-inter">
                        @error('cliente.estado_comercial')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="mb-5">
                    <label class="pl-[20px] text-[16px] font-medium font-montserrat text-[#616887]" for="">País</label>
                    <input type="text" name="cliente.pais_comercial" class="w-full form-input-text mt-[5px]" wire:loading.attr="disabled" wire:target="cliente.cep_comercial" wire:model.defer="cliente.pais_comercial" maxlength="50">
                    <div class="w-full text-[12px] text-red-600 font-inter">
                        @error('cliente.pais_comercial')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                
            </div>
        @endif
        {{-- DADOS DE PROPRIEDADE RURAL --}}
        <div class="pl-[25px] w-full text-lg font-semibold text-orange-500 font-montserrat tracking-wider mt-10 mb-4">
            <h5>Dados de Propriedade Rural</h5>
        </div>
        <div class="w-full grid grid-cols-1 md:grid-cols-2 gap-3">
            <div class="mb-5">
                <label class="pl-[20px] text-[16px] font-medium font-montserrat text-[#616887]" for="">Nome da Fazenda</label>
                <input type="text" name="cliente.nome_fazenda" class="w-full form-input-text mt-[5px]" wire:model.defer="cliente.nome_fazenda" maxlength="150">
                <div class="w-full text-[12px] text-red-600 font-inter">
                    @error('cliente.nome_fazenda')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="mb-5">
                <label class="pl-[20px] text-[16px] font-medium font-montserrat text-[#616887]" for="">Inscrição de Produtor Rural</label>
                <input type="text" name="cliente.inscricao_produtor_rural" class="w-full form-input-text mt-[5px]" wire:model.defer="cliente.inscricao_produtor_rural" maxlength="20">
                <div class="w-full text-[12px] text-red-600 font-inter">
                    @error('cliente.inscricao_produtor_rural')
                        {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="w-full grid grid-cols-1 md:grid-cols-3 gap-3">
            <div class="mb-5">
                <label class="pl-[20px] text-[16px] font-medium font-montserrat text-[#616887]" for="">CEP</label>
                <input type="text" name="cliente.cep_propriedade" class="w-full form-input-text mt-[5px]" x-on:change="$wire.set('cliente.cep_propriedade', $event.target.value)" mask="cep" wire:model.defer="cliente.cep_propriedade" maxlength="9">
                <div class="w-full text-[12px] text-red-600 font-inter">
                    @error('cliente.cep_propriedade')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="mb-5 md:col-span-2">
                <label class="pl-[20px] text-[16px] font-medium font-montserrat text-[#616887]" for="">Endereço da Propriedade</label>
                <input type="text" name="cliente.rua_propriedade" class="w-full form-input-text mt-[5px]" wire:loading.attr="disabled" wire:target="cliente.cep_propriedade" wire:model.defer="cliente.rua_propriedade" maxlength="255">
                <div class="w-full text-[12px] text-red-600 font-inter">
                    @error('cliente.rua_propriedade')
                        {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="w-full grid grid-cols-2 md:grid-cols-6 gap-3">
            <div class="mb-5">
                <label class="pl-[20px] text-[16px] font-medium font-montserrat text-[#616887]" for="">Número</label>
                <input type="text" name="cliente.numero_propriedade" class="w-full form-input-text mt-[5px]" wire:loading.attr="disabled" wire:target="cliente.cep_propriedade" wire:model.defer="cliente.numero_propriedade" maxlength="6">
                <div class="w-full text-[12px] text-red-600 font-inter">
                    @error('cliente.numero_propriedade')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="mb-5 md:col-span-2">
                <label class="pl-[20px] text-[16px] font-medium font-montserrat text-[#616887]" for="">Bairro</label>
                <input type="text" name="cliente.bairro_propriedade" class="w-full form-input-text mt-[5px]" wire:loading.attr="disabled" wire:target="cliente.cep_propriedade" wire:model.defer="cliente.bairro_propriedade" maxlength="50">
                <div class="w-full text-[12px] text-red-600 font-inter">
                    @error('cliente.bairro_propriedade')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="mb-5 col-span-2 md:col-span-3">
                <label class="pl-[20px] text-[16px] font-medium font-montserrat text-[#616887]" for="">Complemento</label>
                <input type="text" name="cliente.complemento_propriedade" class="w-full form-input-text mt-[5px]" wire:loading.attr="disabled" wire:target="cliente.cep_propriedade" wire:model.defer="cliente.complemento_propriedade" maxlength="50">
                <div class="w-full text-[12px] text-red-600 font-inter">
                    @error('cliente.complemento_propriedade')
                        {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="w-full grid grid-cols-2 md:grid-cols-3 gap-3">
            <div class="mb-5 col-span-2 md:col-span-1">
                <label class="pl-[20px] text-[16px] font-medium font-montserrat text-[#616887]" for="">Cidade</label>
                <input type="text" name="cliente.cidade_propriedade" class="w-full form-input-text mt-[5px]" wire:loading.attr="disabled" wire:target="cliente.cep_propriedade" wire:model.defer="cliente.cidade_propriedade" maxlength="50">
                <div class="w-full text-[12px] text-red-600 font-inter">
                    @error('cliente.cidade_propriedade')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="mb-5">
                <label class="pl-[20px] text-[16px] font-medium font-montserrat text-[#616887]" for="">Estado</label>
                <select class="w-full form-input-text mt-[5px]" name="cliente.estado_propriedade" wire:loading.attr="disabled" wire:target="cliente.cep_propriedade" wire:model.defer="cliente.estado_propriedade">
                    <option value="">Selecione</option>
                    @foreach(config('estados.estados') as $uf => $estado)
                        <option value="{{ $uf }}">{{ $estado }}</option>
                    @endforeach
                </select>
                <div class="w-full text-[12px] text-red-600 font-inter">
                    @error('cliente.estado_propriedade')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="mb-5">
                <label class="pl-[20px] text-[16px] font-medium font-montserrat text-[#616887]" for="">País</label>
                <input type="text" name="cliente.pais_propriedade" class="w-full form-input-text mt-[5px]" wire:loading.attr="disabled" wire:target="cliente.cep_propriedade" wire:model.defer="cliente.pais_propriedade" maxlength="50">
                <div class="w-full text-[12px] text-red-600 font-inter">
                    @error('cliente.pais_propriedade')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            
        </div>
        <div class="w-full">
            <button wire:loading.attr="disabled" wire:target="salvar" class="bg-orange-500 text-white hover:bg-orange-700 transition duration-200 py-1 rounded-md w-full">Salvar</button>
        </div>
    </form>
</div>

@push('scripts')

<script>
    input = document.getElementById('telefone');
    input.addEventListener('telchange', function(e) {
        if(!e.detail.valid) {
            $('input[data-phone-input="#telefone"]').addClass('input-error');
            console.log('adicionado');
        }else{
            $('input[data-phone-input="#telefone"]').removeClass('input-error');
            console.log('removido');
        }
    });
</script>

@endpush