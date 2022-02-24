@extends('admin.layouts.app')

@section('content')

    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Отзывы</h1>
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
                                <h3 class="card-title">Список отзывов</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Имя</th>
                                        <th>Статус</th>
                                        <th style="width: 40px">Редактировать</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(!empty($reviews))
                                        @foreach($reviews as $key=>$rws)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td>{{$rws->name}}</td>
                                                <td>{{$rws->status}}</td>
                                                <td>
                                                    <a href="#" class="btn btn-secondary btn-sm edit float-right ml-2 remove-review-btn" data-id="{{$rws->id}}" title="Edit">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                    <a href="{{route('admin.review.edit', $rws)}}" class="btn btn-secondary btn-sm edit float-right ml-2" title="Edit">
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
                                @if($reviews)
                                    {!! $reviews->onEachSide(1)->appends(request()->query())->links('admin.layouts.pagination') !!}
                                @endif
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>

                </div>

            </div>
        </div>

    </div>



@endsection
