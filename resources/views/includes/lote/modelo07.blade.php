{{-- MODELO DE PRENHEZ --}}
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
        <span><b>{{ __('messages.lote.raca') }}:</b> {{ $lote->raca->nome }}</span><br>
        <hr class="d-md-none" style="border-top: 1px solid rgba(255,255,255,0.4);">
		@if ($lote->lact_atual)
            <span><b>LACT. ATUAL:</b> {{ $lote->lact_atual }}Kg</span><br>
            <hr class="d-md-none" style="border-top: 1px solid rgba(255,255,255,0.4);">
        @endif
    </div>
    <div class="px-4 px-lg-0 ml-lg-4 flex-grow-1 text-white text-lote-info text-center text-lg-left">
        @if ($lote->previsao_parto)
            <span><b>PREV. PARTO:</b> {{ date('m/Y', strtotime($lote->previsao_parto)) }}</span><br>
            <hr class="d-md-none" style="border-top: 1px solid rgba(255,255,255,0.4);">
        @endif
		@if ($lote->parto)
            <span><b>ULT. PARTO:</b> {{ date('d/m/Y', strtotime($lote->parto)) }}</span><br>
            <hr class="d-md-none" style="border-top: 1px solid rgba(255,255,255,0.4);">
        @endif
        @if($lote->nascimento)
            <span><b>{{ __('messages.lote.nascimento') }}:</b> {{ date('d/m/Y', strtotime($lote->nascimento)) }} </span><br>
            <hr class="d-md-none" style="border-top: 1px solid rgba(255,255,255,0.4);">
        @endif
        @if ($lote->sexo)
            <span><b>SEXO:</b> {{ $lote->sexo }}</span><br>
            <hr class="d-md-none" style="border-top: 1px solid rgba(255,255,255,0.4);">
        @endif
        @if ($lote->botton)
            <span><b>BOTTON:</b> {{ $lote->botton }}</span><br>
            <hr class="d-md-none" style="border-top: 1px solid rgba(255,255,255,0.4);">
        @endif
    </div>
</div>
