@extends('template.main')

@section('conteudo')
    <div class="container-fluid" style="background: url({{asset('imagens/bg-home-min-2.jpg')}})">
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
                        <div class="alert alert-danger" role="alert">
                            <strong>{{session()->get("erro")}}</strong>
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
                        
                        <div class="col-12 text-right">
                            {{--  Esqueceu sua senha?  --}}
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
@endsection