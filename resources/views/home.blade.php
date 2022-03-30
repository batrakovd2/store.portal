@extends('main-template.layouts.app')

@section('content')
    <!--main-carousel-->
    @if($appSettings['banner_available']['value'])
{{--    @dd($popCategories)--}}
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
    @endif



    <!--content-wrap-->
    <div class="content-wrap">
        <img class="main-bg" src="{{config('app.img_portal')."/".$appSettings['background']['value']}}" alt="">
        <div class="content">
            <div class="container">

                <div class="cols-wrap">
                    <!--col-content-->
                    <div class="col-content">
                        @include('main-template.layouts.popular-categories')
                        @include('main-template.layouts.sales')
                        @include('main-template.layouts.faq')
                    </div>
                    <!--col-content-->
                    @include('main-template.layouts.sidebar')
                </div>
            </div>
        </div>
    </div>
    <!--content-wrap-->

@endsection
