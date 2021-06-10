@extends('template.main')

@section('conteudo')
<div class="container-fluid py-5 min-vh-100" style="background: url({{asset('imagens/background.jpg')}}); background-position: bottom; background-attachment: fixed; background-size: cover;">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="caixa-passo text-center">
                    <i class="fas fa-file-contract fa-3x"></i>
                    <h3>Você faz seu cadastro</h3>
                    <span>Sem compromisso</span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 offset-lg-6 col-lg-6">
                <div class="caixa-passo text-center">
                    <i class="fab fa-whatsapp fa-3x"></i>
                    <h3>Entramos em contato</h3>
                    <span>Te chamaremos no WhatsApp para entenderemos o contexto do seu negócio</span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="caixa-passo text-center">
                    <i class="fas fa-database fa-3x"></i>
                    <h3>Captação</h3>
                    <span>Captação de vídeos e fotos dos lotes e da fazenda. Reunir dados e informações de cada lote da reserva.</span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 offset-lg-6 col-lg-6">
                <div class="caixa-passo text-center">
                    <i class="fas fa-tv fa-3x"></i>
                    <h3>Configuração no site</h3>
                    <span>Subimos o conteúdo todo na nossa plataforma, e programos início e fim da reserva.</span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="caixa-passo text-center">
                    <i class="fas fa-photo-video fa-3x"></i>
                    <h3>Produzimos seu conteúdo</h3>
                    <span>Produção de filme institucional da fazenda, dos lotes à venda e captação de depoimentos de pessoas chave.</span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 offset-lg-6 col-lg-6">
                <div class="caixa-passo text-center">
                    <i class="far fa-handshake fa-3x"></i>
                    <h3>Vendemos seus animais</h3>
                    <span>O comprador certo no canal certo com a comissão certa.</span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="caixa-passo text-center">
                    <i class="fas fa-money-bill-wave fa-3x"></i>
                    <h3>Receba à vista</h3>
                    <span>Tem alguma dúvida?<br> Entre em contato pelo WhatsApp</span>
                    <br>
                    <a href="">Falar pelo WhatsApp</a>
                </div>
            </div>
        </div>
        
    </div>
</div>
<div class="container-fluid" style="background-color:white;">
    <div class="container py-5">
        <div class="row">
            <div class="col-12 text-cadastro-fazenda">
                <h2>Nós entramos em contato com você</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center text-lg-left">
                <h4>Dados do seu negócio</h4>
            </div>
        </div>
        <div class="row mt-5 justify-content-center justify-content-lg-start">
            <div class="col-10 col-lg-8 text-left">
                <div class="alert alert-danger" id="div-erro" style="display:none;" role="alert">
                    Por favor, preencha todos os campos para realizar seu cadastro.
                </div>
            </div>
        </div>
        <div class="row justify-content-center justify-content-lg-start">
            <div class="col-10 col-lg-8 text-left">
                <div class="container-fluid px-0">
                    <form class="row form-cadastro1 justify-content-center justify-content-lg-start" action="" method="post">
                        @csrf
                        <div class="form-group col-12 col-lg-6">
                            <label for="nome_dono">Nome</label>
                            <input type="text" class="form-control" name="nome_dono" id="nome_dono" aria-describedby="" placeholder="Digite seu nome" required>
                        </div>
                        <div class="form-group col-12 col-lg-6">
                            <label for="telefone">Telefone</label>
                            <input type="text" class="form-control" name="telefone" id="telefone" aria-describedby="" placeholder="Digite seu telefone" required>
                        </div>
                        <div class="form-group col-12 col-lg-6">
                            <label for="nome_fazenda">Nome da sua fazenda</label>
                            <input type="text" class="form-control" name="nome_fazenda" id="nome_fazenda" aria-describedby="" placeholder="Digite o nome da sua fazenda" required>
                        </div>
                        <div class="form-group col-12 col-lg-6">
                            <label for="cnpj">CNPJ</label>
                            <input type="text" class="form-control" name="cnpj" id="cnpj" aria-describedby="" placeholder="Digite seu cnpj" required>
                        </div>
                        <div class="form-group col-12 col-lg-6">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" aria-describedby="" placeholder="Digite seu email" required>
                        </div>
                        <div class="form-group col-12 col-lg-6">
                            <label for="whatsapp">Whatsapp</label>
                            <input type="text" class="form-control" name="whatsapp" id="whatsapp" aria-describedby="" placeholder="Digite seu whatsapp" required>
                        </div>
                        <div class="form-group col-12 text-center text-lg-right mt-3">
                            <a id="btn-pronto" class="btn btn-vermelho py-2 cpointer" role="button">Pronto</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</div>

<div class="modal fade" id="modalSucesso" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" style="width: 100%; max-width: 100%;">
        <div class="modal-content">
            <div class="modal-body modal-body-sucesso text-center">
                <div class="row">
                    <div class="col-12 conteudo-modal">
                        <h3 id="titulo-modal-sucesso"></h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 conteudo-modal">
                        <span class="mt-2">Vi que você quer anunciar seus lotes. Vamos te chamar no Whatsapp para tirar todas as suas dúvidas.</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 conteudo-modal">
                        <button class="botao-confirma py-2 px-5 mt-4" onclick="fechaModal()">Ok, aguardo contato</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalErro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" style="width: 100%; max-width: 100%;">
        <div class="modal-content">
            <div class="modal-body modal-body-erro text-center">
                <div class="row">
                    <div class="col-12 conteudo-modal-erro">
                        <h3 id="titulo-modal-erro"></h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 conteudo-modal-erro">
                        <span class="mt-2">Infelizmente não conseguimos concluir seu cadastro no momento. Entre em contato pelo whatsapp para explicar o ocorrido.</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 conteudo-modal-erro">
                        <button class="botao-confirma py-2 px-5 mt-4" onclick="fechaModalErro()">Ok, aguardo contato</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section("scripts")
<script>

    function fechaModal() {
        $("#modalSucesso").modal("hide");
    }

    function fechaModalErro() {
        $("#modalErro").modal("hide");
    }

    $(document).ready(function(){

        $("#btn-pronto").click(function(){
            var nome_dono = $("input[name='nome_dono']").val();
            var nome_fazenda = $("input[name='nome_fazenda']").val();
            var telefone = $("input[name='telefone']").val();
            var cnpj = $("input[name='cnpj']").val();
            var email = $("input[name='email']").val();
            var whatsapp = $("input[name='whatsapp']").val();

            if(!nome_dono || !nome_fazenda || !telefone || !cnpj || !email || !whatsapp){
                $("#div-erro").show(500);
                return false;
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });
        });
    });

</script>
@endsection