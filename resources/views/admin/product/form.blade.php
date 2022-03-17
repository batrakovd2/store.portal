<form action="#" id="productForm" name="productForm">
<input id="productid" name="productid" type="hidden" @if(!empty($product)) value="{{$product['id']}}" @else value="0"  @endif>

<div class="form-group">
    <label for="inputName">Название товара</label>

    <input type="text" id="inputName" name="title" class="form-control" placeholder="Название товара" required
           @if(!empty($product)) value="{{$product->title}}"@endif
    >
</div>
<div class="form-group">
    <label for="inputSlug">Ссылка</label>
    <input type="text" class="form-control" id="inputSlug" name="slug" value="{{!empty($product) ? $product->slug : 'Генерируется автоматически'}}" disabled>
</div>
<div class="form-group">
    <label for="inputStatus">Рубрика</label>
    <div id="rubric_array" class="form-group">
        @if(!empty($rubric))
            @foreach($rubric as $prb)
                <div class="btn btn-info btn-sm mr-2 chips-btn" data-id="{{$prb->id}}">{{$prb->title}}</div>
            @endforeach
        @endif

    </div>
    <input id="rubric-id" name="rubric_id" type="hidden" @if(!empty($rubric)) value="{{$prb->id}}" @else value="0"  @endif>
    <select id="rubric-list" class="form-control custom-select" @if(!empty($rubric)) disabled  @endif>
        <option value="0">Нет</option>
        @if(!empty($rubricChild) && is_array($rubricChild))
            @foreach($rubricChild as $rb)
                <option value="{{$rb->id}}">{{$rb->title}}</option>
            @endforeach
        @endif

    </select>
</div>
<div class="form-group">
    <label for="inputStatus">Категория</label>
    <div id="category_array" class="form-group">
        @if(!empty($parentCategory))
            @forelse($parentCategory as $pcat)
                <a href="javascript:void(0)" class="btn btn-info btn-sm mr-2 chips-btn" data-id="{{$pcat['id']}}">{{$pcat['title']}}</a>
            @empty
            @endforelse
        @endif
    </div>
    <input id="category-id" name="category_id" type="hidden" @if(!empty($parentCategory)) value="{{$pcat['id']}}" @else value="0"  @endif>
    <select id="category-list" class="form-control custom-select" @if(!empty($parentCategory)) disabled  @endif>
        <option value="0">Нет</option>
        @if(!empty($categories))
            @foreach($categories as $cat)
                <option value="{{$cat->id}}">{{$cat->title}}</option>
            @endforeach
        @endif
    </select>
</div>
<div class="form-group">
    <label for="inputUpText">Краткое описание</label>
    <input type="text" class="form-control" id="inputUpText" name="up_text" placeholder="Краткое описание товара" value="@if(!empty($product) ){{$product->up_text}}@endif" >
</div>
<div class="form-group">
    <label for="inputDownText">Полное описание</label>
    <input type="text" class="form-control" id="inputDownText" name="down_text"  placeholder="Описание товара" value="@if(!empty($product) ){{$product->down_text}}@endif" >
