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
    <label for="inputPrice">Цена</label>
    <input type="text" class="form-control" id="inputPrice" name="price" placeholder="1000" value="@if(!empty($product) ){{$product->price}}@endif" >
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

