<!doctype html>
<html lang="pt-br">

<head>
    <title>Agroreserva</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Site de venda de gado">
    <meta name="keywords" content="Gado, Agro, E-commerce, Lotes">
    <meta name="author" content="Luis Gustavo de Souza Carvalho">
    @yield("metas")
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
	<link rel="stylesheet" href="{{asset('css/main.css')}}"/>
    @toastr_css
    @yield("styles")
</head>

<body>
    <a class="btn-whats d-sm-block" href="https://web.whatsapp.com/send?phone=5534991720996" target="_blank">
    </a>
    <div class="container-fluid bg-preto">
        <div class="container">
            <nav class="navbar d-block d-lg-none navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="{{route('index')}}"><img src="{{asset('imagens/logo.png')}}" alt="Logo Agroreserva"></a>
                <button class="navbar-toggler float-right"  type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon text-white"><i class="fas fa-bars"></i>

                    </span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav px-5 text-center">
                        @if(session()->get("cliente"))
                            <li class="nav-item active text-white mt-4">
                                Bem vindo @if(isset(session()->get("cliente")["nome_dono"])), {{explode(" ", session()->get("cliente")["nome_dono"])[0]}} @endif
                            </li>
                            <li class="nav-item active mt-2">
                                <a class="nav-link" href="{{route('sair')}}">Sair</span></a>
                            </li> 
                        @else
                            <li class="nav-item active mt-4">
                                <a class="nav-link" href="{{route('login')}}">Entrar</span></a>
                            </li>                        
                        @endif
                        @if(session()->get("carrinho"))
                            <li class="nav-item active mt-2">
                                <a class="nav-link" href="{{route('carrinho')}}"><i class="fas fa-shopping-cart text-white"></i></span></a>
                            </li>
                        @endif
                    </ul>
                </div>
				
            </nav>
			<div class="row d-none d-lg-flex py-3">
				<div class="col-lg-3">
					<a class="navbar-brand" href="{{route('index')}}"><img src="{{asset('imagens/logo.png')}}" alt="Logo Agroreserva"></a>
				</div>
				{{--  <div class="col-lg-2 text-left d-flex text-white align-items-center">
					<span class="text-nav-header"><a href="{{route('index')}}"><span style="border-bottom: 2px solid #E65454;">Ver</span> todas as reservas</a></span> 
				</div>  --}}
				<div class="col-lg-4 d-flex text-white justify-content-end align-items-center">
					{{--  <a class="btn btn-outline-transparente px-5 py-1 mx-3" href="{{route('cadastro.fazenda')}}">Venda</span></a>  --}}
                    @if(!session()->get("cliente"))
					    <span  class="text-nav-header"><a href="{{route('cadastro')}}"><span style="border-bottom: 2px solid #E65454;">Cad</span>astre-se para comprar</a></span> 
                    @endif
                </div>
				<div class="col-lg-5 d-flex text-white justify-content-end align-items-center">
					<span>
                        {{--  @if($_SESSION["userid"])  --}}
                        @if(session()->get("cliente"))
                            Bem vindo @if(isset(session()->get("cliente")["nome_dono"])), {{explode(" ", session()->get("cliente")["nome_dono"])[0]}} @endif
                            <span class="ml-3 text-nav-header"><a href="{{route('conta.index')}}"><span style="border-bottom: 2px solid #E65454;">Min</span>ha conta</a></span> </span>
                            
                        @else
                            <a class="text-nav-header" href="{{route('login')}}">Entrar</a>
                        @endif
                    </span> 
                    @if(session()->get("carrinho"))
					    <a class="mx-4" href="{{route('carrinho')}}"><i class="fas fa-shopping-cart text-white cart-icone"></i></span></a>
                    @endif
                    @if(session()->get("cliente"))
                        <span class="text-nav-header"><a class="text-nav-header mx-4" href="{{route('sair')}}"><span style="border-bottom: 2px solid #E65454;">Sai</span>r</a></span>
                    @endif
				</div>
			</div>
        </div>
    </div>

	@yield('conteudo')

    <div class="container-fluid" id="footer" style="background: url(/imagens/bg-footer.png); background-size: cover; background-position:center; background-repeat: no-repeat;">
        <div class="row align-items-center py-5">
            <div class="col-12 offset-lg-4 col-lg-4 text-center">
                <img src="{{asset('imagens/logo-footer.png')}}" style="width:100%; max-width: 307px;" alt="">
            </div>
            <div class="col-12 col-lg-4 mt-5 mt-lg-0">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 text-nav-footer text-center text-lg-left">
                                <a class="" href="{{route('index')}}"><span><span style="border-bottom: 2px solid #E65454;">Que</span>m somos</span> </a>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12 text-nav-footer text-center text-lg-left">
                                <a class="" href="{{route('cadastro.fazenda')}}"><span><span style="border-bottom: 2px solid #E65454;">Anu</span>ncie sua reserva</span> </a>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12 text-nav-footer text-center text-lg-left">
                                <a class="" href="{{route('cadastro')}}"><span><span style="border-bottom: 2px solid #E65454;">Cad</span>astre-se para comprar</span> </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-12">
                        <div class="row mt-5">
                            <div class="col-12 mt-5 text-nav-footer text-center text-lg-left">
                                <span>+55 34 9172-0996</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 text-nav-footer text-center text-lg-left">
                                <span>contato@agroreserva.com.br</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 text-nav-footer text-center text-lg-left">
                                <span>
                                    <i class="fab fa-instagram fa-lg"></i> 
                                    <i class="fab fa-facebook-square ml-4 fa-lg"></i>
                                    <i class="fab fa-youtube ml-4 fa-lg"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-12 col-lg-6">
                        <div class="row mt-5">
                            <div class="col-12 mt-5 text-nav-footer text-center text-lg-left">
                                <span>AGRO RESERVA PECUARIA DIGITAL LTDA</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 text-nav-footer text-center text-lg-left">
                                <span>41.893.302/0001-13</span>
                            </div>
                        </div>
                    </div> --}}
                </div>
                
            </div>
        </div>
    </div>
    <div class="container-fluid bg-preto">
        <div class="row">
            <div class="col-12 text-center text-white py-4 px-0 px-lg-5" style="font-size: .6875rem;">
                <span>Copyright ©️2021 www.agroreserva.com.br, TODOS OS DIREITOS RESERVADOS. Todo o conteúdo do site, todas as fotos, imagens, logotipos, marcas, dizeres, som, software, conjunto imagem, layout, trade dress, aqui veiculados são de propriedade exclusiva da AGRO RESERVA PECUARIA DIGITAL LTDA, ou de seus parceiros. É vedada qualquer reprodução, total ou parcial, de qualquer elemento de identidade, sem expressa autorização. A violação de qualquer direito mencionado implicará na responsabilização cível e criminal nos termos da Lei. AGRO RESERVA PECUARIA DIGITAL LTDA - CNPJ: 41.893.302/0001-13 - R JOAQUIM SARAIVA nº 40 - SALA 02 - CEP: 38400-210 - CENTRO - UBERLANDIA - MG - A inclusão no carrinho não garante o preço e/ou a disponibilidade do lote. Caso os lotes apresentem divergências de valores, o preço válido é o exibido na tela de pagamento. Vendas sujeitas a análise e disponibilidade de estoque.</span>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalSucesso" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body modal-body-sucesso text-center py-4">
                    <div class="row">
                        <div class="col-12 conteudo-modal">
                            <h3>Obrigado <span id="nome_modal"></span>.</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 conteudo-modal">
                            <span class="mt-2">Seu cadastro foi realizado com sucesso. Você pode continuar navegando pelo site ou, caso precise de ajuda, falar com um de nossos consultores.</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 conteudo-modal">
                            <button class="botao-confirma py-2 px-5 mt-4" onclick="fechaModal()">Continuar Navegando</button>
                            <button class="botao-confirma py-2 px-5 mt-4" onclick="fechaModal()">Falar com um consultor</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    @toastr_js
    @toastr_render
	@yield("scripts")

    @if(session()->get("cadastro_finalizado"))
        <script>
            function fechaModal() {
                $("#modalSucesso").modal("hide");
            }

            $(document).ready(function(){
                $("#modalSucesso").modal();
            });
        </script>
    @endif

    <script>
        $(document).ready(function(){
            var settings = {
                "url": "https://api.scccheck.com.br/login",
                "method": "POST",
                "headers": {
                    "Accept": "application/json",
                    "Content-Type": "application/json"
                },
                "data": JSON.stringify({
                    "logon": 3158814,
                    "senha": "berrante40",
                }),
            };
            /*
            var settings = {
                "url": "https://api.scccheck.com.br/consultas/crednet",
                "method": "POST",
                "headers": {
                    "Accept": "application/json",
                    "Authorization": "Bearer token",
                    "Content-Type": "application/json"
                },
                "data": JSON.stringify({
                    "achei_recheque": true,
                    "tipo_pessoa": "F",
                    "doc_consultado": "112.233.445-56",
                    "ddd": "44",
                    "telefone": "30303030",
                    "cep": "88888888",
                    "protesto_estadual": "PR",
                    "cmc7": "010203040501020304050102030405",
                    "vencimento": "2022-12-12",
                    "valor_cheque": 12345,
                    "adicionais": [1, 2, 3, 4, 5]
                }),
            };
            */
                
            $.ajax(settings).done(function (response) {
                console.log(response);
            });
        });
    </script>

</body>

</html>
