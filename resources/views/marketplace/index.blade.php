@extends('marketplace.template.main')

@section('conteudo')
    <div class="site__body">
        <!-- .block-slideshow -->
        <div class="block-slideshow block-slideshow--layout--with-departments block">
            <div class="container">
                <div class="row">
                    {{-- <div class="col-lg-3 d-none d-lg-block"></div> --}}
                    <div class="col-12">
                        <div class="block-slideshow__body">
                            <div class="owl-carousel"><a class="block-slideshow__slide" href="#">
                                    <div class="block-slideshow__slide-image block-slideshow__slide-image--desktop"
                                        style="background-image: url('{{ asset('marketplace/images/slides/slide-1.jpg') }}'); background-size: cover">
                                    </div>
                                    <div class="block-slideshow__slide-image block-slideshow__slide-image--mobile"
                                        style="background-image: url('{{ asset('marketplace/images/slides/slide-1-mobile.jpg') }}'); background-size: cover">
                                    </div>
                                    <div class="block-slideshow__slide-content">
                                        <div class="block-slideshow__slide-title">Big choice of<br>Plumbing products
                                        </div>
                                        <div class="block-slideshow__slide-text">Lorem ipsum dolor sit amet,
                                            consectetur adipiscing elit.<br>Etiam pharetra laoreet dui quis
                                            molestie.</div>
                                        <div class="block-slideshow__slide-button"><span class="btn btn-primary btn-lg">Shop
                                                Now</span></div>
                                    </div>
                                </a><a class="block-slideshow__slide" href="#">
                                    <div class="block-slideshow__slide-image block-slideshow__slide-image--desktop"
                                        style="background-image: url('{{ asset('marketplace/images/slides/slide-2.jpg') }}'); background-size: cover">
                                    </div>
                                    <div class="block-slideshow__slide-image block-slideshow__slide-image--mobile"
                                        style="background-image: url('{{ asset('marketplace/images/slides/slide-2-mobile.jpg') }}'); background-size: cover">
                                    </div>
                                    <div class="block-slideshow__slide-content">
                                        <div class="block-slideshow__slide-title">Screwdrivers<br>Professional Tools
                                        </div>
                                        <div class="block-slideshow__slide-text">Lorem ipsum dolor sit amet,
                                            consectetur adipiscing elit.<br>Etiam pharetra laoreet dui quis
                                            molestie.</div>
                                        <div class="block-slideshow__slide-button"><span class="btn btn-primary btn-lg">Shop
                                                Now</span></div>
                                    </div>
                                </a><a class="block-slideshow__slide" href="#">
                                    <div class="block-slideshow__slide-image block-slideshow__slide-image--desktop"
                                        style="background-image: url('{{ asset('marketplace/images/slides/slide-3.jpg') }}'); background-size: cover">
                                    </div>
                                    <div class="block-slideshow__slide-image block-slideshow__slide-image--mobile"
                                        style="background-image: url('{{ asset('marketplace/images/slides/slide-3-mobile.jpg') }}'); background-size: cover">
                                    </div>
                                    <div class="block-slideshow__slide-content">
                                        <div class="block-slideshow__slide-title">One more<br>Unique header</div>
                                        <div class="block-slideshow__slide-text">Lorem ipsum dolor sit amet,
                                            consectetur adipiscing elit.<br>Etiam pharetra laoreet dui quis
                                            molestie.</div>
                                        <div class="block-slideshow__slide-button"><span class="btn btn-primary btn-lg">Shop
                                                Now</span></div>
                                    </div>
                                </a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .block-slideshow / end -->
        <!-- .block-features -->
        <div class="block block-features block-features--layout--classic">
            <div class="container">
                <div class="block-features__list">
                    <div class="block-features__item">
                        <div class="block-features__icon"><svg width="48px" height="48px">
                                <use xlink:href="{{ asset('marketplace/images/sprite.svg#fi-free-delivery-48') }}"></use>
                            </svg></div>
                        <div class="block-features__content text-center">
                            <div class="block-features__title">Melhores produtos</div>
                            <div class="block-features__subtitle">Com as melhores marcas</div>
                        </div>
                    </div>
                    <div class="block-features__divider"></div>
                    <div class="block-features__item">
                        <div class="block-features__icon"><svg width="48px" height="48px">
                                <use xlink:href="{{ asset('marketplace/images/sprite.svg#fi-24-hours-48') }}"></use>
                            </svg></div>
                        <div class="block-features__content text-center">
                            <div class="block-features__title">Suporte 24/7</div>
                            <div class="block-features__subtitle">Nos chame a qualquer momento</div>
                        </div>
                    </div>
                    <div class="block-features__divider"></div>
                    <div class="block-features__item">
                        <div class="block-features__icon"><svg width="48px" height="48px">
                                <use xlink:href="{{ asset('marketplace/images/sprite.svg#fi-payment-security-48') }}">
                                </use>
                            </svg></div>
                        <div class="block-features__content text-center">
                            <div class="block-features__title">100% Seguro</div>
                            <div class="block-features__subtitle">Apenas pagamentos seguros</div>
                        </div>
                    </div>
                    <div class="block-features__divider"></div>
                    <div class="block-features__item">
                        <div class="block-features__icon"><svg width="48px" height="48px">
                                <use xlink:href="{{ asset('marketplace/images/sprite.svg#fi-tag-48') }}"></use>
                            </svg></div>
                        <div class="block-features__content text-center">
                            <div class="block-features__title">Ofertas Quentes</div>
                            <div class="block-features__subtitle">Com o melhor preço</div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .block-features / end -->
        <!-- .block-products-carousel -->
        <div class="block block-products-carousel" data-layout="grid-4" data-mobile-grid-columns="2">
            <div class="container">
                <div class="block-header">
                    <h3 class="block-header__title">Produtos em destaque</h3>
                    <div class="block-header__divider"></div>
                    <ul class="block-header__groups-list">
                        {{-- <li><button type="button" class="block-header__group block-header__group--active">All</button></li>
                        <li><button type="button" class="block-header__group">Power Tools</button></li>
                        <li><button type="button" class="block-header__group">Hand Tools</button></li>
                        <li><button type="button" class="block-header__group">Plumbing</button></li> --}}
                    </ul>
                    <div class="block-header__arrows-list"><button class="block-header__arrow block-header__arrow--left"
                            type="button"><svg width="7px" height="11px">
                                <use xlink:href="{{ asset('marketplace/images/sprite.svg#arrow-rounded-left-7x11') }}">
                                </use>
                            </svg></button> <button class="block-header__arrow block-header__arrow--right"
                            type="button"><svg width="7px" height="11px">
                                <use xlink:href="{{ asset('marketplace/images/sprite.svg#arrow-rounded-right-7x11') }}">
                                </use>
                            </svg></button></div>
                </div>
                <div class="block-products-carousel__slider">
                    <div class="block-products-carousel__preloader"></div>
                    <div class="owl-carousel">
                        <div class="block-products-carousel__column">
                            <div class="block-products-carousel__cell">
                                <div class="product-card product-card--hidden-actions">
                                    <div class="product-card__image product-image"><a href="product.html"
                                            class="product-image__body"><img class="product-image__img"
                                                src="{{ asset('marketplace/images/products/product-1.jpg') }}" alt=""></a></div>
                                    <div class="product-card__info">
                                        <div class="product-card__name"><a href="product.html">Electric
                                                Planer Brandix KL370090G 300 Watts</a></div>
                                        <ul class="product-card__features-list">
                                            <li>Speed: 750 RPM</li>
                                            <li>Power Source: Cordless-Electric</li>
                                            <li>Battery Cell Type: Lithium</li>
                                            <li>Voltage: 20 Volts</li>
                                            <li>Battery Capacity: 2 Ah</li>
                                        </ul>
                                    </div>
                                    
                                    <div class="product-card__actions">
                                        <div class="product-card__prices">$749.00</div>
                                        <div class="product-card__buttons"><button
                                                class="btn btn-primary product-card__addtocart" type="button">+ Carrinho</button> <button
                                                class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                                type="button">+ Carrinho</button> <button
                                                class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist"
                                                type="button"><svg width="16px" height="16px">
                                                    <use xlink:href="{{ asset('marketplace/images/sprite.svg#wishlist-16') }}"></use>
                                                </svg> <span
                                                    class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                            <button
                                                class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                                type="button"><svg width="16px" height="16px">
                                                    <use xlink:href="{{ asset('marketplace/images/sprite.svg#compare-16') }}"></use>
                                                </svg> <span
                                                    class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block-products-carousel__column">
                            <div class="block-products-carousel__cell">
                                <div class="product-card product-card--hidden-actions"><button
                                        class="product-card__quickview" type="button"><svg width="16px" height="16px">
                                            <use xlink:href="{{ asset('marketplace/images/sprite.svg#quickview-16') }}">
                                            </use>
                                        </svg> <span class="fake-svg-icon"></span></button>
                                    <div class="product-card__badges-list">
                                        <div class="product-card__badge product-card__badge--new">New</div>
                                    </div>
                                    <div class="product-card__image product-image"><a href="product.html"
                                            class="product-image__body"><img class="product-image__img"
                                                src="{{ asset('marketplace/images/products/product-1.jpg') }}"
                                                alt=""></a>
                                    </div>
                                    <div class="product-card__info">
                                        <div class="product-card__name"><a href="product.html">Electric Planer
                                                Brandix KL370090G 300 Watts</a></div>
                                        <div class="product-card__rating">
                                            <div class="product-card__rating-stars">
                                                <div class="rating">
                                                    <div class="rating__body"><svg
                                                            class="rating__star rating__star--active" width="13px"
                                                            height="12px">
                                                            <g class="rating__fill">
                                                                <use
                                                                    xlink:href="{{ asset('marketplace/images/sprite.svg#star-normal') }}">
                                                                </use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use
                                                                    xlink:href="{{ asset('marketplace/images/sprite.svg#star-normal-stroke') }}">
                                                                </use>
                                                            </g>
                                                        </svg>
                                                        <div
                                                            class="rating__star rating__star--only-edge rating__star--active">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div><svg class="rating__star rating__star--active" width="13px"
                                                            height="12px">
                                                            <g class="rating__fill">
                                                                <use
                                                                    xlink:href="{{ asset('marketplace/images/sprite.svg#star-normal') }}">
                                                                </use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use
                                                                    xlink:href="{{ asset('marketplace/images/sprite.svg#star-normal-stroke') }}">
                                                                </use>
                                                            </g>
                                                        </svg>
                                                        <div
                                                            class="rating__star rating__star--only-edge rating__star--active">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div><svg class="rating__star rating__star--active" width="13px"
                                                            height="12px">
                                                            <g class="rating__fill">
                                                                <use
                                                                    xlink:href="{{ asset('marketplace/images/sprite.svg#star-normal') }}">
                                                                </use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use
                                                                    xlink:href="{{ asset('marketplace/images/sprite.svg#star-normal-stroke') }}">
                                                                </use>
                                                            </g>
                                                        </svg>
                                                        <div
                                                            class="rating__star rating__star--only-edge rating__star--active">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div><svg class="rating__star rating__star--active" width="13px"
                                                            height="12px">
                                                            <g class="rating__fill">
                                                                <use
                                                                    xlink:href="{{ asset('marketplace/images/sprite.svg#star-normal') }}">
                                                                </use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use
                                                                    xlink:href="{{ asset('marketplace/images/sprite.svg#star-normal-stroke') }}">
                                                                </use>
                                                            </g>
                                                        </svg>
                                                        <div
                                                            class="rating__star rating__star--only-edge rating__star--active">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div><svg class="rating__star" width="13px" height="12px">
                                                            <g class="rating__fill">
                                                                <use
                                                                    xlink:href="{{ asset('marketplace/images/sprite.svg#star-normal') }}">
                                                                </use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use
                                                                    xlink:href="{{ asset('marketplace/images/sprite.svg#star-normal-stroke') }}">
                                                                </use>
                                                            </g>
                                                        </svg>
                                                        <div class="rating__star rating__star--only-edge">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-card__rating-legend">9 Comentários</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block-products-carousel__column">
                            <div class="block-products-carousel__cell">
                                <div class="product-card product-card--hidden-actions"><button
                                        class="product-card__quickview" type="button"><svg width="16px" height="16px">
                                            <use xlink:href="{{ asset('marketplace/images/sprite.svg#quickview-16') }}">
                                            </use>
                                        </svg> <span class="fake-svg-icon"></span></button>
                                    <div class="product-card__badges-list">
                                        <div class="product-card__badge product-card__badge--new">New</div>
                                    </div>
                                    <div class="product-card__image product-image"><a href="product.html"
                                            class="product-image__body"><img class="product-image__img"
                                                src="{{ asset('marketplace/images/products/product-1.jpg') }}"
                                                alt=""></a>
                                    </div>
                                    <div class="product-card__info">
                                        <div class="product-card__name"><a href="product.html">Electric Planer
                                                Brandix KL370090G 300 Watts</a></div>
                                        <div class="product-card__rating">
                                            <div class="product-card__rating-stars">
                                                <div class="rating">
                                                    <div class="rating__body"><svg
                                                            class="rating__star rating__star--active" width="13px"
                                                            height="12px">
                                                            <g class="rating__fill">
                                                                <use
                                                                    xlink:href="{{ asset('marketplace/images/sprite.svg#star-normal') }}">
                                                                </use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use
                                                                    xlink:href="{{ asset('marketplace/images/sprite.svg#star-normal-stroke') }}">
                                                                </use>
                                                            </g>
                                                        </svg>
                                                        <div
                                                            class="rating__star rating__star--only-edge rating__star--active">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div><svg class="rating__star rating__star--active" width="13px"
                                                            height="12px">
                                                            <g class="rating__fill">
                                                                <use
                                                                    xlink:href="{{ asset('marketplace/images/sprite.svg#star-normal') }}">
                                                                </use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use
                                                                    xlink:href="{{ asset('marketplace/images/sprite.svg#star-normal-stroke') }}">
                                                                </use>
                                                            </g>
                                                        </svg>
                                                        <div
                                                            class="rating__star rating__star--only-edge rating__star--active">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div><svg class="rating__star rating__star--active" width="13px"
                                                            height="12px">
                                                            <g class="rating__fill">
                                                                <use
                                                                    xlink:href="{{ asset('marketplace/images/sprite.svg#star-normal') }}">
                                                                </use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use
                                                                    xlink:href="{{ asset('marketplace/images/sprite.svg#star-normal-stroke') }}">
                                                                </use>
                                                            </g>
                                                        </svg>
                                                        <div
                                                            class="rating__star rating__star--only-edge rating__star--active">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div><svg class="rating__star rating__star--active" width="13px"
                                                            height="12px">
                                                            <g class="rating__fill">
                                                                <use
                                                                    xlink:href="{{ asset('marketplace/images/sprite.svg#star-normal') }}">
                                                                </use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use
                                                                    xlink:href="{{ asset('marketplace/images/sprite.svg#star-normal-stroke') }}">
                                                                </use>
                                                            </g>
                                                        </svg>
                                                        <div
                                                            class="rating__star rating__star--only-edge rating__star--active">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div><svg class="rating__star" width="13px" height="12px">
                                                            <g class="rating__fill">
                                                                <use
                                                                    xlink:href="{{ asset('marketplace/images/sprite.svg#star-normal') }}">
                                                                </use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use
                                                                    xlink:href="{{ asset('marketplace/images/sprite.svg#star-normal-stroke') }}">
                                                                </use>
                                                            </g>
                                                        </svg>
                                                        <div class="rating__star rating__star--only-edge">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-card__rating-legend">9 Comentários</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block-products-carousel__column">
                            <div class="block-products-carousel__cell">
                                <div class="product-card product-card--hidden-actions"><button
                                        class="product-card__quickview" type="button"><svg width="16px" height="16px">
                                            <use xlink:href="{{ asset('marketplace/images/sprite.svg#quickview-16') }}">
                                            </use>
                                        </svg> <span class="fake-svg-icon"></span></button>
                                    <div class="product-card__badges-list">
                                        <div class="product-card__badge product-card__badge--new">New</div>
                                    </div>
                                    <div class="product-card__image product-image"><a href="product.html"
                                            class="product-image__body"><img class="product-image__img"
                                                src="{{ asset('marketplace/images/products/product-1.jpg') }}"
                                                alt=""></a>
                                    </div>
                                    <div class="product-card__info">
                                        <div class="product-card__name"><a href="product.html">Electric Planer
                                                Brandix KL370090G 300 Watts</a></div>
                                        <div class="product-card__rating">
                                            <div class="product-card__rating-stars">
                                                <div class="rating">
                                                    <div class="rating__body"><svg
                                                            class="rating__star rating__star--active" width="13px"
                                                            height="12px">
                                                            <g class="rating__fill">
                                                                <use
                                                                    xlink:href="{{ asset('marketplace/images/sprite.svg#star-normal') }}">
                                                                </use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use
                                                                    xlink:href="{{ asset('marketplace/images/sprite.svg#star-normal-stroke') }}">
                                                                </use>
                                                            </g>
                                                        </svg>
                                                        <div
                                                            class="rating__star rating__star--only-edge rating__star--active">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div><svg class="rating__star rating__star--active" width="13px"
                                                            height="12px">
                                                            <g class="rating__fill">
                                                                <use
                                                                    xlink:href="{{ asset('marketplace/images/sprite.svg#star-normal') }}">
                                                                </use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use
                                                                    xlink:href="{{ asset('marketplace/images/sprite.svg#star-normal-stroke') }}">
                                                                </use>
                                                            </g>
                                                        </svg>
                                                        <div
                                                            class="rating__star rating__star--only-edge rating__star--active">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div><svg class="rating__star rating__star--active" width="13px"
                                                            height="12px">
                                                            <g class="rating__fill">
                                                                <use
                                                                    xlink:href="{{ asset('marketplace/images/sprite.svg#star-normal') }}">
                                                                </use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use
                                                                    xlink:href="{{ asset('marketplace/images/sprite.svg#star-normal-stroke') }}">
                                                                </use>
                                                            </g>
                                                        </svg>
                                                        <div
                                                            class="rating__star rating__star--only-edge rating__star--active">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div><svg class="rating__star rating__star--active" width="13px"
                                                            height="12px">
                                                            <g class="rating__fill">
                                                                <use
                                                                    xlink:href="{{ asset('marketplace/images/sprite.svg#star-normal') }}">
                                                                </use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use
                                                                    xlink:href="{{ asset('marketplace/images/sprite.svg#star-normal-stroke') }}">
                                                                </use>
                                                            </g>
                                                        </svg>
                                                        <div
                                                            class="rating__star rating__star--only-edge rating__star--active">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div><svg class="rating__star" width="13px" height="12px">
                                                            <g class="rating__fill">
                                                                <use
                                                                    xlink:href="{{ asset('marketplace/images/sprite.svg#star-normal') }}">
                                                                </use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use
                                                                    xlink:href="{{ asset('marketplace/images/sprite.svg#star-normal-stroke') }}">
                                                                </use>
                                                            </g>
                                                        </svg>
                                                        <div class="rating__star rating__star--only-edge">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-card__rating-legend">9 Comentários</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block-products-carousel__column">
                            <div class="block-products-carousel__cell">
                                <div class="product-card product-card--hidden-actions"><button
                                        class="product-card__quickview" type="button"><svg width="16px" height="16px">
                                            <use xlink:href="{{ asset('marketplace/images/sprite.svg#quickview-16') }}">
                                            </use>
                                        </svg> <span class="fake-svg-icon"></span></button>
                                    <div class="product-card__badges-list">
                                        <div class="product-card__badge product-card__badge--new">New</div>
                                    </div>
                                    <div class="product-card__image product-image"><a href="product.html"
                                            class="product-image__body"><img class="product-image__img"
                                                src="{{ asset('marketplace/images/products/product-1.jpg') }}"
                                                alt=""></a>
                                    </div>
                                    <div class="product-card__info">
                                        <div class="product-card__name"><a href="product.html">Electric Planer
                                                Brandix KL370090G 300 Watts</a></div>
                                        <div class="product-card__rating">
                                            <div class="product-card__rating-stars">
                                                <div class="rating">
                                                    <div class="rating__body"><svg
                                                            class="rating__star rating__star--active" width="13px"
                                                            height="12px">
                                                            <g class="rating__fill">
                                                                <use
                                                                    xlink:href="{{ asset('marketplace/images/sprite.svg#star-normal') }}">
                                                                </use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use
                                                                    xlink:href="{{ asset('marketplace/images/sprite.svg#star-normal-stroke') }}">
                                                                </use>
                                                            </g>
                                                        </svg>
                                                        <div
                                                            class="rating__star rating__star--only-edge rating__star--active">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div><svg class="rating__star rating__star--active" width="13px"
                                                            height="12px">
                                                            <g class="rating__fill">
                                                                <use
                                                                    xlink:href="{{ asset('marketplace/images/sprite.svg#star-normal') }}">
                                                                </use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use
                                                                    xlink:href="{{ asset('marketplace/images/sprite.svg#star-normal-stroke') }}">
                                                                </use>
                                                            </g>
                                                        </svg>
                                                        <div
                                                            class="rating__star rating__star--only-edge rating__star--active">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div><svg class="rating__star rating__star--active" width="13px"
                                                            height="12px">
                                                            <g class="rating__fill">
                                                                <use
                                                                    xlink:href="{{ asset('marketplace/images/sprite.svg#star-normal') }}">
                                                                </use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use
                                                                    xlink:href="{{ asset('marketplace/images/sprite.svg#star-normal-stroke') }}">
                                                                </use>
                                                            </g>
                                                        </svg>
                                                        <div
                                                            class="rating__star rating__star--only-edge rating__star--active">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div><svg class="rating__star rating__star--active" width="13px"
                                                            height="12px">
                                                            <g class="rating__fill">
                                                                <use
                                                                    xlink:href="{{ asset('marketplace/images/sprite.svg#star-normal') }}">
                                                                </use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use
                                                                    xlink:href="{{ asset('marketplace/images/sprite.svg#star-normal-stroke') }}">
                                                                </use>
                                                            </g>
                                                        </svg>
                                                        <div
                                                            class="rating__star rating__star--only-edge rating__star--active">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div><svg class="rating__star" width="13px" height="12px">
                                                            <g class="rating__fill">
                                                                <use
                                                                    xlink:href="{{ asset('marketplace/images/sprite.svg#star-normal') }}">
                                                                </use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use
                                                                    xlink:href="{{ asset('marketplace/images/sprite.svg#star-normal-stroke') }}">
                                                                </use>
                                                            </g>
                                                        </svg>
                                                        <div class="rating__star rating__star--only-edge">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-card__rating-legend">9 Comentários</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .block-products-carousel / end -->
        <!-- .block-banner -->
        <div class="block block-banner">
            <div class="container"><a href="#" class="block-banner__body">
                    <div class="block-banner__image block-banner__image--desktop"
                        style="background-image: url('{{ asset('marketplace/images/banners/banner-1.jpg') }}')"></div>
                    <div class="block-banner__image block-banner__image--mobile"
                        style="background-image: url('{{ asset('marketplace/images/banners/banner-1-mobile.jpg') }})">
                    </div>
                    <div class="block-banner__title">Hundreds<br class="block-banner__mobile-br">Hand Tools</div>
                    <div class="block-banner__text">Hammers, Chisels, Universal Pliers, Nippers, Jigsaws, Saws</div>
                    <div class="block-banner__button"><span class="btn btn-sm btn-primary">Shop Now</span></div>
                </a></div>
        </div><!-- .block-banner / end -->
        <!-- .block-products -->
        <div class="block block-products block-products--layout--large-first" data-mobile-grid-columns="2">
            <div class="container">
                <div class="block-header">
                    <h3 class="block-header__title">Mais Vendidos</h3>
                    <div class="block-header__divider"></div>
                </div>
                <div class="block-products__body">
                    <div class="block-products__list">
                        <div class="block-products__list-item">
                            <div class="product-card product-card--hidden-actions">
                                <div class="product-card__image product-image"><a href="product.html"
                                        class="product-image__body"><img class="product-image__img"
                                            src="{{ asset('marketplace/images/products/product-2.jpg') }}" alt=""></a>
                                </div>
                                <div class="product-card__info">
                                    <div class="product-card__name"><a href="product.html">Undefined Tool IRadix
                                            DPS3000SY 2700 Watts</a></div>
                                </div>
                                <div class="product-card__actions">
                                    <div class="product-card__prices">$1,019.00</div>
                                    <div class="product-card__buttons"><button
                                            class="btn btn-primary product-card__addtocart" type="button">+
                                            Carrinho</button> <button
                                            class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                            type="button">+ Carrinho</button> <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist"
                                            type="button"><svg width="16px" height="16px">
                                                <use
                                                    xlink:href="{{ asset('marketplace/images/sprite.svg#wishlist-16') }}">
                                                </use>
                                            </svg> <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                        <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                            type="button"><svg width="16px" height="16px">
                                                <use
                                                    xlink:href="{{ asset('marketplace/images/sprite.svg#compare-16') }}">
                                                </use>
                                            </svg> <span class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block-products__list-item">
                            <div class="product-card product-card--hidden-actions">
                                <div class="product-card__image product-image"><a href="product.html"
                                        class="product-image__body"><img class="product-image__img"
                                            src="{{ asset('marketplace/images/products/product-2.jpg') }}" alt=""></a>
                                </div>
                                <div class="product-card__info">
                                    <div class="product-card__name"><a href="product.html">Undefined Tool IRadix
                                            DPS3000SY 2700 Watts</a></div>
                                </div>
                                <div class="product-card__actions">
                                    <div class="product-card__prices">$1,019.00</div>
                                    <div class="product-card__buttons"><button
                                            class="btn btn-primary product-card__addtocart" type="button">+
                                            Carrinho</button> <button
                                            class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                            type="button">+ Carrinho</button> <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist"
                                            type="button"><svg width="16px" height="16px">
                                                <use
                                                    xlink:href="{{ asset('marketplace/images/sprite.svg#wishlist-16') }}">
                                                </use>
                                            </svg> <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                        <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                            type="button"><svg width="16px" height="16px">
                                                <use
                                                    xlink:href="{{ asset('marketplace/images/sprite.svg#compare-16') }}">
                                                </use>
                                            </svg> <span class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block-products__list-item">
                            <div class="product-card product-card--hidden-actions">
                                <div class="product-card__image product-image"><a href="product.html"
                                        class="product-image__body"><img class="product-image__img"
                                            src="{{ asset('marketplace/images/products/product-2.jpg') }}" alt=""></a>
                                </div>
                                <div class="product-card__info">
                                    <div class="product-card__name"><a href="product.html">Undefined Tool IRadix
                                            DPS3000SY 2700 Watts</a></div>
                                </div>
                                <div class="product-card__actions">
                                    <div class="product-card__prices">$1,019.00</div>
                                    <div class="product-card__buttons"><button
                                            class="btn btn-primary product-card__addtocart" type="button">+
                                            Carrinho</button> <button
                                            class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                            type="button">+ Carrinho</button> <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist"
                                            type="button"><svg width="16px" height="16px">
                                                <use
                                                    xlink:href="{{ asset('marketplace/images/sprite.svg#wishlist-16') }}">
                                                </use>
                                            </svg> <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                        <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                            type="button"><svg width="16px" height="16px">
                                                <use
                                                    xlink:href="{{ asset('marketplace/images/sprite.svg#compare-16') }}">
                                                </use>
                                            </svg> <span class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block-products__list-item">
                            <div class="product-card product-card--hidden-actions">
                                <div class="product-card__image product-image"><a href="product.html"
                                        class="product-image__body"><img class="product-image__img"
                                            src="{{ asset('marketplace/images/products/product-2.jpg') }}" alt=""></a>
                                </div>
                                <div class="product-card__info">
                                    <div class="product-card__name"><a href="product.html">Undefined Tool IRadix
                                            DPS3000SY 2700 Watts</a></div>
                                </div>
                                <div class="product-card__actions">
                                    <div class="product-card__prices">$1,019.00</div>
                                    <div class="product-card__buttons"><button
                                            class="btn btn-primary product-card__addtocart" type="button">+
                                            Carrinho</button> <button
                                            class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                            type="button">+ Carrinho</button> <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist"
                                            type="button"><svg width="16px" height="16px">
                                                <use
                                                    xlink:href="{{ asset('marketplace/images/sprite.svg#wishlist-16') }}">
                                                </use>
                                            </svg> <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                        <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                            type="button"><svg width="16px" height="16px">
                                                <use
                                                    xlink:href="{{ asset('marketplace/images/sprite.svg#compare-16') }}">
                                                </use>
                                            </svg> <span class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block-products__list-item">
                            <div class="product-card product-card--hidden-actions">
                                <div class="product-card__image product-image"><a href="product.html"
                                        class="product-image__body"><img class="product-image__img"
                                            src="{{ asset('marketplace/images/products/product-2.jpg') }}" alt=""></a>
                                </div>
                                <div class="product-card__info">
                                    <div class="product-card__name"><a href="product.html">Undefined Tool IRadix
                                            DPS3000SY 2700 Watts</a></div>
                                </div>
                                <div class="product-card__actions">
                                    <div class="product-card__prices">$1,019.00</div>
                                    <div class="product-card__buttons"><button
                                            class="btn btn-primary product-card__addtocart" type="button">+
                                            Carrinho</button> <button
                                            class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                            type="button">+ Carrinho</button> <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist"
                                            type="button"><svg width="16px" height="16px">
                                                <use
                                                    xlink:href="{{ asset('marketplace/images/sprite.svg#wishlist-16') }}">
                                                </use>
                                            </svg> <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                        <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                            type="button"><svg width="16px" height="16px">
                                                <use
                                                    xlink:href="{{ asset('marketplace/images/sprite.svg#compare-16') }}">
                                                </use>
                                            </svg> <span class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block-products__list-item">
                            <div class="product-card product-card--hidden-actions">
                                <div class="product-card__image product-image"><a href="product.html"
                                        class="product-image__body"><img class="product-image__img"
                                            src="{{ asset('marketplace/images/products/product-2.jpg') }}" alt=""></a>
                                </div>
                                <div class="product-card__info">
                                    <div class="product-card__name"><a href="product.html">Undefined Tool IRadix
                                            DPS3000SY 2700 Watts</a></div>
                                </div>
                                <div class="product-card__actions">
                                    <div class="product-card__prices">$1,019.00</div>
                                    <div class="product-card__buttons"><button
                                            class="btn btn-primary product-card__addtocart" type="button">+
                                            Carrinho</button> <button
                                            class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                            type="button">+ Carrinho</button> <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist"
                                            type="button"><svg width="16px" height="16px">
                                                <use
                                                    xlink:href="{{ asset('marketplace/images/sprite.svg#wishlist-16') }}">
                                                </use>
                                            </svg> <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                        <button
                                            class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                            type="button"><svg width="16px" height="16px">
                                                <use
                                                    xlink:href="{{ asset('marketplace/images/sprite.svg#compare-16') }}">
                                                </use>
                                            </svg> <span class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .block-products / end -->
        <!-- .block-products-carousel -->
        <div class="block block-products-carousel" data-layout="horizontal" data-mobile-grid-columns="2">
            <div class="container">
                <div class="block-header">
                    <h3 class="block-header__title">Novidades</h3>
                    <div class="block-header__divider"></div>
                    <ul class="block-header__groups-list">
                        <li><button type="button" class="block-header__group block-header__group--active">All</button></li>
                        <li><button type="button" class="block-header__group">Power Tools</button></li>
                        <li><button type="button" class="block-header__group">Hand Tools</button></li>
                        <li><button type="button" class="block-header__group">Plumbing</button></li>
                    </ul>
                    <div class="block-header__arrows-list"><button class="block-header__arrow block-header__arrow--left"
                            type="button"><svg width="7px" height="11px">
                                <use xlink:href="{{ asset('marketplace/images/sprite.svg#arrow-rounded-left-7x11') }}">
                                </use>
                            </svg></button> <button class="block-header__arrow block-header__arrow--right"
                            type="button"><svg width="7px" height="11px">
                                <use xlink:href="{{ asset('marketplace/images/sprite.svg#arrow-rounded-right-7x11') }}">
                                </use>
                            </svg></button></div>
                </div>
                <div class="block-products-carousel__slider">
                    <div class="block-products-carousel__preloader"></div>
                    <div class="owl-carousel">
                        <div class="block-products-carousel__column">
                            <div class="block-products-carousel__cell">
                                <div class="product-card product-card--hidden-actions">
                                    <div class="product-card__image product-image"><a href="product.html"
                                            class="product-image__body"><img class="product-image__img"
                                                src="{{ asset('marketplace/images/products/product-1.jpg') }}"
                                                alt=""></a></div>
                                    <div class="product-card__info">
                                        <div class="product-card__name"><a href="product.html">Electric Planer
                                                Brandix KL370090G 300 Watts</a></div>
                                    </div>
                                    <div class="product-card__actions">
                                        <div class="product-card__availability">Availability: <span
                                                class="text-success">In Stock</span></div>
                                        <div class="product-card__prices">$749.00</div>
                                        <div class="product-card__buttons"><button
                                                class="btn btn-primary product-card__addtocart" type="button">Add To
                                                Cart</button> <button
                                                class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                                type="button">Add To Cart</button> <button
                                                class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist"
                                                type="button"><svg width="16px" height="16px">
                                                    <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                                </svg> <span
                                                    class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                            <button
                                                class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                                type="button"><svg width="16px" height="16px">
                                                    <use xlink:href="images/sprite.svg#compare-16"></use>
                                                </svg> <span
                                                    class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="block-products-carousel__cell">
                                <div class="product-card product-card--hidden-actions">
                                    <div class="product-card__image product-image"><a href="product.html"
                                            class="product-image__body"><img class="product-image__img"
                                                src="{{ asset('marketplace/images/products/product-1.jpg') }}"
                                                alt=""></a></div>
                                    <div class="product-card__info">
                                        <div class="product-card__name"><a href="product.html">Electric Planer
                                                Brandix KL370090G 300 Watts</a></div>
                                    </div>
                                    <div class="product-card__actions">
                                        <div class="product-card__availability">Availability: <span
                                                class="text-success">In Stock</span></div>
                                        <div class="product-card__prices">$749.00</div>
                                        <div class="product-card__buttons"><button
                                                class="btn btn-primary product-card__addtocart" type="button">Add To
                                                Cart</button> <button
                                                class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                                type="button">Add To Cart</button> <button
                                                class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist"
                                                type="button"><svg width="16px" height="16px">
                                                    <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                                </svg> <span
                                                    class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                            <button
                                                class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                                type="button"><svg width="16px" height="16px">
                                                    <use xlink:href="images/sprite.svg#compare-16"></use>
                                                </svg> <span
                                                    class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block-products-carousel__column">
                            <div class="block-products-carousel__cell">
                                <div class="product-card product-card--hidden-actions">
                                    <div class="product-card__image product-image"><a href="product.html"
                                            class="product-image__body"><img class="product-image__img"
                                                src="{{ asset('marketplace/images/products/product-1.jpg') }}"
                                                alt=""></a></div>
                                    <div class="product-card__info">
                                        <div class="product-card__name"><a href="product.html">Electric Planer
                                                Brandix KL370090G 300 Watts</a></div>
                                    </div>
                                    <div class="product-card__actions">
                                        <div class="product-card__availability">Availability: <span
                                                class="text-success">In Stock</span></div>
                                        <div class="product-card__prices">$749.00</div>
                                        <div class="product-card__buttons"><button
                                                class="btn btn-primary product-card__addtocart" type="button">Add To
                                                Cart</button> <button
                                                class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                                type="button">Add To Cart</button> <button
                                                class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist"
                                                type="button"><svg width="16px" height="16px">
                                                    <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                                </svg> <span
                                                    class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                            <button
                                                class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                                type="button"><svg width="16px" height="16px">
                                                    <use xlink:href="images/sprite.svg#compare-16"></use>
                                                </svg> <span
                                                    class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="block-products-carousel__cell">
                                <div class="product-card product-card--hidden-actions">
                                    <div class="product-card__image product-image"><a href="product.html"
                                            class="product-image__body"><img class="product-image__img"
                                                src="{{ asset('marketplace/images/products/product-1.jpg') }}"
                                                alt=""></a></div>
                                    <div class="product-card__info">
                                        <div class="product-card__name"><a href="product.html">Electric Planer
                                                Brandix KL370090G 300 Watts</a></div>
                                    </div>
                                    <div class="product-card__actions">
                                        <div class="product-card__availability">Availability: <span
                                                class="text-success">In Stock</span></div>
                                        <div class="product-card__prices">$749.00</div>
                                        <div class="product-card__buttons"><button
                                                class="btn btn-primary product-card__addtocart" type="button">Add To
                                                Cart</button> <button
                                                class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                                type="button">Add To Cart</button> <button
                                                class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist"
                                                type="button"><svg width="16px" height="16px">
                                                    <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                                </svg> <span
                                                    class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                            <button
                                                class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                                type="button"><svg width="16px" height="16px">
                                                    <use xlink:href="images/sprite.svg#compare-16"></use>
                                                </svg> <span
                                                    class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block-products-carousel__column">
                            <div class="block-products-carousel__cell">
                                <div class="product-card product-card--hidden-actions">
                                    <div class="product-card__image product-image"><a href="product.html"
                                            class="product-image__body"><img class="product-image__img"
                                                src="{{ asset('marketplace/images/products/product-1.jpg') }}"
                                                alt=""></a></div>
                                    <div class="product-card__info">
                                        <div class="product-card__name"><a href="product.html">Electric Planer
                                                Brandix KL370090G 300 Watts</a></div>
                                    </div>
                                    <div class="product-card__actions">
                                        <div class="product-card__availability">Availability: <span
                                                class="text-success">In Stock</span></div>
                                        <div class="product-card__prices">$749.00</div>
                                        <div class="product-card__buttons"><button
                                                class="btn btn-primary product-card__addtocart" type="button">Add To
                                                Cart</button> <button
                                                class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                                type="button">Add To Cart</button> <button
                                                class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist"
                                                type="button"><svg width="16px" height="16px">
                                                    <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                                </svg> <span
                                                    class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                            <button
                                                class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                                type="button"><svg width="16px" height="16px">
                                                    <use xlink:href="images/sprite.svg#compare-16"></use>
                                                </svg> <span
                                                    class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="block-products-carousel__cell">
                                <div class="product-card product-card--hidden-actions">
                                    <div class="product-card__image product-image"><a href="product.html"
                                            class="product-image__body"><img class="product-image__img"
                                                src="{{ asset('marketplace/images/products/product-1.jpg') }}"
                                                alt=""></a></div>
                                    <div class="product-card__info">
                                        <div class="product-card__name"><a href="product.html">Electric Planer
                                                Brandix KL370090G 300 Watts</a></div>
                                    </div>
                                    <div class="product-card__actions">
                                        <div class="product-card__availability">Availability: <span
                                                class="text-success">In Stock</span></div>
                                        <div class="product-card__prices">$749.00</div>
                                        <div class="product-card__buttons"><button
                                                class="btn btn-primary product-card__addtocart" type="button">Add To
                                                Cart</button> <button
                                                class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                                type="button">Add To Cart</button> <button
                                                class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist"
                                                type="button"><svg width="16px" height="16px">
                                                    <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                                </svg> <span
                                                    class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                            <button
                                                class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                                type="button"><svg width="16px" height="16px">
                                                    <use xlink:href="images/sprite.svg#compare-16"></use>
                                                </svg> <span
                                                    class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .block-products-carousel / end -->
        <!-- .block-posts -->
        <!-- .block-brands -->
        <div class="block block-brands">
            <div class="container">
                <div class="block-brands__slider">
                    <div class="owl-carousel">
                        <div class="block-brands__item"><a href="#"><img
                                    src="{{ asset('marketplace/images/logos/logo-1.png') }}" alt=""></a>
                        </div>
                        <div class="block-brands__item"><a href="#"><img
                                    src="{{ asset('marketplace/images/logos/logo-2.png') }}" alt=""></a>
                        </div>
                        <div class="block-brands__item"><a href="#"><img
                                    src="{{ asset('marketplace/images/logos/logo-3.png') }}" alt=""></a>
                        </div>
                        <div class="block-brands__item"><a href="#"><img
                                    src="{{ asset('marketplace/images/logos/logo-4.png') }}" alt=""></a>
                        </div>
                        <div class="block-brands__item"><a href="#"><img
                                    src="{{ asset('marketplace/images/logos/logo-5.png') }}" alt=""></a>
                        </div>
                        <div class="block-brands__item"><a href="#"><img
                                    src="{{ asset('marketplace/images/logos/logo-6.png') }}" alt=""></a>
                        </div>
                        <div class="block-brands__item"><a href="#"><img
                                    src="{{ asset('marketplace/images/logos/logo-7.png') }}" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .block-brands / end -->
    </div><!-- site__body / end -->
@endsection
