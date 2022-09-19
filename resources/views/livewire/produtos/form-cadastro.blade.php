<div>
    <form action="{{ route('painel.marketplace.vendedores.produtos.salvar', ['vendedor' => $vendedor]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if($produto)
            <input type="hidden" name="marketplace_produto_id" value="{{ $produto->id }}">
        @endif
        <div class="row">
            <div class="col-12">
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome do Produto (*)</label>
                    <input type="text" class="form-control" name="nome" id="nome" @if($produto) value="{{ $produto->nome }}" @endif maxlength="255" required>
                </div>
            </div>
            <div class="col-12">
                <div class="mb-3">
                    <label for="resumo" class="form-label">Resumo</label>
                    <textarea class="form-control" name="resumo" id="resumo" rows="3" maxlength="255"
                        required>@if($produto) {{ $produto->resumo }} @endif</textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="mb-3" wire:ignore>
                <label for="descricao">Descrição</label>
                <textarea class="form-control" input="descricao" name="descricao" id="summernote" rows="10"
                    >@if($produto) {{ $produto->descricao }} @endif</textarea>
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col-6 col-md-2">
                <label for="valor" class="form-label">Valor (R$)</label>
                <input type="number" class="form-control" name="valor" id="valor" aria-describedby="helpId"
                    placeholder="" min="0" step="0.01" @if($produto) value="{{ $produto->valor }}" @endif>
            </div>
            <div class="mb-3 col-6 col-md-2">
                <label for="parcelas" class="form-label">Max. Parcelas</label>
                <input type="number" class="form-control" name="parcelas" id="parcelas" aria-describedby="helpId"
                    placeholder="" min="1" step="0.01" @if($produto) value="{{ $produto->parcelas }}" @endif>
            </div>
            <div class="col-6 col-md-2">
                <label for="parcelas" class="form-label">Formas de Pagamento</label><br>
                <div class="mt-2 form-check form-check-inline">
                    <input type="checkbox" class="form-check-input" name="boleto" id="" @if($produto && $produto->boleto) checked @endif value="checkedValue">
                    <label class="form-check-label" for="">
                        <i class="fas fa-barcode fa-2x mt-n1"></i>
                    </label>
                </div>
                <div class="mt-2 form-check form-check-inline">
                    <input type="checkbox" class="form-check-input" name="cartao" id="" @if($produto && $produto->cartao) checked @endif value="checkedValue">
                    <label class="form-check-label" for="">
                        <i class="fas fa-credit-card fa-2x mt-n1"></i>
                    </label>
                </div>
            </div>
            @if(!$produto)
                <div class="col-6 col-md-2">
                    <div class="mb-3">
                        <label for="" class="form-label">Segmento</label>
                        <select class="form-control" name="" id="" wire:model="segmento">
                            <option value="">Selecione um segmento</option>
                            @foreach (config('vendedores.segmentos') as $key => $seg)
                                <option value="{{ $key }}">{{ $seg }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            @endif
        </div>
        <hr>
        @if($segmento !== null)
            @switch($segmento)
                @case(0)
                    @livewire("produtos.form-semen", ["semen" => (isset($produto->produtable) ? $produto->produtable : null)])
                    @break
                @case(2)
                    
                    @break
                @default
            @endswitch
        @endif
        <div class="row">
            <div class="col-12">
                <div class="gap-2 d-grid">
                    <button type="submit" name="" id="" class="btn btn-laranja">Salvar</button>
                </div>
            </div>
        </div>
    </form>
</div>

@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet" />
    <link href="{{ asset('admin/libs/select2/css/select2.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script src="{{ asset('admin/libs/select2/js/select2.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 300
            });
        });
    </script>
@endpush
