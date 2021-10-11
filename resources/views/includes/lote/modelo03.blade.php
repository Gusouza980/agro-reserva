{{-- MODELO DE PRENHEZ --}}
<div class="row justify-content-center justify-content-lg-start mt-4 mt-lg-0">
    <div class="px-4 px-lg-0 text-white flex-grow-1 text-lote-info text-center text-lg-left">
        @if ($lote->rgn)
            <span><b>RGN:</b> {{ $lote->registro . " " . $lote->rgn }}</span><br>
            <hr class="d-md-none" style="border-top: 1px solid rgba(255,255,255,0.4);">
        @endif
        @if ($lote->iabczg)
            <span><b>IABCZ:</b> {{ $lote->iabczg }}</span><br>
            <hr class="d-md-none" style="border-top: 1px solid rgba(255,255,255,0.4);">
        @endif
        @if ($lote->peso)
            <span><b>PESO:</b> {{ $lote->peso }}Kg</span><br>
            <hr class="d-md-none" style="border-top: 1px solid rgba(255,255,255,0.4);">
        @endif
        
        {{-- <span><b>Raça:</b> {{ $lote->raca->nome }}</span><br>
        <hr class="d-md-none" style="border-top: 1px solid rgba(255,255,255,0.4);"> --}}
    </div>
    <div class="px-4 px-lg-0 ml-lg-4 flex-grow-1 text-white text-lote-info text-center text-lg-left">
        <br class="d-none d-md-block">
        @if ($lote->deca)
            <span><b>DECA:</b> {{$lote->deca}}</span><br>
            <hr class="d-md-none" style="border-top: 1px solid rgba(255,255,255,0.4);">
        @endif
        @if ($lote->ce)
            <span><b>C.E:</b> {{ $lote->ce }}</span><br>
            <hr class="d-md-none" style="border-top: 1px solid rgba(255,255,255,0.4);">
        @endif
    </div>
</div>
