<div class="w-full" x-data="{ show: @entangle('show') }">
    <div x-show="show" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-[100] flex items-end bg-slate-900/60 backdrop-blur sm:items-center sm:justify-center">
        <!-- Modal -->
        <div x-show="show" x-transition:enter="transition ease-out duration-150"
            x-transition:enter-start="opacity-0 transform translate-y-1/2" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0  transform translate-y-1/2"
            @keydown.escape="show = false"
            class="w-full px-6 py-4 overflow-hidden max-h-[100vh] overflow-y-scroll bg-white rounded-t-lg dark:bg-navy-700 sm:rounded-lg sm:m-4 sm:max-w-[1200px]"
            role="dialog">
            <!-- Modal body -->
            <div class="mt-4 mb-6">
                <!-- Modal title -->
                <div class="w-full overflow-x-scroll">
                    @if ($show)
                        <table class="w-full text-left is-hoverable" style="vertical-align: middle;">
                            <thead>
                                <tr>
                                    <th class="px-4 py-3 font-semibold uppercase rounded-tl-lg whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">Data</th>
                                    <th class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">Nome</th>
                                    <th class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">Fazenda</th>
                                    <th class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">Localização</th>
                                    <th class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">Assessor</th>
                                    <th class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">Whatsapp</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($visitas as $visita)
                                    <tr class="border-transparent border-y border-b-slate-200 dark:border-b-navy-500">
                                        <td class="px-4 py-3 whitespace-nowrap sm:px-5">{{ date("d/m/Y H:i:s", strtotime($visita->created_at)) }}</td>
                                        <td class="px-4 py-3 whitespace-nowrap sm:px-5">
                                            @if($visita->logado)
                                                {{$visita->cliente->nome_dono}}
                                            @else
                                                {{$visita->ip}}
                                            @endif
                                        </td>
                                        <td class="px-4 py-3 whitespace-nowrap sm:px-5">{{ $visita->cliente->nome_fazenda }}</td>
                                        <td class="px-4 py-3 whitespace-nowrap sm:px-5">
                                            {{$visita->cidade}}/{{ $visita->estado }}
                                        </td>
                                        <td class="px-4 py-3 whitespace-nowrap sm:px-5">
                                            @if($visita->cliente->assessor)
                                                {{$visita->cliente->assessor->nome}}
                                            @else
                                                SEM ASSESSOR
                                            @endif
                                        </td>
                                        <td class="px-4 py-3 whitespace-nowrap sm:px-5">
                                            @if($visita->logado)
                                                @if($visita->cliente->whatsapp) {{$visita->cliente->whatsapp}} @else {{$visita->cliente->telefone}} @endif
                                            @else
                                                -
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
            <div class="w-full flex justify-end">
                <button wire:click="$set('show', false)" class="px-4 py-2 rounded-md text-white bg-gray-600">Fechar</button>
            </div>
        </div>
    </div>
    <x-loading></x-loading>
</div>
