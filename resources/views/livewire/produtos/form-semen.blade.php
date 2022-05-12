<div class="row">
    <div class="col-12">
        <h4 class="card-title mb-4">Informações específicas de Sêmen</h4>
    </div>
    <div class="col-12 col-md-2">
        <div class="mb-3">
            <label for="" class="form-label">Raça</label>
            <select class="form-control" name="" id="">
                @foreach(\App\Models\Raca::all() as $raca)
                    <option value="{{ $raca->id }}" @if($semen && $semen->raca_id == $raca->id) selected @endif>{{ $raca->nome }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-12 col-md-2">
        <div class="mb-3">
            <label for="" class="form-label">Nascimento</label>
            <input type="date" name="nascimento" class="form-control" @if($semen) value="{{ $semen->nascimento }}" @endif required>
        </div>
    </div>
    <div class="col-12 col-md-2">
        <div class="mb-3">
            <label for="" class="form-label">Registro</label>
            <input type="text" name="registro" class="form-control" maxlength="10" @if($semen) value="{{ $semen->registro }}" @endif required>
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="mb-3">
            <label for="" class="form-label">Proprietário</label>
            <input type="text" name="proprietario" class="form-control" maxlength="100" @if($semen) value="{{ $semen->proprietario }}" @endif>
        </div>
    </div>
    <div class="col-12 col-md-4">
        <div class="mb-3">
            <label for="" class="form-label">Pai</label>
            <input type="text" name="pai" class="form-control" maxlength="50" @if($semen) value="{{ $semen->pai }}" @endif>
        </div>
    </div>
    <div class="col-12 col-md-4">
        <div class="mb-3">
            <label for="" class="form-label">Mãe</label>
            <input type="text" name="mae" class="form-control" maxlength="50" @if($semen) value="{{ $semen->mae }}" @endif>
        </div>
    </div>
    <div class="col-12 col-md-4">
        <div class="mb-3">
            <label for="" class="form-label">Avô Materno</label>
            <input type="text" name="avo_materno" class="form-control" maxlength="50" @if($semen) value="{{ $semen->avo_materno }}" @endif>
        </div>
    </div>
    <div class="col-12 col-md-4">
        <div class="mb-3">
            <label for="" class="form-label">Avó Materna</label>
            <input type="text" name="avo_materna" class="form-control" maxlength="50" @if($semen) value="{{ $semen->avo_materna }}" @endif>
        </div>
    </div>
    <div class="col-12 col-md-4">
        <div class="mb-3">
            <label for="" class="form-label">Avô Paterno</label>
            <input type="text" name="avo_paterno" class="form-control" maxlength="50" @if($semen) value="{{ $semen->avo_paterno }}" @endif>
        </div>
    </div>
    <div class="col-12 col-md-4">
        <div class="mb-3">
            <label for="" class="form-label">Avó Paterna</label>
            <input type="text" name="avo_paterna" class="form-control" maxlength="50" @if($semen) value="{{ $semen->avo_paterna }}" @endif>
        </div>
    </div>
    <div class="col-12 col-md-4">
        <div class="mb-3">
            <label for="" class="form-label">Linhagem</label>
            <input type="text" name="linhagem" class="form-control" maxlength="50" @if($semen) value="{{ $semen->linhagem }}" @endif>
        </div>
    </div>
    <div class="col-12 col-md-4">
        <div class="mb-3">
            <label for="" class="form-label">Doses</label>
            <input type="number" name="doses" class="form-control" min="1" step="1" @if($semen) value="{{ $semen->doses }}" @endif>
            <small>Número de doses que serão vendidas de uma vez</small>
        </div>
    </div>
</div>