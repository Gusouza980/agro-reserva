@extends('painel.template.main')

@section('styles')
    <!-- DataTables -->
    <link href="{{ asset('admin/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('admin/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
@endsection

@section('titulo')
    <a href="{{route('painel.index')}}">Inicio</a> / @if($fazenda) <a href="{{route('painel.fazendas')}}">Fazendas</a> / <a href="{{route('painel.fazenda.editar', ['fazenda' => $fazenda])}}">{{$fazenda->nome_fazenda}}</a> / <a href="{{route('painel.fazenda.reservas', ['fazenda' => $fazenda])}}">Reservas</a> @else <a href="{{route('painel.reservas')}}">Reservas</a> @endif
@endsection

@section('conteudo')
    <div class="row">
        <div class="col-12 text-end">
            <a name="" id="" class="mb-3 btn btn-primary cpointer" onclick="Livewire.emit('carregaModalCadastroReservas')" role="button">Nova Reserva</a>
        </div>
    </div>

    @if($fazenda)
        @livewire('painel.reservas.datatable', ["fazenda" => $fazenda])
        @livewire('painel.reservas.modal-cadastro-reserva', ["fazenda" => $fazenda->id])
    @else
        @livewire('painel.reservas.datatable')
        @livewire('painel.reservas.modal-cadastro-reserva')
    @endif

@endsection

@section('scripts')
    
@endsection
