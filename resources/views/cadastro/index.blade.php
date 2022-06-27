@extends('template.main2')

@section('conteudo')
<div class="w-full px-2 px-md-0 py-4 bg-[#F1F1F1]">
    <div class="w-fit mx-auto rounded-[15px] px-5 bg-white py-5 shadow-md relative">
        {{-- <img src="{{ asset('imagens/vetor-cowboy.png') }}" class="absolute left-0 bottom-0 opacity-10" alt=""> --}}
        <div class="w-full flex justify-content-center">
            <ul class="steps">
                <li class="step step-warning text-cinza-escuro text-[12px] md:text-[15px]">Cadastro Inicial</li>
                <li class="step @if (session()->get('cliente')) step-warning @endif text-cinza-escuro text-[12px] md:text-[15px]">Cadastro Incial Completo</li>
                <li class="step text-cinza-escuro text-[12px] md:text-[15px]">Cadastro Final</li>
                <li class="step text-cinza-escuro text-[12px] md:text-[15px]">Tudo Pronto</li>
            </ul>
        </div>
        @if (!session()->get('cliente'))
            <div class="w-full flex justify-content-center mt-5 text-center">
                <h2 class="text-cinza-escuro font-montserrat text-[18px] font-bold">{{ __('messages.cadastro.vamos_criar_acesso') }}</h2>
            </div>
        @endif
        <div class="w-full flex justify-content-center mt-5">
            <div class="w-full text-left">
                <div id="container-form-cadastro">
                    @if (!session()->get('cliente'))
                        <form id="form-pre-cadastro" action="{{ route('cadastro.salvar') }}" class="w-full flex flex-wrap items-end form-cadastro0" method="post">
                            @csrf
                            <input type="hidden" name="anterior" value="{{ $anterior }}">
                            <input type="hidden" name="pais" value="">
                            <div class="w-full mb-3">
                                <label for="nome" class="font-montserrat text-cinza-escuro">{{ __('messages.cadastro.nome_completo') }}</label>
                                <input type="text" class="form-control" name="nome" id="nome" aria-describedby="" required>
                            </div>
                            <div class="w-full mb-3">
                                <label for="email" class="font-montserrat text-cinza-escuro">E-mail</label>
                                <input type="email" class="form-control" name="email" id="email" aria-describedby=""
                                    required>
                            </div>
                            {{-- <div class="w-full mb-3">
                                <label for="telefone">{{ __('messages.cadastro.nascionalidade') }}</label>
                                <div class="form-group input-cadastro d-flex justify-content-start">
                                    <div class="mx-3">
                                        <div class="form-check form-check-inline mt-2">
                                            <input class="form-check-input-radio" type="radio" name="estrangeiro" value="0">
                                            <label class="form-check-label ml-2 label-branca">{{ __('messages.cadastro.brasileiro') }}</label>
                                        </div>
                                    </div>
                                    <div class="mx-3">
                                        <div class="form-check form-check-inline mt-2">
                                            <input class="form-check-input-radio" type="radio" name="estrangeiro" value="1">
                                            <label class="form-check-label ml-2 label-branca">{{ __('messages.cadastro.estrangeiro') }}</label>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}

                            <div class="w-1/3 mb-3">
                                <label for="ddd" class="flex flex-row items-center text-cinza-escuro font-montserrat">
                                    DDI 
                                    <picture class="ml-2">
                                        <img
                                            id="flag-icon"    
                                            src=""
                                            width="16"
                                            height="12"
                                            style="display: none;">
                                    </picture>
                                
                                </label>
                                <select class="form-control" name="ddi" id="ddi" required>
                                    @foreach($paises as $pais)
                                        <option value="{{ $pais->code }}" @if($pais->iso == "BR") selected @endif>{{ $pais->name }} ({{ $pais->code }})</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="w-2/3 mb-3 pl-2">
                                <label for="telefone" class="font-montserrat text-cinza-escuro">{{ __('messages.cadastro.telefone') }}</label>
                                <input type="text" class="form-control" name="telefone" id="telefone" aria-describedby=""
                                    required placeholder="99999-9999">
                            </div>
                 
                            <div class="w-full mb-3">
                                <label for="senha" class="font-montserrat text-cinza-escuro">{{ __('messages.cadastro.senha_acesso') }}</label>
                                <input type="password" class="form-control" name="senha" id="senha" aria-describedby=""
                                    required placeholder="******">
                            </div>

                            <div class="w-full mb-3">
                                <label for="telefone" class="font-montserrat text-cinza-escuro">{{ __('messages.cadastro.segmento_interesse') }}</label>
                                <div class="form-group input-cadastro d-flex justify-content-start">
                                    <div class="mx-3">
                                        <div class="flex items-center mt-2">
                                            <input class="checkbox border-warning checked:bg-[#e0a800] checked:bg-none" type="checkbox" name="segmento[]" value="Leite">
                                            <label class="form-check-label ml-2 text-cinza-escuro">{{ __('messages.cadastro.leite') }}</label>
                                        </div>
                                    </div>
                                    <div class="mx-3">
                                        <div class="flex items-center mt-2">
                                            <input class="checkbox border-warning checked:bg-[#e0a800] checked:bg-none" type="checkbox" name="segmento[]" value="Corte">
                                            <label class="form-check-label ml-2 text-cinza-escuro">{{ __('messages.cadastro.corte') }}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-12 text-center text-lg-right">
                                <button type="submit" class="btn btn-warning hover:bg-orange-500" role="button"
                                    id="confirmar-precadastro">{{ __('messages.cadastro.cadastrar') }}</button>
                            </div>
                            <div class="col-12 text-center text-lg-left text-cinza-escuro form-cadastro0">
                                <span>{!! __('messages.cadastro.ja_tem_conta') !!}</span>
                            </div>
                        </form>
                    @else
                        <div class="w-full flex flex-column py-4 px-4" id="caixa-sucesso-cadastro">
                            <div class="w-full flex justify-content-center">
                                <img src="{{ asset('imagens/icone_pre_cadastro.png') }}" style="width: 100px;"
                                    alt="Ícone de Pré Cadastro">
                            </div>
                            <div class="w-full mt-3 text-center modal-precadastro-text">
                                <h4 style="line-height: 35px; letter-spacing: 1px;">{!! __('messages.cadastro.cadastro_inicial_texto_confirmacao') !!}</h4>
                            </div>
                            <div class="w-full flex justify-content-center mt-4" id="botoes-finalizar">
                                    <a href="{{ route('cadastro.finalizar') }}"><button type="submit"
                                            class="btn-vermelho px-4 py-2 mt-3">{{ __('messages.cadastro.completar_agora') }}</button></a>
                                    <a @if (session()->get('pagina_retorno')) href="{{ session()->get('pagina_retorno') }}" @else href="/"  @endif><button type="submit"
                                            class="btn-vermelho-outline-2 px-4 py-2 ml-md-3 mt-3">{{ __('messages.cadastro.voltar_site') }}</button></a>
                            </div>
                        </div>
                    @endif
                </div>
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

            $.getJSON("json/mascaras_telefone.json", function(data){
                var mascaras = data
                $(mascaras).each(function(index, element){
                    if(element.iso == "BR"){
                        var mask = $(element.mask).get(-1);
                        $('input[name="pais"]').val(element.name);
                        $('input[name="telefone"]').mask(mask.replaceAll("#", "0"), );
                        $('input[name="telefone"]').attr("placeholder", mask.replaceAll("#", "0"));
                        $('input[name="telefone"]').attr("minlength", mask.length);
                        $('input[name="telefone"]').attr("maxlength", mask.length);
                        var flag = element.iso.toLowerCase();
                        console.log("https://flagcdn.com/16x12/" + flag + ".webp");
                        $("#flag-icon").attr("src", "https://flagcdn.com/16x12/" + flag + ".webp");
                        $("#flag-icon").show();
                    }
                });
            });

            $("#ddi").change(function(){
                var ddi = $(this).val();
                $.getJSON("json/mascaras_telefone.json", function(data){
                    var mascaras = data;
                    var achou = false;
                    $(mascaras).each(function(index, element){
                        if(element.code == ddi){
                            achou = true;
                            $('input[name="telefone"]').val("");
                            $('input[name="pais"]').val(element.name);
                            if(Array.isArray(element.mask)){
                                var mask = $(element.mask).get(-1);
                                $('input[name="telefone"]').mask(mask.replaceAll("#", "0"), );
                                $('input[name="telefone"]').attr("placeholder", mask.replaceAll("#", "0"));
                                $('input[name="telefone"]').attr("minlength", mask.length);
                                $('input[name="telefone"]').attr("maxlength", mask.length);
                                var flag = element.iso.toLowerCase();
                                console.log("https://flagcdn.com/16x12/" + flag + ".webp");
                                $("#flag-icon").attr("src", "https://flagcdn.com/16x12/" + flag + ".webp");
                            }else{
                                $('input[name="telefone"]').mask(element.mask.replaceAll("#", "0"), );
                                $('input[name="telefone"]').attr("placeholder", element.mask.replaceAll("#", "0"));
                                $('input[name="telefone"]').attr("minlength", element.mask.length);
                                $('input[name="telefone"]').attr("maxlength", element.mask.length);
                                var flag = element.iso.toLowerCase();
                                console.log("https://flagcdn.com/16x12/" + flag + ".webp");
                                $("#flag-icon").attr("src", "https://flagcdn.com/16x12/" + flag + ".webp");
                            }
                        }
                    });
                    if(!achou){
                        $('input[name="telefone"]').mask("#", );
                        $('input[name="telefone"]').attr("placeholder", "Digite seu telefone completo");
                        $('input[name="telefone"]').removeAttr("minlength");
                    }
                }); 
            })
            

            $('input[name="ddd"]').mask('00', );
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
