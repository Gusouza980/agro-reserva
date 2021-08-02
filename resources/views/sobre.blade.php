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
            <div class="row text-sobre">
                <h1 class="mb-3">Quem somos</h1>
                <p>Somos a Agro Reserva. A plataforma digital de comercialização de gado que conecta as grandes marcas produtoras de genética aos compradores do mundo inteiro, 365 dias por ano, 07 dias por semana, 24 horas por dia. Aqui você compra sem pressa, com um atendimento que te acompanha até o pós-venda. Aqui você vende com toda segurança, menor custo promocional e muito mais alcance. Aqui a gente respeita a sua jornada e a sua experiência vale cada @.</p>
                <h2 class="mt-3">Nossa missão:</h2>
                <p>Valorizar o trabalho do produtor, ressignificando o formato da comercialização de animais no Brasil, de forma a torná-la mais fácil, justa, segura e rentável para quem compra e para quem vende.</p>
                <h2 class="mt-3">Nossa visão:</h2>
                <p>Valorizar o trabalho do produtor, ressignificando o formato da comercialização de animais no Brasil, de forma a torná-la mais fácil, justa, segura e rentável para quem compra e para quem vende.</p>
                <h2 class="mt-3">Nossos valores:</h2>
                <p>Valorizar o trabalho do produtor, ressignificando o formato da comercialização de animais no Brasil, de forma a torná-la mais fácil, justa, segura e rentável para quem compra e para quem vende.</p>
            </div>
        </div>
        <div class="container-fluid caixa-sobre mt-5">
            <div class="row">
                <div class="col-12 text-sobre-caixa">
                    <h1>Por que comprar ?</h1>
                    <p>
                        As reservas mais cobiçadas das marcas de melhor reputação do mercado estão aqui.<br>
                        Os animais valem quanto custam e nada a mais.<br>
                        Você pode chegar a pagar 0% de comissão.<br>
                        A gente valoriza sua experiência e acompanha todo o processo de compra com você.
                    </p>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12 text-center text-sobre-caixa">
                    <a href="" class="btn btn-sobre px-5 py-2">Quero Comprar</a>
                </div>
            </div>
        </div>

        <div class="container-fluid caixa-sobre mt-5">
            <div class="row">
                <div class="col-12 text-sobre-caixa">
                    <h1>Por que vender ?</h1>
                    <p>
                        É um ambiente seguro e transparente.<br>
                        A gente produz todo o material promocional da sua reserva e da sua fazenda.<br>
                        Baixo risco. A gente configura a venda, aprova o crédito e vende pra você.
                    </p>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12 text-center text-sobre-caixa">
                    <a href="" class="btn btn-sobre px-5 py-2">Quero Comprar</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection