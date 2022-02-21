@extends('admin.layouts.app')

@section('content')

    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Пользователи</h1>
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
                                <h3 class="card-title">Список пользователей</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Имя</th>
                                        <th>Email</th>
                                        <th style="width: 40px"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(!empty($users))
                                        @foreach($users as $key=>$us)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td>{{$us->name}}</td>
                                                <td>{{$us->email}}</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <div class="col-lg-2">
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <a href="{{route('admin.user.add')}}" type="button" class="btn btn-block btn-primary btn-lg">Добовить пользователя</a>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>



@endsection
