<div class="w-full flex flex-col gap-y-3" x-cloak>
    @foreach($compras as $compra)
        <div class="w-full border rounded-md py-3 px-3 flex md:flex-row flex-col justify-between items-center gap-y-3">
            <div class="text-center md:text-left">
                <p><b>Código: </b> #{{ $compra->id }}</p>
                <p>{{ date('d/m/Y', strtotime($compra->created_at)) }}</p>
            </div>
            <div class="text-center md:text-left">
                <p><b>Total: </b> R${{ formataDinheiro($compra->total) }}</p>
                <p><b>Parcelas: </b> {{ $compra->num_parcelas }}</p>
            </div>
            <div class="text-center md:text-left">
                <a href="{{ route('conta.compra', $compra->id) }}" class="bg-orange-600 text-white rounded-md px-4 py-1 hover:bg-orange-700 transition duration-200">
                    Ver mais
                </a>
            </div>
        </div>
    @endforeach
    <div class="w-full flex justify-center">
        {{ $compras->links() }}
    </div>
</div>
