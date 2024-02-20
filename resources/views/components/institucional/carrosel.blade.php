<style>
    .banner-home {
        width: 100%;
    }

    .banner-home .swiper-slide {
        position: relative;
    }

    .banner-home a {
        position: absolute;
        display: block;
        width: 100%;
        height: 100%;
    }

    .banner-home img {
        display: block;
        width: 100%;
        height: auto;
        margin: 0;
        padding: 0;
    }

    .banner-home .img-mobile {
        display: none;
    }

    /* nav */
    .banner-home .swiper-button-lock {
        display: none !important;
    }

    .banner-home [class*="swiper-button-"]::after {
        display: none !important;
    }

    .banner-home [class*="swiper-button-"] {
        width: 32px;
        height: 32px;
        display: flex;
        justify-content: center;
        align-items: center;
        background: rgba(0, 0, 0, 0.25);
        border-radius: 50%;
        transition: .2s ease;
    }

    .banner-home [class*="swiper-button-"]:hover {
        background: rgba(0, 0, 0, 0.5);
    }

    .banner-home [class*="swiper-button-"] img {
        width: 20px;
        height: 20px;
    }

    .banner-home .swiper-button-next img {
        transform: rotate(180deg);
    }

    /* pagination */
    .banner-home .swiper-pagination-bullet {
        border: 4px solid rgba(255, 255, 255, 0.8);
        width: 14px;
        height: 14px;
        transition: .1s ease;
    }

    .banner-home .swiper-pagination-bullet:not(.swiper-pagination-bullet-active):hover {
        transform: scale(1.15);
    }

    .banner-home .swiper-pagination-bullet-active {
        width: 15px;
        height: 15px;
        background: transparent;
    }


    @media (max-width: 500px) {
        .banner-home .img-desktop {
            display: none !important;
        }

        .banner-home .img-mobile {
            display: block;
        }

        .banner-home .nav {
            display: none !important;
        }

    }

    @media (min-width: 501px) {
        .banner-home {
            aspect-ratio: 1920/585;
        }
    }
</style>

<div id="banner-home" class="banner-home swiper">
    <div class="swiper-wrapper">
        @foreach ($banners as $banner)
            <div class="swiper-slide">
                <!-- se precisar inserir link no slide, basta colocar aqui -->
                <!-- <a target="_blank" href="https://google.com"></a> -->
                @if ($banner->link)
                    <a target="_blank" href="{{ $banner->link }}"></a>
                @endif
                <img src="{{ asset($banner->caminho) }}" alt="{{ $banner->descricao }}" class="img-desktop">
                <img src="{{ asset($banner->caminho_mobile) }}" alt="{{ $banner->descricao }}" class="img-mobile">
            </div>
        @endforeach
    </div>
    <div class="nav">
        <div class="swiper-button-prev">
            <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAzMjAgNTEyIj48IS0tIUZvbnQgQXdlc29tZSBGcmVlIDYuNS4xIGJ5IEBmb250YXdlc29tZSAtIGh0dHBzOi8vZm9udGF3ZXNvbWUuY29tIExpY2Vuc2UgLSBodHRwczovL2ZvbnRhd2Vzb21lLmNvbS9saWNlbnNlL2ZyZWUgQ29weXJpZ2h0IDIwMjQgRm9udGljb25zLCBJbmMuLS0+PHBhdGggZmlsbD0iI2ZmZmZmZiIgZD0iTTkuNCAyMzMuNGMtMTIuNSAxMi41LTEyLjUgMzIuOCAwIDQ1LjNsMTkyIDE5MmMxMi41IDEyLjUgMzIuOCAxMi41IDQ1LjMgMHMxMi41LTMyLjggMC00NS4zTDc3LjMgMjU2IDI0Ni42IDg2LjZjMTIuNS0xMi41IDEyLjUtMzIuOCAwLTQ1LjNzLTMyLjgtMTIuNS00NS4zIDBsLTE5MiAxOTJ6Ii8+PC9zdmc+"
                alt="">
        </div>
        <div class="swiper-button-next">
            <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAzMjAgNTEyIj48IS0tIUZvbnQgQXdlc29tZSBGcmVlIDYuNS4xIGJ5IEBmb250YXdlc29tZSAtIGh0dHBzOi8vZm9udGF3ZXNvbWUuY29tIExpY2Vuc2UgLSBodHRwczovL2ZvbnRhd2Vzb21lLmNvbS9saWNlbnNlL2ZyZWUgQ29weXJpZ2h0IDIwMjQgRm9udGljb25zLCBJbmMuLS0+PHBhdGggZmlsbD0iI2ZmZmZmZiIgZD0iTTkuNCAyMzMuNGMtMTIuNSAxMi41LTEyLjUgMzIuOCAwIDQ1LjNsMTkyIDE5MmMxMi41IDEyLjUgMzIuOCAxMi41IDQ1LjMgMHMxMi41LTMyLjggMC00NS4zTDc3LjMgMjU2IDI0Ni42IDg2LjZjMTIuNS0xMi41IDEyLjUtMzIuOCAwLTQ1LjNzLTMyLjgtMTIuNS00NS4zIDBsLTE5MiAxOTJ6Ii8+PC9zdmc+"
                alt="">
        </div>
    </div>
    <div class="swiper-pagination"></div>
</div>

<script>
    const sliderHome = new Swiper('#banner-home', {
        speed: 250,
        loop: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
            // dynamicBullets: true,
            // dynamicMainBullets: 3,
        },
        navigation: {
            prevEl: '.swiper-button-prev',
            nextEl: '.swiper-button-next',
        },

    });
</script>
