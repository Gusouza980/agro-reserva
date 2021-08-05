@extends('template.main')

@section('conteudo')
    <div class="container-fluid" style="background: url({{asset('imagens/bg-home-min-2.jpg')}}); background-size: cover; background-repeat: no-repeat;">
        <div class="container py-5">

            <div class="row d-none d-lg-flex">
                <div class="col-12 text-center">
                    <img src="imagens/logo_agroreserva_leite.svg" style="" width="300" alt="Logo Agro Reserva">
                </div>
            </div>
            <div class="row mt-4">
                
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-md-7 col-lg-5 mt-5 py-5 px-5" style="background-color: white; border-radius: 10px;">
                    <a href="{{route('index')}}"><span style="color: #E8521B !important; font-size: 12px; font-family: 'Montserrat', sans-serif; font-weight: bold;"><i class="fas fa-arrow-left mr-2"></i> Voltar</span></a>
                    {{--  <h3 class="mt-3">Entre</h3>  --}}
                    @if(session()->get("erro"))
                        <div class="alert alert-danger mt-3" role="alert">
                            <strong>{{session()->get("erro")}}</strong>
                        </div>
                    @endif
                    @if(session()->get("sucesso"))
                        <div class="alert alert-success mt-3" role="alert">
                            <strong>{{session()->get("sucesso")}}</strong>
                        </div>
                    @endif
                    
                    <form id="form-cadastro" class="row mt-4" action="{{route('logar')}}" method="post">
                        @csrf
                        <input type="hidden" name="anterior" value="{{$anterior}}">
                        <div class="form-group col-12 text-black mt-1">
                            <label for="email">E-mail</label>
                            <input type="text" class="form-control col-12" name="email" id="email" placeholder="Digite seu email" required>
                        </div>

                        <div class="form-group col-12 text-black">
                            <label for="senha">Digite sua senha</label>
                            <input type="password" class="form-control col-12" name="senha" id="senha" placeholder="" required>
                        </div>
                        
                        <div class="col-12 text-right my-3">
                             <span class="text-nav-header cpointer"><a style="color: black !important;" data-toggle="modal" data-target="#modalSenha"><span style="border-bottom: 2px solid #FEB000;">Esqu</span>eceu sua senha?</a></span> 
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
        </div>
    </div>
    <div class="modal fade" id="modalSenha" tabindex="-1" role="dialog" aria-labelledby="modalSenhaTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="px-3 px-lg-4" action="{{route('conta.senha.recuperar')}}" method="post">
                        @csrf
                        <div class="form-group mb-4 text-black">
                            <label class="label-cinza" for="">E-mail Cadastrado</label>
                            <input type="email"
                                class="form-control" name="email" id="" aria-describedby="helpSenhaAntiga" placeholder="">
                            <small id="helpSenhaAntiga" class="form-text text-muted">Informe o e-mail cadastrado na sua conta para enviarmos uma senha temporária</small>
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-amarelo px-5 py-2">Enviar Senha</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection