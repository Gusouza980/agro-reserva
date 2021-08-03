@extends('template.main')

@section('conteudo')
<div class="container-fluid">
    <div class="row align-items-center" id="row-header-sobre" style="background: url({{asset('imagens/banner-sobre.jpg')}}); background-size: cover; background-position: center;">
        <div class="col-12 text-center text-header-blog">
        </div>
    </div>
</div>
<div class="container-fluid py-5" style="background-color: #F5F5F5;">
    <div class="w800 mx-auto">
        <div class="container-fluid">
            <div class="row py-4">
                <div class="col-12 px-0">
                    <a href="{{route('index')}}"><span style="color: #E8521B !important; font-size: 16px; font-family: 'Montserrat', sans-serif; font-weight: bold;"><i class="fas fa-arrow-left mr-2"></i> Voltar</span></a>
                </div>
            </div>
            <div class="row text-sobre">
                <h1 class="mb-3">Quem somos</h1>
                <p>Somos a Agro Reserva. A plataforma digital de comercialização de gado que conecta as grandes marcas produtoras de genética aos compradores do mundo inteiro, 365 dias por ano, 07 dias por semana, 24 horas por dia. Aqui você compra sem pressa, com um atendimento que te acompanha até o pós-venda. Aqui você vende com toda segurança, menor custo promocional e muito mais alcance. Aqui a gente respeita a sua jornada e a sua experiência vale cada @.</p>
                
                {{--  <h2 class="mt-3">Nossa visão:</h2>
                <p>Valorizar o trabalho do produtor, ressignificando o formato da comercialização de animais no Brasil, de forma a torná-la mais fácil, justa, segura e rentável para quem compra e para quem vende.</p>
                <h2 class="mt-3">Nossos valores:</h2>
                <p>Valorizar o trabalho do produtor, ressignificando o formato da comercialização de animais no Brasil, de forma a torná-la mais fácil, justa, segura e rentável para quem compra e para quem vende.</p>  --}}
            </div>
            <div class="row">
                <div class="d-flex align-items-center mx-auto mx-lg-0 text-sobre">
                    <div class="px-2 py-2 bg-white" style="border-radius: 15px;">
                        <img src="{{asset('imagens/icone_missao.png')}}" style="width: 80px;" alt="">
                    </div>
                </div>
                <div class="text-sobre ml-4 text-center text-lg-left">
                    <h2 class="mt-3 mb-3"><span style="border-bottom: 2px solid #E8521B;">Nos</span>sa missão</h2>
                    <p>Valorizar o trabalho do produtor, ressignificando o formato da <br class="d-none d-lg-block">comercialização de animais no Brasil, de forma a torná-la <br class="d-none d-lg-block">mais fácil, justa, segura e rentável para quem compra e para quem vende.</p>
                </div>
            </div>
            <div class="row mt-3">
                <div class="d-flex align-items-center mx-auto mx-lg-0 text-sobre">
                    <div class="px-2 py-2 bg-white" style="border-radius: 15px;">
                        <img src="{{asset('imagens/icone_visao.png')}}" style="width: 80px;" alt="">
                    </div>
                </div>
                <div class="text-sobre ml-4 text-center text-lg-left">
                    <h2 class="mt-3 mb-3"><span style="border-bottom: 2px solid #E8521B;">Nos</span>sa visão</h2>
                    <p>Evoluir sempre para nos consolidarmos como referências na <br class="d-none d-lg-block">comercialização de animais no Brasil e no mundo. </p>
                </div>
            </div>
            <div class="row mt-3">
                <div class="d-flex align-items-center mx-auto mx-lg-0 text-sobre">
                    <div class="px-2 py-2 bg-white" style="border-radius: 15px;">
                        <img src="{{asset('imagens/icone_valores.png')}}" style="width: 80px;" alt="">
                    </div>
                </div>
                <div class="text-sobre ml-4 text-center text-lg-left">
                    <h2 class="mt-3 mb-3"><span style="border-bottom: 2px solid #E8521B;">Nos</span>sos valores</h2>
                    <p>Transparência nas relações. Paixão pela pecuária. Precursores <br class="d-none d-lg-block">da evolução.</p>
                </div>
            </div>
        </div>
        <div class="container-fluid caixa-sobre mt-5">
            <div class="row">
                <div class="col-12 text-sobre-caixa">
                    <h1 class="mb-4">Por que comprar ?</h1>
                    <p><img class="mr-3" src="{{asset('imagens/icone_check.png')}}" width="15">Inovador, conectado, seguro.</p>
                    <p><img class="mr-3" src="{{asset('imagens/icone_check.png')}}" width="15">As reservas mais cobiçadas do mercado estão aqui.</p>
                    <p><img class="mr-3" src="{{asset('imagens/icone_check.png')}}" width="15">Animais de alta qualidade e potencial genético.</p>
                    <p><img class="mr-3" src="{{asset('imagens/icone_check.png')}}" width="15">Você tem a possibilidade de não pagar comissão.</p>
                    <p><img class="mr-3" src="{{asset('imagens/icone_check.png')}}" width="15">A gente valoriza sua experiência e acompanha todo o processo de compra com você.</p>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12 text-center text-sobre-caixa">
                    <a href="{{route('cadastro')}}" class="btn btn-sobre px-5 py-2">Quero Comprar</a>
                </div>
            </div>
        </div>

        <div class="container-fluid caixa-sobre mt-5">
            <div class="row">
                <div class="col-12 text-sobre-caixa">
                    <h1 class="mb-4">Por que vender ?</h1>
                    <p><img class="mr-3" src="{{asset('imagens/icone_check.png')}}" width="15">É um ambiente seguro e transparente.</p>
                    <p><img class="mr-3" src="{{asset('imagens/icone_check.png')}}" width="15">A gente produz todo o material promocional da sua reserva e da sua fazenda.</p>
                    <p><img class="mr-3" src="{{asset('imagens/icone_check.png')}}" width="15">Baixo risco. A gente configura a venda, aprova o crédito e vende pra você.</p>
                    <p><img class="mr-3" src="{{asset('imagens/icone_check.png')}}" width="15">Ampliação da capacidade de venda.</p>
                    <p><img class="mr-3" src="{{asset('imagens/icone_check.png')}}" width="15">Seus animais mais tempo em evidencia.</p>
                    <p><img class="mr-3" src="{{asset('imagens/icone_check.png')}}" width="15">Inovador, disruptivo e justo.</p>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12 text-center text-sobre-caixa">
                    <a href="{{route('cadastro')}}" class="btn btn-sobre px-5 py-2">Quero Vender</a>
                </div>
            </div>
        </div>

        <div class="container-fluid mt-5">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="sobre-text-ganha">
                        GANHA QUEM COMPRA<br>
                        GANHA QUEM VENDE
                    </h1>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <a href="{{route('blog')}}"><span style="color: #E8521B !important; font-size: 16px; font-family: 'Montserrat', sans-serif; font-weight: bold;"><i class="fas fa-arrow-left mr-2"></i> Voltar</span></a>
            </div>
        </div>
    </div>
</div>

@endsection