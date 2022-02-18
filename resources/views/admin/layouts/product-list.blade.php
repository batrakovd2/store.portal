@if(!empty($products))
<div class="card-primary card card-item-list">
    <div class="card-header">
        <div class="card-title">Список товаров</div>
    </div>
    <div class="card-body p-0">
        <table class="table">
            <thead>
            <tr>
                <th>Название</th>
                <th style="width: 40px">Редактировать</th>
            </tr>
            </thead>
            <tbody>
                @foreach($products as $key=>$prod)
                    <tr>
                        <td>{{$prod->title}}</td>
                        <td>
                            <a href="#" class="btn btn-secondary btn-sm edit float-right ml-2 remove-product-btn" data-id="{{$prod->id}}" title="Edit">
                                <i class="fas fa-trash"></i>
                            </a>
                            <a href="{{route('admin.product.edit', $prod)}}" class="btn btn-secondary btn-sm edit float-right ml-2" title="Edit">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    <div class="card-footer">
        <a href="{{url('admin/product')}}" class="btn btn-block btn-outline-primary btn-sm">Все товары</a>
    </div>
</div>
@endif
