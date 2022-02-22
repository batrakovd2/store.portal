@extends('admin.layouts.app')

@section('content')

    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Создание новости</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Добавить новость</h3>
                            </div>
                            <div class="card-body">
                                @include('admin.news.form')
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <a href="#" class="btn btn-info createNews">Добавить</a>
                                <a href="{{route('admin.news.index')}}" class="btn btn-default float-right">Отменить</a>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>

    </div>


@endsection
