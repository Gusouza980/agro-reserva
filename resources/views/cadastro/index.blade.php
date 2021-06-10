@extends('template.main')

@section('conteudo')
<div class="container-fluid py-5 min-vh-100" style="background: url({{asset('imagens/background.jpg')}}); background-position: bottom; background-size: cover;">
    <div class="row justify-content-center mt-5">
        <div class="col-10 col-md-6 col-lg-4 text-left text-white">
            <h2>Vamos criar seu acesso</h2>
        </div>
    </div>
    <div class="row justify-content-center mt-5">
        <div class="col-12 text-left">
            <div id="container-form-cadastro">
                <form action="{{route('cadastro.salvar')}}" class="row form-cadastro0" method="post">
                    @csrf
                    <input type="hidden" name="anterior" value="{{$anterior}}">
                    <div class="form-group col-12 input-cadastro">
                        <label for="nome">Nome Completo</label>
                        <input type="text" class="form-control" name="nome" id="nome" aria-describedby="" placeholder="Informe seu nome completo">
                    </div>
                    <div class="form-group col-12 input-cadastro">
                        <label for="email">E-mail</label>
                        <input type="email" class="form-control" name="email" id="email" aria-describedby="" placeholder="exemplo@exemplo.com">
                    </div>
                    <div class="form-group col-12 input-cadastro">
                        <label for="telefone">Telefone</label>
                        <input type="text" class="form-control" name="telefone" id="telefone" aria-describedby="" placeholder="(99) 99999-9999">
                    </div>
                    <div class="form-group col-12 input-cadastro">
                        <label for="estado">Estado</label>
                        <select class="form-control" name="estado" id="" required>
                            @foreach(\App\Models\Estado::all() as $estado)
                                <option value="{{$estado->id}}">{{$estado->nome}}</option>
                            @endforeach
                        </select>
                        {{--  <input type="text" class="form-control" name="estado" id="estado" aria-describedby="" placeholder="Escolha seu estado" required>  --}}
                    </div>
                    <div class="form-group col-12 input-cadastro">
                        <label for="cidade">Cidade</label>
                        <select class="form-control" name="cidade" required>
                            @foreach(\App\Models\Estado::first()->cidades as $cidade)
                                <option value="{{$cidade->id}}">{{$cidade->nome}}</option>
                            @endforeach
                        </select>
                    </div>            
                    <div class="form-group col-12 input-cadastro">
                        <label for="senha">Crie uma senha de acesso</label>
                        <input type="password" class="form-control" name="senha" id="senha" aria-describedby="" placeholder="******">
                    </div>
                    <div class="form-group col-12 input-cadastro">
                        <label for="senha2">Confirme sua senha</label>
                        <input type="password" class="form-control" name="senha2" id="senha2" aria-describedby="" placeholder="******">
                    </div>
                    <div class="col-12 my-3">
                        <label for="senha">Quais raças te interessam hoje?</label>
                    </div>
                    @foreach(\App\Models\Raca::all() as $raca)
                        <div class="form-group col-6 col-md-3 col-sm-4 col-lg-3">
                            <label class="containerr">{{$raca->nome}}
                                <input type="checkbox" name="racas[]" value="{{$raca->id}}">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    @endforeach   
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

@section('scripts')
    <script src="{{asset('js/jquery.mask.js')}}"></script>
    <script>
        $(document).ready(function(){
            $('input[name="telefone"]').mask('(00) 00000-0000',);
            $("select[name='estado']").change(function(){
                var estado = $("select[name='estado']").val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'GET',
                    url: '/api/getCidadesByUf/' + estado,
                    dataType: 'json',
                    success: function (data) {
                        html = "";
                        var cidades = JSON.parse(data);
                        for(var cidade in cidades){
                            html += "<option value='"+cidades[cidade].id+"'>"+cidades[cidade].nome+"</option>"
                        }
                        $("select[name='cidade']").html(html);
                    },
                    error: function (data) {
                        console.log(data);
                    }
                });
            });
        })
    </script>
@endsection