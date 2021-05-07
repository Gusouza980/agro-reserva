@extends('template.main')

@section('styles')

@endsection

@section('conteudo')

    <div class="container py-5" style="min-height: 40vh;">
        <div class="row">
            <div class="col-12 text-center">
                @if($carrinho->produtos->count() > 0)
                    <table class="table" style="vertical-align: middle; padding: 0px; box-shadow: 2px 2px 5px rgba(0,0,0, 0.2);">
                        <thead class="" style="background-color: #E65454; border: 0px; color: white; font-size: 15px; line-height: 15px; height: 40px;">
                            <tr>
                                <th class="text-center" scope="col">Produto</th>
                                <th class="text-center" scope="col"></th>
                                <th class="text-center" scope="col">Fazenda</th>
                                <th class="text-center" scope="col">Valor</th>
                                <th class="text-center" scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($carrinho->produtos as $produto)
                                <tr>
                                    <th class="px-0 py-0" scope="row" style="width: 20%;">
                                        <img src="{{asset($produto->lote->preview)}}" alt="" class="w-100">
                                    </th>
                                    <td style="vertical-align: middle; width: 25%;">
                                        <p><b>{{$produto->lote->nome}}</b></p>
                                        <p class="mt-n3"><b>Registro:</b> {{$produto->lote->registro}}</p>
                                        <p class="mt-n3"><b>Raça:</b> {{$produto->lote->raca->nome}}</p>
                                    </td>
                                    <td class="text-center" style="vertical-align: middle; width: 20%;">
                                        <img src="{{asset($produto->lote->fazenda->logo)}}" alt="" style="width: 130px; max-width: 100%;">
                                    </td>
                                    <td class="text-center" style="vertical-align: middle;">
                                        <b>${{number_format($produto->total, 2, ",", ".")}}</b>
                                    </td>
                                    <td class="text-center" style="vertical-align: middle;"><a href="{{route('carrinho.deletar', ['produto' => $produto])}}"><i class="fa fa-times" style="color: #E65454" aria-hidden="true"></i></a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <h4>Seu carrinho está vazio</h4>
                @endif
            </div>
        </div>
    </div>





    <script>
        function deletaItem(cartid) {
            //alert(cartid);
            document.location.href = '/carrinho/deletar/' + cartid;
            //document.location.href = '_carrinho_deleta.php?cartid='+cartid;
        }

    </script>


@endsection
