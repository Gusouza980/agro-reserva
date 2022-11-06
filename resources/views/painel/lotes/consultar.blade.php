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
    <div class="my-3 row">
        <div class="col-12">
            <a href="{{ route('painel.fazenda.reserva.lote.cadastro', ['reserva' => $reserva]) }}" class="btn btn-primary"
                role="button">Novo Lote</a>
            <a data-bs-toggle="modal" data-bs-target="#modalImport" class="btn btn-primary"
                role="button">Importar Excel</a>
        </div>
    </div>
    @livewire('painel.lotes.datatable', ["reserva_id" => $reserva->id])
    <div class="modal fade" id="modalImport" tabindex="-1" role="dialog" aria-labelledby="modalReservarLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalReservarLabel">Reservar lote</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('painel.fazenda.reserva.lotes.importar') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="reserva_id" value="{{ $reserva->id }}">
                        <input type="hidden" name="fazenda_id" value="{{ $reserva->fazenda->id }}">
                        <div class="mb-3">
                            <label for="" class="form-label">Selecione a Planilha de Excel</label>
                            <input type="file" class="form-control" name="planilha" id="" placeholder="" aria-describedby="fileHelpId">
                        </div>
                        <div class="mb-3">
                            <div class="gap-2 d-grid">
                                <button type="submit" name="" id="" class="btn btn-primary">Importar</button>
                            </div>
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