</div>
<div class="form-group">
    <label>Цена</label>
    <div class="row mt-3">
        <div class="col-5 col-sm-3">
            <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link @if(!empty($product->advanced_price->type) && $product->advanced_price->type == 1 || empty($product->advanced_price->type)) {{'active'}} @endif price-tab" id="vert-tabs-price-tab" data-type="1" data-toggle="pill" href="#vert-tabs-price" role="tab" aria-controls="vert-tabs-home" aria-selected="false">Точная</a>
                <a class="nav-link @if(!empty($product->advanced_price->type) && $product->advanced_price->type == 2) {{'active'}} @endif  price-tab" id="vert-tabs-price-interval-tab" data-type="2" data-toggle="pill" href="#vert-tabs-price-interval" role="tab" aria-controls="vert-tabs-profile" aria-selected="true">От - до</a>
                <a class="nav-link @if(!empty($product->advanced_price->type) && $product->advanced_price->type == 3) {{'active'}} @endif  price-tab" id="vert-tabs-price-sale-tab" data-type="3" data-toggle="pill" href="#vert-tabs-price-sale" role="tab" aria-controls="vert-tabs-messages" aria-selected="false">Скидка</a>
            </div>
        </div>
        <div class="col-7 col-sm-9">
            <div class="tab-content" id="vert-tabs-tabContent">
                <input type="hidden" id="priceType" class="form-control d-none price-type-input" name="type_price" value="@if(!empty($product->advanced_price->type)){{$product->advanced_price->type}}@else{{'1'}}@endif">
                <div class="tab-pane text-left fade @if(!empty($product->advanced_price->type) && $product->advanced_price->type == 1 || empty($product->advanced_price->type)){{'show active'}}@endif" id="vert-tabs-price" role="tabpanel" aria-labelledby="vert-tabs-price-tab">
                    <label>Точная цена</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="price" placeholder="1000" value="@if(!empty($product->advanced_price->type) && $product->advanced_price->type == 1 || empty($product->advanced_price->type) && !empty($product->price) ){{$product->price}}@endif">
                        <div class="input-group-append">
                            <span class="input-group-text">руб.</span>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade @if(!empty($product->advanced_price->type) && $product->advanced_price->type == 2){{'show active'}}@endif " id="vert-tabs-price-interval" role="tabpanel" aria-labelledby="vert-tabs-price-interval-tab">
                    <label>Цена от</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="price" placeholder="800" value="@if(!empty($product->price) && !empty($product->advanced_price->type) && $product->advanced_price->type == 2){{$product->price}}@endif">
                        <div class="input-group-append">
                            <span class="input-group-text">руб.</span>
                        </div>
                    </div>
                    <label>Цена до</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="old_price" placeholder="1000" value="@if(!empty($product->advanced_price->old_price) && !empty($product->advanced_price->type) && $product->advanced_price->type == 2 ){{$product->advanced_price->old_price}}@endif">
                        <div class="input-group-append">
                            <span class="input-group-text">руб.</span>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade @if(!empty($product->advanced_price->type) && $product->advanced_price->type == 3){{'show active'}}@endif" id="vert-tabs-price-sale" role="tabpanel" aria-labelledby="vert-tabs-price-sale-tab">
                    <label>Старая цена</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="old_price" placeholder="1000" value="@if(!empty($product->advanced_price->old_price) && !empty($product->advanced_price->type) && $product->advanced_price->type == 3 ){{$product->advanced_price->old_price}}@endif">
                        <div class="input-group-append">
                            <span class="input-group-text">руб.</span>
                        </div>
                    </div>
                    <label>Новая цена</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="price" placeholder="900" value="@if(!empty($product->price) && !empty($product->advanced_price->type) && $product->advanced_price->type == 3 ){{$product->price}}@endif">
                        <div class="input-group-append">
                            <span class="input-group-text">руб.</span>
                        </div>
                    </div>
                    <label>Скидка %</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="10" value="">
                        <div class="input-group-append">
                            <span class="input-group-text">%</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="form-group">
    <label for="inputStatus">Единицы</label>
    <select id="units" name="units" class="form-control" >
        <option value="0">Нет</option>
        @if(!empty($units))
            @forelse($units as $un)
                <option value="{{$un->id}}">{{$un->title}}</option>
            @empty
            @endforelse
        @endif
    </select>
</div>
<div class="form-group">
    <label for="inputStatus">Характеристики</label>
    <div class="row container fields-wrapper">
        @if(!empty($fields))
            @foreach($fields as $key=>$fd)
                    <label for="input-fields">{{$fd->title}}</label>
                    <input type="text"  data-slug="{{$fd->id}}" value="@if(!empty($fd->value)){{$fd->value}}@endif" class="form-control input-fields">
            @endforeach
        @else
            <p>Характеристик для выбранной рубрики не имеется</p>
        @endif
    </div>
</div>

<div class="form-group">
    <label for="inputPhoto">Фото</label>
    <div class="row">
        <div class="col-sm-6">
            <a href="#" type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#modal-addImage">Добовить изображение</a>
        </div>
        <div class="col-sm-6">
            <a href="#" type="button" class="btn btn-block btn-success gallery-choose-btn" data-toggle="modal" >Выбрать из галереи</a>
        </div>
    </div>
    <div class="row img-wrapper mt-3 sortable-form-img" >
        @if(!empty($product->photo))
            @foreach($product->photo as $ph)

                <div class="col-sm-3  position-relative mt-2">
                    @if($loop->first)
                        <div class="ribbon-wrapper">
                            <div class="ribbon bg-primary">
                                Основное
                            </div>
                        </div>
                    @endif
                    <img src="{{$ph}}" alt="" width="100%">
                    <button type="button" data-path="{{$ph}}" class="close position-absolute "><span aria-hidden="true">×</span></button>
                    <input type="hidden" class="form-control inputPhoto" name="photo[]" data-val="{{$ph}}" value="{{$ph}}">
                </div>
            @endforeach
        @endif
    </div>
    <br>

</div>
<div class="form-group">
    <label for="inputStock">Наличие</label>
    <input type="text" class="form-control" id="inputStock" name="stock" placeholder="Наличие" value="@if(!empty($product)){{$product->stock}}@endif" >
</div>
<div class="form-group">
    <label for="inputMetaTitle">Мета заголовок</label>
    <input type="text" class="form-control" id="inputMetaTitle" name="meta_name" placeholder="Заголовок страницы товара" value="@if(!empty($product) ){{$product->meta_name}}@endif" >
</div>
<div class="form-group">
    <label for="inputMetaDescription">Мета Описание</label>
    <input type="text" class="form-control" id="inputMetaDescription" name="meta_description" placeholder="Описание страницы товара" value="@if(!empty($product) ){{$product->meta_description}}@endif" >
</div>
<div class="form-group">
    <label for="inputMetaKeywords">Мета ключевые слова</label>
    <input type="text" class="form-control" id="inputMetaKeywords" name="meta_keywords" placeholder="Ключевые слова для страницы товара" value="@if(!empty($product) ){{$product->meta_keywords}}@endif" >
</div>
</form>

<div class="edit-form">
    @include('admin.layouts.modal-choose-file')
    @include('admin.layouts.modal-gallery')
</div>

