<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href='{{asset('/css/style.min.css')}}'>
    <title>Store Portal</title>
</head>

<body>
<header class='header h'>
    <div class="h-nav-wrap">
        <div class="container">
            <!--header-nav-->
            <nav class='h-nav'>
                <ul class="h-nav__list">
                    <li class="h-nav__item">
                        @if(\Illuminate\Support\Facades\Route::is('home')) <span class="h-nav__marker"></span> @endif
                        <a href="{{url('/')}}" class="h-nav__link @if(\Illuminate\Support\Facades\Route::is('home')) h-nav__link--is-active @endif">
                            Главная
                        </a>
                    </li>
                    <li class="h-nav__item">
                        @if(\Illuminate\Support\Facades\Route::is('about')) <span class="h-nav__marker"></span> @endif
                        <a href="{{route('about')}}" class="h-nav__link link @if(\Illuminate\Support\Facades\Route::is('about')) h-nav__link--is-active @endif">
                            О компании
                        </a>
                    </li>
                    <li class="h-nav__item">
                        @if(\Illuminate\Support\Facades\Route::is('contacts')) <span class="h-nav__marker"></span> @endif
                        <a href="{{route('contacts')}}" class="h-nav__link link @if(\Illuminate\Support\Facades\Route::is('contacts')) h-nav__link--is-active @endif">
                            Контакты
                        </a>
                    </li>

                    <li class="h-nav__item">
                        <a href="catalog.html" class="h-nav__link link">
                            Каталог
                        </a>
                    </li>
                    <li class="h-nav__item">

                        <a href="news.html" class="h-nav__link link">
                            Новости
                        </a>
                    </li>
                    <li class="h-nav__item">
                        <a href="stock.html" class="h-nav__link link">
                            Акции
                        </a>
                    </li>
                </ul>
                <div class="h-login">
                    <span class="h-login__btn">
                        @if (Route::has('login'))
                            @auth
                                <a href="{{url('admin')}}" class="h-login">
                                    <span class="h-login__btn">{{Auth::user()->name ? Auth::user()->name : 'Панель'}}</span>
                                </a>
                            @else
                                <a href="https://authportal.loc/login" class="h-login">
                                    <span class="h-login__btn">Авторизация</span>
                                </a>
                            @endauth
                        @endif

                    </span>
                </div>
            </nav>
            <!--header-nav-->
        </div>
    </div>
    <!--header-contact-->
    <div class="h-contact">
        <div class="h-contact__inner container">
            <div class="logo">
                <a href="index.html" class="logo__link">
                    <img class='logo__img' src="./img/logo.svg" alt="Айсберг АС">
                </a>
            </div>
            <ul class="h-contact__list">
                @if($globalCompany->phone)
                <li class="h-contact__item">
                    <img src="{{asset('img/icon/phone-icon.svg')}}" alt="" class="h-contact__icon">
                    <a href='tel:{{$globalCompany->phone}}' class="h-contact__link">{{$globalCompany->phone}}</a>
                </li>
                @endif
                @if($globalCompany->email)
                <li class="h-contact__item">
                    <img src="{{asset('img/icon/at-icon.svg')}}" alt="" class="h-contact__icon">
                    <a href="mailto:{{$globalCompany->email}}" class="h-contact__link">{{$globalCompany->email}}</a>
                </li>
                @endif
                <li class="h-contact__item">
                    <img src="{{asset('img/icon/cloud-icon.svg')}}" alt="" class="h-contact__icon">
                    <span id='application' class="h-contact__text pointer">Онлайн - заявка</span>
                </li>
            </ul>
            <div class="h-mobile__btns">
                <div id='searchBtn' class="h-mobile__btn-item">
                    <img class="h-mobile__btn-img" src="./img/control/m-search-icon.svg" alt="">
                </div>
                <div id='burgerBtn' class="h-mobile__btn-item">
                    <img class="h-mobile__btn-img" src="./img/control/m-burger.svg" alt="">
                </div>

            </div>
        </div>
    </div>

    <!--header-contact-->
    <div id='mobileSearchWrap' class="search-mobile-wrap search-mobile--is-hide container">
        <form action="" method="POST" class="search-mobile  ">
            <input type="text" placeholder="Поиск" class="search-mobile__input">
        </form>
    </div>

