@extends('template.main2')

@section('styles')
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
@endsection

@section('conteudo')

<x-institucional.carrosel :banners="$banners"></x-institucional.carrosel>

<x-institucional.highlights></x-institucional.highlights>
<hr>

@foreach($reservas->where("aberto", true)->where("encerrada", false)->sortByDesc("inicio") as $reserva)
    
    @php
        $lotes_destaque = $reserva->lotes->where("reservado", false);
    @endphp

    @if($lotes_destaque->count() > 0)
        <div class="w-full">
            <x-institucional.header-reserva-lotes :reserva="$reserva"></x-institucional.header-reserva-lotes>
            <x-institucional.slide-lotes-destaque :lotes="$lotes_destaque"></x-institucional.slide-lotes-destaque>
        </div>
        <hr>
    @endif

@endforeach

<div class="w-full mt-5 text-center">
    <h3 class="font-montserrat font-medium text-[25px] text-[#757887]">
        VITRINE DE RESERVAS
    </h3>
</div>

<x-institucional.slide-reservas-ativas :reservas="$reservas"></x-institucional.slide-reservas>

<x-institucional.comprar_vender></x-institucional.comprar_vender>

<x-institucional.navegue-racas></x-institucional.navegue-racas>

@livewire("institucional.depoimentos")

{{-- <x-institucional.destaques :banners="$banners"></x-institucional.destaques> --}}

{{-- <x-institucional.depoimentos></x-institucional.depoimentos> --}}

<x-institucional.experiencias></x-institucional.experiencias>

@endsection

@section("scripts")
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script>
        $(document).ready(function(){
            $(".caixa-lote-home").hover(function(){
                var span = $(this).children().children()[0];
                $(span).fadeIn(300);
                
            }, function(){
                var span = $(this).children().children()[0];
                $(span).fadeOut(300);
            })
        });
    </script>
@endsection