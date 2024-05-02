@extends('sistema.templates.main')

@section("styles")
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@endsection

@section('breadcrumb')
    <li>
        <div class="flex items-center space-x-1.5">
            <span>Notícias</span>
        </div>
    </li>
@endsection

@section('conteudo')
    <div class="grid justify-center grid-cols-1 px-6 py-6">
        <div class="flex items-center justify-between w-full">
            <h2 class="text-base font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100">
                Cadastro de Notícia
            </h2>
        </div>
        <div class="mt-3 card p-5">
            <form action="{{ route('sistema.noticias.salvar') }}" method="POST" enctype="multipart/form-data" class="w-full flex flex-col gap-4">
                @csrf
                <input type="hidden" name="noticia_id" value="{{ $noticia->id }}">
                <div class="w-full flex items-center justify-start gap-4">
                    <div class="grow">
                        <div class="w-full">
                            <label class="block">
                                <span>Título *</span>
                                <span class="relative mt-1.5 flex">
                                <input name="titulo" class="w-full px-3 py-2 bg-transparent border rounded-lg form-input peer border-slate-300 placeholder:text-slate-400/70 hover:border-slate-400" type="text" maxlength="255" value="{{ $noticia->titulo }}" required>
                            </span>
                            </label>
                        </div>
                    </div>
                    <div class="grow">
                        <div class="w-full">
                            <label class="block">
                                <span>Subtítulo</span>
                                <span class="relative mt-1.5 flex">
                                <input name="subtitulo" class="w-full px-3 py-2 bg-transparent border rounded-lg form-input peer border-slate-300 placeholder:text-slate-400/70 hover:border-slate-400" type="text" value="{{$noticia->subtitulo}}" maxlength="255">
                            </span>
                            </label>
                        </div>
                    </div>
                    <div class="w-fit">
                        <div class="">
                            <label for="multi_fazendas">Categoria *</label>
                            <select
                                class="mt-1.5 w-full px-3 py-2 bg-transparent border rounded-lg form-input peer border-slate-300 placeholder:text-slate-400/70 hover:border-slate-400"
                                name="categoria_id" required>
                                <option value="">Selecione uma Opção</option>
                                @foreach(\App\Models\Categoria::all() as $categoria)
                                    <option value="{{$categoria->id}}" @if($noticia->categoria_id == $categoria->id) selected @endif>{{$categoria->nome}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="w-full">
                    <div class="w-full">
                        <label for="">Conteúdo</label>
                        <textarea class="form-control" name="conteudo" id="summernote" rows="10">{!! $noticia->conteudo !!}</textarea>
                    </div>
                </div>
                <div class="w-full">
                    <button type="submit"
                            class="w-full font-medium text-white bg-green-600 btn hover:bg-green-800"
                    >
                        Salvar
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 600,
                fontSizeUnits: ['px', 'pt'],
                fontSizes: ['8', '9', '10', '11', '12', '14', '18', '24', '36', '48' , '64', '82', '150'],
            });

            $('#select_tag').select2({
                tags: true,
            });
        });
    </script>
@endsection
