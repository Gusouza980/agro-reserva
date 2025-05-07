@extends('template.main2')

@section('styles')

@endsection

@section('conteudo')

<div class="w1200 mx-auto my-10 px-4 md:px-0">
    <div class="w-full mb-3">
        <a href="{{route('conta.index')}}" class="w-fit bg-orange-500 px-3 py-1 flex items-center justify-center text-white rounded-md">Voltar</a>
    </div>
    <div class="w-full flex md:flex-row flex-col gap-4">
        <div class="grow bg-white rounded-lg px-6 py-8">
            <div class="w-full border-b pb-2 flex flex-col md:flex-row justify-between items-center gap-2">
                <h5 class="font-bold tracking-wider">Detalhes da compra: <span class="text-orange-600">#{{ $venda->id }}</span></h5>
                <a href="{{route('conta.reserva.comprovante', ['venda' => $venda])}}" target="_blank" class="md:w-fit w-full rounded-md flex items-center justify-center h-8 px-3 bg-emerald-400 hover:bg-emerald-600 text-white transition duration-200">
                    Baixar Comprovante
                </a>
            </div>
            <div class="w-full flex flex-col">
                @foreach($venda->carrinho->produtos as $key => $produto)
                    <div class="w-full flex md:flex-row flex-col justify-between items-center border-b py-2 gap-3">
                        <div class="w-[200px]">
                            <img src="{{asset($produto->produtable->preview)}}" alt="">
                        </div>
                        <div>
                            <p>
                                <b>Nome:</b> {{ $produto->nome }}
                            </p>
                            <p>
                                <b>Preço:</b> R${{ formataDinheiro($produto->preco) }}
                            </p>
                            <p>
                                <b>Detalhes:</b> {!! $produto->produtable->descricao !!}
                            </p>
                        </div>
                        <div>
                            <a href="{{ route('fazenda.lote', ['fazenda' => $produto->produtable->fazenda->slug, 'lote' => $produto->produtable->id, 'reserva' => $produto->produtable->reserva_id]) }}" target="_blank" class="rounded-md bg-emerald-400 hover:bg-emerald-600 transition duration-200 text-white w-32 h-8 flex justify-center items-center">
                                Página do Lote
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="w-full md:max-w-[300px] bg-white rounded-lg px-6 py-8">
            <div class="w-full border-b pb-2">
                <h5 class="font-bold tracking-wider">Informações de Pagamento</span></h5>
            </div>
            <div class="w-full py-2 border-b flex flex-col gap-y-1">
                <p class="flex justify-between">
                    <b>Parcelas:</b> {{ $venda->num_parcelas }}
                </p>
                <p class="flex justify-between">
                    <b>Desconto:</b> R${{ formataDinheiro($venda->desconto + $venda->desconto_extra) }}
                </p>
                <p class="flex justify-between">
                    <b>Entrada:</b> R${{ formataDinheiro($venda->entrada) }}
                </p>
                <p class="flex justify-between">
                    <b>Total:</b> R${{ formataDinheiro($venda->total) }}
                </p>
            </div>
            <div class="pt-2">
                @if($venda->assessor_id)
                    Assessorado por {{ $venda->assessor->nome }}
                @else
                    Sem Assessor
                @endif
            </div>
        </div>
        
    </div>
</div>



@endsection
