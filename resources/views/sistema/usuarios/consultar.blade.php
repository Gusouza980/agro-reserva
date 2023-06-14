@extends('sistema.templates.main')

@section('breadcrumb')
    <li>
        <div class="flex items-center space-x-1.5">
            <span>Usuários</span>
        </div>
    </li>
@endsection

@section('conteudo')
    <div class="grid justify-center grid-cols-1 px-6 py-6">
        <div class="flex items-center justify-between w-full">
            <h2 class="text-base font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100">
                Listagem de Usuários
            </h2>
            <div>
                <button
                    class="font-medium text-white btn bg-primary hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"
                    onclick="Livewire.emit('carregaModalCadastroUsuario')"
                >
                    Adicionar Usuário
                </button>
            </div>
        </div>
        <div class="mt-3 card">
            @livewire('sistema.usuarios.datatable')
        </div>
    </div>
    @livewire('sistema.usuarios.modal-cadastro')
    @livewire('sistema.usuarios.modal-exclusao')
@endsection
