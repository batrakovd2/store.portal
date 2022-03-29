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
        <div class="row">
            <div class="col-sm-6">
                <a href="#" type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#modal-addImage">Добовить изображение</a>
            </div>
            <div class="col-sm-6">
                <a href="#" type="button" class="btn btn-block btn-success gallery-choose-btn" data-toggle="modal" >Выбрать из галереи</a>
            </div>
        </div>
        <div class="row img-wrapper mt-3 sortable-form-img" >
            @if(!empty($news->photo))
                @foreach($news->photo as $ph)

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

<div class="edit-form">
    @include('admin.layouts.modal-choose-file')
    @include('admin.layouts.modal-gallery')
</div>

