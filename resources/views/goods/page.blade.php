@include('includes.header')
    <div class="middle">
        @include('includes.sidebar')
        <div class="main-content">
            <div class="content-top">
                <div class="content-top__text">Купить игры неборого без регистрации смс с торента, получить компкт диск, скачать Steam игры после оплаты</div>
                <div class="image-container"><img src="img/slider.png" alt="Image" class="image-main"></div>
            </div>
            <div class="content-middle">
                <div class="content-head__container">
                <div class="content-head__container">
                    <div class="content-head__title-wrap">
                        <div class="content-head__title-wrap__title bcg-title">{{ $attributes->name }}</div>
                    </div>
                    <div class="content-head__search-block">
                        <div class="search-container">
                            <form class="search-container__form">
                                <input type="text" class="search-container__form__input">
                                <button class="search-container__form__btn">search</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="content-main__container">
                    <div class="product-container">
                        <div class="product-container__image-wrap">
                            <img src="{{ URL::asset('img/cover/game-' . $attributes->id .'.jpg') }}" class="image-wrap__image-product">


                        </div>
                        <div class="product-container__content-text">
                            <div class="product-container__content-text__title">{{ $attributes->name }}</div>
                            <div class="product-container__content-text__price">
                                <div class="product-container__content-text__price__value">
                                    Цена: <b>{{ $attributes->price }}</b>
                                    руб
                                </div>
                                <a href="{{ route('goods.order', ['id' => $attributes->id])}}" class="btn btn-blue">Купить</a>
                            </div>
                            <div class="product-container__content-text__description">
                                <p>
                                    {{ $attributes->desc }}
                                </p>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                                    minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                    aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-bottom">
                <div class="line"></div>
                <div class="content-head__container">
                    <div class="content-head__title-wrap">
                        <div class="content-head__title-wrap__title bcg-title">Посмотрите наши товары</div>
                    </div>
                </div>
                <div class="content-main__container">
                    <div class="products-columns">
                        <div class="products-columns__item">
                            <div class="products-columns__item__title-product"><a href="#" class="products-columns__item__title-product__link">The Witcher 3: Wild Hunt</a></div>
                            <div class="products-columns__item__thumbnail"><a href="#" class="products-columns__item__thumbnail__link"><img src="img/cover/game-1.jpg" alt="Preview-image" class="products-columns__item__thumbnail__img"></a></div>
                            <div class="products-columns__item__description"><span class="products-price">400 руб</span><a href="#" class="btn btn-blue">Купить</a></div>
                        </div>
                        <div class="products-columns__item">
                            <div class="products-columns__item__title-product"><a href="#" class="products-columns__item__title-product__link">Overwatch</a></div>
                            <div class="products-columns__item__thumbnail"><a href="#" class="products-columns__item__thumbnail__link"><img src="img/cover/game-2.jpg" alt="Preview-image" class="products-columns__item__thumbnail__img"></a></div>
                            <div class="products-columns__item__description"><span class="products-price">400 руб</span><a href="#" class="btn btn-blue">Купить</a></div>
                        </div>
                        <div class="products-columns__item">
                            <div class="products-columns__item__title-product"><a href="#" class="products-columns__item__title-product__link">Deus Ex: Mankind Divided</a></div>
                            <div class="products-columns__item__thumbnail"><a href="#" class="products-columns__item__thumbnail__link"><img src="img/cover/game-3.jpg" alt="Preview-image" class="products-columns__item__thumbnail__img"></a></div>
                            <div class="products-columns__item__description"><span class="products-price">400 руб</span><a href="#" class="btn btn-blue">Купить</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="footer__footer-content">
            <div class="random-product-container">
                <div class="random-product-container__head">Случайный товар</div>
                <div class="random-product-container__content">
                    <div class="item-product">
                        <div class="item-product__title-product"><a href="#" class="item-product__title-product__link">The Witcher 3: Wild Hunt</a></div>
                        <div class="item-product__thumbnail"><a href="#" class="item-product__thumbnail__link"><img src="img/cover/game-1.jpg" alt="Preview-image" class="item-product__thumbnail__link__img"></a></div>
                        <div class="item-product__description">
                            <div class="item-product__description__products-price"><span class="products-price">400 руб</span></div>
                            <div class="item-product__description__btn-block"><a href="#" class="btn btn-blue">Купить</a></div>
                        </div>
                    </div>
                </div>
            </div>
@include('includes.footer')