</header>

    @yield('content')

<footer class="footer f">
    <div class="container">
        <nav class="f-nav">
            <ul class="f-nav__list">
                <li class="f-nav__item">
                    <a href="index.html" class="f-nav__link f-nav__link--is-active">
                        Главная
                    </a>
                </li>
                <li class="f-nav__item">
                    <a href="about.html" class="f-nav__link link">
                        О компании
                    </a>
                </li>
                <li class="f-nav__item">
                    <a href="contacts.html" class="f-nav__link link">
                        Контакты
                    </a>
                </li>
                <li class="f-nav__item">
                    <a href="catalog.html" class="f-nav__link link">
                        Каталог
                    </a>
                </li>

                <li class="f-nav__item">
                    <a href="news.html" class="f-nav__link link">
                        Новости
                    </a>
                </li>
                <li class="f-nav__item">
                    <a href="stock.html" class="f-nav__link link">
                        Акции
                    </a>
                </li>
            </ul>

            <div class="f-login">
          <span class="f-login__btn">
            Авторизация
          </span>
            </div>
        </nav>
        <div class="f-content">
            <div id='callbackFormModal' class="callback-form__wrap">
                <form id="callbackForm" action="send.html" method="POST" class="f__form callback-form form">
                    <div class="callback-close__wrap close">
              <span class="close__word callback-close">
                Закрыть
              </span>
                        <img src="./img/control/close-modal.svg" alt="" class="close__icon callback-close">
                    </div>
                    <h4 class='f__title'>
                        Обратная связь
                    </h4>
                    <h4 class='callback-modal__title modal__title'>
                        Почти готово
                    </h4>
                    <p class='callback-modal__desc modal__desc'>Укажите ваш телефонный номер для звонка оператора</p>

                    <p class="f__error error empty">Заполните все поля</p>
                    <p class="f__error error no-send">Произошла ошибка, данные не отправлены, вы можете связаться с нами по
                        телефону 8 (421) 292-97-86 или по почте hab@metall-as.ru</p>
                    <p class="f__error error phone">Неправильно указан номер</p>
                    <p class="f__error error mail">Неправильна указана почта</p>
                    <div class="callback-form__input-wrap">
                        <input name='name' class="callback-form__input input" type="text" data-type='name' placeholder="Ваше имя">
                        <input name='tel' class="callback-form__input input" data-type='tel' type="text"
                               placeholder="Ваш телефон">
                        <input name='mail' class="callback-form__input input" data-type="email" type="text"
                               placeholder="Ваша почта">
                        <input class="callback-form__submit submit-form light-btn" type="submit" value="Оставить заявку">
                    </div>
                </form>
            </div>

            <div class="f-contacts">
                <h4 class='f__title'>
                    Контакты
                </h4>

                <ul class="f-contacts__list">
                    <li class="f-contacts__item">
                        <img src="./img/icon/f-point-icon.svg" alt="!" class="f-contacts__icon">
                        <div class="f-contacts__text">
                            <h5 class='f-contacts__title'>Адрес:</h5>
                            <p class='f-contacts__desc'>Россия, Хабаровск,<br /> Производственный переулок, 3, оф.6</p>
                        </div>
                    </li>
                    <li class="f-contacts__item">
                        <img src="./img/icon/f-phone-icon.svg" alt="!" class="f-contacts__icon">
                        <div class="f-contacts__text">
                            <h5 class='f-contacts__title'>Телефон:</h5>

                            <p class='f-contacts__desc'>8 (421) 292-97-86</p>
                        </div>
                    </li>
                    <li class="f-contacts__item">
                        <img src="./img/icon/f-at-icon.svg" alt="!" class="f-contacts__icon">
                        <div class="f-contacts__text">
                            <h5 class='f-contacts__title'>Электронная почта:</h5>
                            <p class='f-contacts__desc'>hab@metall-as.ru</p>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="f-logo">
                <a href='index.html' class="f-logo__link">
                    <img src="./img/white-logo.svg" alt="" class="f-logo__img">
                </a>
            </div>
        </div>

        <span id='callbackBtn' class="callback-btn light-btn">
        Обратная связь
      </span>

        <div class="f-socials">
            <a href="#!" class="f-socials__item">
                <img src="./img/icon/whatsApp-icon.svg" alt="" class="f-socials__img">
            </a>
            <a href="#!" class="f-socials__item">
                <img src="./img/icon/instagram-icon.svg" alt="" class="f-socials__img">
            </a>
            <a href="#!" class="f-socials__item">
                <img src="./img/icon/telegram-icon.svg" alt="" class="f-socials__img">
            </a>
        </div>
        <p class="copywrite">
            Cайт создан на площадке «<a href="#!" class="copywrite__link link">В ассортименте.ру</a>»
        </p>
    </div>
