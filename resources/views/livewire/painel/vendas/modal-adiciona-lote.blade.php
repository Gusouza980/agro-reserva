<div class="modal fade" id="modalAdicionaLote" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
    aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog modal-lg" role="document" wire:ignore.self>
        <div class="modal-content" wire:ignore.self>
            <div class="bg-preto modal-header" wire:ignore.self>
                <h5 class="text-white modal-title">Adicionar lote a venda #{{ $venda->codigo }}</h5>
                <i data-bs-dismiss="modal" aria-label="Close" class="text-white fas fa-times cpointer"></i>
            </div>
            <div class="modal-body bg-modal" wire:ignore.self>
                <div class="row">
                    <div class="col-12">
                        <div class="card curso">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-3">
                                          <label for="" class="form-label">Pesquisar</label>
                                          <input type="text"
                                            class="form-control" name="" id="" placeholder="Pesquisar lote por nome, número ou fazenda" wire:model.debounce.500ms="filtro_lotes">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <table class="table">
                                            <tbody>
                                                @foreach($lotes as $lote)
                                                    <tr>
                                                        <td scope="row">LOTE {{ str_pad($lote->numero, 3, "0", STR_PAD_LEFT) }} - {{ $lote->nome }}</td>
                                                        <td>{{ $lote->fazenda->nome_fazenda }}</td>
                                                        <td>
                                                            <i class="cpointer fas fa-check-square fa-lg text-success" wire:click="selecionarLote({{ $lote->id }})"></i>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div class="w-100 d-flex justify-content-center">
                                            {{ $lotes->links() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <x-loading></x-loading>
</div>

@push('scripts')
    <script>
        window.addEventListener('abreModalAdicionaLote', event => {
            $("#modalAdicionaLote").modal("show");
        });

        window.addEventListener('fechaModalAdicionaLote', event => {
            $("#modalAdicionaLote").modal("hide");
        });

        $("#modalAdicionaLote").bind('hidden.bs.modal', function(event) {
            Livewire.emit("resetaModalReservas");
        });
    </script>
@endpush
