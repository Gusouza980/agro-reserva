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
<div class="pb-5" style="background: url(/imagens/bg-porangaba.png); background-size: cover; background-position: bottom;">
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
    <div class="container-fluid py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10 text-center text-cadastro-lotes">
                <h1>Maior volume, mansidão e rendimento Conheça o Sindi</h1>
            </div>
        </div>
    </div>
</div>
<div class="container py-5">
    <div class="row">
        <div class="col-12 col-lg-8 justify-content-center justify-content-lg-start text-center text-lg-left align-items-center text-lotes d-flex">
            <h3>Reserva da Fazenda Porangaba</h3>
        </div>
        <div class="col-12 col-lg-4 justify-content-center justify-content-lg-end align-items-center text-center text-lg-right text-lotes d-flex">
            <span>fêmeas</span>
            <span class="ml-3">embrião</span>
            <span class="ml-3">sêmen</span>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 px-3 mt-4">
            <div class="row">
                <div class="col-12 text-center text-lotes">
                    <img src="{{asset('imagens/lote.png')}}" alt="">
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-lotes text-center">
                    <span>Lote 01</span>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 px-3 mt-4">
            <div class="row">
                <div class="col-12 text-center text-lotes">
                    <img src="{{asset('imagens/lote.png')}}" alt="">
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-lotes text-center">
                    <span>Lote 01</span>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 px-3 mt-4">
            <div class="row">
                <div class="col-12 text-center text-lotes">
                    <img src="{{asset('imagens/lote.png')}}" alt="">
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-lotes text-center">
                    <span>Lote 01</span>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 px-3 mt-4">
            <div class="row">
                <div class="col-12 text-center text-lotes">
                    <img src="{{asset('imagens/lote.png')}}" alt="">
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-lotes text-center">
                    <span>Lote 01</span>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 px-3 mt-4">
            <div class="row">
                <div class="col-12 text-center text-lotes">
                    <img src="{{asset('imagens/lote.png')}}" alt="">
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-lotes text-center">
                    <span>Lote 01</span>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 px-3 mt-4">
            <div class="row">
                <div class="col-12 text-center text-lotes">
                    <img src="{{asset('imagens/lote.png')}}" alt="">
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-lotes text-center">
                    <span>Lote 01</span>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 px-3 mt-4">
            <div class="row">
                <div class="col-12 text-center text-lotes">
                    <img src="{{asset('imagens/lote.png')}}" alt="">
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-lotes text-center">
                    <span>Lote 01</span>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 px-3 mt-4">
            <div class="row">
                <div class="col-12 text-center text-lotes">
                    <img src="{{asset('imagens/lote.png')}}" alt="">
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-lotes text-center">
                    <span>Lote 01</span>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 px-3 mt-4">
            <div class="row">
                <div class="col-12 text-center text-lotes">
                    <img src="{{asset('imagens/lote.png')}}" alt="">
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-lotes text-center">
                    <span>Lote 01</span>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 px-3 mt-4">
            <div class="row">
                <div class="col-12 text-center text-lotes">
                    <img src="{{asset('imagens/lote.png')}}" alt="">
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-lotes text-center">
                    <span>Lote 01</span>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 px-3 mt-4">
            <div class="row">
                <div class="col-12 text-center text-lotes">
                    <img src="{{asset('imagens/lote.png')}}" alt="">
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-lotes text-center">
                    <span>Lote 01</span>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 px-3 mt-4">
            <div class="row">
                <div class="col-12 text-center text-lotes">
                    <img src="{{asset('imagens/lote.png')}}" alt="">
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-lotes text-center">
                    <span>Lote 01</span>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 px-3 mt-4">
            <div class="row">
                <div class="col-12 text-center text-lotes">
                    <img src="{{asset('imagens/lote.png')}}" alt="">
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-lotes text-center">
                    <span>Lote 01</span>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 px-3 mt-4">
            <div class="row">
                <div class="col-12 text-center text-lotes">
                    <img src="{{asset('imagens/lote.png')}}" alt="">
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-lotes text-center">
                    <span>Lote 01</span>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 px-3 mt-4">
            <div class="row">
                <div class="col-12 text-center text-lotes">
                    <img src="{{asset('imagens/lote.png')}}" alt="">
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-lotes text-center">
                    <span>Lote 01</span>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 px-3 mt-4">
            <div class="row">
                <div class="col-12 text-center text-lotes">
                    <img src="{{asset('imagens/lote.png')}}" alt="">
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-lotes text-center">
                    <span>Lote 01</span>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 px-3 mt-4">
            <div class="row">
                <div class="col-12 text-center text-lotes">
                    <img src="{{asset('imagens/lote.png')}}" alt="">
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-lotes text-center">
                    <span>Lote 01</span>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection