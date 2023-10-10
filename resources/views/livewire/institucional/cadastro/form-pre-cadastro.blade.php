<div x-data="{ showFormPreCadastro: @entangle('show') }" class="w-full max-w-[800px] mx-auto relative">
    <div x-cloak x-show="showFormPreCadastro" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-0" x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-0" class="w-full font-montserrat absolute -top-[15vh] pb-5">
        <div class="w-full">
            <span wire:click="voltar" class="cursor-pointer transition duration-300 text-[14px] text-[#D7D8E4] hover:scale-105 hover:text-white"><i class="mr-2 fas fa-chevron-left"></i> <span>Voltar</span></span>
        </div>
        <div class="w-full px-6 md:px-20 py-5 mt-3 bg-white rounded-lg shadow-[6px_6px_20px_rgba(36,62,111,0.11)]">
            <x-institucional.cadastro.step-bar step="1"></x-institucional.cadastro.step-bar>
            <form class="flex flex-wrap w-full mt-4" wire:submit.prevent='salvar'>
                <div class="w-full mb-3">
                    <label class="form-label" for="">Nome Completo ou Razão Social</label>
                    <input type="text" class="w-full form-input-text" wire:model.defer="nome_dono" maxlength="100" required>
                </div>
                <div class="w-full mb-3">
                    <label class="form-label" for="">E-mail</label>
                    <input type="email" class="w-full form-input-text" wire:model.defer="email" maxlength="100" required>
                    @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="w-full mb-3 md:w-1/2 md:pr-1">
                    <label for="ddi" class="form-label">DDI</label>
                    <select class="w-full form-input-select" name="ddi" id="ddi" required>
                        @foreach ($paises as $pais)
                            <option value="{{ $pais->code }}"
                                @if ($pais->iso == 'BR') selected @endif>{{ $pais->name }}
                                ({{ $pais->code }})</option>
                        @endforeach
                    </select>
                </div>
                <div class="w-full mb-3 md:w-1/2 md:pl-1">
                    <label for="telefone" class="form-label">{{ __('messages.cadastro.telefone') }}</label>
                    <input type="text" class="w-full form-input-text" name="telefone" id="telefone" placeholder="(35)99999-9999" wire:model.defer="telefone" required>
                </div>
                <div class="w-full pr-1 mb-3 md:w-1/2">
                    <label class="form-label" for="">Crie a senha de acesso</label>
                    <input type="password" class="w-full form-input-text" wire:model.defer="senha" required>
                </div>
                <div class="w-full pl-1 mb-3 md:w-1/2">
                    <label class="form-label" for="">Confirmar senha</label>
                    <input type="password" class="w-full form-input-text" wire:model.defer="confirmacao_senha" required>
                    @error('confirmacao_senha') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="w-full mb-3">
                    <label for="assessor" class="form-label">Foi assessorado por alguém ?</label>
                    <select class="w-full form-input-select" name="assessor" id="assessor" wire:model.defer="assessor_id" required>
                        <option value="-1">Não</option>
                        @php
                            $assessores = \App\Models\Assessor::orderBy("nome", "ASC")->get()
                        @endphp
                        <optgroup label="Agroreserva">
                            @foreach($assessores->where("interno", true) as $assessor)
                                <option value="{{ $assessor->id }}">{{ $assessor->nome }}</option>
                            @endforeach
                        </optgroup>
                        <optgroup label="Parceiros">
                            @foreach($assessores->where("interno", false) as $assessor)
                                <option value="{{ $assessor->id }}">{{ $assessor->nome }}</option>
                            @endforeach
                        </optgroup>
                    </select>
                </div>
                <div class="flex items-center w-full mt-2">
                    <input type="checkbox" class="mr-2 checkbox" wire:model.defer="assinante_newsletter"/>
                    <span class="mt-1 text-black font-montserrat text-[14px] font-medium">Deseja receber novidades da Agroreserva ?</span>
                </div>
                <div class="flex items-center w-full mt-3">
                    <input type="checkbox" class="mr-2 checkbox" wire:model.defer="termos_aceitos" required/>
                    <span class="mt-1 text-black font-montserrat text-[14px] font-medium">Li e concordo com os <u>TERMOS E CONDIÇÕES DE USO</u> do site e <u>POLITICA DE PRIVACIDADE</u></span>
                </div>
                <div class="w-full mt-4 text-center">
                    <button class="text-white rounded-[0.5rem] btn-warning text-[20px] waving-hand font-montserrat font-medium normal-case px-4 py-[16px] animation duration-500 hover:scale-105">Continuar</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push("scripts")
<script src="{{ asset('js/jquery.mask.js') }}"></script>
<script>
    $.getJSON("json/mascaras_telefone.json", function(data) {
        var mascaras = data
        $(mascaras).each(function(index, element) {
            if (element.iso == "BR") {
                var mask = $(element.mask).get(-1);
                $('input[name="pais"]').val(element.name);
                $('input[name="telefone"]').mask(mask.replaceAll("#", "0"), );
                $('input[name="telefone"]').attr("placeholder", mask.replaceAll("#", "0"));
                $('input[name="telefone"]').attr("minlength", mask.length);
                $('input[name="telefone"]').attr("maxlength", mask.length);
                var flag = element.iso.toLowerCase();
                console.log("https://flagcdn.com/16x12/" + flag + ".webp");
                $("#flag-icon").attr("src", "https://flagcdn.com/16x12/" + flag + ".webp");
                $("#flag-icon").show();
            }
        });
    });

    $("#ddi").change(function() {
        var ddi = $(this).val();
        $.getJSON("json/mascaras_telefone.json", function(data) {
            var mascaras = data;
            var achou = false;
            $(mascaras).each(function(index, element) {
                if (element.code == ddi) {
                    achou = true;
                    $('input[name="telefone"]').val("");
                    $('input[name="pais"]').val(element.name);
                    if (Array.isArray(element.mask)) {
                        var mask = $(element.mask).get(-1);
                        $('input[name="telefone"]').mask(mask.replaceAll("#",
                            "0"), );
                        $('input[name="telefone"]').attr("placeholder", mask
                            .replaceAll("#", "0"));
                        $('input[name="telefone"]').attr("minlength", mask.length);
                        $('input[name="telefone"]').attr("maxlength", mask.length);
                        var flag = element.iso.toLowerCase();
                        console.log("https://flagcdn.com/16x12/" + flag + ".webp");
                        $("#flag-icon").attr("src", "https://flagcdn.com/16x12/" +
                            flag + ".webp");
                    } else {
                        $('input[name="telefone"]').mask(element.mask.replaceAll(
                            "#", "0"), );
                        $('input[name="telefone"]').attr("placeholder", element.mask
                            .replaceAll("#", "0"));
                        $('input[name="telefone"]').attr("minlength", element.mask
                            .length);
                        $('input[name="telefone"]').attr("maxlength", element.mask
                            .length);
                        var flag = element.iso.toLowerCase();
                        console.log("https://flagcdn.com/16x12/" + flag + ".webp");
                        $("#flag-icon").attr("src", "https://flagcdn.com/16x12/" +
                            flag + ".webp");
                    }
                }
            });
            if (!achou) {
                $('input[name="telefone"]').mask("#", );
                $('input[name="telefone"]').attr("placeholder",
                    "Digite seu telefone completo");
                $('input[name="telefone"]').removeAttr("minlength");
            }
        });
    })
</script>

@endpush