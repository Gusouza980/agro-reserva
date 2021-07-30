<div class="row py-4 justify-content-center justify-content-lg-start">
    @foreach($fazenda->avaliacoes as $avaliacao)
        <div class="mr-4">
            <img src="{{asset($avaliacao->caminho)}}" style="width: 100px;" alt="{{$avaliacao->nome}}">
        </div>
    @endforeach
    {{--  <div class="col-12 px-0 text-section2-fazenda text-center text-md-left">
        <img src="{{asset('imagens/ancp.png')}}" style="max-width: 100px;" alt="">
        <img class="ml-3" src="{{asset('imagens/ancp.png')}}" style="max-width: 100px;" alt="">
    </div>  --}}
</div>