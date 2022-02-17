@extends('admin.layouts.app')

@section('content')

    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Товары</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <div class="content">
            <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-10">
                                <!-- /.card-header -->

                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Список товаров</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body p-0">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th style="width: 10px">#</th>
                                                <th>Название</th>
                                                <th style="width: 40px">Редактировать</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if(!empty($products))
                                                @foreach($products as $key=>$prod)
                                                    <tr>
                                                        <td>{{$key+1}}</td>
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
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        {!! $products->onEachSide(1)->appends(request()->query())->links('admin.layouts.pagination') !!}

                                    </div>
                                </div>
                                <!-- /.card-body -->
                        </div>
                        <div class="col-lg-2">
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <a href="{{route('admin.product.create')}}" type="button" class="btn btn-block btn-primary btn-lg">Добовить товар</a>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>

                    </div>

            </div>
        </div>

    </div>



@endsection
