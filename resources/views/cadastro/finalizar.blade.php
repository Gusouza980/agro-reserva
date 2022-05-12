@extends('template.main')

@section('conteudo')
    <div class="container-fluid py-5 min-vh-100"
        style="background: url({{ asset('imagens/fundo-cadastro1.jpg') }}); background-position: bottom; background-size: cover;">
        @if (!session()->get('cliente')['finalizado'])
            <div class="row justify-content-center mt-5">
                <div class="col-10 col-md-6 col-lg-4 text-center text-white">
                    <h3>{{ __('messages.cadastro.cadastro_final_texto1') }}</h3>
                </div>
            </div>
            <div class="row justify-content-center mt-3">
                <div class="col-10 col-md-6 col-lg-4 text-center text-white">
                    <a href="https://api.whatsapp.com/send?phone=5514981809051" class="fa-2x"
                        style="color: #7E8298;"><i class="fab fa-whatsapp"></i></a>
                    <a href="mailto:contato@agroreserva.com.br" class="fa-2x mx-4" style="color: #7E8298;"><i
                            class="far fa-envelope"></i></a>
                    {{-- <a href="tel:+5514981809051" class="fa-2x" style="color: #7E8298;"><i
                            class="fas fa-phone"></i></a> --}}
                </div>
            </div>
        @endif
        <div class="row justify-content-center mt-5">
            <div class="col-12 text-left">
                <div id="container-form-cadastro">
                    @if (!session()->get('cliente')['finalizado'])
                        <form id="form-cadastro-completo" action="{{ route('cadastro.finalizar.salvar') }}" class="row form-cadastro0" method="post">
                            @csrf
                            <input type="hidden" name="anterior" value="{{ $anterior }}">
                            <div class="form-group col-12 input-cadastro d-flex justify-content-center">
                                <div class="mx-3">
                                    <div class="form-check form-check-inline mt-2">
                                        <input class="form-check-input-radio" type="radio" name="pessoa_fisica" value="1">
                                        <label class="form-check-label ml-2 label-branca">{{ __('messages.cadastro.pessoa_fisica') }}</label>
                                    </div>
                                </div>
                                <div class="mx-3">
                                    <div class="form-check form-check-inline mt-2">
                                        <input class="form-check-input-radio" type="radio" name="pessoa_fisica" value="0">
                                        <label class="form-check-label ml-2 label-branca">{{ __('messages.cadastro.pessoa_juridica') }}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="container-fluid" id="campos_pessoa_fisica" style="display: none;">
                                <div class="row">
                                    <div class="form-group col-12 input-cadastro">
                                        <label for="documento">CPF*</label>
                                        <input type="text" class="form-control" name="cpf" id="cpf"
                                            aria-describedby="" maxlenght="50" required>
                                    </div>
                                    <div class="form-group col-12 input-cadastro">
                                        <label for="rg">RG *</label>
                                        <input type="text" class="form-control" name="rg" id="rg" aria-describedby=""
                                            maxlenght="50" required>
                                    </div>
                                    <div class="form-group col-12 input-cadastro">
                                        <label for="nascimento">{{ __('messages.cadastro.nascimento') }}</label>
                                        <input type="text" class="form-control" pattern="\d{1,2}/\d{1,2}/\d{4}" placeholder="dd/mm/aaaa" name="nascimento" id="nascimento">
                                    </div>
                                </div>
                            </div>
                            <div class="container-fluid" id="campos_pessoa_juridica" style="display: none;">
                                <div class="row">
                                    <div class="form-group col-12 input-cadastro">
                                        <label for="cnpj">CNPJ*</label>
                                        <input type="text" class="form-control" name="cnpj" id="cnpj"
                                            aria-describedby="" maxlenght="50" required>
                                    </div>
                                </div>
                            </div>
                            <div class="container-fluid" id="campo_cep" style="display: none;">
                                <div class="row">
                                    <div class="form-group col-12 input-cadastro">
                                        <label for="nome_fazenda">{{ __('messages.cadastro.nome_fazenda') }}</label>
                                        <input type="text" class="form-control" name="nome_fazenda" id="nome_fazenda" aria-describedby=""
                                            maxlenght="150" @if(isset(session()->get("cliente")["nome_fazenda"])) value="{{session()->get("cliente")["nome_fazenda"]}}" @endif required>
                                    </div>
                                    <div class="form-group col-12 input-cadastro">
                                        <label for="inscricao_produtor_rural">Inscrição de Produtor Rural</label>
                                        <input type="text" class="form-control" name="inscricao_produtor_rural" id="inscricao_produtor_rural" aria-describedby=""
                                            maxlenght="20" required>
                                    </div>
                                    <div class="form-group col-12 input-cadastro">
                                        <label for="cep">CEP (De correspondência)*</label>
                                        <input type="text" class="form-control" name="cep" id="cep" aria-describedby="" required>
                                    </div>
                                </div>
                            </div>
                            <div class="container-fluid" id="endereco" style="display: none;">
                                <div class="row">
                                    <div class="form-group col-12 col-md-6 input-cadastro">
                                        <label for="cidade">{{ __('messages.cadastro.cidade') }} *</label>
                                        <input type="text" class="form-control" name="cidade" id="cidade" required
                                            maxlenght="50" aria-describedby="" placeholder="">
                                    </div>
                                    <div class="form-group col-12 col-md-6 input-cadastro">
                                        <label for="estado">{{ __('messages.cadastro.estado') }} *</label>
                                        <input type="text" class="form-control" name="estado" id="estado" required
                                            maxlenght="2" pattern="[a-zA-Z]{2}" aria-describedby="" placeholder="">
                                    </div>
                                    <div class="form-group col-12 col-md-8 input-cadastro">
                                        <label for="rua">{{ __('messages.cadastro.rua') }}</label>
                                        <input type="text" class="form-control" name="rua" id="rua" maxlenght="255"
                                            aria-describedby="" placeholder="">
                                    </div>
                                    <div class="form-group col-12 col-md-4 input-cadastro">
                                        <label for="numero">{{ __('messages.cadastro.numero') }}</label>
                                        <input type="text" class="form-control" name="numero" id="numero" maxlenght="6"
                                            aria-describedby="" placeholder="">
                                    </div>
                                    <div class="form-group col-12 input-cadastro">
                                        <label for="complemento">{{ __('messages.cadastro.complemento') }}</label>
                                        <input type="text" class="form-control" name="complemento" id="complemento"
                                            maxlenght="255" aria-describedby="" placeholder="">
                                    </div>
                                    <div class="form-group col-12 col-md-6 input-cadastro">
                                        <label for="bairro">{{ __('messages.cadastro.bairro') }}</label>
                                        <input type="text" class="form-control" name="bairro" id="bairro"
                                            aria-describedby="" maxlenght="50" placeholder="">
                                    </div>
                                    <div class="form-group col-12 col-md-6 input-cadastro">
                                        <label for="pais">{{ __('messages.cadastro.pais') }} *</label>
                                        <input type="text" class="form-control" name="pais" id="pais" required
                                            aria-describedby="" maxlenght="50" placeholder="">
                                    </div>

                                </div>

                                <div class="row mt-3">
                                    <div class="form-group col-12 col-md-6 input-cadastro">
                                        <label for="referencia_comercial1">{{ __('messages.cadastro.referencia_comercial') }} 1 *</label>
                                        <input type="text" class="form-control" name="referencia_comercial1"
                                            id="referencia_comercial1" aria-describedby="" placeholder="" required>
                                    </div>
                                    <div class="form-group col-12 col-md-6 input-cadastro">
                                        <label for="referencia_comercial1_tel">{{ __('messages.cadastro.telefone') }} *</label>
                                        <input type="text" class="form-control telefone" name="referencia_comercial1_tel"
                                            id="referencia_comercial1_tel" aria-describedby="" required>
                                    </div>
                                    <div class="form-group col-12 col-md-6 input-cadastro">
                                        <label for="referencia_comercial2">{{ __('messages.cadastro.referencia_comercial') }} 2</label>
                                        <input type="text" class="form-control" name="referencia_comercial2"
                                            id="referencia_comercial2" aria-describedby="" placeholder="">
                                    </div>
                                    <div class="form-group col-12 col-md-6 input-cadastro">
                                        <label for="referencia_comercial2_tel">{{ __('messages.cadastro.telefone') }}</label>
                                        <input type="text" class="form-control telefone" name="referencia_comercial2_tel"
                                            id="referencia_comercial2_tel" aria-describedby="">
                                    </div>
                                    <div class="form-group col-12 col-md-4 input-cadastro">
                                        <label for="referencia_bancaria_banco">{{ __('messages.cadastro.referencia_bancaria') }}</label>
                                        <input type="text" class="form-control" name="referencia_bancaria_banco"
                                            id="referencia_bancaria_banco" aria-describedby="" placeholder="">
                                    </div>
                                    <div class="form-group col-12 col-md-4 input-cadastro">
                                        <label for="referencia_bancaria_gerente">{{ __('messages.cadastro.gerente') }}</label>
                                        <input type="text" class="form-control" name="referencia_bancaria_gerente"
                                            id="referencia_bancaria_gerente" aria-describedby="" placeholder="">
                                    </div>
                                    <div class="form-group col-12 col-md-4 input-cadastro">
                                        <label for="referencia_bancaria_tel">{{ __('messages.cadastro.telefone') }}</label>
                                        <input type="text" class="form-control telefone" name="referencia_bancaria_tel"
                                            id="referencia_bancaria_tel" aria-describedby="">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-12 text-center text-lg-right">
                                        <button type="submit" class="btn btn-vermelho py-2 px-5" role="button"
                                            id="confirmar-cadastro-completo">Finalizar</button>
                                    </div>
                                </div>

                            </div>
                        </form>
                    @else
                        <div class="py-4 px-4" id="caixa-sucesso-cadastro">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <img src="{{ asset('imagens/icone_cadastro.png') }}" style="width: 100px;"
                                            alt="Ícone de Cadastro Completo">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-12 text-center modal-precadastro-text">
                                        <h4 style="line-height: 35px; letter-spacing: 1px;">{!! __('messages.cadastro.cadastro_final_texto_confirmacao') !!}</h4>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-12">
                                        <div class="text-center" id="botoes-finalizar">
                                            <a @if (session()->get('pagina_retorno')) href="{{ session()->get('pagina_retorno') }}" @else href="/"  @endif><button type="submit"
                                                    class="btn-vermelho-outline-2 px-4 py-2 ml-md-3 mt-3">{{ __('messages.cadastro.voltar_site') }}</button></a>
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

    {{-- <div class="modal fade" id="modalErro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
    </div> --}}

