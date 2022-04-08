@extends('templates.main-template.layouts.app')

@section('content')
    <div class="content-wrap">
        <div class="content">
            <img class="main-bg" src="{{config('app.img_portal')."/".$appSettings['background']['value']}}" alt="">
            <div class="container">
                <!--path-->
                <div class="path-wrap">
                    <div class="path">
                        <a href="/" class="path__link">Главная</a>
                        <span class="path__slash">/</span>
                        <a href="{{route('cart')}}" class="path__link">Корзина</a>
                    </div>
                </div>
                <!--path-->
                <div class="cols-wrap">
                    <!--col-content-->
                    <div class="col-content">
                        <div class="products">
                            <h2 class="section-title h2">Корзина</h2>
                            <div id="basket" class="basket">
                                <div id='basketList' class="basket__list">
                                    @if(!empty($products) && count($products))
                                        @foreach($products as $prod)
                                            <div id='{{$prod->id}}' class="basket-card" data-product-card>
                                                <div data-link='{{url('api/cart/remove')}}' class="basket-card__remove" data-remove data-id='{{$prod->id}}'>
                                                    <img src="{{asset('img/control/remove.svg')}}" alt="" class="basket-card__remove-img">
                                                </div>
                                                <div class="basket-card__preview">
                                                    <img src="{{asset('img/image/product-midddle.jpg')}}" alt="" class="basket-card__img">
                                                    <h2 class="basket-card__title-mob">
                                                        <a class='basket-card__link link' href="{{url('cena', $prod->slug)}}">{{$prod->title}}</a>
                                                    </h2>
                                                </div>
                                                <div class="basket-card__body">
                                                    <h2 class="basket-card__title">
                                                        <a class='basket-card__link link' href="{{url('cena', $prod->slug)}}">{{$prod->title}}</a>
                                                    </h2>
                                                    <div class="basket-card__price">
                                                        Цена: {{$prod->price}}
                                                    </div>
                                                    <p data-card-msg class='basket-card__msg'>Здесь будет текст ошибки</p>
                                                    <div class="basket-card__footer">
                                                        <div data-id="{{$prod->id}}" data-link='{{url('api/cart/count')}}' class="counter basket-card__counter" data-counter>
                                                            <div class="counter__wrap"></div>
                                                            <input name='count' type="text" class="modal__input basket-card__counter-input counter__input"
                                                                   value='@if(!empty($prod->count)) {{$prod->count}} @else 1 @endif' placeholder="Количество" data-link='{{url('api/cart/count')}}' data-id='{{$prod->id}}' data-input>

                                                            <div class="counter__btn basket-card__counter-btn" data-inc data-count-btn>
                                                                <img src="{{asset('img/control/counter-inc.svg')}}" alt="" class="counter__btn-img">
                                                            </div>

                                                            <div class="counter__btn basket-card__counter-btn" data-dec data-count-btn>
                                                                <img src="{{asset('img/control/counter-dec.svg')}}" alt="" class="counter__btn-img">
                                                            </div>
                                                        </div>
                                                        <div class="basket-card__add">
                                                            <span class='product-card__add-item' data-id="{{$prod->id}}" data-link="{{url('api/cart/count')}}" data-add-favorite>
                                                            <img data-img-favorite src="{{asset('img/icon/favorite-icon.svg')}}" alt="" class="product-card__item-img">
                                                          </span>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        @endforeach
                                    @else
                                        <h2>Корзина пуста</h2>
                                    @endif
                                </div>
                            </div>


                            <div class="basket-info">
                                <form id="basketForm" class='basket-form basket-info__col'>
                                    <h3 class="basket-form__title">Оформление заказа</h3>
                                    <div id="basketFormMsg" class="basket-form__message"></div>
                                    <input name='name' class="modal__input basket-form__input input" type="text"
                                           placeholder="What is your name">
                                    <input name='tel' class="modal__input basket-form__input input" type="text"
                                           placeholder="+7 000-000-00-00">
                                    <input name='mail' class="modal__input basket-form__input input" type="text"
                                           placeholder="what@what.ru">
                                    <input id='subminBasket' class="basket-form__submit modal__submit light-btn"
                                           data-link='./test-ajax/basket.json' type="submit" value="Оформить заказ">
                                </form>
                                <div class="basket-making basket-info__col">
                                    <h3 class="basket-making__title">Информация о заказе</h3>
                                    <div class="basket-making__total">
                                        <span class="basket-making__total-text">Общее количество:</span>
                                        <span id="totalBasketCount" class="basket-making__total-num">30</span>
                                    </div>
                                    <div class="basket-making__total">
                                        <span class="basket-making__total-text">Общая цена:</span>
                                        <span id="totalBasketPrice" class="basket-making__total-num">90 000</span> <span
                                            class="basket-making__total-mark">₽</span>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <!--col-content-->
                    @include('templates.' . $appTemplate . '.layouts.sidebar')
                </div>
            </div>
        </div>
    </div>
@endsection
