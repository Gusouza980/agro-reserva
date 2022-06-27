@extends('template.main2')

@section('styles')
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
@endsection

@section('conteudo')

<x-institucional.carrosel :banners="$banners"></x-institucional.carrosel>

<x-institucional.highlights></x-institucional.highlights>

@livewire('slide-lotes-destaque')

@livewire('institucional.slide-reservas-ativas')

<x-institucional.comprar_vender></x-institucional.comprar_vender>

<x-institucional.navegue-racas></x-institucional.navegue-racas>

<x-institucional.slide_lotes_visitados></x-institucional.slide_lotes_visitados>

<x-institucional.experiencias></x-institucional.experiencias>

<x-institucional.depoimentos></x-institucional.depoimentos>

<x-institucional.newsletter></x-institucional.newsletter>

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