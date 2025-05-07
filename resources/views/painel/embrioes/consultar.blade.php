@extends('painel.template.main')

@section('styles')
    <!-- DataTables -->
    <link href="{{ asset('admin/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('admin/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />

@endsection

@section('titulo')
    <a href="{{route('painel.index')}}">Inicio</a> / <a href="{{route('painel.fazendas')}}">Fazendas</a> / <a href="{{route('painel.fazenda.editar', ['fazenda' => $reserva->fazenda])}}">{{$reserva->fazenda->nome_fazenda}}</a> / <a href="{{route('painel.fazenda.reservas', ['fazenda' => $reserva->fazenda])}}">Reservas</a> / <a href="{{route('painel.fazenda.reserva.embrioes', ['reserva' => $reserva])}}">Embriões</a>
@endsection

@section('conteudo')
    <div class="my-3 row">
        <div class="col-12">
            <a href="{{ route('painel.fazenda.reserva.embriao.cadastro', ['reserva' => $reserva]) }}" class="btn btn-primary"
                role="button">Novo Embrião</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body" style="overflow-x: scroll;">

                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                        <thead class="text-center">
                            <tr>
                                <th></th>
                                <th>Nº</th>
                                <th>Nome do Pacote</th>
                                <th>Nome do Pai</th>
                                <th>Nome da Mãe</th>
                                <th>Info. de Lactação</th>
                                <th>Tipo</th>
                                <th>Visitas</th>
                            </tr>
                        </thead>


                        <tbody class="text-center">
                            @foreach ($reserva->embrioes as $embriao)
                                <tr>
                                    <td>
                                        <div class="mt-4 dropdown mt-sm-0">
                                            <a href="#" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="fas fa-bars" aria-hidden="true"></i>
                                            </a>
                                            <div class="dropdown-menu" style="margin: 0px;">
                                                <a name="" id="" class="py-2 dropdown-item"
                                                    href="{{ route('painel.fazenda.reserva.embriao.editar', ['embriao' => $embriao]) }}"
                                                    role="button">Editar</a>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $embriao->prefixo_numero . $embriao->numero . $embriao->sufixo_numero }}</td>
                                    <td>{{ $embriao->nome_pacote }}</td>
                                    <td>{{ $embriao->nome_pai }}</td>
                                    <td>{{ $embriao->nome_mae }}</td>
                                    <td>{{ $embriao->info_lactacao_mae }}</td>
                                    <td>{{ config("embrioes.tipos")[$embriao->tipo] }}</td>
                                    <td>{{ $embriao->visitas }}</td>
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

            $(".icone-preco").click(function(){
                var lote = $(this).attr("lid");
                var elemento = $(this);
                var _token = $('meta[name="_token"]').attr('content');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': _token
                    }
                });
                $.ajax({
                    url: '/painel/fazenda/reserva/lote/preco/' + lote,
                    type: 'GET',
                    dataType: 'JSON',
                    success: function(data) {
                        if(data){
                            elemento.addClass("ativo");
                            toastr.success("Preço liberado!", 'Sucesso')    
                        }else{
                            elemento.removeClass("ativo");
                            toastr.success("Preço escondido!", 'Sucesso')
                        }
                    },
                    error: function(){
                        toastr.error('Erro na operação. Atualize a página e tente novamente.', 'Erro')
                    }
                });
            });

            $(".icone-compra").click(function(){
                var lote = $(this).attr("lid");
                var elemento = $(this);
                var _token = $('meta[name="_token"]').attr('content');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': _token
                    }
                });
                $.ajax({
                    url: '/painel/fazenda/reserva/lote/comprar/' + lote,
                    type: 'GET',
                    dataType: 'JSON',
                    success: function(data) {
                        if(data){
                            elemento.addClass("ativo");
                            toastr.success("Compra liberado!", 'Sucesso')    
                        }else{
                            elemento.removeClass("ativo");
                            toastr.success("Compra escondido!", 'Sucesso')
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
