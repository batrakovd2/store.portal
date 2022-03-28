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
                        <a href="{{route('sales')}}" class="path__link">Акции и предложения</a>
                    </div>
                </div>
                <div class="cols-wrap">
                    <!--col-content-->
                    <div class="col-content">
                            @include('main-template.layouts.sales')

                            {!! $saleProducts->links('main-template.layouts.pagination') !!}
                    </div>
                    <!--col-content-->
                    @include('main-template.layouts.sidebar')
                </div>

            </div>
        </div>
    </div>
@endsection
