@if ($paginator->hasPages())

    <ul class="pagination pagination-month justify-content-center">
        @if ($paginator->onFirstPage())
        @else
            <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}">«</a></li>
        @endif

        @foreach ($elements as $element)
            @if (is_string($element))
                <li class="page-item">
                    <a class="page-link" href="javascript:void(0);">
                        ...
                    </a>
                </li>
            @endif
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active">
                            <a class="page-link" href="javascript:void(0);">
                                {{ $page }}
                            </a>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $url }}">
                                {{ $page }}
                            </a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

    </ul>

@endif


