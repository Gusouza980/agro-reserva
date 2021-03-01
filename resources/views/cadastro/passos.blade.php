@extends('template.main')

@section('conteudo')
<div class="container-fluid px-0" style=" background-color: gray;">
    <div class="row">
        <div class="col-12" style="min-height: 450px;">
            
        </div>
    </div>
</div>
<div class="container" style="min-height: calc(100vh - 20px);">
    <div class="row justify-content-center justify-content-lg-start mt-5">
        <div class="col-10 col-lg-5 text-center text-lg-left">
            <h2>Conclua seu cadastro</h2>
        </div>
    </div>
    <div class="row justify-content-center justify-content-lg-start mt-5">
        <div class="col-10 col-lg-5 d-flex justify-content-center justify-content-lg-start text-lg-left circulo-passo">
            <div class="float-left text-center num-passo active" passo="1">
                1
            </div>
            <div class="float-left text-center ml-3 num-passo" passo="2">
                2
            </div>
            <div class="float-left text-center ml-3 num-passo" passo="3">
                3
            </div>
        </div>
    </div>
    @if ($errors->any())
        @foreach($errors->all() as $error)
        <div class="row mt-5 justify-content-center justify-content-lg-start">
            <div class="col-10 col-lg-8 text-left">
                <div class="alert alert-danger" id="div-erro-geral" role="alert">
                    {{$error}}
                    {{--  Por favor, preencha todos os campos para realizar seu cadastro.  --}}
                </div>
            </div>
        </div>
        @endforeach
    @endif

    <div class="container px-0 div-passo" passo="1">
        @include('includes.cadastro.passo1')
    </div>
    <div class="container px-0 div-passo" passo="2" style="display: none;">
        @include('includes.cadastro.passo2')
    </div>
    <div class="container px-0 div-passo" passo="3" style="display: none;">
        @include('includes.cadastro.passo3')
    </div>

    <form id="form-final" action="{{route('cadastro.finalizar')}}" method="post">
        @csrf
    </form>
    
</div>


@endsection

@section('scripts')
    <script>

        function testa_campos1(){
            var teste = true;
            $(".form-cadastro1>.form-group>input").filter("[type!='hidden']").filter('[required]').each(function(){
                if(!$(this).val()){
                    teste = false;
                    return false;
                }
            });

            return teste;
        }

        function testa_campos2(){
            var teste = true;
            $(".form-cadastro2>.form-group>input").filter("[type!='hidden']").filter('[required]').each(function(){
                if(!$(this).val()){
                    teste = false;
                    return false;
                }
            });

            return teste;
        }

        $(document).ready(function(){
            
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
                            html += "<option value='"+cidades[cidade].ID_Cidade+"'>"+cidades[cidade].nm_Cidade+"</option>"
                        }
                        $("select[name='cidade']").html(html);
                    },
                    error: function (data) {
                        console.log(data);
                    }
                });
            });

            $("input").each(function(){
                var name = $(this).attr("name");
                name = name.replace("[]", "");
                if(name != "_token"){
                    if($(".input-final[name='"+name+"']").length == 0){
                        if($(this).attr("type") == "checkbox"){
                            $("#form-final").append("<input class='input-final' type='hidden' name='"+name+"' checkbox='sim' value=''>");
                        }else{
                            $("#form-final").append("<input class='input-final' type='hidden' name='"+name+"' value=''>");
                        }
                    }
                }
            })

            $("select").each(function(){
                var name = $(this).attr("name");
                name = name.replace("[]", "");
                if(name != "_token"){
                    if($(".input-final[name='"+name+"']").length == 0){
                        if($(this).attr("type") == "checkbox"){
                            $("#form-final").append("<input class='input-final' type='hidden' name='"+name+"' checkbox='sim' value=''>");
                        }else if($(this).is("select")){
                            $("#form-final").append("<input class='input-final' type='hidden' name='"+name+"' select='sim' value=''>");
                        }else{
                            $("#form-final").append("<input class='input-final' type='hidden' name='"+name+"' value=''>");
                        }
                    }
                }
            })

            $("#btn-passo1").click(function(){
                if(!testa_campos1()){
                    $("#div-erro-geral").hide(0);
                    $("#div-erro1").slideDown(200);
                }else{
                    $("#div-erro1").hide(0);
                    $(".div-passo[passo=1]").slideUp(300, function(){
                        $(".num-passo[passo=1]").removeClass("active");
                        $(".num-passo[passo=2]").addClass("active");
                        $(".div-passo[passo=2]").slideDown(300);

                    })
                }
            });
            $("#btn-passo2").click(function(){
                if(!testa_campos2()){
                    $("#div-erro-geral").hide(0);
                    $("#div-erro2").slideDown(200);
                }else{
                    $("#div-erro2").hide(0);
                    $(".div-passo[passo=2]").slideUp(300, function(){
                        $(".num-passo[passo=2]").removeClass("active");
                        $(".num-passo[passo=3]").addClass("active");
                        $(".div-passo[passo=3]").slideDown(300);

                    })
                }
            });

            $("#btn-finalizar").click(function(){
                $("input[type='hidden'").each(function(){
                    var name = $(this).attr("name");
                    if(name != "_token"){
                        var input = this;
                        if($(input).attr("checkbox") == "sim"){
                            $("input[name='"+name+"[]']:checked").each(function(){
                                var value = $(input).val();
                                value += ","+$(this).val();
                                $(input).val(value);
                            });
                        }else if($(input).attr("select") == "sim"){
                            $(input).val($("select[name='"+name+"']").val());
                        }else{
                            $(input).val($("input[name='"+name+"']").val());
                        }
                    }
                })
                $("#form-final").submit();
            });
        });
    </script>
@endsection