</footer>

<div id='up' class='up'>
    <div id='upBtn' class="up-btn">
        <img src="./img/control/up-icon.svg" alt="" class="up-btn__img">
        <img src="./img/control/up-mobile-icon.svg" alt="" class="up-btn__img-mobile">
    </div>
</div>


<div id='mobileNav' class="mobile-menu">
    <div class="mobile-menu__inner">
        <div id='mobileMenuClose' class="mobile-menu__close">
            <img src="./img/control/mobile-menu-close.svg" alt="" class="mobile-menu__close-btn">
        </div>
        <div class="mobile__login">
            <a href="#!" class="mobile__item">
                Регистрация
            </a>
            <span class="mobile__slash">/</span>
            <a href="#!" class="mobile__item">
                вход
            </a>
        </div>

        <nav class="mobile-nav">
            <ul class="mobile-nav__list">
                <li class="mobile-nav__item">
                    <a href="index.html" class="mobile-nav__link mobile-nav__link--is-active">
                        Главная
                    </a>
                </li>
                <li class="mobile-nav__item">
                    <a href="about.html" class="mobile-nav__link">
                        О компании
                    </a>
                </li>
                <li class="mobile-nav__item">
                    <a href="catalog.html" class="mobile-nav__link">
                        Каталог
                    </a>
                </li>
                <li class="mobile-nav__item">
                    <a href="#!" class="mobile-nav__link">
                        Продукция
                    </a>
                </li>

                <li class="mobile-nav__item">
                    <a href="#!" class="mobile-nav__link">
                        Производство
                    </a>
                </li>
                <li class="mobile-nav__item">
                    <a href="#!" class="mobile-nav__link">
                        Услуги
                    </a>
                </li>
                <li class="mobile-nav__item">
                    <a href="stock.html" class="mobile-nav__link">
                        Акции
                    </a>
                </li>
                <li class="mobile-nav__item">
                    <a href="contacts.html" class="mobile-nav__link">
                        Контакты
                    </a>
                </li>
                <li class="mobile-nav__item">
                    <a href="news.html" class="mobile-nav__link">
                        Новости
                    </a>
                </li>
                <li class="mobile-nav__item">
                    <a href="#!" class="mobile-nav__link">
                        Отзовы
                    </a>
                </li>
            </ul>
        </nav>
    </div>

</div>

