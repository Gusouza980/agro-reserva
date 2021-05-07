@extends('template.main')

@section('conteudo')
<div style="background: url(/{{$fazenda->fundo_conheca_lotes}}); background-size: cover; background-position: middle;">
    <div class="container-fluid bg-preto py-5 py-lg-2">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-2 text-white justify-content-center d-flex align-items-center">
                    <img src="{{asset($fazenda->logo)}}" style="max-width: 100%;" alt="">
                </div>
                <div class="col-12 col-lg-4 justify-content-center d-flex align-items-center text-white mt-4 mt-lg-0">
                    {{--  <span><span style="color:red;">Faltam 4 dias</span> para o fim dessa reserva</span>  --}}
                </div>
                <div class="col-12 col-lg-3 text-white mt-4 mt-lg-0">
                    <div class="row">
                        <div class="col-12 text-center text-lg-right">
                            <h2>{{$lote->nome}}</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-center text-lg-right">
                            <span>R${{number_format($lote->preco, 2, ",", ".")}}</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-center text-lg-right">
                            {{--  <h4>15x R$12.000</h4>  --}}
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-3 d-flex align-items-center justify-content-center mt-3 mt-lg-0">
                    <div class="text-center text-white">
                        <a name="" id="" class="btn btn-vermelho btn-block py-2 px-5 mx-auto" style="max-width:350px;" href="{{route('carrinho.adicionar', ['lote' => $lote])}}" role="button">Comprar</a>
                        {{--  <span>No boleto ou cartão de crédito</span>  --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-5" style="">
        <div class="row justify-content-center mt-5">
            <div class="col-10 col-md-6 col-lg-4 text-center video-lote">
                {!! $lote->video !!}
                {{--  <iframe src="https://www.youtube.com/embed/klZNNUz4wPQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>  --}}
                {{--  <img src="{{ urldecode($produto->produto[0]->tx_PathImagem) }}" style="border-radius: 15px;" alt="">  --}}
            </div>
        </div>
        {{--  <div class="row justify-content-center mt-3">
            <div class="col-10 col-md-6 col-lg-4 text-center">
                <img src="{{asset('imagens/lote.png')}}" style="width:100%; max-width: 70px; border: 1px solid rgba(255,255,255,0.1); border-radius: 5px;" alt="">
                <img src="{{asset('imagens/lote.png')}}" style="width:100%; max-width: 70px; border: 1px solid rgba(255,255,255,0.1); border-radius: 5px;" alt="">
                <img src="{{asset('imagens/lote.png')}}" style="width:100%; max-width: 70px; border: 1px solid rgba(255,255,255,0.1); border-radius: 5px;" alt="">
                <img src="{{asset('imagens/lote.png')}}" style="width:100%; max-width: 70px; border: 1px solid rgba(255,255,255,0.1); border-radius: 5px;" alt="">
            </div>
        </div>  --}}
        <div class="row justify-content-center mt-3">
            <div class="col-10 col-md-6 col-lg-4 text-center">
                <div class="row">
                    <div class="col-12 text-white">
                        <h2>{{$lote->nome}}</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-white">
                        <b>Registro:</b> {{$lote->registro}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-white">
                        <b>Raça:</b> {{$lote->raca->nome}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-white">
                        <b>Nascimento:</b> {{date("d/m/Y", strtotime($lote->nascimento))}}
                    </div>
                </div>
                {{--  <div class="row">
                    <div class="col-12 text-white">
                        
                    </div>
                </div>  --}}
                {{--  <div class="row mt-4">
                    <div class="col-12 text-white">
                        <i class="fas fa-chevron-down fa-lg"></i>
                    </div>
                </div>  --}}
            </div>
        </div>
    </div>
</div>
{{--  @if( $produto->produto[0]->tx_Descricao)
<div class="container-fluid" style="background-color: white;">
    <div class="row">
        <div class="col-12 text-center py-5">
            {!! $produto->produto[0]->tx_Descricao !!}
        </div>
    </div>
</div>
@endif  --}}


@endsection