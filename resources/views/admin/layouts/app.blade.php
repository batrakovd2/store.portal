<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Portal Vassortimente Admin</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/jquery-ui/jquery-ui.css') }}">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper" id="app">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{url('/')}}" class="nav-link">На сайт</a>
            </li>
        </ul>

    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
            <span class="brand-text font-weight-light">Магазин</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="info">
                    <a href="#" class="d-block">Продавец</a>
                </div>
            </div>

            <!-- SidebarSearch Form -->
            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="{{route('admin.index')}}" class="nav-link">
                            <i class="nav-icon fa fa-home"></i>
                            <p>
                                Главная
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('admin/category')}}" class="nav-link @if(\Illuminate\Support\Facades\Request::is('admin/category/*') || \Illuminate\Support\Facades\Request::is('admin/category')) {{'active'}}  @endif">
                            <i class="nav-icon fas fa-bars"></i>
                            <p>
                                Категории
                            </p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{route('admin.index')}}" class="nav-link">
                            <i class="nav-icon fas fa-box"></i>
                            <p>
                                Товары
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{url('admin/product')}}" class="nav-link @if(\Illuminate\Support\Facades\Request::is('admin/product/') || \Illuminate\Support\Facades\Request::is('admin/product')) {{'active'}}  @endif">
                                    <i class="far fa-dot-circle nav-icon"></i>
                                    <p>Товары</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('admin/product/create')}}" class="nav-link @if(\Illuminate\Support\Facades\Request::is('admin/product/create*') || \Illuminate\Support\Facades\Request::is('admin/product/create')) {{'active'}}  @endif">
                                    <i class="far fa-dot-circle nav-icon"></i>
                                    <p>Добавить товар</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.page.index')}}" class="nav-link @if(\Illuminate\Support\Facades\Request::is('admin/page/*') || \Illuminate\Support\Facades\Request::is('admin/page')) {{'active'}}  @endif">
                            <i class="nav-icon fa fa-file"></i>
                            <p>
                                Страницы
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('admin.news.index')}}" class="nav-link @if(\Illuminate\Support\Facades\Request::is('admin/news/*') || \Illuminate\Support\Facades\Request::is('admin/news')) {{'active'}}  @endif">
                            <i class="nav-icon fas fa-globe-americas"></i>
                            <p>
                                Новости
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.user.index')}}" class="nav-link @if(\Illuminate\Support\Facades\Request::is('admin/user/*') || \Illuminate\Support\Facades\Request::is('admin/user')) {{'active'}}  @endif">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Пользователи
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.review.index')}}" class="nav-link @if(\Illuminate\Support\Facades\Request::is('admin/review/*') || \Illuminate\Support\Facades\Request::is('admin/review')) {{'active'}}  @endif">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Отзывы
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.gallery.index')}}" class="nav-link @if(\Illuminate\Support\Facades\Request::is('admin/gallery/*') || \Illuminate\Support\Facades\Request::is('admin/gallery')) {{'active'}}  @endif">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Галлерея
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-cog"></i>
                            <p>
                                Настройки
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{url('admin/company')}}" class="nav-link @if(\Illuminate\Support\Facades\Request::is('admin/company/') || \Illuminate\Support\Facades\Request::is('admin/company')) {{'active'}}  @endif">
                                    <i class="far fa-building nav-icon"></i>
                                    <p>Компания</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('admin/product/create')}}" class="nav-link @if(\Illuminate\Support\Facades\Request::is('admin/company/create*') || \Illuminate\Support\Facades\Request::is('admin/company/create')) {{'active'}}  @endif">
                                    <i class="nav-icon fa fa-picture-o"></i>
                                    <p>Дизайн</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>


@yield('content')



<!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        <div class="p-3">
            <h5>Title</h5>
            <p>Sidebar content</p>
        </div>
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
            Anything you want
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2022 <a href="https://adminlte.io">Vassortimente</a>.</strong> All rights reserved.
    </footer>

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.js') }}"></script>
<script src="{{ asset('plugins/jquery-ui/jquery-ui.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.js') }}"></script>

<script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
<script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>

<script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.js') }}"></script>
<script src="{{ asset('plugins/summernote/summernote-bs4.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/global.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>

</body>
</html>
