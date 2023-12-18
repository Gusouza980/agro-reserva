@extends('template.main2')

@section('conteudo')
<div class="container-fluid">
    <div class="row align-items-center" id="row-header-sobre" style="background: url({{asset('imagens/banner-sobre.jpg')}}); background-size: cover; background-position: center;">
        <div class="text-center col-12 text-header-blog">
        </div>
    </div>
</div>
<div class="py-5 container-fluid" style="background-color: #F5F5F5;">
    <div class="mx-auto w800">
        <div class="container-fluid">
            <div class="py-4 row">
                <div class="px-0 col-12">
                    <a href="{{route('index')}}"><span style="color: #E8521B !important; font-size: 16px; font-family: 'Montserrat', sans-serif; font-weight: bold;"><i class="mr-2 fas fa-arrow-left"></i> Voltar</span></a>
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
            <div class="py-5 my-3 row justify-content-center">
                <div
                    class="text-center lazy col-12 d-flex justify-content-center text-section1-index video-container">
                    <iframe loading="lazy" width="1863" height="770" src="https://www.youtube.com/embed/JZaf0PGdYiI"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                </div>
            </div>
            <div class="row">
                <div class="mx-auto d-flex align-items-center mx-lg-0 text-sobre">
                    <div class="px-2 py-2 bg-white" style="border-radius: 15px;">
                        <img src="{{asset('imagens/icone_missao.png')}}" style="width: 80px;" alt="">
                    </div>
                </div>
                <div class="text-center text-sobre ml-lg-4 text-lg-left">
                    <h2 class="mt-3 mb-3"><span style="border-bottom: 2px solid #E8521B;">Nos</span>sa missão</h2>
                    <p>
                        Somos uma empresa de tecnologia que tem como objetivo democratizar a<br class="d-none d-lg-block"> comercialização de animais de alto valor genético e produtos voltados<br class="d-none d-lg-block"> para o produtor rural, através de uma plataforma digital com serviços<br class="d-none d-lg-block"> humanizados, de maneira justa, segura e rentável para quem compra,<br class="d-none d-lg-block"> vende e anuncia.
                    </p>
                </div>
            </div>
            <div class="mt-3 row">
                <div class="mx-auto d-flex align-items-center mx-lg-0 text-sobre">
                    <div class="px-2 py-2 bg-white" style="border-radius: 15px;">
                        <img src="{{asset('imagens/icone_visao.png')}}" style="width: 80px;" alt="">
                    </div>
                </div>
                <div class="text-center text-sobre ml-lg-4 text-lg-left">
                    <h2 class="mt-3 mb-3"><span style="border-bottom: 2px solid #E8521B;">Nos</span>sa visão</h2>
                    <p>Ser a melhor empresa de comercialização de animais de alto valor genético<br class="d-none d-lg-block"> do mundo, tendo como princípio o respeito pelos nossos clientes. </p>
                </div>
            </div>
            <div class="mt-3 row">
                <div class="mx-auto d-flex align-items-center mx-lg-0 text-sobre">
                    <div class="px-2 py-2 bg-white" style="border-radius: 15px;">
                        <img src="{{asset('imagens/icone_valores.png')}}" style="width: 80px;" alt="">
                    </div>
                </div>
                <div class="text-center text-sobre ml-lg-4 text-lg-left">
                    <h2 class="mt-3 mb-3"><span style="border-bottom: 2px solid #E8521B;">Nos</span>sos valores</h2>
                    <p>Transparência nas relações. Paixão pela pecuária. Respeito <br class="d-none d-lg-block">pelos clientes.</p>
                </div>
            </div>
        </div>
        <div class="mt-5 container-fluid caixa-sobre">
            <div class="row">
                <div class="col-12 text-sobre-caixa">
                    <h1 class="mb-4">Por que comprar ?</h1>
                    <div class="w-full flex items-center text-[#8E8E8E] font-montserrat text-[17px]">
                        <div>
                            <img class="mr-3" src="{{asset('imagens/icone_check.png')}}" width="15">
                        </div>
                        <div>
                            Inovador, conectado, seguro.
                        </div>
                    </div>
                    <div class="w-full flex items-center text-[#8E8E8E] font-montserrat text-[17px]">
                        <div>
                            <img class="mr-3" src="{{asset('imagens/icone_check.png')}}" width="15">
                        </div>
                        <div>
                            As reservas mais cobiçadas do mercado estão aqui.
                        </div>
                    </div>
                    <div class="w-full flex items-center text-[#8E8E8E] font-montserrat text-[17px]">
                        <div>
                            <img class="mr-3" src="{{asset('imagens/icone_check.png')}}" width="15">
                        </div>
                        <div>
                            Animais de alta qualidade e potencial genético.
                        </div>
                    </div>
                    <div class="w-full flex items-center text-[#8E8E8E] font-montserrat text-[17px]">
                        <div>
                            <img class="mr-3" src="{{asset('imagens/icone_check.png')}}" width="15">
                        </div>
                        <div>
                            Você tem a possibilidade de não pagar comissão.
                        </div>
                    </div>
                    <div class="w-full flex items-center text-[#8E8E8E] font-montserrat text-[17px]">
                        <div>
                            <img class="mr-3" src="{{asset('imagens/icone_check.png')}}" width="15">
                        </div>
                        <div>
                            A gente valoriza sua experiência e acompanha todo o processo de compra com você.
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-4 row">
                <div class="text-center col-12 text-sobre-caixa">
                    @if(session()->get("cliente"))
                        <a href="{{route('index')}}" class="px-5 py-2 btn btn-sobre">Quero Comprar</a>
                    @else
                        <a href="{{route('cadastro')}}" class="px-5 py-2 btn btn-sobre">Quero Comprar</a>
                    @endif
                </div>
            </div>
        </div>

        <div class="mt-5 container-fluid caixa-sobre">
            <div class="row">
                <div class="col-12 text-sobre-caixa">
                    <h1 class="mb-4">Por que vender ?</h1>
                    <div class="w-full flex items-center text-[#8E8E8E] font-montserrat text-[17px]">
                        <div>
                            <img class="mr-3" src="{{asset('imagens/icone_check.png')}}" width="15">
                        </div>
                        <div>
                            É um ambiente seguro e transparente.
                        </div>
                    </div>
                    <div class="w-full flex items-center text-[#8E8E8E] font-montserrat text-[17px]">
                        <div>
                            <img class="mr-3" src="{{asset('imagens/icone_check.png')}}" width="15">
                        </div>
                        <div>
                            A gente produz todo o material promocional da sua reserva e da sua fazenda.
                        </div>
                    </div>
                    <div class="w-full flex items-center text-[#8E8E8E] font-montserrat text-[17px]">
                        <div>
                            <img class="mr-3" src="{{asset('imagens/icone_check.png')}}" width="15">
                        </div>
                        <div>
                            Baixo risco. A gente configura a venda, aprova o crédito e vende pra você.
                        </div>
                    </div>
                    <div class="w-full flex items-center text-[#8E8E8E] font-montserrat text-[17px]">
                        <div>
                            <img class="mr-3" src="{{asset('imagens/icone_check.png')}}" width="15">
                        </div>
                        <div>
                            Ampliação da capacidade de venda.
                        </div>
                    </div>
                    <div class="w-full flex items-center text-[#8E8E8E] font-montserrat text-[17px]">
                        <div>
                            <img class="mr-3" src="{{asset('imagens/icone_check.png')}}" width="15">
                        </div>
                        <div>
                            Seus animais mais tempo em evidencia.
                        </div>
                    </div>
                    <div class="w-full flex items-center text-[#8E8E8E] font-montserrat text-[17px]">
                        <div>
                            <img class="mr-3" src="{{asset('imagens/icone_check.png')}}" width="15">
                        </div>
                        <div>
                            Inovador, disruptivo e justo.
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-4 row">
                <div class="text-center col-12 text-sobre-caixa">
                    <a href="https://api.whatsapp.com/send?phone=5534996920202&text={{ urlencode('Olá. Gostaria de vender na Agroreserva!') }}" target="_blank" class="px-5 py-2 btn btn-sobre">Quero Vender</a>
                </div>
            </div>
        </div>

        <div class="mt-5 container-fluid">
            <div class="row">
                <div class="text-center col-12">
                    <h1 class="sobre-text-ganha">
                        GANHA QUEM COMPRA<br>
                        GANHA QUEM VENDE
                    </h1>
                </div>
            </div>
        </div>

        @livewire("institucional.depoimentos")

        
        <div class="mt-4 row">
            <div class="col-12">
                <a href="{{route('blog')}}"><span style="color: #E8521B !important; font-size: 16px; font-family: 'Montserrat', sans-serif; font-weight: bold;"><i class="mr-2 fas fa-arrow-left"></i> Voltar</span></a>
            </div>
        </div>
    </div>
</div>

@endsection