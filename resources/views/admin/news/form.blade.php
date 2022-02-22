<form action="#" id="newsForm">
    <input id="newsid" name="newsid" type="hidden" @if(!empty($news)) value="{{$news->id}}" @else value="0" @endif>

    <div class="form-group">
        <label for="status">Вкл/выкл</label>
        <br>
        <input type="checkbox" name="status" checked="" data-bootstrap-switch="" data-off-color="danger" data-on-color="success">
    </div>

    <div class="form-group">
        <label for="inputName">Название новости</label>

        <input type="text" id="inputName" name="title" @if(!empty($news))data-title="{{$news->title}}"
               @endif class="form-control" placeholder="Название категории" required
               @if(!empty($news)) value="{{$news->title}}" @endif
        >
    </div>
    <div class="form-group">
        <label for="inputSlug">Ссылка</label>
        <input type="text" class="form-control" value="{{!empty($news) ? $news->slug : 'Генерируется автоматически'}}" disabled>
        <input type="hidden" class="form-control" name="slug" id="slug" @if(!empty($news))value="{{$news->slug}}"@endif >
    </div>
    <div class="form-group">
        <label for="inputDescription">Описание</label>
        <textarea id="summernote" name="description" class="form-control" placeholder="Описание">
        @if(!empty($news->description)) {{$news->description}} @endif
    </textarea>
    </div>
    <div class="form-group">
        <label for="inputPhoto">Фото</label>
        <input type="file" class="form-control" id="inputPhoto" name="photo"
               value="@if(!empty($news) ){{$news->photo}}@endif">
    </div>
    <div class="form-group">
        <label for="inputMetaTitle">Мета заголовок</label>
        <input type="text" class="form-control" id="inputMetaTitle" name="meta_title" placeholder="Мета заголовок"
               value="@if(!empty($news)){{$news->meta_name}}@endif">
    </div>
    <div class="form-group">
        <label for="inputMetaDescription">Мета Описание</label>
        <input type="text" class="form-control" id="inputMetaDescription" name="meta_description"
               placeholder="Мета описание" value="@if(!empty($news)){{$news->meta_description}}@endif">
    </div>
    <div class="form-group">
        <label for="inputMetaKeywords">Мета ключевые слова</label>
        <input type="text" class="form-control" id="inputMetaKeywords" name="meta_keywords"
               placeholder="Мета ключи страницы" value="@if(!empty($news)){{$news->meta_keywords}}@endif">
    </div>
</form>

