@extends('sistema.templates.main')

@section('breadcrumb')
    <li>
        <div class="flex items-center space-x-1.5">
            <span>Início</span>
        </div>
    </li>
@endsection

@section('conteudo')
    @dd($usuario)
    @if(isset($usuario->assessor))
        <livewire:sistema.dashboards.comercial></livewire:sistema.dashboards.comercial>
    @endif
@endsection