@extends('painel.template.main')

@section('styles')
    <!-- DataTables -->
    <link href="{{asset('admin/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('titulo')
    Editando a fazenda: {{$fazenda->nome_fazenda}}
@endsection

@section('conteudo')
{{--  <div class="row my-3">
    <div class="col-12">
        @if($fazenda->ativo)
            <a name="" id="" class="btn btn-primary" href="{{route('painel.fazenda.desativar', ['fazenda' => $fazenda])}}" role="button">Desativar fazenda</a>
        @endif
    </div>
</div>
@if(!$fazenda->ativo)
    <div class="row">
        <div class="col-12">
            <div class="alert alert-danger" role="alert">
                Esta fazenda não está ativa no momento, clique <a href="{{route('painel.fazenda.ativar', ['fazenda' => $fazenda])}}"><b><u>aqui</u></b></a> para ativar.
            </div>
        </div>
    </div>
@endif  --}}

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 text-left my-3" style="color:red;">
                        * Campos obrigatórios
                    </div>
                </div>
                <h4 class="card-title mb-4">Informações Básicas</h4>

                <form action="{{route('painel.fazenda.salvar.informacoes', ['fazenda' => $fazenda])}}" method="POST">
                    @csrf

                    <div class="row">
                        
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nome_dono" class="form-label">Nome do Dono *</label>
                                <input type="text" class="form-control" name="nome_dono" id="nome_dono" value="{{$fazenda->nome_dono}}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nome_fazenda" class="form-label">Nome da Fazenda *</label>
                                <input type="text" class="form-control" name="nome_fazenda" id="nome_fazenda" value="{{$fazenda->nome_fazenda}}" required>
                            </div>
                        </div>

                    </div>
                    

                    <div class="row">
                        
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email *</label>
                                <input type="email" class="form-control" name="email" id="email" value="{{$fazenda->email}}" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="cnpj" class="form-label">CNPJ *</label>
                                <input type="text" class="form-control" name="cnpj" id="cnpj" value="{{$fazenda->cnpj}}" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="telefone" class="form-label">Telefone *</label>
                                <input type="text" class="form-control" name="telefone" id="telefone" value="{{$fazenda->telefone}}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="whatsapp" class="form-label">Whatsapp *</label>
                                <input type="text" class="form-control" name="whatsapp" id="whatsapp" value="{{$fazenda->whatsapp}}" required>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
</div>
<hr>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Logo</h4>

                <form action="{{route('painel.fazenda.salvar.logo', ['fazenda' => $fazenda])}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="">Logo da Fazenda</label>
                                <input type="file" class="form-control-file" name="logo" id="" placeholder="" aria-describedby="fileHelpId" required>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            @if($fazenda->logo)
                                <img src="{{asset($fazenda->logo)}}" style="max-height: 100px;" alt="">
                            @endif
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
</div>
<hr>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Catálogo</h4>

                <form action="{{route('painel.fazenda.salvar.catalogo', ['fazenda' => $fazenda])}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="">Arquivo de Catálogo</label>
                                <input type="file" class="form-control-file" name="catalogo" id="" placeholder="" aria-describedby="fileHelpId" required>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            @if($fazenda->catalogo)
                                <a name="" id="" href="{{asset($fazenda->catalogo)}}" class="btn btn-primary" href="#" role="button" download="catalogo_{{$fazenda->slug}}.pdf">Download</a>
                            @endif
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
</div>
<!-- end row -->
<hr>
@php
    $admin = $fazenda->usuarios->first();
@endphp
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Usuário do Sistema</h4>

                <form action="{{route('painel.fazenda.editar.usuario.salvar', ['usuario' => $admin])}}" method="POST">
                    @csrf
                    <input type="hidden" name="fazenda_id" value="{{$fazenda->id}}">
                    <div class="row">
                        
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="nome" class="form-label">Nome</label>
                                <input type="text" class="form-control" name="nome" id="nome" @if($admin) value="{{$admin->nome}}" @endif required>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="email" class="form-label">E-mail</label>
                                <input type="email" class="form-control" name="email" id="email" @if($admin) value="{{$admin->email}}" @endif required>
                            </div>
                        </div>

                    </div>
                    

                    <div class="row">
                        
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="usuario" class="form-label">Usuário</label>
                                <input type="text" class="form-control" name="usuario" id="usuario" @if($admin) value="{{$admin->usuario}}" @endif required>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="senha" class="form-label">Senha</label>
                                <input type="password" name="senha" class="form-control" aria-describedby="password-addon">
                                <small>Preencha apenas em caso de alteração</small>
                            </div>
                        </div>
                        

                    </div>

                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
