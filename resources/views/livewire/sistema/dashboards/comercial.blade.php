<div class="w-full px-5 py-5">
    <div class="w-full">
        <div class="w-full">
            <h2 class="text-lg font-medium">Dashboard Comercial - {{ $assessor['nome'] }}</h2>
        </div>
        <div class="flex justify-start w-full mt-5 overflow-x-scroll flex-nowrap md:overflow-x-hidden">
            @foreach ($menus as $key => $nome)
                <button wire:click="$set('menu', '{{ $key }}')"
                    class="flex-grow @if ($menu == $key) bg-orange-600 border text-white @else bg-gray-200 hover:bg-orange-600 hover:text-white border border-slate-300 text-gray-500 @endif px-5 py-3">{{ $nome }}</button>
            @endforeach
        </div>
        <div class="w-full">
            <div class="w-full px-2 py-8 rounded-none md:px-8 card">
                <div class="flex flex-col items-start w-full mb-4 md:items-end md:flex-row md:justify-between">
                    <label class="block">
                        <span>Quantidade de Dados</span>
                        <select wire:model="qtd"
                            class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent">
                            <option value="15" selected>15</option>
                            <option value="30">30</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                            <option value="1000">1000</option>
                        </select>
                    </label>
                    <small><b>Ordem das Etapas de Cadastro: </b>
                        {{ implode('->', config('etapas_cadastro')) }}</small>
                </div>
                @switch($menu)
                    @case(0)
                        <div class="w-full overflow-x-scroll">
                            <table class="w-full text-left is-hoverable" style="vertical-align: middle;">
                                <thead>
                                    <tr>
                                        <th
                                            class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                            Data</th>
                                        <th
                                            class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                            Cliente</th>
                                        <th
                                            class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                            Telefone</th>
                                        <th
                                            class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                            Lote</th>
                                        <th
                                            class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($this->getAtividadeClientes() as $visita)
                                        <tr class="border-transparent border-y border-b-slate-200 dark:border-b-navy-500">
                                            <td class="px-4 py-3 whitespace-nowrap sm:px-5">
                                                {{ date('d/m/Y H:i:s', strtotime($visita['created_at'])) }}</td>
                                            <td class="px-4 py-3 whitespace-nowrap sm:px-5">
                                                {{ $visita['cliente']['nome_dono'] }}<br>
                                                <small>{{ $visita['cliente']['cidade'] . '/' . $visita['cliente']['estado'] }}</small>
                                            </td>
                                            <td class="px-4 py-3 whitespace-nowrap sm:px-5">
                                                {{ $visita['cliente']['telefone'] }}<br>
                                            </td>
                                            <td class="px-4 py-3 whitespace-nowrap sm:px-5">
                                                {{ $visita['lote']['numero'] . ' - ' . $visita['lote']['nome'] }}<br>
                                                <small>{{ $visita['lote']['fazenda']['nome_fazenda'] }}</small>
                                            </td>
                                            <td class="px-4 py-3 whitespace-nowrap sm:px-5">
                                                <a target="_blank"
                                                    href="https://api.whatsapp.com/send?phone=55{{ \Util::limparString($visita['cliente']['telefone']) }}"><i
                                                        class="text-gray-400 fab fa-whatsapp-square fa-2x"></i></a>
                                                <a href="mailto:{{ $visita['cliente']['email'] }}"><i
                                                        class="ml-2 text-gray-400 fas fa-envelope fa-2x"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @break

                    @case(1)
                        <div class="w-full overflow-x-scroll">
                            <table class="w-full text-left is-hoverable" style="vertical-align: middle;">
                                <thead>
                                    <tr>
                                        <th
                                            class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                            Data</th>
                                        <th
                                            class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                            Cliente</th>
                                        <th
                                            class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                            Telefone</th>
                                        <th
                                            class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                            Etapa do Cadastro</th>
                                        <th
                                            class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                            Aprovado ?</th>
                                        <th
                                            class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($this->getUltimosClientesCadastrados() as $cliente)
                                        <tr class="border-transparent border-y border-b-slate-200 dark:border-b-navy-500">
                                            <td class="px-4 py-3 whitespace-nowrap sm:px-5">
                                                {{ date('d/m/Y H:i:s', strtotime($cliente['created_at'])) }}</td>
                                            <td class="px-4 py-3 whitespace-nowrap sm:px-5">
                                                {{ $cliente['nome_dono'] }}<br>
                                            </td>
                                            <td class="px-4 py-3 whitespace-nowrap sm:px-5">
                                                {{ $cliente['telefone'] }}<br>
                                            </td>
                                            <td class="px-4 py-3 whitespace-nowrap sm:px-5">
                                                {{ config('etapas_cadastro')[$cliente['etapa_cadastro']] }}<br>
                                            </td>
                                            <td class="px-4 py-3 whitespace-nowrap sm:px-5">
                                                {{ $cliente['aprovado'] ? 'Sim' : 'Não' }}<br>
                                            </td>
                                            <td class="px-4 py-3 whitespace-nowrap sm:px-5">
                                                <a target="_blank"
                                                    href="https://api.whatsapp.com/send?phone=55{{ \Util::limparString($cliente['telefone']) }}"><i
                                                        class="text-gray-400 fab fa-whatsapp-square fa-2x"></i></a>
                                                <a href="mailto:{{ $cliente['email'] }}"><i
                                                        class="ml-2 text-gray-400 fas fa-envelope fa-2x"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @break

                    @case(2)
                        <div class="w-full overflow-x-scroll">
                            <table class="w-full text-left is-hoverable" style="vertical-align: middle;">
                                <thead>
                                    <tr>
                                        <th
                                            class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                            Data</th>
                                        <th
                                            class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                            Cliente</th>
                                        <th
                                            class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                            Telefone</th>
                                        <th
                                            class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                            Etapa do Cadastro</th>
                                        <th
                                            class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                            Aprovado ?</th>
                                        <th
                                            class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($this->getUltimosClientesSemAssessor() as $cliente)
                                        <tr class="border-transparent border-y border-b-slate-200 dark:border-b-navy-500">
                                            <td class="px-4 py-3 whitespace-nowrap sm:px-5">
                                                {{ date('d/m/Y H:i:s', strtotime($cliente['created_at'])) }}</td>
                                            <td class="px-4 py-3 whitespace-nowrap sm:px-5">
                                                {{ $cliente['nome_dono'] }}<br>
                                            </td>
                                            <td class="px-4 py-3 whitespace-nowrap sm:px-5">
                                                {{ $cliente['telefone'] }}<br>
                                            </td>
                                            <td class="px-4 py-3 whitespace-nowrap sm:px-5">
                                                {{ config('etapas_cadastro')[$cliente['etapa_cadastro']] }}<br>
                                            </td>
                                            <td class="px-4 py-3 whitespace-nowrap sm:px-5">
                                                {{ $cliente['aprovado'] ? 'Sim' : 'Não' }}<br>
                                            </td>
                                            <td class="px-4 py-3 whitespace-nowrap sm:px-5">
                                                <a target="_blank"
                                                    href="https://api.whatsapp.com/send?phone=55{{ \Util::limparString($cliente['telefone']) }}"><i
                                                        class="text-gray-400 fab fa-whatsapp-square fa-2x"
                                                        title="Chamar no Whatsapp"></i></a>
                                                <a href="mailto:{{ $cliente['email'] }}"><i
                                                        class="ml-2 text-gray-400 fas fa-envelope fa-2x"
                                                        title="Enviar email"></i></a>
                                                <a class="cursor-pointer" wire:click="reclamarCliente({{ $cliente['id'] }})"><i
                                                        class="ml-2 text-gray-400 fas fa-handshake fa-2x"
                                                        title="Reclamar Cliente"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @break

                    @case(3)
                        <div class="w-full overflow-x-scroll">
                            <table class="w-full text-left is-hoverable" style="vertical-align: middle;">
                                <thead>
                                    <tr>
                                        <th
                                            class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                            Data</th>
                                        <th
                                            class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                            Cliente</th>
                                        <th
                                            class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                            Telefone</th>
                                        <th
                                            class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                            Lote</th>
                                        <th
                                            class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($this->getDeclaracaoInteresseClientes() as $interesse)
                                        <tr class="border-transparent border-y border-b-slate-200 dark:border-b-navy-500">
                                            <td class="px-4 py-3 whitespace-nowrap sm:px-5">
                                                {{ date('d/m/Y H:i:s', strtotime($interesse['created_at'])) }}</td>
                                            <td class="px-4 py-3 whitespace-nowrap sm:px-5">
                                                {{ $interesse['cliente']['nome_dono'] }}<br>
                                            </td>
                                            <td class="px-4 py-3 whitespace-nowrap sm:px-5">
                                                {{ $interesse['telefone'] }}<br>
                                            </td>
                                            <td class="px-4 py-3 whitespace-nowrap sm:px-5">
                                                {{ $interesse['lote']['numero'] . ' - ' . $interesse['lote']['nome'] }}<br>
                                                <small>{{ $interesse['lote']['fazenda']['nome_fazenda'] }}</small>
                                            </td>
                                            <td class="px-4 py-3 whitespace-nowrap sm:px-5">
                                                {{ $interesse['aprovado'] ? 'Sim' : 'Não' }}<br>
                                            </td>
                                            <td class="px-4 py-3 whitespace-nowrap sm:px-5">
                                                <a target="_blank"
                                                    href="https://api.whatsapp.com/send?phone=55{{ \Util::limparString($interesse['telefone']) }}"><i
                                                        class="text-gray-400 fab fa-whatsapp-square fa-2x"></i></a>
                                                <a href="mailto:{{ $cliente['email'] }}"><i
                                                        class="ml-2 text-gray-400 fas fa-envelope fa-2x"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @break

                    @case(4)
                        <div class="w-full overflow-x-scroll">
                            <table class="w-full text-left is-hoverable" style="vertical-align: middle;">
                                <thead>
                                    <tr>
                                        <th
                                            class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                            Data</th>
                                        <th
                                            class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                            Cliente</th>
                                        <th
                                            class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                            Telefone</th>
                                        <th
                                            class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                            Lote</th>
                                        <th
                                            class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                            Aprovado ?</th>
                                        <th
                                            class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($this->getDeclaracaoInteresseClientesSemAssessor() as $interesse)
                                        <tr class="border-transparent border-y border-b-slate-200 dark:border-b-navy-500">
                                            <td class="px-4 py-3 whitespace-nowrap sm:px-5">
                                                {{ date('d/m/Y H:i:s', strtotime($interesse['created_at'])) }}</td>
                                            <td class="px-4 py-3 whitespace-nowrap sm:px-5">
                                                {{ $interesse['cliente']['nome_dono'] }}<br>
                                            </td>
                                            <td class="px-4 py-3 whitespace-nowrap sm:px-5">
                                                {{ $interesse['cliente']['telefone'] }}<br>
                                            </td>
                                            <td class="px-4 py-3 whitespace-nowrap sm:px-5">
                                                {{ $interesse['lote']['numero'] . ' - ' . $interesse['lote']['nome'] }}<br>
                                                <small>{{ $interesse['lote']['fazenda']['nome_fazenda'] }}</small>
                                            </td>
                                            <td class="px-4 py-3 whitespace-nowrap sm:px-5">
                                                {{ $interesse['cliente']['aprovado'] ? 'Sim' : 'Não' }}<br>
                                            </td>
                                            <td class="px-4 py-3 whitespace-nowrap sm:px-5">
                                                <a target="_blank"
                                                    href="https://api.whatsapp.com/send?phone=55{{ \Util::limparString($interesse['cliente']['telefone']) }}"><i
                                                        class="text-gray-400 fab fa-whatsapp-square fa-2x"></i></a>
                                                <a href="mailto:{{ $interesse['cliente']['email'] }}"><i
                                                        class="ml-2 text-gray-400 fas fa-envelope fa-2x"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @break

                    @case(5)
                        <div class="w-full overflow-x-scroll">
                            <table class="w-full text-left is-hoverable" style="vertical-align: middle;">
                                <thead>
                                    <tr>
                                        <th
                                            class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                            Data</th>
                                        <th
                                            class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                            Cliente</th>
                                        <th
                                            class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                            Telefone</th>
                                        <th
                                            class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                            Lote</th>
                                        <th
                                            class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                            Aprovado ?</th>
                                        <th
                                            class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($this->getDeclaracaoInteresseClientesSemAssessor() as $interesse)
                                        <tr class="border-transparent border-y border-b-slate-200 dark:border-b-navy-500">
                                            <td class="px-4 py-3 whitespace-nowrap sm:px-5">
                                                {{ date('d/m/Y H:i:s', strtotime($interesse['created_at'])) }}</td>
                                            <td class="px-4 py-3 whitespace-nowrap sm:px-5">
                                                {{ $interesse['cliente']['nome_dono'] }}<br>
                                            </td>
                                            <td class="px-4 py-3 whitespace-nowrap sm:px-5">
                                                {{ $interesse['cliente']['telefone'] }}<br>
                                            </td>
                                            <td class="px-4 py-3 whitespace-nowrap sm:px-5">
                                                {{ $interesse['lote']['numero'] . ' - ' . $interesse['lote']['nome'] }}<br>
                                                <small>{{ $interesse['lote']['fazenda']['nome_fazenda'] }}</small>
                                            </td>
                                            <td class="px-4 py-3 whitespace-nowrap sm:px-5">
                                                {{ $interesse['cliente']['aprovado'] ? 'Sim' : 'Não' }}<br>
                                            </td>
                                            <td class="px-4 py-3 whitespace-nowrap sm:px-5">
                                                <a target="_blank"
                                                    href="https://api.whatsapp.com/send?phone=55{{ \Util::limparString($interesse['cliente']['telefone']) }}"><i
                                                        class="text-gray-400 fab fa-whatsapp-square fa-2x"></i></a>
                                                <a href="mailto:{{ $interesse['cliente']['email'] }}"><i
                                                        class="ml-2 text-gray-400 fas fa-envelope fa-2x"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @break

                @endswitch

            </div>
        </div>
    </div>
    <x-loading></x-loading>
</div>
