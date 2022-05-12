<div class="row justify-content-center justify-content-lg-between" id="container-lotes" wire:init='setCarregar'>
    @if($livres)
        @foreach($livres->where("prioridade", true) as $lote)
            @if($lote->pacote)
                @switch($lote->modelo_exibicao)
                    @case(0)
                        @include('includes.lotes.pacotes.modelo00')
                    @break;
                    @case(2)
                        @include('includes.lotes.pacotes.modelo00')
                    @break;
                    @default
                        @include('includes.lotes.pacotes.modelo00')
                    @break;
                @endswitch
            @else
                @switch($lote->modelo_exibicao)
                    @case(0)
                        @include('includes.lotes.modelo00')
                    @break;
                    @case(1)
                        @include('includes.lotes.modelo01')
                    @break;
                    @case(2)
                        @include('includes.lotes.modelo02')
                    @break;
                    @case(3)
                        @include('includes.lotes.modelo03')
                    @break;
                    @case(4)
                        @include('includes.lotes.modelo04')
                    @break;
                    @case(5)
                        @include('includes.lotes.modelo05')
                    @break;
                    @case(6)
                        @include('includes.lotes.modelo06')
                    @break;
                    @case(7)
                        @include('includes.lotes.modelo07')
                    @break;
                    @default
                        @include('includes.lotes.modelo02')
                    @break;
                @endswitch
            @endif
        @endforeach
        @foreach ($livres->where("prioridade", false) as $lote)

            @if($lote->pacote)
                @switch($lote->modelo_exibicao)
                    @case(0)
                        @include('includes.lotes.pacotes.modelo00')
                    @break;
                    @case(2)
                        @include('includes.lotes.pacotes.modelo00')
                    @break;
                    @default
                        @include('includes.lotes.pacotes.modelo00')
                    @break;
                @endswitch
            @else
                @switch($lote->modelo_exibicao)
                    @case(0)
                        @include('includes.lotes.modelo00')
                    @break;
                    @case(1)
                        @include('includes.lotes.modelo01')
                    @break;
                    @case(2)
                        @include('includes.lotes.modelo02')
                    @break;
                    @case(3)
                        @include('includes.lotes.modelo03')
                    @break;
                    @case(4)
                        @include('includes.lotes.modelo04')
                    @break;
                    @case(5)
                        @include('includes.lotes.modelo05')
                    @break;
                    @case(6)
                        @include('includes.lotes.modelo06')
                    @break;
                    @case(7)
                        @include('includes.lotes.modelo07')
                    @break;
                    @default
                        @include('includes.lotes.modelo02')
                    @break;
                @endswitch
            @endif

        @endforeach
    @endif
    @if($reservados)
        @foreach ($reservados as $lote)

            @if($lote->pacote)
                @switch($lote->modelo_exibicao)
                    @case(0)
                        @include('includes.lotes.pacotes.modelo00')
                    @break;
                    @case(2)
                        @include('includes.lotes.pacotes.modelo00')
                    @break;
                    @default
                        @include('includes.lotes.pacotes.modelo00')
                    @break;
                @endswitch
            @else
                @switch($lote->modelo_exibicao)
                    @case(0)
                        @include('includes.lotes.modelo00')
                    @break;
                    @case(1)
                        @include('includes.lotes.modelo01')
                    @break;
                    @case(2)
                        @include('includes.lotes.modelo02')
                    @break;
                    @case(3)
                        @include('includes.lotes.modelo03')
                    @break;
                    @case(4)
                        @include('includes.lotes.modelo04')
                    @break;
                    @case(5)
                        @include('includes.lotes.modelo05')
                    @break;
                    @case(6)
                        @include('includes.lotes.modelo06')
                    @break;
                    @case(7)
                        @include('includes.lotes.modelo07')
                    @break;
                    @default
                        @include('includes.lotes.modelo02')
                    @break;
                @endswitch
            @endif

        @endforeach
    @endif
    @if ($fazenda->catalogo)
        <div class="col-12 text-center mt-5 link-download-catalogo">
            <a class="link-download-catalogo" href="{{ asset($fazenda->catalogo) }}" class="card-lote-botao"
                href="#" role="button" download="catalogo-{{ $fazenda->slug }}.pdf"><i
                    class="fas fa-file-download mr-3"></i>{{ __('messages.lotes.baixar_pdf_catalogo') }}</a>
        </div>
        {{-- <div class="col-12 text-center mt-5">
        <a name="" id="" ><button class="px-4 py-2">Baixar Catálogo</button></a>
    </div> --}}
    @endif
</div>