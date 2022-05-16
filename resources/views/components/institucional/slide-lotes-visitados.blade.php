<div class="bg-white" x-data="{ show: false }" x-intersect.enter="show = true" style="overflow-x: hidden; min-height: 550px;">
    <div class="mt-5" x-show="show" x-transition.opacity.duration.3000ms>
        <div class="row mb-5">
            <div class="col-12 text-center" style="font-family: Montserrat; font-size: 25px; font-weight: medium;">
                LOTES MAIS VISITADOS
            </div>
        </div>
        @if($lotes->count() > 0)
            <div class="row">
                <div class="col-12">
                    <div @if($lotes->count() >= 4 || $mobile) class="slick-lotes" id="slide-lotes-visitados" @else class="d-flex justify-content-center"  @endif>
                        @foreach ($lotes as $lote)
                            <div class="@if($lotes->count() >= 4 || $mobile) px-0 @else px-3 @endif py-2 mt-4 caixa-lote-home cpointer" onclick="window.location.href = '{{route('fazenda.lote', ['fazenda' => $lote->reserva->fazenda->slug, 'lote' => $lote, 'reserva' => $lote->reserva])}}'">
                                {{-- <div data-aos-duration="500" class="px-0 py-2 mx-0 mt-4 lazy mt-lg-0 mx-lg-2"> --}}
                                <div class="caixa-lote-home-imagem"
                                    style="background: url(/{{ $lote->preview }}); background-size: cover; background-position: center; width: 350px; height: 250px; border-radius: 15px; position: relative; overflow: hidden;">
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
                                                <div class="ml-3 lotes-visitados-home-rgd">
                                                    RGD: {{$lote->registro}}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="text-left caixa-lotes-visitados-home-text">
                                            <span>@if($lote->preco > 0) {{ $lote->parcelas . "x de R$" . number_format($lote->preco / $lote->parcelas, 2, ",", ".")  }}  @else {{ $lote->reserva->desconto }}% de desconto no<br>pagamento à vista @endif</span>
                                        </div>
                                    </div>
                                    
                                </div>
                                {{-- @if($lote->texto_destaque)
                                    <div class="pl-5 mt-3 row align-items-center">
                                        <div class="lote-home-texto-destaque">
                                            <span>{{$lote->texto_destaque}}</span>
                                        </div>
                                    </div>
                                @endif --}}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    </div> 
</div>

@push("scripts")
    @php
        $num_lotes = $lotes->where("ativo", true)->where("reservado", false)->count();
        if($num_lotes < 4){
            $center = false;
        }else{
            $center = true;
        }
    @endphp
    <script>
        $(document).ready(function(){
            $("#slide-lotes-visitados").slick({

                // normal options...
                slidesToShow: {!! ($num_lotes < 4) ? $num_lotes : 4  !!},
                infinite: true,
                // dots: true,
                adaptiveHeight: true,
                arrows: true,
                autoplay: true,
                autoplaySpeed: 4000,
                centerMode: true,
                variableWidth: true,
                // the magic
                responsive: [{

                    breakpoint: 1400,
                    settings: {
                        slidesToShow: 4,
                        infinite: true,
                        // dots: true,
                        adaptiveHeight: true,
                        arrows: true,
                        centerMode: true,
                        autoplay: true,
                        autoplaySpeed: 4000,
                    }

                }, {

                    breakpoint: 1030,
                    settings: {
                        slidesToShow: 2,
                        infinite: true,
                        // dots: true,
                        adaptiveHeight: true,
                        arrows: true,
                        autoplay: true,
                        autoplaySpeed: 4000,
                    }

                }, {

                    breakpoint: 760,
                    settings: {
                        slidesToShow: 1,
                        infinite: true,
                        dots: false,
                        adaptiveHeight: true,
                        arrows: false,
                        autoplay: true,
                        autoplaySpeed: 4000,
                    }

                }]
            });
        });
    </script>
    
@endpush