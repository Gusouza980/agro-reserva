<table>
    <tbody>
    <tr>
        <td colspan="2"><b>Cadastros Não Finalizados Dos Últimos 7 Dias</b></td>
    </tr>
    @foreach($count_por_etapas as $count_etapa)
        <tr>
            <td>{{$count_etapa->etapa_cadastro}}</td>
            <td>{{$count_etapa->total}}</td>
        </tr>
    @endforeach
    <tr>
        <td colspan="2"></td>
    </tr>
    <tr>
        <td colspan="2"><b>Total de Novos Cadastros Nos Últimos 7 Dias</b></td>
    </tr>
    <tr>
        <td><b>Finalizados</b></td>
        <td>{{$total_cadastros_finalizados}}</td>
    </tr>
    <tr>
        <td><b>Não Finalizados</b></td>
        <td>{{$total_cadastros_nao_finalizados}}</td>
    </tr>
    </tbody>
</table>

<table>
    <tbody>
    <tr>
        <td><b>Clientes Cadastrados nos Últimos 7 Dias</b></td>
    </tr>
    @foreach($clientes_cadastrados as $cliente)
        <tr @if($cliente->finalizado) style="background-color: green" @else style="background-color: red;" @endif>
            <td><b>{{$cliente->nome_dono}}</b></td>
            <td>{{$cliente->email}}</td>
            <td>{{($cliente->telefone) ?: $cliente->whatsapp}}</td>
            <td>{{ ($cliente->assessor) ? $cliente->assessor->nome : 'Sem Assessor' }}</td>
            <td>Última Etapa: {{$cliente->etapa_cadastro}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