<!--modal-windows-->
<div id="shading" class='shading'>
    <!--faq group-->


    <div id='faqThanks' class="faq-modal modal">
        <div class="close">
        <span class="close__word close-btn">
          Закрыть
        </span>
            <img src="./img/control/close-modal.svg" alt="" class="close__icon close-btn">
        </div>

        <div class="modal__content modal-thanks ">
            <img class='modal-thanks__icon' src="./img/icon/success-icon.svg" alt="">
            <div class="modal-thanks__text">
                <h4 class="modal__title">Спасибо!</h4>
                <p class='modal-thanks__desc'>
                    Ваша ворос отправлен<br />
                    Скоро мы ответим вам на почту</p>
            </div>
        </div>
    </div>
    <!--faq group-->

    <!--Заявка группа-->
    <div id='applicationModal' class="application-modal modal">
        <div class="close">
        <span class="close__word close-btn">
          Закрыть
        </span>
            <img src="./img/control/close-modal.svg" alt="" class="close__icon close-btn">
        </div>
        <div class="modal__content">
            <h4 class="modal__title">Почти готово!</h4>
            <p class="modal__desc">Укажите вашу электронную почту для связи с нами </p>

            <form id='applicationForm' class='modal__form form' action="send.html" method="POST">
                <div class="modal__message">
                    <p class="modal__error error empty">Заполните поле</p>
                    <p class="modal__error error no-send">Произошла ошибка, данные не отправлены, вы можете связаться с нами по
                        телефону 8 (421) 292-97-86 или по почте hab@metall-as.ru</p>
                    <p class="modal__error error phone">Неправильно указан номер</p>
                </div>
                <div class="modal__inputs">
                    <input id='applicationTel' name='phone' class="modal__input input" data-type="tel" type="text"
                           placeholder="+7 000-000-00-00">
                    <input class="modal__submit light-btn" type="submit" value="Отправить">
                </div>
            </form>
        </div>
    </div>

    <div id='applicationThanks' class="application-thanks modal">
        <div class="close">
        <span class="close__word close-btn">
          Закрыть
        </span>
            <img src="./img/control/close-modal.svg" alt="" class="close__icon close-btn">
        </div>
        <div class="modal__content modal-thanks ">
            <img class='modal-thanks__icon' src="./img/icon/success-icon.svg" alt="">
            <div class="modal-thanks__text">
                <h4 class="modal__title">Спасибо!</h4>
                <p class='modal-thanks__desc'>
                    Ваша заявка отправлена<br />
                    Скоро мы свяжемся с вами</p>
            </div>
        </div>
    </div>
    <!--Заявка группа-->

    <!--заказ-->
    <div id='order' class="order-modal modal">
        <div class="close">
        <span class="close__word close-btn">
          Закрыть
        </span>
            <img src="./img/control/close-modal.svg" alt="" class="close__icon close-btn">
        </div>
        <div class="modal__content">
            <h4 class="modal__title">Ваш заказ!</h4>
            <p class="modal__desc">Укажите количество товара, контактный телефон или почту</p>
            <form id='orderForm' class='order-modal__form' action="send.html" method="POST">
                <div class="order-modal__item">
                    <img src="./img/image/section-img.jpg" alt="" class="order-modal__img">
                    <div class="order-modal__desc">
                        Труба холоднодеформированная 16х2.5мм ст. 20 ГОСТ 8734
                    </div>
                </div>
                <p id="mailOrTel" class="modal__error error">Укажите почту или номер</p>
                <p class="modal__error error no-send">Произошла ошибка, данные не отправлены, вы можете связаться с нами по
                    телефону 8 (421) 292-97-86 или по почте hab@metall-as.ru</p>
                <p id="errorMail" class="modal__error error mail">Неправильна указана почта</p>
                <input id='inputMail' name='mail' class="modal__input order-modal__input input" data-type="email" type="text"
                       placeholder="Ваша почта">
                <p id="errorTel" class="modal__error error phone">Неправильно указан номер</p>
                <input id='inputTel' name='tel' class="modal__input order-modal__input input" data-type="tel" type="text"
                       placeholder="+7 000-000-00-00">
                <div class="counter">
                    <input id='orderQuantity' name='orderQuantity' type="text" class="modal__input counter__input" value='1'
                           placeholder="Количество">
                    <div id='incQuantity' class="counter__btn">
                        <img src="./img/control/counter-inc.svg" alt="" class="counter__btn-img">

                    </div>
                    <div id='decQuantity' class="counter__btn">
                        <img src="./img/control/counter-dec.svg" alt="" class="counter__btn-img">
                    </div>
                </div>
                <div class="order-modal__buy">
                    <p class="order-modal__total-price">
                        <span class='order-modal__total'>Общая стоимость:</span>

                        <span id='orderPrice' data-price="65000" class="order-modal__price">65 000</span>
                    </p>
                    <input class="order-modal__submit modal__submit light-btn" type="submit" value="Отправить">
                </div>
            </form>
        </div>
    </div>
    <!--заказ-->

</div>
<!--modal-windows-->

<script src='{{asset('/js/main.js')}}'></script>
</body>
