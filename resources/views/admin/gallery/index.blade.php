@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">

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
                                            <div class="col-md-12 col-lg-6 col-xl-4">
                                                <div class="card mb-2 bg-gradient-dark">
                                                    <img class="card-img-top" src="http://img.portal.loc/{{$ph->photo}}" alt="Dist Photo 1">
                                                    <div class="card-img-overlay d-flex flex-column justify-content-end">
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
                                <a href="#" type="button" class="btn btn-block btn-primary btn-lg" data-toggle="modal" data-target="#modal-default">Добовить изображение</a>

                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>

                </div>

            </div>
        </div>

        <div class="modal fade" id="modal-default" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Default Modal</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="#" id="imageInput">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="file" id="file">
                                        <label class="custom-file-label" for="file">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="storeImage">Save changes</button>
                    </div>
                </div>

            </div>

        </div>

    </div>



@endsection
