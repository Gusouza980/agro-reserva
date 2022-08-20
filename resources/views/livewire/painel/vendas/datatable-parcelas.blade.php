<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-4 card-title">Parcelas</h4>
                    <div class="row">
                        <div class="col-6">
                            <table class="table table-bordered dt-responsive nowrap w-100">
                                <tbody>
                                    @foreach($parcelas->where("numero", "<=", $metade_parcelas) as $parcela)
                                        <tr>
                                            <td scope="row">{{ $parcela->numero }}/{{ $venda->parcelas }}</td>
                                            <td>R${{ number_format($parcela->valor, 2, ",", ".") }}</td>
                                            <td>
                                                <input type="date" class="form-control" value="{{ $parcela->vencimento }}" onchange="Livewire.emit('atualizaValorParcela', {{ $parcela->id }}, 'vencimento', this.value)">
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="col-6">
                            <table class="table table-bordered dt-responsive nowrap w-100">
                                <tbody>
                                    @foreach($parcelas->where("numero", ">", $metade_parcelas) as $parcela)
                                        <tr>
                                            <td scope="row">{{ $parcela->numero }}/{{ $venda->parcelas }}</td>
                                            <td>R${{ number_format($parcela->valor, 2, ",", ".") }}</td>
                                            <td>
                                                <input type="date" class="form-control" value="{{ $parcela->vencimento }}" onchange="Livewire.emit('atualizaValorParcela', {{ $parcela->id }}, 'vencimento', this.value)">
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div>    
</div>