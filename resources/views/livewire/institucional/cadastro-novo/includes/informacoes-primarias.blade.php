<div class="w-full text-center mt-[65px]">
    <h2 class="text-[20px] font-medium text-[#15171E]">Informações Primárias</h2>
</div>
<div class="w-full mt-[30px]">
    <div class="w-full">
        <label class="pl-[25px] text-[16px] font-medium font-montserrat text-[#616887]" for="">Nome Completo</label>
        <input type="text" class="w-full form-input-text mt-[10px]" wire:model.defer="form.nome_dono" maxlength="100" required>
        <div class="w-full mt-2 flex justify-end text-[12px] text-[#CACACA] font-inter">
            Campo Obrigatório *
        </div>
    </div>
    <div class="w-full">
        <label class="pl-[25px] text-[16px] font-medium font-montserrat text-[#616887]" for="">E-mail</label>
        <input type="email" class="w-full form-input-text mt-[10px]" wire:model.defer="form.email" maxlength="100" required>
        <div class="w-full mt-2 flex justify-end text-[12px] text-[#CACACA] font-inter">
            Campo Obrigatório *
        </div>
    </div>
    <div class="w-full grid grid-cols-1 gap-x-4">
        <div>
            <label class="pl-[25px] text-[16px] font-medium font-montserrat text-[#616887]" for="">Telefone</label>
            <x-tel-input name="telefone" id="telefone" class="w-full form-input-text mt-[10px] form-input" phone-country-input="#phone_country" wire:model.defer="form.telefone" required />
            <input type="hidden" id="phone_country" name="phone_country">
            <div class="w-full mt-2 flex justify-end text-[12px] text-[#CACACA] font-inter">
                Campo Obrigatório *
            </div>
        </div>
    </div>
    <div class="w-full grid grid-cols-1 md:grid-cols-2 gap-x-4">
        <div class="">
            <label class="pl-[25px] text-[16px] font-medium font-montserrat text-[#616887]" for="">Crie a senha de acesso</label>
            <input type="password" id="senha" class="w-full form-input-text mt-[10px]" wire:model.defer="form.nome_dono" minlength="5" maxlength="100" required>
            <div class="w-full mt-2 flex justify-end text-[12px] text-[#CACACA] font-inter">
                Campo Obrigatório *
            </div>
        </div>
        <div>
            <label class="pl-[25px] text-[16px] font-medium font-montserrat text-[#616887]" for="">Confirme a senha</label>
            <input type="password" id="confirmar-senha" class="w-full form-input-text mt-[10px]" wire:model.defer="form.nome_dono" minlength="5" maxlength="100" required>
            <div class="w-full mt-2 flex justify-between text-[12px] font-inter">
                <div class="text-red-600" id="erro-senha">

                </div>
                <div class="text-[#CACACA]">
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