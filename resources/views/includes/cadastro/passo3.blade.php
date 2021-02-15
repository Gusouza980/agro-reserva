<div class="row justify-content-center justify-content-lg-start mt-5">
    <div class="col-10 col-lg-5 text-center text-lg-left">
        <h2>Quais raças te interessam ?</h2>
    </div>
</div>
<div class="row mt-5 justify-content-center justify-content-lg-start">
    <div class="col-10 col-lg-8 text-left">
        <div class="alert alert-danger" id="div-erro3" style="display:none;" role="alert">
            Por favor, preencha todos os campos para realizar seu cadastro.
        </div>
    </div>
</div>
<div class="row justify-content-center justify-content-lg-start">
    <div class="col-12 text-left">
        <div class="container-fluid px-0">
            <form class="row form-cadastro3 justify-content-start" action="" method="post">
                @csrf
                @foreach(\App\Models\Raca::all() as $raca)
                    <div class="form-group col-6 col-md-3 col-sm-4 col-lg-2">
                        <label class="containerr">{{$raca->nome}}
                            <input type="checkbox" name="racas[]" value="{{$raca->id}}">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                @endforeach       
            </form>
        </div>
    </div>
</div>
<div class="row justify-content-center justify-content-lg-start mt-5">
    <div class="col-10 col-lg-5 text-center text-lg-left">
        <h2>Qual seu interesse?</h2>
    </div>
</div>
<div class="mt-5 row justify-content-center justify-content-lg-start">
    <div class="col-12 text-left">
        <div class="container-fluid px-0">
            <form class="row form-cadastro3 justify-content-start" action="" method="post">
                @csrf
                <div class="form-group col-6 col-md-3 col-sm-4 col-lg-2">
                    <label class="containerr">Vender
                        <input type="checkbox" name="interesses[]" value="Compra">
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="form-group col-6 col-md-3 col-sm-4 col-lg-2">
                    <label class="containerr">Vender
                        <input type="checkbox" name="interesses[]" value="Venda">
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="form-group col-12 col-lg-6 text-center text-lg-right mt-3 d-flex align-items-center justify-content-center justify-content-lg-end">
                    <a name="" id="btn-finalizar" class="btn btn-vermelho py-2 cpointer"  role="button">Finalizar</a>
                </div>
            </form>
        </div>
    </div>
</div>