@extends('sistema.templates.main')

@section('breadcrumb')
    <li>
        <div class="flex items-center space-x-1.5">
            <span>Início</span>
        </div>
    </li>
@endsection

@section('conteudo')
    @if($usuario && $usuario->assessor)
        <livewire:sistema.dashboards.comercial></livewire:sistema.dashboards.comercial>
    @else
    @endif
@endsection