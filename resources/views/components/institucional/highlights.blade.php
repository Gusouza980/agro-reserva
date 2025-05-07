<div class="py-10" x-init="$nextTick(() => alpineLoadingFinished = true)">
    <div class="flex flex-wrap px-3 mx-auto w1200 px-lg-0 justify-between items-center">
        <div class="flex mb-4 items-center" x-show="alpineLoadingFinished" x-cloak x-transition x-transition.delay.50ms>
            <div class="mr-3">
                <img src="{{ asset('imagens/icone_comissao.svg') }}" width="60" alt="">
            </div>
            <div>
                <h5 style="font-family: Gobold; font-size: 16px; color: #FEAF2A;">0% DE COMISSÃO</h5>
                <span style="font-family: Montserrat; font-size: 13px; font-weight: 500;">Na Agro Reserva o<br >comprador não paga<br >comissão</span>
            </div>
        </div>
        <div class="flex mb-4 items-center"  x-show="alpineLoadingFinished" x-cloak x-transition x-transition.delay.100ms>
            <div class="mr-3">
                <img src="{{ asset('imagens/icone_animais.svg') }}" style="width: 60px;" width="60" alt="">
            </div>
            <div>
                <h5 style="font-family: Gobold; font-size: 16px; color: #FEAF2A;">ANIMAIS Á PREÇOS FIXOS</h5>
                <span style="font-family: Montserrat; font-size: 13px; font-weight: 500;">É isto mesmo, comprando na<br >Agro Reserva você paga o<br >valor do animal e nada mais.</span>
            </div>
        </div>
        <div class="flex mb-4 items-center"  x-show="alpineLoadingFinished" x-cloak x-transition x-transition.delay.150ms>
            <div class="mr-3">
                <img src="{{ asset('imagens/icone_parcelamento.svg') }}" width="60" alt="">
            </div>
            <div>
                <h5 style="font-family: Gobold; font-size: 16px; color: #FEAF2A;">PARCELAMENTO NO BOLETO</h5>
                <span style="font-family: Montserrat; font-size: 13px; font-weight: 500;">Facilidade para comprar<br >parcelado no boleto em 12x,<br >15x e até 30x sem juros</span>
            </div>
        </div>
        <div class="flex mb-4 items-center"  x-show="alpineLoadingFinished" x-cloak x-transition x-transition.delay.200ms>
            <div class="mr-3">
                <img src="{{ asset('imagens/icone_frete.svg') }}" width="60" alt="">
            </div>
            <div>
                <h5 style="font-family: Gobold; font-size: 16px; color: #FEAF2A;">FRETE FACILITADO</h5>
                <span style="font-family: Montserrat; font-size: 13px; font-weight: 500;">Auxiliamos você a encontrar<br >as melhores opções de frete<br >com o melhor custo/benefício</span>
            </div>
        </div>
    </div>
</div>