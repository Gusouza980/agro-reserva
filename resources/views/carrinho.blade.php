@extends('template.main')

@section('styles')

@endsection

@section('conteudo')

    <div class="container py-5" style="min-height: 40vh;">
        @if(session()->get("erro"))
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-danger" role="alert">
                        {{session()->get("erro")}}
                    </div>
                </div>
            </div>
        @endif
        @foreach(\App\Models\Carrinho::whereIn("id", $carrinhos)->get() as $carrinho)
            <div class="row d-none d-lg-block mt-5">
                <div class="col-12">
                    <h4>Reserva da {{$carrinho->reserva->fazenda->nome_fazenda}}</h4>
                </div>
                <div class="col-12 text-center">
                    @if($carrinho->produtos->count() > 0)
                        <table class="table" style="vertical-align: middle; padding: 0px; box-shadow: 2px 2px 5px rgba(0,0,0, 0.2);">
                            <thead class="" style="background-color: #E8521B; border: 0px; color: white; font-size: 15px; line-height: 15px; height: 40px;">
                                <tr>
                                    <th class="text-center" scope="col">Produto</th>
                                    <th class="text-center" scope="col"></th>
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
                                        <td style="vertical-align: middle; width: 50%;">
                                            <p><b>LOTE {{$produto->lote->numero}}: {{$produto->lote->nome}}</b></p>
                                            <p class="mt-n3"><b>Registro:</b> {{$produto->lote->registro}}</p>
                                            <p class="mt-n3"><b>Raça:</b> {{$produto->lote->raca->nome}}</p>
                                        </td>
                                        <td class="text-center" style="vertical-align: middle;">
                                            <b>${{number_format($produto->total, 2, ",", ".")}}</b>
                                        </td>
                                        <td class="text-center" style="vertical-align: middle;"><a href="{{route('carrinho.deletar', ['produto' => $produto])}}"><i class="fa fa-times" style="color: #E65454" aria-hidden="true"></i></a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-12 text-right">
                                <a href="{{route('carrinho.checkout', ['carrinho' => $carrinho])}}"><button class="btn btn-vermelho btn-hover-preto px-3">Continuar</button></a>
                            </div>
                        </div>
                    @else
                        <h4>Seu carrinho está vazio</h4>
                    @endif
                </div>
            </div>
        @endforeach
        <div class="row d-lg-none">
            <div class="col-12">
                @foreach(\App\Models\Carrinho::whereIn("id", $carrinhos)->get() as $carrinho)
                    <div class="row mt-5">
                        <div class="col-12">
                            <h5><b>Reserva da {{$carrinho->reserva->fazenda->nome_fazenda}}</b></h5>
                        </div>
                    </div>
                    @if($carrinho->produtos->count() > 0)
                        @foreach($carrinho->produtos as $produto)
                        <table class="table" style="vertical-align: middle; padding: 0px; box-shadow: 2px 2px 5px rgba(0,0,0, 0.2);">
                            <thead class="" style="background-color: #E8521B; border: 0px; color: white; font-size: 15px; line-height: 15px; height: 40px;">
                                <tr>
                                    <th class="text-center" scope="col">LOTE {{$produto->lote->numero}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <tr class="text-center">
                                        <td>{{$produto->lote->nome}}</td>
                                    </tr>
                                    <tr class="text-center">
                                        <th class="px-0 py-0" scope="row" style="width: 20%;">
                                            <img src="{{asset($produto->lote->preview)}}" alt="" class="w-100">
                                        </th>
                                    </tr>
                                    <tr class="text-center">
                                        <td style="vertical-align: middle; width: 50%;">
                                            <p><b>LOTE {{$produto->lote->numero}}: {{$produto->lote->nome}}</b></p>
                                            <p class="mt-n3"><b>Registro:</b> {{$produto->lote->registro}}</p>
                                            <p class="mt-n3"><b>Raça:</b> {{$produto->lote->raca->nome}}</p>
                                        </td>
                                    </tr>
                                    <tr class="text-center">
                                        <td class="text-center" style="vertical-align: middle;">
                                            <b>${{number_format($produto->total, 2, ",", ".")}}</b>
                                        </td>
                                    </tr>
                                    <tr class="text-center">
                                        <td class="text-center" style="vertical-align: middle;"><a href="{{route('carrinho.deletar', ['produto' => $produto])}}" style="color: #E65454 !important;">Remover</a></td>
                                    </tr>
                            </tbody>
                        </table>
                        @endforeach
                        <div class="row">
                            <div class="col-12 text-right">
                                <a href="{{route('carrinho.checkout', ['carrinho' => $carrinho])}}"><button class="btn btn-block btn-vermelho btn-hover-preto px-3">Continuar</button></a>
                            </div>
                        </div>
                    @else
                        <h4>Seu carrinho está vazio</h4>
                    @endif
                    <hr>
                @endforeach
            </div>
        </div>
        {{-- @if($carrinho->produtos->count() > 0)
            <div class="row">
                <div class="col-12 text-right">
                    <a href="{{route('carrinho.checkout')}}"><button class="btn btn-vermelho btn-hover-preto px-3">Continuar</button></a>
                </div>
            </div>
        @endif --}}
        <hr>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){

            $("#link-boleto").click(function(){
                $("#div-whats").slideUp(300, function(){
                    $("#div-boleto").slideDown(300);
                });
            });

            $("#link-whats").click(function(){
                $("#div-boleto").slideUp(300, function(){
                    $("#div-whats").slideDown(300);
                });
            });
        })
    </script>
@endsection