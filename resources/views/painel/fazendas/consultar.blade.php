@extends('painel.template.main')

@section('styles')
<!-- DataTables -->
<link href="{{asset('admin/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

@endsection

@section('titulo')
    <a href="{{route('painel.index')}}">Inicio</a> / <a href="{{route('painel.fazendas')}}">Fazendas</a>
@endsection

@section('conteudo')
<div class="row my-3">
    <div class="col-12">
        <a href="{{route('painel.fazenda.cadastro')}}" class="btn btn-primary" role="button">Nova Fazenda</a>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                    <thead class="text-center">
                        <tr>
                            <th></th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Telefone</th>
                            <th>Reserva</th>
                        </tr>
                    </thead>


                    <tbody class="text-center">
                        @foreach($fazendas as $fazenda)
                            <tr>
                                <td>
                                    <div class="dropdown mt-4 mt-sm-0">
                                        <a href="#" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="fas fa-bars" aria-hidden="true"></i>
                                        </a>
                                        <div class="dropdown-menu" style="margin: 0px;">
                                            <a name="" id="" class="dropdown-item py-2"
                                                href="{{route('painel.fazenda.editar', ['fazenda' => $fazenda])}}"
                                                role="button">Editar</a>
                                            <a name="" id="" class="dropdown-item py-2"
                                                href="{{route('painel.fazenda.reservas', ['fazenda' => $fazenda])}}"
                                                role="button">Reservas</a>
                                            <a name="" id="" class="dropdown-item py-2" onclick="Livewire.emit('iniciaModal', {{ $fazenda->id }})"
                                                role="button">Usuários</a>
                                        </div>
                                    </div>
                                </td>
                                <td>{{$fazenda->nome_fazenda}}</td>
                                <td>{{$fazenda->email}}</td>
                                <td>{{$fazenda->telefone}}</td>
                                <td>
                                    {{$fazenda->reservas->where("ativo", true)->count()}} reservas ativas
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->


<!-- Modal -->
<div class="modal fade" id="modalClientes" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Usuários da Fazenda</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @livewire('fazenda.clientes.modal')
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
            lengthMenu: [[10,50,100,1000, -1], [10,50,100,1000, "Todos"]],
            order: [[1, "asc"]]
        } );
    } );    
</script> 
@endsection