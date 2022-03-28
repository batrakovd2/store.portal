<!--products-->
@if(!empty($saleProducts))
    <div class="products">
        <h2 class="section-title h2">Акции и предложения</h2>
        <div class="products__wrap">
            @foreach($saleProducts as $sprod)
                <div class="product-card">
                    <div class="product-card__img-wrap">
                        <img src="{{$sprod->photo}}" alt="" class="product-card__img">
                    </div>

                    <div class="product-card__desc">
                        <div class="product-card__text">
                            <h3 class="product-card__title h3">
                                <a class="product-card__link link" href="{{$sprod->slug}}">{{$sprod->title}}</a>
                            </h3>
                            <p class='product-card__price'>
                                Цена:
                                <span class="product-card__price--blue">
                                                                {{$sprod->price}}
                                                            </span>
                            </p>
                        </div>

                        <div class="product-card__buy">
                            <div class="product-card__sticker sticker-sale">
                                SALE
                            </div>

                            <button class="product-card__btn product-card__order dark-btn">
                                Заказать
                            </button>
                        </div>

                        <div class="buy-mobile">
                            <p class="buy-mobile__price">
                                {{$sprod->price}} <span class="buy-mobile__curenncy">₽</span>
                            </p>

                            <div class=" buy-mobile__order">
                                <div class="buy-mobile__btn product-card__btn">
                                    <img src="./img/icon/basket-icon.svg" alt=""
                                         class="buy-mobile__icon">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endif
<!--products-->
