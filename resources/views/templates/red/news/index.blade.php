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
                        <a href="#" class="path__link">Новости</a>
                    </div>
                </div>
                <div class="cols-wrap">
                    <!--col-content-->
                    <div class="col-content">
                        <h2 class="section-title h2">Новости</h2>
                        @if(!empty($news) && $news)
                            @foreach($news as $ns)
                                <div class="news-wrap desc-block-wrap">
                                    <div class="news desc-block">
                                        <div class="news__content desc-block__content">
                                            <h3 class="news__title desc-block__title">
                                                <a href="/news/{{$ns->slug}}" class="desc-block__link link">{{$ns->title}}</a>
                                            </h3>
                                            <div class="news__text desc-block__text">{!! $ns->description ? substr($ns->description, 0, 500) : "" !!}</div>
                                        </div>
                                        <div class="news__preview desc-block__preview">
                                            <img src="{{ $ns->photo }}" alt="" class="news__img desc-block__img">
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        {!! $news->links('templates.main-template.layouts.pagination') !!}
                    </div>
                    <!--col-content-->
                    @include('templates.main-template.layouts.sidebar')
                </div>

            </div>
        </div>
    </div>
@endsection
