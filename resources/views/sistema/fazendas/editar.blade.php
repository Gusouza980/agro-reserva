@extends('sistema.templates.main')

@section('breadcrumb')
    <li>
        <div class="flex items-center space-x-1.5">
            <span>Fazendas</span>
        </div>
    </li>
@endsection

@section('conteudo')
    <div class="grid justify-center grid-cols-1 px-6 py-6">
        <div class="flex items-center justify-between w-full">
            <h2 class="text-base font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100">
                Cadastro de Fazenda
            </h2>
        </div>
        <div class="mt-3 card p-5">
            <form action="{{ route('sistema.fazendas.salvar') }}" method="POST" enctype="multipart/form-data" class="w-full flex flex-col gap-4">
                @csrf
                <input type="hidden" name="fazenda_id" value="{{ $fazenda->id }}">
                <div class="w-full flex items-center justify-start gap-4">
                    <div class="grow">
                        <div class="w-full">
                            <label class="block">
                                <span>Nome da Fazenda *</span>
                                <span class="relative mt-1.5 flex">
                                <input name="nome_fazenda" value="{{ $fazenda->nome_fazenda }}" class="w-full px-3 py-2 bg-transparent border rounded-lg form-input peer border-slate-300 placeholder:text-slate-400/70 hover:border-slate-400" type="text" maxlength="200" required>
                            </span>
                            </label>
                        </div>
                    </div>
                    <div class="grow">
                        <div class="w-full">
                            <label class="block">
                                <span>Nome do Dono *</span>
                                <span class="relative mt-1.5 flex">
                                <input name="nome_dono" value="{{ $fazenda->nome_dono }}" class="w-full px-3 py-2 bg-transparent border rounded-lg form-input peer border-slate-300 placeholder:text-slate-400/70 hover:border-slate-400" type="text" maxlength="200" required>
                            </span>
                            </label>
                        </div>
                    </div>
                    <div class="grow">
                        <div class="w-full">
                            <label class="block">
                                <span>CNPJ *</span>
                                <span class="relative mt-1.5 flex">
                                <input name="cnpj" value="{{ $fazenda->cnpj }}" class="w-full px-3 py-2 bg-transparent border rounded-lg form-input peer border-slate-300 placeholder:text-slate-400/70 hover:border-slate-400" type="text" maxlength="50" required>
                            </span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="w-full grid xl:grid-cols-6 lg:grid-cols-5 md:grid-cols-4 sm:grid-cols-2 grid-cols-1 gap-4">
                    <div class="">
                        <label class="block">
                            <span>Telefone</span>
                            <span class="relative mt-1.5 flex">
                                <input name="telefone" value="{{ $fazenda->telefone }}" class="w-full px-3 py-2 bg-transparent border rounded-lg form-input peer border-slate-300 placeholder:text-slate-400/70 hover:border-slate-400" type="text" maxlength="50">
                            </span>
                        </label>
                    </div>
                    <div class="">
                        <label class="block">
                            <span>Whatsapp</span>
                            <span class="relative mt-1.5 flex">
                                <input name="whatsapp" value="{{ $fazenda->whatsapp }}" class="w-full px-3 py-2 bg-transparent border rounded-lg form-input peer border-slate-300 placeholder:text-slate-400/70 hover:border-slate-400" type="text" maxlength="50" required>
                            </span>
                        </label>
                    </div>
                    <div class="">
                        <label class="block">
                            <span>E-mail</span>
                            <span class="relative mt-1.5 flex">
                                <input name="email" class="w-full px-3 py-2 bg-transparent border rounded-lg form-input peer border-slate-300 placeholder:text-slate-400/70 hover:border-slate-400" type="email" maxlength="100" value="{{ $fazenda->email }}" required>
                            </span>
                        </label>
                    </div>
                    <div class="md:col-span-3">
                        <label class="block">
                            <span>Endereço</span>
                            <span class="relative mt-1.5 flex">
                                <input name="endereco" value="{{ $fazenda->endereco }}" class="w-full px-3 py-2 bg-transparent border rounded-lg form-input peer border-slate-300 placeholder:text-slate-400/70 hover:border-slate-400" type="text" maxlength="255">
                            </span>
                        </label>
                    </div>
                    <div class="col-span-full">
                        <label class="block">
                            <span>Iframe google</span>
                            <span class="relative mt-1.5 flex">
                                <input name="iframe_google" value="{{ $fazenda->iframe_google }}" class="w-full px-3 py-2 bg-transparent border rounded-lg form-input peer border-slate-300 placeholder:text-slate-400/70 hover:border-slate-400" type="text" maxlength="500">
                            </span>
                        </label>
                    </div>
                </div>
                <div class="w-full">
                    <button type="submit"
                            class="w-full font-medium text-white bg-green-600 btn hover:bg-green-800"
                    >
                        Salvar
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
