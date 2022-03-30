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
                        <a href="#" class="path__link">Каталог</a>
                    </div>
                </div>
                <div class="cols-wrap">
                    <!--col-content-->
                    <div class="col-content">
                        <!--sections-->
                        @if($categories)
                        <div class="catalog__section ">
                            <h2 class="section-title h2">Каталог</h2>
                            <div class="sections-list">
                                @foreach($categories as $category)
                                <div class='sections-card'>
                                    <div class="sections-card__desc">
                                        <a href='/catalog/{{$category['slug']}}' class="sections-card__title link">
                                            {{$category['title']}}
                                        </a>
{{--                                        @if(!empty($category['children']) && $category['children'])--}}
{{--                                        <ul class='sections-card__list'>--}}
{{--                                            @foreach($category['children'] as $child)--}}
{{--                                            <li class="sections-card__item">--}}
{{--                                                <a class="sections-card__link-item link" href="/catalog/{{$child['slug']}}">--}}
{{--                                                    {{$child['title']}}--}}
{{--                                                </a>--}}
{{--                                            </li>--}}
{{--                                            @endforeach--}}
{{--                                        </ul>--}}
{{--                                        <a href="/catalog/{{$category['slug']}}" class="sections-card__link">Посмотреть все--}}
{{--                                            <img src="{{asset('img/icon/arrow-more.svg')}}" alt="->" class="sections-card__arrow">--}}
{{--                                        </a>--}}
{{--                                        @endif--}}
                                    </div>
                                    <div class="sections-card__preview">
                                        <img src="{{$category['photo']}}" alt="" class="sections-card__img">
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                        <!--sections-->
                    </div>
                    <!--col-content-->
                    @include('main-template.layouts.sidebar')
                </div>

            </div>
        </div>
    </div>
@endsection
