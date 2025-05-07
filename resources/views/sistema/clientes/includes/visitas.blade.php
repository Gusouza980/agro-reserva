<div class="w-full overflow-x-scroll">
    <table class="w-full text-left is-hoverable" style="vertical-align: middle;">
        <thead>
            <tr>
                <th class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">#</th>
                <th class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">Data</th>
                <th class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">Lote</th>
            </tr>
        </thead>
        <tbody>
            @foreach($visitas as $visita)
                <tr class="border-transparent border-y border-b-slate-200 dark:border-b-navy-500">
                    <td class="px-4 py-3 whitespace-nowrap sm:px-5">#{{ $visita->id }}</td>
                    <td class="px-4 py-3 whitespace-nowrap sm:px-5">{{ date('d/m/Y H:i:s', strtotime($visita->created_at)) }}</td>
                    <td class="px-4 py-3 whitespace-nowrap sm:px-5">
                        @if($visita->lote)
                            {{ $visita->lote->numero . " - " . $visita->lote->nome }}<br>
                            <small>{{ $visita->lote->fazenda->nome_fazenda }}</small>
                        @elseif($visita->embriao)
                            Embrião {{ $visita->embriao->numero}}<br>
                            <small>{{ $visita->embriao->fazenda->nome_fazenda }}</small>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="w-full">
        {{ $visitas->links() }}
    </div>
</div>