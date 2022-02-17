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
        @if(!empty($rubricChild))
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
    <input type="text" class="form-control" id="inputUpText" name="up_text" placeholder="Краткое описание товара" value="@if(!empty($product) )  {{$product->up_text}} @endif" >
</div>
<div class="form-group">
    <label for="inputDownText">Полное описание</label>
    <input type="text" class="form-control" id="inputDownText" name="down_text"  placeholder="Описание товара" value="@if(!empty($product) )  {{$product->down_text}} @endif" >
</div>
<div class="form-group">
    <label for="inputPrice">Цена</label>
    <input type="text" class="form-control" id="inputPrice" name="price" placeholder="1000" value="@if(!empty($product) )  {{$product->price}} @endif" >
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
    <div class="row container">
        @if(!empty($fields))
            @foreach($fields as $fd)
                <div class="col-md-4">
                    <div class="form-check">
                        <input class="form-check-input field-checkbox" name="fields[]" type="checkbox" id="flexCheckDefault_{{$fd->id}}" value="{{$fd->id}}" @if(!empty($checkedFields) && in_array($fd->id, $checkedFields)) checked @endif>
                        <label class="form-check-label" for="flexCheckDefault_{{$fd->id}}">
                            {{$fd->title}}
                        </label>
                    </div>
                </div>
            @endforeach
        @endif

    </div>
</div>

<div class="form-group">
    <label for="inputPhoto">Фото</label>
    <input type="file" class="form-control" id="inputPhoto" name="photo" value="@if(!empty($product) )  {{$product->photo}} @endif" >
</div>
<div class="form-group">
    <label for="inputPriority">Приоритет</label>
    <input type="text" class="form-control" id="inputPriority" name="priority" placeholder="от 0 до 5" value="@if(!empty($product) )  {{$product->priority}} @endif" >
</div>
<div class="form-group">
    <label for="inputStock">Наличие</label>
    <input type="text" class="form-control" id="inputStock" name="stock" placeholder="Наличие" value="@if(!empty($product)){{$product->stock}}@endif" >
</div>
<div class="form-group">
    <label for="inputMetaTitle">Мета заголовок</label>
    <input type="text" class="form-control" id="inputMetaTitle" name="meta_name" placeholder="Заголовок страницы товара" value="@if(!empty($product) )  {{$product->meta_name}} @endif" >
</div>
<div class="form-group">
    <label for="inputMetaDescription">Мета Описание</label>
    <input type="text" class="form-control" id="inputMetaDescription" name="meta_description" placeholder="Описание страницы товара" value="@if(!empty($product) )  {{$product->meta_description}} @endif" >
</div>
<div class="form-group">
    <label for="inputMetaKeywords">Мета ключевые слова</label>
    <input type="text" class="form-control" id="inputMetaKeywords" name="meta_keywords" placeholder="Ключевые слова для страницы товара" value="@if(!empty($product) )  {{$product->meta_keywords}} @endif" >
</div>
</form>

