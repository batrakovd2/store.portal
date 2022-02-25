<form action="#" id="companyForm">
    <input id="companyid" type="hidden" name="companyid" @if(!empty($company)) value="{{$company->id}}" @else value="0"  @endif>
    <div class="form-group">
        <label for="inputTitle">Название</label>
        <input type="text" id="inputTitle" name="title" class="form-control" placeholder="Название рганизации" required @if(!empty($company)) value="{{$company->title}}" @endif >
    </div>
    <div class="form-group">
        <label for="inputDomain">Домен</label>
        <input type="text" id="inputDomain" name="domain" class="form-control" placeholder="Домен" @if(!empty($company)) value="{{$company->domain}}" @endif >
    </div>
    <div class="form-group">
        <label for="inputPhone">Телефон</label>
        <input type="text" id="inputPhone" name="phone" class="form-control" placeholder="Телефон"  @if(!empty($company)) value="{{$company->phone}}" @endif >
    </div>
    <div class="form-group">
        <label for="inputEmail">Email</label>
        <input type="text" id="inputEmail" name="email" class="form-control" placeholder="Email"  @if(!empty($company->email)) value="{{$company->email}}" @endif >
    </div>

    <div class="form-group">
        <label for="inputStatus">Город</label>
        <div id="city_array" class="form-group">
            @if(!empty($cities))
                @forelse($cities as $ct)
                    <a href="javascript:void(0);" class="btn btn-info btn-sm mr-2 chips-btn" data-id="{{$ct->id}}">{{$ct->title}}</a>
                @empty
                @endforelse
            @endif

        </div>
        <input id="city-id" name="city_id" type="hidden" @if(!empty($cities)) value="{{$ct->id}}" @else value="0"  @endif>
        <select id="city-list"  class="form-control custom-select" @if(!empty($cities)) disabled  @endif>
            <option value="0">Нет</option>
            @if(!empty($regions))
                @forelse($regions as $rb)
                    <option value="{{$rb->id}}">{{$rb->title}}</option>
                @empty
                @endforelse
            @endif

        </select>
    </div>
    <div class="form-group">
        <label for="inputAdress">Адрес</label>
        <input type="text" id="inputAdress" name="address" class="form-control" placeholder="Адрес"  @if(!empty($company->address)) value="{{$company->address}}" @endif >
    </div>
    <div class="form-group">
        <label for="inputWorkTime">Время работы</label>
        <input type="text" id="inputWorkTime" name="work_time" class="form-control" placeholder="Время работы"  @if(!empty($company->work_time)) value="{{$company->work_time}}" @endif >
    </div>
    <div class="form-group">
        <label for="inputDataCoord">Координаты для карты</label>
        <input type="text" id="inputDataCoord" name="data_coord" class="form-control" placeholder="55.75322, 37.622513"  @if(!empty($company->data_coord)) value="{{$company->data_coord}}" @endif >
    </div>
</form>




