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
            <a href="{{route('admin.delivery.index')}}" class="nav-link @if(\Illuminate\Support\Facades\Request::is('admin/delivery/*') || \Illuminate\Support\Facades\Request::is('admin/delivery')) {{'active'}}  @endif">
                <i class="nav-icon fa fa-file"></i>
                <p>
                    Доставка
                </p>
            </a>
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
            <a href="{{route('admin.faq.index')}}" class="nav-link @if(\Illuminate\Support\Facades\Request::is('admin/faq/*') || \Illuminate\Support\Facades\Request::is('admin/faq')) {{'active'}}  @endif">
                <i class="nav-icon fas fa-users"></i>
                <p>
                    Вопросы/ответы
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
                    <a href="{{url('admin/settings/')}}" class="nav-link @if(\Illuminate\Support\Facades\Request::is('admin/settings/index*') || \Illuminate\Support\Facades\Request::is('admin/settings/index')) {{'active'}}  @endif">
                        <i class="nav-icon fa fa-picture-o"></i>
                        <p>Настройки</p>
                    </a>
                </li>
            </ul>
        </li>

    </ul>
</nav>
<!-- /.sidebar-menu -->
