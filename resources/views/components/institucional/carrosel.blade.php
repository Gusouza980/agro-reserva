<div class="container-fluid px-0 bg-preto">
    <div id="carouselBannersHome" class="carousel carousel-fade slide relative" data-bs-ride="carousel">
        <div class="carousel-inner relative w-full overflow-hidden" style="">
            @php
                $cont = 0;
            @endphp
            @foreach ($banners as $banner)
                <div class="carousel-item @if ($cont == 0) active @endif relative float-left w-full">
                    <img src="{{ asset($banner->caminho) }}" class="block w-full" alt="..." />
                </div>
                @php
                    $cont++;
                @endphp
            @endforeach
        </div>
        <button
            class="carousel-control-prev absolute top-0 bottom-0 flex items-center justify-center p-0 text-center border-0 hover:outline-none hover:no-underline focus:outline-none focus:no-underline left-0"
            type="button" data-bs-target="#carouselBannersHome" data-bs-slide="prev">
            <span class="carousel-control-prev-icon inline-block bg-no-repeat" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button
            class="carousel-control-next absolute top-0 bottom-0 flex items-center justify-center p-0 text-center border-0 hover:outline-none hover:no-underline focus:outline-none focus:no-underline right-0"
            type="button" data-bs-target="#carouselBannersHome" data-bs-slide="next">
            <span class="carousel-control-next-icon inline-block bg-no-repeat" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
