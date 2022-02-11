@extends('layouts.app')

@section('content')
    <!--main-carousel-->
    <div id='mainCarousel' data-interval='10' class='main-carousel m-c'>
        <div id="mainCarouselSlidesWrap" class='m-c__slides main-slider'>
            <div class="m-c-slide main-slider__item">
                <a href="#!" class="m-c__link">
                    <div class="m-c-slide__content">
                        <div class="m-c-slide__left">
                            <img src="./img/image/m-c-left.png" alt="" class="m-c-slide__img">
                        </div>

                        <div class="m-c-slide__center">
                            <div class="m-c-slide__text-wrap">
                                <p class="m-c-slide__text">
                                    <span class='slide__text-one'>1501</span> <span class="slide__text-two">тонн</span>
                                </p>
                                <p class="m-c-slide__text">

                                    металлопроката всегда в наличии
                                </p>
                            </div>
                        </div>

                        <div class="m-c-slide__right">
                            <img src="./img/image/m-c-right.png" alt="" class="m-c-slide__img m-c-slide--right">
                        </div>

                    </div>
                </a>
            </div>
            <div class="m-c-slide main-slider__item">
                <a href="#!" class="m-c__link">
                    <div class="m-c-slide__content">
                        <div class="m-c-slide__left">
                            <img src="./img/image/m-c-left.png" alt="" class="m-c-slide__img">
                        </div>

                        <div class="m-c-slide__center">
                            <div class="m-c-slide__text-wrap">
                                <p class="m-c-slide__text">
                                    <span class='slide__text-one'>1502</span> <span class="slide__text-two">тонн</span>
                                </p>
                                <p class="m-c-slide__text">

                                    металлопроката всегда в наличии
                                </p>
                            </div>
                        </div>

                        <div class="m-c-slide__right">
                            <img src="./img/image/m-c-right.png" alt="" class="m-c-slide__img m-c-slide--right">
                        </div>

                    </div>
                </a>
            </div>
            <div class="m-c-slide main-slider__item">
                <a href="#!" class="m-c__link">
                    <div class="m-c-slide__content">
                        <div class="m-c-slide__left">
                            <img src="./img/image/m-c-left.png" alt="" class="m-c-slide__img">
                        </div>

                        <div class="m-c-slide__center">
                            <div class="m-c-slide__text-wrap">
                                <p class="m-c-slide__text">
                                    <span class='slide__text-one'>1503</span> <span class="slide__text-two">тонн</span>
                                </p>
                                <p class="m-c-slide__text">
                                    металлопроката всегда в наличии
                                </p>
                            </div>
                        </div>

                        <div class="m-c-slide__right">
                            <img src="./img/image/m-c-right.png" alt="" class="m-c-slide__img m-c-slide--right">
                        </div>

                    </div>
                </a>
            </div>
        </div>
        <img id='mainCarouselLeft' class='m-c__arrow m-c__left main-slider__prev' src="./img/control/m-c-left.svg"
             alt="<">
        <img id='mainCarouselRight' class='m-c__arrow m-c__right main-slider__next' src="./img/control/m-c-right.svg"
             alt=">">

    </div>
    <!--main-carousel-->

    <!--main-delivery-->
    <div class='delivery'>
        <div class="container">
            <h2 class="delivery__title">Методы доставки</h2>
            <ul class="delivery__list">
                <li class="delivery__item">
                    <div class="delivery__img-wrap">
                        <img src="./img/icon/ship-icon.svg" alt="" class="delivery__img">
                    </div>
                    <span class="delivery__name">
            Морской транспорт
          </span>
                </li>
                <li class="delivery__item">
                    <div class="delivery__img-wrap">
                        <img src="./img/icon/train-icon.svg" alt="" class="delivery__img">
                    </div>
                    <span class="delivery__name">
            Ж/Д транспорт
          </span>
                </li>
                <li class="delivery__item">
                    <div class="delivery__img-wrap">
                        <img src="./img/icon/truck-icon.svg" alt="" class="delivery__img">
                    </div>
                    <span class="delivery__name">
            Грузоперевозки
          </span>
                </li>
                <li class="delivery__item">
                    <div class="delivery__img-wrap">
                        <img src="./img/icon/airplane-icon.svg" alt="" class="delivery__img">
                    </div>
                    <p class="delivery__name">
                        Авиадоставка
                    </p>
                </li>
            </ul>
        </div>
    </div>


    <!--content-wrap-->
    <div class="content-wrap">
        <img class="main-bg" src="./img/image/bg.jpg" alt="">
        <div class="content">
            <div class="container">

                <div class="cols-wrap">
                    <!--col-content-->
                    <div class="col-content">

                        <!--sections-->
                        <div class="sections">
                            <h2 class="section-title h2">
                                <span>Популярные разделы</span>
                                <img src="./img/icon/sections-arrow.svg" alt="" class="sections__arrow">
                            </h2>
                            <div class="sections-list">
                                <div class='sections-card'>
                                    <div class="sections-card__desc">
                                        <a href='product-categories.html' class="sections-card__title link">
                                            Проволока оцинкованная
                                        </a>
                                        <ul class='sections-card__list'>
                                            <li class="sections-card__item">
                                                <a class="sections-card__link-item link" href="#!">
                                                    Опоры освещения
                                                </a>
                                            </li>
                                            <li class="sections-card__item">
                                                <a class="sections-card__link-item link" href="#!">
                                                    Дорожные ограждения
                                                </a>
                                            </li>
                                            <li class="sections-card__item">
                                                <a class="sections-card__link-item link" href="#!">
                                                    Резервуары
                                                </a>
                                            </li>
                                            <li class="sections-card__item">
                                                <a class="sections-card__link-item link" href="#!">
                                                    Молниеотводы
                                                </a>
                                            </li>
                                        </ul>
                                        <a href="#!" class="sections-card__link">Посмотреть все <img
                                                src="./img/icon/arrow-more.svg"
                                                alt="->" class="sections-card__arrow"></a>
                                    </div>
                                    <div class="sections-card__preview">
                                        <img src="./img/image/section-img.jpg" alt="" class="sections-card__img">
                                    </div>
                                </div>

                                <div class='sections-card'>
                                    <div class="sections-card__desc">
                                        <a href='product-categories.html' class="sections-card__title link">
                                            Проволока оцинкованная
                                        </a>
                                        <ul class='sections-card__list'>
                                            <li class="sections-card__item">
                                                <a class="sections-card__link-item link" href="#!">
                                                    Опоры освещения
                                                </a>
                                            </li>
                                            <li class="sections-card__item">
                                                <a class="sections-card__link-item link" href="#!">
                                                    Дорожные ограждения
                                                </a>
                                            </li>
                                            <li class="sections-card__item">
                                                <a class="sections-card__link-item link" href="#!">
                                                    Резервуары
                                                </a>
                                            </li>
                                            <li class="sections-card__item">
                                                <a class="sections-card__link-item link" href="#!">
                                                    Молниеотводы
                                                </a>
                                            </li>
                                        </ul>
                                        <a href="#!" class="sections-card__link">Посмотреть все <img
                                                src="./img/icon/arrow-more.svg"
                                                alt="->" class="sections-card__arrow"></a>
                                    </div>
                                    <div class="sections-card__preview">
                                        <img src="./img/image/section-img.jpg" alt="" class="sections-card__img">
                                    </div>
                                </div>

                                <div class='sections-card'>
                                    <div class="sections-card__desc">
                                        <a href='product-categories.html' class="sections-card__title link">
                                            Проволока оцинкованная
                                        </a>
                                        <ul class='sections-card__list'>
                                            <li class="sections-card__item">
                                                <a class="sections-card__link-item link" href="#!">
                                                    Опоры освещения
                                                </a>
                                            </li>
                                            <li class="sections-card__item">
                                                <a class="sections-card__link-item link" href="#!">
                                                    Дорожные ограждения
                                                </a>
                                            </li>
                                            <li class="sections-card__item">
                                                <a class="sections-card__link-item link" href="#!">
                                                    Резервуары
                                                </a>
                                            </li>
                                            <li class="sections-card__item">
                                                <a class="sections-card__link-item link" href="#!">
                                                    Молниеотводы
                                                </a>
                                            </li>
                                        </ul>
                                        <a href="#!" class="sections-card__link">Посмотреть все <img
                                                src="./img/icon/arrow-more.svg"
                                                alt="->" class="sections-card__arrow"></a>
                                    </div>
                                    <div class="sections-card__preview">
                                        <img src="./img/image/section-img.jpg" alt="" class="sections-card__img">
                                    </div>
                                </div>

                                <div class='sections-card'>
                                    <div class="sections-card__desc">
                                        <a href='product-categories.html' class="sections-card__title link">
                                            Проволока оцинкованная
                                        </a>
                                        <ul class='sections-card__list'>
                                            <li class="sections-card__item">
                                                <a class="sections-card__link-item link" href="#!">
                                                    Опоры освещения
                                                </a>
                                            </li>
                                            <li class="sections-card__item">
                                                <a class="sections-card__link-item link" href="#!">
                                                    Дорожные ограждения
                                                </a>
                                            </li>
                                            <li class="sections-card__item">
                                                <a class="sections-card__link-item link" href="#!">
                                                    Резервуары
                                                </a>
                                            </li>
                                            <li class="sections-card__item">
                                                <a class="sections-card__link-item link" href="#!">
                                                    Молниеотводы
                                                </a>
                                            </li>
                                        </ul>
                                        <a href="#!" class="sections-card__link">Посмотреть все <img
                                                src="./img/icon/arrow-more.svg"
                                                alt="->" class="sections-card__arrow"></a>
                                    </div>
                                    <div class="sections-card__preview">
                                        <img src="./img/image/section-img.jpg" alt="" class="sections-card__img">
                                    </div>
                                </div>

                                <div class='sections-card'>
                                    <div class="sections-card__desc">
                                        <a href='product-categories.html' class="sections-card__title link">
                                            Проволока оцинкованная
                                        </a>
                                        <ul class='sections-card__list'>
                                            <li class="sections-card__item">
                                                <a class="sections-card__link-item link" href="#!">
                                                    Опоры освещения
                                                </a>
                                            </li>
                                            <li class="sections-card__item">
                                                <a class="sections-card__link-item link" href="#!">
                                                    Дорожные ограждения
                                                </a>
                                            </li>
                                            <li class="sections-card__item">
                                                <a class="sections-card__link-item link" href="#!">
                                                    Резервуары
                                                </a>
                                            </li>
                                            <li class="sections-card__item">
                                                <a class="sections-card__link-item link" href="#!">
                                                    Молниеотводы
                                                </a>
                                            </li>
                                        </ul>
                                        <a href="#!" class="sections-card__link">Посмотреть все <img
                                                src="./img/icon/arrow-more.svg"
                                                alt="->" class="sections-card__arrow"></a>
                                    </div>
                                    <div class="sections-card__preview">
                                        <img src="./img/image/section-img.jpg" alt="" class="sections-card__img">
                                    </div>
                                </div>

                            </div>

                            <div class="sections__btn right-edge">
                                <a href="#!" class="light-btn">Посмотреть все</a>
                            </div>

                        </div>
                        <!--sections-->

                        <!--products-->
                        <div class="products">
                            <h2 class="section-title h2">Акции и предложения</h2>

                            <div class="products__wrap">
                                <div class="product-card">
                                    <div class="product-card__img-wrap"><img src="./img/image/product-img.jpg" alt=""
                                                                             class="product-card__img">
                                    </div>

                                    <div class="product-card__desc">
                                        <div class="product-card__text">
                                            <h3 class="product-card__title h3">
                                                <a class="product-card__link link" href="stock-card.html">Труба
                                                    холоднодеформированная
                                                    16х2.5мм ст. 20 ГОСТ
                                                    8734</a>
                                            </h3>
                                            <p class='product-card__price'>
                                                Цена за штуку:
                                                <span class="product-card__price--blue">
                          65 000
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
                                                65 000 <span class="buy-mobile__curenncy">₽</span>
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

                                <div class="product-card">
                                    <div class="product-card__img-wrap"><img src="./img/image/product-img.jpg" alt=""
                                                                             class="product-card__img">
                                    </div>

                                    <div class="product-card__desc">
                                        <div class="product-card__text">
                                            <h3 class="product-card__title h3">
                                                <a class="product-card__link link" href="stock-card.html">Труба
                                                    холоднодеформированная
                                                    16х2.5мм ст. 20 ГОСТ
                                                    8734</a>
                                            </h3>
                                            <p class='product-card__price'>
                                                Цена за штуку:
                                                <span class="product-card__price--blue">
                          65 000
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
                                                65 000 <span class="buy-mobile__curenncy">₽</span>
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

                                <div class="product-card">
                                    <div class="product-card__img-wrap"><img src="./img/image/product-img.jpg" alt=""
                                                                             class="product-card__img">
                                    </div>

                                    <div class="product-card__desc">
                                        <div class="product-card__text">
                                            <h3 class="product-card__title h3">
                                                <a class="product-card__link link" href="stock-card.html">Труба
                                                    холоднодеформированная
                                                    16х2.5мм ст. 20 ГОСТ
                                                    8734</a>
                                            </h3>
                                            <p class='product-card__price'>
                                                Цена за штуку:
                                                <span class="product-card__price--blue">
                          65 000
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
                                                65 000 <span class="buy-mobile__curenncy">₽</span>
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

                                <div class="product-card">
                                    <div class="product-card__img-wrap"><img src="./img/image/product-img.jpg" alt=""
                                                                             class="product-card__img">
                                    </div>

                                    <div class="product-card__desc">
                                        <div class="product-card__text">
                                            <h3 class="product-card__title h3">
                                                <a class="product-card__link link" href="stock-card.html">Труба
                                                    холоднодеформированная
                                                    16х2.5мм ст. 20 ГОСТ
                                                    8734</a>
                                            </h3>
                                            <p class='product-card__price'>
                                                Цена за штуку:
                                                <span class="product-card__price--blue">
                          65 000
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
                                                65 000 <span class="buy-mobile__curenncy">₽</span>
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

                                <div class="product-card">
                                    <div class="product-card__img-wrap"><img src="./img/image/product-img.jpg" alt=""
                                                                             class="product-card__img">
                                    </div>

                                    <div class="product-card__desc">
                                        <div class="product-card__text">
                                            <h3 class="product-card__title h3">
                                                <a class="product-card__link link" href="stock-card.html">Труба
                                                    холоднодеформированная
                                                    16х2.5мм ст. 20 ГОСТ
                                                    8734</a>
                                            </h3>
                                            <p class='product-card__price'>
                                                Цена за штуку:
                                                <span class="product-card__price--blue">
                          65 000
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
                                                65 000 <span class="buy-mobile__curenncy">₽</span>
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
                            </div>

                            <div class="products__btn right-edge">
                                <a href="stock.html" class="more-btn light-btn">Посмотреть все</a>
                            </div>

                        </div>
                        <!--products-->

                        <!--faq-->
                        <div class="faq">
                            <h2 class="section-title h2">Часто задаваемые вопросы</h2>
                            <div class="faq-questions">

                                <div class="faq-question dropdown-wrap">
                                    <div class="question__header press-to-show">
                                        <div class="question__arrow-wrap">
                                            <img class='question__arrow arrow-show' src="./img/icon/arrow-down.svg"
                                                 alt="+">
                                        </div>

                                        <p class="question__title">Какие размеры оцинкованной полосы нужны для
                                            строительства?</p>
                                    </div>
                                    <div class="question__dropdown dropdown">
                                        <p class="question__answer hidden-el
                  ">
                                            Для постоянных клиентов, имеющих хорошую репутацию и платежную историю,
                                            мы можем предоставить
                                            отсрочку платежа на срок до одного месяца. Подробную информацию об этой
                                            услуге вам всегда
                                            предоставят наши менеджеры
                                        </p>
                                    </div>
                                </div>
                                <div class="faq-question dropdown-wrap">
                                    <div class="question__header press-to-show">
                                        <div class="question__arrow-wrap"><img class='question__arrow arrow-show '
                                                                               src="./img/icon/arrow-down.svg" alt="+">
                                        </div>

                                        <p class="question__title">Какие размеры оцинкованной полосы нужны для
                                            строительства?</p>
                                    </div>
                                    <div class="question__dropdown dropdown">
                                        <p class="question__answer hidden-el
                  ">
                                            Для постоянных клиентов, имеющих хорошую репутацию и платежную историю,
                                            мы можем предоставить
                                            отсрочку платежа на срок до одного месяца. Подробную информацию об этой
                                            услуге вам всегда
                                            предоставят наши менеджеры Для постоянных клиентов, имеющих хорошую
                                            репутацию и платежную
                                            историю,
                                            мы можем предоставить
                                            отсрочку платежа на срок до одного месяца. Подробную информацию об этой
                                            услуге вам всегда
                                            предоставят наши менеджеры
                                        </p>
                                    </div>
                                </div>
                                <div class="faq-question dropdown-wrap">
                                    <div class="question__header press-to-show">
                                        <div class="question__arrow-wrap"><img class='question__arrow arrow-show '
                                                                               src="./img/icon/arrow-down.svg" alt="+">
                                        </div>

                                        <p class="question__title">Какие размеры оцинкованной полосы нужны для
                                            строительства?</p>
                                    </div>
                                    <div class="question__dropdown dropdown">
                                        <p class="question__answer hidden-el
                  ">
                                            Для постоянных клиентов, имеющих хорошую репутацию и платежную историю,
                                            мы можем предоставить
                                            отсрочку платежа на срок до одного месяца. Подробную информацию об этой
                                            услуге вам всегда
                                            предоставят наши менеджеры Для постоянных клиентов, имеющих хорошую
                                            репутацию и платежную
                                            историю,
                                            мы можем предоставить
                                            отсрочку платежа на срок до одного месяца. Подробную информацию об этой
                                            услуге вам всегда
                                            предоставят наши менеджеры
                                        </p>
                                    </div>
                                </div>
                                <div class="faq-question dropdown-wrap">
                                    <div class="question__header press-to-show">
                                        <div class="question__arrow-wrap"><img class='question__arrow arrow-show '
                                                                               src="./img/icon/arrow-down.svg" alt="+">
                                        </div>

                                        <p class="question__title">Какие размеры оцинкованной полосы нужны для
                                            строительства?</p>
                                    </div>
                                    <div class="question__dropdown dropdown">
                                        <p class="question__answer hidden-el
                  ">
                                            Для постоянных клиентов, имеющих хорошую репутацию и платежную историю,
                                            мы можем предоставить
                                            отсрочку платежа на срок до одного месяца. Подробную информацию об этой
                                            услуге вам всегда
                                            предоставят наши менеджеры Для постоянных клиентов, имеющих хорошую
                                            репутацию и платежную
                                            историю,
                                            мы можем предоставить
                                            отсрочку платежа на срок до одного месяца. Подробную информацию об этой
                                            услуге вам всегда
                                            предоставят наши менеджеры
                                        </p>
                                    </div>
                                </div>
                                <div class="faq-question dropdown-wrap">
                                    <div class="question__header press-to-show">
                                        <div class="question__arrow-wrap"><img class='question__arrow arrow-show '
                                                                               src="./img/icon/arrow-down.svg" alt="+">
                                        </div>

                                        <p class="question__title">Какие размеры оцинкованной полосы нужны для
                                            строительства?</p>
                                    </div>
                                    <div class="question__dropdown dropdown">
                                        <p class="question__answer hidden-el
                  ">
                                            Для постоянных клиентов, имеющих хорошую репутацию и платежную историю,
                                            мы можем предоставить
                                            отсрочку платежа на срок до одного месяца. Подробную информацию об этой
                                            услуге вам всегда
                                            предоставят наши менеджеры Для постоянных клиентов, имеющих хорошую
                                            репутацию и платежную
                                            историю,
                                            мы можем предоставить
                                            отсрочку платежа на срок до одного месяца. Подробную информацию об этой
                                            услуге вам всегда
                                            предоставят наши менеджеры
                                        </p>
                                    </div>
                                </div>


                            </div>

                            <form id='faqForm' action="send.html" method="POST" class="faq-form form">

                                <h3 class='faq-form__title'>Задайте ваш вопрос</h3>
                                <p id='faqFormError' class="faq-form__error error">Заполните поле</p>
                                <div class="faq-form__body">
                                    <input name='quest' id='questInput' class="faq-form__input input" type="text"
                                           placeholder="Что вас интересует?">
                                    <button id='faqFormBtn' class="light-btn faq-form__btn">Отправить</button>
                                </div>

                                <div id='faqModal' class="faq-modal__wrap">
                                    <div class="faq-modal__content modal modal--is-show">
                                        <div class="close">
                      <span class="close__word close-faq-btn">
                        Закрыть
                      </span>
                                            <img src="./img/control/close-modal.svg" alt=""
                                                 class="close__icon close-faq-btn">
                                        </div>
                                        <div class="modal__content">
                                            <h4 class="modal__title">Почти готово!</h4>
                                            <p class="modal__desc">Укажите вашу электронную почту для связи с нами </p>
                                            <div class='modal__form'>
                                                <div class="modal__message">
                                                    <p class="modal__error error empty">Заполните поле</p>
                                                    <p class="modal__error error no-send">Произошла ошибка, данные не
                                                        отправлены, вы можете
                                                        связаться с нами по
                                                        телефону 8 (421) 292-97-86 или по почте hab@metall-as.ru</p>
                                                    <p class="modal__error error mail">Неправильно указанa номер
                                                        почта</p>
                                                </div>
                                                <div class="modal__inputs">
                                                    <input id="faqMail" name='email' class="modal__input input"
                                                           data-type='email' type="text"
                                                           placeholder="Ваша почта">
                                                    <input class="modal__submit light-btn" type="submit"
                                                           value="Отправить">
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!--faq-->

                        <!--reviews-->
                        <div id='reviews' class="reviews">
                            <h2 class="section-title h2">Отзывы</h2>
                            <div class="reviews-wrap">
                                <div class="review__slider main-slider">
                                    <div class="review__slide main-slider__item">
                                        <div class="review">
                                            <div class="review__content">
                                                <p class="review__auther">
                                                    Виктор Белугин 1
                                                </p>
                                                <p class="review__text">
                                                    Добрый день! Покупали в сентябре арматуру для фундамента,обслуживала
                                                    менеджер Александра.
                                                    Остались
                                                    довольны качеством обслуживания, привезли быстро и все точно по
                                                    накладной. Сейчас приобретаем
                                                    лист
                                                    оцинкованный на забор, соответствует полностью. советуем
                                                </p>
                                            </div>
                                            <img src="./img/image/user-1.jpg" alt="" class="review__photo">
                                            </img>
                                        </div>

                                        <div class="review">
                                            <div class="review__content">
                                                <p class="review__auther">
                                                    Виктор Белугин
                                                </p>
                                                <p class="review__text">
                                                    Добрый день! Покупали в сентябре арматуру для фундамента,обслуживала
                                                    менеджер Александра.
                                                    Остались
                                                    довольны качеством обслуживания, привезли быстро и все точно по
                                                    накладной. Сейчас приобретаем
                                                    лист
                                                    оцинкованный на забор, соответствует полностью. советуем
                                                </p>
                                            </div>
                                            <img src="./img/image/user-2.jpg" alt="" class="review__photo">
                                            </img>
                                        </div>
                                    </div>
                                    <div class="review__slide main-slider__item">
                                        <div class="review">
                                            <div class="review__content">
                                                <p class="review__auther">
                                                    Виктор Белугин 2
                                                </p>
                                                <p class="review__text">
                                                    Добрый день! Покупали в сентябре арматуру для фундамента,обслуживала
                                                    менеджер Александра.
                                                    Остались
                                                    довольны качеством обслуживания, привезли быстро и все точно по
                                                    накладной. Сейчас приобретаем
                                                    лист
                                                    оцинкованный на забор, соответствует полностью. советуем
                                                </p>
                                            </div>
                                            <img src="./img/image/user-1.jpg" alt="" class="review__photo">
                                            </img>
                                        </div>

                                        <div class="review">
                                            <div class="review__content">
                                                <p class="review__auther">
                                                    Виктор Белугин
                                                </p>
                                                <p class="review__text">
                                                    Добрый день! Покупали в сентябре арматуру для фундамента,обслуживала
                                                    менеджер Александра.
                                                    Остались
                                                    довольны качеством обслуживания, привезли быстро и все точно по
                                                    накладной. Сейчас приобретаем
                                                    лист
                                                    оцинкованный на забор, соответствует полностью. советуем
                                                </p>
                                            </div>
                                            <img src="./img/image/user-2.jpg" alt="" class="review__photo">
                                            </img>
                                        </div>
                                    </div>
                                    <div class="review__slide main-slider__item">
                                        <div class="review">
                                            <div class="review__content">
                                                <p class="review__auther">
                                                    Виктор Белугин 3
                                                </p>
                                                <p class="review__text">
                                                    Добрый день! Покупали в сентябре арматуру для фундамента,обслуживала
                                                    менеджер Александра.
                                                    Остались
                                                    довольны качеством обслуживания, привезли быстро и все точно по
                                                    накладной. Сейчас приобретаем
                                                    лист
                                                    оцинкованный на забор, соответствует полностью. советуем
                                                </p>
                                            </div>
                                            <img src="./img/image/user-1.jpg" alt="" class="review__photo">
                                            </img>
                                        </div>

                                        <div class="review">
                                            <div class="review__content">
                                                <p class="review__auther">
                                                    Виктор Белугин
                                                </p>
                                                <p class="review__text">
                                                    Добрый день! Покупали в сентябре арматуру для фундамента,обслуживала
                                                    менеджер Александра.
                                                    Остались
                                                    довольны качеством обслуживания, привезли быстро и все точно по
                                                    накладной. Сейчас приобретаем
                                                    лист
                                                    оцинкованный на забор, соответствует полностью. советуем
                                                </p>
                                            </div>
                                            <img src="./img/image/user-2.jpg" alt="" class="review__photo">
                                            </img>
                                        </div>
                                    </div>
                                    <div class="review__slide main-slider__item">
                                        <div class="review">
                                            <div class="review__content">
                                                <p class="review__auther">
                                                    Виктор Белугин 4
                                                </p>
                                                <p class="review__text">
                                                    Добрый день! Покупали в сентябре арматуру для фундамента,обслуживала
                                                    менеджер Александра.
                                                    Остались
                                                    довольны качеством обслуживания, привезли быстро и все точно по
                                                    накладной. Сейчас приобретаем
                                                    лист
                                                    оцинкованный на забор, соответствует полностью. советуем
                                                </p>
                                            </div>
                                            <img src="./img/image/user-1.jpg" alt="" class="review__photo">
                                            </img>
                                        </div>

                                        <div class="review">
                                            <div class="review__content">
                                                <p class="review__auther">
                                                    Виктор Белугин
                                                </p>
                                                <p class="review__text">
                                                    Добрый день! Покупали в сентябре арматуру для фундамента,обслуживала
                                                    менеджер Александра.
                                                    Остались
                                                    довольны качеством обслуживания, привезли быстро и все точно по
                                                    накладной. Сейчас приобретаем
                                                    лист
                                                    оцинкованный на забор, соответствует полностью. советуем
                                                </p>
                                            </div>
                                            <img src="./img/image/user-2.jpg" alt="" class="review__photo">
                                            </img>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="review__btn-wrap sections__btn right-edge">
                                <span id='reviewNext' class="main-slider__next light-btn">Показать еще</span>
                            </div>
                        </div>
                        <!--reviews-->

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
                                        <img src="./img/icon/catalog-arrow.svg" alt=""
                                             class="category__arrow arrow-show">
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
                                        <img src="./img/icon/catalog-arrow.svg" alt=""
                                             class="category__arrow arrow-show">
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
                                        <img src="./img/icon/catalog-arrow.svg" alt=""
                                             class="category__arrow arrow-show">
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
                                        <img src="./img/icon/catalog-arrow.svg" alt=""
                                             class="category__arrow arrow-show">
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
                                        <img src="./img/icon/catalog-arrow.svg" alt=""
                                             class="category__arrow arrow-show">
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
                                        <img src="./img/icon/catalog-arrow.svg" alt=""
                                             class="category__arrow arrow-show">
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
                                        <img src="./img/icon/catalog-arrow.svg" alt=""
                                             class="category__arrow arrow-show">
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
                                        <img src="./img/icon/catalog-arrow.svg" alt=""
                                             class="category__arrow arrow-show">
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
                                        <img src="./img/icon/catalog-arrow.svg" alt=""
                                             class="category__arrow arrow-show">
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
                                        <img src="./img/icon/catalog-arrow.svg" alt=""
                                             class="category__arrow arrow-show">
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
                                        <img src="./img/icon/catalog-arrow.svg" alt=""
                                             class="category__arrow arrow-show">
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
                                        <img src="./img/icon/catalog-arrow.svg" alt=""
                                             class="category__arrow arrow-show">
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
                                        <img src="./img/icon/catalog-arrow.svg" alt=""
                                             class="category__arrow arrow-show">
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
                                        <img src="./img/icon/catalog-arrow.svg" alt=""
                                             class="category__arrow arrow-show">
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
                                        <img src="./img/icon/catalog-arrow.svg" alt=""
                                             class="category__arrow arrow-show">
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
                                        <img src="./img/icon/catalog-arrow.svg" alt=""
                                             class="category__arrow arrow-show">
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
                                        <img src="./img/icon/catalog-arrow.svg" alt=""
                                             class="category__arrow arrow-show">
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
                                        <img src="./img/icon/catalog-arrow.svg" alt=""
                                             class="category__arrow arrow-show">
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
                                        <img src="./img/icon/catalog-arrow.svg" alt=""
                                             class="category__arrow arrow-show">
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
                                        <img src="./img/icon/catalog-arrow.svg" alt=""
                                             class="category__arrow arrow-show">
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
                                        <img src="./img/icon/catalog-arrow.svg" alt=""
                                             class="category__arrow arrow-show">
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
                                        <img src="./img/icon/catalog-arrow.svg" alt=""
                                             class="category__arrow arrow-show">
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
                                        <img src="./img/icon/catalog-arrow.svg" alt=""
                                             class="category__arrow arrow-show">
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
                                        <img src="./img/icon/catalog-arrow.svg" alt=""
                                             class="category__arrow arrow-show">
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
    <!--content-wrap-->

@endsection
