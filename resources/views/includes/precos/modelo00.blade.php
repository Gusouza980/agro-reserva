{{--  15 DUPLAS  --}}
<div class="row">
    <div class="col-12 text-center text-lg-right @if (!$lote->reserva->preco_disponivel && !$lote->liberar_preco) blur @endif">
        @if ($lote->reserva->preco_disponivel || $lote->liberar_preco)
            <h4>ou R${{ number_format($lote->preco - ($lote->preco * $lote->reserva->desconto) / 100, 2, ',', '.') }}
                à
                vista</h4>
        @else
            <h4>R$00000,00</h4>
        @endif
        {{-- <span>R$00000,00</span> --}}
    </div>
</div>
<div class="row">
    <div class="col-12 text-center text-lg-right @if (!$lote->reserva->preco_disponivel && !$lote->liberar_preco) blur @endif">
        @if ($lote->reserva->preco_disponivel || $lote->liberar_preco)
            @if ($lote->reserva->parcelas_mes == 1)
                <span><b>{{ $lote->parcelas }}x</b> de
                    <b>R${{ number_format($lote->preco / $lote->parcelas, 2, ',', '.') }}</b>
                </span>
            @else
                <div>
                    <span><b>30</b>x (15 duplas) de
                        <b>R${{ number_format($lote->preco / ($lote->parcelas), 2, ',', '.') }}</b>
                    </span>
                </div>
            @endif
        @else
            <span><b>0x</b> de <b>R$0000,00</b></span>
        @endif
    </div>
</div>
