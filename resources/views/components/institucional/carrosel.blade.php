<div class="px-0 container-fluid bg-preto">
    <div id="carouselBannersHome" class="relative carousel carousel-fade slide" data-bs-ride="carousel">
        <div class="relative w-full overflow-hidden carousel-inner" style="">
            @php
                $cont = 0;
            @endphp
            {{-- <div class="relative float-left w-full carousel-item active">
                <img src="{{ asset('imagens/banner1.jpg') }}" class="block w-full" alt="..." />
            </div> --}}
            @foreach ($banners as $banner)
                <div class="carousel-item @if($cont == 0) active @endif relative float-left w-full">
                    @if($agent->isMobile())
                        <img class="cursor-pointer" onclick="window.location.href='{{ $banner->link }}'" src="{{ asset($banner->caminho_mobile) }}" class="block w-full" alt="..." />
                    @else
                        <img class="cursor-pointer" onclick="window.location.href='{{ $banner->link }}'" src="{{ asset($banner->caminho) }}" class="block w-full" alt="..." />
                    @endif
                </div>
                @php
                    $cont++;
                @endphp
            @endforeach
        </div>
        <button
            class="absolute top-0 bottom-0 left-0 flex items-center justify-center p-0 text-center border-0 carousel-control-prev hover:outline-none hover:no-underline focus:outline-none focus:no-underline"
            type="button" data-bs-target="#carouselBannersHome" data-bs-slide="prev">
            <span class="inline-block bg-no-repeat carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button
            class="absolute top-0 bottom-0 right-0 flex items-center justify-center p-0 text-center border-0 carousel-control-next hover:outline-none hover:no-underline focus:outline-none focus:no-underline"
            type="button" data-bs-target="#carouselBannersHome" data-bs-slide="next">
            <span class="inline-block bg-no-repeat carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Próximo</span>
        </button>
    </div>
</div>
