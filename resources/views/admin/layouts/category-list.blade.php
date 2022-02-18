@if(!empty($categoryList))
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
                @foreach($categoryList as $key=>$cat)
                    <tr>
                        <td>{{$cat->title}}</td>
                        <td>
                            <a href="#" class="btn btn-secondary btn-sm edit float-right ml-2 remove-product-btn" data-id="{{$cat->id}}" title="Edit">
                                <i class="fas fa-trash"></i>
                            </a>
                            <a href="{{route('admin.category.edit', $cat)}}" class="btn btn-secondary btn-sm edit float-right ml-2" title="Edit">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <a href="{{url('admin/category')}}" class="btn btn-block btn-outline-primary btn-sm">Все товары</a>
        </div>
    </div>
@endif
