
@push("styles")

<style>
    .card-imagem-produto{
        width: 200px;
        height: 200px;
        padding: 10px 10px;
        border: 1px solid #1870d5;
        transition: 0.5s;
        cursor: pointer;
        position: relative;
    }

    .card-imagem-produto:hover{
        background-color: #1870d5;
    }

    .card-imagem-produto.ativo{
        background-color: #1870d5;
    }

    .card-imagem-produto > img{
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .fa-times-circle{
        color: red;
        cursor: pointer;
        transition: 0.5s;
    }

    .fa-times-circle:hover{
        font-size: 24px;
    }
</style>

@endpush

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="mb-3">
                <label for="imagem" class="form-label">Imagem</label>
                <input type="file" class="form-control" name="imagem" id="imagem" placeholder="" aria-describedby="fileHelpId" wire:model="imagem">
                <small id="fileHelpId" class="form-text text-muted">Dê preferência para imagens quadradas</small>
            </div>
        </div>
    </div>
    <hr>
    <div class="d-flex flex-row">
        @foreach($produto->imagens as $imagem)
            <div class="me-2" wire:key='{{ $imagem->id }}' wire:click='setAtivo({{ $imagem->id }})'>
                <div class="card-imagem-produto @if($produto->marketplace_produto_imagem_id == $imagem->id) ativo @endif">
                    <img src="{{ asset($imagem->caminho) }}" alt="">
                </div>
                <div class="container-fluid mt-2">
                    <div class="row justify-content-center text-center">
                        <i class="fas fa-times-circle fa-lg" wire:click="deletarImagem({{ $imagem->id }})"></i>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
