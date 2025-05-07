<div class="w-full">
    {{-- <div class="w-full">
        <x-botoes.voltar :rota="asset('index')"></x-botoes.voltar>
    </div> --}}
    
    <div class="grid w-full grid-cols-5 gap-6 mt-4">
        @foreach($produtos as $produto)
            <x-marketplace.card-produto :produto="$produto"></x-marketplace.card-produto>
        @endforeach
    </div>
</div>