</div>
<hr>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Destaque</h4>

                <form action="{{route('painel.fazenda.salvar.destaque', ['fazenda' => $fazenda])}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="">Imagem de destaque</label>
                                <input type="file" class="form-control-file" name="fundo_destaque" id="" placeholder="" aria-describedby="fileHelpId" required>
                                <small id="fileHelpId" class="form-text text-muted">Escolha a imagem que aparecerá como destaque na página principal</small>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            @if($fazenda->fundo_destaque)
                                <img src="{{asset($fazenda->fundo_destaque)}}" style="max-height: 100px;" alt="">
                            @endif
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
</div>
<!-- end row -->
<hr>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Conheça a fazenda</h4>

                <form action="{{route('painel.fazenda.salvar.conheca', ['fazenda' => $fazenda])}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <div class="form-group">
                                    <label for="">Imagem de fundo</label>
                                    <input type="file" class="form-control-file" name="fundo_conheca" id="" placeholder="" aria-describedby="fileHelpId">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            @if($fazenda->fundo_conheca)
                                <img src="{{asset($fazenda->fundo_conheca)}}" style="max-height: 100px;" alt="">
                            @endif
                        </div>

                    </div>

                    <div class="row mt-3">
                        
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="">Miniatura do Conheça a Fazenda</label>
                                <input type="file" class="form-control-file" name="miniatura_conheca" id="" placeholder="" aria-describedby="fileHelpId">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            @if($fazenda->miniatura_conheca)
                                <img src="{{asset($fazenda->miniatura_conheca)}}" style="max-height: 100px;" alt="">
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        
                        <div class="col-md-12">
                            <div class="mb-3">
                                <div class="form-group">
                                  <label for="">Link do vídeo</label>
                                  <input type="text"
                                    class="form-control" name="video_conheca" id="" aria-describedby="helpId" value="{{$fazenda->video_conheca}}" required>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        
                        <div class="col-md-12">
                            <div class="mb-3">
                                <div class="form-group">
                                  <label for="">Título</label>
                                  <input type="text"
                                    class="form-control" name="titulo_conheca" id="" aria-describedby="helpId"value="{{$fazenda->titulo_conheca}}" required>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        
                        <div class="col-md-12">
                            <div class="mb-3">
                                <div class="form-group">
                                    <label for="texto_conheca">Texto</label>
                                    <textarea class="form-control" name="texto_conheca" id="texto_conheca" rows="3" required>{!! $fazenda->texto_conheca !!}</textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                    
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
</div>
<!-- end row -->
<hr>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Conheça a fazenda - Lotes a Venda</h4>

                <form action="{{route('painel.fazenda.salvar.conheca.lotes', ['fazenda' => $fazenda])}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <div class="form-group">
                                    <label for="">Imagem de fundo</label>
                                    <input type="file" class="form-control-file" name="fundo_conheca_lotes" id="" @if(!$fazenda->fundo_conheca_lotes) required @endif>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            @if($fazenda->fundo_conheca_lotes)
                                <img src="{{asset($fazenda->fundo_conheca_lotes)}}" style="max-height: 100px;" alt="">
                            @endif
                        </div>

                    </div>

                    <div class="row mt-3">
                        
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="">Miniatura dos Lotes</label>
                                <input type="file" class="form-control-file" name="miniatura_conheca_lotes" id="" placeholder="" aria-describedby="fileHelpId" @if(!$fazenda->miniatura_conheca_lotes) required @endif>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            @if($fazenda->miniatura_conheca_lotes)
                                <img src="{{asset($fazenda->miniatura_conheca_lotes)}}" style="max-height: 100px;" alt="">
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        
                        <div class="col-md-12">
                            <div class="mb-3">
                                <div class="form-group">
                                  <label for="">Link do vídeo</label>
                                  <input type="text"
                                    class="form-control" name="video_conheca_lotes" id="" aria-describedby="helpId" value="{{$fazenda->video_conheca_lotes}}" >
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        
                        <div class="col-md-12">
                            <div class="mb-3">
                                <div class="form-group">
                                  <label for="">Título</label>
                                  <input type="text"
                                    class="form-control" name="titulo_conheca_lotes" id="" aria-describedby="helpId" value="{{$fazenda->titulo_conheca_lotes}}">
                                </div>
                            </div>
                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary">Salvar</button>

                    <hr class="my-3">

                    <div class="row mb-3">

                        <div class="col-12">
                            <button type="button" name="" id="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalNovoNumero">Nova Informação</button>
                        </div>
                        
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <table id="datatableNumeros" class="table table-bordered dt-responsive  nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Título</th>
                                        <th>Valor</th>
                                        <th></th>
                                    </tr>
                                </thead>
            
            
                                <tbody>
                                    @foreach($fazenda->numeros as $numero)
                                        <tr>
                                            <td>{{$numero->titulo}}</td>
                                            <td>{{$numero->valor}}</td>
                                            <td style="vertical-align: middle; text-align:center;">
                                                <a name="" id="" class="btn btn-warning cpointer" data-bs-toggle="modal" data-bs-target="#modalEditaNumeros{{$numero->id}}" role="button">Editar</a>
                                                <a name="" id="" class="btn btn-danger" href="{{route('painel.fazenda.editar.numero.excluir', ['numero' => $numero])}}" role="button">Excluir</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
