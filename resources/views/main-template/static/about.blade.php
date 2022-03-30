@extends('main-template.layouts.app')

@section('content')
    <div class="content-wrap">
        <div class="content">
            <img class="main-bg" src="./img/image/bg.jpg" alt="">
            <div class="container">
                <div class="path-wrap">
                    <div class="path">
                        <a href="{{url('/')}}" class="path__link">Главная</a>
                        <span class="path__slash">/</span>
                        <a href="#" class="path__link">{{$page->title}}</a>
                    </div>
                </div>
                <div class="cols-wrap">
                    <!--col-content-->
                    <div class="col-content">
                        <div class="about-wpap desc-block-wrap">

                            <h2 class="section-title section-title--white h2">{{$page->title}}</h2>

                            <div class="about desc-block">
                                {!! $page->description !!}
                                <div class="desc-block__preview">
                                    <div id="slider" class="desc-block__slider">
                                        <div id="sliderContainer" class="slider slider-container">
                                            <div id="slidesWrap" class="slides__wrap">
                                                <div class="slider__item slider__item--is-active">
                                                    <img src="./img/image/product-midddle.jpg" alt="" class="slide__img">
                                                </div>
                                                <div class="slider__item">
                                                    <img src="./img/image/product-midddle.jpg" alt="" class="slide__img">
                                                </div>
                                                <div class="slider__item">
                                                    <img src="./img/image/product-midddle.jpg" alt="" class="slide__img">
                                                </div>
                                                <div class="slider__item">
                                                    <img src="./img/icon/play-icon.svg" alt="" class="slider__play-icon">
                                                    <img src="./img/image/product-midddle-blur.jpg" alt="" class="slide__img">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="slider__arrow-nav">
                                            <div class="slider__arrows">
                                                <div id="prevSlide" class="slider__arrow">
                                                    <img src="./img/control/slider-prev.svg" alt="<" class="slider__arrow-img">
                                                </div>
                                                <div id="nextSlide" class="slider__arrow">
                                                    <img src="./img/control/slider-next.svg" alt=">" class="slider__arrow-img">
                                                </div>
                                            </div>

                                            <div class="slider__counter">
                                                <span id="currentSlide" class="slider__num slider__current">1</span>

                                                <span class="slider__slash">
                          <img src="./img/slider-slash.svg" alt="/" class="slider__slash-img">
                        </span>

                                                <span id="totalSlide" class="slider__num">4</span>
                                            </div>
                                        </div>
                                        <div class="slider__dots-nav">
                                            <div id="sliderDotsWrap" class="slider__dots">
                                                <div id="" class="slider__dot slider__dot--is-activ">
                                                    <img src="./img/image/dot-img.jpg" alt="" class="slider__dot-img">
                                                </div>
                                                <div class="slider__dot">
                                                    <img src="./img/image/dot-img.jpg" alt="" class="slider__dot-img">
                                                </div>
                                                <div class="slider__dot ">
                                                    <img src="./img/image/dot-img.jpg" alt="" class="slider__dot-img">
                                                </div>
                                                <div class="slider__dot">
                                                    <img src="./img/icon/play-icon.svg" alt="" class="slider__dot-play">
                                                    <img src="./img/image/dot-img-blur.jpg" alt="" class="slider__dot-img ">
                                                </div>
                                            </div>
                                        </div>

                                        <div id="fullPic" class="full-pic" style="height: 594px;">
                                            <div class="full-pic__list">
                                                <div class="full-pic__item">
                                                    <img src="./img/control/close-full-pic.svg" alt="" class="full-pic__close">
                                                    <img src="./img/image/big-1.jpg" alt="" class="full-pic__content">
                                                </div>
                                                <div class="full-pic__item">
                                                    <img src="./img/control/close-full-pic.svg" alt="" class="full-pic__close">
                                                    <img src="./img/image/big-2.jpg" alt="" class="full-pic__content">
                                                </div>

                                                <div class="full-pic__item">
                                                    <img src="./img/control/close-full-pic.svg" alt="" class="full-pic__close">
                                                    <img src="./img/image/big-3.jpg" alt="" class="full-pic__content">
                                                </div>

                                                <div class="full-pic__item">
                                                    <img src="./img/control/close-full-pic.svg" alt="" class="full-pic__close">
                                                    <img src="./img/icon/play-icon.svg" alt="" class="full-pic__play">
                                                    <video class="full-pic__content" preload="metadata" loop="">

                                                        <source src="./movie/Joren_Falls_Izu_Jap.mp4" type="video/mp4">
                                                        <source src="/movie/Joren_Falls_Izu_Jap.webm" type="video/webm">
                                                        <source src="./movie/Joren_Falls_Izu_Japan.ogv" type="video/ogg">
                                                        Video not supported.
                                                    </video>
                                                </div>
                                            </div>

                                            <div id="fullPicPrev" class="full-pic__arrow full-pic__arrow--prev">
                                                <img src="./img/control/m-c-left.svg" alt="" class="full-pic__arrow-img">
                                            </div>
                                            <div id="fullPicNext" class="full-pic__arrow full-pic__arrow--next">
                                                <img src="./img/control/m-c-right.svg" alt="" class="full-pic__arrow-img">
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
