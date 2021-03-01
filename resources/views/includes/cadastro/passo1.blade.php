<div class="row justify-content-center justify-content-lg-start mt-5">
    <div class="col-10 col-lg-5 text-center text-lg-left">
        <h2>Dados do seu negócio</h2>
    </div>
</div>
<div class="row mt-5 justify-content-center justify-content-lg-start">
    <div class="col-10 col-lg-8 text-left">
        <div class="alert alert-danger" id="div-erro1" style="display:none;" role="alert">
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
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" name="nome" id="nome" aria-describedby="" placeholder="Digite seu nome" required>
                </div>
                <div class="form-group col-12 col-lg-6">
                    <label for="sexo">Sexo</label>
                    <select class="form-control" name="sexo" id="sexo" required>
                        <option value="1">Masculino</option>
                        <option value="0">Feminino</option>
                    </select>
                </div>
                <div class="form-group col-12 col-lg-6">
                    <label for="cnpj">CNPJ</label>
                    <input type="text" class="form-control" name="cnpj" id="cnpj" aria-describedby="" placeholder="Digite seu cnpj" required>
                </div>
                <div class="form-group col-12 col-lg-6">
                    <label for="cpf">CPF</label>
                    <input type="text" class="form-control" name="cpf" id="cpf" aria-describedby="" placeholder="Digite o CPF do responsável" required>
                </div>
                <div class="form-group col-12 col-lg-6">
                    <label for="fazenda">Nome da sua fazenda</label>
                    <input type="text" class="form-control" name="fazenda" id="fazenda" aria-describedby="" placeholder="Digite o nome da sua fazenda" required>
                </div>
                <div class="form-group col-12 col-lg-6">
                    <label for="telefone">Telefone</label>
                    <input type="text" class="form-control" name="telefone" id="telefone" aria-describedby="" placeholder="Digite seu telefone" required>
                </div>
                <div class="form-group col-12 col-lg-6">
                    <label for="whatsapp">Whatsapp</label>
                    <input type="text" class="form-control" name="whatsapp" id="whatsapp" aria-describedby="" placeholder="Digite seu whatsapp" required>
                </div>
                <div class="form-group col-12 text-center text-lg-right mt-3">
                    <a name="" id="btn-passo1" class="btn btn-vermelho py-2 cpointer"  role="button">Próximo</a>
                </div>
            </form>
        </div>
    </div>
</div>