<hr>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Conheça a fazenda - Avaliação - Imagens e Textos</h4>

                <form action="{{route('painel.fazenda.salvar.conheca.avaliacoes', ['fazenda' => $fazenda])}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <div class="form-group">
                                    <label for="">Imagem de fundo</label>
                                    <input type="file" class="form-control-file" name="fundo_conheca_avaliacao" @if(!$fazenda->fundo_conheca_avaliacao) required @endif>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            @if($fazenda->fundo_conheca_avaliacao)
                                <img src="{{asset($fazenda->fundo_conheca_avaliacao)}}" style="max-height: 100px;" alt="">
                            @endif
                        </div>

                    </div>

                    <div class="row mt-3">
                        
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="">Miniatura das Avaliações</label>
                                <input type="file" class="form-control-file" name="miniatura_conheca_avaliacao" id="" placeholder="" aria-describedby="fileHelpId" @if(!$fazenda->miniatura_conheca_avaliacao) required @endif>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            @if($fazenda->miniatura_conheca_depoimentos)
                                <img src="{{asset($fazenda->miniatura_conheca_avaliacao)}}" style="max-height: 100px;" alt="">
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        
                        <div class="col-md-12">
                            <div class="mb-3">
                                <div class="form-group">
                                    <label for="">Resumo</label>
                                    <textarea class="form-control" name="texto_conheca_avaliacao_resumo" id="texto_conheca" rows="3">{!! $fazenda->texto_conheca_avaliacao_resumo !!}</textarea>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        
                        <div class="col-md-12">
                            <div class="mb-3">
                                <div class="form-group">
                                    <label for="">Diferencial</label>
                                    <textarea class="form-control" name="texto_conheca_avaliacao_diferencial" id="texto_diferencial" rows="3">{!! $fazenda->texto_conheca_avaliacao_diferencial !!}</textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                    
                    <button type="submit" class="btn btn-primary">Salvar</button>

                    <hr class="my-3">

                    <div class="row mb-3">

                        <div class="col-12">
                            <button type="button" name="" id="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalNovaAvaliacao">Nova Avaliação</button>
                        </div>
                        
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <table id="datatableAvaliacoes" class="table table-bordered dt-responsive  nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Imagem</th>
                                        <th>Nome</th>
                                        <th></th>
                                    </tr>
                                </thead>
            
            
                                <tbody>
                                    @foreach($fazenda->avaliacoes as $avaliacao)
                                        <tr>
                                            <td><img src="{{asset($avaliacao->caminho)}}" style="width: 100px;" alt=""></td>
                                            <td>{{$avaliacao->nome}}</td>
                                            <td style="vertical-align: middle; text-align:center;">
                                                <a name="" id="" class="btn btn-warning cpointer" data-bs-toggle="modal" data-bs-target="#modalEditaAvaliacoes{{$avaliacao->id}}" role="button">Editar</a>
                                                <a name="" id="" class="btn btn-danger" href="{{route('painel.fazenda.editar.avaliacao.excluir', ['avaliacao' => $avaliacao])}}" role="button">Excluir</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
