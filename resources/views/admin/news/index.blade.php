@extends('admin.layouts.app')

@section('content')

    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Новости</h1>
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
                                <h3 class="card-title">Список новостей</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Заголовок</th>
                                        <th style="width: 40px">Редактировать</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(!empty($news))
                                        @foreach($news as $key=>$nws)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td>{{$nws->title}}</td>
                                                <td>
                                                    <a href="#" class="btn btn-secondary btn-sm edit float-right ml-2 remove-news-btn" data-id="{{$nws->id}}" title="Edit">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                    <a href="{{route('admin.news.edit', $nws)}}" class="btn btn-secondary btn-sm edit float-right ml-2" title="Edit">
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
                                {!! $news->onEachSide(1)->appends(request()->query())->links('admin.layouts.pagination') !!}

                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <div class="col-lg-2">
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <a href="{{route('admin.news.create')}}" type="button" class="btn btn-block btn-primary btn-lg">Добовить новость</a>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>



@endsection
