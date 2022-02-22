@extends('admin.layouts.app')

@section('content')

    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Привязка пользователей</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <div class="content">
            <div class="container-fluid">

                <h2 class="text-center display-4">Введите email пользователя</h2>
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <form action="#" id="userSearcher">
                            <div class="input-group">
                                <input type="text" name="email"  class="form-control form-control-lg" placeholder="Введите mail пользовтеля для привязки к магазину">
                                <div class="input-group-append">
                                    <a href="#" class="btn btn-lg btn-default bindUser">
                                        <i class="fa fa-link"></i>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>



@endsection