<hr>
<div class="row mt-5 mb-3">
    <div class="col-12">
        <a name="" id="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalNovaProducao" role="button">Nova Produção</a>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Conheça a fazenda - Avaliação - Produção</h4>
                <hr>
                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                    <thead>
                        <tr>
                            <th>Texto Maior</th>
                            <th>Texto Menor</th>
                            <th></th>
                        </tr>
                    </thead>


                    <tbody>
                        @foreach($fazenda->producoes as $producao)
                            <tr>
                                <td>{{$producao->titulo}}</td>
                                <td>{{$producao->subtitulo}}</td>
                                <td style="vertical-align: middle; text-align:center;">
                                    <a name="" id="" class="btn btn-warning cpointer" data-bs-toggle="modal" data-bs-target="#modalEditaProducao{{$producao->id}}" role="button">Editar</a>
                                    <a name="" id="" class="btn btn-danger" href="{{route('painel.fazenda.editar.producao.excluir', ['producao' => $producao])}}" role="button">Excluir</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
</div>
<hr>
<div class="row mt-5 mb-3">
    <div class="col-12">
        <a name="" id="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalNovoDepoimento" role="button">Novo depoimento</a>
    </div>
</div>
<!-- end row -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Depoimentos</h4>

                <form action="{{route('painel.fazenda.salvar.conheca.depoimentos', ['fazenda' => $fazenda])}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="">Fundo dos depoimentos</label>
                                <input type="file" class="form-control-file" name="fundo_conheca_depoimentos" id="" placeholder="" aria-describedby="fileHelpId" @if(!$fazenda->fundo_conheca_depoimentos) required @endif>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            @if($fazenda->fundo_conheca_depoimentos)
                                <img src="{{asset($fazenda->fundo_conheca_depoimentos)}}" style="max-height: 100px;" alt="">
                            @endif
                        </div>
                    </div>

                    <div class="row mt-3">
                        
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="">Miniatura dos depoimentos</label>
                                <input type="file" class="form-control-file" name="miniatura_conheca_depoimentos" id="" placeholder="" aria-describedby="fileHelpId" @if(!$fazenda->miniatura_conheca_depoimentos) required @endif>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            @if($fazenda->miniatura_conheca_depoimentos)
                                <img src="{{asset($fazenda->miniatura_conheca_depoimentos)}}" style="max-height: 100px;" alt="">
                            @endif
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
                <hr>
                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                    <thead>
                        <tr>
                            <th>Título</th>
                            <th>Texto</th>
                            <th>Vídeo</th>
                            <th></th>
                        </tr>
                    </thead>


                    <tbody>
                        @foreach($fazenda->depoimentos as $depoimento)
                            <tr>
                                <td>{{ \Illuminate\Support\Str::limit($depoimento->titulo, 60, $end='...')}}</td>
                                <td>
                                    {{ \Illuminate\Support\Str::limit($depoimento->texto, 40, $end='...')}}
                                </td>
                                <td>{{ \Illuminate\Support\Str::limit($depoimento->video, 40, $end='...')}}</td>
                                <td style="vertical-align: middle; text-align:center;">
                                    <a name="" id="" class="btn btn-warning cpointer" data-bs-toggle="modal" data-bs-target="#modalEditaDepoimento{{$depoimento->id}}" role="button">Editar</a>
                                    <a name="" id="" class="btn btn-danger" href="{{route('painel.fazenda.editar.depoimento.excluir', ['depoimento' => $depoimento])}}" role="button">Excluir</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
</div>

