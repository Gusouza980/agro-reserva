<div class="modal fade" id="modalCadastroMarketplaceCategoria" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
    aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog modal-md" role="document" wire:ignore.self>
        <div class="modal-content" wire:ignore.self>
            <div class="bg-preto modal-header" wire:ignore.self>
                <h5 class="text-white modal-title">Cadastro de Reserva</h5>
                <i data-bs-dismiss="modal" aria-label="Close" class="text-white fas fa-times cpointer"></i>
            </div>
            <div class="modal-body bg-modal" wire:ignore.self>
                <form wire:submit.prevent='salvar' class="row">
                    <div class="mb-3">
                        <label for="" class="form-label">Nome</label>
                        <input type="text" class="form-control" name="" id="" aria-describedby="helpId" maxlength="50" wire:model.defer='categoria.nome'>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Categoria Pai</label>
                        <select class="form-control" name="" id="" wire:model="categoria.marketplace_categoria_id">
                            <option value="">Nenhuma</option>
                            @foreach(\App\Models\MarketplaceCategoria::orderBy("nome", "ASC")->get() as $categoria)
                                <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        window.addEventListener('abreModalCadastroMarketplaceCategoria', event => {
            $("#modalCadastroMarketplaceCategoria").modal("show");
        });

        window.addEventListener('fechaModalCadastroMarketplaceCategoria', event => {
            $("#modalCadastroMarketplaceCategoria").modal("hide");
        });

        $("#modalCadastroMarketplaceCategoria").bind('hidden.bs.modal', function(event) {
            Livewire.emit("resetaModalReservas");
        });
    </script>
@endpush
