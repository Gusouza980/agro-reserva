@extends('painel.template.main')

@section('styles')
    <!-- DataTables -->
    <link href="{{ asset('admin/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('admin/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />

@endsection

@section('titulo')
    <a href="{{route('painel.index')}}">Inicio</a> / <a href="{{route('painel.fazendas')}}">Fazendas</a> / <a href="{{route('painel.fazenda.editar', ['fazenda' => $reserva->fazenda])}}">{{$reserva->fazenda->nome_fazenda}}</a> / <a href="{{route('painel.fazenda.reservas', ['fazenda' => $reserva->fazenda])}}">Reservas</a> / <a href="{{route('painel.fazenda.reserva.lotes', ['reserva' => $reserva])}}">Lotes</a>
@endsection

@section('conteudo')
    <div class="row my-3">
        <div class="col-12">
            <a href="{{ route('painel.fazenda.reserva.lote.cadastro', ['reserva' => $reserva]) }}" class="btn btn-primary"
                role="button">Novo Lote</a>
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
                                <th>Nº</th>
                                <th>Nome</th>
                                <th>Registro</th>
                                <th>Preço</th>
                                <th>Visitas</th>
                                <th>Reservado</th>
                                <th>Exibição</th>
                                <th>Ativo</th>
                                <th>Prioridade</th>
                                {{-- <th></th> --}}
                            </tr>
                        </thead>


                        <tbody class="text-center">
                            @foreach ($reserva->lotes as $lote)
                                <tr>
                                    <td>
                                        <div class="dropdown mt-4 mt-sm-0">
                                            <a href="#" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="fas fa-bars" aria-hidden="true"></i>
                                            </a>
                                            <div class="dropdown-menu" style="margin: 0px;">
                                                <a name="" id="" class="dropdown-item py-2"
                                                    href="{{ route('painel.fazenda.reserva.lote.editar', ['lote' => $lote]) }}"
                                                    role="button">Editar</a>
                                                @if (!$lote->reservado)
                                                    <a class="dropdown-item py-2"
                                                        href="{{ route('painel.fazenda.reserva.lote.reservar', ['lote' => $lote]) }}">Reservar</a>
                                                @endif
                                                <a class="dropdown-item py-2"
                                                    href="{{ route('painel.fazenda.reserva.lote.ativo', ['lote' => $lote]) }}">@if ($lote->ativo) Desativar @else Ativar @endif</a>
                                                <a class="dropdown-item py-2"
                                                    href="{{ route('painel.fazenda.reserva.lote.preco', ['lote' => $lote]) }}">@if ($lote->liberar_preco) Preço: Usar padrão @else Preço: Liberar @endif</a>
                                                <a class="dropdown-item py-2"
                                                    href="{{ route('painel.fazenda.reserva.lote.comprar', ['lote' => $lote]) }}">@if ($lote->liberar_compra) Botão de Compra: Usar padrão @else Botão de Compra: Liberar @endif</a>

                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $lote->numero . $lote->letra }}</td>
                                    <td>{{ $lote->nome }}</td>
                                    <td>{{ $lote->registro }}</td>
                                    <td>R${{ number_format($lote->preco, 2, ',', '.') }}</td>
                                    <td>{{ $lote->visitas }}</td>
                                    <td>
                                        @if ($lote->reservado)
                                            <i class="fas fa-handshake cpointer icone-reservado ativo"  lid="{{$lote->id}}"></i>
                                        @else
                                            <i class="fas fa-handshake cpointer icone-reservado"  lid="{{$lote->id}}"></i>
                                        @endif
                                    </td>
                                    <td>
                                        @if (!$lote->liberar_preco && !$lote->liberar_compra)
                                            Padrão da Reserva
                                        @elseif($lote->liberar_preco && !$lote->liberar_compra)
                                            <b>Preço:</b> Liberado / <b>Compra:</b> Padrão
                                        @elseif(!$lote->liberar_preco && $lote->liberar_compra)
                                            <b>Preço:</b> Padrão / <b>Compra:</b> Liberada
                                        @elseif($lote->liberar_preco && $lote->liberar_compra)
                                            <b>Preço:</b> Liberado / <b>Compra:</b> Liberada
                                        @endif
                                    </td>
                                    <td>
                                        @if ($lote->ativo)
                                            <i class="fa fa-star cpointer icone-ativo ativo" lid="{{$lote->id}}" aria-hidden="true"></i>
                                        @else
                                            <i class="fa fa-star cpointer icone-ativo" lid="{{$lote->id}}" aria-hidden="true"></i>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($lote->prioridade)
                                            <i class="fa fa-check cpointer icone-prioridade ativo" lid="{{$lote->id}}" aria-hidden="true"></i>
                                        @else
                                            <i class="fa fa-check cpointer icone-prioridade" lid="{{$lote->id}}" aria-hidden="true"></i>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
    <div class="modal fade" id="modalReservar" tabindex="-1" role="dialog" aria-labelledby="modalReservarLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalReservarLabel">Reservar lote</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('painel.raca.cadastrar') }}" method="post">
                        @csrf
                        <input type="hidden" name="lote_id" value="">
                        <div class="form-floating mb-3">
                            <select class="form-select" name="cliente">
                                @foreach (\App\Models\Cliente::orderBy('nome_dono', 'DESC')->get() as $cliente)
                                    <option value="{{ $cliente->id }}">{{ $cliente->nome_dono }}</option>
                                @endforeach
                            </select>
                            <label for="select-situacao">Cliente</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" name="assessor">
                                <option value="0">Nenhum</option>
                                @foreach (\App\Models\Assessor::orderBy('nome', 'DESC')->get() as $assessor)
                                    <option value="{{ $assessor->id }}">{{ $assessor->nome }}</option>
                                @endforeach
                            </select>
                            <label for="select-situacao">Assessor</label>
                        </div>
                        <div class="form-group">
                            <label for="">Parcelas</label>
                            <input type="number" class="form-control" name="parcelas" min="0" step="1">
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

            $(".icone-ativo").click(function(){
                var lote = $(this).attr("lid");
                var elemento = $(this);
                var _token = $('meta[name="_token"]').attr('content');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': _token
                    }
                });
                $.ajax({
                    url: '/painel/fazenda/reserva/lote/ativo/' + lote,
                    type: 'GET',
                    dataType: 'JSON',
                    success: function(data) {
                        if(data){
                            elemento.addClass("ativo");
                            toastr.success("Lote ativado!", 'Sucesso')    
                        }else{
                            elemento.removeClass("ativo");
                            toastr.success("Lote desativado!", 'Sucesso')
                        }
                    },
                    error: function(){
                        toastr.error('Erro na operação. Atualize a página e tente novamente.', 'Erro')
                    }
                });
            });

            $(".icone-prioridade").click(function(){
                var lote = $(this).attr("lid");
                var elemento = $(this);
                var _token = $('meta[name="_token"]').attr('content');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': _token
                    }
                });
                $.ajax({
                    url: '/painel/fazenda/reserva/lote/prioridade/' + lote,
                    type: 'GET',
                    dataType: 'JSON',
                    success: function(data) {
                        if(data){
                            elemento.addClass("ativo");
                            toastr.success("Lote priorizado!", 'Sucesso')    
                        }else{
                            elemento.removeClass("ativo");
                            toastr.success("Lote removido da lista de prioridade!", 'Sucesso')
                        }
                    },
                    error: function(){
                        toastr.error('Erro na operação. Atualize a página e tente novamente.', 'Erro')
                    }
                });
            });

            $(".icone-reservado").click(function(){
                var lote = $(this).attr("lid");
                var elemento = $(this);
                var _token = $('meta[name="_token"]').attr('content');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': _token
                    }
                });
                $.ajax({
                    url: '/painel/fazenda/reserva/lote/reservar/' + lote,
                    type: 'GET',
                    dataType: 'JSON',
                    success: function(data) {
                        if(data){
                            elemento.addClass("ativo");
                            toastr.success("Lote reservado!", 'Sucesso')    
                        }else{
                            elemento.removeClass("ativo");
                            toastr.success("Lote disponível!", 'Sucesso')
                        }
                    },
                    error: function(){
                        toastr.error('Erro na operação. Atualize a página e tente novamente.', 'Erro')
                    }
                });
            });
        });
    </script>
@endsection
