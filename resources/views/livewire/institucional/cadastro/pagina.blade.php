<div class="w-full">
    <div class="w-full min-h-[35vh] bg-[#32343E] flex items-center justify-center">
        <img class="max-w-[200px] -mt-[10vh]" src="{{ asset('imagens/logo_agroreserva_leite.svg') }}" alt="">
    </div>
    <div class="w-full bg-[#F5F5F5] px-4 px-md-0 md:px-0">
        @livewire("institucional.cadastro.lista-etapas", ["show" => $showListaEtapas])
        @livewire("institucional.cadastro.form-pre-cadastro", ["show" => $showFormPreCadastro])
        @livewire("institucional.cadastro.confirmacao-pre-cadastro", ["show" => $showConfirmacaoPreCadastro])
        @livewire("institucional.cadastro.selecao-categoria", ["show" => $showSelecaoCategoria])
        @livewire("institucional.cadastro.form-dados-pessoais", ["show" => $showFormDadosPessoais])
        @livewire("institucional.cadastro.termos-agrisk", ["show" => $showTermosAgrisk])
        @livewire("institucional.cadastro.form-dados-propriedade", ["show" => $showFormDadosPropriedade])
        @livewire("institucional.cadastro.form-informacoes-complementares", ["show" => $showFormInformacoesComplementares])
        @livewire("institucional.cadastro.aviso-ultima-etapa", ["show" => $showAvisoUltimaEtapa])
        @livewire("institucional.cadastro.form-selfie", ["show" => $showFormSelfie])
        @livewire("institucional.cadastro.confirmacao-cadastro-completo", ["show" => $showConfirmacaoCadastroCompleto])
    </div>
</div>