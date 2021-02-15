<div class="row justify-content-center justify-content-lg-start mt-5">
    <div class="col-10 col-lg-5 text-center text-lg-left">
        <h2>Endereço de correspondência</h2>
    </div>
</div>
<div class="row mt-5 justify-content-center justify-content-lg-start">
    <div class="col-10 col-lg-8 text-left">
        <div class="alert alert-danger" id="div-erro2" style="display:none;" role="alert">
            Por favor, preencha todos os campos para realizar seu cadastro.
        </div>
    </div>
</div>
<div class="row justify-content-center justify-content-lg-start">
    <div class="col-10 col-lg-8 text-left">
        <div class="container-fluid px-0">
            <form class="row form-cadastro2 justify-content-center" action="" method="post">
                @csrf
                <div class="form-group col-12 col-lg-6">
                    <label for="cep">CEP</label>
                    <input type="text" class="form-control" name="cep" id="cep" aria-describedby="" placeholder="Digite seu cep" required>
                </div>
                <div class="form-group col-12 col-lg-6">
                    <label for="bairro">Bairro</label>
                    <input type="text" class="form-control" name="bairro" id="bairro" aria-describedby="" placeholder="Digite seu bairro" required>
                </div>
                <div class="form-group col-12 col-lg-6">
                    <label for="estado">Estado</label>
                    <input type="text" class="form-control" name="estado" id="estado" aria-describedby="" placeholder="Escolha seu estado" required>
                </div>
                <div class="form-group col-12 col-lg-6">
                    <label for="numero">Número</label>
                    <input type="text" class="form-control" name="numero" id="numero" aria-describedby="" placeholder="Digite seu numero" required>
                </div>
                <div class="form-group col-12 col-lg-6">
                    <label for="cidade">Cidade</label>
                    <input type="text" class="form-control" name="cidade" id="cidade" aria-describedby="" placeholder="Digite sua cidade" required>
                </div>
                <div class="form-group col-12 col-lg-6">
                    <label for="complemento">Complemento</label>
                    <input type="text" class="form-control" name="complemento" id="complemento" aria-describedby="" placeholder="Digite seu complemento (se houver)">
                </div>
                <div class="form-group col-12 col-lg-6">
                    <label for="endereco">Endereço</label>
                    <input type="text" class="form-control" name="endereco" id="endereco" aria-describedby="" placeholder="Digite seu endereço" required>
                </div>
                <div class="form-group col-12 col-lg-6 text-center text-lg-right mt-3 d-flex align-items-center justify-content-center justify-content-lg-end">
                    <a name="" id="btn-passo2" class="btn btn-vermelho py-2 cpointer"  role="button">Próximo</a>
                </div>
            </form>
        </div>
    </div>
</div>