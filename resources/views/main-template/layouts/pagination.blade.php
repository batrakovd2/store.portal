@if ($paginator->hasPages())
<div class="pagination">
    @if ($paginator->onFirstPage())
    @else
        <a href="{{ $paginator->previousPageUrl() }}" class="pagination__link">
            <img class="pagination__arrow" src="{{asset('img/control/pagination-prev.svg')}}" alt="<">
        </a>
    @endif
    @foreach ($elements as $element)
        @if (is_string($element))
            <span class="pagination__link">...</span>
        @endif
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <a href="javascript:void(0);" class="pagination__link pagination__link--is-active">{{ $page }}</a>
                @else
                    <a href="{{ $url }}" class="pagination__link">{{ $page }}</a>
                @endif
            @endforeach
        @endif
    @endforeach
    @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}" class="pagination__link">
            <img class='pagination__arrow' src="./img/control/pagination-next.svg" alt="<">
        </a>
    @endif

</div>

@endif




