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
                            <span class="cpointer link-avaliacao-section2-fazenda active" num="0">Resumo</span>
                            <span class="ml-3 link-avaliacao-section2-fazenda cpointer" num="1">Produção</span>
                            <span class="ml-3 link-avaliacao-section2-fazenda cpointer" num="2">Provas e Avaliações</span>
                            <span class="ml-3 link-avaliacao-section2-fazenda cpointer" num="3">Diferencial</span>
                        </div>
                    </div>
                    <div class="container-fluid px-0 conteudo-avaliacao" num="0">
                        @include('includes.fazenda.avaliacao.resumo')
                    </div>
                    <div class="container-fluid px-0 conteudo-avaliacao" num="1" style="display: none;">
                        @include('includes.fazenda.avaliacao.producao')
                    </div>
                    <div class="container-fluid px-0 conteudo-avaliacao" num="2" style="display: none;">
                        @include('includes.fazenda.avaliacao.provas')
                    </div>
                    <div class="container-fluid px-0 conteudo-avaliacao" num="3" style="display: none;">
                        @include('includes.fazenda.avaliacao.premios')
                    </div>
                    <div class="row justify-content-center py-4">
                        <div class="px-0 text-section2-fazenda">
                            <a name="" id="" class="btn btn-vermelho py-2 px-4 mt-3" href="{{route('fazenda.lotes', ['fazenda' => $fazenda->slug])}}" role="button">Ver animais à venda</a>
                            <br class="d-lg-none">
                            <a  href="https://api.whatsapp.com/send?phone={{$reserva->telefone_consultor}}" target="_blank" class="btn btn-vermelho ml-lg-4 px-4 py-2 mt-3">Falar com Consultor</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
