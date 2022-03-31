@extends('templates.main-template.layouts.app')

@section('content')
    <div class="content-wrap">
        <div class="content">
            <img class="main-bg" src="./img/image/bg.jpg" alt="">
            <div class="container">
                <div class="path-wrap">
                    <div class="path">
                        <a href="{{url('/')}}" class="path__link">Главная</a>
                        <span class="path__slash">/</span>
                        <a href="{{route('catalog')}}" class="path__link">Каталог</a>
                        <span class="path__slash">/</span>
                        @if(!empty($breadcrumbs))
                            @foreach($breadcrumbs as $br)
                                @if($loop->last)
                                    <a href="#" class="path__link">{{$br['title']}}</a>
                                @else
                                    <a href="{{$br['slug']}}" class="path__link">{{$br['title']}}</a>
                                    <span class="path__slash">/</span>
                                @endif
                            @endforeach
                        @endif


                    </div>
                </div>
                <div class="cols-wrap">
                    <!--col-content-->
                    <div class="col-content">
                        @if(!empty($category->children) && count($category->children))
                            <div class="categories desc-block-wrap">
                                <div class="desc-block">
                                    <div class="desc-block__content desc-block--with-slider">
                                        <h3 class=" desc-block__title">{{$category->title}}</h3>
                                        <ul class="desc-block__list">
                                            @if(!empty($category->children))
                                                @foreach($category->children as $child)
                                                    <li class="desc-block__item">
                                                        <a href="/catalog/{{$child->slug}}"
                                                           class="desc-block__link link">{{$child->title}}</a>
                                                    </li>
                                                @endforeach
                                            @endif
                                        </ul>

                                    </div>

                                    <div class="desc-block__preview">
                                        <img src="{{asset('img/image/product-midddle.jpg')}}" alt=""
                                             class="desc-block__img">

                                    </div>
                                </div>
                            </div>
                            <div class="m-sectoin">
                                <h2 class='m-catalog__title'>Каталог</h2>

                                <div class="m-categories">
                                    <h3 class="m-categories__title">{{$category->title}}</h3>
                                    <div class="m-categories__preview">
                                        <img src="{{asset('img/image/section-img.jpg')}}" alt=""
                                             class="m-categories__img">
                                    </div>
                                    <ul class="m-sectoin__list">
                                        @if(!empty($category->children))
                                            @foreach($category->children as $child)
                                                <li class="m-sectoin__item">
                                                    <a href="/catalog/{{$child->slug}}"
                                                       class="m-sectoin__link">{{$child->title}}</a>
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>

                                </div>

                            </div>
                        @endif
                        @if(!empty($products) && count($products))
                        <div class="products">
                            <h3 class="other-products">Товары</h3>
                            <div class="products__wrap">
                                @foreach($products as $prod)
                                <div class="product-card">
                                    <div class="product-card__img-wrap">
                                        <img src="{{asset('img/image/product-img.jpg')}}" alt="" class="product-card__img">
                                    </div>

                                    <div class="product-card__desc">
                                        <div class="product-card__text">
                                            <h3 class="product-card__title h3">
                                                <a href="/cena/{{$prod->slug}}" class="link">{{$prod->title}}</a>
                                            </h3>
                                            <p class='product-card__price'>
                                                Цена за штуку:
                                                <span class="product-card__price--blue">{{$prod->price}}</span>
                                            </p>
                                        </div>

                                        <div class="product-card__buy">

                                            <button class="product-card__btn product-card__order dark-btn">
                                                Заказать
                                            </button>
                                        </div>

                                        <div class="buy-mobile">
                                            <p class="buy-mobile__price">
                                               {{$prod->price}} <span class="buy-mobile__curenncy">₽</span>
                                            </p>

                                            <div class=" buy-mobile__order">
                                                <div class="buy-mobile__btn product-card__btn">
                                                    <img src="{{asset('img/icon/basket-icon.svg')}}" alt=""
                                                         class="buy-mobile__icon">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </div>

                        </div>
                                {!! $products->links('templates.main-template.layouts.pagination') !!}
                        @endif
                        <div class="block-info">
                            <div class="block-info__item">
                                {!! $category->description !!}
                            </div>
                        </div>


                    </div>
                    <!--col-content-->
                    @include('templates.main-template.layouts.sidebar')
                </div>

            </div>
        </div>
    </div>
@endsection
