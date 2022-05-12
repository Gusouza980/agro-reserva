<div class="flex items-center justify-center w-full h-full py-24 sm:py-8 px-4 bg-preto">
    <div class="w-full relative flex items-center justify-center">
        <button aria-label="slide backward"
            class="d-none d-lg-block absolute z-30 left-0 ml-10 bg-gray-600 px-3 py-2 rounded-full focus:outline-none focus:bg-gray-400 focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 cursor-pointer"
            id="prev">
            <svg class="dark:text-white" width="8" height="14" viewBox="0 0 8 14" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M7 1L1 7L7 13" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
        </button>
        <div class="xs:w-full lg:w-4/5 h-full mx-auto overflow-x-hidden overflow-y-hidden">
            <div id="slider"
                class="h-full flex lg:gap-8 md:gap-6 gap-14 items-center justify-center transition ease-out duration-700">
                @php
                    $lotes = $reserva->lotes->where("ativo", true)->where("reservado", false)->shuffle();
                @endphp
                @foreach($lotes as $lote)
                    <div class="flex flex-shrink-0 relative w-full sm:w-auto">
                        <div class="px-0 py-2 mt-4 caixa-lote-home cpointer" onclick="window.location.href = '{{route('fazenda.lote', ['fazenda' => $lote->reserva->fazenda->slug, 'lote' => $lote, 'reserva' => $lote->reserva])}}'">
                            <div class="caixa-lote-home-imagem"
                                style="background: url(/{{ $lote->preview }}); background-size: cover; background-position: center; width: 280px; height: 200px; border-radius: 15px; position: relative; overflow: hidden; border: 1px solid #676464; box-shadow: 0px 15px 22px rgba(0,0,0,0.6);">
                                <div class="text-center justify-content-center align-items-center lote-home-hover" style="position: absolute; bottom: 0px; left: 0px; width: 100%; height: 50px; background-color: rgba(232,82,29,0.85); display:none; ">
                                    <p style="margin-top: 12px;">{{ __('messages.botoes.compre_agora') }}</p>
                                </div>
                            </div>
                            <div class="px-4 mt-3 row align-items-center justify-content-start">
                                <div class="caixa-lote-home-logo d-flex align-items-center justify-content-center">
                                    <img src="{{ asset($lote->fazenda->logo) }}" alt="">
                                </div>
                                <div class="ml-4">
                                    <div class="d-flex justify-content-start align-items-center">
                                        <div>
                                            <button class="badge-lote-home px-2">LOTE {{str_pad($lote->numero, 2, "0", STR_PAD_LEFT)}}@if($lote->letra){{$lote->letra}}@endif</button>
                                        </div>
                                        @if($lote->registro)
                                            <div class="ml-3 lote-home-rgd">
                                                RGD: {{$lote->registro}}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="text-left caixa-lote-home-text">
                                        <span>@if($lote->preco > 0) {{ $lote->parcelas . "x de R$" . number_format($lote->preco / $lote->parcelas, 2, ",", ".")  }}  @else {{ $lote->reserva->desconto }}% de desconto no<br>pagamento à vista @endif</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <button aria-label="slide forward"
            class="d-none d-lg-block absolute px-3 py-2 rounded-full z-30 right-0 mr-10 focus:outline-none bg-gray-600 hover:bg-gray-400 focus:ring-2 focus:ring-offset-2 focus:ring-gray-400"
            id="next">
            <svg class="dark:text-white" width="8" height="14" viewBox="0 0 8 14" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M1 1L7 7L1 13" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
        </button>
    </div>
</div>


@push("scripts")

<script>
    let defaultTransform = 0;
    function goNext() {
        defaultTransform = defaultTransform - 398;
        var slider = document.getElementById("slider");
        if (Math.abs(defaultTransform) >= slider.scrollWidth / 1.7) defaultTransform = 0;
        slider.style.transform = "translateX(" + defaultTransform + "px)";
    }
    next.addEventListener("click", goNext);
    function goPrev() {
        var slider = document.getElementById("slider");
        if (Math.abs(defaultTransform) === 0) defaultTransform = 0;
        else defaultTransform = defaultTransform + 398;
        slider.style.transform = "translateX(" + defaultTransform + "px)";
    }
    prev.addEventListener("click", goPrev);

</script>

@endpush