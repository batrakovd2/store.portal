<div id='{{$prod->id}}' class="product-card" data-product-card>
    <div class="product-card__img-wrap">
        <div class="product-card__sticker sticker-sale">
            SALE
        </div>
        <img src="{{$prod->photo}}" alt="" class="product-card__img">
    </div>

    <div class="product-card__desc">
        <div class="product-card__text">
            <h3 class="product-card__title h3">
                <a class="product-card__link link" href="/cena/{{$prod->slug}}">{{$prod->title}}</a>
            </h3>
            <p class='product-card__price'>
                Цена: <span class="product-card__price--blue">{{$prod->price}}</span>
            </p>
        </div>
        <div class="product-card__buy">
            <div class="product-card__add">

                <span class='product-card__add-item' data-id="{{$prod->id}}" data-link="./test-ajax/in-favorite.json" data-add-favorite>
                    <img data-img-favorite src="{{asset('img/icon/favorite-icon.svg')}}" alt="" class="product-card__item-img">
                </span>

                <span class='product-card__add-item product-card__add-basket' data-id="{{$prod->id}}" data-link="{{url('api/cart/add', $prod->id)}}" data-add-basket>
                    <img data-img-basket src="{{asset('img/icon/basket-icon.svg')}}" alt="" class="product-card__item-img">
                </span>

                <button class="mobile-product-card__in-basket dark-btn" data-id="{{$prod->id}}" data-link="api/cart/add/{{$prod->id}}" data-add-basket data-btn-basket>
                    В корзину
                </button>
            </div>

            <button class="product-card__btn product-card__order dark-btn" data-id="{{$prod->id}}" data-link="api/cart/add/{{$prod->id}}" data-fast-order>
                Заказать
            </button>
            <button class="product-card__btn mobile-product-card__order dark-btn" data-id="{{$prod->id}}" data-link="api/cart/add/{{$prod->id}}" data-fast-order>
                Заказать
            </button>
        </div>
    </div>
</div>