<div class="modal fade" id="modalDataReserva" tabindex="-1" role="dialog" aria-labelledby="modalDataReservaLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDataReservaLabel">Informar data do período de reserva</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('painel.fazenda.editar.reserva', ['fazenda' => $fazenda])}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="data_inicio_reserva">Data de Início</label>
                                <input type="date"
                                  class="form-control" name="data_inicio_reserva" value="{{date('Y-m-d', strtotime($fazenda->data_inicio_reserva))}}"  required>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="hora_inicio_reserva">Hora de Início</label>
                                <input type="time"
                                  class="form-control" name="hora_inicio_reserva" value="{{date('H:i', strtotime($fazenda->data_inicio_reserva))}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="data_fim_reserva">Data de Finalização</label>
                                <input type="date"
                                  class="form-control" name="data_fim_reserva" value="{{date('Y-m-d', strtotime($fazenda->data_fim_reserva))}}" required>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="hora_fim_reserva">Hora de Finalização</label>
                                <input type="time"
                                  class="form-control" name="hora_fim_reserva" value="{{date('H:i', strtotime($fazenda->data_fim_reserva))}}" required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group text-end">
                        <button type="submit" class="btn btn-primary mt-3">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalNovoDepoimento" tabindex="-1" role="dialog" aria-labelledby="modalNovoDepoimentoLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalNovoDepoimentoLabel">Cadastrar novo depoimento</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('painel.fazenda.editar.depoimento.novo', ['fazenda' => $fazenda])}}" method="POST">
                    @csrf

                    <div class="row">
                        
                        <div class="col-md-12">
                            <div class="mb-3">
                                <div class="form-group">
                                  <label for="">Link do vídeo</label>
                                  <input type="text"
                                    class="form-control" name="video" id="" aria-describedby="helpId" required>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        
                        <div class="col-md-12">
                            <div class="mb-3">
                                <div class="form-group">
                                  <label for="">Título</label>
                                  <input type="text"
                                    class="form-control" name="titulo" id="" aria-describedby="helpId" required>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        
                        <div class="col-md-12">
                            <div class="mb-3">
                                <div class="form-group">
                                    <label for="texto">Texto</label>
                                    <textarea class="form-control" name="texto" id="texto" rows="3" required></textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                    
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalNovaProducao" tabindex="-1" role="dialog" aria-labelledby="modalNovaProducaoLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalNovaProducaoLabel">Cadastrar nova Produção</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('painel.fazenda.editar.producao.novo', ['fazenda' => $fazenda])}}" method="POST">
                    @csrf

                    <div class="row">
                        
                        <div class="col-md-12">
                            <div class="mb-3">
                                <div class="form-group">
                                  <label for="">Texto maior</label>
                                  <input type="text"
                                    class="form-control" name="titulo" id="" aria-describedby="helpId" required>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        
                        <div class="col-md-12">
                            <div class="mb-3">
                                <div class="form-group">
                                  <label for="">Texto menor</label>
                                  <input type="text"
                                    class="form-control" name="subtitulo" id="" aria-describedby="helpId" required>
                                </div>
                            </div>
                        </div>

                    </div>

                    
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</div>

@foreach($fazenda->depoimentos as $depoimento)
<div class="modal fade" id="modalEditaDepoimento{{$depoimento->id}}" tabindex="-1" role="dialog" aria-labelledby="modalEditaDepoimento{{$depoimento->id}}Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditaDepoimento{{$depoimento->id}}Label">Cadastrar novo depoimento</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('painel.fazenda.editar.depoimento.salvar', ['depoimento' => $depoimento])}}" method="POST">
                    @csrf

                    <div class="row">
                        
                        <div class="col-md-12">
                            <div class="mb-3">
                                <div class="form-group">
                                  <label for="">Link do vídeo</label>
                                  <input type="text"
                                    class="form-control" name="video" id="" value="{{$depoimento->video}}" required>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        
                        <div class="col-md-12">
                            <div class="mb-3">
                                <div class="form-group">
                                  <label for="">Título</label>
                                  <input type="text"
                                    class="form-control" name="titulo" id="" value="{{$depoimento->titulo}}" required>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        
                        <div class="col-md-12">
                            <div class="mb-3">
                                <div class="form-group">
                                    <label for="texto">Texto</label>
                                    <textarea class="form-control" name="texto" id="texto" rows="3" required>{!! $depoimento->texto !!}</textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                    
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

@foreach($fazenda->producoes as $producao)
<div class="modal fade" id="modalEditaProducao{{$producao->id}}" tabindex="-1" role="dialog" aria-labelledby="modalEditaProducao{{$producao->id}}Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditaProducao{{$producao->id}}Label">Editar produção</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('painel.fazenda.editar.producao.salvar', ['producao' => $producao])}}" method="POST">
                    @csrf

                    <div class="row">
                        
                        <div class="col-md-12">
                            <div class="mb-3">
                                <div class="form-group">
                                  <label for="">Texto Maior</label>
                                  <input type="text"
                                    class="form-control" name="titulo" id="" value="{{$producao->titulo}}" required>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        
                        <div class="col-md-12">
                            <div class="mb-3">
                                <div class="form-group">
                                  <label for="">Texto Menor</label>
                                  <input type="text"
                                    class="form-control" name="subtitulo" id="" value="{{$producao->subtitulo}}" required>
                                </div>
                            </div>
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

