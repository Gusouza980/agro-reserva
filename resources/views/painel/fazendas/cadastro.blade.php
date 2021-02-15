@extends('painel.template.main')

@section("styles")
    <link href="{{asset('admin/libs/dropzone/min/dropzone.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section("titulo")
    Cadastro de Fazenda
@endsection

@section('conteudo')
    
<div class="row">
    <div class="col-lg-6 col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Informações Principais</h4>

                <form>
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" class="form-control" name="nome" id="nome" required>
                    </div>

                    <div class="mb-3">
                        <label for="logo" class="form-label">Logo</label>
                        <input type="file" class="form-control" name="logo" id="logo" required>
                    </div>

                    <div class="row">
                        
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email (Opcional)</label>
                                <input type="email" class="form-control" name="email" id="email">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="telefone" class="form-label">Telefone (Opcional)</label>
                                <input type="password" class="form-control" name="telefone" id="telefone">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="formrow-inputCity" class="form-label">City</label>
                                <input type="text" class="form-control" id="formrow-inputCity">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="formrow-inputState" class="form-label">State</label>
                                <select id="formrow-inputState" class="form-select">
                                    <option selected>Choose...</option>
                                    <option>...</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="formrow-inputZip" class="form-label">Zip</label>
                                <input type="text" class="form-control" id="formrow-inputZip">
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck">
                            <label class="form-check-label" for="gridCheck">
                              Check me out
                            </label>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary w-md">Submit</button>
                    </div>
                </form>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
</div>

@endsection


@section("scripts")
    <script src="{{asset('admin/libs/dropzone/min/dropzone.min.js')}}"></script>
@endsection