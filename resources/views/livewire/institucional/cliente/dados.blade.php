<div class="w1200 mx-auto">
    
    <div class="alert alert-success shadow-lg mb-5 @if(!session()->get("sucesso")) hidden @endif" id="alert-salvamento-dados">
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            <span>{{ session()->get("sucesso") }}</span>
        </div>
    </div>
    <form class="w-full" wire:submit.prevent='salvar'>
        <div class="w-full mt-4 z-10 flex flex-row duration-500 hover:shadow-md flex-wrap bg-[#F1F1F1] py-3 px-2 rounded-b-[15px] rounded-tr-[15px] relative">
            <input type="hidden" name="pais" value="" wire:model="cliente.pais">
            <div class="px-2 h-[30px] flex items-center rounded-t-lg bg-slate-500 z-0 text-white absolute top-[-30px] left-0">
                <h5 class="font-montserrat font-bold font-lg">Informações Gerais</h5>
            </div>
            <div class="w-full md:w-1/3 px-2">
                <div class="mb-3">
                    <label for="" class="form-label text-cinza-escuro font-montserrat">Nome</label>
                    <input type="text"
                        class="form-control" name="" id="" aria-describedby="helpId" placeholder="" required wire:model="cliente.nome_dono">
                </div>
            </div>
            <div class="w-full md:w-1/3 px-2">
                <div class="mb-3">
                    <label for="" class="form-label text-cinza-escuro font-montserrat">E-mail</label>
                    <input type="text"
                        class="form-control" name="" id="" aria-describedby="helpId" placeholder="" required wire:model="cliente.email">
                </div>
            </div>
            <div class="w-full md:w-1/3 px-2">
                <div class="mb-3">
                    <label for="" class="form-label text-cinza-escuro font-montserrat">Nome da Fazenda</label>
                    <input type="text"
                        class="form-control" name="" id="" aria-describedby="helpId" placeholder="" required wire:model="cliente.nome_fazenda">
                </div>
            </div>
            <div class="w-full md:w-1/3 px-2">
                <div class="mb-3">
                    <label for="" class="form-label text-cinza-escuro font-montserrat">Data de Nascimento</label>
                    <input type="date"
                        class="form-control block flex-row" name="" id="" aria-describedby="helpId" placeholder="" required wire:model="cliente.nascimento">
                </div>
            </div>
            <div class="w-full md:w-1/3 px-2">
                <div class="mb-3">
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
                    <select class="form-control" name="ddi" id="ddi" required wire:model="codigo_pais">
                        @foreach($paises as $pais)
                            <option value="{{ $pais->code }}" @if($pais->iso == "BR") selected @endif>{{ $pais->name }} ({{ $pais->code }})</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="w-full md:w-1/3 px-2">
                <div class="mb-3">
                    <label for="" class="form-label text-cinza-escuro font-montserrat">Telefone</label>
                    <input type="text"
                        class="form-control" name="telefone" id="telefone" required placeholder="99999-9999" wire:model="cliente.telefone">
                </div>
            </div>
            @if($cliente["pessoa_fisica"])
                <div class="w-full md:w-1/3 px-2">
                    <div class="mb-3">
                        <label for="" class="form-label text-cinza-escuro font-montserrat">CPF</label>
                        <input type="text" id="cpf"
                            class="form-control" required wire:model="cliente.cpf">
                    </div>
                </div>
                <div class="w-full md:w-1/3 px-2">
                    <div class="mb-3">
                        <label for="" class="form-label text-cinza-escuro font-montserrat">RG</label>
                        <input type="text" id="rg"
                            class="form-control" maxlength="30" required wire:model="cliente.rg">
                    </div>
                </div>
            @else
                <div class="w-full md:w-1/3 px-2">
                    <div class="mb-3">
                        <label for="" class="form-label text-cinza-escuro font-montserrat">CNPJ</label>
                        <input type="text" id="cnpj"
                            class="form-control" required wire:model="cliente.cnpj">
                    </div>
                </div>
            @endif
        </div>

        <div class="w-full mt-[70px] z-10 flex flex-row duration-500 hover:shadow-md flex-wrap bg-[#F1F1F1] py-3 px-2 rounded-b-[15px] rounded-tr-[15px] relative">
            <div class="px-2 h-[30px] flex items-center rounded-t-lg bg-slate-500 z-0 text-white absolute top-[-30px] left-0">
                <h5 class="font-montserrat font-bold font-lg">Informações de Correspondência</h5>
            </div>
            <div class="w-full md:w-1/5 px-2">
                <div class="mb-3">
                    <label for="" class="form-label text-cinza-escuro font-montserrat">CEP</label>
                    <input type="text"
                        class="form-control" name="" id="cep" aria-describedby="helpId" placeholder="" required wire:model="cliente.cep">
                        <small class="text-danger" id="erro-cep"></small>
                </div>
            </div>
            <div class="w-full md:w-1/5 px-2">
                <div class="mb-3">
                    <label for="" class="form-label text-cinza-escuro font-montserrat">Cidade</label>
                    <input type="text"
                        class="form-control" name="" id="cidade" aria-describedby="helpId" placeholder="" required wire:model="cliente.cidade">
                </div>
            </div>
            <div class="w-full md:w-1/5 px-2">
                <div class="mb-3">
                    <label for="" class="form-label text-cinza-escuro font-montserrat">Estado</label>
                    <input type="text"
                        class="form-control" name="" id="estado" aria-describedby="helpId" placeholder="" required wire:model="cliente.estado">
                </div>
            </div>
            <div class="w-full md:w-2/5 px-2">
                <div class="mb-3">
                    <label for="" class="form-label text-cinza-escuro font-montserrat">Rua</label>
                    <input type="text"
                        class="form-control" name="" id="rua" aria-describedby="helpId" placeholder="" required wire:model="cliente.rua">
                </div>
            </div>
            <div class="w-full md:w-1/5 px-2">
                <div class="mb-3">
                    <label for="" class="form-label text-cinza-escuro font-montserrat">Número</label>
                    <input type="text"
                        class="form-control" name="" id="numero" aria-describedby="helpId" placeholder="" required wire:model="cliente.numero">
                </div>
            </div>
            <div class="w-full md:w-1/5 px-2">
                <div class="mb-3">
                    <label for="" class="form-label text-cinza-escuro font-montserrat">Bairro</label>
                    <input type="text"
                        class="form-control" name="" id="bairro" aria-describedby="helpId" placeholder="" required wire:model="cliente.bairro">
                </div>
            </div>
            <div class="w-full md:w-3/5 px-2">
                <div class="mb-3">
                    <label for="" class="form-label text-cinza-escuro font-montserrat">Complemento</label>
                    <input type="text"
                        class="form-control" name="" id="complemento" aria-describedby="helpId" placeholder="" wire:model="cliente.complemento">
                </div>
            </div>
        </div>

        <div class="w-full mt-[70px] z-10 flex flex-row duration-500 hover:shadow-md flex-wrap bg-[#F1F1F1] py-3 px-2 rounded-b-[15px] rounded-tr-[15px] relative">
            <div class="px-2 h-[30px] flex items-center rounded-t-lg bg-slate-500 z-0 text-white absolute top-[-30px] left-0">
                <h5 class="font-montserrat font-bold font-lg">Referências</h5>
            </div>
            <div class="w-full md:w-1/4 px-2">
                <div class="mb-3">
                    <label for="" class="form-label text-cinza-escuro font-montserrat">Referência Comercial 1</label>
                    <input type="text"
                        class="form-control" name="" aria-describedby="helpId" placeholder="" required wire:model="cliente.referencia_comercial1">
                </div>
            </div>
            <div class="w-full md:w-1/4 px-2">
                <div class="mb-3">
                    <label for="" class="form-label text-cinza-escuro font-montserrat">Telefone</label>
                    <input type="text"
                        class="form-control telefone" name=""  aria-describedby="helpId" placeholder="" required wire:model="cliente.referencia_comercial1_tel">
                </div>
            </div>
            <div class="w-full md:w-1/4 px-2">
                <div class="mb-3">
                    <label for="" class="form-label text-cinza-escuro font-montserrat">Referência Comercial 2</label>
                    <input type="text"
                        class="form-control" name=""  aria-describedby="helpId" placeholder="" wire:model="cliente.referencia_comercial2">
                </div>
            </div>
            <div class="w-full md:w-1/4 px-2">
                <div class="mb-3">
                    <label for="" class="form-label text-cinza-escuro font-montserrat">Telefone</label>
                    <input type="text"
                        class="form-control telefone" name="" aria-describedby="helpId" placeholder="" wire:model="cliente.referencia_comercial2_tel">
                </div>
            </div>
            <div class="w-full md:w-1/4 px-2">
                <div class="mb-3">
                    <label for="" class="form-label text-cinza-escuro font-montserrat">Referência Bancária</label>
                    <input type="text"
                        class="form-control" name="" aria-describedby="helpId" placeholder="" wire:model="cliente.referencia_bancaria">
                </div>
            </div>
            <div class="w-full md:w-1/4 px-2">
                <div class="mb-3">
                    <label for="" class="form-label text-cinza-escuro font-montserrat">Nome do Gerente</label>
                    <input type="text"
                        class="form-control" name="" aria-describedby="helpId" placeholder="" wire:model="cliente.referencia_bancaria_gerente">
                </div>
            </div>
            <div class="w-full md:w-1/4 px-2">
                <div class="mb-3">
                    <label for="" class="form-label text-cinza-escuro font-montserrat">Telefone</label>
                    <input type="text"
                        class="form-control telefone" name="" aria-describedby="helpId" placeholder="" wire:model="cliente.referencia_bancaria_tel">
                </div>
            </div>
        </div>
        <div class="w-full flex flex-row justify-content-end px-2 mt-4">
            <button type="submit" class="btn btn-warning btn-md btn-block hover:bg-orange-500 hover:text-white">Salvar</button>
        </div>
    </form>
</div>

@push("scripts")
<script src="{{ asset('js/jquery.mask.js') }}"></script>

<script>

    window.addEventListener('salvado', (event) => {
        $([document.documentElement, document.body]).animate({
            scrollTop: $("#alert-salvamento-dados").offset().top - 100
        }, 200);
    });

    $(document).ready(function() {

        $(".telefone").mask("(00) 00000-0000");

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
                            $("#erro-cep").html("");
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
                            $("#erro-cep").html("CEP não encontrado.");
                        }
                    });
                } //end if.
                else {
                    $("#erro-cep").html("Formato de CEP inválido.");
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

@endpush