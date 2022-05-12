<div class="container-fluid px-0 bg-preto" x-data="{ show: false }" x-intersect.enter="show = true" style="overflow-x: hidden; min-height: 550px;">
    <div class="mx-auto vitrine-animais" x-show="show" x-transition.opacity.duration.3000ms>
        @if($configuracao->mostrar_lotes_destaque)
            <div class="row">
                <div class="mt-4 mb-2 text-center text-white col-12">
                    <h4><b>{{ mb_strtoupper(__('messages.home.animais_em_destaque')) }}</b></h4>
                </div>
            </div>
            @if(!$reserva_selecionada)
                @foreach(\App\Models\Reserva::where([["ativo", true], ["aberto", true], ["encerrada", false]])->get() as $reserva_aberta)
                    @php
                        $lotes_destaque = $reserva_aberta->lotes->where("ativo", true)->where("reservado", false)->shuffle();
                    @endphp
                    @if($lotes_destaque->count() > 0)
                        <div class="text-center col-12" style="margin-top: 30px;">
                            <img src="{{ asset($reserva_aberta->fazenda->logo) }}" class="mx-auto" width="150" alt="">
                        </div>
                        
                        <div class="mt-4 row">
                            <div class="col-12">
                                <div @if($lotes_destaque->count() >= 4 || $mobile) class="slick-lotes" id="slick{{ $reserva_aberta->id }}" @else class="d-flex justify-content-center"  @endif>
                                    @foreach ($lotes_destaque as $lote)
                                        <div class="@if($lotes_destaque->count() >= 4 || $mobile) px-0 @else px-3 @endif py-2 mt-4 caixa-lote-home cpointer" onclick="window.location.href = '{{route('fazenda.lote', ['fazenda' => $lote->reserva->fazenda->slug, 'lote' => $lote, 'reserva' => $lote->reserva])}}'">
                                            {{-- <div data-aos-duration="500" class="px-0 py-2 mx-0 mt-4 lazy mt-lg-0 mx-lg-2"> --}}
                                            <div class="caixa-lote-home-imagem"
                                                style="background: url(/{{ $lote->preview }}); background-size: cover; background-position: center; width: 350px; height: 250px; border-radius: 15px; position: relative; overflow: hidden; border: 1px solid #676464; box-shadow: 0px 15px 22px rgba(0,0,0,0.6);">
                                                <div class="text-center justify-content-center align-items-center lote-home-hover">
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
                        <div class="mt-4 borda-cinza-vitrines"></div>
                    @endif
                @endforeach
            @else
                @php
                    $lotes_destaque = $reserva_selecionada->lotes->where("ativo", true)->where("reservado", false)->shuffle();
                @endphp
                @if($lotes_destaque->count() > 0)
                    <div class="text-center col-12" style="margin-top: 30px;">
                        <img src="{{ asset($reserva_selecionada->fazenda->logo) }}" class="mx-auto" width="150" alt="">
                    </div>
                    
                    <div class="row">
                        <div class="col-12">
                            <div @if($lotes_destaque->count() >= 4 || $mobile) class="slick-lotes" id="slick{{ $reserva_selecionada->id }}" @else class="d-flex justify-content-center"  @endif>
                                @foreach ($lotes_destaque as $lote)
                                    <div class="@if($lotes_destaque->count() >= 4 || $mobile) px-0 @else px-3 @endif py-2 mt-4 caixa-lote-home cpointer" onclick="window.location.href = '{{route('fazenda.lote', ['fazenda' => $lote->reserva->fazenda->slug, 'lote' => $lote, 'reserva' => $lote->reserva])}}'">
                                        {{-- <div data-aos-duration="500" class="px-0 py-2 mx-0 mt-4 lazy mt-lg-0 mx-lg-2"> --}}
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
                                                        <button class="badge-lote-home">LOTE {{str_pad($lote->numero, 2, "0", STR_PAD_LEFT)}}@if($lote->letra){{$lote->letra}}@endif</button>
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
                    <div class="mt-3 borda-cinza-vitrines"></div>
                @endif
            @endif
        @endif
    </div> 
</div>

@push("scripts")
    @if($reserva_selecionada)
        @php
            $num_lotes = $reserva_selecionada->lotes->where("ativo", true)->where("reservado", false)->count();
            if($num_lotes < 4){
                $center = false;
            }else{
                $center = true;
            }
        @endphp
        <script>
            $(document).ready(function(){
                $("#slick{!! $reserva_selecionada->id !!}").slick({

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
    @else
        @foreach(\App\Models\Reserva::where([["ativo", true], ["aberto", true]])->get() as $reserva_aberta)
            @php
                $num_lotes = $reserva_aberta->lotes->where("ativo", true)->where("reservado", false)->count();
                if($num_lotes < 4){
                    $center = false;
                }else{
                    $center = true;
                }
            @endphp
            <script>
                $(document).ready(function(){
                    $("#slick{!! $reserva_aberta->id !!}").slick({

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
                                dots: false,
                                arrows: false,
                                infinite: true,
                                adaptiveHeight: true,
                                autoplay: true,
                                autoplaySpeed: 4000,
                            }

                        }]
                    });
                });
            </script>
        @endforeach
    @endif
    
@endpush