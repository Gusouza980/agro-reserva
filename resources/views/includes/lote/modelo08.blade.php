{{-- MODELO DE PRENHEZ --}}
<div class="mt-4 row justify-content-center justify-content-lg-start mt-lg-0">
    <div class="px-4 text-center text-white px-lg-0 flex-grow-1 text-lote-info text-lg-left">
        @if ($lote->registro)
            <span><b>RGD:</b> {{ $lote->registro }}</span><br>
            <hr class="d-md-none" style="border-top: 1px solid rgba(255,255,255,0.4);">
        @endif
        <span><b>{{ __('messages.lote.raca') }}:</b> {{ $lote->raca->nome }}</span><br>
        <hr class="d-md-none" style="border-top: 1px solid rgba(255,255,255,0.4);">
        @if ($lote->peso)
            <span><b>PESO:</b> {{ $lote->peso }}KG</span><br>
            <hr class="d-md-none" style="border-top: 1px solid rgba(255,255,255,0.4);">
        @endif
    </div>
    <div class="px-4 text-center text-white px-lg-0 ml-lg-4 flex-grow-1 text-lote-info text-lg-left">
        @if($lote->nascimento)
            <span><b>{{ __('messages.lote.nascimento') }}:</b> {{ date('m/Y', strtotime($lote->nascimento)) }} </span><br>
            <hr class="d-md-none" style="border-top: 1px solid rgba(255,255,255,0.4);">
        @endif
        @if ($lote->sexo)
            <span><b>Sexo:</b> {{ $lote->sexo }}</span><br>
            <hr class="d-md-none" style="border-top: 1px solid rgba(255,255,255,0.4);">
        @endif
        @if ($lote->ce)
            <span><b>CE:</b> {{ $lote->ce }}</span><br>
            <hr class="d-md-none" style="border-top: 1px solid rgba(255,255,255,0.4);">
        @endif
    </div>
</div>
