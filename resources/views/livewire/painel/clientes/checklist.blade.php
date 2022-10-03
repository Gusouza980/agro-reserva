<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h4 class="card-title mt-3">Informações de Cadastro</h4>
            <div class="table-responsive">
                <table class="table table-bordered mt-3" style="vertical-align: middle;">
                    <tbody>
                        @foreach(config("clientes.checklists")[0] as $campo => $nome)
                            @php
                                $check = "check_" . $campo;
                                $obs = "obs_" . $campo;
                            @endphp
                            <tr class="" @if($cliente->$check) style="background-color: rgba(0,255,0,0.2)" @else style="background-color: rgba(255,0,0,0.2)" @endif>
                                <td scope="row" style="width: 20%;"><strong>{{ $nome }}</strong></td>
                                <td class="text-center" style="width: 5%;">
                                    <input class="form-check-input mx-auto" @if($cliente->$check) checked @endif type="checkbox" value="1" onchange="Livewire.emit('atualizaValor', '{{ $check }}', this.value)">
                                </td>
                                <td class="text-center">
                                    <input type="text" class="form-control" value="{{ $cliente->$obs }}" onchange="Livewire.emit('atualizaValor', '{{ $obs }}', this.value)">
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <hr>

            <h4 class="card-title mt-3">Análise</h4>
            <div class="table-responsive">
                <table class="table table-bordered mt-3" style="vertical-align: middle;">
                    <tbody>
                        @foreach(config("clientes.checklists")[1] as $campo => $nome)
                            @php
                                $check = "check_" . $campo;
                                $obs = "obs_" . $campo;
                            @endphp
                            <tr class="" @if($cliente->$check) style="background-color: rgba(0,255,0,0.2)" @else style="background-color: rgba(255,0,0,0.2)" @endif>
                                <td scope="row" style="width: 20%;"><strong>{{ $nome }}</strong></td>
                                <td class="text-center" style="width: 5%;">
                                    <input class="form-check-input mx-auto" @if($cliente->$check) checked @endif type="checkbox" value="1" onchange="Livewire.emit('atualizaValor', '{{ $check }}', this.value)">
                                </td>
                                <td class="text-center">
                                    <input type="text" class="form-control" value="{{ $cliente->$obs }}" onchange="Livewire.emit('atualizaValor', '{{ $obs }}', this.value)">
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>