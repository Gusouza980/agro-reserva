<div class="w-full text-center mt-[65px]">
    <h2 class="text-[20px] font-medium text-[#15171E]">Informações Primárias</h2>
</div>
<div class="w-full mt-[30px]">
    <div class="w-full">
        <label class="pl-[25px] text-[16px] font-medium font-montserrat text-[#616887]" for="">Nome Completo</label>
        <input type="text" name="form.nome_dono" class="w-full form-input-text mt-[5px]" wire:model.defer="form.nome_dono" maxlength="100">
        <div class="flex justify-between mt-2">
            <div class="text-[12px] text-red-600 font-inter">
                @error('form.nome_dono')
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
        <input type="email" name="form.email" class="w-full form-input-text mt-[5px]" wire:model.defer="form.email" maxlength="100">
        <div class="flex justify-between mt-2">
            <div class="text-[12px] text-red-600 font-inter">
                @error('form.email')
                    {{ $message }}
                @enderror
            </div>
            <div class="text-[12px] text-[#CACACA] font-inter">
                Campo Obrigatório *
            </div>
        </div>
    </div>
    <div class="w-full grid grid-cols-1 gap-x-4">
        <div>
            <div class="w-full pb-[5px]">
                <label class="pl-[25px] text-[16px] font-medium font-montserrat text-[#616887]" for="">Telefone</label>
            </div>
            <x-tel-input name="form.telefone" id="telefone" class="w-full form-input-text form-input" phone-country-input="#phone_country" wire:model.defer="form.telefone" />
            <input type="hidden" id="phone_country" name="phone_country">
            <div class="flex justify-between mt-2">
                <div class="text-[12px] text-red-600 font-inter">
                    @error('form.telefone')
                        {{ $message }}
                    @enderror
                </div>
                <div class="text-[12px] text-[#CACACA] font-inter">
                    Campo Obrigatório *
                </div>
            </div>
        </div>
    </div>
    <div class="w-full grid grid-cols-1 md:grid-cols-2 gap-x-4">
        <div class="">
            <label class="pl-[25px] text-[16px] font-medium font-montserrat text-[#616887]" for="">Crie a senha de acesso</label>
            <div class="w-full relative">
                <input type="password" name="form.senha" id="senha" class="w-full form-input-text mt-[5px] pr-[20px]" wire:model.defer="form.senha" minlength="5" maxlength="100">
                <i class="fas fa-eye-slash absolute top-[11px] right-2 cursor-pointer" id="mostrar-senha"></i>
                <i class="fas fa-eye absolute top-[11px] right-2 cursor-pointer hidden" id="esconder-senha"></i>
            </div>
            <div class="flex justify-between mt-2">
                <div class="text-[12px] text-red-600 font-inter">
                    @error('form.senha')
                        {{ $message }}
                    @enderror
                </div>
                <div class="text-[12px] text-[#CACACA] font-inter">
                    Campo Obrigatório *
                </div>
            </div>
        </div>
        <div>
            <label class="pl-[25px] text-[16px] font-medium font-montserrat text-[#616887]" for="">Confirme a senha</label>
            <div class="w-full relative">
                <input type="password" name="confirmar_senha" id="confirmar-senha" class="w-full form-input-text mt-[5px] pr-[20px]" wire:model.defer="confirmar_senha" minlength="5" maxlength="100">
                <i class="fas fa-eye-slash absolute top-[11px] right-2 cursor-pointer" id="mostrar-confirmar-senha"></i>
                <i class="fas fa-eye absolute top-[11px] right-2 cursor-pointer hidden" id="esconder-confirmar-senha"></i>
            </div>
            <div class="flex justify-between mt-2">
                <div class="text-[12px] text-red-600 font-inter" id="erro-senha">
                    @error('confirmar_senha')
                        {{ $message }}
                    @enderror
                </div>
                <div class="text-[12px] text-[#CACACA] font-inter">
                    Campo Obrigatório *
                </div>
            </div>
        </div>
    </div>
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

    $('#mostrar-senha').click(function(){
        $('#senha').attr('type', 'text');
        $(this).addClass("hidden");
        $("#esconder-senha").removeClass("hidden");
    })

    $('#esconder-senha').click(function(){
        $('#senha').attr('type', 'password');
        $(this).addClass("hidden");
        $("#mostrar-senha").removeClass("hidden");
    })

    $('#mostrar-confirmar-senha').click(function(){
        $('#confirmar-senha').attr('type', 'text');
        $(this).addClass("hidden");
        $("#esconder-confirmar-senha").removeClass("hidden");
    })

    $('#esconder-confirmar-senha').click(function(){
        $('#confirmar-senha').attr('type', 'password');
        $(this).addClass("hidden");
        $("#mostrar-confirmar-senha").removeClass("hidden");
    })

    $("#confirmar-senha").on('keyup', function(){
        console.log($("#confirmar-senha").val());
        if($("#confirmar-senha").val() != $("#senha").val()){
            $("#confirmar-senha").addClass('input-error');
            $("#erro-senha").html('As senhas não coincidem');
        }else{
            $("#confirmar-senha").removeClass('input-error');
            $("#erro-senha").html('');
        }
    })
</script>

@endpush