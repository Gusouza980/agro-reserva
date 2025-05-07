@php
    $dados = $this->getRelacaoAssessoresEClientes();
@endphp
<table class="w-full">
    <thead>
        <tr>
            <th colspan=6 class="text-left py-3 bg-orange-500 text-white px-5 font-medium text-md">Totais de clientes</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border border-slate-300 px-5 py-3"><b>Cadastro completo</b></td>
            <td class="border border-slate-300 px-5 py-3">{{ $dados['total_clientes_cadastro_completo'] }}</td>
            <td class="border border-slate-300 px-5 py-3"><b>Cadastro completo e aprovado</b></td>
            <td class="border border-slate-300 px-5 py-3">{{ $dados['total_clientes_cadastro_completo_e_aprovado'] }}</td>
            <td class="border border-slate-300 px-5 py-3"><b>Cadastro completo e não analisado</b></td>
            <td class="border border-slate-300 px-5 py-3">{{ $dados['total_clientes_cadastro_completo_e_nao_analizado'] }}</td>
        </tr>
        <tr>
            <td class="border border-slate-300 px-5 py-3"><b>Cadastro completo e rejeitado</b></td>
            <td class="border border-slate-300 px-5 py-3">{{ $dados['total_clientes_cadastro_completo_e_reprovado'] }}</td>
            <td class="border border-slate-300 px-5 py-3"><b>Cadastro completo e com assessor</b></td>
            <td class="border border-slate-300 px-5 py-3">{{ $dados['total_clientes_cadastro_completo_e_com_assessor'] }}</td>
            <td class="border border-slate-300 px-5 py-3"><b>Cadastro completo e sem assessor</b></td>
            <td class="border border-slate-300 px-5 py-3">{{ $dados['total_clientes_cadastro_completo_e_sem_assessor'] }}</td>
        </tr>
        <tr>
            <td class="border border-slate-300 px-5 py-3"><b>Cadastro incompleto e com assessor</b></td>
            <td class="border border-slate-300 px-5 py-3">{{ $dados['total_clientes_cadastro_completo_e_com_assessor'] }}</td>
            <td class="border border-slate-300 px-5 py-3"><b>Cadastro incompleto e sem assessor</b></td>
            <td class="border border-slate-300 px-5 py-3">{{ $dados['total_clientes_cadastro_completo_e_sem_assessor'] }}</td>
        </tr>
    </tbody>
</table>

<table class="w-full mt-5">
    <thead>
        <tr>
            <th colspan=6 class="text-left py-3 bg-orange-500 text-white px-5 font-medium text-md">Assessores e seus clientes</th>
        </tr>
    </thead>
    <tbody>
        @php
            $cont = 0;
        @endphp
        @foreach($dados['cadastros_agrupados_por_assessor'] as $assessor => $quantidade)
            @if($cont == 0)
                <tr>
            @endif
                <td class="border border-slate-300 px-5 py-3"><b>{{ $assessor }}</b></td>
                <td class="border border-slate-300 px-5 py-3">{{ $quantidade }}</td>
            @php
                $cont++;
            @endphp
            @if($cont == 3)
                </tr>
                @php
                    $cont = 0;
                @endphp
            @endif
        @endforeach
    </tbody>
</table>