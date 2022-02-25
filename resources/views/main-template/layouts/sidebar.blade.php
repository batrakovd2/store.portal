@if(!empty($globalCategories) && $globalCategories)
    <!--col-nav-->
    <div class="col-catalog">
        <form action="" method="POST" class="form-search">
            <input type="text" class="form-search__input" placeholder="Поиск">
        </form>
        <div class="nav-catalog">
            <nav class="catalog__list">
                @foreach($globalCategories as $category)
                <div class="category__item dropdown-wrap">
                    <div class="category__name press-to-show ">
                        @if(!empty($category['children']) && $category['children'])
                            <img src="./img/icon/catalog-arrow.svg" alt="" class="category__arrow arrow-show">
                        @endif
                        <a href="/price/{{$category['slug']}}" class="category__title">{{$category['title']}}</a>
                    </div>
                    @if(!empty($category['children']) && $category['children'])
                    <div class="product__dropdown dropdown">
                        <ul class="product__list hidden-el">
                            @foreach($category['children'] as $child)
                                <li class="products__item">
                                <a href="/price/{{$child['slug']}}" class="product__link link">
                                    {{$child['title']}}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
                @endforeach
            </nav>
        </div>
    </div>
    <!--col-nav-->
@endif
