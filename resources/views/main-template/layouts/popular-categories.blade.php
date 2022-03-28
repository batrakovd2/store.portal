@if(!empty($popCategories))
    <!--sections-->
    <div class="sections">
        <h2 class="section-title h2">
            <span>Популярные разделы</span>
            <img src="./img/icon/sections-arrow.svg" alt="" class="sections__arrow">
        </h2>
        <div class="sections-list">
            @foreach($popCategories as $pcat)
                <div class='sections-card'>
                    <div class="sections-card__desc">
                        <a href="/catalog/{{$pcat->slug}}" class="sections-card__title link">
                            {{$pcat->title}}
                        </a>
                    </div>
                    <div class="sections-card__preview">
                        <img src="{{$pcat->photo}}" alt="" class="sections-card__img">
                    </div>
                </div>
            @endforeach

        </div>

        <div class="sections__btn right-edge">
            <a href="{{route('catalog')}}" class="light-btn">Посмотреть все</a>
        </div>

    </div>
    <!--sections-->

@endif
