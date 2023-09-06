@extends('sistema.templates.main')

@section('breadcrumb')
    <li>
        <div class="flex items-center space-x-1.5">
            <span>Relatórios</span>
        </div>
    </li>
@endsection

@section('conteudo')
    <div class="grid justify-center grid-cols-1 px-6 py-6">
        <div class="flex items-center justify-between w-full">
            <h2 class="text-base font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100">
                Listagem de Relatórios
            </h2>
        </div>
        <div class="mt-3">
            @livewire('sistema.relatorios.pagina')
        </div>
    </div>
@endsection
