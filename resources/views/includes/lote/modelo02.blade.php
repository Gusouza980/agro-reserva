<div class="row justify-content-center justify-content-lg-start mt-4 mt-lg-0">
    <div class="px-4 px-lg-0 text-white flex-grow-1 text-lote-info text-center text-lg-left">
        <span><b>RGD:</b> {{$lote->registro}}</span><br>
        <hr class="d-md-none" style="border-top: 1px solid rgba(255,255,255,0.4);">
        <span><b>Raça:</b> {{$lote->raca->nome}}</span><br>
        <hr class="d-md-none" style="border-top: 1px solid rgba(255,255,255,0.4);">
    </div>
    <div class="px-4 px-lg-0 ml-lg-4 flex-grow-1 text-white text-lote-info text-center text-lg-left">
        @if($lote->nascimento)
            @php
                $data = \Carbon\Carbon::create(date("Y", strtotime($lote->nascimento)), date("m", strtotime($lote->nascimento)), date("d", strtotime($lote->nascimento)), 0);
            @endphp
            <span><b>Prev. Prenhez:</b> {{strtoupper($data->formatLocalized('%b/%Y'))}}</span><br>
        @else
            <span><b>Prev. Prenhez:</b> PRENHEZ A FAZER</span><br>
        @endif
        <hr class="d-md-none" style="border-top: 1px solid rgba(255,255,255,0.4);">
        <span><b>Sexo da Prenhez:</b> {{$lote->sexo}}</span><br>
        <hr class="d-md-none" style="border-top: 1px solid rgba(255,255,255,0.4);">
    </div>
</div>