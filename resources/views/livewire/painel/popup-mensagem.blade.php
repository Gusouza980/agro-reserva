<div class="modal fade" id="modalPopupMensagem" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog modal-dialog-centered" role="document" wire:ignore.self>
        <div class="modal-content" wire:ignore.self>
            <div class="modal-body bg-modal" wire:ignore.self>
                <div class="mt-4 row d-flex justify-content-center">
                    @if($icone == "sucesso")
                        <img src="{{ asset('imagens/icone_cadastro.png') }}" style="width: 120px;" width="120" alt="">
                    @elseif($icone == "erro")
                        <img src="{{ asset('imagens/icone_erro.png') }}" style="width: 120px;" width="120" alt="">
                    @endif
                </div>
                <div class="row">
                    <div class="text-center col-12">
                        {!! $msg !!}
                    </div>
                </div>
                <div class="mt-4 row">
                    <div class="text-center col-12">
                        <button class="btn btn-primary" data-bs-dismiss="modal">Ok</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push("scripts")
    <script>
        window.addEventListener('abreModalPopupMensagem', event => {
            $("#modalPopupMensagem").modal("show");
        });
    </script>
@endpush