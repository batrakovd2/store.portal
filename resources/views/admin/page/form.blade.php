<form action="#" id="pageForm">
    <input id="pageid" name="pageid" type="hidden" @if(!empty($page)) value="{{$page['id']}}" @else value="0" @endif>

    <div class="form-group">
        <label for="inputName">Название страницы</label>

        <input type="text" id="inputName" name="title" @if(!empty($page))data-title="{{$page->title}}"@endif class="form-control" placeholder="Название категории" required
               @if(!empty($page)) value="{{$page->title}}" @endif
        >
    </div>
    <div class="form-group">
        <label for="inputSlug">Ссылка</label>
        <input type="text" class="form-control" id="inputSlug" value="{{!empty($page) ? $page->slug : 'Генерируется автоматически'}}" disabled>
    </div>
    <div class="form-group">
        <label for="inputDescription">Описание</label>
        <textarea id="summernote" name="description" class="form-control" placeholder="Описание"   >
        @if(!empty($page->description)) {{$page->description}} @endif
    </textarea>
    </div>
    <div class="form-group">
        <label for="inputMetaTitle">Мета заголовок</label>
        <input type="text" class="form-control" id="inputMetaTitle" name="meta_title" placeholder="Мета заголовок"
               value="@if(!empty($page)){{$page->meta_title}}@endif">
    </div>
    <div class="form-group">
        <label for="inputMetaDescription">Мета Описание</label>
        <input type="text" class="form-control" id="inputMetaDescription" name="meta_description"
               placeholder="Мета описание" value="@if(!empty($page)){{$page->meta_description}}@endif">
    </div>
    <div class="form-group">
        <label for="inputMetaKeywords">Мета ключевые слова</label>
        <input type="text" class="form-control" id="inputMetaKeywords" name="meta_keywords"
               placeholder="Мета ключи страницы" value="@if(!empty($page)){{$page->meta_keywords}}@endif">
    </div>
</form>

