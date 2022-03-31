@extends('templates.main-template.layouts.app')

@section('content')
    <!--main-carousel-->
    @if($appSettings['banner_available']['value'] && $appSettings['banner_items']['value'] && is_array($appSettings['banner_items']['value']))
{{--    @dd($popCategories)--}}
    <div id='mainCarousel' data-interval='10' class='main-carousel m-c'>
        <div id="mainCarouselSlidesWrap" class='m-c__slides main-slider'>
            @foreach($appSettings['banner_items']['value'] as $banner)
            <div class="m-c-slide main-slider__item">
                <a href="#!" class="m-c__link">
                    <div class="m-c-slide__content">
                        <img src="{{$banner}}" alt="" width="100%">
                    </div>
                </a>
            </div>
            @endforeach
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
                        @include('templates.main-template.layouts.popular-categories')
                        @include('templates.main-template.layouts.sales')
                        @include('templates.main-template.layouts.faq')
                    </div>
                    <!--col-content-->
                    @include('templates.main-template.layouts.sidebar')
                </div>
            </div>
        </div>
    </div>
    <!--content-wrap-->

@endsection
