@extends('template.main')

@section('conteudo')
    <div class="container-fluid py-5 min-vh-100"
        style="background: url({{ asset('imagens/fundo-cadastro1.jpg') }}); background-position: bottom; background-size: cover;">
        @if (!session()->get('cliente'))
            <div class="row justify-content-center mt-5">
                <div class="col-10 col-md-6 col-lg-4 text-center text-white">
                    <h2>{{ __('messages.cadastro.vamos_criar_acesso') }}</h2>
                </div>
            </div>
        @endif
        <div class="row justify-content-center mt-5">
            <div class="col-12 text-left">
                <div id="container-form-cadastro">
                    @if (!session()->get('cliente'))
                        <form id="form-pre-cadastro" action="{{ route('cadastro.salvar') }}" class="row form-cadastro0" method="post">
                            @csrf
                            <input type="hidden" name="anterior" value="{{ $anterior }}">
                            <input type="hidden" name="pais" value="">
                            <div class="form-group col-12 input-cadastro">
                                <label for="nome">{{ __('messages.cadastro.nome_completo') }}</label>
                                <input type="text" class="form-control" name="nome" id="nome" aria-describedby="" required>
                            </div>
                            <div class="form-group col-12 input-cadastro">
                                <label for="email">E-mail</label>
                                <input type="email" class="form-control" name="email" id="email" aria-describedby=""
                                    required>
                            </div>
                            {{-- <div class="form-group col-12 input-cadastro">
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

                            <div class="form-group col-5 input-cadastro">
                                <label for="ddd">
                                    DDI 
                                    <picture>
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

                            {{-- <div class="form-group col-2 input-cadastro">
                                <label for="ddd">DDD</label>
                                <input type="text" class="form-control" name="ddd" id="ddd" maxlength="2" aria-describedby=""
                                    required placeholder="">
                            </div> --}}

                            <div class="form-group col-7 input-cadastro">
                                <label for="telefone">{{ __('messages.cadastro.telefone') }}</label>
                                <input type="text" class="form-control" name="telefone" id="telefone" aria-describedby=""
                                    required placeholder="99999-9999">
                            </div>
                 
                            <div class="form-group col-12 input-cadastro">
                                <label for="senha">{{ __('messages.cadastro.senha_acesso') }}</label>
                                <input type="password" class="form-control" name="senha" id="senha" aria-describedby=""
                                    required placeholder="******">
                            </div>

                            <div class="form-group col-12 input-cadastro">
                                <label for="telefone">{{ __('messages.cadastro.segmento_interesse') }}</label>
                                <div class="form-group input-cadastro d-flex justify-content-start">
                                    <div class="mx-3">
                                        <div class="form-check form-check-inline mt-2">
                                            <input class="form-check-input-radio" type="checkbox" name="segmento[]" value="Leite">
                                            <label class="form-check-label ml-2 label-branca">{{ __('messages.cadastro.leite') }}</label>
                                        </div>
                                    </div>
                                    <div class="mx-3">
                                        <div class="form-check form-check-inline mt-2">
                                            <input class="form-check-input-radio" type="checkbox" name="segmento[]" value="Corte">
                                            <label class="form-check-label ml-2 label-branca">{{ __('messages.cadastro.corte') }}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                    id="confirmar-precadastro">{{ __('messages.cadastro.cadastrar') }}</button>
                            </div>
                            <div class="col-12 text-center text-lg-left text-white form-cadastro0">
                                <span>{!! __('messages.cadastro.ja_tem_conta') !!}</span>
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
                                        <h4 style="line-height: 35px; letter-spacing: 1px;">{!! __('messages.cadastro.cadastro_inicial_texto_confirmacao') !!}</h4>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-12">
                                        <div class="text-center" id="botoes-finalizar">
                                            <a href="{{ route('cadastro.finalizar') }}"><button type="submit"
                                                    class="btn-vermelho px-4 py-2 mt-3">{{ __('messages.cadastro.completar_agora') }}</button></a>
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
