@extends('sistema.templates.main')

@section('breadcrumb')
    <li>
        <div class="flex items-center space-x-1.5">
            <span>Lotes</span>
        </div>
    </li>
@endsection

@section('conteudo')
    <div class="grid justify-center grid-cols-1 px-6 py-6">
        <div class="flex items-center justify-between w-full">
            <h2 class="text-base font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100">
                Cadastro de Lote
            </h2>
        </div>
        <div class="mt-3">
            <form action="{{ route('sistema.lotes.editar', ['reserva' => $reserva, 'lote' => $lote]) }}" method="POST"
                class="w-full">
                @csrf
                <div class="w-full bg-white rounded-md mt-10 p-8">
                    <div class="w-full">
                        <h3 class="text-sm font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100">
                            Informações Principais
                        </h3>
                    </div>
                    <div class="w-full flex mt-8 gap-3">
                        <div class="w-fit">
                            <label class="block">
                                <span>Número *</span>
                                <span class="relative mt-1.5 flex">
                                    <input name="numero" class="input-base" placeholder="Número do Lote" type="text"
                                        required maxlength="5" value="{{ $lote->numero }}">
                                </span>
                            </label>
                        </div>
                        <div class="grow">
                            <label class="block">
                                <span>Nome *</span>
                                <span class="relative mt-1.5 flex">
                                    <input name="nome" class="input-base" placeholder="Nome do Lote" type="text"
                                        required maxlength="100" value="{{ $lote->nome }}">
                                </span>
                            </label>
                        </div>
                        <div class="w-fit">
                            <label class="block">
                                <span>Data de Nascimento</span>
                                <span class="relative mt-1.5 flex">
                                    <input name="nascimento" class="input-base" type="date"
                                        value="{{ $lote->nascimento }}">
                                </span>
                            </label>
                        </div>
                        <div class="w-fit">
                            <label class="block">
                                <span>RGD</span>
                                <span class="relative mt-1.5 flex">
                                    <input name="registro" class="input-base" placeholder="Nº do RGD" type="text"
                                        required maxlength="30" value="{{ $lote->registro }}">
                                </span>
                            </label>
                        </div>
                        <div class="w-fit">
                            <label class="block">
                                <span>RGN</span>
                                <span class="relative mt-1.5 flex">
                                    <input name="rgn" class="input-base" placeholder="Nº do RGN" type="text"
                                        maxlength="20" value="{{ $lote->rgn }}">
                                </span>
                            </label>
                        </div>
                        <div class="w-fit">
                            <label class="block">
                                <span>Sexo</span>
                                <span class="relative mt-1.5 flex">
                                    <select name="sexo" class="input-base" required>
                                        <option value="Macho" {{ $lote->sexo == 'Macho' ? 'selected' : '' }}>Macho</option>
                                        <option value="Fêmea" {{ $lote->sexo == 'Fêmea' ? 'selected' : '' }}>Fêmea</option>
                                    </select>
                                </span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="w-full bg-white rounded-md mt-6 p-8">
                    <div class="w-full">
                        <h3 class="text-sm font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100">
                            Características do Animal
                        </h3>
                    </div>
                    <div
                        class="w-full grid xl:grid-cols-8 lg:grid-cols-6 md:grid-cols-4 sm:grid-cols-3 grid-cols-1 mt-8 gap-3">
                        <div class="">
                            <label class="block">
                                <span>Raça</span>
                                <span class="relative mt-1.5 flex">
                                    <select name="raca_id" class="input-base" required>
                                        @foreach (\App\Models\Raca::orderBy('nome')->get() as $raca)
                                            <option value="{{ $raca->id }}"
                                                {{ $lote->raca_id == $raca->id ? 'selected' : '' }}>{{ $raca->nome }}
                                            </option>
                                        @endforeach
                                    </select>
                                </span>
                            </label>
                        </div>
                        <div class="">
                            <label class="block">
                                <span>GPTA</span>
                                <span class="relative mt-1.5 flex">
                                    <input name="gpta" class="input-base" placeholder="" type="text" maxlength="12"
                                        value="{{ $lote->gpta }}">
                                </span>
                            </label>
                        </div>
                        <div class="">
                            <label class="block">
                                <span>CCG</span>
                                <span class="relative mt-1.5 flex">
                                    <input name="ccg" class="input-base" placeholder="" type="text" maxlength="20"
                                        value="{{ $lote->ccg }}">
                                </span>
                            </label>
                        </div>
                        <div class="">
                            <label class="block">
                                <span>BOTTON</span>
                                <span class="relative mt-1.5 flex">
                                    <input name="botton" class="input-base" placeholder="" type="text" maxlength="10"
                                        value="{{ $lote->botton }}">
                                </span>
                            </label>
                        </div>
                        <div class="">
                            <label class="block">
                                <span>Lactação</span>
                                <span class="relative mt-1.5 flex">
                                    <input name="lactacao_total" class="input-base" placeholder="" type="text"
                                        maxlength="60" value="{{ $lote->lactacao_total }}">
                                </span>
                            </label>
                        </div>
                        <div class="">
                            <label class="block">
                                <span>Peso</span>
                                <span class="relative mt-1.5 flex">
                                    <input name="peso" class="input-base" placeholder="" type="text"
                                        maxlength="10" value="{{ $lote->peso }}">
                                </span>
                            </label>
                        </div>
                        <div class="">
                            <label class="block">
                                <span>iABCZg</span>
                                <span class="relative mt-1.5 flex">
                                    <input name="iabczg" class="input-base" placeholder="" type="text"
                                        maxlength="10" value="{{ $lote->iabczg }}">
                                </span>
                            </label>
                        </div>
                        <div class="">
                            <label class="block">
                                <span>CE</span>
                                <span class="relative mt-1.5 flex">
                                    <input name="ce" class="input-base" placeholder="" type="text"
                                        maxlength="10" value="{{ $lote->ce }}">
                                </span>
                            </label>
                        </div>
                        <div class="">
                            <label class="block">
                                <span>DECA</span>
                                <span class="relative mt-1.5 flex">
                                    <input name="deca" class="input-base" placeholder="" type="text"
                                        maxlength="10" value="{{ $lote->deca }}">
                                </span>
                            </label>
                        </div>
                        <div class="">
                            <label class="block">
                                <span>Ocitocina</span>
                                <span class="relative mt-1.5 flex">
                                    <input name="ocitocina" class="input-base" placeholder="" type="text"
                                        maxlength="10" value="{{ $lote->ocitocina }}">
                                </span>
                            </label>
                        </div>
                        <div class="">
                            <label class="block">
                                <span>Está com Prenhez ?</span>
                                <span class="relative mt-1.5 flex">
                                    <select name="prenhez" class="input-base">
                                        <option value="0" {{ $lote->prenhez == '0' ? 'selected' : '' }}>Não</option>
                                        <option value="1" {{ $lote->prenhez == '1' ? 'selected' : '' }}>Sim</option>
                                    </select>
                                </span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="w-full bg-white rounded-md mt-6 p-8">
                    <div class="w-full">
                        <h3 class="text-sm font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100">
                            Árvore Genealógica
                        </h3>
                    </div>
                    <div
                        class="w-full grid xl:grid-cols-8 lg:grid-cols-6 md:grid-cols-4 sm:grid-cols-3 grid-cols-1 mt-8 gap-3">
                        <div class="">
                            <label class="block">
                                <span>Nome do Pai</span>
                                <span class="relative mt-1.5 flex">
                                    <input name="pai" class="input-base" placeholder="" type="text"
                                        maxlength="50" value="{{ $lote->pai }}">
                                </span>
                            </label>
                        </div>
                        <div class="">
                            <label class="block">
                                <span>RGD do Pai</span>
                                <span class="relative mt-1.5 flex">
                                    <input name="rgd_pai" class="input-base" placeholder="" type="text"
                                        maxlength="20" value="{{ $lote->rgd_pai }}">
                                </span>
                            </label>
                        </div>
                        <div class="">
                            <label class="block">
                                <span>Nome do Avô Paterno</span>
                                <span class="relative mt-1.5 flex">
                                    <input name="avo_paterno" class="input-base" placeholder="" type="text"
                                        maxlength="50" value="{{ $lote->avo_paterno }}">
                                </span>
                            </label>
                        </div>
                        <div class="">
                            <label class="block">
                                <span>RGD do Avô Paterno</span>
                                <span class="relative mt-1.5 flex">
                                    <input name="rgd_avo_paterno" class="input-base" placeholder="" type="text"
                                        maxlength="20" value="{{ $lote->rgd_avo_paterno }}">
                                </span>
                            </label>
                        </div>
                        <div class="">
                            <label class="block">
                                <span>Nome da Avó Paterna</span>
                                <span class="relative mt-1.5 flex">
                                    <input name="avo_paterna" class="input-base" placeholder="" type="text"
                                        maxlength="50" value="{{ $lote->avo_paterna }}">
                                </span>
                            </label>
                        </div>
                        <div class="">
                            <label class="block">
                                <span>RGD da Avó Paterna</span>
                                <span class="relative mt-1.5 flex">
                                    <input name="rgd_avo_paterna" class="input-base" placeholder="" type="text"
                                        maxlength="20" value="{{ $lote->rgd_avo_paterna }}">
                                </span>
                            </label>
                        </div>
                        <div class="">
                            <label class="block">
                                <span>Lactação da Avó Paterna</span>
                                <span class="relative mt-1.5 flex">
                                    <input name="lactacao_avo_paterna" class="input-base" placeholder="" type="text"
                                        maxlength="50" value="{{ $lote->lactacao_avo_paterna }}">
                                </span>
                            </label>
                        </div>

                        <div class="">
                            <label class="block">
                                <span>Nome da Mãe</span>
                                <span class="relative mt-1.5 flex">
                                    <input name="mae" class="input-base" placeholder="" type="text"
                                        maxlength="50" value="{{ $lote->mae }}">
                                </span>
                            </label>
                        </div>
                        <div class="">
                            <label class="block">
                                <span>RGD da Mãe</span>
                                <span class="relative mt-1.5 flex">
                                    <input name="rgd_mae" class="input-base" placeholder="" type="text"
                                        maxlength="20" value="{{ $lote->rgd_mae }}">
                                </span>
                            </label>
                        </div>
                        <div class="">
                            <label class="block">
                                <span>Lactação da Mãe</span>
                                <span class="relative mt-1.5 flex">
                                    <input name="lactacao_mae" class="input-base" placeholder="" type="text"
                                        maxlength="50" value="{{ $lote->lactacao_mae }}">
                                </span>
                            </label>
                        </div>
                        <div class="">
                            <label class="block">
                                <span>Nome do Avô Materno</span>
                                <span class="relative mt-1.5 flex">
                                    <input name="avo_materno" class="input-base" placeholder="" type="text"
                                        maxlength="50" value="{{ $lote->avo_materno }}">
                                </span>
                            </label>
                        </div>
                        <div class="">
                            <label class="block">
                                <span>RGD do Avô Materno</span>
                                <span class="relative mt-1.5 flex">
                                    <input name="rgd_avo_materno" class="input-base" placeholder="" type="text"
                                        maxlength="20" value="{{ $lote->rgd_avo_materno }}">
                                </span>
                            </label>
                        </div>
                        <div class="">
                            <label class="block">
                                <span>Nome da Avó Materna</span>
                                <span class="relative mt-1.5 flex">
                                    <input name="avo_materna" class="input-base" placeholder="" type="text"
                                        maxlength="50" value="{{ $lote->avo_materna }}">
                                </span>
                            </label>
                        </div>
                        <div class="">
                            <label class="block">
                                <span>RGD da Avó Materna</span>
                                <span class="relative mt-1.5 flex">
                                    <input name="rgd_avo_materna" class="input-base" placeholder="" type="text"
                                        maxlength="20" value="{{ $lote->rgd_avo_materna }}">
                                </span>
                            </label>
                        </div>
                        <div class="">
                            <label class="block">
                                <span>Lactação da Avó Materna</span>
                                <span class="relative mt-1.5 flex">
                                    <input name="lactacao_avo_materna" class="input-base" placeholder="" type="text"
                                        maxlength="50" value="{{ $lote->lactacao_avo_materna }}">
                                </span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="w-full bg-white rounded-md mt-6 p-8">
                    <div class="w-full">
                        <h3 class="text-sm font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100">
                            Observações
                        </h3>
                    </div>
                    <div class="w-full mt-8">
                        <div class="w-full">
                            <label class="block">
                                <span>Coloque aqui as observações e comentários do animal</span>
                                <span class="relative mt-1.5 flex">
                                    <textarea name="observacoes" class="input-base" maxlength="600" rows="4">{{ $lote->observacoes }}</textarea>
                                </span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="w-full mt-8">
                    <button
                        class="rounded-md bg-orange-500 hover:bg-orange-800 text-white text-medium text-lg px-4 py-2 transition duration-200 w-full">
                        <i class="fa-solid fa-floppy-disk fa-lg mr-2"></i> Salvar
                    </button>
                </div>
            </form>
        </div>
    </div>
    </div>
@endsection
