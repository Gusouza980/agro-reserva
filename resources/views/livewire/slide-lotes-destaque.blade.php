<div class="vitrine-animais">
    <div class="row">
        <div class="col-12">
            <div class="slick">
                @foreach ($lotes_destaque as $lote)
                    <div class="px-0 py-2 mt-4 caixa-lote-home cpointer" onclick="window.location.href = '{{route('fazenda.lote', ['fazenda' => $lote->reserva->fazenda->slug, 'lote' => $lote, 'reserva' => $lote->reserva])}}'">
                        {{-- <div data-aos-duration="500" class="lazy px-0 py-2 mt-4 mt-lg-0 mx-0 mx-lg-2"> --}}
                        <div class="caixa-lote-home-imagem"
                            style="background: url(/{{ $lote->preview }}); background-size: cover; background-position: center; width: 280px; height: 200px; border-radius: 15px; position: relative; overflow: hidden; border: 1px solid #676464; box-shadow: 0px 15px 22px rgba(0,0,0,0.6);">
                            <div class="text-center justify-content-center align-items-center lote-home-hover" style="position: absolute; bottom: 0px; left: 0px; width: 100%; height: 50px; background-color: rgba(232,82,29,0.85); display:none; ">
                                <p style="margin-top: 12px;">{{ __('messages.botoes.compre_agora') }}</p>
                            </div>
                        </div>
                        <div class="row px-4 mt-3 align-items-center justify-content-start">
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
                                <div class="caixa-lote-home-text text-left">
                                    <span>@if($lote->preco > 0) {{ $lote->parcelas . "x de R$" . number_format($lote->preco / $lote->parcelas, 2, ",", ".")  }}  @else {{ $lote->reserva->desconto }}% de desconto no<br>pagamento à vista @endif</span>
                                </div>
                            </div>
                            
                        </div>
                        {{-- @if($lote->texto_destaque)
                            <div class="row pl-5 mt-3 align-items-center">
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
</div> 