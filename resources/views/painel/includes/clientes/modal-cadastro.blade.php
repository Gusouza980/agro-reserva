<div class="modal fade" id="modalNovoCliente" tabindex="-1" role="dialog" aria-labelledby="modalNovoClienteLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalNovoClienteLabel">Cadastro de Cliente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row" action="{{route('painel.cliente.cadastrar')}}" method="post">
                    @csrf
                    
                    <div class="form-group mb-3 col-6">
                        <label for="">Email *</label>
                        <input type="email"
                            class="form-control" name="email" maxlength="100" required>
                    </div>
                    <div class="form-group mb-3 col-6">
                        <label for="">Senha</label>
                        <input type="password"
                            class="form-control" name="senha" required>
                    </div>
                    <div class="form-group mb-3 col-12">
                        <label for="">Nome *</label>
                        <input type="text"
                            class="form-control" name="nome_dono" maxlength="100" required>
                    </div>
                    <div class="form-group mb-3 col-4">
                        <label for="">Telefone *</label>
                        <input type="text"
                            class="form-control" name="telefone" maxlength="50" required>
                    </div>
                    <div class="form-group mb-3 col-4">
                        <label for="">Whatsapp</label>
                        <input type="text"
                            class="form-control" name="whatsapp" maxlength="50">
                    </div>
                    <div class="form-group mb-3 col-4">
                        <label for="">CPF/CNPJ *</label>
                        <input type="text"
                            class="form-control" name="documento" maxlength="50">
                    </div>
                    <div class="form-group mb-3 col-6">
                        <label for="">Rua</label>
                        <input type="text"
                            class="form-control" name="rua" maxlength="50">
                    </div>
                    <div class="form-group mb-3 col-2">
                        <label for="">Número</label>
                        <input type="text"
                            class="form-control" name="numero" maxlength="6">
                    </div>
                    <div class="form-group mb-3 col-4">
                        <label for="">Bairro</label>
                        <input type="text"
                            class="form-control" name="bairro" maxlength="50">
                    </div>
                    <div class="form-group col-12 col-lg-3 form-conta mb-3">
                        <label for="estado">Estado</label>
                        <select class="form-control" name="estado" id="" >
                            @foreach(\App\Models\Estado::all() as $estado)
                                <option value="{{$estado->id}}">{{$estado->nome}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-12 col-lg-4 form-conta mb-3">
                        <label for="cidade">Cidade</label>
                        <select class="form-control" name="cidade" >
                            <option value="">SELECIONE UM ESTADO</option>
                            {{--  @foreach(\App\Models\Cidade::where("id_estado", $cliente->estado)->get() as $cidade)
                                <option value="{{$cidade->id}}" @if($cliente->cidade == $cidade->id) selected @endif>{{$cidade->nome}}</option>
                            @endforeach  --}}
                        </select>
                    </div>
                    <div class="form-group col-7 col-lg-3 form-conta mb-3">
                        <label for="cep">CEP</label>
                        <input type="text"
                            class="form-control" name="cep" id="cep" aria-describedby="helpId" >
                    </div>
                    <div class="form-group text-end">
                        <button type="submit" class="btn btn-primary mt-3">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>