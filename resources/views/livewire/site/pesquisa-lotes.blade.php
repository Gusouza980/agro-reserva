
<div class="container-fluid">
    <div class="row align-items-center">
        <div style="width: 90%;">
            <div class="mb-3">
                <label for="" class="form-label text-black">O que deseja ?</label>
                <input type="text"
                class="form-control" name="" id="" aria-describedby="helpId" placeholder="" wire:model='pesquisa'>
            </div>
        </div>
        <div style="width: 10%;">
            <a name="" id="" class="btn btn-vermelho mt-3 ml-2" wire:click='pesquisar' role="button"><i class="fas fa-search"></i></a>
        </div>
    </div>

    
    <div class="row" style="">
        @if($resultados)
            <table class="table">
                <tbody>
                    @foreach($resultados as $lote)
                        <tr class="tr-pesquisa" wire:key='{{ $loop->index }}' onclick="window.location.href='{{ route('fazenda.lote', ['fazenda' => $lote->fazenda->slug, 'lote' => $lote, 'reserva' => $lote->reserva]) }}'">
                            <td style="vertical-align: middle;" scope="row" wire:key='{{ $loop->index }}'>{{ $lote->nome }}</td>
                            <td style="vertical-align: middle;" wire:key='{{ $loop->index }}'>{{ $lote->fazenda->nome_fazenda }}</td>
                            <td style="vertical-align: middle;" wire:key='{{ $loop->index }}'>R${{ number_format($lote->preco, 2, ",", ".") }}</td>
                            <td style="vertical-align: middle;" wire:key='{{ $loop->index }}'><a name="" id="" class="btn btn-warning d-none d-md-block" href="#" role="button"><i class="fas fa-plus" style="font-size: 10px;"></i></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
    
</div>
