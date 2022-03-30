@extends('admin.layouts.app')

@section('content')

    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Настройки</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <div class="content">
            <div class="container-fluid">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 col-sm-12">
                            <div class="card card-primary card-tabs">
                                <div class="card-header p-0 pt-1">
                                    <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="custom-tabs-two-home-tab" data-toggle="pill" href="#custom-tabs-two-home" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">Главные</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="custom-tabs-two-profile-tab" data-toggle="pill" href="#custom-tabs-two-profile" role="tab" aria-controls="custom-tabs-two-profile" aria-selected="false">Меню</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="custom-tabs-two-messages-tab" data-toggle="pill" href="#custom-tabs-two-messages" role="tab" aria-controls="custom-tabs-two-messages" aria-selected="false">Слайдер</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="custom-tabs-two-settings-tab" data-toggle="pill" href="#custom-tabs-two-settings" role="tab" aria-controls="custom-tabs-two-settings" aria-selected="false">Шаблоны</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <form action="#" id="formSettings">
                                        <div class="tab-content" id="custom-tabs-two-tabContent">
                                                <div class="tab-pane fade show active" id="custom-tabs-two-home" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">
                                                    <h3>Блоки на главной странице  общие настройки</h3>
                                                    <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-6"><label for="popular_categories">Отображение блока популярных категорий</label></div>
                                                                <div class="col-6"><input type="checkbox" name="popular_categories" @if($settings['popular_categories']['value']) checked @endif data-bootstrap-switch="" data-off-color="danger" data-on-color="success"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-6"><label for="sales_products">Отображение блока товаров с акциями</label></div>
                                                                <div class="col-6"><input type="checkbox" name="sales_products" @if($settings['sales_products']['value']) checked @endif data-bootstrap-switch="" data-off-color="danger" data-on-color="success"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-6"><label for="faq_block">Отображение блока вопрос/ответ</label></div>
                                                                <div class="col-6"><input type="checkbox" name="faq_block" @if($settings['faq_block']['value']) checked @endif data-bootstrap-switch="" data-off-color="danger" data-on-color="success"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-6"><label for="review_block">Отображение блока отзывов</label></div>
                                                                <div class="col-6"><input type="checkbox" name="review_block" @if($settings['review_block']['value']) checked @endif data-bootstrap-switch="" data-off-color="danger" data-on-color="success"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <div class="row ">
                                                                <div class="col-6"><label for="background">Фоновое изображение</label></div>
                                                                <div class="col-6 ">
                                                                    <div class="col-sm-12">
                                                                        <a href="#" type="button" data-toggle="modal" data-target=".settings-modal #modal-addImage" class="btn btn-block btn-primary">Добовить изображение</a>
                                                                    </div>
                                                                    <input type="hidden" class="background" name="background" @if($settings['background']['value']) value="{{$settings['background']['value']}}" @endif >
                                                                </div>
                                                                <div class="background-setting mt-4">
                                                                    <img src="{{config("app.img_portal")."/".$settings['background']['value']}}" alt="" width="100%">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="custom-tabs-two-profile" role="tabpanel" aria-labelledby="custom-tabs-two-profile-tab">
                                                    <h3>Пункты главного меню</h3>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-3"><label for="banner_available">О компании</label></div>
                                                            <div class="col-3"><input type="checkbox" name="menu_about" @if($settings['menu_about']['value']) checked @endif data-bootstrap-switch="" data-off-color="danger" data-on-color="success"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-3"><label for="banner_available">Контакты</label></div>
                                                            <div class="col-3"><input type="checkbox" name="menu_contants" @if($settings['menu_contants']['value']) checked @endif data-bootstrap-switch="" data-off-color="danger" data-on-color="success"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-3"><label for="banner_available">Каталог</label></div>
                                                            <div class="col-3"><input type="checkbox" name="menu_catalog" @if($settings['menu_catalog']['value']) checked @endif data-bootstrap-switch="" data-off-color="danger" data-on-color="success"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-3"><label for="banner_available">Новости</label></div>
                                                            <div class="col-3"><input type="checkbox" name="menu_news" @if($settings['menu_news']['value']) checked @endif data-bootstrap-switch="" data-off-color="danger" data-on-color="success"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-3"><label for="banner_available">Акции</label></div>
                                                            <div class="col-3"><input type="checkbox" name="menu_sales" @if($settings['menu_sales']['value']) checked @endif data-bootstrap-switch="" data-off-color="danger" data-on-color="success"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-3"><label for="banner_available">Отзывы</label></div>
                                                            <div class="col-3"><input type="checkbox" name="menu_reviews" @if($settings['menu_reviews']['value']) checked @endif data-bootstrap-switch="" data-off-color="danger" data-on-color="success"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="custom-tabs-two-messages" role="tabpanel" aria-labelledby="custom-tabs-two-messages-tab">
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-3"><label for="banner_available">Слайдер на главной странице</label></div>
                                                            <div class="col-3"><input type="checkbox" name="banner_available" checked="" data-bootstrap-switch="" data-off-color="danger" data-on-color="success"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputPhoto">Фото</label>
                                                        <div class="row">
                                                            <div class="col-sm-3">
                                                                <a href="#" type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#modal-addImage">Добовить изображение</a>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <a href="#" type="button" class="btn btn-block btn-success gallery-choose-btn" data-toggle="modal" >Выбрать из галереи</a>
                                                            </div>
                                                        </div>
                                                        <div class="row img-wrapper mt-3 sortable-form-img" >
                                                            @if(!empty($settings["banner_items"]["value"] && is_array($settings["banner_items"]["value"])))
                                                                @foreach($settings["banner_items"]["value"] as $ph)

                                                                    <div class="col-sm-3  position-relative mt-2">
                                                                        <img src="{{$ph}}" alt="" width="100%">
                                                                        <button type="button" data-path="{{$ph}}" class="close position-absolute "><span aria-hidden="true">×</span></button>
                                                                        <input type="hidden" class="form-control inputPhoto" name="photo[]" data-val="{{$ph}}" value="{{$ph}}">
                                                                    </div>
                                                                @endforeach
                                                            @endif
                                                        </div>
                                                        <br>

                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="custom-tabs-two-settings" role="tabpanel" aria-labelledby="custom-tabs-two-settings-tab">
                                                Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis tempus turpis ac, ornare sodales tellus. Mauris eget blandit dolor. Quisque tincidunt venenatis vulputate. Morbi euismod molestie tristique. Vestibulum consectetur dolor a vestibulum pharetra. Donec interdum placerat urna nec pharetra. Etiam eget dapibus orci, eget aliquet urna. Nunc at consequat diam. Nunc et felis ut nisl commodo dignissim. In hac habitasse platea dictumst. Praesent imperdiet accumsan ex sit amet facilisis.
                                            </div>
                                        </div>
                                        <a class="btn btn-primary" href="#" id="saveSettings">Сохранить</a>
                                    </form>
                                </div>

                                <div class="edit-form">
                                    @include('admin.layouts.modal-choose-file')
                                    @include('admin.layouts.modal-gallery')
                                </div>
                                <div class="settings-modal">
                                    @include('admin.layouts.modal-choose-file')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>



@endsection
