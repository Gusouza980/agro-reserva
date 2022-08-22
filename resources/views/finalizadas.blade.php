@extends('template.main2')

@section('conteudo')

<div class="w-full">
    <div class="grid grid-cols-4 mx-auto w1200 hide-scroll-bar gap-x-5 gap-y-10 my-20">
        @foreach($reservas->sortByDesc("fim") as $reserva)
            <div class="w-full" style="border-radius: 15px; position: relative; height: auto;">
                <img src="{{ asset($reserva->imagem_card) }}" class="w-full" alt="">
                <div class="d-flex align-items-center justify-content-center w-full" style="position: absolute; bottom: 0px; width: 100%; height: 100px; left: 0px;">
                    <div class="text-center">
                        {{-- <div class="">
                            <h3 class="font-montserrat text-white text-[26px] font-bold">{{ date("m/Y", strtotime($reserva->inicio)) }}</h3>
                        </div> --}}
                        @if($reserva->aberto)
                            <div class="">
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