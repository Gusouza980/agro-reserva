<div class="w-full border border-slate-300 rounded-lg px-4 py-4">
    @foreach(config("clientes.tipos_documento") as $key => $nome)
        <div class="w-full">
            <h5 class="font-medium text-gray-600 tracking-wide">{{ $nome }}</h5>
            <div class="w-full flex flex-wrap mt-3 gap-4">
                @foreach($this->getDocumentos($key) as $documento)
                    <a href="{{ asset($documento->caminho) }}" target="_blank" class="w-fit max-w-[300px] border rounded-lg border-slate-300 px-2 py-2 hover:bg-orange-500 hover:text-white">
                        <i class="fa-solid fa-paperclip mr-3"></i> Código #{{ $documento->id }}
                    </a>
                @endforeach
            </div>
        </div>
        <hr class="my-3">
    @endforeach
</div>