<div class="modal fade" id="modalNovaAvaliacao" tabindex="-1" role="dialog" aria-labelledby="modalNovaAvaliacaoLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalNovaAvaliacaoLabel">Nova Informação</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('painel.fazenda.editar.avaliacao.novo', ['fazenda' => $fazenda])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <div class="form-group">
                                  <label for="">Nome</label>
                                  <input type="text"
                                    class="form-control" name="nome" id="" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <div class="form-group">
                                  <label for="">Imagem</label>
                                  <input type="file" class="form-control-file" name="caminho" id="" placeholder="" aria-describedby="fileHelpId" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</div>

@foreach($fazenda->avaliacoes as $avaliacao)
<div class="modal fade" id="modalEditaAvaliacoes{{$avaliacao->id}}" tabindex="-1" role="dialog" aria-labelledby="modalEditaAvaliacoes{{$avaliacao->id}}Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditaAvaliacoes{{$avaliacao->id}}Label">Editar Informação</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('painel.fazenda.editar.avaliacao.salvar', ['avaliacao' => $avaliacao])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <div class="form-group">
                                  <label for="">Nome</label>
                                  <input type="text"
                                    class="form-control" name="nome" id="" value="{{$avaliacao->nome}}" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <div class="form-group">
                                  <label for="">Imagem</label>
                                  <input type="file" class="form-control-file" name="caminho" id="" placeholder="" aria-describedby="fileHelpId">
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach


<div class="modal fade" id="modalNovoNumero" tabindex="-1" role="dialog" aria-labelledby="modalNovoNumeroLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalNovoNumeroLabel">Nova Informação</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('painel.fazenda.editar.numero.novo', ['fazenda' => $fazenda])}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <div class="form-group">
                                  <label for="">Título</label>
                                  <input type="text"
                                    class="form-control" name="titulo" id="" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <div class="form-group">
                                  <label for="">Valor</label>
                                  <input type="text"
                                    class="form-control" name="valor" id="" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</div>

@foreach($fazenda->numeros as $numero)
<div class="modal fade" id="modalEditaNumeros{{$numero->id}}" tabindex="-1" role="dialog" aria-labelledby="modalEditaNumeros{{$numero->id}}Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditaNumeros{{$numero->id}}Label">Editar Informação</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('painel.fazenda.editar.numero.salvar', ['numero' => $numero])}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <div class="form-group">
                                  <label for="">Título</label>
                                  <input type="text"
                                    class="form-control" name="titulo" id="" value="{{$numero->titulo}}" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <div class="form-group">
                                  <label for="">Valor</label>
                                  <input type="text"
                                    class="form-control" name="valor" id="" value="{{$numero->valor}}" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection

