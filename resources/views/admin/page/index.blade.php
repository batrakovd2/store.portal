@extends('admin.layouts.app')

@section('content')

    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Страницы</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <div class="content">
            <div class="container-fluid">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card card-primary">
                                <!-- /.card-header -->
                                <div class="card-header">
                                    <h3 class="card-title">Список страниц</h3>
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
                                        @if(!empty($pages))
                                            @foreach($pages as $key=>$pg)
                                                <tr>
                                                    <td>{{$key+1}}</td>
                                                    <td>{{$pg->title}}</td>
                                                    <td>
                                                        <a href="{{route('admin.page.edit', $pg)}}" class="btn btn-secondary btn-sm edit float-right ml-2" title="Edit">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>



@endsection
