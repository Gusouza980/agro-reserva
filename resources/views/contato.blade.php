@extends('template.main')

@section('conteudo')

<div class="container-fluid py-5 min-vh-100" style="background: url({{asset('imagens/background.jpg')}}); background-position: bottom; background-size: cover;">
    <div class="row justify-content-center mt-5">
        <div class="col-10 col-md-6 col-lg-4 text-left text-white">
            
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-12 col-lg-7 text-left">
                <h2 class="text-white mb-4">Entre em contato para tirar suas dúvidas</h2>
                <div id="container-form-contato">
                    <form action="{{route('cadastro.salvar')}}" class="row form-cadastro0" method="post">
                        @csrf
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
                            <label for="mensagem">Mensagem</label>
                            <textarea class="form-control" name="mensagem" id="mensagem" aria-describedby="" rows="5"></textarea>
                        </div>
                        <div class="form-group col-12 text-center text-lg-left">
                            <button type="submit" class="btn btn-vermelho py-2" role="button">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-12 col-lg-5 text-left">
                <div class="row mt-5">
                    <div class="col-12 text-white text-nav-footer text-center text-lg-left">
                        <span><i class="far fa-envelope mr-3"></i> contato@agroreserva.com.br</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-white text-nav-footer text-center text-lg-left">
                        <span><i class="fas fa-phone mr-3"></i> +55 34 9172-0996</span>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12  text-center text-lg-left">
                        <a href="" class="btn btn-vermelho px-4 py-2">Falar com Consultor</a>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d471.76269216025753!2d-48.2839416521883!3d-18.926899282878566!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTjCsDU1JzM2LjUiUyA0OMKwMTcnMDMuMCJX!5e0!3m2!1spt-BR!2sbr!4v1623097485807!5m2!1spt-BR!2sbr" style="width: 100%;" height="280" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
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