<div class="row justify-content-center justify-content-lg-start mt-4 mt-lg-0">
    <div class="px-4 px-lg-0 text-white flex-grow-1 text-lote-info text-center text-lg-left">
        @if($lote->ccg)
            <span><b>{{$lote->ccg}}</b></span><br>
            <hr class="d-md-none" style="border-top: 1px solid rgba(255,255,255,0.4);">
        @endif
        @if ($lote->registro)
            <span><b>RGD:</b> {{ $lote->registro }}</span><br>
            <hr class="d-md-none" style="border-top: 1px solid rgba(255,255,255,0.4);">
        @endif
        <span><b>Raça:</b> {{ $lote->raca->nome }}</span><br>
        <hr class="d-md-none" style="border-top: 1px solid rgba(255,255,255,0.4);">
    </div>
    <div class="px-4 px-lg-0 ml-lg-4 flex-grow-1 text-white text-lote-info text-center text-lg-left">
        @if ($lote->previsao_parto)
            <span><b>Prev. Parto:</b> {{ date('m/Y', strtotime($lote->previsao_parto)) }}</span><br>
            <hr class="d-md-none" style="border-top: 1px solid rgba(255,255,255,0.4);">
        @endif
        @if($lote->nascimento)
            <span><b>Nascimento:</b> {{ date('m/Y', strtotime($lote->nascimento)) }} </span><br>
            <hr class="d-md-none" style="border-top: 1px solid rgba(255,255,255,0.4);">
        @endif
        @if ($lote->sexo)
            <span><b>Sexo:</b> {{ $lote->sexo }}</span><br>
            <hr class="d-md-none" style="border-top: 1px solid rgba(255,255,255,0.4);">
        @endif
    </div>
</div>