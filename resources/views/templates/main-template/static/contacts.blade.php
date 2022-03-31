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
                        <a href="#" class="path__link">{{$page->title}}</a>
                    </div>
                </div>
                <div class="cols-wrap">
                    <!--col-content-->
                    <div class="col-content">
                        <div class="col-content">

                            <div class="contacts-wrap desc-block-wrap">
                                <h2 class="section-title section-title--white h2">{{$page->title}}</h2>

                                <div class="contacts desc-block">
                                    <div class="contacts__content desc-block__content">
                                        <ul class="contacts__list">
                                            @if($globalCompany->address)
                                            <li class="contact">

                                                <img src="{{asset('img/icon/c-point-icon.svg')}}" alt=""
                                                     class="contact__icon contact__icon--point">
                                                <p class="contact__info">
                                                    <span class="contact__title">Адрес:</span>
                                                    <span class="contact__desc">{{$globalCompany->address}}</span>
                                                </p>
                                            </li>
                                            @endif
                                            @if($globalCompany->phone)
                                            <li class="contact">
                                                <img src="{{asset('img/icon/c-phone-icon.svg')}}" alt=""
                                                     class="contact__icon contact__icon--phone">
                                                <p class="contact__info">
                                                    <span class="contact__title">Телефон: </span>
                                                    <span class="contact__desc">{{$globalCompany->phone}}</span>
                                                </p>
                                            </li>
                                            @endif
                                            @if($globalCompany->email)
                                            <li class="contact">
                                                <img src="{{asset('img/icon/c-mail-icon.svg')}}" alt="" class="contact__icon">
                                                <p class="contact__info">
                                                    <span class="contact__title">Электронная почта:</span>
                                                    <span class="contact__desc">{{$globalCompany->email}}</span>
                                                </p>
                                            </li>
                                            @endif

                                        </ul>
                                    </div>

                                    <div class=" contacts__preview desc-block__preview">
                                        @if($globalCompany->data_coord)
                                        <div id="yandexmap" class="contact__map" data-coord="{{$globalCompany->data_coord}}" style="">
                                        </div>
                                        @endif
                                        <div class="map">
                                            <img src="{{asset('img/image/map.jpg')}}" alt="" class="map__img">
                                            <img src="{{asset('img/icon/map-point.svg')}}" alt="" class="map__point">
                                        </div>

                                    </div>
                                </div>
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
