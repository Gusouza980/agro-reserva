@extends('template.main')

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
            <div class="col-12 col-lg-3">
                <div class="row d-lg-none justify-content-center">
                    <div class="col-10">
                        <div class="row" style="background-color: white; box-shadow: -3px 6px 15px #424FB224;">
                            <div class="col-9 py-2">
                                Filtros
                            </div>
                            <div class="col-3 px-3 py-2 text-right">
                                <i class="fas fa-plus" id="nav-blog-lateral-expandir" style="color: var(--laranja);"></i>
                                <i class="fas fa-minus" style="display:none; color: var(--laranja);" id="nav-blog-lateral-esconder"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center d-none d-lg-flex" id="nav-blog-lateral">
                    <div class="col-10 bg-white nav-blog-lateral py-3 px-4">
                        <h5>FIQUE POR DENTRO</h5>
                        <span>Assine nossa newsletter e receba tudo em primeira mão.</span>
                        <form action="" method="post" class="mt-2">
                            @csrf
                            <input type="text"
                                class="form-control" name="" id="" aria-describedby="helpId" placeholder="Digite seu e-mail">
                            <button type="submit" class="btn btn-vermelho btn-block mt-3">Enviar</button>
                        </form>
                    </div>
    
                    <div class="col-10 bg-white nav-blog-lateral mt-3 py-3 px-4">
                        <h5>POSTS RECENTES</h5>
                        @foreach($noticias->take(3) as $noticia)
                            <a href="{{route('noticia', ['slug' => $noticia->slug])}}">{{$noticia->titulo}}</a>
                            <hr>
                        @endforeach
                        <h5>Categorias</h5>
                        @foreach(\App\Models\Categoria::all() as $categoria)
                            <a href="{{route('blog.categoria', ['slug' => $categoria->slug])}}">{{$categoria->nome}}</a>
                            <hr>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-9 mt-4 mt-lg-0">
                <div class="container-fluid mb-4">
                    <div class="row">
                        <div class="col-12 col-lg-11 mb-3">
                            <form action="{{route('blog')}}" class="row" method="post">
                                @csrf
                                <div class="col-10 col-lg-11 pr-0">
                                    <input type="text"
                                        class="form-control" name="pesquisa" id="" @if(isset($pesquisa)) value="{{$pesquisa}}" @endif placeholder="Pesquisar...">
                                </div>
                                <div class="col-2 col-lg-1 pl-1">
                                    <button type="submit" class="btn btn-vermelho" role="button"><i class="fa fa-search fa-sm" aria-hidden="true"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 nav-blog-lateral text-center text-lg-left">
                            <h5>Últimas Notícias</h5>
                        </div>
                    </div>
                    <div class="row justify-content-center justify-content-lg-start pb-4">
                        @foreach($noticias as $noticia)
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
                    <div class="row">
                        <div class="col-12 text-center" id="blog-row-paginacao">
                            {{ $noticias->links() }}
                        </div>
                    </div>
                    @if(isset($mais_visitadas))
                        <div class="row">
                            <div class="col-12 nav-blog-lateral">
                                <h5>Mais Visitadas</h5>
                            </div>
                        </div>
                        <div class="row justify-content-center justify-content-lg-start pb-4">
                            @foreach($mais_visitadas as $noticia)
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
                    @endif
                </div>
            </div>
            <div>
    
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script> 
    
        $(document).ready(function(){
            $("#nav-blog-lateral-expandir").click(function(){
                if($("#nav-blog-lateral").hasClass("d-none")){
                    $("#nav-blog-lateral").css("display", "none");
                    $("#nav-blog-lateral").removeClass("d-none");
                }
                $(this).hide();
                $("#nav-blog-lateral-esconder").show();
                $("#nav-blog-lateral").slideDown("800");
            });

            $("#nav-blog-lateral-esconder").click(function(){
                $(this).hide();
                
                $("#nav-blog-lateral").slideUp("800", function(){
                    $("#nav-blog-lateral-expandir").show();
                });
            });
        });
    
    </script>
@endsection