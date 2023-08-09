@extends('template.main2')

@section("styles")

@endsection

@section('conteudo')

    
<div class="py-14 px-4 md:px-0 px-md-0 w1200 2xl:mx-auto">
    <div class="flex justify-start item-start space-y-2 flex-col">
        <h1 class="text-2xl font-semibold leading-7 lg:leading-9 text-gray-800">Parabéns pela compra !</h1>
        <h2 class="text-xl font-semibold leading-7 lg:leading-9 text-gray-800">Pedido #{{ $venda->codigo }}</h2>
        <p class="text-base  font-medium leading-6 text-gray-600">{{ ucfirst(Carbon\Carbon::parse($venda->created_at)->isoFormat('LLLL')) }}</p>
    </div> 
    <div class="mt-10 flex flex-col xl:flex-row jusitfy-center items-stretch w-full xl:space-x-8 space-y-4 md:space-y-6 xl:space-y-0">
        <div class="flex flex-col justify-start items-start w-full space-y-4 md:space-y-6 xl:space-y-8">
            <div class="flex flex-col justify-start items-start bg-gray-50 px-4 py-4 md:py-6 md:p-6 xl:p-8 w-full">
                @foreach($venda->carrinho->carrinho_produtos as $carrinho_produto)
                    <div class="mt-4 md:mt-6 flex flex-col md:flex-row justify-start items-start md:items-center md:space-x-6 xl:space-x-8 w-full">
                        <div class="pb-4 md:pb-8 w-full md:w-40">
                            <img class="w-full" src="{{ asset($carrinho_produto->produto->produtable->preview) }}" alt="dress" />
                        </div>
                        <div class="border-b border-gray-200 md:flex-row flex-col flex justify-between items-start w-full pb-8 space-y-4 md:space-y-0">
                            <div class="w-full flex flex-col justify-start items-start space-y-3">
                                <h3 class="text-xl  xl:text-2xl font-semibold leading-6 text-orange-600">{{ $carrinho_produto->produto->nome }}</h3>
                                <div class="flex justify-start items-start flex-col space-y-2">
                                    <p class="text-sm  leading-none text-gray-800"><span class="font-bold">RGD: </span> {{ $carrinho_produto->produto->produtable->registro }}</p>
                                    <p class="text-sm  leading-none text-gray-800"><span class="font-bold">RAÇA: </span> {{ mb_strtoupper($carrinho_produto->produto->produtable->raca->nome) }}</p>
                                    <p class="text-sm  leading-none text-gray-800"><span class="font-bold">SEXO: </span> {{ mb_strtoupper($carrinho_produto->produto->produtable->sexo) }}</p>
                                </div>
                            </div>
                            <div class="flex justify-between space-x-8 items-start w-full">
                                <p class="text-base  xl:text-lg leading-6">R${{ number_format($carrinho_produto->total, 2, ",", ".") }} @if($venda->desconto) <span class="text-red-300 line-through"> R${{ number_format($carrinho_produto->produto->preco, 2, ",", ".") }}</span> @endif</p>
                                <p class="text-base  xl:text-lg leading-6 text-gray-800">{{ $carrinho_produto->quantidade }}</p>
                                <p class="text-base  xl:text-lg font-semibold leading-6 text-gray-800">R${{ number_format($carrinho_produto->total, 2, ",", ".") }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="flex justify-center flex-col md:flex-row items-stretch w-full space-y-4 md:space-y-0 md:space-x-6 xl:space-x-8">
                <div class="flex flex-col px-4 py-6 md:p-6 xl:p-8 w-full bg-gray-50 space-y-6">
                    <h3 class="text-xl  font-semibold leading-5 text-gray-800">RESUMO</h3>
                    <div class="flex justify-center items-center w-full space-y-4 flex-col border-gray-200 border-b pb-4">
                        <div class="flex justify-between w-full">
                            <p class="text-base  leading-4 text-gray-800">SUBTOTAL</p>
                            <p class="text-base  leading-4 text-gray-600">R${{ number_format($venda->total + $venda->desconto + $venda->desconto_extra, 2, ",", ".") }}</p>
                        </div>
                        <div class="flex justify-between items-center w-full">
                            <p class="text-base  leading-4 text-gray-800">DESCONTO</p>
                            <p class="text-base  leading-4 text-gray-600">R${{ number_format($venda->desconto + $venda->desconto_extra, 2, ",", ".") }}</p>
                        </div>
                    </div>
                    <div class="flex justify-between items-center w-full">
                        <p class="text-base  font-semibold leading-4 text-gray-800">TOTAL</p>
                        <p class="text-base  font-semibold leading-4 text-gray-600">R${{ number_format($venda->total, 2, ",", ".") }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-gray-50 w-full xl:w-96 flex justify-between items-center md:items-start px-4 py-6 md:p-6 xl:p-8 flex-col">
            <h3 class="text-xl  font-semibold leading-5 text-gray-800">CLIENTE</h3>
            <div class="flex flex-col md:flex-row xl:flex-col justify-start items-stretch h-full w-full md:space-x-6 lg:space-x-8 xl:space-x-0">
                <div class="flex flex-col justify-start items-start flex-shrink-0">
                    <div class="flex justify-center w-full md:justify-start items-center space-x-4 py-8 border-b border-gray-200">
                        <div class="flex justify-start items-start flex-col space-y-2">
                            <p class="text-base  font-semibold leading-4 text-left text-gray-800">{{ $cliente->nome }}</p>
                            <p class="cursor-pointer text-sm leading-5 ">{{ $cliente->email }}</p>
                        </div>
                    </div>
                </div>
                <div class="flex justify-between xl:h-full items-stretch w-full flex-col mt-6 md:mt-0">
                    <div class="flex justify-center md:justify-start xl:flex-col flex-col md:space-x-6 lg:space-x-8 xl:space-x-0 space-y-4 xl:space-y-12 md:space-y-0 md:flex-row items-center md:items-start">
                        <div class="flex justify-center md:justify-start items-center md:items-start flex-col space-y-4 xl:mt-8">
                            <p class="text-base  font-semibold leading-4 text-center md:text-left text-md-left  text-gray-800">Forma de Pagamento</p>
                            <p class="w-48 lg:w-full  xl:w-48 text-center md:text-left text-md-left  text-sm leading-5 text-gray-600">{{ $venda->parcelas }}x de R${{ number_format($venda->valor_parcela, 2 , ",", ".") }}</p>
                        </div>
                        <div class="flex justify-center md:justify-start items-center md:items-start flex-col space-y-4">
                            <p class="text-base  font-semibold leading-4 text-center md:text-left text-md-left  text-gray-800">Assessor</p>
                            <p class="w-48 lg:w-full  xl:w-48 text-center md:text-left text-md-left text-sm leading-5 text-gray-600">{{ ($venda->assessor) ? $venda->assessor->nome : 'Sem Assessor' }}</p>
                        </div>
                    </div>
                    <div class="flex flex-col gap-2 w-full justify-center items-center md:justify-start md:items-start">
                        @if($venda->assessor)<a href="tel:{{ \Util::limparString($venda->assessor->telefone) }}" class="mt-6 py-2 bg-orange-600 text-white hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 border border-gray-800 font-medium w-96 2xl:w-full text-base leading-4">Conversar com assessor</a>@endif
                        <a href="{{ route('conta.index') }}" class="mt-0 py-2 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 border border-gray-800 font-medium w-96 2xl:w-full text-base leading-4 text-gray-800">Ver minhas compras</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection