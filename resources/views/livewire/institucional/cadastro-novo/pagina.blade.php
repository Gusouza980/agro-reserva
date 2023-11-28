<div class="w-full max-w-[800px] mx-auto relative">
    <div x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-0" x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-0" class="w-full font-montserrat absolute -top-[15vh] pb-10">
        <div class="w-full">
            <span wire:click="voltar" class="cursor-pointer transition duration-300 text-[14px] text-[#D7D8E4] hover:scale-105 hover:text-white"><i class="mr-2 fas fa-chevron-left"></i> <span>Voltar</span></span>
        </div>
        <div class="w-full px-6 md:px-20 py-10 mt-3 bg-white rounded-[30px] shadow-[0px_6px_60px_0px_rgba(0,0,0,0.06)]">
            <form class="flex flex-wrap w-full mt-4" wire:submit.prevent='salvar' x-data="{tipo_pessoa: @entangle('form.tipo_pessoa')}">
                <div class="w-full flex items-center justify-center gap-4">
                    <button type="button" wire:click="$set('form.tipo_pessoa', 0)" class="w-[170px] md:w-[200px] rounded-[50px] px-[15px] md:px-[30px] py-[5px] border border-[#FFB02A] text-[14px] md:text-[15px] transition duration-200 @if($form['tipo_pessoa'] == 0) bg-[#FFB02A] text-[#3A4055] @else text-[#ACAEB7] hover:font-semibold hover:text-[#3A4055] @endif">Pessoa Física</button>
                    <button type="button" wire:click="$set('form.tipo_pessoa', 1)" class="w-[170px] md:w-[200px] rounded-[50px] px-[15px] md:px-[30px] py-[5px] border border-[#FFB02A] text-[14px] md:text-[15px] transition duration-200 @if($form['tipo_pessoa'] == 1) bg-[#FFB02A] text-[#3A4055] @else text-[#ACAEB7] hover:font-semibold hover:text-[#3A4055] @endif">Pessoa Jurídica</button>
                </div>
                @include('livewire.institucional.cadastro-novo.includes.informacoes-primarias')
                @if($form['tipo_pessoa'] == 0)
                    @include('livewire.institucional.cadastro-novo.includes.pessoa-fisica')
                @else
                    @include('livewire.institucional.cadastro-novo.includes.pessoa-juridica')
                @endif
                @include('livewire.institucional.cadastro-novo.includes.propriedade-rural')

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
    <x-loading></x-loading>
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