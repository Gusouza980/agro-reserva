@extends('template.main2')

@section('conteudo')
<div class="w-full px-2 px-md-0 py-4 bg-[#F1F1F1]">
    <div class="w-fit mx-auto rounded-[15px] px-5 bg-white py-5 shadow-md relative">
        @if (!session()->get('cliente')['finalizado'])
            <div class="w-full flex justify-content-center">
                <h3 class="font-montserrat text-cinza-escuro font-semibold">{{ __('messages.cadastro.cadastro_final_texto1') }}</h3>
            </div>
            <div class="w-full flex justify-content-center mt-3">
                <a href="https://api.whatsapp.com/send?phone=5514981809051" class="fa-lg"
                    style="color: #7E8298;"><i class="fab fa-whatsapp"></i></a>
                <a href="mailto:contato@agroreserva.com.br" class="fa-lg mx-4" style="color: #7E8298;"><i
                        class="far fa-envelope"></i></a>
            </div>
        @endif
        <div class="w-full flex justify-content-center mt-5">
            <div id="container-form-cadastro">
                @if (!session()->get('cliente')['finalizado'])
                    <form id="form-cadastro-completo" action="{{ route('cadastro.finalizar.salvar') }}" class="row form-cadastro0" method="post">
                        @csrf
                        <input type="hidden" name="anterior" value="{{ $anterior }}">
                        <div class="form-group col-12 d-flex justify-content-center">
                            <div class="mx-3">
                                <div class="flex items-center mt-2">
                                    <input class="radio checked:bg-[#e0a800] checked:bg-none border-2 border-warning checked:shadow-none checked:animate-none" type="radio" name="pessoa_fisica" value="1">
                                    <label class="form-check-label ml-2 text-cinza-escuro font-medium">{{ __('messages.cadastro.pessoa_fisica') }}</label>
                                </div>
                            </div>
                            <div class="mx-3">
                                <div class="flex items-center mt-2">
                                    <input class="radio checked:bg-[#e0a800] checked:bg-none border-2 border-warning checked:shadow-none checked:animate-none" type="radio" name="pessoa_fisica" value="0">
                                    <label class="form-check-label ml-2 text-cinza-escuro font-medium">{{ __('messages.cadastro.pessoa_juridica') }}</label>
                                </div>
                            </div>
                        </div>
                        <div class="w-full" id="campos_pessoa_fisica" style="display: none;">
                            <div class="w-full mb-3">
                                <label for="documento" class="font-montserrat text-cinza-escuro">CPF*</label>
                                <input type="text" class="form-control" name="cpf" id="cpf"
                                    aria-describedby="" maxlenght="50" required>
                            </div>
                            <div class="w-full mb-3">
                                <label for="rg" class="font-montserrat text-cinza-escuro">RG *</label>
                                    <input type="text" class="form-control" name="rg" id="rg" aria-describedby=""
                                        maxlenght="50" required>
                            </div>
                            <div class="w-full mb-3">
                                <label for="nascimento" class="font-montserrat text-cinza-escuro">{{ __('messages.cadastro.nascimento') }}</label>
                                <input type="text" class="form-control" pattern="\d{1,2}/\d{1,2}/\d{4}" placeholder="dd/mm/aaaa" name="nascimento" id="nascimento">
                            </div>
                        </div>
                        <div class="w-full" id="campos_pessoa_juridica" style="display: none;">
                            <div class="w-full mb-3">
                                <label for="cnpj" class="font-montserrat text-cinza-escuro">CNPJ*</label>
                                <input type="text" class="form-control" name="cnpj" id="cnpj"
                                    aria-describedby="" maxlenght="50" required>
                            </div>
                        </div>
                        <div class="w-full" id="campo_cep" style="display: none;">
                            <div class="w-full">
                                <div class="w-full mb-3">
                                    <label for="nome_fazenda" class="font-montserrat text-cinza-escuro">{{ __('messages.cadastro.nome_fazenda') }}</label>
                                    <input type="text" class="form-control" name="nome_fazenda" id="nome_fazenda" aria-describedby=""
                                        maxlenght="150" @if(isset(session()->get("cliente")["nome_fazenda"])) value="{{session()->get("cliente")["nome_fazenda"]}}" @endif required>
                                </div>
                                <div class="w-full mb-3">
                                    <label for="inscricao_produtor_rural" class="font-montserrat text-cinza-escuro">Inscrição de Produtor Rural</label>
                                    <input type="text" class="form-control" name="inscricao_produtor_rural" id="inscricao_produtor_rural" aria-describedby=""
                                        maxlenght="20" required>
                                </div>
                                <div class="w-full mb-3">
                                    <label for="cep" class="font-montserrat text-cinza-escuro">CEP (De correspondência)*</label>
                                    <input type="text" class="form-control" name="cep" id="cep" aria-describedby="" required>
                                </div>
                            </div>
                        </div>
                        <div class="w-full" id="endereco" style="display: none;">
                            <div class="w-full flex flex-row flex-wrap">
                                <div class="w-full md:w-1/2 pr-0 pr-md-2 mb-3">
                                    <label for="cidade" class="font-montserrat text-cinza-escuro">{{ __('messages.cadastro.cidade') }} *</label>
                                    <input type="text" class="form-control" name="cidade" id="cidade" required
                                        maxlenght="50" aria-describedby="" placeholder="">
                                </div>
                                <div class="w-full md:w-1/2 mb-3">
                                    <label for="estado" class="font-montserrat text-cinza-escuro">{{ __('messages.cadastro.estado') }} *</label>
                                    <input type="text" class="form-control" name="estado" id="estado" required
                                        maxlenght="2" pattern="[a-zA-Z]{2}" aria-describedby="" placeholder="">
                                </div>
                                <div class="w-full md:w-2/3 mb-3 pr-0 pr-md-2">
                                    <label for="rua" class="font-montserrat text-cinza-escuro">{{ __('messages.cadastro.rua') }}</label>
                                    <input type="text" class="form-control" name="rua" id="rua" maxlenght="255"
                                        aria-describedby="" placeholder="">
                                </div>
                                <div class="w-full md:w-1/3 mb-3">
                                    <label for="numero" class="font-montserrat text-cinza-escuro">{{ __('messages.cadastro.numero') }}</label>
                                    <input type="text" class="form-control" name="numero" id="numero" maxlenght="6"
                                        aria-describedby="" placeholder="">
                                </div>
                                <div class="w-full mb-3">
                                    <label for="complemento" class="font-montserrat text-cinza-escuro">{{ __('messages.cadastro.complemento') }}</label>
                                    <input type="text" class="form-control" name="complemento" id="complemento"
                                        maxlenght="255" aria-describedby="" placeholder="">
                                </div>
                                <div class="w-full md:w-1/2 mb-3 pr-0 pr-md-2">
                                    <label for="bairro" class="font-montserrat text-cinza-escuro">{{ __('messages.cadastro.bairro') }}</label>
                                    <input type="text" class="form-control" name="bairro" id="bairro"
                                        aria-describedby="" maxlenght="50" placeholder="">
                                </div>
                                <div class="w-full md:w-1/2 mb-3">
                                    <label for="pais" class="font-montserrat text-cinza-escuro">{{ __('messages.cadastro.pais') }} *</label>
                                    <input type="text" class="form-control" name="pais" id="pais" required
                                        aria-describedby="" maxlenght="50" placeholder="">
                                </div>

                            </div>

                            <div class="w-full flex flex-row flex-wrap mt-3">
                                <div class="w-full md:w-1/2 mb-3 pr-0 pr-md-2">
                                    <label for="referencia_comercial1" class="font-montserrat text-cinza-escuro">{{ __('messages.cadastro.referencia_comercial') }} 1 *</label>
                                    <input type="text" class="form-control" name="referencia_comercial1"
                                        id="referencia_comercial1" aria-describedby="" placeholder="" required>
                                </div>
                                <div class="w-full md:w-1/2 mb-3">
                                    <label for="referencia_comercial1_tel" class="font-montserrat text-cinza-escuro">{{ __('messages.cadastro.telefone') }} *</label>
                                    <input type="text" class="form-control telefone" name="referencia_comercial1_tel"
                                        id="referencia_comercial1_tel" aria-describedby="" required>
                                </div>
                                <div class="w-full md:w-1/2 mb-3 pr-0 pr-md-2">
                                    <label for="referencia_comercial2" class="font-montserrat text-cinza-escuro">{{ __('messages.cadastro.referencia_comercial') }} 2</label>
                                    <input type="text" class="form-control" name="referencia_comercial2"
                                        id="referencia_comercial2" aria-describedby="" placeholder="">
                                </div>
                                <div class="w-full md:w-1/2 mb-3">
                                    <label for="referencia_comercial2_tel" class="font-montserrat text-cinza-escuro">{{ __('messages.cadastro.telefone') }}</label>
                                    <input type="text" class="form-control telefone" name="referencia_comercial2_tel"
                                        id="referencia_comercial2_tel" aria-describedby="">
                                </div>
                                <div class="w-full md:w-1/3 mb-3 pr-0 pr-md-2">
                                    <label for="referencia_bancaria_banco" class="font-montserrat text-cinza-escuro">{{ __('messages.cadastro.referencia_bancaria') }}</label>
                                    <input type="text" class="form-control" name="referencia_bancaria_banco"
                                        id="referencia_bancaria_banco" aria-describedby="" placeholder="">
                                </div>
                                <div class="w-full md:w-1/3 mb-3 pr-0 pr-md-2">
                                    <label for="referencia_bancaria_gerente" class="font-montserrat text-cinza-escuro">{{ __('messages.cadastro.gerente') }}</label>
                                    <input type="text" class="form-control" name="referencia_bancaria_gerente"
                                        id="referencia_bancaria_gerente" aria-describedby="" placeholder="">
                                </div>
                                <div class="w-full md:w-1/3 mb-3">
                                    <label for="referencia_bancaria_tel" class="font-montserrat text-cinza-escuro">{{ __('messages.cadastro.telefone') }}</label>
                                    <input type="text" class="form-control telefone" name="referencia_bancaria_tel"
                                        id="referencia_bancaria_tel" aria-describedby="">
                                </div>
                            </div>

                            <div class="w-full text-center text-lg-right">
                                <button type="submit" class="btn btn-warning hover:bg-orange-500" role="button"
                                id="confirmar-precadastro">Finalizar</button>
                            </div>

                        </div>
                    </form>
                @else
                    <div class="py-4 px-4" id="caixa-sucesso-cadastro">
                        <div class="w-full">
                            <div class="w-full flex justify-content-center">
                                <img src="{{ asset('imagens/icone_cadastro.png') }}" style="width: 100px;"
                                    alt="Ícone de Cadastro Completo">
                            </div>
                            <div class="w-full mt-3">
                                <div class="w-full text-center modal-precadastro-text">
                                    <h4 style="line-height: 35px; letter-spacing: 1px;">{!! __('messages.cadastro.cadastro_final_texto_confirmacao') !!}</h4>
                                </div>
                            </div>
                            <div class="w-full mt-4">
                                <div class="w-full">
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
