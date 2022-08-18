
<div class="container-fluid">
    <div class="row align-items-center">
        <div style="width: 90%;">
            <div class="mb-3">
                <label for="" class="text-black form-label">O que deseja ?</label>
                <input type="text"
                class="form-control" name="" id="" aria-describedby="helpId" placeholder="" wire:model='pesquisa'>
            </div>
        </div>
        <div style="width: 10%;">
            <a name="" id="" class="mt-3 ml-2 btn btn-vermelho" wire:click='pesquisar' role="button"><i class="fas fa-search"></i></a>
        </div>
    </div>

    
    <div class="row" style="">
        @if($resultados)
            <table class="table table-hover">
                <tbody>
                    @foreach($resultados as $lote_pesquisa)
                        <tr class="tr-pesquisa cpointer" wire:key='{{ $loop->index }}' onclick="window.location.href='{{ route('fazenda.lote', ['fazenda' => $lote_pesquisa->reserva->fazenda->slug, 'lote' => $lote_pesquisa, 'reserva' => $lote_pesquisa->reserva]) }}'">
                            <td style="vertical-align: middle;" scope="row" wire:key='{{ $loop->index }}'>{{ $lote_pesquisa->nome }}</td>
                            <td style="vertical-align: middle;" wire:key='{{ $loop->index }}'>{{ $lote_pesquisa->fazenda->nome_fazenda }}</td>
                            <td style="vertical-align: middle;" wire:key='{{ $loop->index }}'>R${{ number_format($lote_pesquisa->preco, 2, ",", ".") }}</td>
                            {{-- <td style="vertical-align: middle;" wire:key='{{ $loop->index }}'><a name="" id="" class="btn btn-warning d-none d-md-block" href="#" role="button"><i class="fas fa-plus" style="font-size: 10px;"></i></a></td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
    
</div>
