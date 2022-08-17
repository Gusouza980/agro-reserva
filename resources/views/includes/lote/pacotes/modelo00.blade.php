{{-- MODELO DE PRENHEZ --}}
<div class="row justify-content-center justify-content-lg-start mt-4 mt-lg-0">
    <div class="px-4 px-lg-0 text-white flex-grow-1 text-lote-info text-center text-lg-left">
        @if($membro->ccg)
            <span><b>{{$membro->ccg}}</b></span><br>
            <hr class="d-md-none" style="border-top: 1px solid rgba(255,255,255,0.4);">
        @endif
        @if ($membro->registro)
            <span><b>RGD:</b> {{ $membro->registro }}</span><br>
            <hr class="d-md-none" style="border-top: 1px solid rgba(255,255,255,0.4);">
        @endif
        <span><b>{{ __('messages.lote.raca') }}:</b> {{ $membro->raca->nome }}</span><br>
        <hr class="d-md-none" style="border-top: 1px solid rgba(255,255,255,0.4);">
		@if ($membro->lact_atual)
            <span><b>LACT. ATUAL:</b> {{ $membro->lact_atual }}Kg</span><br>
            <hr class="d-md-none" style="border-top: 1px solid rgba(255,255,255,0.4);">
        @endif
    </div>
    <div class="px-4 px-lg-0 ml-lg-4 flex-grow-1 text-white text-lote-info text-center text-lg-left">
        @if ($membro->previsao_parto)
            <span><b>PREV. PARTO:</b> {{ date('m/Y', strtotime($membro->previsao_parto)) }}</span><br>
            <hr class="d-md-none" style="border-top: 1px solid rgba(255,255,255,0.4);">
        @endif
        @if($membro->nascimento)
            <span><b>{{ __('messages.lote.nascimento') }}:</b> {{ date('m/Y', strtotime($membro->nascimento)) }} </span><br>
            <hr class="d-md-none" style="border-top: 1px solid rgba(255,255,255,0.4);">
        @endif
        @if ($membro->sexo)
            <span><b>SEXO:</b> {{ $membro->sexo }}</span><br>
            <hr class="d-md-none" style="border-top: 1px solid rgba(255,255,255,0.4);">
        @endif
        @if ($membro->botton)
            <span><b>BOTTON:</b> {{ $membro->botton }}</span><br>
            <hr class="d-md-none" style="border-top: 1px solid rgba(255,255,255,0.4);">
        @endif
    </div>
</div>
