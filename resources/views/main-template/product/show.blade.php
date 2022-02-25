@extends('layouts.app')

@section('content')
    <div class="content-wrap">
        <div class="content">
            <img class="main-bg" src="./img/image/bg.jpg" alt="">
            <div class="container">
                <div class="path-wrap">
                    <div class="path">
                        <a href="{{url('/')}}" class="path__link">Главная</a>
                        <span class="path__slash">/</span>
                        <a href="/price/{{$category->slug}}" class="path__link">{{$category->title}}</a>
                        <span class="path__slash">/</span>
                        <a href="#" class="path__link">{{$product->title}}</a>
                    </div>
                </div>
                <div class="cols-wrap">
                    <!--col-content-->
                    <div class="col-content">
                        <div class="desc-block-wrap">
                            <div class="desc-block">
                                <div class="desc-block__content desc-block--with-slider">
                                    <h3 class="news__title desc-block__title">{{$product->title}}</h3>
                                    <div class="desc-block__text">{{$product->down_text}}</div>
                                    <div class="desc-block__buy">
                                        <div class='desc-block__m-price'>
                                            <p class="desc-block__m-price-new">Цена: <span class="desc-block__m-price--blue">{{$product->price}}</span></p>
                                        </div>
                                        <div class="desc-block__order">
                                            <button class="product-card__btn desc-block__btn dark-btn">
                                                Заказать
                                            </button>
                                        </div>
                                        <div class="desc-block__price">
                                            <p class="desc-block__price-text">
                                                Цена: <span class="desc-block__price-num desc-block__price-num--blue">{{$product->price}}</span>
                                            </p>
                                            <p class=" desc-block__date desc-block__price-text ">
                                                Актуально: <span class="desc-block__price-num">{{$product->updated_at}}</span>
                                            </p>
                                        </div>
                                    </div>

                                </div>

                                <div class="desc-block__preview">

                                    <div id='slider' class="desc-block__slider">
                                        <div id='sliderContainer' class="slider slider-container">
                                            <div id="slidesWrap" class="slides__wrap">
                                                <div class="slider__item slider__item--is-active">
                                                    <img src="{{asset('img/image/product-midddle.jpg')}}" alt="" class="slide__img">
                                                </div>
                                                <div class="slider__item">
                                                    <img src="{{asset('img/image/product-midddle.jpg')}}" alt="" class="slide__img">
                                                </div>
                                                <div class="slider__item">
                                                    <img src="{{asset('img/image/product-midddle.jpg')}}" alt="" class="slide__img">
                                                </div>
                                                <div class="slider__item">
                                                    <img src="{{asset('img/image/product-midddle.jpg')}}" alt="" class="slide__img">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="slider__arrow-nav">

                                            <div class="slider__arrows">
                                                <div id='prevSlide' class="slider__arrow">
                                                    <img src="{{asset('img/control/slider-prev.svg')}}" alt="<" class="slider__arrow-img">
                                                </div>
                                                <div id='nextSlide' class="slider__arrow">
                                                    <img src="{{asset('img/control/slider-next.svg')}}" alt=">" class="slider__arrow-img">
                                                </div>
                                            </div>

                                            <div class="slider__counter">
                                                <span id='currentSlide' class="slider__num slider__current">1</span>
                                                <span class="slider__slash">
                                                    <img src="{{asset('img/slider-slash.svg')}}" alt="/" class="slider__slash-img">
                                                </span>
                                                <span id='totalSlide' class="slider__num">1</span>
                                            </div>
                                        </div>
                                        <div class="slider__dots-nav">
                                            <div id='sliderDotsWrap' class="slider__dots">
                                                <div id class="slider__dot slider__dot--is-activ">
                                                    <img src="{{asset('img/image/dot-img.jpg')}}" alt="" class="slider__dot-img">
                                                </div>
                                                <div class="slider__dot">
                                                    <img src="{{asset('img/image/dot-img.jpg')}}" alt="" class="slider__dot-img">
                                                </div>
                                                <div class="slider__dot ">
                                                    <img src="{{asset('img/image/dot-img.jpg')}}" alt="" class="slider__dot-img">
                                                </div>
                                                <div class="slider__dot">
                                                    <img src="{{asset('img/image/dot-img.jpg')}}" alt="" class="slider__dot-img ">
                                                </div>
                                            </div>
                                        </div>

                                        <div id='fullPic' class="full-pic">
                                            <div class="full-pic__list">
                                                <div class="full-pic__item">
                                                    <img src="{{asset('img/control/close-full-pic.svg')}}" alt="" class="full-pic__close">
                                                    <img src="{{asset('img/image/big-1.jpg')}}" alt="" class="full-pic__content">
                                                </div>
                                                <div class="full-pic__item">
                                                    <img src="{{asset('img/control/close-full-pic.svg')}}" alt="" class="full-pic__close">
                                                    <img src="{{asset('img/image/big-2.jpg')}}" alt="" class="full-pic__content">
                                                </div>
                                            </div>

                                            <div id='fullPicPrev' class="full-pic__arrow full-pic__arrow--prev">
                                                <img src="{{asset('img/control/m-c-left.svg')}}" alt="" class="full-pic__arrow-img">
                                            </div>
                                            <div id='fullPicNext' class="full-pic__arrow full-pic__arrow--next">
                                                <img src="{{asset('img/control/m-c-right.svg')}}" alt="" class="full-pic__arrow-img">
                                            </div>

                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!--col-content-->
                    @include('main-template.layouts.sidebar')
                </div>

            </div>
        </div>
    </div>
@endsection
