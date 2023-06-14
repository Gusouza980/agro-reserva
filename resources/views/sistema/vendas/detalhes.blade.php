@extends('sistema.templates.main')

@section('breadcrumb')
    <li>
        <div class="flex items-center space-x-1.5">
            <a href="{{ route('sistema.vendas.consultar') }}">Vendas</a>
            <svg x-ignore xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </div>
    </li>
    <li>
        <div class="flex items-center space-x-1.5">
            <span>Detalhes de Venda</span>
        </div>
    </li>
@endsection

@section('conteudo')
    <div class="grid justify-center grid-cols-1 px-6 py-6">
        <div class="flex items-center justify-between w-full">
            <h2 class="text-base font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100">
                Venda #{{ $venda->codigo }}
            </h2>
            <div>
                <a
                    class="font-medium text-white btn bg-primary hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"
                    href="{{route('painel.vendas.comprovante', ['venda' => $venda])}}"
                >
                    Comprovante
                </a>
            </div>
        </div>
        @livewire('sistema.vendas.detalhes', ['venda' => $venda])
        {{-- <div class="mt-3 card">
            @livewire('sistema.vendas.datatable')
        </div> --}}
    </div>
    {{-- @livewire('sistema.vendas.modal-cadastro-venda') --}}
@endsection
