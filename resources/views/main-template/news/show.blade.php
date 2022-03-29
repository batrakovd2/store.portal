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
                        <a href="{{url('news')}}" class="path__link">Новости</a>
                    </div>
                </div>
                <div class="cols-wrap">
                    <!--col-content-->
                    <div class="col-content">
                        <h2 class="section-title h2">Новости</h2>
                        <div class="desc-block-wrap">
                            <div class="desc-block">
                                <div class="desc-block__content">
                                    <h3 class="desc-block__title">
                                        <a href="#!" class="desc-block__link">{{$news->title}}</a>
                                    </h3>
                                    <div class="desc-block__text">{!! $news->description !!}
                                    </div>
                                </div>
                                @if(!empty($news) && !empty($news->photo))
                                    <div class="desc-block__preview">
                                        <div id="slider" class="desc-block__slider">
                                            <div id="sliderContainer" class="slider slider-container">
                                                <div id="slidesWrap" class="slides__wrap">
                                                    @foreach($news->photo as $ns)
                                                        <div class="slider__item @if($loop->first) slider__item--is-active @endif">
                                                            <img src="{{$ns}}" alt="" class="slide__img">
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            @if(!empty($news->photo) && is_array($news->photo) && count($news->photo) > 1)
                                            <div class="slider__arrow-nav">
                                                <div class="slider__arrows">
                                                    <div id="prevSlide" class="slider__arrow">
                                                        <img src="{{asset('img/control/slider-prev.svg')}}" alt="<" class="slider__arrow-img">
                                                    </div>
                                                    <div id="nextSlide" class="slider__arrow">
                                                        <img src="{{asset('img/control/slider-next.svg')}}" alt=">" class="slider__arrow-img">
                                                    </div>
                                                </div>

                                                <div class="slider__counter">
                                                    <span id="currentSlide" class="slider__num slider__current">1</span>

                                                    <span class="slider__slash">
                                                      <img src="{{asset('img/slider-slash.svg')}}" alt="/" class="slider__slash-img">
                                                    </span>

                                                    <span id="totalSlide" class="slider__num">4</span>
                                                </div>
                                            </div>
                                            <div class="slider__dots-nav">
                                                <div id="sliderDotsWrap" class="slider__dots">
                                                    @foreach($news->photo as $ns)
                                                        <div id="" class="slider__dot @if($loop->first) slider__dot--is-activ @endif">
                                                            <img src="{{$ns}}" alt="" class="slider__dot-img">
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            @endif
                                            <div id="fullPic" class="full-pic" style="height: 516px;">
                                                <div class="full-pic__list">
                                                    @foreach($news->photo as $ns)
                                                        <div class="full-pic__item">
                                                            <img src="{{asset('img/control/close-full-pic.svg')}}" alt="" class="full-pic__close">
                                                            <img src="{{$ns}}" alt="" class="full-pic__content">
                                                        </div>
                                                    @endforeach
                                                </div>

                                                <div id="fullPicPrev" class="full-pic__arrow full-pic__arrow--prev">
                                                    <img src="{{asset('img/control/m-c-left.svg')}}" alt="" class="full-pic__arrow-img">
                                                </div>
                                                <div id="fullPicNext" class="full-pic__arrow full-pic__arrow--next">
                                                    <img src="{{asset('img/control/m-c-right.svg')}}" alt="" class="full-pic__arrow-img">
                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                @endif
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
