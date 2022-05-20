@extends('template.main2')


@section('conteudo')

<div class="w-full">
    <img src="{{ asset('imagens/banner-pagina-ourobranco.png') }}" class="w-full" alt="">
</div>
<div class="flex justify-content-center py-4">
    <div class="w-full lg:w-1/2">
        <iframe class="aspect-video w-full" src="https://www.youtube.com/embed/s4nvrH6Xz60?list=PLnqvSti-aWALfE84ooJzeFQlW_o45kuPB" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
</div>
<div class="w1400 mx-auto mt-4">
    <div class="flex flex-wrap lg:-mx-2 justify-content-center">
        @foreach($videos as $video)
            @php
                // dd($video->contentDetails->videoId);
            @endphp
            <div class="basis-1/1 lg:basis-1/3 px-2 mb-3">
                @livewire('experiencias.video', ['video' => $video])
                <div class="" style="font-size: 16px; font-family: Montserrat;">
                    {{ $video->snippet->title }}
                </div>
                {{-- <img src="{{ $video->snippet->thumbnails->medium->url }}" class="w-full" alt=""> --}}
            </div>
        @endforeach
    </div>
</div>

@endsection