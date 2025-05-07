@extends('sistema.templates.main')

@section('breadcrumb')
    <li>
        <div class="flex items-center space-x-1.5">
            <span>Detalhes do Cliente</span>
        </div>
    </li>
@endsection

@section('conteudo')
    <div class="w-full px-5">
        <div class="mt-3 card py-5 px-5">
            @livewire('sistema.clientes.detalhes.pagina', ['cliente_id' => $cliente_id])
        </div>
    </div>
@endsection
