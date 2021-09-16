@extends('template.main')

@section('conteudo')
    <div class="container-fluid py-5 min-vh-100"
        style="background: url({{ asset('imagens/fundo-cadastro1.jpg') }}); background-position: bottom; background-size: cover;">
        @if (!session()->get('cliente')['finalizado'])
            <div class="row justify-content-center mt-5">
                <div class="col-10 col-md-6 col-lg-4 text-left text-white">
                    <h3>Se ao longo do cadastro surgir alguma dúvida, chama no brete! Sempre tem alguém de cá pronto para te
                        atender.</h3>
                </div>
            </div>
        @endif
        <div class="row justify-content-center mt-5">
            <div class="col-12 text-left">
                <div id="container-form-cadastro">
                    @if (!session()->get('cliente')['finalizado'])
                        <form action="{{ route('cadastro.finalizar.salvar') }}" class="row form-cadastro0" method="post">
                            @csrf
                            <input type="hidden" name="anterior" value="{{ $anterior }}">
                            <div class="form-group col-12 input-cadastro">
                                <label for="documento">CPF/CNPJ *</label>
                                <input type="text" class="form-control" name="documento" id="documento" aria-describedby=""
                                    maxlenght="50" required placeholder="Informe seu CPF ou CNPJ">
                            </div>
                            <div class="form-group col-12 input-cadastro">
                                <label for="cep">CEP *</label>
                                <input type="text" class="form-control" name="cep" id="cep" aria-describedby="" required
                                    placeholder="Informe seu cep">
                            </div>
                            <div class="container-fluid" id="endereco" style="display: none;">
                                <div class="row">
                                    <div class="form-group col-12 col-md-6 input-cadastro">
                                        <label for="cidade">Cidade *</label>
                                        <input type="text" class="form-control" name="cidade" id="cidade" required
                                            maxlenght="50" aria-describedby="" placeholder="">
                                    </div>
                                    <div class="form-group col-12 col-md-6 input-cadastro">
                                        <label for="estado">Estado *</label>
                                        <input type="text" class="form-control" name="estado" id="estado" required
                                            maxlenght="2" aria-describedby="" placeholder="">
                                    </div>
                                    <div class="form-group col-12 col-md-8 input-cadastro">
                                        <label for="rua">Rua</label>
                                        <input type="text" class="form-control" name="rua" id="rua" maxlenght="255"
                                            aria-describedby="" placeholder="">
                                    </div>
                                    <div class="form-group col-12 col-md-4 input-cadastro">
                                        <label for="numero">Número</label>
                                        <input type="text" class="form-control" name="numero" id="numero" maxlenght="6"
                                            aria-describedby="" placeholder="">
                                    </div>
                                    <div class="form-group col-12 input-cadastro">
                                        <label for="complemento">Complemento</label>
                                        <input type="text" class="form-control" name="complemento" id="complemento"
                                            maxlenght="255" aria-describedby="" placeholder="">
                                    </div>
                                    <div class="form-group col-12 col-md-6 input-cadastro">
                                        <label for="bairro">Bairro</label>
                                        <input type="text" class="form-control" name="bairro" id="bairro"
                                            aria-describedby="" maxlenght="50" placeholder="">
                                    </div>
                                    <div class="form-group col-12 col-md-6 input-cadastro">
                                        <label for="pais">País *</label>
                                        <input type="text" class="form-control" name="pais" id="pais" required
                                            aria-describedby="" maxlenght="50" placeholder="">
                                    </div>

                                </div>

                                <div class="row mt-3">
                                    <div class="form-group col-12 col-md-6 input-cadastro">
                                        <label for="referencia_comercial1">Referência Comercial 1</label>
                                        <input type="text" class="form-control" name="referencia_comercial1"
                                            id="referencia_comercial1" aria-describedby="" placeholder="">
                                    </div>
                                    <div class="form-group col-12 col-md-6 input-cadastro">
                                        <label for="referencia_comercial1_tel">Telefone</label>
                                        <input type="text" class="form-control" name="referencia_comercial1_tel"
                                            id="referencia_comercial1_tel" aria-describedby="" placeholder="">
                                    </div>
                                    <div class="form-group col-12 col-md-6 input-cadastro">
                                        <label for="referencia_comercial2">Referência Comercial 2</label>
                                        <input type="text" class="form-control" name="referencia_comercial2"
                                            id="referencia_comercial2" aria-describedby="" placeholder="">
                                    </div>
                                    <div class="form-group col-12 col-md-6 input-cadastro">
                                        <label for="referencia_comercial2_tel">Telefone</label>
                                        <input type="text" class="form-control" name="referencia_comercial2_tel"
                                            id="referencia_comercial2_tel" aria-describedby="" placeholder="">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-12 text-center text-lg-right">
                                        <button type="submit" class="btn btn-vermelho py-2 px-5"
                                            role="button">Finalizar</button>
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
                                        <h4 style="line-height: 35px; letter-spacing: 1px;">Oba! <b>Seu cadastro completo
                                                foi enviado</b>. Assim que o nosso time de análise aprovar, você receberá um
                                            email e já pode comprar conosco.</h4>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-12">
                                        <div class="text-center" id="botoes-finalizar">
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


@endsection

@section('scripts')
    <script src="{{ asset('js/jquery.mask.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('input[name="telefone"]').mask('(00) 00000-0000', );
            $("#cep").mask("00000-000")

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
        })
    </script>
@endsection
