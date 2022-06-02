@extends('template.main2')


@section('conteudo')

<div class="w-full">
    <img src="{{ asset('imagens/banner-pagina-ourobranco.png') }}" class="w-full" alt="">
</div>
<div class="flex py-4 justify-content-center">
    <div class="w-full lg:w-1/2">
        <iframe class="w-full overflow-hidden rounded-md aspect-video" src="https://www.youtube.com/embed/s4nvrH6Xz60?list=PLnqvSti-aWALfE84ooJzeFQlW_o45kuPB" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
</div>
@livewire('experiencias.ouro-branco')

@endsection