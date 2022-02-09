@extends('painel.template.main')

@section('conteudo')
    <div class="row">
        <div class="col-12 col-lg-4">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('painel.configuracoes.home.banners.salvar') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mt-3">
                            <div class="form-group">
                                <label class="custom-file">
                                    <input type="file" name="caminho" id="" placeholder="" class="custom-file-input" aria-describedby="fileHelpId">
                                    <span class="custom-file-control"></span>
                                </label>
                                <small id="fileHelpId" class="form-text text-muted">Imagem pro desktop</small>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="form-group">
                                <label class="custom-file">
                                    <input type="file" name="caminho_mobile" id="" placeholder="" class="custom-file-input" aria-describedby="fileHelpId">
                                    <span class="custom-file-control"></span>
                                </label>
                                <small id="fileHelpId" class="form-text text-muted">Imagem pro mobile</small>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="form-group">
                                <label for="">Descrição</label>
                                <input type="text" class="form-control" name="descricao" placeholder="">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="form-group">
                                <label for="">Link</label>
                                <input type="text" class="form-control" name="link" placeholder="">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="form-group">
                                <label for="">Prioridade</label>
                                <input type="number" class="form-control" name="prioridade" step="1" min="0" placeholder="">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12 text-end">
                                <button type="submit" class="btn btn-primary btn-block">Salvar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-8">
            <div class="card">
                <div class="card-body">
    
                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead class="text-center">
                            <tr>
                                <th></th>
                                <th>Descrição</th>
                                <th>Prioridade</th>
                            </tr>
                        </thead>
    
    
                        <tbody class="text-center">
                            @foreach($banners as $banner)
                                <tr>
                                    <td>
                                        <div class="dropdown mt-4 mt-sm-0">
                                            <a href="#" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="fas fa-bars" aria-hidden="true"></i>
                                            </a>
                                            <div class="dropdown-menu" style="margin: 0px;">
                                                <a name="" id="" class="dropdown-item py-2"
                                                    href="{{route('painel.configuracoes.home.banners.deletar', ['banner' => $banner])}}"
                                                    role="button">Excluir</a>
                                            </div>
                                        </div>
                                    </td>
                                    <td style="vertical-align: middle;">{{$banner->descricao}}</td>
                                    <td style="vertical-align: middle;">{{$banner->prioridade}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
    
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script src="{{asset('admin/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $('#datatable').DataTable( {
            language: datatable_ptbr, 
            pageLength: -1,
            lengthChange: true,
            order: [[2, "asc"]]
        } );
    } );    
</script> 
@endsection