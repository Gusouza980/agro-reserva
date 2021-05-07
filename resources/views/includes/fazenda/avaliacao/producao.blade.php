<div class="row py-4 justify-content-center justify-content-lg-start">
    @foreach($fazenda->producoes as $producao)
        <div class="col-2 px-0 text-section2-fazenda">
            <div class="text-center text-section2-fazenda text-center">
                <h1 class="mb-n1">{{$producao->titulo}}</h1>
                <span>{{$producao->subtitulo}}</span>
            </div>    
        </div>
    @endforeach
</div>