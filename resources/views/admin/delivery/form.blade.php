
<form action="#" id="formDelivery">
    <input id="deliveryid" name="deliveryid" type="hidden" @if(!empty($delivery)) value="{{$delivery->id}}" @else value="0"  @endif>
    <div class="form-group">
        <label for="status">Вкл/выкл</label>
        <br>
        <input type="checkbox" name="status" @if(!empty($delivery->status)) checked @endif  data-bootstrap-switch data-off-color="danger" data-on-color="success">
    </div>
    <div class="form-group">
        <label >Вид доставки</label>
        <select class="custom-select rounded-0" name="title">
            @if(!empty($portaldelivery) && !empty($delivery))
                @foreach($portaldelivery as $dlv)
                    @if(($dlv->title == $delivery->title))
                        <option data-id="{{$dlv->id}}">{{$dlv->title}}</option>
                    @endif
                @endforeach
                @foreach($portaldelivery as $dlv)
                    @if(($dlv->title != $delivery->title))
                        <option data-id="{{$dlv->id}}">{{$dlv->title}}</option>
                    @endif
                @endforeach
            @endif
            @if(!empty($portaldelivery) && empty($delivery))
                @foreach($portaldelivery as $dlv)
                        <option data-id="{{$dlv->id}}">{{$dlv->title}}</option>
                @endforeach
            @endif
        </select>
    </div>
    <div class="form-group delivery-type-checked">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="delivery_type" value="1" @if(!empty($delivery) && !empty($delivery->delivery_type == 1)) checked @endif>
            <label class="form-check-label">Бесплатно</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="delivery_type" value="2" @if(!empty($delivery) && !empty($delivery->delivery_type == 2)) checked @endif>
            <label class="form-check-label">Договорная</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="delivery_type" value="3" @if(!empty($delivery) && !empty($delivery->delivery_type == 3)) checked @endif>
            <label class="form-check-label">Платно</label>
        </div>
    </div>
    <div class="form-group delivery-price" style="@if(!empty($delivery)){{$delivery->delivery_type == 3 ? '' : 'display: none;'}} @else display: none; @endif">
        <div class="row">
            <div class="col-6">
                <label for="inputPriceinfo">Стоимость доставки</label>
                <input id="inputPriceinfo" name="price" class="form-control" placeholder="50" @if(!empty($delivery) && !empty($delivery->price_info) && !empty($delivery->price_info->price)) value="{{$delivery->price_info->price}}" @endif />
            </div>
            <div class="col-6">
                <label for="inputPriceinfo">Бесплатно при заказе от</label>
                <input id="inputPriceinfo" name="price_free" class="form-control" placeholder="3000" @if(!empty($delivery) && !empty($delivery->price_info) && !empty($delivery->price_info->price_free)) value="{{$delivery->price_info->price_free}}" @endif />
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="inputDescription">Детали доставки</label>
        <textarea id="inputDescription" name="description" class="form-control" placeholder="Опишите условия доставки" >@if(!empty($delivery)){{$delivery->description}}@endif</textarea>
    </div>
</form>
