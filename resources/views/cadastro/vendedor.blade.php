@extends('template.main')

@section('conteudo')
    <div class="container-fluid py-5 min-vh-100"
        style="background: url({{ asset('imagens/fundo-cadastro1.jpg') }}); background-position: bottom; background-size: cover;">
        @if (!session()->get('cliente'))
            <div class="row justify-content-center mt-5">
                <div class="col-10 col-md-6 col-lg-4 text-center text-white">
                    <h2>Vamos criar seu acesso</h2>
                </div>
            </div>
        @else
            <div class="row justify-content-center mt-5">
                <div class="col-10 col-md-6 col-lg-4 text-center text-white">
                    <h2>Só mais um pouco</h2>
                    <h5>Para dar o primeiro passo uma parceria de sucesso</h5>
                </div>
            </div>
        @endif
        <div class="row justify-content-center mt-5">
            <div class="col-12 text-left">
                <div id="container-form-cadastro">
                    @if (!session()->get('cliente') || !isset(session()->get("cliente")["vendedor"]) || !session()->get("cliente")["vendedor"])
                        <form id="form-pre-cadastro" action="{{ route('cadastro.vendedor.salvar') }}" class="row form-cadastro0" method="post">
                            @csrf
                            <input type="hidden" name="anterior" value="{{ $anterior }}">
                            @if(!session()->get("cliente"))
                                <div class="form-group col-12 input-cadastro">
                                    <label for="nome_dono">Nome Completo</label>
                                    <input type="text" class="form-control" name="nome_dono" id="nome_dono" aria-describedby="" required
                                        placeholder="Informe seu nome completo">
                                </div>
                                <div class="form-group col-12 input-cadastro">
                                    <label for="email">E-mail</label>
                                    <input type="email" class="form-control" name="email" id="email" aria-describedby=""
                                        required placeholder="exemplo@exemplo.com">
                                </div>
                                <div class="form-group col-12 input-cadastro">
                                    <label for="telefone">Telefone</label>
                                    <input type="text" class="form-control" name="telefone" id="telefone" aria-describedby=""
                                        required placeholder="(99) 99999-9999">
                                </div>
                                <div class="form-group col-12 input-cadastro">
                                    <label for="nome_fazenda">Nome da Fazenda</label>
                                    <input type="text" class="form-control" name="nome_fazenda" id="nome_fazenda" aria-describedby=""
                                        maxlenght="150" required placeholder="Informe o nome da sua fazenda" required>
                                </div>
                            @endif
                            <div class="form-group col-12 input-cadastro">
                                <label for="racas_vender">Raça que deseja vender</label>
                                <input type="text" class="form-control" name="raca_vender" id="racas_vender" aria-describedby=""
                                    maxlenght="150" required placeholder="Ex: Nelore" required>
                            </div>
                            <div class="form-group col-12 input-cadastro">
                                <div class="form-group input-cadastro d-flex justify-content-start">
                                    <div class="mx-3">
                                        <div class="form-check form-check-inline mt-2">
                                            <input class="form-check-input-radio" type="radio" name="vender_registro" value="1" required>
                                            <label class="form-check-label ml-2 label-branca">Com Registro</label>
                                        </div>
                                    </div>
                                    <div class="mx-3">
                                        <div class="form-check form-check-inline mt-2">
                                            <input class="form-check-input-radio" type="radio" name="vender_registro" value="0" required>
                                            <label class="form-check-label ml-2 label-branca">Sem Registro</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if(!session()->get("cliente"))
                                <div class="form-group col-12 input-cadastro">
                                    <label for="senha">Crie uma senha de acesso</label>
                                    <input type="password" class="form-control" name="senha" id="senha" aria-describedby=""
                                        required placeholder="******">
                                </div>
                            @endif
                            {{-- <div class="col-12 my-3">
                            <label for="senha">Quais raças te interessam hoje?</label>
                        </div>
                        @foreach (\App\Models\Raca::all() as $raca)
                            <div class="form-group col-6 col-md-3 col-sm-4 col-lg-3">
                                <label class="containerr">{{$raca->nome}}
                                    <input type="checkbox" name="racas[]" value="{{$raca->id}}">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        @endforeach --}}
                            <div class="form-group col-12 text-center text-lg-right">
                                <button type="submit" class="btn btn-vermelho py-2" role="button"
                                    id="confirmar-precadastro">Cadastrar</button>
                            </div>
                            <div class="col-12 text-center text-lg-left text-white form-cadastro0">
                                <span>Já tem uma conta? <a href="{{ route('login') }}"><u>Clique aqui</u></a></span>
                            </div>
                        </form>
                    @else
                        <div class="py-4 px-4" id="caixa-sucesso-cadastro">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <img src="{{ asset('imagens/icone_pre_cadastro.png') }}" style="width: 100px;"
                                            alt="Ícone de Pré Cadastro">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-12 text-center modal-precadastro-text">
                                        <h4 style="line-height: 35px; letter-spacing: 1px;"><b>Sua conta foi
                                                criada com sucesso</b>. Mas lembre-se: para finalizar a compra, seu cadastro
                                            <b>precisa estar completo e aprovado</b> pelo nosso time. Rápido, prático e
                                            seguro! "Bora" preencher agora?
                                        </h4>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-12">
                                        <div class="text-center" id="botoes-finalizar">
                                            <a href="{{ route('cadastro.finalizar') }}"><button type="submit"
                                                    class="btn-vermelho px-4 py-2 mt-3">Completar Agora</button></a>
                                            <a @if (session()->get('pagina_retorno')) href="{{ session()->get('pagina_retorno') }}" @else href="/"  @endif><button type="submit"
                                                    class="btn-vermelho-outline-2 px-4 py-2 ml-md-3 mt-3">Voltar ao
                                                    Site</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalErro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="width: 100%; max-width: 500px;" role="document">
            <div class="modal-content" style="padding: 0px 0 30px 0; border-radius: 20px;">

                <div class="modal-body px-5 pt-0 pb-4">
                    <button type="button" id="close-modal" class="close cpointer" data-dismiss="modal" aria-label="Close"
                        style="position: absolute; top: 10px; right: 10px; z-index: 9;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="container-fluid mt-5">
                        <div class="row">
                            <div class="col-12 text-center">
                                <img src="{{ asset('imagens/icone_erro.png') }}" style="width: 100px;"
                                    alt="Ícone de Cadastro">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 text-center modal-erro-text">
                                <h1>Ops !</h1>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-12 text-center modal-precadastro-text">
                                <h2 id="titulo-erro-modal">Seu cadastro foi realizado com sucesso!</h2>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12 text-center modal-precadastro-text">
                                <h3 id="subtitulo-erro-modal">asdasdasdasd</h3>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12 text-center modal-precadastro-text">
                                <h4 id="texto-erro-modal">Caso tenha algum problema, entre em contato com um consultor.</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    @if (session()->get('erro_email'))
        <script>
            $(document).ready(function() {
                $("#titulo-erro-modal").html("E-mail já utilizado.");
                $("#subtitulo-erro-modal").html(
                    "Parece que o e-mail informado já está cadastrado no sistema. Caso já tenha criado uma conta, e não lembre a senha, você pode recuperá-la na página de login."
                );
                $("#modalErro").modal("show");
            })
        </script>
    @endif

    <script src="{{ asset('js/jquery.mask.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('input[name="telefone"]').mask('(00) 00000-0000', );
            $("select[name='estado']").change(function() {
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
                    success: function(data) {
                        html = "";
                        var cidades = JSON.parse(data);
                        for (var cidade in cidades) {
                            html += "<option value='" + cidades[cidade].id + "'>" + cidades[
                                cidade].nome + "</option>"
                        }
                        $("select[name='cidade']").html(html);
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            });
        })
    </script>
@endsection
