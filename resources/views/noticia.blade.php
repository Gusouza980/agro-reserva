@extends('template.main2')

@section('conteudo')
<div class="container-fluid py-5" style="background-color: #f5f5f5;">
    <div class="w1200 mx-auto">
        <div class="row">
            <div class="col-12">
                <a href="{{route('blog')}}"><span style="color: #E8521B !important; font-size: 16px; font-family: 'Montserrat', sans-serif; font-weight: bold;"><i class="fas fa-arrow-left mr-2"></i> Voltar</span></a>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-12">
                <img src="{{asset($noticia->banner)}}" style="max-width: 100%; border-radius: 20px;" alt="">
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-12 card-noticia-text">
                <h1>{{$noticia->titulo}}</h1>
                <h5>{{$noticia->subtitulo}}</h5>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-lg-12 card-noticia-text">
                <h3>{{date("d/m/Y | H:i", strtotime($noticia->created_at))}}</h3>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-lg-12">
                {!! $noticia->conteudo !!}
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <a href="{{route('blog')}}"><span style="color: #E8521B !important; font-size: 16px; font-family: 'Montserrat', sans-serif; font-weight: bold;"><i class="fas fa-arrow-left mr-2"></i> Voltar</span></a>
            </div>
        </div>
    </div>
</div>
@endsection