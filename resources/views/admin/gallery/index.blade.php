@extends('admin.layouts.app')

@section('content')

    <div class="content-wrapper gallery">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Галерея</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-10">
                        <div class="card card-success">
                            <div class="card-body">
                                <div class="row">
                                    @if(!empty($photo))
                                        @foreach($photo as $ph)
                                            <div class="col-md-12 col-lg-6 col-xl-3">
                                                <div class="card mb-2 bg-gradient-dark">
                                                    <img class="card-img-top" src="{{$ph->photo}}"
                                                         alt="Dist Photo 1">
                                                    <div
                                                        class="card-img-overlay d-flex flex-column justify-content-end">
                                                        <p class="card-text text-white pb-2 pt-1">{{$ph->description}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <a href="#" type="button" class="btn btn-block btn-primary btn-lg" data-toggle="modal"
                                   data-target="#modal-addImage">Добовить изображение</a>

                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>

                </div>

            </div>
        </div>

        @include('admin.layouts.modal-choose-file')

    </div>



@endsection

