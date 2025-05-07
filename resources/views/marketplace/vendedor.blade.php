@extends('template.main2')

@section('conteudo')

<x-marketplace.vendedor.banner :banner="$vendedor->banner"></x-marketplace.vendedor.banner>
@livewire('marketplace.vendedor.pagina', ["vendedor" => $vendedor])


@endsection

@section("styles")
<style>
    .hide-scroll-bar {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }

    .hide-scroll-bar::-webkit-scrollbar {
        display: none;
    }
</style>
@endsection
