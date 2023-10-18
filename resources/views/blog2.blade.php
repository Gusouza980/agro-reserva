@extends('template.main2')

@section('conteudo')
<div class="container-fluid">
    <div class="row align-items-center" id="row-header-blog" style="background: url({{asset('imagens/banner-blogg.jpg')}}); background-size: cover; background-position: top;">
        <div class="col-12 text-center text-header-blog">
            <h1>Fique por dentro das novidades</h1>
        </div>
    </div>
</div>
<div class="container-fluid" style="background-color: #f5f5f5;">
    <div class="w1200 mx-auto">
        <div class="row py-4">
            <div class="col-12">
                <a href="{{route('index')}}"><span style="color: #E8521B !important; font-size: 16px; font-family: 'Montserrat', sans-serif; font-weight: bold;"><i class="fas fa-arrow-left mr-2"></i> Voltar</span></a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="container-fluid my-4">
                    <div class="row justify-content-center pb-4">
                        @foreach(\App\Models\Noticia::where("publicada", true)->orderBy("created_at", "DESC")->get() as $noticia)
                            <a href="{{route('noticia', ['slug' => $noticia->slug])}}">
                                <div class="card-noticia mx-2 mt-3 cpointer">
                                    <div class="container-fluid px-0">
                                        <div class="row px-0 mx-0">
                                            <div class="col-12 card-noticia-imagem px-0" style="background: url({{asset($noticia->preview)}}); background-size: cover; background-position: center;">

                                            </div>
                                        </div>
                                        <div class="row px-0 mx-0 mt-3">
                                            <div class="col-12 px-3 card-noticia-data">
                                                <i class="fas fa-calendar-week mr-2"></i> <span>{{$noticia->created_at->diffForHumans()}}</span>
                                            </div>
                                        </div>
                                        <div class="row px-0 mx-0 mt-3">
                                            <div class="col-12 px-3 card-noticia-text">
                                                <h2>{{$noticia->titulo}}</h2>
                                            </div>
                                        </div>
                                        <div class="row px-0 mx-0 mt-1 mb-3">
                                            <div class="col-12 px-3 card-noticia-text">
                                                <h3>{{$noticia->subtitulo}}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div>

            </div>
        </div>
    </div>
</div>
@endsection