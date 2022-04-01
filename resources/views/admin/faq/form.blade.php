<form action="#" id="faqForm">
    <input id="faqid" name="faqid" type="hidden" @if(!empty($faq)) value="{{$faq->id}}" @else value="0" @endif>

    <div class="form-group">
        <label for="status">Вкл/выкл</label>
        <br>
        <input type="checkbox" name="status" checked="" data-bootstrap-switch="" data-off-color="danger" data-on-color="success">
    </div>

    <div class="form-group">
        <label for="inputQuestion">Вопрос</label>
        <textarea name="question" class="form-control" id="inputQuestion" cols="30" rows="5">@if(!empty($faq)){{$faq->question}}@endif</textarea>
    </div>
    <div class="form-group">
        <label for="inputAnswer">Ответ</label>
        <textarea name="answer" class="form-control" id="inputAnswer" cols="30" rows="5">@if(!empty($faq)) {{$faq->answer}} @endif</textarea>
    </div>
</form>


