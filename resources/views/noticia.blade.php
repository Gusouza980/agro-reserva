@extends('template.main')

@section('conteudo')
<div class="container-fluid py-5" style="background-color: #f5f5f5;">
    <div class="w1200 mx-auto">
        <div class="row">
            <div class="col-lg-12">
                <img src="{{asset($noticia->banner)}}" style="max-width: 100%; border-radius: 20px;" alt="">
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-12 card-noticia-text">
                <h1>{{$noticia->titulo}}</h1>
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
    </div>
</div>
@endsection