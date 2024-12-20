{{--  6 TRIPLAS E 6 DUPLAS  --}}
<div class="row">
    <div class="col-12 text-center text-lg-right @if (!$lote->reserva->preco_disponivel && !$lote->liberar_preco) blur @endif">
        @if ($lote->reserva->preco_disponivel || $lote->liberar_preco)
            <div>
                <h4><b>30</b>x (6 triplas e 6 duplas) de
                    <b>R${{ number_format($lote->preco / 30, 2, ',', '.') }}</b>
                </h4>
            </div>
        @else
            <h4><b>0x</b> de <b>R$0000,00</b></h4>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-12 text-center text-lg-right @if (!$lote->reserva->preco_disponivel && !$lote->liberar_preco) blur @endif">
        @if ($lote->reserva->preco_disponivel || $lote->liberar_preco)
            <span>ou R${{ number_format($lote->preco - ($lote->preco * 6) / 100, 2, ',', '.') }}
                à
                vista</span>
        @else
            <span>R$00000,00</span>
        @endif
        {{-- <span>R$00000,00</span> --}}
    </div>
</div>