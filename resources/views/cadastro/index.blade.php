@extends('template.main')

@section('conteudo')
<div class="container-fluid py-5 min-vh-100" style="background: url({{asset('imagens/background.jpg')}}); background-position: bottom; background-size: cover;">
    <div class="row justify-content-center mt-5">
        <div class="col-10 col-md-6 col-lg-4 text-left text-white">
            <h2>Vamos criar seu acesso</h2>
        </div>
    </div>
    <div class="row justify-content-center mt-5">
        <div class="col-10 col-md-6 col-lg-4 text-left">
            <div class="container-fluid px-0">
                <form action="{{route('cadastro.salvar')}}" class="row form-cadastro0" method="post">
                    @csrf
                    <div class="form-group col-12">
                        <label for="email">E-mail</label>
                        <input type="email" class="form-control" name="email" id="email" aria-describedby="" placeholder="exemplo@exemplo.com">
                    </div>
                    <div class="form-group col-12">
                        <label for="senha">Crie uma senha de acesso</label>
                        <input type="password" class="form-control" name="senha" id="senha" aria-describedby="" placeholder="******">
                    </div>
                    <div class="form-group col-12">
                        <label for="senha2">Confirme sua senha</label>
                        <input type="password" class="form-control" name="senha2" id="senha2" aria-describedby="" placeholder="******">
                    </div>
                    <div class="form-group col-12 text-center text-lg-left">
                        <button type="submit" class="btn btn-vermelho py-2" role="button">Cadastrar</button>
                    </div>
                    <div class="col-12 text-center text-lg-left text-white form-cadastro0">
                        <span>Já tem uma conta? <a href="{{route('login')}}"><u>Clique aqui</u></a></span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection