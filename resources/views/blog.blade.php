@extends('template.main2')

@section('conteudo')
<div class="container-fluid">
    <div class="w-full flex items-center" id="row-header-blog" style="background: url({{asset('imagens/banner-blogg.jpg')}}); background-size: cover; background-position: top;">
        <div class="w-full text-center text-header-blog">
            <h1>Fique por dentro das novidades</h1>
        </div>
    </div>
</div>
<div class="container-fluid" style="background-color: #f5f5f5;">
    <div class="w1200 mx-auto">
        <div class="w-full py-4">
            <div class="w-full px-5 xl:px-0">
                <a href="{{route('index')}}"><span style="color: #E8521B !important; font-size: 16px; font-family: 'Montserrat', sans-serif; font-weight: bold;"><i class="fas fa-arrow-left mr-2"></i> Voltar</span></a>
            </div>
        </div>
        <div class="w-full flex md:flex-nowrap flex-wrap gap-6">
            <div class="w-full max-w-[300px]">
                <div class="flex lg:hidden justify-center px-5">
                    <div class="w-full mb-5">
                        <div class="flex justify-between items-center px-4 py-2 font-montserrat rounded-md" style="background-color: white; box-shadow: -3px 6px 15px #424FB224;">
                            <div class="">
                                Filtros
                            </div>
                            <div class="text-right">
                                <i class="fas fa-plus" id="nav-blog-lateral-expandir" style="color: var(--laranja);"></i>
                                <i class="fas fa-minus" style="display:none; color: var(--laranja);" id="nav-blog-lateral-esconder"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="justify-center hidden lg:flex px-5 xl:px-0" id="nav-blog-lateral">
                    <div class="w-full bg-white nav-blog-lateral py-3 px-4 font-montserrat">
                        <h5 class="mb-4">POSTS RECENTES</h5>
                        @foreach($noticias->take(3) as $noticia)
                            <a class="transition-all duration-200 w-full border-b hover:text-gray-800 hover:font-semibold text-gray-500 flex py-2 tracking-wide text-sm" href="{{route('noticia', ['slug' => $noticia->slug])}}">
                                {{$noticia->titulo}}
                            </a>
                        @endforeach
                        <h5 class="mt-6 mb-4">Categorias</h5>
                        @foreach(\App\Models\Categoria::all() as $categoria)
                            <a class="transition-all duration-200 w-full border-b hover:text-gray-800 hover:font-semibold text-gray-500 flex py-2 tracking-wide text-sm" href="{{route('blog.categoria', ['slug' => $categoria->slug])}}">{{$categoria->nome}}</a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="grow mt-4 md:mt-0 lg:px-0 px-5">
                <div class="w-full mb-4">
                    <div class="flex w-full">
                        <div class="w-full mb-3">
                            <form action="{{route('blog')}}" class="w-full flex gap-4 items-center" method="post">
                                @csrf
                                <div class="grow">
                                    <input type="text"
                                        class="w-full h-10 px-4 rounded-md outline-none ring-0" name="pesquisa" id="" @if(isset($pesquisa)) value="{{$pesquisa}}" @endif placeholder="Pesquisar...">
                                </div>
                                <div class="w-fit">
                                    <button type="submit" class="h-10 w-10 flex items-center justify-center bg-orange-500 rounded-md text-white" role="button"><i class="fa fa-search fa-sm" aria-hidden="true"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="w-full flex mt-5">
                        <div class="w-full nav-blog-lateral text-center lg:text-left">
                            <h5>Últimas Notícias</h5>
                        </div>
                    </div>
                    <div class="w-full flex flex-wrap justify-center lg:justify-start pb-4 gap-4">
                        @foreach($noticias as $noticia)
                            <a href="{{route('noticia', ['slug' => $noticia->slug])}}">
                                <div class="card-noticia mt-3 cpointer">
                                    <div class="w-full px-0">
                                        <div class="flex px-0 mx-0">
                                            <div class="w-full card-noticia-imagem px-0" style="background: url({{asset($noticia->preview)}}); background-size: cover; background-position: center;">
    
                                            </div>
                                        </div>
                                        <div class="flex px-0 mx-0 mt-3">
                                            <div class="w-full px-3 card-noticia-data">
                                                <i class="fas fa-calendar-week mr-2"></i> <span>{{$noticia->created_at->diffForHumans()}}</span>
                                            </div>
                                        </div>
                                        <div class="flex px-0 mx-0 mt-3">
                                            <div class="w-full px-3 card-noticia-text">
                                                <h2>{{$noticia->titulo}}</h2>
                                            </div>
                                        </div>
                                        <div class="flex px-0 mx-0 mt-1 mb-3">
                                            <div class="w-full px-3 card-noticia-text">
                                                <h3>{{$noticia->subtitulo}}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                    <div class="w-full">
                        {{ $noticias->links() }}
                    </div>
                    @if(isset($mais_visitadas))
                        <div class="w-full mt-10">
                            <div class="w-full nav-blog-lateral text-center lg:text-left">
                                <h5>Mais Visitadas</h5>
                            </div>
                        </div>
                        <div class="w-full flex flex-wrap justify-center lg:justify-start pb-4 gap-4">
                            @foreach($mais_visitadas as $noticia)
                                <a href="{{route('noticia', ['slug' => $noticia->slug])}}">
                                    <div class="card-noticia mt-3 cpointer">
                                        <div class="w-full px-0">
                                            <div class="flex px-0 mx-0">
                                                <div class="w-full card-noticia-imagem px-0" style="background: url({{asset($noticia->preview)}}); background-size: cover; background-position: center;">
        
                                                </div>
                                            </div>
                                            <div class="flex px-0 mx-0 mt-3">
                                                <div class="w-full px-3 card-noticia-data">
                                                    <i class="fas fa-calendar-week mr-2"></i> <span>{{$noticia->created_at->diffForHumans()}}</span>
                                                </div>
                                            </div>
                                            <div class="flex px-0 mx-0 mt-3">
                                                <div class="w-full px-3 card-noticia-text">
                                                    <h2>{{$noticia->titulo}}</h2>
                                                </div>
                                            </div>
                                            <div class="flex px-0 mx-0 mt-1 mb-3">
                                                <div class="w-full px-3 card-noticia-text">
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