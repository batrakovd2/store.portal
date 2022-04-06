@extends('templates.main-template.layouts.app')

@section('content')
    <div class="content-wrap">
        <div class="content">
            <img class="main-bg" src="./img/image/bg.jpg" alt="">
            <div class="container">
                <!--path-->
                <div class="path-wrap">
                    <div class="path">
                        <a href="index.html" class="path__link">Главная</a>
                        <span class="path__slash">/</span>
                        <a href="stock.html" class="path__link">Корзина</a>
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
                                    <div id='00' class="basket-card" data-product-card>
                                        <div data-link='./test-ajax/remove-product.json' class="basket-card__remove" data-remove
                                             data-id='00'>
                                            <img src="./img/control/remove.svg" alt="" class="basket-card__remove-img">
                                        </div>
                                        <div class="basket-card__preview">
                                            <img src="./img/image/product-midddle.jpg" alt="" class="basket-card__img">

                                            <h2 class="basket-card__title-mob">
                                                <a class='basket-card__link link' href="product-card.html">Труба
                                                    холоднодеформированная 16х2.5мм ст. 20
                                                    ГОСТ 8734
                                                </a>
                                            </h2>
                                        </div>
                                        <div class="basket-card__body">
                                            <h2 class="basket-card__title">
                                                <a class='basket-card__link link' href="product-card.html">Труба
                                                    холоднодеформированная 16х2.5мм ст. 20
                                                    ГОСТ 8734
                                                </a>
                                            </h2>
                                            <div class="basket-card__price">
                                                Цена: 35 000 p
                                            </div>
                                            <p data-card-msg class='basket-card__msg'>Здесь будет текст ошибки</p>
                                            <div class="basket-card__footer">

                                                <div data-id="00" data-link='./test-ajax/counter.json' class="counter basket-card__counter"
                                                     data-counter>

                                                    <div class="counter__wrap">

                                                    </div>
                                                    <input name='count' type="text" class="modal__input basket-card__counter-input counter__input"
                                                           value='1' placeholder="Количество" data-link='./test-ajax/counter.json' data-id='00'
                                                           data-input>

                                                    <div class="counter__btn basket-card__counter-btn" data-inc data-count-btn>
                                                        <img src="./img/control/counter-inc.svg" alt="" class="counter__btn-img">
                                                    </div>

                                                    <div class="counter__btn basket-card__counter-btn" data-dec data-count-btn>
                                                        <img src="./img/control/counter-dec.svg" alt="" class="counter__btn-img">
                                                    </div>
                                                </div>

                                                <div class="basket-card__add">

                          <span class='product-card__add-item' data-id="00" data-link="./test-ajax/in-favorite.json"
                                data-add-favorite>
                            <img data-img-favorite src="./img/icon/favorite-icon.svg" alt=""
                                 class="product-card__item-img">
                          </span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
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
                    <!--col-nav-->
                    <div class="col-catalog">
                        <form action="" method="POST" class="form-search">
                            <input type="text" class="form-search__input" placeholder="Поиск">
                        </form>
                        <div class="nav-catalog">
                            <nav class="catalog__list">

                                <div class="category__item dropdown-wrap">
                                    <div class="category__name press-to-show ">
                                        <img src="./img/icon/catalog-arrow.svg" alt="" class="category__arrow arrow-show">
                                        <p class="category__title">Лист</p>
                                    </div>
                                    <div class='product__dropdown dropdown'>
                                        <ul class="product__list hidden-el">
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист латунный
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист алюминиевый
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист просечно-вытяжной ПВЛ
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Алюминиевый лист рифленый
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист латунный
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист алюминиевый
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист просечно-вытяжной ПВЛ
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Алюминиевый лист рифленый
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="category__item dropdown-wrap">
                                    <div class="category__name press-to-show ">
                                        <img src="./img/icon/catalog-arrow.svg" alt="" class="category__arrow arrow-show">
                                        <p class="category__title">Труба</p>
                                    </div>
                                    <div class='product__dropdown dropdown'>
                                        <ul class="product__list hidden-el">
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист латунный
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист алюминиевый
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист просечно-вытяжной ПВЛ
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Алюминиевый лист рифленый
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист латунный
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист алюминиевый
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист просечно-вытяжной ПВЛ
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Алюминиевый лист рифленый
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="category__item dropdown-wrap">
                                    <div class="category__name press-to-show ">
                                        <img src="./img/icon/catalog-arrow.svg" alt="" class="category__arrow arrow-show">
                                        <p class="category__title">Проволока</p>
                                    </div>
                                    <div class='product__dropdown dropdown'>
                                        <ul class="product__list hidden-el">
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист латунный
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист алюминиевый
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист просечно-вытяжной ПВЛ
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Алюминиевый лист рифленый
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист латунный
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист алюминиевый
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист просечно-вытяжной ПВЛ
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Алюминиевый лист рифленый
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="category__item dropdown-wrap">
                                    <div class="category__name press-to-show ">
                                        <img src="./img/icon/catalog-arrow.svg" alt="" class="category__arrow arrow-show">
                                        <p class="category__title">Лента</p>
                                    </div>
                                    <div class='product__dropdown dropdown'>
                                        <ul class="product__list hidden-el">
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист латунный
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист алюминиевый
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист просечно-вытяжной ПВЛ
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Алюминиевый лист рифленый
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист латунный
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист алюминиевый
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист просечно-вытяжной ПВЛ
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Алюминиевый лист рифленый
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="category__item dropdown-wrap">
                                    <div class="category__name press-to-show ">
                                        <img src="./img/icon/catalog-arrow.svg" alt="" class="category__arrow arrow-show">
                                        <p class="category__title">Сетка</p>
                                    </div>
                                    <div class='product__dropdown dropdown'>
                                        <ul class="product__list hidden-el">
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист латунный
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист алюминиевый
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист просечно-вытяжной ПВЛ
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Алюминиевый лист рифленый
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист латунный
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист алюминиевый
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист просечно-вытяжной ПВЛ
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Алюминиевый лист рифленый
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="category__item dropdown-wrap">
                                    <div class="category__name press-to-show ">
                                        <img src="./img/icon/catalog-arrow.svg" alt="" class="category__arrow arrow-show">
                                        <p class="category__title">Круг</p>
                                    </div>
                                    <div class='product__dropdown dropdown'>
                                        <ul class="product__list hidden-el">
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист латунный
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист алюминиевый
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист просечно-вытяжной ПВЛ
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Алюминиевый лист рифленый
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист латунный
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист алюминиевый
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист просечно-вытяжной ПВЛ
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Алюминиевый лист рифленый
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="category__item dropdown-wrap">
                                    <div class="category__name press-to-show ">
                                        <img src="./img/icon/catalog-arrow.svg" alt="" class="category__arrow arrow-show">
                                        <p class="category__title">Шина</p>
                                    </div>
                                    <div class='product__dropdown dropdown'>
                                        <ul class="product__list hidden-el">
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист латунный
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист алюминиевый
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист просечно-вытяжной ПВЛ
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Алюминиевый лист рифленый
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист латунный
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист алюминиевый
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист просечно-вытяжной ПВЛ
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Алюминиевый лист рифленый
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="category__item dropdown-wrap">
                                    <div class="category__name press-to-show ">
                                        <img src="./img/icon/catalog-arrow.svg" alt="" class="category__arrow arrow-show">
                                        <p class="category__title">Квадрат</p>
                                    </div>
                                    <div class='product__dropdown dropdown'>
                                        <ul class="product__list hidden-el">
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист латунный
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист алюминиевый
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист просечно-вытяжной ПВЛ
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Алюминиевый лист рифленый
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист латунный
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист алюминиевый
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист просечно-вытяжной ПВЛ
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Алюминиевый лист рифленый
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="category__item dropdown-wrap">
                                    <div class="category__name press-to-show ">
                                        <img src="./img/icon/catalog-arrow.svg" alt="" class="category__arrow arrow-show">
                                        <p class="category__title">Лист</p>
                                    </div>
                                    <div class='product__dropdown dropdown'>
                                        <ul class="product__list hidden-el">
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист латунный
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист алюминиевый
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист просечно-вытяжной ПВЛ
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Алюминиевый лист рифленый
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист латунный
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист алюминиевый
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист просечно-вытяжной ПВЛ
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Алюминиевый лист рифленый
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="category__item dropdown-wrap">
                                    <div class="category__name press-to-show ">
                                        <img src="./img/icon/catalog-arrow.svg" alt="" class="category__arrow arrow-show">
                                        <p class="category__title">Труба</p>
                                    </div>
                                    <div class='product__dropdown dropdown'>
                                        <ul class="product__list hidden-el">
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист латунный
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист алюминиевый
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист просечно-вытяжной ПВЛ
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Алюминиевый лист рифленый
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист латунный
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист алюминиевый
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист просечно-вытяжной ПВЛ
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Алюминиевый лист рифленый
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="category__item dropdown-wrap">
                                    <div class="category__name press-to-show ">
                                        <img src="./img/icon/catalog-arrow.svg" alt="" class="category__arrow arrow-show">
                                        <p class="category__title">Проволока</p>
                                    </div>
                                    <div class='product__dropdown dropdown'>
                                        <ul class="product__list hidden-el">
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист латунный
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист алюминиевый
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист просечно-вытяжной ПВЛ
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Алюминиевый лист рифленый
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист латунный
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист алюминиевый
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист просечно-вытяжной ПВЛ
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Алюминиевый лист рифленый
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="category__item dropdown-wrap">
                                    <div class="category__name press-to-show ">
                                        <img src="./img/icon/catalog-arrow.svg" alt="" class="category__arrow arrow-show">
                                        <p class="category__title">Лента</p>
                                    </div>
                                    <div class='product__dropdown dropdown'>
                                        <ul class="product__list hidden-el">
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист латунный
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист алюминиевый
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист просечно-вытяжной ПВЛ
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Алюминиевый лист рифленый
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист латунный
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист алюминиевый
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист просечно-вытяжной ПВЛ
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Алюминиевый лист рифленый
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="category__item dropdown-wrap">
                                    <div class="category__name press-to-show ">
                                        <img src="./img/icon/catalog-arrow.svg" alt="" class="category__arrow arrow-show">
                                        <p class="category__title">Сетка</p>
                                    </div>
                                    <div class='product__dropdown dropdown'>
                                        <ul class="product__list hidden-el">
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист латунный
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист алюминиевый
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист просечно-вытяжной ПВЛ
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Алюминиевый лист рифленый
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист латунный
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист алюминиевый
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист просечно-вытяжной ПВЛ
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Алюминиевый лист рифленый
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="category__item dropdown-wrap">
                                    <div class="category__name press-to-show ">
                                        <img src="./img/icon/catalog-arrow.svg" alt="" class="category__arrow arrow-show">
                                        <p class="category__title">Круг</p>
                                    </div>
                                    <div class='product__dropdown dropdown'>
                                        <ul class="product__list hidden-el">
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист латунный
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист алюминиевый
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист просечно-вытяжной ПВЛ
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Алюминиевый лист рифленый
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист латунный
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист алюминиевый
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист просечно-вытяжной ПВЛ
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Алюминиевый лист рифленый
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="category__item dropdown-wrap">
                                    <div class="category__name press-to-show ">
                                        <img src="./img/icon/catalog-arrow.svg" alt="" class="category__arrow arrow-show">
                                        <p class="category__title">Шина</p>
                                    </div>
                                    <div class='product__dropdown dropdown'>
                                        <ul class="product__list hidden-el">
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист латунный
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист алюминиевый
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист просечно-вытяжной ПВЛ
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Алюминиевый лист рифленый
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист латунный
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист алюминиевый
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист просечно-вытяжной ПВЛ
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Алюминиевый лист рифленый
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="category__item dropdown-wrap">
                                    <div class="category__name press-to-show ">
                                        <img src="./img/icon/catalog-arrow.svg" alt="" class="category__arrow arrow-show">
                                        <p class="category__title">Квадрат</p>
                                    </div>
                                    <div class='product__dropdown dropdown'>
                                        <ul class="product__list hidden-el">
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист латунный
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист алюминиевый
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист просечно-вытяжной ПВЛ
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Алюминиевый лист рифленый
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист латунный
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист алюминиевый
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист просечно-вытяжной ПВЛ
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Алюминиевый лист рифленый
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="category__item dropdown-wrap">
                                    <div class="category__name press-to-show ">
                                        <img src="./img/icon/catalog-arrow.svg" alt="" class="category__arrow arrow-show">
                                        <p class="category__title">Лист</p>
                                    </div>
                                    <div class='product__dropdown dropdown'>
                                        <ul class="product__list hidden-el">
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист латунный
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист алюминиевый
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист просечно-вытяжной ПВЛ
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Алюминиевый лист рифленый
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист латунный
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист алюминиевый
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист просечно-вытяжной ПВЛ
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Алюминиевый лист рифленый
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="category__item dropdown-wrap">
                                    <div class="category__name press-to-show ">
                                        <img src="./img/icon/catalog-arrow.svg" alt="" class="category__arrow arrow-show">
                                        <p class="category__title">Труба</p>
                                    </div>
                                    <div class='product__dropdown dropdown'>
                                        <ul class="product__list hidden-el">
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист латунный
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист алюминиевый
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист просечно-вытяжной ПВЛ
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Алюминиевый лист рифленый
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист латунный
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист алюминиевый
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист просечно-вытяжной ПВЛ
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Алюминиевый лист рифленый
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="category__item dropdown-wrap">
                                    <div class="category__name press-to-show ">
                                        <img src="./img/icon/catalog-arrow.svg" alt="" class="category__arrow arrow-show">
                                        <p class="category__title">Проволока</p>
                                    </div>
                                    <div class='product__dropdown dropdown'>
                                        <ul class="product__list hidden-el">
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист латунный
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист алюминиевый
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист просечно-вытяжной ПВЛ
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Алюминиевый лист рифленый
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист латунный
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист алюминиевый
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист просечно-вытяжной ПВЛ
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Алюминиевый лист рифленый
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="category__item dropdown-wrap">
                                    <div class="category__name press-to-show ">
                                        <img src="./img/icon/catalog-arrow.svg" alt="" class="category__arrow arrow-show">
                                        <p class="category__title">Лента</p>
                                    </div>
                                    <div class='product__dropdown dropdown'>
                                        <ul class="product__list hidden-el">
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист латунный
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист алюминиевый
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист просечно-вытяжной ПВЛ
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Алюминиевый лист рифленый
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист латунный
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист алюминиевый
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист просечно-вытяжной ПВЛ
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Алюминиевый лист рифленый
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="category__item dropdown-wrap">
                                    <div class="category__name press-to-show ">
                                        <img src="./img/icon/catalog-arrow.svg" alt="" class="category__arrow arrow-show">
                                        <p class="category__title">Сетка</p>
                                    </div>
                                    <div class='product__dropdown dropdown'>
                                        <ul class="product__list hidden-el">
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист латунный
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист алюминиевый
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист просечно-вытяжной ПВЛ
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Алюминиевый лист рифленый
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист латунный
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист алюминиевый
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист просечно-вытяжной ПВЛ
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Алюминиевый лист рифленый
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="category__item dropdown-wrap">
                                    <div class="category__name press-to-show ">
                                        <img src="./img/icon/catalog-arrow.svg" alt="" class="category__arrow arrow-show">
                                        <p class="category__title">Круг</p>
                                    </div>
                                    <div class='product__dropdown dropdown'>
                                        <ul class="product__list hidden-el">
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист латунный
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист алюминиевый
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист просечно-вытяжной ПВЛ
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Алюминиевый лист рифленый
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист латунный
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист алюминиевый
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист просечно-вытяжной ПВЛ
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Алюминиевый лист рифленый
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="category__item dropdown-wrap">
                                    <div class="category__name press-to-show ">
                                        <img src="./img/icon/catalog-arrow.svg" alt="" class="category__arrow arrow-show">
                                        <p class="category__title">Шина</p>
                                    </div>
                                    <div class='product__dropdown dropdown'>
                                        <ul class="product__list hidden-el">
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист латунный
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист алюминиевый
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист просечно-вытяжной ПВЛ
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Алюминиевый лист рифленый
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист латунный
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист алюминиевый
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист просечно-вытяжной ПВЛ
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Алюминиевый лист рифленый
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="category__item dropdown-wrap">
                                    <div class="category__name press-to-show ">
                                        <img src="./img/icon/catalog-arrow.svg" alt="" class="category__arrow arrow-show">
                                        <p class="category__title">Квадрат</p>
                                    </div>
                                    <div class='product__dropdown dropdown'>
                                        <ul class="product__list hidden-el">
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист латунный
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист алюминиевый
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист просечно-вытяжной ПВЛ
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Алюминиевый лист рифленый
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист латунный
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист алюминиевый
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Лист просечно-вытяжной ПВЛ
                                                </a>
                                            </li>
                                            <li class='products__item'>
                                                <a href="#!" class="product__link link">
                                                    Алюминиевый лист рифленый
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>




                            </nav>
                        </div>
                    </div>
                    <!--col-nav-->
                </div>
            </div>
        </div>
    </div>
@endsection
