@extends('painel.template.main')

@section("styles")
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<link href="{{asset('admin/libs/select2/css/select2.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
{{--  <link href="{{asset('admin/libs/select2/css/select2-bootstrap4.css')}}" id="app-style" rel="stylesheet" type="text/css" />  --}}
@endsection

@section('titulo')
    Cadastro de Notícia
@endsection

@section('conteudo')

@include('painel.includes.errors')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 text-left my-3" style="color:red;">
                        * Campos obrigatórios
                    </div>
                </div>
                {{--  <h4 class="card-title mb-4">Informações Básicas</h4>  --}}

                <form action="{{route('painel.noticia.cadastrar')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-12 text-center">
                            <div class="row">
                                <div class="col-12">
                                    <h4 class="card-title mb-4 mt-4">Banner</h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <img id="banner-preview" src="{{asset('admin/images/thumb-padrao.png')}}" style="max-height: 400px; max-width: 100%;" alt="">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12 text-center">
                                    <label class="btn btn-primary" for="banner-upload">Escolher</label>
                                    <input name="banner" id="banner-upload" style="display: none;" type="file">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 text-center">
                                    {{--  <small style="color: red;">* Importante: Utilize imagens quadradas para garantir uma melhor visualização no site.</small>  --}}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-12 col-lg-4">
                            <label for="titulo">Título *</label>
                            <input type="text" class="form-control" name="titulo"
                                id="titulo" maxlenght="100" required>
                        </div>
                        <div class="form-group col-12 col-lg-4">
                            <label for="subtitulo">Subtitulo</label>
                            <input type="text" class="form-control" name="subtitulo"
                                id="subtitulo" maxlenght="255">
                        </div>
                        <div class="form-group col-12 col-lg-4">
                            <label for="">Categoria</label>
                            <select class="form-control" name="categoria_id">
                                @foreach(\App\Models\Categoria::all() as $categoria)
                                    <option value="{{$categoria->id}}">{{$categoria->nome}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="form-group col-12">
                            <label for="tags">Tags</label>
                            <select class="js-example-basic-multiple js-states form-control" multiple="multiple" name="tags[]" id="select_tag" multiple required>
                                <option value="" label="default"></option>
                                @foreach (App\Models\Tag::all() as $tag)
                                    <option value="{{$tag->id}}">{{$tag->nome}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="form-group col-12">
                            <label for="">Conteúdo</label>
                            <textarea class="form-control" name="conteudo" id="summernote" rows="10"></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 text-center">
                            <div class="row">
                                <div class="col-12">
                                    <h4 class="card-title mb-4 mt-4">Thumbnail</h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <img id="logo-preview" src="{{asset('admin/images/thumb-padrao.png')}}" style="width: 100%; max-width:200px;" alt="">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12 text-center">
                                    <label class="btn btn-primary" for="logo-upload">Escolher</label>
                                    <input name="preview" id="logo-upload" style="display: none;" type="file">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 text-center">
                                    <small style="color: red;">* Importante: Utilize imagens quadradas para garantir uma melhor visualização no site.</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-12" style="text-align: right;">
                            <button type="submit" class="btn btn-primary px-5">Salvar</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
</div>
<!-- end row -->
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script src="{{asset('admin/libs/select2/js/select2.min.js')}}"></script>
<script>
    var inp = document.getElementById('logo-upload');
    inp.addEventListener('change', function(e){
        var file = this.files[0];
        var reader = new FileReader();
        reader.onload = function(){
            document.getElementById('logo-preview').src = this.result;
            };
        reader.readAsDataURL(file);
    },false);

    var inp = document.getElementById('banner-upload');
    inp.addEventListener('change', function(e){
        var file = this.files[0];
        var reader = new FileReader();
        reader.onload = function(){
            document.getElementById('banner-preview').src = this.result;
            };
        reader.readAsDataURL(file);
    },false);

    $(document).ready(function() {
        $('#summernote').summernote({
            height: 600,
        });

        $('#select_tag').select2({
            tags: true,
        });
    });
</script>
@endsection