@endsection

@section('scripts')
    @if (session()->get('erro_email'))
        <script>
            $(document).ready(function() {
                $("#titulo-erro-modal").html("Tivemos um problema.");
                $("#subtitulo-erro-modal").html(
                    "{!! session()->get('erro_email') !!} Caso já tenha criado uma conta, e não lembre a senha, você pode recuperá-la na página de login."
                );
                $("#modalErro").modal("show");
            })
        </script>
    @endif
    <script src="{{ asset('js/jquery.mask.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.telefone').mask('(00) 00000-0000', );
            $("#cep").mask("00000-000")
            $("#cnpj").mask("99.999.999/9999-99");
            $("#cpf").mask("999.999.999-99");
            $("#nascimento").mask("99/99/9999");

            $("#cep").keyup(function() {
                if ($("#cep").val().length < 9) {
                    return false;
                }
                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if (validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#rua").val("...");
                        $("#bairro").val("...");
                        $("#cidade").val("...");
                        $("#estado").val("...");

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function(dados) {
                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#rua").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
                                $("#estado").val(dados.uf);
                                $("#pais").val("Brasil");
                                $("#endereco").slideDown(200);
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                alert("CEP não encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {

                }
            });

            $("#cep").focusout(function() {
                if ($("#cep").val().length >= 5 && $("#cep").val().length < 9) {
                    $("#rua").val("");
                    $("#bairro").val("");
                    $("#cidade").val("");
                    $("#estado").val("");
                    $("#pais").val("");
                    $("#endereco").slideDown(200);
                }
            });

            $("input[name='pessoa_fisica']").change(function(){
                if($(this).val() == "1"){
                    $("#cnpj").removeAttr("required");
                    $("#cpf").attr("required", "true");
                    $("#rg").attr("required", "true");
                    $("#campos_pessoa_juridica").slideUp(300, function(){
                        $("#campos_pessoa_fisica").slideDown(300, function(){
                            $("#campo_cep").slideDown(300);
                        });
                    })
                }else{
                    $("#cpf").removeAttr("required");
                    $("#rg").removeAttr("required");
                    $("#cnpj").attr("required", "true");
                    $("#campos_pessoa_fisica").slideUp(300, function(){
                        $("#campos_pessoa_juridica").slideDown(300, function(){
                            $("#campo_cep").slideDown(300);
                        });
                    })
                }
            });
        })
    </script>
@endsection
