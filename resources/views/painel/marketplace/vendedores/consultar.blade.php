@extends('painel.template.main')

@section('styles')
    <!-- DataTables -->
    <link href="{{ asset('admin/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('admin/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />

@endsection

@section('titulo')
    <a href="{{route('painel.index')}}">Inicio</a> / Marketplace / <a href="{{route('painel.marketplace.vendedores')}}">Vendedores</a>
@endsection

@section('conteudo')
    <div class="row my-3">
        <div class="col-12">
            <a href="{{ route('painel.marketplace.vendedores.cadastrar') }}" class="btn btn-primary" role="button">Novo Vendedor</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body" style="overflow-x: scroll;">

                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead class="text-center">
                            <tr>
                                <th></th>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Telefone</th>
                                <th>Segmento</th>
                                <th>Ativo</th>
                            </tr>
                        </thead>


                        <tbody class="text-center">
                            @foreach ($vendedores as $vendedor)
                                <tr>
                                    <td>
                                        <div class="dropdown mt-4 mt-sm-0">
                                            <a href="#" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="fas fa-bars" aria-hidden="true"></i>
                                            </a>
                                            <div class="dropdown-menu" style="margin: 0px;">
                                                <a name="" id="" class="dropdown-item py-2"
                                                    href="{{ route('painel.marketplace.vendedores.editar', ['vendedor' => $vendedor]) }}"
                                                    role="button">Editar</a>
                                                <a name="" id="" class="dropdown-item py-2"
                                                    href="{{ route('painel.marketplace.vendedores.produtos', ['vendedor' => $vendedor]) }}"
                                                    role="button">Produtos</a>
                                            </div>
                                        </div>
                                    </td>
                                    <td style="vertical-align: middle;">{{ $vendedor->nome }}</td>
                                    <td style="vertical-align: middle;">{{ $vendedor->email }}</td>
                                    <td style="vertical-align: middle;">{{ $vendedor->telefone }}</td>
                                    <td style="vertical-align: middle;">{{ config("vendedores.segmentos")[$vendedor->segmento] }}</td>
                                    <td style="vertical-align: middle;">
                                        {{ $vendedor->ativo ? 'Sim' : 'Não' }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection

@section('scripts')
    <script src="{{ asset('admin/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable({
                language: datatable_ptbr,
                pageLength: -1,
                lengthChange: true,
                lengthMenu: [
                    [10, 50, 100, 1000, -1],
                    [10, 50, 100, 1000, "Todos"]
                ],
                order: [
                    [1, "asc"]
                ],
            });
        });
    </script>
@endsection
