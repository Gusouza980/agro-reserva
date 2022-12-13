@extends('template.main2')

@section('conteudo')

<x-marketplace.vendedor.banner :banner="$vendedor->banner"></x-marketplace.vendedor.banner>
<x-marketplace.vendedor.navbar></x-marketplace.vendedor.navbar>
<div class="w-full px-5 py-5">
    <div class="relative w-full text-center">
        <div class="text-[28px] text-gray-600 font-medium font-montserrat">
            NOVIDADES
        </div>
        <div class="absolute left-0 top-2">
            <x-botoes.voltar :rota="route('index')"></x-botoes.voltar>
        </div>
    </div>
    <div class="flex justify-start w-full space-x-10">
        <x-marketplace.vendedor.menu-lateral></x-marketplace.vendedor.menu-lateral>
        <x-marketplace.vendedor.novidades :produtos="$vendedor->produtos"></x-marketplace.vendedor.novidades>
    </div>
</div>


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
