<div class="w-full mt-4">
    <div class="w-full px-5 py-5 card">
        <div class="flex w-full">
            <div class="flex items-center w-1/3">
                <b class="me-2">Data:</b> {{ date('d/m/Y H:i:s', strtotime($venda->created_at)) }}
            </div>
            <div class="flex items-center w-1/3">
                <b class="me-2">Total:</b> R${{ number_format($venda->total, 2, ',', '.') }}
            </div>
            <div class="flex items-center w-1/3">
                <b class="me-2">Parcelas:</b> {{ $venda->parcelas }}x de
                {{ number_format($venda->valor_parcela, 2, ',', '.') }}
            </div>
        </div>
    </div> <!-- end row -->
    <div class="w-full mt-4">
        <div class="px-5 py-5 card">
            {{-- <div class="w-full mb-3">
                <a class="text-white bg-blue-600 btn" onclick="Livewire.emit('carregaModalAdicionaLote')" role="button">Adicionar Lote</a>
            </div> --}}
            <table class="w-full"
                style="vertical-align: middle; text-align: center;">
                <thead>
                    <tr>
                        <th class="px-4 py-3 font-semibold uppercase rounded-tl-lg whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">Fazenda</th>
                        <th class="px-4 py-3 font-semibold uppercase rounded-tl-lg whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">Lote</th>
                        <th class="px-4 py-3 font-semibold uppercase rounded-tl-lg whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">Raça</th>
                        <th class="px-4 py-3 font-semibold uppercase rounded-tl-lg whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">Registro</th>
                        <th class="px-4 py-3 font-semibold uppercase rounded-tl-lg whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">Valor</th>
                        {{-- <th class="px-4 py-3 font-semibold uppercase rounded-tl-lg whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5"></th> --}}
                    </tr>
                </thead>


                <tbody>
                    @foreach ($venda->carrinho->produtos as $produto)
                        <tr>
                            <td class="px-4 py-3 whitespace-nowrap sm:px-5"><img src="{{ asset($produto->produtable->fazenda->logo) }}"
                                    style="max-width: 100px;" alt=""></td>
                            <td class="px-4 py-3 whitespace-nowrap sm:px-5"><b>LOTE {{ str_pad($produto->produtable->numero, 3, '0', STR_PAD_LEFT) }}
                                    - {{ $produto->produtable->nome }}</b></td>
                            <td class="px-4 py-3 whitespace-nowrap sm:px-5"><b>Raça:</b> {{ $produto->produtable->raca->nome }}</td>
                            <td class="px-4 py-3 whitespace-nowrap sm:px-5"><b>Registro:</b> {{ $produto->produtable->registro }}</td>
                            <td class="px-4 py-3 whitespace-nowrap sm:px-5"><b>Valor:</b>
                                R${{ number_format($produto->produtable->preco, 2, ',', '.') }}</td>
                            {{-- <td class="px-4 py-3 whitespace-nowrap sm:px-5">
                                <button class="border-none bg-none" wire:click="removerProduto({{ $produto->id }})">
                                    <i class="cursor-pointer fas fa-times-circle fa-lg" style="color: red;"></i>
                                </button>
                                
                            </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div> <!-- end row -->
</div>