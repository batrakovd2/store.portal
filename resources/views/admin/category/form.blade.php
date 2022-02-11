<input id="categoryid" type="hidden" @if(!empty($category)) value="{{$category['id']}}" @else value="0"  @endif>

<div class="form-group">
    <label for="inputName">Название категории</label>

    <input type="text" id="inputName" name="title" class="form-control" placeholder="Название рубрики" required
           @if(!empty($category)) value="{{$category->title}}" @endif
    >
</div>
{{--@dd($categories)--}}
<div class="form-group">
    <label for="inputSlug">Ссылка</label>
    <input type="text" class="form-control" id="inputSlug" name="slug" value="{{!empty($onceRubric) ? $onceRubric->slug : 'Генерируется автоматически'}}" disabled>
</div>
<div class="form-group">
    <label for="inputStatus">Родительская категория</label>
    <div id="category_array" class="form-group">
        @if(!empty($parentCategory))
            @forelse($parentCategory as $pcat)
                <a href="javascript:void(0)" class="btn btn-info btn-sm mr-2 chips-btn" data-id="{{$pcat['id']}}">{{$pcat['title']}}</a>
            @empty
            @endforelse
        @endif
    </div>
    <input id="category-id" type="hidden" @if(!empty($parentCategory)) value="{{$pcat['id']}}" @else value="0"  @endif>
    <select id="category-list" name="parent_id" class="form-control custom-select" @if(!empty($parentCategory)) disabled  @endif>
        <option value="0">Нет</option>
        @if(!empty($categories))
            @foreach($categories as $cat)
                <option value="{{$cat->id}}">{{$cat->title}}</option>
            @endforeach
        @endif

    </select>
</div>
<div class="form-group">
    <label for="inputDescription">Описание</label>
    <input type="text" class="form-control" id="inputDescription" name="description" value="@if(!empty($category) )  {{$category->description}} @endif " >
</div>
<div class="form-group">
    <label for="inputPhoto">Фото</label>
    <input type="file" class="form-control" id="inputPhoto" name="photo" value="@if(!empty($category) )  {{$category->photo}} @endif " >
</div>
<div class="form-group">
    <label for="inputMetaTitle">Мета заголовок</label>
    <input type="text" class="form-control" id="inputMetaTitle" name="meta_name" value="@if(!empty($category) )  {{$category->meta_name}} @endif " >
</div>
<div class="form-group">
    <label for="inputMetaDescription">Мета Описание</label>
    <input type="text" class="form-control" id="inputMetaDescription" name="meta_description" value="@if(!empty($category) )  {{$category->meta_description}} @endif " >
</div>
<div class="form-group">
    <label for="inputMetaKeywords">Мета ключевые слова</label>
    <input type="text" class="form-control" id="inputMetaKeywords" name="meta_keywords" value="@if(!empty($category) )  {{$category->meta_keywords}} @endif " >
</div>

