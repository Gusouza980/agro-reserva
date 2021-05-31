@extends('template.main')

@section('styles')

@endsection

@section('conteudo')

    <div class="container py-5" style="min-height: 40vh;">
        
        <div class="card" id="card-conta">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 card-conta-content">
                        <h5>{{$cliente->nome_dono}}</h5>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12 text-center text-md-left card-conta-content">
                        <span class="cpointer link-card-conta active" num="0"><span style="border-bottom: 2px solid #E65454;">Pedi</span>dos</span>
                        <span class="ml-3 link-card-conta cpointer" num="1"><span style="border-bottom: 2px solid #E65454;">Seus</span> Dados</span>
                        <span class="ml-3 link-card-conta cpointer" num="2"><span style="border-bottom: 2px solid #E65454;">Ende</span>reço de Correspondência</span>
                        <span class="ml-3 link-card-conta cpointer" num="3"><span style="border-bottom: 2px solid #E65454;">Pref</span>erências</span>
                    </div>
                </div>
                <hr class="mt-5 mb-4">
                <div class="row">
                    <div class="col-12 card-conta-content">
                        <h5>Seus pedidos</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        @foreach($cliente->carrinhos->where("aberto", 0) as $carrinho)
                            <table class="table">
                                <tbody>
                                
                                    @php
                                        $venda = $carrinho->venda;
                                    @endphp
                                    <tr>
                                        <td style="vertical-align: middle;"><b>Compra: </b>{{date("d/m/Y", strtotime($venda->created_at))}}</td>
                                        <td style="vertical-align: middle;">
                                            @if($venda->situacao == 0)
                                                <button class="btn btn-secondary" style="border-radius: 50px;"> Aguardando Pagamento</button>
                                            @elseif($venda->situacao == 1)
                                                <button class="btn btn-primary"> Pagamento Confirmado</button>
                                            @else
                                                <button class="btn btn-danger"> Cancelada</button>
                                            @endif
                                        </td>
                                        <td style="vertical-align: middle;"><b>Total:</b> R${{number_format($carrinho->total, 2, ",", ".")}}</td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td style="vertical-align: middle; text-align: right;"><i class="fa fa-plus ver_mais cpointer" vid="{{$venda->id}}" style="color: #E65454" aria-hidden="true"></i></td>
                                        <td style="vertical-align: middle; text-align: right; display: none;"><i class="fa fa-minus ver_menos cpointer" vid="{{$venda->id}}" style="color: #E65454;" aria-hidden="true"></i></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="tabela_produtos" vid="{{$venda->id}}" style="display:none; border: 1px solid rgba(0,0,0,.05);">
                                <table class="table">
                                    <tbody>
                                        @foreach($carrinho->produtos as $produto)
                                            <tr style="background-color:rgba(0,0,0,.05);">
                                                <td><img src="{{asset($produto->lote->fazenda->logo)}}" style="max-width: 100px;" alt=""></td>
                                                <td><b>{{$produto->lote->nome}}</b></td>
                                                <td><b>Raça:</b> {{$produto->lote->raca->nome}}</td>
                                                <td><b>Registro:</b> {{$produto->lote->registro}}</td>
                                                <td><b>Valor:</b> R${{number_format($produto->lote->preco, 2, ",", ".")}}</td>
                                                <td><b>Qtd:</b> {{$produto->quantidade}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <h6 class="ml-2 mt-3">Boletos</h6>
                                <table class="table">
                                    <tbody>
                                        @foreach($venda->boletos as $boleto)
                                            <tr>
                                                <td style="vertical-align: middle; border: 0px;">{{$boleto->descricao}}</td>
                                                <td style="vertical-align: middle; border: 0px;"><b>Validade: </b>{{date("d/m/Y", strtotime($boleto->validade))}}</td>
                                                <td style="vertical-align: middle; border: 0px;">
                                                    @if($boleto->status == 0)
                                                        <button class="btn btn-secondary" style="border-radius: 50px;"> Aguardando Pagamento</button>
                                                    @elseif($boleto->status == 1)
                                                        <button class="btn btn-primary"> Pagamento Confirmado</button>
                                                    @else
                                                        <button class="btn btn-danger"> Cancelado</button>
                                                    @endif
                                                </td>
                                                <td style="vertical-align: middle; border: 0px;">
                                                    <a href="{{route('conta.boleto.download', ['boleto' => $boleto])}}" class="btn btn-vermelho px-3">Download</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        
    </div>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $(".ver_mais").click(function(){
            vid = $(this).attr("vid");
            $(".tabela_produtos[vid='"+vid+"']").slideDown("slow");
            $(this).hide();
            $(".ver_menos[vid='"+vid+"']").parent().show();
        });

        $(".ver_menos").click(function(){
            vid = $(this).attr("vid");
            $(".tabela_produtos[vid='"+vid+"']").slideUp("slow");
            $(this).parent().hide();
            $(".ver_mais[vid='"+vid+"']").show();
        });
    });
</script>
@endsection