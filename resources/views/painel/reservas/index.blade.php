@extends('painel.template.main')

@section('styles')
    <!-- DataTables -->
    <link href="{{ asset('admin/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('admin/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
@endsection

@section('titulo')
<a href="{{route('painel.index')}}">Inicio</a> / <a href="{{route('painel.fazendas')}}">Fazendas</a> / <a href="{{route('painel.fazenda.editar', ['fazenda' => $fazenda])}}">{{$fazenda->nome_fazenda}}</a> / <a href="{{route('painel.fazenda.reservas', ['fazenda' => $fazenda])}}">Reservas</a>
@endsection

@section('conteudo')

    <div class="row my-3">
        <div class="col-12">
            <a name="" id="" class="btn btn-primary cpointer" data-bs-toggle="modal" data-bs-target="#modalCadastraReserva"
                role="button">Nova Reserva</a>
        </div>
    </div>
    <div class="row justify-content-start">
        <div class="col-12 col-lg-10">
            <div class="card">
                <div class="card-body">

                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Início</th>
                                <th>Fim</th>
                                <th>Ativo</th>
                                <th>Aberta</th>
                                <th>Preço</th>
                                <th>Compras</th>
                                <th>Lotes</th>
                            </tr>
                        </thead>


                        <tbody>
                            @foreach ($reservas as $reserva)
                                <tr>
                                    <td class="text-center">
                                        <div class="dropdown mt-4 mt-sm-0">
                                            <a href="#" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="fas fa-bars" aria-hidden="true"></i>
                                            </a>
                                            <div class="dropdown-menu" style="margin: 0px;">
                                                <a name="" href="{{route('fazenda.lotes', ['fazenda' => $reserva->fazenda->slug])}}" id="" class="dropdown-item py-2"
                                                    target="_blank" role="button">Página da Reserva</a>
                                                <a name="" id="" class="dropdown-item py-2" data-bs-toggle="modal"
                                                    data-bs-target="#modalEditaReserva{{ $reserva->id }}"
                                                    role="button">Editar Reserva</a>
                                                <a name="" id=""
                                                    href="{{ route('painel.fazenda.editar', ['fazenda' => $reserva->fazenda]) }}"
                                                    class="dropdown-item py-2" role="button">Editar Fazenda</a>
                                                <a name="" id=""
                                                    href="{{ route('painel.fazenda.reservas.abertura', ['reserva' => $reserva]) }}"
                                                    class="dropdown-item py-2" role="button">@if ($reserva->aberto) Fechar @else Abrir @endif
                                                    Reserva</a>
                                                <a name="" id=""
                                                    href="{{ route('painel.fazenda.reservas.preco', ['reserva' => $reserva]) }}"
                                                    class="dropdown-item py-2" role="button">@if ($reserva->preco_disponivel) Esconder @else Liberar @endif
                                                    Preços</a>
                                                <a name="" id=""
                                                    href="{{ route('painel.fazenda.reservas.compras', ['reserva' => $reserva]) }}"
                                                    class="dropdown-item py-2" role="button">@if ($reserva->compra_disponivel) Bloquear @else Liberar @endif
                                                    Compras</a>
                                                <a name="" id=""
                                                    href="{{ route('painel.fazenda.reserva.lotes', ['reserva' => $reserva]) }}"
                                                    class="dropdown-item py-2" role="button">Lotes</a>
                                                <a name="" id=""
                                                    href="{{ route('painel.fazenda.reservas.relatorio', ['reserva' => $reserva]) }}"
                                                    class="dropdown-item py-2" role="button">Relatório</a>
                                            </div>
                                        </div>
                                    </td>
                                    <td style="vertical-align: middle; text-align:center;">
                                        {{ date('d/m/Y H:i:s', strtotime($reserva->inicio)) }}</td>
                                    <td style="vertical-align: middle; text-align:center;">
                                        {{ date('d/m/Y H:i:s', strtotime($reserva->fim)) }}</td>
                                    <td style="vertical-align: middle; text-align:center;">
                                        @if ($reserva->ativo)
                                            Sim
                                        @else
                                            Não
                                        @endif
                                    </td>
                                    <td style="vertical-align: middle; text-align:center;">
                                        @if ($reserva->aberto)
                                            Sim
                                        @else
                                            Não
                                        @endif
                                    </td>
                                    <td style="vertical-align: middle; text-align:center;">
                                        @if ($reserva->preco_disponivel)
                                            Liberado
                                        @else
                                            Oculto
                                        @endif
                                    </td>
                                    <td style="vertical-align: middle; text-align:center;">
                                        @if ($reserva->compra_disponivel)
                                            Liberadas
                                        @else
                                            Bloqueadas
                                        @endif
                                    </td>
                                    <td style="vertical-align: middle; text-align:center;">{{ $reserva->lotes->count() }}
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
    @foreach ($reservas as $reserva)
        <div class="modal fade" id="modalEditaReserva{{ $reserva->id }}" tabindex="-1" role="dialog"
            aria-labelledby="modalEditaReserva{{ $reserva->id }}Label" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEditaReserva{{ $reserva->id }}Label">Editando reserva</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('painel.fazenda.reserva.editar', ['reserva' => $reserva]) }}"
                            method="post">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="inicio">Início</label>
                                <input type="date" class="form-control" name="inicio"
                                    value="{{ date('Y-m-d', strtotime($reserva->inicio)) }}" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="fim">Fim</label>
                                <input type="date" class="form-control" name="fim"
                                    value="{{ date('Y-m-d', strtotime($reserva->fim)) }}" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="desconto_live_valor">Desconto de Live (%)</label>
                                <input type="number" class="form-control" name="desconto_live_valor" min="0" step="0.01"
                                    value="{{ $reserva->desconto_live_valor }}" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="multi_fazendas">Reserva Multi Fazendas ?</label>
                                <select class="form-control" name="multi_fazendas">
                                    <option value="0" @if (!$reserva->multi_fazendas) selected @endif>Não</option>
                                    <option value="1" @if ($reserva->multi_fazendas) selected @endif>Sim</option>
                                </select>
                            </div>
                            <div class="row">
                                <div class="form-group col-12 col-lg-6 mb-3">
                                    <label for="ativo">Ativo</label>
                                    <select class="form-control" name="ativo">
                                        <option value="0" @if (!$reserva->ativo) selected @endif>Não</option>
                                        <option value="1" @if ($reserva->ativo) selected @endif>Sim</option>
                                    </select>
                                </div>
                                <div class="form-group col-12 col-lg-6 mb-3">
                                    <label for="mostrar_datas">Mostrar Data</label>
                                    <select class="form-control" name="mostrar_datas">
                                        <option value="0" @if (!$reserva->mostrar_datas) selected @endif>Não</option>
                                        <option value="1" @if ($reserva->mostrar_datas) selected @endif>Sim</option>
                                    </select>
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
    @endforeach

    <div class="modal fade" id="modalCadastraReserva" tabindex="-1" role="dialog"
        aria-labelledby="modalCadastraReservaLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCadastraReservaLabel">Cadastrar nova Reserva</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('painel.fazenda.reserva.cadastrar', ['fazenda' => $fazenda]) }}"
                        method="post">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="inicio">Início</label>
                            <input type="date" class="form-control" name="inicio" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="fim">Fim</label>
                            <input type="date" class="form-control" name="fim" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="desconto_live_valor">Desconto de Live (%)</label>
                            <input type="number" class="form-control" name="desconto_live_valor" min="0" step="0.01"
                                value="0" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="multi_fazendas">Reserva Multi Fazendas ?</label>
                            <select class="form-control" name="multi_fazendas">
                                <option value="0">Não</option>
                                <option value="1">Sim</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="ativo">Ativo</label>
                            <select class="form-control" name="ativo">
                                <option value="0">Não</option>
                                <option value="1">Sim</option>
                            </select>
                        </div>
                        <div class="form-group text-end">
                            <button type="submit" class="btn btn-primary mt-3">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <!-- Required datatable js -->
    <script src="{{ asset('admin/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable({
                language: datatable_ptbr
            });
        });
    </script>
@endsection
