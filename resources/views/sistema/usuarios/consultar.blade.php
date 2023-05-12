@extends('painel.templates.main')

@section('breadcrumb')
    <li>
        <div class="flex items-center space-x-1.5">
            <span>Usuários</span>
        </div>
    </li>
@endsection

@section('conteudo')
    <div class="grid grid-cols-1 px-6 justify-center py-6">
        <div class="w-full flex justify-between items-center">
            <h2 class="text-base font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100">
                Listagem de Usuários
            </h2>
            <div>
                <button
                    class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"
                    onclick="Livewire.emit('carregaModalCadastroUsuario')"
                >
                    Adicionar Usuário
                </button>
            </div>
        </div>
        <div class="card mt-3">
            @livewire('painel.usuarios.consultar.datatable')
        </div>
    </div>
    @livewire('painel.usuarios.consultar.modal-cadastro')
    @livewire('painel.usuarios.consultar.modal-exclusao')
@endsection
