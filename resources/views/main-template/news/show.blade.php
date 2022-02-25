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
                                <div>
                                    <h3 class="desc-block__title">
                                        <a href="#!" class="desc-block__link">{{$news->title}}</a>
                                    </h3>
                                    <div class="desc-block__text">{!! $news->description !!}
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
