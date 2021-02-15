@extends('template.main')

@section('conteudo')
{{--  <div style="background: url(/imagens/bg-porangaba.png); background-size: cover; min-height: 100vh;">
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-3">
                    <img src="{{asset('/imagens/logo-porangaba.png')}}" style="max-width: 100%;" alt="">
                </div>
                <div class="col-12 col-md-9 d-flex align-items-center text-white text-nav-fazenda">
                    <a class="@if(url()->current() == route('fazenda.conheca')) active @endif" href="{{route('fazenda.conheca')}}"><span><span style="border-bottom: 2px solid #E65454;">Con</span>heça a fazenda</span></a> 
                    <a class="mx-5 @if(url()->current() == route('fazenda.lotes')) active @endif" href="{{route('fazenda.lotes')}}"><span><span style="border-bottom: 2px solid #E65454;">Lot</span>es a venda</span> </a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-5 mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8 text-center text-cadastro-lotes">
                <h1>Cadastre-se para ver os animais dessa fazenda</h1>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12 text-center text-cadastro-lotes">
                <a name="" id="" class="btn btn-vermelho py-2 px-4" href="#" role="button">Cadastrar agora</a>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12 text-center text-cadastro-lotes">
                <span>A maioria das pessoas concluem o cadastro em até 2 minutos</span>
            </div>
        </div>
    </div>
</div>  --}}
<div style="background: url(/imagens/background.png); background-size: cover; background-position: bottom;">
    <div class="container-fluid bg-preto py-5 py-lg-2">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-2 text-white justify-content-center d-flex align-items-center">
                    <img src="{{asset('/imagens/logo-porangaba.png')}}" style="max-width: 100%;" alt="">
                </div>
                <div class="col-12 col-lg-4 justify-content-center d-flex align-items-center text-white mt-4 mt-lg-0">
                    <span><span style="color:red;">Faltam 4 dias</span> para o fim dessa reserva</span>
                </div>
                <div class="col-12 col-lg-3 text-white mt-4 mt-lg-0">
                    <div class="row">
                        <div class="col-12 text-center text-lg-right">
                            <h2>Bourbon</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-center text-lg-right">
                            <span>R$210.000</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-center text-lg-right">
                            <h4>15x R$12.000</h4>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-3 d-flex align-items-center justify-content-center mt-3 mt-lg-0">
                    <div class="text-center text-white">
                        <a name="" id="" class="btn btn-vermelho btn-block py-2 mx-auto" style="max-width:350px;" href="#" role="button">Comprar</a>
                        <span>No boleto ou cartão de crédito</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-5" style="background: url({{asset('imagens/background.jpg')}}); background-position: bottom; background-size: cover;">
        <div class="row justify-content-center mt-5">
            <div class="col-10 col-md-6 col-lg-4 text-center video-container">
                <iframe src="https://www.youtube.com/embed/klZNNUz4wPQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
        <div class="row justify-content-center mt-3">
            <div class="col-10 col-md-6 col-lg-4 text-center">
                <img src="{{asset('imagens/lote.png')}}" style="width:100%; max-width: 70px; border: 1px solid rgba(255,255,255,0.1); border-radius: 5px;" alt="">
                <img src="{{asset('imagens/lote.png')}}" style="width:100%; max-width: 70px; border: 1px solid rgba(255,255,255,0.1); border-radius: 5px;" alt="">
                <img src="{{asset('imagens/lote.png')}}" style="width:100%; max-width: 70px; border: 1px solid rgba(255,255,255,0.1); border-radius: 5px;" alt="">
                <img src="{{asset('imagens/lote.png')}}" style="width:100%; max-width: 70px; border: 1px solid rgba(255,255,255,0.1); border-radius: 5px;" alt="">
            </div>
        </div>
        <div class="row justify-content-center mt-3">
            <div class="col-10 col-md-6 col-lg-4 text-center">
                <div class="row">
                    <div class="col-12 text-white">
                        <h2>Lote 01: Estrela</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-white">
                        <p class="my-0">Registro: PRG 5746</p>
                        <p class="my-0">Raça: Sindi</p>
                        <p class="my-0">Nascimento: 06/06/2016</p>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12 text-white">
                        <i class="fas fa-chevron-down fa-lg"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection