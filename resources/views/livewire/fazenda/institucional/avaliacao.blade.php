<div class="container-fluid mt-5 mt-md-0">
    <div class="container">
        <div class="row">
            <div class="text-white pl-0 pr-0 pr-md-5" style="max-width: 600px;">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 px-0 text-section2-fazenda text-center text-md-left">
                            <h4>Avaliação Agro Reserva</h4>
                        </div>
                    </div>
                    <div class="row py-4">
                        <div class="col-12 px-0 text-avaliacao-section2-fazenda text-center text-md-left">
                            <span class="cpointer link-avaliacao-section2-fazenda @if($avaliacao == 0) active @endif" wire:click='trocaAvaliacao(0)' style="line-height: 30px;">Resumo</span>
                            <span class="ml-3 link-avaliacao-section2-fazenda @if($avaliacao == 1) active @endif cpointer" wire:click='trocaAvaliacao(1)' style="line-height: 30px;">Produção</span>
                            <span class="ml-3 link-avaliacao-section2-fazenda @if($avaliacao == 2) active @endif cpointer" wire:click='trocaAvaliacao(2)' style="line-height: 30px;">Provas e Avaliações</span>
                            <span class="ml-3 link-avaliacao-section2-fazenda @if($avaliacao == 3) active @endif cpointer" wire:click='trocaAvaliacao(3)' style="line-height: 30px;">Diferencial</span>
                        </div>
                    </div>
                    <div class="container-fluid px-0 conteudo-avaliacao" @if($avaliacao != 0) style="display:none;" @endif>
                        @include('includes.fazenda.avaliacao.resumo')
                    </div>
                    <div class="container-fluid px-0 conteudo-avaliacao" @if($avaliacao != 1)  style="display: none;" @endif>
                        @include('includes.fazenda.avaliacao.producao')
                    </div>
                    <div class="container-fluid px-0 conteudo-avaliacao" @if($avaliacao != 2)  style="display: none;" @endif>
                        @include('includes.fazenda.avaliacao.provas')
                    </div>
                    <div class="container-fluid px-0 conteudo-avaliacao" @if($avaliacao != 3)  style="display: none;" @endif>
                        @include('includes.fazenda.avaliacao.premios')
                    </div>
                    <div class="row justify-content-center py-4">
                        <div class="px-0 text-section2-fazenda">
                            <a name="" id="" class="btn btn-vermelho py-2 px-4 mt-3" href="{{route('fazenda.lotes', ['fazenda' => $fazenda->slug, 'reserva' => $reserva])}}" role="button">Ver animais à venda</a>
                            <br class="d-lg-none">
                            <a  href="https://api.whatsapp.com/send?phone={{$reserva->telefone_consultor}}" target="_blank" class="btn btn-vermelho ml-lg-4 px-4 py-2 mt-3">Falar com Consultor</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