@section('scripts')
    <!-- Required datatable js -->
    <script src="{{asset('admin/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable( {
                responsive: true,
                scrollX: 200,
                scroller: true,
                language:{
                    "emptyTable": "Nenhum registro encontrado",
                    "info": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    "infoEmpty": "Mostrando 0 até 0 de 0 registros",
                    "infoFiltered": "(Filtrados de _MAX_ registros)",
                    "infoThousands": ".",
                    "loadingRecords": "Carregando...",
                    "processing": "Processando...",
                    "zeroRecords": "Nenhum registro encontrado",
                    "search": "Pesquisar",
                    "paginate": {
                        "next": "Próximo",
                        "previous": "Anterior",
                        "first": "Primeiro",
                        "last": "Último"
                    },
                    "aria": {
                        "sortAscending": ": Ordenar colunas de forma ascendente",
                        "sortDescending": ": Ordenar colunas de forma descendente"
                    },
                    "select": {
                        "rows": {
                            "_": "Selecionado %d linhas",
                            "0": "Nenhuma linha selecionada",
                            "1": "Selecionado 1 linha"
                        },
                        "1": "%d linha selecionada",
                        "_": "%d linhas selecionadas",
                        "cells": {
                            "1": "1 célula selecionada",
                            "_": "%d células selecionadas"
                        },
                        "columns": {
                            "1": "1 coluna selecionada",
                            "_": "%d colunas selecionadas"
                        }
                    },
                    "buttons": {
                        "copySuccess": {
                            "1": "Uma linha copiada com sucesso",
                            "_": "%d linhas copiadas com sucesso"
                        },
                        "collection": "Coleção  <span class=\"ui-button-icon-primary ui-icon ui-icon-triangle-1-s\"><\/span>",
                        "colvis": "Visibilidade da Coluna",
                        "colvisRestore": "Restaurar Visibilidade",
                        "copy": "Copiar",
                        "copyKeys": "Pressione ctrl ou u2318 + C para copiar os dados da tabela para a área de transferência do sistema. Para cancelar, clique nesta mensagem ou pressione Esc..",
                        "copyTitle": "Copiar para a Área de Transferência",
                        "csv": "CSV",
                        "excel": "Excel",
                        "pageLength": {
                            "-1": "Mostrar todos os registros",
                            "1": "Mostrar 1 registro",
                            "_": "Mostrar %d registros"
                        },
                        "pdf": "PDF",
                        "print": "Imprimir"
                    },
                    "autoFill": {
                        "cancel": "Cancelar",
                        "fill": "Preencher todas as células com",
                        "fillHorizontal": "Preencher células horizontalmente",
                        "fillVertical": "Preencher células verticalmente"
                    },
                    "lengthMenu": "Exibir _MENU_ resultados por página",
                    "searchBuilder": {
                        "add": "Adicionar Condição",
                        "button": {
                            "0": "Construtor de Pesquisa",
                            "_": "Construtor de Pesquisa (%d)"
                        },
                        "clearAll": "Limpar Tudo",
                        "condition": "Condição",
                        "conditions": {
                            "date": {
                                "after": "Depois",
                                "before": "Antes",
                                "between": "Entre",
                                "empty": "Vazio",
                                "equals": "Igual",
                                "not": "Não",
                                "notBetween": "Não Entre",
                                "notEmpty": "Não Vazio"
                            },
                            "number": {
                                "between": "Entre",
                                "empty": "Vazio",
                                "equals": "Igual",
                                "gt": "Maior Que",
                                "gte": "Maior ou Igual a",
                                "lt": "Menor Que",
                                "lte": "Menor ou Igual a",
                                "not": "Não",
                                "notBetween": "Não Entre",
                                "notEmpty": "Não Vazio"
                            },
                            "string": {
                                "contains": "Contém",
                                "empty": "Vazio",
                                "endsWith": "Termina Com",
                                "equals": "Igual",
                                "not": "Não",
                                "notEmpty": "Não Vazio",
                                "startsWith": "Começa Com"
                            }
                        },
                        "data": "Data",
                        "deleteTitle": "Excluir regra de filtragem",
                        "logicAnd": "E",
                        "logicOr": "Ou",
                        "title": {
                            "0": "Construtor de Pesquisa",
                            "_": "Construtor de Pesquisa (%d)"
                        },
                        "value": "Valor"
                    },
                    "searchPanes": {
                        "clearMessage": "Limpar Tudo",
                        "collapse": {
                            "0": "Painéis de Pesquisa",
                            "_": "Painéis de Pesquisa (%d)"
                        },
                        "count": "{total}",
                        "countFiltered": "{shown} ({total})",
                        "emptyPanes": "Nenhum Painel de Pesquisa",
                        "loadMessage": "Carregando Painéis de Pesquisa...",
                        "title": "Filtros Ativos"
                    },
                    "searchPlaceholder": "Digite um termo para pesquisar",
                    "thousands": "."
                } 
            } );
            $('#datatableNumeros').DataTable( {
                responsive: true,
                scrollX: 200,
                scroller: true,
                language:{
                    "emptyTable": "Nenhum registro encontrado",
                    "info": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    "infoEmpty": "Mostrando 0 até 0 de 0 registros",
                    "infoFiltered": "(Filtrados de _MAX_ registros)",
                    "infoThousands": ".",
                    "loadingRecords": "Carregando...",
                    "processing": "Processando...",
                    "zeroRecords": "Nenhum registro encontrado",
                    "search": "Pesquisar",
                    "paginate": {
                        "next": "Próximo",
                        "previous": "Anterior",
                        "first": "Primeiro",
                        "last": "Último"
                    },
                    "aria": {
                        "sortAscending": ": Ordenar colunas de forma ascendente",
                        "sortDescending": ": Ordenar colunas de forma descendente"
                    },
                    "select": {
                        "rows": {
                            "_": "Selecionado %d linhas",
                            "0": "Nenhuma linha selecionada",
                            "1": "Selecionado 1 linha"
                        },
                        "1": "%d linha selecionada",
                        "_": "%d linhas selecionadas",
                        "cells": {
                            "1": "1 célula selecionada",
                            "_": "%d células selecionadas"
                        },
                        "columns": {
                            "1": "1 coluna selecionada",
                            "_": "%d colunas selecionadas"
                        }
                    },
                    "buttons": {
                        "copySuccess": {
                            "1": "Uma linha copiada com sucesso",
                            "_": "%d linhas copiadas com sucesso"
                        },
                        "collection": "Coleção  <span class=\"ui-button-icon-primary ui-icon ui-icon-triangle-1-s\"><\/span>",
                        "colvis": "Visibilidade da Coluna",
                        "colvisRestore": "Restaurar Visibilidade",
                        "copy": "Copiar",
                        "copyKeys": "Pressione ctrl ou u2318 + C para copiar os dados da tabela para a área de transferência do sistema. Para cancelar, clique nesta mensagem ou pressione Esc..",
                        "copyTitle": "Copiar para a Área de Transferência",
                        "csv": "CSV",
                        "excel": "Excel",
                        "pageLength": {
                            "-1": "Mostrar todos os registros",
                            "1": "Mostrar 1 registro",
                            "_": "Mostrar %d registros"
                        },
                        "pdf": "PDF",
                        "print": "Imprimir"
                    },
                    "autoFill": {
                        "cancel": "Cancelar",
                        "fill": "Preencher todas as células com",
                        "fillHorizontal": "Preencher células horizontalmente",
                        "fillVertical": "Preencher células verticalmente"
                    },
                    "lengthMenu": "Exibir _MENU_ resultados por página",
                    "searchBuilder": {
                        "add": "Adicionar Condição",
                        "button": {
                            "0": "Construtor de Pesquisa",
                            "_": "Construtor de Pesquisa (%d)"
                        },
                        "clearAll": "Limpar Tudo",
                        "condition": "Condição",
                        "conditions": {
                            "date": {
                                "after": "Depois",
                                "before": "Antes",
                                "between": "Entre",
                                "empty": "Vazio",
                                "equals": "Igual",
                                "not": "Não",
                                "notBetween": "Não Entre",
                                "notEmpty": "Não Vazio"
                            },
                            "number": {
                                "between": "Entre",
                                "empty": "Vazio",
                                "equals": "Igual",
                                "gt": "Maior Que",
                                "gte": "Maior ou Igual a",
                                "lt": "Menor Que",
                                "lte": "Menor ou Igual a",
                                "not": "Não",
                                "notBetween": "Não Entre",
                                "notEmpty": "Não Vazio"
                            },
                            "string": {
                                "contains": "Contém",
                                "empty": "Vazio",
                                "endsWith": "Termina Com",
                                "equals": "Igual",
                                "not": "Não",
                                "notEmpty": "Não Vazio",
                                "startsWith": "Começa Com"
                            }
                        },
                        "data": "Data",
                        "deleteTitle": "Excluir regra de filtragem",
                        "logicAnd": "E",
                        "logicOr": "Ou",
                        "title": {
                            "0": "Construtor de Pesquisa",
                            "_": "Construtor de Pesquisa (%d)"
                        },
                        "value": "Valor"
                    },
                    "searchPanes": {
                        "clearMessage": "Limpar Tudo",
                        "collapse": {
                            "0": "Painéis de Pesquisa",
                            "_": "Painéis de Pesquisa (%d)"
                        },
                        "count": "{total}",
                        "countFiltered": "{shown} ({total})",
                        "emptyPanes": "Nenhum Painel de Pesquisa",
                        "loadMessage": "Carregando Painéis de Pesquisa...",
                        "title": "Filtros Ativos"
                    },
                    "searchPlaceholder": "Digite um termo para pesquisar",
                    "thousands": "."
                } 
            } );
        } );    
    </script> 
@endsection