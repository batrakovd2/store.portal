<form action="#" id="reviewForm">
    <input id="reviewid" name="reviewid" type="hidden" @if(!empty($review)) value="{{$review->id}}" @else value="0" @endif>

    <div class="form-group">
        <label for="status">Опубликовано/на модерации</label>
        <br>
        <input type="checkbox" name="status" @if($review->status && $review->status == 1) checked @endif data-bootstrap-switch="" data-off-color="danger" data-on-color="success">
    </div>

    <div class="form-group">
        <label for="inputName">Имя</label>
        <input type="text" id="inputName" name="name" @if(!empty($review))data-title="{{$review->name}}"
               @endif class="form-control" required @if(!empty($review)) value="{{$review->name}}" @endif >
    </div>

    <div class="form-group">
        <label for="inputDescription">Описание</label>
        <textarea id="summernote" name="description" class="form-control" placeholder="Описание">
            @if(!empty($review->description)){{$review->description}}@endif
        </textarea>
    </div>

    <div class="form-group">
        <label for="status">Товар был доставлен в срок?</label>
        <br>
        <input type="checkbox" name="delivery" @if($review->delivery && $review->delivery == 1) checked @endif data-bootstrap-switch="" data-off-color="danger" data-on-color="success">
    </div>

    <div class="form-group">
        <label for="status">Цена и наличие были указаны правильно?</label>
        <br>
        <input type="checkbox" name="price" @if($review->price && $review->price == 1) checked @endif data-bootstrap-switch="" data-off-color="danger" data-on-color="success">
    </div>

    <div class="form-group">
        <label for="status">Качество товара</label>
        <br>
        <div class="btn-group btn-group-toggle" data-toggle="buttons">
            @for($i = 1; $i <= 5; $i++)
            <label class="btn btn-secondary">
                <input type="radio" name="quality[]" id="option_a{{$i}}" @if($review->quality == $i) checked @endif autocomplete="off" value="{{$i}}" >{{$i}}
            </label>
            @endfor
        </div>
    </div>

    <div class="form-group">
        <label for="status">Оценка компании</label>
        <br>
        <div class="btn-group btn-group-toggle" data-toggle="buttons">
            @for($i = 1; $i <= 5; $i++)
                <label class="btn btn-secondary">
                    <input type="radio" name="rating[]" id="option_a{{$i}}" @if($review->rating == $i) checked @endif autocomplete="off" value="{{$i}}">{{$i}}
                </label>
            @endfor
        </div>
    </div>


</form>

