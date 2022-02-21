@extends('admin.layouts.app')

@section('content')

    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Информация о компании</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class=" img-fluid " src="{{url('uploads/logo.jpg')}}" alt="User profile picture">
                            </div>
                            <h3 class="profile-username text-center">{{$company->title ?? "Название компании"}}</h3>
                            <p class="text-muted text-center">{{$company->domain ?? "домен"}}</p>
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Телефон</b> <a class="float-right">{{$company->phone}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Email</b> <a class="float-right">{{$company->email}}</a>
                                </li>
                            </ul>
                        </div>

                    </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Редактировать информацию о компании</h3>
                            </div>
                            <div class="card-body">
                                @include('admin.company.form')
                            </div>
                            <div class="card-footer">
                                <a href="#" class="btn btn-info editCompany">Сохранить</a>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>

    </div>


@endsection

