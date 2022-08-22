@extends('template.main2')

@section('conteudo')

<div class="w-full">
    <div class="grid grid-cols-4 mx-auto w1200 hide-scroll-bar gap-x-5 gap-y-10 my-20">
        @foreach($reservas as $reserva)
            <div class="w-full" style="border-radius: 15px; position: relative; height: auto;">
                <img src="{{ asset($reserva->fazenda->fundo_destaque) }}" class="w-full @if($reserva->encerrada) brightness-[0.30]" @endif alt="">
                <div class="d-flex align-items-center justify-content-center w-full" style="position: absolute; bottom: 0px; left: 0px;">
                    <div class="text-center">
                        @if(!$reserva->encerrada)
                            <div>
                                <b class="font-montserrat text-[16px] text-white">@if(!$reserva->compra_disponivel) Inicia em @else Termina em @endif</b>
                            </div>
                            <div class="mt-2">
                                <h3 class="font-montserrat text-white text-[26px] font-bold">@if(!$reserva->compra_disponivel) {{ date("d/m/Y", strtotime($reserva->inicio)) }} @else {{ date("d/m/Y", strtotime($reserva->fim)) }} @endif</h3>
                            </div>
                        @else
                            <div class="mt-2 mb-3">
                                <b class="font-montserrat text-[16px] text-white">Encerrada</b>
                            </div>
                        @endif
                        @if($reserva->aberto)
                            <div class="mt-3">
                                <a href="{{ route('fazenda.lotes', ['fazenda' => $reserva->fazenda->slug, 'reserva' => $reserva->id]) }}" name="" id="" class="px-[30px] py-[10px] @if($reserva->encerrada) border-2 border-[#E8521B] @else bg-[#E8521B] @endif text-[#FFFFFF] rounded-[6px] transition duration-300 font-montserrat text-[17px] font-bold hover:text-white hover:bg-[#b83f13]" href="#" role="button">Ver Reserva</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection