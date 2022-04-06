{{-- MODELO DE PRENHEZ --}}
<div class="row justify-content-center justify-content-lg-start mt-4 mt-lg-0">
    <div class="px-4 px-lg-0 text-white flex-grow-1 text-lote-info text-center text-lg-left">
        @if ($lote->registro)
            <span><b>RGD:</b> {{ $lote->registro}}</span><br>
            <hr class="d-md-none" style="border-top: 1px solid rgba(255,255,255,0.4);">
        @endif
        @if ($lote->sexo)
            <span><b>Sexo:</b> {{ $lote->sexo }}</span><br>
            <hr class="d-md-none" style="border-top: 1px solid rgba(255,255,255,0.4);">
        @endif
        @if ($lote->raca->nome)
            <span><b>RAÇA:</b> {{ $lote->raca->nome }}</span><br>
            <hr class="d-md-none" style="border-top: 1px solid rgba(255,255,255,0.4);">
        @endif
        @if ($lote->ccg)
            <span><b>CCG:</b> {{ $lote->ccg }}</span><br>
            <hr class="d-md-none" style="border-top: 1px solid rgba(255,255,255,0.4);">
        @endif
        
        {{-- <span><b>Raça:</b> {{ $lote->raca->nome }}</span><br>
        <hr class="d-md-none" style="border-top: 1px solid rgba(255,255,255,0.4);"> --}}
    </div>
    <div class="px-4 px-lg-0 ml-lg-4 flex-grow-1 text-white text-lote-info text-center text-lg-left mt-2 mt-md-0">
        @if ($lote->botton)
            <span><b>BOTTON:</b> {{$lote->botton}}</span><br>
            <hr class="d-md-none" style="border-top: 1px solid rgba(255,255,255,0.4);">
        @endif
        @if ($lote->nascimento)
            <span><b>Nascimento:</b> {{ date('d/m/Y', strtotime($lote->nascimento)) }}</span><br>
            <hr class="d-md-none" style="border-top: 1px solid rgba(255,255,255,0.4);">
        @endif
        @if ($lote->parto)
            <span><b>Últ. Parto:</b> {{ date('d/m/Y', strtotime($lote->parto)) }}</span><br>
            <hr class="d-md-none" style="border-top: 1px solid rgba(255,255,255,0.4);">
        @endif
        @if ($lote->lact_atual)
            <span><b>Lact. Atual:</b> {{$lote->lact_atual}} KG/Dia</span><br>
            <hr class="d-md-none" style="border-top: 1px solid rgba(255,255,255,0.4);">
        @endif
    </div>
</div>
