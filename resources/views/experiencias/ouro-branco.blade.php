@extends('template.main2')


@section('conteudo')

<div class="w-full">
    <img src="{{ asset('imagens/banner-pagina-ourobranco.png') }}" class="w-full" alt="">
</div>
@livewire('experiencias.ouro-branco')

@endsection