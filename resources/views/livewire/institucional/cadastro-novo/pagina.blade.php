<div class="w-full max-w-[800px] mx-auto relative">
    <div x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-0" x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-0" class="w-full font-montserrat absolute -top-[15vh] pb-10 md:pb-20">
        <div class="w-full">
            <a href="{{ route('index') }}" class="cursor-pointer transition duration-300 text-[14px] text-[#D7D8E4] hover:scale-105 hover:text-white"><i class="mr-2 fas fa-chevron-left"></i> <span>Voltar</span></a>
        </div>
        <div class="w-full px-6 md:px-20 pt-10 pb-10 md:pb-20 mt-3 bg-white rounded-[30px] shadow-[0px_6px_60px_0px_rgba(0,0,0,0.06)]">
            <form class="flex flex-wrap w-full mt-4" wire:submit.prevent='salvar' x-data="{pessoa_fisica: @entangle('form.pessoa_fisica')}">
                <div class="flex items-center justify-center w-full gap-4">
                    <button type="button" wire:click="$set('form.pessoa_fisica', 1)" class="w-[170px] md:w-[200px] rounded-[50px] px-[15px] md:px-[30px] py-[5px] border border-[#FFB02A] text-[14px] md:text-[15px] transition duration-200 @if($form['pessoa_fisica'] == 1) bg-[#FFB02A] text-[#3A4055] @else text-[#ACAEB7] hover:font-semibold hover:text-[#3A4055] @endif">Pessoa Física</button>
                    <button type="button" wire:click="$set('form.pessoa_fisica', 0)" class="w-[170px] md:w-[200px] rounded-[50px] px-[15px] md:px-[30px] py-[5px] border border-[#FFB02A] text-[14px] md:text-[15px] transition duration-200 @if($form['pessoa_fisica'] == 0) bg-[#FFB02A] text-[#3A4055] @else text-[#ACAEB7] hover:font-semibold hover:text-[#3A4055] @endif">Pessoa Jurídica</button>
                </div>
                @include('livewire.institucional.cadastro-novo.includes.informacoes-primarias')
                @if($form['pessoa_fisica'] == 1)
                    <div class="w-full" wire:key="pessoa-fisica">
                        @include('livewire.institucional.cadastro-novo.includes.pessoa-fisica')
                    </div>
                @else
                    <div class="w-full" wire:key="pessoa-juridica">
                        @include('livewire.institucional.cadastro-novo.includes.pessoa-juridica')
                    </div>
                @endif
                @include('livewire.institucional.cadastro-novo.includes.propriedade-rural')

                <div class="flex items-center w-full mt-8">
                    <input type="checkbox" class="mr-2 checkbox" wire:model.defer="form.assinante_newsletter"/>
                    <span class="mt-1 text-black font-montserrat text-[14px] font-medium">Deseja receber novidades da Agroreserva ?</span>
                </div>
                <div class="flex items-center w-full mt-3">
                    <input type="checkbox" class="mr-2 checkbox" wire:model.defer="form.termos_aceitos" required/>
                    <span class="mt-1 text-black font-montserrat text-[14px] font-medium">Li e concordo com os <a href="{{ route('termos') }}"><u>TERMOS E CONDIÇÕES DE USO</u></a> do site e <a href="{{ route('politicas') }}"><u>POLITICA DE PRIVACIDADE</u></a></span>
                </div>
                <div class="w-full mt-8 text-center" wire:loading.class="hidden" wire:target="salvar">
                    <button class="text-white rounded-[0.5rem] btn-warning text-[20px] waving-hand font-montserrat font-medium normal-case px-4 py-[16px] animation duration-500 hover:scale-105">Cadastrar</button>
                </div>
                <div class="hidden w-full mt-8 text-center" wire:loading.class.remove="hidden" wire:target="salvar">
                    <img src="{{ asset('imagens/gif_relogio.gif') }}" width="40" class="mx-auto" alt="">
                </div>
            </form>
            <div class="w-full text-center mt-[40px] text-gray-600 font-montserrat font-semibold">
                Já tem conta ? <a href="{{ route('login') }}" class="ml-1 text-blue-500 underline">Clique aqui</a>
            </div>
        </div>
    </div>
    {{-- <x-loading wire:target="form.pessoa_fisica"></x-loading> --}}
</div>

@push("scripts")
<script>
    function scrollToElement(elementname) {
        var $element = $('[name="' + elementname + '"]');

        if ($element.length) {
            // Calcula a posição do elemento em relação à janela de visualização
            var elementTop = $element.offset().top;

            // Calcula a posição para centralizar o elemento na página
            var centerY = elementTop - ($(window).height() / 2);

            // Rola a página até a posição desejada
            $('html, body').animate({
                scrollTop: centerY
            }, 'slow');
        }
    }

    $(document).ready(function(){
        $('input[mask="cep"]').mask('00000-000');
        $('input[mask="nascimento"]').mask('99/99/9999');
        $('input[mask="cpf"]').mask('000.000.000-00');
        $('input[mask="cnpj"]').mask('00.000.000/0000-00');
    })
    window.addEventListener('scrollToError', function(e) {
        var model = e.detail.model;
        scrollToElement(model);
    })

    window.addEventListener('loadMasks', function(e) {
        $('input[mask="cep"]').mask('00000-000');
        $('input[mask="cpf"]').mask('000.000.000-00');
        $('input[mask="nascimento"]').mask('99/99/9999');
        $('input[mask="cnpj"]').mask('00.000.000/0000-00');
    })
</script>

@endpush
