@extends('admin.layouts.app')

@section('content')

    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Доставка</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <div class="content">
            <div class="container-fluid">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-10">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Список видов доставки</h3>
                                </div>
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
                                        @foreach($deliveries as $key=>$dv)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td>{{$dv->title}}</td>
                                                <td>
                                                    <a href="#" class="btn btn-secondary btn-sm edit float-right ml-2 remove-delivery-btn" data-id="{{$dv->id}}" title="Edit">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                    <a href="{{route('admin.delivery.edit', $dv)}}" class="btn btn-secondary btn-sm edit float-right ml-2" title="Edit">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <a href="{{route('admin.delivery.create')}}" type="button" class="btn btn-block btn-primary btn-lg">Добовить вид доставки</a>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>



@endsection
