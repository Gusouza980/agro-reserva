<!doctype html>
<html lang="pt-br">

<head>
    <title>Agro Reserva</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="Agro, Gado, Leilão, Genética, Reserva">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
</head>

<body style="background: url(imagens/bg-home-min-2.jpg); background-attachment: fixed; background-size: cover;">

    <div class="container-fluid" style="">
        <div class="container py-5">

            <div class="row mt-4">
                <div class="col-12 text-center">
                    <img src="imagens/logo_agroreserva_leite.svg" style="" width="300" alt="Logo Agro Reserva">
                </div>
            </div>
            <div class="row mt-5 justify-content-center">
                <div class="col-12 col-md-7 col-lg-5 mt-5 py-5 px-5" style="background-color: white; border-radius: 10px;">
                    <h3 class="">Entre</h3>
                    @if(session()->get("erro"))
                        <div class="alert alert-danger" role="alert">
                            <strong>{{session()->get("erro")}}</strong>
                        </div>
                    @endif
                    
                    <form id="form-cadastro" class="row" action="{{route('logar')}}" method="post">
                        @csrf
                        <div class="form-group col-12 text-black mt-1">
                            <label for="email">E-mail</label>
                            <input type="text" class="form-control col-12" name="email" id="email" placeholder="Digite seu email" required>
                        </div>

                        <div class="form-group col-12 text-black">
                            <label for="senha">Digite sua senha</label>
                            <input type="password" class="form-control col-12" name="senha" id="senha" placeholder="" required>
                        </div>
                        
                        <div class="col-12 text-right">
                            Esqueceu sua senha?
                        </div>

                        <div class="form-group col-12 text-center mt-4">
                            <button type="submit" name="submit" class="botao-cadastro py-2" style="width: 200px;" >Entrar</button>
                        </div>

                        <div class="col-12 text-center">
                            Não tem uma conta ? <a href="{{route('cadastro')}}" style="color: #E65454 !important;"><u>Clique aqui</u></a>
                        </div>
                    </form>
                    {{--  <div class="mt-3 w-100 text-center">
                        <a href="{{route('facebook.autenticar')}}" style="color:red !important;"><img src="{{asset('imagens/icone-facebook.png')}}" width="30" alt="Login Facebook"></a>
                    </div>  --}}
                </div>
            </div>
            <div class="row mt-3">
                <div class=" d-flex justify-content-center col-12 text-center d-block d-sm-none">
                    <a href="https://web.whatsapp.com/send?phone=5534991720996">
                        <div class="btn-whats-xs">

                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>