<!doctype html>
<html lang="pt-br">

@php
    if(session()->get("fazenda")){
        $fazenda = \App\Models\Fazenda::find(session()->get("fazenda"));
    }
@endphp

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
	<link rel="stylesheet" href="{{asset('css/main.css')}}"/>
</head>

<body>

    <div class="container-fluid bg-preto">
        <div class="container">
            {{--  <nav class="navbar d-block d-lg-none navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="#"><img src="{{asset('imagens/logo.png')}}" alt="Logo Agroreserva"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav px-5">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Ver todas as reservas</span></a>
                        </li>
						<li class="nav-item active float-right">
                            <a class="nav-link btn btn-outline-transparente px-4" href="#">Venda</span></a>
                        </li>
                        <li class="nav-item active float-right">
                            <a class="nav-link" href="#">Cadastre-se para comprar</span></a>
                        </li>
						<li class="nav-item active float-right">
                            <a class="nav-link" href="#">Entrar</span></a>
                        </li>
						<li class="nav-item active float-right">
							<a class="nav-link" href="#"><i class="fas fa-shopping-cart text-white"></i></span></a>
                        </li>
                    </ul>
                </div>
				<div class="align-self-end">
					<ul class="navbar-nav px-5">
						<li class="nav-item active">
                            <a class="nav-link btn btn-outline-transparente px-4" href="#">Venda</span></a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Cadastre-se para comprar</span></a>
                        </li>
                    </ul>
				</div>
				<div class="align-self-end">
					<ul class="navbar-nav px-5">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Entrar</span></a>
                        </li>
						<li class="nav-item active">
							<a class="nav-link" href="#"><i class="fas fa-shopping-cart text-white"></i></span></a>
                        </li>
                    </ul>
				</div>
            </nav>  --}}
			<div class="row d-none d-lg-flex py-3">
				<div class="col-lg-3">
					<a class="navbar-brand" href="#"><img src="{{asset('imagens/logo.png')}}" alt="Logo Agroreserva"></a>
				</div>
				<div class="col-lg-2 text-left d-flex text-white align-items-center">
					<span>Ver todas as reservas</span> 
				</div>
				<div class="col-lg-5 d-flex text-white justify-content-end align-items-center">
					<a class="btn btn-outline-transparente px-5 py-1 mx-3" href="#">Venda</span></a>
					<span>Cadastre-se para comprar</span> 
				</div>
				<div class="col-lg-2 d-flex text-white justify-content-end align-items-center">
					<span>
                        @if(isset($fazenda))
                            Bem vindo, {{explode(" ", $fazenda->nome_dono)[0]}}
                        @else
                            Entrar
                        @endif
                    </span> 
					<a class="mx-3" href="#"><i class="fas fa-shopping-cart text-white cart-icone"></i></span></a>
				</div>
			</div>
        </div>
    </div>

	@yield('conteudo')

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
	
	@yield("scripts")
</body>

</html>
