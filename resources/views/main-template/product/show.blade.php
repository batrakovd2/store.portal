@extends('layouts.app')

@section('content')
    <div class="content-wrap">
        <div class="content">
            <img class="main-bg" src="{{asset('img/image/bg.jpg')}}" alt="">
            <div class="container">
                <div class="path-wrap">
                    <div class="path">
                        <a href="{{url('/')}}" class="path__link">Главная</a>
                        <span class="path__slash">/</span>
                        @foreach($breadcrumps as $br)
                            <a href="/catalog/{{$br['slug']}}" class="path__link">{{$br['title']}}</a>
                            <span class="path__slash">/</span>
                        @endforeach

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
                                    <div class="desc-block__text">{!! $product->down_text !!}</div>
                                    <div class="desc-block__buy">
                                        <div class='desc-block__m-price'>
                                            <p class="desc-block__m-price-new">Цена: <span class="desc-block__m-price--blue">{{$product->price}}</span></p>
                                        </div>
                                        @if($product->fields)
                                            <div>
                                                @foreach($product->fields as $key => $fl)
                                                    @if($fl)
                                                    <p>
                                                        {{$key}} : {{$fl}}
                                                    </p>
                                                    @endif
                                                @endforeach
                                            </div>
                                        @endif
                                        <div class="desc-block__order">
                                            <button class="product-card__btn desc-block__btn dark-btn">
                                                Заказать
                                            </button>
                                        </div>

                                        <div class="desc-block__price">
                                            <p class="desc-block__price-text">
                                                Цена: <span class="desc-block__price-num desc-block__price-num--blue">{{$product->price}}</span>
                                                @if(!empty($product->advanced_price) && !empty($product->advanced_price->old_price))
                                                    <br>
                                                    <br>
                                                    Старая цена <span class="desc-block__price-num desc-block__price-num--blue">{{$product->advanced_price->old_price}}</span>
                                                @endif
                                            </p>
                                            @if(!empty($product->updated_at))
                                            <p class=" desc-block__date desc-block__price-text ">
                                                Актуально: <span class="desc-block__price-num">{{date_format($product->updated_at, "d.m.Y")}}</span>
                                            </p>
                                            @endif
                                        </div>
                                    </div>

                                </div>

                                <div class="desc-block__preview">
                                    <div id='slider' class="desc-block__slider">
                                        @if($product->advanced_price)
                                            <div class="desc-block__sticker sticker-sale">SALE</div>
                                        @endif
                                        <div id='sliderContainer' class="slider slider-container">
                                            <div id="slidesWrap" class="slides__wrap">
                                                @foreach($product->photo as $ph)
                                                    <div class="slider__item @if($loop->first) slider__item--is-active @endif">
                                                        <img src="{{$ph}}" alt="" class="slide__img">
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        @if(is_array($product->photo) && count($product->photo) > 1)
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
                                                @foreach($product->photo as $ph)
                                                    <div class="slider__dot @if($loop->first) slider__dot--is-activ @endif">
                                                        <img src="{{$ph}}" alt="" class="slider__dot-img">
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        @endif

                                        <div id='fullPic' class="full-pic">
                                            <div class="full-pic__list">
                                                @foreach($product->photo as $ph)
                                                    <div class="full-pic__item">
                                                        <img src="{{asset('img/control/close-full-pic.svg')}}" alt="" class="full-pic__close">
                                                        <img src="{{$ph}}" alt="" class="full-pic__content">
                                                    </div>
                                                @endforeach
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
