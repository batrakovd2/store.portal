<form action="#" id="categoryForm">
    <input id="categoryid" name="categoryid" type="hidden" @if(!empty($category)) value="{{$category['id']}}" @else value="0" @endif>

    <div class="form-group">
        <label for="inputName">Название категории</label>

        <input type="text" id="inputName" name="title" @if(!empty($category))data-title="{{$category->title}}"@endif class="form-control" placeholder="Название категории" required
               @if(!empty($category)) value="{{$category->title}}" @endif
        >
    </div>
    {{--@dd($categories)--}}
    <div class="form-group">
        <label for="inputSlug">Ссылка</label>
        <input type="text" class="form-control" id="inputSlug" value="{{!empty($category) ? $category->slug : 'Генерируется автоматически'}}" disabled>
    </div>
    <div class="form-group">
        <label for="inputStatus">Родительская категория</label>
        <div id="category_array" class="form-group">
            @if(!empty($parentCategory))
                @forelse($parentCategory as $pcat)
                    <a href="javascript:void(0)" class="btn btn-info btn-sm mr-2 chips-btn"
                       data-id="{{$pcat['id']}}">{{$pcat['title']}}</a>
                @empty
                @endforelse
            @endif
        </div>
        <input id="category-id" name="parent_id" type="hidden" @if(!empty($parentCategory)) value="{{$pcat['id']}}"
               @else value="0" @endif>
        <select id="category-list" class="form-control custom-select" @if(!empty($parentCategory)) disabled @endif>
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
        <input type="text" class="form-control" id="inputDescription" placeholder="Описание категории" name="description"
               value="@if(!empty($category)){{$category->description}}@endif">
    </div>
    <div class="form-group">
        <label for="inputPhoto">Фото</label>
        <div class="row">
            <div class="col-sm-6">
                <a href="#" type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#modal-addImage">Добовить изображение</a>
            </div>
            <div class="col-sm-6">
                <a href="#" type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#modal-gallery">Выбрать из галереи</a>
            </div>
        </div>
        <div class="row img-wrapper mt-3">
            <div class="col-sm-3">
                <img src="" alt="">
            </div>
        </div>
        <div class="inputPhotoWrap"></div>
        @if(!empty($category->photo))
            <input type="hidden" class="form-control" id="inputPhoto" name="photo" value="@if(!empty($category)){{$category->photo}}@endif">
        @endif
        <br>

    </div>
    <div class="form-group">
        <label for="inputMetaTitle">Мета заголовок</label>
        <input type="text" class="form-control" id="inputMetaTitle" name="meta_name" placeholder="Мета заголовок категории"
               value="@if(!empty($category)){{$category->meta_name}}@endif">
    </div>
    <div class="form-group">
        <label for="inputMetaDescription">Мета Описание</label>
        <input type="text" class="form-control" id="inputMetaDescription" name="meta_description"
               placeholder="Мета описание категории" value="@if(!empty($category)){{$category->meta_description}}@endif">
    </div>
    <div class="form-group">
        <label for="inputMetaKeywords">Мета ключевые слова</label>
        <input type="text" class="form-control" id="inputMetaKeywords" name="meta_keywords"
               placeholder="Мета ключи страницы категории" value="@if(!empty($category)){{$category->meta_keywords}}@endif">
    </div>
</form>

<div class="edit-form">
    @include('admin.layouts.modal-choose-file')
</div>


